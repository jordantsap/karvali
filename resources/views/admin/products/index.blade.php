@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
{{--        @can ('create_products', App\Models\Product::class)--}}
          <small><a class="btn btn-primary" href="{{route('admin.products.create')}}">Add New</a></small>
{{--        @endcan--}}
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Logo</th>
                    <th>Description</th>
{{--                    @can ('view_products','update_products', App\Models\Product::class)--}}
                      <th>Actions</th>
{{--                    @endcan--}}
                  </tr>
                </thead>
                @if (count($products) > 0)
                  @foreach ($products as $product)
                    <tbody>
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->active?"yes":'no'}}</td>
                      <td>
                        @if( ! empty($product->category)){{ $product->category->name }}
                        @else None
                        @endif
                      </td>
                      <td>{{$product->title}}</td>
                      <td><img width="150px" height="150px" src="{{asset('images/products/'.$product->logo)}}" alt="{{$product->title}}"></td>
                      <td>{{Str::limit($product->description, 20)}}</td>
                      <td>
{{--                        @can ('update', App\Models\Product::class)--}}
                          <a class="btn btn-primary" href="{{route('admin.products.edit', $product->id)}}">Edit</a> -
{{--                        @endcan--}}
{{--                        @can ('view', App\Models\Product::class)--}}
                          <a class="btn btn-primary" href="{{route('admin.products.show', $product->id)}}">View</a>
{{--                        @endcan--}}
{{--                        @can ('delete', App\Models\Product::class)--}}
                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <br>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
{{--                        @endcan--}}
                      </td>
                    </tr>
                    </tbody>
                  @endforeach
                  @else
                    <tr>
                        <td>no products</td>
                    </tr>
                @endif
                <tfoot>
                  <tr>
                      <th>id</th>
                      <th>Active</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Logo</th>
                      <th>Description</th>
{{--                    @can (['view_products','update_products'], App\Product::class)--}}
                      <th>Actions</th>
{{--                    @endcan--}}
                  </tr>
                </tfoot>
              </table>
              {{$products->links()}}
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
