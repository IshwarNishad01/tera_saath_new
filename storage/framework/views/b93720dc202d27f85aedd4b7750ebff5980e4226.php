
<?php $__env->startSection('content'); ?>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-4">
                <div class="card shadow-none overflow-hidden">
                    <div class="card-body">
                        <div class="text-center mb-4 mt-3">
                            <img class="mw-100 mx-auto mb-4" src="<?php echo e(uploaded_asset($package->image)); ?>" height="130">
                            <h5 class="mb-3 h5 fw-600"><?php echo e($package->name); ?></h5>
                        </div>
                        <ul class="list-group list-group-raw fs-15 mb-5">
                            <li class="list-group-item py-2">
                                <i class="las la-check text-success mr-2"></i>
                                <?php echo e($package->express_interest); ?> <?php echo e(translate('Express Interests')); ?>

                            </li>
                            <li class="list-group-item py-2">
                                <i class="las la-check text-success mr-2"></i>
                                <?php echo e($package->photo_gallery); ?> <?php echo e(translate('Galley Photo Upload')); ?>

                            </li>
                            <li class="list-group-item py-2">
                                <i class="las la-check text-success mr-2"></i>
                                <?php echo e($package->contact); ?> <?php echo e(translate('Contact Info View')); ?>

                            </li>
                            <li class="list-group-item py-2 text-line-through">
                                <?php if( $package->auto_profile_match == 0 ): ?>
                                    <i class="las la-times text-danger mr-2"></i>
                                    <del class="opacity-60"><?php echo e(translate('Show Auto Profile Match')); ?></del>
                                <?php else: ?>
                                    <i class="las la-check text-success mr-2"></i>
                                    <?php echo e(translate('Show Auto Profile Match')); ?>

                                <?php endif; ?>
                            </li>
                        </ul>
                        <div class="mb-5 text-dark text-center">
                            <?php if($package->id == 1): ?>
                                <span class="display-4 fw-600 lh-1 mb-0"><?php echo e(translate('Free')); ?></span>
                            <?php else: ?>
                                <span class="display-4 fw-600 lh-1 mb-0"><?php echo e(single_price($package->price)); ?></span>
                            <?php endif; ?>
                            <span class="text-secondary d-block"><?php echo e($package->validity); ?> <?php echo e(translate('Days')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="<?php echo e(route('package.payment')); ?>" class="form-default" role="form" method="POST" id="package-payment-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>">
                    <input type="hidden" name="amount" value="<?php echo e($package->price); ?>">
                    <input type="hidden" id="payment_type" value="">

                    <div class="card shadow-none">
                        <div class="card-header p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <?php echo e(translate('Select a payment option')); ?>

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-10 mx-auto">
                                    <div class="row gutters-10">
                                        <?php if(get_setting('paypal_payment_activation') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="paypal" class="online_payment" type="radio" name="payment_option">
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/payment_method/paypal.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Paypal')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('stripe_payment_activation') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="stripe" class="online_payment" type="radio" name="payment_option">
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/payment_method/stripe.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Stripe')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('instamojo_payment_activation') == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="instamojo" class="online_payment" type="radio" name="payment_option">
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/payment_method/instamojo.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Instamojo')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('razorpay_payment_activation') == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="razorpay" class="online_payment" type="radio" name="payment_option">
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/payment_method/rozarpay.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Razorpay')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('manual_payment_1_activation') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="manual_payment_1" type="radio" name="payment_option" class="manual_payment_1">
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(uploaded_asset(get_setting('manual_payment_1_image'))); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(get_setting('manual_payment_1_name')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('manual_payment_2_activation') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="manual_payment_2" type="radio" name="payment_option" class="manual_payment_2">
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(uploaded_asset(get_setting('manual_payment_2_image'))); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(get_setting('manual_payment_2_name')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="manual_payment_1_info">
                                    <div class="bg-white border mb-3 p-3 rounded text-left ">
                                        <?php echo get_setting('manual_payment_1_instruction')  ?>
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="manual_payment_2_info">
                                    <div class="bg-white border mb-3 p-3 rounded text-left ">
                                        <?php echo get_setting('manual_payment_2_instruction')  ?>
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="purchase_by_manual_payment">
                                  <div class="form-group row">
                                      <div class="col-md-6">
                                          <label ><?php echo e(translate('Transaction Id')); ?><span class="text-danger"> *</span></label>
                                          <input type="text" name="transaction_id" id="transaction_id"  class="form-control" placeholder="<?php echo e(translate('Transaction Id')); ?>">
                                      </div>
                                      <div class="col-md-6">
                                          <label><?php echo e(translate('Payemnt Proof')); ?><span class="text-danger"> *</span></label>
                                          <div class="input-group" data-toggle="aizuploader" data-type="image">
                                              <div class="input-group-prepend">
                                                  <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                              </div>
                                              <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                              <input type="hidden" name="payment_proof" id="payment_proof" class="selected-files">
                                          </div>
                                          <div class="file-preview box sm">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-12">
                                      <label><?php echo e(translate('Payment Details')); ?></label>
                                      <textarea type="text" name="payment_details" class="form-control" rows="2" placeholder="<?php echo e(translate('Payment Details')); ?>"></textarea>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" text-right pt-3">
                        <button type="button" onclick="package_purchase(this)" class="btn btn-primary fw-600 purchase_button" disabled><?php echo e(translate('Confirm')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $(".online_payment").click(function(){
                $('#manual_payment_1_info').addClass('d-none');
                $('#manual_payment_2_info').addClass('d-none');
                $('#purchase_by_manual_payment').addClass('d-none');
                $(".purchase_button").prop('disabled', false);
                $("#payment_type").val('online_payment');
            });
            $(".manual_payment_1").click(function(){
                $('#manual_payment_1_info').removeClass('d-none');
                $('#manual_payment_2_info').addClass('d-none');
                $('#purchase_by_manual_payment').removeClass('d-none');
                $(".purchase_button").prop('disabled', false);
                $("#payment_type").val('manual_payment');
            });
            $(".manual_payment_2").click(function(){
                $('#manual_payment_1_info').addClass('d-none');
                $('#manual_payment_2_info').removeClass('d-none');
                $('#purchase_by_manual_payment').removeClass('d-none');
                $(".purchase_button").prop('disabled', false);
                $("#payment_type").val('manual_payment');
            });
        });

        function package_purchase(el){
            $(el).prop('disabled', true);
            var payment_type = $("#payment_type").val();
            if (payment_type == 'manual_payment') {
                var transaction_id = $("#transaction_id").val();
                var payment_proof = $("#payment_proof").val();
                if(transaction_id == '' || payment_proof == '')
                {
                  AIZ.plugins.notify('danger','<?php echo e(translate('Please Provide transaction id and payemnt proof.')); ?>');
                  $(el).prop('disabled', false);
                }
                else {
                  $('#package-payment-form').submit();
                }
            }
            else {
              $('#package-payment-form').submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/package/select_payemnt_method.blade.php ENDPATH**/ ?>