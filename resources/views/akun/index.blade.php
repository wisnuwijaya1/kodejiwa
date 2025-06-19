@extends('layouts.appform')
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

<div class="row">
	<div class="col-md-14">
		<header class="content__title">
			
			<h1>Data User</h1>
			<small>List</small>
		</header>		
	</div>
	<div class="col text-right nav-primary">
		<button class="btn btn-primary btn-sm" onclick="goCreate(this)" data-toggle="modal" data-target="#create-new-modal" enabled>Buat Baru</button>
	</div>
</div>
 <div class="col-md-14">
<div class="card">
	<div class="card-body content-table">
			<table id="datatable" class="table table-bordered table-striped">

				<thead class="thead-default">
					<tr>
						<th width="40">No</th>
						<th >Created</th>
						<th >Name</th>						
						<th >Username</th>						
						<th >Email</th>
						<th >Nomor HP</th>
						<th >Role</th>
						<th >Status</th>
						<th width="40">Act</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
	</div>
</div>
</div>
@include('akun.form')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('success'))
                    <script>
                    Swal.fire(
                    'Data Save Success',
                    'Data Berhasil Di Simpan',
                    'success')
                    </script>
                    @endif


@include('layouts.footer')
@endsection
