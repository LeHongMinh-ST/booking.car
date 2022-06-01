<?php

namespace App\Http\Livewire\Client\Customer;

use App\Models\CustomerOrder;
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
    public $orderId = '';
    public $status = 0;
    public $customerOrderId = '';
    public $productOrderId = '';
    public $productIdOld = '';
    public $createdTime = '';

    protected $listeners = [
        'changeOrderTime' => 'updateOrderTime',
        'changeNote' => 'updateNote',
        'changeProductId' => 'updateProductId',
    ];

    public function render()
    {
        $products = Product::query()->status(Product::STATUS['normal'])->get();

        return view('livewire.client.customer.order-update', [
            'products' => $products
        ])->extends('client.customer.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $order = Order::query()->with(['customerOrder', 'productOrder'])->find($id);
        if ($order) {
            $this->orderId = $order->id;
            $this->name = $order->customerOrder->name;
            $this->phone = $order->customerOrder->phone;
            $this->address = $order->customerOrder->address;
            $this->permanentResidence = $order->customerOrder->permanent_residence;
            $this->personId = $order->customerOrder->person_id;
            $this->note = $order->note;
            $this->status = $order->status;
            $this->createdTime = $order->created_at;
            $this->productIdOld = $this->productId = $order->productOrder->product_id;
            $this->customerOrderId = $order->customer_order_id;
            $this->productOrderId = $order->product_order_id;
            $this->orderTime['start'] = Carbon::createFromTimestamp($order->pick_date)->format('d-m-Y H:m:s');
            $this->orderTime['end'] = Carbon::createFromTimestamp($order->drop_date)->format('d-m-Y H:m:s');
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
        $time = Carbon::now();

        $createdTime = Carbon::make($this->createdTime);

        if ($time->diffInDays($createdTime) >= 2) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Đã quá thời gian cho phép!']);
            return false;
        }

        $this->validate();

        DB::beginTransaction();

        try {

            CustomerOrder::query()
                ->where('id',$this->customerOrderId)
                ->update([
                    'name' => $this->name,
                    'phone' => $this->phone,
                    'person_id' => $this->personId,
                    'address' => $this->address,
                    'permanent_residence' => $this->permanentResidence,
                ]);

            $product = Product::query()->find($this->productId);

            if ($this->productId != $this->productIdOld) {
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
                    'overtime_price' => $product->overtime_price,
                    'over_km_price' => $product->over_km_price,
                    'deposit_price' => $product->deposit_price,
                    'number_of_seats' => $product->number_of_seats,
                ]);

                $this->productOrderId = $productOrder->id;
            }


            Order::query()->where('id', $this->orderId)->update([
                'name' => 'Yêu cầu thuê xe - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $this->name,
                'pick_date' => Carbon::make($this->orderTime['start'])->timestamp,
                'drop_date' => Carbon::make($this->orderTime['end'])->timestamp,
                'status' => $this->status
            ]);


            $product->status = Product::STATUS['deposit'];
            $product->save();


            session()->flash('success', 'Cập nhật thành công');
            DB::commit();
            return redirect()->route('customer.order');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update order', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
}
