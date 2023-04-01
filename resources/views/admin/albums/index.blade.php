@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Albums
        @can ('create_albums', App\Album::class)
          <small><a class="btn btn-primary" href="{{route('albums.create')}}">Add New</a></small>
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
                  <th>Title</th>
                  <th>Cover_Image</th>
                  <th>Description</th>
                  @can ('view_albums','update_albums', App\Album::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($albums as $album)
                  <tbody>
                  <tr>
                    <td>{{$album->id}}</td>
                    {{-- <td>
                      @if( ! empty($album->category)){{ $album->category->name }}
                      @else None
                      @endif
                    </td> --}}
                    <td>{{$album->title}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/albums/'.$album->cover_image)}}" alt="{{$album->title}}"></td>
                    <td>{{Str::limit($album->description, 20)}}</td>
                    <td>
                    @can ('update_albums', App\Album::class)
                      <a class="btn btn-primary" href="{{route('albums.edit', $album->id)}}">Edit</a> -
                    @endcan
                    @can ('view_albums', App\Album::class)
                      <a class="btn btn-primary" href="{{route('albums.show', $album->id)}}">View</a>
                    @endcan
                        @can ('delete_albums', App\Models\Album::class)
                            <form action="{{ route('albums.destroy', $album->id) }}"
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
                    <th>Title</th>
                    <th>Cover_Image</th>
                    <th>Description</th>
                    @can ('view_albums','update_albums', App\Album::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$albums->links()}}
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
