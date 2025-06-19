function ajaxDataTable2(url,start,end){
	let startdate='';
	let enddate='';
	let datas = {};

	if ((start != '') && (end != '')){
		startdate = getDate(start);
		startdate = startdate + ' 00:00:00';
		enddate = getDate(end);
		enddate = enddate + ' 23:59:59';
		datas = {startdate:startdate,enddate:enddate};
	}
	
	
	var dataTable = $('#datatable').DataTable({
		// "fixedHeader": {headerOffset: 40},
		// "dom":'<"row"<"col-md-6"><"col-md-6">><"row"<"col-md-3"f><"col-md-6 periode"><"col-md-3 showAllDetail"l>>rt<"row"<"col"i>><"row"<"col"p>><"clear">',
		"dom":'<"row"<"col-md-1"l><"col-md-3"f><"col-md-2 value-filter"><"col-md-1 user-filter"><"col-md-5 periode">>rt<"row"<"col"i>><"row"<"col"p>><"clear">',

		"buttons":[ 'excel',  'print' ],
		"select":{
			"style":    "multi",
			// "selector": "td:first-child>.form-check>.form-check-label>.form-check-input"
			"selector": "td:first-child"
		},
		"order": [[ 2, "desc" ]],
		"columnDefs": [
		{
			targets: 0,
			width: 20,
			
			orderable: false,
			defaultContent: '',
			searchable: false
		},
		{
			targets:1,
			orderable: false,
			searchable: false
		}
		],
		"language": {
			// "processing":"<div class='lds-ring'><div></div><div></div><div></div><div></div></div>",
			"processing":"",
			"emptyTable":"Data Kosong",
			"searchPlaceholder": "Search",
			"infoEmpty":"",
			"lengthMenu":'<select class="form-control page-row" title="row per page">'+
			'<option selected value="10">10</option>'+
			'<option value="20">20</option>'+
			'<option value="30">30</option>'+
			'<option value="40">40</option>'+
			'<option value="50">50</option>'+
			'<option value="-1">All</option>'+
			'</select>',
			"search":"",
			"zeroRecords":"Pencarian Kosong",
			"paginate": {
				"first":"First",
				"last":"Last",
				"next":"Next",
				"previous":"Previous"
			}
		},
		responsive: true,
		processing: true,
		serverSide: true,

		ajax: {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: url+'/list',
			method: 'post',
			data:datas
			
		},

		columns:dataTablesColumns,
		'createdRow': function( row, data, dataIndex ) {
			$(row).attr('id', data.id);
		},
		
	})

	if ((start != '') && (end != '')){
		addPeriode(start,end);
	}

	$('.dt-buttons').css('display','block');
	$('.dt-buttons').css('margin-top','10px');
	$('.dt-buttons').addClass('text-center');
	$('.buttons-html5').addClass('btn btn-outline-success btn-sm');
	$('.buttons-print').addClass('btn btn-outline-info btn-sm');
	$('#datatable').css('margin-top','10px');
	// $('.table-responsive').css('overflow','hidden');
	$('#datatables_length').css('min-width','50px');
	$('th').removeClass('details-control showdetail');

}

function addPeriode2(start,end){

	$('#datatable_wrapper>.row:nth-child(1)').css('margin-bottom', '-23px');
	let startdate = getDate(start);
	let enddate = getDate(end);

	$('div.periode').append(
		'<div class="row">'+
		'<div class="input-group col-md-12" >'+
		'<div class="input-group-prepend text-right justify-content-end">'+
		
		'<input type="text" class="form-control hidden-md-up">'+
		'<input type="text" class="form-control date-picker hidden-sm-down startdate" value="'+startdate+'">'+

		'<span class="input-group-text">to</i></span>'+

		'<input type="date" class="form-control hidden-md-up">'+
		'<input type="text" class="form-control date-picker hidden-sm-down enddate" value="'+enddate+'">'+
		
		'<button class="btn btn-sm btn-outline-primary" >Filter</button>'+
		'</div>'+
		'</div>'+
		'</div>'
		)
}

function addUserFilter(){
	$('div.user-filter').append(
		'<div class="form-group">'+
		'<select class="form-control select2" data-placeholder="user">'+
		'<option >All</option>'+
		'<option >Arif</option>'+
		'<option >Doddy</option>'+
		'<option >Faisal</option>'+
		'<option >Ramdan</option>'+
		'</select>'+
		'</div>'
		)
}

function addValueFilter(){
	$('div.value-filter').append(
		'<div class="input-group form-group">'+
		'<div class="input-group-prepend">'+
		'<span class="input-group-text">Total ></span>'+
		'</div>'+
		'<input type="number" class="form-control" value="0">'+
		'<i class="form-group__bar"></i>'+
		'</div>'
		)
}



function detailKaryawan ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	div=
	'<tr>'+
	'<td class="text-center">name</td>'+
	'<td class="text-center">number id</td>'+
	'<td class="text-center">user name</td>'+
	'<td class="text-center">position</td>'+
	'<td class="text-center">status</td>'+
	'</tr>';
	divx.html(div);


	divx.removeClass( 'loading' );

	return divx;
}



$('#datatable tbody').on('click', 'td.detail-karyawan', function () {
	if ($(this).hasClass('toggleshow')){
		$(this).removeClass('toggleshow');
	}
	else{
		$(this).addClass('toggleshow');		
	}

	var tr = $(this).closest('tr');
	var dt = $('#datatable').DataTable();
	var row = dt.row( tr );

	if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( detailKaryawan(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

function detailKlien ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	div=
	'<tr>'+
	'<td class="text-center">Name</td>'+
	'<td class="text-center">Owner Name</td>'+
	'<td class="text-center">Address</td>'+
	'<td class="text-center">Owner Address</td>'+
	'<td class="text-center">Contact</td>'+
	'</tr>';
	divx.html(div);


	divx.removeClass( 'loading' );

	return divx;
}



$('#datatable tbody').on('click', 'td.detail-klien', function () {
	if ($(this).hasClass('toggleshow')){
		$(this).removeClass('toggleshow');
	}
	else{
		$(this).addClass('toggleshow');		
	}

	var tr = $(this).closest('tr');
	var dt = $('#datatable').DataTable();
	var row = dt.row( tr );

	if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( detailKlien(row.data()) ).show();
            tr.addClass('shown');
        }
    } );


function detailNilai ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	div=
	'<tr>'+
	'<td width="40"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-detail-modal" >edit</button></td>'+
	'<td width="40"><button class="btn btn-sm btn-danger" onclick="alertDelete();">delete</button></td>'+
	'<td class="text-center">scale</td>'+
	'<td class="text-center">Description</td>'+
	'</tr>';
	divx.html(div);


	divx.removeClass( 'loading' );

	return divx;
}



$('#datatable tbody').on('click', 'td.detail-nilai', function () {
	if ($(this).hasClass('toggleshow')){
		$(this).removeClass('toggleshow');
	}
	else{
		$(this).addClass('toggleshow');		
	}

	var tr = $(this).closest('tr');
	var dt = $('#datatable').DataTable();
	var row = dt.row( tr );

	if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( detailNilai(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

function detailApprove ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	div=
	'<tr>'+
	'<td class="text-center">date and time</td>'+
	'<td class="text-center">who approve</td>'+
	'<td class="text-center">position</td>'+
	'</tr>';
	divx.html(div);


	divx.removeClass( 'loading' );

	return divx;
}



$('#datatable tbody').on('click', 'td.detail-approve', function () {
	if ($(this).hasClass('toggleshow')){
		$(this).removeClass('toggleshow');
	}
	else{
		$(this).addClass('toggleshow');		
	}

	var tr = $(this).closest('tr');
	var dt = $('#datatable').DataTable();
	var row = dt.row( tr );

	if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( detailApprove(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

function detailDailyLog ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	div=
	'<tr><td class="text-center">Detail 1</td></tr>'+
	'<tr><td class="text-center">Detail 2</td></tr>'+
	'<tr><td class="text-center">Detail 3</td></tr>';
	divx.html(div);


	divx.removeClass( 'loading' );

	return divx;
}



$('#datatable tbody').on('click', 'td.detail-dailylog', function () {
	if ($(this).hasClass('toggleshow')){
		$(this).removeClass('toggleshow');
	}
	else{
		$(this).addClass('toggleshow');		
	}

	var tr = $(this).closest('tr');
	var dt = $('#datatable').DataTable();
	var row = dt.row( tr );

	if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( detailDailyLog(row.data()) ).show();
            tr.addClass('shown');
        }
    } );


function detailPenilaian ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	div=
	'<tr>'+
	'<td class="text-center">Kehadiran</td>'+
	'<td class="text-center">4</td>'+
	'<td class="text-center">100% kehadiran</td>'+
	'<td class="text-center">Triya</td>'+
	'</tr>'+
	'<tr>'+
	'<td class="text-center">Tanggung Jawab</td>'+
	'<td class="text-center">4</td>'+
	'<td class="text-center">mengerjakan di luar jam kerja demi deadline</td>'+
	'<td class="text-center">Yovi</td>'+
	'</tr>';
	
	divx.html(div);


	divx.removeClass( 'loading' );

	return divx;
}



$('#datatable tbody').on('click', 'td.detail-penilaian', function () {
	if ($(this).hasClass('toggleshow')){
		$(this).removeClass('toggleshow');
	}
	else{
		$(this).addClass('toggleshow');		
	}

	var tr = $(this).closest('tr');
	var dt = $('#datatable').DataTable();
	var row = dt.row( tr );

	if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( detailPenilaian(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

