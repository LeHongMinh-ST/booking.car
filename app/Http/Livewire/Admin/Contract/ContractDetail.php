<?php

namespace App\Http\Livewire\Admin\Contract;

use App\Models\Contract;
use Livewire\Component;

class ContractDetail extends Component
{
    public $contract;

    public function render()
    {
        return view('livewire.admin.contract.contract-detail')
            ->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $this->contract = Contract::query()->with(['productOrder', 'customerOrder'])->find($id);
    }
}
