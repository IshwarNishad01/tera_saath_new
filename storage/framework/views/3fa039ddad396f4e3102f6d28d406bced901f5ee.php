<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Language')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('member.language_info_update', $member->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="diet"><?php echo e(translate('Mother Tongue')); ?></label>
            <select class="form-control aiz-selectpicker" name="mothere_tongue" data-live-search="true">
                <option value=""><?php echo e(translate('Select One')); ?></option>
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($language->id); ?>" <?php if($language->id == $member->member->mothere_tongue): ?> selected <?php endif; ?>> <?php echo e($language->name); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['mothere_tongue'];
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
        <div class="form-group">
            <label for="drink"><?php echo e(translate('Known Languages')); ?></label>
            <?php $known_languages = !empty($member->member->known_languages) ? json_decode($member->member->known_languages) : [] ; ?>
            <select class="form-control aiz-selectpicker" name="known_languages[]" data-live-search="true" multiple>
                <option value=""><?php echo e(translate('Select')); ?></option>
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($language->id); ?>" <?php if(in_array($language->id, $known_languages)): ?> selected <?php endif; ?> ><?php echo e($language->name); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['known_languages'];
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

        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/language.blade.php ENDPATH**/ ?>