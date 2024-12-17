
<?php $__env->startSection('content'); ?>

<style>
	@media  screen and (max-width: 600px) { 
		.mobile_qrcode{
	margin-left: -77px;
   }
}
</style>
<div class="container">
	<br>
	<center><h1 class="fw-600 mb-3">Payment</h1></center>
	<br>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<h5 class="fw-600 mb-3">Registration Fee - Rs. 1000/-</h5>
			<!-- <h5 class="fw-600 mb-3">Lunch Coupon - Rs. 150 per head</h5> -->

			<h6 class="fw-600 mb-3">For more info</h6>
			<h6 class="fw-600 mb-3">Call us: Priya- 8982680494, Kiran- 9589055469</h6> 
		</div>
		<div class="col-sm-6 col-md-6">
			<img class="mobile_qrcode" src="<?php echo e(static_asset('qr_code.png')); ?>">
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/payment.blade.php ENDPATH**/ ?>