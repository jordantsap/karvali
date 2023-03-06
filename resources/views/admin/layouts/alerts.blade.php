@if (session())
<div class="container">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-2 errors">
      @if (session()->has('status'))
      <div class="alert alert-info">
        {{ session()->get('status') }}
      </div>
      @endif
      @if (session()->has('success')) <br>
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if (session()->has('warning')) <br>
      <div class="alert alert-danger">
        {{ session()->get('warning') }}
      </div>
      @endif
      @if (session()->has('error'))
      <div class="alert">
        {{ session()->get('error') }}
      </div>
      @endif
      @if (session()->has('errors'))
        <div class="alert">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item">{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
      @endif
    </div>
  </div>
</div>
@endif
