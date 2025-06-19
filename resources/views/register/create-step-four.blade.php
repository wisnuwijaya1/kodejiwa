@extends('layouts.appform')
@section('content')


<br>
<br>
<br>
<div class="d-flex justify-content-center">
        <a href="{{ route('register.create.step.one') }}" style="position: relative; height: 32px;" class="d-flex align-items-center align-middle">
            <div style="background-color: #D7d7d7; width: 35px; height: 35px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">1</p>
            </div>
            <div class="mx-2" style="color: black;">Info Komunitas</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#D7d7d7 ; position: relative;"></div>
        </a>
        <a href="{{ route('register.create.step.two') }}" class="d-flex align-items-center">
            <div style="background-color: #D7d7d7; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">2</p>
            </div>
            <div class="mx-2" style="color: black;">Detail Komunitas</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#D7d7d7 ;"></div>
        </a>
        <a href="{{ route('register.create.step.three') }}" class="d-flex align-items-center">
            <div style="background-color: #D7d7d7; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #8E8E8E;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">3</p>
            </div>
            <div class="mx-2" style="color: black;">Info Rekening</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#D7d7d7 ;"></div>
        </a>
        <div class="d-flex align-items-center">
            <div style="background-color: #E67E22; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #fff;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">4</p>
            </div>
            <div class="mx-2" style="color: #E67E22;">Review Detail</div>
        </div>
       
    </div>

    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('register.create.step.four.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header"><h5>Step 4: Review Detail</h5></div>
   
                    <div class="card-body">
                            
                            <table class="table" style="width: 100%;">
                                 <tr>
                            <td><h4>1. Info Komunitas</h4></td>
                            </tr>
                                {{-- <tr>
                                    <td style="width: 300px;">Kode Komunitas</td>
                                    <td>:</td>
                                    <td><strong>{{$register['kodekomunitas']}}</strong></td>
                                </tr> --}}
                                <tr>
                                    <td style="width: 300px">Nama Komunitas</td>
                                    <td>:</td>
                                    <td><strong>{{$register['namakomunitas']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><strong>{{$register['alamat']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td><strong>{{$namaprovinsi['namaprovinsi']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td>:</td>
                                    <td><strong>{{$namakabupaten['namakabupaten']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td><strong>{{$namakecamatan['namakecamatan']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kelurahan</td>
                                    <td>:</td>
                                    <td><strong>{{$kprk['namakelurahan']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kode POS</td>
                                    <td>:</td>
                                    <td><strong>{{$register['kodepos']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kantor Pos Pemeriksa</td>
                                    <td>:</td>
                                    <td><strong>{{$kprk['namakprk']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Scope Komunitas</td>
                                    <td>:</td>
                                    <td><strong>{{$skopekomunitas}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Memiliki Rayon</td>
                                    <td>:</td> 
                                    <td><strong id="haverayon" value="<?php if(isset($scopekabupaten["rayonkabupaten"])) echo $scopekabupaten["rayonkabupaten"]?> <?php if(isset($scopenasional["rayonnasional"])) echo $scopenasional["rayonnasional"]?> <?php if(isset($scopeprovinsi["rayonprovinsi"])) echo $scopeprovinsi["rayonprovinsi"]; ?>" ></strong></td>
                                </tr>
                                <tr>
                                    <td>Tipe Rayon</td>
                                    <td>:</td>
                                    <td><strong><?php if(isset($a)) echo $a?> <?php if(isset($b)) echo $b?> <?php if(isset($c)) echo $c; ?></strong></td>
                                </tr>
                                {{-- <?php dd($scopekabupaten['multikecamatan']); ?> --}}
                                <tr>
                                    <td>Jangkauan Daerah</td>
                                    <td>:</td> 
                                    <td><strong> <?php if($namakec=='(null)'){echo '';} else{echo $namakec;}?> <?php if($namakab=='(null)') {echo '';} else {echo $namakab;}?> <?php if($namaprov=='(null)') {echo '';} else {echo $namaprov;}?> </strong></td>
                                </tr>
                

                            <tr>
                            <td><h4>2. Detail Komunitas</h4></td>
                            </tr>
                                <tr>
                                    <td style="width: 200px;">Model Kerjasama</td>
                                    <td>:</td>
                                    <td><strong id="modelkerjasama" value="{{$register1['modelkerjasama']}}"></strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor Kerjasama</td>
                                    <td>:</td>
                                    <td><strong>{{$register1['nomorkerjasama']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nama Kontak Person</td>
                                    <td>:</td>
                                    <td><strong>{{$register1['namakontakperson']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor HP Kontak Person</td>
                                    <td>:</td>
                                    <td><strong>{{$register1['nomorhpkontakperson']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Email Kontak Person</td>
                                    <td>:</td>
                                    <td><strong>{{$register1['emailkontakperson']}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Potensi Komunitas</td>
                                    <td>:</td>
                                    <td><strong>{{$register1['potensikomunitas']}}</strong></td>
                                </tr>

                             <tr>
                            <td><h4>3. Info Rekening</h4></td>
                            </tr>

                                <tr>
                                    <td>Kode Jenis Rekening</td>
                                    <td>:</td>
                                    <td><strong>{{$jenisrek}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening Escrow</td>
                                    <td>:</td>
                                    <td><strong>{{ $nomorrek }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nama Rekening Escrow</td>
                                    <td>:</td>
                                    <td><strong>{{$namarekening}}</strong></td>
                                </tr>
                                
                            </table>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('register.create.step.three') }}" class="btn btn-danger pull-right" style="background-color: #F5A707;">Kembali</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
     var modelkerjasama = document.getElementById("modelkerjasama").innerHTML;

     let model = $('#modelkerjasama')

        if (model == 0)
            {
                model.append(`Ya`)
            }
            else
            {
                model.append(`Tidak`)
            }




     let haverayon = $('#haverayon')

        if (haverayon == 1)
            {
                haverayon.append(`Ya`)
            }
            else
            {
                haverayon.append(`Tidak`)
            }
</script>

@include('layouts.footer')
@endsection

