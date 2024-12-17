<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Story Details')); ?></h5>
    </div>
    <div class="card-body">
      <div class="row align-items-center">
          <div class="col-8">
              <span class="h6"><?php echo e($happy_story->title); ?></span>
          </div>
          <div class="col-4 text-right">
              <span >
                <?php echo e(translate('Posted By:').' '.$happy_story->user->first_name.' '.$happy_story->user->last_name); ?>

              </span>
          </div>
      </div>
      <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height mt-4" data-arrows="true" data-dots="true" data-autoplay="true">
          <?php if($happy_story->photos != null): ?>
              <?php $__currentLoopData = explode(',',$happy_story->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="carousel-box">
                      <img class="d-block w-100 lazyload rounded h-200px h-lg-380px img-fit" src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($photo)); ?>" alt="<?php echo e($key); ?> offer">
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
      </div>
      <div><?php echo e(translate('Post Time:').' '.$happy_story->created_at); ?></div>
      <div class="overflow-hidden mt-4"><?php echo $happy_story->details; ?></div>
      <div class="p-4">
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
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/happy_story/view.blade.php ENDPATH**/ ?>