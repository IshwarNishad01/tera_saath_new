<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
 -->
    <!-- Title Page-->
    <title>Matrimonial form</title>
    <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/aiz-core.css')); ?>">

    <!-- Icons font CSS-->
    <link href="<?php echo e(static_asset('assets/vendor_matrimonial/mdi-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(static_asset('assets/vendor_matrimonial/font-awesome-4.7/css/font-awesome.min.css')); ?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo e(static_asset('assets/vendor_matrimonial/select2/select2.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(static_asset('assets/vendor_matrimonial/datepicker/daterangepicker.css')); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo e(static_asset('assets/css_matrimonial/main.css')); ?>" rel="stylesheet" media="all">
</head>

<style>
	@media  screen and (max-width: 600px) {
		.logo_mobile{
			width: 270px;
		}
	}
</style>
<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
<div class="wrapper1">
    <!-- <div class="round">
           
          
        </div> -->
    </div>


                <div class="card-body">
                   

                    <div class="logo"><img class="logo_mobile" src="<?php echo e(static_asset('assets/img_matrimonial/tera_saath_logo.png')); ?>">      <br>
                        <!-- <h2 class="title">Registration Info</h2> -->
                        <br>
                        <h2 class="title">मसीह युवक - युवती परिचय सम्मलेन <br> 28 सितम्बर 2023</h2>
                    </div>
                    <form action="<?=site_url() ?>form-matrimonial" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                       

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="person_name" required="">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="CONTACT NUMBER" name="person_contact_no" required="">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL ADDRESS" name="person_email_address" required="">
                        </div>

                         <div class="input-group">
                            <input type="file" class="custom-file-input input--style-1" id="customFile" name="person_image">
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="person_birthday">
                                    <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="time" placeholder="BIRTH TIME" name="person_birthtime">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="BIRTH PLACE" name="person_birthplace">
                                    <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                </div>
                            
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="person_gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                
                            
                        </div>
                        <!-- <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">CLASS</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> -->
                        

                        <!-- <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="datepicker" placeholder="KUNDALI" name="person_baptism">
                                     <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                <!-- </div> --> 

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="HEIGHT IN INCH/CM" name="person_height">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="HOBBIES" name="person_hobbies">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="CAST" name="person_cast">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="LANGUAGE KNOWN" name="person_lang">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="QUALIFICATION" name="person_qualification">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="OCCUPATION/JOB" name="person_job">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="WORKING CITY" name="person_city">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="MARITAL STATUS" name="person_marital">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="MONTHLY INCOME" name="person_monthly_income">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="FATHER'S NAME" name="person_fname">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="MOTHER'S NAME" name="person_mname">
                        </div>
                       
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="SIBLINGS(BROTHER & SISTER)" name="person_sibling">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PERMANENT ADDRESS" name="person_address">
                        </div>
                        <!-- <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PASTOR'S NAME" name="person_pastorname">
                        </div> -->
                        <!-- <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME OF CHURCH" name="person_church">
                        </div> -->
                        <!-- <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="DENOMINATION" name="person_denomination">
                        </div> -->
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PREFRENCES" name="person_preference">
                        </div>

                        <div class="p-t-20">
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo e(static_asset('assets/vendor_matrimonial/jquery/jquery.min.js')); ?>"></script>
    <!-- Vendor JS-->
    <script src="<?php echo e(static_asset('assets/vendor_matrimonial/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(static_asset('assets/vendor_matrimonial/datepicker/moment.min.js')); ?>"></script>
    <script src="<?php echo e(static_asset('assets/vendor_matrimonial/datepicker/daterangepicker.js')); ?>"></script>

    <!-- Main JS-->
    <script src="<?php echo e(static_asset('assets/js_matrimonial/global.js')); ?>"></script>
    <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                  var fileName = $(this).val().split("\\").pop();
                  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
              </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/form_matrimonial.blade.php ENDPATH**/ ?>