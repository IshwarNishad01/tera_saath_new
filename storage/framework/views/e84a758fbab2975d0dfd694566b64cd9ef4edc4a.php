<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Residency Information')); ?></h5>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('recidencies.update', $member->id)); ?>" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          <?php echo csrf_field(); ?>
          <?php
              $birth_country_id = !empty($member->recidency->birth_country_id) ? $member->recidency->birth_country_id : "";
              $recidency_country_id = !empty($member->recidency->recidency_country_id) ? $member->recidency->recidency_country_id : "";
              $growup_country_id = !empty($member->recidency->growup_country_id) ? $member->recidency->growup_country_id : "";
          ?>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="birth_country_id"><?php echo e(translate('Birth Country')); ?></label>
                  <select class="form-control aiz-selectpicker" name="birth_country_id" data-live-search="true">
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->id); ?>" <?php if($country->id == $birth_country_id): ?> selected <?php endif; ?> ><?php echo e($country->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
              <div class="col-md-6">
                  <label for="recidency_country_id"><?php echo e(translate('Recidency Country')); ?></label>
                  <select class="form-control aiz-selectpicker" name="recidency_country_id" data-live-search="true">
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->id); ?>" <?php if($country->id == $recidency_country_id): ?> selected <?php endif; ?> ><?php echo e($country->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="growup_country_id"><?php echo e(translate('Growup Country')); ?></label>
                  <select class="form-control aiz-selectpicker" name="growup_country_id" data-live-search="true">
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->id); ?>" <?php if($country->id == $growup_country_id): ?> selected <?php endif; ?> ><?php echo e($country->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
              <div class="col-md-6">
                  <label for="immigration_status"><?php echo e(translate('Immigration Status')); ?></label>
                  <input type="text" name="immigration_status" value="<?php echo e(!empty($member->recidency->immigration_status) ? $member->recidency->immigration_status : ""); ?>" placeholder="<?php echo e(translate('Immigration Status')); ?>" class="form-control">
                  <?php $__errorArgs = ['immigration_status'];
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
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/residency_information.blade.php ENDPATH**/ ?>