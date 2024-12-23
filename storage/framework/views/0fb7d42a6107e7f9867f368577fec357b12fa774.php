

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3"><?php echo e(translate('All Staffs')); ?></h1>
		</div>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_staffs')): ?>
			<div class="col-md-6 text-md-right">
				<a href="<?php echo e(route('staffs.create')); ?>" class="btn btn-circle btn-info">
					<span><?php echo e(translate('Add New Staffs')); ?></span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Staffs')); ?></h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th><?php echo e(translate('Name')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Email')); ?></th>
					<th data-breakpoints="md"><?php echo e(translate('Phone')); ?></th>
                    <th><?php echo e(translate('Role')); ?></th>
                    <th class="text-right"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($staff->user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($staffs->currentPage() - 1)*$staffs->perPage()); ?></td>
                            <td><?php echo e($staff->user->first_name.' '.$staff->user->last_name); ?></td>
                            <td><?php echo e($staff->user->email); ?></td>
							<td><?php echo e($staff->user->phone); ?></td>
                            <td>
								<?php if($staff->role != null): ?>
									<?php echo e($staff->role->name); ?>

								<?php endif; ?>
							</td>
                            <td class="text-right">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_staffs')): ?>
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('staffs.edit', encrypt($staff->id))); ?>" title="<?php echo e(translate('Edit')); ?>">
		                                <i class="las la-edit"></i>
		                            </a>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_staffs')): ?>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('staffs.destroy', $staff->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
		                                <i class="las la-trash"></i>
		                            </a>
								<?php endif; ?>
	                        </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($staffs->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/staff/staffs/index.blade.php ENDPATH**/ ?>