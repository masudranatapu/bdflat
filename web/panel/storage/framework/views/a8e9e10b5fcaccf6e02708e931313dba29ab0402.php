<?php $__env->startSection('web_settings','open'); ?>
<?php $__env->startSection('category','active'); ?>

<?php $__env->startSection('title'); ?> Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?> Category <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
  <li class="breadcrumb-item active">Category</li>
<?php $__env->stopSection(); ?>

<?php
    $roles = userRolePermissionArray()
?>

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <section id="pagination">
    <div class="row">
      <div class="col-12">
        <div class="card card-sm">
          <div class="card-header pl-2">
            <div class="form-group">
              <?php if(hasAccessAbility('view_category', $roles)): ?>
              <a class="text-white btn btn-round btn-sm btn-primary" href="<?php echo e(route('product.category.create')); ?>"><i class="ft-plus text-white"></i> Create Category</a>
              <?php endif; ?>

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
                      <th class="text-center" style="width: 50px;">Sl.</th>
                      <th class="" style="width: 120px;">Category Name</th>
                      <th class="" >URL Title</th>
                      
                      <th class="" style="min-width: 100px;">Logo</th>
                      <th class="" style="min-width: 100px;">Icon</th>
                      <th class="" style="min-width: 100px;">Banner</th>
                      <th class="" style="min-width: 40px;">Top</th>
                      <th class="" style="min-width: 40px;">New</th>
                      <th class="" style="min-width: 40px;">Feature</th>
                      <th class="" style="min-width: 40px;">Order</th>
                      <th class="text-center" style="width: 120px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                      <td class="text-center" style="width: 50px;"><?php echo e($loop->index + 1); ?></td>
                      <td class="" style="width: 120px;"><?php echo e($row->name); ?></td>
                      <td class="" ><?php echo e($row->url_slug); ?></td>
                      
                      <td class="text-center">
                        <img src="<?php echo e($row->logo_path); ?>" style="width: 64px" >
                      </td>
                      <td class="text-center">
                        <img src="<?php echo e($row->icon_path); ?>" style="width: 64px" >
                      </td>
                      <td class="text-center">
                        <img src="<?php echo e($row->banner_path); ?>" style="width: 80px" >
                      </td>
                      <td class="text-center"><?php echo e($row->is_top == 1 ? 'Yes' : 'No'); ?></td>
                      <td class="text-center"><?php echo e($row->is_new == 1 ? 'Yes' : 'No'); ?></td>
                      <td class="text-center"><?php echo e($row->is_feature == 1 ? 'Yes' : 'No'); ?></td>
                      <td class="text-center">
                        <span><?php echo e($row->order_id); ?></span>
                      </td>
                    
                        
                        <td class="text-center" style="width: 90px;">
                          <?php if(hasAccessAbility('edit_category', $roles)): ?>
                          <a href="<?php echo e(route('product.category.edit', [$row->pk_no])); ?>" title="EDIT" class="btn btn-xs btn-outline-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                          <?php endif; ?>

                          <?php if(hasAccessAbility('view_sub_category', $roles)): ?>
                          <a href="<?php echo e(route('admin.sub_category.list', [$row->pk_no])); ?>"  title="SHOW SUB CATEGORY" class="btn btn-xs btn-outline-primary mr-1 mb-1"><i class="la la-eye"></i></a>
                          <?php endif; ?>

                          <?php if(hasAccessAbility('delete_category', $roles)): ?>
                          <a href="<?php echo e(route('product.category.delete', [$row->pk_no])); ?>" onclick="return confirm('Are you sure you want to delete product category?')" title="DELETE" class="btn btn-xs btn-outline-danger mr-1 mb-1"><i class="la la-trash"></i></a>
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

<!--script only for brand page-->
<!--script type="text/javascript" src="<?php echo e(asset('app-assets/pages/category.js')); ?>"></script-->


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/category/index.blade.php ENDPATH**/ ?>