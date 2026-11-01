@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit {{ $house->title }}</h1>
        </section>
        <section class="content">
            <div class="box">
                <form method="post" action="{{ route('owner.houses.update', $house) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('auth.houses.form')
                </form>
            </div>
        </section>
    </div>
@endsection
