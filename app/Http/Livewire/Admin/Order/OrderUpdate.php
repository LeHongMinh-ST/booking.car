<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Customer;
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
    public $priceDeposits = '';
    public $orderId = '';
    public $status = 0;
    public $customerOrderId = '';
    public $productOrderId = '';
    public $productIdOld = '';

    protected $listeners = [
        'changeOrderTime' => 'updateOrderTime',
        'changeNote' => 'updateNote',
        'changeProductId' => 'updateProductId',
    ];

    public function render()
    {
        $products = Product::query()->status(Product::STATUS['normal'])->orWhere('id', $this->orderId)->get();

        return view('livewire.admin.order.order-update', [
            'products' => $products
        ])->extends('admin.layouts.master')->section('content');
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
            $this->priceDeposits = $order->price_deposits;
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
                        return $fail('Tr?????ng s??? ??i???n tho???i g???m 10 ch??? s???');
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
        'name' => 'T??n lo???i xe',
        'phone' => 'S??? ??i???n tho???i',
        'personId' => 'CCCD/CMT',
        'productId' => 'Xe thu??',
        'orderTime' => 'Th???i gian thu?? xe',
        'priceDeposits' => 'Ti???n c???c',
        'address' => '?????a ch???',
        'permanentResidence' => 'H??? kh???u th?????ng ch??',
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
        if (!checkPermission('order-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'B???n kh??ng c?? quy???n th???c hi???n ch???c n??ng n??y!', 'title' => '403']);
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

            if (!($this->status == Order::STATUS['cancel'] || $this->status == Order::STATUS['contract'])) {
                $this->status = $this->priceDeposits > 0 ? Order::STATUS['deposited'] : Order::STATUS['no_deposit_yet'];
            }

            Order::query()->where('id', $this->orderId)->update([
                'name' => 'Y??u c???u thu?? xe - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $this->name,
                'pick_date' => Carbon::make($this->orderTime['start'])->timestamp,
                'drop_date' => Carbon::make($this->orderTime['end'])->timestamp,
                'price_deposits' => (int)$this->priceDeposits,
                'product_order_id' => $this->productOrderId,
                'status' => $this->status
            ]);


            $product->status = Product::STATUS['deposit'];
            $product->save();


            session()->flash('success', 'C???p nh???t th??nh c??ng');
            DB::commit();
            return redirect()->route('admin.order');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update order', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'T???o m???i th???t b???i!']);
        }
    }
}
