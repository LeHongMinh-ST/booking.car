<?php

namespace App\Http\Livewire\Admin\Statistic;

use App\Models\ProductOrder;
use App\Models\Product as ProductModel;
use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        $topOrder = $this->getListTopProductOrder();
        $topRevenue = $this->getListTopProductRevenue();
        $countProduct = ProductModel::count();
        $countProductNormal = ProductModel::where('status', ProductModel::STATUS['normal'])->count();
        $countProductHired = ProductModel::where('status', ProductModel::STATUS['hired'])->count();
        return view('livewire.admin.statistic.product', [
            'topOrder' => $topOrder,
            'topRevenue' => $topRevenue,
            'countProduct' => $countProduct,
            'countProductNormal' => $countProductNormal,
            'countProductHired' => $countProductHired,
        ])->extends('admin.layouts.master')->section('content');
    }

    private function getListTopProductOrder()
    {
        return ProductOrder::query()
            ->select('product_id')
            ->selectRaw('count(*) as total')
            ->orderByDesc('total')
            ->groupBy('product_id')
            ->with(['product'])
            ->limit(10)->get();
    }

    private function getListTopProductRevenue()
    {
        $products = ProductModel::query()->whereHas('productOrders', function ($query) {
            $query->whereHas('contract');
        })->with(['productOrders'])->get();

        $products = $products->map(function ($product) {
            $revenue = 0;
            $productOder = $product->productOrders;
            foreach ($productOder as $oder) {
                if ($oder->contract) {
                    $revenue += $oder->contract->price_total;
                }
            }

            $product->revenue = $revenue;
            return $product;
        });

        return $products->sortByDesc(function ($product) {
            return $product->revenue;
        })->take(10);
    }
}
