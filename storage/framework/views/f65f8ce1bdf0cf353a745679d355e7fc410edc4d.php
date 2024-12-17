

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Package Payment List')); ?></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('All Payments')); ?></h5>
            </div>
            <div class="card-body">
              <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(translate('Member Name')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Package')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Payment Method')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Amount')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Payment Status')); ?></th>
                        <th><?php echo e(translate('Payment Code')); ?></th>
                        <th data-breakpoints="md"><?php echo e(translate('Purchase Date')); ?></th>
                        <th class="text-right"><?php echo e(translate('Options')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $package_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($package_payments->currentPage() - 1)*$package_payments->perPage()); ?></td>
                            <td><?php echo e($package_payment->user->first_name.' '.$package_payment->user->last_name); ?></td>
                            <td><?php echo e($package_payment->package->name); ?></td>
                            <td>
                              <?php if($package_payment->payment_method == "manual_payment"): ?>
                                <?php echo e($package_payment->custom_payment_name); ?>

                              <?php else: ?>
                                <?php echo e(ucwords($package_payment->payment_method)); ?>

                              <?php endif; ?>
                            </td>
                            <td><?php echo e(single_price($package_payment->amount)); ?></td>
                            <td>
                              <?php if($package_payment->payment_status == 'Paid'): ?>
                                  <span class="badge badge-inline badge-success text-center"><?php echo e(translate('Paid')); ?></span>
                              <?php else: ?>
                                  <span class="badge badge-inline badge-danger text-center"><?php echo e(translate('Unpaid')); ?></span>
                              <?php endif; ?>
                            </td>
                            <td><?php echo e($package_payment->payment_code); ?></td>
                            <td><?php echo e($package_payment->created_at); ?></td>
                            <td class="text-right">
                                <?php if($package_payment->payment_method == "manual_payment" && auth()->user()->can('manage_package_manual_payemnts')): ?>
                                    <a href="javascript:void(0);" onclick="package_payment_details('<?php echo e(route('package-payments.show', $package_payment->id )); ?>')" class="btn btn-soft-info btn-icon btn-circle btn-sm" title="<?php echo e(translate('View Details')); ?>">
                                        <i class="las la-eye"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_package_payment_invoice')): ?>
                                    <a href="<?php echo e(route('package_payment.invoice_admin', $package_payment->id)); ?>" target="_blank" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Invoice')); ?>">
                                        <i class="las la-file-invoice"></i>
                                    </a>
                                <?php endif; ?>
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
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.create_edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
      function package_payment_details(url){
          $.get(url, function(data){
              $('.create_edit_modal_content').html(data);
              $('.create_edit_modal').modal('show');
          });
      }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/package_payments/index.blade.php ENDPATH**/ ?>