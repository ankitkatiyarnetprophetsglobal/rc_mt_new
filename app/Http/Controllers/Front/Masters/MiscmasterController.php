<?php

namespace App\Http\Controllers\Front\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Masters\Finance;
use App\Models\Masters\Miscmaster;
use App\Models\Masters\Agency;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\Masters\Rcacademymapping;

class MiscmasterController extends Controller
{
  public function index()
  {
    $user_id = Session::get('user')->user_id;
    $rc_id = Session::get('rc_id')->rc_id;
    // $data = Miscmaster::with(['all_miscmaster'])->whereCreatedBy($user_id)->get();
    // $data = Miscmaster::with(['centername'])->whereCreatedBy($user_id)->get();

    if (Session::get('role_details')->id == 2) {
      // $data = Finance::with(['all_finance'], ['centername'])->whereCreatedBy($user_id)->get();
      $data = Miscmaster::with(['all_miscmaster'], ['centername'])->whereCreatedBy($user_id)->get();
    } else if (Session::get('role_details')->id == 3) {

      // $data = Finance::with(['all_finance'], ['centername'])->wherecreated_for($user_id)->get();
      $data = Miscmaster::with(['all_miscmaster'], ['centername'])->wherecreated_for($user_id)->get();
    }


    // $data = Miscmaster::with(['all_miscmaster'],['centername'])->whereCreatedBy($user_id)->orWhere('created_for', '=', $rc_id)->get();
    $centers = Rcacademymapping::whereCreatedBy($user_id)->get();

    try {

      return view('front.pages.masters.miscmaster.index', ['data' => $data, 'centers' => $centers]);
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
      //$centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.miscmaster.create', ['centers' => $centers]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function store(Request $request)
  {

    try {

      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;

      foreach ($request->miscmaster as $key => $value) {

        $validator = Validator::make($value, [
          "detail_cwp_slp" => ['required', Rule::unique('misc_master')->where(function ($query) use ($user_id, $value) {
            $query->where('detail_cwp_slp', $value['detail_cwp_slp'])->where('deleted_at', null);
            return $query;
          })],
          "court_name" => 'required',
        ],);

        if ($validator->fails()) {

          return response()->json(['error_message' => false, 'message' => $validator->errors()->first()]);
        }

        $Miscmaster = new Miscmaster();
        $Miscmaster->detail_cwp_slp = $value['detail_cwp_slp'];
        $Miscmaster->project_center_id = $value['project_center'];
        $Miscmaster->court_name = $value['court_name'];
        $Miscmaster->court_case = $value['court_case'];
        $Miscmaster->parties_name = $value['parties_name'];
        $Miscmaster->counsel_name = $value['counsel_name'];
        $Miscmaster->user_id = $user_id;
        $Miscmaster->created_by = $user_id;
        // $Miscmaster->created_for = $rc_id;
        $Miscmaster->created_for = $value['project_center'];
        $Miscmaster->status = 1;
        $Miscmaster->save();
      }

      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }

  public function edit($id)
  {
    $user_id = Session::get('user')->user_id;
    try {

      $miscmaster = Miscmaster::with(['all_miscmaster'])->findOrFail(decode5t($id));
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.miscmaster.edit', ['data' => $miscmaster, 'agencies' => $agencies, 'centers' => $centers]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function update(Request $request)
  {
    // dd($request->all());
    $validator = Validator::make($request->all(), [
      "detail_cwp_slp" => [
        'required', Rule::unique('misc_master')->where(function ($query) use ($request) {
          $query->where('detail_cwp_slp', $request->detail_cwp_slp)->where('deleted_at', null);
          return $query;
        })->ignore($request->id)
      ]
    ],);

    if ($validator->fails()) {

      Session::flash('message', 'Record Created.');
      return response()->json(['error_message' => false, 'message' => $validator->errors()->first()]);
    }

    try {

      $updated_by = Session::get('user')->user_id;
      $miscmaster = Miscmaster::findOrFail($request->id);
      $miscmaster->detail_cwp_slp = $request->detail_cwp_slp;
      $miscmaster->project_center_id = $request->project_center;
      $miscmaster->court_name = $request->court_name;
      $miscmaster->court_case = $request->court_case;
      $miscmaster->parties_name = $request->parties_name;
      $miscmaster->counsel_name = $request->counsel_name;
      $miscmaster->updated_by = $updated_by;
      $miscmaster->status = 1;
      $miscmaster->save();
      Session::flash('message', 'Record Updated.');
      return redirect()->route('masters.miscmaster.index');
    } catch (\Exception $ex) {

      $id = encode5t($request->id);
      Session::flash('error_message', 'Duplicate entry');
      return redirect()->route('masters.miscmaster.edit', [$id]);
    }
  }

  public function delete($id)
  {

    try {
      $user_id = Session::get('user')->user_id;
      $Finance = Miscmaster::with(['all_miscmaster'])->findOrFail(decode5t($id));

      if ($Finance->delete()) {
        $Finance->deleted_by = $user_id;
        $Finance->save();
        Session::flash('message', 'Record Deleted.');
        return redirect()->route('masters.miscmaster.index');
      }
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }
}
