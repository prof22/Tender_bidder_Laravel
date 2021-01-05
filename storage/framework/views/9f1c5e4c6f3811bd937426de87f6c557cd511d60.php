<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tender | Admin</title>
  <meta name="description" content="Tender | Admin">

  <!-- Bootstrap CSS -->
  <link href="<?php echo e(asset('public/css/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />

  <!-- Font Awesome CSS -->
  <link href="<?php echo e(asset('public/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="<?php echo e(asset('public/css/admin/datatable/datatable.min.css')); ?>">

  <!-- Custom CSS -->
  <link href="<?php echo e(asset('public/css/admin/style.css')); ?>" rel="stylesheet" type="text/css" />

  <?php echo $__env->yieldContent('stylesheets'); ?>

</head>

<body class="adminbody">

  <div id="main">
    <?php echo $__env->make('backend.partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('backend.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <?php $__env->startSection('content'); ?>
          <?php echo $__env->yieldSection(); ?>
        </div>
      </div>
    </div>
    <?php echo $__env->make('backend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>


  <script src="<?php echo e(asset('public/js/jquery/jquery-3.3.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('public/js/admin/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('public/js/bootstrap/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('public/js/admin/pikeadmin.js')); ?>"></script>
  <script src="<?php echo e(asset('public/js/admin/datatable/jquery-datatable.min.js')); ?>"></script>
  <script src="<?php echo e(asset('public/js/admin/datatable/bootstrap-datatable.min.js')); ?>"></script>
  <script>
  $(document).ready(function() {
    $('#admin-data-table').DataTable();
  } );
  </script>

  <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
