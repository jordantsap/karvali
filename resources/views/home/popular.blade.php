<section id="popular">
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="col-xs-10 col-xs-offset-2 bg-info">
        <div class="col-xs-12">
          <h1 class="page-header">{{ __('page.popularheader') }}</h1></div>
      </div>
    </div>

    <aside class="col-xs-2">
      <ul class="bg-info nav nav-tabs nav-stacked" role="tablist">
        <li role="presentation" class="list-group-item bg-info"><i class="animated infinite pulse fas fa-3x fa-fire"></i>
          <h3 class="animated tada delay-1s text-center">{{__('page.popularheader')}}</h3>
        </li>
        <li role="presentation" class="">
          <a href="#companiestab" aria-controls="home" role="tab" data-toggle="tab">{{ __('page.popularcompanies') }}</a>
        </li>
        <li role="presentation">
          <a href="#groupstab" aria-controls="profile" role="tab" data-toggle="tab">{{ __('page.populargroups') }}</a>
        </li>
        <li role="presentation">
          <a href="#productstab" aria-controls="messages" role="tab" data-toggle="tab">{{ __('page.popularproducts') }}</a>
        </li>
        <li role="presentation">
          <a href="#eventstab" aria-controls="settings" role="tab" data-toggle="tab">{{ __('page.popularevents') }}</a>
        </li>
      </ul>
    </aside>

    <div class="col-xs-10 bg-info">
      <!-- Tab panes -->
      <div class="tab tab-content">
        <div role="tabpanel" class="tab-pane active" id="companiestab">
          <div class="col-xs-12">

            <h2>{{ __('page.companies') }}</h2>
            <div class="divider"></div>
            <br>
            <div class="row">
              @foreach ($companies as $company)
              <div class="col-xs-12 col-sm-6 col-md-3 portfolio-item">
                <div class="card h-100">
                  <a href="{{ route('company',$company->slug) }}">
                    <img class="img-responsive img-fluid rounded" style="width:100%;height:200px;" src="{{ asset('images/companies/'.$company->logo) }}"
                      alt="{{ $company->title }}">
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                      <a href="{{ route('company',$company->slug) }}">{{ str_limit($company->title, 15) }}</a>
                    </h4>
                  <div class="row" id="likecomment">
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-thumbs-up"></i>
                      <span class="badge">{{$company->likes->count()}}</span>
                    </div>
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-comment"></i>
                      <span class="badge">{{$company->comments->count()}}</span>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12"><b>{{ __('page.category') }}</b>
                      <a href="{{ route('companies-category', $company->category->slug)}}">{{$company->category->name}}</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <!-- /.row -->
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="groupstab">
          <div id="">
            <div class="">
              <div class="">
                <div class="col-xs-12">

                  <h2>{{ __('page.groups') }}</h2>
                  <div class="divider"></div>
                  <br>
                  <div class="row">
                    @foreach ($groups as $group)
                      <div class="col-xs-12 col-sm-6 col-md-3 portfolio-item">
                        <div class="card h-100">
                          <a href="{{ route('group',$group->slug) }}">
                            <img class="img-responsive img-fluid rounded" style="width:100%;height:200px;" src="{{ asset('images/groups/'.$group->logo) }}"
                              alt="{{ $group->title }}">
                          </a>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">
                            <a href="{{ route('group',$group->slug) }}">{{ str_limit($group->title, 15) }}</a>
                          </h4>
                          <div class="row" id="likecomment">
                            <div class="col-xs-6 text-center">
                              <i class="fas fa-2x fa-thumbs-up"></i>
                              <span class="badge">{{$group->likes->count()}}</span>
                            </div>
                            <div class="col-xs-6 text-center">
                              <i class="fas fa-2x fa-comment"></i>
                              <span class="badge">{{$group->comments->count()}}</span>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-xs-12"><b>{{ __('page.category') }}</b>
                              <a href="{{ route('groups-category', $group->category->slug)}}">{{$group->category->name}}</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      @endforeach

                  </div>
                </div>

              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="productstab">
          <div class="col-xs-12">
            <!-- Page Heading -->
            <h2>{{ __('page.products') }}</h2>
            <div class="divider"></div>
            <br>
            <div class="row">
              @foreach ($products as $product)
              <div class="col-xs-12 col-sm-6 col-md-3 portfolio-item">
                <div class="card h-100">
                  <a href="{{ route('product',$product->slug) }}">
                    <img class="img-responsive img-fluid rounded" style="width:100%;height:200px;" src="{{ asset('images/products/'.$product->logo) }}"
                      alt="{{ $product->title }}">
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                          <a href="{{ route('product',$product->slug) }}">{{ str_limit($product->title, 15) }}</a>
                        </h4>
                  <div class="row" id="likecomment">
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-thumbs-up"></i>
                      <span class="badge">{{$product->likes->count()}}</span>
                    </div>
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-comment"></i>
                      <span class="badge">{{$product->comments->count()}}</span>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12">
                      <b>{{ __('page.category') }}</b>
                      <a href="{{ route('products-category', $product->category->slug)}}">{{$product->category->name}}</a>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12"><b>{{ __('page.company') }}</b>
                      <a href="{{route('company', $product->company->slug)}}">
                        {{str_limit($product->company->title, 10)}}</a>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12">
                      <b>{{ __('page.price') }}</b>{{ $product->price }}€</div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="eventstab">
          <div id="">
            <div class="col-xs-12">
              <div class="">
                <h2>  {{ __('page.events') }}</h2>
                <div class="divider"></div>
                <br>
                <div class="row">
                  @foreach ($events as $event)
                    <div class="col-xs-6 col-sm-3 portfolio-item">
                      <a href="{{ route('event',$event->slug) }}">
                        <img class="img-responsive img-fluid rounded" src="{{ asset('images/events/'.$event->logo) }}" style="width:100%;height:200px"
                          alt="{{$event->title}}">
                      </a>
                      <h4 class="card-title"><a href="{{ route('event',$event->slug) }}">{{ str_limit($event->title, 15) }}</a></h4>
                      <div class="row" id="likecomment">
                        <div class="col-xs-6 text-center">
                          <i class="fas fa-2x fa-thumbs-up"></i>
                          <span class="badge">{{$event->likes->count()}}</span>
                        </div>
                        <div class="col-xs-6 text-center">
                          <i class="fas fa-2x fa-comment"></i>
                          <span class="badge">{{$event->comments->count()}}</span>
                        </div>
                      </div>
                      <br>

                      <div>{!!str_limit($event->description, 50) !!}</div>
                      <br>
                      <a class="btn btn-primary btn-block" href="{{ route('event',$event->slug) }}">{{ __('page.viewevent') }}
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
