@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Your Rooms
{{--        @can ('create_companies', App\Company::class)--}}
          <small><a class="btn btn-primary" href="{{route('owner.rooms.create')}}">New Room</a></small>
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
                  <th>Title</th>
                  <th>Accommodation</th>
{{--                  @can ('view-rooms','update-rooms', App\Company::class)--}}
                    <th>Actions</th>
{{--                  @endcan--}}
                </tr>
                </thead>
                @foreach ($rooms as $room)
                  <tbody>
                  <tr>
                    <td>{{$room->id}}</td>
                    <td>{{Str::limit($room->title,10)}}</td>
                    <td>{{$room->accommodation->title}}</td>

                    <td>
                    @can ('update-rooms', App\Models\Room::class)
                      <a class="btn btn-primary" href="{{route('owner.rooms.edit', $room->id)}}">Edit</a> -
                    @endcan
                    @can ('view-rooms', App\Models\Room::class)
                      <a class="btn btn-primary" href="{{route('owner.rooms.show', $room->id)}}">View</a>
                      @endcan
                        @can ('delete-rooms', App\Models\Room::class)
                            <form action="{{ route('owner.rooms.destroy', $room->id) }}"
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
                      <th>Accommodation</th>
                    @can ('view-rooms','update-rooms', App\Models\Room::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$rooms->links()}}
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
