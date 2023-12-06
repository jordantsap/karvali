<div class="form_search">
    <form method="get" action="{{ route('front.accommodation.search') }}">
        @csrf

        <div class="rooms_search">


            <div class="wrap_search">
                <span class="input-group-text search_icon"><i class="fa fa-building fa-lg"></i></span>
                &nbsp&nbsp
                <select class="input_select" name="accomodation_type">
                    <option class="input_search" value="">Accomodation Type</option>
                    


                    @foreach ($accommodationTypes as $accommodationType)
                    <option class="input_option" value="{{ $accommodationType->translation->accommodation_type_id }}" {{ old('accomodation_type') == $accommodationType->translation->accommodation_type_id ? 'selected' :''}}>{{
                        $accommodationType->title }}</option>
                    @endforeach
                </select>

                <div class="vertical"></div>
                <span class="input-group-text search_icon"><i class="fa fa-calendar-alt fa-lg"></i></span>
                &nbsp&nbsp
                <input value="{{ !empty(old('search_date')) ? old('search_date'):''}}" name="search_date" type="text" class="input_search" placeholder="Check-in & Check-out" id="demo" />
                <div class="vertical"></div>


                <span class="input-group-text search_icon"><i class="fa fa-bed fa-lg"></i></span>
                &nbsp&nbsp
                <div class="dropdown input_select">
                    <button class="btn btn-secondary dropdown-toggle search_button" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="calculatorButtonText">{{ !empty(old('room')) ? old('room'): '1'}} Room,{{ !empty(old('adult')) ? old('adult'): '1'}} Adult,{{ !empty(old('child')) ? old('child'): '0'}} Child</span>

                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- Room Selector -->
                        <div class="quantity-selector">
                            <button type="button" class="btn btn-secondary" data-action="decrement"
                                data-target="room">-</button>
                            <span class="dropdown-item" id="roomInfo">{{ !empty(old('room')) ? old('room').' Room': '1 Room'}}</span>
                            <input type="text" hidden value="{{ !empty(old('room')) ? old('room'): '1'}}" id="room" name="room" />
                            <button type="button" class="btn btn-secondary" data-action="increment"
                                data-target="room">+</button>
                        </div>
                        <!-- Adult Selector -->
                        <div class="quantity-selector">
                            <button type="button" class="btn btn-secondary" data-action="decrement"
                                data-target="adult">-</button>
                            <span class="dropdown-item" id="adultInfo">{{ !empty(old('adult')) ? old('adult').' Adult': '1 Adult'}}</span>
                            <input type="text" hidden value="{{ !empty(old('adult')) ? old('adult'): '1'}}" id="adult" name="adult" />
                            <button type="button" class="btn btn-secondary" data-action="increment"
                                data-target="adult">+</button>
                        </div>
                        <!-- Child Selector -->
                        <div class="quantity-selector">
                            <button type="button" class="btn btn-secondary" data-action="decrement"
                                data-target="child">-</button>
                            <span class="dropdown-item" id="childInfo">{{ !empty(old('child')) ? old('child').' Child': '0 Child'}}</span>
                            <input type="text" hidden value="{{ !empty(old('child')) ? old('child'): '0'}}" id="child" name="child" />
                            <button type="button" class="btn btn-secondary" data-action="increment"
                                data-target="child">+</button>
                        </div>
                    </div>
                </div>


                <div class="vertical"></div>
                &nbsp&nbsp
                <button type="submit" class="btn btn-primary btn-lg search_rooms"><i class="fa fa-search"></i></button>

            </div>
           
            <!-- <input class="input_search" placeholder="Adults" type="number" name="adults" class="adults" />
                        <div class="vertical"></div>
                        <input class="input_search" placeholder="Kids" type="number" name="kids" class="kids" /> -->

        </div>
    </form>
</div>

@push('date_script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $(document).ready(function () {

        var searchDate = "{{ old('search_date', '') }}";
        
        if(searchDate === '')
        {
            var start = new Date();
            var end = moment().add(2, 'days').format('MM-DD-YYYY');
        }
        else{
             //Split the date range into start and end dates
            var dates = searchDate.split('-');
            var startDate = dates[0].trim();
            var endDate = dates[1].trim();
        }
         

        
        if(startDate != null)
           start = startDate;
        else
            start = new Date();
        if(endDate != null)
            end = endDate;
        else
            end = moment().add(2, 'days').format('MM-DD-YYYY');

        $('#demo').daterangepicker({
            "linkedCalendars": true,
            "autoUpdateInput": true,
            "showCustomRangeLabel": false,
            startDate: start,
            endDate: end,
            minDate: new Date(),
            "opens": "center"
        }, function (start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });

        var roomCount = document.getElementById('room').value;
        var adultCount = document.getElementById('adult').value;
        var childCount = document.getElementById('child').value;

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
            document.getElementById('room').value = roomCount;
            document.getElementById('adult').value = adultCount;
            document.getElementById('child').value = childCount;

        }

        $('#showValues').click(function () {
            $('#selectedRoomInfo').text(roomCount + ' Room(s), ' + adultCount + ' Adult(s), ' + childCount + ' Child(ren)');
            
            $('#selectedValues').show();
        });


    });

</script>

@endpush