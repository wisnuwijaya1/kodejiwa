<style>
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
<script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>


        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a href="{{route('dashboardawal')}}" class="header__logo hidden-sm-dow text-center">
        <img src="{{asset('Kode Jiwa - Logo.png')}}" width="125" height="90">   
    </a>

                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-black rounded btn-3d" type="button" data-bs-toggle="collapse" id="collapse" data-bs-target="#navbarResponsive" >
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;"  href="{{route('dashboardawal')}}">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;" href="{{route('dashboardawal')}}">Tentang</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;" href="{{route('dashboardawal')}}">ARA</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;" href="{{ route('landing.hubungi') }}">Hubungi Kami</a></li>
                        <br>
                        <!-- <button onclick="login()" href="{{route('login')}}" class="btn btn-primary btn3d fw-bold" type="button" style="margin-left: 50px; padding: 5px 30px 5px 30px; color: #fefbdc;">Login</button> -->
                    </ul>

                </div>

            </div>

        </nav>


    <script>
        function login(){
        window.location.href = '{{ route('login') }}';
        }
    </script>
