@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Companies
        @can ('create_companies', App\Company::class)
          <small><a class="btn btn-primary" href="{{route('company.create')}}">New</a></small>
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
                  <th>Manager</th>
                  <th>Logo</th>
                  @can ('view_companies','update_companies', App\Company::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($companies as $company)
                  <tbody>
                  <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->active?"yes":'no'}}</td>
                    <td>
                      @if( ! empty($company->category)){{ $company->category->name }}
                      @else None
                      @endif
                    </td>
                    <td>{{str_limit($company->title,10)}}</td>
                    <td>{{$company->manager}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/companies/'.$company->logo)}}" alt="{{$company->title}}"></td>
                    <td>
                    @can ('update_companies', App\Company::class)
                      <a class="btn btn-primary" href="{{route('company.edit', $company->id)}}">Edit</a> -
                    @endcan
                    @can ('view_companies', App\Company::class)
                      <a class="btn btn-primary" href="{{route('company.show', $company->id)}}">View</a>
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
                    @can ('view_companies','update_companies', App\Company::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$companies->links()}}
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
