<?php

namespace App\Http\Livewire\Client\Customer;

use App\Models\Contract;
use Livewire\Component;
use Livewire\WithPagination;

class ContractIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status;
    public $perPage = 10;
    public $search = '';
    public $selectId;

    public function render()
    {
        $user = auth()->user();

        $customer = $user->customer;
        $customerIds = $customer->customerOrders->pluck('id')->toArray();
        $contracts = Contract::query()
            ->whereIn('customer_id', $customerIds)
            ->status($this->status)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.client.customer.contract-index', [
            'contracts' => $contracts
        ])->extends('client.customer.layouts.master')->section('content');
    }
}
