@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Your Venues
{{--        @can ('create_companies', App\Company::class)--}}
          <small><a class="btn btn-primary" href="{{route('owner.venue.create')}}">New</a></small>
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
                  <th>Manager</th>
                  <th>Logo</th>
{{--                  @can ('view_companies','update_companies', App\Company::class)--}}
                    <th>Actions</th>
{{--                  @endcan--}}
                </tr>
                </thead>
                @foreach ($venues as $venue)
                  <tbody>
                  <tr>
                    <td>{{$venue->id}}</td>
                    <td>{{$venue->active?"yes":'no'}}</td>
                    <td>
                      @if( ! empty($venue->category)){{ $venue->category->name }}
                      @else None
                      @endif
                    </td>
                    <td>{{Str::limit($venue->title,10)}}</td>
                    <td>{{$venue->manager}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/venues/'.$venue->logo)}}" alt="{{$venue->title}}"></td>
                    <td>
                    @can ('update_companies', App\Company::class)
                      <a class="btn btn-primary" href="{{route('owner.venue.edit', $venue->id)}}">Edit</a> -
                    @endcan
                    @can ('view_companies', App\Company::class)
                      <a class="btn btn-primary" href="{{route('owner.venue.show', $venue->id)}}">View</a>
                      @endcan
                        @can ('delete_companies', App\Models\Company::class)
                            <form action="{{ route('owner.venue.destroy', $venue->id) }}"
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
{{--                    @can ('view_companies','update_companies', App\Company::class)--}}
                      <th>Actions</th>
{{--                    @endcan--}}
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
