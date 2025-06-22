@extends('layouts.appawal')
@section('content')
<head>


<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6 {  margin: 0;  padding: 0;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        background-color: #23342B;

      }
    </style>

  </head>

  <body >
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

     <div class="container px-6" id="profil">
                <div class="row gx-6 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 style="font: Helvetica Now; color: #fefbdc;"  >Temukan arah hidupmu lewat decoding jiwa</h1>
                            <br>
                            <p style="font: Helvetica Now; color: #fefbdc; font-size: 20px;">Kami bukan guru. Kami bukan peramal. KodeJiwa hadir sebagai teman refleksi—untuk bantu kamu mengenali siapa dirimu, pola hidupmu, dan ke arah mana langkahmu sebenarnya.</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">

                                 <!-- <a href="{{route('landing.hubungi')}}"
                        > -->
                        <br>
                        <span
                          class="btn btn-primary btn3d"onclick="goCreate(this)" data-toggle="modal" data-target="#create-new-modal"
                        >
                          <span style="font: Helvetica Now;"> Mulai Tes Awal Gratis ↓ </span>
                        </span>
                      </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">


                        <img src="{{asset('tampilanawal.png')}}" style="max-width: 100%; margin-left: -10px;" class="img-fluid"  />
                           
           
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
   
            

  </div>
      <div class="container px-5" id="tentang">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <h1 style="font: Helvetica Now; text-align: center; color: #fefbdc;">Tentang KodeJiwa</h1>
                        <br>
                        <div style="font: Helvetica Now; text-align: center; font-size: 20px; line-height: 40px; color: #fefbdc;" ><p>Setiap orang menyimpan potensi, namun tak semua bisa langsung melihatnya. Kadang kita stuck di pola yang sama. Kadang kita merasa ada “yang kosong”, tapi nggak tahu apa.

KodeJiwa hadir sebagai teman. Kami percaya, perubahan tak selalu butuh nasihat besar—kadang cukup dimulai dari ngobrol jujur dan memahami diri lebih dalam.
</p></div>
                      <br>
                      <br>
                    </div>
                </div>
            </div>




            <div class="container px-5" style=" color: #fefbdc">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="mb-5 mb-lg-0 text-center text-lg-start" >
                            <h1 style="font: Helvetica Now;" >Kenali 4 Pilar KodeJiwa</h1>
                            <br>
                            <h3 style="font: Helvetica Now; font-size: 20px; color: #fefbdc">
1. Sacred Mapping </h3>
<p>Langkah pertama untuk mengenali arah dan pola unik dalam dirimu. Di sini kamu akan menemukan cerminan dari kecenderungan alami dan potensi yang mungkin belum kamu sadari.</p>
<h3 style="font: Helvetica Now; font-size: 20px;color: #fefbdc">
  <br>
2. Behavioral Profiling </h3>
<p>Bagaimana kamu berpikir, merespons situasi, dan berinteraksi dengan orang lain—semua punya polanya. Profil ini bantu kamu memahami kebiasaan batin dan gaya berperilakumu sehari-hari.</p>
  <br>
<h3 style=" font: Helvetica Now; font-size: 20px;  color: #fefbdc">
3. Modern Psychology </h3>
<p>Kami menyajikan pendekatan psikologi yang sederhana dan aplikatif—agar kamu bisa memahami emosi, luka batin, dan dinamika pikiran dengan lebih jernih.</p>
  <br>
<h3 style=" font: Helvetica Now; font-size: 20px; color: #fefbdc">
4. Soul Calling </h3>
<p>Di akhir, kamu akan diajak menyelami kembali apa yang benar-benar penting bagimu—bukan untuk diberi jawaban, tapi untuk menemukan suara hatimu sendiri.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="masthead-device-mockup">
                            
                            <div class="device-wrapper">

                                        <img src="{{asset('tentang.png')}}" style="margin-left: center;" class="img-fluid" />
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            <br>
            <br>
            <br>
            <br>


        <div class="container px-6">
                <div class="row gx-6 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 style="font: Helvetica Now; color: #fefbdc" >Apa yang kamu dapat?</h1>
                            <br>
                            
<p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">1.	Gaya Berkomunikasi</p>
<p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">Apakah kamu cenderung to the point, pendengar yang kuat, atau penggerak kelompok?</p>
  <p style=" font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">2.	Respons Saat Tertekan</p>
<p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">Apakah kamu melawan, mundur, memendam, atau malah menjadi sangat aktif?</p>
<p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">3.	Kebutuhan Batin Tersembunyi</p>
<p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">Setiap profil punya kebutuhan dasar yang sering tidak disadari.</p>                          
                        </div>
                    </div>
                   <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 style="font: Helvetica Now; color: #fefbdc" >Proses</h1>
                            <br>
                            <br>
                            <p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">1.	Jawab pertanyaan pilihan ganda (santai, 5–7 menit)</p>
                            <p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">2.	Sistem menyusun ringkasan profil kepribadianmu</p>
                            <p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">3.	Kamu akan melihat insight tentang kekuatan, tantangan, dan tips keseimbangan</p>
                            <p style="font: Helvetica Now; font-size: 20px; line-height: 25px; color: #fefbdc">4.	Bisa lanjut ke eksplorasi emosional lewat pendekatan psikologi modern</p>

                           
                        </div>
                </div>
            </div>
      </div>
    
      <br>
      <br>
      <br>
      <br>
    
  </body>



@include('layouts.footerlanding')
@include('layouts.formdashboard')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection



