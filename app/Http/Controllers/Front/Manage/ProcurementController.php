<?php

namespace App\Http\Controllers\Front\Manage;

use App\Http\Controllers\Controller;
use App\Models\Manage\ProcurementFirstForm;
use App\Models\Manage\ProcurementSecondForm;
use App\Models\Manage\ProcurementThirdForm;
use App\Models\Masters\ProcurementMaster;
use App\Models\Masters\ProcurementService;
use App\Models\Masters\Rcacademymapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Manage\ProcurementServiceForm;

class ProcurementController extends Controller
{
    public function index(Request $request, $temp_id, $centerid = null)
    {
        // dd($centerid);
        try {
            $user_id = Session::get('user')->user_id;
            $rc_id =  Session::get('rc_id')->rc_id;
            // $data_1 = ProcurementFirstForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->first();
            // $data_2 = ProcurementSecondForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->first();

            // $query_3 = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->whereNot('form_type', 2);
            // $title_ids = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('form_type', 1)->where('created_by', Session::get('user')->user_id)->pluck('title_id');
            // $data_3 = $query_3->get();


            // $title_list = ProcurementMaster::whereStatus(true)->where('project_center_id', $centerid)->pluck('title', 'id');
            // // dd($title_list);
            // $title_2_ids = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->whereNot('form_type', 0)->pluck('title_id');

            // $title_list_2 = ProcurementMaster::whereIn('id', $title_2_ids)->where('project_center_id', $centerid)->pluck('title', 'id');
            // $data_4 = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->where('form_type', 2)->get();

            // $fifth_form_title = ProcurementService::whereStatus(true)->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->pluck('title', 'id');

            // $data_5 = ProcurementServiceForm::where('created_by', Session::get('user')->user_id)->where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->get();
            // $centers = Rcacademymapping::where([ ['status', '=', true],['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');

            if (Session::get('role_details')->id == 2) {
                $data_1 = ProcurementFirstForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->first();
                $data_2 = ProcurementSecondForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->first();

                $query_3 = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->whereNot('form_type', 2);
                $title_ids = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('form_type', 1)->where('created_by', Session::get('user')->user_id)->pluck('title_id');
                $data_3 = $query_3->get();

                // $old_query_3 = ProcurementThirdForm::where('project_center_id', $centerid)->where('budget_head', '=', null)->where('created_by', Session::get('user')->user_id)->where('deleted_at', null)->select('specs_finalized','tender_type','estimated_value','specs_finalization_date','floating_tender_date','opening_tender_date','tech_eval_date','final_eval_date','order_placement_date','tender_value','remarks')->first();
                // dd($old_query_3);

                $title_list = ProcurementMaster::whereStatus(true)->where('project_center_id', $centerid)->pluck('title', 'id');
                // dd($title_list);
                $title_2_ids = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->whereNot('form_type', 0)->pluck('title_id');

                $title_list_2 = ProcurementMaster::whereIn('id', $title_2_ids)->where('project_center_id', $centerid)->pluck('title', 'id');
                $data_4 = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->where('form_type', 2)->get();

                $fifth_form_title = ProcurementService::whereStatus(true)->where('project_center_id', $centerid)->where('created_by', Session::get('user')->user_id)->pluck('title', 'id');

                $data_5 = ProcurementServiceForm::where('created_by', Session::get('user')->user_id)->where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->get();
                $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
            } else if (Session::get('role_details')->id == 3) {

                $data_1 = ProcurementFirstForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_for', Session::get('user')->user_id)->first();
                $data_2 = ProcurementSecondForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_for', Session::get('user')->user_id)->first();

                $query_3 = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_for', Session::get('user')->user_id)->whereNot('form_type', 2);
                $title_ids = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('form_type', 1)->where('created_for', Session::get('user')->user_id)->pluck('title_id');
                $data_3 = $query_3->get();


                $title_list = ProcurementMaster::whereStatus(true)->where('created_for', $user_id)->where('project_center_id', $centerid)->pluck('title', 'id');
                // dd($title_list);
                $title_2_ids = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->whereNot('form_type', 0)->pluck('title_id');

                $title_list_2 = ProcurementMaster::whereIn('id', $title_2_ids)->where('project_center_id', $centerid)->pluck('title', 'id');
                $data_4 = ProcurementThirdForm::where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->where('created_for', Session::get('user')->user_id)->where('form_type', 2)->get();

                $fifth_form_title = ProcurementService::whereStatus(true)->where('project_center_id', $centerid)->where('created_for', Session::get('user')->user_id)->pluck('title', 'id');

                $data_5 = ProcurementServiceForm::where('created_for', Session::get('user')->user_id)->where('template_id', decode5t($request->temp_id))->where('project_center_id', $centerid)->get();
                // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
                $centers = Rcacademymapping::where([['status', '=', true],  ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
            }
            return view('front.pages.manage.procurement.index', ['temp_id' => decode5t($request->temp_id), 'data_1' => $data_1, 'data_2' => $data_2, 'data_3' => $data_3, 'data_4' => $data_4, 'data_5' => $data_5, 'title_list' => $title_list, 'title_list_2' => $title_list_2, 'fifth_form_title' => $fifth_form_title, 'centers' => $centers, 'centerid' => $centerid]);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public function store_form_first(Request $request)
    {
        try {
            $user_id = Session::get('user')->user_id;
            $rc_id = Session::get('rc_id')->rc_id;
            if (isset($request->id)) {
                $procurement = ProcurementFirstForm::find($request->id);
                $procurement->updated_by = $user_id;
            } else {
                $procurement = new ProcurementFirstForm();
                // $procurement->created_by = $rc_id;
                // $procurement->created_for = $request->project_center_id;
            }

            $procurement->template_id = $request->template_id;
            $procurement->project_center_id = $request->project_center_id;
            $procurement->rc_id = $rc_id;
            $procurement->se_opening_balance = $request->se_opening_balance;
            $procurement->se_administrative_approval_budget = $request->se_administrative_approval_budget;
            $procurement->se_fund_transfer = $request->se_fund_transfer;
            $procurement->se_total_fund_available = $request->se_total_fund_available;
            $procurement->se_fund_requirement = $request->se_fund_requirement;
            $procurement->sse_opening_balance = $request->sse_opening_balance;
            $procurement->sse_administrative_approval_budget = $request->sse_administrative_approval_budget;
            $procurement->sse_fund_transfer = $request->sse_fund_transfer;
            $procurement->sse_total_fund_available = $request->sse_total_fund_available;
            $procurement->sse_fund_requirement = $request->sse_fund_requirement;
            $procurement->created_by = $rc_id;
            $procurement->created_for = $request->project_center_id;
            if ($procurement->save()) {
                return response()->json(['success' => true, 'message' => 'Records Created.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function store_form_second(Request $request)
    {

        try {
            $user_id = Session::get('user')->user_id;
            $rc_id = Session::get('rc_id')->rc_id;
            if (isset($request->id)) {
                $procurement = ProcurementSecondForm::find($request->id);
                $procurement->updated_by = $user_id;
            } else {
                $procurement = new ProcurementSecondForm();
                $procurement->created_by = $rc_id;
                $procurement->created_for = $request->project_center_id;
            }


            $procurement->template_id = $request->template_id;
            $procurement->project_center_id = $request->project_center_id;
            $procurement->rc_id = $rc_id;
            $procurement->se_ncoe_cost = isset($request->se_ncoe_cost) ? $request->se_ncoe_cost : null;
            $procurement->se_stc_cost = isset($request->se_stc_cost) ? $request->se_stc_cost : null;
            $procurement->se_total_cost = isset($request->se_total_cost) ? $request->se_total_cost : null;
            $procurement->se_amt_recive_from_hq = isset($request->se_amt_recive_from_hq) ? $request->se_amt_recive_from_hq : null;
            $procurement->se_amt_incurred_on_procurement_of_equipment = isset($request->se_amt_incurred_on_procurement_of_equipment) ? $request->se_amt_incurred_on_procurement_of_equipment : null;
            $procurement->se_procurement_under_process_amt = isset($request->se_procurement_under_process_amt) ? $request->se_procurement_under_process_amt : null;
            $procurement->se_utilisation_plan_of_remaining_funds = isset($request->se_utilisation_plan_of_remaining_funds) ? $request->se_utilisation_plan_of_remaining_funds : null;
            $procurement->se_funds_requirement_from_approved_budget = isset($request->se_funds_requirement_from_approved_budget) ? $request->se_funds_requirement_from_approved_budget : null;
            $procurement->se_remarks = isset($request->se_remarks) ? $request->se_remarks : null;
            //sse
            $procurement->sse_ncoe_cost = isset($request->sse_ncoe_cost) ? $request->sse_ncoe_cost : null;
            $procurement->sse_stc_cost = isset($request->sse_stc_cost) ? $request->sse_stc_cost : null;
            $procurement->sse_total_cost = isset($request->sse_total_cost) ? $request->sse_total_cost : null;
            $procurement->sse_amt_recive_from_hq = isset($request->sse_amt_recive_from_hq) ? $request->sse_amt_recive_from_hq : null;
            $procurement->sse_amt_incurred_on_procurement_of_equipment = isset($request->sse_amt_incurred_on_procurement_of_equipment) ? $request->sse_amt_incurred_on_procurement_of_equipment : null;
            $procurement->sse_procurement_under_process_amt = isset($request->sse_procurement_under_process_amt) ? $request->sse_procurement_under_process_amt : null;
            $procurement->sse_utilisation_plan_of_remaining_funds = isset($request->sse_utilisation_plan_of_remaining_funds) ? $request->sse_utilisation_plan_of_remaining_funds : null;
            $procurement->sse_funds_requirement_from_approved_budget = isset($request->sse_funds_requirement_from_approved_budget) ? $request->sse_funds_requirement_from_approved_budget : null;
            $procurement->sse_remarks = isset($request->sse_remarks) ? $request->sse_remarks : null;

            if ($procurement->save()) {
                return response()->json(['success' => true, 'message' => 'Records Created.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function store_form_third(Request $request)
    {

        try {
            // dd($request->all());
            $user_id = Session::get('user')->user_id;
            $rc_id = Session::get('rc_id')->rc_id;
            foreach ($request->pro as $key => $value) {
                if (isset($value['id'])) {
                    $procurement = ProcurementThirdForm::find($value['id']);
                    $procurement->updated_by = $user_id;
                } else {
                    $procurement = new ProcurementThirdForm();
                    $procurement->created_by = $rc_id;
                    $procurement->created_for = $value['project_center_id'];
                }

                $procurement->template_id = $value['template_id'];
                $procurement->project_center_id = $value['project_center_id'];
                $procurement->rc_id = $rc_id;
                $procurement->title_id = isset($value['title_id']) ? $value['title_id'] : null;
                $procurement->specs_finalized = isset($value['specs_finalized']) ? $value['specs_finalized'] : null;
                $procurement->tender_type = isset($value['tender_type']) ? $value['tender_type'] : null;
                $procurement->estimated_value = isset($value['estimated_value']) ? $value['estimated_value'] : null;
                $procurement->specs_finalization_date = isset($value['specs_finalization_date']) ? date('Y-m-d', strtotime($value['specs_finalization_date'])) : null;
                $procurement->floating_tender_date = isset($value['floating_tender_date']) ? date('Y-m-d', strtotime($value['floating_tender_date'])) : null;
                $procurement->opening_tender_date = isset($value['opening_tender_date']) ? date('Y-m-d', strtotime($value['opening_tender_date'])) : null;
                $procurement->tech_eval_date = isset($value['tech_eval_date']) ? date('Y-m-d', strtotime($value['tech_eval_date'])) : null;
                $procurement->final_eval_date = isset($value['final_eval_date']) ? date('Y-m-d', strtotime($value['final_eval_date'])) : null;
                $procurement->order_placement_date = isset($value['order_placement_date']) ? date('Y-m-d', strtotime($value['order_placement_date'])) : null;
                $procurement->tender_value = isset($value['tender_value']) ? $value['tender_value'] : null;
                $procurement->remarks = isset($value['remarks']) ? $value['remarks'] : null;
                $procurement->form_type = isset($value['order_placement_date']) ? 1 : 0;

                $procurement->save();
            }
            return response()->json(['success' => true, 'message' => 'Records Created.']);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function store_form_fourth(Request $request)
    {

        try {
            //dd($request->all());
            $rc_id = Session::get('rc_id')->rc_id;
            // dd($rc_id);
            foreach ($request->pro as $key => $value) {
                // dd($value['title_id_two']);
                $procurement = ProcurementThirdForm::where('template_id', $value['template_id'])->where('title_id', $value['title_id_two'])->where('created_by', $rc_id)->first();
                $procurement->project_center_id = $value['project_center_id'] ? $value['project_center_id'] : null;
                $procurement->budget_head = isset($value['budget_head']) ? $value['budget_head'] : null;
                $procurement->contract_amount = isset($value['contract_amount']) ? $value['contract_amount'] : null;

                $procurement->issue_of_order_date = isset($value['issue_of_order_date']) ? date('Y-m-d', strtotime($value['issue_of_order_date'])) : null;
                $procurement->delivery_date = isset($value['delivery_date']) ? date('Y-m-d', strtotime($value['delivery_date'])) : null;
                $procurement->installation_date = isset($value['installation_date']) ? date('Y-m-d', strtotime($value['installation_date'])) : null;
                $procurement->satisfactory_certificate_receipt_date = isset($value['satisfactory_certificate_receipt_date']) ? date('Y-m-d', strtotime($value['satisfactory_certificate_receipt_date'])) : null;
                $procurement->invoice_receipt_date = isset($value['invoice_receipt_date']) ? date('Y-m-d', strtotime($value['invoice_receipt_date'])) : null;
                $procurement->approval_of_payment_date = isset($value['approval_of_payment_date']) ? date('Y-m-d', strtotime($value['approval_of_payment_date'])) : null;
                $procurement->payment_release_date = isset($value['payment_release_date']) ? date('Y-m-d', strtotime($value['payment_release_date'])) : null;

                $procurement->remarks_2 = isset($value['remarks_2']) ? $value['remarks_2'] : null;
                $procurement->form_type = isset($value['budget_head']) ? 2 : 1;
                $procurement->status = isset($value['budget_head']) ? true : false;
                // $procurement->updated_by = Session::get('user')->user_id;
                $procurement->updated_by = $rc_id;
                // $procurement->created_for = $value['project_center_id'];
                $procurement->save();
            }
            return response()->json(['success' => true, 'message' => 'Records Created.']);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }




    public function store_form_fifth(Request $request)
    {

        try {
            $user_id = Session::get('user')->user_id;
            $rc_id = Session::get('rc_id')->rc_id;
            foreach ($request->pro_services as $key => $value) {
                if (isset($value['id'])) {
                    $procurement = ProcurementServiceForm::find($value['id']);
                    $procurement->updated_by = $user_id;
                } else {
                    $procurement = new ProcurementServiceForm();
                    $procurement->created_by = $rc_id;
                    $procurement->created_for = $value['project_center_id'];
                }

                $procurement->template_id = $value['template_id'];
                $procurement->project_center_id = $value['project_center_id'];
                $procurement->rc_id = $rc_id;
                $procurement->title_id = isset($value['title_id_five']) ? $value['title_id_five'] : null;
                $procurement->expiry_date_of_existing_contract = isset($value['expiry_date_of_existing_contract']) ? date('Y-m-d', strtotime($value['expiry_date_of_existing_contract'])) : null;
                $procurement->value_of_existing_contract = isset($value['value_of_existing_contract']) ? $value['value_of_existing_contract'] : null;
                $procurement->estimated_value_of_new_tender = isset($value['estimated_value_of_new_tender']) ? $value['estimated_value_of_new_tender'] : null;
                $procurement->tender_type = isset($value['tender_type']) ? $value['tender_type'] : null;

                $procurement->floating_tender_date = isset($value['floating_tender_date']) ? date('Y-m-d', strtotime($value['floating_tender_date'])) : null;
                $procurement->opening_tender_date = isset($value['opening_tender_date']) ? date('Y-m-d', strtotime($value['opening_tender_date'])) : null;
                $procurement->tech_eval_date = isset($value['tech_eval_date']) ? date('Y-m-d', strtotime($value['tech_eval_date'])) : null;
                $procurement->final_eval_date = isset($value['final_eval_date']) ? date('Y-m-d', strtotime($value['final_eval_date'])) : null;
                $procurement->award_of_work_date = isset($value['award_of_work_date']) ? date('Y-m-d', strtotime($value['award_of_work_date'])) : null;
                $procurement->remarks = isset($value['remarks']) ? $value['remarks'] : null;
                $procurement->status = isset($value['award_of_work_date']) ? true : false;

                $procurement->save();
            }
            return response()->json(['success' => true, 'message' => 'Records Created.']);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }



    public function procurementFormThirdDeleteById($id)
    {

        try {
            $pro = ProcurementThirdForm::findOrFail($id);

            if ($pro->delete()) {
                $pro->deleted_by = Session::get('user')->user_id;
                $pro->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }


    public function procurementFormFourthDeleteById($id)
    {
        try {

            $procurement = ProcurementThirdForm::findOrFail($id);
            $procurement->budget_head =  null;
            $procurement->contract_amount = null;

            $procurement->issue_of_order_date = null;
            $procurement->delivery_date = null;
            $procurement->installation_date =  null;
            $procurement->satisfactory_certificate_receipt_date = null;
            $procurement->invoice_receipt_date =  null;
            $procurement->approval_of_payment_date =  null;
            $procurement->payment_release_date =  null;

            $procurement->remarks_2 =  null;
            $procurement->form_type = 1;
            $procurement->updated_by = Session::get('user')->user_id;
            if ($procurement->save()) {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function procurementFormFifthDeleteById($id)
    {
        try {
            $pro = ProcurementServiceForm::findOrFail($id);
            //dd($pro);
            if ($pro->delete()) {
                $pro->deleted_by = Session::get('user')->user_id;
                $pro->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function getProcurementServiceDetailsById($id)
    {
        $user_id = 1;
        try {
            $data = ProcurementService::findOrFail($id);            
            $old_data = ProcurementServiceForm::where([['id', '=', $id], ['status', '=', true]])->where('deleted_at', null)->select('id','estimated_value_of_new_tender','tender_type','floating_tender_date','opening_tender_date','tech_eval_date','final_eval_date','final_eval_date','award_of_work_date','remarks')->first();
            // dd($old_data);
            // $work_date = InfraWork::where([['form_type', '=', 1], ['award_status', '=', true,], ['physical_status', '=', false], ['finance_status', '=', false], ['created_for', '=', $user_id], ['infra_id', '=', $data->id]])->select('id', 'date_of_work_award')->first();

            // $form_3_details = InfraWork::where([['form_type', '=', 2], ['award_status', '=', true], ['physical_status', '=', true], ['created_for', '=', $user_id], ['infra_id', '=', $data->id]])->select('id')->first();
            return response()->json(['success' => true, 'message' => 'records found', 'data' => $data, 'old_data' => $old_data]);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage(), 'data' => null]);
        }
    }

    public function changesforthform(Request $request){
        $id = $request->id;
        // dd($id);
        $old_data = ProcurementThirdForm::where('title_id', '=', $id)->where('created_by', Session::get('user')->user_id)->where('deleted_at', null)->select('id','specs_finalized','tender_type','estimated_value','specs_finalization_date','floating_tender_date','opening_tender_date','tech_eval_date','final_eval_date','order_placement_date','tender_value','remarks')->first();
        $old_data_two = ProcurementThirdForm::where('budget_head', '!=', null)->where('title_id', '=', $id)->where('created_by', Session::get('user')->user_id)->where('deleted_at', null)->select('id','budget_head','contract_amount','issue_of_order_date','delivery_date','installation_date','satisfactory_certificate_receipt_date','invoice_receipt_date','approval_of_payment_date','payment_release_date','remarks_2')->first();
        // dd($old_data_two);
        return response()->json(['success' => true, 'message' => 'records found', 'old_data' => $old_data, 'old_data_two' => $old_data_two]);
    }
}
