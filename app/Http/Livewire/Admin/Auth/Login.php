<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function render()
    {
        return view('livewire.admin.auth.login');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [], [
            'password' => 'mật khẩu'
        ]);
        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->addError('email', 'Email hoặc Mật khẩu không chính xác');
        }
        request()->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

}
