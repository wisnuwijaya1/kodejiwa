<?php

namespace App\Http\Controllers;

use DataTables;
use DB;
use Session;


use App\Akun;
use App\Http\Requests\AkunRequest;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AkunController extends Controller
{

    public function index(Request $request)
    {
        $username = $request->session()->get('authenticated');
        return view('akun.index',compact('username'));
    }

    public function list(Request $request){
        
        if (($request->startdate != '') && ($request->enddate != '')){
            $lists = Akun::
            whereBetween('date', [$request->startdate, $request->enddate])
            ->get();

        }
        else{
            $lists = Akun::get();            
        }

        
        return DataTables()->of($lists)->make(true);
    }

    public function store(Request $request)
    {
        // dd($request);
        
    //      if (substr($request->username, 0, 1) == '9')
    // {
        $username = $request->username;
        $password = md5($request->password.'pospay-com2022'.$request->username);
        $nama = $request->name;
        $email = $request->email;
        $nohp = $request->nohp;
        $hakakses = $request->role;


        // dd($request,$password);
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/post_adduser",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n  \"userid\" : \"$username\",\r\n  \"passwd\" : \"$password\",\r\n  \"nama\" : \"$nama\",\r\n  \"email\" : \"$email\",\r\n  \"nohp\" : \"$nohp\",\r\n  \"hak_akses\" : \"$hakakses\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: cdb1c9d1-ef09-4558-00c1-eb335747371e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$balikan = json_decode($response);

    // dd($balikan);
    if ($balikan==null) {
        return redirect()->route('akun.index')->withErrors(['message' => 'Username Belum Terdaftar']);
    }   
    if ($balikan->resp_desk=='SUKSES') {
         $message = 'Data Berhasil di Simpan';
        return redirect()->route('akun.index')->with('success',$message);
    }
    if ($balikan->resp_code=='91') {
        return redirect()->route('akun.index')->withErrors(['message' => 'Data Sudah Terdaftar']);
    }
    if ($balikan->resp_code=='01') {
        return redirect()->route('akun.index')->withErrors(['message' => 'Data Tidak Tersedia']);
    }


   
    }


  }