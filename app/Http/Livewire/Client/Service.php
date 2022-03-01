<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Service extends Component
{
    public function render()
    {
        return view('livewire.client.service')->extends('client.layouts.master')->section('content');
    }
}
