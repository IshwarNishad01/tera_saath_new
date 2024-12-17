

<?php $__env->startSection('content'); ?>

<div>
   
    <div class="container-fluid py-4">

            <div class="card">

            	<div class="card-body pt-4 p-3">
            		<h6 class="mb-0">Matrimonial Data Table</h6>
                    <br>
                <table class="table">
                	<thead>
                		<th class="text-center">S.no</th>
                		<th class="text-center">Name</th>
                        <th class="text-center">Contact Number</th>
                        <th class="text-center">Father Name</th>
                        <th class="text-center">Birth date</th>
                        <th class="text-center">Birth time</th>
                		<th class="text-center">Action</th>
                	</thead>
                    <tbody>
                    <?php $sl=1; foreach (DB::table('matrimonial_data')->get() as $matdata) { ?>
                		<tr>
                			<td class="text-center"><?=$sl++; ?></td>
                			<td class="text-center"><?=$matdata->person_name ; ?></td>
                            <td class="text-center"><?=$matdata->person_contact_no ; ?></td>
                            <td class="text-center"><?=$matdata->person_fname ; ?></td>
                            <td class="text-center"><?=$matdata->person_birthday ; ?></td>
                            <td class="text-center"><?=$matdata->person_birthtime ; ?></td>
                            <td class="text-center"><a href="parichay-view/<?php echo e($matdata->mid); ?>">View</a></td>
                		</tr>
                		</tr>
                	<?php } ?>
                	</tbody>
                	

                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/parichay.blade.php ENDPATH**/ ?>