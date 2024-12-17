<!doctype html>
<?php if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1): ?>
<html dir="rtl" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php else: ?>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php endif; ?>
<head>
	<!-- Required meta tags -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="app-url" content="<?php echo e(getBaseURL()); ?>">
	<meta name="file-base-url" content="<?php echo e(getFileBaseURL()); ?>">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo e(get_setting('website_name').' | '.get_setting('site_motto')); ?></title>

	<!-- Favicon -->
	<link name="favicon" type="image/x-icon" href="<?php echo e(uploaded_asset(get_setting('site_icon'))); ?>" rel="shortcut icon" />

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- vendors css -->
	<link rel="stylesheet" href="<?php echo e(static_asset('assets/css/vendors.css')); ?>">

	<!-- aiz core css -->
	<link rel="stylesheet" href="<?php echo e(static_asset('assets/css/aiz-core.css')); ?>">

	<?php if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1): ?>
    <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/bootstrap-rtl.min.css')); ?>">
    <?php endif; ?>


	<script>
    	var AIZ = AIZ || {};
	</script>

</head>
<body>

	<div class="aiz-main-wrapper">

		<?php echo $__env->make('admin.inc.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="aiz-content-wrapper">

			<?php echo $__env->make('admin.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- Main Content start-->
				<div class="aiz-main-content">
					<div class="px-15px px-lg-25px">
						<?php echo $__env->yieldContent('content'); ?>
					</div>

					<!-- Footer -->
					<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
						<p class="mb-0">&copy; <?php echo e(env('APP_NAME')); ?> v<?php echo e(get_setting('current_version')); ?></p>
					</div>

				</div>
			<!-- Mian content end -->

		</div>

	</div>

	<?php echo $__env->yieldContent('modal'); ?>

	<script src="<?php echo e(static_asset('assets/js/vendors.js')); ?>" ></script>
	<script src="<?php echo e(static_asset('assets/js/aiz-core.js')); ?>" ></script>

	<?php echo $__env->yieldContent('script'); ?>

	<script type="text/javascript">
	    <?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    	AIZ.plugins.notify('<?php echo e($message['level']); ?>', '<?php echo e($message['message']); ?>');
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		// language Switch
		if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-menu a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('<?php echo e(route('language.change')); ?>',{_token:'<?php echo e(csrf_token()); ?>', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }
	</script>


</body>
</html>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>