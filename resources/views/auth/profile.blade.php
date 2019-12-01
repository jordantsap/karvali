@extends('layouts.user')
@section('title', 'Προφίλ Χρήστη ' . Auth::user()->name)
@section('keywords')
@section('description')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('auth.sidebar')
    <div class="col-xs-10">
      {{--dd(auth()->user())--}}
      <div class="panel panel-default">
        <div class="panel-heading">Προφίλ χρήστη - Αλλαγή στοιχείων</div>

        <div class="panel-body">
          <form action="{{route('profile.update')}}" method="POST" id="profile-update">
            {{csrf_field()}}
            {{-- <input name="_method" type="hidden" value="PUT"> --}}

           <div class="col-xs-6">
             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
               <label for="name" class="control-label text-center">Όνομα Χρήστη:</label>
               @if ($errors->has('name'))
                 <strong class="text-danger">{{ $errors->first('name') }}</strong>
               @endif
               <div class="">
                 <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" placeholder="Όνομα Χρήστη">
               </div>
             </div>
           </div>

           <div class="col-xs-6">
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <label for="email" class="control-label text-center">Email:</label>
               @if ($errors->has('email'))
                 <strong class="text-danger">{{ $errors->first('email') }}</strong>
               @endif
               <div class="">
                 <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" placeholder="Email">
               </div>
             </div>
           </div>

           <div class="col-xs-6">
             <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
               <label for="firstname" class="control-label text-center">Όνομα:</label>
               @if ($errors->has('firstname'))
                 <strong class="text-danger">{{ $errors->first('firstname') }}</strong>
               @endif
               <div class="">
                 <input type="text" value="{{ Auth::user()->firstname }}" class="form-control" name="firstname" placeholder="Ονομα">
               </div>
             </div>
           </div>

           <div class="col-xs-6">
             <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
               <label for="lastname" class="control-label text-center">Επίθετο:</label>
               @if ($errors->has('lastname'))
                 <strong class="text-danger">{{ $errors->first('lastname') }}</strong>
               @endif
               <div class="">
                 <input type="text" value="{{ Auth::user()->lastname }}" class="form-control" name="lastname" placeholder="Επίθετο">
               </div>
             </div>
           </div>

           <div class="col-xs-6">
             <div class="form-group{{ $errors->has('facebookid') ? ' has-error' : '' }}">
               <label for="facebookid" class="control-label text-center">Facebook id:</label>
               @if ($errors->has('facebookid'))
                 <strong class="text-danger">{{ $errors->first('facebookid') }}</strong>
               @endif
               <div class="">
                 <input type="text" value="{{ Auth::user()->facebookid }}" class="form-control" name="facebookid" placeholder="Facebook id">
               </div>
             </div>
           </div>

           <div class="col-xs-6">
             <div class="form-group{{ $errors->has('twitterid') ? ' has-error' : '' }}">
               <label for="twitterid" class="control-label text-center">Twitter id:</label>
               @if ($errors->has('twitterid'))
                 <strong class="text-danger">{{ $errors->first('twitterid') }}</strong>
               @endif
               <div class="">
                 <input type="text" value="{{ Auth::user()->twitterid }}" class="form-control" name="twitterid" placeholder="Twitter id">
               </div>
             </div>
           </div>

           <div class="col-xs-12">
             <button type="submit" id="profile-update" class="btn btn-default btn-block">Αποθήκευση Αλλαγών</button>
           </div>
         </form>
        </div>

      </div>
    </div>
  </div>
</div>
<br>
@endsection
