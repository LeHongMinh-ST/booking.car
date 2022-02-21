<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BrandIndex extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showCreateModal = false;
    public $showUpdateModal = false;
    public $showDeleteModal = false;
    public $image = '';
    public $name = '';
    public $description = '';
    public $perPage = 10;
    public $search = '';
    public $selectId;
    public $imageUpdate = '';
    public $status = 1;

    public function render()
    {
        return view('livewire.admin.brand.brand-index', [
            'brands' => Brand::query()->search($this->search)->orderBy('created_at', 'desc')->paginate($this->perPage)
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'image' => 'image|nullable',
            'name' => 'required|string|max:255',
        ]);
    }

    public function showCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function showUpdateModal($id)
    {
        $this->clearForm();

        $brand = Brand::find($id);

        if ($brand) {
            $this->selectId = $brand->id;
            $this->name = $brand->name;
            $this->description = $brand->description;
            $this->imageUpdate = $brand->thumbnail;
            $this->status = $brand->is_active;
            $this->showUpdateModal = true;
        }

    }

    public function closeCreateModal()
    {
        $this->clearForm();
        $this->showCreateModal = false;
    }

    public function clearImagePreview()
    {
        $this->image = '';
    }

    public function closeModal()
    {
        $this->clearForm();
        $this->showCreateModal = false;
        $this->showUpdateModal = false;
        $this->showDeleteModal = false;
    }

    public function update()
    {
        if (!checkPermission('brand-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate([
            'image' => 'image|nullable',
            'name' => 'required|string|max:255',
        ]);

        try {

            $image = $this->imageUpdate;

            if ($this->image) {
                $image = '/storage/'. $this->image->store('brands', 'public');
            }


            Brand::query()->where('id', $this->selectId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'thumbnail' => $image,
                'is_active' => $this->status
            ]);

            $this->closeModal();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Cập nhật thành công!']);

        } catch (\Exception $e) {
            Log::error('Error update brand', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }

    public function store()
    {

        $this->validate([
            'image' => 'image|nullable',
            'name' => 'required|string'
        ]);

        try {
            $image = '';

            if ($this->image) {
                $image = '/storage/'. $this->image->store('brands', 'public');
            }

            Brand::create([
                'name' => $this->name,
                'description' => $this->description,
                'thumbnail' => $image
            ]);

            $this->closeCreateModal();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Tạo mới thành công!']);

        } catch (\Exception $e) {
            Log::error('Error create brand', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }

    }

    public function clearForm()
    {
        $this->selectId = null;
        $this->name = '';
        $this->description = '';
        $this->image = '';
        $this->status = 1;
    }

    public function destroy()
    {
        if (!checkPermission('brand-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        try {
            Brand::destroy($this->selectId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete brand', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }

    public function openDeleteModal($id)
    {
        $this->selectId = $id;
        $this->showDeleteModal = true;
    }


}
