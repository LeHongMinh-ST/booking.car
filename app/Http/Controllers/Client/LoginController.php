<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (auth('web')->check()) {
            return redirect()->route('home');
        }

        return view('client.page.auth.login');
    }

    public function showRegisterForm()
    {
        return view('client.page.auth.register');
    }

    public function getSocial($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function checkSocial($social)
    {
        $info = Socialite::driver($social)->user();
        dd($info);
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect()->route('home');
    }

}
