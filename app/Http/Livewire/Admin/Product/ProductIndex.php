<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $showDeleteModal = false;
    public $deleteId;
    public $status = "";
    public $search = '';
    public $brandId = '';

    public function render()
    {
        $products = Product::query()
            ->name($this->search)
            ->filterBrand($this->brandId)
            ->status($this->status)
            ->with(['categories', 'brand'])->paginate($this->perPage);

        $brands = Brand::query()->where('is_active', Brand::IS_ACTIVE['active'])->get();
        return view('livewire.admin.product.product-index', [
            'products' => $products,
            'brands' => $brands
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function resetFilter()
    {
        $this->brandId = '';
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
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete product', [
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

    public function closeModal()
    {
        $this->deleteId = null;
        $this->showDeleteModal = false;
    }
}
