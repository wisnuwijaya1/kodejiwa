<script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>


        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a href="{{route('dashboardawal')}}" class="header__logo hidden-sm-dow text-center">
        <img src="{{asset('Kode Jiwa - Logo.png')}}" width="125" height="90">   
    </a>

                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-black rounded" type="button" data-bs-toggle="collapse" id="collapse" data-bs-target="#navbarResponsive" >
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;"  href="#profil">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;" href="#tentang">Tentang</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="hover-underline-animation" style="color: #fefbdc; margin-left: 50px;" href="{{ route('landing.hubungi') }}">Hubungi Kami</a></li>
                        <br>
                        <!-- <span
                          class="btn btn-primary btn3d"onclick="goCreate(this)" style="margin-left: 50px; padding: 5px 30px 5px 30px;" data-toggle="modal" data-target="#create-new-modal1"
                        >
                          <span> Login </span>
                        </span> -->
                    </ul>

                </div>

            </div>

        </nav>


    <script>
        function login(){
        window.location.href = '{{ route('login') }}';
        }
    </script>