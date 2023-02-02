<?php

namespace App\Http\Controllers\Front\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Manage\Financemanages;
use App\Models\Masters\Finance;
use App\Models\Masters\Agency;
use App\Models\Masters\Rcacademymapping;
use Illuminate\Support\Facades\Session;

class ManagefinanceController extends Controller
{
  public function index($temp_id, $centerid = null)
  {
    try {

      $decode_temp_id = decode5t($temp_id);
      $user_id = Session::get('user')->user_id;
      // dd($user_id);
      $rc_id =  Session::get('rc_id')->rc_id;
      // dd($rc_id);
      if (Session::get('role_details')->id == 2) {

        $data1 = Financemanages::with(['finance'])->where('created_by', $user_id)->where('project_center_id', $centerid)->where('template_id', $decode_temp_id)->get();
        $data = Finance::where([['status', '=', true], ['created_by', '=', $user_id], ['project_center_id', $centerid]])->pluck('scheme_name', 'id');
        $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
      } else if (Session::get('role_details')->id == 3) {

        $data1 = Financemanages::with(['finance'])->where('created_for', $user_id)->where('project_center_id', $centerid)->where('template_id', $decode_temp_id)->get();
        $data = Finance::where([['status', '=', true], ['created_for', '=', $user_id]])->pluck('scheme_name', 'id');
        // dd($data);
        $centers = Rcacademymapping::where([['status', '=', true],  ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
      }


      return view('front.pages.manage.finance.index', ['data' => $data, 'data1' => $data1, 'centers' => $centers, 'centerid' => $centerid, 'temp_id' => decode5t($temp_id)]);
    } catch (\Exception $ex) {

      dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function store(Request $request)
  {

    // dd($request->all());

    $validator = Validator::make($request->all(), [

      "managefinance.*.project_title"    => "required|unique:infrastructures,project_title",
      "managefinance.*.template_id"    => "required",
      "managefinance.*.budgetcode"    => "required",

    ], [

      'managefinance.*.project_title.required' => 'Please Enter Project Title',
      'managefinance.*.project_title.unique' => 'Project Title already exist',
      'managefinance.*.budgetcode.required' => 'Please Enter Budget Code',

    ]);

    if ($validator->fails()) {

      return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
    }

    // $created_by = $updated_by = Session::get('user')->user_id;
    $rc_id =  Session::get('rc_id')->rc_id;
    $created_by = $updated_by = Session::get('rc_id')->rc_id;
    $rc_id = Session::get('rc_id')->rc_id;
    // dd($request->all());
    try {

      foreach ($request->managefinance as $key => $value) {

        if (array_key_exists("id", $value)) {

          if ($value['id'] != '') {

            $Financemanage = Financemanages::findOrFail($value['id']);
            $Financemanage->project_center_id = $value['project_center_id'];
            $Financemanage->finance_id = $value['project_title'];
            $Financemanage->template_id = $value['template_id'];
            $Financemanage->rc_id = $rc_id;
            $Financemanage->budget_code = $value['budgetcode'];
            $Financemanage->be_re = $value['bere'];
            $Financemanage->opening_balance = $value['openingbalance'];
            $Financemanage->fund_received = $value['fundsreceived'];
            $Financemanage->total_funds = $value['totalfundsavailable'];
            $Financemanage->expenditure_incurred = $value['expenditureincurred'];
            $Financemanage->commited_liabilities = $value['committedliabilities'];
            $Financemanage->balance = $value['balance'];
            $Financemanage->remark = $value['remarks'];
            $Financemanage->updated_by = $updated_by;
            $Financemanage->status = 1;
            $Financemanage->save();
          }
        } else {

          $Financemanage = new Financemanages();
          $Financemanage->finance_id = $value['project_title'];
          $Financemanage->project_center_id = $value['project_center_id'];
          $Financemanage->template_id = $value['template_id'];
          $Financemanage->rc_id = $rc_id;
          $Financemanage->budget_code = $value['budgetcode'];
          $Financemanage->be_re = $value['bere'];
          $Financemanage->opening_balance = $value['openingbalance'];
          $Financemanage->fund_received = $value['fundsreceived'];
          $Financemanage->total_funds = $value['totalfundsavailable'];
          $Financemanage->expenditure_incurred = $value['expenditureincurred'];
          $Financemanage->commited_liabilities = $value['committedliabilities'];
          $Financemanage->balance = $value['balance'];
          $Financemanage->remark = $value['remarks'];
          $Financemanage->status = 1;
          $Financemanage->created_by = $created_by;
          $Financemanage->created_for =  $value['project_center_id'];
          $Financemanage->save();
        }
      }

      Session::flash('message', 'Record Created.');
      return response()->json(['success' => true, 'message' => 'Data added successfully!']);
    } catch (\Exception $ex) {
      dd($ex->getMessage());
      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function edit($id)
  {

    try {

      $Finance = Financemanages::with(['all_finance'])->findOrFail(decode5t($id));
      $agencies = Agency::whereStatus(true)->pluck('name', 'id');
      return view('front.pages.masters.finance.edit', ['data' => $Finance, 'agencies' => $agencies]);
    } catch (\Exception $ex) {

      $message = 'Somthing went wrong, Please try again...';
      return view('404_page', ['message' => $message, 'error_code' => 400]);
    }
  }

  public function update(Request $request)
  {

    $validator = $request->validate([
      "project_title"    => "required|unique:infrastructures,project_title," . $request->id,
      "cost"    => "required",
    ]);

    try {
      $Finance = Financemanages::findOrFail($request->id);
      $Finance->scheme_name = $request->project_title;
      $Finance->budget_code = $request->cost;
      $Finance->created_by = 1;
      $Finance->status = 1;
      $Finance->save();
      Session::flash('message', 'Record Updated.');
      return redirect()->route('finance.index');
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }

  public function delete($id)
  {

    try {

      $Finance = Financemanages::with(['all_finance'])->findOrFail(decode5t($id));
      $Finance->delete();
      Session::flash('message', 'Record Deleted.');

      return redirect()->route('finance.index');
    } catch (\Exception $ex) {

      return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
    }
  }

  public function getbudgetcode(Request $request)
  {

    $id = $request->id;

    $data = Finance::where([['id', '=', $id], ['status', '=', true]])->select('budget_cost')->first();
    $old_data = Financemanages::where([['id', '=', $id], ['status', '=', true]])->where('deleted_at', null)->select('be_re','opening_balance','fund_received','total_funds','expenditure_incurred','commited_liabilities','balance','remark')->first();
    // dd($old_data);
    return response()->json(['success' => true, 'message' => 'records found', 'data' => $data,'old_data' => $old_data,]);
    
  }

  public function DeleteById($id)
  {
    $user_id = Session::get('user')->user_id;;
    try {

      $infra = Financemanages::findOrFail($id);

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
}
