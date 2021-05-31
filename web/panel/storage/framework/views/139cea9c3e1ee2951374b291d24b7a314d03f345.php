<?php if(Session::has('flashMessageSuccess')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageSuccess')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flashMessageAlert')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageAlert')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flashMessageError')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageError')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flashMessageWarning')): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageWarning')); ?>

    </div>
<?php endif; ?>


<script>
    $('div.alert').delay(7000).slideUp(300);
</script>
<?php /**PATH C:\xampp\htdocs\webdevs\bdflats\web\panel\resources\views/admin/layout/flash.blade.php ENDPATH**/ ?>