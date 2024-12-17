<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6"><?php echo e(translate('Partner Expectation')); ?></h5>
</div>
<div class="card-body">
    <form action="<?php echo e(route('partner_expectations.update', $member->id)); ?>" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="general"><?php echo e(translate('General')); ?></label>
                <input type="text" name="general" value="<?php echo e(!empty($member->partner_expectations->general) ? $member->partner_expectations->general : ""); ?>" class="form-control" placeholder="<?php echo e(translate('General')); ?>">
            </div>
            <div class="col-md-6">
                <label for="residence_country_id"><?php echo e(translate('Residence Country')); ?></label>
                <?php $partner_residence_country = !empty($member->partner_expectations->residence_country_id) ? $member->partner_expectations->residence_country_id : ""; ?>
                <select class="form-control aiz-selectpicker" name="residence_country_id" data-live-search="true">

                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php if($country->id == $partner_residence_country): ?> selected <?php endif; ?> ><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['residence_country_id'];
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
                <label for="partner_height"><?php echo e(translate('Height')); ?></label>
                <input type="text" name="partner_height" value="<?php echo e(!empty($member->partner_expectations->height) ? $member->partner_expectations->height : ""); ?>" placeholder="<?php echo e(translate('Height')); ?>" class="form-control">
                <?php $__errorArgs = ['partner_height'];
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
                <label for="partner_weight"><?php echo e(translate('Weight')); ?></label>
                <input type="text" name="partner_weight" value="<?php echo e(!empty($member->partner_expectations->weight) ? $member->partner_expectations->weight : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Weight')); ?>">
                <?php $__errorArgs = ['partner_weight'];
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
                <label for="partner_marital_status"><?php echo e(translate('Marital Status')); ?></label>
                <select class="form-control aiz-selectpicker" name="partner_marital_status" data-live-search="true">
                    <?php $__currentLoopData = $marital_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marital_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($marital_status->id); ?>" <?php if($member->member->marital_status_id == $marital_status->id): ?> selected <?php endif; ?>><?php echo e($marital_status->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['partner_marital_status'];
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
                <label for="partner_children_acceptable"><?php echo e(translate('Children Acceptable')); ?></label>
                <input type="text" name="partner_children_acceptable" value="<?php echo e(!empty($member->partner_expectations->children_acceptable) ? $member->partner_expectations->children_acceptable : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Children Acceptable')); ?>">
                <?php $__errorArgs = ['partner_children_acceptable'];
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
                <label for="partner_religion_id"><?php echo e(translate('Religion')); ?></label>
                <select class="form-control aiz-selectpicker" name="partner_religion_id" id="partner_religion_id" data-live-search="true">
                    <option value=""><?php echo e(translate('Select One')); ?></option>
                    <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($religion->id); ?>" <?php if($religion->id == $partner_religion_id): ?> selected <?php endif; ?>> <?php echo e($religion->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['partner_religion_id'];
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
                <label for="partner_caste_id"><?php echo e(translate('Caste')); ?></label>
                <select class="form-control aiz-selectpicker" name="partner_caste_id" id="partner_caste_id" data-live-search="true">

                </select>
                <?php $__errorArgs = ['partner_caste_id'];
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
                <label for="partner_sub_caste_id"><?php echo e(translate('Sub Caste')); ?></label>
                <select class="form-control aiz-selectpicker" name="partner_sub_caste_id" id="partner_sub_caste_id" data-live-search="true">

                </select>
            </div>
            <div class="col-md-6">
                <label for="language_id"><?php echo e(translate('Language')); ?></label>
                <select class="form-control aiz-selectpicker" name="language_id" data-live-search="true">
                    <option value=""><?php echo e(translate('Select One')); ?></option>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language->id); ?>" <?php if($language->id == !empty($member->partner_expectations->language_id) ? $member->partner_expectations->language_id : ""): ?> selected <?php endif; ?>> <?php echo e($language->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['language_id'];
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
                <label for="pertner_education"><?php echo e(translate('Education')); ?></label>
                <input type="text" name="pertner_education" value="<?php echo e(!empty($member->partner_expectations->education) ? $member->partner_expectations->education : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Education')); ?>">
                <?php $__errorArgs = ['pertner_education'];
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
                <label for="partner_profession"><?php echo e(translate('Profession')); ?></label>
                <input type="text" name="partner_profession" value="<?php echo e(!empty($member->partner_expectations->profession) ? $member->partner_expectations->profession : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Profession')); ?>">
                <?php $__errorArgs = ['partner_profession'];
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
                <label for="smoking_acceptable"><?php echo e(translate('Smoking Acceptable')); ?></label>
                <input type="text" name="smoking_acceptable" value="<?php echo e(!empty($member->partner_expectations->smoking_acceptable) ? $member->partner_expectations->smoking_acceptable : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Smoking Acceptable')); ?>">
                <?php $__errorArgs = ['smoking_acceptable'];
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
                <label for="drinking_acceptable"><?php echo e(translate('Drinking Acceptable')); ?></label>
                <input type="text" name="drinking_acceptable" value="<?php echo e(!empty($member->partner_expectations->drinking_acceptable) ? $member->partner_expectations->drinking_acceptable : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Drinking Acceptable')); ?>">
                <?php $__errorArgs = ['drinking_acceptable'];
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
                <label for="partner_diet"><?php echo e(translate('Diet')); ?></label>
                <input type="text" name="partner_diet" value="<?php echo e(!empty($member->partner_expectations->diet) ? $member->partner_expectations->diet : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Diet')); ?>">
                <?php $__errorArgs = ['partner_diet'];
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
                <label for="partner_body_type"><?php echo e(translate('Body Type')); ?></label>
                <input type="text" name="partner_body_type" value="<?php echo e(!empty($member->partner_expectations->body_type) ? $member->partner_expectations->body_type : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Body Type')); ?>">
                <?php $__errorArgs = ['partner_body_type'];
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
                <label for="partner_personal_value"><?php echo e(translate('Personal Value')); ?></label>
                <input type="text" name="partner_personal_value" value="<?php echo e(!empty($member->partner_expectations->personal_value) ? $member->partner_expectations->personal_value : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Personal Value')); ?>">
                <?php $__errorArgs = ['partner_personal_value'];
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
                <label for="partner_manglik"><?php echo e(translate('Manglik')); ?></label>
                <input type="text" name="partner_manglik" value="<?php echo e(!empty($member->partner_expectations->manglik) ? $member->partner_expectations->manglik : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Manglik')); ?>">
                <?php $__errorArgs = ['partner_manglik'];
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
                <label for="partner_country_id"><?php echo e(translate('Preferred Country')); ?></label>
                <select class="form-control aiz-selectpicker" name="partner_country_id" id="partner_country_id" data-live-search="true">
                    <option value=""><?php echo e(translate('Select One')); ?></option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php if($country->id == $partner_country_id): ?> selected <?php endif; ?>><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['partner_country_id'];
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
                <label for="partner_state_id"><?php echo e(translate('Preferred State')); ?></label>
                <select class="form-control aiz-selectpicker" name="partner_state_id" id="partner_state_id" data-live-search="true">

                </select>
                <?php $__errorArgs = ['partner_state_id'];
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
                <label for="family_value_id"><?php echo e(translate('Family Value')); ?></label>
                <select class="form-control aiz-selectpicker" name="family_value_id" data-live-search="true" >
                    <option value=""><?php echo e(translate('Select One')); ?></option>
                    <?php $__currentLoopData = $family_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $family_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($family_value->id); ?>" <?php if($family_value->id == !empty($member->partner_expectations->family_value_id) ? $member->partner_expectations->family_value_id : ""): ?> selected <?php endif; ?>> <?php echo e($family_value->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['family_value_id'];
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
                <label for="pertner_complexion"><?php echo e(translate('Complexion')); ?></label>
                <input type="text" name="pertner_complexion" value="<?php echo e(!empty($member->partner_expectations->complexion) ? $member->partner_expectations->complexion : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Complexion')); ?>">
                <?php $__errorArgs = ['pertner_complexion'];
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

        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm"><?php echo e(translate('Update')); ?></button>
        </div>
    </form>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/edit/partner_expectation.blade.php ENDPATH**/ ?>