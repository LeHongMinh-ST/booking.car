<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.client.about')->extends('client.layouts.master')->section('content');
    }
}
