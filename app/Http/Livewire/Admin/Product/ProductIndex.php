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

    public $perPage = 10;
    public $deleteId;
    public $status = "";
    public $search = '';
    public $brandId = '';
    public $categoryIds = [];

    protected $listeners = [
        'changeFilterCategories' => 'updateCategoryIds',
        'changeFilterBrand' => 'updateBrandId',
        'changeFilterStatus' => 'updateStatus',
    ];

    public function render()
    {
        $products = Product::query()
            ->name($this->search)
            ->filterBrand($this->brandId)
            ->filterCategory($this->categoryIds)
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

    public function updateCategoryIds($value)
    {
        $this->categoryIds = $value;
    }

    public function updateBrandId($value)
    {
        $this->brandId = $value;
    }

    public function updateStatus($value)
    {
        $this->status = $value;
    }

    public function resetFilter()
    {
        $this->brandId = '';
        $this->status = '';
        $this->categoryIds = '';

        $this->dispatchBrowserEvent('clearFilter');
    }

    public function destroy()
    {
        if (!checkPermission('product-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'B???n kh??ng c?? quy???n th???c hi???n ch???c n??ng n??y!!', 'title' => '403']);
            return false;
        }

        try {
            Product::query()->where('id', $this->deleteId)->first()->categories()->detach();

            Product::destroy($this->deleteId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'X??a th??nh c??ng!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete product', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'X??a th???t b???i!']);
        }
    }


    public function openDeleteModal($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function closeModal()
    {
        $this->deleteId = null;
        $this->dispatchBrowserEvent('closeModal');
    }
}
