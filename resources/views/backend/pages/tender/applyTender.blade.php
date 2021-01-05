@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Contract</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  
  
  <div class="main-contents mt-2">
    <div class="latest-tenders">
      @include('frontend.partials.message')
      <h2> Contracts:</h2>

      @foreach ($tenderRequests as $tenderRequest)
        <div class="single-tender pointer">
          <div class="card">
            <div class="card-body">
              <h4 class="float-left">{{ $tenderRequest->user->name }}</h4>
              <h4 class="float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#tender{{ $tenderRequest->id }}"><i class="fa fa-fw fa-chevron-down"></i>Details</h4>
              <!-- @if($tenderRequest->approved == 1)
                <a class="float-right btn btn-success btn-sm mr-1">Committee Confirmed</a>
              @elseif($tenderRequest->approved == 2)
              <a class="float-right btn btn-danger btn-sm mr-1">Committee Rejected</a>
              @else -->
              <!-- <a href="{{ route('admin.confirmTenderReject.tenderRequest', $tenderRequest->id) }}" class="float-right btn btn-danger btn-sm mr-1">Reject This</a>
                <a href="{{ route('admin.confirm.tenderRequest', $tenderRequest->id) }}" class="float-right btn btn-success btn-sm mr-1">Confirm This</a> -->
           <!-- @endif -->
              <div class="clearfix"></div>
              <div class="collapse multi-collapse"  id="tender{{ $tenderRequest->id }}">
              <h4><strong>Contract NO.: </strong> {{ $tenderRequest->tender->contract_no }}</h4>
              <h4><strong>Contract Name.: </strong> {{ $tenderRequest->tender->title }}</h4>
              <h4><strong>Bidder Name: </strong> {{ $tenderRequest->user->name }}</h4>
                <h4><strong>Designation: </strong> {{ $tenderRequest->user->designation }}</h4>
                <h4><strong>Organization: </strong>{{ $tenderRequest->user->organization }}</h4>
                <h4><strong>Location: </strong>{{ $tenderRequest->user->city }}</h4>
                <h4><strong>Contact Number: </strong>{{ $tenderRequest->user->phone }}</h4>
                <h4><strong>Message: </strong> <br>
                  {{ $tenderRequest->message}}</h4>
                  <br>
                  <a href="{{asset('public/doc/'.$tenderRequest->bid_document)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Bid Document</a>
              
        <br><hr>
        @foreach ($evaluations as $evaluation)
              <h2><strong>Bid Committee Report</strong></h2>
                <h4><strong>Organization: </strong>{{ $evaluation->category }}</h4>
                <h4><strong>Contract Name.: </strong>{{ $evaluation->bid }}</h4>
                <h4><strong>Status: </strong>
                @if($evaluation->status == 1)
                Approved
                @elseif($evaluation->status == 2)
                Rejected
                @elseif($evaluation->status == 3)
                Ongoing
                @elseif($evaluation->status == 4)
                Pending
                @else
                Pending
                @endif
                </h4>
                <h4><strong>Reasons(Decision): </strong> <br>
                  {{ $evaluation->decision}}</h4>
     @endforeach

                  <br><hr>
                  </div>
              <a href="{{ route('admin.confirmTenderReject.tenderRequest', $tenderRequest->id) }}" class="float-right btn btn-danger btn-sm mr-1">Reject This</a>
                <a href="{{ route('admin.confirm.tenderRequest', $tenderRequest->id) }}" class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
            </div>
          </div>
        </div> <!-- end .single-tender -->
      @endforeach

    </div>
  </div> <!-- end .main-content -->

  @endsection
