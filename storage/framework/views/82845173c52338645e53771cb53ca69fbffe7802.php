
<?php $__env->startSection('content'); ?>
  <div class="row">
      <div class="col-lg-8 mx-auto">
          <div class="card">
              <div class="card-header">
                  <h1 class="mb-0 h6"><?php echo e(translate('General Settings')); ?></h1>
              </div>
              <div class="card-body">
                  <form action="<?php echo e(route('settings.update')); ?>" method="POST" >
                      <?php echo csrf_field(); ?>
                      <div class="form-group row">
                          <label class="col-sm-3 col-from-label"><?php echo e(translate('System Name')); ?></label>
                          <div class="col-sm-9">
                              <input type="hidden" name="types[]" value="site_name">
                              <input type="text" name="site_name" class="form-control" value="<?php echo e(env('APP_NAME')); ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-from-label"><?php echo e(translate('System Logo')); ?></label>
                          <div class="col-sm-9">
                              <div class="input-group" data-toggle="aizuploader" data-type="image">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text bg-soft-secondary"><?php echo e(translate('Browse')); ?></div>
                                  </div>
                                  <div class="form-control file-amount"><?php echo e(translate('Choose Files')); ?></div>
                                  <input type="hidden" name="types[]" value="system_logo">
                                  <input type="hidden" name="system_logo" value="<?php echo e(get_setting('system_logo')); ?>" class="selected-files">
                              </div>
                              <div class="file-preview box sm"></div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-from-label"><?php echo e(translate('System Timezone')); ?></label>
                          <div class="col-sm-9">
                              <input type="hidden" name="types[]" value="timezone">
                              <select name="timezone" class="form-control aiz-selectpicker" data-live-search="true">
                                  <?php $__currentLoopData = timezones(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($value); ?>" <?php if( env('APP_TIMEZONE') == $value): ?>
                                          selected
                                      <?php endif; ?>><?php echo e($key); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-from-label"><?php echo e(translate('Admin login page background')); ?></label>
                          <div class="col-sm-9">
                              <div class="input-group" data-toggle="aizuploader" data-type="image">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text bg-soft-secondary"><?php echo e(translate('Browse')); ?></div>
                                  </div>
                                  <div class="form-control file-amount"><?php echo e(translate('Choose Files')); ?></div>
                                  <input type="hidden" name="types[]" value="admin_login_background">
                                  <input type="hidden" name="admin_login_background" value="<?php echo e(get_setting('admin_login_background')); ?>" class="selected-files">
                              </div>
                              <div class="file-preview box sm"></div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-from-label"><?php echo e(translate('Member Code Prefix')); ?></label>
                          <div class="col-sm-9">
                              <input type="hidden" name="types[]" value="member_code_prifix">
                              <input type="text" name="member_code_prifix" class="form-control" value="<?php echo e(get_setting('member_code_prifix')); ?>">
                          </div>
                      </div>
                      <div class="text-right">
                          <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-8 mx-auto">
          <div class="card">
              <div class="card-header">
                  <h1 class="mb-0 h6"><?php echo e(translate('Activation')); ?></h1>
              </div>
              <div class="card-body">
                  <div class="form-group row">
                        <label class="col-sm-8 col-from-label"><?php echo e(translate('HTTPS Activation')); ?></label>
                        <div class="col-sm-4">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'FORCE_HTTPS')" <?php if(env('FORCE_HTTPS') == 'On') echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-from-label"><?php echo e(translate('Maintenance Mode Activation')); ?></label>
                        <div class="col-sm-4">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'maintenance_mode')" <?php if(\App\Models\Setting::where('type', 'maintenance_mode')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-from-label"><?php echo e(translate('Email Verification')); ?>

                                <i>
                                    <code>(<?php echo e(translate('You need to configure SMTP correctly to enable this feature.')); ?> <a href="<?php echo e(route('smtp_settings')); ?>"><?php echo e(translate('Configure Now')); ?></a>)</code>
                                </i>
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'email_verification')" <?php if(get_setting('email_verification') == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-from-label"><?php echo e(translate('Member Approval by Admin Activation')); ?></label>
                        <div class="col-sm-4">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'member_approval_by_admin')" <?php if(get_setting('member_approval_by_admin') == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-from-label"><?php echo e(translate('Only Premium Member Can See Other Members Full Profile.')); ?>

                                <i>
                                    <code>(<?php echo e(translate('If you disable this, everyone will be able to see the members full profile.')); ?>)</code>
                                </i>
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="updateSettings(this, 'full_profile_show_according_to_membership')" <?php if(get_setting('full_profile_show_according_to_membership') == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('<?php echo e(route('settings.activation.update')); ?>', {_token:'<?php echo e(csrf_token()); ?>', type:type, value:value}, function(data){
                if(data == '1'){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Settings updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/settings/general_settings.blade.php ENDPATH**/ ?>