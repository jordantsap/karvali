@extends('layouts.main')
@section('title', $album->title )
@section('meta_description', $album->meta_description)
@section('meta_keywords', $album->meta_keywords)

@section('content')
  <img src="{{ asset('images/albums/'.$album->cover_image) }}" alt="{{ $album->alt }}" width="100%" height="300px">
  <div class="container">
    <div id="album">
      <div class="row text-center">
        <div class="col-xs-12">
          <h1>{{ $album->title }}</h1>
          <div class="divider"></div><br>
        </div>
        <div class="col-xs-12">
          <div class="panel panel-primary">
            <div class="panel-heading">{{__('single.description')}}</div>
            <div class="panel-body">
              {!!$album->description!!}
            </div>
          </div>
        </div>

      </div>
      <div class="row text-center social-links">
        <h3 class="col-xs-12">Διαδώστε το!: </h3>
        <div class="sharethis-inline-share-buttons"></div>
      </div>

      <div class="row"><br>

        <div class="col-xs-12">
          <h1 class="text-center">{{__('single.photosheader')}} {{$album->title}}</h1>
          <div class="divider"></div><br>
        </div>

        @if(count($album->photos->where('active',1)) > 0)
          @foreach($album->photos->where('active',1) as $photo)
            <div class="col-xs-3" style="margin-bottom:20px;">
                <a data-lightbox="albumphoto" data-title="{{$photo->title}}" data-alt="{{$photo->alt}}" href="{{ asset('images/albumphotos/'.$photo->file) }}">
                <img src="{{ asset('images/albumphotos/'.$photo->file) }}" width="100%" height="200px" alt="{{$photo->alt}}" title"{{$photo->title}}">
              </a>
      </div>
      @endforeach @else
      <p class="text-center">No published photos</p>
      @endif

    </div>

    </div>

  </div>
  <br>
@endsection
