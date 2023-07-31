@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       @include('auth.sidebar')
        <div class="col-xs-6 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading mt-4">{{ __('verification.heading') }}</div>

                <div class="panel-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('verification.verifylink') }}
                    {{ __('verification.resendtext') }}, <a href="{{ route('verification.resend') }}">{{ __('verification.resendlink') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
