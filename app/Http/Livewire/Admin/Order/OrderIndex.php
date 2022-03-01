<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OrderIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showCreateModal = false;
    public $showUpdateModal = false;
    public $showDeleteModal = false;
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

        return view('livewire.admin.order.order-index', [
            'orders' => $orders
        ])->extends('admin.layouts.master')->section('content');
    }
}
