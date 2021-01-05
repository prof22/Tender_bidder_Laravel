<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Tender;
use App\Models\Category;
use App\Models\TenderRequest;
use App\Models\EvaluationReport;
use App\Models\User;
use Session;
use Auth;


class TenderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
  {
    $categories = Category::orderBy('name', 'ASC')->get();
    return view('backend.pages.tender.create', compact('categories'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'category_id' => 'required',
      'published_on' => 'required',
      'closed_on' => 'required',
      'document_price' => 'required',
      'security_amount' => 'required',
      'contract_no' => 'required',
      'contract_type' => 'required',
      'recipients' => 'required',
      'subject' => 'required',
      'state' => 'required',
       'message' => 'required',
      'image' => 'required',
    ]);

    $tender = new Tender();
    $tender->title = $request->title;
    $tender->contract_no = $request->contract_no;
    $tender->type = $request->contract_type;
    $tender->recipients = $request->recipients;
    $tender->subject = $request->subject;
    $tender->state = $request->state;
    $tender->message = $request->message;
    $tender->category_id = $request->category_id;
    $tender->user_id = Auth::guard('admin')->user()->id;
    $tender->published_on = $request->published_on;
    $tender->closed_on = $request->closed_on;
    $tender->document_price = $request->document_price;
    $tender->security_amount = $request->security_amount;
    $tender->slug = StringHelper::createSlug($request->title, 'Tender', 'slug');
    $tender->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/tenders', $tender->image);
    if ($request->file('doc')) {
      # code...
       $file = $request->file('doc');
         $destinationPath = 'public/doc/';
         $extension = $request->file('doc')->getClientOriginalExtension(); // getting image extension
         $fileName = rand(11111,99999).'.'.$extension; // renameing image
         $request->file('doc')->move($destinationPath, $fileName);
       $tender->bid_document = $fileName; // upload path
  }
    $tender->save();

    session()->flash('success', 'Contract added successfully');
    return redirect()->route('admin.dashboard');
  }

  public function manage()
  {
    $categories = Category::orderBy('name', 'ASC')->get();
    $tenders = Tender::orderBy('title', 'ASC')->get();
    return view('backend.pages.tender.manage', compact('tenders','categories'));
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
    $tender->contract_no = $request->contract_no;
    $tender->type = $request->contract_type;
    $tender->recipients = $request->recipients;
    $tender->subject = $request->subject;
    $tender->state = $request->state;
    $tender->message = $request->message;
    $tender->category_id = $request->category_id;
    $tender->published_on = $request->published_on;
    $tender->closed_on = $request->closed_on;
    $tender->document_price = $request->document_price;
    $tender->security_amount = $request->security_amount;
    $tender->slug = StringHelper::createSlug($request->title, 'Tender', 'slug');
    if($request->image != null){
      $tender->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/tenders', $tender->image);
    }
    if ($request->file('doc')) {
      # code...
       $file = $request->file('doc');
         $destinationPath = 'public/doc/';
         $extension = $request->file('doc')->getClientOriginalExtension(); // getting image extension
         $fileName = rand(11111,99999).'.'.$extension; // renameing image
         $request->file('doc')->move($destinationPath, $fileName);
       $tender->bid_document = $fileName; // upload path
  }
    $tender->save();

    session()->flash('success', 'Tender updated successfully');
    return redirect()->route('admin.dashboard');
  }


  public function ViewTender($slug)
  {
    $tender = Tender::where('slug', $slug)->first();
    $tenderRequests = TenderRequest::where('tender_id', $tender->id)->get();
    $evaluations = EvaluationReport::get();
    // dd($tender->id);
    return view('backend.pages.tender.applyTender', compact('tenderRequests','evaluations'));
  }

  public function AdminconfirmTender($id)
  {
    // $user = User::find($id);
    // dd($user->id);
    $tender = TenderRequest::find($id);
    $evaluations = EvaluationReport::where('tender_request_id', $tender->tender_id)->get()->first();
    // dd($evaluations->bid);
    $tender->approved = 1;
    if($tender->save())
    {
      $evaluations->status = 1;
      $evaluations->save();

    }
    
    session()->flash('success', 'Confirmed This');
    return back();
  }

  public function AdminconfirmTenderReject($id)
  {
    $tender = TenderRequest::find($id);
    $evaluations = EvaluationReport::where('tender_request_id', $tender->tender_id)->get()->first();
    // dd($evaluations->bid);
    $tender->approved = 2;
    if($tender->save())
    {
      $evaluations->status = 2;
      $evaluations->save();

    }
  }

  public function closebid($id)
  {
    $tender = Tender::find($id);
    $published_on = $tender->published_on;
    $tender->closed_on = $published_on;
    $tender->save();
    session()->flash('success', 'Confirmed This');
    return back();

  }

  public function destroy($id)
  {
    $tender = Tender::find($id);
    // if($tender->image){
    //   ImageUploadHelper::delete('public/images/tenders/'.$tender->image);
    // }
    $tender->delete();
    session()->flash('error', 'Tender deleted successfully');
    return back();
  }
}
