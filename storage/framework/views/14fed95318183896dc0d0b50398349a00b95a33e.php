<div class="left-sidebar mt-2">
  <div class="list-group">

    <a href="#collapseExample" data-toggle="collapse" class="list-group-item">
      <span class="float-left item">  Ministry </span>
      <span class="float-right"><i class="fa fa-chevron-down"></i></span>
    </a>

    <div class="collapse" id="collapseExample">
      <div class="card card-body pointer">
        <ul class="list-group">
          <?php $__currentLoopData = \App\Models\Category::orderBy('id', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item"><a href="<?php echo e(route('categoryTender', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>

    <!-- <a href="#collapseExample2" data-toggle="collapse" class="list-group-item">
      <span class="float-left item">  Place</span>
      <span class="float-right"><i class="fa fa-chevron-down"></i></span>
    </a> -->

    <div class="collapse" id="collapseExample2">
      <div class="card card-body pointer">
        <ul class="list-group">
          <?php $__currentLoopData = \App\Models\User::districts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item"><a href="<?php echo e(route('placeTender', $district->city)); ?>"><?php echo e($district->city); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>

    <!-- <a href="#collapseExample3" data-toggle="collapse" class="list-group-item">
      <span class="float-left item">  Organization</span>
      <span class="float-right"><i class="fa fa-chevron-down"></i></span>
    </a> -->

    <div class="collapse" id="collapseExample3">
      <div class="card card-body pointer">
        <ul class="list-group">
          <?php $__currentLoopData = \App\Models\User::organizations(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item"><a href="<?php echo e(route('organizationTender', $organization->organization)); ?>"><?php echo e($organization->organization); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>

  </div>
</div>
