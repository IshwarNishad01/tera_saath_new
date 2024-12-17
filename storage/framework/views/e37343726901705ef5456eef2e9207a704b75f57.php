
<?php $__env->startSection('panel_content'); ?>
    <?php $user = Auth::user(); ?>
    <div class="row gutters-5">
        <div class="col-md-4 mx-auto mb-3" >
            <div class="bg-light rounded overflow-hidden text-center p-3">
                <i class="la la-heart-o la-3x mb-3 text-primary-grad"></i>
                <div class="h4 fw-700 text-primary-grad"><?php echo e(get_remaining_value($user->id,'remaining_interest')); ?></div>
                <div class="opacity-50"><?php echo e(translate('Remaining Interest')); ?></div>
            </div>
        </div>
        <div class="col-md-4 mx-auto mb-3" >
            <div class="bg-light rounded overflow-hidden text-center p-3">
                <i class="las la-phone la-3x mb-3 text-primary-grad"></i>
                <div class="h4 fw-700 text-primary-grad"><?php echo e(get_remaining_value($user->id,'remaining_contact_view')); ?></div>
                <div class="opacity-50 "><?php echo e(translate('Remaining Contact View')); ?></div>
            </div>
        </div>
        <div class="col-md-4 mx-auto mb-3" >
            <div class="bg-light rounded overflow-hidden text-center p-3">
                <i class="las la-image la-3x mb-3 text-primary-grad"></i>
                <div class="h4 fw-700 text-center text-primary-grad"><?php echo e(get_remaining_value($user->id,'remaining_photo_gallery')); ?></div>
                <div class="opacity-50 text-center"><?php echo e(translate('Remaining Gallery Image Upload')); ?></div>
            </div>
        </div>
    </div>

    <div class="row gutters-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="fs-16 mb-0"><?php echo e(translate('Current package')); ?></h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4 mt-3">
                        <img class="mw-100 mx-auto mb-4" src="<?php echo e(uploaded_asset($user->member->package->image)); ?>" height="130" alt="Tera saath">
                        <h5 class="mb-3 h5 fw-600"><?php echo e($user->member->package->name); ?></h5>
                    </div>
                    <ul class="list-group list-group-raw fs-15 mb-4 pb-4 border-bottom">
                        <li class="list-group-item py-2">
                            <i class="las la-check text-success mr-2"></i>
                            <?php echo e($user->member->package->express_interest); ?> <?php echo e(translate('Express Interests')); ?>

                        </li>
                        <li class="list-group-item py-2">
                            <i class="las la-check text-success mr-2"></i>
                            <?php echo e($user->member->package->photo_gallery); ?> <?php echo e(translate('Galley Photo Upload')); ?>

                        </li>
                        <li class="list-group-item py-2">
                            <i class="las la-check text-success mr-2"></i>
                            <?php echo e($user->member->package->contact); ?> <?php echo e(translate('Contact Info View')); ?>

                        </li>
                        <li class="list-group-item py-2 text-line-through">
                            <?php if( $user->member->package->auto_profile_match == 0 ): ?>
                                <i class="las la-times text-danger mr-2"></i>
                                <del class="opacity-60"><?php echo e(translate('Show Auto Profile Match')); ?></del>
                            <?php else: ?>
                                <i class="las la-check text-success mr-2"></i>
                                <?php echo e(translate('Show Auto Profile Match')); ?>

                            <?php endif; ?>
                        </li>
                    </ul>
                    <h4 class="fs-18 mb-3">
                      <?php echo e(translate('Package expiry date')); ?>:
                      <?php if(package_validity($user->id)): ?>
                        <?php echo e($user->member->package_validity); ?>

                      <?php else: ?>
                          <span class="text-danger"><?php echo e(translate('Expired')); ?></span>
                      <?php endif; ?>
                    </h4>
                    <a href="<?php echo e(route('packages')); ?>" class="btn btn-success d-inline-block"><?php echo e(translate('Upgrade Package')); ?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="fs-16 mb-0"><?php echo e(translate('Matched profile')); ?></h2>
                </div>
                <div class="card-body">
                    <?php if(Auth::user()->member->auto_profile_match == 1): ?>
                    <div>
                        <?php $__empty_1 = true; $__currentLoopData = $similar_profiles->shuffle()->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar_profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <?php if($similar_profile->matched_profile != null): ?>
                            <a href="<?php echo e(route('member_profile', $similar_profile->match_id)); ?>" class="text-reset border rounded row no-gutters align-items-center mb-3">
                                <div class="col-auto w-100px">
                                  <?php
                                      $profile_picture_show = 'ok';
                                      $profile_picture_privacy = $similar_profile->matched_profile->member->profile_picture_privacy;

                                      if($profile_picture_privacy  == '0')
                                      {
                                        $profile_picture_show = 'no';
                                      }
                                      elseif($profile_picture_privacy == 2)
                                      {
                                        if(Auth::user()->membership == 1)
                                        {
                                          $profile_picture_show = 'no';
                                        }
                                      }
                                  ?>
                                    <img
                                        <?php if($profile_picture_show == 'ok'): ?>
                                        src="<?php echo e(uploaded_asset($similar_profile->matched_profile->photo)); ?>"
                                        <?php else: ?>
                                        src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>"
                                        <?php endif; ?>
                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';"
                                        class="img-fit w-100 size-100px"
                                        alt="tera saath"
                                    >
                                </div>
                                <div class="col">
                                  <div class="p-3">
                                      <h5 class="fs-16 text-body text-truncate"><?php echo e($similar_profile->matched_profile->first_name.' '.$similar_profile->matched_profile->last_name); ?></h5>
                                      <div class="fs-12 text-truncate-3">
                                          <span class="mr-1 d-inline-block">
                                            <?php if(!empty($similar_profile->matched_profile->member->birthday)): ?>
                                              <?php echo e(\Carbon\Carbon::parse($similar_profile->matched_profile->member->birthday)->age); ?> <?php echo e(translate('yrs')); ?>,
                                            <?php endif; ?>
                                          </span>
                                          <span class="mr-1 d-inline-block">
                                            <?php if(!empty($similar_profile->matched_profile->physical_attributes->height)): ?>
                                              <?php echo e($similar_profile->matched_profile->physical_attributes->height); ?> <?php echo e(translate('Feet')); ?>,
                                            <?php endif; ?>
                                          </span>
                                          <span class="mr-1 d-inline-block">
                                            <?php if(!empty($similar_profile->matched_profile->member->marital_status->name)): ?>
                                              <?php echo e($similar_profile->matched_profile->member->marital_status->name); ?>,
                                            <?php endif; ?>
                                          </span>
                                          <span class="mr-1 d-inline-block">
                                            <?php echo e(!empty($similar_profile->matched_profile->spiritual_backgrounds->religion->name) ? $similar_profile->matched_profile->spiritual_backgrounds->religion->name.', ' : ""); ?>

                                          </span>
                                          <span class="mr-1 d-inline-block">
                                            <?php echo e(!empty($similar_profile->matched_profile->spiritual_backgrounds->caste->name) ? $similar_profile->matched_profile->spiritual_backgrounds->caste->name.', ' : ""); ?>

                                          </span>
                                          <span class="mr-1 d-inline-block">
                                            <td class="py-1"><?php echo e(!empty($similar_profile->matched_profile->spiritual_backgrounds->sub_caste->name) ? $similar_profile->matched_profile->spiritual_backgrounds->sub_caste->name : ""); ?></td>
                                          </span>
                                      </div>
                                  </div>
                                </div>
                            </a>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="alert alert-info"><?php echo e(translate('Update your partner expectation for auto match making')); ?></div>
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-info"><?php echo e(translate('Upgrade your package for auto match making')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/dashboard.blade.php ENDPATH**/ ?>