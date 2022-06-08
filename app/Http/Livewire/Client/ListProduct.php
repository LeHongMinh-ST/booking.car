<?php

namespace App\Http\Livewire\Client;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product as ProductModel;
use Livewire\Component;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public $sort_by;
    public $color;

    protected $queryString = [
        'sort_by',
        'category_id',
        'color',
    ];

    public function render()
    {
        $products = ProductModel::query()
            ->filterColor($this->color)
            ->filterCategory($this->category_id ? [$this->category_id] : [])
            ->filterOrderBy($this->sort_by)
            ->where('status',\App\Models\Product::STATUS['normal'])
            ->paginate(12);
        $categories = Category::query()->where('is_active', Category::IS_ACTIVE['active'])->get();

        return view('livewire.client.list-product', [
            'products' => $products,
            'categories' => $categories,
        ])->extends('client.layouts.master')->section('content');
    }
}
