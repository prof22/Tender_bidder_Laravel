<?php $__env->startSection('content'); ?>

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <h2>Contracts:</h2>

      <?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-tender pointer">
          <p class="text-info float-left">
            Published On : <?php echo e($tender->created_at->toFormattedDateString()); ?>

          </p>
          <p class="float-right">
            <i class="fa fa-user"></i> Visitor: <?php echo e($tender->visitor); ?>

          </p>
          <div class="clearfix"></div>
          <p class="mt-2">
          <!-- <a href="<?php echo e(route('singleTender', $tender->slug)); ?>"> -->
          <h4><?php echo e($tender->title); ?></h4></a></p>
          <div class="float-right">
            <a href="" class="btn btn-outline-secondary">Document Price: <span class="price">N<?php echo e($tender->document_price); ?> </span></a>
            <a href="" class="ml-2 btn btn-outline-info">Security Amount: <span class="price">N<?php echo e($tender->security_amount); ?> </span></a>
          </div>
          <div class="clearfix"></div>
          <div class="float-left">
            <p><i class="fa fa-location"></i> <?php echo e($tender->user->city); ?></p>
            <p><strong>Opening Date: </strong> <?php echo e($tender->published_on); ?></p>
            <p><strong>Submitting Date: </strong> <?php echo e($tender->closed_on); ?></p>
          </div>
          <!-- <a class="btn btn-sm btn-danger float-right mt-3 ml-1" data-toggle="modal" data-target="#deleteModal<?php echo e($tender->id); ?>"><i class="fa fa-fw fa-edit"></i>Delete This</a> -->
          <!-- <a class="btn btn-sm btn-success float-right mt-3" data-toggle="modal" data-target="#editModal<?php echo e($tender->id); ?>"><i class="fa fa-fw fa-edit"></i>Edit This</a> -->
          <a href="<?php echo e(asset('public/images/tenders/'.$tender->image)); ?>" target="_blank" class="btn btn-sm btn-primary float-right mt-3 mr-1"><i class="fa fa-fw fa-eye"></i>View Image</a>
          <a href="<?php echo e(route('user.tender.tenderApply', $tender->slug)); ?>" class="btn btn-sm btn-success float-right mt-3 mr-1">Evaluate <span class="badge badge-success"><?php echo e(\App\Models\TenderRequest::where('tender_id', $tender->id)->count()); ?></span></a>
          <div class="clearfix"></div>
        </div> <!-- end .single-tender -->
        
        <div class="modal fade" id="editModal<?php echo e($tender->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Contacts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="<?php echo e(route('user.tender.update', $tender->slug)); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Tender Tilte" value="<?php echo e($tender->title); ?>" required>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="category_id">Category <span class="text-danger">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>" <?php echo e(($category->id == $tender->category_id) ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="image">Image <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="published_on">Published On <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="published_on" id="published_on" value="<?php echo e($tender->published_on); ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="closed_on">Closed On <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="closed_on" id="closed_on" value="<?php echo e($tender->closed_on); ?>" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="document_price">Document Price <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="document_price" id="document_price" value="<?php echo e($tender->document_price); ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="security_amount">Security Amount <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="security_amount" id="security_amount" value="<?php echo e($tender->security_amount); ?>" required>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Contract</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal<?php echo e($tender->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this Contract ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Please confirm if you want to delete</div>
              <div class="modal-footer">
                <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <form class="" action="<?php echo e(route('user.tender.delete', $tender->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div> <!-- end .main-content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>