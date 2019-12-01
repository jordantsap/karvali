@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Newsletters
        @can ('create_newsletters', App\Newsletter::class)
          <small><a class="btn btn-primary" href="{{route('newsletters.create')}}">New</a></small>
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
                  <th>E-mail</th>
                  <th>Created At</th>
                  @can ('view_newsletters','update_newsletters', App\Newsletter::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($newsletters as $newsletter)
                  <tbody>
                  <tr>
                    <td>{{$newsletter->id}}</td>
                    <td>{{$newsletter->email}}</td>
                    <td>{{$newsletter->created_at}}</td>
                    <td>@can ('update_newsletters', App\Newsletter::class)
                      <a class="btn btn-primary" href="{{route('newsletter.edit', $newsletter->id)}}">Edit</a> -
                    @endcan
                    @can ('view_newsletters', App\Newsletter::class)
                      <a class="btn btn-primary" href="{{route('newsletter.show', $newsletter->id)}}">View</a>
                      @endcan
                    </td>
                  </tr>
                  </tbody>
                @endforeach
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>E-Mail</th>
                    <th>Created At</th>
                    @can ('view_newsletters','update_newsletters', App\Newsletter::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$newsletters->links()}}
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
