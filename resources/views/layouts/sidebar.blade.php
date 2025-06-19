{{-- <script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script> --}}

<aside class="sidebar sidebar--hidden">
    <div class="scrollbar-inner">
        <br>

        
            <div class="user__info">
                <a href="{{route('home')}}">
                <img style="width: 100%;" src="{{asset('pospaykomunitas.png')}}">
            </a>
            </div>
    <br>
        
        <ul class="navigation">
            <li>
                <a href="{{route('home')}}" class="hover-text-blue" style="font-weight: bold;">
                    <img src="{{asset('icons/png/dashboard.png')}}" class="sidebar-img" > Dashboard
                </a>
            </li>
            
            <li>
                <a href="{{route('akun.index')}}" class="hover-text-blue" style="font-weight: bold;">
                    <img src="{{asset('icons/png/user_management.png')}}" class="sidebar-img" > Kelola User
                </a>

            </li>


            <li>
                <a href="{{route('register.index')}}" class="hover-text-blue" style="font-weight: bold;">
                    <img src="{{asset('icons/png/registration.png')}}" class="sidebar-img" > Registrasi Komunitas
                </a>

            </li>


            <li class="navigation__sub" onclick="animasi()">
                <a href="#" class="hover-text-blue" style="font-weight: bold;">
                    <img src="{{asset('icons/png/content.png')}}" class="sidebar-img"> Content Manajemen
                    <img id="chevron" src="{{asset('icons/png/Chevron.svg')}}" class="sidebar-dd">
                </a>

                <ul onclick="animasi1()" id="ul">

                    <li>
                        <a href="{{route('content.index')}}" class="hover-text-blue">
                            <img src="{{asset('icons/png/create_content.png')}}" class="sidebarsub-img"> <strong>Create Content</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('content.manajemen')}}" class="hover-text-blue">
                            <img src="{{asset('icons/png/content_dashboard.png')}}" class="sidebarsub-img"> <strong>Content</strong>
                        </a>
                    </li>

                </ul>
            </li>

    
           

                </ul>
            </li>

        </ul>
    </div>
</aside>
<script>
    
    function animasi(){
       
        var a = document.getElementById("ul").style.display
        
        console.log(a);
         if (a=='') {
            $("#chevron").attr("src","{{ asset('icons/png/Chevron up.svg') }}");
        }
        if (a=='block') {
            $("#chevron").attr("src","{{ asset('icons/png/Chevron.svg') }}");
        }
        if (a=='none') {
            $("#chevron").attr("src","{{ asset('icons/png/Chevron up.svg') }}");
        }
    }


</script>
