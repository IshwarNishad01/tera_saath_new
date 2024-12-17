

<?php $__env->startSection('content'); ?>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Staff Information')); ?></h5>
        </div>

        <form class="form-horizontal" action="<?php echo e(route('staffs.store')); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="first_name"><?php echo e(translate('First Name')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="first_name" placeholder="<?php echo e(translate('First Name')); ?>" id="first_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="last_name"><?php echo e(translate('Last Name')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" placeholder="<?php echo e(translate('Last Name')); ?>" id="last_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="email"><?php echo e(translate('Email')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="email" placeholder="<?php echo e(translate('Email')); ?>" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="mobile"><?php echo e(translate('Phone')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" placeholder="<?php echo e(translate('Phone')); ?>" id="mobile" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="password"><?php echo e(translate('Password')); ?></label>
                    <div class="col-sm-9">
                        <input type="password" name="password" splaceholder="<?php echo e(translate('Password')); ?>" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="password"><?php echo e(translate('Role')); ?></label>
                    <div class="col-sm-9">
                        <select name="role_id" required class="form-control aiz-selectpicker">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/staff/staffs/create.blade.php ENDPATH**/ ?>