<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-xl-none d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
        <div class="aiz-topbar-logo-wrap d-flex align-items-center justify-content-start">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-block">
                <img src="<?php echo e(uploaded_asset(get_setting('system_logo'))); ?>" class="img-fluid" height="45">
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
              <div class="aiz-topbar-item">
                  <div class="d-flex align-items-center">
                      <a class="btn btn-icon btn-circle btn-light" href="<?php echo e(route('home')); ?>" target="_blank" title="<?php echo e(translate('Browse Website')); ?>">
                          <i class="las la-globe"></i>
                      </a>
                  </div>
              </div>
          </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <?php
                $notifications = \App\Models\Notification::latest()->where('notifiable_id',Auth()->user()->id)->take(10)->get();
                $unseen_notification = \App\Models\Notification::where('notifiable_id',Auth()->user()->id)->where('read_at',null)->count();
            ?>

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-1">
                            <span class=" position-relative d-inline-block">
                                <i class="las la-bell la-2x"></i>
                                <?php if($unseen_notification > 0): ?>
                                    <span class="badge badge-circle badge-primary position-absolute absolute-top-right">
                                        <?php echo e($unseen_notification); ?>

                                    </span>
                                <?php endif; ?>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0"><?php echo e(translate('Notifications')); ?></h6>
                        </div>
                        <ul class="list-group c-scrollbar-light overflow-auto" style="max-height:300px;">
                            <?php if($notifications->count() > 0): ?>
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $notify_data = json_decode($notification->data);
                                        $user_data = \App\User::where('id',$notify_data->notify_by)->first();
                                    ?>
                                    <?php if(!empty($user_data)): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start hov-bg-soft-primary">
                                        <a href="<?php echo e(route('notification_view', $notification->id)); ?>" class="media text-inherit">
                                            <span class="avatar avatar-sm mr-3">
                                                <?php if(!empty(uploaded_asset($user_data->photo))): ?>
                                                    <img src="<?php echo e(uploaded_asset($user_data->photo)); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>">
                                                <?php endif; ?>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1"><?php echo e($user_data->first_name.' '.$user_data->last_name); ?></p>
                                                <small class="text-muted">
                                                    <?php echo e($notify_data->message); ?>

                                                </small>
                                            </div>
                                        </a>
                                        <?php if($notification->read_at == null): ?>
                                            <button class="btn p-0">
                                                <span class="badge badge-md  badge-dot badge-circle badge-primary"></span>
                                            </button>
                                        <?php endif; ?>
                                    </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li class="list-group-item">
                                    <div class="text-center">
                                        <i class="las la-frown la-4x mb-4 opacity-40"></i>
                                        <h4 class="h5"><?php echo e(translate('No Notifications')); ?></h4>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="border-top">
                            <a href="<?php echo e(route('admin.notifications')); ?>" class="btn text-reset btn-block"><?php echo e(translate('View All Notifications')); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php
                if(Session::has('locale')){
                    $locale = Session::get('locale', Config::get('app.locale'));
                }
                else{
                    $locale = env('DEFAULT_LANGUAGE');
                }
            ?>
            <!-- <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown " id="lang-change">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon">
                            <img src="<?php echo e(static_asset('assets/img/flags/'.$locale.'.png')); ?>" height="11">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">

                        <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="javascript:void(0)" data-flag="<?php echo e($language->code); ?>" class="dropdown-item <?php if($locale == $language->code): ?> active <?php endif; ?>">
                                    <img src="<?php echo e(static_asset('assets/img/flags/'.$language->code.'.png')); ?>" class="mr-2">
                                    <span class="language"><?php echo e($language->name); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div> -->
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="mr-md-2">
                                <img src="<?php echo e(uploaded_asset(Auth::user()->photo)); ?>" class="size-35px rounded-circle img-fit" height="36" width="36" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';">
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500"><?php echo e(Auth::user()->first_name); ?></span>
                                <span class="d-block small opacity-60"><?php echo e(Auth::user()->user_type); ?></span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="<?php echo e(route('profile.index')); ?>" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span><?php echo e(translate('Manage Profile')); ?></span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="las la-sign-out-alt"></i>
                            <span><?php echo e(translate('Logout')); ?></span>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/inc/header.blade.php ENDPATH**/ ?>