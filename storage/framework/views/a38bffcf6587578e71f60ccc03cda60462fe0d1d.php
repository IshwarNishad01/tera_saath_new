

<?php $__env->startSection('content'); ?>
<div class="py-4 py-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-xxl-8 col-xl-8 col-md-8 ">
				<div class="card">
					<div class="card-body">

						<div class="mb-5 text-center">
							<h1 class="h3 text-primary mb-0"><?php echo e(translate('Create Your Account')); ?></h1>
							<p><?php echo e(translate('Fill out the form to get started')); ?>.</p>
						</div>
						<form class="form-default" id="reg-form" role="form" action="<?php echo e(route('register')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group mb-3">
										<label class="form-label" for="on_behalf"><?php echo e(translate('On Behalf')); ?></label>
										<?php $on_behalves = \App\Models\OnBehalf::all(); ?>
										<select class="form-control aiz-selectpicker <?php $__errorArgs = ['on_behalf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="on_behalf" required>
											<?php $__currentLoopData = $on_behalves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $on_behalf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($on_behalf->id); ?>"><?php echo e($on_behalf->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<?php $__errorArgs = ['on_behalf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
								</div>
							</div>
							<div class="row">
				        <div class="col-lg-6">
				            <div class="form-group mb-3">
											<label class="form-label" for="name"><?php echo e(translate('First Name')); ?></label>
											<input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" id="first_name" placeholder="<?php echo e(translate('First Name')); ?>"  required>
											<?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				            </div>
				        </div>
								<div class="col-lg-6">
										<div class="form-group mb-3">
												<label class="form-label" for="name"><?php echo e(translate('Last Name')); ?></label>
												<input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" id="last_name" placeholder="<?php echo e(translate('Last Name')); ?>"  required>
												<?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
								</div>
    					</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label" for="gender"><?php echo e(translate('Gender')); ?></label>
										<select class="form-control aiz-selectpicker <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender" required>
											<option value="1"><?php echo e(translate('Male')); ?></option>
											<option value="2"><?php echo e(translate('Female')); ?></option>
										</select>
										<?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label" for="name"><?php echo e(translate('Date Of Birth')); ?></label>
										<input type="text" class="form-control aiz-date-range <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_of_birth" id="date_of_birth" placeholder="<?php echo e(translate('Date Of Birth')); ?>" data-single="true" data-show-dropdown="true"  required>
										<?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
								</div>
							</div>
							<?php if(addon_activation('otp_system')): ?>
								<label class="form-label" for="email"><?php echo e(translate('Email / Phone')); ?></label>
								<div class="form-group phone-form-group mb-1">
				            <input type="tel" id="phone-code" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('phone')); ?>" placeholder="" name="phone" autocomplete="off">
				        </div>

				        <input type="hidden" name="country_code" value="">

				        <div class="form-group email-form-group mb-1 d-none">
				            <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email"  autocomplete="off">
				            <?php if($errors->has('email')): ?>
				                <span class="invalid-feedback" role="alert">
				                    <strong><?php echo e($errors->first('email')); ?></strong>
				                </span>
				            <?php endif; ?>
				        </div>

				        <div class="form-group text-right">
				            <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)"><?php echo e(translate('Use Email Instead')); ?></button>
				        </div>
							<?php else: ?>
								<div class="row">
									<div class="col-lg-12">
									  <div class="form-group mb-3">
											<label class="form-label" for="email"><?php echo e(translate('Email address')); ?></label>
											<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" id="signinSrEmail" placeholder="<?php echo e(translate('Email Address')); ?>" >
									        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									            <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
									        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									  </div>
									</div>
								</div>
							<?php endif; ?>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label" for="password"><?php echo e(translate('Password')); ?></label>
										<input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" placeholder="********" aria-label="********" required>
										<small><?php echo e(translate('Minimun 8 characters')); ?></small>
										<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label" for="password-confirm"><?php echo e(translate('Confirm password')); ?></label>
										<input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="********" required>
										<small><?php echo e(translate('Minimun 8 characters')); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								 <div class="col-lg-12">
				            <div class="form-group mb-3">
											<label class="form-label" for="name"><?php echo e(translate('Contact Number')); ?></label>
											<input type="number" class="form-control <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="contact_number" id="contact_number" placeholder="<?php echo e(translate('Contact Number')); ?>" required>
											<?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				            </div>
				        </div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label" for="password"><?php echo e(translate('Marital status')); ?></label>
										<select class="form-control" name="marital_status">
											<option value="unmarried">Unmarried</option>
											<option value="divorced">Divorced</option>
											<option value="widow">Widow</option>
											<option value="separated">Separated</option>
											<option value="awaitingdivorced">Awaiting divorced</option>
										</select>
										
										
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('Number Of Children')); ?></label>
										<input type="text" class="form-control" name="children">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('Country')); ?></label>
										<select class="form-control" name="country">
											<?php foreach (DB::table('countries')->get() as $list) { ?>
											<option value="<?=$list->name; ?>"><?=$list->name; ?></option>
										<?php } ?>
										</select>
										
										
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('State')); ?></label>
										<select class="form-control" name="state">
											<?php foreach (DB::table('states')->get() as $slist) { ?>
											<option value="<?=$slist->name; ?>"><?=$slist->name; ?></option>
										<?php } ?>
										</select>
										
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('City')); ?></label>
										<input type="text" class="form-control" name="city">
										
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('Postal Code')); ?></label>
										<input type="text" class="form-control" name="postal_code">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('Degree')); ?></label>
										<input type="text" class="form-control" name="degree">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('Institute')); ?></label>
										<input type="text" class="form-control" name="institute">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label"><?php echo e(translate('Designation')); ?></label>
										<input type="text" class="form-control" name="designation">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-3">
										<label class="form-label" for="password-confirm"><?php echo e(translate('Company')); ?></label>
										<input type="text" class="form-control" name="company">
										
									</div>
								</div>
							</div>
							<?php if(get_setting('google_recaptcha_activation') == 1): ?>
                  <div class="form-group">
                      <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                  </div>
              <?php endif; ?>

							<div class="mb-3">
								<label class="aiz-checkbox">
								<input type="checkbox" name="checkbox_example_1" required>
									<span class=opacity-60><?php echo e(translate('By signing up you agree to our')); ?>

										<a href="<?php echo e(env('APP_URL').'terms-conditions'); ?>" target="_blank"><?php echo e(translate('terms and conditions')); ?>.</a>
									</span>
									<span class="aiz-square-check"></span>
								</label>
							</div>

							<div class="mb-5">
                <button type="submit" class="btn btn-block btn-primary"><?php echo e(translate('Create Account')); ?></button>
              </div>
							<?php if(get_setting('google_login_activation') == 1 || get_setting('facebook_login_activation') == 1 || get_setting('twitter_login_activation') == 1): ?>
                <div class="mb-5">
                    <div class="separator mb-3">
                        <span class="bg-white px-3"><?php echo e(translate('Or Login With')); ?></span>
                    </div>

                    <ul class="list-inline social colored text-center">
											<?php if(get_setting('facebook_login_activation') == 1): ?>
	                        <li class="list-inline-item">
	                            <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="facebook" title="<?php echo e(translate('Facebook')); ?>"><i class="lab la-facebook-f"></i></a>
	                        </li>
											<?php endif; ?>
											<?php if(get_setting('google_login_activation') == 1): ?>
		                      <li class="list-inline-item">
		                          <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="google" title="<?php echo e(translate('Google')); ?>"><i class="lab la-google"></i></a>
		                      </li>
											<?php endif; ?>
											<?php if(get_setting('twitter_login_activation') == 1): ?>
	                        <li class="list-inline-item">
	                            <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="twitter" title="<?php echo e(translate('Twitter')); ?>"><i class="lab la-twitter"></i></a>
	                        </li>
											<?php endif; ?>
	                  </ul>
	              </div>
							<?php endif; ?>

              <div class="text-center">
                  <p class="text-muted mb-0"><?php echo e(translate("Already have an account?")); ?></p>
                  <a href="<?php echo e(route('login')); ?>"><?php echo e(translate('Login to your account')); ?></a>
              </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
		// making the CAPTCHA  a required field for form submission
		<?php if(get_setting('google_recaptcha_activation') == 1): ?>
				$(document).ready(function(){
				// alert('helloman');
				$("#reg-form").on("submit", function(evt)
				{
						var response = grecaptcha.getResponse();
						if(response.length == 0)
						{
						//reCaptcha not verified
								alert("please verify you are humann!");
								evt.preventDefault();
								return false;
						}
						//captcha verified
						//do the rest of your validations here
						$("#reg-form").submit();
				});
		});
		<?php endif; ?>


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

		function toggleEmailPhone(el){
		    if(isPhoneShown){
		        $('.phone-form-group').addClass('d-none');
		        $('.email-form-group').removeClass('d-none');
		        isPhoneShown = false;
		        $(el).html('<?php echo e(translate('Use Phone Instead')); ?>');
		    }
		    else{
		        $('.phone-form-group').removeClass('d-none');
		        $('.email-form-group').addClass('d-none');
		        isPhoneShown = true;
		        $(el).html('<?php echo e(translate('Use Email Instead')); ?>');
		    }
		}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/user_registration.blade.php ENDPATH**/ ?>