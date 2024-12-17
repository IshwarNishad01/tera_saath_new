<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-block">
                <img src="<?php echo e(uploaded_asset(get_setting('system_logo'))); ?>" class="img-fluid">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Dashboard')); ?></span>
                    </a>
                </li>
           
                <!-- Member Manage -->
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Members')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_members')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('members.index', 1)); ?>" class="aiz-side-nav-link  <?php echo e(areActiveRoutes(['members.edit','members.show'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Free Members')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('members.index', 2)); ?>" class="aiz-side-nav-link  <?php echo e(areActiveRoutes(['members.edit','members.show'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Premium Members')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bulk_member_add')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('member_bulk_add.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Bulk Member Add')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deleted_member_show')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('deleted_members')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Deleted Members')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_reported_profile')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('reported_members','all')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Reported Members')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Profile Attributes')); ?></span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>

                            <ul class="aiz-side-nav-list level-3">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_religions')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('religions.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Religions')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_castes')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('castes.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['castes.edit'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Caste')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_sub_castes')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('sub-castes.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['sub-castes.edit'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Sub-Caste')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_member_languages')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('member-languages.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Member Language')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_countries')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('countries.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Country')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_states')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('states.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['states.edit'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('State')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_cities')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('cities.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['cities.edit'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('City')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_on_behalves')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('on-behalf.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('On Behalf')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_family_values')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('family-values.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Family Values')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_family_status')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('family-status.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Family Status')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_marital_status')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('marital-statuses.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Marital Statuses')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_profile_sections')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('member_profile_sections_configuration')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Profile Sections')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>

                <!-- Premium Packages -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_packages')): ?>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('packages.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['packages.create','packages.edit'])); ?>">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Premium Packages')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Earnings -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_package_payments')): ?>
                <li class="aiz-side-nav-item ">
                    <a href="<?php echo e(route('package-payments.index')); ?>" class="aiz-side-nav-link">
                        <i class="las la-money-bill-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Package Payments')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_happy_stories')): ?>
                <li class="aiz-side-nav-item ">
                    <a href="<?php echo e(route('happy-story.index')); ?>" class="aiz-side-nav-link">
                        <i class="las la-handshake aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Happy Stories')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('admin.parichay')); ?>" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Parichay list')); ?></span>
                    </a>
                </li>

                <!-- Messaging -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter')): ?>
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <i class="las la-envelope aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Marketing')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('newsletters.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Newsletter')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- Support Ticket Addon -->
                <?php if(addon_activation('support_tickets')): ?>
                    <?php if(auth()->user()->can('show_active_tickets') || auth()->user()->can('show_my_tickets') || auth()->user()->can('show_solved_tickets') || auth()->user()->can('show_support_categories')|| auth()->user()->can('default_ticket_assigned_agent')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-people-carry aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Support Ticket')); ?></span>
                                <?php if(env("DEMO_MODE") == "On"): ?>
                                    <span class="badge badge-inline badge-danger"><?php echo e(translate('Addon')); ?></span>
                                <?php endif; ?>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_active_tickets')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('support-tickets.active_ticket')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support-tickets.edit'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Active Tickets')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_my_tickets')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('support-tickets.my_ticket')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support-tickets.show'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('My tickets')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_solved_tickets')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('support-tickets.solved_ticket')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support-tickets.show'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Solved tickets')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->can('show_support_categories') || auth()->user()->can('default_ticket_assigned_agent')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="#" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Support Settings')); ?></span>
                                            <span class="aiz-side-nav-arrow"></span>
                                        </a>
                                        <ul class="aiz-side-nav-list level-3">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_support_categories')): ?>
                                                <li class="aiz-side-nav-item">
                                                    <a href="<?php echo e(route('support-categories.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support-categories.index', 'support-categories.edit'])); ?>">
                                                        <span class="aiz-side-nav-text"><?php echo e(translate('Category')); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('default_ticket_assigned_agent')): ?>
                                                <li class="aiz-side-nav-item">
                                                    <a href="<?php echo e(route('default_ticket_assigned_agent')); ?>" class="aiz-side-nav-link">
                                                        <span class="aiz-side-nav-text"><?php echo e(translate('Default Asssigned Agent')); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                
                <?php if(addon_activation('otp_system')): ?>
                    <?php if(auth()->user()->can('manage_sms_templates') || auth()->user()->can('manage_otp_credentials') || auth()->user()->can('send_sms')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-phone aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('OTP System')); ?></span>
                                <?php if(env("DEMO_MODE") == "On"): ?>
                                    <span class="badge badge-inline badge-danger"><?php echo e(translate('Addon')); ?></span>
                                <?php endif; ?>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_sms_templates')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('sms-templates.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('SMS Templates')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_otp_credentials')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('otp_credentials.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Set OTP Credentials')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_sms')): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('bulk_sms.index')); ?>" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Send SMS')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Uploader Manage -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_uploaded_files')): ?>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('uploaded-files.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['uploaded-files.create'])); ?>">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Uploaded Files')); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Website Setup -->
                <?php if(auth()->user()->can('header') || auth()->user()->can('footer') || auth()->user()->can('show_all_pages') || auth()->user()->can('appearances')): ?>
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Website Setup')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('header')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('website.header_settings')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Header')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('footer')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('website.footer_settings')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Footer')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_all_pages')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Pages')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearances')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('website.appearances')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Appearance')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


                <!-- General settings -->
                <?php if(auth()->user()->can('general_settings') ||
                    auth()->user()->can('show_languages') ||
                    auth()->user()->can('show_currencies') ||
                    auth()->user()->can('payment_methods') ||
                    auth()->user()->can('smtp_settings') ||
                    auth()->user()->can('email_templates') ||
                    auth()->user()->can('third_party_settings') ||
                    auth()->user()->can('social_media_login_settings')): ?>
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-cog aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Settings')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general_settings')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('general_settings')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('General Settings')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_languages')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('languages.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['languages.show'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Language')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_currencies')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('currencies.index')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Currency')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_methods')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('payment_method_settings')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Payment Methods')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('smtp_settings')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('smtp_settings')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('SMTP Settings')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('email_templates')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('email-templates.index')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Email Templates')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('third_party_settings')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('third_party_settings')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Third Party Settings')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('social_media_login_settings')): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('social_media_login')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Social Media Login')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Staff -->
                <?php if(auth()->user()->can('show_staffs') || auth()->user()->can('show_staff_roles')): ?>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Staffs')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_staffs')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('staffs.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('All staffs')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_staff_roles')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('roles.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Staff Roles')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- System -->
                <?php if(auth()->user()->can('system_update') || auth()->user()->can('server_status')): ?>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('System')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system_update')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('system_update')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Update')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('server_status')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('system_server')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Server status')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Addon Manager -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addon_manager')): ?>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('addons.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['addons.index', 'addons.create'])); ?>">
                            <i class="las la-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Addon Manager')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/inc/sidenav.blade.php ENDPATH**/ ?>