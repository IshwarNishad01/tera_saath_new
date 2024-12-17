

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Edit Package Info')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('packages.update', $package->id)); ?>" method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Name')); ?></label>
                            <div class="col-md-9">
                                <input type="text" name="name" value="<?php echo e($package->name); ?>" class="form-control" placeholder="<?php echo e(translate('Package Name')); ?>" required>
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
                                <input type="number" name="actual_price"  value="<?php echo e($package->actual_price); ?>" class="form-control" placeholder="Actual Price" required>
                              
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
                                    <?php if($package->id == 1): ?>
                                      <input type="hidden" name="price" value="0" class="form-control">
                                      <input name="price" value="0" class="form-control" disabled>
                                    <?php else: ?>
                                      <input type="number" name="price" value="<?php echo e($package->price); ?>" class="form-control" placeholder="<?php echo e(translate('Price')); ?>" min="0" required>
                                    <?php endif; ?>
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
                            <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Package Image')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                    <input type="hidden" name="package_image" class="selected-files" value="<?php echo e($package->image); ?>">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Express Interest')); ?></label>
                            <div class="col-md-9">
                                <input type="number" name="express_interest" value="<?php echo e($package->express_interest); ?>" class="form-control" placeholder="<?php echo e(translate('Eg. 10')); ?>" min="0" required>
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
                                <input type="text" name="photo_gallery" value="<?php echo e($package->photo_gallery); ?>" class="form-control" placeholder="<?php echo e(translate('Eg. 10')); ?>" required>
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
                                <input type="number" name="contact" value="<?php echo e($package->contact); ?>" class="form-control" placeholder="<?php echo e(translate('Eg. 10')); ?>" required>
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
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Validity for')); ?></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" name="validity" value="<?php echo e($package->validity); ?>" class="form-control" placeholder="<?php echo e(translate('Eg. 30')); ?>" min="0" required>
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
                                <input type="text" name="additional" value="<?php echo e($package->additional); ?>" class="form-control" placeholder="<?php echo e(translate('Additional Features')); ?>" >
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
                                    <input type="checkbox" name="auto_profile_match" <?php if($package->auto_profile_match == "1"): ?> checked <?php endif; ?>>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Package Info')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/premium_packages/edit.blade.php ENDPATH**/ ?>