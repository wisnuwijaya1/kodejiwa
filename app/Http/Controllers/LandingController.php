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
        $name = $request->name;
        $tanggal = $request->tanggal;

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

     $apiKey = 'AIzaSyACr3TQTOpYHelo7DerAS2kBnSw1P5ak0w';

$curl = curl_init();
		
        //Ini command yang diberikan kepada model AI
		$dt['parts'][0]['text'] = 'Gunakan nama dan tanggal lahir untuk menganalisis KodeJiwa menggunakan ilmu numerologi dan zodiak.
Berikan hasilnya dalam bentuk rangkuman ringkas tanpa penjelasan teori.
Fokuskan pada 3 hal utama:
	1.	Perilaku saya yang umum
	2.	Motivasi tersembunyi saya
	3.	Jalur kehidupan dalam sosial, pekerjaan, dan percintaan

Tulis narasinya mengalir, intuitif, dan to the point. Jangan tampilkan angka atau istilah teknis.'.$name.$tanggal;
        $data['contents'][0] =$dt;


curl_setopt_array($curl, [
    CURLOPT_URL => "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$apiKey,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 500,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",

    ],
    CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($curl);  

$err = curl_error($curl);

$datas = json_decode($response);
$jawaban = $datas->candidates[0]->content->parts[0]->text;
        

         $message = 'Data Berhasil di Simpan';
        // return redirect()->back()->with('success', 'Data berhasil disimpan!');
 
        return view('testinput.index',compact('jawaban','message'))->with('success', 'Data berhasil disimpan!');
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
