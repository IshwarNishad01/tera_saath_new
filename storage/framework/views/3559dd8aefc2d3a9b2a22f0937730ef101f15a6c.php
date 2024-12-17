<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Family Information')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('families.update', $member->id)); ?>" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="father"><?php echo e(translate('Father')); ?></label>
                <input type="text" name="father" value="<?php echo e(!empty($member->families->father) ? $member->families->father : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Father')); ?>">
                <?php $__errorArgs = ['father'];
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
                <label for="father"><?php echo e(translate('Father Description')); ?></label>
                <input type="text" name="fatherdesc" value="<?php echo e(!empty($member->families->fatherdesc) ? $member->families->fatherdesc : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Father Description')); ?>">
                <?php $__errorArgs = ['father description'];
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
                <label for="mother"><?php echo e(translate('Mother')); ?></label>
                <input type="text" name="mother" value="<?php echo e(!empty($member->families->mother) ? $member->families->mother : ""); ?>" placeholder="<?php echo e(translate('Mother')); ?>" class="form-control">
                <?php $__errorArgs = ['mother'];
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
                <label for="father"><?php echo e(translate('Mother Description')); ?></label>
                <input type="text" name="motherdesc" value="<?php echo e(!empty($member->families->motherdesc) ? $member->families->motherdesc : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Mother Description')); ?>">
                <?php $__errorArgs = ['mother description'];
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
                <label for="sibling"><?php echo e(translate('Sibling')); ?></label>
                <input type="text" name="sibling" value="<?php echo e(!empty($member->families->sibling) ? $member->families->sibling : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Sibling')); ?>">
                <?php $__errorArgs = ['sibling'];
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
                <label for="sibling"><?php echo e(translate('Sibling Description')); ?></label>
                <input type="text" name="sibling_desc" value="<?php echo e(!empty($member->families->sibling_desc) ? $member->families->sibling_desc : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Sibling Description')); ?>">
                <?php $__errorArgs = ['sibling description'];
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
                <label for="sibling"><?php echo e(translate('Father Contact')); ?></label>
                <input type="text" name="father_number" value="<?php echo e(!empty($member->families->father_number) ? $member->families->father_number : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Father Contact')); ?>">
                <?php $__errorArgs = ['father contact'];
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
                <label for="sibling"><?php echo e(translate('Mother Contact')); ?></label>
                <input type="text" name="mother_number" value="<?php echo e(!empty($member->families->mother_number) ? $member->families->mother_number : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Mother Contact')); ?>">
                <?php $__errorArgs = ['mother contact'];
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
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/family_information.blade.php ENDPATH**/ ?>