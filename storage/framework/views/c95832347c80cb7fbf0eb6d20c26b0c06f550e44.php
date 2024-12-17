
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Interest Requests')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th><?php echo e(translate('Image')); ?></th>
                      <th><?php echo e(translate('Name')); ?></th>
                      <th><?php echo e(translate('Age')); ?></th>
                      <th class="text-center"><?php echo e(translate('Action')); ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $interested_by = \App\User::where('id',$interest->interested_by)->first(); ?>
                      <tr id="interested_member_<?php echo e($interested_by->id); ?>">
                          <td><?php echo e(($key+1) + ($interests->currentPage() - 1)*$interests->perPage()); ?></td>
                          <td>
                            <img class="img-md" src="<?php echo e(uploaded_asset($interested_by->photo)); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                          </td>
                          <td><?php echo e($interested_by->first_name.' '.$interested_by->last_name); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($interested_by->member->birthday)->age); ?></td>
                         <td class="text-center">
                             <?php if($interest->status != 1): ?>
                                <a href="javascript:void(0);" onclick="accept_interest(<?php echo e($interest->id); ?>)" class="btn btn-soft-success btn-icon btn-circle btn-sm" title="<?php echo e(translate('Accept')); ?>">
         							<i class="las la-check"></i>
         						</a>
                     			<a href="javascript:void(0);" onclick="reject_interest(<?php echo e($interest->id); ?>)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="<?php echo e(translate('Reject')); ?>">
                     				<i class="las la-trash"></i>
                     			</a>
                            <?php else: ?>
                                <span class="badge badge-inline badge-success"><?php echo e(translate('Accepted')); ?></span>
                            <?php endif; ?>
                         </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($interests->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    
    <div class="modal fade interest_accept_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6"><?php echo e(translate('Interest Accept!')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="<?php echo e(route('accept_interest')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="interest_id" id="interest_accept_id" value="">
                        <p class="mt-1"><?php echo e(translate('Are you sure you want to accept this interest?')); ?></p>
                        <button type="button" class="btn btn-danger mt-2" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                        <button type="submit" class="btn btn-info mt-2"><?php echo e(translate('Confirm')); ?></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade interest_reject_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6"><?php echo e(translate('Interest Reject !')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="<?php echo e(route('reject_interest')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="interest_id" id="interest_reject_id" value="">
                        <p class="mt-1"><?php echo e(translate('Are you sure you want to rejet his interest?')); ?></p>
                        <button type="button" class="btn btn-danger mt-2" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                        <button type="submit" class="btn btn-info mt-2"><?php echo e(translate('Confirm')); ?></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">

    function accept_interest(id) {
        $('.interest_accept_modal').modal('show');
        $('#interest_accept_id').val(id);
    }

    function reject_interest(id) {
        $('.interest_reject_modal').modal('show');
        $('#interest_reject_id').val(id);
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/interest_requests.blade.php ENDPATH**/ ?>