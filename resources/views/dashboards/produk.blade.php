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

    <div class="container px-6">
                <div class="row gx-6 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 style="font-family: Montserrat;">Permudah segala kebutuhan anda</h1>
                            <br>
                            <p class="lead fw-normal text-muted mb-5">Temukan potensi terbaikmu dengan tes premium kami, solusi tepat untuk mengungkap kekuatan dan membuka jalan menuju sukses!</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">

                                 <a href="{{route('landing.hubungi')}}"
                        class="landing-page-pospay-komunitas-button-large1primary"
                      >
                        <span
                          class="landing-page-pospay-komunitas-text4 buttonLarge"
                        >
                          <span>Mulai Gabung</span>
                        </span>
                      </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">


                        <img src="{{asset('test1.png')}}" style="max-width: 100%; margin-left: -10px;" class="img-fluid"  />
                           
           
                    </div>
                </div>
            </div>

<br>


</body>

        
@include('layouts.footerlanding')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection



