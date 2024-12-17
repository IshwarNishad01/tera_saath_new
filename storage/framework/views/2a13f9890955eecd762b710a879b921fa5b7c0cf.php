<form action="<?php echo e(route('members.package_do_update', $member_id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="modal-header">
        <h5 class="modal-title h6"><?php echo e(translate('Upgrade Package')); ?></h5>
        <button type="button" class="close" data-dismiss="modal"></button>
    </div>
    <div class="modal-body">
        <div class="row gutters-10">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 col-md-3">
                <label class="aiz-megabox d-block mb-3">
                    <input value="<?php echo e($package->id); ?>" type="radio" name="package_id">
                    <span class="d-block p-3 aiz-megabox-elem">
                        <img src="<?php echo e(uploaded_asset($package->image)); ?>" class="img-fluid mb-2">
                        <span class="d-block text-center">
                            <span class="d-block fw-600 fs-15"><?php echo e($package->name); ?></span>
                        </span>
                    </span>
                </label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
    <button type="submit" class="btn btn-success"><?php echo e(translate('Submit')); ?></button>
</div>
</form>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/get_package.blade.php ENDPATH**/ ?>