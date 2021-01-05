<div class="right-sidebar">
  <div class="widget">
    <h3>Recent Contracts</h3>
    <div>
      <marquee scrollamount="2" behavior="scroll" direction="up">
        <ul class="list-group">
          <?php $__currentLoopData = \App\Models\Tender::recentTenders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentTender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
              <a href="<?php echo e(route('singleTender', $recentTender->slug)); ?>"><?php echo e($recentTender->title); ?></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </marquee>
    </div>
  </div> <!-- End recent tenders -->
  <div class="widget">
    <h3>Top Contracts</h3>
    <div>
      <ul class="list-group">
        <?php $__currentLoopData = \App\Models\Tender::topTenders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topTender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="list-group-item">
            <a href="<?php echo e(route('singleTender', $topTender->slug)); ?>"><?php echo e($topTender->title); ?></a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div> <!-- End recent tenders -->

</div>
