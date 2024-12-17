
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
      <div class="card-header">
          <h5 class="mb-0 h6"><?php echo e(translate('Change Password')); ?></h5>
      </div>
      <div class="card-body">
        <form action="<?php echo e(route('member.password_update', Auth::user()->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label class="col-md-3 col-form-label"><?php echo e(translate('Old Password')); ?><span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="<?php echo e(translate('Old Password')); ?>" required>
                    <?php $__errorArgs = ['old_password'];
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
                  <label class="col-md-3 col-form-label"><?php echo e(translate('Password')); ?><span class="text-danger">*</span></label>
                  <div class="col-md-9">
                      <input type="password" name="password" id="new_password" class="form-control" placeholder="<?php echo e(translate('Password')); ?>" required>
                      <?php $__errorArgs = ['password'];
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
                  <label class="col-md-3 col-form-label"><?php echo e(translate('Confirm Password')); ?><span class="text-danger">*</span></label>
                  <div class="col-md-9">
                      <input type="password" class="form-control" name="confirm_password" onkeyup="checkPasswordValidation(123)" id="confirm_password" placeholder="<?php echo e(translate('Confirm Password')); ?>" required>
                      <small id="confirm_password_help" class="form-text text-muted" style="color: red; display: none;"><?php echo e(translate('Mismatch Password.')); ?></small>
                      <?php $__errorArgs = ['confirm_password'];
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
              <div class="form-group row text-right">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" id="passSaveBtn" disabled><?php echo e(translate('Confirm')); ?></button>
                  </div>
              </div>
          </form>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

	function checkPasswordValidation(confirm_password) {
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        $('#confirm_password_help').show();
        if(new_password === confirm_password) {
            $('#confirm_password_help').text('Password Matched');
            $('#passSaveBtn').prop("disabled", false);
        }else {
            $('#confirm_password_help').text('Mismatched Password');
            $('#passSaveBtn').prop("disabled", true);
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/password_change.blade.php ENDPATH**/ ?>