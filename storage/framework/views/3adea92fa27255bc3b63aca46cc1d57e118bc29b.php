<?php $__env->startSection('content'); ?>

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <h2> Contracts:</h2>

      <?php echo e($categoryTenders->links()); ?>


      <?php $__currentLoopData = $categoryTenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryTender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-tender pointer">
          <p class="text-info float-left">
            Published On : <?php echo e($categoryTender->created_at->toFormattedDateString()); ?>

          </p>
          <p class="float-right">
            <i class="fa fa-user"></i> Visitor: <?php echo e($categoryTender->visitor); ?>

          </p>
          <div class="clearfix"></div>
          <p class="mt-2"><a href="<?php echo e(route('singleTender', $categoryTender->slug)); ?>"><h4><?php echo e($categoryTender->title); ?></h4></a></p>
          <div class="float-right">
            <a href="" class="btn btn-outline-secondary">Document Price: <span class="price">N<?php echo e($categoryTender->document_price); ?></span></a>
            <a href="" class="ml-2 btn btn-outline-info">Security Amount: <span class="price">N<?php echo e($categoryTender->security_amount); ?></span></a>
          </div>
          <div class="clearfix"></div>
          <div class="float-left">
            <p><i class="fa fa-location"></i> <?php echo e($categoryTender->user->city); ?></p>
            <p><strong>Opening Date: </strong> <?php echo e($categoryTender->published_on); ?></p>
            <p><strong>Submitting Date: </strong> <?php echo e($categoryTender->closed_on); ?></p>
          </div>
          <a href="<?php echo e(asset('public/images/tenders/'.$categoryTender->image)); ?>" target="_blank" class="btn btn-sm btn-primary float-right mt-3 mr-1"><i class="fa fa-fw fa-eye"></i>View Image</a>
          <div class="clearfix"></div>
        </div> <!-- end .single-tender -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div> <!-- end .main-content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>