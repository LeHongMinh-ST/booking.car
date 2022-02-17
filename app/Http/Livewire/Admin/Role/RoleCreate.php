<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\GroupPermission;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RoleCreate extends Component
{
    public $permissionChecked = [];
    public $permissionGroupChecked = [];
    public $groups;
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.admin.role.role-create', [
            'groups' => $this->groups
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {
        $this->groups = GroupPermission::query()->with('permissions')->get();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string'
        ]);


        try {
            $role = Role::create([
                'name' => $this->name,
                'description' => $this->description
            ]);

            $role->permissions()->attach($this->permissionChecked);

            session()->flash('success', 'Tạo mới thành công');

            return redirect()->route('admin.role');

        } catch (\Exception $e) {
            Log::error('Error create role', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function selectAll($id)
    {
        $permissions = GroupPermission::query()->with('permissions')->find($id)->permissions;
        $permissionIds = $permissions->pluck('id')->toArray();
        if (in_array($id, $this->permissionGroupChecked)) {
            $this->permissionChecked = array_merge($this->permissionChecked, $permissionIds);
        } else {
            $permissionsChecked = $this->permissionChecked;
            $this->permissionChecked = [];
            foreach ($permissionsChecked as $permissionId) {
                if (!in_array($permissionId, $permissionIds)) {
                    $this->permissionChecked[] = $permissionId;
                }
            }
        }
    }
}
