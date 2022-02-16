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

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ], [], [
            'password' => 'mật khẩu'
        ]);

        if (auth()->guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('admin/dashboard');
        }
        $this->addError('email', 'Email hoặc Mật khẩu không chính xác');
    }

}
