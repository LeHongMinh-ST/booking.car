<?php

namespace Database\Seeders;

use App\Models\StatisticRevenueDaily;
use App\Models\StatisticRevenueMonthly;
use App\Models\StatisticRevenueQuarterly;
use App\Models\StatisticRevenueYearly;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statistic_revenue_dailies')->truncate();
        DB::table('statistic_revenue_monthlies')->truncate();
        DB::table('statistic_revenue_quarterlies')->truncate();
        DB::table('statistic_revenue_yearlies')->truncate();

        $timeNow = Carbon::now();

        $time = Carbon::now()->firstOfMonth();

        $sumRevenue = 0;
        $over = 0;

        while ($time->timestamp < $timeNow->timestamp) {
            $statisticDay = new StatisticRevenueDaily();
            $statisticDay->revenue = random_int(4,9) * 10000000;
            $statisticDay->over = random_int(0,9) * 10000;
            $statisticDay->date = $time->timestamp;
            $statisticDay->save();
            $sumRevenue += $statisticDay->revenue;
            $over += $statisticDay->over;
            $time = $time->addDay();
        }

        $statisticMounth = new StatisticRevenueMonthly();
        $statisticMounth->revenue = $sumRevenue;
        $statisticMounth->over = $over;
        $statisticMounth->date = Carbon::now()->firstOfMonth()->timestamp;
        $statisticMounth->save();

        $statisticQuarterly = new StatisticRevenueQuarterly();
        $statisticQuarterly->revenue = $sumRevenue;
        $statisticQuarterly->over = $over;
        $statisticQuarterly->date = Carbon::now()->firstOfQuarter()->timestamp;
        $statisticMounth->save();

        $statisticYear = new StatisticRevenueYearly();
        $statisticYear->revenue = $sumRevenue;
        $statisticYear->over = $over;
        $statisticYear->date = Carbon::now()->firstOfYear()->timestamp;
        $statisticYear->save();
    }
}
