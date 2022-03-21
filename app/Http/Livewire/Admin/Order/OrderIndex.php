<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class OrderIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $thumbnail = '';
    public $name = '';
    public $productName = '';
    public $code = '';
    public $color;
    public $price;
    public $year;
    public $licensePlates;
    public $km;
    public $statusText = 0;
    public $priceDeposits = 0;
    public $pickDateText = '';
    public $dropDateText = '';
    public $statusOrder = 0;
    public $productId = 0;
    public $totalPrice = 0;
    public $customerName = '';
    public $personId = '';
    public $phone = '';
    public $address = '';
    public $permanentResidence = '';
    public $description = '';
    public $perPage = 10;
    public $search = '';
    public $selectId;
    public $status = 0;
    public $orderTime = [];

    protected $listeners = [
        'changeFilterStatus' => 'updateStatus',
        'changeOrderTime' => 'updateOrderTime',
    ];


    public function render()
    {
        $orders = Order::query()
            ->with('customerOrder')
            ->search($this->search)
            ->filterStatus($this->status)
            ->filterDate($this->orderTime)
            ->orderBy('created_at', 'desc')->paginate($this->perPage);
        $products = Product::query()->status(Product::STATUS['normal'])->get();

        return view('livewire.admin.order.order-index', [
            'orders' => $orders,
            'products' => $products
        ])->extends('admin.layouts.master')->section('content');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }

    public function updateOrderTime($value)
    {
        $this->orderTime = $value;
    }

    public function resetFilter()
    {
        $this->status = 0;
        $this->orderTime = [];

        $this->dispatchBrowserEvent('clearFilter');
    }

    public function updateStatus($value)
    {
        $this->status = $value;
    }


    public function openDeleteModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function openDetailModal($id)
    {
        $order = Order::query()->with(['customerOrder', 'productOrder'])->find($id);
        if ($order) {
            $this->name = $order->name ?? '';
            $this->customerName = $order->customerOrder->name ?? '';
            $this->personId = $order->customerOrder->person_id ?? '' ;
            $this->phone = $order->customerOrder->phone ?? '';
            $this->address = $order->customerOrder->address ?? '';
            $this->permanentResidence = $order->customerOrder->permanent_residence ?? '';
            $this->code = $order->code ?? '';
            $this->statusText = $order->statusText ?? 0;
            $this->priceDeposits = $order->price_deposits ?? 0;
            $this->pickDateText = $order->pickDateText ?? '';
            $this->dropDateText = $order->dropDateText ?? '';
            $this->totalPrice = $order->totalPrice ?? 0;
            $this->productName = $order->productOrder->name ?? '';
            $this->color = $order->productOrder->color ?? '';
            $this->km = $order->productOrder->km ?? '';
            $this->year = $order->productOrder->year ?? '';
            $this->price = $order->productOrder->price ?? '';
            $this->thumbnail = $order->productOrder->thumnail ?? '';
            $this->productId = $order->productOrder->product_id ?? '';
            $this->licensePlates = $order->productOrder->license_plates ?? '';
            $this->statusOrder = $order->status ?? 0;
            $this->dispatchBrowserEvent('openDetailModal');
        }
    }

    public function cancelOrder()
    {
        $order = Order::query()->find($this->selectId);
        $order->status = Order::STATUS['cancel'];
        $order->save();
        $this->statusText = $order->statusText;

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'Cập nhật thành công!']);
    }

    public function closeModalCancel()
    {
        $this->dispatchBrowserEvent('closeModalCancel');
    }

    public function openCancelModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openCancelModal');
    }

    public function destroy()
    {
        if (!checkPermission('category-post-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }
        DB::beginTransaction();
        try {
            $order = Order::query()->with(['productOrder', 'customerOrder'])->find($this->selectId);

            if ($order) {
                $order->productOrder()->delete();
                $order->customerOrder()->delete();
            }

            Order::destroy($this->selectId);

            DB::commit();
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error delete order', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }
}
