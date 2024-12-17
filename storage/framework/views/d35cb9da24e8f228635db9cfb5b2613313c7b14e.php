
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card z-depth-2-top mt-4 mb-4">
            <div class="card-body">
                <div class="print" id="printableArea">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row gutters-5">
                                <div class="col text-center text-md-left">
                                    <h2><?php echo e(translate('Invoice')); ?></h2>
                                </div>
                                <div class="col-md-7 text-right">
                                    <h3><?php echo e(translate('Purchase Code')); ?> : <?php echo e($payment->payment_code); ?></h3>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                                <strong><?php echo e(translate('Purchase Date:')); ?></strong> <?php echo e($payment->created_at); ?>

                            </div>
                            <br>
                            <div class="col-sm-12">
                                <strong><?php echo e(translate('Billed To,')); ?></strong><br>
                                <b><?php echo e(translate('Name:')); ?></b> <?php echo e($payment->user->first_name.' '.$payment->user->last_name); ?>

                                <br>
                                <b><?php echo e(translate('Email:')); ?></b> <?php echo e($payment->user->email); ?>

                                <br>
                                <b><?php echo e(translate('Phone:')); ?></b> <?php echo e($payment->user->phone); ?>

                            </div>
                            <br>
                            <div class="col-sm-6">
                            <strong><?php echo e(translate('Payment Method: ')); ?></strong>
                                <?php if($payment->payment_method == "manual_payment"): ?>
                                <?php echo e($payment->custom_payment_name); ?>

                                <?php else: ?>
                                <?php echo e(ucwords($payment->payment_method)); ?>

                                <?php endif; ?>
                                <br>
                            <strong><?php echo e(translate('Payment Status: ')); ?></strong><?php echo e(translate($payment->payment_status)); ?>

                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row pt-5">
                    	<div class="col-md-12">
                        <h5><b><?php echo e(translate('Purchase Summary')); ?></b></h5>
                    		<div class="card">
                    			<div class="card-body">
                    				<div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <td><strong><?php echo e(translate('Item')); ?></strong></td>
                                            <td class="text-center"><strong><?php echo e(translate('Price')); ?></strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td><?php echo e(translate('Package Name: ').' '.$payment->package->name); ?></td>
                                        <td class="text-center"><?php echo e(single_price($payment->amount)); ?></td>
                                        </tr>
                                            <tr>
                                            <td class="text-right"><strong><?php echo e(translate('Total')); ?></td>
                                            <td class="text-center"><?php echo e(single_price($payment->amount)); ?></td>
                                            </tr>
                                        </tbody>
                    					</table>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center mt-5 mb-3">
                            <button type="button" class="btn btn-primary btn-sm" onclick="printDiv('printableArea')"><i class="las la-print"></i> <?=translate('Print')?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/payment_invoice.blade.php ENDPATH**/ ?>