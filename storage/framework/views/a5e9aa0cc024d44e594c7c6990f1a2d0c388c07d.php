<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Lifestyle')); ?></h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('lifestyles.update', $member->id)); ?>" method="POST">
            <input name="_method" type="hidden" value="PATCH">
            <?php echo csrf_field(); ?>
            <!-- <div class="form-group row">
                <div class="col-md-6">
                    <label for="diet"><?php echo e(translate('Diet')); ?></label>
                    <?php $user_diet = !empty($member->lifestyles->diet) ? $member->lifestyles->diet : ""; ?>
                    <select class="form-control aiz-selectpicker" name="diet" required>
                        <option value="yes" <?php if($user_diet ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="no" <?php if($user_diet ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <?php $__errorArgs = ['diet'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="form-text text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="drink"><?php echo e(translate('Drink')); ?></label>
                    <?php $user_drink = !empty($member->lifestyles->drink) ? $member->lifestyles->drink : ""; ?>
                    <select class="form-control aiz-selectpicker" name="drink" required>
                        <option value="yes" <?php if($user_drink ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="no" <?php if($user_drink ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <?php $__errorArgs = ['drink'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="form-text text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </select>
                </div>
            </div> -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="smoke"><?php echo e(translate('Veg./Non-Veg.')); ?></label>
                    <?php $user_smoke = !empty($member->lifestyles->smoke) ? $member->lifestyles->smoke : ""; ?>
                    <select class="form-control aiz-selectpicker" name="smoke" required>
                        <option>Select Value</option>
                        <option value="Vegetarian"><?php echo e(translate('Vegetarian')); ?></option>
                        <option value="Non-Vegetarian"><?php echo e(translate('Non-Vegetarian')); ?></option>
                        <?php $__errorArgs = ['smoke'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="form-text text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="living_with"><?php echo e(translate('Living With')); ?></label>
                    <input type="text" name="living_with" value="<?php echo e(!empty($member->lifestyles->living_with) ? $member->lifestyles->living_with : ""); ?>" placeholder="<?php echo e(translate('Living With')); ?>" class="form-control" required>
                    <?php $__errorArgs = ['living_with'];
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
                <button type="submit" class="btn btn-primary btn-sm"><?php echo e(translate('Update')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/lifestyle.blade.php ENDPATH**/ ?>