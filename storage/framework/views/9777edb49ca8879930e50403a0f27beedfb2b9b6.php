
<?php $__env->startSection('panel_content'); ?>
    <div class="card">
        <div class="card-header">
            <h6><?php echo e(translate('Notifications')); ?></h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-raw">
                <?php if(!$notifications->isEmpty()): ?>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $check = 'done';
                            $notify_data = json_decode($notification->data);
                            $user = \App\User::where('id',$notify_data->notify_by)->first();
                        ?>
                        <?php if($notify_data->type == 'express_interest'): ?>
                            <?php
                                $interest_data = App\Models\ExpressInterest::where('id', $notify_data->info_id)->first();
                                if(empty($interest_data))
                                {
                                    $check = 'not_done';
                                }
                            ?>
                        <?php endif; ?>
                        <?php if($check == 'done'): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start hov-bg-soft-primary">
                                <a href="<?php echo e(route('notification_view', $notification->id)); ?>" class="media text-inherit">
                                    <span class="avatar avatar-sm mr-3">
                                        <img src="<?php echo e(uploaded_asset($user->photo)); ?>">
                                    </span>
                                    <div class="media-body">
                                        <p class="mb-1"><?php echo e($notify_data->message); ?></p>
                                        <small class="text-muted"><?php echo e(Carbon\Carbon::parse($notification->created_at)->diffForHumans()); ?></small>
                                    </div>
                                </a>
                                <?php if($notification->read_at == null): ?>
                                    <button class="btn p-0" data-toggle="tooltip" data-title="<?php echo e(translate('New')); ?>">
                                        <span class="badge badge-md  badge-dot badge-circle badge-primary"></span>
                                    </button>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <li class="list-group-item">
                        <div class="text-center">
                            <i class="las la-frown la-4x mb-4 opacity-40"></i>
                            <h4><?php echo e(translate('Nothing Found')); ?></h4>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="aiz-pagination aiz-pagination-center">
                <?php echo e($notifications->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.member_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/frontend/member/notifications.blade.php ENDPATH**/ ?>