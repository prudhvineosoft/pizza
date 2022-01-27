<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class signup extends Controller
{
    public function signup() {
        return view('auth.signup');
    }
    public function postSignup(Request $pdata) {
        $validate = $pdata-> validate([
            'name' => 'required',
            'email'=> 'required|email',
            'mobile'=> 'required|min:10',
            'password'=> 'required|min:4'
        ]);
        if($validate) {
            $newUser = new User;
            $newUser->name = $pdata->name;
            $newUser->email = $pdata->email;
            $newUser->mobile = $pdata->mobile;
            $newUser->password = $pdata->password;
            if($newUser->save()) {
                return back()->with('new_user_added', "user created successfully");
            }else {
                return back()->with('error', "user already created");
            }
        }
    }
}
