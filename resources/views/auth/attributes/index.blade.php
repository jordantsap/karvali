@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Attributes
{{--                @can ('create', App\Models\Attribute::class)--}}
                    <small><a class="btn btn-primary" href="{{route('owner.attributes.create')}}">Add New</a></small>
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
                                    <th>Product type</th>
                                    <th>Type</th>
{{--                                    @can ('update', App\Models\AccommodationType::class)--}}
                                        <th>Actions</th>
{{--                                    @endcan--}}
                                </tr>
                                </thead>
                                @foreach ($attributes as $attribute)
                                    <tbody>
                                    <tr>
                                        <td>{{$attribute->id}}</td>
{{--                                        <td>{{$attribute->active?"yes":'no'}}</td>--}}
                                        <td>{{$attribute->title}}</td>
                                        <td>{{$attribute->slug}}</td>

                                        <td>{{$attribute->productType->title}}</td>
                                        <td>{{$attribute->attributeType->type}}</td>
                                        <td>
{{--                                            @can ('update', App\Models\AccommodationType::class)--}}
                                                <a class="btn btn-primary" href="{{route('owner.attributes.edit', $attribute->id)}}">Edit</a> -
{{--                                            @endcan--}}
{{--                                            @can ('view', App\Models\AccommodationType::class)--}}
                                                <a class="btn btn-primary" href="{{route('owner.attributes.show', $attribute->id)}}">View</a>
{{--                                            @endcan--}}
{{--                                            @can ('delete', [$attribute, App\Models\Attribute::class])--}}
                                                <form action="{{ route('owner.attributes.destroy', $attribute->id) }}"
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
                                    <th>Product type</th>
                                    <th>Type</th>
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
