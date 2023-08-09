@extends('layouts.main')
@section('title', $accommodation->title.' '.$accommodation->title)
@section('meta_description', '$accommodation->name'.' '.__('head.hotel').' '.$accommodation->meta_description)
@section('meta_keywords', $accommodation->meta_keywords.'  '. '$accommodation->name'.' '.__('head.hotel'))

@section('head-js')
  <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')

<img width="100%" height="350px" src="{{ asset('images/accommodations/' . $accommodation->header)??$accommodation->header }}"
  title="{{ $accommodation->title }}" class="" alt="{{$accommodation->title}}">
<h1 class="text-center">{{ $accommodation->title }}</h1>
<div class="divider"></div>
<br>
<div class="container">
  <div id="companies">

    <div class="row">
      <div class="col-xs-6">
        <img src="{{ asset('images/accommodations/', $accommodation->logo) }}" width="100%" height="250"
          alt="{{ $accommodation->title }}" title="{{ $accommodation->title }}">
        </div>

      <div class="col-xs-6">
        <div class="col-xs-9">
          <h3>{{__('single.manager')}} {{ $accommodation->manager }}</h3>
          <h3>{{__('single.telephone')}} {{ $accommodation->telephone }}</h3>
        </div>


      </div>

      <div class="col-xs-12">
        {{-- <br> --}}
        <div class="col-xs-4  text-center" style="margin-bottom: 10px;">
          <h3 class="col-xs-12">{{__('single.opinion')}}</h3>

          <div id="buttonlink" class="col-xs-6">
            <form action="{{ route('like.store') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="likeable_id" value="{{ $accommodation->id }}">
              <input type="hidden" name="likeable_type" value="App\Models\Event">
              <button type="submit" class="btn btn-link">
                <i class="fa fa-3x fa-thumbs-up"></i>
                <span class="badge">{{$accommodation->likes->count()}}</span>
              </button>
            </form>
          </div>
          <div id="buttonlink" class="col-xs-6">
            <a onclick='window.scrollTo({top: 0, behavior: "smooth"});' href="#comments">
              <i class="fa fa-3x fa-comment"></i>
              <span class="badge">{{$accommodation->comments->count()}}</span>
            </a>
          </div>
        </div>
        <div class="col-xs-4">
          <h3 class="col-xs-12 text-center">{{__('single.moreaboutus')}}: </h3>
          <div class="col-xs-3">
            <a href="//{{ $accommodation->website }}" target="_blank">
              <i class="fa fa-3x fa-home"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="mailto:{{ $accommodation->email }}" target="_top">
              <i class="fa fa-3x fa-envelope"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//{{ $accommodation->facebook }}" target="_blank">
              <i class="fab fa-3x fa-facebook"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//{{ $accommodation->twitter }}" target="_blank">
              <i class="fab fa-3x fa-twitter"></i>
            </a>
          </div>
        </div>
        <div id="social-links" class="col-xs-4">
          <h3 class="col-xs-12 text-center">{{__('page.shareit')}}:</h3>
          <div class="row sharethis-inline-share-buttons"></div>
        </div>

      </div>
    </div>


    <div class="row center-block">
      <br>

      <div class="panel panel-primary text-center">
        <div class="panel-heading">
          <h3 class="panel-title">{{__('single.description')}}</p>
							  </div>
							  <div class="panel-body">
							    <h2>{!!$accommodation->description!!}</h2>
							  </div>
							</div>
						</div>


              <div class="row">
                <div class="col-xs-4">
                  <a data-lightbox="accommodations" data-title="{{$accommodation->title}}" data-alt="{{$accommodation->title}}" href="{{ asset('images/accommodations/'.$accommodation->image1) }}">
                    <img src="{{ asset('images/accommodations/'.$accommodation->image1) }}" title="{{ $accommodation->title }}" class="img-responsive img-rounded" alt="{{$accommodation->title}}">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a data-lightbox="accommodations" data-title="{{$accommodation->title}}" data-alt="{{$accommodation->title}}" href="{{ asset('images/accommodations/'.$accommodation->image2) }}">
                    <img src="{{ asset('images/accommodations/'.$accommodation->image2) }}" title="{{ $accommodation->title }}" class="img-responsive img-rounded" alt="{{$accommodation->title}}">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a data-lightbox="accommodations" data-title="{{$accommodation->title}}" data-alt="{{$accommodation->title}}" href="{{ asset('images/accommodations/'.$accommodation->image3) }}">
                    <img src="{{ asset('images/accommodations/'.$accommodation->image3) }}" title="{{ $accommodation->title }}" class="img-responsive img-rounded" alt="{{$accommodation->title}}">
                  </a>
                </div>
              </div>

				<div class="row"><br>

					<div class="col-xs-12">
            <h1 class="text-center">{{__('single.accommodation')}} {{$accommodation->title}}</h1>
  					<div class="divider"></div><br>
          </div>

          @if(count($accommodation->rooms->where('active',1)) > 0)
            @foreach($accommodation->rooms->where('active',1) as $accommodation)
              <div class="col-xs-3">
                <ul class="list-group">
                  <li class="list-group-item"><h2>{{__("Title: "). $accommodation->title }}</h2>
                  </li>
                  <li class="list-group-item"><img src="{{ asset('images/rooms/'.$accommodation->logo) }}" width="100%" height="100px" alt="{{$accommodation->title}}" title={{$accommodation->title}}"></li>
                   <li class="">
                       Κατηγορία: <a href="{{ $accommodation->accommodationType? route('front.room-types', $accommodation->accommodationType->slug):'#'}}">
                           {{ $accommodation->accommodationType? $accommodation->accommodationType->title :'' }}</a></li>
                  <li class="list-group-item"><h3>Τιμή: {{ $accommodation->price }}</h3></li>
          <li class="list-group-item">
            <h3>{{ $accommodation->description }}</h3>
          </li>
          <li class="list-group-item">
{{--            <a href="{{route('front.room.show',$accommodation->id) }}" class="btn btn-default btn-block">Show</a>--}}
              <a href="#" data-toggle="modal" data-target="#roomModal">
                  {{__('Title'). $accommodation->title }}
              </a>
          </li>
          </ul>
        </div>
        @endforeach @else
        <p class="text-center">{{ __('single.norooms') }}</p>
        @endif

      </div>
      {{-- comments --}}
      <div class="row">
        <div class="col-xs-12" id="comments">
          <h1 class="text-center">{{__('single.comments')}}</h1>
          <div class="divider"></div>
          <br>
        </div>

        <div class="col-xs-6">
          <label>{{__('single.latestcomments')}}</label>
          @if($accommodation->comments)
          <ul class="list-group">
            @foreach ($accommodation->comments as $comment)
            <li class="list-group-item">
              {{$comment->comment}}
            </li>
            @endforeach
          </ul>
          @else
          <li class="list-group-item">{{__('single.nocomments')}}</li>
          @endif
        </div>
        <div class="col-xs-6">
          <form action="{{ route('comment.store') }}" method="post" role="form">
            {{ csrf_field() }}
            <input type="hidden" name="commentable_id" value="{{$accommodation->id}}">
            <input type="hidden" name="commentable_type" value="App\Company">
            <div class="form-group">
              <label for="email">Email</label>
              @if (Auth::user())
              <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email }}"
                required readonly> @elseif (Auth::guard('customer')->user())
              <input type="email" class="form-control" id="email" name="email" value="{{ auth('customer')->user()->email }}"
                required readonly> @else
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                required> @endif
            </div>
            <div class="form-group">
              <label for="comment">{{__('single.newcomment')}}</label>
              <textarea class="form-control" name="comment" rows="5" required></textarea>
            </div>
            <button id="btn" type="submit" class="btn btn-primary btn-block">{{__('single.addcomment')}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
{{--@include('modals.roomModal')--}}
