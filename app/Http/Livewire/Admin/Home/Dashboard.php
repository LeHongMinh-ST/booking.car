<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Post;
use App\Models\StatisticRevenueDaily;
use App\Models\StatisticRevenueYearly;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $productCount = Product::count();
        $customerCount = Customer::count();
        $postCount = Post::count();
        $contractCount = Contract::count();
        $revenuesYear = StatisticRevenueYearly::all();



        $revenue = 0;
        foreach ($revenuesYear as $rev) {
            $revenue += $rev->revenue;
        }

        $revenue14Day['data'] = StatisticRevenueDaily::query()
            ->orderByDesc('date')
            ->limit(14)
            ->pluck('revenue')
            ->toArray();

        return view('livewire.admin.home.dashboard', [
            'productCount' => $productCount,
            'postCount' => $postCount,
            'contractCount' => $contractCount,
            'customerCount' => $customerCount,
            'revenue' => $revenue,
            'revenue14Day' => $revenue14Day,
        ])
            ->extends('admin.layouts.master')->section('content');
    }
}
