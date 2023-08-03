@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Your Room Types
{{--        @can ('create_companies', App\Company::class)--}}
          <small><a class="btn btn-primary" href="{{route('owner.room-types.create')}}">New Room Type</a></small>
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
{{--                  @can ('view-rooms','update-rooms', App\Company::class)--}}
                    <th>Actions</th>
{{--                  @endcan--}}
                </tr>
                </thead>
                @foreach ($roomTypes as $roomType)
                  <tbody>
                  <tr>
                    <td>{{$roomType->id}}</td>
                    <td>{{Str::limit($roomType->title,10)}}</td>

                    <td>
{{--                    @can ('update_companies', App\Company::class)--}}
                      <a class="btn btn-primary" href="{{route('owner.room-types.edit', $roomType->id)}}">Edit</a> -
{{--                    @endcan--}}
{{--                    @can ('view_companies', App\Company::class)--}}
                      <a class="btn btn-primary" href="{{route('owner.room-types.show', $roomType->id)}}">View</a>
{{--                      @endcan--}}
{{--                        @can ('delete_companies', App\Models\Company::class)--}}
                            <form action="{{ route('owner.room-types.destroy', $roomType->id) }}"
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
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    @can ('view-rooms','update-rooms', App\Models\Room::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$roomTypes->links()}}
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
