<div class="<?php if(get_setting('header_stikcy') == 'on'): ?> position-fixed <?php else: ?> position-absolute <?php endif; ?> w-100 top-0 z-1020">
    <div class="top-navbar bg-white border-bottom z-1035 py-2 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col">
                    <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
                        <li class="list-inline-item">
                          <a href="<?php echo e(get_setting('header_left_quick_link1')); ?>" class="text-reset opacity-60">
                            <span><?php echo e(get_setting('header_left_quick_link1_text')); ?></span>
                          </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7 col">
                    <ul class="list-inline mb-0 d-flex align-items-center justify-content-end ">
                        <li class="list-inline-item mr-3 pr-3 border-right">
                            <a href="tel:+01 112 352 566" class="text-reset opacity-60">
                                <span><?php echo e(translate(' Help Line')); ?></span>
                                <span><?php echo e(get_setting('header_helpline_no')); ?></span>
                            </a>
                        </li>
                        <?php if(Auth::check()): ?>
                        <li class="list-inline-item dropdown">
                            <?php
                            $notifications = \App\Models\Notification::latest()->where('notifiable_id',Auth()->user()->id)->take(10)->get();
                            $unseen_notification = \App\Models\Notification::where('notifiable_id',Auth()->user()->id)->where('read_at',null)->count();
                            ?>
                            <a href="javascript:void(0)" class="dropdown-toggle text-reset no-arrow p-5px"
                                data-toggle="dropdown" data-display="static">
                                <i class="las la-bell fs-16 opacity-60"></i>
                                <?php if($unseen_notification > 0): ?>
                                <span class="badge badge-dot badge-sm badge-status no-border badge-primary"></span>
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg py-0">
                                <div class="p-3 bg-light border-bottom">
                                    <h6 class="mb-0"><?php echo e(translate('Notifications')); ?></h6>
                                </div>
                                <ul class="list-group list-group-raw c-scrollbar-light"
                                    style="overflow-y:auto;max-height:300px;">
                                    <?php echo $__env->make('frontend.inc.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </ul>
                                <div class="border-top">
                                    <a href="<?php echo e(route('frontend.notifications')); ?>"
                                        class="btn text-reset btn-block"><?php echo e(translate('View All Notifications')); ?></a>
                                </div>
                            </div>
                        </li>
                        <?php
                        $unseen_chat_threads = chat_threads();
                        $unseen_chat_thread_count = count($unseen_chat_threads);
                        ?>
                        <li class="list-inline-item dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle text-reset no-arrow p-5px"
                                data-toggle="dropdown" data-display="static">
                                <i class="las la-envelope fs-16 opacity-60"></i>
                                <?php if($unseen_chat_thread_count > 0): ?>
                                <span class="badge badge-dot badge-sm badge-status no-border badge-primary"></span>
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg py-0">
                                <div class="p-3 bg-light border-bottom">
                                    <h6 class="mb-0"><?php echo e(translate('Messages')); ?></h6>
                                </div>

                                <div class="c-scrollbar-light" style="overflow-y:auto;max-height:300px;">
                                    <?php $__empty_1 = true; $__currentLoopData = $unseen_chat_threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chat_thread_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                    $chat = \App\Models\Chat::where('chat_thread_id', $chat_thread_id)->latest()->first();
                                    $current_user = Auth::user()->id;
                                    ?>

                                    <?php if($chat != null): ?>
                                    <a href="<?php echo e(route('all.messages')); ?>"
                                        class="chat-user-item p-3 d-block text-inherit hov-bg-soft-primary">
                                        <div class="media">
                                            <span class="avatar avatar-sm mr-3 flex-shrink-0">
                                                <?php if($current_user == $chat->chatThread->sender->id): ?>
                                                <?php $user_to_show = 'receiver'; ?>
                                                <?php else: ?>
                                                <?php $user_to_show = 'sender'; ?>
                                                <?php endif; ?>
                                                <?php if($chat->chatThread->$user_to_show->photo != null): ?>
                                                <img src="<?php echo e(uploaded_asset($chat->chatThread->$user_to_show->photo)); ?>">
                                                <?php else: ?>
                                                <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>">
                                                <?php endif; ?>
                                                <?php if(Cache::has('user-is-online-' . $chat->chatThread->$user_to_show->id)): ?>
                                                <span
                                                    class="badge badge-dot badge-circle badge-success badge-status badge-md"></span>
                                                <?php else: ?>
                                                <span
                                                    class="badge badge-dot badge-circle badge-secondary badge-status badge-md"></span>
                                                <?php endif; ?>
                                            </span>
                                            <div class="media-body minw-0">
                                                <h6 class="mt-0 mb-1 fs-14 text-truncate">
                                                    <?php echo e($chat->chatThread->$user_to_show->first_name.' '.$chat->chatThread->$user_to_show->last_name); ?>

                                                </h6>
                                                <?php if($chat->message != null): ?>
                                                <div class="fs-12 text-truncate opacity-60"><?php echo e($chat->message); ?></div>
                                                <?php else: ?>
                                                <div class="fs-12 text-truncate opacity-60"><?php echo e(translate('Attachments')); ?>

                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="ml-2 text-right">
                                                <div class="opacity-60 fs-10 mb-1">
                                                    <?php echo e(Carbon\Carbon::parse($chat->created_at)->diffForHumans()); ?></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="text-center py-4">
                                        <i class="las la-frown la-4x mb-2 opacity-40"></i>
                                        <h4 class="h6"><?php echo e(translate('No New Messages')); ?></h4>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="border-top">
                                    <a href="<?php echo e(route('all.messages')); ?>"
                                        class="btn text-reset btn-block"><?php echo e(translate('View All Messages')); ?></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item mx-4">
                            <a href="<?php echo e(route('dashboard')); ?>" class="d-flex align-items-center text-reset">
                                <img src="<?php echo e(uploaded_asset(Auth::user()->photo)); ?>"
                                    class="size-30px rounded-circle img-fit mr-2"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';">
                                <span class="opacity-60 mr-1">
                                    <?php echo e(translate('Hi')); ?>,
                                </span>
                                <span class="text-primary-grad fw-700">
                                    <?php echo e(Auth::user()->first_name); ?>

                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?php echo e(route('logout')); ?>"
                                class="btn btn-sm bg-primary-grad text-white fw-600 py-1 border"><?php echo e(translate('Logout')); ?></a>
                        </li>
                        <?php else: ?>
                        <li class="list-inline-item ml-4">
                            <a class="text-reset opacity-60" href="<?php echo e(route('login')); ?>"><?php echo e(translate('Log In')); ?></a>
                        </li>
                        <li class="list-inline-item ml-3">
                            <a class="btn btn-sm bg-primary-grad text-white fw-600 py-1 border"
                                href="<?php echo e(route('register')); ?>"><?php echo e(translate('Registration')); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header
        class="aiz-header shadow-md bg-white border-gray-300">
        <div class="aiz-navbar position-relative">
            <div class="container">
                <div class="d-lg-flex justify-content-between text-center text-lg-left">
                    <div class="logo">
                        <a href="<?php echo e(route('home')); ?>" class="d-inline-block py-15px">
                            <?php if(get_setting('header_logo') != null): ?>
                            <img src="<?php echo e(uploaded_asset(get_setting('header_logo'))); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                class="mw-100 h-30px h-md-40px" height="40">
                            <?php else: ?>
                            <img src="<?php echo e(static_asset('assets/img/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                class="mw-100 h-30px h-md-40px" height="40">
                            <?php endif; ?>
                        </a>
                    </div>
                    <ul
                        class="mb-0 pl-0 ml-lg-auto d-lg-flex align-items-stretch justify-content-center justify-content-lg-start mobile-hor-swipe">
                        <li class="d-inline-block d-lg-flex pb-1 <?php echo e(areActiveRoutes(['home'],'bg-primary-grad')); ?>">
                            <a class="nav-link text-uppercase fw-700 fs-15 d-flex align-items-center bg-white py-2"
                                href="<?php echo e(route('home')); ?>">
                                <span class="text-primary-grad mb-n1"><?php echo e(translate('Home')); ?></span>
                            </a>
                        </li>
                        <li
                            class="d-inline-block d-lg-flex pb-1 <?php echo e(areActiveRoutes(['member.listing'],'bg-primary-grad')); ?>">
                            <a class="nav-link text-uppercase fw-700 fs-15 d-flex align-items-center bg-white py-2"
                                href="<?php echo e(route('member.listing')); ?>">
                                <span class="text-primary-grad mb-n1"><?php echo e(translate('Search')); ?></span>
                            </a>
                        </li>
                        <li class="d-inline-block d-lg-flex pb-1 <?php echo e(areActiveRoutes(['packages'],'bg-primary-grad')); ?>">
                            <a class="nav-link text-uppercase fw-700 fs-15 d-flex align-items-center bg-white py-2"
                                href="<?php echo e(route('packages')); ?>">
                                <span class="text-primary-grad mb-n1"><?php echo e(translate('Premium Plans')); ?></span>
                            </a>
                        </li>
                        <li
                            class="d-inline-block d-lg-flex pb-1 <?php echo e(areActiveRoutes(['happy_stories'],'bg-primary-grad')); ?>">
                            <a class="nav-link text-uppercase fw-700 fs-15 d-flex align-items-center bg-white py-2"
                                href="<?php echo e(route('happy_stories')); ?>">
                                <span class="text-primary-grad mb-n1"><?php echo e(translate('Happy Stories')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if(Auth::check() && auth()->user()->user_type == 'member'): ?>
        <div class="border-top d-none d-lg-block">
            <div class="container">
                <ul class="list-inline d-flex align-items-center mb-0">
                    <li class="list-inline-item">
                        <a href="<?php echo e(route('dashboard')); ?>"
                            class="text-reset d-inline-block px-4 py-3 fw-600 <?php echo e(areActiveRoutes(['dashboard'],'text-primary-grad opacity-100')); ?>">
                            <i class="las la-tachometer-alt mr-1"></i>
                            <span><?php echo e(translate('Dashboard')); ?></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo e(route('profile_settings')); ?>"
                            class="text-reset d-inline-block px-4 py-3 fw-600 <?php echo e(areActiveRoutes(['profile_settings'],'text-primary-grad opacity-100')); ?>">
                            <i class="las la-user mr-1"></i>
                            <span><?php echo e(translate('My Profile')); ?></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo e(route('my_interests.index')); ?>"
                            class="text-reset d-inline-block px-4 py-3 fw-600 <?php echo e(areActiveRoutes(['express-interest.index'],'text-primary-grad opacity-100')); ?>">
                            <i class="la la-heart-o mr-1"></i>
                            <span><?php echo e(translate('My Interest')); ?></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo e(route('my_shortlists')); ?>"
                            class="text-reset d-inline-block px-4 py-3 fw-600 <?php echo e(areActiveRoutes(['my_shortlists'],'text-primary-grad opacity-100')); ?>">
                            <i class="las la-list mr-1"></i>
                            <span><?php echo e(translate('Shortlist')); ?></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo e(route('all.messages')); ?>"
                            class="text-reset d-inline-block px-4 py-3 fw-600 <?php echo e(areActiveRoutes(['all.messages'],'text-primary-grad opacity-100')); ?>">
                            <i class="las la-envelope mr-1"></i>
                            <span><?php echo e(translate('Messaging')); ?></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo e(route('my_ignored_list')); ?>"
                            class="text-reset d-inline-block px-4 py-3 fw-600 <?php echo e(areActiveRoutes(['my_ignored_list'],'text-primary-grad opacity-100')); ?>">
                            <i class="las la-ban mr-1"></i>
                            <span><?php echo e(translate('Ignored User List')); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </header>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/inc/header.blade.php ENDPATH**/ ?>