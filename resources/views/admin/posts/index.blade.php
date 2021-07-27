@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
        @can ('create_posts', App\Post::class)
          <small><a class="btn btn-primary" href="{{route('posts.create')}}">Add New</a></small>
        @endcan
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
                  <th>Active</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Description</th>
                  @can ('view_posts','update_posts', App\Post::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($posts as $post)
                  <tbody>
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->active?"yes":'no'}}</td>
                    <td>
                      @if( ! empty($post->category)){{ $post->category->name }}
                      @else None
                      @endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/posts/'.$post->image)}}" alt="{{$post->title}}"></td>
                    <td>{{Str::limit($post->description, 20)}}</td>
                    <td>
                    @can ('update_posts', App\Post::class)
                      <a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a> -
                    @endcan
                    @can ('view_posts', App\Post::class)
                      <a class="btn btn-primary" href="{{route('posts.show', $post->id)}}">View</a>
                    @endcan
                    </td>
                  </tr>
                  </tbody>
                @endforeach
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    @can ('view_posts','update_posts', App\Post::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$posts->links()}}
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
