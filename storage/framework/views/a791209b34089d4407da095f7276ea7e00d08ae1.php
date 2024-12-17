<div style="margin-left:auto;margin-right:auto;">
<style media="all">
    @page  {
		margin: 0;
		padding:0;
	}
	*{
		margin: 0;
		padding: 0;
	}
	body{
		line-height: 1.5;
		font-family: 'DejaVuSans', 'sans-serif';
		color: #333542;
	}
	div{
		font-size: 1rem;
	}
	.gry-color *,
	.gry-color{
		color:#878f9c;
	}
	table{
		width: 100%;
	}
	table th{
		font-weight: normal;
	}
	table.padding th{
		padding: .5rem .7rem;
	}
	table.padding td{
		padding: .7rem;
	}
	table.sm-padding td{
		padding: .2rem .7rem;
	}
	.border-bottom td,
	.border-bottom th{
		border-bottom:1px solid #eceff4;
	}
	.text-left{
		text-align:left;
	}
	.text-right{
		text-align:right;
	}
    .text-center{
		text-align:center;
	}
	.small{
		font-size: .85rem;
	}
	.strong{
		font-weight: bold;
	}
</style>

	<?php
		$logo = get_setting('header_logo');
	?>

	<div style="background: #eceff4;padding: 1.5rem;">
		<table>
			<tr>
				<td>
					<?php if($logo != null): ?>
						<img src="<?php echo e(uploaded_asset($logo)); ?>" height="40" style="display:inline-block;">
					<?php else: ?>
						<img src="<?php echo e(static_asset('assets/img/logo.png')); ?>" height="40" style="display:inline-block;">
					<?php endif; ?>
				</td>
			</tr>
		</table>

	</div>

	<div style="border-bottom:1px solid #eceff4;margin: 0 1.5rem;"></div>

    <div style="padding: 1.5rem;">
		<table class="padding text-center small border-bottom">
			<thead>
                <tr class="gry-color" style="background: #eceff4;">
                    <th width="50%"><?php echo e(translate('ID')); ?></th>
                    <th width="50%"><?php echo e(translate('Package Name')); ?></th>
                </tr>
			</thead>
			<tbody class="strong">
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <tr class="">
                        <td><?php echo e($package->id); ?></td>
						<td><?php echo e($package->name); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
		</table>
	</div>

</div>
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/members/bulk_member/package_download.blade.php ENDPATH**/ ?>