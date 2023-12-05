@extends('layouts.user')
@section('title', 'User Payments Page |')
@section('keywords')
@section('description')

@section('content')
<div class="container" style="background-color:white;">
    <div class="row">
      @include('auth.sidebar')
        <div class="col-xs-10">
            <div class="panel panel-default">
                <div class="panel-heading">Ιστορικό Πληρωμών</div>

                <div class="panel-body">
                	<h1><img src="{{ asset('images/under_construction.gif') }}" width="100%" height="250px"></h1>
                </div>

            </div>
        </div>
    </div>
</div>
<br>
@endsection
