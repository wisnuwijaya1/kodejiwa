// $.fn.dataTable.ext.errMode = 'throw';
function ajaxDataTable(url,start,end){
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
	console.log(startdate+' '+enddate)
	
	var dataTable = $('#datatable').DataTable({
		// "fixedHeader": {headerOffset: 40},
		// "dom":'<"row"<"col-md-6"><"col-md-6">><"row"<"col-md-3"f><"col-md-6 periode"><"col-md-3 showAllDetail"l>>rt<"row"<"col"i>><"row"<"col"p>><"clear">',
		"dom":'<"row"<"col-md-1"Bl><"col-md-3"f><"col-md-2"><"col-md-1 user-filter"><"col-md-5 periode">>rt<"row"<"col"i>><"row"<"col"p>><"clear">',

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
			data: null,
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
			// ,
			// success: function(response){
			// 	console.log(response);
			// }
		},

		columns:dataTablesColumns,
		'createdRow': function( row, data, dataIndex ) {
			$(row).attr('id', data.id);
		},
	})

	if ((start != '') && (end != '')){
		addPeriode(start,end);
	}

	$('.dt-buttons').css('display');
	$('.dt-buttons').css('margin-top','10px');
	$('.dt-buttons').addClass('text-center');
	$('.buttons-html5').addClass('btn btn-outline-success btn-sm');
	$('.buttons-print').addClass('btn btn-outline-info btn-sm');
	$('#datatable').css('margin-top','10px');
	$('.table-responsive').css('overflow','hidden');
	$('#datatables_length').css('min-width','50px');
	$('th.details-control').removeClass('details-control showdetail');


}




function format ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );

	$.ajax( {
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: 'dailylog/detail',
		data: {data: rowData.id},
		method:'post',
		dataType: 'json',
		success: function ( json ) {
			let len =json.length;
			$.each(json,function(i,v){
				div[i] = 
				'<tr>'+
				'<td width="40"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-detail-modal" >edit</button></td>'+
				'<td width="40"><button class="btn btn-sm btn-danger" onclick="alertDelete();">delete</button></td>'+
				'<td >'+v['description']+'</td>'+
				'<td class="text-center">'+
				'<img src="'+v["file"]+'" class="logo-icon" alt="">'+
				'</td>'+
				'</tr>';
				divx.html(div);
			})

			if (len == 0){
				div =
				'<tr>'+
				'<td class="text-danger text-center" colspan="4">data kosong</td>'+				
				'</tr>';
				divx.html(div);
			}
			divx.removeClass( 'loading' );
		}
	} );
	// // return div;
	return divx;
}



$('#datatable tbody').on('click', 'td.details-control', function () {
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
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

function showAll(){
	let a = 0;

	$('.showdetail').each(function(i,v){

		if ($(v).hasClass('toggleshow')){
			a = a + 1;
		}
	})

	if (a == 0){
		$('.showdetail').each(function(i,v){
			$(v).click();			
		})
	}
	else{
		$('.toggleshow').each(function(i,v){
			$(v).click();			
		})
	}
}

function addButtonShowAllDetail(){
	$('div.showAllDetail').addClass('text-right');
	$('th.details-control').removeClass('details-control showdetail');
	$('div.showAllDetail').append(
		'<button class="btn btn--icon btn-success" onclick="showAll()" title="show all details">'+
		'<i class="zmdi zmdi-unfold-more"></i>'+
		'</button>'
		)
}

function addCustomButton(){
	$('div.custombutton').append(
		'<div class="row">'+
		'<div class="input-group col-md-12 justify-content-end">'+
		'<button class="cusbutton btn btn-sm btn-success">Show Detail</button>'+
		'<button class="cusbutton btn btn-sm btn-outline-primary">Print</button>'+
		'<button class="cusbutton btn btn-sm btn-outline-success">Excel</button>'+
		'<button class="cusbutton btn btn-primary btn-sm" onclick="goCreate(this)" data-toggle="modal" data-target="#create-new-modal">Create New</button>'+
		'</div>'+
		'</div>'
		)
}

function addPeriode(start,end){
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
		
		'<button class="btn btn-sm btn-outline-primary" onclick="goFilter()">Filter</button>'+
		'</div>'+
		'</div>'+
		'</div>'
		)
}