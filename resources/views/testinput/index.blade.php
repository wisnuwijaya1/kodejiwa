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

	<div class="card-body content-table">
			<table id="datatable" class="table table-bordered table-striped">

				<thead class="thead-default">
					<tr>
						
						<th ><label for="message"  style="color: #fefbdc;">Hasil Test:</label><br>
						<textarea id="message" name="message" rows="15" cols="170"  style="color: #fefbdc; background-color: #23342B" disabled>
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
			<h1 style="font-family: Montserrat; text-align: center; color: #fefbdc;">🔹Jika Ingin Melanjutkan Konsultasi Dengan Psikolog Silahkan Klik Tombol Hubungi Kami🔹</h1>
			<div class="col text-right nav-primary" style="text-align: center;">
		<a href="https://wa.me/628157098999?text=Halo%20saya%20tertarik%20dengan%20jasa%20Anda" target="_blank" class="btn btn-primary btn3d fw-bold" id="btnwa"  enabled>Hubungi Kami</a>

<
	</div>
	<!-- </div>
</div> -->
</div>
</div>

@include('layouts.footerlanding')

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
