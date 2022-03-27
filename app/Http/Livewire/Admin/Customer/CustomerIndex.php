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
    public $password = '';
    public $password_confirmation = '';
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

    protected $rules = [
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required|string|min:6',
    ];

    protected $validationAttributes = [
      'password' => 'Mật khẩu',
      'password_confirmation' => 'Xác nhận mật khẩu'
    ];

    public function resetFilter()
    {
        $this->checkUserId = '';
        $this->status = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    public function resetForm()
    {
        $this->password = '';
        $this->password_confirmation = '';
        $this->selectId = null;
    }

    public function resetPassword()
    {
        if (!checkPermission('customer-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
            return false;
        }

        $this->validate();

        try {

            $customer = Customer::query()->find($this->selectId);

            $customer->user()->update([
               'password' => Hash::make($this->password)
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Cập nhật thành công!']);

            $this->closeModal();

        } catch (\Exception $e) {
            Log::error('Error reset password customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }

    public function openDeleteModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function openResetModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openResetModal');
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatchBrowserEvent('closeModal');
    }
}
