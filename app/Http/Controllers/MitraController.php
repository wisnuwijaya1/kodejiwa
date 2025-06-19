<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/upload_content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"photonya\"; filename=\"1112721_720.jpg\"\r\nContent-Type: image/jpeg\r\n\r\n\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"data_post\"\r\n\r\n{\"kode_komunitas\" : \"1001\",\"judul\" : \"Gebu Minang - Pos Indonesia\",\"subjudul\" : \"Pos Indonesia dan Gebu Minang Luncurkan Gebu Minang Pospay\",\"link\" : \"https://nasional.tempo.co/read/1595385/pos-indonesia-dan-gebu-minang-luncurkan-gebu-minang-pospay\",\"tipe\" : \"0\"}\r\n-----011000010111000001101001--\r\n",
  CURLOPT_HTTPHEADER => [
    "Content-Type: multipart/form-data; boundary=---011000010111000001101001"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}





$users = $request->session()->get('detailuser');

        $kodekomunitas = $users['kodekomunitas'];
        $judul = $request->tittle;
        $subjudul = $request->subjudul;
        $link = $request->link;
        $tipe = $request->tipekonten;

$url = "http://3.1.30.53:5475/webpos/upload_content";
$data['judul']          = $judul;
$data['subjudul']   = $subjudul;
$data['link']           = $link;
$data['tipe']               = $request->tipekonten;

$path = 'public';
$config['upload_path'] = $path; 
$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
$config['max_size'] = '17007840';
$config['file_name'] = $new_gambar;


    $headers = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
    $postfields = array("filedata" => "@$data", "filename" => $new_gambar);
    $response = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => true,
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_INFILESIZE => $filesize,
        CURLOPT_RETURNTRANSFER => true
    ); // cURL options
    curl_setopt_array($response, $options);
    curl_exec($response);
    
    dd($response);


























function lempar_serviceimg($data,$fields,$files){
    $url = "http://127.0.0.1:6543/multilink/h2h/v1/refferensi/upload_content";
            
    $curl = curl_init();
    $url_data = http_build_query($data);
    $boundary = uniqid();
    $delimiter = '-------------' . $boundary;
    
    $post_data = build_data_files($boundary, $fields, $files);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 60,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $post_data,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: multipart/form-data; boundary=" . $delimiter,
        "Content-Length: " . strlen($post_data)
      ),
    ));
    $result = curl_exec($curl);
    curl_close($curl);
    
    $input = array(json_decode($result,true));
    
    return $input;
}

function build_data_files($boundary, $fields, $files){
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }
    foreach ($files as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $content['name'] . '"' . $eol
            . 'Content-Type: image/jpeg'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol
            ;
        $data .= $eol;
        $data .= json_encode($content) . $eol;
    }
    $data .= "--" . $delimiter . "--".$eol;
    return $data;
}

EXP CONTROLLER :
public function tambahdata_proses()
{
$data['judul']          = addslashes($this->input->post('judul',true));
$data['subjudul']   = addslashes($this->input->post('subjudul',true));
$data['link']           = addslashes($this->input->post('link',true));
$data['tipe']               = '0';

$path = 'public/';
$config['upload_path'] = $path; 
$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
$config['max_size'] = '17007840';
$config['file_name'] = $_FILES['image']['name']; 

$this->load->library('upload',$config); 

if($this->upload->do_upload('image')){ 
  $uploadData = $this->upload->data(); 
  $filename = $uploadData['file_name']; 
  
  $fields = array("data_post"=> json_encode($data));
    $files = array("imagenya"=> $_FILES['image']);
    
    $input = lempar_serviceimg($data,$fields,$files);
    foreach ($input as $row)
    {
        $rc     = $row['s'];
        $respon = $row['m'];
        $data = $row['d'];
    }
    if($rc == '200'){
        $this->session->set_flashdata("k", "<div class=\"alert alert-success\" role=\"alert\" id=\"alert\"><b>".$respon."</b></div>");
    }else{
        $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" role=\"alert\" id=\"alert\"><b>".$respon."</b></div>");
    }
    redirect('Contentmanagement','refresh');
}else{ 
    //$respon = 'Ada kesalahan Upload file.';
    $respon = $this->upload->display_errors();
    $this->session->set_flashdata("k", "<div class=\"alert alert-danger\" role=\"alert\" id=\"alert\"><b>".$respon."</b></div>"); 
    redirect('Contentmanagement','refresh');
}
}