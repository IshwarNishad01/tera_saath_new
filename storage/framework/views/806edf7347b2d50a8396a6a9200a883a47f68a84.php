<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Astronomic Information')); ?></h5>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('astrologies.update', $member->id)); ?>" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          <?php echo csrf_field(); ?>
          <!-- <div class="form-group row">
              <div class="col-md-6">
                  <label for="sun_sign"><?php echo e(translate('Sun Sign')); ?></label>
                  <input type="text" name="sun_sign" value="<?php echo e(!empty($member->astrologies->sun_sign) ? $member->astrologies->sun_sign : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Sun Sign')); ?>" required>
                  <?php $__errorArgs = ['sun_sign'];
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
              <div class="col-md-6">
                  <label for="moon_sign"><?php echo e(translate('Moon Sign')); ?></label>
                  <input type="text" name="moon_sign" value="<?php echo e(!empty($member->astrologies->moon_sign) ? $member->astrologies->moon_sign : ""); ?>" placeholder="<?php echo e(translate('Moon Sign')); ?>" class="form-control" required>
                  <?php $__errorArgs = ['moon_sign'];
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
          </div> -->
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="time_of_birth"><?php echo e(translate('Time Of Birth')); ?></label>
                  <input type="text" name="time_of_birth" value="<?php echo e(!empty($member->astrologies->time_of_birth) ? $member->astrologies->time_of_birth : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Time Of Birth')); ?>" required>
                  <?php $__errorArgs = ['time_of_birth'];
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
              <div class="col-md-6">
                  <label for="city_of_birth"><?php echo e(translate('City Of Birth')); ?></label>
                  <input type="text" name="city_of_birth" value="<?php echo e(!empty($member->astrologies->city_of_birth) ? $member->astrologies->city_of_birth : ""); ?>" placeholder="<?php echo e(translate('City Of Birth')); ?>" class="form-control" required>
                  <?php $__errorArgs = ['moon_sign'];
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

          <div class="text-right">
              <button type="submit" class="btn btn-primary btn-sm"><?php echo e(translate('Update')); ?></button>
          </div>
      </form>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/astronomic_information.blade.php ENDPATH**/ ?>