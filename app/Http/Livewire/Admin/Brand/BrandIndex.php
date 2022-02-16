<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;

class BrandIndex extends Component
{
    public $showModal = false;

    public function render()
    {
        return view('livewire.admin.brand.brand-index')->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }
}
