@extends('layouts.appform')
@section('content')
<br>
<br>
<br>

<style>
    input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

p {


  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 0.9rem;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;


}

.line-clamp{
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}


.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}

</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@if($errors->any())
<script>
 Swal.fire(
       'Gagal Simpan Data',
       '{{ $errors->first() }}',
       'error')

</script>
@endif
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          
                @csrf
    
                <div class="card">
                    <div class="card-header"><h5>Content Management</h5></div>
  
              
  
            
  <div class="item">
    <div class="card" style=" margin-bottom: 0px !important">
      <div class="card-body">
        

        <div class="container small-box">
          <div class="inner">
            <h3> <span title="Aktif"></span> </h3>
           <table class="table" id="example">
  <thead>
    <tr>
      <th style="width: 20px;">No</th>
      <th style="width: 200px;">Gambar</th>
      <th style="width: 350px;">Judul</th>
      {{-- <th style="width: 200px;">Status</th> --}}
      <th style="width: 200px;">Aksi</th>
    </tr>
  </thead>
  <?php $no = 0;?>
    @if(isset($data))     
  @foreach($data as $key => $item)
  <?php $no++ ;?>
  <tbody>
    <tr>
      <td>{{ $no }}</td>
      <td>




        <img style="width: 200px;" src="data:image/png;base64, <?php

      
$foto = str_replace ( ' ', '%20',$item->gambar);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "5475",
  CURLOPT_URL => "http://3.1.30.53:5475/webpos/get_photo?photonya=$foto",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 2ae2410d-f5f8-92b0-adaf-96ea4a962fb9"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);





             $img =base64_encode($response);


             echo  $img;
       ?>"/> </td>
      <td><h5>{{ $item->judul }}</h5>

      <p>{{ $item->subjudul }}</p></td>


      {{--   @if ($item->stat==0)
      <td><button class="btn btn-outline-success" status='{{ $item->stat }}' url="#">Aktif</buton></td>
        @else
      <td><button class="btn btn-outline-secondary" status='{{ $item->stat }}' url="#">Non Aktif</buton></td>
        @endif --}}

      <td><div class="dropdown"><button data-toggle="dropdown" class="btn btn-outline-secondary btn--icon" aria-expanded="true"><i class="zmdi zmdi-more"></i></button><div class="dropdown-menu" x-placement="bottom-end" ><a class="dropdown-item" href="#" onclick="edit({{ $item->id }})" >Edit</a><li class="divider dropdown-divider"></li><a class="dropdown-item delete" href="#" onclick="hapus({{ $item->id }})" >Hapus</a></div></div></td>
    </tr>

  
  </tbody>
@endforeach
</table>

          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
  
      </div>
    </div>
  </div>

  </div>
  </div>
    
@endif
</div>
</div>
</div>
</div>
</div>


<!-- Modal Edit Content -->
<div class="modal fade" id="modalcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Content Management</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" encoding='multipart/form-data' action="{{ route('content.editstore') }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="control-group after-add-more">
          <body>

               <div class="form-group">
                                <label for="title"><strong>Content Type :</strong></label>
                                <select class="coba" id="tipekonten" name="tipekonten" required>
                                    
                                    <option value="0" >News</option>
                                    <option value="1">Video</option>

                                </select>
                            </div>

                               

                              <div class="row">
                            <div class="col">
                                <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <strong> Upload File</strong>
            <div class="preview-zone hidden">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <div><b>Preview</b></div>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                      <i class="fa fa-times"></i> Reset This Form
                    </button>
                  </div>
                </div>
                <div class="box-body"></div>
              </div>
            </div>
            <div class="dropzone-wrapper">
              <div class="dropzone-desc">
                <i class="glyphicon glyphicon-download-alt"></i>
                <img style="width: 15%; margin-top: -10%;" src="{{asset('photo.png')}}">
                <p>Pilih Gambar (PNG/JPG Max. 5MB)</p>

              </div>
              <input type="file" name="image" id="output" class="dropzone">
            </div>
          </div>
        </div>
      </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="id"  name="id" style="display: none;" required/>
                            </div>

                            <div class="form-group">
                                <label for="title"><strong>Tittle :</strong></label>
                                <input type="text" class="form-control" id="tittle"  name="tittle" required/>
                            </div>

                            <div class="form-group">
                                <label for="description"><strong>Detail Informasi :</strong></label>
                                <textarea type="text"  class="coba" id="detailinformasi" name="detailinformasi"  required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="title"><strong>link :</strong></label>
                                <input type="text" class="form-control" id="link"  name="link" required/>
                            </div>

                            

</body>
</div>
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


<script>
    
    function edit(id){
       
       $('#modalcontent').modal('show');
       var url = 'edit/'+id;

//Call ajax
$.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){

         let selectSection = $('#tipekonten')

                selectSection.empty()
                if (response.tipe==0) {
               selectSection.append(`<option value="${response.tipe}">News</option>
                <option value="1">Video</option>`)
                }
                else
                {
               selectSection.append(`<option value="${response.tipe}">Video</option>
                <option value="0">News</option>`)

                }
        document.getElementById("id").value = response.id;
         $("#id").val= response.id;


      var htmlPreview =
        '<img width="400" src="data:image/png;base64,' + response.gambar + '" />';
       
      var wrapperZone = $(output).parent();
      var previewZone = $(output).parent().parent().find('.preview-zone');
      var boxZone = $(output).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);


  

 
 
        // $("#output").attr("src",`data:image/png;base64,${response.gambar}`);

        

         document.getElementById("tittle").value = response.judul;
         $("#tittle").val= response.judul;

         document.getElementById("detailinformasi").value = response.subjudul;
         $("#detailinformasi").val= response.subjudul;

         document.getElementById("link").value = response.link;
         $("#link").val= response.link;
        
    }
});  

    }


    function hapus(id){

         Swal.fire({
        title: "Yakin Ingin Menghapus ?",
        text: "Data Akan Hilang Jika Dihapus",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Ya, Hapus',
        // closeOnConfirm: false,
                //closeOnCancel: false

      }).then(function(isConfirm){
              if (isConfirm.value===true){
                window.location = "hapus/"+id;
              }
            });

    }



    function readFile(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});



</script>


 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('success'))
 
                                        <script>
                    Swal.fire(
                    'Data Save Success',
                    'Data Berhasil Di Simpan',
                    'success')
                    </script>
                                    
                    @endif


                    @if(session()->has('hapus'))

                                        <script>
                    Swal.fire(
                    'Deleted!',
                    'Data Berhasil Di Hapus',
                    'success')
                    </script>

                    @endif


                    @if(session()->has('update'))

                                        <script>
                    Swal.fire(
                    'Updated!',
                    'Data Berhasil Di Ubah',
                    'success')
                    </script>

                    @endif

                    @if(session()->has('gagal'))

                                        <script>
                    Swal.fire(
                    'Data Not Save!',
                    'Gagal Simpan Data',
                    'error')
                    </script>

                    @endif




@include('layouts.footer')
@endsection
