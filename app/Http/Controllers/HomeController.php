<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\HttpRequest;
use App\user;
use Session;
use DataTables;
use Response;
use DB;
use Carbon\Carbon;
use Redirect;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
   $this->middleware('cekstatus');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request){

        $username = $request->session()->get('authenticated');
        return view('dashboards.dashboard1', compact('username'));

    }



    public function dashboardawal(Request $request)
    {


       $request->session()->forget('authenticated');
        return view('dashboards.dashboardawal');

    }

    public function store(Request $request)
    {
        dd($request);
        
    
       
        $nohp = $request->nohp;
   


        
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



   
    }

   
    
}
