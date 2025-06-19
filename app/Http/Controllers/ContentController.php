<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Product;
use Session;
use File;
use Illuminate\Support\Facades\Http;
use DataTables;
use Intervention\Image\Facades\Image;

class ContentController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->session()->get('authenticated');
        return view('content.index',compact('username'));
    }


    public function manajemen(Request $request)
    {

        $user = $request->session()->get('detailuser');

        $kodekomunitas = $user['kodekomunitas'];

        // dd($kodekomunitas);
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"kode_komunitas\" : \"$kodekomunitas\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "kode_komunitas: 1001",
    "postman-token: 1992c918-8c6f-8d55-d5d9-daf660ab4a22"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$data = json_decode($response);


foreach ($data as $key => $value) {
        
$foto = str_replace ( ' ', '%20',$value->gambar);
        $curl1 = curl_init();

curl_setopt_array($curl1, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_photo?photonya=$foto",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 6f877af2-ee38-f45d-19d3-f34a1e9b1a51"
  ),
));

$response1 = curl_exec($curl1);
$err1 = curl_error($curl1);

// dd($response1);


             $img =base64_encode($response1);

// dd($response1);
        $save[$value->id] = [
            'id'=> $data[$key]->id,
            'kodekomunitas' => $data[$key]->kode_komunitas,
            'judul'=>$data[$key]->judul,
            'subjudul'=>$data[$key]->subjudul,
            'gambar' => $img,
            'namaimg' => $value->gambar,
            'link' => $data[$key]->link,
            'tipe' => $data[$key]->tipe,
            'stat' => $data[$key]->stat,
        ];

        // dd($save);
        $request->session()->put('content', $save);

}

           
       $datas = $request->session()->get('content');
       $username = $request->session()->get('authenticated');
       // dd($data);
        return view('content.manajemen',compact('data','datas','username'));
    }

    public function create(Request $request){

        // $username = $request->session()->get('authenticated');
        $user = $request->session()->get('detailuser');
        $username = $user['email'];
        // dd($username);
        if (substr($username, 0, 1) == '9')
    {
        $user = $request->session()->get('detailuser');
        $judul = $request->tittle;
        $subjudul = $request->subjudul;
        $link = $request->link;
        $tipe = $request->tipekonten;



        if($request->has('image')){
                    $gambar = $request->image;
                    $new_gambar = time().$gambar->getClientOriginalName();
                    Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('public' . $new_gambar));

                    


                     Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->delete(public_path('public' . $new_gambar));

                     dd($response);
                     $message = 'Data Berhasil di Simpan';

        return redirect()->route('home')->with('success',$message);
                }

    }

    else
    {

        $users = $request->session()->get('detailuser');

        $kodekomunitas = $users['kodekomunitas'];
        $judul = $request->tittle;
        $subjudul = $request->detailinformasi;
        $link = $request->link;
        $tipe = $request->tipekonten;
        $data = array("kode_komunitas"=>"$kodekomunitas","judul"=>"$judul", "subjudul"=>"$subjudul", "link"=>"$link", "tipe"=>"$tipe" );
         $fields = array("data_post"=> json_encode($data));

        if($request->file('image')){
            $gambar = $request->image;
             $new_gambar =$gambar->getClientOriginalName();
                    Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('Image' . $new_gambar));
                // dd($new_gambar);
            // $filename= $file->getClientOriginalName();
            // $file-> move(public_path('Image'), $filename);
            // $path = public_path('Image');
                    
                    // dd($image_upload_val);

            $files = array("imagenya"=> $_FILES['image']);

             $filename  = $_FILES['image']['tmp_name'];
             $handle    = fopen($filename, "r");
             $imgdata      = fread($handle, filesize($filename));
             $img = array('file' => base64_encode($imgdata));
             // dd($imgdata);
            // $cfile = new \CurlFile($path,'image/jpeg',$filename);
            // dd($files);

        }


        $data = '';
        $data1 = '';
        $eol = "\r\n";
        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }
   
    foreach ($files as $name1 => $content1) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . 'imagenya' . '"; filename="' . $new_gambar . '"' . $eol
            . 'Content-Type: image/jpeg'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol
            ;
        $data .= $eol;
        $data .= $imgdata . $eol;
        
    }
    $data .= "--" . $delimiter . "--".$eol;
    // dd($data);
$curl = curl_init();
    
curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/upload_content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_VERBOSE => true,
  CURLOPT_POST=> true,
  CURLOPT_SAFE_UPLOAD => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: multipart/form-data; boundary=" . $delimiter,
        "Content-Length: " . strlen($data)
      ),
    ));

$response = curl_exec($curl);
$err = curl_error($curl);


                    $a = File::delete(public_path('public/Image'. $new_gambar));
       
$msg = json_decode($response);
$error = $msg->resp_code;
$errormsg = $msg->resp_desk;
if ($error=='01') {

        return redirect()->route('content.manajemen')->withErrors(['message' => $errormsg]);
}
             $message = 'Data Berhasil di Simpan';

        return redirect()->route('content.manajemen')->with('success',$message);
    }

  }


public function edit(Request $request, $id){

    $content = $request->session()->get('content');


        $data = $content[$id];
    

            return response()->json($data);
}




public function hapus(Request $request, $id){

    $content = $request->session()->get('content');
    $users = $request->session()->get('detailuser');

        $kodekomunitas = $users['kodekomunitas'];
        $data = $content[$id];
        $ids = $data['id'];
      
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/delete_content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"id\" : \"$ids\" , \"kode_komunitas\" : \"$kodekomunitas\"}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 180589ef-f199-cd17-e946-0c73c9642f22"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);


            $message = 'Data Berhasil di Hapus';
            return redirect()->route('content.manajemen')->with('hapus',$message);
}
 

public function editstore(Request $request){

        $content = $request->session()->get('content');
        
        $filegambar = $content[$request->id]['gambar'];
        $img = base64_decode($filegambar);
        
        if ($request->image==null) {

        $users = $request->session()->get('detailuser');
        $kodekomunitas = $users['kodekomunitas'];
        $judul = $request->tittle;
        $subjudul = $request->detailinformasi;
        $link = $request->link;
        $tipe = $request->tipekonten;
        $data = array("id"=>"$request->id","kode_komunitas"=>"$kodekomunitas","judul"=>"$judul", "subjudul"=>"$subjudul", "link"=>"$link", "tipe"=>"$tipe","gambar"=>'0' );
         $fields = array("data_post"=> json_encode($data));


        $data = '';
        $eol = "\r\n";
        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;
        
        foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
        }
        
 
    $data .= "--" . $delimiter . "--".$eol;

// dd($data);
$curl = curl_init();
    
curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/update_content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_VERBOSE => true,
  CURLOPT_POST=> true,
  CURLOPT_SAFE_UPLOAD => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: multipart/form-data; boundary=" . $delimiter,
        "Content-Length: " . strlen($data)
      ),
    ));

$response = curl_exec($curl);
$err = curl_error($curl);

$resp = json_decode($response);
            
            // dd($resp->resp_code);

        if ($resp->resp_code==00) {

            $message = 'Data Berhasil di Simpan';

        return redirect()->route('content.manajemen')->with('update',$message);
        }

        else
        {
             $message = 'Data Gagal Simpan';
        

        return redirect()->route('content.manajemen')->with('gagal',$message);
        }


        }
       
        if (!empty($request->image)) {
            

            // $content = $request->session()->get('content');
        $users = $request->session()->get('detailuser');
        $kodekomunitas = $users['kodekomunitas'];
        $judul = $request->tittle;
        $subjudul = $request->detailinformasi;
        $link = $request->link;
        $tipe = $request->tipekonten;
        $data = array("id"=>"$request->id","kode_komunitas"=>"$kodekomunitas","judul"=>"$judul", "subjudul"=>"$subjudul", "link"=>"$link", "tipe"=>"$tipe","gambar"=>"1" );
         $fields = array("data_post"=> json_encode($data));

        if($request->file('image')){
            $gambar = $request->image;
             $new_gambar =$gambar->getClientOriginalName();
                    Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('Image' . $new_gambar));


            $files = array("imagenya"=> $_FILES['image']);

             $filename  = $_FILES['image']['tmp_name'];
             $handle    = fopen($filename, "r");
             $imgdata      = fread($handle, filesize($filename));
             $img = array('file' => base64_encode($imgdata));


        $data = '';
        $data1 = '';
        $eol = "\r\n";
        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }
   
    foreach ($files as $name1 => $content1) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . 'imagenya' . '"; filename="' . $new_gambar . '"' . $eol
            . 'Content-Type: image/jpeg'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol
            ;
        $data .= $eol;
        $data .= $imgdata . $eol;
        
    }
    $data .= "--" . $delimiter . "--".$eol;
    // dd($data);
$curl = curl_init();
    
curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/update_content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_VERBOSE => true,
  CURLOPT_POST=> true,
  CURLOPT_SAFE_UPLOAD => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: multipart/form-data; boundary=" . $delimiter,
        "Content-Length: " . strlen($data)
      ),
    ));

$response = curl_exec($curl);
$err = curl_error($curl);

$resp = json_decode($response);

// dd($response,$resp);
                    File::delete(public_path('public/Image'. $new_gambar));
                    File::delete(public_path('Image'. $new_gambar));
                    File::delete(public_path('public'. $new_gambar));
             if ($resp==null) 
                    
                    {
        $message = 'Data Gagal di Simpan';

        return redirect()->route('content.manajemen')->with('gagal',$message);
     }

          if ($resp->resp_code==00) {
                        
                        $message = 'Data Berhasil di Update';

        return redirect()->route('content.manajemen')->with('update',$message);
                    } 
                   

 }   
}
}

}
