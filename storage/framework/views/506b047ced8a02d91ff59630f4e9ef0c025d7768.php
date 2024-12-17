<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Physical Attributes')); ?></h5>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('physical-attribute.update', $member->id)); ?>" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          <?php echo csrf_field(); ?>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="height"><?php echo e(translate('Height')); ?> (<?php echo e(translate('In Centimeter')); ?>)</label>
                  <select class="form-control aiz-selectpicker" data-live-search="true" name="height" value="<?php echo e(!empty($member->physical_attributes->height) ? $member->physical_attributes->height : ""); ?>">
                                    <option>Select height</option>
                                    <option>4'1"</option>
                                    <option>4'2"</option>
                                    <option>4'3"</option>
                                    <option>4'4"</option>
                                    <option>4'5"</option>
                                    <option>4'6"</option>
                                    <option>4'7"</option>
                                    <option>4'8"</option>
                                    <option>4'9"</option>
                                    <option>4'10</option>
                                    <option>5'0"</option>
                                    <option>5'1"</option>
                                    <option>5'2"</option>
                                    <option>5'3"</option>
                                    <option>5'4"</option>
                                    <option>5'5"</option>
                                    <option>5'6"</option>
                                    <option>5'7"</option>
                                    <option>5'8"</option>
                                    <option>5'9"</option>
                                    <option>5'10"</option>
                                    <option>6'0"</option>
                                    <option>6'1"</option>
                                    <option>6'2"</option>
                                    <option>6'3"</option>
                                    <option>6'4"</option>
                                    <option>6'5"</option>
                                    <option>6'6</option>
                                    <option>6'7</option>
                                    <option>6'8</option>
                                    <option>6'9</option>
                                    <option>6'10</option>
                                
                                </select>
                  <!-- <input type="number" name="height" value="<?php echo e(!empty($member->physical_attributes->height) ? $member->physical_attributes->height : ""); ?>" step="0.1" class="form-control" placeholder="<?php echo e(translate('Height')); ?>" > -->
                  <?php $__errorArgs = ['height'];
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
                  <label for="weight"><?php echo e(translate('Weight')); ?> (<?php echo e(translate('In Kg')); ?>)</label>
                  <input type="number" name="weight" value="<?php echo e(!empty($member->physical_attributes->weight) ? $member->physical_attributes->weight : ""); ?>" step="0.1" placeholder="<?php echo e(translate('Weight')); ?>" class="form-control" >
                  <?php $__errorArgs = ['weight'];
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
              <div class="col-md-6" style="display: block;">
                  <label for="eye_color"><?php echo e(translate('Eye color')); ?></label>
                  <input type="text" name="eye_color" value="<?php echo e(!empty($member->physical_attributes->eye_color) ? $member->physical_attributes->eye_color : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Eye Color')); ?>" >
                  <?php $__errorArgs = ['eye_color'];
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
              <div class="col-md-6" style="display: block;">
                  <label for="hair_color"><?php echo e(translate('Hair Color')); ?></label>
                  <input type="text" name="hair_color" value="<?php echo e(!empty($member->physical_attributes->hair_color) ? $member->physical_attributes->hair_color : ""); ?>" placeholder="<?php echo e(translate('Hair Color')); ?>" class="form-control" >
                  <?php $__errorArgs = ['hair_color'];
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
              <div class="col-md-6">
                  <label for="complexion"><?php echo e(translate('Complexion')); ?></label>
                  <input type="text" name="complexion" value="<?php echo e(!empty($member->physical_attributes->complexion) ? $member->physical_attributes->complexion : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Complexion')); ?>" >
                  <?php $__errorArgs = ['complexion'];
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
              <div class="col-md-6" style="display: block;">
                  <label for="blood_group"><?php echo e(translate('Blood Group')); ?></label>
                  <input type="text" name="blood_group" value="<?php echo e(!empty($member->physical_attributes->blood_group) ? $member->physical_attributes->blood_group : ""); ?>" placeholder="<?php echo e(translate('Blood Group')); ?>" class="form-control" >
                  <?php $__errorArgs = ['blood_group'];
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
                  <label for="body_type"><?php echo e(translate('Body Type')); ?></label>
                   <select class="form-control aiz-selectpicker" name="body_type" >
                        <option value="Normal">Normal</option>
                        <option value="Athlete">Athlete</option>
                        <option value="Disability">Disability</option>
                    </select>
                  <!-- <input type="text" name="body_type" value="<?php echo e(!empty($member->physical_attributes->body_type) ? $member->physical_attributes->body_type : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Body Type')); ?>" required> -->
                  <?php $__errorArgs = ['body_type'];
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

          <div class="form-group row" style="display:block;">
              
              <div class="col-md-6">
                  <label for="body_art"><?php echo e(translate('Body Art')); ?></label>
                  <input type="text" name="body_art" value="<?php echo e(!empty($member->physical_attributes->body_art) ? $member->physical_attributes->body_art : ""); ?>" placeholder="<?php echo e(translate('Body Art')); ?>" class="form-control" >
                  <?php $__errorArgs = ['body_art'];
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
              <div class="col-md-6" style="display:block">
                  <label for="disability"><?php echo e(translate('Disability')); ?></label>
                  <input type="text" name="disability" value="<?php echo e(!empty($member->physical_attributes->disability) ? $member->physical_attributes->disability : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Disability')); ?>">
                  <?php $__errorArgs = ['disability'];
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
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/physical_attributes.blade.php ENDPATH**/ ?>