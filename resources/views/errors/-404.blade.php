@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{-- @include('auth.sidebar') --}}
        <div class="center-block">
          error 404 page go <a id="btn" href="/">Home</a> or <a href="javascript:history.back()">Go Back</a>
        </div>
    </div>
</div>
@endsection
