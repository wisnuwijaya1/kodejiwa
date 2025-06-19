<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login')->with('sukses','Anda Berhasil Login');
    }

    public function postlogin(Request $request)
    {
      // echo "$request->email.$request->password "; die;
        $user = User::where([
    'username' => $request->username, 
    'password' => $request->password
    ])->first();

    if($user)
{
    Auth::login($user);
    return redirect()->route('home');
}
else
        return redirect('/login')->with('message','Username or Password do not match');
    }


}