@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Room Types
{{--                @can ('create-roomtypes', App\Models\RoomType::class)--}}
                    <small><a class="btn btn-primary" href="{{route('owner.room-types.create')}}">Add New</a></small>
{{--                @endcan--}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
{{--                                    <th>Active</th>--}}
                                    <th>Title</th>
                                    <th>Slug</th>
{{--                                    <th>Description</th>--}}
{{--                                    @can ('update', App\Models\AccommodationType::class)--}}
                                        <th>Actions</th>
{{--                                    @endcan--}}
                                </tr>
                                </thead>
                                @foreach ($roomTypes as $roomType)
                                    <tbody>
                                    <tr>
                                        <td>{{$roomType->id}}</td>
{{--                                        <td>{{$roomType->active?"yes":'no'}}</td>--}}
                                        <td>{{$roomType->title}}</td>
                                        <td>{{$roomType->slug}}</td>

{{--                                        <td>{{Str::limit($roomType->description, 20)}}</td>--}}
                                        <td>
{{--                                            @can ('update', App\Models\AccommodationType::class)--}}
                                                <a class="btn btn-primary" href="{{route('owner.room-types.edit', $roomType->id)}}">Edit</a> -
{{--                                            @endcan--}}
{{--                                            @can ('view', App\Models\AccommodationType::class)--}}
                                                <a class="btn btn-primary" href="{{route('owner.room-types.show', $roomType->id)}}">View</a>
{{--                                            @endcan--}}
{{--                                            @ can ('delete', [$roomType, App\Models\AccommodationType::class])--}}
                                                <form action="{{ route('owner.room-types.destroy', $roomType->id) }}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
{{--                                            @endcan--}}
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                                <tfoot>
                                <tr>
                                    <th>id</th>
{{--                                    <th>Active</th>--}}
                                    <th>Title</th>
                                    <th>Slug</th>
{{--                                    <th>Description</th>--}}
{{--                                    @can ('update', App\Models\AccommodationType::class)--}}
                                        <th>Actions</th>
{{--                                    @endcan--}}
                                </tr>
                                </tfoot>
                            </table>
{{--                            {{$posts->links()}}--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
