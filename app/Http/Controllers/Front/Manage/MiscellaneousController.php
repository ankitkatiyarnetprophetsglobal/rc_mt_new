<?php

namespace App\Http\Controllers\Front\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Manage\Miscellaneousmanages;
use App\Models\Manage\Miscinfraawardtender;
use App\Models\Manage\Miscretirement;
use App\Models\Masters\Miscmaster;
use Illuminate\Support\Facades\Session;
use App\Models\Masters\Rcacademymapping;

class MiscellaneousController extends Controller
{
  public function index($temp_id, $centerid = null)
  {

    try {

      $decode_temp_id = decode5t($temp_id);
      $user_id = Session::get('user')->user_id;
      $rc_id =  Session::get('rc_id')->rc_id;
      $data1 = Miscellaneousmanages::with(['miscellaneousmanages'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
      $data2 = Miscinfraawardtender::with(['miscinfraawardtender'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
      $data3 = Miscretirement::with(['miscretirement'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
      // $data = Miscmaster::whereStatus(true)->where('project_center_id', $centerid)->where('created_by', $user_id)->pluck('detail_cwp_slp', 'id');
      // dd($data);
      // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
      if (Session::get('role_details')->id == 1) {
        $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
        // dd($centers);
      } else if (Session::get('role_details')->id == 2) {
        $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
        $data = Miscmaster::whereStatus(true)->where('project_center_id', $centerid)->where('created_by', $user_id)->pluck('detail_cwp_slp', 'id');
        $data1 = Miscellaneousmanages::with(['miscellaneousmanages'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
        $data2 = Miscinfraawardtender::with(['miscinfraawardtender'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
        $data3 = Miscretirement::with(['miscretirement'])->where('project_center_id', $centerid)->where('created_by', $user_id)->where('template_id', $decode_temp_id)->get();
        // dd($data);
        // dd($centers);
      } else if (Session::get('role_details')->id == 3) {
        $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
        $data = Miscmaster::whereStatus(true)->where('project_center_id', $centerid)->where('created_for', '=', $user_id)->pluck('detail_cwp_slp', 'id');
        $data1 = Miscellaneousmanages::with(['miscellaneousmanages'])->where('project_center_id', $centerid)->where('created_for', '=', $user_id)->where('template_id', $decode_temp_id)->get();
        $data2 = Miscinfraawardtender::with(['miscinfraawardtender'])->where('project_center_id', $centerid)->where('created_for', '=', $user_id)->where('template_id', $decode_temp_id)->get();
        $data3 = Miscretirement::with(['miscretirement'])->where('project_center_id', $centerid)->where('created_for', '=', $user_id)->where('template_id', $decode_temp_id)->get();
        // dd($data);
        // dd($centers);
      }

      return view('front.pages.manage.miscellaneous.index', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'centers' => $centers, 'centerid' => $centerid, 'temp_id' => decode5t($temp_id)]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  // get data dropdown list for status of court cases
  public function getdatadetailcwpslp(Request $request)
  {
    try {

      $id = $request->id;
      $data = Miscmaster::where([['id', '=', $id], ['status', '=', true]])->select('*')->first();
      $old_data = Miscellaneousmanages::where([['id', '=', $id], ['status', '=', true]])->select('case_ststus','last_date_hearing','last_hearing_status','present_status','next_day_hearing','next_day_hearing_option_date','next_day_hearing_option_text','remarks')->first();
      // dd($old_data);
      return response()->json(['success' => true, 'message' => 'records found','data' => $data,'old_data' => $old_data]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  // store function status of court cases
  public function store(Request $request)
  {
    // dd($request->all());
    // $validator = Validator::make($request->all(),[
    //   "misc_manage.*.detail_cwp_slp"    => "required|unique:miscellaneousmanages,detail_cwp_slp",
    //   "misc_manage.*.court"    => "required",
    // ],[
    //   'misc_manage.*.detail_cwp_slp.required' => 'Please Enter name of the court',
    //   'misc_manage.*.detail_cwp_slp.unique' => 'Name of the court already exist',
    //   'misc_manage.*.court.required' => 'Please Enter Name of court',

    // ]);

    // if($validator->fails()) {

    //   return response()->json(['success' => false, 'message' => $validator->errors()->first()]);

    // }

    $rc_id =  Session::get('rc_id')->rc_id;
    $updated_by = $created_by = $user_id = Session::get('user')->user_id;

    try {

      foreach ($request->misc_manage as $key => $value) {

        $last_date_hearing = isset($value['last_date_hearing']) ? date('Y-m-d', strtotime($value['last_date_hearing'])) : null;
        $next_day_hearing_option_date = isset($value['next_day_hearing_option_date']) ? date('Y-m-d', strtotime($value['next_day_hearing_option_date'])) : null;
        $next_day_hearing_option_text = isset($value['next_day_hearing_option_text']) ? $value['next_day_hearing_option_text'] : null;
        $next_day_hearing = isset($value['next_day_hearing']) ? $value['next_day_hearing'] : null;

        if (array_key_exists("id", $value)) {

          if ($value['id'] != '') {

            $Miscellaneousmanages = Miscellaneousmanages::findOrFail($value['id']);
            $Miscellaneousmanages->project_center_id = $value['project_center_id'];
            $Miscellaneousmanages->rc_id = $rc_id;
            $Miscellaneousmanages->detail_cwp_slp = $value['detail_cwp_slp'];
            $Miscellaneousmanages->template_id = $value['template_id'];
            $Miscellaneousmanages->court = $value['court'];
            $Miscellaneousmanages->court_case = $value['court_case'];
            $Miscellaneousmanages->parties = $value['parties'];
            $Miscellaneousmanages->case_ststus = $value['case_ststus'];
            $Miscellaneousmanages->name_counsel = $value['name_counsel'];
            $Miscellaneousmanages->last_date_hearing = $last_date_hearing;
            $Miscellaneousmanages->last_hearing_status = $value['last_hearing_status'];
            $Miscellaneousmanages->present_status = $value['present_status'];
            $Miscellaneousmanages->next_day_hearing = $next_day_hearing;
            $Miscellaneousmanages->next_day_hearing_option_date = $next_day_hearing_option_date;
            $Miscellaneousmanages->next_day_hearing_option_text = $next_day_hearing_option_text;
            $Miscellaneousmanages->remarks = $value['remarks'];
            $Miscellaneousmanages->user_id = $user_id;
            $Miscellaneousmanages->updated_by = $updated_by;
            $Miscellaneousmanages->status = 1;
            $Miscellaneousmanages->save();
          }
        } else {

          $Miscellaneousmanages = new Miscellaneousmanages();
          $Miscellaneousmanages->project_center_id = $value['project_center_id'];
          $Miscellaneousmanages->rc_id = $rc_id;
          $Miscellaneousmanages->detail_cwp_slp = $value['detail_cwp_slp'];
          $Miscellaneousmanages->template_id = $value['template_id'];
          $Miscellaneousmanages->court = $value['court'];
          $Miscellaneousmanages->court_case = $value['court_case'];
          $Miscellaneousmanages->parties = $value['parties'];
          $Miscellaneousmanages->case_ststus = $value['case_ststus'];
          $Miscellaneousmanages->name_counsel = $value['name_counsel'];
          $Miscellaneousmanages->last_date_hearing = $last_date_hearing;
          $Miscellaneousmanages->last_hearing_status = $value['last_hearing_status'];
          $Miscellaneousmanages->present_status = $value['present_status'];
          $Miscellaneousmanages->next_day_hearing = $next_day_hearing;
          $Miscellaneousmanages->next_day_hearing_option_date = $next_day_hearing_option_date;
          $Miscellaneousmanages->next_day_hearing_option_text = $next_day_hearing_option_text;
          $Miscellaneousmanages->remarks = $value['remarks'];
          $Miscellaneousmanages->user_id = $user_id;
          $Miscellaneousmanages->created_by = $rc_id;
          $Miscellaneousmanages->created_for = $value['project_center_id'];
          $Miscellaneousmanages->status = 1;
          $Miscellaneousmanages->save();
        }
      }

      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  // store function status of court cases
  public function storeformtwo(Request $request)
  {
    // dd($request->all());
    // $validator = Validator::make($request->all(),[
    //     "misc_manage_form_two.*.infraemployee"    => "required|unique:miscellaneousmanages,infraemployee",
    //     // "misc_manage.*.court"    => "required",
    //   ],[
    //     'misc_manage_form_two.*.infraemployee.required' => 'Please Enter name of the court',
    //     'misc_manage_form_two.*.infraemployee.unique' => 'Name of the court already exist',
    //     // 'misc_manage.*.court.required' => 'Please Enter Name of court',
    //   ]);
    //   if($validator->fails()) {
    //     return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    //   }

    $rc_id =  Session::get('rc_id')->rc_id;
    $updated_by = $created_by = $user_id = Session::get('user')->user_id;

    try {


      foreach ($request->misc_manage_form_two as $key => $value) {

        $encashment = isset($value['encashment']) ? date('Y-m-d', strtotime($value['encashment'])) : null;
        $pension = isset($value['pension']) ? date('Y-m-d', strtotime($value['pension'])) : null;
        $gratuity = isset($value['gratuity']) ? date('Y-m-d', strtotime($value['gratuity'])) : null;
        $commutation = isset($value['commutation']) ? date('Y-m-d', strtotime($value['commutation'])) : null;

        if (array_key_exists("id", $value)) {

          if ($value['id'] != '') {

            $Miscinfraawardtender = Miscinfraawardtender::findOrFail($value['id']);
            $Miscinfraawardtender->project_center_id = $value['project_center_id'];
            $Miscinfraawardtender->rc_id = $rc_id;
            $Miscinfraawardtender->infraemployee = $value['infraemployee'];
            $Miscinfraawardtender->template_id = $value['template_id'];
            $Miscinfraawardtender->infradesignation = $value['infradesignation'];
            $Miscinfraawardtender->encashment = $encashment;
            $Miscinfraawardtender->pension = $pension;
            $Miscinfraawardtender->gratuity = $gratuity;
            $Miscinfraawardtender->commutation = $commutation;
            $Miscinfraawardtender->remarks = $value['remarks'];
            $Miscinfraawardtender->user_id = $user_id;
            $Miscinfraawardtender->updated_by = $updated_by;
            $Miscinfraawardtender->status = 1;
            $Miscinfraawardtender->save();
          }
        } else {

          $Miscinfraawardtender = new Miscinfraawardtender();
          $Miscinfraawardtender->project_center_id = $value['project_center_id'];
          $Miscinfraawardtender->rc_id = $rc_id;
          $Miscinfraawardtender->infraemployee = $value['infraemployee'];
          $Miscinfraawardtender->template_id = $value['template_id'];
          $Miscinfraawardtender->infradesignation = $value['infradesignation'];
          $Miscinfraawardtender->encashment = $encashment;
          $Miscinfraawardtender->pension = $pension;
          $Miscinfraawardtender->gratuity = $gratuity;
          $Miscinfraawardtender->commutation = $commutation;
          $Miscinfraawardtender->remarks = $value['remarks'];
          $Miscinfraawardtender->user_id = $user_id;
          $Miscinfraawardtender->created_by = $rc_id;
          $Miscinfraawardtender->created_for =  $value['project_center_id'];
          $Miscinfraawardtender->status = 1;
          $Miscinfraawardtender->save();
        }
      }

      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  // store function retirement details
  public function storeformthree(Request $request)
  {

    // $validator = Validator::make($request->all(),[
    //   "misc_manage.*.detail_cwp_slp"    => "required|unique:miscellaneousmanages,detail_cwp_slp",
    //   "misc_manage.*.court"    => "required",
    // ],[
    //   'misc_manage.*.detail_cwp_slp.required' => 'Please Enter name of the court',
    //   'misc_manage.*.detail_cwp_slp.unique' => 'Name of the court already exist',
    //   'misc_manage.*.court.required' => 'Please Enter Name of court',
    // ]);
    // if($validator->fails()) {
    //   return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    // }
    $rc_id =  Session::get('rc_id')->rc_id;
    $updated_by = $created_by = $user_id = Session::get('user')->user_id;

    try {

      foreach ($request->misc_manage_form_three as $key => $value) {

        $details_date_retirement = isset($value['details_date_retirement']) ? date('Y-m-d', strtotime($value['details_date_retirement'])) : null;
        $starting_date_pension = isset($value['starting_date_pension']) ? date('Y-m-d', strtotime($value['starting_date_pension'])) : null;

        if (array_key_exists("id3", $value)) {

          if ($value['id3'] != '') {
           
            $Miscretirement = Miscretirement::findOrFail($value['id3']);
            $Miscretirement->project_center_id = $value['project_center_id'];
            $Miscretirement->rc_id = $rc_id;
            $Miscretirement->retir_name_employee = $value['retir_name_employee'];
            $Miscretirement->template_id = $value['template_id'];
            $Miscretirement->retir_name_designation = $value['retir_name_designation'];
            $Miscretirement->name_place_posting = $value['name_place_posting'];
            $Miscretirement->details_date_retirement = $details_date_retirement;
            // $Miscretirement->gratuity = $value['details_name_group'];
            $Miscretirement->details_name_group = $value['details_name_group'];
            $Miscretirement->leave_encashment = $value['leave_encashment'];
            $Miscretirement->details_pension = $value['details_pension'];
            $Miscretirement->gratuity = $value['gratuity'];
            $Miscretirement->commutation = $value['commutation'];
            $Miscretirement->starting_date_pension = $starting_date_pension;
            $Miscretirement->remarks = $value['remarks'];
            $Miscretirement->user_id = $user_id;
            $Miscretirement->updated_by = $updated_by;
            $Miscretirement->status = 1;
            $Miscretirement->save();
          }
        } else {
     
          $Miscretirement = new Miscretirement();
          $Miscretirement->project_center_id = $value['project_center_id'];
          $Miscretirement->rc_id = $rc_id;
          $Miscretirement->retir_name_employee = $value['retir_name_employee'];
          $Miscretirement->template_id = $value['template_id'];
          $Miscretirement->retir_name_designation = $value['retir_name_designation'];
          $Miscretirement->name_place_posting = $value['name_place_posting'];
          $Miscretirement->details_date_retirement = $details_date_retirement;
          // $Miscretirement->gratuity = $value['details_name_group'];
          $Miscretirement->details_name_group = $value['details_name_group'];
          $Miscretirement->leave_encashment = $value['leave_encashment'];
          $Miscretirement->details_pension = $value['details_pension'];
          $Miscretirement->gratuity = $value['gratuity'];
          $Miscretirement->commutation = $value['commutation'];
          $Miscretirement->starting_date_pension = $starting_date_pension;
          $Miscretirement->remarks = $value['remarks'];
          $Miscretirement->user_id = $user_id;
          $Miscretirement->created_by = $rc_id;
          $Miscretirement->created_for =  $value['project_center_id'];;
          $Miscretirement->status = 1;
          // dd($Miscretirement);
          $Miscretirement->save();
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
  public function courtcasesdeletebyid($id)
  {

    $user_id = Session::get('user')->user_id;

    try {

      $infra = Miscellaneousmanages::findOrFail($id);

      if ($infra->delete()) {

        $infra->deleted_by = $user_id;
        $infra->save();
        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      } else {

        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      }
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'message' => $ex->getMessage()]);
    }
  }

  // deleted function status of infra work upto award of tender
  public function formtworowdeleteById($id)
  {

    $user_id = Session::get('user')->user_id;

    try {

      $infra = Miscinfraawardtender::findOrFail($id);

      if ($infra->delete()) {

        $infra->deleted_by = $user_id;
        $infra->save();
        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      } else {

        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      }
    } catch (\Exception $ex) {
      return response()->json(['success' => false, 'message' => $ex->getMessage()]);
    }
  }

  // deleted function retirement details
  public function retirementdeleteById($id)
  {

    $user_id = Session::get('user')->user_id;

    try {

      $miscretirement = Miscretirement::findOrFail($id);

      if ($miscretirement->delete()) {
        $miscretirement->deleted_by = $user_id;
        $miscretirement->save();
        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      } else {

        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
      }
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'message' => $ex->getMessage()]);
    }
  }
}
