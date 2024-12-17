
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3"><?php echo e(translate('Website Header')); ?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Header Setting')); ?></h6>
			</div>
			<div class="card-body">
				<form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
					<div class="form-group row">
						<label class="col-md-3 col-from-label"><?php echo e(translate('Header Logo')); ?></label>
						<div class="col-md-8">
							<div class=" input-group " data-toggle="aizuploader" data-type="image">
								<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
								</div>
								<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
								<input type="hidden" name="types[]" value="header_logo">
								<input type="hidden" name="header_logo" class="selected-files" value="<?php echo e(get_setting('header_logo')); ?>">
							</div>
							<div class="file-preview">
							</div>
						</div>
					</div>
					<div class="form-group row">
              <label class="col-md-3 col-from-label"><?php echo e(translate('Header Left Quick Link')); ?></label>
              <div class="col-md-3">
                  <input type="hidden" name="types[]" value="header_left_quick_link1_text">
                  <input type="text" name="header_left_quick_link1_text" class="form-control" placeholder="<?php echo e(translate('Text')); ?>" value="<?php echo e(get_setting('header_left_quick_link1_text')); ?>">
              </div>
							<div class="col-md-5">
                  <input type="hidden" name="types[]" value="header_left_quick_link1">
                  <input type="text" name="header_left_quick_link1" class="form-control" placeholder="<?php echo e(translate('Link')); ?>" value="<?php echo e(get_setting('header_left_quick_link1')); ?>">
              </div>
          </div>
					<div class="form-group row">
              <label class="col-md-3 col-from-label"><?php echo e(translate('Helpline Number')); ?></label>
              <div class="col-md-8">
                  <input type="hidden" name="types[]" value="header_helpline_no">
                  <input type="text" name="header_helpline_no" class="form-control" placeholder="<?php echo e(translate('Help Line Number')); ?>" value="<?php echo e(get_setting('header_helpline_no')); ?>">
              </div>
          </div>
					<div class="form-group row">
						<label class="col-md-3 col-from-label"><?php echo e(translate('Enable Sticky header?')); ?></label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input type="hidden" name="types[]" value="header_stikcy">
								<input type="checkbox" name="header_stikcy" <?php if( get_setting('header_stikcy') == 'on'): ?> checked <?php endif; ?>>
								<span></span>
							</label>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/website_settings/header.blade.php ENDPATH**/ ?>