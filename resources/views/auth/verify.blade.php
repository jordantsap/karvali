@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      {{-- @include('auth.sidebar') --}}
        <div class="col-xs-6 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading mt-4">{{ __('Το αίτημα σας παραμένει σε διαδικασία εξέτασης') }}</div>

                <div class="panel-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
