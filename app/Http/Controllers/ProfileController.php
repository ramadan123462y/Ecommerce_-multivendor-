<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileSallerRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Saller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use ImageTrait;


    public function edit_profile_admin()
    {
        $user = admin();

        return view('Admin.profile', compact('user'));
    }
    public function update_profile_admin(Request $request)
    {
        $user = admin();

        User::find($user->id)->update([


            'name' => $request->name,
            'email' => $request->email

        ]);
        flash()->addsuccess("profile updated");
        return redirect()->back();
    }
    public function update_password_admin(Request $request)
    {
        $user = admin();

        User::find($user->id)->update([


            'password' => Hash::make($request->password),


        ]);
        flash()->addsuccess("password  updated");
        return redirect()->back();
    }

    public function edit_profile_saller()
    {

        $user = saller();

        return view('Saller.profile', compact('user'));
    }
    public function update_profile_saller(ProfileSallerRequest $request)
    {
        $user = saller();
        $saller = Saller::find($user->id)->update([

            'name' => $request->name,
            'email' => $request->email

        ]);
        if ($request->hasFile('image_logo')) {
            $this->delete_image('images\stores\\' . store_saller()->image_logo);
            $this->upload_image('image_logo', $request, 'stores', 'images');
        }

        $this->update_store($request);


        flash()->addsuccess("profile updated");
        return redirect()->back();
    }

    public function update_password_saller(Request $request)
    {
        $user = saller();

        Saller::find($user->id)->update([
            'password' => Hash::make($request->password),
        ]);
        flash()->addsuccess("password  updated");
        return redirect()->back();
    }
    private function update_store($request)
    {


        store_saller()->update([
            'name' => $request->namestore,
            'slug' => $request->slug,
            'image_logo' => ($request->hasFile('image_logo')) ? $request->file('image_logo')->getClientOriginalName() : store_saller()->image_logo,
            'status' => $request->status,
        ]);
    }
}
