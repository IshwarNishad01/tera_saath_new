

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Edit Caste Info')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('castes.update', $caste->id)); ?>" method="POST" >
                        <input name="_method" type="hidden" value="PATCH">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="name"><?php echo e(translate('Religion')); ?></label>
                            <select class="form-control aiz-selectpicker" data-live-search="true" name="religion" required>
                                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($religion->id); ?>" <?php if($religion->id == $caste->religion_id): ?> selected <?php endif; ?>><?php echo e($religion->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['religion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="form-text text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name"><?php echo e(translate('Caste Name')); ?></label>
                            <input type="text" id="name" name="name" value="<?php echo e($caste->name); ?>" class="form-control"
                                   required>
                           <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <small class="form-text text-danger"><?php echo e($message); ?></small>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/member_profile_attributes/castes/edit.blade.php ENDPATH**/ ?>