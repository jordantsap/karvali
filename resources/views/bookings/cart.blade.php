@extends('layouts.main')

@section('head-js')
<script type='text/javascript'
    src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons'
    async='async'></script>
@endsection

@section('content')

<h1 class="text-center"></h1>

<br>




<div class="container">


    <div class="row">
        <div class="col-sm-4">
            <div class="booking-details">
                <h2>Your Bookings</h2>
                @if(isset($booking_details[0]))
                <div class="cart-table">
                    <div class="cart-details">
                        <div class="booking-details">
                            <strong>Hotels Nearby Nea Karvali</strong>
                            <br>

                        </div>

                        <div class="display-cart mt-2">Please contact for further enquiry:</div>

                        <div class="display-cart-text">
                            <strong>{{$booking_details[0]->room->accommodation->title}}</strong>
                        </div>
                        <div class="display-cart-text">
                            <strong>{{$booking_details[0]->room->accommodation->telephone}}</strong>
                        </div>
                        <div class="display-cart-text">
                            <strong>{{$booking_details[0]->room->accommodation->website}}</strong>
                        </div>
                        <div class="booking-details">

                            <span id="display-checkout"></span>
                        </div>
                    </div>
                </div>
                @endif
                @if($booking_details ->count() > 0)

                @foreach($booking_details as $details)
                <div class="details-table">
                    <strong>Booking Details</strong>
                    <div class="cart-details">

                        <div class="col1">
                            <div class="check-in">Check-in</div>
                            <span id="display-checkin"><strong>{{ $details->check_in_date->format('D d M Y')
                                    }}</strong></span>
                            <span id="">at 12.00 am</span>
                        </div>
                        <div class="col2">
                            <div class="check-out">Check-out</div>
                            <span id="display-checkout"><strong>{{ $details->check_out_date->format('D d M Y')
                                    }}</strong></span>
                            <span id="">at 11.30 am</span>
                        </div>
                    </div>
                    @php
                    $totalDays = $details->check_in_date->diffInDays($details->check_out_date);
                    @endphp
                    <div class="cart-day">

                        <div class="col-day">
                            <div class="check-in">Total length of stay:</div>
                            <span id="display-checkin">You have <strong>{{$totalDays}}</strong> night stay</span>
                        </div>
                    </div>
                    <div class="cart-border"></div>
                    <div class="cart-day">

                        <div class="col-day">
                            <div class="check-in">You have selected:</div>
                            <br>
                            <span id="display-checkin"><strong>1</strong> Room for <strong>{{ $details->adults
                                    }}</strong> Adults @if($details->children ==0){{'.' }}@elseif($details->children
                                ==1) and <strong>{{ $details->children }}</strong> child.</span>@else and <strong>{{
                                $details->children }}</strong> children.</span>@endif
                        </div>
                    </div>

                </div>
                <div class="price-details">
                    <strong>Price details</strong>
                    <div class="price-cart-details">

                        <div class="col1">
                            <div class="check-in">Check-in</div>
                        </div>
                        <div class="col2">
                            <div class="room-price"><strong>$ {{$details->room->price}}</strong></div>
                        </div>

                    </div>
                    <div class="cart-button-cfm">
                        @if($details->status == 'Pending')
                        <a
                            href="{{route('front.confirm.booking',['id'=>encrypt($details->id),'check_in_date'=>$details->check_in_date->format('Y-m-d'),'check_out_date'=>$details->check_out_date->format('Y-m-d'),'booking_id'=>$details->id])}}">
                            <button class="btn btn-primary">Confirm Booking
                            </button>
                        </a>
                        @else
                        <button class="btn btn-success disabled"><i class="fa fa-check" aria-hidden="true"></i> Booking Confirmed
                        </button>
                        @endif
                    </div>

                </div>
                @endforeach
                @else

                <div class="cart-table">
                    <div class="cart-details">
                        <div class="col1">
                            <span id="display-checkin">You don'thave any bookings....</span>
                        </div>
                    </div>
                </div>
                @endif



            </div>
        </div>
        <div class="col-sm-8">
            <div class="user-info">
                <h2>User Information</h2>
                <div class="note">
                    <p><strong>You are signed in as: {{$user->email}}</strong><br> This is a confirmation of your
                        booking details. Please ensure all
                        information is
                        correct. If you have any special requests or need further assistance, please contact our
                        customer
                        service.</p>
                </div>
                <div class="cart-table">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control" id="inputEmail4" value="{{$user->fullname}}"
                                    disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">User name</label>
                                <input type="text" class="form-control" id="inputPassword4" value="{{$user->username}}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group form-cart">
                            <label for="inputAddress">Email</label>
                            <input type="text" class="form-control" id="inputAddress" value="{{$user->email}}" disabled>
                        </div>
                        <div class="form-group form-cart">
                            <label for="inputAddress2">Phone number</label>
                            <input type="text" class="form-control" id="inputAddress2" value="{{$user->mobile}}"
                                disabled>
                        </div>
                        <div class="form-row form-cart">
                            <div class="form-group col-md-6 form-city">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 form-city">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-row form-cart">
                            <button type="submit" class="btn btn-primary" disabled>Save</button>
                        </div>
                    </form>
                </div>

                <div class="cart-more">

                    <div class="image-container">
                        @if(isset($booking_details[0]))
                        <img src="{{$booking_details[0]->room->accommodation->header}}" width=400 height=400
                            alt="Hotel Room Image">
                        @else
                        <img src="https://via.placeholder.com/400" alt="Hotel Room Image">
                        @endif
                    </div>


                    <div class="amenities">
                        <h2>Other Facilities</h2>
                        <ul>
                            <li><strong>Free Wi-Fi:</strong> Yes</li>
                            <li><strong>Breakfast included:</strong> Yes</li>
                            <li><strong>Pool Access:</strong> Yes</li>
                            <li><strong>Gym Access:</strong> Yes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection