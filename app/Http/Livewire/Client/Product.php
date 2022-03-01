<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        return view('livewire.client.product')->extends('client.layouts.master')->section('content');
    }
}
