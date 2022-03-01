<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.client.contact')->extends('client.layouts.master')->section('content');
    }
}
