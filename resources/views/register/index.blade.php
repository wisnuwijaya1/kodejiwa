@extends('layouts.appform')
@section('content')

<br>
<br>
<br>
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-14">
           <div class="card">
                <div class="card-body content-table">
                    <div class="card-header"><h4>Data Registrasi Komunitas</h4></div>
  
                    <br>
                      <div class="col-md-12 text-right">
                    <a href="{{ route('register.create.step.one') }}" class="btn btn-primary pull-right">Registrasi Komunitas</a>
                </div>
    
            <table id="example" class="table table-bordered table-striped">

             <br>       

            </div>

                <thead class="thead-default">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Skope</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Approval</th>
                            <th scope="col">Rayon</th>
                            <th scope="col">Status Rekening</th>
                            <th scope="col">Status Pusat</th>
                            <th scope="col">Waktu Registrasi</th>
                            <th scope="col">Act</th>
                        </tr>
                        </thead>
                <tbody>

                </tbody>
            </table>      
          </div>
    </div>
</div>
</div>
</div>


<!-- Modal Detail Komunitas -->
<div class="modal fade" id="modaldetailkomunitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="control-group after-add-more">
          <body>

           
    <div class="row justify-content-center">
        <div class="col-md-12">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header"><h5>Review Detail Komunitas</h5></div>
   
                    <div class="card-body">
                            
                            <table class="table" style="width: 100%;">
                                 <tr>
                            </tr>
         
                                <tr>
                                    <td style="width: 200px">Rayon</td>
                                    <td>:</td>
                                    <td><strong id="rayon"></strong></td>
                                </tr>
                                <tr>
                                    <td>Skope</td>
                                    <td>:</td>
                                    <td ><strong id="skope"></strong></td>
                                </tr>
                                <tr>
                                    <td><h5>Komunitas Detail</h5></td>
                                    <td></td>
                                    <td >
                                    <tr>
                                        <td>Nama Komunitas</td>
                                        <td>:</td>
                                        <td><strong id="namakomunitas"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><strong id="alamat"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>kodepos</td>
                                        <td>:</td>
                                        <td><strong id="kodepos"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kota</td>
                                        <td>:</td>
                                        <td><strong id="kota"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Kerjasama</td>
                                        <td>:</td>
                                        <td><strong id="nomorkerjasama"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Propinsi</td>
                                        <td>:</td>
                                        <td><strong id="propinsi"></strong></td>
                                    </tr>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5>Kontak Person</h5></td>
                                    <td></td>
                                    <td>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><strong id="nama"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><strong id="email"></strong></td>
                                    </tr>
                                    </td>
                                    <tr>
                                        <td>Nomor HP</td>
                                        <td>:</td>
                                        <td><strong id="nohp"></strong></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><h5>Rekening</h5></td>
                                    <td></td>
                                    <td>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><strong id="statusrek"></strong></td>
                                    </tr>
                                     <tr style="display: none;">
                                        <td>Nomor Rekening</td>
                                        <td>:</td>
                                        <td><strong id="norek"></strong></td>
                                    </tr>
                                     <tr>
                                        <td>Jenis & Nomor Rekening</td>
                                        <td>:</td>
                                        <td><strong id="jenisrek"></strong></td>
                                    </tr>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5>Wilayah</h5></td>
                                    <td></td>
                                    <td>
                                    <tr style="display: none;">
                                        <td>Kode Daerah</td>
                                        <td>:</td>
                                        <td><strong id="kodedaerah"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Daerah</td>
                                        <td>:</td>
                                        <td><strong id="namadaerah"></strong></td>
                                    </tr>
                                    </td>
                                </tr>
                               

                            
                                
                            </table>
                    </div>

                   
                        </div>

                    </div>
                </div>
        </div>
    </div>

<div class="modal-footer">
        <div class="col-md">
          <button type="button" class="btn btn-warning btn-lg btn-block" style="background-color: #F5A707;" data-dismiss="modal">Close</button>
        </div>

      </div>
                            
</body>
</div>
</div>

    </div>
  </div>
</div>


<script src="{{asset('js/tampildetailkomunitas.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    @if(session()->has('success'))
                                {{-- <div class="alert alert-success"> --}}
                                        <script>
                    Swal.fire(
                    'Data Save Success',
                    'Data Berhasil Di Simpan',
                    'success')
                    </script>
                                    {{-- {{ session()->get('message') }} --}}
                                {{-- </div> --}}
                    @endif

@include('layouts.footer')
@endsection
