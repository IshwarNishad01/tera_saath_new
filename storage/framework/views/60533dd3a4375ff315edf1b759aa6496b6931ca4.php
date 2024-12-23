
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-8 col-xxl-6 mx-auto">
			<div class="card">
				<div class="card-header d-block d-md-flex">
					<h3 class="h6 mb-0"><?php echo e(translate('Update your system')); ?></h3>
					<span><?php echo e(translate('Current verion')); ?>: <?php echo e(get_setting('current_version')); ?></span>
				</div>
				<div class="card-body">
					<div class="alert alert-info mb-5">
						<ul class="mb-0">
							<li class="">
								<?php echo e(translate('Make sure your server has matched with all requirements.')); ?>

								<a href="<?php echo e(route('system_server')); ?>"><?php echo e(translate('Check Here')); ?></a>
							</li>
							<li class=""><?php echo e(translate('Download latest version from codecanyon.')); ?></li>
							<li class=""><?php echo e(translate('Extract downloaded zip. You will find updates.zip file in those extraced files.')); ?></li>
							<li class=""><?php echo e(translate('Upload that zip file here and click update now.')); ?></li>
							<li class=""><?php echo e(translate('If you are using any addon make sure to update those addons after updating.')); ?></li>
						</ul>
					</div>
					<form action="<?php echo e(route('update')); ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						<div class="row gutters-5">
							<div class="col-md">
								<div class="custom-file">
									<label class="custom-file-label">
										<input type="file" class="custom-file-input" name="update_zip">
										<span class="custom-file-name"><?php echo e(translate('Choose file')); ?></span>
									</label>
								</div>
							</div>
							<div class="col-md-auto">
								<button type="submit" class="btn btn-primary btn-block"><?php echo e(translate('Update Now')); ?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/system/update.blade.php ENDPATH**/ ?>