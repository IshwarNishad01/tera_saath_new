<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Personal Attitude & Behavior')); ?></h5>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('attitudes.update', $member->id)); ?>" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          <?php echo csrf_field(); ?>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="affection"><?php echo e(translate('Affection')); ?></label>
                  <input type="text" name="affection" value="<?php echo e(!empty($member->attitude->affection) ? $member->attitude->affection : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Affection')); ?>">
                  <?php $__errorArgs = ['affection'];
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
                  <label for="humor"><?php echo e(translate('Humor')); ?></label>
                  <input type="text" name="humor" value="<?php echo e(!empty($member->attitude->humor) ? $member->attitude->humor : ""); ?>" placeholder="<?php echo e(translate('Humor')); ?>" class="form-control">
                  <?php $__errorArgs = ['humor'];
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
                  <label for="political_views"><?php echo e(translate('Political Views')); ?></label>
                  <input type="text" name="political_views" value="<?php echo e(!empty($member->attitude->political_views) ? $member->attitude->political_views : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Political Views')); ?>">
              </div>
              <div class="col-md-6">
                  <label for="religious_service"><?php echo e(translate('Religious Service')); ?></label>
                  <input type="text" name="religious_service" value="<?php echo e(!empty($member->attitude->religious_service) ? $member->attitude->religious_service : ""); ?>" placeholder="<?php echo e(translate('Religious Service')); ?>" class="form-control">
              </div>
          </div>

          <div class="text-right">
              <button type="submit" class="btn btn-primary btn-sm"><?php echo e(translate('Update')); ?></button>
          </div>
      </form>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/attitudes_behavior.blade.php ENDPATH**/ ?>