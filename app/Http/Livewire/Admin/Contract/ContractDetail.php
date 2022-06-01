<?php

namespace App\Http\Livewire\Admin\Contract;

use App\Models\Contract;
use App\Models\StatisticRevenueDaily;
use App\Models\StatisticRevenueMonthly;
use App\Models\StatisticRevenueQuarterly;
use App\Models\StatisticRevenueYearly;
use Carbon\Carbon;
use Livewire\Component;
use PDF;

class ContractDetail extends Component
{
    public $contract;
    public $noteCancel;
    public $numberOvertime;
    public $overtimePrice;

    public function render()
    {
        return view('livewire.admin.contract.contract-detail')
            ->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $this->contract = Contract::query()->with(['productOrder', 'customerOrder'])->find($id);
    }

    public function updatedNumberOvertime($value)
    {
        if (is_numeric($value)) {
            $product = $this->contract->productOrder;
            $this->overtimePrice = $product->overtime_price * $value;
        }

    }

    public function openModalCheckComplete()
    {
        $this->dispatchBrowserEvent('openModalCheckComplete');
    }

    public function openModalCheckCancel()
    {
        $this->dispatchBrowserEvent('openModalCancel');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }

    public function handleComplete()
    {
        $this->contract->status = Contract::STATUS['complete'];
        $this->contract->overtime = $this->numberOvertime;
        $this->contract->overtime_price = $this->overtimePrice;
        $this->contract->save();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'succes', 'message' => 'Cập nhật thành công']);
        $this->closeModal();
    }

    public function handlePrint()
    {
        $this->dispatchBrowserEvent('downloadPdf');
    }

    public function handleProcessing()
    {
        $this->contract->status = Contract::STATUS['processing'];
        $this->contract->save();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'succes', 'message' => 'Cập nhật thành công']);
        $this->closeModal();
    }

    private function updateStatisticRevenue($status, $contract)
    {
        $revenue = (int)$contract->price_total + (int)$contract->overtime_price;
        $over = (int)$contract->overtime_price;

         $revenueDaily = StatisticRevenueDaily::query()->where('date', Carbon::today()->timestamp)->first();

        if (!$revenueDaily) {
            $revenueDaily = new StatisticRevenueDaily();
            $revenueDaily->revenue = 0;
            $revenueDaily->over = 0;
            $revenueDaily->date = Carbon::today()->timestamp;
        }

        $revenueMonthly = StatisticRevenueMonthly::query()->where('date', Carbon::today()->firstOfMonth()->timestamp)->first();
        if (!$revenueMonthly) {
            $revenueMonthly = new StatisticRevenueMonthly();
            $revenueMonthly->revenue = 0;
            $revenueMonthly->over = 0;
            $revenueMonthly->date =Carbon::today()->firstOfMonth()->timestamp;

        }

        $revenueQuarter = StatisticRevenueQuarterly::query()->where('date', Carbon::today()->firstOfQuarter()->timestamp)->first();
        if (!$revenueQuarter) {
            $revenueQuarter = new StatisticRevenueQuarterly();
            $revenueQuarter->revenue = 0;
            $revenueQuarter->over = 0;
            $revenueQuarter->date = Carbon::today()->firstOfQuarter()->timestamp;

        }

        $revenueYearly = StatisticRevenueYearly::query()->where('date', Carbon::today()->firstOfYear()->timestamp)->first();
        if (!$revenueYearly) {
            $revenueYearly = new StatisticRevenueYearly();
            $revenueYearly->revenue = 0;
            $revenueYearly->over = 0;
            $revenueYearly->date = Carbon::today()->firstOfYear()->timestamp;
        }

        if ($status == Contract::STATUS['complete']) {
            $revenueDaily->revenue += $revenue;
            $revenueDaily->over += $over;
            $revenueMonthly->revenue += $revenue;
            $revenueMonthly->over += $over;
            $revenueQuarter->revenue += $revenue;
            $revenueQuarter->over += $over;
            $revenueYearly->revenue += $revenue;
            $revenueYearly->over += $over;
        }
        $revenueDaily->save();
        $revenueMonthly->save();
        $revenueQuarter->save();
        $revenueYearly->save();

    }
}
