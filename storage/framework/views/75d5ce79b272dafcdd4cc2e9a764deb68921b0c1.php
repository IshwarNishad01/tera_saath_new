

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-9 mx-auto">
	    <div class="aiz-titlebar text-left mt-2 mb-3">
	    	<div class="row align-items-center">
	    		<div class="col">
	    			<h1 class="h3"><?php echo e(translate('Website Footer')); ?></h1>
	    		</div>
	    	</div>
	    </div>

		<div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('About Widget')); ?></h6>
			</div>
			<div class="card-body">
				<form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="form-group">
	                    <label class="form-label" for="signinSrEmail"><?php echo e(translate('Footer Logo')); ?></label>
	                    <div class="input-group " data-toggle="aizuploader" data-type="image">
	                        <div class="input-group-prepend">
	                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
	                        </div>
	                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
							<input type="hidden" name="types[]" value="footer_logo">
	                        <input type="hidden" name="footer_logo" class="selected-files" value="<?php echo e(get_setting('footer_logo')); ?>">
	                    </div>
						<div class="file-preview"></div>
	                </div>
	                <div class="form-group">
						<label><?php echo e(translate('About description')); ?></label>
						<input type="hidden" name="types[]" value="about_us_description">
						<textarea class="aiz-text-editor form-control" name="about_us_description" data-buttons='[["font", ["bold", "underline", "italic"]],["color", ["color"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150">
	                        <?php echo get_setting('about_us_description'); ?>

	                    </textarea>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>
        <div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Contacts Widget')); ?></h6>
			</div>
			<div class="card-body">
                <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
                    <div class="form-group">
						<label><?php echo e(translate('Address')); ?></label>
						<input type="hidden" name="types[]" value="footer_address">
						<input type="text" class="form-control" placeholder="<?php echo e(translate('Address')); ?>" name="footer_address" value="<?php echo e(get_setting('footer_address')); ?>">
					</div>
                    <div class="form-group">
						<label><?php echo e(translate('Website')); ?></label>
						<input type="hidden" name="types[]" value="footer_website">
						<input type="text" class="form-control" placeholder="<?php echo e(translate('Website Address')); ?>" name="footer_website" value="<?php echo e(get_setting('footer_website')); ?>">
					</div>
                    <div class="form-group">
						<label><?php echo e(translate('Email')); ?></label>
						<input type="hidden" name="types[]" value="footer_email">
						<input type="text" class="form-control" placeholder="<?php echo e(translate('Email')); ?>" name="footer_email" value="<?php echo e(get_setting('footer_email')); ?>">
					</div>
                    <div class="form-group">
						<label><?php echo e(translate('Phone')); ?></label>
						<div class="footer-phones">
							<input type="hidden" name="types[]" value="footer_phones">
							<?php if(get_setting('footer_phones') != null): ?>
								<?php $__currentLoopData = json_decode(get_setting('footer_phones'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="<?php echo e(translate('Phone Number')); ?>" name="footer_phones[]" value="<?php echo e($value); ?>">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="<?php echo e(translate('Phone Number')); ?>" name="footer_phones[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".footer-phones">
							<?php echo e(translate('Add New')); ?>

						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>
    <div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Link Widget One')); ?></h6>
			</div>
			<div class="card-body">
        <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
					<div class="form-group">
						<label><?php echo e(translate('Title')); ?></label>
						<input type="hidden" name="types[]" value="widget_one_title">
						<input type="text" class="form-control" placeholder="Widget title" name="widget_one_title" value="<?php echo e(get_setting('widget_one_title')); ?>">
					</div>
	                <div class="form-group">
						<label><?php echo e(translate('Links')); ?></label>
						<div class="w1-links-target">
							<input type="hidden" name="types[]" value="widget_one_labels">
							<input type="hidden" name="types[]" value="widget_one_links">
							<?php if(get_setting('widget_one_labels') != null): ?>
								<?php $__currentLoopData = json_decode(get_setting('widget_one_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row gutters-5">
										<div class="col-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Label" name="widget_one_labels[]" value="<?php echo e($value); ?>">
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]" value="<?php echo e(json_decode(get_setting('widget_one_links'), true)[$key]); ?>">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col-4">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Label" name="widget_one_labels[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".w1-links-target">
							<?php echo e(translate('Add New')); ?>

						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>

    <div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Link Widget Two')); ?></h6>
			</div>
			<div class="card-body">
        <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
					<div class="form-group">
						<label><?php echo e(translate('Title')); ?></label>
						<input type="hidden" name="types[]" value="widget_two_title">
						<input type="text" class="form-control" placeholder="Widget title" name="widget_two_title" value="<?php echo e(get_setting('widget_two_title')); ?>">
					</div>
          <div class="form-group">
						<label><?php echo e(translate('Links')); ?></label>
						<div class="w2-links-target">
							<input type="hidden" name="types[]" value="widget_two_labels">
							<input type="hidden" name="types[]" value="widget_two_links">
							<?php if(get_setting('widget_two_labels') != null): ?>
								<?php $__currentLoopData = json_decode(get_setting('widget_two_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row gutters-5">
										<div class="col-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Label" name="widget_two_labels[]" value="<?php echo e($value); ?>">
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="http://" name="widget_two_links[]" value="<?php echo e(json_decode(get_setting('widget_two_links'), true)[$key]); ?>">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col-4">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Label" name="widget_two_labels[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="http://" name="widget_two_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".w2-links-target">
							<?php echo e(translate('Add New')); ?>

						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>

    <div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Link Widget Three')); ?></h6>
			</div>
			<div class="card-body">
        <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
					<div class="form-group">
						<label><?php echo e(translate('Title')); ?></label>
						<input type="hidden" name="types[]" value="widget_three_title">
						<input type="text" class="form-control" placeholder="Widget title" name="widget_three_title" value="<?php echo e(get_setting('widget_three_title')); ?>">
					</div>
          <div class="form-group">
						<label><?php echo e(translate('Links')); ?></label>
						<div class="w3-links-target">
							<input type="hidden" name="types[]" value="widget_three_labels">
							<input type="hidden" name="types[]" value="widget_three_links">
							<?php if(get_setting('widget_three_labels') != null): ?>
								<?php $__currentLoopData = json_decode(get_setting('widget_three_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="row gutters-5">
										<div class="col-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Label" name="widget_three_labels[]" value="<?php echo e($value); ?>">
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="http://" name="widget_three_links[]" value="<?php echo e(json_decode(get_setting('widget_three_links'), true)[$key]); ?>">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col-4">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Label" name="widget_three_labels[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="http://" name="widget_three_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".w3-links-target">
							<?php echo e(translate('Add New')); ?>

						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>

    <div class="card">
			<div class="card-header">
				<h6 class="mb-0"><?php echo e(translate('Mobile app Widget')); ?></h6>
			</div>
			<div class="card-body">
        <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
					<div class="form-group">
						<label><?php echo e(translate('Title')); ?></label>
						<input type="hidden" name="types[]" value="widget_mobile_app_title">
						<input type="text" class="form-control" placeholder="Widget title" name="widget_mobile_app_title" value="<?php echo e(get_setting('widget_mobile_app_title')); ?>">
					</div>
	                <div class="form-group">
						<label><?php echo e(translate('Play store img, link')); ?></label>
						<div class="row gutters-5">
							<div class="col-lg-5">
								<div class="form-group">
				                    <div class="input-group" data-toggle="aizuploader" data-type="image">
				                        <div class="input-group-prepend">
				                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
				                        </div>
				                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
										<input type="hidden" name="types[]" value="footer_play_store_img">
				                        <input type="hidden" name="footer_play_store_img" class="selected-files" value="<?php echo e(get_setting('footer_play_store_img')); ?>">
				                    </div>
									<div class="file-preview"></div>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<input type="hidden" name="types[]" value="footer_play_store_link">
									<input type="text" class="form-control" placeholder="http://" name="footer_play_store_link" value="<?php echo e(get_setting('footer_play_store_link')); ?>">
								</div>
							</div>
						</div>
					</div>
	                <div class="form-group">
						<label><?php echo e(translate('App store img, link')); ?></label>
						<div class="row gutters-5">
							<div class="col-lg-5">
								<div class="form-group">
				                    <div class="input-group" data-toggle="aizuploader" data-type="image">
				                        <div class="input-group-prepend">
				                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
				                        </div>
				                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
										<input type="hidden" name="types[]" value="footer_app_store_img">
				                        <input type="hidden" name="footer_app_store_img" class="selected-files" value="<?php echo e(get_setting('footer_app_store_img')); ?>">
				                    </div>
									<div class="file-preview"></div>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<input type="hidden" name="types[]" value="footer_app_store_link">
									<input type="text" class="form-control" placeholder="http://" name="footer_app_store_link" value="<?php echo e(get_setting('footer_app_store_link')); ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
					</div>
				</form>
			</div>
		</div>

	    <div class="card">
	    	<div class="card-header">
	    		<h6 class="fw-600 mb-0"><?php echo e(translate('Footer Copyright')); ?></h6>
	    	</div>
	        <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
	            <?php echo csrf_field(); ?>
	           <div class="card-body">
	                <div class="card shadow-none bg-light">
	                    <div class="card-header">
	          						<h6 class="mb-0"><?php echo e(translate('Copyright Widget ')); ?></h6>
	          					</div>
	                    <div class="card-body">
	                        <div class="form-group">
                  				<label><?php echo e(translate('Copyright Text')); ?></label>
                  				<input type="hidden" name="types[]" value="footer_copyright_text">
                  				<textarea class="aiz-text-editor form-control" name="footer_copyright_text" data-buttons='[["font", ["bold", "underline", "italic"]],["color", ["color"]],["insert", ["link"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150"><?php echo get_setting('footer_copyright_text'); ?></textarea>
                  			</div>
	                    </div>
	                </div>
	                <div class="card shadow-none bg-light">
	                  <div class="card-header">
	        						<h6 class="mb-0"><?php echo e(translate('Social Link Widget ')); ?></h6>
	        					</div>
	                  <div class="card-body">
	                    <div class="form-group row">
	                      <label class="col-md-2 col-from-label"><?php echo e(translate('Show Social Links?')); ?></label>
	                      <div class="col-md-9">
	                        <label class="aiz-switch aiz-switch-success mb-0">
	                          <input type="hidden" name="types[]" value="show_social_links">
	                          <input type="checkbox" name="show_social_links" <?php if( get_setting('show_social_links') == 'on'): ?> checked <?php endif; ?>>
	                          <span></span>
	                        </label>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                        <label><?php echo e(translate('Social Links')); ?></label>
	                        <div class="input-group form-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text"><i class="lab la-facebook-f"></i></span>
	                            </div>
	                            <input type="hidden" name="types[]" value="facebook_link">
	                            <input type="text" class="form-control" placeholder="http://" name="facebook_link" value="<?php echo e(get_setting('facebook_link')); ?>">
	                        </div>
	                        <div class="input-group form-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text"><i class="lab la-twitter"></i></span>
	                            </div>
	                            <input type="hidden" name="types[]" value="twitter_link">
	                            <input type="text" class="form-control" placeholder="http://" name="twitter_link" value="<?php echo e(get_setting('twitter_link')); ?>">
	                        </div>
	                        <div class="input-group form-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text"><i class="lab la-instagram"></i></span>
	                            </div>
	                            <input type="hidden" name="types[]" value="instagram_link">
	                            <input type="text" class="form-control" placeholder="http://" name="instagram_link" value="<?php echo e(get_setting('instagram_link')); ?>">
	                        </div>
	                        <div class="input-group form-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text"><i class="lab la-youtube"></i></span>
	                            </div>
	                            <input type="hidden" name="types[]" value="youtube_link">
	                            <input type="text" class="form-control" placeholder="http://" name="youtube_link" value="<?php echo e(get_setting('youtube_link')); ?>">
	                        </div>
	                        <div class="input-group form-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text"><i class="lab la-linkedin-in"></i></span>
	                            </div>
	                            <input type="hidden" name="types[]" value="linkedin_link">
	                            <input type="text" class="form-control" placeholder="http://" name="linkedin_link" value="<?php echo e(get_setting('linkedin_link')); ?>">
	                        </div>
	                    </div>
	                  </div>
	                </div>

	                <div class="text-right">
	                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
	                </div>
	            </div>
	        </form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/website_settings/footer.blade.php ENDPATH**/ ?>