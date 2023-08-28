@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Groups
        @can ('create-groups', App\Models\Group::class)
          <small><a class="btn btn-primary" href="{{route('owner.groups.create')}}">New Group</a></small>
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
                  @can ('view_groups','update_groups', App\Group::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($groups as $group)
                  <tbody>
                  <tr>
                    <td>{{$group->id}}</td>
                    <td>{{$group->active?"yes":'no'}}</td>
                    <td>
                      {{-- @if( ! empty($group->category)){{ $group->category->name }}
                      @else None
                      @endif --}}
                    </td>
                    <td>{{$group->title}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/venues/'.$group->logo)}}" alt="{{$group->title}}"></td>
                    <td>{{Str::limit($group->description, 20)}}</td>
                    <td>
                    @can ('update_groups', App\Group::class)
                        <a class="btn btn-primary" href="{{route('teams.edit', $group->id)}}">Edit</a> -
                      @endcan
                      @can ('view_groups', App\Group::class)
                        <a class="btn btn-primary" href="{{route('teams.show', $group->id)}}">View</a>
                      @endcan
                        @can ('delete_groups', App\Models\Group::class)
                            <form action="{{ route('teams.destroy', $group->id) }}"
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
                    @can ('view_groups','update_groups', App\Group::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$groups->links()}}
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
