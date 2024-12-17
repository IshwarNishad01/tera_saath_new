<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Permanent Address')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('address.update', $member->id)); ?>" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="address_type" value="permanent">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="permanent_country_id"><?php echo e(translate('Country')); ?></label>
                <select class="form-control aiz-selectpicker" name="permanent_country_id" id="permanent_country_id" data-live-search="true">
                    <option value=""><?php echo e(translate('Select One')); ?></option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php if($country->id == $permanent_country_id): ?> selected <?php endif; ?>><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['permanent_country_id'];
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
            <div class="col-md-6">
                <label for="permanent_state_id"><?php echo e(translate('State')); ?></label>
                <select class="form-control aiz-selectpicker" name="permanent_state_id" id="permanent_state_id" data-live-search="true">

                </select>
                <?php $__errorArgs = ['permanent_state_id'];
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
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="permanent_city_id"><?php echo e(translate('City')); ?></label>
                <select class="form-control aiz-selectpicker" name="permanent_city_id" id="permanent_city_id" data-live-search="true">

                </select>
                <?php $__errorArgs = ['permanent_city_id'];
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
            <div class="col-md-6">
                <label for="permanent_postal_code"><?php echo e(translate('Postal Code')); ?></label>
                <input type="text" name="permanent_postal_code" value="<?php echo e($permanent_postal_code); ?>" class="form-control" placeholder="<?php echo e(translate('Postal Code')); ?>">
                <?php $__errorArgs = ['permanent_postal_code'];
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
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/permanent_address.blade.php ENDPATH**/ ?>