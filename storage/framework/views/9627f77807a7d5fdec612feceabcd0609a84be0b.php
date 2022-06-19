<header class="main-header">
  <nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius:0px;">
    
    <div class="container-fluid">
      <div class="">

          <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
              aria-expanded="false">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(route('homepage')); ?>">
              <span class="glyphicon glyphicon-map-marker" style="font-size:19px;" aria-hidden="true"></span>
              <?php echo e(config('app.name')); ?>

            </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              
                <li>
                  <a href="<?php echo e(route('companies')); ?>"><?php echo e(__('header.companies')); ?>

                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo e(route('front.products')); ?>"><?php echo e(__('header.products')); ?></a>
                </li>
                <li>
                  <a href="<?php echo e(route('groups')); ?>"><?php echo e(__('header.groups')); ?></a>
                </li>
                <li>
                  <a href="<?php echo e(route('events')); ?>"><?php echo e(__('header.events')); ?></a>
                </li>
                <li>
                  <a href="<?php echo e(route('news.index')); ?>"><?php echo e(__('header.posts')); ?></a>
                </li>
                <li>
                  <a href="<?php echo e(route('galleries')); ?>"><?php echo e(__('header.galleries')); ?></a>
                </li>
                <li>
                  <a title="Camera Views" href="<?php echo e(route('online-cameras')); ?>">
                    <span class="glyphicon glyphicon-camera" style="font-size:19px;" aria-hidden="true"></span>
                  </a>
                </li>

                <li class="dropdown">
                  <a id="infoMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="glyphicon glyphicon-info-sign" style="font-size:19px;" aria-hidden="true"></span>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="infoMenu">
                    <li class="list-group-item">
                      <a href="<?php echo e(route('contact')); ?>"><?php echo e(__('header.contact')); ?></a>
                    </li>
                      <li class="list-group-item">
                        <a href="<?php echo e(route('about')); ?>"><?php echo e(__('sidebar.aboutus')); ?></a>
                      </li>
                      <li class="list-group-item">
                        <a href="<?php echo e(route('services')); ?>"><?php echo e(__('sidebar.services')); ?></a>
                      </li>
                      <li class="list-group-item">
                        <a href="<?php echo e(route('termsofuse')); ?>"><?php echo e(__('sidebar.termsofuse')); ?></a>
                      </li>
                      <li class="list-group-item">
                        <a href="<?php echo e(route('privacy')); ?>"><?php echo e(__('sidebar.privacy')); ?></a>
                      </li>
                      <li class="list-group-item">
                        <a href="<?php echo e(route('personaldata')); ?>"><?php echo e(__('sidebar.personaldata')); ?></a>
                      </li>
                      <li class="list-group-item">
                        <a href="<?php echo e(route('help')); ?>"><?php echo e(__('sidebar.help')); ?></a>
                      </li>
                  </ul>
                </li>
              
              <li class="dropdown">
                <?php if(auth()->guard('web')->guest()): ?>
                
                <a href="<?php echo e(url('manage')); ?>">
                   
                  
                  <span class="glyphicon glyphicon-user" style="font-size:19px;" aria-hidden="true"></span>

                  <span class="caret"></span>
                </a>
                
                <?php endif; ?>
                <?php if(auth()->guard('web')->check()): ?>
                <a href="<?php echo e(url('manage')); ?>">
                  
                  
                  <span class="glyphicon glyphicon-user" style="font-size:19px;" aria-hidden="true"></span>
                  <span class="caret"></span>
                </a>
                <?php endif; ?>
                
                <!------------------------>
                <ul class="dropdown-menu">
                  
                  <?php if(auth()->guard('web')->guest()): ?>
                  <li>
                    <a href="<?php echo e(route('login')); ?>"><?php echo e(__('header.login')); ?></a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="<?php echo e(route('register')); ?>"><?php echo e(__('header.register')); ?></a>
                  </li>
                  <?php endif; ?>
                  <?php if(auth()->guard('web')->check()): ?>
                      <li>
                        <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('header.account')); ?></a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li>
                        <a href="<?php echo e(route('help')); ?>">Οδηγίες</a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('termsofuse')); ?>">Όροι</a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
            																					 document.getElementById('logout-form').submit();">Αποσύνδεση
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo e(csrf_field()); ?>

                        </form>
                      </li>
                      <?php endif; ?>

                  
                  
                </ul>
              </li>
            
            <li class="dropdown">
              <a href="<?php echo e(route('cart.index')); ?>" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="glyphicon glyphicon-shopping-cart" style="font-size:19px;" aria-hidden="true"></span>
                <?php if(Cart::count() >= 1): ?>
                <span class="badge"><?php echo e(Cart::count()); ?></span>
                <?php endif; ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="cart">
                <?php if(Cart::count() == 1): ?>
                  <li class="list-group-item"><?php echo e(Cart::count()); ?> <?php echo e(__('cart.productincart')); ?></li>
                  <li class="list-group-item"><?php echo e(__('cart.total')); ?> <?php echo e(Cart::total()); ?>€</li>
                  <a class="list-group-item" href="<?php echo e(route('cart.index')); ?>"><?php echo e(__('cart.cart')); ?></a>
                  <li class="list-group-item">
                    <form action="<?php echo e(route('cart.clean')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <button title="<?php echo e(__('cart.cleantitle')); ?>" type="submit" class="btn btn-danger" value="Remove"><?php echo e(__('cart.clean')); ?></button>
                    </form>
                  </li>
                  <?php elseif(Cart::count() > 1): ?>
                  <li class="list-group-item"><?php echo e(Cart::count()); ?> <?php echo e(__('cart.productsincart')); ?></li>
                  <li class="list-group-item"><?php echo e(__('cart.total')); ?> <?php echo e(Cart::total()); ?></li>
                  <a class="list-group-item" href="<?php echo e(route('cart.index')); ?>"><?php echo e(__('cart.cart')); ?></a>
                  <li class="list-group-item">
                    <form action="<?php echo e(route('cart.clean')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <button title="<?php echo e(__('cart.cleantitle')); ?>" type="submit" class="btn btn-danger" value="Remove"><?php echo e(__('cart.clean')); ?></button>
                    </form>
                  </li>
                  <?php else: ?>
                  <li class="list-group-item"><?php echo e(__('cart.nocart')); ?></li>
                  <a href="<?php echo e(route('front.products')); ?>" class="list-group-item"><?php echo e(__('cart.gotoproducts')); ?></a>
                  <a href="<?php echo e(route('companies')); ?>" class="list-group-item"><?php echo e(__('cart.gotocompanies')); ?></a>
                  <?php endif; ?>
              </ul>
            </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?php echo e(app()->getLocale()); ?>

                      <i class="fas fa-lg fa-globe"></i>
                  </a>
                  <ul class="dropdown-menu">
                      <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($lang != app()->getLocale()): ?>
                              <li>
                                  <a href="<?php echo e(route('lang.switch', $lang)); ?>">
                                      <?php echo e($language); ?>

                                  </a>
                              </li>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </li>
            </ul>
          </div>
        </div>
    </div>
  </nav>
</header>

<?php /**PATH L:\xampp\htdocs\karvali\resources\views/partials/header.blade.php ENDPATH**/ ?>