@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      @include('frontend.partials.message')
      <h2> Contract:</h2>

      @foreach ($tenderRequests as $tenderRequest)
        <div class="single-tender pointer">
          <div class="card">
            <div class="card-body">
              <h4 class="float-left">{{ $tenderRequest->user->name }}</h4>
              <h4 class="float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#tender{{ $tenderRequest->id }}"><i class="fa fa-fw fa-chevron-down"></i>Details</h4>
              @if($tenderRequest->approved == 1)
                <a href="{{ route('user.tender.evaluation') }}" class="float-right btn btn-success btn-sm mr-1">Confirmed</a>
              @elseif($tenderRequest->approved == 2)
              <a href="{{ route('user.tender.evaluation') }}" class="float-right btn btn-danger btn-sm mr-1">Rejected</a>
              @elseif($tenderRequest->approved == 0)
              <a href="{{ route('user.tender.evaluation') }}"  class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
              @else
              <a href="{{ route('user.tender.evaluation') }}"  class="float-right btn btn-danger btn-sm mr-1">Reject This</a>
              
              @foreach ($evaluate as $evaluate)
              @if($evaluate->status == 1)
                <a class="float-right btn btn-success btn-sm mr-1">Waiting</a>
                @else
                <a href="{{ route('user.tender.evaluation') }}"  class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
             @endif
             @endforeach
           @endif
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

                  <a href="{{asset('public/doc/'.$tenderRequest->bid_document)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Bid Document</a>
              </div>
            </div>
          </div>
        </div> <!-- end .single-tender -->
      @endforeach

    </div>
  </div> <!-- end .main-content -->

@endsection
