<?php

namespace App\Http\Livewire\Admin\Contract;

use App\Models\Contract;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ContractIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status = 1;
    public $perPage = 10;
    public $search = '';
    public $selectId;

    public function render()
    {
        $contracts = Contract::query()
            ->status($this->status)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.admin.contract.contract-index', [
            'contracts' => $contracts
        ])
            ->extends('admin.layouts.master')->section('content');
    }

    public function openDeleteModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }


    public function destroy()
    {
        if (!checkPermission('contract-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }
        DB::beginTransaction();
        try {

            Contract::destroy($this->selectId);

            DB::commit();
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error delete contract', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }
}
