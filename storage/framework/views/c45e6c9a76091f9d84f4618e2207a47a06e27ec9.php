
<?php $__env->startSection('content'); ?>
<div class="row">

  <!-- Paypal -->
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6 "><?php echo e(translate('Paypal Credential')); ?></h5>
          </div>
          <div class="card-body">
              <form action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                  <input type="hidden" name="payment_method" value="paypal">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="paypal_payment_activation" type="checkbox" <?php if(get_setting('paypal_payment_activation') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="PAYPAL_CLIENT_ID">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Paypal Client Id')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="PAYPAL_CLIENT_ID" value="<?php echo e(env('PAYPAL_CLIENT_ID')); ?>" placeholder="<?php echo e(translate('Paypal Client ID')); ?>" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="PAYPAL_CLIENT_SECRET">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Paypal Client Secret')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="PAYPAL_CLIENT_SECRET" value="<?php echo e(env('PAYPAL_CLIENT_SECRET')); ?>" placeholder="<?php echo e(translate('Paypal Client Secret')); ?>" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Paypal Sandbox Mode')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="paypal_sandbox" type="checkbox" <?php if(get_setting('paypal_sandbox') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Instamojo -->
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6 "><?php echo e(translate('Instamojo Credential')); ?></h5>
          </div>
          <div class="card-body">
              <form action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="payment_method" value="instamojo">
                  <div class="form-group row">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="instamojo_payment_activation" type="checkbox" <?php if(get_setting('instamojo_payment_activation') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="INSTAMOJO_API_KEY">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Instamojo API Key')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="INSTAMOJO_API_KEY" value="<?php echo e(env('INSTAMOJO_API_KEY')); ?>" placeholder="<?php echo e(translate('Instamojo API Key')); ?>" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="INSTAMOJO_AUTH_TOKEN">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Instamojo Auth Token')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="INSTAMOJO_AUTH_TOKEN" value="<?php echo e(env('INSTAMOJO_AUTH_TOKEN')); ?>" placeholder="<?php echo e(translate('Instamojo Auth Token')); ?>" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Instamojo Sandbox Mode')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="instamojo_sandbox" type="checkbox" <?php if(get_setting('instamojo_sandbox') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Stripe -->
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6 "><?php echo e(translate('Stripe Credential')); ?></h5>
          </div>
          <div class="card-body">
              <form action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="payment_method" value="stripe">
                  <div class="form-group row">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="stripe_payment_activation" type="checkbox" <?php if(get_setting('stripe_payment_activation') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>

                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="STRIPE_KEY">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Stripe Key')); ?></label>
                      </div>
                      <div class="col-md-8">
                      <input type="text" class="form-control" name="STRIPE_KEY" value="<?php echo e(env('STRIPE_KEY')); ?>" placeholder="<?php echo e(translate('STRIPE KEY')); ?>" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="STRIPE_SECRET">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Stripe Secret')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="STRIPE_SECRET" value="<?php echo e(env('STRIPE_SECRET')); ?>" placeholder="<?php echo e(translate('STRIPE SECRET')); ?>" >
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Razorpay -->
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6 "><?php echo e(translate('RazorPay Credential')); ?></h5>
          </div>
          <div class="card-body">
              <form action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="payment_method" value="razorpay">
                  <div class="form-group row">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="razorpay_payment_activation" type="checkbox" <?php if(get_setting('razorpay_payment_activation') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="RAZORPAY_KEY">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Razorpay Key')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="RAZORPAY_KEY" value="<?php echo e(env('RAZORPAY_KEY')); ?>" placeholder="<?php echo e(translate('Razorpay Key')); ?>" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <input type="hidden" name="types[]" value="RAZORPAY_SECRET">
                      <div class="col-md-4">
                          <label class="col-from-label"><?php echo e(translate('Razorpay Secret')); ?></label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="RAZORPAY_SECRET" value="<?php echo e(env('RAZORPAY_SECRET')); ?>" placeholder="<?php echo e(translate('Razorpay Secret')); ?>" >
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Manual Payment Method 1 -->
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6 "><?php echo e(translate('Manual Payment Method 1')); ?></h5>
          </div>
          <div class="card-body">
              <form action="<?php echo e(route('settings.update')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                      <div class="col-md-3">
                          <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_1_activation">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="manual_payment_1_activation" type="checkbox" <?php if(get_setting('manual_payment_1_activation') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-3">
                          <label class="col-from-label"><?php echo e(translate('Name')); ?></label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_1_name">
                          <input type="text" class="form-control" name="manual_payment_1_name" value="<?php echo e(get_setting('manual_payment_1_name')); ?>" placeholder="<?php echo e(translate('Name')); ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-3">
                          <label class="col-from-label"><?php echo e(translate('Instruction')); ?></label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_1_instruction">
                          <textarea class="aiz-text-editor form-control" name="manual_payment_1_instruction" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="200"><?php echo e(get_setting('manual_payment_1_instruction')); ?></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Image')); ?> <small>(Size)</small></label>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_1_image">
                          <div class="input-group" data-toggle="aizuploader" data-type="image">
                              <div class="input-group-prepend">
                                  <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                              </div>
                              <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                              <input type="hidden" name="manual_payment_1_image" class="selected-files" value="<?php echo e(get_setting('manual_payment_1_image')); ?>">
                          </div>
                          <div class="file-preview box sm">
                          </div>
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Manual Payment Method 2 -->
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6 "><?php echo e(translate('Manual Payment Method 2')); ?></h5>
          </div>
          <div class="card-body">
              <form action="<?php echo e(route('settings.update')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                      <div class="col-md-3">
                          <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_2_activation">
                          <label class="aiz-switch aiz-switch-success mb-0">
                              <input value="1" name="manual_payment_2_activation" type="checkbox" <?php if(get_setting('manual_payment_2_activation') == 1): ?>
                                  checked
                              <?php endif; ?>>
                              <span class="slider round"></span>
                          </label>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-3">
                          <label class="col-from-label"><?php echo e(translate('Name')); ?></label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_2_name">
                          <input type="text" class="form-control" name="manual_payment_2_name" value="<?php echo e(get_setting('manual_payment_2_name')); ?>" placeholder="<?php echo e(translate('Name')); ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-3">
                          <label class="col-from-label"><?php echo e(translate('Instruction')); ?></label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="types[]" value="manual_payment_2_instruction">
                          <textarea class="aiz-text-editor form-control" name="manual_payment_2_instruction" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="200"><?php echo e(get_setting('manual_payment_2_instruction')); ?></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Image')); ?> <small>(Size)</small></label>
                      <div class="col-md-9">
                          <div class="input-group" data-toggle="aizuploader" data-type="image">
                              <div class="input-group-prepend">
                                  <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                              </div>
                              <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                              <input type="hidden" name="types[]" value="manual_payment_2_image">
                              <input type="hidden" name="manual_payment_2_image" class="selected-files" value="<?php echo e(get_setting('manual_payment_2_image')); ?>">
                          </div>
                          <div class="file-preview box sm">
                          </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/settings/payment_method_settings.blade.php ENDPATH**/ ?>