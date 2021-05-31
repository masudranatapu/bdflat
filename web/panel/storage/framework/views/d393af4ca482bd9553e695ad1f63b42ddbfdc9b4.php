<?php $__env->startPush('custom_css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/colors/palette-tooltip.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('Promotion','open'); ?>
<?php $__env->startSection('promotion_list','active'); ?>


<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('promotion.promotion_title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-name'); ?>
    <?php echo app('translator')->get('promotion.promotion_title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="#"><?php echo app('translator')->get('promotion.dashboard'); ?></a>
    </li>
    <li class="breadcrumb-item active"><?php echo app('translator')->get('promotion.promotion_sub_title'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php
    $roles = userRolePermissionArray()
?>

<?php $__env->startSection('content'); ?>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm">
                        <div class="card-header">
                            <?php if(hasAccessAbility('new_role', $roles)): ?>
                            <a class="btn btn-round btn-sm btn-primary text-white" href="javascript::void(0)" title="ADD NEW PACKAGE"><i class="ft-plus text-white"></i> <?php echo app('translator')->get('promotion.add_promotion'); ?></a>
                            <?php endif; ?>

                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive ">
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center"><?php echo app('translator')->get('promotion.sl'); ?></th>
                                            <th><?php echo app('translator')->get('promotion.name'); ?></th>
                                            <th><?php echo app('translator')->get('promotion.price'); ?></th>
                                            <th><?php echo app('translator')->get('promotion.duration'); ?></th>
                                            <th style="width: 120px;" class="text-center"><?php echo app('translator')->get('promotion.action'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($data['rows']) && count($data['rows']) > 0 ): ?>
                                            <?php $__currentLoopData = $data['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>01</td>
                                                <td><?php echo e($row->promotion->name ?? ''); ?></td>
                                                <td>BDT <?php echo e(number_format($row->price, 2)); ?> </td>
                                                <td><?php echo e($row->day_limit); ?> Day</td>
                                                <td class="text-center">
                                                    

                                                    <a href="<?php echo e(route('admin.promotion.edit',1)); ?>" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>

                                                    
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
<script src="<?php echo e(asset('app-assets/js/scripts/tooltip/tooltip.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/promotion/index.blade.php ENDPATH**/ ?>