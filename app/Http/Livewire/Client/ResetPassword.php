<?php

namespace App\Http\Livewire\Client;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password = '';
    public $password_confirmation = '';
    public function render()
    {
        return view('livewire.client.reset-password');
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

    public function mount($token)
    {
        $this->token = $token;

        $passwordReset = DB::table('password_resets')->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subMinutes(30)->toDateTimeString())
            ->first();

        if (!$passwordReset) {
            abort(404);
        }

        $this->email = $passwordReset->email;
    }

    public function resetPassword()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            $user = User::query()->where('email', $this->email)->first();

            $user->update([
                'password' => Hash::make($this->password)
            ]);


            session()->flash('success', [
                'message' => 'Đặt lại mật khẩu thành công',
                'title' => 'Thành công'
            ]);

            DB::commit();

            $this->redirect(route('login.form'));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error reset password customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
}
