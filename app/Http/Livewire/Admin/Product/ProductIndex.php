<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = false;
    public $perPage = 10;
    public $deleteId;
    public $status = "";
    public $search = '';
    public $brandId = '';
    public $categoryId= '';
    protected $listeners = ['handleDelete' => 'destroy'];

    public function render()
    {
        $products = Product::query()
            ->name($this->search)
            ->filterBrand($this->brandId)
            ->filterCategories($this->categoryId)
            ->status($this->status)
            ->with(['categories', 'brand'])->paginate($this->perPage);

        $brands = Brand::query()->where('is_active', Brand::IS_ACTIVE['active'])->get();
        $categories = Category::query()->where('is_active', Category::IS_ACTIVE['active'])->get();
        return view('livewire.admin.product.product-index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function toggleFilter()
    {
        $this->filter = !$this->filter;
    }

    public function resetFilter()
    {
        $this->brandId = '';
        $this->categoryId = '';
        $this->status = '';
    }

    public function destroy()
    {
        if (!checkPermission('product-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
        }

        try {
            Product::query()->where('id', $this->deleteId)->first()->categories()->detach();

            Product::destroy($this->deleteId);
            $this->dispatchBrowserEvent('alert',
                ['color' => 'green', 'message' => 'Xóa thành công']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete product', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['color' => 'red', 'message' => 'Xóa thất bại']);
        }
    }


    public function openDeleteModal($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('delete',
            ['emit' => 'handleDelete', 'value' => $id]);
    }

    public function closeModal()
    {
        $this->deleteId = null;
        $this->showDeleteModal = false;
    }
}
