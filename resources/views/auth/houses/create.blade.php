@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>New house</h1>
        </section>
        <section class="content">
            <div class="box">
                <form method="post" action="{{ route('owner.houses.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('auth.houses.form', ['house' => null])
                </form>
            </div>
        </section>
    </div>
@endsection
