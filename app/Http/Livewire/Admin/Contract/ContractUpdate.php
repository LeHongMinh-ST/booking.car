<?php

namespace App\Http\Livewire\Admin\Contract;

use App\Models\Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContractUpdate extends Component
{
    public $contract;
    public $content;

    protected $listeners = [
        'changeContent' => 'updateContract',
    ];

    public function render()
    {
        return view('livewire.admin.contract.contract-update')
            ->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $this->contract = Contract::query()->with(['productOrder', 'customerOrder'])->find($id);
        $this->content = $this->contract->content;
    }

    public function updateContract($value)
    {
        $this->content = $value;
    }

    protected $validationAttributes = [
        'content' => 'Nội dung hợp đồng',
    ];

    protected function rules()
    {
        return [
            'content' => 'required|string',
        ];
    }


    public function update()
    {
        if (!checkPermission('contract-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        if ($this->content == "") {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Nội dung hợp đồng không được bỏ trống!', 'title' => 'Lỗi']);
            return false;
        }

        DB::beginTransaction();

        try {

            $contract = Contract::query()->find($this->contract->id);
            $contract->content = $this->content;
            $contract->save();
            session()->flash('success', 'Cập nhật thành công');

            DB::commit();
            return redirect()->route('admin.contract.detail', $this->contract->id);
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error update contract', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
}
