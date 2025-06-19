<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Product;
use Session;
use Illuminate\Support\Facades\Http;
use DataTables;

class RegisterController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->session()->get('authenticated');
        return view('register.index',compact('username'));
    }


//--data header register
    public function header()
    {
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/list_komunitas",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"tipe\" : \"00\"}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: f4887023-660b-c7a8-fdb0-c030ab2bedd6"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$register = json_decode($response);
        
        // dd($register);

        return Datatables::of($register)
        ->addIndexColumn()
        ->make(true);
    }  




//--create step 1
    public function createStepOne(Request $request)
    {
        

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"kode\" : \"00\", \"param\" : \"\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 5546bb5f-7f75-e77d-9d43-b6b1c3dfa3cd"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$a = json_decode($response);

$curl1 = curl_init();

curl_setopt_array($curl1, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"kode\" : \"05\", \"param\" : \"00\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 5546bb5f-7f75-e77d-9d43-b6b1c3dfa3cd"
  ),
));

$response1 = curl_exec($curl1);
$err1 = curl_error($curl1);

$b = json_decode($response1);

          $namaprovinsi = $request->session()->get('namaprovinsi');
          $namakabupaten = $request->session()->get('namakabupaten');
          $namakecamatan = $request->session()->get('namakecamatan');
          $kprk = $request->session()->get('kprk');
          $register = $request->session()->get('register');
          $scopenasional = $request->session()->get('scopenasional');
          $scopeprovinsi = $request->session()->get('scopeprovinsi');
          $scopekabupaten = $request->session()->get('scopekabupaten');

          $kodeprovinsi = isset($namaprovinsi['kodeprovinsi']) ? $namaprovinsi['kodeprovinsi'] : '';


        return view('register.create-step-one',compact('register','a','b','namaprovinsi','namakabupaten','namakecamatan','kprk','scopenasional','scopeprovinsi','scopekabupaten'));
    }


//--get service provinsi
    public function provinsi(Request $request, $provinsi, $namaprovinsi)
    {

        $save = [
                'kodeprovinsi' => $provinsi,
                'namaprovinsi' => $namaprovinsi,
            ];

            $request->session()->put('namaprovinsi', $save);

            
        $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "5475",
                CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\"kode\" : \"01\", \"param\" : \"$provinsi\"\n}",
                CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: f4cf5cac-5618-a379-5496-7eec42626f48"
        ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

            $paramkabupaten = json_decode($response);

            
                return response()->json($paramkabupaten);

    }

//--get service kecamatan
     public function kecamatan(Request $request, $kecamatan, $namakabupaten)
    {

        $save = [
                'namakabupaten' => $namakabupaten,
            ];

            $request->session()->put('namakabupaten', $save);

        $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "5475",
                CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\"kode\" : \"02\", \"param\" : \"$kecamatan\"\n}",
                CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: f4cf5cac-5618-a379-5496-7eec42626f48"
        ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

            $paramkecamatan = json_decode($response);


        return response()->json($paramkecamatan);

    }



//kodekomunitas
     public function kodekomunitas(Request $request, $kode, $namakomunitas)
    {


        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/detail_komunitas",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"kode_komunitas\" : \"$kode\"}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 361fac29-dd6f-eef9-c539-beb20b144d2f"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
    
    $a[] = json_decode($response,true);
    $a[] = json_encode($namakomunitas,true);
    $b = json_encode($a);



    $detailkomunitas = json_decode($b);

    // $test1 = array_merge($detailkomunitas,$test);
    

        return response()->json($detailkomunitas);

    }




//--get service kelurahan
    public function kelurahan(Request $request, $kelurahan, $namakecamatan)
    {

        $save = [
                'namakecamatan' => $namakecamatan,
            ];

            $request->session()->put('namakecamatan', $save);

        $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "5475",
                CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\"kode\" : \"03\", \"param\" : \"$kelurahan\"\n}",
                CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: f4cf5cac-5618-a379-5496-7eec42626f48"
        ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

            $paramkelurahan= json_decode($response);


        return response()->json($paramkelurahan);

    }

//--get service kprk
    public function kprk(Request $request, $kprk, $namakelurahan)
    {

       
        $a=explode(',', $kprk);
        $kodekprk = $a[0];
        $kodedesa = $a[1];

         $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "5475",
                CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\"kode\" : \"11\", \"param\" : \"$kodekprk\"\n}",
                CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: f4cf5cac-5618-a379-5496-7eec42626f48"
        ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $a= json_decode($response);


        // dd($a->nama);

        $save = [
                'kdkprk' => $a->kd_kprk,
                'namakprk' => $a->nama,
                'regional' => $a->reg,
                'kodedesa' => $kodedesa,
                'namakelurahan' => $namakelurahan,
            ];

            $request->session()->put('kprk', $save);
          
        

        return response()->json($save);

    }


//--get service nama jenis rekening
    public function namajenisrekening(Request $request, $namajenisrekening)
    {
        // dd($namajenisrekening);
        $save = [
                'namajenisrekening' => $namajenisrekening,
            ];

            $request->session()->put('namajenisrekening', $save);
          
        

        return response()->json($namajenisrekening);

    }


    //--get table rekening
    public function tablerekening(Request $request, $result)
    {
        $register = $request->session()->get('register2');
        if ($register==null) {

            $array = explode(',',$result);
            $hasil = array_chunk($array, 6);
            $request->session()->put('register2', $hasil);
        }
        else
        {
            $hasil = $request->session()->get('register2');
        }
          
        

        return response()->json($hasil);
        }
            

    

//--validasi rekening
    public function validasirekening(Request $request, $norek)
    {
        // dd($norek1,$norek2);
        // $a[] = $norek;
       $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/cek_rekening",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"account_no\" : \"$norek\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: a3448618-4b0a-b7e3-9d35-0e25adbd554b"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
// dd($a);
          $status = json_decode($response);
          // dd($status->resp_desk);
          if ($status->resp_desk =='SUKSES') {

              // $request->session()->put('namarek', $status->customer_name);
               return response()->json($status);
          }
          else
          {
          // return redirect()->route('home')->with('success',$message);
        return response()->json($status);
        }
    }


    public function namarek(Request $request, $existing)
    {

        $request->session()->put('validasinamarekening', $existing);


        return response()->json($existing);
    }


//--post data form create step 1
    public function postCreateStepOne(Request $request)
    {
           
         
        $save = [
            // 'kodekomunitas' => $request->kodekomunitas,
            'namakomunitas' => $request->namakomunitas,
            'skopekomunitas' => $request->skopekomunitas,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kodepos' => $request->kodepos,
            'kantorpospemeriksa' => $request->kantorpospemeriksa,
            'rayon' => $request->rayon,
            'tiperayon' => $request->tiperayon
        ];


        if ($request->tiperayonnasional=="0") {
                $scopenasional = [
                    'rayonnasional' => $request->rayonnasional,
                    'tiperayonnasional' => $request->tiperayonnasional,
                    'multiprovinsi' => '00',
                ];
            }
                else
                {
                    $c = array();
                    $c = $request->multiprovinsi;
                    if (!empty($c)) {
                    foreach ($c as $key => $item) {
                        $c[$key] = explode(",", $item);
                        }
                    }
                $scopenasional = [
                    'rayonnasional' => $request->rayonnasional,
                    'tiperayonnasional' => $request->tiperayonnasional,
                    'multiprovinsi' => $c,
                ];
                }



                if ($request->tiperayonprovinsi=="0") {
                $scopeprovinsi = [
                    'rayonprovinsi' => $request->rayonprovinsi,
                    'tiperayonprovinsi' => $request->tiperayonprovinsi,
                    'multikabupaten' => '00',
                ];
            }
                else
                {

                    $b = array();
                    $b = $request->multikabupaten;
                    if (!empty($b)) {
                    foreach ($b as $key => $item) {
                        $b[$key] = explode(",", $item);
                        }
                    }

                $scopeprovinsi = [
                    'rayonprovinsi' => $request->rayonprovinsi,
                    'tiperayonprovinsi' => $request->tiperayonprovinsi,
                    'multikabupaten' => $b,
                ];
                }


                if ($request->tiperayonkabupaten=="0") {
                $scopekabupaten = [
                    'rayonkabupaten' => $request->rayonkabupaten,
                    'tiperayonkabupaten' => $request->tiperayonkabupaten,
                    'multikecamatan' => '00',
                ];
            }
                else
                {
                    $a = array();
                    $a = $request->multikecamatan;
                    if (!empty($a)) {
                    foreach ($a as $key => $item) {
                        $a[$key] = explode(",", $item);
                        }
                    }
                        
                $scopekabupaten = [
                    'rayonkabupaten' => $request->rayonkabupaten,
                    'tiperayonkabupaten' => $request->tiperayonkabupaten,
                    'multikecamatan' => $a
                ];
                }
                // dd($scopekabupaten,$scopeprovinsi,$scopenasional);
          $request->session()->put('scopenasional', $scopenasional);
          $request->session()->put('scopeprovinsi', $scopeprovinsi);
          $request->session()->put('scopekabupaten', $scopekabupaten);
          $request->session()->put('register', $save);
          $register = $request->session()->get('register');

          // dd($save,$scopenasional,$scopeprovinsi,$scopekabupaten);
  
        return redirect()->route('register.create.step.two');
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $register1 = $request->session()->get('register1');
        $username = $request->session()->get('authenticated');

        return view('register.create-step-two',compact('register1','username'));
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {

         $save = [
            'modelkerjasama' => $request->modelkerjasama,
            'nomorkerjasama' => $request->nomorkerjasama,
            'namakontakperson' => $request->namakontakperson,
            'nomorhpkontakperson' => $request->nomorhpkontakperson,
            'emailkontakperson' => $request->emailkontakperson,
            'potensikomunitas' => $request->potensikomunitas
        ];
  

        $request->session()->put('register1', $save);
        
        return redirect()->route('register.create.step.three');
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $register2 = $request->session()->get('register2');

        if ($register2==null) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "5475",
            CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\"kode\" : \"10\", \"param\" : \"\"\n}",
            CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 04461112-119a-d50e-410d-9e8d6a1e64cf"
             ),
        ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $a = json_decode($response);
        $username = $request->session()->get('authenticated');
        return view('register.create-step-three',compact('register2','a','username'));
    }

    else
    {
        $register2 = $request->session()->get('register2');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "5475",
            CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_param",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\"kode\" : \"10\", \"param\" : \"\"\n}",
            CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 04461112-119a-d50e-410d-9e8d6a1e64cf"
             ),
        ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $a = json_decode($response);
    
        $koderekening  = [];
           $jenis  = [];
          $nomor = [];
          $namarek   = [];
            foreach($register2 as $n1 => $d1){ 
            foreach($d1 as $n2 => $d2){
                
    if($n2 == 1) $koderekening[]  = $d2;
    if($n2 == 2) $jenis[]  = $d2;
    if($n2 == 3) $nomor[] = $d2;
    if($n2 == 4) $namarek[]   = $d2;
  }

}
    $username = $request->session()->get('authenticated');
    return view('register.create-step-three',compact('register2','a','koderekening','jenis','nomor','namarek','username'));
    }


    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepThree(Request $request)
    {

        return redirect()->route('register.create.step.four');
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepFour(Request $request)
    {
        $register = $request->session()->get('register');
        $register1 = $request->session()->get('register1');
        $register2 = $request->session()->get('register2');
        // dd($register2);
        $namaprovinsi = $request->session()->get('namaprovinsi');
          $namakabupaten = $request->session()->get('namakabupaten');
          $namakecamatan = $request->session()->get('namakecamatan');
          $kprk = $request->session()->get('kprk');
          $namajenisrekening = $request->session()->get('namajenisrekening');
          $scopenasional = $request->session()->get('scopenasional');
          $scopeprovinsi = $request->session()->get('scopeprovinsi');
          $scopekabupaten = $request->session()->get('scopekabupaten');
          $validasinamarek = $request->session()->get('validasinamarekening');

          $jenis  = [];
          $nomor = [];
          $namarek   = [];
            foreach($register2 as $n1 => $d1){ 
            foreach($d1 as $n2 => $d2){
    if($n2 == 2) $jenis[]  = '['.$d2.']';
    if($n2 == 3) $nomor[] = '['.$d2.']';
    if($n2 == 4) $namarek[]   = '['.$d2.']';
  }

  $jenisrek  = implode(',',  $jenis);
  $nomorrek = implode(',',  $nomor);
  $namarekening   = implode(',',  $namarek);
}

// dd($jenisrek,$nomorrek,$namarekening);

          $test1 = json_encode($scopekabupaten['multikecamatan']);

          $aaa = preg_replace('/[0-9]+/', '', $test1);
          $bbb = str_replace('"','',$aaa);
          $ccc = str_replace('[','',$bbb);
          $ddd = str_replace(']','',$ccc);
          $eee = ltrim($ddd, ',');
          $fff = str_replace(',',' ',$eee);
          $ggg = explode('  ',$fff);
          $hhh = json_encode($ggg);
          $iii = str_replace('[','(',$hhh);
          $jjj = str_replace(']',')',$iii);
          $namakec = str_replace('"','',$jjj);


          $test2 = json_encode($scopeprovinsi['multikabupaten']);

          $aaaa = preg_replace('/[0-9]+/', '', $test2);
          $bbbb = str_replace('"','',$aaaa);
          $cccc = str_replace('[','',$bbbb);
          $dddd = str_replace(']','',$cccc);
          $eeee = ltrim($dddd, ',');
          $ffff = str_replace(',',' ',$eeee);
          $gggg = explode('  ',$ffff);
          $hhhh = json_encode($gggg);
          $iiii = str_replace('[','(',$hhhh);
          $jjjj = str_replace(']',')',$iiii);
          $namakab = str_replace('"','',$jjjj);


          $test3 = json_encode($scopenasional['multiprovinsi']);

          $aaaaa = preg_replace('/[0-9]+/', '', $test3);
          $bbbbb = str_replace('"','',$aaaaa);
          $ccccc = str_replace('[','',$bbbbb);
          $ddddd = str_replace(']','',$ccccc);
          $eeeee = ltrim($ddddd, ',');
          $fffff = str_replace(',',' ',$eeeee);
          $ggggg = explode('  ',$fffff);
          $hhhhh = json_encode($ggggg);
          $iiiii = str_replace('[','(',$hhhhh);
          $jjjjj = str_replace(']',')',$iiiii);
          $namaprov = str_replace('"','',$jjjjj);


          $a = $scopenasional['tiperayonnasional'];
          $b = $scopeprovinsi['tiperayonprovinsi'];
          $c = $scopekabupaten['tiperayonkabupaten'];


          if ($a == '0') {
              $a = 'Seluruh';
          }
          if ($a == '1')
          {
            $a = 'Sebagian';
          }

          if ($b == '0') {
              $b = 'Seluruh';
          }
          if  ($b == '1')
          {
            $b = 'Sebagian';
          }

          if ($c == '0') {
              $c = 'Seluruh';
          }
          if ($c == '1')
          {
            $c = 'Sebagian';
          }
       
        // dd($tiperayon);
        // dd($scopekabupaten['multikecamatan']);
        $skopekomunitas = $register['skopekomunitas'];

        if ($skopekomunitas=='0') {
                $skopekomunitas = 'Nasional';
        }

        if ($skopekomunitas=='1') {
                $skopekomunitas = 'Provinsi';
        }

        if ($skopekomunitas=='2') {
                $skopekomunitas = 'Kabupaten';
        }

       $username = $request->session()->get('authenticated');
        return view('register.create-step-four',compact('register','register1','register2','namaprovinsi','namakabupaten','namakecamatan','kprk','namajenisrekening','scopenasional','scopeprovinsi','scopekabupaten','a','b','c','skopekomunitas','validasinamarek','namakec','namakab','namaprov','jenisrek','nomorrek','namarekening','username'));
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepFour(Request $request)
    {
        $scope = array();
        $tipescope = array();
        $scopedaerah = array();

        $register = $request->session()->get('register');
        $register1 = $request->session()->get('register1');
        $register2 = $request->session()->get('register2');
        $kprk = $request->session()->get('kprk');
        $scopenasional = $request->session()->get('scopenasional');
        $scopeprovinsi = $request->session()->get('scopeprovinsi');
        $scopekabupaten = $request->session()->get('scopekabupaten');

        $tiperayonkabupaten = $scopekabupaten['tiperayonkabupaten'];
        $validasinamarek = $request->session()->get('validasinamarekening');
        $namacustomer = explode(',',$validasinamarek);

         $test1 = json_encode($scopekabupaten['multikecamatan']);


          $aaa = preg_replace('/[A-Za-z]+/', '', $test1);
          $bbb = str_replace('"','',$aaa);
          $ccc = str_replace('[','',$bbb);
          $ddd = str_replace(']','',$ccc);
          $eee = str_replace('(','',$ddd);
          $fff = str_replace(')','',$eee);
          $ggg = str_replace(' ','',$fff);
          $hhh = rtrim($ggg, ", ");
          $iii = str_replace(',',' ',$hhh);
          $kodekec = explode('  ',$iii);


          $test2 = json_encode($scopeprovinsi['multikabupaten']);


          $aaaa = preg_replace('/[A-Za-z.]+/', '', $test2);
          $bbbb = str_replace('"','',$aaaa);
          $cccc = str_replace('[','',$bbbb);
          $dddd = str_replace(']','',$cccc);
          $eeee = str_replace('(','',$dddd);
          $ffff = str_replace(')','',$eeee);
          $gggg = str_replace(' ','',$ffff);
          $hhhh = rtrim($gggg, ", ");
          $iiii = str_replace(',',' ',$hhhh);
          $kodekab = explode('  ',$iiii);

          $test3 = json_encode($scopenasional['multiprovinsi']);


          $aaaaa = preg_replace('/[A-Za-z]+/', '', $test3);
          $bbbbb = str_replace('"','',$aaaaa);
          $ccccc = str_replace('[','',$bbbbb);
          $ddddd = str_replace(']','',$ccccc);
          $eeeee = str_replace('(','',$ddddd);
          $fffff = str_replace(')','',$eeeee);
          $ggggg = str_replace(' ','',$fffff);
          $hhhhh = rtrim($ggggg, ", ");
          $iiiii = str_replace(',',' ',$hhhhh);
          $kodeprov = explode('  ',$iiiii);



        if (isset($scopekabupaten["rayonkabupaten"])) {
            $scope = $scopekabupaten["rayonkabupaten"];
        }
        if (isset($scopenasional["rayonnasional"])) {
            $scope = $scopenasional["rayonnasional"];
        }
        if (isset($scopeprovinsi["rayonprovinsi"])) {
            $scope = $scopeprovinsi["rayonprovinsi"];
        }



        if (isset($scopenasional["tiperayonnasional"])) {
            $tipescope = $scopenasional["tiperayonnasional"];
        }
        if (isset($scopeprovinsi["tiperayonprovinsi"])) {
            $tipescope = $scopeprovinsi["tiperayonprovinsi"];
        }
        if (isset($scopekabupaten["tiperayonkabupaten"])) {
            $tipescope = $scopekabupaten["tiperayonkabupaten"];
        }

        if ($tipescope == null) {
            $tipescope = '0';
        }
        else
        {
            if (isset($scopenasional["tiperayonnasional"])) {
            $tipescope = $scopenasional["tiperayonnasional"];
        }
        if (isset($scopeprovinsi["tiperayonprovinsi"])) {
            $tipescope = $scopeprovinsi["tiperayonprovinsi"];
        }
        if (isset($scopekabupaten["tiperayonkabupaten"])) {
            $tipescope = $scopekabupaten["tiperayonkabupaten"];
        }
        }


        if (isset($scopenasional["multiprovinsi"])) {
            $scopedaerah = $kodeprov;
        }
        if (isset($scopeprovinsi["multikabupaten"])) {
            $scopedaerah = $kodekab;
        }
        if (isset($scopekabupaten["multikecamatan"])) {
            $scopedaerah = $kodekec;
        }

        if ($scopedaerah == null) {
            $scopedaerah = '00';
        }
        else
        {
            if (isset($scopenasional["multiprovinsi"])) {
            $scopedaerah = $kodeprov;
        }
        if (isset($scopeprovinsi["multikabupaten"])) {
            $scopedaerah = $kodekab;
        }
        if (isset($scopekabupaten["multikecamatan"])) {
            $scopedaerah = $kodekec;
        }
        }

      
           $koderekening  = [];
           $jenis  = [];
          $nomor = [];
          $namarek   = [];
            foreach($register2 as $n1 => $d1){ 
            foreach($d1 as $n2 => $d2){
                
    if($n2 == 1) $koderekening[]  = $d2;
    if($n2 == 2) $jenis[]  = $d2;
    if($n2 == 3) $nomor[] = $d2;
    if($n2 == 4) $namarek[]   = $d2;
  }

}

            $array = array();
             // dd($namacustomer,$koderek,$norek);
            for ($i=0; $i < count($register2); $i++) { 
                // $array[] = [$koderek[$i],$norek[$i]];
                 $array[] = array(
                "koderek"    => $koderekening[$i],
                "norek"  => $nomor[$i],
                "namarekening" => $namarek[$i],
                    );
            }

           // dd($array);
        $save = [
            // 'kodekomunitas' => $register['kodekomunitas'],
            'namakomunitas' => $register['namakomunitas'],
            'alamat' => $register['alamat'],
            'provinsi' => $register['provinsi'],
            'kabupaten' => $register['kabupaten'],
            'kecamatan' => $register['kecamatan'],
            'kelurahan' => $kprk['kodedesa'],
            'kodepos' => $register['kodepos'],
            'kantorpospemeriksa' => $register['kantorpospemeriksa'],
            'skopekomunitas' => $register['skopekomunitas'],
            'rayon' => $scope,
            'tiperayon' => $tipescope,
            'scopedaerah' => $scopedaerah,
            'modelkerjasama' => $register1['modelkerjasama'],
            'nomorkerjasama' => $register1['nomorkerjasama'],
            'namakontakperson' => $register1['namakontakperson'],
            'nomorhpkontakperson' => $register1['nomorhpkontakperson'],
            'emailkontakperson' => $register1['emailkontakperson'],
            'potensikomunitas' => $register1['potensikomunitas'],
            'norekescrow' => $array

        ];

        // dd($save);


        $response = Http::post('http://3.1.30.53:5475/webpos/post_regiskom', [
            'namakomunitas' => $register['namakomunitas'],
            'alamat' => $register['alamat'],
            'provinsi' => $register['provinsi'],
            'kabupaten' => $register['kabupaten'],
            'kecamatan' => $register['kecamatan'],
            'kelurahan' => $kprk['kodedesa'],
            'kodepos' => $register['kodepos'],
            'kantorpospemeriksa' => $register['kantorpospemeriksa'],
            'skopekomunitas' => $register['skopekomunitas'],
            'rayon' => $scope,
            'tiperayon' => $tipescope,
            'scopedaerah' => $scopedaerah,
            'modelkerjasama' => $register1['modelkerjasama'],
            'nomorkerjasama' => $register1['nomorkerjasama'],
            'namakontakperson' => $register1['namakontakperson'],
            'nomorhpkontakperson' => $register1['nomorhpkontakperson'],
            'emailkontakperson' => $register1['emailkontakperson'],
            'potensikomunitas' => $register1['potensikomunitas'],
            'norekescrow' => $array
        ]);


        // $response->getBody()->getContents();

        // dd($response);
 
        $request->session()->forget('register');
        $request->session()->forget('register1');
        $request->session()->forget('register2');
        $request->session()->forget('namaprovinsi');
        $request->session()->forget('namakabupaten');
        $request->session()->forget('namakecamatan');
        $request->session()->forget('kprk');
        $request->session()->forget('namajenisrekening');
        $request->session()->forget('scopenasional');
        $request->session()->forget('scopeprovinsi');
        $request->session()->forget('scopekabupaten');
        $request->session()->forget('namarek');
        $request->session()->forget('namarekcopy');
        $request->session()->forget('validasinamarekening');
        $request->session()->forget('tablerekening');

        $message = 'Data Berhasil di Simpan';

        return redirect()->route('register.index')->with('success',$message);
    }
    
}