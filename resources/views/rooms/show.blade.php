@extends('layouts.main')
@section('title', $room->roomType?$room->roomType->title:''.' '.__('head.rooms').' '.$room->title )
@section('meta_description', $room->roomType?$room->roomType->title:''.' '.__('head.rooms').' '.$room->meta_description)
@section('meta_keywords', $room->meta_keywords.' ' )

@section('content')
    <img width="100%" height="350px" src="{{ asset($room->header) }}" title="{{ $room->title }}" class=""
         alt="{{$room->title}}">
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
                    <img src="{{ asset($room->logo) }}" width="100%" height="200px" alt="{{ $room->title }}">
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
                    <a data-lightbox="group" data-title="{{$room->title}}" data-alt="{{$room->title}}"
                       href="{{ asset($room->image1) }}">
                        <img src="{{ asset($room->image1) }}" title="{{ $room->title }}" class="img-thumbnail"
                             alt="{{$room->title}}">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a data-lightbox="group" data-title="{{$room->title}}" data-alt="{{$room->title}}"
                       href="{{ asset($room->image2) }}">
                        <img src="{{ asset($room->image2) }}" title="{{ $room->title }}" class="img-thumbnail"
                             alt="{{$room->title}}">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a data-lightbox="group" data-title="{{$room->title}}" data-alt="{{$room->title}}"
                       href="{{ asset($room->image3) }}">
                        <img src="{{ asset($room->image3) }}" title="{{ $room->title }}" class="img-thumbnail"
                             alt="{{$room->title}}">
                    </a>
                </div>

            </div>
            @if($room->images)
                <div class="row">
                    <div class="col">
                        <label for="image3"><h1>{{__('Λοιπές Εικόνες')}}</h1></label>
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
                {{--                <h1 class="text-center">Calendar</h1>--}}

{{--                                <div id="calendar"></div>--}}

                <div class="container">
                    <h2>Check Availability</h2>
                    <form method="POST" action="{{ route('front.bookings.store', $room->id) }}">
                        @csrf
                        <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}" required>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" type="text" id="title" name="title"
                                   placeholder="Enter your name here" required>
                        </div>
                        <div class="form-group">
                            <label for="check_in_date">Check in date</label>
                            <select name="check_in_date" class="form-control" id="check_in_date">
                                <option value="">Select Check-in Date</option>
                                @foreach ($room->getAvailableDates() as $date)
                                    <option value="{{ $date }}">{{ $date }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="check_out_date">Check out date</label>
                            <select name="check_out_date" class="form-control" id="check_out_date">
                                <option value="">Select Check-Out Date</option>
                                @foreach ($room->getAvailableDates() as $date)
                                    <option value="{{ $date }}">{{ $date }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adults">adults</label>
                            <input type="number" min="1" value="1" class="form-control" name="adults" id="adults"
                                   placeholder="adults">
                        </div>
                        <div class="form-group">
                            <label for="children">children</label>
                            <input type="number" class="form-control" name="children" id="children"
                                   placeholder="children">
                        </div>
                        {{--                                <div class="form-group">--}}
                        {{--                                    <label for="recurring_until">Recurring until</label>--}}
                        {{--                                    <input class="form-control date {{ $errors->has('recurring_until') ? 'is-invalid' : '' }}" type="date" name="recurring_until" id="recurring_until" value="{{ old('recurring_until') }}">--}}
                        {{--                                    @if($errors->has('recurring_until'))--}}
                        {{--                                        <div class="invalid-feedback">--}}
                        {{--                                            {{ $errors->first('recurring_until') }}--}}
                        {{--                                        </div>--}}
                        {{--                                    @endif--}}
                        {{--                                </div>--}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

{{--                <h3>Booked Times:</h3>--}}

                @if(count($room->bookings))
                    <h2>{{ $room->title }}'s Bookings</h2>
                    <ul class="list-group">
                        @foreach($room->bookings as $booking)
                            <li class="list-group-item">{{__("Date from: "). \Carbon\Carbon::parse($booking->check_in_date)->format('d-M-Y') }}
                                to {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d-M-Y') }}
                                {{ __("Time from: "). \Carbon\Carbon::parse($booking->check_in_time)->format('H:i A') }}
                                to {{ \Carbon\Carbon::parse($booking->check_out_time)->format('H:i A') }} -
                                {{$booking->status}}</li>
                            {{--                        <li><a href="{{ route('front.bookings.create', $room) }}">Book this room</a></li>--}}
                        @endforeach
                    </ul>
                @endif


            </div>


            {{-- comments --}}
            <div class="row center-block" id="comments">
                <h1 class="text-center">{{__('single.comments')}}</h1>
                <div class="divider"></div>
                <br>
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
                        <input type="hidden" name="commentable_type" value="App\Models\Room">
                        <div class="form-group">
                            <label for="email">Email</label>
                            @if (Auth::user())
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{auth()->user()->email }}" readonly>
                            @elseif (Auth::guard('customer')->user())
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ auth('customer')->user()->email }}" readonly>
                            @else
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ old('email') }}" required>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="comment">{{__('single.newcomment')}}</label>
                            <textarea class="form-control" name="comment" rows="5"></textarea>
                        </div>
                        <button id="btn" type="submit"
                                class="btn btn-primary btn-block">{{__('single.addcomment')}}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('extra-js')

{{--    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>--}}
{{--    <script>--}}

{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            --}}{{--events = {!! json_encode($events) !!};--}}
{{--            var calendarEl = document.getElementById('calendar');--}}
{{--            var calendar = new FullCalendar.Calendar(calendarEl, {--}}
{{--                initialView: 'dayGridMonth',--}}
{{--                // events: events,--}}
{{--                headerToolbar: {--}}
{{--                    end: 'today prev,next',--}}
{{--                    start: 'title',--}}
{{--                    center: 'dayGridMonth,dayGridWeek,dayGridDay',--}}
{{--                },--}}
{{--                buttonText: {--}}
{{--                    today: 'today',--}}
{{--                    month: 'month',--}}
{{--                    week: 'week',--}}
{{--                    dayGrid: 'day',--}}
{{--                    list: 'list'--}}
{{--                },--}}
{{--                selectable: true,--}}
{{--                // selectHelper: true,--}}
{{--                select: function (start, end, allDAys) {--}}
{{--                    console.log(start, end, allDAys);--}}
{{--                },--}}
{{--                droppable: true,--}}
{{--            });--}}
{{--            calendar.render();--}}
{{--        });--}}

{{--    </script>--}}
{{--        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>--}}
{{--        <script>--}}
{{--            document.addEventListener('DOMContentLoaded', function() {--}}
{{--                events={!! json_encode($bookings) !!};--}}
{{--                var calendarEl = document.getElementById('calendar');--}}
{{--                var calendar = new FullCalendar.Calendar(calendarEl, {--}}
{{--                    initialView: 'dayGridMonth',--}}
{{--                    headerToolbar:{--}}
{{--                        end: 'today prev,next',--}}
{{--                        start: 'title',--}}
{{--                        center: 'dayGridMonth,dayGridWeek,dayGridDay',--}}
{{--                    },--}}
{{--                    buttonText:{--}}
{{--                        today:    'today',--}}
{{--                        month:    'month',--}}
{{--                        week:     'week',--}}
{{--                        dayGrid:      'day',--}}
{{--                        list:     'list'--}}
{{--                    },--}}
{{--                    selectable: true,--}}
{{--                    selectHelper: true,--}}
{{--                    select:function(start, end, allDAys){--}}
{{--                        console.log(start, end, allDAys);--}}
{{--                    },--}}
{{--                    droppable: true,--}}
{{--                    events: events,--}}
{{--                });--}}
{{--                calendar.render();--}}
{{--            });--}}
{{--        </script>--}}
@endsection
