<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-8" id="copyright">
			<p>This website is a ownership of... <a href="https://www.facebook.com/NeaKarvaliGuide/" target="_blank">Nea Karvali Community!</a></p>
			<p><?php echo e(config('app.name')); ?> - Copyright All rights reserved!</p>
			</div>
			<div class="pull-right" id="totop">
					<button onclick='window.scrollTo({top: 0, behavior: "smooth"});' id="topbtn" title="<?php echo e(__('page.gototop')); ?>"><?php echo e(__('page.gototop')); ?></button>
			</div>
		</div>
	</div>

</div>



<!-- Include all compiled plugins (below), or include individual files as needed -->


<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/theme.js')); ?>"></script>

<script src="<?php echo e(asset('js/lightbox.min.js')); ?>"></script>

<?php echo $__env->yieldContent('extra-js'); ?>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
<?php if(Session::has('message')): ?>
toastr.options.positionClass = 'toast-bottom-left';
toastr.options.timeOut = 5000;
toastr.options.extendedTimeOut = 400;
toastr.options.showMethod = 'slideDown','fadeIn';
toastr.options.hideMethod = 'slideUp','fadeOut';
toastr.options.showDuration = 600;
toastr.options.hideDuration = 600;
toastr.options.closeDuration = 400;
toastr.options.progressBar = true;

var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
switch(type){
    case 'info':
        toastr.info("<?php echo e(Session::get('message')); ?>");
        break;

    case 'warning':
        toastr.warning("<?php echo e(Session::get('message')); ?>");
        break;

    case 'success':
        toastr.success("<?php echo e(Session::get('message')); ?>");
        break;

    case 'error':
        toastr.error("<?php echo e(Session::get('message')); ?>");
        break;
    case 'danger':
        toastr.warning('We do have the Kapua suite available.', 'Turtle Bay Resort', 'dghsdfhsdhgd');
        break;

}
<?php endif; ?>
</script>
<?php /**PATH L:\2.2.drive\xampp\htdocs\karvali\resources\views/partials/footer.blade.php ENDPATH**/ ?>