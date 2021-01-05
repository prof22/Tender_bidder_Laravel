@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <div class="col-md-12 mt-5">

      <div class="card">
        <div class="card-body">
          @include('frontend.partials.message')

          <form class="form-signin pt-5" method="POST" action="{{ route('user.criteria.submit') }}">
            @csrf
            <h2 class="form-signin-heading">Evaluation Criteria Form</h2>

            <div class="form-group">
              <label for="criteriaName">Criteria Name</label>
              <input type="text" id="criteriaName" class="form-control" placeholder="Criteria Name"  name="criteria_name" value="{{ old('criteria_name') }}" required autofocus>
            </div>

            <div class="form-group mt-2">
            <label for="criteriaWeight">Criteria Weight</label>
              <input type="text" id="criteriaWeight" class="form-control" placeholder="Criteria Weight"  name="criteria_weight" value="{{ old('criteria_weight') }}" required>
            </div>
        <div class="form-group mt-2">
          <label for="category_id">Category <span class="text-danger">*</span></label>
          <select class="form-control" name="category_id" id="category_id" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group mt-2">
          <label for="contract_id">Contract <span class="text-danger">*</span></label>
          <select class="form-control" name="contract_id" id="contract_id" required>
            <option value="">Select Contract</option>
            @foreach ($tenders as $tender)
              <option value="{{ $tender->id }}">{{ $tender->title }}</option>
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
