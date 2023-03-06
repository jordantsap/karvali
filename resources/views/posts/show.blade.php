@extends('layouts.main')
@section('title', $post->title.' '.$post->category->name.' '. __('head.post') )
@section('meta_description', $post->category->name.' '.$post->meta_description)
@section('meta_keywords', $post->meta_keywords.', '. $post->category->name.', '.__('head.postcategory'))

@section('content')
  <div class="container">
    <div id="posts">
      <div class="row">
        <div class="col-xs-12">
          <h1>{{ $post->title }}</h1>
          <div class="divider"></div><br>

        </div>
        <div class="col-xs-12 col-sm-8">
            <img src="{{ asset('images/posts/'.$post->image) }}" alt="{{ $post->title }}" width="100%" height="300px">
        </div>
        <div class="row col-xs-12 col-sm-4 text-center">
          <div class="col-xs-12"><h2>{{__('single.category')}} @if( ! empty($post->category)){{ $post->category->name }}
          @else Uncategorised
          @endif</h2></div>
          <div id="social-links">
            <h2 class="col-xs-12">{{__('page.shareit')}}: </h2>
            <div class="row sharethis-inline-share-buttons"></div>
            {{-- <col-xs-3><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="social-button " id=""><span class="fa fa-facebook-official fa-3x"></span></a></col-xs-3>
             <div class="col-xs-3"><a target="_blank" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{url()->current()}}" class="social-button " id=""><span class="fa fa-twitter fa-3x"></span></a>
             </div>
              <div class="col-xs-3"><a href="https://plus.google.com/share?url={{url()->current()}}" class="social-button " id=""><span class="fa fa-google-plus fa-3x"></span></a></div>
              <div class="col-xs-3"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" class="social-button " id=""><span class="fa fa-linkedin fa-3x"></span></a></div> --}}
          </div>
        </div>
        <br>
        <div class="col-xs-12">
          <br>
          <div class="panel panel-primary text-center">
            <div class="panel-heading">{{__('single.description')}}</div>
            <div class="panel-body text-center">
              <h3>{!! $post->description !!}</h3>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <br>
@endsection
