<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use Livewire\WithFileUploads;

class BrandIndex extends Component
{
    use WithFileUploads;

    public $showCreateModal = false;
    public $image = '';

    public function render()
    {
        return view('livewire.admin.brand.brand-index')->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function showCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    public function clearImagePreview()
    {
        $this->image = '';
    }


    public function store()
    {
        dd($this->image);
    }

}
