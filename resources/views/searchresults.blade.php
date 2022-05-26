<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    
    @include('partials.social')
    @include('partials.header')

    @if (count($results))
        No results here
        @else
        {{-- @foreach ($results as $result)
            <h1>efgfssdyhdrtfdyhrt</h1>
        @endforeach   --}}
    @endif

    @include('partials.footer')
</body>
</html>