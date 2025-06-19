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
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<br>


    <div class="d-flex justify-content-center">
        <div style="position: relative; height: 32px;" class="d-flex align-items-center align-middle">
            <div style="background-color: #E67E22; width: 35px; height: 35px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #fff; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">1</p>
            </div>
            <div class="mx-2" style="color: #E67E22;">Info Komunitas</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#E67E22 ; position: relative;"></div>
        </div>
        <div class="d-flex align-items-center">
            <div style="background-color: #D7d7d7; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">2</p>
            </div>
            <div class="mx-2" style="color: black;">Detail Komunitas</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#D7d7d7 ;"></div>
        </div>
        <div class="d-flex align-items-center">
            <div style="background-color: #D7d7d7; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">3</p>
            </div>
            <div class="mx-2" style="color: black;">Info Rekening</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#D7d7d7 ;"></div>
        </div>
        <div class="d-flex align-items-center">
            <div style="background-color: #D7d7d7; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">4</p>
            </div>
            <div class="mx-2" style="color: black;">Review Detail</div>
        </div>
       
    </div>

    <br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('register.create.step.one.post') }}" method="POST">
                @csrf
  
                <div class="card">
                    <div class="card-header"><h5>Step 1: Info Komunitas</h5></div>
  
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


                            {{-- <div class="form-group">
                                <label for="title"><strong>Kode Komunitas :</strong></label>
                                <input type="text" value="<?php if(isset($register["kodekomunitas"])) { echo $register["kodekomunitas"]; } ?>" class="form-control" id="kodekomunitas"  name="kodekomunitas" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="title"><strong>Nama Komunitas :</strong></label>
                                <input type="text" class="form-control" id="namakomunitas"  name="namakomunitas" value="<?php if(isset($register["namakomunitas"])) { echo $register["namakomunitas"]; } ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="description"><strong>Alamat :</strong></label>
                                <textarea type="text"  class="coba" id="alamat" name="alamat"  required><?php if(isset($register["alamat"])) { echo $register["alamat"]; } ?></textarea>
                            </div>

                            <div class="form-group" >
                                <label for="description"><strong>Provinsi :</strong></label>
                                <select  class="coba" id="provinsi" name="provinsi" onchange="getprovinsi(); scopeprovinsi();" required>
                                    <option value="<?php if(isset($register["provinsi"])) { echo $register["provinsi"]; } ?>" disabled selected hidden><?php if(isset($namaprovinsi["namaprovinsi"])) { echo $namaprovinsi["namaprovinsi"]; } ?></option>
                                   @foreach($a as $key => $item)
                            <option value="{{ $item->kd_prop }}">({{ $item->nama}})</option>
                             @endforeach
                                </select>
                            </div>

                            
                        

                            <div class="form-group">
                                <label for="description"><strong>Kota/Kabupaten :</strong></label>
                               {{--  <?php dd($paramkabupaten) ?> --}}
                                <select class="coba" id="kabupaten" name="kabupaten" onchange="getkecamatan(); scopekabupaten();" required>
                                    <option value="<?php if(isset($register["kabupaten"])) { echo $register["kabupaten"]; } ?>" disabled selected hidden><?php if(isset($namakabupaten["namakabupaten"])) { echo $namakabupaten["namakabupaten"]; } ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description"><strong>Kecamatan :</strong></label>
                               {{--  <?php dd($paramkabupaten) ?> --}}
                                <select class="coba" id="kecamatan" name="kecamatan" onchange="getkelurahan()" onclick="getkelurahan()" required>
                                    <option value="<?php if(isset($register["kecamatan"])) { echo $register["kecamatan"]; } ?>" disabled selected hidden><?php if(isset($namakecamatan["namakecamatan"])) { echo $namakecamatan["namakecamatan"]; } ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description"><strong>Kelurahan :</strong></label>
                               {{--  <?php dd($paramkabupaten) ?> --}}
                                <select class="coba" id="kelurahan" name="kelurahan"  onchange="getkprk()" onclick="getkprk()" required>
                                    <option value="<?php if(isset($kprk["kodedesa"])) { echo $kprk["kodedesa"]; } ?>" disabled selected hidden><?php if(isset($kprk["namakelurahan"])) { echo $kprk["namakelurahan"]; } ?></option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="title"><strong>Kode Pos :</strong></label>
                                <input type="text" class="form-control" id="kodepos"  name="kodepos" value="<?php if(isset($register["kodepos"])) { echo $register["kodepos"]; } ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>

                            <div class="form-group">
                                <label for="description"><strong>Kantor Pos Pemeriksa :</strong></label>
                                <select class="coba" id="kantorpospemeriksa" name="kantorpospemeriksa"  required>
                                    <option value="<?php if(isset($kprk["kdkprk"])) { echo $kprk["kdkprk"]; } ?>" disabled selected hidden><?php if(isset($kprk["namakprk"])) { echo $kprk["namakprk"]; } ?>(Regional-<?php if(isset($kprk["regional"])) { echo $kprk["regional"]; } ?>)</option>
                                    
                                </select>
                            </div>

                            

                            

                            <div class="form-group" id="divskopekomunitas">
                                <label for="description"><strong>Scope Komunitas :</strong></label>
                                <select class="coba" id="skopekomunitas" name="skopekomunitas" onchange="modalscope(this)" 
                                 required>
                                    
                                    <option value="<?php if(isset($skopekomunitas)) { echo $skopekomunitas; } ?>" disabled selected hidden ><?php if(isset($skopekomunitas)) { echo $skopekomunitas; } ?></option>
                                    <option value="0" >Nasional</option>
                                    <option value="1">Provinsi</option>
                                    <option value="2">Kota/Kabupaten</option>
                                </select>
                            </div>


                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('register.index') }}" class="btn btn-warning" style="background-color: #F5A707;">Batalkan</a>
                            </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-success">Selanjutnya</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Scopenasional -->
<div class="modal fade" id="modalnasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scope Nasional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="control-group after-add-more">
          <body>

                            <div class="form-group">
                                <label for="description"><strong>Memiliki Rayon :</strong></label>
                                <select class="coba" id="rayonnasional" name="rayonnasional" onchange="opsinasional(this)">
                                  <option value="" disabled selected hidden>Pilih Rayon</option>
                                    {{-- <option value="<?php if(isset($scopenasional["rayonnasional"])) { echo $scopenasional["rayonnasional"]; } ?>" disabled selected hidden><?php if(isset($scopenasional["rayonnasional"])) { echo $scopenasional["rayonnasional"]; } ?></option> --}}
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>

                            <div class="form-group" id="divtiperayonnasional" style="display:none;">
                                <label for="description"><strong>Tipe Rayon :</strong></label>
                                <select class="coba" id="tiperayonnasional" name="tiperayonnasional" onchange="opsirayonnasional(this)">
                                  <option value="" disabled selected hidden>Pilih Tipe Rayon</option>
                                    {{-- <option value="<?php if(isset($scopenasional["tiperayonnasional"])) { echo $scopenasional["tiperayonnasional"]; } ?>"><?php if(isset($scopenasional["tiperayonnasional"])) { echo $scopenasional["tiperayonnasional"]; } ?></option> --}}
                                    <option value="0">Seluruh</option>
                                    <option value="1">Sebagian</option>
                                </select>
                            </div>

<div class="container" id="divprovinsi" style="display:none;">
  <div class="row" style="margin-top: 40px;">
    <div class="col">
     
    </div>
  </div>
  <div class="row" style="margin-bottom: 40px;">
    <div class="col">
      <form id="demoformprovinsi">
        <select multiple="multiple" size="10" id="multiprovinsi" name="multiprovinsi[]" title="multiprovinsi[]">
     @foreach($a as $key => $item)
                            <option value="{{ $item->kd_prop }},{{ $item->nama }}">({{ $item->nama}})</option>
                             @endforeach
  </select>
        <br>
        <div class="row">

        </div>

    </div>
  </div>
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
          <button type="submit" class="btn btn-success btn-sm">Selanjutnya</button>                 
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Scopeprovinsi -->
<div class="modal fade" id="modalprovinsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scope Provinsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <body>

                            <div class="form-group">
                                <label for="description"><strong>Memiliki Rayon :</strong></label>
                                <select class="coba" id="rayonprovinsi" name="rayonprovinsi" onchange="opsiprovinsi(this)">
                                  <option value="" disabled selected hidden>Pilih Rayon</option>
                                    {{-- <option value="<?php if(isset($scopenasional["rayonnasional"])) { echo $scopenasional["rayonnasional"]; } ?>" disabled selected hidden><?php if(isset($scopenasional["rayonnasional"])) { echo $scopenasional["rayonnasional"]; } ?></option> --}}
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>

                            <div class="form-group" id="divtiperayonkabupaten" style="display:none;">
                                <label for="description"><strong>Tipe Rayon :</strong></label>
                                <select class="coba" id="tiperayonprovinsi" name="tiperayonprovinsi" onchange="opsirayonprovinsi(this)">
                                  <option value="" disabled selected hidden>Pilih Tipe Rayon</option>
                                    {{-- <option value="<?php if(isset($scopenasional["tiperayonnasional"])) { echo $scopenasional["tiperayonnasional"]; } ?>"><?php if(isset($scopenasional["tiperayonnasional"])) { echo $scopenasional["tiperayonnasional"]; } ?></option> --}}
                                    <option value="0">Seluruh</option>
                                    <option value="1">Sebagian</option>
                                </select>
                            </div>

<div class="container" id="divkabupaten" style="display:none;">
  <div class="row" style="margin-top: 40px;">
    <div class="col">
     
    </div>
  </div>
  <div class="row" style="margin-bottom: 40px;">
    <div class="col">
      <form id="demoformkabupaten">
        <select multiple="multiple" size="10" id="multikabupaten" name="multikabupaten[]" title="multikabupaten[]">
         {{--    <option></option>
         @if (is_array($scopeprovinsi) || is_object($scopeprovinsi))

@foreach($scopeprovinsi as $key => $item)
                            <option value="{{ $item->kd_kab }}">({{ $item->nama}})</option>
                             @endforeach
                             @endif --}}
  </select>
        <br>
        <div class="row">

       </div>
  </div>
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
          <button type="submit" class="btn btn-success btn-sm">Selanjutnya</button>                 
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal Scopekabupaten -->
<div class="modal fade" id="modalkabupaten" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scope Kabupaten</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <body>

                            <div class="form-group">
                                <label for="description"><strong>Memiliki Rayon :</strong></label>
                                <select class="coba" id="rayonkabupaten" name="rayonkabupaten" onchange="opsikabupaten(this)">
                                  <option value="" disabled selected hidden>Pilih Rayon</option>
                                    {{-- <option value="<?php if(isset($scopenasional["rayonnasional"])) { echo $scopenasional["rayonnasional"]; } ?>" disabled selected hidden><?php if(isset($scopenasional["rayonnasional"])) { echo $scopenasional["rayonnasional"]; } ?></option> --}}
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>

                            <div class="form-group" id="divtiperayonkecamatan" style="display:none;">
                                <label for="description"><strong>Tipe Rayon :</strong></label>
                                <select class="coba" id="tiperayonkabupaten" name="tiperayonkabupaten" onchange="opsirayonkabupaten(this)">
                                  <option value="" disabled selected hidden>Pilih Tipe Rayon</option>
                                    {{-- <option value="<?php if(isset($scopenasional["tiperayonnasional"])) { echo $scopenasional["tiperayonnasional"]; } ?>"><?php if(isset($scopenasional["tiperayonnasional"])) { echo $scopenasional["tiperayonnasional"]; } ?></option> --}}
                                    <option value="0">Seluruh</option>
                                    <option value="1">Sebagian</option>
                                </select>
                            </div>

<div class="container" id="divkecamatan" style="display:none;">
  <div class="row" style="margin-top: 40px;">
    <div class="col">
     
    </div>
  </div>
  <div class="row" style="margin-bottom: 40px;">
    <div class="col">
      <form id="demoformkecamatan">
        <select multiple="multiple" size="10" id="multikecamatan" name="multikecamatan[]" title="multikecamatan[]">
         {{--    <option></option>
         @if (is_array($scopeprovinsi) || is_object($scopeprovinsi))

@foreach($scopeprovinsi as $key => $item)
                            <option value="{{ $item->kd_kab }}">({{ $item->nama}})</option>
                             @endforeach
                             @endif --}}
  </select>
        <br>
        <div class="row">

       </div>
  </div>
</div>
</body>
</div>
</div>
      <div class="modal-footer">
        <div class="col-md-3">
          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batalkan</button>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3 text-right">
          <button type="submit" class="btn btn-success btn-sm">Selanjutnya</button>                 
        </div>
      </div>
    </div>
  </div>
</div>


</form>


      
<script src="{{asset('js/duallist.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/referensi.js')}}"></script>
<script src="{{asset('js/dualkecamatan.js')}}"></script>



@include('layouts.footer')
@endsection
