<?php

namespace App\Http\Livewire\Admin\Contract;

use App\Models\Contract;
use Livewire\Component;
use PDF;

class ContractDetail extends Component
{
    public $contract;
    public $noteCancel;

    public function render()
    {
        return view('livewire.admin.contract.contract-detail')
            ->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $this->contract = Contract::query()->with(['productOrder', 'customerOrder'])->find($id);
    }

    public function openModalCheckComplete()
    {
        $this->dispatchBrowserEvent('openModalCheckComplete');
    }

    public function openModalCheckCancel()
    {
        $this->dispatchBrowserEvent('openModalCancel');
    }

    public function handleComplete()
    {

    }

    public function handlePrint()
    {
        $this->dispatchBrowserEvent('downloadPdf');
    }
}
