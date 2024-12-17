
<?php $__env->startSection('content'); ?>
<section class="py-4 py-lg-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-3">
                        <?php echo $__env->make('frontend.member.member_listing.advanced_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-9">
                        <div class="d-flex">
                            <h1 class="h4 fw-600 mb-3 text-body"><?php echo e(translate("All Active Members")); ?></h1>
                            <div class="d-xl-none ml-auto mb-1 ml-xl-3 mr-0 align-self-end">
                                <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                    <i class="la la-list la-2x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-5">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row no-gutters border border-gray-300 rounded hov-shadow-md mb-4 has-transition position-relative" id="block_id_<?php echo e($user->id); ?>">
                                    <div class="col-md-auto">
                                        <div class="text-center text-md-left pt-3 pt-md-0">
                                          <?php
                                              $profile_picture_show = 'ok';
                                              $profile_picture_privacy = $user->member->profile_picture_privacy;

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

                                          <a target="_blank" <?php if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1): ?>
                                                            href="<?php echo e(route('member_profile', $user->id)); ?>"
                                                        <?php else: ?>
                                                            href="<?php echo e(route('member_profile', $user->id)); ?>"
                                                        <?php endif; ?>
                                                        class="text-reset c-pointer">
                                            <img
                                                <?php if($profile_picture_show == 'ok'): ?>
                                                src="<?php echo e(uploaded_asset($user->photo)); ?>"
                                                <?php else: ?>
                                                src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>"
                                                <?php endif; ?>
                                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';"
                                                class="img-fit mw-100 size-150px size-md-250px rounded-circle md-rounded-0"
                                            ></a>
                                        </div>
                                    </div>
                                    <div class="col-md position-static d-flex align-items-center">
                                        <span class="absolute-top-right px-4 py-3">
                                            <?php if($user->membership == 1): ?>
                                            <span class="badge badge-inline badge-info"><?php echo e(translate('Free')); ?></span>
                                            <?php elseif($user->membership == 2): ?>
                                            <span class="badge badge-inline badge-success"><?php echo e(translate('Premium')); ?></span>
                                            <?php endif; ?>
                                        </span>
                                        <div class="px-md-4 p-3 flex-grow-1">

                                            <h2 class="h6 fw-600 fs-18 text-truncate mb-1"><?php echo e($user->first_name.' '.$user->last_name); ?></h2>
                                            <div class="mb-2 fs-12">
                                                <span class="opacity-60"><?php echo e(translate('Member ID: ')); ?></span>
                                                <span class="ml-4 text-primary"><?php echo e($user->code); ?></span>
                                            </div>
                                            <table class="w-100 opacity-70 mb-2 fs-12">
                                                <tr>
                                                    <td class="py-1 w-25">
                                                        <span><?php echo e(translate('Age')); ?></span>
                                                    </td>
                                                    <td class="py-1 w-25 fw-400"><?php echo e(\Carbon\Carbon::parse($user->member->birthday)->age); ?></td>
                                                    <td class="py-1 w-25"><span><?php echo e(translate('Height')); ?></span></td>
                                                    <td class="py-1 w-25 fw-400">
                                                        <?php if(!empty( $user->physical_attributes->height)): ?>
                                                            <?php echo e($user->physical_attributes->height); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1"><span><?php echo e(translate('Religion')); ?></span></td>
                                                    <td class="py-1 fw-400">
                                                        <?php if(!empty($user->spiritual_backgrounds->religion_id)): ?>
                                                            <?php echo e($user->spiritual_backgrounds->religion->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="py-1"><span><?php echo e(translate('Caste')); ?></span></td>
                                                    <td class="py-1 fw-400">
                                                        <?php if(!empty($user->spiritual_backgrounds->caste_id)): ?>
                                                            <?php echo e($user->spiritual_backgrounds->caste->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1"><span><?php echo e(translate('First Language')); ?></span></td>
                                                    <td class="py-1 fw-400">
                                                        <?php if($user->member->mothere_tongue != null): ?>
                                                            <?php echo e(\App\Models\MemberLanguage::where('id',$user->member->mothere_tongue)->first()->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="py-1"><span><?php echo e(translate('Marital Status')); ?></span></td>
                                                    <td class="py-1 fw-400">
                                                        <?php if($user->member->marital_status_id != null): ?>
                                                            <?php echo e($user->member->marital_status->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1"><span><?php echo e(translate('Location')); ?></span></td>
                                                    <td class="py-1 fw-400">
                                                        <?php
                                                            $present_address    = \App\Models\Address::where('type','present')->where('user_id', $user->id)->first();
                                                        ?>
                                                        <?php if(!empty($present_address->country_id)): ?>
                                                            <?php echo e($present_address->country->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row gutters-5 text-center">
                                                <div class="col">
                                                    <a target="_blank" 
                                                        <?php if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1): ?>
                                                            href="<?php echo e(route('member_profile', $user->id)); ?>" 
                                                        <?php else: ?>
                                                            href="<?php echo e(route('member_profile', $user->id)); ?>"
                                                        <?php endif; ?>
                                                        class="text-reset c-pointer"
                                                    >
                                                    <!-- href="javascript:void(0);" onclick="package_update_alert()" -->
                                                        <i class="las la-user fs-20 text-primary"></i>
                                                        <span class="d-block fs-10 opacity-60"><?php echo e(translate('Full Profile')); ?></span>

                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <?php
                                                      $interest_class    = "text-primary";
                                                      $do_expressed_interest = \App\Models\ExpressInterest::where('user_id', $user->id)->where('interested_by',Auth::user()->id)->first();
                                                      $received_expressed_interest = \App\Models\ExpressInterest::where('user_id', Auth::user()->id)->where('interested_by',$user->id)->first();
                                                      if(empty($do_expressed_interest) && empty($received_expressed_interest))
                                                      {
                                                          $interest_onclick  = 1;
                                                          $interest_text     = translate('Interest');
                                                          $interest_class    = "text-dark";
                                                      }
                                                      elseif(!empty($received_expressed_interest))
                                                      {
                                                          $interest_onclick  = 'do_response';
                                                          $interest_text     = $received_expressed_interest->status == 0 ? translate('Response to Interest') : translate('You Accepted Interest');
                                                      }
                                                      else
                                                      {
                                                          $interest_onclick  = 0;
                                                          $interest_text     = $do_expressed_interest->status == 0 ? translate('Interest Expressed') : translate('Interest Accepted');
                                                      }
                                                    ?>

                                                    <a id="interest_a_id_<?php echo e($user->id); ?>"
                                                        <?php if($interest_onclick == 1): ?>
                                                            onclick="express_interest(<?php echo e($user->id); ?>)"
                                                        <?php elseif($interest_onclick == 'do_response'): ?>
                                                            href="<?php echo e(route('interest_requests')); ?>"
                                                        <?php endif; ?>
                                                        class="text-reset c-pointer"
                                                    >
                                                        <i class="la la-heart-o fs-20 text-primary"></i>
                                                        <span id="interest_id_<?php echo e($user->id); ?>" class="d-block fs-10 opacity-60 <?php echo e($interest_class); ?>">
                                                            <?php echo e($interest_text); ?>

                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <?php
                                                      $shortlist = \App\Models\Shortlist::where('user_id', $user->id)->where('shortlisted_by',Auth::user()->id)->first();
                                                      if(empty($shortlist)){
                                                          $shortlist_onclick  = 1;
                                                          $shortlist_text     = translate('Shortlist');
                                                          $shortlist_class    = "text-dark";
                                                      }
                                                      else{
                                                          $shortlist_onclick  = 0;
                                                          $shortlist_text     = translate('Shortlisted');
                                                          $shortlist_class    = "text-primary";
                                                      }
                                                    ?>
                                                    <a id="shortlist_a_id_<?php echo e($user->id); ?>"
                                                      <?php if($shortlist_onclick == 1): ?>
                                                        onclick="do_shortlist(<?php echo e($user->id); ?>)"
                                                      <?php else: ?>
                                                        onclick="remove_shortlist(<?php echo e($user->id); ?>)"
                                                      <?php endif; ?>
                                                        class="text-reset c-pointer"
                                                    >
                                                        <i class="las la-list fs-20 text-primary"></i>
                                                        <span id="shortlist_id_<?php echo e($user->id); ?>" class="d-block fs-10 opacity-60 <?php echo e($shortlist_class); ?>">
                                                            <?php echo e($shortlist_text); ?>

                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a onclick="ignore_member(<?php echo e($user->id); ?>)" class="text-reset c-pointer">
                                                      <span class="text-dark">
                                                        <i class="las la-ban fs-20 text-primary"></i>
                                                        <span class="d-block fs-10 opacity-60"><?php echo e(translate('Ignore')); ?></span>
                                                      </span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <?php
                                                      $profile_reported = \App\Models\ReportedUser::where('user_id', $user->id)->where('reported_by',Auth::user()->id)->first();
                                                      if(empty($profile_reported)){
                                                          $report_onclick  = 1;
                                                          $report_text     = translate('Report');
                                                          $report_class    = "text-dark";
                                                      }
                                                      else{
                                                          $report_onclick  = 0;
                                                          $report_text     = translate('Reported');
                                                          $report_class    = "text-primary";
                                                      }
                                                    ?>
                                                    <a id="report_a_id_<?php echo e($user->id); ?>"
                                                      <?php if($report_onclick == 1): ?>
                                                        onclick="report_member(<?php echo e($user->id); ?>)"
                                                      <?php endif; ?>
                                                        class="text-reset c-pointer">
                                                      <span id="report_id_<?php echo e($user->id); ?>" class="<?php echo e($report_class); ?>">
                                                        <i class="las la-info-circle fs-20 text-primary"></i>
                                                        <span class="d-block fs-10 opacity-60"><?php echo e($report_text); ?></span>
                                                      </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="aiz-pagination">
                            <?php echo e($users->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.package_update_alert_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Ignore Modal -->
    <div class="modal fade ignore_member_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6"><?php echo e(translate('Ignore Member!')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(translate('Are you sure that you want to ignore this member?')); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                    <button type="submit" class="btn btn-primary" id="ignore_button"><?php echo e(translate('Ignore')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Profile -->
    <div class="modal fade report_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6"><?php echo e(translate('Report Member!')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('reportusers.store')); ?>" id="report-modal-form" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="member_id" id="member_id" value="">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Report Reason')); ?><span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="reason" rows="4" class="form-control" placeholder="<?php echo e(translate('Report Reason')); ?>" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                    <button type="button" class="btn btn-primary" onclick="submitReport()"><?php echo e(translate('Report')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">

    $(document).ready(function(){
       get_castes_by_religion();
       get_sub_castes_by_caste();
       get_states_by_country();
       get_cities_by_state()
    });

    // Get Castes and Subcastes
    function get_castes_by_religion(){
      var religion_id = $('#religion_id').val();
      $.post('<?php echo e(route('castes.get_caste_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', religion_id:religion_id}, function(data){
          $('#caste_id').html(null);
          $('#caste_id').append($('<option>', {
              value: '',
              text: 'Choose One'
          }));
          for (var i = 0; i < data.length; i++) {
              $('#caste_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
          }
          $("#caste_id > option").each(function() {
              if(this.value == '<?php echo e($caste_id); ?>'){
                  $("#caste_id").val(this.value).change();
              }
          });
          AIZ.plugins.bootstrapSelect('refresh');

          get_sub_castes_by_caste();
      });
    }

    function get_sub_castes_by_caste(){
      var caste_id = $('#caste_id').val();
      $.post('<?php echo e(route('sub_castes.get_sub_castes_by_religion')); ?>',{_token:'<?php echo e(csrf_token()); ?>', caste_id:caste_id}, function(data){
          $('#sub_caste_id').html(null);
          $('#sub_caste_id').append($('<option>', {
              value: '',
              text: 'Choose One'
          }));
          for (var i = 0; i < data.length; i++) {
              $('#sub_caste_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
          }
          $("#sub_caste_id > option").each(function() {
              if(this.value == '<?php echo e($sub_caste_id); ?>'){
                  $("#sub_caste_id").val(this.value).change();
              }
          });
          AIZ.plugins.bootstrapSelect('refresh');
      });
    }

    $('#religion_id').on('change', function() {
      get_castes_by_religion();
    });

    $('#caste_id').on('change', function() {
      get_sub_castes_by_caste();
    });

    // Get Countries and States
    function get_states_by_country(){
      var country_id = $('#country_id').val();
          $.post('<?php echo e(route('states.get_state_by_country')); ?>',{_token:'<?php echo e(csrf_token()); ?>', country_id:country_id}, function(data){
              $('#state_id').html(null);
              $('#state_id').append($('<option>', {
                  value: '',
                  text: 'Choose One'
              }));
              for (var i = 0; i < data.length; i++) {
                  $('#state_id').append($('<option>', {
                      value: data[i].id,
                      text: data[i].name
                  }));
              }
              $("#state_id > option").each(function() {
                  if(this.value == '<?php echo e($state_id); ?>'){
                      $("#state_id").val(this.value).change();
                  }
              });

              AIZ.plugins.bootstrapSelect('refresh');

              get_cities_by_state();
          });
    }

    function get_cities_by_state(){
      var state_id = $('#state_id').val();
          $.post('<?php echo e(route('cities.get_cities_by_state')); ?>',{_token:'<?php echo e(csrf_token()); ?>', state_id:state_id}, function(data){
              $('#city_id').html(null);
              $('#city_id').append($('<option>', {
                  value: '',
                  text: 'Choose One'
              }));
              for (var i = 0; i < data.length; i++) {
                  $('#city_id').append($('<option>', {
                      value: data[i].id,
                      text: data[i].name
                  }));
              }
              $("#city_id > option").each(function() {
                  if(this.value == '<?php echo e($city_id); ?>'){
                      $("#city_id").val(this.value).change();
                  }
              });
              AIZ.plugins.bootstrapSelect('refresh');
          });
    }

    $('#country_id').on('change', function() {
      get_states_by_country();
    });

    $('#state_id').on('change', function() {
      get_cities_by_state();
    });

    // Full Profile view
    function package_update_alert(){
      $('.package_update_alert_modal').modal('show');
    }

    // Express Interest
    var package_validity = <?php echo e(package_validity(Auth::user()->id)); ?>;
    var remaining_interest = <?php echo e(get_remaining_value(Auth::user()->id,'remaining_interest')); ?>;
    function express_interest(id)
    {
        if( package_validity == 0 || remaining_interest < 1){
            $('.package_update_alert_modal').modal('show');
        }
        else {
          $('.confirm_modal').modal('show');
          $("#confirm_modal_title").html("<?php echo e(translate('Confirm Express Interest!')); ?>");
          $("#confirm_modal_content").html("<p class='fs-14'><?php echo e(translate('Remaining Express Interest')); ?>: "+remaining_interest+" <?php echo e(translate('Times')); ?></p><small class='text-danger'><?php echo e(translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')); ?></small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        }
    }

    function do_express_interest(id)
    {
        $("#interest_a_id_"+id).removeAttr("onclick");
        $("#interest_id_"+id).html("<?php echo e(translate('Processing')); ?>..");
        $.post('<?php echo e(route('express-interest.store')); ?>',
          {
            _token: '<?php echo e(csrf_token()); ?>',
            id: id
          },
          function (data) {
              // console.log(data);
            if (data == 1) {
              $('.confirm_modal').modal('toggle');
              $("#interest_id_"+id).html("<?php echo e(translate('Interest Expressed')); ?>");
              $("#interest_id_"+id).attr("class","d-block fs-10 opacity-60 text-primary");
              AIZ.plugins.notify('success', '<?php echo e(translate('Interest Expressed Sucessfully')); ?>');
            }
            else {
                $("#interest_id_"+id).html("<?php echo e(translate('Interest')); ?>");
                AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
            }
          }
        );
    }

    // Shortlist
    function do_shortlist(id){
        $("#shortlist_a_id_"+id).removeAttr("onclick");
        $("#shortlist_id_"+id).html("<?php echo e(translate('Shortlisting')); ?>..");
        $.post('<?php echo e(route('member.add_to_shortlist')); ?>',
          {
            _token: '<?php echo e(csrf_token()); ?>',
            id: id
          },
          function (data) {
            if (data == 1) {
              $("#shortlist_id_"+id).html("<?php echo e(translate('Shortlisted')); ?>");
              $("#shortlist_id_"+id).attr("class","d-block fs-10 opacity-60 text-primary");
              $("#shortlist_a_id_"+id).attr("onclick","remove_shortlist("+id+")");
              AIZ.plugins.notify('success', '<?php echo e(translate('You Have Shortlisted This Member.')); ?>');
            }
            else {
                $("#shortlist_id_"+id).html("<?php echo e(translate('Shortlist')); ?>");
                AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
            }
          }
        );
    }

    function remove_shortlist(id) {
        $("#shortlist_a_id_"+id).removeAttr("onclick");
        $("#shortlist_id_"+id).html("<?php echo e(translate('Removing')); ?>..");
        $.post('<?php echo e(route('member.remove_from_shortlist')); ?>',
          {
            _token: '<?php echo e(csrf_token()); ?>',
            id: id
          },
          function (data) {
            if (data == 1) {
              $("#shortlist_id_"+id).html("<?php echo e(translate('Shortlist')); ?>");
              $("#shortlist_id_"+id).attr("class","d-block fs-10 opacity-60 text-dark");
              $("#shortlist_a_id_"+id).attr("onclick","do_shortlist("+id+")");
              AIZ.plugins.notify('success', '<?php echo e(translate('You Have Removed This Member From Your Shortlist.')); ?>');
            }
            else {
              AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
            }
          }
        );
      }

    // Ignore
    function ignore_member(id) {
        $('.ignore_member_modal').modal('show');
        $("#ignore_button").attr("onclick","do_ignore("+id+")");
    }

    function do_ignore(id) {
        $.post('<?php echo e(route('member.add_to_ignore_list')); ?>',
            {
            _token: '<?php echo e(csrf_token()); ?>',
            id: id
            },
            function (data) {
                if (data == 1) {
                    $("#block_id_"+id).hide();
                    $('.ignore_member_modal').modal('toggle');
                    AIZ.plugins.notify('success', '<?php echo e(translate('You Have Ignored This Member.')); ?>');
                }
                else {
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            }
        );
    }

    function report_member(id) {
        $('.report_modal').modal('show');
        $('#member_id').val(id);
    }

    function submitReport(){
        $('#report-modal-form').submit();
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/member_listing/index.blade.php ENDPATH**/ ?>