
<?php $__env->startSection('title', $album->title ); ?>
<?php $__env->startSection('meta_description', $album->meta_description); ?>
<?php $__env->startSection('meta_keywords', $album->meta_keywords); ?>

<?php $__env->startSection('content'); ?>
  <img src="<?php echo e(asset('images/albums/'.$album->cover_image)); ?>" alt="<?php echo e($album->alt); ?>" width="100%" height="300px">
  <div class="container">
    <div id="album">
      <div class="row text-center">
        <div class="col-xs-12">
          <h1><?php echo e($album->title); ?></h1>
          <div class="divider"></div><br>
        </div>
        <div class="col-xs-12">
          <div class="panel panel-primary">
            <div class="panel-heading"><?php echo e(__('single.description')); ?></div>
            <div class="panel-body">
              <?php echo $album->description; ?>

            </div>
          </div>
        </div>

      </div>
      <div class="row text-center social-links">
        <h3 class="col-xs-12">Διαδώστε το!: </h3>
        <div class="sharethis-inline-share-buttons"></div>
      </div>

      <div class="row"><br>

        <div class="col-xs-12">
          <h1 class="text-center"><?php echo e(__('single.photosheader')); ?> <?php echo e($album->title); ?></h1>
          <div class="divider"></div><br>
        </div>

        <?php if(count($album->photos->where('active',1)) > 0): ?>
          <?php $__currentLoopData = $album->photos->where('active',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-3" style="margin-bottom:20px;">
                <a data-lightbox="albumphoto" data-title="<?php echo e($photo->title); ?>" data-alt="<?php echo e($photo->alt); ?>" href="<?php echo e(asset('images/albumphotos/'.$photo->file)); ?>">
                <img src="<?php echo e(asset('images/albumphotos/'.$photo->file)); ?>" width="100%" height="200px" alt="<?php echo e($photo->alt); ?>" title"<?php echo e($photo->title); ?>">
              </a>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
      <p class="text-center">No published photos</p>
      <?php endif; ?>

    </div>

    </div>

  </div>
  <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/karvali/resources/views/albums/show.blade.php ENDPATH**/ ?>