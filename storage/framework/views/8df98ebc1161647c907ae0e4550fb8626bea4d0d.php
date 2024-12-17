
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Member Bulk Upload')); ?></h5>
        </div>
        <div class="card-body">
            <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                <strong><?php echo e(translate('Step 1')); ?>:</strong>
                <p><?php echo e(translate('1. Download the skeleton file and fill it with proper data')); ?>.</p>
                <p><?php echo e(translate('2. You can download the example file to understand how the data must be filled')); ?>.</p>
                <p><?php echo e(translate('3. Once you have downloaded and filled the skeleton file, upload it in the form below and submit')); ?>.</p>
            </div>
            <br>
            <div class="">
                <a href="<?php echo e(static_asset('download/member_bulk_demo.xlsx')); ?>" download><button class="btn btn-info"><?php echo e(translate('Download CSV')); ?></button></a>
            </div>
            <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                <strong><?php echo e(translate('Step 2')); ?>:</strong>
                <p><?php echo e(translate('1. Gender, On Behalf Id and Package Id should be in numerical id.')); ?>.</p>
                <p><?php echo e(translate('2. Gender numerical ids are, Male Id = 1, Female Id = 2')); ?>.</p>
                <p><?php echo e(translate('3. You can download the pdf to get On Behalf Id and Package Id.')); ?>.</p>
                <p><?php echo e(translate('4. Add the country code before the phone number.')); ?>.</p>
            </div>
            <br>
            <div class="">
                <a href="<?php echo e(route('pdf.on_behalf')); ?>"><button class="btn btn-info"><?php echo e(translate('Download On Behalf')); ?></button></a>
                <a href="<?php echo e(route('pdf.package')); ?>"><button class="btn btn-info"><?php echo e(translate('Download Package')); ?></button></a>
            </div>
            <br>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><strong><?php echo e(translate('Upload Member File')); ?></strong></h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="<?php echo e(route('bulk_member_upload')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <div class="custom-file">
    						<label class="custom-file-label">
    							<input type="file" name="bulk_file" class="custom-file-input" required>
    							<span class="custom-file-name"><?php echo e(translate('Choose File')); ?></span>
    						</label>
    					</div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-info"><?php echo e(translate('Upload CSV')); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/bulk_member/index.blade.php ENDPATH**/ ?>