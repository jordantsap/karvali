<section id="intro">
  <div class="container">
    <div class="row">
      <div class="simpleslide100">
        <div class="simpleslide100-item bg-img1" style="background-image: url('{{asset('images/panoramiki.JPEG')}}');background-size: 100% 100%;"></div>
        <div class="simpleslide100-item bg-img1" style="background-image: url('{{asset('images/ekklisia.JPEG')}}');background-size: 100% 100%;"></div>
    		<div class="simpleslide100-item bg-img1" style="background-image: url('{{asset('images/akontisma.JPEG')}}');background-size: cover;"></div>
        <div class="simpleslide100-item bg-img1" style="background-image: url('{{asset('images/paralia.JPEG')}}');background-size: 100% 100%;"></div>
	    </div>
      @include('home.advert')
      @include('home.form')
    </div>
  </div>
</section>
