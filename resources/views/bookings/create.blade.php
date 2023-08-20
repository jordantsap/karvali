@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Book Room: {{ $room->name }}</h1>

            <form method="POST" action="{{ route('front.bookings.store', $room) }}">
                @csrf
                <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}" required><br>
                <label for="check_in_date">Check in Date:</label>
                <input type="date" id="check_in_date" name="check_in_date" required><br>

                <label for="check_in_time">Check in Time:</label>
                <input type="time" id="check_in_time" name="check_in_time" required><br>

                <label for="check_in_date">Check out Date:</label>
                <input type="date" id="check_out_date" name="check_out_date" required><br>

                <label for="check_in_time">Check out Time:</label>
                <input type="time" id="check_out_time" name="check_out_time" required><br>

                <button type="submit">Book</button>
            </form>
        </div>
    </div>
@endsection
