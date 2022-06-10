<?php

namespace App\Http\Livewire\Client\Customer;

use App\Models\Contract;
use Livewire\Component;

class ContractDetail extends Component
{

    public $contract;

    public function render()
    {
        return view('livewire.client.customer.contract-detail')
            ->extends('client.customer.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $this->contract = Contract::query()->with(['productOrder', 'customerOrder'])->find($id);
    }

    public function handlePrint()
    {
        $this->dispatchBrowserEvent('downloadPdf');
    }

}
