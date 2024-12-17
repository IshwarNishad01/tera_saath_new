<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Spiritual & Social Background')); ?></h5>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('spiritual_backgrounds.update', $member->id)); ?>" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="address_type" value="present">
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="member_religion_id"><?php echo e(translate('Religion')); ?></label>
                  <select class="form-control aiz-selectpicker" name="member_religion_id" id="member_religion_id" data-live-search="true" required>
                      <option value=""><?php echo e(translate('Select One')); ?></option>
                      <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($religion->id); ?>" <?php if($religion->id == $member_religion_id): ?> selected <?php endif; ?>> <?php echo e($religion->name); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['member_religion_id'];
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
                  <label for="member_caste_id"><?php echo e(translate('Caste')); ?></label>
                  <select class="form-control aiz-selectpicker" name="member_caste_id" id="member_caste_id" data-live-search="true" required>

                  </select>
                  <?php $__errorArgs = ['member_caste_id'];
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
              <div class="col-md-6" style="display: none;">
                  <label for="member_sub_caste_id"><?php echo e(translate('Sub Caste')); ?></label>
                  <select class="form-control aiz-selectpicker" name="member_sub_caste_id" id="member_sub_caste_id" data-live-search="true">

                  </select>
              </div>
              <div class="col-md-6">
                  <label for="ethnicity"><?php echo e(translate('Gotra')); ?></label>
                  <input type="text" name="ethnicity" value="<?php echo e(!empty($member->spiritual_backgrounds->ethnicity) ? $member->spiritual_backgrounds->ethnicity : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Ethnicity')); ?>">
                  <?php $__errorArgs = ['gotra'];
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
              <!-- <div class="col-md-6">
                  <label for="personal_value"><?php echo e(translate('Personal Value')); ?></label>
                  <input type="text" name="personal_value" value="<?php echo e(!empty($member->spiritual_backgrounds->personal_value) ? $member->spiritual_backgrounds->personal_value : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Personal Value')); ?>">
                  <?php $__errorArgs = ['personal_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <small class="form-text text-danger"><?php echo e($message); ?></small>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div> -->
              <div class="col-md-6">
                  <label for="family_value_id"><?php echo e(translate('Family Value')); ?></label>
                  <select class="form-control aiz-selectpicker" name="family_value_id" data-live-search="true">
                      <option value=""><?php echo e(translate('Select One')); ?></option>
                      <?php $__currentLoopData = $family_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $family_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($family_value->id); ?>" <?php if($religion->id == !empty($member->spiritual_backgrounds->ethnicity) ? $member->spiritual_backgrounds->ethnicity : "" ): ?> selected <?php endif; ?>> <?php echo e($family_value->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
          </div>
          <!-- <div class="form-group row">
              <div class="col-md-6">
                  <label for="community_value"><?php echo e(translate('Community Value')); ?></label>
                  <input type="text" name="community_value" value="<?php echo e(!empty($member->spiritual_backgrounds->community_value) ? $member->spiritual_backgrounds->community_value : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Community Value')); ?>">
                  <?php $__errorArgs = ['community_value'];
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
          <div class="text-right">
              <button type="submit" class="btn btn-primary btn-sm"><?php echo e(translate('Update')); ?></button>
          </div>
      </form>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/spiritual_backgrounds.blade.php ENDPATH**/ ?>