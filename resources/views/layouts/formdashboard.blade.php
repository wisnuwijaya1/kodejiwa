

<div class="modal fade" id="create-new-modal" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content text-white" style="background-color: #23342B;">
			<div class="modal-header">
				<h5 class="modal-title pull-left">Form Registrasi Data Diri</h5>
			</div>
			 <form action="{{ route('dashboardawal.store') }}" method="POST">
			 	@csrf
			<div class="modal-body">
				<input type="text" store="id" value="" class="undisplay">

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" class="form-control" name="name" default="" placeholder="John Doe" value="{{ old('name') }}" required>
					<div class="invalid-feedback text-danger"></div>
					<i class="form-group__bar"></i>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal"  placeholder="10-10-2000" default="" value="{{ old('tanggal') }}" required>
					<div class="invalid-feedback text-danger"></div>
					<i class="form-group__bar"></i>
				</div>
                <div class="form-group">
					<label>Email</label>
					@error('email')
						<div class="text-danger">{{ $message }}</div>
					@enderror
					<input type="email" class="form-control" name="email" default="" placeholder="johndoe@gmail.com" value="{{ old('email') }}" required>
					<div class="invalid-feedback text-danger"></div>
					<i class="form-group__bar"></i>
				</div>
                <div class="form-group">
					<label>No Hp</label>
					@error('nohp')
						<div class="text-danger">{{ $message }}</div>
					@enderror
					<input type="tel" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="13" placeholder="08xxxxxxxxxx" default="" required pattern="08[0-9]{8,11}">
					<div class="invalid-feedback text-danger"></div>
					<small id="errorMsg" style="color: red;"></small>
					<i class="form-group__bar"></i>
				</div>
				
			<div class="modal-footer">
				<div class="col-md-6">
					<button type="button" class="btn btn-primary btn3d" data-dismiss="modal" style="position: relative;">Tutup</button>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-2 text-right">
					<button type="submit" id="submitBtn" class="btn btn-primary btn3d" style="position: relative;">Kirim</button>									
				</div>
			</div>
			
		</div>
	</div>
</div>


</form>
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('create-new-modal'));
            modal.show();
        });
    </script>
	@elseif (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });

</script>

@endif
<script>
	const input = document.getElementById("nohp");
    const errorMsg = document.getElementById("errorMsg");
	

    input.addEventListener("input", function () {
        // Hanya angka
        this.value = this.value.replace(/[^0-9]/g, '');

        const value = this.value;
        const regex = /^08[0-9]{0,11}$/; // Boleh kosong dulu saat ketik, tapi tetap awalan 08

        if (value === "") {
      errorMsg.textContent = "Nomor HP tidak boleh kosong.";
      submitBtn.disabled = true;
    } else if (!regex.test(value)) {
      errorMsg.textContent = "Nomor harus diawali 08 dan panjang 10–13 digit angka.";
      submitBtn.disabled = true;
    } else {
      errorMsg.textContent = "";
      submitBtn.disabled = false;
    }
    });
	
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script language="javascript" type="text/javascript">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>

function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>


