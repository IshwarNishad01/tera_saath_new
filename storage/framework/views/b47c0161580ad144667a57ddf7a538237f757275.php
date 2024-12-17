
<?php $__env->startSection('content'); ?>

<div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
		<strong class="fs-15"><?php echo e(translate('Cron Job Add Instruction')); ?>:</strong>
		<br>
		<i class="text-danger"><?php echo e(translate('You Must Add A Cron Job To Check The Validity Of The Members Package.')); ?></i>
		<ol class="mt-2">
        <li>
            <?php echo e(translate('To set a cron job, login to your cpanel and find the Cron Jobs option.')); ?>

        </li>
        <li>
            <?php echo e(translate('Go to Cron Jobs.')); ?>

        </li>
        <li>
            <?php echo e(translate('Add a new Cron Job.')); ?>

        </li>
        <li>
        	<?php echo e(translate('Select time period of Every Day')); ?>

        </li>
        <li>
            <?php echo e(translate('Set command as')); ?>,  wget -O – http://your-domain-name.com/check_for_package_invalid
        </li>
    </ol>
</div>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3"><?php echo e(translate('Premium Packages')); ?></h1>
		</div>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_package')): ?>
		<div class="col-md-6 text-md-right">
			<a href="<?php echo e(route('packages.create')); ?>" class="btn btn-circle btn-info">
				<span><?php echo e(translate('Add New Package')); ?></span>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('All Packages')); ?></h5>
            </div>
            <div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th><?php echo e(translate('Image')); ?></th>
							<th><?php echo e(translate('Name')); ?></th>
							<th data-breakpoints="md"><?php echo e(translate('Price')); ?></th>
							<th data-breakpoints="md"><?php echo e(translate('Status')); ?></th>
							<th class="text-right" width="10%"><?php echo e(translate('Options')); ?></th>
						</tr>
					</thead>
				<tbody>
				<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
				  <td><?php echo e(($key+1) + ($packages->currentPage() - 1)*$packages->perPage()); ?></td>
					<td>
						<img class="img-md" src="<?php echo e(uploaded_asset($package->image)); ?>" height="45px" alt="<?php echo e(translate('photo')); ?>">
					</td>
					<td><?php echo e($package->name); ?></td>
					<td><?php echo e($package->price); ?></td>
					<td>
						<label class="aiz-switch aiz-switch-success mb-0">
							<input type="checkbox" id="status.<?php echo e($key); ?>"
							   onchange="update_package_activation_status(this)" value="<?php echo e($package->id); ?>"
							   <?php if($package->active == 1): ?> checked <?php endif; ?> data-switch="success"/ <?php if(auth()->user()->cannot('edit_package')): ?> disabled <?php endif; ?>>
							<span></span>
						</label>
					</td>
					<td class="text-right">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_package')): ?>
							<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('packages.edit', encrypt($package->id))); ?>" title="<?php echo e(translate('Edit')); ?>">
								<i class="las la-edit"></i>
							</a>
						<?php endif; ?>
						<?php if($package->id != 1 && auth()->user()->can('delete_package')): ?>
							<a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('packages.destroy', $package->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
								<i class="las la-trash"></i>
							</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
				</table>
				<div class="aiz-pagination">
					<?php echo e($packages->appends(request()->input())->links()); ?>

				</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        function update_package_activation_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('<?php echo e(route('packages.update_package_activation_status')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    location.reload();
                } else {
                    AIZ.plugins.notify('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/premium_packages/index.blade.php ENDPATH**/ ?>