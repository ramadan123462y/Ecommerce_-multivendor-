<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Saller;
use App\Models\Store;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthSallerController extends Controller
{
    public function register(Request $request)
    {
        try {

            $store =  Store::create([
                'name' => $request->name_store,
            ]);
            Saller::create([
                'name' => $request->name_manager,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'store_id' => $store->id
            ]);

            return redirect('saller/login');
        } catch (\Exception $e) {


            flash()->adderror($e->getMessage());

            return redirect()->back();
        }
    }

    public function login(Request $request)
    {


        if (Auth::guard('saller')->attempt(['email' => $request->email, 'password' => $request->password])) {

            flash()->addsuccess("Sucessfull Login");
            return redirect()->intended(RouteServiceProvider::Saller);
        } else {
            flash()->adderror("data not found please check data");
            return redirect()->back();
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('saller')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        flash()->addsuccess("Sucessfull Logout Saller");
        return redirect('saller/login');
    }
}
