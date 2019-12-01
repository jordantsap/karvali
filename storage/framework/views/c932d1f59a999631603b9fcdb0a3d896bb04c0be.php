
<?php $__env->startSection('title', $company->name.' '.$company->title); ?>
<?php $__env->startSection('meta_description', $company->category->name.' '.__('head.company').' '.$company->meta_description); ?>
<?php $__env->startSection('meta_keywords', $company->meta_keywords.'  '. $company->category->name.' '.__('head.company')); ?>

<?php $__env->startSection('head-js'); ?>
  <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons' async='async'></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<img width="100%" height="350px" src="<?php echo e(asset('images/companies/'.$company->header)); ?>"
  title="<?php echo e($company->title); ?>" class="" alt="<?php echo e($company->title); ?>">
<h1 class="text-center"><?php echo e($company->title); ?></h1>
<div class="divider"></div>
<br>
<div class="container">
  <div id="companies">

    <div class="row">
      <div class="col-xs-6">
        <img src="<?php echo e(asset('images/companies/'.$company->logo)); ?>" width="100%" height="250"
          alt="<?php echo e($company->title); ?>" title="<?php echo e($company->title); ?>">
        </div>

      <div class="col-xs-6">
        <div class="col-xs-9">
          <h3><?php echo e(__('single.category')); ?> <?php echo e($company->category->name); ?></h3>
          <h3><?php echo e(__('single.manager')); ?> <?php echo e($company->manager); ?></h3>
          <h3><?php echo e(__('single.telephone')); ?> <?php echo e($company->telephone); ?></h3>
          <h3><?php echo e(__('single.morninghours')); ?> <?php echo e($company->morningtime); ?></h3>
          <h3><?php echo e(__('single.afternoonhours')); ?> <?php echo e($company->afternoontime); ?></h3>
        </div>



        <div class="col-xs-3">
          <h3><?php echo e(__('single.pos')); ?> <div class="divider"></div><?php echo e($company->pos); ?></h3>

          <h3><?php echo e(__('single.creditcards')); ?> <div class="divider"></div><?php echo e($company->creditcard); ?></h3>

          <h3><?php echo e(__('single.productdelivery')); ?> <div class="divider"></div><?php echo e($company->delivery); ?></h3>

        </div>

      </div>

      <div class="col-xs-12">
        
        <div class="col-xs-4  text-center" style="margin-bottom: 10px;">
          <h3 class="col-xs-12"><?php echo e(__('single.opinion')); ?></h3>

          <div id="buttonlink" class="col-xs-6">
            <form action="<?php echo e(route('like.store')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="likeable_id" value="<?php echo e($company->id); ?>">
              <input type="hidden" name="likeable_type" value="App\Models\Event">
              <button type="submit" class="btn btn-link">
                <i class="fa fa-3x fa-thumbs-up"></i>
                <span class="badge"><?php echo e($company->likes->count()); ?></span>
              </button>
            </form>
          </div>
          <div id="buttonlink" class="col-xs-6">
            <a onclick='window.scrollTo({top: 0, behavior: "smooth"});' href="#comments">
              <i class="fa fa-3x fa-comment"></i>
              <span class="badge"><?php echo e($company->comments->count()); ?></span>
            </a>
          </div>
        </div>
        <div class="col-xs-4">
          <h3 class="col-xs-12 text-center"><?php echo e(__('single.moreaboutus')); ?>: </h3>
          <div class="col-xs-3">
            <a href="//<?php echo e($company->website); ?>" target="_blank">
              <i class="fa fa-3x fa-home"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="mailto:<?php echo e($company->email); ?>" target="_top">
              <i class="fa fa-3x fa-envelope"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//<?php echo e($company->facebook); ?>" target="_blank">
              <i class="fab fa-3x fa-facebook"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="//<?php echo e($company->twitter); ?>" target="_blank">
              <i class="fab fa-3x fa-twitter"></i>
            </a>
          </div>
        </div>
        <div id="social-links" class="col-xs-4">
          <h3 class="col-xs-12 text-center"><?php echo e(__('page.shareit')); ?>:</h3>
          <div class="row sharethis-inline-share-buttons"></div>
        </div>

      </div>
    </div>


    <div class="row center-block">
      <br>

      <div class="panel panel-primary text-center">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo e(__('single.description')); ?></p>
							  </div>
							  <div class="panel-body">
							    <h2><?php echo $company->description; ?></h2>
							  </div>
							</div>
						</div>


              <div class="row">
                <div class="col-xs-4">
                  <a data-lightbox="company" data-title="<?php echo e($company->title); ?>" data-alt="<?php echo e($company->title); ?>" href="<?php echo e(asset('images/companies/'.$company->image1)); ?>">
                    <img src="<?php echo e(asset('images/companies/'.$company->image1)); ?>" title="<?php echo e($company->title); ?>" class="img-responsive img-rounded" alt="<?php echo e($company->title); ?>">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a data-lightbox="company" data-title="<?php echo e($company->title); ?>" data-alt="<?php echo e($company->title); ?>" href="<?php echo e(asset('images/companies/'.$company->image2)); ?>">
                    <img src="<?php echo e(asset('images/companies/'.$company->image2)); ?>" title="<?php echo e($company->title); ?>" class="img-responsive img-rounded" alt="<?php echo e($company->title); ?>">
                  </a>
                </div>
                <div class="col-xs-4">
                  <a data-lightbox="company" data-title="<?php echo e($company->title); ?>" data-alt="<?php echo e($company->title); ?>" href="<?php echo e(asset('images/companies/'.$company->image3)); ?>">
                    <img src="<?php echo e(asset('images/companies/'.$company->image3)); ?>" title="<?php echo e($company->title); ?>" class="img-responsive img-rounded" alt="<?php echo e($company->title); ?>">
                  </a>
                </div>
              </div>

				<div class="row"><br>

					<div class="col-xs-12">
            <h1 class="text-center"><?php echo e(__('single.products')); ?> <?php echo e($company->title); ?></h1>
  					<div class="divider"></div><br>
          </div>

          <?php if(count($company->products->where('active',1)) > 0): ?>
            <?php $__currentLoopData = $company->products->where('active',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-3">
                <ul class="list-group">
                  <li class="list-group-item"><h2><?php echo e(str_limit($company->title, 20)); ?></h2>
                  </li>
                  <li class="list-group-item"><img src="<?php echo e(asset('images/products/'.$company->logo)); ?>" width="100%" height="100px" alt="<?php echo e($company->title); ?>" title"<?php echo e($company->title); ?>"></li>
                  
                  <li class="list-group-item"><h3>Τιμή: <?php echo e($company->price); ?></h3></li>
          <li class="list-group-item">
            <h3><?php echo str_limit($company->description, 20); ?></h3>
          </li>
          <li class="list-group-item">
            <a href="<?php echo e(route('product', $company->slug)); ?>" class="btn btn-default btn-block">Show</a>
          </li>
          </ul>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
        <p class="text-center">No published products</p>
        <?php endif; ?>

      </div>
      
      <div class="row">
        <div class="col-xs-12" id="comments">
          <h1 class="text-center"><?php echo e(__('single.comments')); ?></h1>
          <div class="divider"></div>
          <br>
        </div>

        <div class="col-xs-6">
          <label><?php echo e(__('single.latestcomments')); ?></label>
          <?php if(count($company->comments) > 0): ?>
          <ul class="list-group">
            <?php $__currentLoopData = $company->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

            <input type="hidden" name="commentable_id" value="<?php echo e($company->id); ?>">
            <input type="hidden" name="commentable_type" value="App\Company">
            <div class="form-group">
              <label for="email">Email</label>
              <?php if(Auth::user()): ?>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>"
                required readonly> <?php elseif(Auth::guard('customer')->user()): ?>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth('customer')->user()->email); ?>"
                required readonly> <?php else: ?>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>"
                required> <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="comment"><?php echo e(__('single.newcomment')); ?></label>
              <textarea class="form-control" name="comment" rows="5" required></textarea>
            </div>
            <button id="btn" type="submit" class="btn btn-primary btn-block"><?php echo e(__('single.addcomment')); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/karvali/resources/views/companies/show.blade.php ENDPATH**/ ?>