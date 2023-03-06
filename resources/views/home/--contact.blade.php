@extends('layouts.main')
@section('title', 'Επικοινωνία με το διαχειριστή της σελίδας')
@section('keywords')
@section('description')
@section('content')

<div class="contact-img">
  <div id="main-contact">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1>{{ __('page.contactheader') }}</h1>
          <form action="{{route('postContact')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="firstname">{{ __('page.contactname') }}</label>
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Όνομα">
            </div>
            <div class="form-group">
              <label for="lastname">{{ __('page.contactlastname') }}</label>
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Επίθετο">
            </div>
            <div class="form-group">
              <label for="message">{{ __('page.contactmessage') }}</label>
              <textarea name="message" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" name="contact" id="contact" class="col-xs-12 btn btn-primary btn-lg">{{ __('page.contactbutton') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>

@endsection
