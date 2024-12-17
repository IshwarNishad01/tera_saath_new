

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('All Roles')); ?></h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_staff_roles')): ?>
            <div class="col-md-6 text-right">
                <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-circle btn-primary"><?php echo e(translate('Add New Role')); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Add New Permission')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('roles.permission')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Name')); ?></label>
                        <input type="text" id="name" name="name" placeholder="<?php echo e(translate('Permission')); ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Parent')); ?></label>
                        <input type="text" id="parent" name="parent" placeholder="<?php echo e(translate('Parent')); ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3 text-right">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header row gutters-5">
  				<div class="col text-center text-md-left">
  					<h5 class="mb-md-0 h6"><?php echo e(translate('All Roles')); ?></h5>
  				</div>
  				<div class="col-md-3">
  					<form class="" id="sort_members" action="" method="GET">
  						<div class="input-group input-group-sm">
  					  		<input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_members)): ?> value="<?php echo e($sort_members); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name')); ?>">
  						</div>
  					</form>
  				</div>
		    </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th><?php echo e(translate('Name')); ?></th>
                            <th class="text-right"><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($role->name); ?></td>
                                <td class="text-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_staff_roles')): ?>
                                        <a href="<?php echo e(route('roles.edit', encrypt($role->id))); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($role->id != 1 && auth()->user()->can('delete_staff_roles')): ?>
                                        <a href="javascript:void(0);" data-href="<?php echo e(route('roles.destroy', $role->id)); ?>" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="<?php echo e(translate('Delete')); ?>">
                                            <i class="las la-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/staff/roles/index.blade.php ENDPATH**/ ?>