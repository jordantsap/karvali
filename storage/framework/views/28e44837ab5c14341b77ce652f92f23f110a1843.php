<header class="main-header">

  <!-- Logo -->
  <a target="_blank" href="<?php echo e(url('/')); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b><?php echo e(config('app.name')); ?></b>.gr</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><?php echo e(config('app.name')); ?></b> gr</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <i class="fas fa-bars"></i>
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        <!-- /.messages-menu -->

        <!-- Notifications Menu -->
        
        <!-- Notifications Menu -->

        <!-- Tasks Menu -->
        
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo e(Auth::user()->username); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            
            <!-- Menu Body -->
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                
              </div>
              <div class="pull-right">
                <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

              </form>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        
      </ul>
    </div>
  </nav>
</header>
<?php /**PATH L:\wamp64\www\karvali\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>