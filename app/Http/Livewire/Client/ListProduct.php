<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class ListProduct extends Component
{
    public function render()
    {
        return view('livewire.client.list-product')->extends('client.layouts.master')->section('content');
    }
}
