
<?php $__env->startSection('panel_content'); ?>
    <?php $member = \App\User::find(Auth::user()->id); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Introduction')); ?></h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('member.introduction.update', $member->member->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label"><?php echo e(translate('Introduction')); ?></label>
                    <div class="col-md-10">
                        <textarea type="text" name="introduction" class="form-control" rows="4" placeholder="<?php echo e(translate('Introduction')); ?>" required><?php echo e($member->member->introduction); ?></textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-sm"><?php echo e(translate('Update')); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Email Change -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Change your email')); ?></h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('user.change.email')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-2">
                        <label><?php echo e(translate('Your Email')); ?></label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="<?php echo e(translate('Your Email')); ?>" name="email" value="<?php echo e(Auth::user()->email); ?>" />
                          <div class="input-group-append">
                             <button type="button" class="btn btn-outline-secondary new-email-verification">
                                 <span class="d-none loading">
                                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                     <?php echo e(translate('Sending Email...')); ?>

                                 </span>
                                 <span class="default"><?php echo e(translate('Verify')); ?></span>
                             </button>
                          </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Basic Information -->
    <?php echo $__env->make('frontend.member.profile.basic_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Present Address -->
    <?php
        $present_address      = \App\Models\Address::where('type','present')->where('user_id',$member->id)->first();
        $present_country_id   = !empty($present_address->country_id) ? $present_address->country_id : "";
        $present_state_id     = !empty($present_address->state_id) ? $present_address->state_id : "";
        $present_city_id      = !empty($present_address->city_id) ? $present_address->city_id : "";
        $present_postal_code  = !empty($present_address->postal_code) ? $present_address->postal_code : "";
    ?>
    <?php if(get_setting('member_present_address_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.present_address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Education -->
    <?php if(get_setting('member_education_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.education.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Career -->
    <?php if(get_setting('member_career_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.career.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Physical Attributes -->
    <?php if(get_setting('member_physical_attributes_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.physical_attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Language -->
    <?php if(get_setting('member_language_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Hobbies  -->
    <?php if(get_setting('member_hobbies_and_interests_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.hobbies_interest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Personal Attitude & Behavior -->
    <!-- <?php if(get_setting('member_personal_attitude_and_behavior_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.attitudes_behavior', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> -->

    <!-- Residency Information -->
    <!-- <?php if(get_setting('member_residency_information_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.residency_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> -->

    <!-- Spiritual & Social Background -->
    <?php
        $member_religion_id   = !empty($member->spiritual_backgrounds->religion_id) ? $member->spiritual_backgrounds->religion_id : "";
        $member_caste_id      = !empty($member->spiritual_backgrounds->caste_id) ? $member->spiritual_backgrounds->caste_id : "";
        $member_sub_caste_id  = !empty($member->spiritual_backgrounds->sub_caste_id) ? $member->spiritual_backgrounds->sub_caste_id : "";
    ?>
    <?php if(get_setting('member_spiritual_and_social_background_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.spiritual_backgrounds', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Life Style -->
    <?php if(get_setting('member_life_style_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.lifestyle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Astronomic Information  -->
    <?php if(get_setting('member_astronomic_information_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.astronomic_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Permanent Address -->
    <?php
        $permanent_address      = \App\Models\Address::where('type','permanent')->where('user_id',$member->id)->first();
        $permanent_country_id   = !empty($permanent_address->country_id) ? $permanent_address->country_id : "";
        $permanent_state_id     = !empty($permanent_address->state_id) ? $permanent_address->state_id : "";
        $permanent_city_id      = !empty($permanent_address->city_id) ? $permanent_address->city_id : "";
        $permanent_postal_code  = !empty($permanent_address->postal_code) ? $permanent_address->postal_code : "";
    ?>
    <?php if(get_setting('member_permanent_address_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.permanent_address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Family Information -->
    <?php if(get_setting('member_family_information_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.family_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Partner Expectation -->
    <?php
        $partner_religion_id   = !empty($member->partner_expectations->religion_id) ? $member->partner_expectations->religion_id : "";
        $partner_caste_id      = !empty($member->partner_expectations->caste_id) ? $member->partner_expectations->caste_id : "";
        $partner_sub_caste_id  = !empty($member->partner_expectations->sub_caste_id) ? $member->partner_expectations->sub_caste_id : "";
        $partner_country_id    = !empty($member->partner_expectations->preferred_country_id) ? $member->partner_expectations->preferred_country_id : "";
        $partner_state_id      = !empty($member->partner_expectations->preferred_state_id) ? $member->partner_expectations->preferred_state_id : "";
    ?>
    <?php if(get_setting('member_partner_expectation_section') == 'on'): ?>
      <?php echo $__env->make('frontend.member.profile.partner_expectation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.create_edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

    $(document).ready(function(){
         get_states_by_country_for_present_address();
         get_cities_by_state_for_present_address();
         get_states_by_country_for_permanent_address();
         get_cities_by_state_for_permanent_address();
         get_castes_by_religion_for_member();
         get_sub_castes_by_caste_for_member();
         get_castes_by_religion_for_partner();
         get_sub_castes_by_caste_for_partner();
         get_states_by_country_for_partner();
    });

    // For Present address
    function get_states_by_country_for_present_address(){
        var present_country_id = $('#present_country_id').val();
            $.post('<?php echo e(route('states.get_state_by_country')); ?>',{_token:'<?php echo e(csrf_token()); ?>', country_id:present_country_id}, function(data){
                $('#present_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#present_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#present_state_id > option").each(function() {
                    if(this.value == '<?php echo e($present_state_id); ?>'){
                        $("#present_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_present_address();
            });
        }

    function get_cities_by_state_for_present_address(){
		var present_state_id = $('#present_state_id').val();
    		$.post('<?php echo e(route('cities.get_cities_by_state')); ?>',{_token:'<?php echo e(csrf_token()); ?>', state_id:present_state_id}, function(data){
    		    $('#present_city_id').html(null);
    		    for (var i = 0; i < data.length; i++) {
    		        $('#present_city_id').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		    $("#present_city_id > option").each(function() {
    		        if(this.value == '<?php echo e($present_city_id); ?>'){
    		            $("#present_city_id").val(this.value).change();
    		        }
    		    });

    		    AIZ.plugins.bootstrapSelect('refresh');
    		});
    	}

    $('#present_country_id').on('change', function() {
  	    get_states_by_country_for_present_address();
  	});

    $('#present_state_id').on('change', function() {
  	    get_cities_by_state_for_present_address();
  	});

    // For permanent address
    function get_states_by_country_for_permanent_address(){
        var permanent_country_id = $('#permanent_country_id').val();
            $.post('<?php echo e(route('states.get_state_by_country')); ?>',{_token:'<?php echo e(csrf_token()); ?>', country_id:permanent_country_id}, function(data){
                $('#permanent_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_state_id > option").each(function() {
                    if(this.value == '<?php echo e($permanent_state_id); ?>'){
                        $("#permanent_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_permanent_address();
            });
    }

    function get_cities_by_state_for_permanent_address(){
        var permanent_state_id = $('#permanent_state_id').val();
            $.post('<?php echo e(route('cities.get_cities_by_state')); ?>',{_token:'<?php echo e(csrf_token()); ?>', state_id:permanent_state_id}, function(data){
                $('#permanent_city_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_city_id > option").each(function() {
                    if(this.value == '<?php echo e($permanent_city_id); ?>'){
                        $("#permanent_city_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#permanent_country_id').on('change', function() {
        get_states_by_country_for_permanent_address();
    });

    $('#permanent_state_id').on('change', function() {
        get_cities_by_state_for_permanent_address();
    });

    // get castes and subcastes For member
    function get_castes_by_religion_for_member(){
        var member_religion_id = $('#member_religion_id').val();
            $.post('<?php echo e(route('castes.get_caste_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', religion_id:member_religion_id}, function(data){
                $('#member_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_caste_id > option").each(function() {
                    if(this.value == '<?php echo e($member_caste_id); ?>'){
                        $("#member_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_member();
            });
        }

    function get_sub_castes_by_caste_for_member(){
        var member_caste_id = $('#member_caste_id').val();
            $.post('<?php echo e(route('sub_castes.get_sub_castes_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', caste_id:member_caste_id}, function(data){
                $('#member_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_sub_caste_id > option").each(function() {
                    if(this.value == '<?php echo e($member_sub_caste_id); ?>'){
                        $("#member_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#member_religion_id').on('change', function() {
        get_castes_by_religion_for_member();
    });

    $('#member_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_member();
    });

    // get castes and subcastes For partner
    function get_castes_by_religion_for_partner(){
        var partner_religion_id = $('#partner_religion_id').val();
            $.post('<?php echo e(route('castes.get_caste_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', religion_id:partner_religion_id}, function(data){
                $('#partner_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_caste_id > option").each(function() {
                    if(this.value == '<?php echo e($partner_caste_id); ?>'){
                        $("#partner_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_partner();
            });
        }

    function get_sub_castes_by_caste_for_partner(){
        var partner_caste_id = $('#partner_caste_id').val();
            $.post('<?php echo e(route('sub_castes.get_sub_castes_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', caste_id:partner_caste_id}, function(data){
                $('#partner_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_sub_caste_id > option").each(function() {
                    if(this.value == '<?php echo e($partner_sub_caste_id); ?>'){
                        $("#partner_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#partner_religion_id').on('change', function() {
        get_castes_by_religion_for_partner();
    });

    $('#partner_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_partner();
    });

    // For partner address
    function get_states_by_country_for_partner(){
        var partner_country_id = $('#partner_country_id').val();
            $.post('<?php echo e(route('states.get_state_by_country')); ?>',{_token:'<?php echo e(csrf_token()); ?>', country_id:partner_country_id}, function(data){
                $('#partner_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_state_id > option").each(function() {
                    if(this.value == '<?php echo e($partner_state_id); ?>'){
                        $("#partner_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#partner_country_id').on('change', function() {
        get_states_by_country_for_partner();
    });

    //  education Add edit , status change
    function education_add_modal(id){
       $.post('<?php echo e(route('education.create')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function education_edit_modal(id){
        $.post('<?php echo e(route('education.edit')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_education_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('<?php echo e(route('education.update_education_present_status')); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
                location.reload();
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }


    //  Career Add edit , status change
    function career_add_modal(id){
       $.post('<?php echo e(route('career.create')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function career_edit_modal(id){
        $.post('<?php echo e(route('career.edit')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_career_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('<?php echo e(route('career.update_career_present_status')); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
                location.reload();
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }

    $('.new-email-verification').on('click', function() {
        $(this).find('.loading').removeClass('d-none');
        $(this).find('.default').addClass('d-none');
        var email = $("input[name=email]").val();

        $.post('<?php echo e(route('user.new.verify')); ?>', {_token:'<?php echo e(csrf_token()); ?>', email: email}, function(data){
            data = JSON.parse(data);
            $('.default').removeClass('d-none');
            $('.loading').addClass('d-none');
            if(data.status == 2)
                AIZ.plugins.notify('warning', data.message);
            else if(data.status == 1)
                AIZ.plugins.notify('success', data.message);
            else
                AIZ.plugins.notify('danger', data.message);
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/index.blade.php ENDPATH**/ ?>