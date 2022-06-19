
<?php $__env->startSection('title', __('head.groupstitle')); ?>
<?php $__env->startSection('meta_description', __('meta.groupspagedescription')); ?>
<?php $__env->startSection('meta_keywords', __('meta.groupspagekeywords')); ?>

<?php $__env->startSection('content'); ?>
  <div id="groups">
   <div class="container">
       <div class="row">
       <h1 class=""><?php echo e(__('page.groups')); ?></h1>
       <nav class="navbar">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#grouptype-collapse"
         aria-expanded="false">
         <span class=""><?php echo e(__('page.categories')); ?></span>
         <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
       </button>
         <div class="row">
           <ul class="nav navbar-nav collapse navbar-collapse" id="grouptype-collapse">
             <?php $__currentLoopData = $grouptypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grouptype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li><a href="<?php echo e(route('groups-category', $grouptype->slug)); ?>" class=""><?php echo e($grouptype->name); ?>&nbsp<span class="badge"><?php echo e($grouptype->groups->where('active',1)->count()); ?></span>
               </a></li>
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
         <?php if(count($groups) > 0): ?>
           <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-xs-12 col-sm-4 portfolio-item">
           <div class="card h-100">
             <a href="<?php echo e(route('group',$group->slug)); ?>">
               <img class="img-responsive img-fluid rounded" style="width:100%;height:150px;" src="<?php echo e(asset('images/groups/'.$group->logo)); ?>" alt="<?php echo e($group->title); ?>">
             </a>
           </div>
             <div class="card-body text-center">
               <h2 class="card-title">
                 <a href="<?php echo e(route('group',$group->slug)); ?>"><?php echo e(Str::limit($group->title, 20)); ?></a>
               </h2>
               <div class="row" id="likecomment">
                 <div class="col-xs-12"><h3><b><?php echo e(__('page.category')); ?></b> <a href="<?php echo e(route('groups-category', $group->category->slug)); ?>"><?php echo e($group->category->name); ?></a></h3></div>
               </div>
               <div class="row">
                 <div class="col-xs-6 btn-link">
                   <i class="fa fa-3x fa-thumbs-up"></i><span class="badge"><?php echo e($group->likes->count()); ?></span>
                 </div>
                 <div class="col-xs-6 btn-link">
                   <i class="fa fa-3x fa-comment"></i><span class="badge"><?php echo e($group->comments->count()); ?></span>
                 </div>
               </div>
             </div>
         </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php else: ?>
       <div class="col-xs-12 noresults">
         <h1><b><?php echo e(__('page.noresults')); ?></b></h1>
       </div>
     <?php endif; ?>

       </div>

      <div class="col-xs-9">
      	<?php echo e($groups->links()); ?>

      </div>

     </div>
     <!-- /.row -->


   </div>
   <!-- /.container -->
</div>
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/groups/index.blade.php ENDPATH**/ ?>