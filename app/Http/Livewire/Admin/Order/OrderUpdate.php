<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OrderUpdate extends Component
{
    public $name = '';
    public $note = '';
    public $personId = '';
    public $address = '';
    public $permanentResidence = '';
    public $phone = '';
    public $productId = '';
    public $orderTime = [];
    public $priceDeposits = '';
    public $orderId = '';

    protected $listeners = [
        'changeOrderTime' => 'updateOrderTime',
        'changeNote' => 'updateNote',
        'changeProductId' => 'updateProductId',
    ];

    public function render()
    {
        $products = Product::query()->status(Product::STATUS['normal'])->get();

        return view('livewire.admin.order.order-update', [
            'products' => $products
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $order = Order::query()->with(['customerOrder', 'productOrder'])->find($id);

        if ($order) {
            $this->name = $order->customerOrder->name;
            $this->phone = $order->customerOrder->phone;
            $this->permanentResidence = $order->customerOrder->permanent_pesidence;
            $this->personId = $order->customerOrder->person_id;
            $this->phone = $order->customerOrder->phone;
            $this->note = $order->note;
            $this->orderTime['start'] = Carbon::createFromTimestamp($order->pick_date)->format('d/m/Y H:m:s');
            $this->orderTime['end'] = Carbon::createFromTimestamp($order->drop)->format('d/m/Y H:m:s');

            $this->dispatchBrowserEvent('addOrderTime', [
                'orderTime' => $this->orderTime
            ]);
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match("/^[0-9]{10}$/", $value)) {
                        return $fail('Trường số điện thoại gồm 10 chữ số');
                    }
                }
            ],
            'personId' => 'required|string|max:255',
            'orderTime' => 'required',
            'permanentResidence' => 'required|string',
            'address' => 'required|string',
            'productId' => 'required',
            'priceDeposits' => 'required',

        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên loại xe',
        'phone' => 'Số điện thoại',
        'personId' => 'CCCD/CMT',
        'productId' => 'Xe thuê',
        'orderTime' => 'Thời gian thuê xe',
        'priceDeposits' => 'Tiền cọc',
        'address' => 'Địa chỉ',
        'permanentResidence' => 'Hộ khẩu thường chú',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName == 'personId') {
            $customer = Customer::query()->where('person_id', $this->personId)->first();

            if ($customer) {
                $this->name = $customer->name;
                $this->permanentResidence = $customer->permanent_residence;
                $this->phone = $customer->phone;
                $this->address = $customer->address;
            } else {
                $this->name = '';
                $this->permanentResidence = '';
                $this->phone = '';
                $this->address = '';
            }
        }
    }

    public function updateOrderTime($value)
    {
        $this->orderTime = $value;
        if ($value) {
            $this->resetValidation('orderTime');
        }
    }

    public function updateProductId($value)
    {
        $this->productId = $value;
        if ($value) {
            $this->resetValidation('productId');
        }
    }

    public function updateNote($value)
    {
        $this->note = $value;
    }

    public function update()
    {
        if (!checkPermission('order-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate();

        DB::beginTransaction();

        try {

            $customer = Customer::query()->where('person_id', $this->personId)->first();

            $product = Product::query()->find($this->productId);

            if (!$customer) {
                $customer = Customer::updated([
                    'name' => $this->name,
                    'phone' => $this->phone,
                    'person_id' => $this->personId,
                    'address' => $this->address,
                    'permanent_residence' => $this->permanentResidence,
                ]);

                $customer->name = $this->name;
                $customer->phone = $this->phone;
                $customer->person_id = $this->personId;
                $customer->address = $this->address;
                $customer->permanent_residence = $this->permanentResidence;
            }

            $productOrder = $product->productOrders()->create([
                'name' => $product->name,
                'color' => $product->color,
                'km' => $product->km,
                'year' => $product->year,
                'price' => $product->price,
                'thumbnail' => $product->thumbnail,
                'other_parameters' => $product->other_parameters,
                'license_plates' => $product->license_plates,
                'brand_id' => $product->brand_id,
            ]);

            $customer->orders()->create([
                'name' => 'Yêu cầu thuê xe - ' . $product->name . ' - ' . $product->license_plates,
                'pick_date' => Carbon::make($this->orderTime['start'])->timestamp,
                'drop_date' => Carbon::make($this->orderTime['end'])->timestamp,
                'price_deposits' => $this->priceDeposits,
                'product_order_id' => $productOrder->id,
            ]);

            session()->flash('success', 'Tạo mới thành công');
            DB::commit();
            return redirect()->route('admin.order');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error create order', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }
}
