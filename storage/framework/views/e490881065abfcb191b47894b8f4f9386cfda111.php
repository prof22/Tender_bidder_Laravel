<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Contract <?php echo $__env->yieldContent('head-title'); ?></title>

  <link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/font-awesome/css/font-awesome.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/css/custom/main.css')); ?>">

  <?php $__env->startSection('stylesheets'); ?>
  <?php echo $__env->yieldSection(); ?>
</head>

<body>
  <?php echo $__env->make('frontend.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <?php echo $__env->make('frontend.partials.left_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>

      <div class="col-md-6">
        <?php $__env->startSection('content'); ?>
        <?php echo $__env->yieldSection(); ?>
      </div> <!-- end .col-md-6 -->

      <div class="col-md-3">
        <?php echo $__env->make('frontend.partials.right_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
    </div>
  </div>
  <!-- End Main Page Contents -->


  <?php echo $__env->make('frontend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  <script type="text/javascript" src="<?php echo e(asset('public/js/jquery/jquery-3.3.1.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/js/jquery/jquery-easing.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/js/bootstrap/popper.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/js/bootstrap/bootstrap.min.js')); ?>"></script>
</body>
</html>
