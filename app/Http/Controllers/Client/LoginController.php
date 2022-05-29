<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('client.page.auth.login');
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
}
