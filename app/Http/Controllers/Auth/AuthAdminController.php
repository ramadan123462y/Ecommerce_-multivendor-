<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\CheckauthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function login(Request $request, CheckauthService $check_auth)
    {



        if ($check_auth->check_auth($request, 'web')) {

            flash()->addsuccess("Sucessfull Login");
            return redirect()->intended(RouteServiceProvider::Admin);
        } else {
            flash()->adderror("data not found please check data");
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        flash()->addsuccess("Sucessfull Logout Admin");
        return redirect('admin/login');
    }
}
