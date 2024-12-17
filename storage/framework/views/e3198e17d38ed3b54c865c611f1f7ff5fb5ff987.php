
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Members')); ?></h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_member')): ?>
            <div class="col-md-6 text-right">
                <a href="<?php echo e(route('members.create')); ?>" class="btn btn-circle btn-info"><?php echo e(translate('Add New Member')); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header row gutters-5">
  				<div class="col text-center text-md-left">
  					<h5 class="mb-md-0 h6"><?php echo e(translate('All members')); ?></h5>
  				</div>
  				<div class="col-md-3">
  					<form class="" id="sort_members" action="" method="GET">
  						<div class="input-group input-group-sm">
  					  		<input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type first name / last name / ID & Enter')); ?>">
  						</div>
  					</form>
  				</div>
		    </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(translate('Image')); ?></th>
                            <th><?php echo e(translate('Member Id')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Name')); ?></th>
                            <?php if(get_setting('member_approval_by_admin') == 1): ?>
                                <th data-breakpoints="md"><?php echo e(translate('Approval Status')); ?></th>
                            <?php endif; ?>
                            <th data-breakpoints="md"><?php echo e(translate('Profile Reported')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Member Science')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Member Status')); ?></th>
                            <th class="text-center" width="10%"><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1) + ($members->currentPage() - 1)*$members->perPage()); ?></td>
                                <td>
                                    <?php if(uploaded_asset($member->photo) != null): ?>
                                        <img class="img-md" src="<?php echo e(uploaded_asset($member->photo)); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                                    <?php else: ?>
                                        <img class="img-md" src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($member->code); ?></td>
                                <td><?php echo e($member->first_name.' '.$member->last_name); ?></td>
                                <?php if(get_setting('member_approval_by_admin') == 1): ?>
                                    <td>
                                        <?php if($member->blocked == 1): ?>
                                            <span class="badge badge-inline badge-danger"><?php echo e(translate('Blocked')); ?></span>
                                        <?php elseif($member->approved == 1): ?>
                                            <span class="badge badge-inline badge-success"><?php echo e(translate('Approved')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-inline badge-pending"><?php echo e(translate('Pending')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                                <td>
                                  <?php if($member->reported_users->count() > 0): ?>
                                    <a href="<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_reported_profile')): ?><?php echo e(route('reported_members', $member->id)); ?><?php endif; ?>" class="badge badge-inline badge-danger" title="<?php echo e(translate('View Reports')); ?>"><?php echo e($member->reported_users->count()); ?></a>
                                  <?php else: ?>
                                    0
                                  <?php endif; ?>
                                </td>
                                <td><?php echo e(date('d-m-Y', strtotime($member->created_at))); ?></td>
                                <td>
                                    <?php if($member->deactivated == 0): ?>
                                        <span class="badge badge-inline badge-success"><?php echo e(translate('Active')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-inline badge-danger"><?php echo e(translate('Deactivated')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group mb-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn py-0" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="las la-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_member_profile')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('members.show', $member->id)); ?>"><?php echo e(translate('View')); ?></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_member')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('members.edit', encrypt($member->id))); ?>"><?php echo e(translate('Edit')); ?></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('block_member')): ?>
                                                    <?php if($member->blocked == 0): ?>
                                                        <a class="dropdown-item" onclick="block_member(<?php echo e($member->id); ?>)" href="javascript:void(0);"><?php echo e(translate('Block')); ?></a>
                                                    <?php elseif($member->blocked == 1): ?>
                                                        <a class="dropdown-item" onclick="unblock_member(<?php echo e($member->id); ?>)" href="javascript:void(0);" ><?php echo e(translate('Unblock')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve_member')): ?>
                                                    <?php if($member->approved == 0): ?>
                                                        <a class="dropdown-item" onclick="approve_member(<?php echo e($member->id); ?>)" href="javascript:void(0);" ><?php echo e(translate('Approve')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_member_package')): ?>
                                                    <a class="dropdown-item" onclick="package_info(<?php echo e($member->id); ?>)" href="javascript:void(0);" ><?php echo e(translate('Package')); ?></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('login_as_member')): ?>
                                                    <a href="<?php echo e(route('members.login', encrypt($member->id))); ?>" class="dropdown-item"><?php echo e(translate('Log in as this Member')); ?></a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_member')): ?>
                                                    <a class="dropdown-item confirm-delete" data-href="<?php echo e(route('members.destroy', $member->id)); ?>"><?php echo e(translate('Delete')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    <?php echo e($members->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    
    <div class="modal fade member-approval-modal" id="modal-basic">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6"><?php echo e(translate('Member Approval !')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="<?php echo e(route('members.approve')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="member_id" id="member_id" value="">
                        <p class="mt-1"><?php echo e(translate('Are you sure to approve this member?')); ?></p>
                        <button type="button" class="btn btn-link mt-2" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                        <button type="submit" class="btn btn-info mt-2"><?php echo e(translate('Approve')); ?></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade member-block-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
                <form class="form-horizontal member-block" action="<?php echo e(route('members.block')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="member_id" id="block_member_id" value="">
                    <input type="hidden" name="block_status" id="block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6"><?php echo e(translate('Member Block !')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><?php echo e(translate('Blocking Reason')); ?></label>
                            <div class="col-md-9">
                                <textarea type="text" name="blocking_reason" class="form-control" placeholder="<?php echo e(translate('Blocking Reason')); ?>" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                        <button type="submit" class="btn btn-info"><?php echo e(translate('Submit')); ?></button>
                    </div>
                </form>
        	</div>
    	</div>
    </div>

    
    <div class="modal fade member-unblock-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
                <form class="form-horizontal member-block" action="<?php echo e(route('members.block')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="member_id" id="unblock_member_id" value="">
                    <input type="hidden" name="block_status" id="unblock_block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6"><?php echo e(translate('Member Unblock !')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <b><?php echo e(translate('Blocked Reason')); ?> : </b>
                            <span id="block_reason"></span>
                        </p>
                        <p class="mt-1"><?php echo e(translate('Are you want to unblock this member?')); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                        <button type="submit" class="btn btn-info"><?php echo e(translate('Unblock')); ?></button>
                    </div>
                </form>
        	</div>
    	</div>
    </div>

    <?php echo $__env->make('modals.create_edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function sort_members(el){
        $('#sort_members').submit();
    }

     function package_info(id){
         $.post('<?php echo e(route('members.package_info')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function get_package(id){
         $.post('<?php echo e(route('members.get_package')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function approve_member(id){
         $('.member-approval-modal').modal('show');
         $('#member_id').val(id);
     }

     function block_member(id){
         $('.member-block-modal').modal('show');
         $('#block_member_id').val(id);
         $('#block_status').val(1);
     }

     function unblock_member(id){
         $('#unblock_member_id').val(id);
         $('#unblock_block_status').val(0);
         $.post('<?php echo e(route('members.blocking_reason')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
             $('.member-unblock-modal').modal('show');
             $('#block_reason').html(data);
         });
     }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/index.blade.php ENDPATH**/ ?>