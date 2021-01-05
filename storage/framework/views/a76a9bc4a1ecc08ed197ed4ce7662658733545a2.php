<!-- Top Nav   -->
<div class="top-nav">
  <div class="container">
    <ul class="float-right">
      <?php if(Auth::guard('web')->check()): ?>
        <li><a href="<?php echo e(route('user.logout')); ?>" class="btn btn-info btn-my-sm" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
          <?php echo csrf_field(); ?>
        </form></li>
      <?php else: ?>
        <li><a href="<?php echo e(route('registerUserForm')); ?>" class="btn btn-info btn-my-sm">Sign Up Now</a></li>
        <li><a href="<?php echo e(route('user.login')); ?>" class="btn btn-info btn-my-sm">Login</a></li>
      <?php endif; ?>
    </ul>
    <div class="clearfix"></div>
  </div>
</div>


<!-- Site Title + Header -->
<div class="site-header">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="<?php echo e(asset('public/images/logo.png')); ?>" class="img img-fluid">
      </div>
      <div class="col-md-9">
        <div class="social float-right">
          <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube text-danger" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div> <!-- end .row -->

  </div>
</div>
<!-- Site Title + Header -->


<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-light main-navbar">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo e(route('index')); ?>">Home</a>
        </li>
        <?php if(Auth::guard('web')->check()): ?>
        <?php if(Auth::guard('web')->user()->account_role == 'contractor'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Contractor
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo e(route('allTender')); ?>">View Open Contract</a>
            <a class="dropdown-item" href="<?php echo e(route('allTender')); ?>">Bid for Contract</a>
            <a class="dropdown-item" href="<?php echo e(route('allTender')); ?>">Edit Bid Document</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo e(route('allTender')); ?>">Bid Members</a>
        </li>
        <?php endif; ?>
     <?php endif; ?>
        <?php if(Auth::guard('web')->check()): ?>
        <?php if(Auth::guard('web')->user()->account_role == 'tenderer'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Contracts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              
                <a class="dropdown-item" href="<?php echo e(route('user.tender.index')); ?>">Contract </a>
        
             
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Elevations
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              
                <a class="dropdown-item" href="<?php echo e(route('user.tender.elevationForm')); ?>">Evaluation Form </a>
                <a class="dropdown-item" href="<?php echo e(route('user.tender.evaluation')); ?>">Evaluation Report </a>
             
            </div>
          </li>
          <?php endif; ?>
        <?php endif; ?>
        <?php if(!Auth::guard('web')->check()): ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Project Office</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Monitoring Office</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Help</a>
        </li>
<?php endif; ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </li>
      </ul>

    </div>
  </div>
</nav>
<!-- End Main Navbar -->
