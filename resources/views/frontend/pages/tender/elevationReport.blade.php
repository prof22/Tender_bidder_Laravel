@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <div class="col-md-12 mt-5">

      <div class="card">
        <div class="card-body">
          @include('frontend.partials.message')

          <form class="form-signin pt-5" method="POST" action="{{ route('user.evaluation.submit') }}">
            @csrf
            <h2 class="form-signin-heading">Evaluation Report</h2>

        <div class="form-group mt-2">
          <label for="evaluation_category">Evaluation Category <span class="text-danger">*</span></label>
          <select class="form-control" name="evaluation_category" id="evaluation_category" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group mt-2">
          <label for="Status">Status <span class="text-danger">*</span></label>
          <select class="form-control" name="status" id="Status" required>
            <option value="">Select Status</option>
              <option value="1">Approved</option>
              <option value="2">Reject</option>
              <option value="3">Ongoing</option>
              <option value="4">Pending</option>
          </select>
        </div>

            <div class="form-group">
              <label for="Decision">Decision</label>
              <textarea 
               class="form-control" placeholder="Decision"  name="decision" 
               >
               </textarea>
            </div>

            <div class="form-group mt-2">
            <label for="evaluationDate">Evaluation Date</label>
              <input type="date" id="evaluationDate" class="form-control" 
              placeholder="Evaluation Date"  name="evaluation_date" value="{{ old('evaluation_date') }}" required>
            </div>

            <div class="form-group mt-2">
          <label for="bid">Bid <span class="text-danger">*</span></label>
          <select class="form-control" name="bid" id="bid" required>
            <option value="">Select Bid</option>
            @foreach ($tenderRequests as $tenderRequest)
              <option value="{{ $tenderRequest->tender->title}}">{{ $tenderRequest->tender->title }}</option>
            @endforeach
          </select>
        </div>

        
        <div class="form-group mt-2">
          <label for="confirm_bid">Confirm Bid <span class="text-danger">*</span></label>
          <select class="form-control" name="confirm_bid" id="confirm_bid" required>
            <option value="">Select Bid</option>
            @foreach ($tenderRequests as $tenderRequest)
              <option value="{{ $tenderRequest->tender_id}}">{{ $tenderRequest->tender->title }}</option>
            @endforeach
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

@endsection
