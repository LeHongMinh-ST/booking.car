<?php

namespace App\Http\Livewire\Admin\Statistic;

use App\Models\StatisticRevenueYearly;
use Livewire\Component;

class Revenue extends Component
{
    public $byChart = 'month';

    public function render()
    {
        $revenuesYear = StatisticRevenueYearly::all();
        $total = 0;
        $over = 0;
        foreach ($revenuesYear as $rev) {
            $total += $rev->revenue;
            $over += $rev->over;
        }

        $revenue = [
            'total' => $total,
            'contract' => $total - $over,
            'over' =>  $over
        ];

        return view('livewire.admin.statistic.revenue', [
            'revenue' => $revenue
        ])->extends('admin.layouts.master')->section('content');
    }
}
