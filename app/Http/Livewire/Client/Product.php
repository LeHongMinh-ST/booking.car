<?php

namespace App\Http\Livewire\Client;

use App\Jobs\Mail\SendMailOrder;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Rate;
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
    public $startDay = '';
    public $startHour = '';
    public $endDay = '';
    public $endHour = '';
    public $product;
    public $isComment = false;
    public $comment = "";
    public $driving = 1;
    public $layout = 1;
    public $space = 1;
    public $overAll = 1;
    public $drivingTotal = 0;
    public $layoutTotal = 0;
    public $spaceTotal = 0;
    public $overAllTotal = 0;
    public $rates = [];
    public $handleProcess = true;

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

        if (auth('web')->check()) {
            $user = auth('web')->user();
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->customer->phone;
            $this->address = $user->customer->address;
            $this->permanentResidence = $user->customer->permanent_residence;
            $this->personId = $user->customer->person_id;
        }

        $this->checkIsComment();

        $this->getRate($this->product->id);

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
        $this->dispatchBrowserEvent('showLoading');

        if (!$this->handleProcess) {
            return false;
        }


        DB::beginTransaction();

        try {
            $this->handleProcess = false;


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

            $order = $customerOrder->orders()->create([
                'name' => 'Yêu cầu thuê xe - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $this->name,
                'code' => 'YCTX' . Carbon::now()->timestamp,
                'pick_date' => Carbon::make($this->startDay . ' ' . $this->startHour)->timestamp,
                'drop_date' => Carbon::make($this->endDay . ' ' . $this->endHour)->timestamp,
                'price_deposits' => 0,
                'product_order_id' => $productOrder->id,
                'status' => Order::STATUS['no_deposit_yet']
            ]);

            SendMailOrder::dispatch($this->email, $order->id);

            session()->flash('success', [
                'title' => 'Đặt xe thành công',
                'message' => 'Vui lòng kiểm tra email để xem chi tiết!'
            ]);

            DB::commit();
            $this->handleProcess = true;

            return redirect()->route('customer.order');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error create order by user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);
            $this->handleProcess = true;
            $this->dispatchBrowserEvent('hideLoading');

            $this->dispatchBrowserEvent('alertUser',
                ['type' => 'error', 'message' => 'Đặt xe thất bại!']);
        }
    }

    public function rating()
    {
        $user = auth('web')->user();
        $customer = $user->customer()->with('customerOrders')->first();
        $customerOrderIds = $customer->customerOrders->pluck('id')->toArray();
        $contract = Contract::query()->whereIn('customer_id', $customerOrderIds)
            ->where('status', Contract::STATUS['complete'])
            ->where('is_cmt', '<>', Contract::IS_CMT['active'])
            ->first();
        $contract->is_cmt = Contract::IS_CMT['active'];
        $contract->save();

        $rate = new Rate();
        $rate->product_id = $this->product->id;
        $rate->driving = $this->driving;
        $rate->layout = $this->layout;
        $rate->space = $this->space;
        $rate->over_all = $this->overAll;
        $rate->contract_id = $contract->id;
        $rate->comment = $this->comment;
        $rate->user_id = $user->id;
        $rate->save();

        $this->getRate($this->product->id);
        $this->checkIsComment();
        $this->comment = "";
        $this->driving = "";
        $this->layout = "";
        $this->space = "";
        $this->overAll = "";
    }

    public function checkIsComment()
    {
        if (auth('web')->check()) {
            $user = auth('web')->user();
            $customer = $user->customer()->with('customerOrders')->first();
            $customerOrderIds = $customer->customerOrders->pluck('id')->toArray();
            $contracts = Contract::query()->whereIn('customer_id', $customerOrderIds)
                ->where('status', Contract::STATUS['complete'])
                ->where('is_cmt', Contract::IS_CMT['deactivate'])
                ->first();
            if ($contracts) {
                $this->isComment = true;
            }
        }
    }

    public function getRate($productId)
    {
        $this->rates = Rate::query()->where('product_id', $productId)->get();
        if (count($this->rates) > 0) {
            $this->drivingTotal = Rate::query()->where('product_id', $productId)->sum('driving') / count($this->rates);
            $this->layoutTotal = Rate::query()->where('product_id', $productId)->sum('layout') / count($this->rates);
            $this->spaceTotal = Rate::query()->where('product_id', $productId)->sum('space') / count($this->rates);
            $this->overAllTotal = Rate::query()->where('product_id', $productId)->sum('over_all') / count($this->rates);
        }
    }
}
