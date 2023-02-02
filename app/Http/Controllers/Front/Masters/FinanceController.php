<?php

namespace App\Http\Controllers\Front\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Masters\Finance;
use App\Models\Masters\Agency;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\Masters\Rcacademymapping;

class FinanceController extends Controller
{
  public function index()
  {

    $user_id = Session::get('user')->user_id;
    $rc_id = Session::get('rc_id')->rc_id;
    // dd($rc_id);
    // $data = Finance::with(['all_finance'])->whereCreatedBy($user_id)->get();
    // $data = Finance::with(['centername'])->whereCreatedBy($user_id)->get();
    // $data = Finance::with(['all_finance'], ['centername'])->whereCreatedBy($user_id)->orWhere('created_for', '=', $rc_id)->get();

    if (Session::get('role_details')->id == 2) {
      $data = Finance::with(['all_finance'], ['centername'])->whereCreatedBy($user_id)->get();
    } else if (Session::get('role_details')->id == 3) {

      $data = Finance::with(['all_finance'], ['centername'])->wherecreated_for($user_id)->get();
    }
    $centers = Rcacademymapping::whereCreatedBy($user_id)->get();

    try {
      return view('front.pages.masters.finance.index', ['data' => $data, 'centers' => $centers]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function create()
  {
    try {
      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->orWhere('academy_id', '=', $user_id)->pluck('academy_name', 'academy_id');
      // $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.finance.create', ['centers' => $centers]);
    } catch (\Exception $ex) {
      dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function store(Request $request)
  {
    // dd(Session::get('user')->user_id);
    // dd($request->all());
    try {

      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;

      foreach ($request->finance as $key => $value) {

        $validator = Validator::make($value, [
          "scheme_name" => ['required', Rule::unique('finances')->where(function ($query) use ($user_id, $value) {
            $query->where('scheme_name', $value['scheme_name'])->where('project_center_id', $value['project_center'])->where('deleted_at', null);
            return $query;
          })],
          "budget_cost" => 'required',
        ],);

        if ($validator->fails()) {

          Session::flash('message', 'Record Created.');
          return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $Finance = new Finance();
        $Finance->project_center_id = $value['project_center'];
        $Finance->scheme_name = $value['scheme_name'];
        $Finance->budget_cost = $value['budget_cost'];
        $Finance->created_by = $rc_id;
        // $Finance->created_for = $user_id;
        $Finance->created_for = $value['project_center'];
        $Finance->status = true;
        $Finance->save();
      }

      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {
      // dd($ex->getMessage());
      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }

  public function edit($id)
  {
    $user_id = Session::get('user')->user_id;
    try {

      $Finance = Finance::with(['all_finance'])->findOrFail(decode5t($id));
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      // $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'id');
      return view('front.pages.masters.finance.edit', ['data' => $Finance, 'agencies' => $agencies, 'centers' => $centers]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function update(Request $request)
  {
    // dd($request->all());
    $validator = Validator::make($request->all(), [
      "scheme_name" => [
        'required', Rule::unique('finances')->where(function ($query) use ($request) {
          $query->where('scheme_name', $request->scheme_name)->where('deleted_at', null);
          return $query;
        })->ignore($request->id)
      ]
    ],);


    if ($validator->fails()) {

      Session::flash('message', 'Record Created.');
      return response()->json(['error_message' => false, 'message' => $validator->errors()->first()]);
    }

    try {

      $created_for = $updated_by = $created_by = $user_id = Session::get('user')->user_id;
      $Finance = Finance::findOrFail($request->id);

      $Finance->scheme_name = $request->scheme_name;
      $Finance->budget_cost = $request->budget_cost;
      $Finance->project_center_id = $request->project_center;
      $Finance->created_by = $created_by;
      $Finance->created_for = $created_for;
      $Finance->updated_by = $updated_by;
      $Finance->status = 1;
      $Finance->save();
      Session::flash('message', 'Record Updated.');
      return redirect()->route('finance.index');
    } catch (\Exception $ex) {

      Session::flash('error_message', 'Duplicate entry');
      return view('front.pages.masters.finance.edit', ['data' => $Finance]);
    }
  }

  public function delete($id)
  {

    try {
      $user_id = Session::get('user')->user_id;
      $Finance = Finance::with(['all_finance'])->findOrFail(decode5t($id));

      if ($Finance->delete()) {
        $Finance->deleted_by = $user_id;
        $Finance->save();
        Session::flash('message', 'Record Deleted.');
        return redirect()->route('finance.index');
      }
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }
}
