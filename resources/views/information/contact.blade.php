@extends('layouts.main')
@section('title', __('head.contactheadtitle'))
@section('meta_description', __('meta.contactpagedescription'))
@section('meta_keywords', 'contact form, contact us, more info,')

@section('content')
	<div class="contact-img">
    <div class="container">
		  <div id="contact">
				<div class="row">
          <h1 class="text-center">{{ __('page.contactheader') }}</h1>
          <div class="divider"></div>
          <br>

           @include('information.sidebar')
            <div class="col-xs-10">
						<form action="{{ route('postContact') }}" method="post">
              {{ csrf_field() }}
							<div class="form-group">
								<label for="firstname">{{ __('page.contactname') }}</label>
								<input type="text" name="firstname" class="form-control" id="firstname" placeholder="{{ __('page.contactname') }}" required>
							</div>
							<div class="form-group">
								<label for="lastname">{{ __('page.contactlastname') }}</label>
								<input type="text" name="lastname" class="form-control" id="lastname" placeholder="{{ __('page.contactlastname') }}" required>
							</div>
              <div class="form-group">
								<label for="firstname">{{ __('page.contacttel') }}</label>
								<input type="text" name="telephone" class="form-control" id="telephone" placeholder="{{ __('page.contacttel') }}" required>
							</div>
              <div class="form-group">
								<label for="email">{{ __('page.contactemail') }}</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="{{ __('page.contactemail') }}" required>
							</div>
							<div class="form-group">
								<label for="message">{{ __('page.contactmessage') }}</label>
								<textarea name="message" class="form-control" rows="5" placeholder="{{ __('page.contactmessageplaceholder') }}" required></textarea>
							</div>
							<button type="submit" name="contact" id="btn" class="col-xs-12 btn btn-primary btn-lg">{{ __('page.contactbutton') }}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
@endsection
