<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Admin;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class AccountIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $showDeleteModal = false;
    public $hasPermissionDelete = false;
    public $search = '';
    public $roleId = '';
    public $status = '';

    public $filter = [
        'roleId' => '',
        'status' => '',
    ];

    public function render()
    {
        return view('livewire.admin.account.account-index', [
            'admins' => Admin::query()
                ->search($this->search)
                ->role($this->roleId)
                ->status($this->status)
                ->paginate($this->perPage),
            'roles' => Role::query()->get()
        ])->extends('admin.layouts.master')->section('content');
    }

    public function handleFilter()
    {
        $this->roleId = $this->filter['roleId'];
        $this->status = $this->filter['status'];
    }

}
