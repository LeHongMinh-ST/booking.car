<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $name;
    public $description;
    public $color;
    public $price;
    public $year;
    public $licensePlates;
    public $km;
    public $brand;
    public $thumbnail;
    public $otherParameters = [];
    public $status;
    public $productId;
    public $showDeleteModal = false;

    public function render()
    {
        return view('livewire.admin.product.product-detail', [

        ])
            ->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $product = Product::query()->with(['categories', 'brand'])->find($id);
        if ($product) {
            $this->name = $product->name;
            $this->color = $product->color;
            $this->year = $product->year;
            $this->licensePlates = $product->license_plates;
            $this->price = $product->price;
            $this->km = $product->km;
            $this->brand = $product->brand ;
            $this->thumbnail = $product->thumbnail;
            $this->otherParameters = $product->other_parameters;
            $this->status = $product->status;
            $this->productId  = $product->id;
        }
    }

    public function destroy()
    {
        if (!checkPermission('product-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
        }

        try {
            Product::query()->where('id', $this->productId)->first()->categories()->detach();

            Product::destroy($this->productId);

            session()->flash('success', 'Xóa thành công');

            return redirect()->route('admin.product');
        } catch (\Exception $e) {
            Log::error('Error delete product in detail', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }


    public function openDeleteModal()
    {
        $this->showDeleteModal = true;
    }

    public function closeModal()
    {
        $this->showDeleteModal = false;
    }
}
