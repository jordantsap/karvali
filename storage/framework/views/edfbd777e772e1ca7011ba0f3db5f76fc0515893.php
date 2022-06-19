<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
<body>

  

  <?php echo $__env->make('partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->startSection('content'); ?>
  <?php echo $__env->yieldSection(); ?>

  <?php echo $__env->make('partials.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH L:\wamp64\www\karvali\resources\views/layouts/user.blade.php ENDPATH**/ ?>