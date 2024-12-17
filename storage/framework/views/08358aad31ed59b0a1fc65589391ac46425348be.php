<form action="<?php echo e(route('education.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h5 class="modal-title h6"><?php echo e(translate('Add New Education Info')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="user_id" value="<?php echo e($member_id); ?>">
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Degree')); ?></label>
            <div class="col-md-9">
                <input type="text" name="degree" class="form-control" placeholder="<?php echo e(translate('Degree')); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Institution')); ?></label>
            <div class="col-md-9">
                <input type="text" name="institution"  placeholder="<?php echo e(translate('Institution')); ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group row" style="display: none">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Start')); ?></label>
            <div class="col-md-9">
                <input type="number" value="1" name="education_start" class="form-control" placeholder="<?php echo e(translate('Start')); ?>" required>
            </div>
        </div>
        <div class="form-group row" style="display: none">
            <label class="col-md-3 col-form-label"><?php echo e(translate('End')); ?></label>
            <div class="col-md-9">
                <input type="number" value="1" name="education_end"  placeholder="<?php echo e(translate('End')); ?>" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(translate('Add New Education Info')); ?></button>
    </div>
</form>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/education/create.blade.php ENDPATH**/ ?>