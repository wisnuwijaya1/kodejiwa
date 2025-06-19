<!DOCTYPE html>
<html lang="en">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="kodejiwa.png">

    <title>Pospay Komunitas</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="default/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="default/vendors/animate.css/animate.min.css">
  
    <link rel="stylesheet" href="default/css/app.min.css">
    <link rel="stylesheet" href="css/added.css">
        
</head>

<body data-ma-theme="blue" >

            @yield('content')
   
    <script src="default/vendors/jquery/jquery.min.js"></script>
    <script src="default/vendors/popper.js/popper.min.js"></script>
    <script src="default/vendors/bootstrap/js/bootstrap.min.js"></script>
   
    <!-- App functions and actions -->
    <script src="default/js/app.min.js"></script>
    
    @yield('js')

</body>

</html>