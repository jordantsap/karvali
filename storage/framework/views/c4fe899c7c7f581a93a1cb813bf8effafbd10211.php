<section id="popular">
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="col-xs-10 col-xs-offset-2 bg-info">
        <div class="col-xs-12">
          <h1 class="page-header"><?php echo e(__('page.popularheader')); ?></h1></div>
      </div>
    </div>

    <aside class="col-xs-2">
      <ul class="bg-info nav nav-tabs nav-stacked" role="tablist">
        <li role="presentation" class="list-group-item bg-info"><i class="animated infinite pulse fas fa-3x fa-fire"></i>
          <h3 class="animated tada delay-1s text-center"><?php echo e(__('page.popularheader')); ?></h3>
        </li>
        <li role="presentation" class="">
          <a href="#companiestab" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__('page.popularcompanies')); ?></a>
        </li>
        <li role="presentation">
          <a href="#groupstab" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__('page.populargroups')); ?></a>
        </li>
        <li role="presentation">
          <a href="#productstab" aria-controls="messages" role="tab" data-toggle="tab"><?php echo e(__('page.popularproducts')); ?></a>
        </li>
        <li role="presentation">
          <a href="#eventstab" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('page.popularevents')); ?></a>
        </li>
      </ul>
    </aside>

    <div class="col-xs-10 bg-info">
      <!-- Tab panes -->
      <div class="tab tab-content">
        <div role="tabpanel" class="tab-pane active" id="companiestab">
          <div class="col-xs-12">

            <h2><?php echo e(__('page.companies')); ?></h2>
            <div class="divider"></div>
            <br>
            <div class="row">
              <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-12 col-sm-6 col-md-3 portfolio-item">
                <div class="card h-100">
                  <a href="<?php echo e(route('company',$company->id)); ?>">
                    <img class="img-responsive img-fluid rounded" style="width:100%;height:200px;" src="<?php echo e(asset('images/companies/'.$company->logo)); ?>"
                      alt="<?php echo e($company->title); ?>">
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                      <a href="<?php echo e(route('company',$company->id)); ?>"><?php echo e(Str::limit($company->title, 15)); ?></a>
                    </h4>
                  <div class="row" id="likecomment">
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-thumbs-up"></i>
                      <span class="badge"><?php echo e($company->likes->count()); ?></span>
                    </div>
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-comment"></i>
                      <span class="badge"><?php echo e($company->comments->count()); ?></span>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12"><b><?php echo e(__('page.category')); ?></b>
                      <a href="<?php echo e(route('companies-category', $company->category->slug)); ?>"><?php echo e($company->category->name); ?></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- /.row -->
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="groupstab">
          <div id="">
            <div class="">
              <div class="">
                <div class="col-xs-12">

                  <h2><?php echo e(__('page.groups')); ?></h2>
                  <div class="divider"></div>
                  <br>
                  <div class="row">
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-xs-12 col-sm-6 col-md-3 portfolio-item">
                        <div class="card h-100">
                          <a href="<?php echo e(route('group',$group->slug)); ?>">
                            <img class="img-responsive img-fluid rounded" style="width:100%;height:200px;" src="<?php echo e(asset('images/groups/'.$group->logo)); ?>"
                              alt="<?php echo e($group->title); ?>">
                          </a>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">
                            <a href="<?php echo e(route('group',$group->slug)); ?>"><?php echo e(Str::limit($group->title, 15)); ?></a>
                          </h4>
                          <div class="row" id="likecomment">
                            <div class="col-xs-6 text-center">
                              <i class="fas fa-2x fa-thumbs-up"></i>
                              <span class="badge"><?php echo e($group->likes->count()); ?></span>
                            </div>
                            <div class="col-xs-6 text-center">
                              <i class="fas fa-2x fa-comment"></i>
                              <span class="badge"><?php echo e($group->comments->count()); ?></span>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-xs-12"><b><?php echo e(__('page.category')); ?></b>
                              <a href="<?php echo e(route('groups-category', $group->category->slug)); ?>"><?php echo e($group->category->name); ?></a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                </div>

              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="productstab">
          <div class="col-xs-12">
            <!-- Page Heading -->
            <h2><?php echo e(__('page.products')); ?></h2>
            <div class="divider"></div>
            <br>
            <div class="row">
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-12 col-sm-6 col-md-3 portfolio-item">
                <div class="card h-100">
                  <a href="<?php echo e(route('product',$product->slug)); ?>">
                    <img class="img-responsive img-fluid rounded" style="width:100%;height:200px;" src="<?php echo e(asset('images/products/'.$product->logo)); ?>"
                      alt="<?php echo e($product->title); ?>">
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                          <a href="<?php echo e(route('product',$product->slug)); ?>"><?php echo e(Str::limit($product->title, 15)); ?></a>
                        </h4>
                  <div class="row" id="likecomment">
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-thumbs-up"></i>
                      <span class="badge"><?php echo e($product->likes->count()); ?></span>
                    </div>
                    <div class="col-xs-6 text-center">
                      <i class="fas fa-2x fa-comment"></i>
                      <span class="badge"><?php echo e($product->comments->count()); ?></span>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12">
                      <b><?php echo e(__('page.category')); ?></b>
                      <a href="<?php echo e(route('products-category', $product->category->slug)); ?>"><?php echo e($product->category->name); ?></a>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12"><b><?php echo e(__('page.company')); ?></b>
                      <a href="<?php echo e(route('company', $product->company->slug)); ?>">
                        <?php echo e(Str::limit($product->company->title, 10)); ?></a>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12">
                      <b><?php echo e(__('page.price')); ?></b><?php echo e($product->price); ?>€</div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="eventstab">
          <div id="">
            <div class="col-xs-12">
              <div class="">
                <h2>  <?php echo e(__('page.events')); ?></h2>
                <div class="divider"></div>
                <br>
                <div class="row">
                  <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-6 col-sm-3 portfolio-item">
                      <a href="<?php echo e(route('event',$event->slug)); ?>">
                        <img class="img-responsive img-fluid rounded" src="<?php echo e(asset('images/events/'.$event->logo)); ?>" style="width:100%;height:200px"
                          alt="<?php echo e($event->title); ?>">
                      </a>
                      <h4 class="card-title"><a href="<?php echo e(route('event',$event->slug)); ?>"><?php echo e(Str::limit($event->title, 15)); ?></a></h4>
                      <div class="row" id="likecomment">
                        <div class="col-xs-6 text-center">
                          <i class="fas fa-2x fa-thumbs-up"></i>
                          <span class="badge"><?php echo e($event->likes->count()); ?></span>
                        </div>
                        <div class="col-xs-6 text-center">
                          <i class="fas fa-2x fa-comment"></i>
                          <span class="badge"><?php echo e($event->comments->count()); ?></span>
                        </div>
                      </div>
                      <br>

                      <div><?php echo e(Str::limit($event->description, 50)); ?></div>
                      <br>
                      <a class="btn btn-primary btn-block" href="<?php echo e(route('event',$event->slug)); ?>"><?php echo e(__('page.viewevent')); ?>

                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php /**PATH L:\wamp64\www\karvali\resources\views/home/popular.blade.php ENDPATH**/ ?>