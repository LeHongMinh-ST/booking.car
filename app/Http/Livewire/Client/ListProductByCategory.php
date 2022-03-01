<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class ListProductByCategory extends Component
{
    public function render()
    {
        return view('livewire.client.list-product-by-category')->extends('client.layouts.master')->section('content');
    }
}
