<?php $__env->startSection('content'); ?>

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <h2> Contract:</h2>

      <?php $__currentLoopData = $tenderRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenderRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-tender pointer">
          <div class="card">
            <div class="card-body">
              <h4 class="float-left"><?php echo e($tenderRequest->user->name); ?></h4>
              <h4 class="float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#tender<?php echo e($tenderRequest->id); ?>"><i class="fa fa-fw fa-chevron-down"></i>Details</h4>
              <?php if($tenderRequest->approved == 1): ?>
                <a href="<?php echo e(route('user.tender.evaluation')); ?>" class="float-right btn btn-success btn-sm mr-1">Confirmed</a>
              <?php elseif($tenderRequest->approved == 2): ?>
              <a href="<?php echo e(route('user.tender.evaluation')); ?>" class="float-right btn btn-danger btn-sm mr-1">Rejected</a>
              <?php elseif($tenderRequest->approved == 0): ?>
              <a href="<?php echo e(route('user.tender.evaluation')); ?>"  class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
              <?php else: ?>
              <a href="<?php echo e(route('user.tender.evaluation')); ?>"  class="float-right btn btn-danger btn-sm mr-1">Reject This</a>
              
              <?php $__currentLoopData = $evaluate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evaluate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($evaluate->status == 1): ?>
                <a class="float-right btn btn-success btn-sm mr-1">Waiting</a>
                <?php else: ?>
                <a href="<?php echo e(route('user.tender.evaluation')); ?>"  class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
             <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
              <div class="clearfix"></div>
              <div class="collapse multi-collapse"  id="tender<?php echo e($tenderRequest->id); ?>">
              <h4><strong>Contract NO.: </strong> <?php echo e($tenderRequest->tender->contract_no); ?></h4>
              <h4><strong>Contract Name.: </strong> <?php echo e($tenderRequest->tender->title); ?></h4>
              <h4><strong>Bidder Name: </strong> <?php echo e($tenderRequest->user->name); ?></h4>
                <h4><strong>Designation: </strong> <?php echo e($tenderRequest->user->designation); ?></h4>
                <h4><strong>Organization: </strong><?php echo e($tenderRequest->user->organization); ?></h4>
                <h4><strong>Location: </strong><?php echo e($tenderRequest->user->city); ?></h4>
                <h4><strong>Contact Number: </strong><?php echo e($tenderRequest->user->phone); ?></h4>
                <h4><strong>Message: </strong> <br>
                  <?php echo e($tenderRequest->message); ?></h4>

                  <a href="<?php echo e(asset('public/doc/'.$tenderRequest->bid_document)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Bid Document</a>
              </div>
            </div>
          </div>
        </div> <!-- end .single-tender -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div> <!-- end .main-content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>