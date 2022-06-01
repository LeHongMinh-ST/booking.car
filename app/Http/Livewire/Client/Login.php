<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function render()
    {
        return view('livewire.client.login')->layout('livewire.client.login');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ], [], [
            'password' => 'mật khẩu'
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        }

        $this->addError('email', 'Email hoặc Mật khẩu không chính xác');
    }
}
