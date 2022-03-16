<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OrderCreate extends Component
{
    public $name = '';
    public $email = '';
    public $note = '';
    public $personId = '';
    public $phone = '';
    public $productId = '';
    public $orderTime = '';
    public $priceDeposits = '';

    protected $listeners = [
        'changeOrderTime' => 'updateOrderTime',
    ];

    public function render()
    {
        $products = Product::query()->status(Product::STATUS['normal'])->get();

        return view('livewire.admin.order.order-create', [
            'products' => $products
        ])->extends('admin.layouts.master')->section('content');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255|email',
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
            'orderTime' => 'required|string|max:255',
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
    ];

    public function updateOrderTime($value)
    {
        $this->orderTime = $value;
    }

    public function store()
    {
        if (!checkPermission('order-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate();

        DB::beginTransaction();

        try {



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
