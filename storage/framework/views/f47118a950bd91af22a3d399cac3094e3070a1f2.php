
<?php $__env->startSection('title', 'Πως Λειτουργεί'); ?>
<?php $__env->startSection('description', __('meta.howtopage')); ?>
<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('content'); ?>
  <!-- Page Content -->
   <div class="container">
     <div id="howto">
     <!-- Page Heading -->
     <h1 class="text-center">Πως Λειτουργεί</h1>
     <div class="divider"></div>
     <br>
     <!-- Project One -->
     <div class="row">
      <?php echo $__env->make('information.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="col-xs-10">

        </div>

       </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\2.2.drive\xampp\htdocs\karvali\resources\views/information/howto.blade.php ENDPATH**/ ?>