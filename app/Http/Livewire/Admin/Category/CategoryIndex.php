<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showCreateModal = false;
    public $showUpdateModal = false;
    public $showDeleteModal = false;
    public $name = '';
    public $parentId = 0;
    public $description = '';
    public $status = 1;
    public $perPage = 10;
    public $search = '';
    public $selectId;

    public function render()
    {
        $categories = Category::query()
            ->name($this->search)
            ->with('parent')
            ->paginate($this->perPage);

        $parent = Category::query()
            ->where('parent_id', 0)
            ->with('children')
            ->get();

        return view('livewire.admin.category.category-index',[
            'categories' => $categories,
            'parent' => $parent,
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|string'
        ]);
    }

    public function showCreateModal()
    {
        $this->clearForm();
        $this->showCreateModal = true;
    }

    public function closeModal()
    {
        $this->clearForm();
        $this->showCreateModal = false;
        $this->showUpdateModal = false;
        $this->showDeleteModal = false;
    }

    public function showUpdateModal($id)
    {
        $this->clearForm();

        $category = Category::find($id);

        if ($category) {
            $this->selectId = $category->id;
            $this->name = $category->name;
            $this->description = $category->description;
            $this->parentId = $category->parent_id;
            $this->status = $category->is_active;
            $this->showUpdateModal = true;
        }

    }

    public function clearForm()
    {
        $this->selectId = null;
        $this->name = '';
        $this->description = '';
        $this->parentId = 0;
        $this->status = '';
    }

    public function store()
    {

        if (!checkPermission('category-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate([
            'name' => 'required|string'
        ]);

        try {
            $parent = null;

            if ($this->parentId > 0) {
                $parent = Category::find($this->parentId);
            }

            Category::create([
                'name' => $this->name,
                'description' => $this->description,
                'parent_id' => $this->parentId,
                'depth' => $parent ? $parent->depth + 1 : 0,
                'slug' => Str::slug($this->name . Carbon::now()->toDateTimeString())
            ]);

            $this->closeModal();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Tạo mới thành công!']);

        } catch (\Exception $e) {
            Log::error('Error create category', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }

    }

    public function update()
    {
        if (!checkPermission('category-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate([
            'name' => 'required|string'
        ]);

        try {
            $parent = null;

            if ($this->parentId > 0) {
                $parent = Category::find($this->parentId);
            }

            Category::query()->where('id', $this->selectId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'parent_id' => $this->parentId,
                'is_active' => $this->status,
                'depth' => $parent ? $parent->depth + 1 : 0,
                'slug' => Str::slug($this->name . Carbon::now()->toDateTimeString())
            ]);

            $this->closeModal();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Cập nhật thành công!']);

        } catch (\Exception $e) {
            Log::error('Error update category', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }

    }

    public function destroy()
    {
        if (!checkPermission('category-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        try {
            Category::destroy($this->selectId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete category', [
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
