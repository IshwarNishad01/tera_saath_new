<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Add Your Story')); ?></h5>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('happy-story.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group ">
              <label class="form-label" for="name"><?php echo e(translate('Story Title')); ?> <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="title"  placeholder="<?php echo e(translate('Title')); ?>" required>
              <?php $__errorArgs = ['title'];
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
          <div class="form-group">
              <label class="from-label" for="name"><?php echo e(translate('Story Details')); ?> <span class="text-danger">*</span></label>
              <textarea name="details" class="aiz-text-editor form-control" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="200"></textarea>
              <?php $__errorArgs = ['details'];
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
          <div class="form-group">
              <label class="from-label" for="name"><?php echo e(translate('Partner Name')); ?> <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="partner_name"  placeholder="<?php echo e(translate('Partner Name')); ?>" required>
              <?php $__errorArgs = ['partner_name'];
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
          <div class="form-group">
              <label class="form-label" for="signinSrEmail"><?php echo e(translate('Photos')); ?> <span class="text-danger">*</span></label>
              <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                  <div class="input-group-prepend">
                      <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                  </div>
                  <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                  <input type="hidden" name="photos" class="selected-files" required>
              </div>
              <div class="file-preview box sm">
              </div>
              <?php $__errorArgs = ['photos'];
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
          <div class="form-group ">
    					<label class="from-label"><?php echo e(translate('Video Provider')); ?></label>
  						<select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
  							<option value="youtube"><?php echo e(translate('Youtube')); ?></option>
  							<option value="dailymotion"><?php echo e(translate('Dailymotion')); ?></option>
  							<option value="vimeo"><?php echo e(translate('Vimeo')); ?></option>
  						</select>
  				</div>
  				<div class="form-group ">
  					<label class="from-label"><?php echo e(translate('Video Link')); ?></label>
  						<input type="text" class="form-control" name="video_link" placeholder="<?php echo e(translate('Video Link')); ?>">
              <small class="text-muted"><?php echo e(translate("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")); ?></small>
  				</div>
          <div class="form-group mb-0 text-right">
              <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
          </div>
        </from>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/happy_story/create.blade.php ENDPATH**/ ?>