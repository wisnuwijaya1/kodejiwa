function goFilter(){
	let startdate = $('.startdate').val();
	let enddate = $('.enddate').val();
	let datas = {};
	let url	='dailylog';
	datas = {startdate:startdate,enddate:enddate};

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: url+'/list',
		method: 'post',
		data: datas,
		success: function(response){
			$("#datatable").dataTable().fnDestroy();
			ajaxDataTable(url,startdate,enddate);
			addCustomButton();
			$(".select2").select2();
			// select2();
			getNow();
		}
	})
}

function addnewrow(){
	$('.newrow').removeClass('undisplay');
}

function removerow(){
	$('.newrow').addClass('undisplay');
}

function getDate(data){
	
	let result='';

	if (data == 'today'){
		result = [moment().format('YYYY-MM-DD')];
	}

	else if (data == 'startOfMonth'){
		result = [moment().startOf('month').format('YYYY-MM-DD')];
	}

	else if (data == 'endOfMonth'){
		result = [moment().endOf('month').format('YYYY-MM-DD')];
	}

	else {
		result = data;
	}
	
	return result;
}

function goCreate(ini){
			$('#username').attr('disabled',false);

	$('.editDisplay').addClass('undisplay');
	$('[store="id"]').val('');
	$('[default]').each(function(i,v){
		$(v).val($(v).attr('default'))
	});
	$('[store]').not('[store="id"]').each(function(i,v){
		$(v).removeClass('is-invalid');
		$(v).next('.invalid-feedback').addClass('invalid-feedback');
	});
}

function goDelete(ini){
	let ids=[];
	let url = $(ini).attr('url');


	ids = [$(ini).closest('tr').attr('id')];

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
		if (isConfirm.value == 'true'){
			return false;
		}
		if (isConfirm.dismiss == 'cancel'){
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: url+'/ids',
				method: 'delete',
				data: {ids:ids},
				success: function(response){
					$('#datatable').DataTable().ajax.reload();
					notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'menghapus data' , 'bg-warning');
				}
			})
		}
	});

}

function goSave(url){
	let method = 'POST';
	let value='';
	let datas = {};
	let id = $('[store="id"]').val();

	if (id != ''){
		url = url+'/'+$('[store="id"]').val();
		method = 'PATCH';
		datas['id'] = id;
	}

	$('[store]').not('[store="id"]').each(function(i,v){
		value = $(this).val();

		if ($(this).hasClass('select2')){
			let value_select = '';
			let text_select=$(this)
			.next('.select2-container')
			.children('.selection')
			.children('.select2-selection')
			.children()
			.attr('title');

			$(this).children().each(function(i2,v2){
				if (text_select == $(v2).text()){
					value_select = $(v2).val();
				}
			})
			value = value_select;
		}
		datas[$(this).attr('store')] = value;
	})

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: url,
		method: method,
		data:datas,
		success: function(response){
			$('button[data-dismiss]').click();
			$('#datatable').DataTable().ajax.reload();
			if (id == ''){
				notify('top', 'center', 'zmdi-check-all', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'tambah data baru' , 'bg-success');
			}
			else{
				notify('top', 'center', 'zmdi-check-all', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'update data' , 'bg-success');
			}

			$('[store]').not('[store="id"]').each(function(i,v){
				$(v).removeClass('is-invalid');
				$(v).next('.invalid-feedback').addClass('invalid-feedback');
				
			});
			
		},
		error: function(response){
			let errors = response.responseJSON.errors;
			
			$('[store]').not('[store="id"]').each(function(i,v){
				$(v).removeClass('is-invalid');
				$(v).next('.invalid-feedback').addClass('invalid-feedback');
				
			});

			$.each(errors,function(i,v){
				$('[store="'+i+'"]').addClass('is-invalid');
				$('[store="'+i+'"]').next().text(v);
			})
			if (id == ''){
				notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'gagal' , 'tambah data baru' , 'bg-danger');
			}
			else{
				notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'gagal' , 'update data' , 'bg-danger');
			}
		}
	})
}

function goStatus(ini){
	let id='';
	let url = $(ini).attr('url');
	let status = $(ini).attr('status');


	id = [$(ini).closest('tr').attr('id')];

	swal({
		title: 'ubah data ?',
		text: 'data masih bisa dikembalikan',
		type: 'warning',
		showCancelButton: true,
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-secondary float-left',
		confirmButtonText: 'Nanti',
		cancelButtonClass: 'btn btn-danger float-right',
		cancelButtonText: 'Ya , ubah saja !'
	}).then(function(isConfirm){
		if (isConfirm.value == 'true'){
			return false;
		}
		if (isConfirm.dismiss == 'cancel'){
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: url+'/status',
				method: 'post',
				data: {id:id,status:status},
				success: function(response){
					$('#datatable').DataTable().ajax.reload();
					notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'update status' , 'bg-warning');
				}
			})
		}
	});
}

function goEdit(ini){
	let id = $(ini).closest('tr').attr('id');
	let url = $(ini).attr('url');
	let datas = {};
	let store = '';
	let value = '';

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: url+'/'+id+'/edit',
		method: 'get',
		data:{id:id},
		success: function(response){
			$('[store]').each(function(i,v){
				store = $(v).attr('store');
				$(v).val(response[0][store]);

				if ($(this).hasClass('select2')){
					let value_select = '';
					let text_select = $(this).children('[value="'+response[0][store]+'"]').text();
					$(this)
					.next('.select2-container')
					.children('.selection')
					.children('.select2-selection')
					.children().text(text_select);
					$(this).change();
				}

				if ($(this).hasClass('joinDateTime')){
					let target = $(this).attr('store');
					let target_date = moment($(this).val()).format('YYYY-MM-DD');
					let target_time = moment($(this).val()).format('HH:mm');
					$('input[set-target="'+target+'"]').each(function(i2,v2){
						if ($(v2).hasClass('join-date')){
							$(v2).val(target_date);
						}
						if ($(v2).hasClass('join-time')){
							$(v2).val(target_time);
						}
					})
				}

			})

			$('.editDisplay').removeClass('undisplay');
			// $('#username').attr('disabled',true);
			$('#statusf').attr('disabled',true);

		},
		error: function(response){			
			notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'gagal' , 'terjadi kesalahan' , 'bg-danger');
		}
	})
}





function joinDateTime(ini){
	let target = $(ini).attr('set-target');
	let date = '';
	let time = '';
	$('input[set-target="'+target+'"]').each(function(i,v){
		if ($(v).hasClass('join-date')){
			date = $(this).val();
		}
		if ($(v).hasClass('join-time')){
			time = $(this).val();
		}
	})
	$('[store="'+target+'"]').val(date+' '+time);
}

function getNow(){
	var d = new Date();
	$('.getNow').val(moment(d).format('YYYY-MM-DD HH:mm'));
}

function getNowDate(){
	var d = new Date();
	let today = moment(d).format('DD-MMM-YYYY');
	$('.getNowDate').val(today);
}

function select2(){
	$(".select2").select2("destroy").select2();
}
$('select[set-custom]').change(function(){
	let id = $(this).val();
	let target = $(this).attr('store');
	let value = $(this).children('option:selected').text();
	$(this).parent().next().children('input').val(value);
	if (id == '1'){
		$(this).parent().next().removeClass('undisplay');
		$(this).parent().next().children('input').val('');
	}
	else {
		if (!$(this).parent().next().hasClass('undisplay')){
			$(this).parent().next().addClass('undisplay');

		}
	}
})

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
		if (isConfirm.value == 'true'){
			return false;
		}
		if (isConfirm.dismiss == 'cancel'){
			
			notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'menghapus data' , 'bg-warning');
		}
	})
}

function alertStatus(ini){
	let url = $(ini).attr('url');
	let id = $(ini).parent().parent().attr('id');
	swal({
		title: 'Ganti status data ?',
		text: 'data tidak bisa dikembalikan',
		type: 'warning',
		showCancelButton: true,
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-secondary float-left',
		confirmButtonText: 'Nanti',
		cancelButtonClass: 'btn btn-danger float-right',
		cancelButtonText: 'Ya !'
	}).then(function(isConfirm){
		if (isConfirm.value == 'true'){
			return false;
		}
		if (isConfirm.dismiss == 'cancel'){
			
		}
	})
}

function alertSave(){
	swal({
		title: 'Simpan perubahan ?',
		text: 'hati-hati saat melakukan perubahan pada setting',
		type: 'question',
		showCancelButton: true,
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-secondary float-left',
		confirmButtonText: 'Nanti',
		cancelButtonClass: 'btn btn-danger float-right',
		cancelButtonText: 'Ya !'
	}).then(function(isConfirm){
		if (isConfirm.value == 'true'){
			return false;
		}
		if (isConfirm.dismiss == 'cancel'){
			
			notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'mengganti status' , 'bg-primary');
		}
	})
}


function alertApprove(){
	swal({
		title: 'Setujui pengajuan ?',
		text: '',
		type: 'question',
		showCancelButton: true,
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-secondary float-left',
		confirmButtonText: 'Nanti',
		cancelButtonClass: 'btn btn-danger float-right',
		cancelButtonText: 'Ya !'
	}).then(function(isConfirm){
		if (isConfirm.value == 'true'){
			return false;
		}
		if (isConfirm.dismiss == 'cancel'){
			
			notify('top', 'center', 'zmdi-close', 'inverse', 'animated fadeInDown', 'animated fadeOutDown' , 'berhasil' , 'mengganti status' , 'bg-primary');
		}
	})
}

function showColHide(){
	$('.colhide').each(function(i,v){
		if ($(v).hasClass('undisplay')){
			$(v).removeClass('undisplay')
		}
		else{
			$(v).addClass('undisplay')
		}
	})
}