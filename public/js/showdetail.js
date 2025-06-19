function detailSales ( rowData ) {
	var divx = $('<table/>');
	var div = [];
	divx.addClass( 'table table-bordered table-striped loading' )
	divx.text( 'Loading...' );
	
	$.ajax( {
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: 'sales/'+rowData.id,
		data: {data: rowData.id},
		method:'get',
		dataType: 'json',
		success: function ( json ) {
			let len =json.length;
			$.each(json,function(i,v){
				div[i] = 
				'<tr>'+
				'<td >'+v['nama']+'</td>'+
				'<td >'+v['email']+'</td>'+
				'<td >'+v['telepon']+'</td>'+
				'<td >'+v['alamat']+'</td>'+
				'<td >'+v['status']+'</td>'+
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
	
	return divx;
}



$('#datatable tbody').on('click', 'td.detail-sales', function () {
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
            row.child( detailSales(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

