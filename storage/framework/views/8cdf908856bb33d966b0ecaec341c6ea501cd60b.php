

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Email Templates')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                <?php $__currentLoopData = $email_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $email_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="nav-link <?php if($email_template->id == 1): ?> active <?php endif; ?>" id="v-pills-tab-2" data-toggle="pill" href="#v-pills-<?php echo e($email_template->id); ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo e(translate(ucwords(str_replace('_', ' ', $email_template->identifier)))); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php $__currentLoopData = $email_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $email_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade show <?php if($email_template->id == 1): ?> active <?php endif; ?>" id="v-pills-<?php echo e($email_template->id); ?>" role="tabpanel" aria-labelledby="v-pills-tab-1">
                                        <form action="<?php echo e(route('email-templates.update')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="identifier" value="<?php echo e($email_template->identifier); ?>">
                                            <?php if($email_template->identifier != 'password_reset_email'): ?>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                            <input value="1" name="status" type="checkbox" <?php if($email_template->status == 1): ?>
                                                                checked
                                                            <?php endif; ?>>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"><?php echo e(translate('Subject')); ?></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="subject" value="<?php echo e($email_template->subject); ?>" class="form-control" placeholder="<?php echo e(translate('Subject')); ?>" required>
                                                    <?php $__errorArgs = ['subject'];
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
                                                <label class="col-md-2 col-form-label"><?php echo e(translate('Email Body')); ?></label>
                                                <div class="col-md-10">
                                                    <textarea name="body" class="form-control aiz-text-editor" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="300" required><?php echo e($email_template->body); ?></textarea>
                                                    <small class="form-text text-danger"><?php echo e(('**N.B : Do Not Change The Variables Like [[ ____ ]].**')); ?></small>
                                                    <?php $__errorArgs = ['body'];
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
                                            <div class="form-group mb-3 text-right">
                                                <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Settings')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/settings/email_templates/index.blade.php ENDPATH**/ ?>