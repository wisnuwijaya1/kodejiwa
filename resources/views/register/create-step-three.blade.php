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


legend{color:inherit;display:table;max-width:100%;padding:0;white-space:normal}textarea{overflow:auto}

.w3-table,.w3-table-all{border-collapse:collapse;border-spacing:0;width:100%;display:table}.w3-table-all{border:1px solid #ccc}
.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid #ddd}.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
.w3-table-all tr:nth-child(odd){background-color:#fff}.w3-table-all tr:nth-child(even){background-color:#f1f1f1}
.w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}.w3-centered tr th,.w3-centered tr td{text-align:center}
.w3-table td,.w3-table th,.w3-table-all td,.w3-table-all th{padding:8px 8px;display:table-cell;text-align:left;vertical-align:top}
.w3-table th:first-child,.w3-table td:first-child,.w3-table-all th:first-child,.w3-table-all td:first-child{padding-left:16px}
.w3-cell-row:before,.w3-cell-row:after,.w3-clear:after,.w3-clear:before,.w3-bar:before,.w3-bar:after{content:"";display:table;clear:both}


</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
@if(Session::has('success'))
                    @include('layouts.flash-success',[ 'message'=> Session('success') ])
                    @endif
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
        <div class="d-flex align-items-center">
            <div style="background-color: #E67E22; width: 32px; height: 32px; border-radius: 50%; text-align: center; position: relative;">
                <p style="color: #fff;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">3</p>
            </div>
            <div class="mx-2" style="color: #E67E22;">Info Rekening</div>
            <div class="mx-2" style="height: 1px; width:100px; background-color:#E67E22 ;"></div>
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
            <form action="{{ route('register.create.step.three.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header"><h5>Step 3: Info Rekening</h5></div>
   
                    <div class="card-body">
                            @if($register2==null)
                            <div class="form-group fieldGroup" >
                                <label for="description"><strong>Jenis Rekening :</strong></label>
                                <select  class="coba" id="jenisrekening" name="jenisrekening[]" onchange="test()" onclick="getnamarekening()" required>
                                    <option value="" disabled selected hidden>Pilih Jenis Rekening</option>
                                        @foreach($a as $key => $item)
                                        <option value="{{ $item->jenis_rekening }},{{ $item->nama_rekening }}">({{ $item->nama_rekening}})</option>
                                        @endforeach
                                </select>
                                <br>
                                <br>

                                <label for="title">No Rekening Escrow :</label>
                                <input type="text" class="form-control" id="norekescrow"  name="norekescrow[]"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                               @else
                               <div class="form-group fieldGroup" >
                                <label for="description"><strong>Jenis Rekening :</strong></label>
                                <select  class="coba" id="jenisrekening" name="jenisrekening[]" onchange="test()" onclick="getnamarekening()">
                                    <option value="" disabled selected hidden>Pilih Jenis Rekening</option>
                                        @foreach($a as $key => $item)
                                        <option value="{{ $item->jenis_rekening }},{{ $item->nama_rekening }}">({{ $item->nama_rekening}})</option>
                                        @endforeach
                                </select>
                                <br>
                                <br>

                                <label for="title">No Rekening Escrow :</label>
                                <input type="text" class="form-control" id="norekescrow"  name="norekescrow[]"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                @endif
                                <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="javascript:void(0)" class="btn btn-success addMore" id="addmore" style="display: none;"><i class="fas fa-plus"></i></a>
                                </div>
                                <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-success" id="cekrekening" style="display: none;" onclick="validasirekening()">Cek Rekening</button>
                            </div>
                            </div>
                            </div>
                            <br>
                            <div>
                            <table class="w3-table-all" id="myTable">
<thead>
    
<th nowrap>No</th>      
<th nowrap>Jenis Rekening</th>      
<th nowrap>Nomor Rekening</th>      
<th nowrap>Nama Pemilik Rekening</th>
<th nowrap>Action</th>
@if($register2==null)
</tr>
</thead>
<tbody >
</tbody>
</tr>
</thead>
@else
    <tbody >
    <?php $no = 0;?>
    @foreach($register2 as $key => $item)
<?php $no++ ;?>
    <tr class="child">
    <td>{{ $no }}</td>
    <td><?php if(isset($item[2])) { echo $item[2]; } ?></td>
    <td><?php if(isset($item[3])) { echo $item[3]; } ?></td>
    <td><?php if(isset($item[4])) { echo $item[4]; } ?></td>
    <td><a href="javascript:void(0);" class="remCF1 btn btn-small btn-danger">Remove</a></td>
    </tr>
    @endforeach
</tbody>
@endif
</table>
</div>

<br>
                            </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('register.create.step.two') }}" class="btn btn-danger pull-right" style="background-color: #F5A707;">Kembali</a>
                            </div>
                            <div class="col-md-6 text-right">
                                @if($register2==null)
                                <button type="submit" id="next" class="btn btn-primary" onclick="hapussession()" disabled>Selanjutnya</button>
                                @else
                                <button type="submit" id="next" class="btn btn-primary" onclick="hapussession()" enabled>Selanjutnya</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

  <script>
    function test(){
        var jenisrek = document.getElementById("jenisrekening").value;
            document.getElementById("cekrekening").style.display = "";
    }

    $(document).ready(function(){
      var jenisrek = document.getElementById("jenisrekening").value;

    if (jenisrek=='') {
        document.getElementById("cekrekening").style.display = "none";
    }
    
    });

    $(document).on('click','.remCF1',function(){
                            $(this).parent().parent().remove();
                            $('#myTable tbody tr').each(function(i){            
                            $($(this).find('td')[0]).html(i+1);
            
           
                        });
                        });

  </script>                          

                            
                            


                    
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/referensi.js')}}"></script>



@include('layouts.footer')
@endsection
