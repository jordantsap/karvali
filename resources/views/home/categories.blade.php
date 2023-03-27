<div class="container">
<section id="categories">
			<div class="row">
				<div class="col-xs-12">
          <div class="scroll-animation-in right">
  					<h2 class="animated tada text-center">{{ __('page.categoriesheader') }}</h2>
          </div>
					<div class="divider"></div>
					<br>
					<div class="col-xs-12">
						<div class="col-xs-3 text-center">
              <div class="animated slideInLeft">
                <h3>{{ __('page.companycategories') }}</h3>
              </div>
              @foreach ($companytypes as $companytype)
                <li class="list-group-item">
                  <a href="{{ route('companies-category', $companytype->slug)}}">
										<h4 class="animated slideInUp">{{$companytype->name}}</h4></a>
                </li>
              @endforeach
            </div>
						<div class="col-xs-3 text-center">
              <div class="scroll-animation-bounce">
                <h3 class="animated slideInDown">{{ __('page.groupcategories') }}</h3>
              </div>
              @foreach ($grouptypes as $grouptype)
                <li class="list-group-item">
                  <a href="{{ route('groups-category', $grouptype->slug)}}">
										<h4 class="animated slideInUp">{{$grouptype->name}}</h4></a>
                </li>
              @endforeach
            </div>
            <div class="col-xs-3 text-center">
              <div class="animated slideInRight">
                <h3>{{ __('page.productcategories') }}</h3>
              </div>
              @foreach ($producttypes as $producttype)
                <li class="list-group-item">
                  <a href="{{ route('products-category', $producttype->slug)}}"> <h4 class="animated slideInUp">{{$producttype->name}}</h4> </a>
                </li>
              @endforeach
            </div>
            <div class="col-xs-3 text-center">
              <div class="animated slideInRight">
                <h3>{{ __('page.events') }}</h3>
              </div>
              @foreach ($events as $event)
                <li class="list-group-item">
                  <a href="{{ route('event', $event->id)}}"> <h4 class="animated slideInUp">{{$event->title}}</h4> </a>
                </li>
              @endforeach
            </div>
					</div><!-- /.row -->
				</div>
			</div>
		</section>
		</div>
