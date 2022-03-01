<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Post extends Component
{
    public function render()
    {
        return view('livewire.client.post')->extends('client.layouts.master')->section('content');
    }
}
