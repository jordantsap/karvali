@extends('layouts.main')
@section('title', 'Πως Λειτουργεί')
@section('description', __('meta.howtopage'))
@section('keywords', '')

@section('content')
  <!-- Page Content -->
   <div class="container">
     <div id="howto">
     <!-- Page Heading -->
     <h1 class="text-center">Πως Λειτουργεί</h1>
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
