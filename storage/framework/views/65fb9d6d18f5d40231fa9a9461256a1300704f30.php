<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Career Info')); ?></h5>
    <div class="text-right">
        <a onclick="career_add_modal('<?php echo e($member->id); ?>');"  href="javascript:void(0);" class="btn btn-sm btn-primary ">
          <i class="las mr-1 la-plus"></i>
          <?php echo e(translate('Add New')); ?>

        </a>
    </div>
</div>
<table class="table">
    <tr>
        <th><?php echo e(translate('designation')); ?></th>
        <th><?php echo e(translate('company')); ?></th>
        <th><?php echo e(translate('Salary monthly')); ?></th>
        <th><?php echo e(translate('Start')); ?></th>
        <th><?php echo e(translate('End')); ?></th>
        <th><?php echo e(translate('Status')); ?></th>
        <th><?php echo e(translate('option')); ?></th>
    </tr>

    <?php $careers = \App\Models\Career::where('user_id',$member->id)->get(); ?>
    <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($career->designation); ?></td>
        <td><?php echo e($career->company); ?></td>
        <td><?php echo e($career->package); ?></td>
        <td><?php echo e($career->start); ?></td>
        <td><?php echo e($career->end); ?></td>
        <td>
            <label class="aiz-switch aiz-switch-success mb-0">
                <input type="checkbox" id="status.<?php echo e($key); ?>" onchange="update_career_present_status(this)" value="<?php echo e($career->id); ?>" <?php if($career->present == 1): ?> checked <?php endif; ?> data-switch="success"/>
                <span></span>
            </label>
        </td>
        <td class="text-right">
            <a href="javascript:void(0);" class="btn btn-soft-primary btn-icon btn-circle btn-sm" onclick="career_edit_modal('<?php echo e($career->id); ?>');" title="<?php echo e(translate('Edit')); ?>">
                <i class="las la-edit"></i>
            </a>
            <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('career.destroy', $career->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                <i class="las la-trash"></i>
            </a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/career.blade.php ENDPATH**/ ?>