@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product Types
{{--                @can ('create', App\Models\ProductType::class)--}}
                    <small><a class="btn btn-primary" href="{{route('admin.product-types.create')}}">Add New</a></small>
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
{{--                                    @can ('update', App\Models\ProductType::class)--}}
                                        <th>Actions</th>
{{--                                    @endcan--}}
                                </tr>
                                </thead>
                                @foreach ($productTypes as $accommodationType)
                                    <tbody>
                                    <tr>
                                        <td>{{$accommodationType->id}}</td>
{{--                                        <td>{{$accommodationType->active?"yes":'no'}}</td>--}}
                                        <td>{{$accommodationType->title}}</td>
                                        <td>{{$accommodationType->slug}}</td>

{{--                                        <td>{{Str::limit($accommodationType->description, 20)}}</td>--}}
                                        <td>
{{--                                            @can ('update', App\Models\AccommodationType::class)--}}
{{--                                                <a class="btn btn-primary" href="{{route('admin.accommodation-types.edit', $accommodationType->id)}}">Edit</a> ---}}
{{--                                            @endcan--}}
{{--                                            @can ('view', App\Models\AccommodationType::class)--}}
{{--                                                <a class="btn btn-primary" href="{{route('admin.accommodation-types.show', $accommodationType->id)}}">View</a>--}}
{{--                                            @endcan--}}
                                            <!-- @ can ('delete-productType', [$accommodationType, App\Models\AccommodationType::class]) -->
                                                <form action="{{ route('admin.product-types.destroy', $accommodationType->id) }}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            <!-- @ endcan -->
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
