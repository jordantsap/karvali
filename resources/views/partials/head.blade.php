<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129494448-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129494448-1');
</script> --}}


    @yield('home-css')
    @yield('extra-css')
    {{-- search result page css --}}
    <style>
      #searchresultsheader{
            margin:50px 0;
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">


    <!--FA ICONS
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js" integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ" crossorigin="anonymous"></script> --}}

    <!--FA ICONS-->
    <script src="https://kit.fontawesome.com/4faf185009.js"></script>

    <!----link href="{ { asset('css/normalize.css') } }" rel="stylesheet"---->

    {{-- <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script> --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
   <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons' async='async'></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

{{--    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">--}}

        {{--    <script>--}}
{{--        $(document).ready(function () {--}}

{{--            $.ajaxSetup({--}}
{{--                headers:{--}}
{{--                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}

{{--            var calendar = $('#calendar').fullCalendar({--}}
{{--                editable:true,--}}
{{--                header:{--}}
{{--                    left:'prev,next today',--}}
{{--                    center:'title',--}}
{{--                    right:'month,agendaWeek,agendaDay'--}}
{{--                },--}}
{{--                events: 'available.rooms',--}}
{{--                initialView: 'timeGridDay',--}}
{{--                selectable:true,--}}
{{--                selectHelper: true,--}}
{{--                select:function(start, end, allDay)--}}
{{--                {--}}
{{--                    var title = prompt('Event Title:');--}}

{{--                    if(title)--}}
{{--                    {--}}
{{--                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');--}}

{{--                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');--}}

{{--                        $.ajax({--}}
{{--                            url:"fullcalendar/action",--}}
{{--                            type:"POST",--}}
{{--                            data:{--}}
{{--                                title: title,--}}
{{--                                start: start,--}}
{{--                                end: end,--}}
{{--                                type: 'add'--}}
{{--                            },--}}
{{--                            success:function(data)--}}
{{--                            {--}}
{{--                                calendar.fullCalendar('refetchEvents');--}}
{{--                                alert("Event Created Successfully");--}}
{{--                            }--}}
{{--                        })--}}
{{--                    }--}}
{{--                },--}}
{{--                editable:true,--}}
{{--                eventResize: function(event, delta)--}}
{{--                {--}}
{{--                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');--}}
{{--                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');--}}
{{--                    var title = event.title;--}}
{{--                    var id = event.id;--}}
{{--                    $.ajax({--}}
{{--                        url:"fullcalendar/action",--}}
{{--                        type:"POST",--}}
{{--                        data:{--}}
{{--                            title: title,--}}
{{--                            start: start,--}}
{{--                            end: end,--}}
{{--                            id: id,--}}
{{--                            type: 'update'--}}
{{--                        },--}}
{{--                        success:function(response)--}}
{{--                        {--}}
{{--                            calendar.fullCalendar('refetchEvents');--}}
{{--                            alert("Event Updated Successfully");--}}
{{--                        }--}}
{{--                    })--}}
{{--                },--}}
{{--                eventDrop: function(event, delta)--}}
{{--                {--}}
{{--                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');--}}
{{--                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');--}}
{{--                    var title = event.title;--}}
{{--                    var id = event.id;--}}
{{--                    $.ajax({--}}
{{--                        url:"full-calender/action",--}}
{{--                        type:"POST",--}}
{{--                        data:{--}}
{{--                            title: title,--}}
{{--                            start: start,--}}
{{--                            end: end,--}}
{{--                            id: id,--}}
{{--                            type: 'update'--}}
{{--                        },--}}
{{--                        success:function(response)--}}
{{--                        {--}}
{{--                            calendar.fullCalendar('refetchEvents');--}}
{{--                            alert("Event Updated Successfully");--}}
{{--                        }--}}
{{--                    })--}}
{{--                },--}}

{{--                eventClick:function(event)--}}
{{--                {--}}
{{--                    if(confirm("Are you sure you want to remove it?"))--}}
{{--                    {--}}
{{--                        var id = event.id;--}}
{{--                        $.ajax({--}}
{{--                            url:"full-calender/action",--}}
{{--                            type:"POST",--}}
{{--                            data:{--}}
{{--                                id:id,--}}
{{--                                type:"delete"--}}
{{--                            },--}}
{{--                            success:function(response)--}}
{{--                            {--}}
{{--                                calendar.fullCalendar('refetchEvents');--}}
{{--                                alert("Event Deleted Successfully");--}}
{{--                            }--}}
{{--                        })--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}

{{--    </script>--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

</head>
