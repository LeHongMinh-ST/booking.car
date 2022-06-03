<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProfileResetPassword extends Component
{
    public $passwordOld = '';
    public $password = '';
    public $password_confirmation = '';

    public function render()
    {
        return view('livewire.admin.profile.profile-reset-password');
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

            $admin = auth('admin')->user();

            if ($admin->password !=  Hash::make($this->passwordOld)) {
                $this->addError('passwordOld', 'Mật khẩu cũ không chính xác!');
                return false;
            }

            $admin->update([
                'password' => Hash::make($this->password)
            ]);

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
}
