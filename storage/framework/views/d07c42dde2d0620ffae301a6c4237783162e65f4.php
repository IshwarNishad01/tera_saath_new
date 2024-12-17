

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Add New Package')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('packages.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Name')); ?></label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" placeholder="<?php echo e(translate('Package Name')); ?>" required>
                                <?php $__errorArgs = ['name'];
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
                            <label class="col-md-3 col-form-label">Actual Price</label>
                            <div class="col-md-9">
                                <input type="number" name="actual_price" class="form-control" placeholder="Actual Price" required>
                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Price')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <?php echo \App\Models\Currency::where('id', get_setting('system_default_currency'))->first()->symbol; ?>
                                      </span>
                                    </div>
                                    <input type="number" name="price" class="form-control" placeholder="<?php echo e(translate('Price')); ?>" min="0" required>
                                </div>
                                <?php $__errorArgs = ['price'];
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Package Image')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group input-group-sm" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(translate('Choose Photo')); ?></div>
                                    <input type="hidden" name="package_image" class="selected-files" >
                                </div>
                                <div class="file-preview box"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Express Interest')); ?></label>
                            <div class="col-md-9">
                                <input type="number" name="express_interest" class="form-control" placeholder="<?php echo e(translate('Eg. 10')); ?>" min="0" required>
                                <?php $__errorArgs = ['express_interest'];
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Photo Gallery')); ?></label>
                            <div class="col-md-9">
                                <input type="number" name="photo_gallery" class="form-control" placeholder="<?php echo e(translate('Eg. 10')); ?>" required>
                                <?php $__errorArgs = ['photo_gallery'];
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('View Contact Info')); ?></label>
                            <div class="col-md-9">
                                <input type="number" name="contact" class="form-control" placeholder="<?php echo e(translate('Eg. 10')); ?>" required>
                                <?php $__errorArgs = ['contact'];
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Validity For')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" name="validity" class="form-control" placeholder="<?php echo e(translate('Eg. 30')); ?>" min="0" required>
                                    <div class="input-group-prepend"><span class="input-group-text"><?php echo e(translate('Days')); ?></span></div>
                                </div>
                                <?php $__errorArgs = ['validity'];
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Additional Features')); ?></label>
                            <div class="col-md-9">
                                <input type="text" name="additional" class="form-control" placeholder="<?php echo e(translate('Additional Features')); ?>" >
                                <?php $__errorArgs = ['additional'];
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Auto Profile Matching Show')); ?></label>
                            <div class="col-md-8 mt-3">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" checked="checked" name="auto_profile_match">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Add New Package')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/premium_packages/create.blade.php ENDPATH**/ ?>