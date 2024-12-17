
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Profile Reports')); ?></h1>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
      <h5 class="mb-md-0 h6"><?php echo e(translate('Profile Reports')); ?></h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Member Name')); ?></th>
                    <th><?php echo e(translate('Reported By')); ?></th>
                    <th><?php echo e(translate('Report Reason')); ?></th>
                    <th class="text-right"><?php echo e(translate('Option')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($reports->currentPage() - 1)*$reports->perPage()); ?></td>
                        <td><?php echo e($report->user->first_name.' '.$report->user->last_name); ?></td>
                        <td><?php echo e($report->reportedBy->first_name.' '.$report->reportedBy->last_name); ?></td>
                        <td><?php echo e($report->reason); ?></td>
                        <td class="text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('block_member')): ?>
                                <?php if($report->user->blocked == 0): ?>
                                  <a href="javascript:void(0);" onclick="block_member(<?php echo e($report->user_id); ?>)" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Block')); ?>">
                                      <i class="las la-ban"></i>
                                  </a>
                                <?php else: ?>
                                  <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="<?php echo e(translate('Blocked')); ?>">
                                      <i class="las la-ban"></i>
                                  </a>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_profile_report')): ?>
                                <a href="javascript:void(0);" data-href="<?php echo e(route('report_destrot.destroy', $report->id)); ?>" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="<?php echo e(translate('Delete')); ?>">
                                    <i class="las la-trash"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($reports->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <div class="modal fade member-block-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
                <form class="form-horizontal member-block" action="<?php echo e(route('members.block')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="member_id" id="member_id" value="">
                    <input type="hidden" name="block_status" id="block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6"><?php echo e(translate('Member Block !')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Blocking Reason')); ?></label>
                            <div class="col-md-9">
                                <textarea type="text" name="blocking_reason" class="form-control" placeholder="<?php echo e(translate('Blocking Reason')); ?>" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                        <button type="submit" class="btn btn-sm btn-success"><?php echo e(translate('Submit')); ?></button>
                    </div>
                </form>
        	</div>
    	</div>
    </div>

    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
     function block_member(id){
         $('.member-block-modal').modal('show');
         $('#member_id').val(id);
         $('#block_status').val(1);
     }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/reported_members.blade.php ENDPATH**/ ?>