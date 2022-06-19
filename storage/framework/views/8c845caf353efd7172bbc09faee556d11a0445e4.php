

<?php $__env->startSection('title', __('head.event').' '.$event->title ); ?>

<?php $__env->startSection('meta_description', __('head.event').' '.$event->meta_description); ?>

<?php $__env->startSection('meta_keywords', __('head.event').', '.' '.$event->meta_keywords); ?>

<?php $__env->startSection('content'); ?>
  <img src="<?php echo e(asset('images/events/'.$event->header)); ?>" alt="<?php echo e($event->title); ?>" width="100%"
    height="350px">
<div class="container">
  <div id="events">
    <div class="row">
      <h1 class="text-center">
          <?php echo e($event->title); ?></h1>
      <div class="divider"></div>
      <br>
    </div>

    <div class="row">
      <div class="col-xs-8">
        <img src="<?php echo e(asset('images/events/'.$event->logo)); ?>" alt="<?php echo e($event->title); ?>" width="100%"
          height="260px">
      </div>

      <div class="col-xs-4">
        <h2><?php echo e(__('page.date')); ?> <?php echo e(date('d-M-Y', strtotime($event->start_date))); ?></h2>
        <h2><?php echo e(__('single.starttime')); ?> <?php echo e($event->start_time); ?></h2>
        <h2><?php echo e(__('single.endtime')); ?> <?php echo e($event->end_time); ?></h2>
        <h2><?php echo e(__('single.entrance')); ?> <?php echo e($event->entrance); ?></h2>
        <h2><?php echo e(__('single.telephone')); ?> <?php echo e($event->telephone); ?></h2>
      </div>

      <div class="col-xs-12">
        
        <div class="col-xs-4" style="margin-bottom: 10px;">
          <h3><?php echo e(__('single.opinion')); ?></h3>
          <div id="buttonlink" class="col-xs-6">
            <form action="<?php echo e(route('like.store')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="likeable_id" value="<?php echo e($event->id); ?>">
              <input type="hidden" name="likeable_type" value="App\Models\Event">
              <button type="submit" class="btn btn-link">
                <i class="fa fa-3x fa-thumbs-up"></i>
                <span class="badge"><?php echo e($event->likes->count()); ?></span>
              </button>
            </form>
          </div>
          <div id="buttonlink" class="col-xs-6">
            <a href="#comments">
              <i class="fa fa-3x fa-comment"></i>
              <span class="badge"><?php echo e($event->comments->count()); ?></span>
            </a>
          </div>
        </div>
        <div class="col-xs-4">
          <h3 class="col-xs-12"><?php echo e(__('single.moreaboutus')); ?>: </h3>
          <div class="col-xs-3">
            <a href="//<?php echo e($event->website); ?>" target="_blank">
              <i class="fa fa-3x fa-home"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="mailto:<?php echo e($event->email); ?>" target="_top">
              <i class="fa fa-3x fa-envelope"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//<?php echo e($event->facebook); ?>" target="_blank">
              <i class="fab fa-3x fa-facebook"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//<?php echo e($event->twitter); ?>" target="_blank">
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
        <a data-lightbox="event" data-title="<?php echo e($event->title); ?>" data-alt="<?php echo e($event->title); ?>"
          href="<?php echo e(asset('images/events/'.$event->image1)); ?>">
          <img src="<?php echo e(asset('images/events/'.$event->image1)); ?>" title="<?php echo e($event->title); ?>"
            class="img-responsive img-rounded" alt="<?php echo e($event->title); ?>">
        </a>
      </div>
      <div class="col-xs-4">
        <a data-lightbox="event" data-title="<?php echo e($event->title); ?>" data-alt="<?php echo e($event->title); ?>"
          href="<?php echo e(asset('images/events/'.$event->image2)); ?>">
          <img src="<?php echo e(asset('images/events/'.$event->image2)); ?>" title="<?php echo e($event->title); ?>"
            class="img-responsive img-rounded" alt="<?php echo e($event->title); ?>">
        </a>
      </div>
      <div class="col-xs-4">
        <a data-lightbox="event" data-title="<?php echo e($event->title); ?>" data-alt="<?php echo e($event->title); ?>"
          href="<?php echo e(asset('images/events/'.$event->image3)); ?>">
          <img src="<?php echo e(asset('images/events/'.$event->image3)); ?>" title="<?php echo e($event->title); ?>"
            class="img-responsive img-rounded" alt="<?php echo e($event->title); ?>">
        </a>
      </div>
    </div>

    <br>
    <div class="center-block">
      <div class="row col-xs-12 text-center">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><p class="bold"><?php echo e(__('single.description')); ?></p>
    						</div>
    						<div class="panel-body">
    							<?php echo $event->description; ?>

    						</div>
    					</div>
    				</div>
          </div>

          <div class="row">
            <div class="col-xs-12" id="comments">
              <h1 class="text-center"><?php echo e(__('single.comments')); ?></h1>
              <div class="divider"></div><br>
            </div>
              <div class="col-xs-12">
                <div class="col-xs-6">
                  <label><?php echo e(__('single.latestcomments')); ?></label>
                  <?php if(count($event->comments) > 0): ?>
                  <ul class="list-group">
                    <?php $__currentLoopData = $event->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                      <input type="hidden" name="commentable_id" value="<?php echo e($event->id); ?>">
                      <input type="hidden" name="commentable_type" value="App\Event">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <?php if(Auth::user()): ?>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" required readonly>
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

			</div>
		</div>
	</div>
	<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/events/show.blade.php ENDPATH**/ ?>