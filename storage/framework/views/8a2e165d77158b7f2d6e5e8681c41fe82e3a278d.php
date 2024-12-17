<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Hobbies & Interest')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('hobbies.update', $member->id)); ?>" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="hobbies"><?php echo e(translate('Hobbies')); ?></label>
                <input type="text" name="hobbies" value="<?php echo e(!empty($member->hobbies->hobbies) ? $member->hobbies->hobbies : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Hobbies')); ?>">
            </div>
            <div class="col-md-6">
                <label for="interests"><?php echo e(translate('Interests')); ?></label>
                <input type="text" name="interests" value="<?php echo e(!empty($member->hobbies->interests) ? $member->hobbies->interests : ""); ?>" placeholder="<?php echo e(translate('Interests')); ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="music"><?php echo e(translate('Music')); ?></label>
                <input type="text" name="music" value="<?php echo e(!empty($member->hobbies->music) ? $member->hobbies->music : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Music')); ?>">
            </div>
            <div class="col-md-6">
                <label for="books"><?php echo e(translate('Books')); ?></label>
                <input type="text" name="books" value="<?php echo e(!empty($member->hobbies->books) ? $member->hobbies->books : ""); ?>" placeholder="<?php echo e(translate('Books')); ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="movies"><?php echo e(translate('Movies')); ?></label>
                <input type="text" name="movies" value="<?php echo e(!empty($member->hobbies->movies) ? $member->hobbies->movies : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Movies')); ?>">
            </div>
            <div class="col-md-6">
                <label for="tv_shows"><?php echo e(translate('TV Shows')); ?></label>
                <input type="text" name="tv_shows" value="<?php echo e(!empty($member->hobbies->tv_shows) ? $member->hobbies->tv_shows : ""); ?>" placeholder="<?php echo e(translate('TV Shows')); ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="sports"><?php echo e(translate('Sports')); ?></label>
                <input type="text" name="sports" value="<?php echo e(!empty($member->hobbies->sports) ? $member->hobbies->sports : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Sports')); ?>">
            </div>
            <div class="col-md-6">
                <label for="fitness_activities"><?php echo e(translate('Fitness Activitiess')); ?></label>
                <input type="text" name="fitness_activities" value="<?php echo e(!empty($member->hobbies->fitness_activities) ? $member->hobbies->fitness_activities : ""); ?>" placeholder="<?php echo e(translate('Fitness Activities')); ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="cuisines"><?php echo e(translate('Cuisines')); ?></label>
                <input type="text" name="cuisines" value="<?php echo e(!empty($member->hobbies->cuisines) ? $member->hobbies->cuisines : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Cuisines')); ?>">
            </div>
            <div class="col-md-6">
                <label for="dress_styles"><?php echo e(translate('Dress Styles')); ?></label>
                <input type="text" name="dress_styles" value="<?php echo e(!empty($member->hobbies->dress_styles) ? $member->hobbies->dress_styles : ""); ?>" placeholder="<?php echo e(translate('Dress Styles')); ?>" class="form-control">
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/hobbies_interest.blade.php ENDPATH**/ ?>