<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocailAuthController extends Controller
{

    public function create_login_google()
    {

        return Socialite::driver('google')->redirect();
    }
    public function callback_login_google()
    {

        $user_google = Socialite::driver('google')->user();

        $customer_email = Customer::where('email', $user_google->getEmail())->first();
        // ______________________check Email__________________________________
        if ($customer_email) {
            Auth::guard('customer')->login($customer_email);
            return redirect('/');
        }

        // ___________________________________________________________

        $customer = Customer::where('google_id', $user_google->id)->first();

        if (!$customer) {

            $customer = Customer::create([

                'name' => $user_google->getName(),
                'email' => $user_google->getEmail(),
                'password' => Hash::make('google' . '113272355355503370764'),
                'google_id' => $user_google->id,
                'google_token' => $user_google->token

            ]);
        }



        Auth::guard('customer')->login($customer);
        flash()->addsuccess("Sucessfull  Login with Google");
        return redirect('/');
    }
}
