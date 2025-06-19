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

<div class="d-flex justify-content-center">
        <a href="{{ route('register.create.step.one') }}" style="position: relative; height: 32px;" class="d-flex align-items-center align-middle">
            <div style="background-color: #D7d7d7; width: 35px; height: 35px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">1</p>
            </div>
            <div class="mx-2" style="color: black;">Info Komunitas</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#D7d7d7 ; position: relative;"></div>
        </a>
        <div class="d-flex align-items-center">
            <div style="background-color: #E67E22; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #fff;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">2</p>
            </div>
            <div class="mx-2" style="color: #E67E22;">Detail Komunitas</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#E67E22 ;"></div>
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
            <form action="{{ route('register.create.step.two.post') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><h5>Step 2: Detail Komunitas</h5></div>
  
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

                                <label for="description"><strong>Model Kerjasama :</strong></label>
                                <select class="coba" id="modelkerjasama" name="modelkerjasama" onChange="opsi1(this)" required>
                                    {{-- <option><?php if(isset($register1["modelkerjasama"])) { echo $register1["modelkerjasama"]; } ?></option> --}}
                                    <option value="1">Kerjasama</option>
                                    <option value="0">Tidak Kerjasama</option>
                                </select>
                            </div>
                            <div class="form-group" id="kerjasamadiv">
                                <label for="title"><strong>Nomor Kerjasama :</strong></label>
                                <input type="text" class="form-control" id="nomorkerjasama"  name="nomorkerjasama" value="<?php if(isset($register1["nomorkerjasama"])) { echo $register1["nomorkerjasama"]; } ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="title">Nama Contact Person :</label>
                                <input type="text"  class="form-control" id="namakontakperson"  name="namakontakperson" value="<?php if(isset($register1["namakontakperson"])) { echo $register1["namakontakperson"]; } ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Nomor HP Contact Person :</label>
                                <input type="text" class="form-control" id="nomorhpkontakperson"  name="nomorhpkontakperson"  value="<?php if(isset($register1["nomorhpkontakperson"])) { echo $register1["nomorhpkontakperson"]; } ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
                            </div>
                            <div class="form-group">

                                <label for="title">Email Contact Person :</label>
                                <input type="email"  class="form-control" id="emailkontakperson"  name="emailkontakperson" value="<?php if(isset($register1["emailkontakperson"])) { echo $register1["emailkontakperson"]; } ?>" required>

                            </div>
                             <div class="form-group">
                                <label for="title">Potensi Komunitas :</label>
                                <input type="text" class="form-control" id="potensikomunitas"  name="potensikomunitas"  value="<?php if(isset($register1["potensikomunitas"])) { echo $register1["potensikomunitas"]; } ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
                            </div>
  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('register.create.step.one') }}" class="btn btn-warning" style="background-color: #F5A707;">Kembali</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/referensi.js')}}"></script>

@include('layouts.footer')
@endsection
