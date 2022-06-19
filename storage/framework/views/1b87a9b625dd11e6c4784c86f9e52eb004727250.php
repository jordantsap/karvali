
<?php $__env->startSection('title', __('head.poststitle')); ?>
<?php $__env->startSection('meta_description', __('meta.postspagedescription')); ?>
<?php $__env->startSection('meta_keywords', __('meta.postspagekeywords')); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="posts">
<div class="container">
    <div class="row">
      <h1 class=""><?php echo e(__('page.posts')); ?></h1>
      <nav class="navbar">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#posttype-collapse"
          aria-expanded="false">
          <span class=""><?php echo e(__('page.categories')); ?></span>
          <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
        </button>
        <div class="row">
          <!-- List group -->
          <ul class="nav navbar-nav collapse navbar-collapse" id="posttype-collapse">
            <?php $__currentLoopData = $posttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <a href="<?php echo e(route('posts-category', $posttype->slug)); ?>" class=""><?php echo e($posttype->name); ?>&nbsp
                <span class="badge"><?php echo e($posttype->posts->where('active',1)->count()); ?></span>
              </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li>
              <script>
                document.write('<a href="' + document.referrer + '"><?php echo e(__('page.backlink')); ?></a>');
              </script>
            </li>
          </ul>
        </div>
      </nav>
      <div class="divider"></div>

      <div class="row">
        <?php if(count($posts) > 0): ?> <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
            <div class="card h-100">
              <a href="<?php echo e(route('news.show', $post->slug)); ?>">
                <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="<?php echo e(asset('images/posts/'.$post->image)); ?>"
                  alt="<?php echo e($post->title); ?>">
              </a>
            </div>
            <div class="text-center">
              <h2 class="">
                  <a href="<?php echo e(route('news.show',$post->slug)); ?>"><?php echo e(Str::limit($post->title, 30)); ?></a>
                </h2>
               <div class="row">
                <div class="col-xs-12">
                  <h4><b><?php echo e(__('page.category')); ?></b></h4>
                  <a href="<?php echo e(route('posts-category', $post->category->slug)); ?>">
                    <h3><?php echo e($post->category->name); ?></h3></a>
                  <div class="divider"></div>
                  
                </div>
                <div class="col-xs-12">
                  <h4><b><?php echo e(__('page.description')); ?></b></h4>
                  <p><?php echo Str::limit($post->description, 50); ?></p>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
        <div class="col-xs-12 noresults">
          <h1><b><?php echo e(__('page.noresults')); ?></b></h1>
        </div>
        <?php endif; ?>

      </div>

      <div class="col-xs-9">
        <?php echo e($posts->links()); ?>

      </div>

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->
</div>
<br> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/posts/index.blade.php ENDPATH**/ ?>