@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $house->title }}
                <small>
                    <a class="btn btn-primary" href="{{ route('owner.houses.edit', $house) }}">Edit</a>
                    <a class="btn btn-default" href="{{ route('front.house.show', $house->slug) }}">Public page</a>
                </small>
            </h1>
        </section>
        <section class="content">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <div class="box">
                <div class="box-body">
                    <p><strong>Company:</strong> {{ $house->company->title }}</p>
                    <p><strong>Offer:</strong> {{ $house->isForSale() ? 'Sale' : 'Rent' }}</p>
                    <p><strong>Price:</strong> {{ $house->priceLabel() }}</p>
                    <p><strong>Address:</strong> {{ $house->address }}, {{ $house->city }}</p>
                    <p><strong>Rooms:</strong> {{ $house->bedrooms }} bedrooms, {{ $house->bathrooms }} bathrooms
                        @if($house->area_sqm) · {{ $house->area_sqm }} m² @endif
                    </p>
                    <p><strong>Status:</strong> {{ $house->active ? $house->status : 'draft' }}</p>
                    <p>{{ $house->description }}</p>
                </div>
            </div>

            <div class="box">
                <div class="box-header"><h3 class="box-title">Bookings</h3></div>
                <div class="box-body">
                    @include('auth.house-bookings.table', ['bookings' => $house->bookings])
                </div>
            </div>
        </section>
    </div>
@endsection
