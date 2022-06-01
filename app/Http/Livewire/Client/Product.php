<?php

namespace App\Http\Livewire\Client;

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public $name = '';
    public $email = '';
    public $note = '';
    public $personId = '';
    public $address = '';
    public $permanentResidence = '';
    public $phone = '';
    public $startDay='';
    public $startHour='';
    public $endDay='';
    public $endHour='';
    public $product;

    public function render()
    {
        return view('livewire.client.product')
            ->extends('client.layouts.master')->section('content');
    }

    public function mount($slug)
    {
        $this->product = ProductModel::query()
            ->with(['images'])
            ->where('slug', $slug)
            ->first();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
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
            'permanentResidence' => 'required|string',
            'address' => 'required|string',
            'startDay' => 'required|string',
            'endDay' => 'required|string',
            'startHour' => 'required|string',
            'endHour' => 'required|string',
        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên loại xe',
        'phone' => 'Số điện thoại',
        'personId' => 'CCCD/CMT',
        'productId' => 'Xe thuê',
        'address' => 'Địa chỉ',
        'permanentResidence' => 'Hộ khẩu thường chú',
        'startDay' => 'Ngày nhận xe',
        'endDay' => 'Ngày trả xe',
        'startHour' => 'Giờ nhận',
        'endHour' => 'Giờ trả',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            $customer = Customer::query()->where('person_id', $this->personId)->first();

            $product = ProductModel::query()->find($this->product->id);

            if (!$customer) {
                $customer = Customer::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'person_id' => $this->personId,
                    'address' => $this->address,
                    'permanent_residence' => $this->permanentResidence,
                ]);
            }

            $customerOrder = $customer->customerOrders()->create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'person_id' => $this->personId,
                'address' => $this->address,
                'permanent_residence' => $this->permanentResidence,
            ]);

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

            $customerOrder->orders()->create([
                'name' => 'Yêu cầu thuê xe - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $this->name,
                'code' => 'YCTX'. Carbon::now()->timestamp,
                'pick_date' => Carbon::make($this->startDay .' ' . $this->startHour)->timestamp,
                'drop_date' => Carbon::make($this->endDay .' ' . $this->endHour)->timestamp,
                'price_deposits' => 0,
                'product_order_id' => $productOrder->id,
                'status' =>  Order::STATUS['no_deposit_yet']
            ]);

            session()->flash('success', [
                'title'=> 'Đặt xe thành công',
                'message' => 'Vui lòng kiểm tra email để xem chi tiết!'
            ]);

            DB::commit();
            return redirect()->route('customer.order');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error create order by user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            $this->dispatchBrowserEvent('alertUser',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }
}
