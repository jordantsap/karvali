@extends('layouts.main')
@section('title', $grouptype->name.' '.__('head.groupcategory'))
@section('meta_description', $grouptype->name.' '.__('meta.groupcategorydescription'))
@section('meta_keywords', $grouptype->name.' '.__('meta.groupcategorykeywords'))

@section('content')
  <div id="groups">
   <div class="container">
       <div class="row">
       <h1 class="">{{ __('page.venues') }}</h1>
       <nav class="navbar">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#grouptype-collapse"
         aria-expanded="false">
         <span class="">{{__('page.categories')}}</span>
         <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
       </button>
         <div class="row">
           <ul class="nav navbar-nav collapse navbar-collapse" id="grouptype-collapse">
             @foreach($grouptypes as $grouptype)
               <li><a href="{{ route('venues-category', $grouptype->slug)}}" class="">{{ $grouptype->name }}&nbsp<span class="badge">{{$grouptype->groups->where('active',1)->count()}}</span>
               </a></li>
             @endforeach
             <li>
               <script>
                 document.write('<a href="' + document.referrer + '">{{__('page.backlink')}}</a>');
               </script>
             </li>
           </ul>
         </div>
     </nav>
     <div class="divider"></div>

       <div class="row">
         @if(count($groups) > 0)
           @foreach ($groups as $group)
             <div class="col-xs-12 col-sm-4 portfolio-item">
           <div class="card h-100">
             <a href="{{ route('group',$group->slug) }}">
               <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="{{ asset('images/venues/'.$group->logo) }}" alt="{{ $group->title }}">
             </a>
           </div>
             <div class="card-body text-center">
               <h2 class="card-title">
                 <a href="{{ route('group',$group->slug) }}">{{ Str::limit($group->title, 20) }}</a>
               </h2>
               <div class="row" id="likecomment">
                 <div class="col-xs-12"><h3><b>{{ __('page.category') }}</b> <a href="{{ route('venues-category', $group->category->slug)}}">{{$group->category->name}}</a></h3></div>
               </div>
               <div class="row">
                 <div class="col-xs-6">
                   <i class="fa fa-3x fa-thumbs-up"></i><span class="badge">{{$group->likes->count()}}</span>
                 </div>
                 <div class="col-xs-6">
                   <i class="fa fa-3x fa-comment"></i><span class="badge">{{$group->comments->count()}}</span>
                 </div>
               </div>
             </div>
         </div>

        @endforeach
     @else
       <div class="col-xs-12 noresults">
         <h1><b>{{__('page.noresults')}}</b></h1>
       </div>
     @endif

       </div>

      <div class="col-xs-9">
      	{{ $groups->links() }}
      </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
@endsection
