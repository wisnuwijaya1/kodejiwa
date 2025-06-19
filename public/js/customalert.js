function alertDelete(){
	
	swal({
		title: 'Hapus data ?',
		text: 'data tidak bisa dikembalikan',
		type: 'warning',
		showCancelButton: true,
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-secondary float-left',
		confirmButtonText: 'Nanti',
		cancelButtonClass: 'btn btn-danger float-right',
		cancelButtonText: 'Ya , hapus saja !'
	}).then(function(isConfirm){
		if (isConfirm.dismiss == 'cancel'){
			return isConfirm.dismiss;
		}
	});
}

function alertWarning(){
	
	swal({
		title: 'Hapus data ?',
		text: 'data tidak bisa dikembalikan',
		type: 'warning',
		showCancelButton: true,
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-secondary float-left',
		confirmButtonText: 'Nanti',
		cancelButtonClass: 'btn btn-danger float-right',
		cancelButtonText: 'Ya , hapus saja !'
	}).then(function(isConfirm){
		if (isConfirm.dismiss == 'cancel'){
			return isConfirm.dismiss;
		}
	});
}