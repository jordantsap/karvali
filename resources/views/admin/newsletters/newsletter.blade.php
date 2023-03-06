@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Company : {{$company->title}}
      @can ('update_companies', App\Company::class)
        <small><a class="btn btn-primary" href="{{route('company.edit', $company->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
      @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="{{$company->title}}" value="{{$company->title}}" >
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="active" value="1" @if ($company->active == 1)
              {{'checked'}}
            @endif> Active
          </label>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="editor" class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height:150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$company->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="logo">logo</label>
          <img width="200" height="200" src="{{asset('images/companies/'.$company->logo)}}" alt="{{$company->title}}">

        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
