
<?php $__env->startSection('content'); ?>
    <section class="py-5 text-center bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h1 class="fw-600 h2 lh-1-5 text-dark"><?php echo e($happy_story->title); ?></h1>
                    <div>
                        <span class="opacity-40"><?php echo e(translate('Posted By')); ?>:</span>
                        <a
                            <?php if(!Auth::check()): ?>
                                onclick="loginModal()"
                            <?php elseif(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1): ?>
                                href="javascript:void(0);" onclick="package_update_alert()"
                            <?php else: ?>
                                href="<?php echo e(route('member_profile', $happy_story->user_id)); ?>"
                            <?php endif; ?>
                            class="c-pointer text-primary">
                            <?php echo e($happy_story->user->first_name.' '.$happy_story->user->last_name.''); ?>

                        </a>
                        <span class="opacity-40"><?php echo e(translate('On')); ?>:</span>
                        <span class="opacity-70"><?php echo e($happy_story->created_at->format('d F, Y')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-white">
        <div class="container">
            <div class="aiz-carousel dots-inside-bottom" data-arrows="true" data-dots="true" data-autoplay="true">
                <?php if($happy_story->photos != null): ?>
                    <?php $__currentLoopData = explode(',',$happy_story->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box">
                            <img class="d-block lazyload img-fluid mx-auto" src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($photo)); ?>" alt="<?php echo e($happy_story->title); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="py-4">
                        <div class="overflow-hidden mb-4 lh-1-8"><?php echo $happy_story->details; ?></div>
                        <div class="">
                            <div class="embed-responsive embed-responsive-16by9">
                                <?php if($happy_story->video_provider == 'youtube' && isset(explode('=', $happy_story->video_link)[1])): ?>
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e(explode('=', $happy_story->video_link)[1]); ?>"></iframe>
                                <?php elseif($happy_story->video_provider == 'dailymotion' && isset(explode('video/', $happy_story->video_link)[1])): ?>
                                    <iframe class="embed-responsive-item" src="https://www.dailymotion.com/embed/video/<?php echo e(explode('video/', $happy_story->video_link)[1]); ?>"></iframe>
                                <?php elseif($happy_story->video_provider == 'vimeo' && isset(explode('vimeo.com/', $happy_story->video_link)[1])): ?>
                                    <iframe src="https://player.vimeo.com/video/<?php echo e(explode('vimeo.com/', $happy_story->video_link)[1]); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if(get_setting('facebook_comment_activation') == 1): ?>
                        <div class="border-top">
                            <div class="fb-comments" data-width="" data-numposts="5"></div>
                        </div>
                    <?php endif; ?>

                </div>
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

<?php if(get_setting('facebook_comment_activation') == 1): ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=<?php echo e(env('FACEBOOK_APP_ID')); ?>&autoLogAppEvents=1"
    nonce="ji6tXwgZ">
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/happy_stories/story_details.blade.php ENDPATH**/ ?>