@extends('layouts.appawal')
@section('content')
<style>
 

.features-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 20px;
}

.feature-box {
  background-color: #1c2e20;
  border-radius: 10px;
  padding: 20px;
  flex: 1 1 calc(25% - 20px);
  min-width: 250px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.5);
  border: 1px solid #333;
  transition: transform 0.2s ease;
}

.feature-box:hover {
  transform: translateY(-5px);
}

.icon {
  font-size: 36px;
  margin-bottom: 10px;
  color: #e7ce70 ;
}

.feature-box h5 {
  color: #e7ce70 ;
  margin-bottom: 10px;
}

.feature-box p {
  color: #fefbdc;
  font-size: 15px;
  font: Helvetica Now;
  line-height: 1.5;
}

/* Responsive Design */
@media (max-width: 768px) {
  .features-container {
    flex-direction: column;
    align-items: center;
  }

  .feature-box {
    flex: 1 1 100%;
    max-width: 100%;
  }
}


.btn-3d {
  background-color: #e7ce70; /* warna oranye */
  color: #121212; /* warna teks hitam */
  font-weight: 700;
  font-size: 16px;
  padding: 12px 28px;
  border: none;
  border-radius: 50px;
  box-shadow: 0 6px 15px rgba(255, 168, 0, 0.4); /* efek glow bawah */
  cursor: pointer;
  transition: all 0.2s ease;
}

.button-container {
  display: flex;
  justify-content: center; /* Horizontal center */
  align-items: center;     /* Vertical center jika butuh */
  padding: 40px 0;         /* Jarak atas-bawah */
}

.cta-button {
  background-color: #e7ce70;
  color: black;
  padding: 8px 30px;
  font-weight: bold;
  border-radius: 25px;
  border: none;
  box-shadow: 0 5px 15px rgba(255, 231, 97, 0.6);
  cursor: pointer;
  transition: all 0.3s ease;
}

.cta-button:hover {
  box-shadow: 0 5px 20px rgba(255, 231, 97, 0.8);
}

.btn-3d:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 18px rgba(255, 168, 0, 0.5);
}

.btn-3d:active {
  transform: translateY(1px);
  box-shadow: 0 4px 10px rgba(255, 168, 0, 0.3);
}

</style>
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
                            <p style="font-family: 'Helvetica Now', sans-serif;line-height: 30px; color: #fefbdc; font-size: 20px;">Kami bukan guru. Kami bukan peramal. KodeJiwa hadir sebagai teman refleksi—untuk bantu kamu mengenali siapa dirimu, pola hidupmu, dan ke arah mana langkahmu sebenarnya.</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">

                                 <!-- <a href="{{route('landing.hubungi')}}"
                        > -->
                        <br>
                        <br>
                        <span
                          class="btn-3d"onclick="goCreate(this)" data-toggle="modal" data-target="#create-new-modal"
                        >
                          <span style="font: Helvetica Now;"> Mulai Tes Awal Gratis </span>
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
                        <div style="font: Helvetica Now; text-align: center; font-size: 20px; line-height: 30px; color: #fefbdc;" ><p>Setiap orang punya potensi, tapi kadang kita sulit melihatnya sendiri. Seringkali, kita terjebak dalam pola yang sama atau merasa kosong tanpa tahu apa penyebabnya. KodeJiwa hadir sebagai teman yang percaya bahwa perubahan tidak selalu butuh nasihat besar. Terkadang, cukup dimulai dari obrolan jujur dan memahami diri lebih dalam.</p></div>
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
<p>Bagaimana kamu berpikir, merespons situasi, dan beberperilakumungan orang lain, kita cari tau bersama polanya. Profil ini bantu kamu memahami kebiasaan batin dan gaya berperilakumu sehari-hari.</p>
  <br>
<h3 style=" font: Helvetica Now; font-size: 20px;  color: #fefbdc">
3. Modern Psychology </h3>
<p>Kami menyajikan pendekatan psikologi yang sederhana dan aplikatif— agar kamu bisa memahami dinamika pikiran dengan lebih jernih.</p>
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



        
    <div class="container px-5" id="ara">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <h1 style="font: Helvetica Now; text-align: center; color: #fefbdc;">ARA — Awakening Reflection Assistant</h1>
                        <br>
                    <p style="font: Helvetica Now; text-align: left; font-size: 20px; line-height: 30px; color: #fefbdc;" >- ARA hadir bukan memberi jawaban, tapi membantu kamu melihat yang belum terlihat.</p>
                    <p style="font: Helvetica Now; text-align: left; font-size: 20px; line-height: 30px; color: #fefbdc;" >- ARA bantu kamu mengenali arah hidup dari cermin yang jujur: diri sendiri.</p>
                    <p style="font: Helvetica Now; text-align: left; font-size: 20px; line-height: 30px; color: #fefbdc;" >- ARA menuntun kamu dari kesadaran → refleksi → keselarasan hidup.</p>
                    <p style="font: Helvetica Now; text-align: left; font-size: 20px; line-height: 30px; color: #fefbdc;" >- ARA bantu kamu menyelaraskan langkah hidup dengan suara hati.</p>
                      
                      </div>
                    </div>
                </div>
            </div>
            <br>
         
                 
                        <!-- Mashead text and app badges-->
                        <div class="button-container">
                           
                        <span style="justify-content: center; align-items: center;"
                          class="cta-button btn-3d"onclick="goCreate(this)" data-toggle="modal" data-target="#create-new-modal"
                        >
                          <span style="font: Helvetica Now;"> Mulai Tes Awal Gratis </span>
                        </span>
                      </a>
                        </div>

            

  </div>
                      
      <br>
      <br>

<div class="features-container">
  <div class="feature-box">
    <br>
    <h5>1. Sacred Mapping (Rp99.000)</h5>
    <p>Langkah pertamamu untuk mengenal diri lebih dalam! Dapatkan gambaran personal tentang aspek diri, sosial, pekerjaan, dan hubungan berdasarkan nama dan tanggal lahirmu.
</p>
  </div>
  <div class="feature-box">
    <br>
    <h5>2. ⁠Behavior Analysis (Rp149.000)</h5>
    <p>Melangkah lebih jauh! Di tahap ini, kita akan menyelami aspek diri, sosial, pekerjaan, dan hubungan melalui analisis perilaku dan kebiasaan sehari-harimu melalui video 30 detik - 1 menit yang akan anda kirimkan!</p>
  </div>
  <div class="feature-box">
    <br>
    <h5>3. Modern Psychology (Rp249.000)</h5>
    <p>Pengalaman lebih intensif dengan sesi one-on-one! Dua kali pertemuan personal untuk mengupas aspek diri, sosial, pekerjaan, dan hubungan secara mendalam.</p>
  </div>
  <div class="feature-box">
    <br>
    <h5>4. Soul Calling (Rp499.000)</h5>
    <p>Program transformasi selama satu bulan! Nikmati afirmasi harian dan empat kali sesi coaching one-on-one untuk perubahan yang lebih nyata.</p>
  </div>
</div>
      <br>
      <br>

      <div class="features-container">
  <div class="feature-box">
    <br>
    <h5>Bundling Eksplorasi Diri Komplit (Rp199.000)</h5>
    <p>Sacred Mapping + Behavior Analysis.</p>
  </div>
  <div class="feature-box">
    <br>
    <h5>Bundling Transformasi Intensif (Rp399.000)</h5>
    <p>Sacred Mapping + Behavior Analysis + Modern Psychology.</p>
  </div>
  <div class="feature-box">
    <br>
    <h5>Bundling Perjalanan Komprehensif (Rp799.000)</h5>
    <p>Sacred Mapping + Behavior Analysis + Modern Psychology + Soul Calling.</p>
  </div>
  <div class="feature-box">
    <br>
    <h5>Special Promo!</h5>
    <p>Bundling setelah setiap sesi pertemuan/ menggunakan kode referal via WhatsApp!</p>
  </div>
            

</div>



      <br>
      <br>
    
  </body>



@include('layouts.footerlanding')
@include('layouts.formdashboard')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection



