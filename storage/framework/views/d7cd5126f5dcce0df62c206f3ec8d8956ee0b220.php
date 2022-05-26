
<?php $__env->startSection('title', __('head.products')); ?>
<?php $__env->startSection('meta_description', __('meta.productspagedescription')); ?>
<?php $__env->startSection('meta_keywords', __('meta.productspagekeywords')); ?>

<?php $__env->startSection('content'); ?>
  <div id="products">
   <div class="container">
     <div class="row">
     <h1 class=""><?php echo e(__('page.products')); ?></h1>
     <nav class="navbar">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#producttype-collapse"
       aria-expanded="false">
       <span class=""><?php echo e(__('page.categories')); ?></span>
       <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
     </button>
       <div class="row">
         <ul class="nav navbar-nav collapse navbar-collapse" id="producttype-collapse">
            <?php $__currentLoopData = $producttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(route('products-category', $producttype->slug)); ?>" class=""><?php echo e($producttype->name); ?>&nbsp<span class="badge"><?php echo e($producttype->products->where('active',1)->count()); ?></span>
              </a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li><script>
  document.write('<a href="' + document.referrer + '"><?php echo e(__('page.backlink')); ?></a>');
</script></li>
          </ul>
        </div>
        </nav>
          <div class="divider"></div>


       <div class="row">
         <?php if(count($products) > 0): ?>
           <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-xs-12 col-sm-4 portfolio-item">
               <div class="card h-100">
                 <a target="_blank" href="<?php echo e(route('product',$product->slug)); ?>">
                   <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="<?php echo e(asset('images/products/'.$product->logo)); ?>" alt="<?php echo e($product->title); ?>">
                 </a>
               </div>
               <div class="card-body">
                 <div class="card-title">
                   <a target="_blank" href="<?php echo e(route('product',$product->slug)); ?>">
                   <h2><?php echo e(Str::limit($product->title, 20)); ?></h2></a>
                 </div>
                 <div class="row" id="likecomment">
                   <div class="col-xs-6 text-center">
                     <i class="fa fa-3x fa-thumbs-up"></i><span class="badge"><?php echo e($product->likes->count()); ?></span>
                   </div>
                   <div class="col-xs-6 text-center">
                     <i class="fa fa-3x fa-comment"></i><span class="badge"><?php echo e($product->comments->count()); ?></span>
                   </div>
                 </div>
                   <div class="row col-xs-4 col-sm-12"><h3><b><?php echo e(__('page.category')); ?></b> <a href="<?php echo e(route('products-category', $product->category->slug)); ?>"><?php echo e($product->category->name); ?></a></h3> </div>
                   <div class="row">
                     <div class="col-xs-8"><h4><b><?php echo e(__('page.company')); ?></b> <a href="<?php echo e(route('company',$product->company->slug)); ?>"><br><?php echo e(Str::limit($product->company->title, 10)); ?></a></h4></div>
                     <h4 class="col-xs-4"><b><?php echo e(__('page.price')); ?></b> <br>€ <?php echo e($product->price); ?></h4>
                   </div>
                   <div class="row">
                     <div class="col-xs-6">
                       <form id="cartstore" action="<?php echo e(route('cart.store')); ?>" method="post">
                         <?php echo e(csrf_field()); ?>

                         <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                         <input type="hidden" name="title" value="<?php echo e($product->title); ?>">
                         <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                         <input id="btn" type="submit" class="btn btn-primary btn-block" value="<?php echo e(__('single.addtocart')); ?>">
                       </form>
                       
                     </div>
                     <div class="col-xs-6"></div>
                   </div>
               </div>
             </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <br>
           <?php else: ?>
             <div class="col-xs-12 noresults">
               <h1><b><?php echo e(__('page.noresults')); ?></b></h1>
             </div>
         <?php endif; ?>

       </div>

      <div class="col-xs-9">
      	<?php echo e($products->links()); ?>

      </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\xampp\htdocs\karvali\resources\views/products/index.blade.php ENDPATH**/ ?>