@extends('layouts.main')
@section('title', 'Εγγραφή Πελάτη')

@section('content')
  <div class="container-fluid" style="margin-bottom:70px;">
    <div class="row">
  <div class="col-xs-11 col-xs-offset-1">



        <h1 class="text-center">{{__('register.maintitle')}}<br>
          <small class="text-center">{{__('register.subtitle')}}</small>
        </h1>
        <form class="form-group" method="POST" action="{{ route('register') }}">
        <div class="col-xs-10">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>{{__('register.requestdetails')}}</h1>
                <li class="divider"></li>
                <br>
              </div>

              <div class="col-xs-12 col-md-6 form-group{{ $errors->has("category") ? ' has-error' : '' }}">
                <label for="category" class="control-label">{{__('register.requestcategorylabel')}}</label>

                <select class="form-control" id="category" name="category" value="{{ old("category") }}">
                  <option value="0">Διαλέξτε κατηγορία Καταχώρησης</option>
                  <option value="company @if (count($errors)){{'selected'}}@endif">Κατάστημα</option>
                    <option value="product @if (count($errors)){{'selected'}}@endif">Προϊόντα</option>
                    </select>
                    @if ($errors->has("category"))
                      <span class="help-block">
                        <strong>{{ $errors->first("category") }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="col-xs-12 form-group{{ $errors->has('requestname') ? ' has-error' : '' }}">
                    <label for="requestname" class="control-label">{{__('register.requestname')}}</label>

                    <input id="requestname" type="text" class="form-control" name="requestname" value="{{ old('requestname') }}" placeholder="{{__('register.reqnameplaceholder')}}"> @if ($errors->has('requestname'))
                      <span class="help-block">
                        <strong>{{ $errors->first('requestname') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="col-xs-12 form-group">
                    <label for="description">{{__('register.additionallabel')}}</label>
                    <textarea class="textarea" name="description" placeholder="{{__('register.additionalplaceholder')}}" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
                  </div>
                  {{-- <div class="col-xs-12 col-md-6 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="control-label">{{__('register.typelabel')}}</label>
                    <select class="form-control" id="type" name="type" value="{{ old('type') }}">
                      <option value="0">{{__('register.typeoption')}}</option>
                      <option value="company @if (count($errors)){{'selected'}}@endif">Κατάστημα</option>
                      <option value="product @if (count($errors)){{'selected'}}@endif">Προϊόντα</option>
                    </select>
                    @if ($errors->has('type'))
                    <span class="help-block">
                      <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                  </div> --}}

            <div class="row">
              <div id="details-reg" class="col-xs-12 text-center">
                <h1>{{__('register.usrdetails')}}</h1>
                <li class="divider"></li>
                <br>
              </div>

              <div class="col-xs-12 col-md-6 form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                <label for="fullname" class="control-label">{{__('register.fullnamelabel')}}</label>

                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="{{__('register.fullnameplaceholder')}}"> @if ($errors->has('fullname'))
                <span class="help-block">
                  <strong>{{ $errors->first('fullname') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-xs-12 col-md-6 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label">{{__('register.usernamelabel')}}</label>

                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="{{__('register.usernameplaceholder')}}"> @if ($errors->has('username'))
                <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
              </div>

              <div class="col-xs-12 col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">{{__('register.emaillabel')}}</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{__('register.emailplaceholder')}}"> @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                <label for="tel" class="control-label">{{__('register.tellabel')}}</label>

                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" placeholder="{{__('register.telplaceholder')}}"> @if ($errors->has('tel'))
                <span class="help-block">
                  <strong>{{ $errors->first('tel') }}</strong>
                </span>
                @endif
              </div>

              <div class="col-xs-12 col-sm-6 col-md-3 form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="control-label">{{__('register.mobilelabel')}}</label>

                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="{{__('register.mobileplaceholder')}}">
                @if ($errors->has('mobile'))
                <span class="help-block">
                  <strong>{{ $errors->first('mobile') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">{{ __('register.passlabel') }}</label>
                  <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="{{__('register.passplaceholder')}}">
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
              </div>

              <div class="col-xs-12 col-md-6 form-group">
                <label for="password-confirm" class="control-label">{{ __('register.passconlabel') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{__('register.passconplaceholder')}}">

              </div>
            </div>

            </div>

            <div class="row">

              <div class="col-xs-12 col-sm-6 form-group">
                <div class="checkbox">
                  <label for="newsletter" class="checkbox-inline">
                    <input type="checkbox" id="newsletter" name="newsletter" value="1" checked> {{__('register.newsletter')}}
                  </label>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6 form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  Αποστολή Αίτησης
                </button>
              </div>
            </div>
          </form>
        </div>


            <div class="col-xs-2" style="padding-top:150px;">
              {{-- <div style="margin-right: auto !important;" data-spy="affix" data-offset-top="10" data-offset-bottom="480"> --}}

                <h3 class="text-center">{{ __('Πολιτική απορρήτου') }}</h3>
                {{-- <i class="fas fa-5x fa-lock"></i> --}}
                <a id="btn" href="{{route('privacy')}}" class="btn btn-info btn-block" target="_blank">{{ __('Περισσότερα') }}</a>
                {{-- </div>
                <div class=""> --}}
                <h3 class="text-center">{{ __('Προσωπικά Δεδομένα') }}</h3>
                {{-- <i class="fas fa-5x fa-users"></i> --}}
                <a id="btn" href="{{route('personaldata')}}" class="btn btn-info btn-block" target="_blank">{{ __('Περισσότερα') }}</a>
                {{-- </div>
                <div class=""> --}}
                <h3 class="text-center">{{ __('Υπηρεσίες') }}</h3>
                {{-- <i class="fas fa-5x fa-handshake"></i> --}}
                <a id="btn" href="{{route('services')}}" class="btn btn-info btn-block" target="_blank">{{ __('Περισσότερα') }}</a>
              {{-- </div> --}}
            </div>

      </div>
    </div>
    {{-- @include('home.blog') --}}

  </div>
@endsection
