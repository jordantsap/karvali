@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Photos
        {{-- @can ('create_photos', App\Albumphoto::class) --}}
          <small><a class="btn btn-primary" href="{{route('photos.create')}}">Add New</a></small>
        {{-- @endcan --}}
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
                  <th>Album</th>
                  <th>Image</th>
                  {{-- @can ('view_photos','update_photos', App\Albumphoto::class) --}}
                    <th>Actions</th>
                  {{-- @endcan --}}
                </tr>
                </thead>
                @foreach ($albumphotos as $photo)
                  <tbody>
                  <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->active?"yes":'no'}}</td>
                    <td>
                      @if( ! empty($photo->album)){{ $photo->album->title }}
                      @else None
                      @endif
                    </td>
                    <td><img width="150px" height="150px" src="{{asset('images/albumphotos/'.$photo->file)}}" alt="{{$photo->alt}}"></td>
                    <td>
                    {{-- @can ('update_photos', App\Albumphoto::class) --}}
                      <a class="btn btn-primary" href="{{route('photos.edit', $photo->id)}}">Edit</a> -
                    {{-- @endcan --}}
                    {{-- @can ('view_photos', App\Albumphoto::class)
                      <a class="btn btn-primary" href="{{route('photos.show', $photo->id)}}">View</a>
                    @endcan --}}
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
                    {{-- @can ('view_photos','update_photos', App\Albumphoto::class) --}}
                      <th>Actions</th>
                    {{-- @endcan --}}
                  </tr>
                </tfoot>
              </table>
              {{$albumphotos->links()}}
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
