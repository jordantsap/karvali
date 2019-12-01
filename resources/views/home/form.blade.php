<section>
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h1 style="color:white;">{{__('form.moto')}}</h1>
      </div>
      <div class="col-xs-12 text-center">
        <form action="{{route('searchresults')}}" method="get">
          <div class="form-group">
            <div class="col-xs-10" style="padding-left:0px !important;padding-right:0px !important;">
              <input type="text" name="query" class="form-control input-lg" id="query" placeholder="{{__('form.search-input')}}">
            </div>
            <div class="col-xs-2" style="padding:0px 0px !important">
              <button type="submit" class="btn btn-default btn-block input-lg">
                <span class="text-center"><i class="fa fa-2x fa-search"></i></span>
              </button>
            </div>
          </div>
          {{-- {{ csrf_field() }} --}}
        </form>

      </div>
    </div>
  </div>

</section>
@section('extra-js')

@endsection
