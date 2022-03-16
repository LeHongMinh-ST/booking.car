<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class OrderIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $image = '';
    public $name = '';
    public $description = '';
    public $perPage = 10;
    public $search = '';
    public $selectId;
    public $imageUpdate = '';
    public $status = 1;

    public function render()
    {
        $orders = Order::query()->orderBy('created_at', 'desc')->paginate($this->perPage);

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

    public function openDeleteModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }
}
