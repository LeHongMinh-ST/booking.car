<?php

namespace App\Http\Controllers\Admin\Chart;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\StatisticRevenueDaily;
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
                    count($contractSuccess),
                    count($contractCancel),
                    count($contractProcess),
                    count($contractDeposited)
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
            $startTime = $data['start'];
        }
        if (isset($data['end'])) {
            $endTime = $data['end'];
        }

        switch ($calendar) {
            case 'day':
                $startTime = Carbon::make($startTime)->timestamp;
                $endTime= Carbon::make($endTime)->timestamp;
                break;
            case 'quarter':
                $startTime = Carbon::make($startTime)->firstOfQuarter()->timestamp;
                $endTime= Carbon::make($endTime)->lastOfQuarter()->timestamp;
                break;
            case 'year':
                $startTime = Carbon::make($startTime)->firstOfYear()->timestamp;
                $endTime= Carbon::make($endTime)->lastOfYear()->timestamp;
                break;
            case 'month':
                $startTime = $startTime->timestamp;
                $endTime= $endTime->timestamp;
                break;
        }

        $revenue['data'] = StatisticRevenueDaily::query()
            ->where('date', '>=', $startTime)
            ->where('date', '<=', $endTime)
            ->orderByDesc('date')
            ->pluck('revenue')
            ->toArray();
        $revenue['data'] = array_reverse($revenue['data']);

    }
}
