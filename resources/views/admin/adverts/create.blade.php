@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>New Advert</h1>
  </section>
  <section class="content">
    <div class="box">
      <form method="post" action="{{ route('adverts.store') }}" enctype="multipart/form-data">
        @csrf


    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
