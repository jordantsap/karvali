<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-8" id="copyright">
			<p>This website is a ownership of... <a href="https://www.facebook.com/NeaKarvaliGuide/" target="_blank">Nea Karvali Community!</a></p>
			<p>{{ config('app.name')}} - Copyright All rights reserved!</p>
			</div>
			<div class="pull-right" id="totop">
					<button onclick='window.scrollTo({top: 0, behavior: "smooth"});' id="topbtn" title="{{ __('page.gototop') }}">{{ __('page.gototop') }}</button>
			</div>
		</div>
	</div>

</div>

{{-- @include('modals.new') --}}

<!-- Include all compiled plugins (below), or include individual files as needed -->

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
{{-- <script src="{{ asset('js/animate.min.js') }}"></script> --}}
<script src="{{ asset('js/lightbox.min.js') }}"></script>

@yield('extra-js')

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
@if(Session::has('message'))
toastr.options.positionClass = 'toast-bottom-left';
toastr.options.timeOut = 5000;
toastr.options.extendedTimeOut = 400;
toastr.options.showMethod = 'slideDown','fadeIn';
toastr.options.hideMethod = 'slideUp','fadeOut';
toastr.options.showDuration = 600;
toastr.options.hideDuration = 600;
toastr.options.closeDuration = 400;
toastr.options.progressBar = true;

var type = "{{ Session::get('alert-type', 'info') }}";
switch(type){
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;

    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    case 'danger':
        toastr.warning('We do have the Kapua suite available.', 'Turtle Bay Resort', 'dghsdfhsdhgd');
        break;

}
@endif
</script>


<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
