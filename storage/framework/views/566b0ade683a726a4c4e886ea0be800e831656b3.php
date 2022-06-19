<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $__env->make('admin.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
	<?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('admin.layouts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->startSection('content'); ?>
		<?php echo $__env->yieldSection(); ?>
	<?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('admin/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
<?php if(Session::has('message')): ?>
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
}
<?php endif; ?>
</script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('admin/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin/dist/js/app.min.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

<script>
var url = window.location;

$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');

$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active');
</script>

</body>
</html>
<?php /**PATH L:\wamp64\www\karvali\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>