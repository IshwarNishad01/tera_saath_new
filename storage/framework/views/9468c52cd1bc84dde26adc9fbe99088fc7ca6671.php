<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Education Info')); ?></h5>
        <div class="text-right">
            <a onclick="education_add_modal('<?php echo e($member->id); ?>');"  href="javascript:void(0);" class="btn btn-sm btn-primary ">
              <i class="las mr-1 la-plus"></i>
              <?php echo e(translate('Add New')); ?>

            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table">
            <tr>
                <th><?php echo e(translate('Degree')); ?></th>
                <th><?php echo e(translate('Institution')); ?></th>
             <!--    <th data-breakpoints="md"><?php echo e(translate('Start')); ?></th>
                <th data-breakpoints="md"><?php echo e(translate('End')); ?></th> -->
                <th data-breakpoints="md"><?php echo e(translate('Status')); ?></th>
                <th class="text-right"><?php echo e(translate('Options')); ?></th>
            </tr>

            <?php $educations = \App\Models\Education::where('user_id',$member->id)->get(); ?>
            <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($education->degree); ?></td>
                <td><?php echo e($education->institution); ?></td>
               <!--  <td><?php echo e($education->start); ?></td>
                <td><?php echo e($education->end); ?></td> -->
                <td>
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" id="status.<?php echo e($key); ?>" onchange="update_education_present_status(this)" value="<?php echo e($education->id); ?>" <?php if($education->present == 1): ?> checked <?php endif; ?> data-switch="success"/>
                        <span></span>
                    </label>
                </td>
                <td class="text-right">
                    <a href="javascript:void(0);" class="btn btn-soft-info btn-icon btn-circle btn-sm" onclick="education_edit_modal('<?php echo e($education->id); ?>');" title="<?php echo e(translate('Edit')); ?>">
                        <i class="las la-edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('education.destroy', $education->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                        <i class="las la-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/education/index.blade.php ENDPATH**/ ?>