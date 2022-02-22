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
    public $adminId = null;
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

    public function resetFilter()
    {
        $this->adminId = '';
        $this->status = '';
    }

    public function openDeleteModal($id)
    {
        $this->adminId = $id;
        $this->showDeleteModal = true;
    }

    public function closeModal()
    {
        $this->adminId = null;
        $this->showDeleteModal = false;
    }

    public function destroy()
    {
        if (!checkPermission('account-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
        }

        try {

            Admin::destroy($this->adminId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete account', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }

}
