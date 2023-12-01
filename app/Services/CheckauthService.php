<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class CheckauthService{

    public function check_auth($request,$guard){


      return  Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password]);

    }





}
