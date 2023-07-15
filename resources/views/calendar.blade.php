@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div id="fullcalendar"></div>

            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('fullcalendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                start: 'title', // will normally be on the left. if RTL, will be on the right
                center: '',
                end: 'today prev,next', // will normally be on the right. if RTL, will be on the left
                editable: true,
                selectable: true,
                select: function(start, end, allDays){
                    console.log(start);
                }
            });
            calendar.render();
        });

    </script>
@endsection
