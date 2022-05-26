<section id="intro">
  <div class="container">
    <div class="row">
      <div class="simpleslide100">
        <div class="simpleslide100-item bg-img1" style="background-image: url('<?php echo e(asset('images/panoramiki.JPEG')); ?>');background-size: 100% 100%;"></div>
        <div class="simpleslide100-item bg-img1" style="background-image: url('<?php echo e(asset('images/ekklisia.JPEG')); ?>');background-size: 100% 100%;"></div>
    		<div class="simpleslide100-item bg-img1" style="background-image: url('<?php echo e(asset('images/akontisma.JPEG')); ?>');background-size: cover;"></div>
        <div class="simpleslide100-item bg-img1" style="background-image: url('<?php echo e(asset('images/paralia.JPEG')); ?>');background-size: 100% 100%;"></div>
	    </div>
      <?php echo $__env->make('home.advert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('home.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</section>
<?php /**PATH L:\2.2.drive\xampp\htdocs\karvali\resources\views/home/intro.blade.php ENDPATH**/ ?>