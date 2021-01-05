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


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Contracts</span>
        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Contract</button>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>title</th>
                <th>Published Date</th>
                <th>Closed Date</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($tenders) > 0): ?>
                <?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($tender->title); ?></td>
                    <td><?php echo e($tender->published_on); ?></td>
                    <td><?php echo e($tender->closed_on); ?></td>
               
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo e($tender->id); ?>" title="Edit Branch"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <!-- Add Modal -->
                      <div class="modal fade" id="editModal<?php echo e($tender->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Contract</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                           
                <form class="" action="<?php echo e(route('admin.tender.update', $tender->slug)); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Contract Tilte" value="<?php echo e($tender->title); ?>" required>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                    <label for="title">Contract No.* <span class="text-danger">*</span></label>
                    <input type="text" name="contract_no" id="title" class="form-control" value="<?php echo e($tender->contract_no); ?>" placeholder="Contract No."  required>
                  </div>
                  <div class="col-md-6 form-group">
                  <label for="contract_type">Contract Type <span class="text-danger">*</span></label>
                      <select class="form-control" name="contract_type" id="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                    <label for="title">Recipients* <span class="text-danger">*</span></label>
                    <input type="text" name="recipients" id="title" class="form-control" value="<?php echo e($tender->recipients); ?>" placeholder="Recipients."  required>
                  </div>

                    <div class="col-md-6 form-group">
                    <label for="title">Subject* <span class="text-danger">*</span></label>
                    <input type="text" name="subject" id="title" class="form-control" value="<?php echo e($tender->subject); ?>" placeholder="Subject"  required>
                  </div>
             
                  </div>

                  <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="title">State* <span class="text-danger">*</span></label>
                    <input type="text" name="state" id="title" class="form-control"  value="<?php echo e($tender->state); ?>" placeholder="State"  required>
                  </div>

                  <div class="col-md-6 form-group">
                      <label for="doc">Bid Document[PDF/DOCx] <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="doc" id="doc">
                    </div>
                    <a href="<?php echo e(asset('public/doc/'.$tender->bid_document)); ?>">Download and Edit file</a>
                  </div>



                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="category_id">Originating Document <span class="text-danger">*</span></label>
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
                    <a href="<?php echo e(asset('public/images/tenders'.$tender->bid_document)); ?>">Download and Edit file</a>
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

                  <div class="form-group">
                    <label for="title">Message* <span class="text-danger">*</span></label>
                    <textarea  name="message" id="title" class="form-control" placeholder="Message"  required>
                    <?php echo e($tender->message); ?>

                    </textarea>
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

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo e($tender->id); ?>" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <a href ="<?php echo e(route('ViewTender', $tender->slug)); ?>"> <button class="btn btn-info btn-sm" ><i class="fa fa-fw fa-edit"></i>View</button></a>
                      <a href="<?php echo e(route('closebid', $tender->id)); ?>"><button class="btn btn-success btn-sm" >Close Bid </button></a>
     



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
                      
                              <form class="" action="" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div><!-- end card-->
    </div>
  </div>

  <!-- Add Modal -->
  <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('admin.tender.store')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
                  <?php echo $__env->make('frontend.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <div class="form-group">
                    <label for="title">Title* <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Contract Tilte"  required>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                    <label for="title">Contract No.* <span class="text-danger">*</span></label>
                    <input type="text" name="contract_no" id="title" class="form-control" placeholder="Contract No."  required>
                  </div>
                  <div class="col-md-6 form-group">
                  <label for="contract_type">Contract Type <span class="text-danger">*</span></label>
                      <select class="form-control" name="contract_type" id="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                    <label for="title">Recipients* <span class="text-danger">*</span></label>
                    <input type="text" name="recipients" id="title" class="form-control" placeholder="Recipients."  required>
                  </div>

                    <div class="col-md-6 form-group">
                    <label for="title">Subject* <span class="text-danger">*</span></label>
                    <input type="text" name="subject" id="title" class="form-control" placeholder="Subject"  required>
                  </div>
             
                  </div>

                  <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="title">State* <span class="text-danger">*</span></label>
                    <input type="text" name="state" id="title" class="form-control" placeholder="State"  required>
                  </div>

                  <div class="col-md-6 form-group">
                      <label for="doc">Bid Document[PDF/DOCx] <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="doc" id="doc">
                    </div>
                  </div>



                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="category_id">Originating Department <span class="text-danger">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="image">Display Image <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="published_on">Published On <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="published_on" id="published_on"  required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="closed_on">Closed On <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="closed_on" id="closed_on"  required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="document_price">Document Price <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="document_price" id="document_price"  required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="security_amount">Security Amount <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="security_amount" id="security_amount"  required>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="title">Message* <span class="text-danger">*</span></label>
                    <textarea  name="message" id="title" class="form-control" placeholder="Message"  required></textarea>
                  </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Contract</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>