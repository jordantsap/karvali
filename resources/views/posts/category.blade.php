@extends('layouts.main')
@section('title', $posttype->name.' '.__('head.postcategory'))
@section('meta_description', $posttype->name.' '.__('meta.postcategorydescription'))
@section('meta_keywords', $posttype->name.' '.__('meta.postcategorykeywords'))

@section('content')
<!-- Page Content -->
<div id="posts">
<div class="container">
    <div class="row">
      <h1 class="">{{ __('page.posts') }}</h1>
      <nav class="navbar">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#posttype-collapse"
          aria-expanded="false">
          <span class="">{{__('page.categories')}}</span>
          <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
        </button>
        <div class="row">
          <!-- List group -->
          <ul class="nav navbar-nav collapse navbar-collapse" id="posttype-collapse">
            @foreach($posttypes as $posttype)
            <li>
              <a href="{{ route('posts-category', $posttype->slug)}}" class="">{{ $posttype->name }}&nbsp
                <span class="badge">{{$posttype->posts->where('active',1)->count()}}</span>
              </a>
            </li>
            @endforeach
            <li>
              <script>
                document.write('<a href="' + document.referrer + '">{{__('page.backlink')}}</a>');
              </script>
            </li>
          </ul>
        </div>
      </nav>
      <div class="divider"></div>

      <div class="row">
        @if(count($posts) > 0) @foreach ($posts as $post)
          <div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
            <div class="card h-100">
              <a href="{{ route('news.show', $post->slug) }}">
                <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="{{asset('images/posts/'.$post->image)}}"
                  alt="{{ $post->title }}">
              </a>
            </div>
            <div class="card-body text-center">
              <h2 class="card-title">
                  <a href="{{ route('news.show',$post->slug) }}">{{ Str::limit($post->title, 30) }}</a>
                </h2>
              <div class="row">
                <div class="col-xs-12">
                  <h4><b>{{__('page.category')}}</b></h4>
                  <a href="{{ route('posts-category', $post->category->slug)}}">
                    <h3>{{$post->category->name}}</h3></a>
                  <div class="divider"></div>
                  {{-- <br> --}}
                </div>
                <div class="col-xs-12">
                  <h4><b>{{__('page.description')}}</b></h4>
                  {!!Str::limit($post->description, 50)!!}
                </div>
              </div>
            </div>
          </div>

        @endforeach @else
        <div class="col-xs-12 noresults">
          <h1><b>{{__('page.noresults')}}</b></h1>
        </div>
        @endif

      </div>

      <div class="col-xs-9">
        {{ $posts->links() }}
      </div>

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->
</div>
<br> @endsection
