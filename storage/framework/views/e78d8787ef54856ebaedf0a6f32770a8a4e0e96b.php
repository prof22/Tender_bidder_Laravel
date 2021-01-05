<?php $__env->startSection('content'); ?>

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Contract</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  
  
  <div class="main-contents mt-2">
    <div class="latest-tenders">
      <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <h2> Contracts:</h2>

      <?php $__currentLoopData = $tenderRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenderRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-tender pointer">
          <div class="card">
            <div class="card-body">
              <h4 class="float-left"><?php echo e($tenderRequest->user->name); ?></h4>
              <h4 class="float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#tender<?php echo e($tenderRequest->id); ?>"><i class="fa fa-fw fa-chevron-down"></i>Details</h4>
              <!-- <?php if($tenderRequest->approved == 1): ?>
                <a class="float-right btn btn-success btn-sm mr-1">Committee Confirmed</a>
              <?php elseif($tenderRequest->approved == 2): ?>
              <a class="float-right btn btn-danger btn-sm mr-1">Committee Rejected</a>
              <?php else: ?> -->
              <!-- <a href="<?php echo e(route('admin.confirmTenderReject.tenderRequest', $tenderRequest->id)); ?>" class="float-right btn btn-danger btn-sm mr-1">Reject This</a>
                <a href="<?php echo e(route('admin.confirm.tenderRequest', $tenderRequest->id)); ?>" class="float-right btn btn-success btn-sm mr-1">Confirm This</a> -->
           <!-- <?php endif; ?> -->
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
                  <br>
                  <a href="<?php echo e(asset('public/doc/'.$tenderRequest->bid_document)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Bid Document</a>
              
        <br><hr>
        <?php $__currentLoopData = $evaluations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evaluation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <h2><strong>Bid Committee Report</strong></h2>
                <h4><strong>Organization: </strong><?php echo e($evaluation->category); ?></h4>
                <h4><strong>Contract Name.: </strong><?php echo e($evaluation->bid); ?></h4>
                <h4><strong>Status: </strong>
                <?php if($evaluation->status == 1): ?>
                Approved
                <?php elseif($evaluation->status == 2): ?>
                Rejected
                <?php elseif($evaluation->status == 3): ?>
                Ongoing
                <?php elseif($evaluation->status == 4): ?>
                Pending
                <?php else: ?>
                Pending
                <?php endif; ?>
                </h4>
                <h4><strong>Reasons(Decision): </strong> <br>
                  <?php echo e($evaluation->decision); ?></h4>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <br><hr>
                  </div>
              <a href="<?php echo e(route('admin.confirmTenderReject.tenderRequest', $tenderRequest->id)); ?>" class="float-right btn btn-danger btn-sm mr-1">Reject This</a>
                <a href="<?php echo e(route('admin.confirm.tenderRequest', $tenderRequest->id)); ?>" class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
            </div>
          </div>
        </div> <!-- end .single-tender -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div> <!-- end .main-content -->

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>