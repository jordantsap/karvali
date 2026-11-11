@extends('layouts.main')

@section('title', $house->title)
@section('meta_description', $house->meta_description ?: $house->description)
@section('meta_keywords', $house->meta_keywords)

@section('content')
    <div class="container">
        @if($house->header)
            <img src="{{ asset($house->header) }}" alt="{{ $house->title }}" width="100%" style="max-height: 360px; object-fit: cover;">
        @endif

        <h1 class="text-center">{{ $house->title }}</h1>
        <p class="text-center">
            <a href="{{ route('front.houses') }}">{{ __('houses.back') }}</a>
        </p>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="row">
            <div class="col-sm-7">
                <p>
                    <span class="label label-{{ $house->isForSale() ? 'warning' : 'info' }}">
                        {{ $house->isForSale() ? __('houses.sale') : __('houses.rent') }}
                    </span>
                    <strong>{{ $house->priceLabel() }}</strong>
                </p>
                <p>{{ $house->address }}, {{ $house->city }}</p>
                <p>
                    {{ $house->bedrooms }} {{ __('houses.bedrooms') }},
                    {{ $house->bathrooms }} {{ __('houses.bathrooms') }}
                    @if($house->area_sqm)
                        · {{ $house->area_sqm }} m²
                    @endif
                </p>
                <p>{{ $house->description }}</p>
                <p>
                    {{ __('houses.listed_by') }}
                    <a href="{{ route('front.company', $house->company->slug) }}">{{ $house->company->title }}</a>
                </p>

                <div class="row">
                    @foreach (['image1', 'image2', 'image3'] as $photo)
                        @if($house->{$photo})
                            <div class="col-xs-4">
                                <img src="{{ asset($house->{$photo}) }}" alt="{{ $house->title }}" class="img-thumbnail">
                            </div>
                        @endif
                    @endforeach
                </div>

                @if($house->isForRent() && $house->bookings->isNotEmpty())
                    <h3>{{ __('houses.reserved') }}</h3>
                    <ul class="list-group">
                        @foreach ($house->bookings as $booking)
                            @if($booking->check_in_date && $booking->check_out_date)
                                <li class="list-group-item">
                                    {{ $booking->check_in_date->format('d M Y') }}
                                    – {{ $booking->check_out_date->format('d M Y') }}
                                    ({{ $booking->status }})
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $house->isForSale() ? __('houses.make_offer') : __('houses.book_stay') }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        @if(!$house->isListed())
                            <div class="alert alert-warning">
                                {{ $house->status === \App\Models\House::STATUS_SOLD ? __('houses.sold') : __('houses.unavailable') }}
                            </div>
                        @else
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="post" action="{{ route('front.house-bookings.store', $house) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{ __('houses.name') }}</label>
                                    <input class="form-control" type="text" name="name" id="name" required
                                           value="{{ old('name', auth()->user()->fullname ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('houses.email') }}</label>
                                    <input class="form-control" type="email" name="email" id="email" required
                                           value="{{ old('email', auth()->user()->email ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{ __('houses.phone') }}</label>
                                    <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                                </div>

                                @if($house->isForRent())
                                    <div class="form-group">
                                        <label for="check_in_date">{{ __('houses.check_in') }}</label>
                                        <input class="form-control" type="date" name="check_in_date" id="check_in_date" required value="{{ old('check_in_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="check_out_date">{{ __('houses.check_out') }}</label>
                                        <input class="form-control" type="date" name="check_out_date" id="check_out_date" required value="{{ old('check_out_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="guests">{{ __('houses.guests') }}</label>
                                        <input class="form-control" type="number" min="1" name="guests" id="guests" required value="{{ old('guests', 1) }}">
                                    </div>
                                @else
                                    <p class="help-block">{{ __('houses.viewing_optional') }}</p>
                                    <div class="form-group">
                                        <label for="check_in_date">{{ __('houses.check_in') }}</label>
                                        <input class="form-control" type="date" name="check_in_date" id="check_in_date" value="{{ old('check_in_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="check_out_date">{{ __('houses.check_out') }}</label>
                                        <input class="form-control" type="date" name="check_out_date" id="check_out_date" value="{{ old('check_out_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="offer_price">{{ __('houses.offer') }} (€)</label>
                                        <input class="form-control" type="number" step="0.01" min="0" name="offer_price" id="offer_price"
                                               value="{{ old('offer_price', $house->price) }}">
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="message">{{ __('houses.message') }}</label>
                                    <textarea class="form-control" name="message" id="message" rows="3">{{ old('message') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ $house->isForSale() ? __('houses.make_offer') : __('houses.book_stay') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
