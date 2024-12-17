
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="fs-18 mb-0"><?php echo e(translate('Send Bulk SMS')); ?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo e(route('bulk_sms.send')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="name"><?php echo e(translate('Mobile Users')); ?></label>
                        <div class="col-sm-10">
                            <select class="form-control aiz-selectpicker" name="user_phones[]" multiple data-selected-text-format="count" data-actions-box="true">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->phone != null): ?>
                                        <option value="<?php echo e($user->phone); ?>"><?php echo e($user->first_name.' '.$user->last_name); ?> - <?php echo e($user->phone); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="name"><?php echo e(translate('SMS content')); ?></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="content" required></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Send')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/addons/otp_systems/bulk_sms/index.blade.php ENDPATH**/ ?>