
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('My Shortlists')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th><?php echo e(translate('Image')); ?></th>
                      <th><?php echo e(translate('Name')); ?></th>
                      <th><?php echo e(translate('Age')); ?></th>
                      <?php if(get_setting('member_spiritual_and_social_background_section') == 'on'): ?>
                      <th><?php echo e(translate('Religion')); ?></th>
                      <?php endif; ?>
                      <?php if(get_setting('member_present_address_section') == 'on'): ?>
                      <th><?php echo e(translate('Location')); ?></th>
                      <?php endif; ?>
                      <?php if(get_setting('member_language_section') == 'on'): ?>
                      <th><?php echo e(translate('Mother Tongue')); ?></th>
                      <?php endif; ?>
                      <th class="text-right"><?php echo e(translate('Options')); ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $shortlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shortlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr id="shortlisted_member_<?php echo e($shortlist->user_id); ?>">
                          <td><?php echo e(($key+1) + ($shortlists->currentPage() - 1)*$shortlists->perPage()); ?></td>
                          <td>
                            <img class="img-md" src="<?php echo e(uploaded_asset($shortlist->user->photo)); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                          </td>
                          <td><?php echo e($shortlist->user->first_name.' '.$shortlist->user->last_name); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($shortlist->user->member->birthday)->age); ?></td>
                          <?php if(get_setting('member_spiritual_and_social_background_section') == 'on'): ?>
                          <td>
                            <?php if(!empty($shortlist->user->spiritual_backgrounds->religion_id)): ?>
                                <?php echo e($shortlist->user->spiritual_backgrounds->religion->name); ?>

                            <?php endif; ?>
                          </td>
                          <?php endif; ?>
                          <?php if(get_setting('member_present_address_section') == 'on'): ?>
                          <td>
                            <?php
                                $present_address = \App\Models\Address::where('type','present')->where('user_id', $shortlist->user_id)->first();
                            ?>
                            <?php if(!empty($present_address->country_id)): ?>
                                <?php echo e($present_address->country->name); ?>

                            <?php endif; ?>
                          </td>
                          <?php endif; ?>
                          <?php if(get_setting('member_language_section') == 'on'): ?>
                          <td>
                            <?php if($shortlist->user->member->mothere_tongue != null): ?>
                                <?php echo e(\App\Models\MemberLanguage::where('id',$shortlist->user->member->mothere_tongue)->first()->name); ?>

                            <?php endif; ?>
                          </td>
                          <?php endif; ?>
                          <td class="text-right">
                              <?php
                                $interest = \App\Models\ExpressInterest::where('user_id', $shortlist->user_id)->where('interested_by',Auth::user()->id)->first();
                              ?>
                              <?php if(empty($interest)): ?>
                                <a href="avascript:void(0);" onclick="express_interest(<?php echo e($shortlist->user_id); ?>)" id="interest_a_id_<?php echo e($shortlist->user_id); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Express Interest')); ?>">
                                    <i class="las la-heart"></i>
                                </a>
                              <?php else: ?>
                                <a href="avascript:void(0);" class="btn btn-soft-success btn-icon btn-circle btn-sm" title="<?php echo e(translate('Interest Expressed')); ?>">
                                    <i class="las la-heart"></i>
                                </a>
                              <?php endif; ?>
                              <a onclick="remove_shortlist(<?php echo e($shortlist->user_id); ?>)" class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="<?php echo e(translate('Remove')); ?>">
                                  <i class="las la-trash-alt"></i>
                              </a>
                          </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($shortlists->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
  <?php echo $__env->make('modals.confirm_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function remove_shortlist(id) {
      $.post('<?php echo e(route('member.remove_from_shortlist')); ?>',
        {
          _token: '<?php echo e(csrf_token()); ?>',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#shortlisted_member_"+id).hide();
            AIZ.plugins.notify('success', '<?php echo e(translate('You Have Removed This Member From Shortlist')); ?>');
          }
          else {
            AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
          }
        }
      );
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
          $("#confirm_modal_title").html("<?php echo e(translate('Confirm Express Interest')); ?>");
          $("#confirm_modal_content").html("<p class='fs-14'><?php echo e(translate('Remaining Express Interests')); ?>: "+remaining_interest+" <?php echo e(translate('Times')); ?></p><small class='text-danger'><?php echo e(translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')); ?></small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        }
    }

    function do_express_interest(id){
      $('.confirm_modal').modal('toggle');
      $("#interest_a_id_"+id).removeAttr("onclick");
      $.post('<?php echo e(route('express-interest.store')); ?>',
        {
          _token: '<?php echo e(csrf_token()); ?>',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#interest_a_id_"+id).attr("class","btn btn-soft-success btn-icon btn-circle btn-sm");
            $("#interest_a_id_"+id).attr("title","<?php echo e(translate('Interest Expressed')); ?>");
            AIZ.plugins.notify('success', '<?php echo e(translate('Interest Expressed Sucessfully')); ?>');
          }
          else {
              AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
          }
        }
      );
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/my_shortlists.blade.php ENDPATH**/ ?>