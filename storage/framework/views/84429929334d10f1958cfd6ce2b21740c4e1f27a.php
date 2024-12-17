
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="fw-600"><?php echo e(translate('Home Page Settings')); ?></h6>
        <div class="accordion" id="accordionExample">

          <!-- Home Slider -->
          <div class="card">
            <div class="card-header" id="headingHomeSlider" data-toggle="collapse" data-target="#collapseHomeSlider" aria-expanded="true" aria-controls="collapseHomeSlider">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Home Page Slider')); ?></button>
            </div>
            <div id="collapseHomeSlider" class="collapse show" aria-labelledby="headingHomeSlider" data-parent="#accordionExample">
                <div class="card-body">
          			<form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
          				<?php echo csrf_field(); ?>
                        <div class="form-group row">
      						<label class="col-md-3 col-from-label"><?php echo e(translate('Show Home Page Slider?')); ?></label>
      						<div class="col-md-8">
      							<label class="aiz-switch aiz-switch-success mb-0">
      								<input type="hidden" name="types[]" value="show_homepage_slider">
      								<input type="checkbox" name="show_homepage_slider" <?php if( get_setting('show_homepage_slider') == 'on'): ?> checked <?php endif; ?>>
      								<span></span>
      							</label>
      						</div>
      					</div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label"><?php echo e(translate('Home Page Slider Text')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="home_slider_text">
                                <textarea class="aiz-text-editor form-control" name="home_slider_text" data-buttons='[["font", ["bold", "underline", "italic"]],["color", ["color"]],["style", ["style"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150"><?php echo get_setting('home_slider_text'); ?></textarea>
                            </div>
          				</div>

          					<div class="form-group">
          						<label><?php echo e(translate('Photos & Links')); ?></label>
          						<div class="home-slider-target">
          							<input type="hidden" name="types[]" value="home_slider_images">
          							<?php if(get_setting('home_slider_images') != null): ?>
          								<?php $__currentLoopData = json_decode(get_setting('home_slider_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          									<div class="row gutters-5">
          										<div class="col">
          											<div class="form-group">
          												<div class="input-group" data-toggle="aizuploader" data-type="image">
                    		                                <div class="input-group-prepend">
                    		                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                    		                                </div>
                    		                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                          										<input type="hidden" name="types[]" value="home_slider_images">
                				                                <input type="hidden" name="home_slider_images[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_slider_images'), true)[$key]); ?>">
                				                            </div>
                				                            <div class="file-preview box sm">
                				                            </div>
                    		                            </div>
          										</div>
          										<div class="col-md-auto">
          											<div class="form-group">
          												<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
          													<i class="las la-times"></i>
          												</button>
          											</div>
          										</div>
          									</div>
          								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          							<?php endif; ?>
          						</div>
          						<button
          							type="button"
          							class="btn btn-soft-secondary btn-sm"
          							data-toggle="add-more"
          							data-content='
          							<div class="row gutters-5">
          								<div class="col">
          									<div class="form-group">
          										<div class="input-group" data-toggle="aizuploader" data-type="image">
          											<div class="input-group-prepend">
          												<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
          											</div>
          											<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
          											<input type="hidden" name="types[]" value="home_slider_images">
          											<input type="hidden" name="home_slider_images[]" class="selected-files">
          										</div>
          										<div class="file-preview box sm">
          										</div>
          									</div>
          								</div>
          								<div class="col-md-auto">
          									<div class="form-group">
          										<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
          											<i class="las la-times"></i>
          										</button>
          									</div>
          								</div>
          							</div>'
          							data-target=".home-slider-target">
          							<?php echo e(translate('Add New')); ?>

          						</button>
          					</div>
          					<div class="text-right">
          						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
          					</div>
          				</form>
          			</div>
            </div>
          </div>

          <!-- Premium member Section -->
          <div class="card">
            <div class="card-header collapsed" id="headingPremiumMember" data-toggle="collapse" data-target="#collapsePremiumMember" aria-expanded="true" aria-controls="collapsePremiumMember">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Premium Member Section')); ?></button>
            </div>

            <div id="collapsePremiumMember" class="collapse" aria-labelledby="headingPremiumMember" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
				                <?php echo csrf_field(); ?>
                        <div class="form-group row">
              						<label class="col-md-3 col-from-label"><?php echo e(translate('Show Premium Member Section?')); ?></label>
              						<div class="col-md-9">
              							<label class="aiz-switch aiz-switch-success mb-0">
              								<input type="hidden" name="types[]" value="show_premium_member_section">
              								<input type="checkbox" name="show_premium_member_section" <?php if( get_setting('show_premium_member_section') == 'on'): ?> checked <?php endif; ?>>
              								<span></span>
              							</label>
              						</div>
              					</div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                          <div class="col-md-9">
                            <input type="hidden" name="types[]" value="premium_member_section_title">
                            <input type="text" name="premium_member_section_title" value='<?php echo e(get_setting('premium_member_section_title')); ?>' class="form-control" placeholder="<?php echo e(translate('Title')); ?>">
                          </div>
                        </div>
                        <div class="form-group row">
              						<label class="col-md-3 col-from-label"><?php echo e(translate('Sub Title')); ?></label>
                          <div class="col-md-9">
                              <input type="hidden" name="types[]" value="premium_member_section_sub_title">
                              <textarea type="text" name="premium_member_section_sub_title" class="form-control" rows="5" placeholder="<?php echo e(translate('Sub Title')); ?>" ><?php echo e(get_setting('premium_member_section_sub_title')); ?></textarea>
                          </div>
              					</div>
                        <div class="form-group row">
              						<label class="col-md-3 col-from-label"><?php echo e(translate('Max Premium Member')); ?></label>
                          <div class="col-md-9">
                              <input type="hidden" name="types[]" value="max_premium_member_homepage">
                              <input type="number" name="max_premium_member_homepage" value="<?php echo e(get_setting('max_premium_member_homepage')); ?>" class="form-control">
                          </div>
              					</div>
              					<div class="text-right">
              						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
              					</div>
                    </form>
		           </div>
            </div>
          </div>

          <!-- Home Page Banner 1 -->
          <div class="card">
            <div class="card-header collapsed" id="headingBanner1" data-toggle="collapse" data-target="#collapseBanner1" aria-expanded="true" aria-controls="collapseBanner1">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Home Page Banner 1 (Max 3)')); ?></button>
            </div>

            <div id="collapseBanner1" class="collapse" aria-labelledby="headingBanner1" data-parent="#accordionExample">
                <div class="card-body">
            				<form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
            					<?php echo csrf_field(); ?>
                      <div class="form-group row">
                        <label class="col-md-3 col-from-label"><?php echo e(translate('Show Banner 1 Section?')); ?></label>
                        <div class="col-md-9">
                          <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="hidden" name="types[]" value="show_home_banner1_section">
                            <input type="checkbox" name="show_home_banner1_section" <?php if( get_setting('show_home_banner1_section') == 'on'): ?> checked <?php endif; ?>>
                            <span></span>
                          </label>
                        </div>
                      </div>

            					<div class="form-group">
            						<label><?php echo e(translate('Banner & Links')); ?> (<?php echo e(translate('Size')); ?> : 1200x600)</label>
            						<div class="home-banner1-target">
            							<input type="hidden" name="types[]" value="home_banner1_images">
            							<input type="hidden" name="types[]" value="home_banner1_links">
            							<?php if(get_setting('home_banner1_images') != null): ?>
            								<?php $__currentLoopData = json_decode(get_setting('home_banner1_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            									<div class="row gutters-5">
            										<div class="col-md-5">
            											<div class="form-group">
            												<div class="input-group" data-toggle="aizuploader" data-type="image">
  			                                <div class="input-group-prepend">
  			                                    <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
  			                                </div>
  			                                <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                													<input type="hidden" name="types[]" value="home_banner1_images">
    			                                <input type="hidden" name="home_banner1_images[]" class="selected-files" value="<?php echo e(json_decode(get_setting('home_banner1_images'), true)[$key]); ?>">
					                            </div>
				                            <div class="file-preview box sm">
				                            </div>
			                            </div>
            										</div>
            										<div class="col-md">
            											<div class="form-group">
            												<input type="hidden" name="types[]" value="home_banner1_links">
            												<input type="text" class="form-control" placeholder="http://" name="home_banner1_links[]" value="<?php echo e(json_decode(get_setting('home_banner1_links'), true)[$key]); ?>">
            											</div>
            										</div>
            										<div class="col-md-auto">
            											<div class="form-group">
            												<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
            													<i class="las la-times"></i>
            												</button>
            											</div>
            										</div>
            									</div>
            								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            							<?php endif; ?>
            						</div>
            						<button
            							type="button"
            							class="btn btn-soft-secondary btn-sm"
            							data-toggle="add-more"
            							data-content='
            							<div class="row gutters-5">
            								<div class="col-md-5">
            									<div class="form-group">
            										<div class="input-group" data-toggle="aizuploader" data-type="image">
            											<div class="input-group-prepend">
            												<div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
            											</div>
            											<div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
            											<input type="hidden" name="types[]" value="home_banner1_images">
            											<input type="hidden" name="home_banner1_images[]" class="selected-files">
            										</div>
            										<div class="file-preview box sm">
            										</div>
            									</div>
            								</div>
            								<div class="col-md">
            									<div class="form-group">
            										<input type="hidden" name="types[]" value="home_banner1_links">
            										<input type="text" class="form-control" placeholder="http://" name="home_banner1_links[]">
            									</div>
            								</div>
            								<div class="col-md-auto">
            									<div class="form-group">
            										<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
            											<i class="las la-times"></i>
            										</button>
            									</div>
            								</div>
            							</div>'
            							data-target=".home-banner1-target">
            							<?php echo e(translate('Add New')); ?>

            						</button>
            					</div>
            					<div class="text-right">
            						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
            					</div>
            				</form>
          			</div>
            </div>
          </div>

          <!-- How it Works Section  -->
          <div class="card">
            <div class="card-header collapsed" id="headingHowItWorks" data-toggle="collapse" data-target="#collapseHowItWorks" aria-expanded="true" aria-controls="collapseOne">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('How it Works Section')); ?></button>
            </div>

            <div id="collapseHowItWorks" class="collapse" aria-labelledby="headingHowItWorks" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
			                  <?php echo csrf_field(); ?>
                        <div class="form-group row">
              						<label class="col-md-3 col-from-label"><?php echo e(translate('Show How it Works Section?')); ?></label>
              						<div class="col-md-9">
              							<label class="aiz-switch aiz-switch-success mb-0">
              								<input type="hidden" name="types[]" value="show_how_it_works_section">
              								<input type="checkbox" name="show_how_it_works_section" <?php if( get_setting('show_how_it_works_section') == 'on'): ?> checked <?php endif; ?>>
              								<span></span>
              							</label>
              						</div>
              					</div>
                        <div class="form-group row">
					                  <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="how_it_works_title">
                                <input type="text" name="how_it_works_title" value="<?php echo e(get_setting('how_it_works_title')); ?>" class="form-control" rows="5" placeholder="<?php echo e(translate('Title')); ?>">
                            </div>
			                  </div>
                        <div class="form-group row">
					                  <label class="col-md-3 col-from-label"><?php echo e(translate('Sub Title')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="how_it_works_sub_title">
                              <textarea type="text" name="how_it_works_sub_title" class="form-control" rows="5" placeholder="<?php echo e(translate('Sub Title')); ?>" ><?php echo e(get_setting('how_it_works_sub_title')); ?></textarea>
                            </div>
				                </div>

                        <div class="form-group">
                          <label><?php echo e(translate('Steps').' ('.translate('Max 4').')'); ?></label>
                          <div class="how_it_works_target">
                            <input type="hidden" name="types[]" value="how_it_works_steps_icons">
                            <input type="hidden" name="types[]" value="how_it_works_steps_titles">
                            <input type="hidden" name="types[]" value="how_it_works_steps_sub_titles">
                            <?php if(get_setting('how_it_works_steps_icons') != null): ?>
                              <?php $__currentLoopData = json_decode(get_setting('how_it_works_steps_icons'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row gutters-5">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <div class="input-group" data-toggle="aizuploader" data-type="image">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                          </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="types[]" value="how_it_works_steps_icons">
                                            <input type="hidden" name="how_it_works_steps_icons[]" class="selected-files" value="<?php echo e(json_decode(get_setting('how_it_works_steps_icons'), true)[$key]); ?>">
                                        </div>
                                        <div class="file-preview box sm"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <input type="hidden" name="types[]" value="how_it_works_steps_titles">
                                      <input type="text" class="form-control" placeholder="<?php echo e(translate('Title')); ?>" name="how_it_works_steps_titles[]" value="<?php echo e(json_decode(get_setting('how_it_works_steps_titles'), true)[$key]); ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <input type="hidden" name="types[]" value="how_it_works_steps_sub_titles">
                                      <input type="text" class="form-control" placeholder="<?php echo e(translate('Sub Title')); ?>" name="how_it_works_steps_sub_titles[]" value="<?php echo e(json_decode(get_setting('how_it_works_steps_sub_titles'), true)[$key]); ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-auto">
                                    <div class="form-group">
                                      <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                        <i class="las la-times"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </div>
                          <button
                            type="button"
                            class="btn btn-soft-secondary btn-sm"
                            data-toggle="add-more"
                            data-content='
                            <div class="row gutters-5">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <div class="input-group" data-toggle="aizuploader" data-type="image">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                      </div>
                                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                        <input type="hidden" name="types[]" value="how_it_works_steps_icons">
                                        <input type="hidden" name="how_it_works_steps_icons[]" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm"></div>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <input type="hidden" name="types[]" value="how_it_works_steps_titles">
                                  <input type="text" class="form-control" placeholder="<?php echo e(translate('Title')); ?>" name="how_it_works_steps_titles[]" >
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <input type="hidden" name="types[]" value="how_it_works_steps_sub_titles">
                                  <input type="text" class="form-control" placeholder="<?php echo e(translate('Sub Title')); ?>" name="how_it_works_steps_sub_titles[]">
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="form-group">
                                  <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                    <i class="las la-times"></i>
                                  </button>
                                </div>
                              </div>
                            </div>'
                            data-target=".how_it_works_target">
                            <?php echo e(translate('Add New')); ?>

                          </button>
                        </div>

                        <div class="text-right">
                        	<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
			              </form>
			           </div>
            </div>
          </div>

          <!-- Trusted by Millions Section -->
          <div class="card">
            <div class="card-header collapsed" id="headingTrustedByMillions" data-toggle="collapse" data-target="#collapseTrustedByMillions" aria-expanded="true" aria-controls="collapseTrustedByMillions">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Trusted by Millions Section')); ?></button>
            </div>

            <div id="collapseTrustedByMillions" class="collapse" aria-labelledby="headingTrustedByMillions" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
			                  <?php echo csrf_field(); ?>
                        <div class="form-group row">
              						<label class="col-md-3 col-from-label"><?php echo e(translate('Show Trusted by Millions Section?')); ?></label>
              						<div class="col-md-9">
              							<label class="aiz-switch aiz-switch-success mb-0">
              								<input type="hidden" name="types[]" value="show_trusted_by_millions_section">
              								<input type="checkbox" name="show_trusted_by_millions_section" <?php if( get_setting('show_trusted_by_millions_section') == 'on'): ?> checked <?php endif; ?>>
              								<span></span>
              							</label>
              						</div>
              					</div>
                        <div class="form-group row">
					                  <label class="col-md-3 col-from-label"><?php echo e(translate('Background Image')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="trusted_by_millions_background_image">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                    <input type="hidden" name="trusted_by_millions_background_image" class="selected-files" value="<?php echo e(get_setting('trusted_by_millions_background_image')); ?>">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
			                  </div>
                        <div class="form-group row">
					                  <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="trusted_by_millions_title">
                                <input type="text" name="trusted_by_millions_title" value="<?php echo e(get_setting('trusted_by_millions_title')); ?>" class="form-control" rows="5" placeholder="<?php echo e(translate('Title')); ?>">
                            </div>
			                  </div>
                        <div class="form-group row">
					                  <label class="col-md-3 col-from-label"><?php echo e(translate('Sub Title')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="trusted_by_millions_sub_title">
                              <textarea type="text" name="trusted_by_millions_sub_title" class="form-control" rows="5" placeholder="<?php echo e(translate('Sub Title')); ?>" ><?php echo e(get_setting('trusted_by_millions_sub_title')); ?></textarea>
                            </div>
				                </div>

                        <div class="form-group">
                          <label><?php echo e(translate('Best Features').' ('.translate('Max 4').')'); ?></label>
                          <div class="trusted_by_millions_target">
                            <input type="hidden" name="types[]" value="homepage_best_features_icons">
                            <input type="hidden" name="types[]" value="homepage_best_features">
                            <?php if(get_setting('homepage_best_features') != null): ?>
                              <?php $__currentLoopData = json_decode(get_setting('homepage_best_features'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row gutters-5">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <div class="input-group" data-toggle="aizuploader" data-type="image">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                          </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="types[]" value="homepage_best_features_icons">
                                            <input type="hidden" name="homepage_best_features_icons[]" class="selected-files" value="<?php echo e(json_decode(get_setting('homepage_best_features_icons'), true)[$key]); ?>">
                                        </div>
                                        <div class="file-preview box sm"></div>
                                    </div>
                                  </div>
                                  <div class="col-md">
                                    <div class="form-group">
                                      <input type="hidden" name="types[]" value="homepage_best_features">
                                      <input type="text" class="form-control" placeholder="<?php echo e(translate('Feature')); ?>" name="homepage_best_features[]" value="<?php echo e(json_decode(get_setting('homepage_best_features'), true)[$key]); ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-auto">
                                    <div class="form-group">
                                      <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                        <i class="las la-times"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </div>
                          <button
                            type="button"
                            class="btn btn-soft-secondary btn-sm"
                            data-toggle="add-more"
                            data-content='
                            <div class="row gutters-5">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <div class="input-group" data-toggle="aizuploader" data-type="image">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                      </div>
                                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                        <input type="hidden" name="types[]" value="homepage_best_features_icons">
                                        <input type="hidden" name="homepage_best_features_icons[]" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm"></div>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="form-group">
                                  <input type="hidden" name="types[]" value="homepage_best_features">
                                  <input type="text" class="form-control" placeholder="<?php echo e(translate('Feature')); ?>" name="homepage_best_features[]">
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="form-group">
                                  <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                    <i class="las la-times"></i>
                                  </button>
                                </div>
                              </div>
                            </div>'
                            data-target=".trusted_by_millions_target">
                            <?php echo e(translate('Add New')); ?>

                          </button>
                        </div>

                        <div class="text-right">
                        	<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
			              </form>
			           </div>
            </div>
          </div>

          <!-- New member Section -->
          <div class="card">
            <div class="card-header collapsed" id="headingNewMember" data-toggle="collapse" data-target="#collapseNewMember" aria-expanded="true" aria-controls="collapseNewMember">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('New Member Section')); ?></button>
            </div>

            <div id="collapseNewMember" class="collapse" aria-labelledby="headingNewMember" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Show New Member Section?')); ?></label>
                          <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                              <input type="hidden" name="types[]" value="show_new_member_section">
                              <input type="checkbox" name="show_new_member_section" <?php if( get_setting('show_new_member_section') == 'on'): ?> checked <?php endif; ?>>
                              <span></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                          <div class="col-md-9">
                            <input type="hidden" name="types[]" value="new_member_section_title">
                            <input type="text" name="new_member_section_title" value='<?php echo e(get_setting('new_member_section_title')); ?>' class="form-control" placeholder="<?php echo e(translate('Title')); ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Sub Title')); ?></label>
                          <div class="col-md-9">
                              <input type="hidden" name="types[]" value="new_member_section_sub_title">
                              <textarea type="text" name="new_member_section_sub_title" class="form-control" rows="5" placeholder="<?php echo e(translate('Sub Title')); ?>" ><?php echo e(get_setting('new_member_section_sub_title')); ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Max New Member')); ?></label>
                          <div class="col-md-9">
                              <input type="hidden" name="types[]" value="max_new_member_show_homepage">
                              <input type="number" name="max_new_member_show_homepage" value="<?php echo e(get_setting('max_new_member_show_homepage')); ?>" class="form-control">
                          </div>
                        </div>
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
                    </form>
               </div>
            </div>
          </div>

          <!-- Happy Story Section -->
          <div class="card">
            <div class="card-header collapsed" id="headingHappyStory" data-toggle="collapse" data-target="#collapseHappyStory" aria-expanded="true" aria-controls="collapseHappyStory">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Happy Story Section')); ?></button>
            </div>

            <div id="collapseHappyStory" class="collapse" aria-labelledby="headingHappyStory" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Show Happy Story Section?')); ?></label>
                          <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                              <input type="hidden" name="types[]" value="show_happy_story_section">
                              <input type="checkbox" name="show_happy_story_section" <?php if( get_setting('show_happy_story_section') == 'on'): ?> checked <?php endif; ?>>
                              <span></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                          <div class="col-md-9">
                            <input type="hidden" name="types[]" value="happy_story_section_title">
                            <input type="text" name="happy_story_section_title" value='<?php echo e(get_setting('happy_story_section_title')); ?>' class="form-control" placeholder="<?php echo e(translate('Title')); ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Max Happy Story Show')); ?></label>
                          <div class="col-md-9">
                              <input type="hidden" name="types[]" value="max_happy_story_show_homepage">
                              <input type="number" name="max_happy_story_show_homepage" value="<?php echo e(get_setting('max_happy_story_show_homepage')); ?>" class="form-control">
                          </div>
                        </div>
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
                    </form>
               </div>
            </div>
          </div>

          <!-- Package Section -->
          <div class="card">
            <div class="card-header collapsed" id="headingPackage" data-toggle="collapse" data-target="#collapsePackage" aria-expanded="true" aria-controls="collapsePackage">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Package Section')); ?></button>
            </div>

            <div id="collapsePackage" class="collapse" aria-labelledby="headingPackage" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Show Happy Story Section?')); ?></label>
                          <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                              <input type="hidden" name="types[]" value="show_homapege_package_section">
                              <input type="checkbox" name="show_homapege_package_section" <?php if( get_setting('show_homapege_package_section') == 'on'): ?> checked <?php endif; ?>>
                              <span></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                          <div class="col-md-9">
                            <input type="hidden" name="types[]" value="homepage_package_section_title">
                            <input type="text" name="homepage_package_section_title" value='<?php echo e(get_setting('homepage_package_section_title')); ?>' class="form-control" placeholder="<?php echo e(translate('Title')); ?>">
                          </div>
                        </div>
                        <div class="form-group row">
              						<label class="col-md-3 col-from-label"><?php echo e(translate('Sub Title')); ?></label>
                          <div class="col-md-9">
                              <input type="hidden" name="types[]" value="homepage_package_section_sub_title">
                              <textarea type="text" name="homepage_package_section_sub_title" class="form-control" rows="5" placeholder="<?php echo e(translate('Sub Title')); ?>" ><?php echo e(get_setting('homepage_package_section_sub_title')); ?></textarea>
                          </div>
              					</div>
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
                    </form>
               </div>
            </div>
          </div>

          <!-- Review Section -->
          <div class="card">
            <div class="card-header collapsed" id="headingReview" data-toggle="collapse" data-target="#collapseReview" aria-expanded="true" aria-controls="collapseReview">
                <button class="btn btn-link fs-16 text-reset text-decoration-none" type="button"><?php echo e(translate('Reviews Section')); ?></button>
            </div>

            <div id="collapseReview" class="collapse" aria-labelledby="headingReview" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label"><?php echo e(translate('Show Review Section?')); ?></label>
                          <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                              <input type="hidden" name="types[]" value="show_homepage_review_section">
                              <input type="checkbox" name="show_homepage_review_section" <?php if( get_setting('show_homepage_review_section') == 'on'): ?> checked <?php endif; ?>>
                              <span></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label"><?php echo e(translate('Background Image')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="homepage_review_section_background_image">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                    </div>
                                    <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                    <input type="hidden" name="homepage_review_section_background_image" class="selected-files" value="<?php echo e(get_setting('homepage_review_section_background_image')); ?>">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label"><?php echo e(translate('Title')); ?></label>
                            <div class="col-md-9">
                                <input type="hidden" name="types[]" value="homepage_review_section_title">
                                <input type="text" name="homepage_review_section_title" value="<?php echo e(get_setting('homepage_review_section_title')); ?>" class="form-control" rows="5" placeholder="<?php echo e(translate('Title')); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                          <label><?php echo e(translate('Reviews')); ?></label>
                          <div class="trusted_by_millions_target">
                            <input type="hidden" name="types[]" value="homepage_reviewers_images">
                            <input type="hidden" name="types[]" value="homepage_reviews">
                            <?php if(get_setting('homepage_reviews') != null): ?>
                              <?php $__currentLoopData = json_decode(get_setting('homepage_reviews'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row gutters-5">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <div class="input-group" data-toggle="aizuploader" data-type="image">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                          </div>
                                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                            <input type="hidden" name="types[]" value="homepage_reviewers_images">
                                            <input type="hidden" name="homepage_reviewers_images[]" class="selected-files" value="<?php echo e(json_decode(get_setting('homepage_reviewers_images'), true)[$key]); ?>">
                                        </div>
                                        <div class="file-preview box sm"></div>
                                    </div>
                                  </div>
                                  <div class="col-md">
                                    <div class="form-group">
                                      <input type="hidden" name="types[]" value="homepage_reviews">
                                      <textarea type="text" class="form-control" placeholder="<?php echo e(translate('Review')); ?>" name="homepage_reviews[]"><?php echo e(json_decode(get_setting('homepage_reviews'), true)[$key]); ?></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-auto">
                                    <div class="form-group">
                                      <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                        <i class="las la-times"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </div>
                          <button
                            type="button"
                            class="btn btn-soft-secondary btn-sm"
                            data-toggle="add-more"
                            data-content='
                            <div class="row gutters-5">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <div class="input-group" data-toggle="aizuploader" data-type="image">
                                      <div class="input-group-prepend">
                                          <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                      </div>
                                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                        <input type="hidden" name="types[]" value="homepage_reviewers_images">
                                        <input type="hidden" name="homepage_reviewers_images[]" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm"></div>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="form-group">
                                  <input type="hidden" name="types[]" value="homepage_reviews">
                                  <textarea type="text" class="form-control" placeholder="<?php echo e(translate('Review')); ?>" name="homepage_reviews[]"></textarea>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="form-group">
                                  <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                    <i class="las la-times"></i>
                                  </button>
                                </div>
                              </div>
                            </div>'
                            data-target=".trusted_by_millions_target">
                            <?php echo e(translate('Add New')); ?>

                          </button>
                        </div>

                        <div class="text-right">
                          <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                        </div>
                    </form>
                 </div>
            </div>
          </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/website_settings/pages/home_page_edit.blade.php ENDPATH**/ ?>