<div class="aiz-user-sidenav-wrap pt-4 sticky-top c-scrollbar-light position-relative z-1 shadow-none">
    <div class="absolute-top-left d-xl-none">
        <button class="btn btn-sm p-2" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
    <div class="aiz-user-sidenav rounded overflow-hidden">
        <div class="px-4 text-center mb-4">
            <span class="avatar avatar-md mb-3">
                <?php if(Auth::user()->photo != null): ?>
                <img src="<?php echo e(uploaded_asset(Auth::user()->photo)); ?>">
                <?php else: ?>
                <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>">
                <?php endif; ?>
            </span>
            <h4 class="h5 fw-600"><?php echo e(Auth::user()->first_name.' '.Auth::user()->last_name); ?></h4>
            <div class="text-center  mb-2">

            </div>
            <div>
                <span class="rating rating-sm">

                </span>
            </div>
            <div class="mb-1">

                <span class="fw-600">

                </span>
                <span>

                </span>
            </div>
        </div>
        <div class="text-center mb-3 px-3">
            <a href="<?php echo e(route('member_profile', Auth::user()->id)); ?>" class="btn btn-block btn-soft-primary"><?php echo e(translate('Public Profile')); ?></a>
        </div>

        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['dashboard'])); ?>">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Dashboard')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('gallery-image.index')); ?>" class="aiz-side-nav-link">
                        <i class="las la-image aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Gallery')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('happy-story.create')); ?>" class="aiz-side-nav-link">
                        <i class="las la-handshake aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Happy Story')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <i class="las la-shopping-basket aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Packages')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('packages')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Packages')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('package_purchase_history')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Package Purchase History')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('all.messages')); ?>" class="aiz-side-nav-link">
                        <i class="las la-envelope aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Message')); ?></span>
                    </a>
                </li>
                <?php if(addon_activation('support_tickets')): ?>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('support-tickets.user_index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support-tickets.user_index','support-tickets.user_ticket_create'])); ?>">
                            <i class="las la-life-ring aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Support Ticket')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('my_interests.index')); ?>" class="aiz-side-nav-link">
                        <i class="la la-heart-o aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('My Interest')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('my_shortlists')); ?>" class="aiz-side-nav-link">
                        <i class="las la-list aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Shortlist')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('my_ignored_list')); ?>" class="aiz-side-nav-link">
                        <i class="las la-ban aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Ignored User List')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('member.picture_privacy')); ?>" class="aiz-side-nav-link" style="display:none">
                        <i class="las la-user-lock aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Picture Privacy')); ?></span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('member.change_password')); ?>" class="aiz-side-nav-link">
                        <i class="las la-key aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Change Password')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('profile_settings')); ?>" class="aiz-side-nav-link">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Manage Profile')); ?></span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link" onclick="account_deactivation()">
                        <?php if(Auth::user()->deactivated == 0 ): ?>
                            <i class="las la-lock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Deactive Account')); ?></span>
                        <?php else: ?>
                            <i class="las la-unlock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Reactive Account')); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <a href="javascript:void(0);" class="btn btn-block btn-primary" href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="las la-sign-out-alt"></i>
                <span><?php echo e(translate('Logout')); ?></span>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </a>
        </div>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/sidebar.blade.php ENDPATH**/ ?>