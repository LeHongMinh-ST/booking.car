<?php

namespace App\Http\Livewire\Admin\Statistic;

use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        return view('livewire.admin.statistic.product')->extends('admin.layouts.master')->section('content');
    }
}
