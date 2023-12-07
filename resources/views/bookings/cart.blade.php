@extends('layouts.main')

@section('head-js')
<script type='text/javascript'
    src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons'
    async='async'></script>
@endsection

@section('content')

<h1 class="text-center"></h1>

<br>
<div class="container-cart">


    <div class="booking-details">
        <h2>Your Booking</h2>

        @if($booking_details ->count() > 0)

        @foreach($booking_details as $details)
        <div class="details-table">
            <div class="cart-details">
                <div class="col1">
                    <strong>Check-in <i class="fa fa-calendar-alt fa-lg"></i></strong>

                    <span id="display-checkin">{{ $details->check_in_date->format('Y-m-d') }}</span>
                </div>
                <div class="col2">
                    <strong>Check-out <i class="fa fa-calendar-alt fa-lg"></i></strong>
                    <span id="display-checkout">{{ $details->check_out_date->format('Y-m-d') }}</span>
                </div>
            </div>
            <div class="cart-details">
                <div class="col1">
                    <strong><i class="fa fa-users fa-solid"></i> Adults</strong>
                    <span id="display-adults">{{ $details->adults }}</span>
                </div>
                <div class="col2">
                    <strong><i class="fa fa-child fa-solid"></i> Children</strong>
                    <span id="display-children">{{ empty($details->children) ? $details->children : '0'}}</span>
                </div>
            </div>
            <div class="cart-details">
                <strong><i class="fa fa-bed fa-solid"></i> Room Title:</strong>
                <span id="display-room-type">{{$details->room->title}}</span>
            </div>

            <div class="cart-details">
                <strong><i class="fa fa-money-bill fa-solid"></i> Total Price:</strong>
                <span id="display-total-price">{{$details->room->price}}</span>
            </div>

            <div>
                <strong></strong>
                <span id="display-total-price"></span>
                <a
                    href="{{route('front.confirm.booking',['id'=>encrypt($details->id),'check_in_date'=>$details->check_in_date->format('Y-m-d'),'check_out_date'=>$details->check_out_date->format('Y-m-d'),'booking_id'=>$details->id])}}"><button
                        class="btn btn-primary">Confirm Booking</button></a>
            </div>
        </div>

        @endforeach

        @else

        <div class="details-table">
            <div class="cart-details">
                <div class="col1">
                    <span id="display-checkin">You don'thave any bookings....</span>
                </div>
            </div>

        </div>
        @endif

    </div>

    <div class="user-info">
        <h2>User Information</h2>
        <div class="note">
            <p><strong>Note:</strong> This is a confirmation of your booking details. Please ensure all information is
                correct. If you have any special requests or need further assistance, please contact our customer
                service.</p>
        </div>
        <div class="details-table">
            <div>
                <strong>Name:</strong>
                <span id="display-name">{{ $user->fullname }}</span>
            </div>
            <div>
                <strong>Email:</strong>
                <span id="display-email">john@example.com</span>
            </div>
            <div>
                <strong>Phone:</strong>
                <span id="display-phone">123-456-7890</span>
            </div>
            <div>
                <strong>Country:</strong>
                <span id="display-country">United States</span>
            </div>
        </div>
        <div class="decorative-border"></div>

        <div class="image-container">
            <img src="https://via.placeholder.com/400" alt="Hotel Room Image">
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
@endsection
@push('date_script')
<script>
    $('.like-btn').on('click', function () {
        $(this).toggleClass('is-active');
    });


    $('.plus-btn').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = t($input      $input.val(valu    e);
    });



</script>
@endpush