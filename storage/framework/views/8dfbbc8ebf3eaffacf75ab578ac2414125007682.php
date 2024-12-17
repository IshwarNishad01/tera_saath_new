
<?php $__env->startSection('content'); ?>

    <div class="row">
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Twillo Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update_credentials')); ?>" method="POST">
                        <input type="hidden" name="otp_method" value="twillo">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="twillo_activation" type="checkbox" <?php if(get_setting('twillo_activation') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_SID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('TWILIO SID')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="TWILIO_SID" value="<?php echo e(env('TWILIO_SID')); ?>" placeholder="TWILIO SID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_AUTH_TOKEN">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('TWILIO AUTH TOKEN')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="TWILIO_AUTH_TOKEN" value="<?php echo e(env('TWILIO_AUTH_TOKEN')); ?>" placeholder="TWILIO AUTH TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_VERIFY_SID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('TWILIO VERIFY SID')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="TWILIO_VERIFY_SID" value="<?php echo e(env('TWILIO_VERIFY_SID')); ?>" placeholder="TWILIO VERIFY SID" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="VALID_TWILLO_NUMBER">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('VALID TWILLO NUMBER')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="VALID_TWILLO_NUMBER" value="<?php echo e(env('VALID_TWILLO_NUMBER')); ?>" placeholder="VALID TWILLO NUMBER" >
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Fast2SMS Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update_credentials')); ?>" method="POST">
                        <input type="hidden" name="otp_method" value="fast2sms">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="fast2sms_activation" type="checkbox" <?php if(get_setting('fast2sms_activation') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="AUTH_KEY">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('AUTH KEY')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="AUTH_KEY" value="<?php echo e(env('AUTH_KEY')); ?>" placeholder="AUTH KEY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="ROUTE">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('ROUTE')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <select class="form-control aiz-selectpicker" name="ROUTE" required>
                                    <option value="p" <?php if(env('ROUTE') == "p"): ?> selected <?php endif; ?>><?php echo e(translate('Promotional Use')); ?></option>
                                    <option value="t" <?php if(env('ROUTE') == "t"): ?> selected <?php endif; ?>><?php echo e(translate('Transactional Use')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="LANGUAGE">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('LANGUAGE')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <select class="form-control aiz-selectpicker" name="LANGUAGE" required>
                                    <option value="english" <?php if(env('LANGUAGE') == "english"): ?> selected <?php endif; ?>>English</option>
                                    <option value="unicode" <?php if(env('LANGUAGE') == "unicode"): ?> selected <?php endif; ?>>Unicode</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SENDER_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('SENDER ID')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="SENDER_ID" value="<?php echo e(env('SENDER_ID')); ?>" placeholder="6 digit SENDER ID" >
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('MIMO Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update_credentials')); ?>" method="POST">
                        <input type="hidden" name="otp_method" value="mimo">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="mimo_activation" type="checkbox" <?php if(get_setting('mimo_activation') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIMO_USERNAME">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('MIMO_USERNAME')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="MIMO_USERNAME" value="<?php echo e(env('MIMO_USERNAME')); ?>" placeholder="MIMO_USERNAME" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIMO_PASSWORD">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('MIMO_PASSWORD')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="MIMO_PASSWORD" value="<?php echo e(env('MIMO_PASSWORD')); ?>" placeholder="MIMO_PASSWORD" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MIMO_SENDER_ID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('MIMO_SENDER_ID')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="MIMO_SENDER_ID" value="<?php echo e(env('MIMO_SENDER_ID')); ?>" placeholder="MIMO_SENDER_ID" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('SSL Wireless Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update_credentials')); ?>" method="POST">
                        <input type="hidden" name="otp_method" value="ssl_wireless">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="ssl_wireless_activation" type="checkbox" <?php if(get_setting('ssl_wireless_activation') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSL_SMS_API_TOKEN">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('SSL SMS API TOKEN')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="SSL_SMS_API_TOKEN" value="<?php echo e(env('SSL_SMS_API_TOKEN')); ?>" placeholder="SSL SMS API TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSL_SMS_SID">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('SSL SMS SID')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="SSL_SMS_SID" value="<?php echo e(env('SSL_SMS_SID')); ?>" placeholder="SSL SMS SID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSL_SMS_URL">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('SSL SMS URL')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="SSL_SMS_URL" value="<?php echo e(env('SSL_SMS_URL')); ?>" placeholder="SSL SMS URL" >
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Nexmo Credential')); ?></h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('update_credentials')); ?>" method="POST">
                        <input type="hidden" name="otp_method" value="nexmo">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="nexmo_activation" type="checkbox" <?php if(get_setting('nexmo_activation') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NEXMO_KEY">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('NEXMO KEY')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="NEXMO_KEY" value="<?php echo e(env('NEXMO_KEY')); ?>" placeholder="NEXMO KEY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NEXMO_SECRET">
                            <div class="col-lg-3">
                                <label class="col-from-label"><?php echo e(translate('NEXMO SECRET')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="NEXMO_SECRET" value="<?php echo e(env('NEXMO_SECRET')); ?>" placeholder="NEXMO SECRET" required>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/addons/otp_systems/configurations/set_credentials.blade.php ENDPATH**/ ?>