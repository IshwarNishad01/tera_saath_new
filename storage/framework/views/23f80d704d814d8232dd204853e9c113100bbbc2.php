
<?php $__env->startSection('panel_content'); ?>
      <?php if(Auth::user()->membership == 2): ?>

        <?php $happy_story = \App\Models\HappyStory::where('user_id', Auth::user()->id)->first(); ?>
        <?php if(empty($happy_story)): ?>
           <?php echo $__env->make('frontend.member.happy_story.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('frontend.member.happy_story.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

      <?php else: ?>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Your Story')); ?></h5>
            </div>
            <div class="card-body">
                <h5 class="text-center"><?php echo e(translate('Please Upgrade To Premium Membership To Post Your Story')); ?></h5>
                <a href="<?php echo e(route('packages')); ?>" class="btn btn-block btn-primary mt-4 mb-6"><?php echo e(translate('Get Premium Membership')); ?></a>
            </div>
        </div>
      <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/happy_story/index.blade.php ENDPATH**/ ?>