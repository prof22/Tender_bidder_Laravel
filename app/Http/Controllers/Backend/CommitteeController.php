<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notifications\AccountCreateNotification;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Tender;
use App\Models\Category;
use App\Models\TenderRequest;
use App\Models\User;
use Hash;
use Session;
use Auth;


class CommitteeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function managecommittee()
    {
        if(User::where('account_role', 'tenderer')->get()){
            // $tenders = Tender::where('user_id', Auth::guard('web')->user()->id)->get();
            $users = User::where('account_role', 'tenderer')->get();
            $categories = Category::orderBy('name', 'ASC')->get();
            return view('backend.pages.committee.manage', compact('categories', 'users'));
          }
        //   $category = Category::where('slug', $slug)->first();
        //   $id = User::get()->first();
        //   dd($id->id);
        //   dd($tenders = Tender::where('user_id', $id )->get());
        //   dd(User::where('account_role', 'tenderer')->get());
    }

    public function register(Request $request)
    {
      // validate form data
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|unique:users',
        'phone' => 'required|unique:users',
        'city' => 'required',
        'address' => 'required',
        'account_role' => 'required',
        'designation' => 'required',
        'organization' => 'required',
        'password' => 'required',
        'confirm_password' => 'required',
      ]);

      if($request->password == $request->confirm_password){
        $user = new User();
        // insert form data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->account_role = $request->account_role;
        $user->designation = $request->designation;
        $user->organization = $request->organization;
        $user->password = Hash::make($request->password);
        $user->username = StringHelper::createSlug($request->name, 'User', 'username');
        $user->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/users');
        $user->verify_token = Hash::make(str_random(16));
        $user->save();

        $user->notify(new AccountCreateNotification($user));

        session()->flash('success', 'An email is sent to your email. Please verify your email');
        return back();
      }
      else{
        session()->flash('error', 'Confirm password does not match');
        return back();
      }
    }

    public function activate($id)
    {
      $user = User::find($id);
      if($user->status == 1){
        $user->status = 0;
      }else{
        $user->status = 1;
      }
      $user->save();
      return redirect()->back();
    }


    public function update($id, Request $request)
    {
    //   // validate form data
    //   $this->validate($request, [
    //     'name' => 'required',
    //     'email' => 'required|unique:users',
    //     'phone' => 'required|unique:users',
    //     'city' => 'required',
    //     'address' => 'required',
    //     'account_role' => 'required',
    //     'designation' => 'required',
    //     'organization' => 'required',
    //     // 'password' => 'required',
    //     // 'confirm_password' => 'required',
    //   ]);

    //   if($request->password == $request->confirm_password){
        $user = User::find($id);
        // insert form data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->account_role = $request->account_role;
        $user->designation = $request->designation;
        $user->organization = $request->organization;
        // $user->password = Hash::make($request->password);
        $user->username = StringHelper::createSlug($request->name, 'User', 'username');
        if($request->image != null){
            $user->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/users', $users->image);
          }
        $user->verify_token = 1;
        $user->save();

       

        session()->flash('success', 'An email is sent to your email. Please verify your email');
        return back();
    
    }
}
