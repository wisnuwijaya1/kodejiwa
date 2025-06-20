<!DOCTYPE html>
<html lang="en">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="kodejiwa.png">

    <title>Kode Jiwa</title>

    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('default/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('default/vendors/animate.css/animate.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('default/vendors/jquery-scrollbar/jquery.scrollbar.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('default/vendors/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('default/vendors/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('default/vendors/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('default/vendors/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('default/vendors/trumbowyg/ui/trumbowyg.min.css')}}">
    <link rel="stylesheet" href="{{asset('default/vendors/flatpickr/flatpickr.min.css')}}" />
    <link rel="stylesheet" href="{{asset('default/vendors/rateyo/jquery.rateyo.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('default/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('default/vendors/sweetalert2/sweetalert2.min.css')}}">

    <!-- App styles -->
    {{-- <link rel="stylesheet" href="{{asset('default/css/app.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/added.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

    
      
</head>

<body data-ma-theme="blue" >

 {{--    <main class="main">
        <div class="page-loader">
            <div class="page-loader__spinner">
                <img src="{{asset('kodejiwa.png')}}" class="spinner-img" >
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="23" fill="none" stroke-width="4" stroke-miterlimit="1" />
                </svg>
            </div>
        </div> --}}

        @include('layouts.headerlogin')
        <!-- @include('layouts.sidebar') -->
        

        <div class="content content--full">
            @yield('content')
       
        </div>
    </main>

    <script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('default/vendors/popper.js/popper.min.js')}}"></script>
   <script src="{{asset('default/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('default/vendors/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('default/vendors/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>

    {{-- <script src="{{asset('default/vendors/flot/jquery.flot.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/flot/jquery.flot.resize.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/flot.curvedlines/curvedLines.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/jqvmap/jquery.vmap.min.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/jqvmap/maps/jquery.vmap.world.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/easy-pie-chart/jquery.easypiechart.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/salvattore/salvattore.min.js')}}"></script>
    {{-- <script src="{{asset('default/vendors/sparkline/jquery.sparkline.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/moment/moment.min.js')}}"></script>
    {{-- <script src="{{asset('default/vendors/fullcalendar/fullcalendar.min.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/flot.orderbars/jquery.flot.orderBars.js')}}"></script> --}}

    {{-- <script src="{{asset('default/vendors/bootstrap-notify/bootstrap-notify.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/sweetalert2/sweetalert2.min.js')}}"></script>

    {{-- <script src="{{asset('default/vendors/jquery-mask-plugin/jquery.mask.min.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/select2/js/select2.full.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('default/vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('default/vendors/nouislider/nouislider.min.js')}}"></script>
    {{-- <script src="{{asset('default/vendors/trumbowyg/trumbowyg.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/flatpickr/flatpickr.min.js')}}"></script>
    {{-- <script src="{{asset('default/vendors/rateyo/jquery.rateyo.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/jquery-text-counter/textcounter.min.js')}}"></script>
    <script src="{{asset('default/vendors/autosize/autosize.min.js')}}"></script>
    {{-- <script src="{{asset('default/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/datatables/jquery.dataTables.min.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/datatables-buttons/dataTables.buttons.min.js')}}"></script> --}}
    {{-- <script src="{{asset('default/vendors/datatables-buttons/buttons.print.min.js')}}"></script> --}}
    <script src="{{asset('default/vendors/jszip/jszip.min.js')}}"></script>
    {{-- <script src="{{asset('default/vendors/datatables-buttons/buttons.html5.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/datatablecolvisbutton.js')}}"></script> --}}
    {{-- <script src="{{asset('js/charts/chart.min.js')}}"></script> --}}
    
    <!-- App functions and actions -->
    <script src="{{asset('default/js/app.min.js')}}"></script>
    
    {{-- map --}}
    <script src="{{asset('js/getcoordinate.js')}}"></script>
    {{-- <script src="{{asset('js/customdatatable.js') }}"></script> --}}
    {{-- <script src="{{asset('js/customdatatable2.js') }}"></script> --}}
    <script src="{{asset('js/proses.js')}}"></script>
    <script src="{{asset('js/customnotif.js')}}"></script>
    <script src="{{asset('js/showdetail.js')}}"></script>
    <script src="{{asset('js/ws.js')}}"></script>
    @yield('js')

</body>

</html>