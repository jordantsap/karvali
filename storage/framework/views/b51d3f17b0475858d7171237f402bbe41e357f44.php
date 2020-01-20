<div class="container">
<section id="categories">
			<div class="row">
				<div class="col-xs-12">
          <div class="scroll-animation-in right">
  					<h2 class="animated tada text-center"><?php echo e(__('page.categoriesheader')); ?></h2>
          </div>
					<div class="divider"></div>
					<br>
					<div class="col-xs-12">
						<div class="col-xs-4 text-center">
              <div class="animated slideInLeft">
                <h3><?php echo e(__('page.companycategories')); ?></h3>
              </div>
              <?php $__currentLoopData = $companytypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                  <a href="<?php echo e(route('companies-category', $category->slug)); ?>">
										<h4 class="animated slideInUp"><?php echo e($category->name); ?></h4></a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
						<div class="col-xs-4 text-center">
              <div class="scroll-animation-bounce">
                <h3 class="animated slideInDown"><?php echo e(__('page.groupcategories')); ?></h3>
              </div>
              <?php $__currentLoopData = $grouptypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                  <a href="<?php echo e(route('groups-category', $category->slug)); ?>">
										<h4 class="animated slideInUp"><?php echo e($category->name); ?></h4></a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-xs-4 text-center">
              <div class="animated slideInRight">
                <h3><?php echo e(__('page.productcategories')); ?></h3>
              </div>
              <?php $__currentLoopData = $producttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                  <a href="<?php echo e(route('products-category', $category->slug)); ?>"> <h4 class="animated slideInUp"><?php echo e($category->name); ?></h4> </a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
					</div><!-- /.row -->
				</div>
			</div>
		</section>
		</div>
<?php /**PATH /opt/lampp/htdocs/karvali/resources/views/home/categories.blade.php ENDPATH**/ ?>