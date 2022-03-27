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
    public $deleteId;
    public $search = '';



    public function render()
    {
        return view('livewire.admin.role.role-index', [
            'roles' => Role::query()->name($this->search)->paginate($this->perPage)
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {
    }


    public function destroy()
    {
        if (!checkPermission('role-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
            return false;
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
