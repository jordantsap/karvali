@extends('layouts.main')
@section('title', __('head.hotelspagetitle'))
@section('meta_description', __('meta.hotelspagedescription'))
@section('meta_keywords', __('meta.hotelspagekeywords'))

@section('content')
    <!-- Page Content -->
    <div id="companies">
        <div class="container">
            <div class="row">
                <h1 class="">{{ __('page.hotels') }}</h1>

{{--                <nav class="navbar">--}}
{{--                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
{{--                        data-target="#companytype-collapse" aria-expanded="false">--}}
{{--                        <span class="">{{ __('page.categories') }}</span>--}}
{{--                        <span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>--}}
{{--                    </button>--}}
{{--                    <!-- List group -->--}}
{{--                    <div class="row">--}}
{{--                        <ul class="nav navbar-nav collapse navbar-collapse" id="companytype-collapse">--}}
{{--                            @foreach ($companytypes as $companytype)--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('companies-category', $companytype->slug) }}"--}}
{{--                                        class="">{{ $companytype->name }}&nbsp<span--}}
{{--                                            class="badge">{{ $companytype->companies->where('active', 1)->count() }}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                            <li>--}}
{{--                                <script>--}}
{{--                                    document.write('<a href="' + document.referrer + '">{{ __('page.backlink') }}</a>');--}}
{{--                                </script>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </nav>--}}
                <div class="divider"></div>

                <div class="row">
                    @if (count($hotels) > 0)
                        @foreach ($hotels as $hotel)
                            <div class="col-xs-12 col-sm-4 col-md-3 portfolio-item">
                                <div class="card h-100">
                                    <a href="{{ route('hotels.show', $hotel->slug) }}">
                                        <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;"
                                            src="{{ asset('images/companies/' . $hotel->logo) }}"
                                            alt="{{ $hotel->title }}">
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h2 class="card-title">
                                        <a
                                            href="{{ route('hotels.show', $hotel->slug) }}">{{ Str::limit($hotel->title, 20) }}</a>
                                    </h2>
                                    <div class="row" id="likecomment">
                                        <div class="col-xs-6 text-center">
                                            <i class="fa fa-3x fa-thumbs-up"></i>
                                            <span class="badge">{{ count($hotel->likes) }}</span>
                                        </div>
                                        <div class="col-xs-6 text-center">
                                            <i class="fa fa-3x fa-comment"></i>
                                            <span class="badge">{{ count($hotel->comments) }}</span>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-xs-12">--}}
{{--                                            <h3><b>{{ __('page.category') }}</b> <a--}}
{{--                                                    href="{{ route('companies-category', $hotel->category->slug) }}">{{ $hotel->category->name }}</a>--}}
{{--                                            </h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        @endforeach
                        <br>
                    @else
                        <div class="col-xs-12 noresults">
                            <h1><b>{{ __('page.noresults') }}</b></h1>
                        </div>
                    @endif

                </div>


                <div class="col-xs-9">
                    {{ $hotels->links() }}
                </div>

            </div>
            <!-- /.row -->


        </div>
        <!-- /.container -->
    </div>
    <br>
@endsection
