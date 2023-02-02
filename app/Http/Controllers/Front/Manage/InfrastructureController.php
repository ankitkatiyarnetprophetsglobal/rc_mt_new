<?php

namespace App\Http\Controllers\Front\Manage;

use App\Http\Controllers\Controller;
use App\Models\Masters\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Manage\InfraWork;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use App\Models\Masters\Rcacademymapping;

class InfrastructureController extends Controller
{
    public function index($temp_id, $centerid = null)
    {
        $decode_temp_id = decode5t($temp_id);
        try {
            $user_id = Session::get('user')->user_id;
            $rc_id = Session::get('rc_id')->rc_id;
            if (Session::get('role_details')->id == 2) {

                $getFormTypeOneIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id], ['award_status', '=', true], ['physical_status', '=', true], ['finance_status', '=', true]])->pluck('infra_id');
                $getAwardedFormIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id], ['award_status', '=', true], ['finance_status', '=', false]])->pluck('infra_id');                
                // $getPhysicalFormIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id], ['physical_status', '=', true], ['physical_status', '=', true], ['current_pdc', '<>', null]])->pluck('infra_id');
                // $getPhysicalFormIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id], ['physical_status', '=', true], ['current_pdc', '<>', null]])->pluck('infra_id');
                $getPhysicalFormIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id]])->pluck('infra_id');

                $project = Infrastructure::where([['status', '=', true], ['created_by', '=', $user_id], ['project_center_id', $centerid], ['project_center_id', $centerid]])->whereNotIn('id', $getFormTypeOneIds)->pluck('project_title', 'id');
                
                // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->whereNotIn('id', $getFormTypeOneIds)->pluck('academy_name', 'academy_id');
                // $project_two = Infrastructure::where([['status', '=', true], ['created_by', '=', $user_id]])->whereIn('id', $getAwardedFormIds)->pluck('project_title', 'id');
                $project_two = $project_three = Infrastructure::where([['status', '=', true], ['created_by', '=', $user_id]])->whereIn('id', $getPhysicalFormIds)->pluck('project_title', 'id');
                
                $data_1 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id], ['form_status', '=', 0], ['form_type', '=', 1], ['template_id', $decode_temp_id], ['project_center_id', $centerid]])->get();
                // dd($data_1);
                // $data_2 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id], ['form_status', '=', 0], ['form_type', '=', 2], ['template_id', $decode_temp_id]])->get();
                // $data_2 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id], ['form_status', '=', 0], ['form_type', '=', 2], ['template_id', $decode_temp_id]])->get();
                // dd($decode_temp_id);
                $data_2 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id],['work_start_date', '!=', null], ['template_id', $decode_temp_id],['project_center_id', $centerid]])->get();
                
                 //dd($data_2);
                $data_3 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id], ['finance_status', true], ['template_id', $decode_temp_id],['project_center_id', $centerid]])->get();
                $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');
            } else if (Session::get('role_details')->id == 3) {

                $getFormTypeOneIds =  InfraWork::where([['created_for', '=', $user_id], ['template_id', $decode_temp_id], ['award_status', '=', true], ['physical_status', '=', true], ['finance_status', '=', true]])->pluck('infra_id');
                $getAwardedFormIds =  InfraWork::where([['created_for', '=', $user_id], ['template_id', $decode_temp_id], ['award_status', '=', true], ['finance_status', '=', false]])->pluck('infra_id');                
                // $getPhysicalFormIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id], ['physical_status', '=', true], ['physical_status', '=', true], ['current_pdc', '<>', null]])->pluck('infra_id');
                // $getPhysicalFormIds =  InfraWork::where([['created_by', '=', $user_id], ['template_id', $decode_temp_id], ['physical_status', '=', true], ['current_pdc', '<>', null]])->pluck('infra_id');
                $getPhysicalFormIds =  InfraWork::where([['created_for', '=', $user_id], ['template_id', $decode_temp_id]])->pluck('infra_id');

                $project = Infrastructure::where([['status', '=', true], ['created_for', '=', $user_id], ['project_center_id', $centerid], ['project_center_id', $centerid]])->whereNotIn('id', $getFormTypeOneIds)->pluck('project_title', 'id');
                // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->whereNotIn('id', $getFormTypeOneIds)->pluck('academy_name', 'academy_id');
                // $project_two = Infrastructure::where([['status', '=', true], ['created_by', '=', $user_id]])->whereIn('id', $getAwardedFormIds)->pluck('project_title', 'id');
                $project_two = $project_three = Infrastructure::where([['status', '=', true], ['created_for', '=', $user_id]])->whereIn('id', $getPhysicalFormIds)->pluck('project_title', 'id');
                
                $data_1 = InfraWork::with(['infrastructure'])->where([['created_for', '=', $user_id], ['form_status', '=', 0], ['form_type', '=', 1], ['template_id', $decode_temp_id], ['project_center_id', $centerid]])->get();
                // dd($data_1);
                // $data_2 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id], ['form_status', '=', 0], ['form_type', '=', 2], ['template_id', $decode_temp_id]])->get();
                // $data_2 = InfraWork::with(['infrastructure'])->where([['created_by', '=', $user_id], ['form_status', '=', 0], ['form_type', '=', 2], ['template_id', $decode_temp_id]])->get();
                $data_2 = InfraWork::with(['infrastructure'])->where([['created_for', '=', $user_id],['work_start_date', '!=', null], ['template_id', $decode_temp_id]])->get();
                // dd($data_2);
                $data_3 = InfraWork::with(['infrastructure'])->where([['created_for', '=', $user_id], ['finance_status', true], ['template_id', $decode_temp_id]])->get();

                $centers = Rcacademymapping::where([['status', '=', true],  ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
            }

            return view(
                'front.pages.manage.infrastructure.index',
                [
                    'project' => $project,
                    'centers' => $centers,
                    'data_1' => $data_1,
                    'project_two' => $project_two,
                    'data_2' => $data_2,
                    'project_three' => $project_three,
                    'data_3' => $data_3,
                    'temp_id' => decode5t($temp_id),
                    'centerid' => $centerid,

                ]
            );
        } catch (\Exception $ex) {

            $message = 'Somthing went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }

    public function store(Request $request)
    {

        $user_id = Session::get('user')->user_id;
        $rc_id =  Session::get('rc_id')->rc_id;
        // dd($rc_id);
        // $records_ids = InfraWork::where('template_id', $request->template_id)->where('created_by', $user_id)->where('form_type', 1)->pluck('id');
        // //dd($records_ids);
        // InfraWork::find($records_ids)->each(function ($item, $key) {
        //   $item->delete();
        // });

        foreach ($request->infra_manage as $value) {
            // dd($request->all());
            $validator = Validator::make($value, [

                "infra_id"    => ['required', Rule::unique('infra_works')->where(function ($query) use ($rc_id, $value) {
                    $query->where('template_id', $value['template_id'])->where('created_by', $rc_id)->where('deleted_at', null)->where('deleted_by', null);
                    if (isset($value['id'])) {
                        $query->where('id', '<>', $value['id']);
                    }
                    return $query;
                })],

                "date_of_issue" => 'required',
            ], [
                'infra_id.required' => 'Please Enter Project Title',
                'infra_id.unique' => 'Project Title already exist',
                'date_of_issue.required' => 'Please Select Issue of Tender date.',
            ]);
        }


        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        try {

            if (count($request->infra_manage) > 0) {

                foreach ($request->infra_manage as $value) {
                    // dd($value);
                    $data = [
                        'template_id' => $value['template_id'],
                        'project_center_id' => $value['project_center_id'],
                        'rc_id' => $rc_id,
                        'infra_id' => $value['infra_id'],
                        'discription' => 'test',
                        'date_of_issue' => isset($value['date_of_issue']) ? date('Y-m-d', strtotime($value['date_of_issue'])) : null,
                        'date_of_receipt' => isset($value['date_of_receipt']) ? date('Y-m-d', strtotime($value['date_of_receipt'])) : null,
                        'date_of_tech_bid' => isset($value['date_of_tech_bid']) ? date('Y-m-d', strtotime($value['date_of_tech_bid'])) : null,
                        'date_of_financial_bid' => isset($value['date_of_financial_bid']) ? date('Y-m-d', strtotime($value['date_of_financial_bid'])) : null,
                        'date_of_work_award' => isset($value['date_of_work_award']) ? date('Y-m-d', strtotime($value['date_of_work_award'])) : null,
                        'tender_cost' => $value['tender_cost'],
                        'remarks_1' => $value['remarks_1'],
                        'form_type' => 1,
                        'award_status' => isset($value['date_of_work_award']) ? true : false,
                        'created_by' =>  $rc_id,
                        'updated_by' =>  $rc_id,
                        'created_for' => $value['project_center_id'],
                    ];
                    $insert =  InfraWork::updateOrCreate(['infra_id' => $value['infra_id'], 'template_id' => $value['template_id'], 'created_by' => $rc_id], $data);
                }

                return response()->json(['success' => true, 'message' => 'Records Created.']);
            } else {
                // dd('dd');
                return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
            }
        } catch (\Exception $ex) {
            //   dd($ex->getMessage());
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function store_physical_form(Request $request)
    {
        // dd(12345);
        $user_id = Session::get('user')->user_id;
        $rc_id =  Session::get('rc_id')->rc_id;
        // $records_ids = InfraWork::where('month', date('F', time()))->where('created_by', $user_id)->where('form_type', 2)->pluck('id');
        // InfraWork::find($records_ids)->each(function ($item, $key) {
        //   $item->work_start_date = null;
        //   $item->cpdc_date = null;
        //   $item->epd_25 = null;
        //   $item->epd_50 = null;
        //   $item->epd_75 = null;
        //   $item->progress_percentage = null;
        //   $item->current_pdc = null;
        //   $item->remarks_2 = null;
        //   $item->form_type = 1;
        //   $item->physical_status = false;
        //   $item->save();
        // });

        foreach ($request->infra_manage_two as $value) {

            $validator = Validator::make($value, [
                "work_start_date" => 'required',
            ], [

                'work_start_date.required' => 'Please Select Work Start date.',
            ]);
        }


        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        try {
            // dd($request->infra_manage_two);
            if (count($request->infra_manage_two) > 0) {

                foreach ($request->infra_manage_two as $value) {
                    $data = [

                        'infra_id' => $value['infra_id'],
                        'work_start_date' => isset($value['work_start_date']) ? date('Y-m-d', strtotime($value['work_start_date'])) : null,
                        'cpdc_date' => isset($value['cpdc_date']) ? date('Y-m-d', strtotime($value['cpdc_date'])) : null,
                        'epd_25' => isset($value['epd_25']) ? date('Y-m-d', strtotime($value['epd_25'])) : null,
                        'epd_50' => isset($value['epd_50']) ? date('Y-m-d', strtotime($value['epd_50'])) : null,
                        'epd_75' => isset($value['epd_75']) ? date('Y-m-d', strtotime($value['epd_75'])) : null,
                        'progress_percentage' => isset($value['progress_percentage']) ? $value['progress_percentage'] : null,
                        'current_pdc' => isset($value['current_pdc']) ? $value['current_pdc'] : null,
                        'remarks_2' => isset($value['remarks_2']) ? $value['remarks_2'] : null,
                        'form_type' => 2,
                        'physical_status' => true,
                        'created_by' => $rc_id,
                        'updated_by' => $rc_id,
                        'created_for' => $value['project_center_id'],
                    ];
                    $insert =  InfraWork::updateOrCreate(['id' => $value['id'], 'infra_id' => $value['infra_id'], 'template_id' => $value['template_id'], 'created_by' => $rc_id], $data);
                }

                return response()->json(['success' => true, 'message' => 'Records Created.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function store_financial_form(Request $request)
    {

        // dd($request->infra_manage_three);
        $user_id = Session::get('user')->user_id;
        $rc_id =  Session::get('rc_id')->rc_id;
        // $records_ids = InfraWork::where('template_id', date('F', time()))->where('created_by', $user_id)->where('form_type', 3)->pluck('id');
        // InfraWork::find($records_ids)->each(function ($item, $key) {
        //   $item->fund_release = null;
        //   $item->utilised_fund_percentage = null;
        //   $item->uc_status = null;
        //   $item->form_type = 2;
        //   $item->form_status = false;
        //   $item->save();
        // });

        foreach ($request->infra_manage_three as $value) {

            $validator = Validator::make($value, [
                "fund_release" => 'required',
            ], [
                'fund_release.required' => 'Please Enter Fund Release amount.',
            ]);
        }


        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        try {

            if (count($request->infra_manage_three) > 0) {

                foreach ($request->infra_manage_three as $value) {
                    // echo '<pre>'; print_r($value);
                    $data = [
                        'infra_id' => $value['infra_id'],
                        'fund_release' => isset($value['fund_release']) ? $value['fund_release'] : null,
                        'utilised_fund_percentage' => isset($value['utilised_fund_percentage']) ? $value['utilised_fund_percentage'] : null,
                        'uc_status' => isset($value['uc_status']) ? $value['uc_status'] : null,
                        'form_type' => (isset($value['fund_release']) && isset($value['fund_release'])) ? 3 : 2,
                        'finance_status' => true,
                        'created_by' => $rc_id,
                        'updated_by' => $rc_id,
                        'created_for' => $value['project_center_id'],
                        'form_status' => (isset($value['fund_release']) && isset($value['utilised_fund_percentage']) && isset($value['uc_status'])) ? true : false,
                    ];
                    
                    $insert =  InfraWork::updateOrCreate(['id' => $value['id'], 'infra_id' => $value['infra_id'], 'template_id' => $value['template_id'], 'created_by' => $rc_id], $data);

                }
                // exit;
                return response()->json(['success' => true, 'message' => 'Records Created.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function getInfraDetailsById($id)
    {
        
        
        // if()
        if (Session::get('role_details')->id == 2) {
            $user_id = Session::get('user')->user_id;
        } else if (Session::get('role_details')->id == 3) {
            $user_id =  Session::get('rc_id')->rc_id;
        }else{
            $user_id = Session::get('user')->user_id;
        }
        try {
            $data = Infrastructure::with(['agency'])->findOrFail($id);
            $data_old = InfraWork::with(['infrastructure.agency'])->where([['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->where('deleted_at', null)->select('*')->first();
            // dd($data_old);
           
            // dd($data);
            // $work_date = InfraWork::where([['form_type', '=', 1], ['award_status', '=', true,], ['physical_status', '=', false], ['finance_status', '=', false], ['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->select('id', 'date_of_work_award')->first();
            $work_date = InfraWork::where([['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->select('id', 'date_of_work_award')->orderBy('id','desc')->first();
            $work_date_old = InfraWork::with(['infrastructure.agency'])->where([['work_start_date' , '!=' , ''],['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->where('deleted_at', null)->select('id','infra_id','tender_cost','work_start_date','cpdc_date','epd_25','epd_50','epd_75','progress_percentage','current_pdc','remarks_2')->first();
            
            // if($work_date_old == null){
            //     // dd(1);
            //     $work_date = InfraWork::where([['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->select('id', 'date_of_work_award')->orderBy('id','desc')->first();
            // }else{
            //     $work_date = null;
            // }
            // $form_3_details = InfraWork::where([['form_type', '=', 2], ['award_status', '=', true], ['physical_status', '=', true], ['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->select('id')->first();
            // $form_3_details = InfraWork::where([['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->select('id')->first();
            $form_3_details = InfraWork::where([['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->select('id')->orderBy('id','desc')->first();
            // dd($form_3_details); 
            $form_3_details_old = InfraWork::where([['created_by', '=', $user_id], ['infra_id', '=', $data->id]])->where('deleted_at', null)->select('id','fund_release','utilised_fund_percentage','uc_status')->first();
            // dd($form_3_details_old);
            return response()->json(['success' => true, 'message' => 'records found', 'data' => $data, 'work_date' => $work_date, 'form_3_details' => $form_3_details, 'work_date_old'=> $work_date_old, 'form_3_details_old' => $form_3_details_old, 'data_old' => $data_old]);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage(), 'data' => null]);
        }
    }
    public function getcentersById($id)
    {

        $user_id = Session::get('user')->user_id;
        try {
            // $data = Infrastructure::where([['project_center_id', '=', $id], ['created_by', '=', $user_id]])->get();
            $data =  Infrastructure::where([['project_center_id', '=', $id], ['created_by', '=', $user_id]])->pluck('project_title', 'id');
            // $data = Infrastructure::where([['project_center_id', '=', $id], ['created_by', '=', $user_id]])->select('project_title')->first();
            // dd( $work_date);
            if ($data) {
                $html = '<option value="">Select </option>';
                foreach ($data as $key => $val) {
                    $html .= '<option value="' . $key . '">' . $val . '</option>';
                }
                return response()->json(['success' => true, 'html' => $html]);
            }
            return response()->json(['success' => true, 'message' => 'records found', 'data' => $data]);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage(), 'data' => null]);
        }
    }
    public function deleteById($id)
    {
        $user_id = Session::get('user')->user_id;
        try {
            $infra = InfraWork::findOrFail($id);
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

    public function form2DeleteById($id)
    {

        try {
            $data = InfraWork::findOrFail($id);

            $data->work_start_date = null;
            $data->cpdc_date = null;
            $data->epd_25 = null;
            $data->epd_50 = null;
            $data->epd_75 = null;
            $data->progress_percentage = null;
            $data->current_pdc = null;
            $data->remarks_2 = null;
            $data->form_type = 1;
            $data->physical_status = false;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Records Deleted.']);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    public function form3DeleteById($id)
    {

        try {
            $data = InfraWork::findOrFail($id);

            $data->fund_release = null;
            $data->utilised_fund_percentage = null;
            $data->uc_status = null;
            $data->form_type = 2;
            $data->finance_status = false;
            $data->form_status = false;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Records Deleted.']);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    // public function onchanegcenter(){
    //   dd('onchanegcenter');
    // }
}