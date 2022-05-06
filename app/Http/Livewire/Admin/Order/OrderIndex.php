<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Contract;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Carbon\Carbon;
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
    public $totalHours = 0;
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
    public $noteCancel;
    public $noteCanceled;
    public $depositPrice;
    public $note;
    public $contract;

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
            $this->selectId = $order->id ?? '';
            $this->customerName = $order->customerOrder->name ?? '';
            $this->personId = $order->customerOrder->person_id ?? '';
            $this->phone = $order->customerOrder->phone ?? '';
            $this->address = $order->customerOrder->address ?? '';
            $this->permanentResidence = $order->customerOrder->permanent_residence ?? '';
            $this->code = $order->code ?? '';
            $this->statusText = $order->statusText ?? 0;
            $this->priceDeposits = $order->price_deposits ?? 0;
            $this->pickDateText = $order->pickDateText ?? '';
            $this->dropDateText = $order->dropDateText ?? '';
            $this->totalPrice = $order->totalPrice ?? 0;
            $this->totalHours = $order->totalHours ?? 0;
            $this->productName = $order->productOrder->name ?? '';
            $this->color = $order->productOrder->color ?? '';
            $this->km = $order->productOrder->km ?? '';
            $this->year = $order->productOrder->year ?? '';
            $this->price = $order->productOrder->price ?? '';
            $this->thumbnail = $order->productOrder->thumnail ?? '';
            $this->productId = $order->productOrder->product_id ?? '';
            $this->licensePlates = $order->productOrder->license_plates ?? '';
            $this->statusOrder = $order->status ?? 0;
            $this->noteCanceled = $order->note_cancel;
            $this->note = $order->note;
            $this->contract = $order->contract;
            $this->depositPrice = $order->productOrder->deposit_price;
            $this->dispatchBrowserEvent('openDetailModal');
        }
    }

    protected $rules = [
        'noteCancel' => 'required',
    ];

    protected $validationAttributes = [
        'noteCancel' => 'Lý do',
    ];

    public function cancelOrder()
    {
        $this->validate();

        $order = Order::query()->find($this->selectId);
        $this->statusOrder = $order->status = Order::STATUS['cancel'];
        $this->noteCanceled = $order->note_cancel = $this->noteCancel;
        $order->save();
        $this->statusText = $order->statusText;

        $this->closeModalCancel();

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
        if (!checkPermission('order-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
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

    public function handleCreateContract($id)
    {
        if (!checkPermission('contract-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        DB::beginTransaction();
        try {
            $order = Order::query()->with(['customerOrder', 'productOrder'])->find($id);

            $product = $order->productOrder;
            $customer = $order->customerOrder;

            $now = Carbon::now()->timestamp;

            if ($order->status != Order::STATUS['deposited']) {
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'error', 'message' => 'Yêu cầu không đủ điều kiện để tạo hợp đồng', 'title' => 'Lỗi']);
                return false;
            }

            if ($order->price_deposits < $product->deposit_price) {
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'error', 'message' => 'Khách hàng chưa đóng đủ tiền cọc tối thiểu!', 'title' => 'Lỗi']);
                return false;
            }

            if ($now > $order->pick_date) {
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'error', 'message' => 'Đã quá thời gian nhận xe!', 'title' => 'Lỗi']);
                return false;
            }

            $contract = new Contract();
            $contract->name = 'Hợp đồng thuê xe  - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $customer->name;
            $contract->code = $this->generateUniqueCode();
            $contract->pick_date = $order->pick_date;
            $contract->drop_date = $order->drop_date;
            $contract->price_total = $order->totalPrice;
            $contract->price_hour = $product->price;
            $contract->hour = $order->totalHours;
            $contract->price_deposits = $order->price_deposits;
            $contract->customer_id = $customer->id;
            $contract->product_order_id = $product->id;
            $contract->status = Contract::STATUS['deposited'];
            $contract->order_id = $order->id;

            if ($contract->save()) {
                $order->status = Order::STATUS['contract'];
                $order->save();

                $contract->load(['productOrder', 'customerOrder']);
                $contract->content = view('admin.contract.contract', ['contract' => $contract]);
                $contract->save();


                session()->flash('success', 'Tạo hợp đồng thành công');
                DB::commit();
                return redirect()->route('admin.contract.detail', $contract->id);
            }


        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error delete order', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo hợp đồng thất bại!']);
        }
    }

    public function generateUniqueCode(): string
    {
        $text = 'ABCDEFGHILKMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($text), 0, 5). '-' . rand(10000, 99999);

        if (Contract::query()->where('code', $code)->exists()) {
            return $this->generateUniqueCode();
        }

        return $code;
    }
}
