<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $selectId;
    public $status = "";
    public $search = '';
    public $checkUserId = '';

    public function render()
    {
        $customers = Customer::query()
            ->search($this->search)
            ->status($this->status)
            ->userId($this->checkUserId)
            ->with('user')
            ->paginate($this->perPage);

        return view('livewire.admin.customer.customer-index', [
            'customers' => $customers
        ])->extends('admin.layouts.master')->section('content');
    }

    protected $listeners = [
        'closeModelReset' => 'closeModal',
    ];


    public function resetFilter()
    {
        $this->checkUserId = '';
        $this->status = '';
    }


    public function destroy()
    {
        if (!checkPermission('customer-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
            return false;
        }

        try {

            Customer::destroy($this->selectId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }


    public function openDeleteModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function openResetModal($id)
    {
        $this->emit('openResetPassword', $id);
        $this->dispatchBrowserEvent('openResetModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
}
