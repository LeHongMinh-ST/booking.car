<?php

namespace App\Http\Livewire\Client;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product as ProductModel;
use Livewire\Component;

class ListProductByCategory extends Component
{

    public $category_id;
    public $sort_by;
    public $color;
    public $type_car;
    public $search;
    public $number;
    public $categoryName;

    protected $queryString = [
        'sort_by',
        'category_id',
        'number',
        'color',
        'type_car',
        'search'
    ];

    public function render()
    {
        $products = ProductModel::query()
            ->filterColor($this->color)
            ->filterCategory($this->category_id ? [$this->category_id] : [])
            ->filterOrderBy($this->sort_by)
            ->filterTypeCar($this->type_car)
            ->filterNumber($this->number)
            ->where('status',\App\Models\Product::STATUS['normal'])
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
        $this->category_id = $category->id;
        $this->categoryName = $category->name;
    }

}
