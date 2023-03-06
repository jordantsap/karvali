@extends('layouts.main')

@section('title', __('head.event').' '.$event->title )

@section('meta_description', __('head.event').' '.$event->meta_description)

@section('meta_keywords', __('head.event').', '.' '.$event->meta_keywords)

@section('content')
  <img src="{{ asset('images/events/'.$event->header) }}" alt="{{ $event->title }}" width="100%"
    height="350px">
<div class="container">
  <div id="events">
    <div class="row">
      <h1 class="text-center">
          {{ $event->title }}</h1>
      <div class="divider"></div>
      <br>
    </div>

    <div class="row">
      <div class="col-xs-8">
        <img src="{{ asset('images/events/'.$event->logo) }}" alt="{{ $event->title }}" width="100%"
          height="260px">
      </div>

      <div class="col-xs-4">
        <h2>{{__('page.date')}} {{ date('d-M-Y', strtotime($event->start_date)) }}</h2>
        <h2>{{__('single.starttime')}} {{ $event->start_time }}</h2>
        <h2>{{__('single.endtime')}} {{ $event->end_time }}</h2>
        <h2>{{__('single.entrance')}} {{ $event->entrance }}</h2>
        <h2>{{__('single.telephone')}} {{ $event->telephone }}</h2>
      </div>

      <div class="col-xs-12">
        {{-- <br> --}}
        <div class="col-xs-4" style="margin-bottom: 10px;">
          <h3>{{__('single.opinion')}}</h3>
          <div id="buttonlink" class="col-xs-6">
            <form action="{{ route('like.store') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="likeable_id" value="{{ $event->id }}">
              <input type="hidden" name="likeable_type" value="App\Models\Event">
              <button type="submit" class="btn btn-link">
                <i class="fa fa-3x fa-thumbs-up"></i>
                <span class="badge">{{$event->likes->count()}}</span>
              </button>
            </form>
          </div>
          <div id="buttonlink" class="col-xs-6">
            <a href="#comments">
              <i class="fa fa-3x fa-comment"></i>
              <span class="badge">{{$event->comments->count()}}</span>
            </a>
          </div>
        </div>
        <div class="col-xs-4">
          <h3 class="col-xs-12">{{__('single.moreaboutus')}}: </h3>
          <div class="col-xs-3">
            <a href="//{{ $event->website }}" target="_blank">
              <i class="fa fa-3x fa-home"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="mailto:{{ $event->email }}" target="_top">
              <i class="fa fa-3x fa-envelope"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//{{ $event->facebook }}" target="_blank">
              <i class="fab fa-3x fa-facebook"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//{{ $event->twitter }}" target="_blank">
              <i class="fab fa-3x fa-twitter"></i>
            </a>
          </div>
        </div>
        <div id="social-links" class="col-xs-4">
          <h3 class="col-xs-12">{{__('page.shareit')}}: </h3>
          <div class="row sharethis-inline-share-buttons"></div>
        </div>

      </div>
    </div>


    <div class="row"><br>
      <div class="col-xs-4">
        <a data-lightbox="event" data-title="{{$event->title}}" data-alt="{{$event->title}}"
          href="{{ asset('images/events/'.$event->image1) }}">
          <img src="{{ asset('images/events/'.$event->image1) }}" title="{{ $event->title }}"
            class="img-responsive img-rounded" alt="{{$event->title}}">
        </a>
      </div>
      <div class="col-xs-4">
        <a data-lightbox="event" data-title="{{$event->title}}" data-alt="{{$event->title}}"
          href="{{ asset('images/events/'.$event->image2) }}">
          <img src="{{ asset('images/events/'.$event->image2) }}" title="{{ $event->title }}"
            class="img-responsive img-rounded" alt="{{$event->title}}">
        </a>
      </div>
      <div class="col-xs-4">
        <a data-lightbox="event" data-title="{{$event->title}}" data-alt="{{$event->title}}"
          href="{{ asset('images/events/'.$event->image3) }}">
          <img src="{{ asset('images/events/'.$event->image3) }}" title="{{ $event->title }}"
            class="img-responsive img-rounded" alt="{{$event->title}}">
        </a>
      </div>
    </div>

    <br>
    <div class="center-block">
      <div class="row col-xs-12 text-center">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><p class="bold">{{__('single.description')}}</p>
    						</div>
    						<div class="panel-body">
    							{!! $event->description !!}
    						</div>
    					</div>
    				</div>
          </div>

          <div class="row">
            <div class="col-xs-12" id="comments">
              <h1 class="text-center">{{__('single.comments')}}</h1>
              <div class="divider"></div><br>
            </div>
              <div class="col-xs-12">
                <div class="col-xs-6">
                  <label>{{__('single.latestcomments')}}</label>
                  @if(count($event->comments) > 0)
                  <ul class="list-group">
                    @foreach ($event->comments as $comment)
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
                      <input type="hidden" name="commentable_id" value="{{$event->id}}">
                      <input type="hidden" name="commentable_type" value="App\Event">
                      <div class="form-group">
                        <label for="email">Email</label>
                        @if (Auth::user())
                        <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email }}" required readonly>
                      @elseif (Auth::guard('customer')->user())
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth('customer')->user()->email }}" readonly>
                        @else
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="comment">{{__('single.newcomment')}}</label>
                        <textarea class="form-control" name="comment" rows="5"></textarea>
                      </div>
                      <button id="btn" type="submit" class="btn btn-primary btn-block">{{__('single.addcomment')}}</button>
                    </form>
                </div>
              </div>
            </div>

			</div>
		</div>
	</div>
	<br>
@endsection
