
<?php $__env->startSection('content'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change_default_language')): ?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Default Language')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-from-label"><?php echo e(translate('Default Language')); ?></label>
                        </div>
                        <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                        <div class="col-lg-6">
                            <select class="form-control aiz-selectpicker" name="DEFAULT_LANGUAGE">
                                <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($language->code); ?>" <?php if(env('DEFAULT_LANGUAGE') == $language->code) echo 'selected'?> ><?php echo e($language->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-info"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="<?php if(auth()->user()->can('add_languages')): ?> col-lg-7 <?php else: ?> col-lg-12 <?php endif; ?>">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('All Languages')); ?></h5>
            </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(translate('Name')); ?></th>
                            <th><?php echo e(translate('Code')); ?></th>
                            <th><?php echo e(translate('RTL')); ?></th>
                            <th class="text-right" width="20%"><?php echo e(translate('Options')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1) + ($languages->currentPage() - 1)*$languages->perPage()); ?></td>
                                <td><?php echo e($language->name); ?></td>
                                <td><?php echo e($language->code); ?></td>
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_rtl_status(this)" value="<?php echo e($language->id); ?>" type="checkbox"
                                            <?php if($language->rtl == 1): ?> checked <?php endif; ?>
                                            <?php if(auth()->user()->cannot('edit_languages')): ?> disabled <?php endif; ?>
                                        >
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td class="text-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('translate_languages')): ?>
                                        <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="<?php echo e(route('languages.show', encrypt($language->id))); ?>" title="<?php echo e(translate('Translation')); ?>">
                                            <i class="las la-language"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_languages')): ?>
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('languages.edit', $language->id)); ?>" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($language->code != 'en' && auth()->user()->can('delete_languages')): ?>
                                        <a href="javascript:void(0);" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('languages.destroy', $language->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                            <i class="las la-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                                $i++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_languages')): ?>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Add New Language')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('languages.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="control-label"><?php echo e(translate('Name')); ?></label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" id="name" name="name" placeholder="<?php echo e(translate('Eg. English')); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="form-text text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label class="control-label"><?php echo e(translate('Code')); ?></label>
                        </div>
                        <div class="col-lg-10">
                            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="code" data-live-search="true" >
                                <?php $__currentLoopData = \File::files(base_path('public/assets/img/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(pathinfo($path)['filename']); ?>" data-content="<div class=''><img src='<?php echo e(static_asset('assets/img/flags/'.pathinfo($path)['filename'].'.png')); ?>' class='mr-2'><span><?php echo e(strtoupper(pathinfo($path)['filename'])); ?></span></div>"></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 text-right">
                        <button type="submit" class="btn btn-info"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.create_edit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function language_modal(url){
             $.get(url, function(data){
                 $('.create_edit_modal_content').html(data);
                 $('.create_edit_modal').modal('show');
             });
         }

         function update_rtl_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('languages.update_rtl_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    location.reload();
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/759065.cloudwaysapps.com/jrquzkdxdm/public_html/resources/views/admin/settings/languages/index.blade.php ENDPATH**/ ?>