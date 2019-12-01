{{-- <section id="tags">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 scroll-animation-in-left">
        <h1 class="animated text-center">{{ __('page.tagsheader') }}</h1>
        <div class="divider"></div>
        <br>
        <ul class="nav nav-tabs nav-justified">
          @foreach ($tags as $tag )
            <a id="btn" class="btn btn-primary" style="margin-bottom:10px;" href="{{route('tags.show',$tag->slug)}}">{{$tag->name}}</a>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section> --}}

<section id="categories" style="background-color:#ffffff !important;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
          <div class="scroll-animation-in-right">
  					<h1 class="animated text-center">{{ __('page.categoriesheader') }}</h1>
          </div>
					<div class="divider"></div>
					<br>
					<div class="row">
						<div class="col-xs-4">
              <div class="scroll-animation-bounce-in-down">
                <h2 class="animated">{{ __('page.companycategories') }}</h2>
              </div>
              @foreach ($companytypes as $category)
                <li class="scroll-animation-in-left faster list-group-item">
                  <a class="animated" href="{{ route('companies-category', $category->slug)}}">{{$category->name}}</a>
                </li>
              @endforeach
            </div>
            <div class="col-xs-4">
              <div class="scroll-animation-bounce">
                <h2 class="animated">{{ __('page.groupcategories') }}</h2>
              </div>
              @foreach ($grouptypes as $category)
                <li class="scroll-animation-in-right fast list-group-item">
                  <a class="animated" href="{{ route('groups-category', $category->slug)}}">{{$category->name}}</a>
                </li>
              @endforeach
            </div>
            <div class="col-xs-4">
              <div class="scroll-animation-bounce-in-up">
                <h2 class="animated">{{ __('page.productcategories') }}</h2>
              </div>
              @foreach ($producttypes as $category)
                <li class="scroll-animation-bounce-in-up faster list-group-item">
                  <a class="animated" href="{{ route('products-category', $category->slug)}}">{{$category->name}}</a>
                </li>
              @endforeach
            </div>
					</div><!-- /.row -->
				</div>
			</div>
		</div>
	</section>
