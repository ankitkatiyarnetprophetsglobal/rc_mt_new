<?php

namespace App\Http\Controllers\Front\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Masters\ProcurementService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Masters\Agency;
use App\Models\Masters\Rcacademymapping;


class ProcurementServiceController extends Controller
{
  public function index()
  {
    try {

      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;
      // $data = ProcurementService::whereCreatedBy($user_id)->get();
      // $data = ProcurementService::with(['centername'])->whereCreatedBy($user_id)->get();
      $data = ProcurementService::with(['centername'])->whereCreatedBy($user_id)->orWhere('created_for', '=', $rc_id)->get();

      if (Session::get('role_details')->id == 2) {

        $data = ProcurementService::with(['centername'])->whereCreatedBy($user_id)->get();
      } else if (Session::get('role_details')->id == 3) {

        $data = ProcurementService::with(['centername'])->wherecreated_for($user_id)->get();
      }


      $centers = Rcacademymapping::whereCreatedBy($user_id)->get();
      return view('front.pages.masters.procurement_service.index', ['data' => $data]);
    } catch (\Exception $ex) {
      // dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function create()
  {
    $user_id = Session::get('user')->user_id;
    $rc_id = Session::get('rc_id')->rc_id;
    try {
      // $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->orWhere('academy_id', '=', $user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.procurement_service.create', ['centers' => $centers]);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
  public function store(Request $request)
  {
    $user_id = Session::get('user')->user_id;
    $rc_id = Session::get('rc_id')->rc_id;
    $validator = Validator::make($request->all(), [
      //"infra.*.project_title"    => "required|unique:infrastructures,project_title",
      // "pro_service.*.title"    => ['required','regex:/^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/', Rule::unique('procurement_services')->where(function ($query) use ($user_id, $request) {
      "pro_service.*.title"    => ['required', Rule::unique('procurement_services')->where(function ($query) use ($user_id, $request) {
        foreach ($request->pro_service as $value) {
          $query->where('title', $value['title'])->where('deleted_at', null);
        }
        return $query;
      })],
      "pro_service.*.expiry_date_of_existing_contract"    => "required",
      "pro_service.*.existing_contract_value"    => "required",
    ], [
      'pro_service.*.title.required' => 'Please Enter Title',
      'pro_service.*.title.unique' => 'Title already exist',
      'pro_service.*.expiry_date_of_existing_contract.required' => 'Please Select Expiry Date',
      'pro_service.*.existing_contract_value.required' => 'Please Select an Amount.',
    ]);
    if ($validator->fails()) {

      return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    }

    try {

      foreach ($request->pro_service as $key => $value) {
        $pro_services = new ProcurementService();

        $pro_services->title = $value['title'];
        $pro_services->project_center_id = $value['project_center'];
        $pro_services->expiry_date_of_existing_contract = date('Y-m-d', strtotime($value['expiry_date_of_existing_contract']));
        $pro_services->existing_contract_value = $value['existing_contract_value'];
        $pro_services->created_by =  $rc_id;
        // $pro_services->created_for = $rc_id;
        $pro_services->created_for = $value['project_center'];
        $pro_services->status = true;
        $pro_services->save();
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
      $pro_service = ProcurementService::findOrFail(decode5t($id));
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');

      return view('front.pages.masters.procurement_service.edit', ['data' => $pro_service, 'agencies' => $agencies, 'centers' => $centers]);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function update(Request $request)
  {
    $user_id = Session::get('user')->user_id;
    $request->validate([
      //"project_title"    => "required|unique:infrastructures,project_title," .$request->id,
      // "title"    => ['required','regex:/^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/', Rule::unique('procurement_services')->where(
      "title"    => ['required', Rule::unique('procurement_services')->where(
        function ($query) use ($user_id, $request) {

          $query->where('title', $request->title)->where('deleted_at', null);
          return $query;
        }
      )->ignore($request->id)],
      "expiry_date_of_existing_contract"    => "required",
      "existing_contract_value"    => "required",

    ]);

    try {
      $pro_service = ProcurementService::findOrFail($request->id);
      $pro_service->title = $request->title;
      $pro_service->expiry_date_of_existing_contract = date('Y-m-d', strtotime($request->expiry_date_of_existing_contract));
      $pro_service->existing_contract_value = $request->existing_contract_value;
      $pro_service->project_center_id = $request->project_center;
      $pro_service->updated_by = $user_id;
      $pro_service->status = $request->status;
      $pro_service->save();
      Session::flash('message', 'Record Updated.');
      return redirect()->route('procurement.service.index');
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
  public function delete($id)
  {
    $user_id = Session::get('user')->user_id;;
    try {
      $pro_service = ProcurementService::findOrFail(decode5t($id));

      if ($pro_service->delete()) {
        $pro_service->deleted_by = $user_id;
        $pro_service->save();
        Session::flash('message', 'Record Deleted.');
        return redirect()->route('procurement.service.index');
      }
      Session::flash('error_message', 'Somthing went wrong, please try again...');
      return redirect()->route('procurement.service.index');
    } catch (\Exception $ex) {
      Session::flash('error_message', 'Somthing went wrong, please try again...');
      return redirect()->route('procurement.service.index');
    }
  }
}
