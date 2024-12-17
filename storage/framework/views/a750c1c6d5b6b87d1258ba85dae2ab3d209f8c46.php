
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Family Values')); ?></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="<?php if(auth()->user()->can('add_family_value')): ?> col-lg-7 <?php else: ?> col-lg-12 <?php endif; ?>">
        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6"><?php echo e(translate('All Family Values')); ?></h5>
                </div>
                <div class="col-md-4">
                    <form class="" id="sort_family_values" action="" method="GET">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name & Enter')); ?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(translate('Name')); ?></th>
                            <th class="text-right" width="20%"><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $family_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $family_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1) + ($family_values->currentPage() - 1)*$family_values->perPage()); ?></td>
                                <td><?php echo e($family_value->name); ?></td>
                                <td class="text-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_family_value')): ?>
                                        <a href="javascript:void(0);" onclick="family_value_modal('<?php echo e(route('family-values.edit', encrypt($family_value->id) )); ?>')" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_family_value')): ?>
                                        <a href="javascript:void(0);" data-href="<?php echo e(route('family-values.destroy', $family_value->id)); ?>" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="<?php echo e(translate('Delete')); ?>">
                                            <i class="las la-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    <?php echo e($family_values->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_family_value')): ?>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Add New Family Value')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('family-values.store')); ?>" method="POST" >
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Name')); ?></label>
                        <input type="text" id="name" name="name" placeholder="<?php echo e(translate('Family Value Name')); ?>"
                               class="form-control" required>
                       <?php $__errorArgs = ['name'];
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
                    <div class="form-group mb-3 text-right">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Save New Family value')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.create_edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function sort_family_values(el){
            $('#sort_family_values').submit();
        }

        function family_value_modal(url){
            $.get(url, function(data){
                $('.create_edit_modal_content').html(data);
                $('.create_edit_modal').modal('show');
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/member_profile_attributes/family_values/index.blade.php ENDPATH**/ ?>