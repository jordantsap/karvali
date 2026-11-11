@extends('layouts.main')

@section('title', __('houses.browse'))
@section('meta_description', __('houses.intro'))

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('houses.browse') }}</h1>
        <p class="text-center">{{ __('houses.intro') }}</p>

        <form method="get" action="{{ route('front.houses') }}" class="form-inline text-center" style="margin: 20px 0;">
            <label for="listing" class="sr-only">{{ __('houses.all') }}</label>
            <select name="listing" id="listing" class="form-control">
                <option value="">{{ __('houses.all') }}</option>
                <option value="rent" @selected($listing === 'rent')>{{ __('houses.rent') }}</option>
                <option value="sale" @selected($listing === 'sale')>{{ __('houses.sale') }}</option>
            </select>
            <label for="city" class="sr-only">{{ __('houses.city') }}</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="{{ __('houses.city') }}" value="{{ request('city') }}">
            <button type="submit" class="btn btn-primary">{{ __('houses.search') }}</button>
        </form>

        <div class="row">
            @forelse ($houses as $house)
                <div class="col-sm-4" style="margin-bottom: 20px;">
                    <div class="thumbnail">
                        @if($house->header)
                            <img src="{{ asset($house->header) }}" alt="{{ $house->title }}">
                        @endif
                        <div class="caption">
                            <h3>
                                <a href="{{ route('front.house.show', $house->slug) }}">{{ $house->title }}</a>
                            </h3>
                            <p>
                                <span class="label label-{{ $house->isForSale() ? 'warning' : 'info' }}">
                                    {{ $house->isForSale() ? __('houses.sale') : __('houses.rent') }}
                                </span>
                                {{ $house->priceLabel() }}
                            </p>
                            <p>{{ $house->city }} · {{ $house->bedrooms }} {{ __('houses.bedrooms') }}</p>
                            <p>{{ __('houses.listed_by') }} {{ $house->company->title }}</p>
                            <a class="btn btn-primary" href="{{ route('front.house.show', $house->slug) }}">
                                {{ $house->isForSale() ? __('houses.make_offer') : __('houses.book_stay') }}
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-xs-12">
                    <p class="text-center">{{ __('houses.empty') }}</p>
                </div>
            @endforelse
        </div>

        <div class="text-center">{{ $houses->links() }}</div>
    </div>
@endsection
