<?php

namespace App\Http\Livewire\Admin\Contract;

use App\Models\Contract;
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
}
