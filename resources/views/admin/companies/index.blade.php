@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Companies
        @can ('create-companies', App\Models\Company::class)
          <small><a class="btn btn-primary" href="{{route('admin.companies.create')}}">New</a></small>
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
                  @can ('view-companies','update-companies', App\Models\Company::class)
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
                      @if( ! empty($company->category)){{ $company->category->title }}
                      @else None
                      @endif
                    </td>
                    <td>{{Str::limit($company->title,10)}}</td>
                    <td>{{$company->manager}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/companies/'.$company->logo)}}" alt="{{$company->title}}"></td>
                    <td>
                    @can ('update-companies', App\Models\Company::class)
                      <a class="btn btn-primary" href="{{route('admin.companies.edit', $company->id)}}">Edit</a> -
                    @endcan
                    @can ('view-companies', App\Models\Company::class)
                      <a class="btn btn-primary" href="{{route('admin.companies.show', $company->id)}}">View</a>
                      @endcan
                        @can ('delete-companies', App\Models\Company::class)
                            <form action="{{ route('admin.companies.destroy', $company->id) }}"
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
                    @can ('view-companies','update-companies', App\Company::class)
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
