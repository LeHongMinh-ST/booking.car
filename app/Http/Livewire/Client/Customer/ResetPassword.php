<?php

namespace App\Http\Livewire\Client\Customer;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ResetPassword extends Component
{
    public $passwordOld = '';
    public $password = '';
    public $password_confirmation = '';

    public function render()
    {
        return view('livewire.client.customer.reset-password');
    }

    protected $rules = [
        'passwordOld' => 'required|string',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required|string|min:6',
    ];

    protected $validationAttributes = [
        'passwordOld' => 'Mật khẩu cũ',
        'password' => 'Mật khẩu mới',
        'password_confirmation' => 'Xác nhận mật khẩu'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetPassword()
    {
        $this->validate();

        try {

            $admin = auth('web')->user();
            if (!Hash::check($this->passwordOld, $admin->password)) {
                $this->addError('passwordOld', 'Mật khẩu cũ không chính xác!');
                return false;
            }

            $admin->update([
                'password' => Hash::make($this->password)
            ]);

            $this->resetForm();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Cập nhật thành công!']);

            $this->emit('closeModelReset');

        } catch (\Exception $e) {
            Log::error('Error reset password account', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
    public function resetForm()
    {
        $this->passwordOld = "";
        $this->password = "";
        $this->password_confirmation = "";
    }

}
