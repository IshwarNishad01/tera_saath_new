

<?php $__env->startSection('content'); ?>
<div class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <div class="bg-white rounded shadow-sm p-4 text-left">
                    <h1 class="h3 fw-600"><?php echo e(translate('Reset Password')); ?></h1>
                    <p class="mb-4 opacity-60"><?php echo e(translate('Enter your email address and new password and confirm password.')); ?> </p>
                    <form method="POST" action="<?php echo e(route('password.update')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" required autofocus>

                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <input id="code" type="text" class="form-control<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" name="code" value="<?php echo e($email ?? old('code')); ?>" placeholder="Code" required autofocus>

                            <?php if($errors->has('code')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('code')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="<?php echo e(translate('New Password')); ?>" required>

                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(translate('Confirm Password')); ?>" required>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-block">
                                <?php echo e(translate('Reset Password')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>