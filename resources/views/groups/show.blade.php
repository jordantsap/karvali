@extends('layouts.main')
@section('title', $group->category->name.' '.__('head.group').' '.$group->title )
@section('meta_description', $group->category->name.' '.__('head.group').' '.$group->meta_description)
@section('meta_keywords', $group->meta_keywords.' '. $group->category->name)

@section('content')
  <img width="100%" height="350px" src="{{ asset('images/venues/'.$group->header) }}" title="{{ $group->title }}" class="" alt="{{$group->title}}">
	<div class="container">
		<div id="groups">

      <div class="row">
					<h1 class="text-center">
						{{ $group->title }}
          </h1>
					<div class="divider"></div><br>

          <div class="col-xs-8">
            <img src="{{ asset( $group->logo) }}" width="100%" height="200px"alt="{{ $group->title }}">
          </div>

          <div class="col-xs-4 text-center">
            <h2>{{__('single.category')}} {{ $group->category->name }}</h2>
            <h2>{{__('single.manager')}} {{ $group->manager }}</h2>
            <h2>{{__('single.telephone')}} {{ $group->telephone }}</h2>
          </div>
          <div class="col-xs-12">
            {{-- <br> --}}
            <div class="col-xs-4" style="margin-bottom: 10px;">
              <h3>{{__('single.opinion')}}</h3>
              <div id="buttonlink" class="col-xs-6">
                <form action="{{ route('like.store') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="likeable_id" value="{{ $group->id }}">
                  <input type="hidden" name="likeable_type" value="App\Models\Event">
                  <button type="submit" class="btn btn-link">
                    <i class="fa fa-3x fa-thumbs-up"></i>
                    <span class="badge">{{$group->likes->count()}}</span>
                  </button>
                </form>
              </div>
              <div id="buttonlink" class="col-xs-6">
                <a href="#comments">
                  <i class="fa fa-3x fa-comment"></i>
                  <span class="badge">{{$group->comments->count()}}</span>
                </a>
              </div>
            </div>
            <div class="col-xs-4">
              <h3 class="col-xs-12">{{__('single.moreaboutus')}}: </h3>
              <div class="col-xs-3">
                <a href="//{{ $group->website }}" target="_blank">
                  <i class="fa fa-3x fa-home"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="mailto:{{ $group->email }}" target="_top">
                  <i class="fa fa-3x fa-envelope"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="//{{ $group->facebook }}" target="_blank">
                  <i class="fab fa-3x fa-facebook"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="//{{ $group->twitter }}" target="_blank">
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
                <a data-lightbox="group" data-title="{{$group->title}}" data-alt="{{$group->title}}" href="{{ asset($group->image1) }}">
                  <img class="img-thumbnail" src="{{ asset($group->image1) }}" title="{{ $group->title }}" class="" alt="{{$group->title}}">
                </a>
              </div>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="{{$group->title}}" data-alt="{{$group->title}}" href="{{ asset($group->image2) }}">
                  <img class="img-thumbnail" src="{{ asset($group->image2) }}" title="{{ $group->title }}" class="" alt="{{$group->title}}">
                </a>
              </div>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="{{$group->title}}" data-alt="{{$group->title}}" href="{{ asset($group->image3) }}">
                  <img class="img-thumbnail" src="{{ asset($group->image3) }}" title="{{ $group->title }}" class="" alt="{{$group->title}}">
                </a>
              </div>
            </div>

  				<div class="center-block">
            <div class="row col-xs-12 text-center"><br>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">{{__('single.description')}}</h3>
                </div>
                <div class="panel-body">
                  <h3>{!!$group->description !!}</h3>
                </div>
              </div>
            </div>
          </div>


        {{-- comments --}}
        <div class="row center-block" id="comments">
          <h1 class="text-center">{{__('single.comments')}}</h1>
          <div class="divider"></div><br>
        </div>
          <div class="row">
            <div class="col-xs-6">
              <label>{{__('single.latestcomments')}}</label>
              @if(count($group->comments) > 0)
              <ul class="list-group">
                @foreach ($group->comments as $comment)
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
                  <input type="hidden" name="commentable_id" value="{{$group->id}}">
                  <input type="hidden" name="commentable_type" value="App\Group">
                  <div class="form-group">
                    <label for="email">Email</label>
                    @if (Auth::user())
                    <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email }}" readonly>
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
    <br>
	</div>
@endsection
