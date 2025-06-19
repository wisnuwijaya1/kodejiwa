@extends('layouts.app_login')
@section('content')
<style type="text/css">
    /* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #ecf0f3;
}

.wrapper {
    max-width: 350px;
    min-height: 450px;
    /*margin: 200px auto;*/
    /*position: relative;*/
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #FFBC8D, -13px -13px 20px #FFCFAC;
    opacity: 0.97;
}

.logo {
    width: 80px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #03A9F4;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #039BE5;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4;
}

.wrapper a:hover {
    color: #039BE5;
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}


body {
  background: url('Login Page Image.svg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
  width: 100%;
}

</style>

<form method="POST" action="{{ route('login2') }}">
    @csrf
<div class="login">    
<div class="wrapper" >
        <div class="col-12">
            <img src="{{asset('pospaykomunitas.png')}}" alt="" style="width: 100%;">
        </div>
        <div class="text-center mt-4 name">
            Pospay Komunitas
        </div>
        <form class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username" @error('username') is-invalid @enderror name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>

            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" @error('password') is-invalid @enderror name="password" value="{{ old('username') }}" required autocomplete="off" autofocus>
            </div>
            <button class="btn mt-3" style="background-color: #E77717; padding: 10px 80px; border-radius: 50px;  ">Login</button>
        </form>
        <div class="text-center fs-6">
            {{-- <a href="#">Forget password?</a> or <a href="#">Sign up</a> --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('message'))
                                {{-- <div class="alert alert-success"> --}}
                                        <script>
                    Swal.fire(
                    'Gagal Login',
                    '{{ session()->get('message') }}',
                    'error')
                    </script>
                    @endif
                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
                     <script src="https://cdn.builder.io/js/webcomponents"></script>
                     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
           
</form>
</div>
@endsection






{{-- @extends('layouts.app_login')
@section('content')
<style type="text/css">
.example2::-webkit-input-placeholder{
    color: white;
</style>
<body background ="Hero1.png" style="
 
background-repeat:no-repeat;
background-size:contain;
background-position:left;">
<img src="graphic element 1.svg" alt="logo" style="width: 70%; heigh: 100%; margin-top: 15%; margin-left: 50%; background-repeat: no-repeat;
  position: fixed; background-size: 45%;">
</body>
<body>
<div>
    <img src="bumn.svg" alt="logo" style="width: 10%; margin-left: 70%; margin-top: 2%;">
    <img src="posindonesia.svg" alt="logo" style="width: 5%; margin-left: 82%; margin-top: -5%;">
</div>


<div class="login" style="margin-left: 57%; margin-top: -5%;">

    <div class="login__block active" id="l-login" style="background: rgba(240, 105, 14, 0.7);  border-radius: 25px;">
        <div class="login__block__header" style="background-color: #f2ece9; border-radius: 25px;">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('pospaykomunitas.png')}}" style="width: 100%;">
                   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center" style="color: black;">
                    <h5>Login</h5>
                </div>
                <div class="col-md-3 text-right undisplay">
                    <a  data-ma-action="login-switch"data-ma-target="#l-forget-password" href="#" style="color: white;" title="forgot password? click me!" >
                        <i class="zmdi zmdi-info-outline"></i>
                    </a>                    
                </div>
            </div>

        </div>

        <div class="login__block__body" >
            
 <form method="POST" action="{{ route('login2') }}">
     @csrf
        <div class="row">
          <!-- Kolom 1 -->
            <div class="col" style="margin-left: -100%;">

            </div>
            <!-- Kolom 2 -->
            <div class="col" style="margin-left: 10%; margin-top: 10%;">
              <div class="mx-auto">
                <form action="">
                  <div class="form-group">
                    <img src="email.svg" style="margin-left: -10%;">
                    <input type="text" placeholder="Email / No HP / NIPPOS" style="width: 70%;" @error('username') is-invalid @enderror name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>Username or Password do not match</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <img src="passicon.svg" style="margin-left: -10%;">
                    <input type="password" placeholder="Password" style="width: 70%;" @error('password') is-invalid @enderror name="password" value="{{ old('username') }}" required autocomplete="off" autofocus>
                      @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>Username or Password do not match</strong>
                    </span>
                    @enderror
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('message'))

                                        <script>
                    Swal.fire(
                    'Gagal Login',
                    '{{ session()->get('message') }}',
                    'error')
                    </script>

                    @endif
                <button  style="background-color: #E77717; padding: 10px 80px; border-radius: 50px;  "><strong style="color: white;">Login</strong></button>
                  
  
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    

  </body>
 
   </form>

  <script src="https://cdn.builder.io/js/webcomponents"></script>
  <builder-component model="page" api-key="YOUR_API_KEY"></builder-component>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


@endsection
 --}}