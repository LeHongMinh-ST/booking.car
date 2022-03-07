<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        if(auth('admin')->check()){
            return $next($request);
        }
        return redirect()->route('admin.login');
    }
}
