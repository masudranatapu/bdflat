<?php $__env->startSection('web_settings','open'); ?>
<?php $__env->startSection('product_type','active'); ?>

<?php $__env->startSection('title'); ?> Product Type <?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?> Product Color <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
<li class="breadcrumb-item active">Product Type</li>
<?php $__env->stopSection(); ?>

<?php
    $roles = userRolePermissionArray()
?>

<?php $__env->startSection('content'); ?>
<!-- Alternative pagination table -->
<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group">
                            <a type="button" class="text-white btn btn-round btn-sm btn-primary" href="<?php echo e(route('admin.product_type.create')); ?>">
                                   <i class="ft-user-plus"></i> <?php echo app('translator')->get('form.add_new'); ?>
                            </a>
                        </div>
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                    <thead>
                                        <tr>

                                            <th>Sl.</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Product Type Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td><?php echo e($loop->index + 1); ?></td>
                                            <td><?php echo e($row->category->name ?? ''); ?></td>
                                            <td><?php echo e($row->subcategory->name ?? ''); ?></td>
                                            <td><?php echo e($row->name); ?></td>
                                           
                                            <td class="text-center">
                                                <?php if(hasAccessAbility('edit_product_type', $roles)): ?>
                                                    <a href="<?php echo e(route('admin.product_type.edit', [$row->pk_no])); ?>" type="button" class="btn btn-xs btn-outline-primary mr-1 " title="EDIT">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if(hasAccessAbility('delete_product_type', $roles)): ?>
                                                    <a href="<?php echo e(route('admin.product_type.delete', [$row->pk_no])); ?>" type="button" class="btn btn-xs btn-outline-danger mr-1 " title="DELETE"  onclick="return confirm('Are you sure you want to delete?')" >
                                                        <i class="la la-trash"></i>
                                                    </a>
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
<!--/ Alternative pagination table -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/product-type/index.blade.php ENDPATH**/ ?>