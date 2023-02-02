<?php

namespace App\Http\Controllers\Front\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Manage\Pendingdemandsmanage;
use Illuminate\Support\Facades\Session;
use App\Models\Masters\Rcacademymapping;

class PendingdemandsController extends Controller
{
  public function index($temp_id, $centerid = null)
  {

    try {

      $decode_temp_id = decode5t($temp_id);
      $user_id = Session::get('user')->user_id;
      $rc_id =  Session::get('rc_id')->rc_id;
      // $centers = Rcacademymapping::where([ ['status', '=', true],['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
      if (Session::get('role_details')->id == 2) {
        $data1 = Pendingdemandsmanage::with(['pendingdemandsmanage'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
        $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
      } else if (Session::get('role_details')->id == 3) {
        $data1 = Pendingdemandsmanage::with(['pendingdemandsmanage'])->where('project_center_id', $centerid)->where('created_for', $user_id)->where('template_id', $decode_temp_id)->get();
        $centers = Rcacademymapping::where([['status', '=', true],  ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
      }
      return view('front.pages.manage.pendingdemands.index', ['data1' => $data1, 'centers' => $centers, 'centerid' => $centerid, 'temp_id' => decode5t($temp_id)]);
    } catch (\Exception $ex) {
      // dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  // store function status of court cases
  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [

      "pendingdemandsmanages.*.particulars"    => "required|unique:pendingdemandsmanage,particulars",
      "misc_manage.*.last_correspondence_regional"    => "required",

    ], [

      'pendingdemandsmanages.*.particulars.required' => 'Please enter particulars',
      'pendingdemandsmanages.*.particulars.unique' => 'Particulars already exist',
      'pendingdemandsmanages.*.last_correspondence_regional.required' => 'Please select Last Correspondence From Regional Office To Sai Ho',

    ]);

    if ($validator->fails()) {

      return response()->json(['success' => true, 'error_message' => 'Duplicate entry.']);
    }
    $rc_id =  Session::get('rc_id')->rc_id;
    $updated_by = $created_by = $user_id = Session::get('user')->user_id;

    try {

      foreach ($request->pendingdemands as $key => $value) {

        $last_correspondence_regional = isset($value['last_correspondence_regional']) ? date('Y-m-d', strtotime($value['last_correspondence_regional'])) : null;

        if (array_key_exists("id", $value)) {

          if ($value['id'] != '') {

            $Pendingdemandsmanage = Pendingdemandsmanage::findOrFail($value['id']);
            $Pendingdemandsmanage->project_center_id = $value['project_center_id'];
            $Pendingdemandsmanage->rc_id = $rc_id;
            $Pendingdemandsmanage->particulars = $value['particulars'];
            $Pendingdemandsmanage->template_id = $value['template_id'];
            $Pendingdemandsmanage->last_correspondence_regional = $last_correspondence_regional;
            $Pendingdemandsmanage->concerned_division_personnel = $value['concerned_division_personnel'];
            $Pendingdemandsmanage->row_status = $value['row_status'];
            $Pendingdemandsmanage->remarks = $value['remarks'];
            $Pendingdemandsmanage->user_id = $rc_id;
            $Pendingdemandsmanage->updated_by = $updated_by;
            $Pendingdemandsmanage->status = 1;
            $Pendingdemandsmanage->save();
          }
        } else {

          $Pendingdemandsmanage = new Pendingdemandsmanage();
          $Pendingdemandsmanage->project_center_id = $value['project_center_id'];
          $Pendingdemandsmanage->rc_id = $rc_id;
          $Pendingdemandsmanage->particulars = $value['particulars'];
          $Pendingdemandsmanage->template_id = $value['template_id'];
          $Pendingdemandsmanage->last_correspondence_regional = $last_correspondence_regional;
          $Pendingdemandsmanage->concerned_division_personnel = $value['concerned_division_personnel'];
          $Pendingdemandsmanage->row_status = $value['row_status'];
          $Pendingdemandsmanage->remarks = $value['remarks'];
          $Pendingdemandsmanage->user_id = $rc_id;
          $Pendingdemandsmanage->created_by = $rc_id;
          $Pendingdemandsmanage->created_for = $value['project_center_id'];
          $Pendingdemandsmanage->status = 1;
          $Pendingdemandsmanage->save();
        }
      }

      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  // deleted function status of court cases
  public function pendingDeleteById($id)
  {

    $user_id = Session::get('user')->user_id;

    try {

      $infra = Pendingdemandsmanage::findOrFail($id);

      if ($infra->delete()) {

        $infra->deleted_by = $user_id;
        $infra->save();
        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      } else {

        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      }
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
}
