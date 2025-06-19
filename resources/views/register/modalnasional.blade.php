<!-- Modal -->
<div class="modal fade" id="modalnasional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scope Nasional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="control-group after-add-more">

          <form action="{{ route('register.scopenasional') }}" method="POST">
            @csrf
          <body>

                            <div class="form-group">
                                <label for="description"><strong>Memiliki Rayon :</strong></label>
                                <select class="coba" id="rayonnasional" name="rayonnasional" onchange="opsi(this)" required>
                                  <option value="" disabled selected hidden>Pilih Rayon</option>
                                    {{-- <option><?php if(isset($scopenasional["rayon"])) { echo $scopenasional["rayon"]; } ?></option> --}}
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="form-group" id="divtiperayon" style="display:none;">
                                <label for="description"><strong>Tipe Rayon :</strong></label>
                                <select class="coba" id="tiperayonnasional" name="tiperayonnasional" onchange="opsirayon(this)" required>
                                  <option value="" disabled selected hidden>Pilih Tipe Rayon</option>
                                    {{-- <option><?php if(isset($scopenasional["tiperayon"])) { echo $scopenasional["tiperayon"]; } ?></option> --}}
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
      <form id="demoform">
        <select multiple="multiple" size="10" id="multiprovinsi" name="duallistbox_demo1[]" title="duallistbox_demo1[]">
     @foreach($a as $key => $item)
                            <option value="{{ $item->kd_prop }}">({{ $item->nama}})</option>
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
          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3 text-right">
          <button type="submit" class="btn btn-success btn-sm">Next</button>                 
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('js/duallist.js')}}"></script>















