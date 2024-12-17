<div class="modal-header">
    <h5 class="modal-title h6"><?php echo e(translate('Running Package Information')); ?></h5>
    <button type="button" class="close" data-dismiss="modal">
    </button>
</div>
<div class="modal-body">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th><?php echo e(translate('Package Name')); ?></th>
                <td><?php echo e($member->package->name); ?></td>
            </tr>
            <tr>
                <th><?php echo e(translate('Remaining Interests')); ?></th>
                <td><?php echo e($member->remaining_interest); ?></td>
            </tr>
            <tr>
                <th><?php echo e(translate('Remaining View Contact')); ?></th>
                <td><?php echo e($member->remaining_contact_view); ?></td>
            </tr>
            <tr>
                <th><?php echo e(translate('Remaining Photo Gallery')); ?></th>
                <td><?php echo e($member->remaining_photo_gallery); ?></td>
            </tr>
            <tr>
                <th><?php echo e(translate('Auto Profile Match Show')); ?></th>
                <td>
                  <?php if($member->auto_profile_match == 1): ?>
                      <span class="badge badge-inline badge-success"><?php echo e(translate('On')); ?></span>
                  <?php else: ?>
                      <span class="badge badge-inline badge-danger"><?php echo e(translate('Off')); ?></span>
                  <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?php echo e(translate('Validity')); ?></th>
                <td>
                  <?php if(package_validity($member->user_id)): ?>
                    <?php echo e($member->package_validity); ?>

                  <?php else: ?>
                      <span class="badge badge-inline badge-danger"><?php echo e(translate('Expired')); ?></span>
                  <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button class="btn btn-success" onclick="get_package(<?php echo e($member->id); ?>);"><?php echo e(translate('Upgrade Package')); ?></button>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/package_modal.blade.php ENDPATH**/ ?>