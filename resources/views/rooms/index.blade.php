@extends('layouts.app') <!-- Assuming you have a layout setup -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Search Accommodation</div>
                    <div class="card-body">
                        <form action="{{ route('front.rooms') }}" method="GET" class="form-inline">
                            <label for="accommodation">Accommodation:</label>
                            <select name="accommodation" id="accommodation" class="form-control mx-sm-3">
                                <option value="">Select Accommodation</option>
                                <!-- Add your accommodation fields here -->
                                @foreach($accommodations as $accommodation)
                                    <option value="{{$accommodation->id}}">{{$accommodation->title}}</option>
                                @endforeach
                            </select>

                            <label for="room_type">Room Type:</label>
                            <select name="room_type" id="room_type" class="form-control mx-sm-3">
                                <option value="">Select Room Type</option>
                                <!-- Add your room type fields here -->
                                @foreach($roomTypes as $roomType)
                                    <option value="{{$roomType->id}}">{{$roomType->title}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->title }}</h5>
                            <p class="card-text">{{ $room->description }}</p>
                            <a href="{{ route('front.room.show', $room) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
