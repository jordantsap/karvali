@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events
        @can ('create_events', App\Event::class)
          <small><a class="btn btn-primary" href="{{route('events.create')}}">New</a></small>
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
                  <th>Title</th>
                  <th>Logo</th>
                  <th>Description</th>
                  @can ('view_events','update_events', App\Event::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($events as $event)
                  <tbody>
                  <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->active?"yes":'no'}}</td>
                    <td>{{$event->title}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/events/'.$event->logo)}}" alt="{{$event->title}}"></td>
                    <td>{{Str::limit($event->description, 20)}}</td>
                    <td>
                    @can ('update_events', App\Event::class)
                        <a class="btn btn-primary" href="{{route('events.edit', $event->id)}}">Edit</a> -
                      @endcan
                      @can ('view_events', App\Event::class)
                        <a class="btn btn-primary" href="{{route('events.show', $event->id)}}">View</a>
                      @endcan
                      @can ('delete_events', App\Models\Event::class)
                          <form action="{{ route('events.destroy', $event->id) }}"
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
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    @can ('view_events','update_events', App\Event::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$events->links()}}
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
