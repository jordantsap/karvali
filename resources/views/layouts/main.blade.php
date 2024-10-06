<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
@livewireStyles

@include('partials.head')
@include('partials.header')
<body>
@include('partials.social')

@include('partials.alerts')

  @section('content')
  @show

@include('partials.bottom')

@include('partials.footer')

@livewireScripts

</body>
</html>
