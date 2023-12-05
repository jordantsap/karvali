@extends('layouts.main')
@section('title', __('head.thankyoupagetitle'))
@section('meta_description', __('meta.thankyoupagedescription'))
@section('meta_keywords', 'thank you order, product order confirmed,')

@section('content')
<!-- Page Content -->
<div class="container">
  <div id="pages">
    <div class="row text-center">
      {{-- <h1><img src="{{ asset('images/under_construction.gif') }}" width="100%" height="250px"></h1> --}}
      <div class="col-xs-8 col-xs-offset-2">
        <div class="thank-you-section">
          <h1>{{__('cart.thankyoufor')}} <br> {{__('cart.yourorder')}}!</h1>
          <p>{{__('cart.confirmemailsend')}}</p>
        <div class="spacer"></div>
          <a class="btn btn-default btn-block" href="{{ url('/') }}" class="button">{{__('cart.gotohomepage')}}</a>
        </div>
      </div>

    </div>
  </div><br>
</div>
@endsection
