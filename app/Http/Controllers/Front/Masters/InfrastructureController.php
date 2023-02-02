<?php

namespace App\Http\Controllers\Front\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Masters\Infrastructure;
use App\Models\Masters\Agency;
use App\Models\Masters\Rcacademymapping;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class InfrastructureController extends Controller
{
  public function index()
  {

    try {
      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;


      if (Session::get('role_details')->id == 2) {

        // $project = Infrastructure::where([['status', '=', true], ['project_center_id', $centerid]])->orWhere('', '=', $rc_id)->Where('created_by', '=', $rc_id)->whereNotIn('id', $getFormTypeOneIds)->pluck('project_title', 'id');
        $data = Infrastructure::with(['agency'], ['centername'])->whereCreatedBy($user_id)->orWhere('created_for', '=', $rc_id)->get();
      } else if (Session::get('role_details')->id == 3) {

        $data = Infrastructure::with(['agency'], ['centername'])->wherecreated_for($user_id)->get();
      }


      $centers = Rcacademymapping::whereCreatedBy($user_id)->get();
      return view('front.pages.masters.infrastructure.index', ['data' => $data, 'centers' => $centers]);
    } catch (\Exception $ex) {
      dd($ex->getMessage());
      $message = 'So0mthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function create()
  {
    try {
      $user_id = Session::get('user')->user_id;
      $rc_id = Session::get('rc_id')->rc_id;
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->orWhere('academy_id', '=', $user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.infrastructure.create', ['agencies' => $agencies, 'centers' => $centers]);
    } catch (\Exception $ex) {
      // dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
  public function store(Request $request)
  {
    $user_id = Session::get('user')->user_id;
    $rc_id = Session::get('rc_id')->rc_id;
    // dd($rc_id);
    $validator = Validator::make($request->all(), [
      //"infra.*.project_title"    => "required|unique:infrastructures,project_title",
      // "infra.*.project_title"    => ['required','regex:/^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/', Rule::unique('infrastructures')->where(function ($query) use ($request) {
      "infra.*.project_title"    => ['required', Rule::unique('infrastructures')->where(function ($query) use ($request) {
        foreach ($request->infra as $value) {
          $query->where('project_title', $value['project_title'])->where('deleted_at', null);
        }
        return $query;
      })],
      // "infra.*.cost"    => "required",
      // "infra.*.date"    => "required",
      "infra.*.agency"    => "required"
    ], [
      'infra.*.project_title.required' => 'Please Enter Project Title',
      'infra.*.project_title.unique' => 'The Project Title Has Already Been Taken.',
      // 'infra.*.cost.required' => 'Please Enter Cost',
      // 'infra.*.date.required' => 'Please Enter Date',
      'infra.*.agency.required' => 'Please Enter Agency'
    ]);
    if ($validator->fails()) {

      return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    }

    try {

      foreach ($request->infra as $key => $value) {

        $infrastructure = new Infrastructure();
        $infrastructure->project_center_id = $value['project_center'];
        $infrastructure->project_title = $value['project_title'];
        $infrastructure->cost = $value['cost'];
        if ($value['date'] == null) {
          $infrastructure->date = null;
        } else {
          $infrastructure->date = date('Y-m-d', strtotime($value['date']));
        }

        $infrastructure->agency_id = $value['agency'];

        $infrastructure->created_by = $rc_id;
        $infrastructure->created_for = $value['project_center'];

        $infrastructure->status = true;
        $infrastructure->save();
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
    $rc_id = Session::get('rc_id')->rc_id;
    try {
      $infrastructure = Infrastructure::with(['agency'])->findOrFail(decode5t($id));
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      // $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->pluck('academy_name', 'academy_id');
      $centers = Rcacademymapping::whereStatus(true)->whereCreatedBy($user_id)->orWhere('academy_id', '=', $user_id)->pluck('academy_name', 'academy_id');
      return view('front.pages.masters.infrastructure.edit', ['data' => $infrastructure, 'agencies' => $agencies, 'centers' => $centers]);
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function update(Request $request)
  {
    $user_id = Session::get('user')->user_id;
    $request->validate([
      //"project_title"    => "regex:^(?![0-9]*$)[a-zA-Z0-9]+$",
      // "project_title"    => ['required','regex:/^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/', Rule::unique('infrastructures')->where(function ($query) use ($request) {
      "project_title"    => ['required', Rule::unique('infrastructures')->where(
        function ($query) use ($request) {

          $query->where('project_title', $request->project_title)->where('deleted_at', null);
          return $query;
        }
      )->ignore($request->id)],
      // "cost"    => "required",
      // "date"    => "required",
      "agency"    => "required"
    ]);

    try {
      // dd($request->date);
      $infrastructure = Infrastructure::findOrFail($request->id);
      $infrastructure->project_title = $request->project_title;
      $infrastructure->cost = $request->cost;
      // $infrastructure->date = date('Y-m-d',strtotime($request->date));
      if ($request->date == null) {
        $infrastructure->date = null;
      } else {
        $infrastructure->date = date('Y-m-d', strtotime($request->date));
      }
      $infrastructure->project_center_id = $request->project_center;
      $infrastructure->agency_id = $request->agency;
      $infrastructure->updated_by = $user_id;
      $infrastructure->status = $request->status;
      $infrastructure->save();
      Session::flash('message', 'Record Updated.');
      return redirect()->route('infrastructure.index');
    } catch (\Exception $ex) {
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }
  public function delete($id)
  {
    $user_id = Session::get('user')->user_id;;
    try {
      $infrastructure = Infrastructure::with(['agency'])->findOrFail(decode5t($id));
      if ($infrastructure->delete()) {
        $infrastructure->deleted_by = $user_id;
        $infrastructure->save();

        Session::flash('message', 'Record Deleted.');
        return redirect()->route('infrastructure.index');
      }
      Session::flash('error_message', 'Somthing went wrong, please try again...');
      return redirect()->route('infrastructure.index');
    } catch (\Exception $ex) {
      Session::flash('error_message', 'Somthing went wrong, please try again...');
      return redirect()->route('infrastructure.index');
    }
  }
}
