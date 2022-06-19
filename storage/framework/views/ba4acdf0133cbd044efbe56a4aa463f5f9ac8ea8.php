
<?php $__env->startSection('title', $product->category->name.' '.$product->title ); ?>
<?php $__env->startSection('meta_description', $product->category->name.' '.$product->meta_description); ?>
<?php $__env->startSection('meta_keywords', $product->meta_keywords.' '. $product->category->name); ?>

<?php $__env->startSection('head-js'); ?>
  <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c1ce62ff6809e0011a91cbd&product=inline-share-buttons' async='async'></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <img width="100%" height="350px" src="<?php echo e(asset('images/products/'.$product->header)); ?>" title="<?php echo e($product->title); ?>" class="" alt="<?php echo e($product->title); ?>">
	<div class="container">
		<div id="products">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center"><?php echo e($product->title); ?></h1>
	        <div class="divider"></div><br>
				</div>
				<br>
				<div class="col-xs-8">
					<img src="<?php echo e(asset('images/products/'.$product->logo)); ?>" alt="<?php echo e($product->title); ?>" width="100%" height="350px">
				</div>


				<div class="col-xs-4 text-center">

          <ul class="list-group">
              <li class="list-group-item bold">
                <h2><?php echo e(__('single.company')); ?>

                  <a href="<?php echo e(route('company',$product->company->slug)); ?>">
                    <?php echo e(Str::limit($product->company->title, 200)); ?></a></h2></li>

              <li class="list-group-item bold">
                <h2><?php echo e(__('single.category')); ?>

                  <a href="<?php echo e(route('products-category', $product->category->slug)); ?>">
                    <?php echo e($product->category->name); ?></a>
                </h2>
              </li>

              <li class="list-group-item bold">
                <h3><?php echo e(__('single.productcode')); ?> <?php echo e($product->sku); ?></h3></li>

              <li class="list-group-item bold"><h3><?php echo e(__('single.price')); ?> <?php echo e($product->price); ?> €</h3></li>

              <li class="list-group-item bold" style="border: none !important;">
                <form id="cartstore" action="<?php echo e(route('cart.store')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                  <input type="hidden" name="title" value="<?php echo e($product->title); ?>">
                  <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                  <button id="btn" type="submit" class="btn btn-primary btn-block"><?php echo e(__('single.addtocart')); ?></button>
                  
                </form>
              </li>
          </ul>
				</div>

        <div class="row col-xs-12">

          <div class="col-xs-4 text-center" style="margin-bottom: 10px;">
            <h3 class="col-xs-12"><?php echo e(__('single.opinion')); ?></h3>
            <div id="buttonlink" class="col-xs-6">
              <form action="<?php echo e(route('like.store')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="likeable_id" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="likeable_type" value="App\Models\Event">
                <button type="submit" class="btn btn-link">
                  <i class="fa fa-3x fa-thumbs-up"></i>
                  <span class="badge"><?php echo e($product->likes->count()); ?></span>
                </button>
              </form>
            </div>
            <div id="buttonlink" class="col-xs-6">
              <a href="#comments">
                <i class="fa fa-3x fa-comment"></i>
                <span class="badge"><?php echo e($product->comments->count()); ?></span>
              </a>
            </div>
          </div>
          <div class="col-xs-4">
            <h3 class="col-xs-12 text-center"><?php echo e(__('single.moreaboutus')); ?>: </h3>
            <div class="col-xs-3">
              <a href="//<?php echo e($product->website); ?>" target="_blank">
                <i class="fa fa-3x fa-home"></i>
              </a>
            </div>
            <div class="col-xs-3">
              <a href="mailto:<?php echo e($product->email); ?>" target="_top">
                <i class="fa fa-3x fa-envelope"></i>
              </a>
            </div>
            <div class="col-xs-3">
              <a href="//<?php echo e($product->facebook); ?>" target="_blank">
                <i class="fab fa-3x fa-facebook"></i>
              </a>
            </div>
            <div class="col-xs-3">
              <a href="//<?php echo e($product->twitter); ?>" target="_blank">
                <i class="fab fa-3x fa-twitter"></i>
              </a>
            </div>
          </div>
          <div id="social-links" class="text-center col-xs-4">
            <h3 class="col-xs-12"><?php echo e(__('page.shareit')); ?>:</h3>
            <div class="row sharethis-inline-share-buttons"></div>
          </div>

        </div>

        <div class="col-xs-12 center-block">
          <br>

          <div class="panel panel-primary text-center">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo e(__('single.description')); ?></p>
    							  </div>
    							  <div class="panel-body">
    							    <h2><?php echo $product->description; ?></h2>
    							  </div>
    							</div>
    						</div>

        <div class="row center-block">
          <div class="col-xs-4">
            <a data-lightbox="product" data-title="<?php echo e($product->title); ?>" data-alt="<?php echo e($product->title); ?>" href="<?php echo e(asset('images/products/'.$product->image1)); ?>">
              <img width="100%" height="270px" src="<?php echo e(asset('images/products/'.$product->image1)); ?>" title="<?php echo e($product->title); ?>" class="img-responsive" alt="<?php echo e($product->title); ?>">
            </a>
          </div>
          <div class="col-xs-4">
            <a data-lightbox="product" data-title="<?php echo e($product->title); ?>" data-alt="<?php echo e($product->title); ?>" href="<?php echo e(asset('images/products/'.$product->image2)); ?>">
              <img width="100%" height="270px" src="<?php echo e(asset('images/products/'.$product->image2)); ?>" title="<?php echo e($product->title); ?>" class="img-responsive" alt="<?php echo e($product->title); ?>">
            </a>
          </div>
          <div class="col-xs-4">
            <a data-lightbox="product" data-title="<?php echo e($product->title); ?>" data-alt="<?php echo e($product->title); ?>" href="<?php echo e(asset('images/products/'.$product->image3)); ?>">
              <img width="100%" height="270px" src="<?php echo e(asset('images/products/'.$product->image3)); ?>" title="<?php echo e($product->title); ?>" class="img-responsive" alt="<?php echo e($product->title); ?>">
            </a>
          </div>
        </div>

        <div class="col-xs-12" id="comments">
          <h1 class="text-center"><?php echo e(__('single.comments')); ?></h1>
          <div class="divider"></div><br>
        </div>
        
          <div class="row center-block">
            <div class="col-xs-6">
              <label><?php echo e(__('single.latestcomments')); ?></label>

              <?php if(count($product->comments) > 0): ?>
              <ul class="list-group">
                <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                  <input type="hidden" name="commentable_id" value="<?php echo e($product->id); ?>">
                  <input type="hidden" name="commentable_type" value="App\Product">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <?php if(Auth::user()): ?>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>" required readonly>
                    <?php elseif(Auth::guard('customer')->user()): ?>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth('customer')->user()->email); ?>"  required readonly>
                    <?php else: ?>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>"  required>
                    <?php endif; ?>
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
	</div>
	<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\xampp\htdocs\karvali\resources\views/products/show.blade.php ENDPATH**/ ?>