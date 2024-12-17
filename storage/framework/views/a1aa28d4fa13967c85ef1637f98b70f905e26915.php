
<?php $__env->startSection('content'); ?>
<?php if(env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null): ?>
    <div class="">
        <div class="alert alert-danger d-flex align-items-center">
            <?php echo e(translate('Please Configure SMTP Setting to work all email sending functionality')); ?>,
            <a class="alert-link ml-2" href="<?php echo e(route('smtp_settings')); ?>"><?php echo e(translate('Configure Now')); ?></a>
        </div>
    </div>
<?php endif; ?>

<div class="row gutters-10">
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block"><?php echo e(translate('Total')); ?></span>
                    <?php echo e(translate('Members')); ?>

                </div>
                <div class="h3 fw-700 mb-3"><?php echo e(\App\User::where('user_type','member')->count()); ?></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block"><?php echo e(translate('Premium')); ?></span>
                    <?php echo e(translate('Members')); ?>

                </div>
                <div class="h3 fw-700 mb-3"><?php echo e(\App\User::where('user_type','member')->where('membership', 2 )->count()); ?></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block"><?php echo e(translate('Free')); ?></span>
                    <?php echo e(translate('Members')); ?>

                </div>
                <div class="h3 fw-700 mb-3"><?php echo e(\App\User::where('user_type','member')->where('membership', 1)->count()); ?></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block"><?php echo e(translate('Blocked')); ?></span>
                    <?php echo e(translate('Members')); ?>

                </div>
                <div class="h3 fw-700 mb-3"><?php echo e(\App\User::where('user_type','member')->where('blocked', 1)->count()); ?></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
</div>
<div class="row gutters-10">
    <div class="col-xxl-8 col-xl-7">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 fs-14"><?php echo e(translate('This year earnings')); ?></h6>
            </div>
            <div class="card-body">
                <canvas id="chart-1" class="w-100" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-xl-5">
        <div class="h-100 row gutters-10">
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2"><?php echo e(translate('Total Earnings')); ?></span>
                    <div class="h1"><?php echo e(single_price(\App\Models\PackagePayment::where('payment_status','Paid')->get()->sum('amount'))); ?></div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2"><?php echo e(translate('Last Month Earnings')); ?></span>
                      <?php
                          $last_1_months_earning = \App\Models\PackagePayment::where('payment_status','Paid')
                                                    ->whereBetween('created_at', [ Carbon\Carbon::now()->subMonth(1) , Carbon\Carbon::now() ])
                                                    ->get()->sum('amount');
                      ?>
                    <div class="h1"><?php echo e(single_price($last_1_months_earning)); ?></div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2"><?php echo e(translate('Last 6 Months Earnings')); ?></span>
                      <?php
                          $last_6_months_earning = \App\Models\PackagePayment::where('payment_status','Paid')
                                    ->whereBetween('created_at', [ Carbon\Carbon::now()->subMonth(6) , Carbon\Carbon::now() ])
                                    ->get()->sum('amount');
                      ?>
                    <div class="h1"><?php echo e(single_price($last_6_months_earning)); ?></div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2"><?php echo e(translate('Last 12 Months Earnings')); ?></span>
                      <?php
                          $last_12_months_earning = \App\Models\PackagePayment::where('payment_status','Paid')
                                    ->whereBetween('created_at', [ Carbon\Carbon::now()->subMonth(12) , Carbon\Carbon::now() ])
                                    ->get()->sum('amount');
                      ?>
                    <div class="h1"><?php echo e(single_price($last_12_months_earning)); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row gutters-10">
    <div class="col-xxl-8 col-xl-7">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 fs-14"><?php echo e(translate('Happy stories')); ?></h6>
            </div>
            <div class="card-body">
                <div class="aiz-carousel gutters-10" data-items='4' data-xl-items='3' data-lg-items='4' data-md-items='3' data-sm-items='2' data-xs-items='1'>
                    <?php $happy_stories = \App\Models\HappyStory::where('approved', '1')->latest()->limit(8)->get(); ?>
                    <?php $__currentLoopData = $happy_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $happy_story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $photo = explode(',',$happy_story->photos);
                        ?>
                        <div class="carousel-box">
                            <div class="card overflow-hidden mb-4">
                                <a href="<?php echo e(route('story_details', $happy_story->id)); ?>" class="text-reset d-block position-relative">
                                    <img src="<?php echo e(uploaded_asset($photo[0])); ?>" class="img-fit h-150px mw-100">
                                </a>
                                <div class="p-3">
                                    <div class="fw-600 text-truncate mb-2"><?php echo e($happy_story->user->first_name.' & '.$happy_story->partner_name); ?></div>
                                    <h2 class="h5 mb-0 fs-14 fw-400 lh-1-5 text-truncate-2">
                                        <a href="<?php echo e(route('story_details', $happy_story->id)); ?>" class="text-reset d-block">
                                            <?php echo e($happy_story->title); ?>

                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-xl-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 fs-14"><?php echo e(translate('Happy stories')); ?></h6>
            </div>
            <div class="card-body">
                <canvas id="pie-1" class="w-100" height="275"></canvas>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    AIZ.plugins.chart('#pie-1',{
        type: 'doughnut',
        data: {
            labels: [
                '<?php echo e(translate('Total Happy Stories')); ?>',
                '<?php echo e(translate('Approved Happy Stories')); ?>',
                '<?php echo e(translate('Pending Happy Stories')); ?>'
            ],
            datasets: [
                {
                    data: [
                        <?php echo e(\App\Models\HappyStory::all()->count()); ?>,
                        <?php echo e(\App\Models\HappyStory::where('approved',1)->get()->count()); ?>,
                        <?php echo e(\App\Models\HappyStory::where('approved',0)->get()->count()); ?>

                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff"
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#chart-1',{
        type: 'line',
        data: {
            labels: [
                '<?php echo e(translate('JAN')); ?>',
                '<?php echo e(translate('FEB')); ?>',
                '<?php echo e(translate('MAR')); ?>',
                '<?php echo e(translate('APR')); ?>',
                '<?php echo e(translate('MAY')); ?>',
                '<?php echo e(translate('JUN')); ?>',
                '<?php echo e(translate('JUL')); ?>',
                '<?php echo e(translate('SEP')); ?>',
                '<?php echo e(translate('OCT')); ?>',
                '<?php echo e(translate('NOV')); ?>',
                '<?php echo e(translate('DEC')); ?>'
            ],
            datasets: [{
                label: '',
                data: [
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>,
                        <?php echo e(\App\Models\PackagePayment::where('payment_status','Paid')->whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date('Y'))->sum('amount')); ?>

                    ],
                backgroundColor: 'rgba(55, 125, 255, 0)',
                borderColor: '#377dff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        color: '#e5e6e8',
                    },
                    display: true,
                    ticks: {
                        autoSkip: false,
                        maxTicksLimit: 8,
                        fontSize: 10,
                        maxRotation: 0,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        color: '#e5e6e8',
                    },
                    display: true,
                }]
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>