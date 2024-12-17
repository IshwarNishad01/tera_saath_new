

<?php $__env->startSection('content'); ?>
    <div class="bg-white py-5">
        
    </div>
    <form action="<?php echo route('payment.rozer'); ?>" method="POST" id='rozer-pay' style="display: none;">
        <!-- Note that the amount is in paise = 50 INR -->
        <!--amount need to be in paisa-->
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo e(env('RAZORPAY_KEY')); ?>"
                data-amount=<?php echo e(Session::get('payment_data')['amount']*100); ?>

                data-buttontext=""
                data-name="<?php echo e(env('APP_NAME')); ?>"
                data-description="Package Payment"
                data-image="<?php echo e(uploaded_asset(get_setting('header_logo'))); ?>"
                data-prefill.name= <?php echo e(Auth::user()->name); ?>

                data-prefill.email= <?php echo e(Auth::user()->email); ?>

                data-theme.color="#ff7529">
        </script>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#rozer-pay').submit()
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/payment_gateway/razorpay.blade.php ENDPATH**/ ?>