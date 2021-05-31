<?php $__env->startSection('web_settings','open'); ?>
<?php $__env->startSection('divisions','active'); ?>

<?php $__env->startSection('title'); ?> Divisions <?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?> Divisions <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
<li class="breadcrumb-item active">Divisions</li>
<?php $__env->stopSection(); ?>

<?php
$roles = userRolePermissionArray();
$rows = $data['data'];
?>

<?php $__env->startSection('content'); ?>
<div class="content-body">
  <section id="pagination">
    <div class="row">
      <div class="col-12">
        <div class="card card-sm">
          <div class="card-header">
            <div class="form-group">
              <?php if(hasAccessAbility('new_division', $roles)): ?>
              <a class="text-white btn btn-round btn-sm btn-primary" href="javascript:void(0)"><i class="ft-plus text-white"></i> Create Division</a>
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
                      <th style="width: 40px;">Sl.</th>
                      <th style="max-width: 200px;">Country</th>
                      <th>Division Name</th>
                      <th>URL Title</th>
                      <th style="width: 100px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($loop->index + 1); ?></td>
                      <td><?php echo e($row->country->name ?? ''); ?></td>
                      <td><?php echo e($row->name); ?></td>
                      <td><?php echo e($row->url_slug); ?></td>
                      <td>
                        <?php if(hasAccessAbility('edit_division', $roles)): ?>
                        <a href="javascript:void(0)" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>
                        <?php endif; ?>

                        <?php if(hasAccessAbility('delete_division', $roles)): ?>
                        <a href="javascript:void(0)" onclick="return confirm('Are you sure you want to delete division ?')" title="DELETE" class="btn btn-xs btn-outline-danger mr-1"><i class="la la-trash"></i></a>
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




<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/division/index.blade.php ENDPATH**/ ?>