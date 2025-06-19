<script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>
@if(Session::has('flash_message'))
    <div class="row">
      <div class="col-12">
        <div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
          {!! Session::get('flash_message') !!}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
@endif
