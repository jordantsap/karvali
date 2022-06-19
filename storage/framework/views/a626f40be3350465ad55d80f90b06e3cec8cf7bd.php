
<?php $__env->startSection('title', __('head.galleries')); ?>
<?php $__env->startSection('meta_description', __('meta.albumspagedescription')); ?>
<?php $__env->startSection('meta_keywords', __('meta.albumspagekeywords')); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="albums">
<div class="container">
    <div class="row">
      <h1 class=""><?php echo e(__('page.galleries')); ?></h1>

      <div class="divider"></div>

      <div class="row">
        <?php if(count($albums) > 0): ?> <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-12 col-sm-6 portfolio-item">
          <div class="card-body">
            <h2 class="card-title text-center">
              <?php echo e(Str::limit($album->title, 50)); ?>

            </h2>
              <a href="<?php echo e(route('gallery',$album->slug)); ?>">
                <img class="img-responsive img-fluid rounded" style="width:100%;height:250px;" src="<?php echo e(asset('images/albums/'.$album->cover_image)); ?>" alt="<?php echo e($album->alt); ?>">
              </a>
            <div class="row">
              <div class="col-xs-12 text-center">
                <h3><b><?php echo e(__('page.description')); ?>:</b>
                <div class="divider"></div>
                <br>
                <?php echo e(Str::limit($album->description, 100)); ?></h3>
              </div>
            </div>
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
        <div class="col-xs-12 noresults">
          <h1><b><?php echo e(__('page.noresults')); ?>!</b></h1>
        </div>
        <?php endif; ?>

      </div>

      <div class="col-xs-9">
        <?php echo e($albums->links()); ?>

      </div>

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->
</div>
<br> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/albums/index.blade.php ENDPATH**/ ?>