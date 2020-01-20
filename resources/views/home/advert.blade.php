{{-- @if ( ! count($adverts) )

  <div id="advert">
    <div class="container">
      <div class="row">
        <div id="home-carousel" class="carousel slide" data-interval="3300" data-pause="null" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
              @foreach ($posts->chunk(1) as $key => $chunk)
                <div class="item @if ($key == 0)
                  {{'active'}}
                @endif">
                  @foreach ($chunk as $post)
                    <div class="col-xs-12 col-md-5 animated wobble">
                      <a href="{{route('news.show', $post->slug)}}">
                        <img class="img-rounded" width="100%" height="300px" src="{{asset('images/posts/'.$post->image)}}" alt="{{$post->title}}">
                      </a>
                    </div>
                    <div class="col-xs-12 col-md-7">
                      <br>
                      <div class="col-xs-12 bg-info img-rounded">
                        <h2><a class="animated bounceInDown delay-1s faster" style="color:#000;" href="{{ route('news.show',$post->slug) }}">{{ str_limit($post->title, 30) }}</a></h2>
                        <h3 class="animated bounceInUp">{!! str_limit($post->description, 200) !!}</h3>
                        <br>
                      </div>
                    </div>
                    @endforeach
                </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  @else --}}

    <div id="advert">
      <div class="container">
        <div class="row">
          <div id="home-carousel" class="carousel slide" data-pause="null" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <div class="col-xs-4">
                  <a href="" title="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="" title="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="" title="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
              </div>
              {{-- chuck(3) end here --}}
              <div class="item">
                <div class="col-xs-4">
                  <a href="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
              </div>
              <div class="item">
                <div class="col-xs-4">
                  <a href="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a href="">
                    <img width="100%" height="300px" src="{{asset('images/noimage.jpg')}}" alt="no image alt">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
{{-- @endif --}}
