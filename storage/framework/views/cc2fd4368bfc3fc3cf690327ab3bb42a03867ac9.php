
<?php $__env->startSection('title', $companytype->name.' '.__('head.companycategory')); ?>
<?php $__env->startSection('meta_description', __('meta.companycategorydescription').' '.$companytype->name); ?>
<?php $__env->startSection('meta_keywords', $companytype->name.' '.__('meta.companycategorykeywords')); ?>

<?php $__env->startSection('content'); ?>
  <!-- Page Content -->
  <div id="companies">
   <div class="container">
       <div class="row">
       <h1 class=""><?php echo e(__('page.companies')); ?></h1>
       <nav class="navbar">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#companytype-collapse"
           aria-expanded="false">
           <span class=""><?php echo e(__('page.categories')); ?></span>
           <span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>
         </button>
           <!-- List group -->
           <div class="row">
           <ul class="nav navbar-nav collapse navbar-collapse" id="companytype-collapse">
          <?php $__currentLoopData = $companytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companytype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a href="<?php echo e(route('companies-category', $companytype->slug)); ?>" class=""><?php echo e($companytype->name); ?>&nbsp<span class="badge"><?php echo e($companytype->companies->where('active',1)->count()); ?></span>
              </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li><script>
  document.write('<a href="' + document.referrer + '"><?php echo e(__('page.backlink')); ?></a>');
</script></li>
          </ul>
          </div>
         </nav>
         <div class="divider"></div>

       <div class="row">
         <?php if(count($companies) > 0): ?>
           <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-xs-12 col-sm-4 col-md-3 portfolio-item">
           <div class="card h-100">
             <a href="<?php echo e(route('company',$company->slug)); ?>">
               <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="<?php echo e(asset('images/companies/'.$company->logo)); ?>" alt="<?php echo e($company->title); ?>">
             </a>
           </div>
             <div class="card-body text-center">
               <h2 class="card-title">
                 <a href="<?php echo e(route('company',$company->slug)); ?>"><?php echo e(Str::limit($company->title, 20)); ?></a>
               </h2>
               <div class="row" id="likecomment">
                 <div class="col-xs-6 text-center">
                   <i class="fa fa-3x fa-thumbs-up"></i><span class="badge"><?php echo e($company->likes->count()); ?></span>
                 </div>
                 <div class="col-xs-6 text-center">
                   <i class="fa fa-3x fa-comment"></i><span class="badge"><?php echo e($company->comments->count()); ?></span>
                 </div>
               </div>
               <div class="row">
                 <div class="col-xs-12">
                   <h3><b><?php echo e(__('page.category')); ?></b> <a href="<?php echo e(route('companies-category', $company->category->slug)); ?>"><?php echo e($company->category->name); ?></a></h3>
                 </div>
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
      	<?php echo e($companies->links()); ?>

      </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\2.2.drive\xampp\htdocs\karvali\resources\views/companies/category.blade.php ENDPATH**/ ?>