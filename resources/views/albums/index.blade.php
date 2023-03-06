@extends('layouts.main')
@section('title', __('head.galleries'))
@section('meta_description', __('meta.albumspagedescription'))
@section('meta_keywords', __('meta.albumspagekeywords'))

@section('content')
<!-- Page Content -->
<div id="albums">
<div class="container">
    <div class="row">
      <h1 class="">{{ __('page.galleries') }}</h1>

      <div class="divider"></div>

      <div class="row">
        @if(count($albums) > 0) @foreach ($albums as $album)
        <div class="col-xs-12 col-sm-6 portfolio-item">
          <div class="card-body">
            <h2 class="card-title text-center">
              {{ Str::limit($album->title, 50) }}
            </h2>
              <a href="{{ route('gallery',$album->slug) }}">
                <img class="img-responsive img-fluid rounded" style="width:100%;height:250px;" src="{{ asset('images/albums/'.$album->cover_image) }}" alt="{{ $album->alt }}">
              </a>
            <div class="row">
              <div class="col-xs-12 text-center">
                <h3><b>{{__('page.description')}}:</b>
                <div class="divider"></div>
                <br>
                {{ Str::limit($album->description, 100) }}</h3>
              </div>
            </div>
          </div>
        </div>

        @endforeach @else
        <div class="col-xs-12 noresults">
          <h1><b>{{__('page.noresults')}}!</b></h1>
        </div>
        @endif

      </div>

      <div class="col-xs-9">
        {{ $albums->links() }}
      </div>

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->
</div>
<br> @endsection
