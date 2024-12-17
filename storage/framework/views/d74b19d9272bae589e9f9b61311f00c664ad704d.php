

<?php $__env->startSection('content'); ?>

<div>

  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h6 class="mb-0">Parichay Information</h6>
      </div>
      <div class="card-body pt-4 p-3">
        <form action="parichay-view" method="GET" enctype="multipart/parichayview">
          <?php echo csrf_field(); ?>

          <div>
            <div>

              <?php $matdata = DB::table('matrimonial_data')->where('mid', $id)->first(); ?>

              <h6>Name: <?= $matdata->person_name; ?></h6>
              <h6>Contact Number: <?= $matdata->person_contact_no; ?></h6>
              <h6>Email Address: <?= $matdata->person_email_address; ?></h6>
              <h6>Image:    <img style="width: 130px;" src="<?php echo e(url('public/storage/personImages/'.$matdata->person_image)); ?>"></h6>

              <h6>Birth date: <?= $matdata->person_birthday; ?></h6>
              <h6>Birth time: <?= $matdata->person_birthtime; ?></h6>
              <h6>Birth place: <?= $matdata->person_birthplace; ?></h6>
              <h6>Gender: <?= $matdata->person_gender; ?></h6>
              <!-- <h6>Kundali: <?= $matdata->person_baptism; ?></h6> -->
              <h6>Height(in cm): <?= $matdata->person_height; ?></h6>
              <h6>Hobbies: <?= $matdata->person_hobbies; ?></h6>
              <h6>Cast: <?= $matdata->person_cast; ?></h6>
              <h6>Language Known: <?= $matdata->person_lang; ?></h6>
              <h6>Qualification: <?= $matdata->person_qualification; ?></h6>
              <h6>Occupation/Job: <?= $matdata->person_job; ?></h6>
              <h6>Working City: <?= $matdata->person_city; ?></h6>
              <h6>Marital Status: <?= $matdata->person_marital; ?></h6>
              <h6>Monthly Income: <?= $matdata->person_monthly_income; ?></h6>
              <h6>Fathers Name: <?= $matdata->person_fname; ?></h6>
              <h6>Mothers Name: <?= $matdata->person_mname; ?></h6>
              <h6>Sibling(Brother & Sister): <?= $matdata->person_sibling; ?></h6>
              <h6>Permanent Address: <?= $matdata->person_address; ?></h6>
              <!-- <h6>Pastors Name: <?= $matdata->person_pastorname; ?></h6>
              <h6>Name of Church: <?= $matdata->person_church; ?></h6>
              <h6>Denomination: <?= $matdata->person_denomination; ?></h6> -->
              <h6>Prefrences: <?= $matdata->person_preference; ?></h6>

            </div>







          </div>

          <br>


      </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/parichayview.blade.php ENDPATH**/ ?>