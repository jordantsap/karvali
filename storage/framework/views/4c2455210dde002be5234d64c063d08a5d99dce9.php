

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_posts', App\Post::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('posts.create')); ?>">Add New</a></small>
        <?php endif; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Active</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Description</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts','update_posts', App\Post::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($post->id); ?></td>
                    <td><?php echo e($post->active?"yes":'no'); ?></td>
                    <td>
                      <?php if( ! empty($post->category)): ?><?php echo e($post->category->name); ?>

                      <?php else: ?> None
                      <?php endif; ?>
                    </td>
                    <td><?php echo e($post->title); ?></td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/posts/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>"></td>
                    <td><?php echo e(Str::limit($post->description, 20)); ?></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_posts', App\Post::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('posts.edit', $post->id)); ?>">Edit</a> -
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts', App\Post::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('posts.show', $post->id)); ?>">View</a>
                    <?php endif; ?>
                    </td>
                  </tr>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts','update_posts', App\Post::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($posts->links()); ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>