
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6"><?php echo e(translate('Happy Stories')); ?></h5>
        </div>
        <div class="col-md-4">
            <form class="" id="sort_happy_story" action="" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name & Enter')); ?>">
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Member Name')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Partner Name')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Post Time')); ?></th>
                    <th><?php echo e(translate('Approval')); ?></th>
                    <th class="text-right" width="20%"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $happy_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $happy_story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($happy_stories->currentPage() - 1)*$happy_stories->perPage()); ?></td>
                        <td><?php echo e($happy_story->user->first_name.' '.$happy_story->user->last_name); ?></td>
                        <td><?php echo e($happy_story->partner_name); ?></td>
                        <td><?php echo e($happy_story->created_at); ?></td>
                        <td>
                          <label class="aiz-switch aiz-switch-success mb-0">
                            <input onchange="update_status(this)" value="<?php echo e($happy_story->id); ?>" type="checkbox"
                                <?php if($happy_story->approved == 1): ?> checked <?php endif; ?>
                                <?php if(auth()->user()->cannot('approve_happy_story')): ?> disabled <?php endif; ?> >
                            <span class="slider round"></span>
                        </td>
                        <td class="text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_happy_story')): ?>
                                <a href="<?php echo e(route('happy-story.edit', encrypt($happy_story->id))); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Edit')); ?>">
                                    <i class="las la-edit"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_details_happy_story')): ?>
                                <a href="<?php echo e(route('happy-story.show', encrypt($happy_story->id))); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm" title="<?php echo e(translate('View')); ?>">
                                    <i class="las la-eye"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($happy_stories->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>
  function sort_family_status(el){
      $('#sort_happy_story').submit();
  }
  function update_status(el){
        if(el.checked){
            var status = 1;
        }
        else{
            var status = 0;
        }
        $.post('<?php echo e(route('happy_story_approval.status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
            if(data == 1){
                AIZ.plugins.notify('success', '<?php echo e(translate('Happy story appeoval status updated successfully')); ?>');
            }
            else{
                AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/happy_stories/index.blade.php ENDPATH**/ ?>