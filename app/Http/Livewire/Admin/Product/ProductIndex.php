<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

class ProductIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.product.product-index')->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }
}
