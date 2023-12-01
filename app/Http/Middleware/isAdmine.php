<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmine
{

    public function handle(Request $request, Closure $next)
    {

        if (!Auth::guard('web')->check()) {

            return redirect('admin/login');
        } else {

            return $next($request);
        }
    }
}
