<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="col-md-12 mt-5">

      <div class="card">
        <div class="card-body">
          <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <form class="form-signin pt-5" method="POST" action="<?php echo e(route('user.login.submit')); ?>">
            <?php echo csrf_field(); ?>
            <h2 class="form-signin-heading">User Login</h2>

            <?php if( Session::has('login_error') ): ?>
              <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo Session::get('login_error'); ?>

              </div>
            <?php endif; ?>

            <div class="form-group">
              <label for="inputEmail">Email address</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            </div>

            <div class="form-group mt-2">
              <label for="inputPassword">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

              </label>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i> Login
                </button>

                <a class="btn btn-link" href="<?php echo e(route('user.password.request')); ?>">Forgot Your Password?</a>
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