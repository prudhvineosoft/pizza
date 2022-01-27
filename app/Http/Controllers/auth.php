<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class auth extends Controller
{
    public function login(Request $data) {
        $validate = $data->validate([
            'user' => 'required',
            'password' => 'required'
        ]);
        if ($validate) {
            $pass = $data->password;
            $tableData = User::where('email',$data->user)->first();
            if ($tableData) {
                if ($pass == $tableData->password) {
                    $data->session()-> put('user',$tableData);
                    return redirect('/dashboard/home');
                } else {
                    return back()->with('passError', "Incorrect Password");
                }
            } else{
                return back()->with('emailError', "Incorrect Email");
            }
        }
    }
}
