
<?php $__env->startSection('title', __('head.cameraspagetitle')); ?>
<?php $__env->startSection('meta_keywords', __('meta.cameraspagekeywords')); ?>
<?php $__env->startSection('meta_description', __('meta.cameraspagedescription')); ?>
<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div class="container">
  <div id="cameras">
    <!-- Page Heading -->
    <h1 class="text-center"><?php echo e(__('page.cameras')); ?></h1>
    <div class="divider"></div>
    <br>
    <div class="row">
      <?php echo $__env->make('information.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="col-xs-10">
        <img width="100%" src="<?php echo e(asset('images/under_construction.gif')); ?>" alt="">
        
      </div>

    </div>
  </div>
</div>
<br> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/information/cameras.blade.php ENDPATH**/ ?>