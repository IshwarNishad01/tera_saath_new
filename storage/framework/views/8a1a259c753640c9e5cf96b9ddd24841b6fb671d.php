
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('My Interests')); ?></h5>
            <a href="<?php echo e(route('interest_requests')); ?>" class="mb-0 h6 btn btn-primary"><?php echo e(translate('Interest Requests')); ?></a>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th><?php echo e(translate('Image')); ?></th>
                      <th><?php echo e(translate('Name')); ?></th>
                      <th><?php echo e(translate('Age')); ?></th>
                      <th class="text-center"><?php echo e(translate('Status')); ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr id="interested_member_<?php echo e($interest->user_id); ?>">
                          <td><?php echo e(($key+1) + ($interests->currentPage() - 1)*$interests->perPage()); ?></td>
                          <td>
                            <img class="img-md" src="<?php echo e(uploaded_asset($interest->user->photo)); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                          </td>
                          <td><?php echo e($interest->user->first_name.' '.$interest->user->last_name); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($interest->user->member->birthday)->age); ?></td>
                         <td class="text-center">
                             <?php if($interest->status == 1): ?>
                                 <span class="badge badge-inline badge-success"><?php echo e(translate('Approved')); ?></span>
                             <?php else: ?>
                                 <span class="badge badge-inline badge-info"><?php echo e(translate('Pending')); ?></span>
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

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/my_interests.blade.php ENDPATH**/ ?>