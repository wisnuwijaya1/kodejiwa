


//-get data provinsi referensi
function getprovinsi(){
    var provinsi = document.getElementById("provinsi").value;
    var tes = document.getElementById('provinsi');
    var opt = tes.options[tes.selectedIndex];
    var namaprovinsi = opt.text;   
    var url = 'provinsi/'+provinsi+'/'+namaprovinsi;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
        let selectSection = $('#kabupaten')
        selectSection.empty()
        for (let i = 0; i < response.length; i++) {
            // console.log(response[i])
            selectSection.append(`<option placeholder="Pilih Kabupaten"></option>
                <option value="${response[i].kd_kab}">${response[i].nama}</option>`)

        }
    }
});  

 }


//--scopeprovinsi
 function scopeprovinsi(){
    var provinsi = document.getElementById("provinsi").value;
    var tes = document.getElementById('provinsi');
    var opt = tes.options[tes.selectedIndex];
    var namaprovinsi = opt.text;
    var url = 'provinsi/'+provinsi+'/'+namaprovinsi;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
        let selectSection = $('#multikabupaten')
        selectSection.empty()
        for (let i = 0; i < response.length; i++) {
            // console.log(response[i])
            selectSection.append(`<option value="${response[i].kd_kab},${response[i].nama}">${response[i].nama}</option>`)
            var demo1 = $('select[name="multikabupaten[]"]').bootstrapDualListbox('refresh');

        }
    }
});  

 }

//get data kecamatan referensi
 function getkecamatan(){

    var kecamatan = document.getElementById("kabupaten").value;
    var tes = document.getElementById('kabupaten');
    var opt = tes.options[tes.selectedIndex];
    var namakabupaten = opt.text;
    var url = 'kecamatan/'+kecamatan+'/'+namakabupaten;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
        let selectSection = $('#kecamatan')
        selectSection.empty()
        for (let i = 0; i < response.length; i++) {
            // console.log(response[i])
            selectSection.append(`<option placeholder="Pilih Kecamatan"></option>
                <option value="${response[i].kd_kec}">${response[i].nama}</option>`)
        }
    }
});  

 }


 //scopekabupaten
 function scopekabupaten(){

    var kecamatan = document.getElementById("kabupaten").value;
    var tes = document.getElementById('kabupaten');
    var opt = tes.options[tes.selectedIndex];
    var namakabupaten = opt.text;
    var url = 'kecamatan/'+kecamatan+'/'+namakabupaten;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
        let selectSection = $('#multikecamatan')
        selectSection.empty()
        for (let i = 0; i < response.length; i++) {
            // console.log(response[i])
            selectSection.append(`<option value="${response[i].kd_kec},${response[i].nama}">${response[i].nama}</option>`)
            var demo1 = $('select[name="multikecamatan[]"]').bootstrapDualListbox('refresh');
        }
    }
});  

 }


//get data kelurahan referensi
 function getkelurahan(){

    var kelurahan = document.getElementById("kecamatan").value;
    var tes = document.getElementById('kecamatan');
    var opt = tes.options[tes.selectedIndex];
    var namakecamatan = opt.text;
    var url = 'kelurahan/'+kelurahan+'/'+namakecamatan;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
        let selectSection = $('#kelurahan')
        selectSection.empty()
        for (let i = 0; i < response.length; i++) {
            // console.log(response[i])
            selectSection.append(`<option placeholder="Pilih Kelurahan"></option>
                <option value="${response[i].kd_kprk},${response[i].kd_desa}">${response[i].nama}</option>`)
        }
    }
});  

 }

//get data kantor referensi
 function getkprk(){

    var kprk = document.getElementById("kelurahan").value;
    var tes = document.getElementById('kelurahan');
    var opt = tes.options[tes.selectedIndex];
    var namakelurahan = opt.text;
    var url = 'kprk/'+kprk+'/'+namakelurahan;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
        let selectSection = $('#kantorpospemeriksa')
        selectSection.empty()

            console.log(response)
            selectSection.append(`<option placeholder="Pilih KPRK"></option>
                <option value="${response.kdkprk}">${response.namakprk}(Regional-${response.regional})</option>`)
       
    }
});  

 }


//get data nama rekening referensi
 function getnamarekening(){

    var kodejenisrekening = document.getElementById("jenisrekening").value;
    var tes = document.getElementById('jenisrekening');
    var opt = tes.options[tes.selectedIndex];
    var namajenisrekening = opt.text;
    var url = 'namajenisrekening/'+namajenisrekening;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
       
    }
});  

 }

//opsi scope nasional
 function opsirayonnasional(value){
 var st = $("#tiperayonnasional").val();
 if(st == "0"){
    document.getElementById("divprovinsi").style.display = "none";

 } else {
    document.getElementById("divprovinsi").style.display = "";

 }
}  

//opsi scope nasional
 function opsinasional(value){
 var st = $("#rayonnasional").val();
 if(st == "1"){
    const tiperayonnasional = document.getElementById('tiperayonnasional');
    const skope = document.getElementById('skopeprovinsi');
    document.getElementById("divtiperayonnasional").style.display = "";
    document.getElementById("tiperayonnasional").disabled = false;
    tiperayonnasional.setAttribute('required', '');
 } else {
    const tiperayonnasional = document.getElementById('tiperayonnasional');
    const skope = document.getElementById('skopeprovinsi');
    document.getElementById("divtiperayonnasional").style.display = "none";
    document.getElementById("divprovinsi").style.display = "none";
    document.getElementById("tiperayonnasional").disabled = true;
    tiperayonnasional.removeAttribute('required');
 }
}


//opsi scope provinsi
 function opsirayonprovinsi(value){
 var st = $("#tiperayonprovinsi").val();
 if(st == "0"){
    document.getElementById("divkabupaten").style.display = "none";

 } else {
    document.getElementById("divkabupaten").style.display = "";

 }
}  

//opsi scope provinsi
 function opsiprovinsi(value){
 var st = $("#rayonprovinsi").val();
 if(st == "1"){
    const tiperayonprovinsi = document.getElementById('tiperayonprovinsi');
    document.getElementById("divtiperayonkabupaten").style.display = "";
    document.getElementById("tiperayonprovinsi").disabled = false;
    tiperayonprovinsi.setAttribute('required', '');
 } else {
    const tiperayonprovinsi = document.getElementById('tiperayonprovinsi');
    document.getElementById("divtiperayonkabupaten").style.display = "none";
    document.getElementById("divkabupaten").style.display = "none";
    document.getElementById("tiperayonprovinsi").disabled = true;
    tiperayonprovinsi.removeAttribute('required');
 }
}


//opsi scope kabupaten
 function opsirayonkabupaten(value){
 var st = $("#tiperayonkabupaten").val();
 if(st == "0"){
    document.getElementById("divkecamatan").style.display = "none";

 } else {
    document.getElementById("divkecamatan").style.display = "";

 }
}  

//opsi scope provinsi
 function opsikabupaten(value){
 var st = $("#rayonkabupaten").val();
 if(st == "1"){
    const tiperayonkecamatan = document.getElementById('tiperayonkabupaten');
    document.getElementById("divtiperayonkecamatan").style.display = "";
    document.getElementById("tiperayonkabupaten").disabled = false;
    tiperayonkecamatan.setAttribute('required', '');
 } else {
    const tiperayonkecamatan = document.getElementById('tiperayonkabupaten');
    document.getElementById("divtiperayonkecamatan").style.display = "none";
    document.getElementById("divkecamatan").style.display = "none";
    document.getElementById("tiperayonkabupaten").disabled = true;
    tiperayonkecamatan.removeAttribute('required');
 }
}


//opsi create step 2
function opsi1(value){
 var st = $("#modelkerjasama").val();
 if(st == "1"){
    const input = document.getElementById('nomorkerjasama');
  document.getElementById("kerjasamadiv").style.display = "";
  document.getElementById("nomorkerjasama").disabled = false;
  input.setAttribute('required', '');
 } else {
    const input = document.getElementById('nomorkerjasama');
  document.getElementById("kerjasamadiv").style.display = "none";
  document.getElementById("nomorkerjasama").disabled = true;
  input.removeAttribute('required');
  
 }
}

//bootstrap modal scope
    function modalscope(value) {
        var st = $("#skopekomunitas").val();
            if(st == "0"){
              
            $('#modalnasional').modal('show'); 
            $('#modalprovinsi').modal('hide'); 
            $('#modalkabupaten').modal('hide'); 
        }
        
            else if(st == "1")
            {

            $('#modalprovinsi').modal('show');
            $('#modalkabupaten').modal('hide'); 
            $('#modalnasional').modal('hide');  
        }

            else if(st == "2")
            {
                
            $('#modalkabupaten').modal('show'); 
            $('#modalnasional').modal('hide');
            $('#modalprovinsi').modal('hide');
        }
            


        }


//--validasi rekening
 function validasirekening(){


    var norek = document.getElementById("norekescrow").value;
    var jenisrek = document.getElementById("jenisrekening").value;
    table = document.getElementById('myTable')
    var trs = table.querySelectorAll('tr.child'); 

    var result = []; 
    trs.forEach(function(tr) { 
        var data = []; 
        tr.querySelectorAll('td').forEach(function(td) { 
            data.push(td.innerText); 
        }); 
        result.push(data); 
    }); 
    
      
    var hasil = [];
    result.forEach((element) => {
            element.forEach((data,index) => {
                if (index==2) {
                    hasil.push(data)

                }

            });
       
    });


    var test = hasil.includes(norek);
    
    if (test==true) {
        Swal.fire(
                'Data Rekening :',
                'Nomor Rekening Tidak Boleh Sama',
                'error',
                );
    }
    else
    {

        var url = 'validasirekening/'+norek;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response)
    {
        // console.log(response);
        var namacustomer = response['customer_name'];

        if (response['resp_desk'] === 'SUKSES') {
            Swal.fire(
                'Data Rekening :',
                response['customer_name'],
                'success',
                );
            var rekval=document.getElementById("cekrekening").value 
            document.getElementById("addmore").style.display = "";
            document.getElementById("cekrekening").style.display = "none";                      
            document.getElementById("next").disabled = false;
           
            
            document.getElementById("norekescrow").disabled = true;
                            document.getElementById("jenisrekening").disabled = true;

                            var count = $('#myTable tr').length;

                            $('#myTable tbody').append('<tr class="child"><td>'+count+'</td><td>'+jenisrek+'</td><td>'+norek+'</td><td>'+namacustomer+'</td><td><a href="javascript:void(0);" class="remCF1 btn btn-small btn-danger">Remove</a></td></tr>');
                            $(document).on('click','.remCF1',function(){
                            $(this).parent().parent().remove();
                            $('#myTable tbody tr').each(function(i){            
                            $($(this).find('td')[0]).html(i+1);
            
           
                        });
                        });

                            table = document.getElementById('myTable')
    var trs = table.querySelectorAll('tr.child'); 

    var result = []; 
    trs.forEach(function(tr) { 
        var data = []; 
        tr.querySelectorAll('td').forEach(function(td) { 
            data.push(td.innerText); 
        }); 
        result.push(data); 
    }); 
    
      
    var hasil = [];
    result.forEach((element) => {
            element.forEach((data,index) => {
                if (index==2) {
                    hasil.push(data)

                }

            });
       
    });

    

        }
        else
        {
            Swal.fire(
                'Data Rekening :',
                response['resp_desk'],
                'error',
                );
            document.getElementById("addmore").style.display = "none";
            document.getElementById("next").disabled = true;
        }
          
    }

});  

 }

}

function hapussession(){

table = document.getElementById('myTable')
var trs = table.querySelectorAll('tr.child'); 

    var result = []; 
    trs.forEach(function(tr) { 
        var data = []; 
        tr.querySelectorAll('td').forEach(function(td) { 
            data.push(td.innerText); 
        }); 
        result.push(data); 
    }); 
    // console.log(result)
    var url = 'tablerekening/'+result;
    $.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        // console.log(response);
       
    }
});  
}


//multiple data rekening

    
    //melakukan proses multiple input 
    $(".addMore").click(function(){
         document.getElementById("norekescrow").value ="";
        document.getElementById("next").disabled = true;
        // document.getElementById("cekrekening").style.display ="";
        document.getElementById("jenisrekening").value ="";
        document.getElementById("addmore").style.display ="none";
        document.getElementById("norekescrow").disabled = false;
    document.getElementById("jenisrekening").disabled = false;
           
    });

            

//search and select option
 $("#provinsi").select2({
          placeholder: "Pilih Provinsi",
          allowClear: true
      });

 $("#kabupaten").select2({
          placeholder: "Pilih Kabupaten",
          allowClear: true
      });

 $("#kecamatan").select2({
          placeholder: "Pilih Kecamatan",
          allowClear: true
      });

 $("#kelurahan").select2({
          placeholder: "Pilih Kelurahan",
          allowClear: true
      });

 $("#kantorpospemeriksa").select2({
          placeholder: "Pilih KPRK",
          allowClear: true
      });

 $("#skopekomunitas").select2({
          placeholder: "Pilih Scope",
          allowClear: true
      });

 $("#modelkerjasama").select2({
          placeholder: "Pilih Model Kerjasama",
          allowClear: true
      });




