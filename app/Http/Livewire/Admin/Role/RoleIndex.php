<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class RoleIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $showCreateModal = false;
    protected $listeners = ["alertSuccess"];

    public function render()
    {
        return view('livewire.admin.role.role-index', [
            'roles' => Role::query()->paginate($this->perPage)
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }


    public function alertSuccess()
    {
        if (\session()->has('success')) {
            $this->dispatchBrowserEvent('alert', ['success', 'Record has been updated']);
        }
    }
}
