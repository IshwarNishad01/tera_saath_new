<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Lifestyle')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('lifestyles.update', $member->id)); ?>" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        <?php echo csrf_field(); ?>
        <!-- <div class="form-group row">
            <div class="col-md-6">
                <label for="diet"><?php echo e(translate('Diet')); ?></label>
                <input type="text" name="diet" value="<?php echo e(!empty($member->lifestyles->diet) ? $member->lifestyles->diet : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Diet')); ?>">
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
            </div>
            <div class="col-md-6">
                <label for="drink"><?php echo e(translate('Drink')); ?></label>
                <input type="text" name="drink" value="<?php echo e(!empty($member->lifestyles->drink) ? $member->lifestyles->drink : ""); ?>" placeholder="<?php echo e(translate('Drink')); ?>" class="form-control">
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
            </div>
        </div> -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="smoke"><?php echo e(translate('Veg./Non-Veg.')); ?></label>
                <select class="form-control" name="smoke">
                    <option>Select Option</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Non-Vegetarian">Non-Vegetarian</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="living_with"><?php echo e(translate('Living With')); ?></label>
                <input type="text" name="living_with" value="<?php echo e(!empty($member->lifestyles->living_with) ? $member->lifestyles->living_with : ""); ?>" placeholder="<?php echo e(translate('Living With')); ?>" class="form-control">
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
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/lifestyle.blade.php ENDPATH**/ ?>