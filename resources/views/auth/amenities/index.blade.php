@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Amenities
{{--                @can ('create-amenities', App\Models\Amenity::class)--}}
                    <small><a class="btn btn-primary" href="{{route('owner.amenities.create')}}">Add New</a></small>
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
                                @foreach ($amenities as $amenity)
                                    <tbody>
                                    <tr>
                                        <td>{{$amenity->id}}</td>
{{--                                        <td>{{$amenity->active?"yes":'no'}}</td>--}}
                                        <td>{{$amenity->title}}</td>
                                        <td>{{$amenity->slug}}</td>

{{--                                        <td>{{Str::limit($amenity->description, 20)}}</td>--}}
                                        <td>
{{--                                            @can ('update', App\Models\AccommodationType::class)--}}
                                                <a class="btn btn-primary" href="{{route('owner.amenities.edit', $amenity->id)}}">Edit</a> -
{{--                                            @endcan--}}
{{--                                            @can ('view', App\Models\AccommodationType::class)--}}
                                                <a class="btn btn-primary" href="{{route('owner.amenities.show', $amenity->id)}}">View</a>
{{--                                            @endcan--}}
                                            @can ('delete', [$amenity, App\Models\AccommodationType::class])
                                                <form action="{{ route('owner.amenities.destroy', $amenity->id) }}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            @endcan
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
