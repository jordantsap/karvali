@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Venues
{{--        @can ('create-venues', App\Models\Venue::class)--}}
          <small><a class="btn btn-primary" href="{{route('owner.venues.create')}}">New</a></small>
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
{{--                  @can ('view_events','update_events', App\Event::class)--}}
                    <th>Actions</th>
{{--                  @endcan--}}
                </tr>
                </thead>
                @foreach ($venues as $venue)
                  <tbody>
                  <tr>
                    <td>{{$venue->id}}</td>
                    <td>{{$venue->active?"yes":'no'}}</td>
                    <td>{{$venue->title}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/events/'.$venue->logo)}}" alt="{{$venue->title}}"></td>
                    <td>{{Str::limit($venue->description, 20)}}</td>
                    <td>
{{--                    @can ('update_events', App\Event::class)--}}
                        <a class="btn btn-primary" href="{{route('owner.venues.edit', $venue->id)}}">Edit</a> -
{{--                      @endcan--}}
{{--                      @can ('view_events', App\Event::class)--}}
                        <a class="btn btn-primary" href="{{route('owner.venues.show', $venue->id)}}">View</a>
{{--                      @endcan--}}
{{--                      @can ('delete_events', App\Models\Event::class)--}}
                          <form action="{{ route('owner.venues.destroy', $venue->id) }}"
                                method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <br>
                              <button type="submit" class="btn btn-primary">Delete</button>
                          </form>
{{--                      @endcan--}}
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
                    @can ('view-venues','update-venues', App\Models\Venue::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$venues->links()}}
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
