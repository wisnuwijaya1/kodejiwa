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
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>

  </head>

  <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <img style="width: 100%; height: auto; "  src="{{asset('Tentang Header.svg')}}">
              <br>

 
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <h1 style="font-family: Montserrat; text-align: center;">Scope Komunitas</h1>
                        <br>
                        <div style="text-align: center; font-size: 20px; line-height: 40px;" ><p class="lead fw-normal text-muted mb-5">Komunitas dalam hal ini bisa berbentuk badan usaha
                      (Koperasi), Instansi pemerintah/non pemerintah dan atau
                      non badan usaha seperti organisasi, yayasan, perkumpulan,
                      pekerja pabrik dll</p></div>
                      <br>
                      <br>
                        <img src="{{asset('Laptop Komunitas.svg')}}" class="img-fluid" />
                    </div>
                </div>
            </div>


                <br>
                <br>
                <br>
                <br>
                <br>
                <br>


            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 style="font-family: Montserrat;" >Ruang Lingkup Kerjasama</h1>
                            <br>
                            <p class="lead fw-normal text-muted mb-5" style="font-size: 20px; line-height: 25px;">Untuk dapat menjadi bagian dari komunitas Pospay maka
                        komunitas harus diikat dengan kerjasama dan akan
                        dipandang sebagai mitra PT. Pos Indonesia dalam
                        penggunaan aplikasi Pospay.
                        <br>
                        Kerjsama dapat dilakukan secara terpusat, regional ata
                        setingkat KC disesuaikan dengan skope dari
                        organisasi/komunitas bertalian.</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">

                                 

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="masthead-device-mockup">
                            
                            <div class="device-wrapper">

                                        <img src="{{asset('playground_assets3/rectangle5652-smu8-600w.png')}}" class="img-fluid" />
                                    
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
                            <h1 style="font-family: Montserrat;" >Ruang Lingkup Komunitas</h1>
                            <br>
                            <p class="lead fw-normal text-muted mb-5" style="font-size: 20px; line-height: 25px;">Ruang lingkup komunitas ditinjau dari cakupan
                        pengguna/anggota dapat dikategorikan sebagai komunitas
                        Nasional atau Regional (Propinsi / Kabupaten/Kota).
                        <br>
                        Untuk Ruang lingkup yang bersifat Nasional / Regional
                        Propinsi secara sistem dapat memiliki sub kepengurusan
                        organisasi ditingkat rayon.</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">

                                 

                            </div>
                        </div>
                    </div>
                   <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 style="font-family: Montserrat;" >Scope Keanggotaan Komunitas</h1>
                            <br>
                            <p class="lead fw-normal text-muted mb-5" style="font-size: 20px; line-height: 25px;">Ruang lingkup keanggotaan komunitas akan berpengaruh
                        terhadap keanggotaan organisasinya dan akan tergambar
                        dalam fungsi aplikasi.
                        <br>
                        Secara mendasar komunitas akan memiliki seorang ketua,
                        bendahara dan Administrator sebagai delegasi dari
                        kewenangan ketua komunitas.</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">

                                 

                            </div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection



