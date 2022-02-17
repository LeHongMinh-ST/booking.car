<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\GroupPermission;
use App\Models\Role;
use Livewire\Component;

class RoleUpdate extends Component
{
    public $permissionChecked = [];
    public $permissionGroupChecked = [];
    public $groups;
    public $name;
    public $description;
    public $roleId;

    public function render()
    {
        return view('livewire.admin.role.role-update', [
            'groups' => $this->groups
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $role = Role::query()->with('permissions')->find($id);
        $this->name = $role->name;
        $this->roleId = $role->id;
        $this->description = $role->description;
        $this->permissionChecked = $role->permissions->pluck('id')->toArray();
        $this->groups = GroupPermission::query()->with('permissions')->get();
        foreach ($this->groups as $group) {
            if ($this->checkGroupSellectAll($group, $this->permissionChecked)){
                $this->permissionGroupChecked[] = $group->id;
            }
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        $role = Role::query()->where('id', $this->roleId)->first();
        $role->update([
            'name' => $this->name,
            'description' => $this->description
        ]);
        $role->permissions()->detach();

        $role->permissions()->attach($this->permissionChecked);

        session()->flash('success', 'Cập nhật thành công');

        return redirect()->route('admin.role');
    }

    public function checkGroupSellectAll($group, $permissions)
    {
        $permissionGroupId = $group->permissions->pluck('id')->toArray();

        if (!count($permissionGroupId) > 0) return false;

        foreach ($permissionGroupId as $id) {
            if (!in_array($id, $permissions)) {
                return false;
            }
        }
        return true;
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
