<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.client.blog')->extends('client.layouts.master')->section('content');
    }
}
