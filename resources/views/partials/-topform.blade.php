<form class="col-xs-12 navbar-form navbar-left" action="{{route('searchresults')}}"
  method="get">
  {{-- {{ csrf_field() }} --}}
  <div class="form-group">
    <select class="form-control" id="explore" name="explore" required>
      <option value="{{ request()->input('explore') }}" selected="true" disabled="true">-Explore-</option>
      @foreach ($tags as $tag)
        <option value="{{$tag->slug}}">-{{$tag->name}}-</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <input type="text" name="query" class="form-control" id="" value="{{ request()->input('query') }}" placeholder="Search what are you looking for">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default btn-block">
      <span class="text-center"><i class="fa fa-lg fa-search"></i></span>
    </button>
  </div>
</form>
