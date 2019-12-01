<section id="home-blog">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="col-xs-12">
        <h1 class="text-center"><?php echo e(__('page.homeposts')); ?></h1>
        <div class="divider"></div>
        <br>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-12 col-sm-3">
          <a href="<?php echo e(route('news.show',$post->slug)); ?>">
            <img class="" width="100%" height="250px" src="<?php echo e(asset('images/posts/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>">
          </a>
          <h2><a class="" style="color:#000;" href="<?php echo e(route('news.show',$post->slug)); ?>"><?php echo e(str_limit($post->title, 18)); ?></a></h2>
          <h3 class=""><?php echo str_limit($post->description, 40); ?></h3>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  
</section>
<?php /**PATH /opt/lampp/htdocs/karvali/resources/views/home/blog.blade.php ENDPATH**/ ?>