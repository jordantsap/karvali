@extends('layouts.main')
@section('title', $accommodationType->title . ' '.__('head.companycategory'))
@section('meta_description', __('meta.companycategorydescription').' '.'$accommodationType->title')
@section('meta_keywords', '$accommodationType->title'.' '.__('meta.companycategorykeywords'))

@section('content')
    <!-- Page Content -->
    <div id="companies">
        <div class="container">
            <div class="row">
                <h1 class="">{{ __('page.accommodations') }}</h1>


                @include('accommodations.search')


                <nav class="navbar">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#companytype-collapse"
                            aria-expanded="false">
                        <span class="">{{__('page.categories')}}</span>
                        <span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>
                    </button>
                    <!-- List group -->
                    <div class="row">
                        <ul class="nav navbar-nav collapse navbar-collapse" id="companytype-collapse">
                            @foreach($accommodationTypes as $accommodationType)
                                <li>
                                    <a href="{{ route('front.accommodation-types.show', $accommodationType->slug)}}" class="">{{ $accommodationType->title }}&nbsp
                                        <span class="badge">{{$accommodationType->accommodations->where('active',1)->count()}}</span>
                                    </a>
                                </li>
                            @endforeach
                            <li><script>
                                    document.write('<a href="' + document.referrer + '">{{__('page.backlink')}}</a>');
                                </script></li>
                        </ul>
                    </div>
                </nav>
                <div class="divider"></div>

                <div class="row">
                    
                    @if($accommodations)
                    
                        @foreach ($accommodations as $accommodation)
                        
                            @if($accommodation->rooms->count() >= $requestCount)
                            <div class="col-xs-12 col-sm-4 col-md-3 portfolio-item">
                                <div class="card h-100">
                                    <a href="{{ route('front.accommodation.show',$accommodation->slug) }}">
                                        <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="{{ asset($accommodation->logo) }}" alt="{{ $accommodation->title }}">
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h2 class="card-title">
                                        <a href="{{ route('front.accommodation.show',$accommodation->slug) }}">{{ Str::limit($accommodation->title, 20) }}</a>
                                    </h2>
                                    <div class="">
                                        {{__('Available rooms: ') .$accommodation->rooms->count()}}
                                    </div>
                                    <div class="row" id="likecomment">
                                        <div class="col-xs-6 text-center">
                                            <i class="fa fa-3x fa-thumbs-up"></i><span class="badge">{{$accommodation->likes->count()}}</span>
                                        </div>
                                        <div class="col-xs-6 text-center">
                                            <i class="fa fa-3x fa-comment"></i><span class="badge">{{$accommodation->comments->count()}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <!-- <h3><b>{{ __('page.category') }}</b> <a href="{{ route('front.accommodation-types.show', $accommodation->accommodationType->slug)}}">
                                                    {{$accommodation->accommodationType->title}}
                                                </a></h3> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <br>
                        @if($flag == 0)
                        <div class="col-xs-12 noresults">
                            <h1><b>{{__('page.noresults')}}</b></h1>
                        </div>
                        @endif
                    @endif

                </div>


                <div class="col-xs-9">
                    {{ $accommodations->links() }}
                </div>

            </div>
            <!-- /.row -->


        </div>
        <!-- /.container -->
    </div>
    <br>
@endsection
