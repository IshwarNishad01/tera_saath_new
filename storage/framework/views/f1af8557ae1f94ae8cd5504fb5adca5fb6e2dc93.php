<form action="<?php echo e(route('career.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h5 class="modal-title h6"><?php echo e(translate('Add New Career Info')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="user_id" value="<?php echo e($member_id); ?>">
        <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Designation')); ?></label>
            <div class="col-md-9">
                <input type="text" name="designation" class="form-control" placeholder="<?php echo e(translate('designation')); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <!-- <label class="col-md-3 col-form-label"><?php echo e(translate('Company')); ?></label> -->
                    <select class="form-control aiz-selectpicker" name="company" required>
                        <option value="Government">Government</option>
                        <option value="Private">Private</option>
                        <option value="Businessman">Businessman</option>
                        <option value="MNC">MNC</option>
                        <option value="Not working">Not Working</option>
                    </select>
               <!--  <input type="text" name="company"   placeholder="<?php echo e(translate('company')); ?>" class="form-control" required> -->
            </div>
            <div class="form-group row">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Salary')); ?></label>
            <div class="col-md-9">
                <input type="text" name="package" class="form-control" placeholder="<?php echo e(translate('salary')); ?>">
            </div>
        </div>
        </div>
        <div class="form-group row" style="display: none;">
            <label class="col-md-3 col-form-label"><?php echo e(translate('Start')); ?></label>
            <div class="col-md-9">
                <input type="number" name="career_start" value="1" class="form-control" placeholder="<?php echo e(translate('Start')); ?>" required>
            </div>
        </div>
        <div class="form-group row" style="display: none;">
            <label class="col-md-3 col-form-label"><?php echo e(translate('End')); ?></label>
            <div class="col-md-9">
                <input type="number" name="career_end" value="1" placeholder="<?php echo e(translate('End')); ?>" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(translate('Add New Career Info')); ?></button>
    </div>
</form>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/career/create.blade.php ENDPATH**/ ?>