
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Ignored Members')); ?></h5>
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
                  <?php $__currentLoopData = $ignored_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ignored_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr id="ignored_member_<?php echo e($ignored_member->user_id); ?>">
                          <td><?php echo e(($key+1) + ($ignored_members->currentPage() - 1)*$ignored_members->perPage()); ?></td>
                          <td>
                            <img class="img-md" src="<?php echo e(uploaded_asset($ignored_member->user->photo)); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                          </td>
                          <td><?php echo e($ignored_member->user->first_name.' '.$ignored_member->user->last_name); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($ignored_member->user->member->birthday)->age); ?></td>
                          <?php if(get_setting('member_spiritual_and_social_background_section') == 'on'): ?>
                          <td>
                            <?php if(!empty($ignored_member->user->spiritual_backgrounds->religion_id)): ?>
                                <?php echo e($ignored_member->user->spiritual_backgrounds->religion->name); ?>

                            <?php endif; ?>
                          </td>
                          <?php endif; ?>
                          <?php if(get_setting('member_present_address_section') == 'on'): ?>
                          <td>
                            <?php
                                $present_address = \App\Models\Address::where('type','present')->where('user_id', $ignored_member->user_id)->first();
                            ?>
                            <?php if(!empty($present_address->country_id)): ?>
                                <?php echo e($present_address->country->name); ?>

                            <?php endif; ?>
                          </td>
                          <?php endif; ?>
                          <?php if(get_setting('member_language_section') == 'on'): ?>
                          <td>
                            <?php if($ignored_member->user->member->mothere_tongue != null): ?>
                                <?php echo e(\App\Models\MemberLanguage::where('id',$ignored_member->user->member->mothere_tongue)->first()->name); ?>

                            <?php endif; ?>
                          </td>
                          <?php endif; ?>
                          <td class="text-right">
                              <a onclick="remove_from_ignored_list(<?php echo e($ignored_member->user_id); ?>)" class="btn btn-soft-success btn-icon btn-circle btn-sm" title="<?php echo e(translate('Remove From Ignore List')); ?>">
                                  <i class="las la-check"></i>
                              </a>
                          </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="aiz-pagination">
                <?php echo e($ignored_members->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function remove_from_ignored_list(id) {
      $.post('<?php echo e(route('member.remove_from_ignored_list')); ?>',
        {
          _token: '<?php echo e(csrf_token()); ?>',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#ignored_member_"+id).hide();
            AIZ.plugins.notify('success', '<?php echo e(translate('You Have Removed This Member From Your Ignored list')); ?>');
          }
          else {
            AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
          }
        }
      );
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/my_ignored_members.blade.php ENDPATH**/ ?>