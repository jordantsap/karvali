@extends('layouts.user')
@section('title', 'Είσοδος Χρήστη')
@section('meta_description', __('meta.loginpagedescription'))
@section('meta_keywords', 'login, sign in')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('form.loginheader') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('postuserlogin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ __('form.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                                <input id="password" autocomplete="off" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">

                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('form.rememberme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button id="btn" type="submit" class="btn btn-primary">
                                    {{ __('form.login') }}
                                </button>
                                <a id="btn" class="btn btn-default" href="{{ route('password.request') }}">
                                    {{ __('form.passwordrequest') }}?
                                </a>
                                {{-- <div class="row col-xs-12">
                                  <br>
                                  Not register yet?
                                  <a id="btn" class="btn btn-default" href="{{ route('auth-request') }}">{{ __('form.register') }}</a>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                    {{-- <div class="row">
                      <h1 class="page-header text-center">{{ __('form.sociallogin') }}</h1>
                      <div class="col-xs-3">
                        <a id="btn" class="btn btn-default btn-block" href="{{route('facebook.login')}}"><i class="fab fa-2x fa-facebook-square"></i>&nbspFacebook</a>
                      </div>
                      <div class="col-xs-3">
                        <a id="btn" class="btn btn-default btn-block" href="{{route('twitter.login')}}"><i class="fab fa-2x fa-twitter"></i>Twitter</a>
                      </div>
                      <div class="col-xs-3">
                        <a id="btn" class="btn btn-default btn-block" href="{{route('google.login')}}"><i class="fab fa-2x fa-google-plus"></i></i>&nbspGoogle+</a>
                      </div>
                      <div class="col-xs-3">
                        <a id="btn" class="btn btn-default btn-block" href="{{route('linkedin.login')}}"><i class="fab fa-2x fa-linkedin"></i>&nbspLinkedin</a>
                      </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
