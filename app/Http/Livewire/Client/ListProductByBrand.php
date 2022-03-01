<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class ListProductByBrand extends Component
{
    public function render()
    {
        return view('livewire.client.list-product-by-brand')->extends('client.layouts.master')->section('content');
    }
}
