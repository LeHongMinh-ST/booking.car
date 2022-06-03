<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ResetPassword extends Component
{
    public $password = '';
    public $password_confirmation = '';
    public $selectId;

    public function render()
    {
        return view('livewire.admin.customer.reset-password');
    }

    protected $listeners = [
        'openResetPassword' => 'openResetPassword',
    ];

    public function openResetPassword($id)
    {
        $this->selectId = $id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    protected $rules = [
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required|string|min:6',
    ];

    protected $validationAttributes = [
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Xác nhận mật khẩu'
    ];



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

            $this->emit('closeModelReset');

        } catch (\Exception $e) {
            Log::error('Error reset password customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
}
