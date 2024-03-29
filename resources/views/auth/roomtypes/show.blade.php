@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Room Type : {{$roomType->title}}
                @can ('update-accommodation', App\Models\Accommodation::class)
                    <small><a class="btn btn-primary" href="{{route('owner.room-types.edit', $roomType->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
                @endcan
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-body">

                    @foreach(config('translatable.locales') as $locale => $lang)
                        <div class="row">
                            <div class="col-xs-8 form-group">
                                <label for="title">{{__('form.title'). ' '. $lang}}</label>
                                <input type="text" class="form-control" placeholder="{{ $roomType->translate($locale)->title }}">
                            </div>

                        </div>
                    @endforeach
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
