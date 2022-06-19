

<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Companies
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_companies', App\Company::class)): ?>
          <small><a class="btn btn-primary" href="<?php echo e(route('company.create')); ?>">New</a></small>
        <?php endif; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Active</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Manager</th>
                  <th>Logo</th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_companies','update_companies', App\Company::class)): ?>
                    <th>Actions</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tbody>
                  <tr>
                    <td><?php echo e($company->id); ?></td>
                    <td><?php echo e($company->active?"yes":'no'); ?></td>
                    <td>
                      <?php if( ! empty($company->category)): ?><?php echo e($company->category->name); ?>

                      <?php else: ?> None
                      <?php endif; ?>
                    </td>
                    <td><?php echo e(Str::limit($company->title,10)); ?></td>
                    <td><?php echo e($company->manager); ?></td>
                    <td><img width="150px" height="150px" src="<?php echo e(asset('images/companies/'.$company->logo)); ?>" alt="<?php echo e($company->title); ?>"></td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_companies', App\Company::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('company.edit', $company->id)); ?>">Edit</a> -
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_companies', App\Company::class)): ?>
                      <a class="btn btn-primary" href="<?php echo e(route('company.show', $company->id)); ?>">View</a>
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_companies','update_companies', App\Company::class)): ?>
                      <th>Actions</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>
              <?php echo e($companies->links()); ?>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\wamp64\www\karvali\resources\views/admin/companies/index.blade.php ENDPATH**/ ?>