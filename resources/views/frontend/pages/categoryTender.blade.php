@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      @include('frontend.partials.message')
      <h2> Contracts:</h2>

      @foreach ($categoryTenders as $categoryTender)
        <div class="single-tender pointer">
          <p class="text-info float-left">
            Published On : {{ $categoryTender->created_at->toFormattedDateString() }}
          </p>
          <p class="float-right">
            <i class="fa fa-user"></i> Visitor: {{ $categoryTender->visitor }}
          </p>
          <div class="clearfix"></div>
          <p class="mt-2"><a href="{{ route('singleTender', $categoryTender->slug) }}"><h4>{{ $categoryTender->title }}</h4></a></p>
          <div class="float-right">
            <a href="" class="btn btn-outline-secondary">Document Price: <span class="price">N{{ $categoryTender->document_price }} </span></a>
            <a href="" class="ml-2 btn btn-outline-info">Security Amount: <span class="price">N{{ $categoryTender->security_amount }}</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="float-left">
            <p><i class="fa fa-location"></i> {{ $categoryTender->user->city }}</p>
            <p><strong>Opening Date: </strong> {{ $categoryTender->published_on }}</p>
            <p><strong>Submitting Date: </strong> {{ $categoryTender->closed_on }}</p>
          </div>
          <a href="{{ asset('public/images/tenders/'.$categoryTender->image) }}" target="_blank" class="btn btn-sm btn-primary float-right mt-3 mr-1"><i class="fa fa-fw fa-eye"></i>View Image</a>
          <div class="clearfix"></div>
        </div> <!-- end .single-tender -->
      @endforeach

    </div>
  </div> <!-- end .main-content -->

@endsection
