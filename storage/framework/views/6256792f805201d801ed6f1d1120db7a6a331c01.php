
<?php $__env->startSection('title', __('head.thankyoupagetitle')); ?>
<?php $__env->startSection('meta_description', __('meta.thankyoupagedescription')); ?>
<?php $__env->startSection('meta_keywords', 'thank you order, product order confirmed,'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div class="container">
  <div id="pages">
    <div class="row text-center">
      
      <div class="col-xs-8 col-xs-offset-2">
        <div class="thank-you-section">
          <h1><?php echo e(__('cart.thankyoufor')); ?> <br> <?php echo e(__('cart.yourorder')); ?>!</h1>
          <p><?php echo e(__('cart.confirmemailsend')); ?></p>
        <div class="spacer"></div>
          <a class="btn btn-default btn-block" href="<?php echo e(url('/')); ?>" class="button"><?php echo e(__('cart.gotohomepage')); ?></a>
        </div>
      </div>

    </div>
  </div><br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\xampp\htdocs\karvali\resources\views/cart/thankyou.blade.php ENDPATH**/ ?>