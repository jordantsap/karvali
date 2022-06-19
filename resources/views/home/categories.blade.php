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
              @foreach ($companytypes as $category)
                <li class="list-group-item">
                  <a href="{{ route('companies-category', $category->slug)}}">
										<h4 class="animated slideInUp">{{$category->name}}</h4></a>
                </li>
              @endforeach
            </div>
						<div class="col-xs-3 text-center">
              <div class="scroll-animation-bounce">
                <h3 class="animated slideInDown">{{ __('page.groupcategories') }}</h3>
              </div>
              @foreach ($grouptypes as $category)
                <li class="list-group-item">
                  <a href="{{ route('groups-category', $category->slug)}}">
										<h4 class="animated slideInUp">{{$category->name}}</h4></a>
                </li>
              @endforeach
            </div>
            <div class="col-xs-3 text-center">
              <div class="animated slideInRight">
                <h3>{{ __('page.productcategories') }}</h3>
              </div>
              @foreach ($producttypes as $category)
                <li class="list-group-item">
                  <a href="{{ route('products-category', $category->slug)}}"> <h4 class="animated slideInUp">{{$category->name}}</h4> </a>
                </li>
              @endforeach
            </div>
            <div class="col-xs-3 text-center">
              <div class="animated slideInRight">
                <h3>{{ __('page.events') }}</h3>
              </div>
              @foreach ($events as $event)
                <li class="list-group-item">
                  <a href="{{ route('event', $event->slug)}}"> <h4 class="animated slideInUp">{{$event->title}}</h4> </a>
                </li>
              @endforeach
            </div>
					</div><!-- /.row -->
				</div>
			</div>
		</section>
		</div>
