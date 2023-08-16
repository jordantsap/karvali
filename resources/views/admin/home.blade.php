@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>it all starts here</small>
    </h1>
     <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h1 class="box-title"><b>Needs</b></h1>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <br>
          @if(auth()->user()->currentMembership && auth()->user()->currentMembership->end_date > now())
              <p>You have an {{ auth()->user()->currentMembership->plan->status }} subscription.</p>
              <p>Plan: {{ auth()->user()->currentMembership->plan->name }}</p>
              <p>Start Date: {{ auth()->user()->currentMembership->start_date }}</p>
              <p>End Date: {{ auth()->user()->currentMembership->end_date }}</p>
          @else
              <p>You do not have an active subscription.</p>
          @endif

          @if(auth()->user()->companies()->count())
              has companies
          @endif
          @if(auth()->user()->has('accommodations')->count())
              has accommodations
          @endif
          @if(auth()->user()->venues()->count())
              has venues
          @endif

      </div>
      <!-- /.box-body -->
       <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
