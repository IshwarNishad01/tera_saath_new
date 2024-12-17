
<?php $__env->startSection('content'); ?>
    <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h6><?php echo e(translate('Notifications')); ?></h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-raw">
                                <?php if(!$notifications->isEmpty()): ?>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $notify_data = json_decode($notification->data);
                                            $user_data = \App\User::where('id',$notify_data->notify_by)->first();
                                        ?>
                                        <?php if(!empty($user_data)): ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-start hov-bg-soft-primary">
                                              <a href="<?php echo e(route('notification_view', $notification->id)); ?>" class="media text-inherit">
                                                  <span class="avatar avatar-sm mr-3">
                                                      <?php if(!empty(uploaded_asset($user_data->photo))): ?>
                                                          <img src="<?php echo e(uploaded_asset($user_data->photo)); ?>">
                                                      <?php else: ?>
                                                          <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>">
                                                      <?php endif; ?>
                                                  </span>
                                                  <div class="media-body">
                                                      <p class="mb-1"><?php echo e($user_data->first_name.' '.$user_data->last_name); ?></p>
                                                      <small class="text-muted"><?php echo e($notify_data->message); ?></small>
                                                      <br>
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
                                <?php endif; ?>
                            </ul>
                            <div class="aiz-pagination">
                                <?php echo e($notifications->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/notifications.blade.php ENDPATH**/ ?>