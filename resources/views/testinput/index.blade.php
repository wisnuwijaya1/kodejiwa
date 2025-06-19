@extends('layouts.applogin')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@if($errors->any())
<script>
 Swal.fire(
       'Gagal Membuat User',
       '{{ $errors->first() }}',
       'error')

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
		<header class="content__title">
			
			<h1>Hasil</h1>
			
		</header>		
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
						<textarea id="message" name="message" rows="15" cols="170"  style="color: #fefbdc; background-color: #081c1d" disabled>
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
			<div class="col text-right nav-primary" style="text-align: center;">
		<a href="https://wa.me/628157098999?text=Halo%20saya%20tertarik%20dengan%20jasa%20Anda" target="_blank" class="btn btn-primary btn3d fw-bold" id="btnwa"  enabled>Hubungi Kami</a>

<
	</div>
	<!-- </div>
</div> -->

</div>

@include('layouts.footerlanding')
@include('testinput.form')
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('success'))
                    <script>
                    Swal.fire(
                    'Data Save Success',
                    'Data Berhasil Di Simpan',
                    'success')
                    </script>
                    @endif


@endsection
