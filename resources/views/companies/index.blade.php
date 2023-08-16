@extends('layouts.main')
@section('title', __('head.companiespagetitle'))
@section('meta_description', __('meta.companiespagedescription'))
@section('meta_keywords', __('meta.companiespagekeywords'))

@section('content')
    <!-- Page Content -->
    <div id="companies">
        <div class="container">
            <div class="row">
                <h1 class="">{{ __('page.companies') }}</h1>
                <nav class="navbar">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#companytype-collapse" aria-expanded="false">
                        <span class="">{{ __('page.categories') }}</span>
                        <span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>
                    </button>
                    <!-- List group -->
                    <div class="row">
                        <ul class="nav navbar-nav collapse navbar-collapse" id="companytype-collapse">
                            @foreach ($companytypes as $companytype)
                                <li>
                                    <a href="{{ route('front.companies-category', $companytype->slug) }}"
                                        class="">{{ $companytype->title }}&nbsp<span
                                            class="badge">{{ $companytype->companies->where('active', 1)->count() }}</span>
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <script>
                                    document.write('<a href="' + document.referrer + '">{{ __('page.backlink') }}</a>');
                                </script>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="divider"></div>

                <div class="row">
                    @if (count($companies) > 0)
                        @foreach ($companies as $company)
                            <div class="col-xs-12 col-sm-4 col-md-3 portfolio-item">
                                <div class="card h-100">
                                    <a href="{{ route('front.company', $company->slug) }}">
                                        <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;"
                                            src="{{ asset($company->logo) }}"
                                            alt="{{ $company->title }}">
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h2 class="card-title">
                                        <a
                                            href="{{ route('front.company', $company->slug) }}">{{ Str::limit($company->title, 20) }}</a>
                                    </h2>
                                    <div class="row" id="likecomment">
                                        <div class="col-xs-6 text-center">
                                            <i class="fa fa-3x fa-thumbs-up"></i><span
                                                class="badge">{{ $company->likes->count() }}</span>
                                        </div>
                                        <div class="col-xs-6 text-center">
                                            <i class="fa fa-3x fa-comment"></i><span
                                                class="badge">{{ $company->comments->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h3><b>{{ __('page.category') }}</b> <a
                                                    href="{{ route('front.companies-category', $company->category->slug) }}">{{ $company->category->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
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
                    {{ $companies->links() }}
                </div>

            </div>
            <!-- /.row -->


        </div>
        <!-- /.container -->
    </div>
    <br>
@endsection
