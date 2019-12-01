
<?php $__env->startSection('title', $post->title.' '.$post->category->name.' '. __('head.post') ); ?>
<?php $__env->startSection('meta_description', $post->category->name.' '.$post->meta_description); ?>
<?php $__env->startSection('meta_keywords', $post->meta_keywords.', '. $post->category->name.', '.__('head.postcategory')); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div id="posts">
      <div class="row">
        <div class="col-xs-12">
          <h1><?php echo e($post->title); ?></h1>
          <div class="divider"></div><br>

        </div>
        <div class="col-xs-12 col-sm-8">
            <img src="<?php echo e(asset('images/posts/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>" width="100%" height="300px">
        </div>
        <div class="row col-xs-12 col-sm-4 text-center">
          <div class="col-xs-12"><h2><?php echo e(__('single.category')); ?> <?php if( ! empty($post->category)): ?><?php echo e($post->category->name); ?>

          <?php else: ?> Uncategorised
          <?php endif; ?></h2></div>
          <div id="social-links">
            <h2 class="col-xs-12"><?php echo e(__('page.shareit')); ?>: </h2>
            <div class="row sharethis-inline-share-buttons"></div>
            
          </div>
        </div>
        <br>
        <div class="col-xs-12">
          <br>
          <div class="panel panel-primary text-center">
            <div class="panel-heading"><?php echo e(__('single.description')); ?></div>
            <div class="panel-body text-center">
              <h3><?php echo $post->description; ?></h3>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/karvali/resources/views/posts/show.blade.php ENDPATH**/ ?>