@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Bid Committee Members</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Bid Committee Member</span>
        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Member</button>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>Org</th>
                <th>designation</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($users) > 0)
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->organization }}</td>
                    <td>{{ $user->designation }}</td>
                    
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $user->id }}" title="Edit Branch"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <!-- Add Modal -->
                      <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit user</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.member.update', $user->id) }}" method="post">
                                @csrf
                                <h4 class="text-center mb-4">Update Members</h4>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="eg. Moshiur Rahman" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="account_role">Account Role <span class="text-danger">*</span></label>
                <select class="form-control" name="account_role" id="account_role" required>
                  <option value="">Select Account Role</option>
                  <!-- <option value="contractor">Contructor</option> -->
                  <option  selected value="tenderer">Tenderer</option>
                  
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="eg. example@gmail.com" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="phone">Phone <span class="text-danger">*</span></label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" placeholder="eg. 01756553048" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="designation">Designation <span class="text-danger">*</span></label>
                <input type="text" name="designation" value="{{ $user->designation }}" id="designation" class="form-control" placeholder="eg. Account Officer" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="organization">Organization <span class="text-danger">*</span></label>
                <input type="text" name="organization" value="{{ $user->organization }}" id="organization" class="form-control" placeholder="eg. BDREN" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="city">City <span class="text-danger">*</span></label>
                <input type="text" name="city" value="{{ $user->city }}" id="city" class="form-control" placeholder="eg. Dhaka" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="address">Address <span class="text-danger">*</span></label>
                <input type="text" name="address" value="{{ $user->address }}" id="address" class="form-control" placeholder="eg. Mirpur" value="" required>
              </div>
            </div>

          
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image" value="">
            </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Edit Member</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a href="{{ route('admin.active.member', $user->id )}}">
                      <button class="@if($user->status == 1) btn btn-info @else btn btn-danger @endif btn-sm" class="dropdown-item notify-item" onclick="event.preventDefault();
          document.getElementById('active-form').submit();">
          <i class="fa fa-power-off"></i> <span> @if($user->status == 1) Active @else Banned @endif</button>
                      </a>
        <form id="active-form" action="{{ route('admin.active.member', $user->id) }}" method="POST" style="display: none;">
          @csrf
        </form>




                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $user->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this user ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.category.delete', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
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
          <h5 class="modal-title">Add Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="" action="{{ route('AddregisterUser') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center mb-4">Register New Bid Committee Member</h4>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="eg. Moshiur Rahman" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="account_role">Account Role <span class="text-danger">*</span></label>
                <select class="form-control" name="account_role" id="account_role" required>
                  <option value="">Select Account Role</option>
                  <!-- <option value="contractor">Contructor</option> -->
                  <option value="tenderer">Tenderer</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="eg. example@gmail.com" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="phone">Phone <span class="text-danger">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="eg. 01756553048" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="designation">Designation <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control" placeholder="eg. Account Officer" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="organization">Organization <span class="text-danger">*</span></label>
                <input type="text" name="organization" id="organization" class="form-control" placeholder="eg. BDREN" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="city">City <span class="text-danger">*</span></label>
                <input type="text" name="city" id="city" class="form-control" placeholder="eg. Dhaka" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="address">Address <span class="text-danger">*</span></label>
                <input type="text" name="address" id="address" class="form-control" placeholder="eg. Mirpur" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="" required>
              </div>
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image" value="">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add New Member</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  @endsection
