@extends('layouts.main')
@section('title', __('head.eventstitle'))
@section('meta_description',__('meta.eventspagedescription'))
@section('meta_keywords', __('meta.eventspagekeywords'))

@section('content')
  <div id="events">
<div class="container">
  <div class="row">
      <h1 class="">{{ __('page.events') }}</h1>
      <div class="divider"></div>
      <br>
      <div class="row">

        <div class="col-xs-10">
          @if(count($events) > 0) @foreach ($events as $event)
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <a href="{{ route('event',$event->slug) }}">
                <img class="img-responsive" style="width:100%;height:150px;" src="{{ asset('images/events/'.$event->logo) }}"
                  alt="{{ $event->title }}">
              </a>
            </div>

            <div class="col-xs-12 col-sm-6">
              <h4 class="card-title"><a href="{{ route('event',$event->slug) }}">{{ str_limit($event->title, 15) }}</a></h4>
              <p>{{ str_limit($event->description, 100) }}</p>
              <p>{{ __('page.date') }} {{ date('d-M-Y', strtotime($event->start_date))
                }} - {{ __('page.from') }}:{{ $event->start_time }} - {{ __('page.until')
                }}: {{$event->end_time}}</p>
              <p class="row" id="likecomment">
                <span class="col-xs-4">
                  <a id="btn" class="btn btn-lnik btn-block" href="{{ route('event',$event->slug) }}">View Project
                  </a>
                </span>
                <span class="col-xs-4 social-button btn-link"><i class="fa fa-3x fa-thumbs-up"></i>
                  <span class="badge">{{$event->likes->count()}}</span>
                </span>
                <span class="col-xs-4 social-button btn-link"><i class="fa fa-3x fa-comment"></i>
                  <span class="badge">{{$event->comments->count()}}</span>
                </span>
              </p>
            </div>
          </div>
          <br>
          <div class="divider"></div>
          <br> @endforeach @else
          <div class="col-xs-12 noresults">
            <h1><b>{{__('page.noresults')}}</b></h1>
          </div>
          @endif

        </div>

        <div class="col-xs-2">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Κατηγορίες</div>
            <!-- List group -->
            <ul class="list-group text-center">
              <a href="{{route('pastevents')}}" class="list-group-item">Περασμένες Εκδηλώσεις</a>
              <a href="{{route('todayevents')}}" class="list-group-item">Σημερινές Εκδηλώσεις</a>
              <a href="{{route('weekevents')}}" class="list-group-item">Εκδηλώσεις Εβδομάδας</a>
              <a href="{{route('monthevents')}}" class="list-group-item">Εκδηλώσεις του Μήνα</a>
              <a href="{{route('upcomingevents')}}" class="list-group-item">Απερχόμενες Εκδηλώσεις</a>
            </ul>
          </div>
        </div>


        <div class="col-xs-9">
          {{ $events->links() }}
        </div>

      </div>
      <!-- /.row -->


    </div>
    <!-- /.container -->
  </div>
</div>
<br> @endsection
