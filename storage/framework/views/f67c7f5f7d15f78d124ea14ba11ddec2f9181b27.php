
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Sub Castes')); ?></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="<?php if(auth()->user()->can('add_sub_caste')): ?> col-lg-7 <?php else: ?> col-lg-12 <?php endif; ?>">
        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6"><?php echo e(translate('All Sub Castes')); ?></h5>
                </div>
                <div class="col-md-4">
                    <form class="" id="sort_sub_casts" action="" method="GET">
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
                            <th><?php echo e(translate('Sub Caste')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Caste')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Religion')); ?></th>
                            <th class="text-right" width="20%"><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sub_castes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1) + ($sub_castes->currentPage() - 1)*$sub_castes->perPage()); ?></td>
                                <td><?php echo e($sub_caste->name); ?></td>
                                <td><?php echo e($sub_caste->caste->name); ?></td>
                                <td><?php echo e($sub_caste->caste->religion->name); ?></td>
                                <td class="text-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_sub_caste')): ?>
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('sub-castes.edit', encrypt($sub_caste->id))); ?>" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_sub_caste')): ?>
                                        <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('sub-castes.destroy', $sub_caste->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                            <i class="las la-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    <?php echo e($sub_castes->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_sub_caste')): ?>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Add New Sub Caste')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('sub-castes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Religion')); ?></label>
                        <select class="form-control aiz-selectpicker" id="religion_id" data-live-search="true" name="religion_id" required>
                            <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($religion->id); ?>"><?php echo e($religion->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Caste')); ?></label>
                        <select class="form-control aiz-selectpicker" name="caste_id"  data-live-search="true"  id="caste_id"  required>

                        </select>
                        <?php $__errorArgs = ['caste_id'];
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

                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Sub Caste Name')); ?></label>
                        <input type="text" id="name" name="name" placeholder="<?php echo e(translate('Sub Castes Name')); ?>"
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
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

      function sort_sub_casts(el){
          $('#sort_sub_casts').submit();
      }

        function get_caste_by_religion(){
            var religion_id = $('#religion_id').val();
            $.post('<?php echo e(route('castes.get_caste_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', religion_id:religion_id}, function(data){
                $('#caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    AIZ.plugins.bootstrapSelect('refresh');
                }
            });

        }

        $(document).ready(function(){
            get_caste_by_religion();
        });

        $('#religion_id').on('change', function() {
            get_caste_by_religion();
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/member_profile_attributes/sub_castes/index.blade.php ENDPATH**/ ?>