<?php $__env->startSection('title', $group->category->name.' '.__('head.group').' '.$group->title ); ?>
<?php $__env->startSection('meta_description', $group->category->name.' '.__('head.group').' '.$group->meta_description); ?>
<?php $__env->startSection('meta_keywords', $group->meta_keywords.' '. $group->category->name); ?>

<?php $__env->startSection('content'); ?>
  <img width="100%" height="350px" src="<?php echo e(asset('images/groups/'.$group->header)); ?>" title="<?php echo e($group->title); ?>" class="" alt="<?php echo e($group->title); ?>">
	<div class="container">
		<div id="groups">

      <div class="row">
					<h1 class="text-center">
						<?php echo e($group->title); ?>

          </h1>
					<div class="divider"></div><br>

          <div class="col-xs-8">
            <img src="<?php echo e(asset('images/groups/'. $group->logo)); ?>" width="100%" height="200px"alt="<?php echo e($group->title); ?>">
          </div>

          <div class="col-xs-4 text-center">
            <h2><?php echo e(__('single.category')); ?> <?php echo e($group->category->name); ?></h2>
            <h2><?php echo e(__('single.manager')); ?> <?php echo e($group->manager); ?></h2>
            <h2><?php echo e(__('single.telephone')); ?> <?php echo e($group->telephone); ?></h2>
          </div>
          <div class="col-xs-12">
            
            <div class="col-xs-4" style="margin-bottom: 10px;">
              <h3><?php echo e(__('single.opinion')); ?></h3>
              <div id="buttonlink" class="col-xs-6">
                <form action="<?php echo e(route('like.store')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="likeable_id" value="<?php echo e($group->id); ?>">
                  <input type="hidden" name="likeable_type" value="App\Models\Event">
                  <button type="submit" class="btn btn-link">
                    <i class="fa fa-3x fa-thumbs-up"></i>
                    <span class="badge"><?php echo e($group->likes->count()); ?></span>
                  </button>
                </form>
              </div>
              <div id="buttonlink" class="col-xs-6">
                <a href="#comments">
                  <i class="fa fa-3x fa-comment"></i>
                  <span class="badge"><?php echo e($group->comments->count()); ?></span>
                </a>
              </div>
            </div>
            <div class="col-xs-4">
              <h3 class="col-xs-12"><?php echo e(__('single.moreaboutus')); ?>: </h3>
              <div class="col-xs-3">
                <a href="//<?php echo e($group->website); ?>" target="_blank">
                  <i class="fa fa-3x fa-home"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="mailto:<?php echo e($group->email); ?>" target="_top">
                  <i class="fa fa-3x fa-envelope"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="//<?php echo e($group->facebook); ?>" target="_blank">
                  <i class="fab fa-3x fa-facebook"></i>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="//<?php echo e($group->twitter); ?>" target="_blank">
                  <i class="fab fa-3x fa-twitter"></i>
                </a>
              </div>
            </div>
            <div id="social-links" class="col-xs-4">
              <h3 class="col-xs-12"><?php echo e(__('page.shareit')); ?>: </h3>
              <div class="row sharethis-inline-share-buttons"></div>
            </div>

          </div>
        </div>

            <div class="row"><br>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="<?php echo e($group->title); ?>" data-alt="<?php echo e($group->title); ?>" href="<?php echo e(asset('images/groups/'.$group->image1)); ?>">
                  <img src="<?php echo e(asset('images/groups/'.$group->image1)); ?>" title="<?php echo e($group->title); ?>" class="" alt="<?php echo e($group->title); ?>">
                </a>
              </div>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="<?php echo e($group->title); ?>" data-alt="<?php echo e($group->title); ?>" href="<?php echo e(asset('images/groups/'.$group->image2)); ?>">
                  <img src="<?php echo e(asset('images/groups/'.$group->image2)); ?>" title="<?php echo e($group->title); ?>" class="" alt="<?php echo e($group->title); ?>">
                </a>
              </div>
              <div class="col-xs-4">
                <a data-lightbox="group" data-title="<?php echo e($group->title); ?>" data-alt="<?php echo e($group->title); ?>" href="<?php echo e(asset('images/groups/'.$group->image3)); ?>">
                  <img src="<?php echo e(asset('images/groups/'.$group->image3)); ?>" title="<?php echo e($group->title); ?>" class="" alt="<?php echo e($group->title); ?>">
                </a>
              </div>
            </div>

  				<div class="center-block">
            <div class="row col-xs-12 text-center"><br>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo e(__('single.description')); ?></h3>
                </div>
                <div class="panel-body">
                  <h3><?php echo $group->description; ?></h3>
                </div>
              </div>
            </div>
          </div>


        
        <div class="row center-block" id="comments">
          <h1 class="text-center"><?php echo e(__('single.comments')); ?></h1>
          <div class="divider"></div><br>
        </div>
          <div class="row">
            <div class="col-xs-6">
              <label><?php echo e(__('single.latestcomments')); ?></label>
              <?php if(count($group->comments) > 0): ?>
              <ul class="list-group">
                <?php $__currentLoopData = $group->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                  <?php echo e($comment->comment); ?>

                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php else: ?>
              <li class="list-group-item"><?php echo e(__('single.nocomments')); ?></li>
            <?php endif; ?>
            </div>
            <div class="col-xs-6">
                <form action="<?php echo e(route('comment.store')); ?>" method="post" role="form">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="commentable_id" value="<?php echo e($group->id); ?>">
                  <input type="hidden" name="commentable_type" value="App\Group">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <?php if(Auth::user()): ?>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" readonly>
                    <?php elseif(Auth::guard('customer')->user()): ?>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth('customer')->user()->email); ?>" readonly>
                    <?php else: ?>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="comment"><?php echo e(__('single.newcomment')); ?></label>
                    <textarea class="form-control" name="comment" rows="5"></textarea>
                  </div>
                  <button id="btn" type="submit" class="btn btn-primary btn-block"><?php echo e(__('single.addcomment')); ?></button>
                </form>
            </div>
          </div>

		</div>
    <br>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\karvali\resources\views/groups/show.blade.php ENDPATH**/ ?>