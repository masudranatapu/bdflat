<?php $__env->startPush('custom_css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/colors/palette-tooltip.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('product_list','active'); ?>
<?php $__env->startSection('Product Management','open'); ?>

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('product.list_page_title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-name'); ?>
    <?php echo app('translator')->get('product.list_page_sub_title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('product.breadcrumb_title'); ?>    </a>
    </li>
    <li class="breadcrumb-item active"><?php echo app('translator')->get('product.breadcrumb_sub_title'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php
    $roles = userRolePermissionArray();
    $promotion = request()->get('ad_promotion_type') ?? '';
?>

<?php $__env->startSection('content'); ?>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="filter">
                                        <form method="" action="" class="form-inline">
                                          <div class="form-group mr-2">
                                             <select class="form-control" id="ad_promotion_type" data-url="<?php echo e(route('admin.product.list')); ?>" >
                                                 <option value="" selected="">--select--</option>
                                                 <option value="Top" <?php echo e($promotion == 'Top' ? 'selected' : ''); ?>>Top</option>
                                                 <option value="Feature" <?php echo e($promotion == 'Feature' ? 'selected' : ''); ?>>Feature</option>
                                                 <option  value="Urgent" <?php echo e($promotion == 'Urgent' ? 'selected' : ''); ?>>Urgent</option>
                                                 <option value="Basic" <?php echo e($promotion == 'Basic' ? 'selected' : ''); ?>>Free</option>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary">Filter</button>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive ">
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Sl</th>
                                            <th>Name</th>
                                            <th style="">Category</th>
                                            <th style="">Subcategory</th>
                                            <th style="">User Type</th>
                                            <th style="">Entry Time</th>
                                            <th style="" class="text-center">Report</th>
                                            <th style="width: 90px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($rows) && ($rows->count() > 0)): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                        $text_color = '';
                                        if ($row->is_active == 0) {
                                            $text_color = 'text-warning';
                                        }elseif($row->is_active == 1){
                                            $text_color = 'text-success';
                                        }elseif($row->is_active == 2){
                                            $text_color = 'text-danger';
                                        }
                                        ?>

                                            <tr class="<?php echo e($text_color); ?>" title="<?php echo e($row->is_active == 2 ? 'Rejacted' : ''); ?>">
                                                <td class="text-center"><?php echo e($loop->index + 1); ?></td>
                                                <td><?php echo e($row->ad_title ?? ''); ?></td>
                                                <td><?php echo e($row->category->name ?? ''); ?></td>
                                                <td><?php echo e($row->subcategory->name ?? ''); ?></td>
                                                <td><?php echo e($row->customer->seller_type ?? ''); ?></td>
                                             
                                                <td><?php echo e(date('d-m-Y h:i A', strtotime($row->created_at))); ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo e(route('product.reports',['id' => $row->pk_no ])); ?>"><?php echo e($row->allReports->count() ?? 0); ?></a>
                                                </td>
                                               
                                                <td style="width: 90px;">

                                                    <?php if(hasAccessAbility('edit_product', $roles)): ?>
                                                    <a href="<?php echo e(route('admin.product.edit', [$row->pk_no])); ?>" class="btn btn-xs btn-outline-primary mr-1" title="EDIT"><i class="la la-edit"></i></a>
                                                    <?php endif; ?>
                                                    

                                                    <?php if(hasAccessAbility('delete_product', $roles)): ?>
                                                    <a href="<?php echo e(route('admin.product.delete', [$row->pk_no])); ?>" class="btn btn-xs btn-outline-danger mr-1" onclick="return confirm('Are you sure you want to delete the product with it\'s variant product ?')" title="DELETE"><i class="la la-trash"></i></a>
                                                    <?php endif; ?>

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
<script type="text/javascript">
    $(document).on('change', '#ad_promotion_type', function(e){
        var url = $(this).data('url');
        var ad_promotion_type = $(this).val();
        window.location.href = url+'?ad_promotion_type='+ad_promotion_type;
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/product/index.blade.php ENDPATH**/ ?>