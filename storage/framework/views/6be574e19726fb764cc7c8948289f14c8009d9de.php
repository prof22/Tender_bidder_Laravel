<?php $__env->startSection('content'); ?>
  <form class="form-signin pt-5" method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
    <?php echo csrf_field(); ?>
    <h2 class="form-signin-heading">Admin Panel Login</h2>

    <?php if( Session::has('login_error') ): ?>
          <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo Session::get('login_error'); ?>

          </div>
    <?php endif; ?>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="email" value="<?php echo e(old('email')); ?>" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

      </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login Now</button> <br />
    <a class="btn text-danger btn-link float-right" href="<?php echo e(route('admin.password.request')); ?>">
      Forgot Your Password?
    </a>
    <div class="clearfix"></div>
  </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.auth.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>