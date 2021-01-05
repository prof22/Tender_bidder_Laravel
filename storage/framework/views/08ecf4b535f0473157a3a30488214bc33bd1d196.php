<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="alert-success">
      <p class=""><?php echo Session::get('success'); ?></p>
    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="alert-danger">
      <p class=""><?php echo Session::get('error'); ?></p>
    </div>
<?php endif; ?>
