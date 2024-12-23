
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6"><?php echo e(translate('Google reCAPTCHA Setting')); ?></h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                    <input type="hidden" name="setting_type" value="google_recaptcha">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label"><?php echo e(translate('Activation')); ?></label>
                        </div>
                        <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="google_recaptcha_activation" type="checkbox" <?php if(get_setting('google_recaptcha_activation') == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="CAPTCHA_KEY">
                        <div class="col-md-3">
                            <label class="control-label"><?php echo e(translate('Site KEY')); ?></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="CAPTCHA_KEY" value="<?php echo e(env('CAPTCHA_KEY')); ?>" placeholder="<?php echo e(translate('Site KEY')); ?>" required>
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
                <h3 class="mb-0 h6"><?php echo e(translate('Google Analytics Settings')); ?></h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                    <input type="hidden" name="setting_type" value="google_analytics">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label"><?php echo e(translate('Activation')); ?></label>
                        </div>
                        <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="google_analytics_activation" type="checkbox" <?php if(get_setting('google_analytics_activation') == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="GOOGLE_ANALYTICS_TRACKING_ID">
                        <div class="col-md-3">
                            <label class="control-label"><?php echo e(translate('Tracking ID')); ?></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="GOOGLE_ANALYTICS_TRACKING_ID" value="<?php echo e(env('GOOGLE_ANALYTICS_TRACKING_ID')); ?>" placeholder="<?php echo e(translate('Tracking ID')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Facebook Chat Setting -->
    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"><?php echo e(translate('Facebook Chat')); ?></h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
    			<div class="col-lg-6">
    				<div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Facebook Chat Setting')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                              <input type="hidden" name="setting_type" value="facebook_chat">

                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-from-label"><?php echo e(translate('Facebook Chat')); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input value="1" name="facebook_chat_activation" type="checkbox" <?php if(get_setting('facebook_chat_activation') == 1): ?>
                                                checked
                                            <?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="FACEBOOK_PAGE_ID">
                                    <div class="col-md-3">
                                        <label class="col-from-label"><?php echo e(translate('Facebook Page ID')); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="FACEBOOK_PAGE_ID" value="<?php echo e(env('FACEBOOK_PAGE_ID')); ?>" placeholder="<?php echo e(translate('Facebook Page ID')); ?>" required>
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
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Please be carefull when you are configuring Facebook chat. For incorrect configuration you will not get messenger icon on your user-end site.')); ?></h5>
                        </div>
                          <div class="card-body">
                              <ul class="list-group mar-no">
                                  <li class="list-group-item text-dark">1. <?php echo e(translate('Login into your facebook page')); ?></li>
                                  <li class="list-group-item text-dark">2. <?php echo e(translate('Find the About option of your facebook page')); ?>.</li>
                                  <li class="list-group-item text-dark">3. <?php echo e(translate('At the very bottom, you can find the \“Facebook Page ID\”')); ?>.</li>
                                  <li class="list-group-item text-dark">4. <?php echo e(translate('Go to Settings of your page and find the option of \"Advance Messaging\"')); ?>.</li>
                                  <li class="list-group-item text-dark">5. <?php echo e(translate('Scroll down that page and you will get \"white listed domain\"')); ?>.</li>
                                  <li class="list-group-item text-dark">6. <?php echo e(translate('Set your website domain name')); ?>.</li>
                              </ul>
                          </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    
    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"><?php echo e(translate('Facebook Pixel')); ?></h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
    			<div class="col-lg-6">
    				<div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Facebook Pixel Setting')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                              <input type="hidden" name="setting_type" value="facebook_pixel">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-from-label"><?php echo e(translate('Facebook Pixel')); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input value="1" name="facebook_pixel_activation" type="checkbox" <?php if(get_setting('facebook_pixel_activation') == 1): ?>
                                                checked
                                            <?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="FACEBOOK_PIXEL_ID">
                                    <div class="col-lg-3">
                                        <label class="col-from-label"><?php echo e(translate('Facebook Pixel ID')); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="FACEBOOK_PIXEL_ID" value="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>" placeholder="<?php echo e(translate('Facebook Pixel ID')); ?>" required>
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
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Please be carefull when you are configuring Facebook pixel.')); ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group mar-no">
                                <li class="list-group-item text-dark">1. <?php echo e(translate('Log in to Facebook and go to your Ads Manager account')); ?>.</li>
                                <li class="list-group-item text-dark">2. <?php echo e(translate('Open the Navigation Bar and select Events Manager')); ?>.</li>
                                <li class="list-group-item text-dark">3. <?php echo e(translate('Copy your Pixel ID from underneath your Site Name and paste the number into Facebook Pixel ID field')); ?>.</li>
                            </ul>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    
    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"><?php echo e(translate('Facebook Comment')); ?></h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
    			<div class="col-lg-6">
    				<div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h5 class="mb-0 h6"><?php echo e(translate('Facebook Comment Setting')); ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('third_party_settings.update')); ?>" method="POST">
                              <input type="hidden" name="setting_type" value="facebook_comment">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-from-label"><?php echo e(translate('Facebook Comment')); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input value="1" name="facebook_comment_activation" type="checkbox" <?php if(get_setting('facebook_comment_activation') == 1): ?>
                                                checked
                                            <?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="types[]" value="FACEBOOK_APP_ID">
                                    <div class="col-lg-3">
                                        <label class="col-from-label"><?php echo e(translate('Facebook App ID')); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="FACEBOOK_APP_ID" value="<?php echo e(env('FACEBOOK_APP_ID')); ?>" placeholder="<?php echo e(translate('Facebook App ID')); ?>" required>
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
                    <div class="card shadow-none bg-light">
                    <div class="card-header">
                        <h5 class="mb-0 h6"><?php echo e(translate('Please be carefull when you are configuring Facebook Comment. For incorrect configuration you will not get comment section on your user-end site.')); ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group mar-no">
                            <li class="list-group-item text-dark">
                                1. <?php echo e(translate('Login into your facebook page')); ?>

                            </li>
                            <li class="list-group-item text-dark">
                                2. <?php echo e(translate('After then go to this URL https://developers.facebook.com/apps/')); ?>.
                            </li>
                            <li class="list-group-item text-dark">
                                3. <?php echo e(translate('Create Your App')); ?>.
                            </li>
                            <li class="list-group-item text-dark">
                                4. <?php echo e(translate('In Dashboard page you will get your App ID')); ?>.
                            </li>
                        </ul>
                    </div>
                	</div>
                </div>
            </div>
    	</div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/settings/third_party_settings.blade.php ENDPATH**/ ?>