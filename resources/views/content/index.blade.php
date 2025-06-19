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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<br>


 

    <br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form enctype="multipart/form-data" encoding='multipart/form-data' action="{{ route('content.create') }}" method="POST">
                @csrf
  
                <div class="card">
                    <div class="card-header"><h5>Buat Konten</h5></div>
  
                    <div class="card-body">
  
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif



                            <div class="form-group">
                                <label for="title"><strong>Tipe Konten :</strong></label>
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
            <strong> Unggah File</strong>
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
              <input type="file" name="image" class="dropzone">
            </div>
          </div>
        </div>
      </div>



                            </div>
                        </div>


                            <div class="form-group">
                                <label for="title"><strong>Judul :</strong></label>
                                <input type="text" class="form-control" id="tittle"  name="tittle" required/>
                            </div>

                            <div class="form-group">
                                <label for="description"><strong>Sub Judul :</strong></label>
                                <textarea type="text"  class="coba" id="detailinformasi" name="detailinformasi"  required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="title"><strong>link :</strong></label>
                                <input type="text" class="form-control" id="link"  name="link" required/>
                            </div>


                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('home') }}" class="btn btn-warning" style="background-color: #F5A707;">Batalkan</a>
                            </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>




</form>



<script>

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


@include('layouts.footer')
@endsection
