<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Product as ProductModel;

class ListProduct extends Component
{
    public function render()
    {
        $products = ProductModel::query()->paginate(12);

        return view('livewire.client.list-product', [
            'products' => $products
        ])->extends('client.layouts.master')->section('content');
    }
}
