<?php

namespace App\Http\Livewire\Client;

use App\Jobs\Mail\SendMailResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email = '';

    public function render()
    {
        return view('livewire.client.forgot-password');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email|string',
        ]);
    }


    public function sendLinkForgotPassword()
    {
        $this->validate([
            'email' => 'required|email|string',
        ]);

        DB::beginTransaction();
        try {
            $token = Str::random(64);



            DB::table('password_resets')->insert([
                'email' => $this->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $user = User::query()->where('email', $this->email)->first();

            if (!$user) {
                $this->addError('email', 'Tài khoảng không tồn tại');
                return false;
            }

            $actionLink = route('reset-password', $token);

            SendMailResetPassword::dispatch($this->email, $actionLink, $user->name)->onQueue('default');

            $this->email = "";
            DB::commit();
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'title' => 'Gửi yêu cầu thành công', 'message' => 'Vui lòng kiểm tra email để thực hiện',]);

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error send forgot password', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Gửi thất bại', 'title' => 'Lỗi']);
        }
    }
}
