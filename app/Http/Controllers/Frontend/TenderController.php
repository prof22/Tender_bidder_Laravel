<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Tender;
use App\Models\Category;
use App\Models\Criteriaform;
use App\Models\TenderRequest;
use App\Models\EvaluationReport;
use Session;
use Auth;

class TenderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:web');
  }


  public function index()
  {
    if(Auth::guard('web')->user()->account_role == 'tenderer'){
      $tenders = Tender::where('user_id', Auth::guard('web')->user()->id)->get();
      $categories = Category::orderBy('name', 'ASC')->get();
      return view('frontend.pages.tender.index', compact('tenders', 'categories'));
    }
    elseif(Auth::guard('web')->user()->account_role == 'contractor'){
      $tenders = TenderRequest::where('user_id', Auth::guard('web')->user()->id)->get();
      return view('frontend.pages.tender.requestedTender', compact('tenders'));
    }
  }


  public function create()
  {
    $categories = Category::orderBy('name', 'ASC')->get();
    return view('frontend.pages.tender.create', compact('categories'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'category_id' => 'required',
      'published_on' => 'required',
      'closed_on' => 'required',
      'document_price' => 'required',
      'image' => 'required',
      'security_amount' => 'required',
    ]);

    $tender = new Tender();
    $tender->title = $request->title;
    $tender->category_id = $request->category_id;
    $tender->user_id = Auth::guard('web')->user()->id;
    $tender->published_on = $request->published_on;
    $tender->closed_on = $request->closed_on;
    $tender->document_price = $request->document_price;
    $tender->security_amount = $request->security_amount;
    $tender->slug = StringHelper::createSlug($request->title, 'Tender', 'slug');
    $tender->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/tenders');
    $tender->save();

    session()->flash('success', 'Tender added successfully');
    return redirect()->route('user.tender.index');
  }


  public function edit($slug)
  {
    $tender = Tender::where('slug', $slug)->first();
    return view('frontend.pages.tender.edit');
  }


  public function update(Request $request, $slug)
  {
    $this->validate($request, [
      'title' => 'required',
      'category_id' => 'required',
      'published_on' => 'required',
      'closed_on' => 'required',
      'document_price' => 'required',
      'security_amount' => 'required',
    ]);

    $tender = Tender::where('slug', $slug)->first();
    $tender->title = $request->title;
    $tender->category_id = $request->category_id;
    $tender->published_on = $request->published_on;
    $tender->closed_on = $request->closed_on;
    $tender->document_price = $request->document_price;
    $tender->security_amount = $request->security_amount;
    $tender->slug = StringHelper::createSlug($request->title, 'Tender', 'slug');
    if($request->image != null){
      $tender->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/tenders', $tender->image);
    }
    $tender->save();

    session()->flash('success', 'Tender updated successfully');
    return redirect()->route('user.tender.index');
  }


  public function destroy($slug)
  {
    $tender = Tender::where('slug', $slug)->first();
    if($tender->image){
      ImageUploadHelper::delete('public/images/tenders/'.$tender->image);
    }
    $tender->delete();
    session()->flash('error', 'Tender deleted successfully');
    return redirect()->route('user.tender.index');
  }


  public function tenderApply($slug)
  {
    $tender = Tender::where('slug', $slug)->first();
    $tenderRequests = TenderRequest::where('tender_id', $tender->id)->get();
    $evaluate = EvaluationReport::get();
    return view('frontend.pages.tender.applyTender', compact('tenderRequests','evaluate'));
  }


  public function confirmTender($id)
  {
    $tender = TenderRequest::find($id);
    $tender->approved = 1;
    $tender->save();
    session()->flash('success', 'Confirmed This');
    return back();
  }

  public function confirmTenderReject($id)
  {
    $tender = TenderRequest::find($id);
    $tender->approved = 2;
    $tender->save();
    session()->flash('success', 'Confirmed This');
    return back();
  }

  public function compeletdTender($slug)
  {
    if(Auth::guard('web')->user()->account_role == 'contractor'){
      $tender = Tender::where('slug', $slug)->update(['status' => 1]);
      session()->flash('success', 'Updated successfully');
      return back();
    }
    else{
      session()->flash('error', 'Please login first to request');
      return redirect()->route('user.login');
    }
  }

  public function elevationForm()
  {
    $categories = Category::orderBy('name', 'ASC')->get();
    $tenders = Tender::orderBy('title', 'ASC')->get();
    return view('frontend.pages.tender.elevationForm', compact('categories','tenders'));
  }

  public function criteriasubmit(Request $request)
  {
    $this->validate($request, [
      'category_id' => 'required',
      'criteria_name' => 'required',
      'criteria_weight' => 'required',
    ]);

    $Criteriaform = new Criteriaform();
    $Criteriaform->tender_id = $request->contract_id;
    $Criteriaform->category_id = $request->category_id;
    $Criteriaform->criteria_name = $request->criteria_name;
    $Criteriaform->criteria_weight = $request->criteria_weight;
    $Criteriaform->save();

    session()->flash('success', 'Criteria added successfully');
    return redirect()->route('user.tender.index');
  }

  public function elevationReport()
  {
    $categories = Category::orderBy('name', 'ASC')->get();
    $tenders = Tender::orderBy('title', 'ASC')->get();
    $tenderRequests = TenderRequest::get();
    return view('frontend.pages.tender.elevationReport', compact('categories','tenders','tenderRequests'));
  }
  public function evaluationsubmit(Request $request)
  {
    $this->validate($request, [
      'evaluation_category' => 'required',
      'status' => 'required',
      'decision' => 'required',
      'evaluation_date' => 'required',
      'bid' => 'required',
      
    ]);

    $Evaluationreport = new EvaluationReport();
    $Evaluationreport->category = $request->evaluation_category;
    $Evaluationreport->status = $request->status;
    $Evaluationreport->tender_request_id = $request->confirm_bid;
    $Evaluationreport->decision = $request->decision;
    $Evaluationreport->evaluation_date = $request->evaluation_date;
    $Evaluationreport->bid = $request->bid;
    $Evaluationreport->save();

    session()->flash('success', 'Evaluation report added successfully');
    return redirect()->route('user.tender.index');
  }
}

