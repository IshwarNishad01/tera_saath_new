<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Partner Expectation')); ?></h5>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('partner_expectations.update', $member->id)); ?>" method="POST">
            <input name="_method" type="hidden" value="PATCH">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="general"><?php echo e(translate('General Requirement')); ?></label>
                    <input type="text" name="general" value="<?php echo e(!empty($member->partner_expectations->general) ? $member->partner_expectations->general : ""); ?>" class="form-control" placeholder="<?php echo e(translate('General')); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="residence_country_id"><?php echo e(translate('Residence Country')); ?></label>
                    <?php $partner_residence_country = !empty($member->partner_expectations->residence_country_id) ? $member->partner_expectations->residence_country_id : ""; ?>
                    <select class="form-control aiz-selectpicker" name="residence_country_id" data-live-search="true" required>
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
                    <label for="partner_height"><?php echo e(translate('Min Height')); ?>  (<?php echo e(translate('In Feet')); ?>)</label>
                    <input type="number" name="partner_height" value="<?php echo e(!empty($member->partner_expectations->height) ? $member->partner_expectations->height : ""); ?>" step=".1" placeholder="<?php echo e(translate('Height')); ?>" class="form-control" required>
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
                    <label for="partner_weight"><?php echo e(translate('Max Weight')); ?>  (<?php echo e(translate('In Kg')); ?>)</label>
                    <input type="number" name="partner_weight" value="<?php echo e(!empty($member->partner_expectations->weight) ? $member->partner_expectations->weight : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Weight')); ?>" required>
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
                    <?php $partner_marital_status_id = !empty($member->partner_expectations->marital_status_id) ? $member->partner_expectations->marital_status_id : ""; ?>
                    <select class="form-control aiz-selectpicker" name="partner_marital_status" data-live-search="true" required>
                        <?php $__currentLoopData = $marital_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marital_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value=""><?php echo e(translate('Choose One')); ?></option>
                            <option value="<?php echo e($marital_status->id); ?>" <?php if($partner_marital_status_id == $marital_status->id): ?> selected <?php endif; ?>><?php echo e($marital_status->name); ?></option>
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
                    <?php $children_acceptable = !empty($member->partner_expectations->children_acceptable) ? $member->partner_expectations->children_acceptable : ""; ?>
                    <select class="form-control aiz-selectpicker" name="partner_children_acceptable" required>
                        <option value=""><?php echo e(translate('Choose One')); ?></option>
                        <option value="no" <?php if($children_acceptable ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <option value="yes" <?php if($children_acceptable ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="dose_not_matter" <?php if($children_acceptable ==  'dose_not_matter'): ?> selected <?php endif; ?> ><?php echo e(translate('Dose not matter')); ?></option>
                    </select>
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
                    <select class="form-control aiz-selectpicker" name="partner_religion_id" id="partner_religion_id" data-live-search="true" required>
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
                <div class="col-md-6" style="display: none;">
                    <label for="partner_sub_caste_id"><?php echo e(translate('Sub Caste')); ?></label>
                    <select class="form-control aiz-selectpicker" name="partner_sub_caste_id" id="partner_sub_caste_id" data-live-search="true">

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="language_id"><?php echo e(translate('Language')); ?></label>
                    <?php $partner_language = !empty($member->partner_expectations->language_id) ? $member->partner_expectations->language_id : ""; ?>
                    <select class="form-control aiz-selectpicker" name="language_id" data-live-search="true" required>
                        <option value=""><?php echo e(translate('Select One')); ?></option>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value=""><?php echo e(translate('Choose One')); ?></option>
                            <option value="<?php echo e($language->id); ?>" <?php if($language->id == $partner_language): ?> selected <?php endif; ?>> <?php echo e($language->name); ?> </option>
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
                    <?php $partner_smoking_acceptable = !empty($member->partner_expectations->smoking_acceptable) ? $member->partner_expectations->smoking_acceptable : ""; ?>
                    <select class="form-control aiz-selectpicker" name="smoking_acceptable" required>
                        <option value="no" <?php if($partner_smoking_acceptable ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <option value="yes" <?php if($partner_smoking_acceptable ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="dose_not_matter" <?php if($partner_smoking_acceptable ==  'dose_not_matter'): ?> selected <?php endif; ?> ><?php echo e(translate('Dose not matter')); ?></option>
                    </select>
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
                    <?php $partner_drinking_acceptable = !empty($member->partner_expectations->drinking_acceptable) ? $member->partner_expectations->drinking_acceptable : ""; ?>
                    <select class="form-control aiz-selectpicker" name="drinking_acceptable" required>
                        <option value="no" <?php if($partner_drinking_acceptable ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <option value="yes" <?php if($partner_drinking_acceptable ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="dose_not_matter" <?php if($partner_drinking_acceptable ==  'dose_not_matter'): ?> selected <?php endif; ?> ><?php echo e(translate('Dose not matter')); ?></option>
                    </select>
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
                    <label for="partner_diet"><?php echo e(translate('Dieting Acceptable')); ?></label>
                    <?php $partner_dieting_acceptable = !empty($member->partner_expectations->diet) ? $member->partner_expectations->diet : ""; ?>
                    <select class="form-control aiz-selectpicker" name="partner_diet" required>
                        <option value="no" <?php if($partner_dieting_acceptable ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <option value="yes" <?php if($partner_dieting_acceptable ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="dose_not_matter" <?php if($partner_dieting_acceptable ==  'dose_not_matter'): ?> selected <?php endif; ?> ><?php echo e(translate('Dose not matter')); ?></option>
                    </select>
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
                    <?php $partner_manglik = !empty($member->partner_expectations->manglik) ? $member->partner_expectations->manglik : ""; ?>
                    <select class="form-control aiz-selectpicker" name="partner_manglik" required>
                        <option value="no" <?php if($partner_manglik ==  'no'): ?> selected <?php endif; ?> ><?php echo e(translate('No')); ?></option>
                        <option value="yes" <?php if($partner_manglik ==  'yes'): ?> selected <?php endif; ?> ><?php echo e(translate('Yes')); ?></option>
                        <option value="dose_not_matter" <?php if($partner_manglik ==  'dose_not_matter'): ?> selected <?php endif; ?> ><?php echo e(translate('Dose not matter')); ?></option>
                    </select>
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
                    <select class="form-control aiz-selectpicker" name="partner_country_id" id="partner_country_id" data-live-search="true" required>
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
                    <select class="form-control aiz-selectpicker" name="family_value_id" >
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
                    <input type="text" name="pertner_complexion" value="<?php echo e(!empty($member->partner_expectations->complexion) ? $member->partner_expectations->complexion : ""); ?>" class="form-control" placeholder="<?php echo e(translate('Complexion')); ?>" required>
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
                <button type="submit" class="btn btn-primary btn-sm"><?php echo e(translate('Update')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/profile/partner_expectation.blade.php ENDPATH**/ ?>