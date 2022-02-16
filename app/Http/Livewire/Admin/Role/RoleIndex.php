<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;

class RoleIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.role.role-index')->extends('admin.layouts.master')->section('content');
    }
}
