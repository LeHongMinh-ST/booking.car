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
    public $type_car;
    public $search;
    public $number;

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
            ->name($this->search)
            ->filterColor($this->color)
            ->filterCategory($this->category_id ? [$this->category_id] : [])
            ->filterOrderBy($this->sort_by)
            ->filterTypeCar($this->type_car)
            ->filterNumber($this->number)
            ->where('status',\App\Models\Product::STATUS['normal'])
            ->paginate(12);
        $categories = Category::query()->where('is_active', Category::IS_ACTIVE['active'])->get();

        return view('livewire.client.list-product', [
            'products' => $products,
            'categories' => $categories,
        ])->extends('client.layouts.master')->section('content');
    }
}
