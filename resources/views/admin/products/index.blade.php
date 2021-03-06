@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        @can ('create_products', App\Product::class)
          <small><a class="btn btn-primary" href="{{route('prod.create')}}">Add New</a></small>
        @endcan
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
                    @can ('view_products','update_products', App\Product::class)
                      <th>Actions</th>
                    @endcan
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
                      <td>{{str_limit($product->description, 20)}}</td>
                      <td>
                        @can ('update_products', App\Product::class)
                          <a class="btn btn-primary" href="{{route('prod.edit', $product->id)}}">Edit</a> -
                        @endcan
                        @can ('view_products', App\Product::class)
                          <a class="btn btn-primary" href="{{route('prod.show', $product->id)}}">View</a>
                        @endcan
                      </td>
                    </tr>
                    </tbody>
                  @endforeach
                  @else
                    no products
                @endif
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    @can (['view_products','update_products'], App\Product::class)
                      <th>Actions</th>
                    @endcan
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
