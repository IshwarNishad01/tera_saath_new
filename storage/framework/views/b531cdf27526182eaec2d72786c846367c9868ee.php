<div class="modal-header">
    <h5 class="modal-title h6"><?php echo e(translate('Payment Details')); ?></h5>
    <button type="button" class="close" data-dismiss="modal"></button>
</div>
<div class="modal-body">
  <table class="table table-bordered">
      <tbody>
          <tr>
              <th><?php echo e(translate('Payment Method')); ?></th>
              <td><?php echo e($package_payment->custom_payment_name); ?></td>
          </tr>
          <tr>
              <th><?php echo e(translate('Transaction Id')); ?></th>
              <td><?php echo e($package_payment->custom_payment_transaction_id); ?></td>
          </tr>
          <tr>
              <th><?php echo e(translate('Payemnt Proof')); ?></th>
              <td>
                <a href="<?php echo e(uploaded_asset($package_payment->custom_payment_proof)); ?>" target="_blank" download="">
					<span><?php echo e(translate('Download')); ?></span>
				</a>
              </td>
          </tr>
          <tr>
              <th><?php echo e(translate('Details')); ?></th>
              <td><?php echo e($package_payment->custom_payment_details); ?></td>
          </tr>
      </tbody>
  </table>
</div>
<div class="modal-footer">
    <?php if($package_payment->payment_status != 'Paid'): ?>
      <a href="<?php echo e(route('manual_payment_accept', $package_payment->id)); ?>" class="btn btn-sm btn-success"><?php echo e(translate('Accept')); ?></a>
    <?php endif; ?>
    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/package_payments/payment_details.blade.php ENDPATH**/ ?>