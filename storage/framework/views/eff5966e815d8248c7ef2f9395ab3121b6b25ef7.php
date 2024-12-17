

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Member Profile Sections Configuration')); ?></h5>
                </div>
                <div class="card-body offset-lg-3">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_present_address_section">
                                <input type="checkbox" name="member_present_address_section" class="custom-control-input" id="present_address" <?php if( get_setting('member_present_address_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="present_address"><?php echo e(translate('Present Address')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_education_section">
                                <input type="checkbox" name="member_education_section" class="custom-control-input" id="education" <?php if( get_setting('member_education_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="education"><?php echo e(translate('Education')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_career_section">
                                <input type="checkbox" name="member_career_section" class="custom-control-input" id="career" <?php if( get_setting('member_career_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="career"><?php echo e(translate('Career')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_physical_attributes_section">
                                <input type="checkbox" name="member_physical_attributes_section" class="custom-control-input" id="physical_attributes" <?php if( get_setting('member_physical_attributes_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="physical_attributes"><?php echo e(translate('Physical Attributes')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_language_section">
                                <input type="checkbox" name="member_language_section" class="custom-control-input" id="language" <?php if( get_setting('member_language_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="language"><?php echo e(translate('Language')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_hobbies_and_interests_section">
                                <input type="checkbox" name="member_hobbies_and_interests_section" class="custom-control-input" id="hobbies_and_interests" <?php if( get_setting('member_hobbies_and_interests_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="hobbies_and_interests"><?php echo e(translate('Hobbies And Interests')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_personal_attitude_and_behavior_section">
                                <input type="checkbox" name="member_personal_attitude_and_behavior_section" class="custom-control-input" id="personal_attitude_and_behavior" <?php if( get_setting('member_personal_attitude_and_behavior_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="personal_attitude_and_behavior"><?php echo e(translate('Personal Attitude And Behavior')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_residency_information_section">
                                <input type="checkbox" name="member_residency_information_section" class="custom-control-input" id="residency_information" <?php if( get_setting('member_residency_information_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="residency_information"><?php echo e(translate('Residency Information')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_spiritual_and_social_background_section">
                                <input type="checkbox" name="member_spiritual_and_social_background_section" class="custom-control-input" id="spiritual_and_social_background" <?php if( get_setting('member_spiritual_and_social_background_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="spiritual_and_social_background"><?php echo e(translate('Spiritual And Social Background')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_life_style_section">
                                <input type="checkbox" name="member_life_style_section" class="custom-control-input" id="life_style" <?php if( get_setting('member_life_style_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="life_style"><?php echo e(translate('Life Style')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_astronomic_information_section">
                                <input type="checkbox" name="member_astronomic_information_section" class="custom-control-input" id="astronomic_information" <?php if( get_setting('member_astronomic_information_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="astronomic_information"><?php echo e(translate('Astronomic Information')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_permanent_address_section">
                                <input type="checkbox" name="member_permanent_address_section" class="custom-control-input" id="permanent_address" <?php if( get_setting('member_permanent_address_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="permanent_address"><?php echo e(translate('Permanent Address')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_family_information_section">
                                <input type="checkbox" name="member_family_information_section" class="custom-control-input" id="family_information" <?php if( get_setting('member_family_information_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="family_information"><?php echo e(translate('Family Information')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="types[]" value="member_partner_expectation_section">
                                <input type="checkbox" name="member_partner_expectation_section" class="custom-control-input" id="partner_expectation" <?php if( get_setting('member_partner_expectation_section') == 'on'): ?> Checked <?php endif; ?> >
                                <label class="custom-control-label" for="partner_expectation"><?php echo e(translate('Partner Expectation')); ?></label>
                            </div>
                        </div>

                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Settings')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/member_profile_attributes/member_profile_sections/index.blade.php ENDPATH**/ ?>