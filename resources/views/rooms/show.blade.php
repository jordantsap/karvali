@extends('layouts.main')
@section('title', $room->roomType?$room->roomType->title:''.' '.__('head.rooms').' '.$room->title )
@section('meta_description', $room->roomType?$room->roomType->title:''.' '.__('head.rooms').' '.$room->meta_description)
@section('meta_keywords', $room->meta_keywords.' ' )

@section('content')
  <img width="100%" height="350px" src="{{ asset($room->header) }}" title="{{ $room->title }}" class="" alt="{{$room->title}}">
	<div class="container">
		<div id="groups">

      <div class="row">
					<h1 class="text-center">
						{{ $room->title }}
          </h1>
          <a href="{{route('front.accommodation.show', $room->accommodation->slug)}}">
              <h1>Go back to Accommodation</h1>
          </a>
					<div class="divider"></div>

          <div class="col-xs-8">
            <img src="{{ asset($room->logo) }}" width="100%" height="200px"alt="{{ $room->title }}">
          </div>

          <div class="col-xs-4 text-center">
            <h2>{{__('single.category')}} {{ $room->roomType?$room->roomType->title:'' }}</h2>
            <h2>{{__('single.manager')}} {{ $room->manager }}</h2>
            <h2>{{__('single.telephone')}} {{ $room->telephone }}</h2>
          </div>
          <div class="col-xs-12">
            {{-- <br> --}}
            <div class="col-xs-4" style="margin-bottom: 10px;">
              <h3>{{__('single.opinion')}}</h3>
              <div id="buttonlink" class="col-xs-6">
                <form action="{{ route('like.store') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="likeable_id" value="{{ $room->id }}">
                  <input type="hidden" name="likeable_type" value="App\Models\Event">
                  <button type="submit" class="btn btn-link">
                    <i class="fa fa-3x fa-thumbs-up"></i>
                    <span class="badge">{{$room->likes->count()}}</span>
                  </button>
                </form>
              </div>
              <div id="buttonlink" class="col-xs-6">
                <a href="#comments">
                  <i class="fa fa-3x fa-comment"></i>
                  <span class="badge">{{$room->comments->count()}}</span>
                </a>
              </div>
            </div>
            <div class="col-xs-4">
              <h3 class="col-xs-12">{{__('single.moreaboutus')}}: </h3>
              <div class="col-xs-3">
                <a href="//{{ $room->website }}" target="_blank">
                  <i class="fa fa-3x fa-home"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="mailto:{{ $room->email }}" target="_top">
                  <i class="fa fa-3x fa-envelope"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="//{{ $room->facebook }}" target="_blank">
                  <i class="fab fa-3x fa-facebook"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="//{{ $room->twitter }}" target="_blank">
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

            <div class="col-xs-12">
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="{{$room->title}}" data-alt="{{$room->title}}" href="{{ asset($room->image1) }}">
                  <img src="{{ asset($room->image1) }}" title="{{ $room->title }}" class="img-thumbnail" alt="{{$room->title}}">
                </a>
              </div>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="{{$room->title}}" data-alt="{{$room->title}}" href="{{ asset($room->image2) }}">
                  <img src="{{ asset($room->image2) }}" title="{{ $room->title }}" class="img-thumbnail" alt="{{$room->title}}">
                </a>
              </div>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="{{$room->title}}" data-alt="{{$room->title}}" href="{{ asset($room->image3) }}">
                  <img src="{{ asset($room->image3) }}" title="{{ $room->title }}" class="img-thumbnail" alt="{{$room->title}}">
                </a>
              </div>

            </div>
            @if($room->images)
                        <div class="row">
                            <div class="col">
                                <label for="image3"> <h1>{{__('Λοιπές Εικόνες')}}</h1></label>
                            </div>
                            @foreach($room->images as $upload)
                                <div class="col-xs-1 col-md-3">
                                    <a href="{{ asset($upload->path) }}" data-lightbox="accommodation-images">
                                        <img width="100%" height="100%" src="{{ asset($upload->path) }}" alt="{{$upload->id}}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
            @else
                <div class="">
                    <div class="col-xs-12">
                        No images available
                    </div>
                </div>
            @endif

  				<div class="center-block">
            <div class="row col-xs-12 text-center"><br>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">{{__('single.description')}}</h3>
                </div>
                <div class="panel-body">
                  <h3>{!!$room->description !!}</h3>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
                <h1 class="text-center">Calendar</h1>
{{--                <div id="calendar"></div>--}}
                @if($room->bookings)
                    <h2>Available Time Slots:</h2>
                    <ul>
                        @foreach ($room->availableTimeSlots() as $timeSlot)
                            <li>{{ $timeSlot['start'] }} - {{ $timeSlot['end'] }}</li>
                            <a href="{{ route('front.bookings.create', ['roomId' => $room->id]) }}">Book this room</a>
                        @endforeach
                    </ul>
                @endif

            </div>


        {{-- comments --}}
        <div class="row center-block" id="comments">
          <h1 class="text-center">{{__('single.comments')}}</h1>
          <div class="divider"></div><br>
        </div>
          <div class="row">
            <div class="col-xs-6">
              <label>{{__('single.latestcomments')}}</label>
              @if(count($room->comments) > 0)
              <ul class="list-group">
                @foreach ($room->comments as $comment)
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
                  <input type="hidden" name="commentable_id" value="{{$room->id}}">
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
	</div>
@endsection

@section('extra-js')

{{--    <script>--}}

        {{--$(document).ready(function () {--}}

        {{--    var SITEURL = "{{url('/')}}";--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        }--}}
        {{--    });--}}

        {{--    var calendar = $('#calendar').fullCalendar({--}}
        {{--        editable: true,--}}
        {{--        events: SITEURL + "fullcalendar",--}}
        {{--        displayEventTime: true,--}}
        {{--        editable: true,--}}
        {{--        eventRender: function (event, element, view) {--}}
        {{--            if (event.allDay === 'true') {--}}
        {{--                event.allDay = true;--}}
        {{--            } else {--}}
        {{--                event.allDay = false;--}}
        {{--            }--}}
        {{--        },--}}
        {{--        selectable: true,--}}
        {{--        selectHelper: true,--}}
        {{--        select: function (start, end, allDay) {--}}
        {{--            var title = prompt('Event Title:');--}}

        {{--            if (title) {--}}
        {{--                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");--}}
        {{--                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");--}}

        {{--                $.ajax({--}}
        {{--                    url: SITEURL + "fullcalendar/create",--}}
        {{--                    data: 'title=' + title + '&start=' + start + '&end=' + end,--}}
        {{--                    type: "POST",--}}
        {{--                    success: function (data) {--}}
        {{--                        displayMessage("Added Successfully");--}}
        {{--                    }--}}
        {{--                });--}}
        {{--                calendar.fullCalendar('renderEvent',--}}
        {{--                    {--}}
        {{--                        title: title,--}}
        {{--                        start: start,--}}
        {{--                        end: end,--}}
        {{--                        allDay: allDay--}}
        {{--                    },--}}
        {{--                    true--}}
        {{--                );--}}
        {{--            }--}}
        {{--            calendar.fullCalendar('unselect');--}}
        {{--        },--}}

        {{--        eventDrop: function (event, delta) {--}}
        {{--            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");--}}
        {{--            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");--}}
        {{--            $.ajax({--}}
        {{--                url: SITEURL + 'fullcalendar/update',--}}
        {{--                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,--}}
        {{--                type: "POST",--}}
        {{--                success: function (response) {--}}
        {{--                    displayMessage("Updated Successfully");--}}
        {{--                }--}}
        {{--            });--}}
        {{--        },--}}
        {{--        eventClick: function (event) {--}}
        {{--            var deleteMsg = confirm("Do you really want to delete?");--}}
        {{--            if (deleteMsg) {--}}
        {{--                $.ajax({--}}
        {{--                    type: "POST",--}}
        {{--                    url: SITEURL + 'fullcalendar/delete',--}}
        {{--                    data: "&id=" + event.id,--}}
        {{--                    success: function (response) {--}}
        {{--                        if(parseInt(response) > 0) {--}}
        {{--                            $('#calendar').fullCalendar('removeEvents', event.id);--}}
        {{--                            displayMessage("Deleted Successfully");--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            }--}}
        {{--        }--}}

        {{--    });--}}
        {{--});--}}

        {{--function displayMessage(message) {--}}
        {{--    $(".response").html("<div class='success'>"+message+"</div>");--}}
        {{--    setInterval(function() { $(".success").fadeOut(); }, 1000);--}}
        {{--}--}}
{{--    </script>--}}
@endsection

