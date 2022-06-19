@extends('layouts.main')
@section('title', __('head.searchresultspage'))
@section('meta_description', __('meta.searchresultspagedescription'))
@section('meta_keywords', __('meta.searchresultspagekeywords'))

@section('content')

<div class="container">
    <div id="searchresultsheader">
        <h1>Αναζήτηση για {{ $query }}</h1>
        @include('home.form')
    </div>
    @if (!count($results))
    <h1>No results here</h1>
    @include('home.categories')
    @else
    @foreach ($results as $result)
    <h1>{{$result->title}}</h1>
    @endforeach  
    @include('home.categories')
@endif
</div>

@endsection