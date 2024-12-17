
<?php $__env->startSection('content'); ?>
<section class="pt-6 pb-4 bg-white text-center">
    <div class="container">
        <h1 class="mb-0 fw-600 text-dark"><?php echo e(translate('Select Your Package')); ?></h1>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="aiz-carousel" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1" data-dots='true' data-infinite='true' data-autoplay='true'>
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-box">
                    <div class="overflow-hidden shadow-none border-right">
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
                                  <li class="list-group-item py-2">
                                        <?php echo e($package->additional); ?>

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
                            <div class="text-center">
                                <?php if($package->id != 1): ?>
                                    <?php if(Auth::check()): ?>
                                        <a href="<?php echo e(route('package_payment_methods', encrypt($package->id))); ?>" type="submit" class="btn btn-primary" ><?php echo e(translate('Purchase This Package')); ?></a>
                                    <?php else: ?>
                                        <button type="submit" onclick="loginModal()" class="btn btn-primary" ><?php echo e(translate('Purchase This Package')); ?></button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0);" class="btn btn-light" ><del><?php echo e(translate('Purchase This Package')); ?></del></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.login_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.package_update_alert_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

	// Login alert
    function loginModal(){
        $('#LoginModal').modal();
    }

    // Package update alert
    function package_update_alert(){
      $('.package_update_alert_modal').modal('show');
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/package/packages.blade.php ENDPATH**/ ?>