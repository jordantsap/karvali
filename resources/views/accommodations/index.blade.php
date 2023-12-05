@extends('layouts.main')
@section('title', __('head.hotelspagetitle'))
@section('meta_description', __('meta.hotelspagedescription'))
@section('meta_keywords', __('meta.hotelspagekeywords'))

@section('content')
<!-- Page Content -->
<div id="companies">
    <div class="container">
        <div class="row">
            <h1 class ss="">{{ __('page.accommodations') }}</h1>

            <div class="form_search">


                <div class="rooms_search">


                    <div class="wrap_search">
                    <span class="input-group-text search_icon"><i class="fa fa-building fa-lg"></i></span>
                        &nbsp&nbsp
                        <select class="input_select" name="">
                            <option class="input_search" value="">Accomodation Type</option>
                            @foreach ($accommodationTypes as $accommodationType)
                            <option class="input_option" value="volvo">{{ $accommodationType->title }}&nbsp</option>
                            @endforeach
                        </select>

                        <div class="vertical"></div>
                        <span class="input-group-text search_icon"><i class="fa fa-calendar-alt fa-lg"></i></span>
                        &nbsp&nbsp
                        <input value="" type="text" class="input_search" placeholder="Check-in & Check-out" id="demo" />
                        <div class="vertical"></div>


                        <span class="input-group-text search_icon"><i class="fa fa-bed fa-lg"></i></span>
                        &nbsp&nbsp
                        <div class="dropdown input_select" >
                            <button class="btn btn-secondary dropdown-toggle search_button" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="calculatorButtonText">0 Room,0 Adult,0 Child</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- Room Selector -->
                                <div class="quantity-selector">
                                    <button type="button" class="btn btn-secondary" data-action="decrement"
                                        data-target="room">-</button>
                                    <span class="dropdown-item" id="roomInfo">1 Room</span>
                                    <button type="button" class="btn btn-secondary" data-action="increment"
                                        data-target="room">+</button>
                                </div>
                                <!-- Adult Selector -->
                                <div class="quantity-selector">
                                    <button type="button" class="btn btn-secondary" data-action="decrement"
                                        data-target="adult">-</button>
                                    <span class="dropdown-item" id="adultInfo">1 Adult</span>
                                    <button type="button" class="btn btn-secondary" data-action="increment"
                                        data-target="adult">+</button>
                                </div>
                                <!-- Child Selector -->
                                <div class="quantity-selector">
                                    <button type="button" class="btn btn-secondary" data-action="decrement"
                                        data-target="child">-</button>
                                    <span class="dropdown-item" id="childInfo">0 Children</span>
                                    <button type="button" class="btn btn-secondary" data-action="increment"
                                        data-target="child">+</button>
                                </div>
                            </div>
                        </div>


                        <div class="vertical"></div>
                        &nbsp&nbsp
                        <button type="button" class="btn btn-primary btn-lg search_rooms"><i class="fa fa-search"></i></button>
                        
                    </div>
                    <!-- <input class="input_search" placeholder="Adults" type="number" name="adults" class="adults" />
                        <div class="vertical"></div>
                        <input class="input_search" placeholder="Kids" type="number" name="kids" class="kids" /> -->

                </div>

            </div>

            <nav class="navbar">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#companytype-collapse" aria-expanded="false">
                    <span class="">{{ __('page.categories') }}</span>
                    <span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>
                </button>
                {{-- <!-- List group -->--}}
                <div class="row">
                    <ul class="nav navbar-nav collapse navbar-collapse" id="companytype-collapse">
                        @foreach ($accommodationTypes as $accommodationType)
                        <li>
                            <a href="{{ route('front.accommodation-types.show',$accommodationType->slug) }}" class="">{{
                                $accommodationType->title }}&nbsp
                                <span class="badge">{{ $accommodationType->accommodations->where('active', 1)->count()
                                    }}</span>
                            </a>
                        </li>
                        @endforeach
                        <li>
                            <script>
                                document.write('<a href="' + document.referrer + '">{{ __('page.backlink') }}</a>');
                            </script>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="divider"></div>

            <div class="row">
                @if (count($accommodations) > 0)
                @foreach ($accommodations as $accommodation)
                <div class="col-xs-12 col-sm-4 col-md-3 portfolio-item">
                    <div class="card h-100">
                        <a href="{{ route('front.accommodation.show', $accommodation->slug) }}">
                            <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;"
                                src="{{ asset($accommodation->logo) }}" alt="{{ $accommodation->title }}">
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="card-title">
                            <a href="{{ route('front.accommodation.show', $accommodation->slug) }}">{{
                                Str::limit($accommodation->title, 20) }}</a>
                        </h2>
                        <div class="">
                            {{__('Rooms: ') .$accommodation->rooms->count()}}
                        </div>
                        <div class="row" id="likecomment">
                            <div class="col-xs-6 text-center">
                                <i class="fa fa-3x fa-thumbs-up"></i>
                                <span class="badge">{{ count($accommodation->likes) }}</span>
                            </div>

                            <div class="col-xs-6 text-center">
                                <i class="fa fa-3x fa-comment"></i>
                                <span class="badge">{{ count($accommodation->comments) }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h3><b>{{ __('page.category') }}</b>
                                    <a
                                        href="{{ route('front.accommodation-types.show', $accommodation->accommodationType->slug ?? '') }}">
                                        {{ $accommodation->accommodationType ?
                                        \Str::limit($accommodation->accommodationType->title, 10) : '#'}}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <br>
                @else
                <div class="col-xs-12 noresults">
                    <h1><b>{{ __('page.noresults') }}</b></h1>
                </div>
                @endif

            </div>


            <div class="col-xs-9">
                {{ $accommodations->links() }}
            </div>

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
</div>
<br>
@endsection

@push('date_script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $(document).ready(function () {
        var start = new Date();
        var end = moment().add(2, 'days').format('MM-DD-YYYY');

        $('#demo').daterangepicker({
            "linkedCalendars": true,
            "autoUpdateInput": true,
            "showCustomRangeLabel": false,
            startDate: start,
            endDate: end,
            "opens": "center"
        }, function (start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });

        var roomCount = 1;
        var adultCount = 1;
        var childCount = 0;

        $('[data-action="increment"]').click(function () {
            var target = $(this).data('target');
            incrementCount(target);
            updateInfo();

        });

        $('[data-action="decrement"]').click(function () {
            var target = $(this).data('target');
            decrementCount(target);
            updateInfo();
      
        });

        function incrementCount(target) {
            switch (target) {
                case 'room':
                    roomCount++;
                    break;
                case 'adult':
                    adultCount++;
                    break;
                case 'child':
                    childCount++;
                    break;
            }
        }

        function decrementCount(target) {
            switch (target) {
                case 'room':
                    if (roomCount > 1) {
                        roomCount--;
                    }
                    break;
                case 'adult':
                    if (adultCount > 1) {
                        adultCount--;
                    }
                    break;
                case 'child':
                    if (childCount > 0) {
                        childCount--;
                    }
                    break;
            }
        }

        function updateInfo() {
            $('#roomInfo').text(roomCount + ' Room(s)');
            $('#adultInfo').text(adultCount + ' Adult(s)');
            $('#childInfo').text(childCount + ' Child(ren)');
            updateButtonText();
        }

        function updateButtonText() {
            $('#calculatorButtonText').text(roomCount + ' Room(s), ' + adultCount + ' Adult(s), ' + childCount + ' Child(ren)');
        }

        $('#showValues').click(function () {
            $('#selectedRoomInfo').text(roomCount + ' Room(s), ' + adultCount + ' Adult(s), ' + childCount + ' Child(ren)');
            $('#selectedValues').show();
        });


    });

</script>

@endpush