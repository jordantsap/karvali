<section id="home-blog">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="col-xs-12">
        <h1 class="text-center">{{ __('page.homeposts') }}</h1>
        <div class="divider"></div>
        <br>
        @foreach ($posts as $post)
        <div class="col-xs-12 col-sm-3">
          <a href="{{ route('news.show',$post->slug) }}">
            <img class="" width="100%" height="250px" src="{{ asset('images/posts/'.$post->image) }}" alt="{{ $post->title }}">
          </a>
          <h2><a class="" style="color:#000;" href="{{ route('news.show',$post->slug) }}">{{ str_limit($post->title, 18) }}</a></h2>
          <h3 class="">{!! str_limit($post->description, 40) !!}</h3>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- <a href="post" class="btn btn-default btn-lg btn-block" role="button">View All</a> --}}
</section>
