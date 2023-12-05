@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      @include('auth.sidebar')
        <div class="col-xs-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
