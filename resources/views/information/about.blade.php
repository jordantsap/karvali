@extends('layouts.main')
@section('title', 'Σχετικά')
@section('meta_description', __('meta.aboutpage'))
@section('meta_keywords', 'About us,')

@section('content')
  <!-- Page Content -->
   <div class="container">
     <div id="">
     <!-- Page Heading -->
     <h1 class="text-center">{{ __('page.aboutus') }}</h1>
     <div class="divider"></div>
     <br>
     <!-- Project One -->
     <div class="row">
      @include('information.sidebar')
       <div class="col-xs-10">
        <img width="100%" src="{{asset('images/under_construction.gif')}}" alt="">
        </div>

       </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
@endsection
