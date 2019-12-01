
<?php $__env->startSection('title', 'Σχετικά'); ?>
<?php $__env->startSection('meta_description', __('meta.aboutpage')); ?>
<?php $__env->startSection('meta_keywords', 'About us,'); ?>

<?php $__env->startSection('content'); ?>
  <!-- Page Content -->
   <div class="container">
     <div id="">
     <!-- Page Heading -->
     <h1 class="text-center"><?php echo e(__('page.aboutus')); ?></h1>
     <div class="divider"></div>
     <br>
     <!-- Project One -->
     <div class="row">
      <?php echo $__env->make('information.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="col-xs-10">
        <img width="100%" src="<?php echo e(asset('images/under_construction.gif')); ?>" alt="">
        </div>

       </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/karvali/resources/views/information/about.blade.php ENDPATH**/ ?>