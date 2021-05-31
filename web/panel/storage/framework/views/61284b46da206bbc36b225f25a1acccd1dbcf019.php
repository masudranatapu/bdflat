<?php $__env->startSection('Sales Agent','open'); ?>
<?php $__env->startSection('add_customer','active'); ?>

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('customer.add_new_customer'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?> <?php echo app('translator')->get('customer.add_new_customer'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="#"><?php echo app('translator')->get('admin_role.breadcrumb_title'); ?>  </a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('customer.breadcrumb_sub_title'); ?>    </li>
<?php $__env->stopSection(); ?>

<?php

$roles = userRolePermissionArray();
$method_name = request()->route()->getActionMethod();


?>

<!--push from page-->
<?php $__env->startPush('custom_css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/selects/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('app-assets/file_upload/image-uploader.min.css')); ?>">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-sm">
                    <div class="card-header">

                        <?php if(hasAccessAbility('new_role', $roles)): ?>
                        <a class="btn btn-round btn-sm btn-primary text-white" href="<?php echo e(route('admin.customer.create')); ?>" title="ADD NEW PRODUCT CUSTOMER"><i class="ft-plus text-white"></i> <?php echo app('translator')->get('customer.customer_create_btn'); ?></a>
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
                            <?php echo Form::open([ 'route' => 'admin.customer.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']); ?>

                            <?php echo csrf_field(); ?>
                                                           

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group <?php echo $errors->has('name') ? 'error' : ''; ?>">
                                        <label><?php echo e(trans('form.name')); ?><span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <?php echo Form::text('name',  null, ['class'=>'form-control mb-1', 'id' => 'name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Name', 'tabindex' => 1, 'autocomplete' => 'off'  ]); ?>

                                            <?php echo $errors->first('name', '<label class="help-block text-danger">:message</label>'); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?php echo $errors->has('email') ? 'error' : ''; ?>">
                                        <label><?php echo e(trans('form.email')); ?></label>
                                        <div class="controls">
                                            <?php echo Form::email('email',  null, ['class'=>'form-control mb-1', 'id' => 'email', 'data-validation-required-message' => 'This field is required',  'placeholder' => 'Enter Email', 'tabindex' => 4, 'autocomplete' => 'off' ]); ?>

                                            <?php echo $errors->first('email', '<label class="help-block text-danger">:message</label>'); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo $errors->has('password') ? 'error' : ''; ?>">
                                        <label><?php echo e(trans('form.password')); ?><span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <?php echo Form::text('password', null, [ 'class' => 'form-control mb-1', 'minlength' => '6', 'data-validation-required-message' => 'This field is required', 'data-validation-minlength-message' => 'Minimum 6 characters', 'placeholder' => 'Enter password', 'tabindex' => 2, 'autocomplete' => 'off']); ?>

                                            <?php echo $errors->first('password', '<label class="help-block text-danger">:message</label>'); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo $errors->has('password_confirmation') ? 'error' : ''; ?>">
                                        <label><?php echo e(trans('form.password_confirmation')); ?><span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <?php echo Form::text('passwordAgain', null, [ 'class' => 'form-control mb-1', 'minlength' => '6', 'data-validation-matches-match' => 'password', 'data-validation-matches-message' => 'Must match with password', 'data-validation-minlength-message' => 'Minimum 6 characters', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter password', 'tabindex' => 2, 'autocomplete' => 'off']); ?>

                                            <?php echo $errors->first('password_confirmation', '<label class="help-block text-danger">:message</label>'); ?>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-actions text-center mt-3">
                                <a href="<?php echo e(route('admin.customer.list')); ?>">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i><?php echo app('translator')->get('form.btn_cancle'); ?>
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i><?php echo app('translator')->get('form.btn_save'); ?>
                                </button>
                                

                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $__env->stopSection(); ?>
<!--push from page-->
<?php $__env->startPush('custom_js'); ?>
<script src="<?php echo e(asset('app-assets/vendors/js/forms/select/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/forms/select/form-select2.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('app-assets/pages/customer.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/package/create.blade.php ENDPATH**/ ?>