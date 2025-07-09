@extends('layouts.applogin')
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
        background-color: #23342B;

      }

      .wide {
  width:100%;
  height:100%;
  height:calc(100% - 1px);
  height:100%;
  background-size:cover;
}



 
    </style>

  </head>

  <body>
    <canvas id="bg-canvas"></canvas>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

     
    <!-- <img style="width: 100%; height: auto; "  src="{{asset('Hubungi Header.svg')}}"> -->
              <br>

              <div class="container px-6">
    <div class="row m-0 py-5">
      <h3 style="font-size: 26px; color: #fefbdc">Kunjungi Kami</h3>
      <br>
      <p style="font-size: 20px; line-height: 40px; color: #fefbdc">Jl. Kebon Kopi No.173, Cibeureum</p>
      <p style="font-size: 20px; line-height: 40px; color: #fefbdc">Kota Cimahi, Jawa Barat 40535, Indonesia</p>
       <div class="u-i-footer-light-frame76">
                  <img
                    src="{{asset('playground_assets4/iconwa.png')}}" 
                    alt="clarityphonehandsetline6252"
                    class="u-i-footer-light-clarityphonehandsetline"
                  />
                  <p class="u-i-footer-light-text12 paragraphDefault" style="color: #fefbdc; font-size: 20px;">
                    <a href="https://wa.me/628157098999?text=Halo%20saya%20tertarik%20dengan%20jasa%20Anda" target="_blank">08157098999</a>
                  </p>
                </div>
                <div class="my-2">
        <img src="{{asset('hubungi/colori649-scas.svg')}}" style="float:left; margin:0 8px 4px 0;" /><a style="text-decoration: underline; font-size:  18px; color: #fefbdc" href="https://www.instagram.com/kodejiwa/?hl=en" target="_blank">@kodejiwa</a>
      </div>

     

    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8651787245394!2d107.61520981431713!3d-6.9067207695120985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64a0d1c259d%3A0x847f5df767b81f2b!2sIndonesian%20post.%20PT!5e0!3m2!1sen!2sid!4v1661753513196!5m2!1sen!2sid" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <iframe src="https://maps.google.com/maps?q=covina+sport+center&output=embed" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    

    </div>

    </div>
    </div>

    

  </body>

<script>
const canvas = document.getElementById('bg-canvas');
const ctx = canvas.getContext('2d');

function resizeCanvas() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}
window.addEventListener('resize', resizeCanvas);
resizeCanvas();

// Bintang dengan posisi & opacity random + kecepatan gerak random
const starCount = 200;
const stars = [];
for (let i = 0; i < starCount; i++) {
  stars.push({
    x: Math.random() * canvas.width,
    y: Math.random() * canvas.height,
    radius: Math.random() * 1.5 + 0.5,
    opacity: Math.random(),
    deltaOpacity: (Math.random() * 0.02) + 0.010, // kecepatan blink
    deltaX: (Math.random() - 0.5) * 0.2,           // gerak horizontal pelan
    deltaY: (Math.random() - 0.5) * 0.2            // gerak vertikal pelan
  });
}

function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Background gelap
  ctx.fillStyle = "#1c2e20";
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  // Gambar & update bintang
  stars.forEach(star => {
    // Gambar bintang
    ctx.beginPath();
    ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
    ctx.fillStyle = `rgba(255, 255, 255, ${star.opacity})`;
    ctx.fill();

    // Update opacity (blink)
    star.opacity += star.deltaOpacity;
    if (star.opacity >= 1 || star.opacity <= 0) {
      star.deltaOpacity = -star.deltaOpacity;
    }

    // Update posisi (floating)
    star.x += star.deltaX;
    star.y += star.deltaY;

    // Loop posisi jika keluar canvas
    if (star.x < 0) star.x = canvas.width;
    if (star.x > canvas.width) star.x = 0;
    if (star.y < 0) star.y = canvas.height;
    if (star.y > canvas.height) star.y = 0;
  });

  requestAnimationFrame(draw);
}
draw();
</script>

<style>
#bg-canvas {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: -1; /* canvas di bawah konten HTML */
  display: block;
}
</style>


@include('layouts.footerlanding')
@include('layouts.formdashboard')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection



