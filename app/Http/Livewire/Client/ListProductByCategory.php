<?php

namespace App\Http\Livewire\Client;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product as ProductModel;
use Livewire\Component;

class ListProductByCategory extends Component
{

    public $categoryId = "";
    public $brandId = "";
    public $order = "";
    public $filter = [
        'categoryId' => "",
        'brandId' => "",
        'order' => ""
    ];

    public function render()
    {
        $products = ProductModel::query()
            ->filterBrand($this->brandId)
            ->filterCategory($this->categoryId ? [$this->categoryId] : [])
            ->filterOrderBy($this->order)
            ->paginate(12);
        $categories = Category::query()->where('is_active', Category::IS_ACTIVE['active'])->get();
        $brands = Brand::query()->where('is_active', Brand::IS_ACTIVE['active'])->get();

        return view('livewire.client.list-product-by-category', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ])->extends('client.layouts.master')->section('content');
    }
    public function mount($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();

        $this->filter['categoryId'] = $this->brandId = $category->id;
    }

    public function handleFilter()
    {
        $this->categoryId = $this->filter['categoryId'];
        $this->brandId = $this->filter['brandId'];
        $this->order = $this->filter['order'];
    }
}
