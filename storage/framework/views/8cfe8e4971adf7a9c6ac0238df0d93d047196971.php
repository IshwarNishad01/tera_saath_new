<form action="<?php echo e(route('education.update', $education->id)); ?>" method="POST">
    <input name="_method" type="hidden" value="PATCH">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h5 class="modal-title h6"><?php echo e(translate('Edit Education Info')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Degree')); ?></label>
            <div class="col-md-9">
                <input type="text" name="degree" value="<?php echo e($education->degree); ?>" class="form-control" placeholder="<?php echo e(translate('Degree')); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Institution')); ?></label>
            <div class="col-md-9">
                <input type="text" name="institution" value="<?php echo e($education->institution); ?>"  placeholder="<?php echo e(translate('Institution')); ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Start')); ?></label>
            <div class="col-md-9">
                <input type="number" name="education_start" value="<?php echo e($education->start); ?>" class="form-control" placeholder="<?php echo e(translate('Start')); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('End')); ?></label>
            <div class="col-md-9">
                <input type="number" name="education_end" value="<?php echo e($education->end); ?>"  placeholder="<?php echo e(translate('End')); ?>" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Education Info')); ?></button>
    </div>
</form>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/education/edit.blade.php ENDPATH**/ ?>