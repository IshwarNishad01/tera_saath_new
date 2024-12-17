
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card">
          <div class="card-header">
              <h5 class="mb-0 h6"><?php echo e(translate('Edit Happy Story')); ?></h5>
          </div>
          <div class="card-body">
            <form action="<?php echo e(route('happy-story.update', $happy_story->id)); ?>" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                <?php echo csrf_field(); ?>
                <div class="form-group ">
                    <label class="form-label" for="name"><?php echo e(translate('Story Title')); ?> <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo e($happy_story->title); ?>"  placeholder="<?php echo e(translate('Title')); ?>" required>
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
                    <textarea name="details" class="aiz-text-editor form-control" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="200"><?php echo e($happy_story->details); ?></textarea>
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
                    <input type="text" name="partner_name" value="<?php echo e($happy_story->partner_name); ?>" class="form-control"  placeholder="<?php echo e(translate('Partner Name')); ?>" required>
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
                        <input type="hidden" name="photos" value="<?php echo e($happy_story->photos); ?>" class="selected-files" required>
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
        							<option value="youtube" <?php if($happy_story->video_provider == 'youtube'): ?> selected <?php endif; ?>><?php echo e(translate('Youtube')); ?></option>
        							<option value="dailymotion" <?php if($happy_story->video_provider == 'dailymotion'): ?> selected <?php endif; ?>><?php echo e(translate('Dailymotion')); ?></option>
        							<option value="vimeo" <?php if($happy_story->video_provider == 'vimeo'): ?> selected <?php endif; ?>><?php echo e(translate('Vimeo')); ?></option>
        						</select>
        				</div>
        				<div class="form-group ">
        					<label class="from-label"><?php echo e(translate('Video Link')); ?></label>
        						<input type="text" name="video_link" value="<?php echo e($happy_story->video_link); ?>" class="form-control" placeholder="<?php echo e(translate('Video Link')); ?>">
                    <small class="text-muted"><?php echo e(translate("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")); ?></small>
        				</div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
              </from>
          </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/happy_stories/edit.blade.php ENDPATH**/ ?>