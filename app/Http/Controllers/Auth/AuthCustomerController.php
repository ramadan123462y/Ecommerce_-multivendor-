<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CheckauthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCustomerController extends Controller
{
    public function register(Request $request)
    {
        Customer::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        flash()->addsuccess("Sucessfull Register Please Login");
        return redirect('login');
    }

    public function login(Request $request, CheckauthService $check_auth)
    {


        if ($check_auth->check_auth($request, 'customer')) {

            flash()->addsuccess("Sucessfull Login");
            return redirect('/');
        } else {
            flash()->adderror("data not found please check data");
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        flash()->addsuccess("Sucessfull Logout Customer");
        return redirect('/');
    }
}
