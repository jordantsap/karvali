<div id="bottom" style="background-color:#262626;">
	<div class="container" style="position:relative;">
		<div class="row">
      <div class="col-sm-6 col-md-3">
				<div class="panel panel-none">
					<!-- Default panel contents -->
					<div class="panel-heading">{{ __('bottom.karvali') }}</div>
          <div class="divider"></div>
					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item"><a href="{{route('privacy')}}">{{ __('page.privacy') }}</a></li>
						<li class="list-group-item"><a href="{{route('personaldata')}}">{{ __('page.personaldata') }}</a></li>
						<li class="list-group-item"><a href="{{route('about')}}">{{ __('bottom.aboutus') }}</a></li>
						<li class="list-group-item"><a href="{{route('termsofuse')}}">{{ __('bottom.termsofuse') }}</a></li>
            <li class="list-group-item"><a href="{{ route('online-cameras') }}">{{ __('bottom.cameras') }}</a></li>
            <li class="list-group-item"><a href="{{ route('news')  }}">{{ __('bottom.posts') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="panel panel-none">
					<!-- Default panel contents -->
					<div class="panel-heading">{{ __('bottom.support') }}</div>
          <div class="divider"></div>
					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item"><a href="{{route('howto')}}">{{ __('page.howto') }}</a></li>
            <li class="list-group-item"><a href="{{route('contact')}}">{{ __('bottom.contact') }}</a></li>
            <li class="list-group-item"><a href="">{{ __('bottom.userhelp') }}</a></li>
						<li class="list-group-item"><a href="">{{ __('bottom.customerhelp') }}</a></li>
						<li class="list-group-item"><a href="{{route('services')}}">{{ __('page.services') }}</a></li>
						<li class="list-group-item"><a href="">{{ __('bottom.sitemap') }}</a></li>
					</ul>
				</div>
        <br>
			</div>
      <br>
			<div id="newsletters" class="col-sm-6 col-md-3">
        <br>
				<form action="{{route('subscribers.store')}}" method="post">
				{{ csrf_field() }}
				<div class="form-title">{{ __('bottom.newsletterheader') }}</div>
        {{-- <div class="divider"></div> --}}
        <br>
					<div class="form-group">
						<label for="name">{{ __('form.name') }}</label>
						<input type="text" class="form-control" name="name" id="subname" placeholder="Name" required>
					</div>
					<div class="form-group">
						<label for="email">{{ __('form.email') }}</label>
						<input type="email" class="form-control" name="email" id="subemail" placeholder="Email" required>
					</div>
          <br>
					<button id="btn" type="submit" class="btn btn-info btn-block">{{ __('bottom.newslettersubscribe') }}</button>
				</form>
			</div>
		</div>
    {{-- row --}}
	</div>
  {{-- container --}}
</div>
{{-- id --}}
