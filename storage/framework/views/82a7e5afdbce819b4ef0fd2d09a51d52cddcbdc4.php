
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('Deleted Members')); ?></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header row gutters-5">
  				<div class="col text-center text-md-left">
  					<h5 class="mb-md-0 h6"><?php echo e(translate('All Deleted Members')); ?></h5>
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
                            <th data-breakpoints="md"><?php echo e(translate('Membership')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Approval Status')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Profile Reported')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Member Science')); ?></th>
                            <th data-breakpoints="md"><?php echo e(translate('Member Status')); ?></th>
                            <th class="text-right" width="10%"><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $deleted_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deleted_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1) + ($deleted_members->currentPage() - 1)*$deleted_members->perPage()); ?></td>
                                <td>
                                    <?php if(uploaded_asset($deleted_member->photo) != null): ?>
                                        <img class="img-md" src="<?php echo e(uploaded_asset($deleted_member->photo)); ?>" height="45px" alt="<?php echo e(translate('photo')); ?>">
                                    <?php else: ?>
                                        <img class="img-md" src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" height="45px"  alt="<?php echo e(translate('photo')); ?>">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($deleted_member->code); ?></td>
                                <td><?php echo e($deleted_member->first_name.' '.$deleted_member->last_name); ?></td>
                                <td>
                                    <span class="badge badge-inline badge-info">
                                        <?php echo e($deleted_member->membership == 1 ? translate('Free') : translate('Premium')); ?>

                                    </span>
                                <td>
                                    <?php if($deleted_member->approved == 1): ?>
                                        <span class="badge badge-inline badge-success"><?php echo e(translate('Approved')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-inline badge-danger"><?php echo e(translate('Pending')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                  <?php if($deleted_member->reported_users->count() > 0): ?>
                                    <a href="<?php echo e(route('reported_members', $deleted_member->id)); ?>" class="badge badge-inline badge-danger" title="<?php echo e(translate('View Reports')); ?>"><?php echo e($deleted_member->reported_users->count()); ?></a>
                                  <?php else: ?>
                                    0
                                  <?php endif; ?>
                                </td>
                                <td><?php echo e(date('d-m-Y', strtotime($deleted_member->created_at))); ?></td>
                                <td>
                                    <?php if($deleted_member->deactivated == 0): ?>
                                        <span class="badge badge-inline badge-success"><?php echo e(translate('Active')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-inline badge-danger"><?php echo e(translate('Deactivated')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restore_member')): ?>
                                        <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="<?php echo e(route('restore_deleted_member', $deleted_member->id)); ?>" title="<?php echo e(translate('Restore')); ?>">
    		                                <i class="las la-check-circle"></i>
    		                            </a>
                                    <?php endif; ?>
                                    <a href="javascript:void(0);" data-href="<?php echo e(route('members.permanently_delete', $deleted_member->id)); ?>" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="<?php echo e(translate('Permanently Delete')); ?>">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <?php echo e($deleted_members->links()); ?>

                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
  <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div id="restore-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6"><?php echo e(translate('Restore Confirmation')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1"><?php echo e(translate('Are you sure to restore this member?')); ?></p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                <a id="restore-link" class="btn btn-primary mt-2"><?php echo e(translate('Restore')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function sort_members(el){
            $('#sort_members').submit();
        }

        $(".confirm-restore").click(function(e) {
            var url = $(this).data("href");
            $("#restore-modal").modal("show");
            $("#restore-link").attr("href", url);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/deleted_members.blade.php ENDPATH**/ ?>