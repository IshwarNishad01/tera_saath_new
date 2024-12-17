
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Add New Image to Gallery')); ?></h5>
        </div>
        <div class="card-body">
          <form action="<?php echo e(route('gallery-image.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="signinSrEmail"><?php echo e(translate('Image')); ?></label>
                    <div class="col-md-9">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                            </div>
                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                            <input type="hidden" name="gallery_image" class="selected-files" required>
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="col-md-11">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Confirm')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/gallery_image/create.blade.php ENDPATH**/ ?>