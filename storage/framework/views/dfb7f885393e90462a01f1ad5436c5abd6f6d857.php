<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Basic Information')); ?></h5>
</div>
<div class="card-body">

    <form action="<?php echo e(route('member.basic_info_update', $member->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="first_name" ><?php echo e(translate('First Name')); ?>

                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="first_name" value="<?php echo e($member->first_name); ?>" class="form-control" placeholder="<?php echo e(translate('First Name')); ?>">
                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
                <label for="first_name" ><?php echo e(translate('Last Name')); ?>

                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="last_name" value="<?php echo e($member->last_name); ?>" class="form-control" placeholder="<?php echo e(translate('Last Name')); ?>">
                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="first_name" ><?php echo e(translate('Gender')); ?>

                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="gender">
                    <option value="1" <?php if($member->member->gender ==  1): ?> selected <?php endif; ?> ><?php echo e(translate('Male')); ?></option>
                    <option value="2" <?php if($member->member->gender ==  2): ?> selected <?php endif; ?> ><?php echo e(translate('Female')); ?></option>
                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="form-text text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="first_name" ><?php echo e(translate('Date Of Birth')); ?>

                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="aiz-date-range form-control" value="<?php if(!empty($member->member->birthday)): ?> <?php echo e(date('Y-m-d', strtotime($member->member->birthday))); ?> <?php endif; ?>" name="date_of_birth"  placeholder="Select Date" data-single="true" data-show-dropdown="true">
                <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="<?php if(addon_activation('otp_system')): ?> col-md-6 <?php else: ?> col-md-12 <?php endif; ?>">
                <label for="email" ><?php echo e(translate('Email')); ?>

                    <span class="text-danger">*</span>
                </label>
                <input type="email" name="email" value="<?php echo e($member->email); ?>" class="form-control" placeholder="<?php echo e(translate('Email')); ?>">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <?php if(addon_activation('otp_system')): ?>
              <div class="col-md-6">
                  <label for="first_name" ><?php echo e(translate('Phone Number')); ?></label>
                  <input type="text" name="phone" value="<?php echo e($member->phone); ?>" class="form-control" placeholder="<?php echo e(translate('Phone')); ?>">
                  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <small class="form-text text-danger"><?php echo e($message); ?></small>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="first_name" ><?php echo e(translate('On Behalf')); ?>

                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="on_behalf" data-live-search="true">
                    <?php $__currentLoopData = $on_behalves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $on_behalf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($on_behalf->id); ?>" <?php if($member->member->on_behalves_id == $on_behalf->id): ?> selected <?php endif; ?>><?php echo e($on_behalf->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['on_behalf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="first_name" ><?php echo e(translate('Marital Status')); ?>

                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="marital_status" data-live-search="true">
                    <?php $__currentLoopData = $marital_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marital_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($marital_status->id); ?>" <?php if($member->member->marital_status_id == $marital_status->id): ?> selected <?php endif; ?>><?php echo e($marital_status->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
                <label for="first_name" ><?php echo e(translate('Number Of Children')); ?>

                    <span class="text-danger">*</span>
                </label>

                <select class="form-control" name="children">
                    <option>Select Option</option>
                    <option value="have">Have</option>
                    <option value="doesn't matter">Doesn't matter</option>
                    <option value="no">No</option>
                    <option value="okay if not staying together">Okay if not staying together</option>
                </select>
                <!-- <input type="text" name="children" value="<?php echo e($member->children); ?>" class="form-control" placeholder="<?php echo e(translate('Number Of Children')); ?>" > -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="contact_number" ><?php echo e(translate('Contact Number')); ?>

                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="contact_number" value="<?php echo e($member->contact_number); ?>" class="form-control" placeholder="<?php echo e(translate('Contact Number')); ?>">
                <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="form-text text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
              <label class="" for="signinSrEmail"><?php echo e(translate('Photo')); ?></small></label>
                <div class="input-group" data-toggle="aizuploader" data-type="image">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                    </div>
                    <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                    <input type="hidden" name="photo" class="selected-files" value="<?php echo e($member->photo); ?>">
                </div>
                <div class="file-preview box sm">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/basic_information.blade.php ENDPATH**/ ?>