<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Introduction')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('member.introduction.update', $member->member->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <label class="col-md-2 col-form-label"><?php echo e(translate('Introduction')); ?></label>
            <div class="col-md-10">
                <textarea type="text" name="introduction" class="form-control" rows="4" placeholder="<?php echo e(translate('Introduction')); ?>"><?php echo e($member->member->introduction); ?></textarea>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/introduction.blade.php ENDPATH**/ ?>