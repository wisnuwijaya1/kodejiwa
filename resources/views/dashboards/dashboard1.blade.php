@extends('layouts.app')
@section('content')
<br>


 {{-- @if(Session::has('success')) --}}
                    {{-- @include('layouts.flash-success',[ 'message'=> Session('success') ]) --}}
       {{--              @endif --}}
                    
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>
<style>
  .outer-div {
      display: flex;
    }

    .inner-div {
        background-color: #e1f5fe;
        margin: 0px 20px;
        padding: 20px;
        border: 1px solid #81d4fa;
    }
</style>
<?php

function hariIndo ($hariInggris) {
  switch ($hariInggris) {
    case 'Sunday':
      return 'Minggu';
    case 'Monday':
      return 'Senin';
    case 'Tuesday':
      return 'Selasa';
    case 'Wednesday':
      return 'Rabu';
    case 'Thursday':
      return 'Kamis';
    case 'Friday':
      return 'Jumat';
    case 'Saturday':
      return 'Sabtu';
    default:
      return 'hari tidak valid';
  }
}
  ?>

<?php
$bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
                $bulan[date('m')]
  ?>

</header>
  <medium>Welcome, <strong>{{ $username }}</strong> </medium>
  
    <?php 
    $hariBahasaInggris = date('l');
    $hariBahasaIndonesia = hariIndo($hariBahasaInggris);
    echo "{$hariBahasaIndonesia}, ";
    echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') 
    ?>
    <strong style=" text-align: right; font-family: verdana;" id="jam"></strong> <?php echo date('A') ?>

<script type="text/javascript">
 window.onload = function() { jam(); }

 function jam() {
  var e = document.getElementById('jam'),
  d = new Date(), h, m, s;
  h = d.getHours();
  m = set(d.getMinutes());
  s = set(d.getSeconds());

  e.innerHTML = h +':'+ m +':'+ s;

  setTimeout('jam()', 1000);
 }

 function set(e) {
  e = e < 10 ? '0'+ e : e;
  return e;
 }
</script>
<body>
<br>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <br>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute" style="background-color: #ff4e00;
background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);
">
                <i><img src="{{asset('Person.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>

              <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 25%">Total Pengguna</p>
                <h4 class="text-sm-center" id="usertotal" style="margin-top: -5%; margin-left: 25%;">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-info text-center border-radius-xl mt-n4 position-absolute" style="background-color: #e35a5c;
background-image: linear-gradient(315deg, #e35a5c 0%, #e35a5c 74%);
">
                <i><img src="{{asset('Person.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
             <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 15%;">Total Pengguna Baru / Bulan</p>
                <h4 class="text-sm-center" id="userbulan" style="margin-top: -5%; margin-left: 15%;">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute" style="background-color: #bb5182;
background-image: linear-gradient(315deg, #bb5182 0%, #bb5182 74%);
">
                <i><img src="{{asset('Person.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
              <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 20%;">Total Pengguna Baru / Minggu</p>
                <h4 class="text-sm-center" id="userminggu" style="margin-top: -5%; margin-left: 20%;">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="
              icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute"style="background-color: #7e568e;
background-image: linear-gradient(315deg, #7e568e 0%, #7e568e 74%);
">
                <i><img src="{{asset('Person.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
              <div class="text-end pt-0">
                 <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 20%;">Total Pengguna Baru / Hari</p>
                <h4 class="text-sm-center" id="userhari" style="margin-top: -5%; margin-left: 20%;">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div> --}}
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute" style="background-color: #ff4e00;
background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);
">
                <i><img src="{{asset('Donasi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>

              <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 25%">Total Donasi</p>
                <h4 class="text-sm-center" id="donasitotaltransaksi" style="margin-top: -5%; margin-left: 25%;">0</h4>
                <h4 class="text-sm-center" id="donasitotal" style="margin-top: -5%; margin-left: 25%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-info text-center border-radius-xl mt-n4 position-absolute" style="background-color: #e35a5c;
background-image: linear-gradient(315deg, #e35a5c 0%, #e35a5c 74%);
">
                <i><img src="{{asset('Donasi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
             <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 15%;">Total Donasi / Bulan</p>
                <h4 class="text-sm-center" id="donasibulantransaksi" style="margin-top: -5%; margin-left: 15%;">0</h4>
                <h4 class="text-sm-center" id="donasibulan" style="margin-top: -5%; margin-left: 15%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute" style="background-color: #bb5182;
background-image: linear-gradient(315deg, #bb5182 0%, #bb5182 74%);
">
                <i><img src="{{asset('Donasi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
              <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 20%;">Total Donasi / Minggu</p>
                <h4 class="text-sm-center" id="donasiminggutransaksi" style="margin-top: -5%; margin-left: 20%;">0</h4>
                <h4 class="text-sm-center" id="donasiminggu" style="margin-top: -5%; margin-left: 20%;">Rp. 0</h4>

              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="
              icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute"style="background-color: #7e568e;
background-image: linear-gradient(315deg, #7e568e 0%, #7e568e 74%);
">
                <i><img src="{{asset('Donasi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
              <div class="text-end pt-0">
                 <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 20%;">Total Donasi / Hari</p>
                 <h4 class="text-sm-center" id="donasiharitransaksi" style="margin-top: -5%; margin-left: 20%;">0</h4>
                <h4 class="text-sm-center" id="donasihari" style="margin-top: -5%; margin-left: 20%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute" style="background-color: #ff4e00;
background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);
">
                <i><img src="{{asset('Transaksi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>

              <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 25%">Total Transaksi</p>
                <h4 class="text-sm-center" id="transaksitotal" style="margin-top: -5%; margin-left: 25%;">0</h4>
                <h4 class="text-sm-center" id="transaksitotaltotal" style="margin-top: -5%; margin-left: 25%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-info text-center border-radius-xl mt-n4 position-absolute" style="background-color: #e35a5c;
background-image: linear-gradient(315deg, #e35a5c 0%, #e35a5c 74%);
">
                <i><img src="{{asset('Transaksi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
             <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 15%;">Total Transaksi / Bulan</p>
                <h4 class="text-sm-center" id="transaksibulan" style="margin-top: -5%; margin-left: 15%;">0</h4>
                <h4 class="text-sm-center" id="transaksitotalbulan" style="margin-top: -5%; margin-left: 15%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute" style="background-color: #bb5182;
background-image: linear-gradient(315deg, #bb5182 0%, #bb5182 74%);
">
                <i><img src="{{asset('Transaksi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
              <div class="text-end pt-0">
                <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 20%;">Total Transaksi / Minggu</p>
                <h4 class="text-sm-center" id="transaksiminggu" style="margin-top: -5%; margin-left: 20%;">0</h4>
                <h4 class="text-sm-center" id="transaksitotalminggu" style="margin-top: -5%; margin-left: 20%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div> --}}
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-4 pt-5">
              <div class="
              icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute"style="background-color: #7e568e;
background-image: linear-gradient(315deg, #7e568e 0%, #7e568e 74%);
">
               <i><img src="{{asset('Transaksi.svg')}}" style="width: 55%; margin-top: -10%;"></i>
              </div>
              <div class="text-end pt-0">
                 <p class="text-sm-center text-capitalize" style="margin-top: -5%; margin-left: 20%;">Total Transaksi / Hari</p>
                 <h4 class="text-sm-center" id="transaksitoday" style="margin-top: -5%; margin-left: 20%;">0</h4>
                 <h4 class="text-sm-center" id="transaksitotaltoday" style="margin-top: -5%; margin-left: 20%;">Rp. 0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
{{--             <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div> --}}
          </div>
        </div>
      </div>
      </div>
      </div>
      
        
  </main>
 
 </script>

  <!--   Core JS Files   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('default/assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
</body>

</html>
</body>
<script>
  $(document).ready(function(){
    $('#mitra').on('change', function () {
              var url = $(this).val(); // mendapatkan nilai value
              if (url) { // reques URL
                  window.location = url; // pindah ke halaman yang dituju
              }
              return false;
        });    

     $("#mitra").select2({
          placeholder: "Pilih Nama Mitra",
          allowClear: true
      });


});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    @if(Session::has('success'))
    <script>
        toastr.success(
            'Data Berhasil di Simpan'
        )

    </script>
    @endif
   
            <footer class="bg-light py-5">
  <div class="container">
    <div class="large text-center text-muted">
      Copyright &copy;
      <script>
        document.write(new Date().getFullYear());


      </script>
      - Wisnu Wijaya (wisnuwijaya1609@gmail.com). All rights reserved.
    </div>
  </div>
</footer>
        </div>
    
@endsection


