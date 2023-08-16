@extends('layouts.main')
@section('title', __('User register | '))
@section('meta_description', __('meta.register'))
@section('meta_keywords', 'register, create account')

@section('content')
<div class="container">
  <div class="row">
     @include('partials.alerts')
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">{{ __('form.registerheader') }}</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

              <div class="form-group">
                  <label for="role" class="col-md-4 control-label">{{__('register.requestpackagelabel')}}</label>
                  <div class="col-md-6">
                      <select class="form-control" name="role" required>
                          <option value="">{{__('form.pleaseselect')}}</option>
                          @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="membership" class="col-md-4 control-label">{{__('register.membership')}}</label>
                  <div class="col-md-6">
                          <select class="form-control" name="plan_id" id="plan_id" required>
                              <option value="">{{__('form.pleaseselect')}}</option>
                              @foreach($plans as $plan)
                                  <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->price }} - {{'for '.$plan->duration.' days'}}</option>
                              @endforeach
                          </select>

{{--                      </select>--}}

                  </div>
              </div>

              <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
              <label for="fullname" class="col-md-4 control-label">
                {{ __('form.fullname') }}
              </label>

              <div class="col-md-6">
                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                   @if ($errors->has('fullname'))
                <span class="help-block">
                  <strong>{{ $errors->first('fullname') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="username" class="col-md-4 control-label">
                {{ __('form.username') }}
              </label>

              <div class="col-md-6">
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"
                   autofocus>
                   @if ($errors->has('username'))
                <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">{{ __('form.email') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">{{ __('form.password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label">{{ __('form.confirmpassword') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button id="btn" type="submit" class="btn btn-primary">
                  {{ __('form.register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
          @include('home.packages')
</div>
@endsection
