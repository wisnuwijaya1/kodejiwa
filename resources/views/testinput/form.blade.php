<div class="modal fade" id="create-new-modal" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title pull-left">Input Data Tanggal Lahir</h5>
			</div>
			 <form action="{{ route('testinput.store') }}" method="POST">
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
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal" default="" required>
					<div class="invalid-feedback text-danger"></div>
					<i class="form-group__bar"></i>
				</div>

				
			<div class="modal-footer">
				<div class="col-md-3">
					<button type="button" class="btn btn-danger btn3d" data-dismiss="modal" style="position: relative;">Tutup</button>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-3 text-right">
					<button type="submit" class="btn btn-primary btn3d" style="position: absolute; top: 143px; right:120px;">Kirim</button>									
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
