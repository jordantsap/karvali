@extends('layouts.main')
@section('title', $accommodation->accommodationType ? $accommodation->accommodationType->title:''.' '.$accommodation->title)
@section('meta_description', $accommodation->title.' '.__('head.hotel').' '.$accommodation->meta_description)
@section('meta_keywords', $accommodation->meta_keywords.'  '. $accommodation->title.' '.__('head.hotel'))

@section('head-js')
    <script type='text/javascript'
            src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons'
            async='async'></script>
@endsection

@section('content')

    <img width="100%" height="350px" src="{{ asset($accommodation->header) }}"
         title="{{ $accommodation->title }}" class="" alt="{{$accommodation->title}}">

    <h1 class="text-center">{{ $accommodation->title }}</h1>
    <div class="divider"></div>
    <br>
    <div class="container">
        <div id="companies">

            <div class="row">
                <div class="col-xs-6">
                    <img src="{{ asset($accommodation->logo) }}" width="100%" height="250"
                         alt="{{ $accommodation->title }}" title="{{ $accommodation->title }}">
                </div>

                <div class="col-xs-6">
                    <div class="col-xs-9">
                        <h3>{{__('single.manager')}} {{ $accommodation->manager }}</h3>
                        <h3>{{__('single.category')}} {{ $accommodation->accommodationType?$accommodation->accommodationType->title:'' }}</h3>
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
                        <h3 class="panel-title">{{__('single.description')}}</h3>
                    </div>
                    <div class="panel-body">
                        <h2>{!!$accommodation->description!!}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <a data-lightbox="accommodations" data-title="{{$accommodation->title}}"
                       data-alt="{{$accommodation->title}}" href="{{ asset($accommodation->image1) }}">
                        <img src="{{ asset($accommodation->image1) }}" title="{{ $accommodation->title }}"
                             class="img-responsive img-rounded" alt="{{$accommodation->title}}">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a data-lightbox="accommodations" data-title="{{$accommodation->title}}"
                       data-alt="{{$accommodation->title}}" href="{{ asset($accommodation->image2) }}">
                        <img src="{{ asset($accommodation->image2) }}" title="{{ $accommodation->title }}"
                             class="img-responsive img-rounded" alt="{{$accommodation->title}}">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a data-lightbox="accommodations" data-title="{{$accommodation->title}}"
                       data-alt="{{$accommodation->title}}" href="{{ asset($accommodation->image3) }}">
                        <img src="{{ asset($accommodation->image3) }}" title="{{ $accommodation->title }}"
                             class="img-responsive img-rounded" alt="{{$accommodation->title}}">
                    </a>
                </div>
            </div>

            <div class="row"><br>

                <div class="col-xs-12">
                    <h1 class="text-center">{{__('single.accommodation')}} {{$accommodation->title}}</h1>
                    <div class="divider"></div>
                    <br>
                </div>

                @if(count($accommodation->rooms->where('active',1)) > 0)
                    <h1 class="text-center">{{__('page.rooms')}}</h1>

                    @foreach($accommodation->rooms as $room)
                        <div class="row">
                            <div class="col-xs-2">
                                @foreach(\App\Helpers\GetInputsHelper::imageFields() as $image)
                                    <a data-lightbox="room-images" data-title="{{$room->title}}" data-alt="{{$room->title}}"
                                       href="{{ asset($room->$image) }}">
                                <img class="img-thumbnail" src="{{asset($room->$image)}}" alt="">
                                    </a>

                                @endforeach
                            </div>
                            @if(count($room->images) > 0)
                                    <h1>Main images</h1>
                                <div class="col-xs-2">
                                    @foreach($room->images as $upload)
                                        <a data-lightbox="room" data-title="{{$room->title}}" data-alt="{{$room->title}}"
                                           href="{{ asset($upload->path) }}">
                                        <img class="img-responsive" src="{{asset($upload->path)}}" alt="{{$room->title}}">
                                        </a>
                                    @endforeach
                                </div>
                                    @else
                                        <div class="col-xs-3">No general images</div>
                                    @endif
                                <div class="col-xs-3">
                                    {{__('Room Type: ').$room->roomType->title}} <br>
                                    {{--                                {{$availableDates}}--}}
                                    {{__('Beds: ').$room->beds}}<br>
                                    {{__('Adults: ').$room->adults}}<br>
                                    {{__('Kids: ').$room->kids}}<br>
                                    {{__('Capacity: ').$room->capacity}}<br>
                                    {{__('Price: ').$room->price}}<br>
                                    @if($room->amenities())
                                        @foreach($room->amenities as $amenity)
                                            {{$amenity->title}}<br>
                                        @endforeach
                                    @else
                                    <h4>{{__('No amenities')}}</h4>
                                    @endif
                                    {{ __('Description: ').Str::limit($room->description, 100) }}
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="card-title"><a
                                            href="{{ route('front.room.show',$room->slug) }}">{{ Str::limit($room->title, 15) }}</a>
                                    </h4>

                                    {{--                                <p>{{ __('page.date') }} {{ date('d-M-Y', strtotime($room->start_date))--}}
                                    {{--                }} - {{ __('page.from') }}:{{ $room->start_time }} - {{ __('page.until')--}}
                                    {{--                }}: {{$room->end_time}}</p>--}}
                                    {{__('page.createbookings')}}
                                    <form method="POST" action="{{ route('front.bookings.store', $room->id) }}">
                                        @csrf
                                        <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}"
                                               required>
                                        <div class="form-group">
                                            <label for="title">{{__('form.name')}}</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                   placeholder="Enter your name here" required>
                                        </div>
                                        @if(auth()->user())
                                            <div class="form-group">
                                                <label for="email">{{__('form.email')}}</label>
                                                <input class="form-control" type="email" id="email" name="email"
                                                       value="{{auth()->user()?->email}}" placeholder="Enter your email here" disabled>
                                            </div>
                                        @else
                                            <a href="{{route('login')}}">Login</a> or
                                            <a href="{{route('register')}}">or register to make the booking</a>
                                        @endif
                                        <div class="row">
                                            <div class="col-xs-6 form-group">
                                                <label for="check_in_date">Check in date</label>
                                                <select name="check_in_date" class="form-control" id="check_in_date">
                                                    <option value="">Select Check-in Date</option>
                                                    @foreach ($room->getAvailableDates() as $date)
                                                        <option value="{{ $date }}">{{ $date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label for="check_out_date">Check out date</label>
                                                <select name="check_out_date" class="form-control" id="check_out_date">
                                                    <option value="">Select Check-Out Date</option>
                                                    @foreach ($room->getAvailableDates() as $date)
                                                        <option value="{{ $date }}">{{ $date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="adults">adults</label>
                                                    <input type="number" min="1" value="1" class="form-control" name="adults"
                                                           id="adults"
                                                           placeholder="adults">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="children">children</label>
                                                    <input type="number" class="form-control" name="children" id="children"
                                                           placeholder="children">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                                @if(count($room->bookings))
                                    <div class="col-xs-12">
                                        <h2>{{ $room->title }}'s Bookings</h2>
                                        <ul class="list-group">
                                            @foreach($room->bookings as $booking)
                                                <li class="list-group-item">{{__("Date from: "). \Carbon\Carbon::parse($booking->check_in_date)->format('d-M-Y') }}
                                                    to {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d-M-Y') }}
                                                    {{ __("Time from: "). \Carbon\Carbon::parse($booking->check_in_time)->format('H:i A') }}
                                                    to {{ \Carbon\Carbon::parse($booking->check_out_time)->format('H:i A') }}
                                                    -
                                                    {{$booking->status}}</li>
                                                {{--                        <li><a href="{{ route('front.bookings.create', $room) }}">Book this room</a></li>--}}
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                        </div>
                    @endforeach
                @else
                    <p class="text-center">{{ __('single.norooms') }}</p>
                @endif
{{--                                                    <div id="calendar"></div>--}}

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
                        <input type="hidden" name="commentable_type" value="App\Models\Accommodation">
                        <div class="form-group">
                            <label for="email">Email</label>
                            @if (Auth::user())
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{auth()->user()->email }}"
                                       required readonly>
                            @elseif (Auth::guard('customer')->user())
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ auth('customer')->user()->email }}"
                                       required readonly>
                            @else
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ old('email') }}"
                                       required>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="comment">{{__('single.newcomment')}}</label>
                            <textarea class="form-control" name="comment" rows="5" required></textarea>
                        </div>
                        <button id="btn" type="submit"
                                class="btn btn-primary btn-block">{{__('single.addcomment')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--@include('modals.roomModal')--}}
@endsection
{{--@section('extra-js')--}}

{{--            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>--}}
{{--            <script>--}}
{{--                document.addEventListener('DOMContentLoaded', function() {--}}
{{--                    var calendarEl = document.getElementById('calendar');--}}

{{--                    var calendar = new FullCalendar.Calendar(calendarEl, {--}}
{{--                        initialView: 'dayGridMonth',--}}
{{--                        headerToolbar:{--}}
{{--                            center: 'dayGridMonth,dayGridWeek,dayGridDay',--}}
{{--                        },--}}
{{--                        buttonText:{--}}
{{--                            today:    'today',--}}
{{--                            month:    'month',--}}
{{--                            week:     'week',--}}
{{--                            dayGrid:      'day',--}}
{{--                            list:     'list'--}}
{{--                        },--}}
{{--                        selectable: true,--}}
{{--                        selectHelper: true,--}}
{{--                        select:function(start, end, allDAys){--}}
{{--                            console.log(start, end, allDAys);--}}
{{--                        },--}}
{{--                        droppable: true,--}}
{{--                        events: @json($availableEvents),--}}
{{--                        eventContent: function(arg) {--}}
{{--                            return {--}}
{{--                                html: arg.event.title // this can be the room name--}}
{{--                            };--}}
{{--                        }--}}
{{--                    });--}}

{{--                    calendar.render();--}}
{{--                });--}}

{{--    </script>--}}
{{--@endsection--}}
