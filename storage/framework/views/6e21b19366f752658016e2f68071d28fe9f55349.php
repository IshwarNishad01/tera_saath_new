
<?php $__env->startSection('content'); ?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mar-ver pad-btm text-center">
                            <h1 class="h3">Active Matrimonial CMS Update Process</h1>
                            <p>You will need to know the following items before
                            proceeding.</p>
                        </div>
                        <ol class="list-group">
                            <li class="list-group-item text-semibold"><i class="la la-check mr-2"></i>Codecanyon purchase code</li>
                            <li class="list-group-item text-semibold"><i class="la la-check mr-2"></i>Database Name</li>
                            <li class="list-group-item text-semibold"><i class="la la-check mr-2"></i>Database Username</li>
                            <li class="list-group-item text-semibold"><i class="la la-check mr-2"></i>Database Password</li>
                            <li class="list-group-item text-semibold"><i class="la la-check mr-2"></i>Database Hostname</li>
                        </ol>
                        <br>
                        <div class="text-center">
                            <a href="<?php echo e(route('update.step1')); ?>" class="btn btn-primary text-light">
                               Update Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/update/step0.blade.php ENDPATH**/ ?>