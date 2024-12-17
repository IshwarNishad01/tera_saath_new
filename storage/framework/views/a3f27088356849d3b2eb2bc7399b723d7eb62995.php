

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Add New Member')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('members.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('First Name')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <input type="text" name="first_name" class="form-control" placeholder="<?php echo e(translate('First Name')); ?>" required>
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
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Last Name')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <input type="text" name="last_name" class="form-control" placeholder="<?php echo e(translate('Last Name')); ?>" required>
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
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Email')); ?></label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" placeholder="<?php echo e(translate('Email')); ?>">
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
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Gender')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker" name="gender" required>
                                    <option value="1"><?php echo e(translate('Male')); ?></option>
                                    <option value="2"><?php echo e(translate('Female')); ?></option>
                                </select>
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
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Date Of Birth')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <input type="text" class="aiz-date-range form-control" name="date_of_birth"  placeholder="Select Date" data-single="true" data-show-dropdown="true">
                            </div>
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
                        <?php if(addon_activation('otp_system')): ?>
                          <div class="form-group row">
                              <label class="col-md-2 col-form-label"><?php echo e(translate('Phone Number')); ?></label>
                              <div class="col-md-9">
                                <input type="tel" id="phone-code" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" placeholder="<?php echo e(translate('Phone')); ?>" >
                                <input type="hidden" name="country_code" value="">
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
                          </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('On Behalf')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <?php $on_behalves = \App\Models\OnBehalf::all(); ?>
                                <select class="form-control aiz-selectpicker" name="on_behalf" required>
                                    <?php $__currentLoopData = $on_behalves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $on_behalf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($on_behalf->id); ?>"><?php echo e($on_behalf->name); ?></option>
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
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Package')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <?php $packages = \App\Models\Package::where('active', 1)->get(); ?>
                                <select class="form-control aiz-selectpicker" name="package" required>
                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($package->id); ?>"><?php echo e($package->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['package'];
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
                            <label class="col-md-2 col-form-label" for="signinSrEmail"><?php echo e(translate('photo')); ?> <small>(800x800)</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                    <input type="hidden" name="photo" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Password')); ?><span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <input type="password" name="password" id="new_password" class="form-control" placeholder="<?php echo e(translate('Password')); ?>" required>
                                <?php $__errorArgs = ['password'];
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
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Confirm Password')); ?> <span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="confirm_password" onkeyup="checkPasswordValidation(123)" id="confirm_password" placeholder="<?php echo e(translate('Confirm Password')); ?>" required>
                                <small id="confirm_password_help" class="form-text text-muted" style="color: red; display: none;"><?php echo e(translate('Mismatch Password.')); ?></small>
                                <?php $__errorArgs = ['confirm_password'];
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
                            <label class="col-md-2 col-form-label"><?php echo e(translate('Member Verified')); ?></label>
                            <div class="col-md-9 mt-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="member_verification" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-md-11">
                                <button type="submit" class="btn btn-primary" id="passSaveBtn" disabled><?php echo e(translate('Add Member')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script type="text/javascript">

	function checkPasswordValidation(confirm_password) {
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        $('#confirm_password_help').show();
        if(new_password === confirm_password) {
            $('#confirm_password_help').text('Password Matched');
            $('#passSaveBtn').prop("disabled", false);
        }else {
            $('#confirm_password_help').text('Mismatched Password');
            $('#passSaveBtn').prop("disabled", true);
        }
    }

    var isPhoneShown = true,
        countryData = window.intlTelInputGlobals.getCountryData(),
        input = document.querySelector("#phone-code");

    for (var i = 0; i < countryData.length; i++) {
        var country = countryData[i];
        if(country.iso2 == 'bd'){
            country.dialCode = '88';
        }
    }

    var iti = intlTelInput(input, {
        separateDialCode: true,
        utilsScript: "<?php echo e(static_asset('assets/js/intlTelutils.js')); ?>?1590403638580",
        onlyCountries: <?php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) ?>,
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
            if(selectedCountryData.iso2 == 'bd'){
                return "01xxxxxxxxx";
            }
            return selectedCountryPlaceholder;
        }
    });

    var country = iti.getSelectedCountryData();
    $('input[name=country_code]').val(country.dialCode);

    input.addEventListener("countrychange", function(e) {
        // var currentMask = e.currentTarget.placeholder;

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/create.blade.php ENDPATH**/ ?>