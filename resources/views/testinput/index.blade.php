@extends('layouts.applogin')
@section('content')
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

      .wa-button {
      display: inline-flex;
      align-items: center;
      background-color: #25D366;
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 18px;
      padding: 14px 28px;
      border-radius: 999px;
      box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .wa-button:hover {
      background-color: #1ebe5b;
      transform: translateY(-2px);
    }

    .wa-button img {
      width: 24px;
      height: 24px;
      margin-right: 12px;
    }

    @media (max-width: 480px) {
      .section h2 {
        font-size: 2rem;
      }

      .section p {
        font-size: 1rem;
      }

      .wa-button {
        font-size: 16px;
        padding: 12px 22px;
      }

      .wa-button img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
      }
    }
      textarea {
  width: 100%;
  max-width: 100%;
  min-height: 300px;
  box-sizing: border-box;
  font-size: 1rem;
  padding: 1rem;
  resize: vertical;
}

/* Tambahan untuk tampilan lebih kecil seperti HP */
@media screen and (max-width: 768px) {
  textarea {
    min-height: 250px;
    font-size: 0.95rem;
  }
}

@media screen and (max-width: 480px) {
  textarea {
    min-height: 200px;
    font-size: 0.9rem;
  }
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('success'))
                    <script>
                    Swal.fire(
                    'Data Save Success',
                    'Data Berhasil Di Simpan',
                    'success')
                    </script>
                    @endif

<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
	<div class="col-md-14">
		
	</div>
	
	<div class="col text-right nav-primary" style="text-align: center;">
		<button class="btn btn-primary btn3d fw-bold" onclick="goCreate(this)" id="btntest" data-toggle="modal" data-target="#create-new-modal" enabled>Lanjutkan Test</button>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>

</div>
 <!-- <div class="col-md-14">
<div class="card"> -->
<div class="form-group">
					<input type="text" class="form-control" id="namalengkap" name="name" default=""  value="{{ $name }}" hidden>
					<input type="text" class="form-control" id="tanggallahir" name="tanggal" default=""  value="{{ $tanggal }}" hidden>
					<input type="text" class="form-control" id="nohp" name="nohp" default=""  value="{{ $nohp }}" hidden>
				</div>
	<div class="card-body content-table">
			<table id="datatable" class="table table-bordered table-striped">

				<thead class="thead-default">
					<tr>
						
						<th ><label for="message"  style="color: #fefbdc;">Hasil Test:</label><br>
						<textarea id="message" name="message" rows="14" cols="170"  style="color: #fefbdc; background-color: #23342B; font-size: 20px" disabled>
							<?php  if (isset($jawaban)) {
    print $jawaban;
} else {
    $jawaban = 'Temukan jawaban mu';
} ?></textarea></th>						
						
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
      <div class="col text-right" style="text-align: center;">
      <h3 style="font: Helvetica Now; text-align: center; color: #fefbdc;">Hubungi ARA untuk lanjut ke tahap berikutnya!</h3>
      <br>
<a href="https://wa.me/628157098999?text=Halo%20saya%20tertarik%20dengan%20jasa%20Anda%20Nama: <?php if (isset($name)) {
    print $name;
}?>%20Tanggal Lahir :<?php if (isset($tanggal)) {
    print $tanggal;
}?>" class="wa-button" target="_blank" id="btnwa">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA" class="wa-icon">
    Hubungi Ara via WhatsApp
  </a>
			
			

	</div>
	<!-- </div>
</div> -->
</div>
</div>

@include('layouts.footerlanding')
<script>
document.getElementById("btnwa").addEventListener("click", function () {
  const name = document.getElementById("namalengkap").value;
  const tanggal = document.getElementById("tanggallahir").value;
  const nohp = document.getElementById("nohp").value;

  fetch("{{ route('testinput.store') }}", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
      name: name,
      tanggal: tanggal,
      nohp:nohp,
    })
  })
 
});
</script>
<script>
  const message = document.getElementById("message");  


        if (message.value.trim() === "") {
 
	  btntest.hidden = false;
      btnwa.hidden = true;


		 }
		  else {

      btntest.hidden = true;
      btnwa.hidden = false;
    }

</script>


<script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>



@endsection
