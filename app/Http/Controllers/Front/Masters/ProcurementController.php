<?php

namespace App\Http\Controllers\Front\Masters;

use App\Http\Controllers\Controller;
use App\Models\Masters\ProcurementMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Masters\Agency;
use Illuminate\Validation\Rule;
use App\Models\Masters\Rcacademymapping;

class ProcurementController extends Controller
{
  public function index()
  {

    try {

      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;
      // $data = ProcurementMaster::whereCreatedBy($user_id)->get();
      // $data = ProcurementMaster::with(['centername'])->whereCreatedBy($user_id)->get();
      // $data = ProcurementMaster::with(['centername'])->whereCreatedBy($user_id)->orWhere('created_for', '=', $rc_id)->get();

      if (Session::get('role_details')->id == 2) {

        $data = ProcurementMaster::with(['centername'])->whereCreatedBy($user_id)->get();
      } else if (Session::get('role_details')->id == 3) {
        $data = ProcurementMaster::with(['centername'])->wherecreated_for($user_id)->get();
      }

      $centers = Rcacademymapping::whereCreatedBy($user_id)->get();
      return view('front.pages.masters.procurement.index', ['data' => $data, 'centers' => $centers]);
    } catch (\Exception $ex) {
      dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function create()
  {
    try {
      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;
      // $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->orWhere('academy_id', '=', $user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.procurement.create', ['centers' => $centers]);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
  public function store(Request $request)
  {
    //  dd(1);
    $user_id = Session::get('user')->user_id;
    $rc_id = Session::get('rc_id')->rc_id;

    $validator = Validator::make($request->all(), [
      // "procurement.*.title"    => ['required','regex:/^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/', Rule::unique('procurement_master')->where(function ($query) use ($request) {
      "procurement.*.title"    => ['required', Rule::unique('procurement_master')->where(function ($query) use ($request) {
        foreach ($request->procurement as $value) {
          $query->where('title', $value['title'])->where('deleted_at', null);
        }
        return $query;
      })],
      "procurement.*.type"    => "required",


    ], [
      'procurement.*.type.required' => 'Please Select Type.',
      'procurement.*.title.required' => 'Please Enter Title',
      'procurement.*.title.unique' => 'The Project Title Has Already Been Taken.',

    ]);
    if ($validator->fails()) {

      return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    }

    try {

      foreach ($request->procurement as $key => $value) {
        $procurement = new ProcurementMaster();
        $procurement->type = $value['type'];
        $procurement->project_center_id = $value['project_center'];
        $procurement->title = $value['title'];
        $procurement->status = true;
        $procurement->created_by = $rc_id;
        // $procurement->created_for = $rc_id;
        $procurement->created_for = $value['project_center'];
        $procurement->save();
      }
      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {
      dd($ex->getMessage());
      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }

  public function edit($id)
  {
    $user_id = Session::get('user')->user_id;
    try {
      $procurement = ProcurementMaster::findOrFail(decode5t($id));
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.procurement.edit', ['data' => $procurement, 'agencies' => $agencies, 'centers' => $centers]);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function update(Request $request)
  {

    $request->validate([
      "type"    => "required",
      // "title"    => ['required','regex:/^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/', Rule::unique('procurement_master')->where(function ($query) use ($request) {
      "title"    => ['required', Rule::unique('procurement_master')->where(function ($query) use ($request) {

        $query->where('title', $request->title)->where('deleted_at', null);

        return $query;
      })->ignore($request->id)]
    ]);

    try {
      $procurement = ProcurementMaster::findOrFail($request->id);
      $procurement->type = $request->type;
      $procurement->title = $request->title;
      $procurement->project_center_id = $request->project_center;
      $procurement->updated_by = Session::get('user')->user_id;
      $procurement->status = $request->status;
      $procurement->save();
      Session::flash('message', 'Record Updated.');
      return redirect()->route('procurement.index');
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
  public function delete($id)
  {

    $user_id = Session::get('user')->user_id;;
    try {
      $procurement = ProcurementMaster::findOrFail(decode5t($id));
      if ($procurement->delete()) {
        $procurement->deleted_by = $user_id;
        $procurement->save();

        Session::flash('message', 'Record Deleted.');
        return redirect()->route('procurement.index');
      }
      Session::flash('error_message', 'Somthing went wrong, please try again...');
      return redirect()->route('procurement.index');
    } catch (\Exception $ex) {
      Session::flash('error_message', 'Somthing went wrong, please try again...');
      return redirect()->route('procurement.index');
    }
  }
}
