

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-md-0 h6"><?php echo e(translate('Update Role Information')); ?></h5>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('roles.update', $role->id)); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH">
            <div class="card-body">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Role Name')); ?><span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="name" value="<?php echo e($role->name); ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header bord-btm">
                    <h5 class="mb-md-0 h6"><?php echo e(translate('Permissions')); ?></h5>
                </div>
                <br>

                <?php
                    $permission_groups =  \App\Models\Permission::all()->groupBy('parent');
                ?>
                <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bd-example">
                        <ul class="list-group">
                          <li class="list-group-item bg-light" aria-current="true"><?php echo e(translate(ucwords((str_replace('_', ' ', $permission_group[0]['parent']))))); ?></li>
                          <li class="list-group-item">
                              <div class="row">
                                <?php $__currentLoopData = $permission_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $check = 'ok';
                                        if($permission_group[0]['parent'] == 'otp_system' || $permission_group[0]['parent'] == 'support_tickets')
                                        {
                                            if (addon_activation($permission_group[0]['parent']) == false) {
                                                $check = 'no';
                                            }
                                        }
                                    ?>
                                    <?php if($check == 'ok'): ?>
                                      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                          <div class="p-2 border mt-1 mb-2">
                                              <label class="control-label d-flex"><?php echo e(translate(ucwords(str_replace('_', ' ', $permission->name)))); ?></label>
                                              <label class="aiz-switch aiz-switch-success">
                                                  <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="<?php echo e($permission->id); ?>"
                                                      <?php if($role->hasPermissionTo($permission->name)): ?>
                                                          checked
                                                      <?php endif; ?> >
                                                  <span class="slider round"></span>
                                              </label>
                                          </div>
                                      </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                      </ul>
                  </div>
                  <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group mb-3 mt-3 text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                </div>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/staff/roles/edit.blade.php ENDPATH**/ ?>