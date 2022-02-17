<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class RoleIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $showDeleteModal = false;
    public $hasPermissionDelete = false;
    public $deleteId;
    protected $listeners = ["alertSuccess"];

    public function render()
    {
        return view('livewire.admin.role.role-index', [
            'roles' => Role::query()->paginate($this->perPage)
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {
        $this->hasPermissionDelete = $this->checkPermissionDelete('role-delete');
    }

    public function checkPermissionDelete($codePermission)
    {
        $user = auth()->guard('admin')->user();
        $role = Role::find($user->role_id);
        if ($role->permissions) {
            $isSuperAdmin = $this->hasPermission($role, 'super-admin');
            $isAdmin = $this->hasPermission($role, 'admin');
            if ($isSuperAdmin || $isAdmin) {
                return true;
            }

            $isPermission = $this->hasPermission($role, $codePermission);
            if ($isPermission) {
                return true;
            }
        }
        return false;
    }

    private function hasPermission($role, $codePermission)
    {
        $idPermission = Permission::where('code', $codePermission)->first();
        if ($idPermission)
            return $role->permissions->contains($idPermission->id);
        return false;
    }

    public function destroy()
    {
        if (!$this->hasPermissionDelete) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!', 'title' => '403']);
        }

        try {
            Role::query()->where('id', $this->deleteId)->first()->permissions()->detach();
            Role::destroy($this->deleteId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeDeleteModal();
        } catch (\Exception $e) {
            Log::error('Error delete role', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }


    public function openDeleteModal($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->deleteId = null;
        $this->showDeleteModal = false;
    }
}
