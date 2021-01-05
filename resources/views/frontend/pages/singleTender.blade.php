@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">

      <div class="single-tender-full pointer">
        <div class="card">
          <div class="card-title bg-primary pt-2 pl-2 pb-2 text-white">
            Contract Details
          </div>
          <div class="card-body">
          <img src="{{ asset('public/images/tenders/'.$tender->image) }}" width="50%">
            <p><strong><h4>{{ $tender->title }}</h4></strong></p>
            <p><strong>Contract NO.: </strong> {{ $tender->contract_no }}</p>
            <p><strong>Subject: </strong> {{ $tender->subject }}</p>
            <p><strong>Sender: </strong> {{ $tender->user->name }} </p>
            <p><strong>Expire Date: </strong> {{ $tender->closed_on }} </p>
            <p><strong>Type: </strong> {{ $tender->category->name }} </p>
            <p><strong>Total View: </strong> {{ $tender->visitor }} </p>
            <br>
   
 
    <?php $date = new DateTime(); $result= $date->format('Y-m-d'); ?>
    @if($result == $tender->closed_on )   
   <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-eye"></i> Bid Closed</a>
  @else
  <a href="{{asset('public/doc/'.$tender->bid_document)}}" class="btn btn-primary btn-lg"><i class="fa fa-eye"></i>Download Bid Document</a>
  <br>  <br>  <br>  <br>
            <form class="" action="{{ route('applyForTender', $tender->slug) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                      <label for="doc">Upload Bid Document[PDF/DOCx] <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="doc" id="doc" required>
                    </div>
              <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" cols="80">
                  Any comments here
                </textarea>
              </div>

              <button type="submit" name="button" class="btn btn-success">Bid for Contract</button>
            </form>
    @endif
          </div>
        </div>
      </div> <!-- end .single-tender -->

    </div>
  </div> <!-- end .main-content -->

@endsection
