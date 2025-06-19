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


class TestInputController extends Controller
{

    public function index(Request $request)
    {
        $username = $request->session()->get('authenticated');
        return view('testinput.index',compact('username'));
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

        $nama = $request->name;
        $tanggal = $request->tanggal;

// $apiKey = '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';

// $curl = curl_init();

// $data = [
//     "model" => "gpt-4o", // atau "gpt-3.5-turbo"
//     "messages" => [
//         ["role" => "system", "content" => "Kamu adalah asisten yang membantu pengguna."],
//         ["role" => "user", "content" => "Apa itu ChatGPT?"]
//     ]
// ];

// curl_setopt_array($curl, [
//     CURLOPT_URL => "https://api.openai.com/v1/chat/completions",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_POST => true,
//     CURLOPT_HTTPHEADER => [
//         "Content-Type: application/json",
//         "Authorization: Bearer $apiKey"
//     ],
//     CURLOPT_POSTFIELDS => json_encode($data)
// ]);


// $response = curl_exec($curl);





$apiKey = 'AIzaSyACr3TQTOpYHelo7DerAS2kBnSw1P5ak0w';

$curl = curl_init();
		
        //Ini command yang diberikan kepada model AI
		$dt['parts'][0]['text'] = 'Gunakan nama dan tanggal lahir untuk menganalisis KodeJiwa menggunakan ilmu numerologi dan zodiak.
Berikan hasilnya dalam bentuk rangkuman ringkas tanpa penjelasan teori.
Fokuskan pada 3 hal utama:
	1.	Perilaku saya yang umum
	2.	Motivasi tersembunyi saya
	3.	Jalur kehidupan dalam sosial, pekerjaan, dan percintaan

Tulis narasinya mengalir, intuitif, dan to the point. Jangan tampilkan angka atau istilah teknis.'.$nama.$tanggal;
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
// dd($response);
$err = curl_error($curl);

$datas = json_decode($response);
$jawaban = $datas->candidates[0]->content->parts[0]->text;



return view('testinput.index',compact('jawaban'));
    }


  }