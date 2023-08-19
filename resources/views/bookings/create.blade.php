@extends('layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Create Booking for {{ $room->title }}, in {{$room->accommodation->title}}</h1>

                <form action="{{ route('front.bookings.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                    <label for="check_in">Check-in Date:</label>
                    <input type="date" name="check_in" class="form-control" required
                           value="{{ old('check_in_date') ? \Carbon\Carbon::createFromFormat('m-d-Y', old('check_in'))->format('d-m-Y') : '' }}">

                    <label for="check_out">Check-out Date:</label>
                    <input type="date" name="check_out" class="form-control" required
                           value="{{ old('check_out_date') ? \Carbon\Carbon::createFromFormat('m-d-Y', old('check_out'))->format('d-m-Y') : '' }}">

                    <button type="submit">Book Room</button>
                </form>

                <a href="{{ route('front.room.show', $room->slug) }}">Back to Available Rooms</a>
            </div>
        </div>
    </div>
@endsection
