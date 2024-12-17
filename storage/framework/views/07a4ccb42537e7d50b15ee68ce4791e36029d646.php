<form action="<?php echo e(route('career.update', $career->id)); ?>" method="POST">
    <input name="_method" type="hidden" value="PATCH">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h5 class="modal-title h6"><?php echo e(translate('Edit Career Info')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Designation')); ?></label>
            <div class="col-md-9">
                <input type="text" name="designation" value="<?php echo e($career->designation); ?>" class="form-control" placeholder="<?php echo e(translate('designation')); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Company')); ?></label>
            <div class="col-md-9">
                <input type="text" name="company" value="<?php echo e($career->company); ?>"  placeholder="<?php echo e(translate('company')); ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Salary')); ?></label>
            <div class="col-md-9">
                <input type="text" name="package" value="<?php echo e($career->package); ?>"  placeholder="<?php echo e(translate('salary')); ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Start')); ?></label>
            <div class="col-md-9">
                <input type="number" name="career_start" value="<?php echo e($career->start); ?>" class="form-control" placeholder="<?php echo e(translate('Start')); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('End')); ?></label>
            <div class="col-md-9">
                <input type="number" name="career_end" value="<?php echo e($career->end); ?>"  placeholder="<?php echo e(translate('End')); ?>" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Career Info')); ?></button>
    </div>
</form>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/career/edit.blade.php ENDPATH**/ ?>