<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\HttpRequest;


use Redirect; //untuk redirect



use Illuminate\Http\Request;
use App\User;
use DB;

class AuthController extends Controller
{
    public function login()
    {
        // dd('a');
        return view('auth.login')->with('sukses','Anda Berhasil Login');
    }

    public function logout(Request $request)
    {
        // dd('b');
        $request->session()->forget('authenticated');
        $request->session()->forget('detailuser');
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {

        $username = $request->username;
        
    if (substr($username, 0, 1) == '9')
    {

        $password = md5($request->password.'pospay-com2022'.$request->username);
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n      \"userid\" : \"$request->username\",\r\n      \"passwd\" : \"$password\"\r\n   }",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: da16a2da-7a36-af68-41bd-d95309a9f398"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$aa = json_decode($response);

if ($aa->resp_code == 92) {
    $wrongpass = $aa->resp_desk;
        return redirect('/login')->with('message',$wrongpass);
 }
 if ($aa->resp_code == 90) {

        return redirect('/login')->with('message','NIPOS Tidak Ditemukan');
 }
 else
 {
$user = array();
$sukses = array();

$a = explode(',', $response);
$b = explode('"', $a[2]);
$user= $b[3];

$b1 = explode('"', $a[1]);
$sukses = $b1[3];

$d = explode('"', $a[6]);
$kprk = $d[3];

$e = explode('"', $a[4]);
$hakakses = $e[3];

$nipos = $request->username;

$save = [
            'email'=>$request->username,
            'nipos' =>$nipos,
            'nama'=>$user,
            'password'=>$request->password,
            'kprk' => $kprk,
            'hakakses' => $hakakses,
            'status' => $sukses
        ];


        $request->session()->put('authenticated', $user);
        $request->session()->put('detailuser',$save);

    if($sukses)
{

    return redirect()->route('home',compact('user'));
}
    }
  }      

  $password = md5($request->password);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n      \"userid\" : \"$request->username\",\r\n      \"passwd\" : \"$password\"\r\n   }",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: da16a2da-7a36-af68-41bd-d95309a9f398"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
// dd($response);
// dd($request->username,$password,$response);
if ($response==false) {
    return redirect('/login')->with('message','Service Not Available');
}
else
{

    $a1 = json_decode($response);
if ($a1 == null) {
   $user = array();
$sukses = array();

$password1 = md5($request->password);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n      \"userid\" : \"$request->username\",\r\n      \"passwd\" : \"$password\"\r\n   }",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: da16a2da-7a36-af68-41bd-d95309a9f398"
  ),
));

$a = explode(',', $response);
// dd($a[2]);
$b = explode('"', $a[2]);
$user= $b[3];

$b1 = explode('"', $a[1]);
$sukses = $b1[3];

$c = explode('"', $a[4]);
$kodekomunitas = $c[3];

$d = explode('"', $a[6]);
$kprk = $d[3];

$e = explode('"', $a[8]);
$hakakses = $e[3];
// dd($e,$a);

    $save = [
            'email'=>$request->username,
            'nama'=>$user,
            'password'=>$request->password,
            'kodekomunitas' => $kodekomunitas,
            'kprk' => $kprk,
            'hakakses' => $hakakses,
            'status' => $sukses
        ];

        // dd($save);
        $request->session()->put('authenticated', $user);
        $request->session()->put('detailuser',$save);
    if($sukses)
{

    return redirect()->route('home',compact('user'));
}

}

 $a2 = json_decode($response);

 if ($a2->resp_code == 92) {
    $wrongpass = $a1->resp_desk;
        return redirect('/login')->with('message',$wrongpass);
 }

 if ($a2->resp_code == 93) {
    $wrongpass = $a1->resp_desk;
        return redirect('/login')->with('message',$wrongpass);
 }

 if ($a2->resp_code == 90) {
        
        return redirect('/login')->with('message','Username Tidak Di Temukan');
 }

else
{


$user = array();
$sukses = array();

$a = explode(',', $response);

$b = explode('"', $a[2]);
$user= $b[3];

$b1 = explode('"', $a[1]);
$sukses = $b1[3];



    $save = [
            'name'=>$user,
            'email'=>$request->username,
            'password'=>$request->password,
            'status' => $sukses
        ];


        $request->session()->put('authenticated', $user);

    if($sukses)
{

    return redirect()->route('home',compact('user'));
}
    
    // return view('dashboards.dashboard1', compact('user'));
}

}
}
}