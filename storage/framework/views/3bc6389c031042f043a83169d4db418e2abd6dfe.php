<div id="bottom" style="background-color:#262626;">
	<div class="container" style="position:relative;">
		<div class="row">
      <div class="col-sm-6 col-md-3">
				<div class="panel panel-none">
					<!-- Default panel contents -->
					<div class="panel-heading"><?php echo e(__('bottom.karvali')); ?></div>
          <div class="divider"></div>
					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item"><a href="<?php echo e(route('privacy')); ?>"><?php echo e(__('page.privacy')); ?></a></li>
						<li class="list-group-item"><a href="<?php echo e(route('personaldata')); ?>"><?php echo e(__('page.personaldata')); ?></a></li>
						<li class="list-group-item"><a href="<?php echo e(route('about')); ?>"><?php echo e(__('bottom.aboutus')); ?></a></li>
						<li class="list-group-item"><a href="<?php echo e(route('termsofuse')); ?>"><?php echo e(__('bottom.termsofuse')); ?></a></li>
            <li class="list-group-item"><a href="<?php echo e(route('online-cameras')); ?>"><?php echo e(__('bottom.cameras')); ?></a></li>
            <li class="list-group-item"><a href="<?php echo e(route('news.index')); ?>"><?php echo e(__('bottom.posts')); ?></a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="panel panel-none">
					<!-- Default panel contents -->
					<div class="panel-heading"><?php echo e(__('bottom.support')); ?></div>
          <div class="divider"></div>
					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item"><a href="<?php echo e(route('howto')); ?>"><?php echo e(__('page.howto')); ?></a></li>
            <li class="list-group-item"><a href="<?php echo e(route('contact')); ?>"><?php echo e(__('bottom.contact')); ?></a></li>
            <li class="list-group-item"><a href=""><?php echo e(__('bottom.userhelp')); ?></a></li>
						<li class="list-group-item"><a href=""><?php echo e(__('bottom.customerhelp')); ?></a></li>
						<li class="list-group-item"><a href="<?php echo e(route('services')); ?>"><?php echo e(__('page.services')); ?></a></li>
						<li class="list-group-item"><a href=""><?php echo e(__('bottom.sitemap')); ?></a></li>
					</ul>
				</div>
        <br>
			</div>
      <br>
			<div id="newsletters" class="col-sm-6 col-md-3">
        <br>
				<form action="<?php echo e(route('subscribers.store')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="form-title"><?php echo e(__('bottom.newsletterheader')); ?></div>
        
        <br>
					<div class="form-group">
						<label for="name"><?php echo e(__('form.name')); ?></label>
						<input type="text" class="form-control" name="name" id="subname" placeholder="Name" required>
					</div>
					<div class="form-group">
						<label for="email"><?php echo e(__('form.email')); ?></label>
						<input type="email" class="form-control" name="email" id="subemail" placeholder="Email" required>
					</div>
          <br>
					<button id="btn" type="submit" class="btn btn-info btn-block"><?php echo e(__('bottom.newslettersubscribe')); ?></button>
				</form>
			</div>
		</div>
    
	</div>
  
</div>

<?php /**PATH /opt/lampp/htdocs/karvali/resources/views/partials/bottom.blade.php ENDPATH**/ ?>