<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;

use Redirect; //untuk redirect



use Illuminate\Http\Request;
use App\User;
use DB;

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