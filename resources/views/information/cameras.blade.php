@extends('layouts.main')
@section('title', __('head.cameraspagetitle'))
@section('meta_keywords', __('meta.cameraspagekeywords'))
@section('meta_description', __('meta.cameraspagedescription'))
@section('content')
<!-- Page Content -->
<div class="container">
  <div id="cameras">
    <!-- Page Heading -->
    <h1 class="text-center">{{ __('page.cameras') }}</h1>
    <div class="divider"></div>
    <br>
    <div class="row">
      @include('information.sidebar')

      <div class="col-xs-10">
        <img width="100%" src="{{asset('images/under_construction.gif')}}" alt="">
        {{--
        <div class="col-xs-6">
          <div class="panel panel-default">
            <div class="panel-heading"><h1>Sea View</h1></div>
            <div class="panel-body">
              <h1>See Camera View</h1>
            </div>
          </div>
        </div>

        <div class="col-xs-6">
          <div class="panel panel-default">
            <div class="panel-heading"><h1>Panoramic View</h1></div>
            <div class="panel-body">
              <h1>Panoramic Camera View</h1>
            </div>
          </div>
        </div> --}}
      </div>

    </div>
  </div>
</div>
<br> @endsection
