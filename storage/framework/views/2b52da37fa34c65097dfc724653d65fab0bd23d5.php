
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Package History')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
              <thead>
                  <tr>
                      <th data-breakpoints="md">#</th>
                      <th><?php echo e(translate('Code')); ?></th>
                      <th><?php echo e(translate('Package')); ?></th>
                      <th data-breakpoints="md"><?php echo e(translate('Payment Method')); ?></th>
                      <th data-breakpoints="md"><?php echo e(translate('Amount')); ?></th>
                      <th data-breakpoints="md"><?php echo e(translate('Payment Status')); ?></th>
                      <th data-breakpoints="md"><?php echo e(translate('Purchase Date')); ?></th>
                      <th class="text-right"><?php echo e(translate('Invoice')); ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $package_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e(($key+1) + ($package_payments->currentPage() - 1)*$package_payments->perPage()); ?></td>
                          <td><?php echo e($package_payment->payment_code); ?></td>
                          <td><?php echo e($package_payment->package->name); ?></td>
                          <td>
                            <?php if($package_payment->payment_method == "manual_payment"): ?>
                              <?php echo e($package_payment->custom_payment_name); ?>

                            <?php else: ?>
                              <?php echo e(ucwords($package_payment->payment_method)); ?>

                            <?php endif; ?>
                          </td>
                          <td><?php echo e(single_price($package_payment->amount)); ?></td>
                          <td class="text-center">
                            <?php if($package_payment->payment_status == 'Paid'): ?>
                                <span class="badge badge-inline badge-success"><?php echo e(translate('Paid')); ?></span>
                            <?php else: ?>
                                <span class="badge badge-inline badge-danger"><?php echo e(translate('Unpaid')); ?></span>
                            <?php endif; ?>
                          </td>
                          <td><?php echo e($package_payment->created_at); ?></td>

                          <td class="text-right">
                              <a href="<?php echo e(route('package_payment.invoice', $package_payment->id)); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Invoice')); ?>">
                                  <i class="las la-file-invoice"></i>
                              </a>
                          </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="aiz-pagination">
                	<?php echo e($package_payments->links()); ?>

          	</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/package_payment_history.blade.php ENDPATH**/ ?>