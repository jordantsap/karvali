<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')
@include('partials.header')
<br>
<body>

  {{-- @include('partials.social') --}}

  @include('partials.alerts')

  @section('content')
  @show

  @include('partials.bottom')

  @include('partials.footer')

</body>
</html>
