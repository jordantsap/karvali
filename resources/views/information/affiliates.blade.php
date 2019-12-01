@extends('layouts.main')
@section('title', 'Συνεργάτες')
@section('meta_description', __('meta.affiliatespage'))
@section('meta_keywords', 'Companies,')

@section('content')
  <!-- Page Content -->
   <div class="container">
     <div id="affiliates">
     <!-- Page Heading -->
     <h1 class="text-center">Συνεργάτες</h1>
     <div class="divider"></div>
     <br>
     <!-- Project One -->
     <div class="row">
      @include('information.sidebar')
       <div class="col-xs-10">

        </div>

       </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
@endsection
