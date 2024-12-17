

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Google Login Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="setting_type" value="google_login">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="google_login_activation" type="checkbox" <?php if(get_setting('google_login_activation') == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="GOOGLE_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Client ID')); ?></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="GOOGLE_CLIENT_ID" value="<?php echo e(env('GOOGLE_CLIENT_ID')); ?>" placeholder="<?php echo e(translate('Google Client ID')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="GOOGLE_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Client Secret')); ?></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="GOOGLE_CLIENT_SECRET" value="<?php echo e(env('GOOGLE_CLIENT_SECRET')); ?>" placeholder="<?php echo e(translate('Google Client Secret')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Facebook Login Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="setting_type" value="facebook_login">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="facebook_login_activation" type="checkbox" <?php if(get_setting('facebook_login_activation') == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('App ID')); ?></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="FACEBOOK_CLIENT_ID" value="<?php echo e(env('FACEBOOK_CLIENT_ID')); ?>" placeholder="<?php echo e(translate('Facebook Client ID')); ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="FACEBOOK_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('App Secret')); ?></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="FACEBOOK_CLIENT_SECRET" value="<?php echo e(env('FACEBOOK_CLIENT_SECRET')); ?>" placeholder="<?php echo e(translate('Facebook Client Secret')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Twitter Login Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="setting_type" value="twitter_login">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="twitter_login_activation" type="checkbox" <?php if(get_setting('twitter_login_activation') == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="TWITTER_CLIENT_ID">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Client ID')); ?></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="TWITTER_CLIENT_ID" value="<?php echo e(env('TWITTER_CLIENT_ID')); ?>" placeholder="<?php echo e(translate('Twitter Client ID')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="TWITTER_CLIENT_SECRET">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Client Secret')); ?></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="TWITTER_CLIENT_SECRET" value="<?php echo e(env('TWITTER_CLIENT_SECRET')); ?>" placeholder="<?php echo e(translate('Twitter Client Secret')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/settings/social_media_login.blade.php ENDPATH**/ ?>