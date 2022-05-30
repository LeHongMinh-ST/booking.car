<?php

namespace App\Http\Controllers\Admin\Chart;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\StatisticRevenueDaily;
use App\Models\StatisticRevenueMonthly;
use App\Models\StatisticRevenueQuarterly;
use App\Models\StatisticRevenueYearly;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
    public function getDataChartRevenueTwoWeek(): \Illuminate\Http\JsonResponse
    {
        $revenue14Day['data'] = StatisticRevenueDaily::query()
            ->orderByDesc('date')
            ->limit(14)
            ->pluck('revenue')
            ->toArray();
        $revenue14Day['data'] = array_reverse($revenue14Day['data']);

        $dates = StatisticRevenueDaily::query()
            ->orderByDesc('date')
            ->limit(14)
            ->pluck('date')
            ->toArray();

        foreach ($dates as $date) {
            $revenue14Day['label'][] = Carbon::createFromTimestamp($date)->format('d/m/Y');
        }

        $revenue14Day['label'] = array_reverse($revenue14Day['label']);

        return response()->json([
            'success' => 1,
            'data' => [
                'revenue' => $revenue14Day,
            ],
            'message' => 'success'
        ]);
    }

    public function getDataChartContract()
    {
        $contractSuccess = Contract::query()->where('status', Contract::STATUS['complete'])->get();
        $contractCancel = Contract::query()->where('status', Contract::STATUS['cancel'])->get();
        $contractProcess = Contract::query()->where('status', Contract::STATUS['processing'])->get();
        $contractDeposited = Contract::query()->where('status', Contract::STATUS['deposited'])->get();

        return response()->json([
            'success' => 1,
            'data' => [
                'contract' => [
                    count($contractDeposited),
                    count($contractSuccess),
                    count($contractCancel),
                    count($contractProcess),
                ]
            ],
            'message' => 'success'
        ]);
    }

    public function getDataChartPieRevenue()
    {
        $revenuesYear = StatisticRevenueYearly::all();
        $total = 0;
        $over = 0;
        foreach ($revenuesYear as $rev) {
            $total += $rev->revenue;
            $over += $rev->over;
        }

        $revenue = [
            $total - $over,
            $over
        ];

        return response()->json([
            'success' => 1,
            'data' => [
                'revenue' => $revenue
            ],
            'message' => 'success'
        ]);
    }

    public function getDataChartTotalRevenue(Request $request)
    {
        $data = $request->all();

        $calendar = 'month';
        $startTime = Carbon::now()->subMonths(6)->firstOfMonth();
        $endTime = Carbon::now()->lastOfMonth();

        if (isset($data['byChart'])) {
            $calendar = $data['byChart'];
        }

        if (isset($data['start'])) {
            $startTime = Carbon::make($data['start']);
        }
        if (isset($data['end'])) {
            $endTime = Carbon::make($data['end']);
        }

        switch ($calendar) {
            case 'day':
                $startTime = $startTime->timestamp;
                $endTime = $endTime->timestamp;
                $statistic = StatisticRevenueDaily::query()
                    ->where('date', '>=', $startTime)
                    ->where('date', '<=', $endTime)
                    ->orderByDesc('date');
                break;
            case 'quarter':
                $startTime = $startTime->firstOfQuarter()->timestamp;
                $endTime = $endTime->lastOfQuarter()->timestamp;
                $statistic = StatisticRevenueQuarterly::query()
                    ->where('date', '>=', $startTime)
                    ->where('date', '<=', $endTime)
                    ->orderByDesc('date');

                break;
            case 'year':
                $startTime = $startTime->firstOfYear()->timestamp;
                $endTime = $endTime->lastOfYear()->timestamp;
                $statistic = StatisticRevenueYearly::query()
                    ->where('date', '>=', $startTime)
                    ->where('date', '<=', $endTime)
                    ->orderByDesc('date');

                break;
            case 'month':
            default:
                $startTime = $startTime->timestamp;
                $endTime = $endTime->timestamp;
                $statistic = StatisticRevenueMonthly::query()
                    ->where('date', '>=', $startTime)
                    ->where('date', '<=', $endTime)
                    ->orderByDesc('date');
                break;
        }

        $revenue['data'] = $statistic->pluck('revenue')->toArray();
        $revenue['label'] = [];
        $labels = $statistic->pluck('date')->toArray();

        foreach ($labels as $label) {
            $revenue['label'][] =  Carbon::createFromTimestamp($label)->format('d/m/Y');
        }

        $revenue['data'] = array_reverse($revenue['data']);
        $revenue['label'] = array_reverse($revenue['label']);

        return response()->json([
            'success' => 1,
            'data' => [
                'revenue' => $revenue,
            ],
            'message' => 'success'
        ]);
    }
}
