<?php

namespace App\Http\Livewire\Admin\Statistic;

use Livewire\Component;

class Revenue extends Component
{
    public function render()
    {
        return view('livewire.admin.statistic.revenue')->extends('admin.layouts.master')->section('content');
    }
}
