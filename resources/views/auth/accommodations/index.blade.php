@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Your Accommodation
{{--        @can ('create_companies', App\Company::class)--}}
          <small><a class="btn btn-primary" href="{{route('owner.accommodation.store')}}">New</a></small>
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
                @foreach ($accommodations as $accommodation)
                  <tbody>
                  <tr>
                    <td>{{$accommodation->id}}</td>
                    <td>{{$accommodation->active?"yes":'no'}}</td>
                    <td>
                      @if( ! empty($accommodation->accommodationType)){{ $accommodation->accommodationType->title }}
                      @else None
                      @endif
                    </td>
                    <td>{{Str::limit($accommodation->title,10)}}</td>
                    <td>{{$accommodation->manager}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/accommodations/'.$accommodation->logo)}}" alt="{{$accommodation->title}}"></td>
                    <td>
                    @can ('update-accommodation', [Auth()->user(), $accommodation])
                      <a class="btn btn-primary" href="{{route('owner.accommodation.edit', $accommodation->slug)}}">Edit</a> -
                    @endcan
                    @can ('view-accommodation', [Auth()->user(), $accommodation])
                      <a class="btn btn-primary" href="{{route('owner.accommodation.show', $accommodation->slug)}}">View</a>
                      @endcan
                        @can ('delete-accommodation', [Auth()->user(), App\Models\Accommodation::class])
                            <form action="{{ route('owner.accommodation.destroy', $accommodation->slug) }}"
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
                      <th>Category</th>
                      <th>Title</th>
                      <th>Manager</th>
                      <th>Logo</th>
{{--                    @can ('view','update', App\Models\Accommodation::class)--}}
                      <th>Actions</th>
{{--                    @endcan--}}
                  </tr>
                </tfoot>
              </table>
              {{$accommodations->links()}}
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
