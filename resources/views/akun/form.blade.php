<div class="modal fade" id="create-new-modal" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title pull-left">Buat User Baru</h5>
			</div>
			 <form action="{{ route('akun.store') }}" method="POST">
			 	@csrf
			<div class="modal-body">
				<input type="text" store="id" value="" class="undisplay">

				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="name" default="" required>
					<div class="invalid-feedback text-danger"></div>
					<i class="form-group__bar"></i>
				</div>

				<div class="form-group">
					<label>Username/NIPPOS</label>
					<input type="text" class="form-control" name="username" default="" id="username" required>
					<div class="invalid-feedback text-danger"></div>
					<i class="form-group__bar"></i>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" default="" required>
					<div class="invalid-feedback">Please check again !</div>
					<i class="form-group__bar"></i>
				</div>

				<div class="form-group">
					<label>Nomor HP</label>
					<input type="text" class="form-control" name="nohp" default="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
					<div class="invalid-feedback">Please check again !</div>
					<i class="form-group__bar"></i>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" default="" required>
					<div class="invalid-feedback">Please check again !</div>
					<i class="form-group__bar"></i>
				</div>

				<div class="form-group">
					<label>Role</label>
					<select class="form-control" name="role" default="" required>
					<option value="" disabled selected hidden>Pilih Role</option>
  					<option type="text" name="role" value="80">Reguler User</option>
  					<option type="text" name="role" value="90">Ketua Komunitas</option>
  					<option type="text" name="role" value="91">Super Admin Komunitas</option>
  					<option type="text" name="role" value="92">Bendahara Komunitas</option>
  					<option type="text" name="role" value="93">Admin Komunitas</option>
  					<option type="text" name="role" value="94">Ketua Wilayah Komunitas</option>
  					<option type="text" name="role" value="95">Bendahara Wilayah Komunitas</option>
  					<option type="text" name="role" value="96">Admin Wilayah Komunitas</option>
  					<option type="text" name="role" value="97">Ketua Rayon Komunitas</option>
  					<option type="text" name="role" value="98">Bendahara Rayon Komunitas</option>
  					<option type="text" name="role" value="99">Admin Rayon Komunitas</option>
					</select>
					<div class="invalid-feedback">Please check again !</div>
					<i class="form-group__bar"></i>
				</div>

{{-- 				<div class="form-group">
					<label>Status</label>
					<select type="text" class="form-control" name="status" id="status" default="Aktif" requried>
					<option type="text" name="status" value="Aktif">Aktif</option>
  					<option type="text" name="status" value="Tidak Aktif">Tidak Aktif</option>
  					</select>
					<div class="invalid-feedback">Please check again !</div>
					<i class="form-group__bar"></i>
				</div> --}}

			</div>

			<div class="modal-footer">
				<div class="col-md-3">
					<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-3 text-right">
					<button type="submit" class="btn btn-success btn-sm">Simpan</button>									
				</div>
			</div>
			
		</div>
	</div>
</div>


</form>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>
