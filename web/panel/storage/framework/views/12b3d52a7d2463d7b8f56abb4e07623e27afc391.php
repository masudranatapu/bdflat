<?php $__env->startSection('Web Setting','open'); ?>
<?php $__env->startSection('about_us','active'); ?>

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('about.about_title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?> <?php echo app('translator')->get('about.about_title'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="#"><?php echo app('translator')->get('admin_role.breadcrumb_title'); ?>  </a></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('about.about_title'); ?>    </li>
<?php $__env->stopSection(); ?>

<!--push from page-->
<?php $__env->startPush('custom_css'); ?>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-sm">
                    <div class="card-header">

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
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="package">Main Image</label>
                                        <input type="file"  class="form-control" name="aboutimg">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                       <img width="120" class="img-thumbnail" src="https://www.thestatesman.com/wp-content/uploads/2019/04/Physics-and-business.jpg" alt="about image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package">Description</label>
                                        <textarea name="desc"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Title One</label>
                                        <input type="text"  class="form-control" name="title1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package">Description One</label>
                                        <textarea name="desc1"></textarea>
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Title Two</label>
                                        <input type="text"  class="form-control" name="title2">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package">Description Two</label>
                                        <textarea name="desc2"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Title Three</label>
                                        <input type="text"  class="form-control" name="title3">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package">Description Three</label>
                                        <textarea name="desc3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions text-center mt-3">
                                <a href="">
                                    <button type="button" class="btn btn-success mr-1">
                                        Update
                                    </button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i><?php echo app('translator')->get('form.btn_cancle'); ?>
                                    </button>
                                </a>
                            </div>
                          
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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
 <script>
        CKEDITOR.replace('desc');
        CKEDITOR.replace('desc1');
        CKEDITOR.replace('desc2');
        CKEDITOR.replace('desc3');
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/web/about.blade.php ENDPATH**/ ?>