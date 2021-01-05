<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="col-md-12 mt-5">

      <div class="card">
        <div class="card-body">
          <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <form class="form-signin pt-5" method="POST" action="<?php echo e(route('user.criteria.submit')); ?>">
            <?php echo csrf_field(); ?>
            <h2 class="form-signin-heading">Evaluation Criteria Form</h2>

            <div class="form-group">
              <label for="criteriaName">Criteria Name</label>
              <input type="text" id="criteriaName" class="form-control" placeholder="Criteria Name"  name="criteria_name" value="<?php echo e(old('criteria_name')); ?>" required autofocus>
            </div>

            <div class="form-group mt-2">
            <label for="criteriaWeight">Criteria Weight</label>
              <input type="text" id="criteriaWeight" class="form-control" placeholder="Criteria Weight"  name="criteria_weight" value="<?php echo e(old('criteria_weight')); ?>" required>
            </div>
        <div class="form-group mt-2">
          <label for="category_id">Category <span class="text-danger">*</span></label>
          <select class="form-control" name="category_id" id="category_id" required>
            <option value="">Select Category</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="form-group mt-2">
          <label for="contract_id">Contract <span class="text-danger">*</span></label>
          <select class="form-control" name="contract_id" id="contract_id" required>
            <option value="">Select Contract</option>
            <?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($tender->id); ?>"><?php echo e($tender->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

            <div class="form-group">
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i> Submit
                </button>
                <button class="btn btn-danger">
                  <i class="fa fa-btn fa-sign-out"></i> Reset
                </button>
              </div>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>