<?php $__env->startSection('web_settings','open'); ?>
<?php $__env->startSection('area','active'); ?>

<?php $__env->startSection('title'); ?> Area <?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?> Area <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>" ><?php echo app('translator')->get('product.breadcrumb_title'); ?> </a></li>
<li class="breadcrumb-item active">Area</li>
<?php $__env->stopSection(); ?>

<?php
    $roles = userRolePermissionArray();
    $type = request()->get('type') ?? null;

?>

<?php $__env->startSection('content'); ?>
<!-- Alternative pagination table -->
<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-12">
                <div class="card card-sm">
                    <div class="card-header pl-2">
                        <?php if(hasAccessAbility('new_area', $roles)): ?>
                            <a class="text-white btn btn-round btn-sm btn-primary" href="<?php echo e(route('admin.area.create')); ?>"><i class="ft-plus text-white"></i>Add Area</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;
                        <select class="form-control" style="width: 150px; display: inline;" id="filterArea">
                            <option value="<?php echo e(route('admin.area.list')); ?>"> -- All Areas -- </option>
                            <option value="<?php echo e(route('admin.area.list')); ?>?type=division" <?php echo e($type == 'division' ? 'selected' : ''); ?>> Division Areas </option>
                            <option value="<?php echo e(route('admin.area.list')); ?>?type=city" <?php echo e($type == 'city' ? 'selected' : ''); ?>> City Areas </option>
                        </select>

                        <a class="heading-elements-toggle heading-elements-toggle-sm"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements heading-elements-sm">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard text-center">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th class="text-left" ><?php echo app('translator')->get('tablehead.area'); ?></th>
                                            <th class="text-left" ><?php echo app('translator')->get('tablehead.city_division'); ?></th>
                                            <th class="text-left">URL Title</th>
                                            <th class="text-left" ><?php echo app('translator')->get('tablehead.order'); ?></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($loop->index + 1); ?></td>
                                        <td class="text-left"><?php echo e($row->name); ?></td>
                                        <td class="text-left">
                                            <?php echo e($row->city->name ?? ''); ?> <?php echo e($row->division->name ?? ''); ?></td>
                                        <td class="text-left"><?php echo e($row->url_slug); ?></td>
                                        <td class="text-left"><?php echo e($row->order_id); ?></td>
                                        <td>

                                            <?php if(hasAccessAbility('edit_area', $roles)): ?>
                                            <a href="<?php echo e(route('admin.area.edit', [$row->pk_no])); ?>" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>
                                            <?php endif; ?>

                                            <?php if(hasAccessAbility('delete_area', $roles)): ?>
                                            <a href="<?php echo e(route('admin.area.delete', [$row->pk_no])); ?>" onclick="return confirm('Are you sure you want to delete  area ?')" title="DELETE" class="btn btn-xs btn-outline-danger mr-1"><i class="la la-trash"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_js'); ?>

<script type="text/javascript">
    $(document).on('change','#filterArea',function(){
       
        window.location = $(this).val();
    })
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/area/index.blade.php ENDPATH**/ ?>