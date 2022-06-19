
<?php $__env->startSection('title', __('head.eventstitle')); ?>
<?php $__env->startSection('meta_description',__('meta.eventspagedescription')); ?>
<?php $__env->startSection('meta_keywords', __('meta.eventspagekeywords')); ?>

<?php $__env->startSection('content'); ?>
  <div id="events">
<div class="container">
  <div class="row">
      <h1 class=""><?php echo e(__('page.events')); ?></h1>
      <div class="divider"></div>
      <br>
      <div class="row">

        <div class="col-xs-10">
          <?php if(count($events) > 0): ?> <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <a href="<?php echo e(route('event',$event->slug)); ?>">
                <img class="img-responsive" style="width:100%;height:150px;" src="<?php echo e(asset('images/events/'.$event->logo)); ?>"
                  alt="<?php echo e($event->title); ?>">
              </a>
            </div>

            <div class="col-xs-12 col-sm-6">
              <h4 class="card-title"><a href="<?php echo e(route('event',$event->slug)); ?>"><?php echo e(Str::limit($event->title, 15)); ?></a></h4>
              <p><?php echo e(Str::limit($event->description, 100)); ?></p>
              <p><?php echo e(__('page.date')); ?> <?php echo e(date('d-M-Y', strtotime($event->start_date))); ?> - <?php echo e(__('page.from')); ?>:<?php echo e($event->start_time); ?> - <?php echo e(__('page.until')); ?>: <?php echo e($event->end_time); ?></p>
              <p class="row" id="likecomment">
                <span class="col-xs-4">
                  <a id="btn" class="btn btn-lnik btn-block" href="<?php echo e(route('event',$event->slug)); ?>">View Project
                  </a>
                </span>
                <span class="col-xs-4 social-button btn-link"><i class="fa fa-3x fa-thumbs-up"></i>
                  <span class="badge"><?php echo e($event->likes->count()); ?></span>
                </span>
                <span class="col-xs-4 social-button btn-link"><i class="fa fa-3x fa-comment"></i>
                  <span class="badge"><?php echo e($event->comments->count()); ?></span>
                </span>
              </p>
            </div>
          </div>
          <br>
          <div class="divider"></div>
          <br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
          <div class="col-xs-12 noresults">
            <h1><b><?php echo e(__('page.noresults')); ?></b></h1>
          </div>
          <?php endif; ?>

        </div>

        <div class="col-xs-2">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Κατηγορίες</div>
            <!-- List group -->
            <ul class="list-group text-center">
              <a href="<?php echo e(route('pastevents')); ?>" class="list-group-item">Περασμένες Εκδηλώσεις</a>
              <a href="<?php echo e(route('todayevents')); ?>" class="list-group-item">Σημερινές Εκδηλώσεις</a>
              <a href="<?php echo e(route('weekevents')); ?>" class="list-group-item">Εκδηλώσεις Εβδομάδας</a>
              <a href="<?php echo e(route('monthevents')); ?>" class="list-group-item">Εκδηλώσεις του Μήνα</a>
              <a href="<?php echo e(route('upcomingevents')); ?>" class="list-group-item">Απερχόμενες Εκδηλώσεις</a>
            </ul>
          </div>
        </div>


        <div class="col-xs-9">
          <?php echo e($events->links()); ?>

        </div>

      </div>
      <!-- /.row -->


    </div>
    <!-- /.container -->
  </div>
</div>
<br> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/events/index.blade.php ENDPATH**/ ?>