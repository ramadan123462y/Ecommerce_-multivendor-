<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CredentialStripe;

class CredentialController extends Controller
{

    public function create_Credential()
    {


        return view('Admin.CredentialStripe.CredentialStripe');
    }

    public function  store(Request $request)
    {

        CredentialStripe::find(1)->update([
            'Publishable_key' => $request->Publishable_key,
            'Secret_key' => $request->Secret_key,
        ]);


        flash()->addsuccess("CredentialStripe Updated");
        return redirect()->back();
    }
}
