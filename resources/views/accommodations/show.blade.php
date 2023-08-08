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
            @foreach($accommodation->rooms->where('active',1) as $room)
              <div class="col-xs-3">
                <ul class="list-group">
                  <li class="list-group-item"><h2>{{__("Title: "). $room->title }}</h2>
                  </li>
                  <li class="list-group-item"><img src="{{ asset('images/rooms/'.$room->logo) }}" width="100%" height="100px" alt="{{$room->title}}" title={{$room->title}}"></li>
                   <li class="list-group-item bold">
                       Κατηγορία: <a href="{{ $room->accommodationType? route('front.room-types', $room->accommodationType->slug):'#'}}">
                           {{ $room->accommodationType? $room->accommodationType->title :'' }}</a></li>
                  <li class="list-group-item"><h3>Τιμή: {{ $room->price }}</h3></li>
          <li class="list-group-item">
            <h3>{{ $room->description }}</h3>
          </li>
          <li class="list-group-item">
{{--            <a href="{{route('front.room.show',$room->id) }}" class="btn btn-default btn-block">Show</a>--}}
              <a href="#" data-toggle="modal" data-target="#roomModal">
                  {{__('Title'). $room->title }}
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


<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roomModalLabel">Room Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Ονομασία:</label>
                            <div class="input-group">
                                <input type="text" value="{{ $room->title }}" class="form-control" name="title" placeholder="{{ $room->title }}">
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
                            </div>
                        </div>
                    </div>
                    {{--                        <div class="row">--}}
                    <div class="col-xs-12">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Περιγραφή</label>
                            <div class="input-group">
              <textarea name="description" id="description" class="form-control"
                        rows="5" required>{{ $room->description }}</textarea>
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-info-sign"></span>
              </span>
                            </div>
                        </div>
                    </div>
                    {{--                        </div>--}}

                    <div class="form-group col-xs-4">
                        <label for="category">Category</label>
                        <div class="form-control" name="category" id="category" disabled>
                            @if( ! empty($room->category)){{ $room->category->name }}
                            @else Null
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-2 form-group">
                        <label for="active"> Active
                            <input type="checkbox" name="active" value="1" @if ($room->active == 1)
                                {{'checked'}}
                                @endif>
                        </label>
                    </div>

                    <div class="col-xs-3">
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price">Τιμή</label>
                            <div class="input-group">
                                <input type="text" value="{{ $room->price }}" class="form-control" name="price" placeholder="Τιμή" required>
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-euro"></span>
              </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group{{ $errors->has('accommodation_id') ? ' has-error' : '' }}">
                            <label for="accommodation_id">Εταιρεία</label>
                            @if ($errors->has('accommodation_id'))
                                <strong class="text-danger">{{ $errors->first('accommodation_id') }}</strong>
                            @endif
                            <div class="input-group">
                                <select id="accommodation_id" value="{{ $room->accommodation_id }}" name="accommodation_id" class="form-control" required>
                                    <option value="">Επιλέξτε</option>
                                    @foreach($room->accommodation() as $company)
                                        <option value="{{ $company->id }}" {{$room->accommodation_id == $company->id? "selected" : ''}}>{{ $company->title }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-list"></span>
              </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="header">header</label>
                    <div class="input-group">
                        <img width="100%" height="200" src="{{asset('images/rooms/'.$room->header)}}" alt="{{$room->title}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="logo">Λογότυπο</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->logo)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="image1">Εικόνα Αρχικης Σελίδας</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->image1)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="image2">Εικόνα 2</label>
                        <div class="col-xs-3 input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->image2)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="image3">Εικόνες 3</label>
                        <div class="input-group">
                            <img width="200" height="200" src="{{asset('images/rooms/'.$room->image3)}}" alt="{{$room->title}}">
                        </div>
                    </div>
                </div>
                @if(count($room->images) > 0)
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <label for="image3"> <h1>{{__('Λοιπές Εικόνες')}}</h1></label>
                            </div>
                            @foreach($room->images as $upload)
                                <div class="col-xs-1 col-md-3">
                                    <a href="{{ asset($upload->path) }}" data-lightbox="accommodation-images">
                                        <img width="100%" height="100%" src="{{ asset($upload->path) }}" alt="{{$upload->id}}">
                                    </a>
                                </div>
                            @endforeach
                            dsfagedthfyuhdj
                            @else
                                No more images available
                        </div>
                    </div>
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

