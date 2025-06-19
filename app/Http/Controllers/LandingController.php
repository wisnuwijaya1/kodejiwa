<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\HttpRequest;
use Illuminate\Session\SessionManager;
use App\Http\Requests\UserRequest;

use Session;
use DataTables;
use Response;
use DB;
use Carbon\Carbon;
use Redirect;
use App\User;



class LandingController extends Controller
{


    public function syarat()
    {


        return view('dashboards.syarat');

    }

    public function syaratmuhammadiyah()
    {


        return view('dashboards.syaratmuhammadiyah');

    }

   public function dashboardawal(Request $request)
    {

        

       $request->session()->forget('authenticated');
        return view('dashboards.dashboardawal');

    }

    public function store(Request $request)
    {

        $emailExists = User::where('email', $request->email)->exists();
        $nohpExists = User::where('nohp', $request->nohp)->exists();

    if ($emailExists) {
        return back()
            ->withErrors(['email' => 'Email sudah terdaftar.'])
            ->withInput(); // retains old form data
    }
    else  if ($nohpExists) {
        return back()
            ->withErrors(['nohp' => 'Nomor HP sudah terdaftar.'])
            ->withInput(); // retains old form data
    }

        $dataUser = [
            'name'=>$request->name,
            'tanggal'=>$request->tanggal,
            'email'=>$request->email,
            'nohp'=>$request->nohp,    

        ];
     User::create($dataUser);
        

         $message = 'Data Berhasil di Simpan';
        // return redirect()->back()->with('success', 'Data berhasil disimpan!');
        return redirect()->route('testinput.index')->with('success',$message);
    }

    public function userprivacy()
    {

        return view('dashboards.userprivacy');
    }

    public function userprivacymuhammadiyah()
    {

        return view('dashboards.userprivacymuhammadiyah');
    }

    public function produk()
    {

        return view('dashboards.produk');
    }

    public function tentang()
    {

        return view('dashboards.tentang');
    }

    public function hubungi()
    {

        return view('dashboards.hubungi');
    }
    
}
