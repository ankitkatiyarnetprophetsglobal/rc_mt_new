<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use App\Models\Manage\Financemanages;
use App\Models\Manage\InfraWork;
use App\Models\Manage\Miscellaneousmanages;
use App\Models\Manage\Miscinfraawardtender;
use App\Models\Manage\Miscretirement;
use App\Models\Manage\Pendingdemandsmanage;
use App\Models\Manage\ProcurementFirstForm;
use App\Models\Manage\ProcurementSecondForm;
use App\Models\Manage\ProcurementServiceForm;
use App\Models\Manage\ProcurementThirdForm;
use App\Models\RcDetail;
use App\Models\TempForRc;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\TemplateSection;
use App\Models\Masters\Rcacademymapping;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
use Monolog\Formatter\ElasticsearchFormatter;


class ManageController extends Controller
{

    public function index()
    {
        // dd(222);

        try {
            $user = Session::get('user');
            //dd($user);
            $rc_id = Session::get('rc_id')->rc_id;
            // dd($rc_id);

            $rc_details = array();
            $templates = Template::with(['tempForRc']);
            if (Session::get('role_details')->id == 1) {
                $templates = $templates->whereStatus(true)->pluck('name', 'id');
                $rc_ids = TempForRc::select(DB::raw('DISTINCT(rc_id)'))->pluck('rc_id')->toArray();
                $data = Template::with(['tempForRc', 'tempSection'])->whereStatus(true)->OrderBy('id', 'desc')->get();
                $rc_details = collect(getRcList())->filter(function ($item) use ($rc_ids) {
                    if (in_array($item->user_id, $rc_ids)) {
                        return $item;
                    }
                })->values();
                // dd($rc_details);
            } else {
                // dd(12);
                $templates = $templates->whereHas('tempForRc', function ($q) use ($user, $rc_id) {
                    $q->where('rc_id', $rc_id);
                })->whereStatus(true)->pluck('name', 'id');
                // dd($templates);
                $rc_ids = TempForRc::where('rc_id', $user->user_id)->pluck('rc_id')->toArray();
                // dd($rc_ids);
                $data = Template::with(['tempForRc', 'tempSection'])->whereHas('tempForRc', function ($q) use ($user, $rc_id) {
                    $q->where('rc_id', $rc_id);
                })->whereStatus(true)->OrderBy('id', 'desc')->get();
                // dd($data);
            }

            return view('admin.templatesMonitoring.index', ['data' => $data, 'templates' => $templates, 'rc_details' => $rc_details]);
        } catch (\Exception $ex) {
            // dd($ex->getMessage());
            $message = 'Somthing went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }


    public function rcWiseTemplate(Request $request)
    {
        try {
            $user = Session::get('user');
            //dd(date('Y-m-d',time()));

            $templates = Template::with(['tempForRc']);
            if (Session::get('role_details')->id == 1) {
                $templates = $templates->whereStatus(true)->pluck('name', 'id');
                $rc_ids = TempForRc::select(DB::raw('DISTINCT(rc_id)'))->pluck('rc_id')->toArray();
                //    $data = Template::with(['tempForRc', 'tempSection'])->whereStatus(true)->OrderBy('id', 'desc')->get();
            } else {
                $templates = $templates->whereHas('tempForRc', function ($q) use ($user) {
                    $q->where('rc_id', $user->user_id);
                })->whereStatus(true)->pluck('name', 'id');
                $rc_ids = TempForRc::where('rc_id', $user->user_id)->pluck('rc_id')->toArray();
                //    $data = Template::with(['tempForRc', 'tempSection'])->whereHas('tempForRc',function($q) use($user){
                //        $q->where('rc_id',$user->user_id);
                //    })->whereStatus(true)->OrderBy('id', 'desc')->get();
            }
            $rc_details = collect(getRcList())->filter(function ($item) use ($rc_ids) {
                if (in_array($item->user_id, $rc_ids)) {
                    return $item;
                }
            })->values();

            $select_rc = decode5t($request->rc_id);

            $temp_ids = TempForRc::where('rc_id', decode5t($request->rc_id))->pluck('template_id');

            $filter_templates = Template::whereIn('id', $temp_ids)->get();

            return view('admin.templatesMonitoring.rc_templates', ['rc_details' => $rc_details, 'templates' => $templates, 'select_rc' => $select_rc, 'data' => $filter_templates]);
        } catch (\Exception $ex) {
            $message = 'Somthing went wrong !,Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }
    public function templateWiseRc(Request $request)
    {
        try {
            $user = Session::get('user');
            $rc_id = Session::get('rc_id')->rc_id;
            //dd($user);
            $all_data = array();
            $requested_temp = $requested_rc = $templates = Template::with(['tempForRc']);

            if (Session::get('role_details')->id == 1) {
                $templates = $templates->whereStatus(true)->pluck('name', 'id');
                $rc_ids = TempForRc::select(DB::raw('DISTINCT(rc_id)'))->pluck('rc_id')->toArray();
                // echo '<pre>';
                // print_r($rc_ids);
                $data = TempForRc::with('infraWork')->where('template_id', decode5t($request->temp_id))->get();
                // dd($data['0']['template_id']);
                // $requested_rc = $data['0']['rc_id'];
                // $requested_temp = $data['0']['rc_id'];
                // foreach ($data as $value) {
                // dd($data);    
                foreach ($data as $x => $value) {
                    $requested_temp = $value['template_id'];                    
                    // echo '<hr/>';
                    $requested_rc = $value['rc_id'];
                    $all_data[$x]['rc_id'] = $value['rc_id'];
                    $all_data[$x]['template_id'] = $value['template_id'];
                    // $all_data[$x]['status']['infra_work'] = array(InfraWork::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('form_status', true)->count());
                    $infra_work = InfraWork::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('form_status', true)->count();
                    if ($infra_work) {
                        $all_data[$x]['status']['infra_work'] = array(1);
                    } else {
                        $all_data[$x]['status']['infra_work'] = array(0);
                    }
                    // $all_data[$x]['status']['financemanages'] = array(Financemanages::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->count());
                    $finance = Financemanages::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->count();
                    if ($finance) {
                        $all_data[$x]['status']['financemanages'] = array(1);
                    } else {
                        $all_data[$x]['status']['financemanages'] = array(0);
                    }
                    $procurement_first = ProcurementFirstForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
                    $procurement_second = ProcurementSecondForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
                    $procurement_third = ProcurementThirdForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
                    $procurement_fourth = ProcurementServiceForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
                    if ($procurement_first && $procurement_second && $procurement_third && $procurement_fourth) {
                        $all_data[$x]['status']['procurement'] = array(1);
                    } else {
                        $all_data[$x]['status']['procurement'] = array(0);
                    }
                    $all_data[$x]['status']['miscellaneousmanages'] = array(Miscellaneousmanages::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count());
                    $all_data[$x]['status']['pendingdemandsmanage'] = array(Pendingdemandsmanage::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count());
            //         $miscellaneous = Miscellaneousmanages::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            // $pending_demands = Pendingdemandsmanage::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();

                    // dd($infra_work);
                    
                    // if ($infra_work) {
                    //     $infra_work = 1;
                    // } else {
                    //     $infra_work = 0;
                    // }
                    // echo '<hr/>';
                    // echo '<hr/>';
                }
                // echo '<pre>';
                // print_r($all_data);
                // exit;
                // dd($all_data);
                // exit;
                // $infra_work = InfraWork::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('form_status', true)->count();
                // // dd($infra_work);
                // if ($infra_work) {
                //     $infra_work = 1;
                // } else {
                //     $infra_work = 0;
                // }
                // dd($data);
            } else if(Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) {
                $templates = $templates->whereHas('tempForRc', function ($q) use ($user, $rc_id) {
                    $q->where('rc_id', $rc_id);
                })->whereStatus(true)->pluck('name', 'id');
                // dd($templates);
                $rc_ids = TempForRc::where('rc_id', $rc_id)->pluck('rc_id')->toArray();
                // dd($rc_ids);
                $data = TempForRc::with(['infraWork', 'ProcurementFirstForm', 'ProcurementSecondForm', 'ProcurementThirdForm', 'ProcurementServiceForm'])
                    ->where('template_id', decode5t($request->temp_id))->where('rc_id', $rc_id)->get();
                // dd($data);
            }
            $rc_details = collect(getRcList())->filter(function ($item) use ($rc_ids) {
                if (in_array($item->user_id, $rc_ids)) {
                    return $item;
                }
            })->values();
            // $rc_details = TempForRc::select(DB::raw('DISTINCT(rc_id)'))->pluck('rc_id')->toArray();
            // dd($rc_details);
            $select_temp = Template::find(decode5t($request->temp_id));
            return view('admin.templatesMonitoring.template_rc', ['rc_details' => $rc_details, 'templates' => $templates, 'select_temp' => $select_temp, 'data' => $data, 'all_data' => $all_data]);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            $message = 'Somthing went wrong !,Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }
    public function perticularTemp(Request $request)
    {

        try {

            $user = Session::get('user');
            $user_id = Session::get('user')->user_id;
            $rc_id = Session::get('rc_id')->rc_id;
            $requested_rc = decode5t($request->rc_id);
            $requested_temp = decode5t($request->temp_id);
            // dd($requested_rc);

            $templates = Template::with(['tempForRc']);
            if (Session::get('role_details')->id == 1) {
                $templates = $templates->whereStatus(true)->pluck('name', 'id');
                $rc_ids = TempForRc::select(DB::raw('DISTINCT(rc_id)'))->pluck('rc_id')->toArray();
            } else {
                $templates = $templates->whereHas('tempForRc', function ($q) use ($user, $rc_id) {
                    // $q->where('rc_id', $user->user_id);
                    $q->where('rc_id', $rc_id);
                })->whereStatus(true)->pluck('name', 'id');
                $rc_ids = TempForRc::where('rc_id', $user->user_id)->pluck('rc_id')->toArray();
            }

            $rc_details = collect(getRcList())->filter(function ($item) use ($rc_ids) {
                if (in_array($item->user_id, $rc_ids)) {
                    return $item;
                }
            })->values();
            // dd($rc_details);
            $select_temp = Template::find($requested_temp);
            // dd($select_temp);
            $select_rc = decode5t($request->rc_id);


            $data = Template::with(['tempForRc'])->whereHas('tempForRc', function ($q) use ($request) {
                $q->where([['template_id', '=', decode5t($request->temp_id)], ['rc_id', '=', decode5t($request->rc_id)]]);
            })->find(decode5t($request->temp_id));


            if (!isset($data)) {
                Session::flash('error_message', 'This Combination Not Available.');
                return redirect()->route('temp.manage.index');
            }


            // dd(decode5t($request->rc_id));
            $select_rc_id = decode5t($request->rc_id);

            // dd($select_rc_id);
            $template_accessible = Template::with(['tempSection.section'])->find($requested_temp);
            // dd($template_accessible);
            // dd($requested_temp);
            // dd($requested_rc);
            $infra_work = InfraWork::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('form_status', true)->count();
            // dd($infra_work);
            if ($infra_work) {
                $infra_work = 1;
            } else {
                $infra_work = 0;
            }
            $finance = Financemanages::where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->count();
            if ($finance) {
                $finance = 1;
            } else {
                $finance = 0;
            }
            $procurement_first = ProcurementFirstForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            $procurement_second = ProcurementSecondForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            $procurement_third = ProcurementThirdForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            $procurement_fourth = ProcurementServiceForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            if ($procurement_first && $procurement_second && $procurement_third && $procurement_fourth) {
                $procurement = 1;
            } else {
                $procurement = 0;
            }
            $miscellaneous = Miscellaneousmanages::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            $pending_demands = Pendingdemandsmanage::where('created_by', $requested_rc)->where('template_id', $requested_temp)->count();
            // $centers = Pendingdemandsmanage::where('status', true)->where('created_by', $user)->get();
            // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_id');
            
            //by Akshay
            $centers_id = 0;
            if (Session::get('role_details')->id != 1) {
                $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $rc_id]])->pluck('academy_id');
                // dd($centers);
                $centers_id = $centers[0];
            }
            if (Session::get('role_details')->id == 3) {
                $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', $user_id]])->pluck('academy_id');
                // dd($centers);
                $centers_id = $centers[0];
            }
            
            if (Session::get('role_details')->id == 1) {
                // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $rc_id]])->pluck('academy_id');
                $centers = Rcacademymapping::where([['status', '=', true],  ['rc_id', '=', $requested_rc]])->pluck('academy_id');                
                $centers_id = $centers[0];
                // dd($centers_id);
            }

            //by Akshay
            return view(
                'admin.templatesMonitoring.rc_template_dashboard',
                [
                    'rc_details' => $rc_details,
                    'templates' => $templates,
                    'select_temp' => $select_temp,
                    'select_rc' => $select_rc,
                    'select_rc_id' => $select_rc_id,
                    'template_accessible' => $template_accessible,
                    'infra_work' => $infra_work,
                    'finance' => $finance,
                    'procurement' => $procurement,
                    'miscellaneous' => $miscellaneous,
                    'pending_demands' => $pending_demands,
                    'centers_id' => $centers_id
                ]
            );
        } catch (\Exception $ex) {
            // dd($ex->getMessage());
            $message = 'Somthing went wrong !,Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }

    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [

                "monthly_monitoring.*.template_name"    => "required|unique:templates,name",
                "monthly_monitoring.*.from_date"    => "required",

            ], [

                'monthly_monitoring.*.template_name.required' => 'Please Enter Template Name',
                'monthly_monitoring.*.template_name.unique' => 'Template Name already exist',
                'monthly_monitoring.*.from_date.required' => 'Please Enter From Date',

            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
            }



            foreach ($request->monthly_monitoring as $value) {

                $regional_center = isset($value['regional_center']) && is_array($value['regional_center']) ? $value['regional_center'] : [];
                $regional_center_array = implode(',', $regional_center);
                $template = isset($value['template']) && is_array($value['template']) ? $value['template'] : [];
                $template_array = implode(',', $template);
                $categories = isset($value['categories']) && is_array($value['categories']) ? $value['categories'] : [];
                $categories_array = implode(',', $categories);

                $from_date = isset($value['from_date']) ? date('Y-m-d', strtotime($value['from_date'])) : null;
                $to_date = isset($value['to_date']) ? date('Y-m-d', strtotime($value['to_date'])) : null;

                $templates = new Template();
                $templates->name = $value['template_name'];
                $templates->from_date = $from_date;
                $templates->to_date = $to_date;
                $templates->rc_id = $regional_center_array;
                $templates->temp_section_id = $template_array;
                $templates->categories_id = $categories_array;
                $templates->status = true;
                $templates->created_by = Session::get('user')->user_id;
                $templates->save();

                foreach ($value['regional_center'] as $regional_center) {

                    $id = $templates->id;
                    $templaterc = new TempForRc();
                    $templaterc->template_id = $id;
                    $templaterc->rc_id = $regional_center;
                    $templaterc->save();
                }

                foreach ($value['template'] as $template) {

                    $id = $templates->id;
                    $temp_sections = new TemplateSection();
                    $temp_sections->template_id = $id;
                    $temp_sections->section_id = $template;
                    $temp_sections->save();
                }
            }

            Session::flash('message', 'Record Created.');
            return response()->json(['success' => true, 'message' => 'Data added successfully!']);
        } catch (\Exception $ex) {
            $message = 'Somthing went wrong !,Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }
    public function create()
    {
        // dd(1321313);
        try {
            $template_data = Section::where([['status', '=', true]])->pluck('name', 'id');
            // dd($template_data);
            return view('admin.templatesMonitoring.create', ['template_data' => $template_data]);
        } catch (\Exception $th) {
            $message = 'Somthing went wrong !,Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }

    public function deleteById($id)
    {
        try {
            $temp =  Template::findOrFail($id);

            if ($temp->delete()) {
                $trashTemp =  Template::onlyTrashed()->findOrFail($id);
                $trashTemp->deleted_by = Session::get('user')->user_id;
                $trashTemp->save();
                return response()->json(['status' => true, 'message' => 'Record deleted.']);
            }
            return response()->json(['status' => false, 'message' => 'Somthing went wrong']);
        } catch (\Exception $ex) {

            return response()->json(['status' => false, 'message' => 'Somthing went wrong']);
        }
    }

    public function edit($id)
    {
        try {
            $template_dropdown_data = Section::where([['status', '=', true]])->pluck('name', 'id');
            $templates_data = Template::whereStatus(true)->findOrFail(decode5t($id));
            return view('admin.templatesMonitoring.edit', ['data' => $templates_data, 'template_dropdown_data' => $template_dropdown_data]);
        } catch (\Exception $ex) {
            $message = 'Somthing went wrong !,Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [

            "template_name"    => "required|unique:templates,name," . $request->id,
            "from_date"    => "required",

        ], [

            'template_name.required' => 'Please Enter Template Name',
            'template_name.unique' => 'Template Name already exist',
            'from_date.required' => 'Please Enter From Date',

        ]);

        if ($validator->fails()) {
            // dd($validator->errors()->first());
            // return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
            return response()->json(['success' => false, 'error_message' => $validator->errors()->first()]);
        }
        $regional_center = isset($request->regional_center) && is_array($request->regional_center) ? $request->regional_center : [];
        $regional_center_array = implode(',', $regional_center);
        $template = isset($request->template) && is_array($request->template) ? $request->template : [];
        $template_array = implode(',', $template);
        $categories = isset($request->categories) && is_array($request->categories) ? $request->categories : [];
        $categories_array = implode(',', $categories);
        $from_date = isset($request->from_date) ? date('Y-m-d', strtotime($request->from_date)) : null;
        $to_date = isset($request->to_date) ? date('Y-m-d', strtotime($request->to_date)) : null;
        try {
            $template = Template::findOrFail($request->id);
            $template->name = $request->template_name;
            $template->from_date = $from_date;
            $template->to_date = $to_date;
            $template->rc_id = $regional_center_array;
            $template->temp_section_id = $template_array;
            $template->categories_id = $categories_array;
            $template->status = 1;
            $template->updated_by = Session::get('user')->user_id;
            $template->save();
            TempForRc::where('template_id', $request->id)->each(function ($data) {
                $data->delete();
            });

            TemplateSection::where('template_id', $request->id)->each(function ($data) {
                $data->delete();
            });

            foreach ($request['regional_center'] as $key => $regional_center) {

                $templaterc = new TempForRc();
                $templaterc->template_id = $template->id;
                $templaterc->rc_id = $regional_center;
                $templaterc->save();
            }

            foreach ($request['template'] as $key => $template_sec) {

                $temp_sections = new TemplateSection();
                $temp_sections->template_id = $template->id;
                $temp_sections->section_id = $template_sec;
                $temp_sections->save();
            }

            Session::flash('message', 'Record Updated.');
            return redirect()->route('temp.manage.index');
        } catch (\Exception $ex) {
            //throw $th;
        }
    }

    public function viewForm(Request $request)
    {
        // dd(Session::get('role_details')->id);
        try {

            $requested_rc = decode5t($request->rc_id);           
            // dd($requested_rc);
            $requested_temp = decode5t($request->temp_id);
            // dd($requested_temp);
            $user_id = Session::get('user')->user_id;
            $centerid = $center_id = $request->center_id ?? '';
            
            $section = $request->section;

            if (Session::get('role_details')->id == 2) 
            {
                $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');                
            }
            else if (Session::get('role_details')->id == 3)
            {
                $centers = Rcacademymapping::where([['status', '=', true],  ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
            }
            else if (Session::get('role_details')->id == 1){                
                // dd($requested_rc);                
                $centers = Rcacademymapping::where([['status', '=', true],  ['rc_id', '=', $requested_rc]])->pluck('academy_name', 'academy_id');
                // dd($centers);
                // $centers = getRcList();                 
            }

            
            // dd($centers);
            if (decode5t($request->section) == 'infrastructure') {
                // dd('12313');
                
                
                if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) &&  ($request->center_id != 1)){

                    $infra_work = InfraWork::with(['infrastructure.agency'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('deleted_at', null)->get();

                }else if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) && ($request->center_id == 1)){

                    $infra_work = InfraWork::with(['infrastructure.agency'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('deleted_at', null)->get();
                    // dd($infra_work);
                }
                if ((Session::get('role_details')->id == 1) && ($request->center_id != 1)){
                    // dd($centerid);
                    // dd($request->all()); 
                    $infra_work = InfraWork::with(['infrastructure.agency'])->where('project_center_id', $centerid)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('deleted_at', null)->get();
                    // dd($infra_work);
                    
                }else if ((Session::get('role_details')->id == 1) && ($request->center_id == 1) ){
                    // dd($centerid);
                    // dd($request->all()); 
                    $infra_work = InfraWork::with(['infrastructure.agency'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('deleted_at', null)->get();
                    // dd($infra_work);
                    
                }


                // dd($infra_work);
                
                return view(
                    'admin.templatesMonitoring.view_pages.infra_work',
                    [
                        'infra_work' => $infra_work,
                        'centers' => $centers,
                        'requested_temp' => $requested_temp,
                        'requested_rc' => $requested_rc,
                        'section' => $section,
                        'centerid' => $centerid
                    ]
                );
            } elseif (decode5t($request->section) == 'finance') {


                // $finance = Financemanages::with(['finance'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->get();

                if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) &&  ($request->center_id != 1)){

                    $finance = Financemanages::with(['finance'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->get();

                }else if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) && ($request->center_id == 1)){
                    
                    $finance = Financemanages::with(['finance'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->get();
                    
                }
                if ((Session::get('role_details')->id == 1) && ($request->center_id != 1)){
                    // dd($centerid);
                    // dd($request->all()); 
                    $finance = Financemanages::with(['finance'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->get();
                    // dd($infra_work);
                    
                }else if ((Session::get('role_details')->id == 1) && ($request->center_id == 1) ){
                    // dd($centerid);
                    // dd($request->all()); 
                    $finance = Financemanages::with(['finance'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->get();
                    // dd($infra_work);
                    
                }

                return view(
                    'admin.templatesMonitoring.view_pages.finance_manage',
                    [
                        'finance' => $finance,
                        'centers' => $centers,
                        'requested_temp' => $requested_temp,
                        'requested_rc' => $requested_rc,
                        'section' => $section,
                        'centerid' => $centerid
                    ]
                );
            } elseif (decode5t($request->section) == 'procurement') {
                // $first_form = ProcurementFirstForm::where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->first();
                // $second_form = ProcurementSecondForm::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->first();
                // $third_form = ProcurementThirdForm::with(['procurentMaster'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                // $service_form = ProcurementServiceForm::with('procurementService')->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                if($request->center_id != 1){
                    $first_form = ProcurementFirstForm::where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->first();
                    $second_form = ProcurementSecondForm::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->first();
                    $third_form = ProcurementThirdForm::with(['procurentMaster'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    $service_form = ProcurementServiceForm::with('procurementService')->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    
                
                }else if((Session::get('role_details')->id == 1) && ($request->center_id != 1)){
                
                    $first_form = ProcurementFirstForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->first();
                    $second_form = ProcurementSecondForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->first();
                    $third_form = ProcurementThirdForm::with(['procurentMaster'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    $service_form = ProcurementServiceForm::with('procurementService')->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                
                    
                }
                //   dd($service_form);
                return view(
                    'admin.templatesMonitoring.view_pages.procurement',
                    [
                        'first_form' => $first_form,
                        'second_form' => $second_form,
                        'third_form' => $third_form,
                        'service_form' => $service_form,
                        'centers' => $centers,
                        'requested_temp' => $requested_temp,
                        'requested_rc' => $requested_rc,
                        'section' => $section,
                        'centerid' => $centerid
                    ]
                );
            } elseif (decode5t($request->section) == 'miscellaneous') {

                if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) &&  ($request->center_id != 1)){
    
                    $miscellaneous_first = Miscellaneousmanages::with(['miscMaster'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    //  dd($miscellaneous_first);
                    $miscellaneous_second = Miscinfraawardtender::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get();
                    $miscellaneous_third = Miscretirement::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get(); 
                
                }else if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) && ($request->center_id == 1)){
                
                    $miscellaneous_first = Miscellaneousmanages::with(['miscMaster'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    //  dd($miscellaneous_first);
                    $miscellaneous_second = Miscinfraawardtender::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    $miscellaneous_third = Miscretirement::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    
                }

                if ((Session::get('role_details')->id == 1) && ($request->center_id != 1)){

                    $miscellaneous_first = Miscellaneousmanages::with(['miscMaster'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    //  dd($miscellaneous_first);
                    $miscellaneous_second = Miscinfraawardtender::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get();
                    $miscellaneous_third = Miscretirement::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get(); 
                    
                }else if ((Session::get('role_details')->id == 1) && ($request->center_id == 1) ){
                    $miscellaneous_first = Miscellaneousmanages::with(['miscMaster'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    //  dd($miscellaneous_first);
                    $miscellaneous_second = Miscinfraawardtender::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    $miscellaneous_third = Miscretirement::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get(); 
                    
                }
                
                return view(
                    'admin.templatesMonitoring.view_pages.miscellaneous',
                    [
                        'miscellaneous_first' => $miscellaneous_first,
                        'miscellaneous_second' => $miscellaneous_second,
                        'miscellaneous_third' => $miscellaneous_third,
                        'centers' => $centers,
                        'requested_temp' => $requested_temp,
                        'requested_rc' => $requested_rc,
                        'section' => $section,
                        'centerid' => $centerid
                    ]
                );
            } elseif (decode5t($request->section) == 'pendingdemands') {
                // $pendigdemands =  Pendingdemandsmanage::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get();
                if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) &&  ($request->center_id != 1)){
    
                    $pendigdemands =  Pendingdemandsmanage::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get();    
                
                }else if((Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3) && ($request->center_id == 1)){
                
                    $pendigdemands =  Pendingdemandsmanage::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                    
                }

                if ((Session::get('role_details')->id == 1) && ($request->center_id != 1)){

                    $pendigdemands =  Pendingdemandsmanage::where('created_by', $requested_rc)->where('project_center_id', $center_id)->where('template_id', $requested_temp)->get();    
                    
                }else if ((Session::get('role_details')->id == 1) && ($request->center_id == 1) ){
                    // dd($centerid);
                    // dd($request->all()); 
                    $pendigdemands =  Pendingdemandsmanage::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();    
                    // dd($infra_work);
                    
                }

                return view(
                    'admin.templatesMonitoring.view_pages.pending_demands',
                    [
                        'pendigdemands' => $pendigdemands,
                        'centers' => $centers,
                        'requested_temp' => $requested_temp,
                        'requested_rc' => $requested_rc,
                        'section' => $section,
                        'centerid' => $centerid
                    ]
                );
            } else {
                // dd('nothing');
            }

            // if($request->section == 'infra'){
            //     $infra_work = InfraWork::with(['infrastructure.agency'])->where('created_by',$requested_rc)->where('template_id',$requested_temp)->where('form_status',true)->get();
            //    return view('admin.templatesMonitoring.view_pages.infra_work',
            //     ['infra_work' => $infra_work]);
            // }
            // else if($request->section == 'finance'){
            //     $finance = Financemanages::with(['finance'])->where('created_by',$requested_rc)->where('template_id',$requested_temp)->where('status',true)->get();

            //     return view('admin.templatesMonitoring.view_pages.finance_manage',
            //     ['finance' => $finance]);
            // }else{
            //     dd('coming soon...');
            // }

        } catch (\Exception $ex) {
            dd($ex->getMessage());
            $message = 'Somthing went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);

        }
    }
    
    public function viewcenterForm(Request $request)
    {
        try {
            $requested_rc = decode5t($request->rc_id);
            $requested_temp = decode5t($request->temp_id);
            $section = decode5t($request->section);
            $centerid = $center_id = $request->center_id;
            // dd($center_id);
            // dd($section);
            $user_id = Session::get('user')->user_id;
            if (Session::get('role_details')->id == 2) 
            {
                $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', $user_id]])->pluck('academy_name', 'academy_id');                
            }
            else if (Session::get('role_details')->id == 3)
            {
                $centers = Rcacademymapping::where([['status', '=', true],  ['academy_id', '=', $user_id]])->pluck('academy_name', 'academy_id');
            }

            
            // dd($centers);
            if (decode5t($request->section) == 'infrastructure') {
                // dd('12313');
                $section = $request->section;
                $infra_work = InfraWork::with(['infrastructure.agency'])->where('project_center_id', $center_id)->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('form_status', true)->get();                
                return view(
                    'admin.templatesMonitoring.view_pages.centerview_pages',
                    [
                        'infra_work' => $infra_work,
                        'centers' => $centers,
                        'centerid' => $centerid,
                        'requested_temp' => $requested_temp,
                        'requested_rc' => $requested_rc,
                        'section' => $section
                    ]
                );
            } elseif (decode5t($request->section) == 'finance') {
                $finance = Financemanages::with(['finance'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->where('status', true)->get();

                return view(
                    'admin.templatesMonitoring.view_pages.finance_manage',
                    ['finance' => $finance]
                );
            } elseif (decode5t($request->section) == 'procurement') {
                $first_form = ProcurementFirstForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->first();
                $second_form = ProcurementSecondForm::where('created_by', $requested_rc)->where('template_id', $requested_temp)->first();
                $third_form = ProcurementThirdForm::with(['procurentMaster'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                $service_form = ProcurementServiceForm::with('procurementService')->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                //   dd($service_form);
                return view(
                    'admin.templatesMonitoring.view_pages.procurement',
                    [
                        'first_form' => $first_form,
                        'second_form' => $second_form,
                        'third_form' => $third_form,
                        'service_form' => $service_form,
                    ]
                );
            } elseif (decode5t($request->section) == 'miscellaneous') {

                $miscellaneous_first = Miscellaneousmanages::with(['miscMaster'])->where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                //  dd($miscellaneous_first);
                $miscellaneous_second = Miscinfraawardtender::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                $miscellaneous_third = Miscretirement::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();
                return view(
                    'admin.templatesMonitoring.view_pages.miscellaneous',
                    [
                        'miscellaneous_first' => $miscellaneous_first,
                        'miscellaneous_second' => $miscellaneous_second,
                        'miscellaneous_third' => $miscellaneous_third,
                    ]
                );
            } elseif (decode5t($request->section) == 'pendingdemands') {
                $pendigdemands =  Pendingdemandsmanage::where('created_by', $requested_rc)->where('template_id', $requested_temp)->get();

                return view(
                    'admin.templatesMonitoring.view_pages.pending_demands',
                    ['pendigdemands' => $pendigdemands]
                );
            } else {
                dd('nothing');
            }

            // if($request->section == 'infra'){
            //     $infra_work = InfraWork::with(['infrastructure.agency'])->where('created_by',$requested_rc)->where('template_id',$requested_temp)->where('form_status',true)->get();
            //    return view('admin.templatesMonitoring.view_pages.infra_work',
            //     ['infra_work' => $infra_work]);
            // }
            // else if($request->section == 'finance'){
            //     $finance = Financemanages::with(['finance'])->where('created_by',$requested_rc)->where('template_id',$requested_temp)->where('status',true)->get();

            //     return view('admin.templatesMonitoring.view_pages.finance_manage',
            //     ['finance' => $finance]);
            // }else{
            //     dd('coming soon...');
            // }

        } catch (\Exception $ex) {
            // dd($ex->getMessage());
            $message = 'Somthing went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);

        }
    }

    public function perticularTempCopy($route_parameter, $rc_id, $centers_id)
    {
        $route_parameter = decode5t($route_parameter);
        $new_template_id = decode5t($rc_id);
        $user_id = Session::get('user')->user_id;
        $rc_id = Session::get('rc_id')->rc_id;

        try 
        {
            $new_template_id = (int)$new_template_id;
            $template = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();

            if ($route_parameter == 'infrastructure')             
            {
                // dd('hear');
                // $template = InfraWork::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                // $new_template_id = (int)$new_template_id;
                // dd($new_template_id);
                // $template = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                // $template = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                // dd($template[0]['id']);
                    
                if (count($template) > 0) {
                    // dd($template_id);
                    if ((int)$new_template_id != $template[0]['id']) 
                    {
                        $template_id = ($template[0]->template_id);
                        // dd($template_id);
                        $InfraWork = InfraWork::where('template_id', $template[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                            if (count($InfraWork) > 0) 
                            {
            
                                foreach ($InfraWork as $key => $value) {
                                    $InfraWork_del =   InfraWork::where('template_id', $new_template_id)->where('infra_id', $value['infra_id'])->where('deleted_at', null)->delete();
                                
                                    $created_by = $rc_id;
                                    $InfraWork = new InfraWork();
                                    $InfraWork->project_center_id = $value['project_center_id'];
                                    $InfraWork->template_id = $new_template_id;
                                    $InfraWork->rc_id = $rc_id;
                                    $InfraWork->infra_id = $value['infra_id'];
                                    $InfraWork->discription = $value['discription'];
                                    $InfraWork->date_of_issue = $value['date_of_issue'];
                                    $InfraWork->date_of_receipt = $value['date_of_receipt'];
                                    $InfraWork->date_of_tech_bid = $value['date_of_tech_bid'];
                                    $InfraWork->date_of_financial_bid = $value['date_of_financial_bid'];
                                    $InfraWork->date_of_work_award = $value['date_of_work_award'];
                                    $InfraWork->tender_cost = $value['tender_cost'];
                                    $InfraWork->remarks_1 = $value['remarks_1'];
                                    $InfraWork->work_start_date = $value['work_start_date'];
                                    $InfraWork->cpdc_date = $value['cpdc_date'];
                                    $InfraWork->epd_25 = $value['epd_25'];
                                    $InfraWork->epd_50 = $value['epd_50'];
                                    $InfraWork->epd_75 = $value['epd_75'];
                                    $InfraWork->progress_percentage = $value['progress_percentage'];
                                    $InfraWork->current_pdc = $value['current_pdc'];
                                    $InfraWork->remarks_2 = $value['remarks_2'];
                                    $InfraWork->fund_release = $value['fund_release'];
                                    $InfraWork->utilised_fund_percentage = $value['utilised_fund_percentage'];
                                    $InfraWork->uc_status =  $value['uc_status'];
                                    $InfraWork->form_type =  $value['form_type'];
                                    $InfraWork->form_status = $value['form_status'];
                                    $InfraWork->award_status = $value['award_status'];
                                    $InfraWork->physical_status =  $value['physical_status'];
                                    $InfraWork->finance_status =  $value['finance_status'];
                                    $InfraWork->created_by = $created_by;
                                    $InfraWork->created_for = $value['project_center_id'];
                                    $InfraWork->save();
                                } 
                                Session::flash('message', 'Data has been cloned ');
                                $rc_id = encode5t($rc_id);
                                $current_template_id = encode5t($new_template_id);
                                return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                            }
                            else
                            {
                                $rc_id = encode5t($rc_id);
                                $current_template_id = encode5t($new_template_id);
                                Session::flash('error_message', 'No Previous template to Copy!');
                                return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);    
                            }
                    } 
                    else
                    {                        
                        $rc_id = encode5t($rc_id);
                        $current_template_id = encode5t($new_template_id);
                        Session::flash('error_message', 'No Previous template to Copy!');
                        return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);                        
                    }
                }
                else
                {                        
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'No Previous template to Copy!');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);                       
                }
                 
            } 
            elseif ($route_parameter == 'finance') 
            {
                // dd($new_template_id);
                // $new_template_id = (int)$new_template_id;
                // DB::enableQueryLog();
                // $template = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();            
                // dd($template[0]['id']);    
                if (count($template) > 0) {
                    // dd($template[0]['template_id']);
                    if ((int)$new_template_id != $template[0]['id'])    
                    {
                        $template_id = ($template[0]->template_id);
                        // dd($template_id);
                        $Financemanages = Financemanages::where('template_id', $template[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                        if (count($Financemanages) > 0) 
                        {
                            foreach ($Financemanages as $key => $value) {
                                $Financemanages_del =   Financemanages::where('template_id', $new_template_id)->where('finance_id', $value['finance_id'])->where('deleted_at', null)->delete();
                            
                                $created_by = $rc_id;
                                $Financemanage = new Financemanages();
                                $Financemanage->project_center_id = $value['project_center_id'];
                                $Financemanage->finance_id = $value['finance_id'];
                                $Financemanage->template_id = $new_template_id;
                                $Financemanage->rc_id = $rc_id;
                                $Financemanage->budget_code = $value['budget_code'];
                                $Financemanage->be_re = $value['be_re'];
                                $Financemanage->opening_balance = $value['opening_balance'];
                                $Financemanage->fund_received = $value['fund_received'];
                                $Financemanage->total_funds = $value['total_funds'];
                                $Financemanage->expenditure_incurred = $value['expenditure_incurred'];
                                $Financemanage->commited_liabilities = $value['commited_liabilities'];
                                $Financemanage->balance = $value['balance'];
                                $Financemanage->remark = $value['remark'];
                                $Financemanage->created_by = $rc_id;
                                $Financemanage->created_for = $value['project_center_id'];
                                $Financemanage->status = 1;
                                $Financemanage->save();
                            } 
                            Session::flash('message', 'Data has been cloned');
                            $rc_id = encode5t($rc_id);
                            $current_template_id = encode5t($new_template_id);
                            return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);                
                        }
                        else
                        {
                            $rc_id = encode5t($rc_id);
                            $current_template_id = encode5t($new_template_id);
                            Session::flash('error_message', 'No Previous template to Copy!');
                            return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);

                        }
                        // dd($Financemanages);
                    } 
                    else
                    {
                        $rc_id = encode5t($rc_id);
                        $current_template_id = encode5t($new_template_id);
                        Session::flash('error_message', 'No Previous template to Copy!');
                        return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                    }
                } 
            }
            elseif ($route_parameter == 'procurement') 
            {
                // Procurement first form
                try
                {
                    // dd($new_template_id);
                    // $new_template_id = (int)$new_template_id;
                    // $template = ProcurementFirstForm::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    // $template = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    // $template1 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    $template1 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    // dd($template);    
                    if (count($template1) > 0) {
                        // dd($template);
                        if ((int)$new_template_id != $template1[0]['id']) 
                        {

                            $template_id = ($template1[0]['id']);
                            // dd($template_id);
                            $ProcurementFirstForm = ProcurementFirstForm::where('template_id', $template1[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                            // dd($ProcurementFirstForm);    
                                if (count($ProcurementFirstForm) > 0) 
                                {
                                    $ProcurementFirstForm_del =   ProcurementFirstForm::where('template_id', $new_template_id)->where('rc_id', $rc_id)->where('deleted_at', null)->delete();
                                    
                                    foreach ($ProcurementFirstForm as $key => $value) {
                                        
                                        $procurement = new ProcurementFirstForm();
                                        $procurement->project_center_id = $value['project_center_id'];
                                        $procurement->template_id = $new_template_id;
                                        $procurement->rc_id = $rc_id;
                                        $procurement->se_opening_balance = $value['se_opening_balance'];
                                        $procurement->se_administrative_approval_budget = $value['se_administrative_approval_budget'];
                                        $procurement->se_fund_transfer = $value['se_fund_transfer'];
                                        $procurement->se_total_fund_available = $value['se_total_fund_available'];
                                        $procurement->se_fund_requirement = $value['se_fund_requirement'];
                                        $procurement->sse_opening_balance = $value['sse_opening_balance'];
                                        $procurement->sse_administrative_approval_budget = $value['sse_administrative_approval_budget'];
                                        $procurement->sse_fund_transfer = $value['sse_fund_transfer'];
                                        $procurement->sse_total_fund_available = $value['sse_total_fund_available'];
                                        $procurement->sse_fund_requirement = $value['sse_fund_requirement'];
                                        $procurement->created_by = $rc_id;
                                        $procurement->created_for = $value['project_center_id'];
                                        if ($procurement->save()) {
                                            // return redirect()->route('manage.procurement.index',[$rc_id,$centers_id]);
                                            // return response()->json(['success' => true, 'message' => 'Records Created.']);
                                        } else {
                                            // Session::flash('message', 'Data has been cloned');
                                            // $rc_id = encode5t($rc_id);
                                            // $current_template_id = encode5t($new_template_id);
                                            // return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                                            // return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
                                        }
                                    } 
                                }
                                // else
                                // {
                                //     // dd(1);
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);

                                // }
                            // $current_template_id = encode5t($new_template_id);
                            // return redirect()->route('managefinance.index', [$current_template_id, $centers_id]);                  
                        } 
                        // else
                        // {
                        //     dd(5);
                        //     dd($ex->getMessage());
                        //     $rc_id = encode5t($rc_id);
                        //     $current_template_id = encode5t($new_template_id);
                        //     Session::flash('error_message', 'No Previous template to Copy!');
                        //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                        // }
                    } 
                }
                catch (\Exception $ex) 
                {
                    // dd($ex->getMessage());
                    //     dd($ex->getMessage());
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'Something went wrong');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }
                // Procurement 2nd form
                try
                {
                   
                    // $template = ProcurementSecondForm::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    $new_template_id = (int)$new_template_id;
                    // $template2 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get(); 
                    $template2 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                        
                    if (count($template2) > 0) {
                        // dd($template_id);
                        if ((int)$new_template_id != $template2[0]['template_id']) 
                        {
                            $template_id = ($template2[0]['id']);
                            // dd($template_id);
                            $ProcurementSecondForm = ProcurementSecondForm::where('template_id', $template2[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                            if (count($ProcurementSecondForm) > 0) 
                            {
                                    $ProcurementSecondForm_del =   ProcurementSecondForm::where('template_id', $new_template_id)->where('rc_id', $rc_id)->where('deleted_at', null)->delete();

                                    foreach ($ProcurementSecondForm as $key => $value) {                                       
                                    
                                        $ProcurementSecondForm = new ProcurementSecondForm();
                                        $ProcurementSecondForm->project_center_id = $value['project_center_id'];
                                        $ProcurementSecondForm->template_id = $new_template_id;
                                        $ProcurementSecondForm->rc_id = $rc_id;
                                        $ProcurementSecondForm->se_ncoe_cost = isset($value['se_ncoe_cost']) ? $value['se_ncoe_cost'] : null;
                                        $ProcurementSecondForm->se_stc_cost = isset($value['se_stc_cost']) ? $value['se_stc_cost'] : null;
                                        $ProcurementSecondForm->se_total_cost = isset($value['se_total_cost']) ? $value['se_total_cost'] : null;
                                        $ProcurementSecondForm->se_amt_recive_from_hq = isset($value['se_amt_recive_from_hq']) ? $value['se_amt_recive_from_hq'] : null;
                                        $ProcurementSecondForm->se_amt_incurred_on_procurement_of_equipment = isset($value['se_amt_incurred_on_procurement_of_equipment']) ? $value['se_amt_incurred_on_procurement_of_equipment'] : null;
                                        $ProcurementSecondForm->se_procurement_under_process_amt = isset($value['se_procurement_under_process_amt']) ? $value['se_procurement_under_process_amt'] : null;
                                        $ProcurementSecondForm->se_utilisation_plan_of_remaining_funds = isset($value['se_utilisation_plan_of_remaining_funds']) ? $value['se_utilisation_plan_of_remaining_funds'] : null;
                                        $ProcurementSecondForm->se_funds_requirement_from_approved_budget = isset($value['se_funds_requirement_from_approved_budget']) ? $value['se_funds_requirement_from_approved_budget'] : null;
                                        $ProcurementSecondForm->se_remarks = isset($value['se_remarks']) ? $value['se_remarks'] : null;
                                        //sse
                                        $ProcurementSecondForm->sse_ncoe_cost = isset($value['sse_ncoe_cost']) ? $value['sse_ncoe_cost'] : null;
                                        $ProcurementSecondForm->sse_stc_cost = isset($value['sse_stc_cost']) ? $value['sse_stc_cost'] : null;
                                        $ProcurementSecondForm->sse_total_cost = isset($value['sse_total_cost']) ? $value['sse_total_cost'] : null;
                                        $ProcurementSecondForm->sse_amt_recive_from_hq = isset($value['sse_amt_recive_from_hq']) ? $value['sse_amt_recive_from_hq'] : null;
                                        $ProcurementSecondForm->sse_amt_incurred_on_procurement_of_equipment = isset($value['sse_amt_incurred_on_procurement_of_equipment']) ? $value['sse_amt_incurred_on_procurement_of_equipment'] : null;
                                        $ProcurementSecondForm->sse_procurement_under_process_amt = isset($value['sse_procurement_under_process_amt']) ? $value['sse_procurement_under_process_amt'] : null;
                                        $ProcurementSecondForm->sse_utilisation_plan_of_remaining_funds = isset($value['sse_utilisation_plan_of_remaining_funds']) ? $value['sse_utilisation_plan_of_remaining_funds'] : null;
                                        $ProcurementSecondForm->sse_funds_requirement_from_approved_budget = isset($value['sse_funds_requirement_from_approved_budget']) ? $value['sse_funds_requirement_from_approved_budget'] : null;
                                        $ProcurementSecondForm->sse_remarks = isset($value['sse_remarks']) ? $value['sse_remarks'] : null;
                                        $ProcurementSecondForm->created_by = $rc_id;
                                        $ProcurementSecondForm->created_for = $value['project_center_id'];
                                        
                                        if ($ProcurementSecondForm->save()) {
                                            
                                        } else {
                                            // Session::flash('message', 'Data has been cloned');
                                            // $rc_id = encode5t($rc_id);
                                            // $current_template_id = encode5t($new_template_id);
                                            // return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]); 
                                        }
                                    }
                                }
                                // else
                                // {
                                //     // dd(2);
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                                
                                // } 
                            // $current_template_id = encode5t($new_template_id);
                            // return redirect()->route('managefinance.index', [$current_template_id, $centers_id]);                  
                        } 
                        // else
                        // {
                        //     dd(3);
                        //     $rc_id = encode5t($rc_id);
                        //     $current_template_id = encode5t($new_template_id);
                        //     Session::flash('error_message', 'No Previous template to Copy!');
                        //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                        // }
                    } 
                }
                catch (\Exception $ex) 
                {
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'Something went wrong');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }
                // Procurement 3rd form
                try
                {
                    // $template = ProcurementThirdForm::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    $new_template_id = (int)$new_template_id;
                    // $template3 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get(); 
                    $template3 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                        
                    if (count($template3) > 0) {
                        // dd($template_id);
                        if ((int)$new_template_id != $template3[0]['id']) 
                        {
                            $template_id = ($template3[0]['id']);
                            // dd($template_id);
                            $ProcurementThirdForm = ProcurementThirdForm::where('template_id', $template3[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                                if (count($ProcurementThirdForm) > 0) 
                                {
                
                                    foreach ($ProcurementThirdForm as $key => $value) {
                                        $ProcurementThirdForm_del =   ProcurementThirdForm::where('template_id', $new_template_id)->where('title_id', $value['title_id'])->where('deleted_at', null)->delete();
                                    
                                        $ProcurementThirdForm = new ProcurementThirdForm();
                                        $ProcurementThirdForm->project_center_id = $value['project_center_id'];
                                        $ProcurementThirdForm->template_id = $new_template_id;
                                        $ProcurementThirdForm->rc_id = $rc_id;
                                        $ProcurementThirdForm->title_id = isset($value['title_id']) ? $value['title_id'] : null;
                                        $ProcurementThirdForm->specs_finalized = isset($value['specs_finalized']) ? $value['specs_finalized'] : null;
                                        $ProcurementThirdForm->tender_type = isset($value['tender_type']) ? $value['tender_type'] : null;
                                        $ProcurementThirdForm->estimated_value = isset($value['estimated_value']) ? $value['estimated_value'] : null;
                                        $ProcurementThirdForm->specs_finalization_date = isset($value['specs_finalization_date']) ? date('Y-m-d', strtotime($value['specs_finalization_date'])) : null;
                                        $ProcurementThirdForm->floating_tender_date = isset($value['floating_tender_date']) ? date('Y-m-d', strtotime($value['floating_tender_date'])) : null;
                                        $ProcurementThirdForm->opening_tender_date = isset($value['opening_tender_date']) ? date('Y-m-d', strtotime($value['opening_tender_date'])) : null;
                                        $ProcurementThirdForm->tech_eval_date = isset($value['tech_eval_date']) ? date('Y-m-d', strtotime($value['tech_eval_date'])) : null;
                                        $ProcurementThirdForm->final_eval_date = isset($value['final_eval_date']) ? date('Y-m-d', strtotime($value['final_eval_date'])) : null;
                                        $ProcurementThirdForm->order_placement_date = isset($value['order_placement_date']) ? date('Y-m-d', strtotime($value['order_placement_date'])) : null;
                                        $ProcurementThirdForm->tender_value = isset($value['tender_value']) ? $value['tender_value'] : null;
                                        $ProcurementThirdForm->remarks = isset($value['remarks']) ? $value['remarks'] : null;
                                        $ProcurementThirdForm->form_type = isset($value['order_placement_date']) ? 1 : 0;
                                        $ProcurementThirdForm->created_by = isset($value['created_by']) ? $value['created_by'] : null;
                                        $ProcurementThirdForm->updated_by = isset($value['updated_by']) ? $value['updated_by'] : null;
                                        $ProcurementThirdForm->project_center_id = $value['project_center_id'];
                                        $ProcurementThirdForm->template_id = $new_template_id;
                                        $ProcurementThirdForm->rc_id = $rc_id;
                                        $ProcurementThirdForm->title_id = isset($value['title_id']) ? $value['title_id'] : null;
                                        $ProcurementThirdForm->specs_finalized = isset($value['specs_finalized']) ? $value['specs_finalized'] : null;
                                        $ProcurementThirdForm->tender_type = isset($value['tender_type']) ? $value['tender_type'] : null;
                                        $ProcurementThirdForm->estimated_value = isset($value['estimated_value']) ? $value['estimated_value'] : null;
                                        $ProcurementThirdForm->specs_finalization_date = isset($value['specs_finalization_date']) ? date('Y-m-d', strtotime($value['specs_finalization_date'])) : null;
                                        $ProcurementThirdForm->floating_tender_date = isset($value['floating_tender_date']) ? date('Y-m-d', strtotime($value['floating_tender_date'])) : null;
                                        $ProcurementThirdForm->opening_tender_date = isset($value['opening_tender_date']) ? date('Y-m-d', strtotime($value['opening_tender_date'])) : null;
                                        $ProcurementThirdForm->tech_eval_date = isset($value['tech_eval_date']) ? date('Y-m-d', strtotime($value['tech_eval_date'])) : null;
                                        $ProcurementThirdForm->final_eval_date = isset($value['final_eval_date']) ? date('Y-m-d', strtotime($value['final_eval_date'])) : null;
                                        $ProcurementThirdForm->order_placement_date = isset($value['order_placement_date']) ? date('Y-m-d', strtotime($value['order_placement_date'])) : null;
                                        $ProcurementThirdForm->tender_value = isset($value['tender_value']) ? $value['tender_value'] : null;
                                        $ProcurementThirdForm->remarks = isset($value['remarks']) ? $value['remarks'] : null;
                                        $ProcurementThirdForm->form_type = isset($value['order_placement_date']) ? 1 : 0;
                                        $ProcurementThirdForm->created_by = isset($value['created_by']) ? $value['created_by'] : null;
                                        $ProcurementThirdForm->updated_by = isset($value['updated_by']) ? $value['updated_by'] : null;
                                        $ProcurementThirdForm->project_center_id = $value['project_center_id'];
                                        $ProcurementThirdForm->budget_head = isset($value['budget_head']) ? $value['budget_head'] : null;
                                        $ProcurementThirdForm->contract_amount = isset($value['contract_amount']) ? $value['contract_amount'] : null;                
                                        $ProcurementThirdForm->issue_of_order_date = isset($value['issue_of_order_date']) ? $value['issue_of_order_date'] : null;
                                        $ProcurementThirdForm->delivery_date = isset($value['delivery_date']) ? date('Y-m-d', strtotime($value['delivery_date'])) : null;
                                        $ProcurementThirdForm->installation_date = isset($value['installation_date']) ? date('Y-m-d', strtotime($value['installation_date'])) : null;
                                        $ProcurementThirdForm->satisfactory_certificate_receipt_date = isset($value['satisfactory_certificate_receipt_date']) ? date('Y-m-d', strtotime($value['satisfactory_certificate_receipt_date'])) : null;
                                        $ProcurementThirdForm->invoice_receipt_date = isset($value['invoice_receipt_date']) ? date('Y-m-d', strtotime($value['invoice_receipt_date'])) : null;
                                        $ProcurementThirdForm->approval_of_payment_date = isset($value['approval_of_payment_date']) ? date('Y-m-d', strtotime($value['approval_of_payment_date'])) : null;
                                        $ProcurementThirdForm->payment_release_date = isset($value['payment_release_date']) ? date('Y-m-d', strtotime($value['payment_release_date'])) : null;                
                                        $ProcurementThirdForm->remarks_2 = isset($value['remarks_2']) ? $value['remarks_2'] : null;
                                        $ProcurementThirdForm->form_type = isset($value['budget_head']) ? 2 : 1;
                                        $ProcurementThirdForm->status = isset($value['budget_head']) ? true : false;
                                        $ProcurementThirdForm->created_for = $value['project_center_id'];
                                        // $ProcurementThirdForm->created_for = $value['project_center_id'];                                
                                        $ProcurementThirdForm->save();                                           
                                    }
                                    // Session::flash('message', 'Data has been cloned');
                                    // $rc_id = encode5t($rc_id);
                                    // $current_template_id = encode5t($new_template_id);
                                    // return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]); 
                                }
                                // else
                                // {
                                //     dd(7);
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                                    
                                // } 
                            // $current_template_id = encode5t($new_template_id);
                            // return redirect()->route('manage.pendingdemands.index', [$current_template_id, $centers_id]);                  
                        } 
                        // else
                        // {
                        //     // dd($ex->getMessage());
                        //     $message = 'No Previous template to Copy!';
                        //     return view('404_page', ['message' => $message, 'error_code' => 400]);
                        // }
                    } 
                }
                catch (\Exception $ex) 
                {
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'Something went wrong');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }
                    // Procurement 4rd form
                    // try
                    // {
                    //     $template = ProcurementThirdForm::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                            
                    //     if (count($template) > 0) {
                    //         // dd($template_id);
                    //         if ((int)$new_template_id != $template[0]['template_id']) 
                    //         {
                    //             $template_id = ($template[0]->template_id);
                    //             // dd($template_id);
                    //             $ProcurementThirdForm = ProcurementThirdForm::where('template_id', $template[0]['template_id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                    
                    //             foreach ($ProcurementThirdForm as $key => $value) {
                    //                 $ProcurementThirdForm = new ProcurementThirdForm();
                    //                 $ProcurementThirdForm->project_center_id = $value['project_center_id'];
                    //                 $ProcurementThirdForm->template_id = $new_template_id;
                    //                 $ProcurementThirdForm->rc_id = $rc_id;
                    //                 $ProcurementThirdForm->title_id = isset($value['title_id']) ? $value['title_id'] : null;
                    //                 $ProcurementThirdForm->specs_finalized = isset($value['specs_finalized']) ? $value['specs_finalized'] : null;
                    //                 $ProcurementThirdForm->tender_type = isset($value['tender_type']) ? $value['tender_type'] : null;
                    //                 $ProcurementThirdForm->estimated_value = isset($value['estimated_value']) ? $value['estimated_value'] : null;
                    //                 $ProcurementThirdForm->specs_finalization_date = isset($value['specs_finalization_date']) ? date('Y-m-d', strtotime($value['specs_finalization_date'])) : null;
                    //                 $ProcurementThirdForm->floating_tender_date = isset($value['floating_tender_date']) ? date('Y-m-d', strtotime($value['floating_tender_date'])) : null;
                    //                 $ProcurementThirdForm->opening_tender_date = isset($value['opening_tender_date']) ? date('Y-m-d', strtotime($value['opening_tender_date'])) : null;
                    //                 $ProcurementThirdForm->tech_eval_date = isset($value['tech_eval_date']) ? date('Y-m-d', strtotime($value['tech_eval_date'])) : null;
                    //                 $ProcurementThirdForm->final_eval_date = isset($value['final_eval_date']) ? date('Y-m-d', strtotime($value['final_eval_date'])) : null;
                    //                 $ProcurementThirdForm->order_placement_date = isset($value['order_placement_date']) ? date('Y-m-d', strtotime($value['order_placement_date'])) : null;
                    //                 $ProcurementThirdForm->tender_value = isset($value['tender_value']) ? $value['tender_value'] : null;
                    //                 $ProcurementThirdForm->remarks = isset($value['remarks']) ? $value['remarks'] : null;
                    //                 $ProcurementThirdForm->form_type = isset($value['order_placement_date']) ? 1 : 0;
                    //                 $ProcurementThirdForm->created_by = isset($value['created_by']) ? $value['created_by'] : null;
                    //                 $ProcurementThirdForm->updated_by = isset($value['updated_by']) ? $value['updated_by'] : null;
                    
                    
                    
                    //                 $ProcurementThirdForm->project_center_id = $value['project_center_id'];
                    //                 $ProcurementThirdForm->budget_head = isset($value['budget_head']) ? $value['budget_head'] : null;
                    //                 $ProcurementThirdForm->contract_amount = isset($value['contract_amount']) ? $value['contract_amount'] : null;
                    
                    //                 $ProcurementThirdForm->issue_of_order_date = isset($value['issue_of_order_date']);
                    //                 $ProcurementThirdForm->delivery_date = isset($value['delivery_date']) ? date('Y-m-d', strtotime($value['delivery_date'])) : null;
                    //                 $ProcurementThirdForm->installation_date = isset($value['installation_date']) ? date('Y-m-d', strtotime($value['installation_date'])) : null;
                    //                 $ProcurementThirdForm->satisfactory_certificate_receipt_date = isset($value['satisfactory_certificate_receipt_date']) ? date('Y-m-d', strtotime($value['satisfactory_certificate_receipt_date'])) : null;
                    //                 $ProcurementThirdForm->invoice_receipt_date = isset($value['invoice_receipt_date']) ? date('Y-m-d', strtotime($value['invoice_receipt_date'])) : null;
                    //                 $ProcurementThirdForm->approval_of_payment_date = isset($value['approval_of_payment_date']) ? date('Y-m-d', strtotime($value['approval_of_payment_date'])) : null;
                    //                 $ProcurementThirdForm->payment_release_date = isset($value['payment_release_date']) ? date('Y-m-d', strtotime($value['payment_release_date'])) : null;
                    
                    //                 $ProcurementThirdForm->remarks_2 = isset($value['remarks_2']) ? $value['remarks_2'] : null;
                    //                 $ProcurementThirdForm->form_type = isset($value['budget_head']) ? 2 : 1;
                    //                 $ProcurementThirdForm->status = isset($value['budget_head']) ? true : false;
                    //                 $ProcurementThirdForm->created_for = $value['project_center_id'];
                    
                    
                    //                 $ProcurementThirdForm->save();
                    
                    //                 if ($ProcurementSecondForm->save()) {
                    //                     // return redirect()->route('manage.procurement.index',[$rc_id,$centers_id]);
                    //                     // return response()->json(['success' => true, 'message' => 'Records Created.']);
                    //                 } else {
                    //                     dd(22);
                    //                     $message = 'Somthing went wrong, Please try again...';
                    //                     return view('404_page', ['message' => $message, 'error_code' => 400]);
                    //                     // return response()->json(['success' => false, 'message' => 'Somthing went wrong.']);
                    //                 }
                    //             } 
                                                
                    //         } 
                    //         else
                    //         {
                    //             // dd($ex->getMessage());
                    //             $message = 'No Previous template to Copy!';
                    //             return view('404_page', ['message' => $message, 'error_code' => 400]);
                    //         }
                    //     } 
                    // }
                    // catch (\Exception $ex) 
                    // {
                    //     dd($ex->getMessage());
                    //     $message = 'Somthing went wrong, Please try again...';
                    //     return view('404_page', ['message' => $message, 'error_code' => 400]);
                    // }

                // Procurement 5th form
                try
                {
                    // $template = ProcurementServiceForm::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    $new_template_id = (int)$new_template_id;
                    // $template5 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    $template5 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                        
                    if (count($template5) > 0) {
                        // dd($template_id);
                        if ((int)$new_template_id != $template5[0]['id']) 
                        {
                            $template_id = ($template5[0]['id']);
                            // dd($template_id);
                            $ProcurementServiceForm = ProcurementServiceForm::where('template_id', $template5[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                                if (count($ProcurementServiceForm) > 0) 
                                {
                                    foreach ($ProcurementServiceForm as $key => $value) {
                                        $ProcurementServiceForm_del =   ProcurementServiceForm::where('template_id', $new_template_id)->where('title_id', $value['title_id'])->where('deleted_at', null)->delete();
                                    
                                        $ProcurementServiceForm = new ProcurementServiceForm();
                                        $ProcurementServiceForm->project_center_id = $value['project_center_id'];
                                        $ProcurementServiceForm->template_id = $new_template_id;
                                        $ProcurementServiceForm->rc_id = $rc_id;
                                        $ProcurementServiceForm->title_id = isset($value['title_id']) ? $value['title_id'] : null;
                                        $ProcurementServiceForm->expiry_date_of_existing_contract = isset($value['expiry_date_of_existing_contract']) ? date('Y-m-d', strtotime($value['expiry_date_of_existing_contract'])) : null;
                                        $ProcurementServiceForm->value_of_existing_contract = isset($value['value_of_existing_contract']) ? $value['value_of_existing_contract'] : null;
                                        $ProcurementServiceForm->estimated_value_of_new_tender = isset($value['estimated_value_of_new_tender']) ? $value['estimated_value_of_new_tender'] : null;
                                        $ProcurementServiceForm->tender_type = isset($value['tender_type']) ? $value['tender_type'] : null;
                                        $ProcurementServiceForm->floating_tender_date = isset($value['floating_tender_date']) ? date('Y-m-d', strtotime($value['floating_tender_date'])) : null;
                                        $ProcurementServiceForm->opening_tender_date = isset($value['opening_tender_date']) ? date('Y-m-d', strtotime($value['opening_tender_date'])) : null;
                                        $ProcurementServiceForm->tech_eval_date = isset($value['tech_eval_date']) ? date('Y-m-d', strtotime($value['tech_eval_date'])) : null;
                                        $ProcurementServiceForm->final_eval_date = isset($value['final_eval_date']) ? date('Y-m-d', strtotime($value['final_eval_date'])) : null;
                                        $ProcurementServiceForm->award_of_work_date = isset($value['award_of_work_date']) ? date('Y-m-d', strtotime($value['award_of_work_date'])) : null;
                                        $ProcurementServiceForm->remarks = isset($value['remarks']) ? $value['remarks'] : null;
                                        $ProcurementServiceForm->status = isset($value['award_of_work_date']) ? true : false;
                                        $ProcurementServiceForm->created_by = isset($value['created_by']) ? $value['created_by'] : null;
                                        $ProcurementServiceForm->updated_by = isset($value['updated_by']) ? $value['updated_by'] : null;
                                        $ProcurementServiceForm->created_for = $value['project_center_id'];    
                                        $ProcurementServiceForm->save();
                                    } 
                                    // Session::flash('message', 'Data has been cloned');
                                    // $rc_id = encode5t($rc_id);
                                    // $current_template_id = encode5t($new_template_id);
                                    // return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]); 
                                }
                                // else
                                // {
                                //     // dd(8);
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                                // }                  
                        } 
                        // else
                        // {
                        //     dd(9);
                        //     $rc_id = encode5t($rc_id);
                        //     $current_template_id = encode5t($new_template_id);
                        //     Session::flash('error_message', 'No Previous template to Copy!');
                        //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                        // }
                    } 
                }
                catch (\Exception $ex) 
                {
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'Something went wrong');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }


                if(count($template1) > 0 || count($template2) > 0 || count($template3) > 0 || count($template5) > 0)
                {
                    Session::flash('message', 'Data has been cloned');
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }
                else
                {
                
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'No Previous template to Copy!');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }  
                
            } 
            elseif ($route_parameter == 'miscellaneous') 
            {
                // 1 form 
                try
                {
                    // $template = Miscellaneousmanages::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    // $new_template_id = (int)$new_template_id;
                    // $template6 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get(); 
                    $template6 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
        
                    if (count($template6) > 0) 
                    {
                        // dd($template_id);
                        if ((int)$new_template_id != $template6[0]['id']) 
                        {
                            $template_id = ($template6[0]['id']);
                            // dd($template_id);
                            $Miscellaneousmanages = Miscellaneousmanages::where('template_id', $template6[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                                if (count($Miscellaneousmanages) > 0) 
                                {

                                    foreach ($Miscellaneousmanages as $key => $value) {
                                        $Miscellaneousmanages_del =   Miscellaneousmanages::where('template_id', $new_template_id)->where('detail_cwp_slp', $value['detail_cwp_slp'])->where('deleted_at', null)->delete();
                                    
                                        $created_by = $rc_id;
                                        $Miscellaneousmanagesss = new Miscellaneousmanages();
                                        $Miscellaneousmanagesss->template_id = $new_template_id;
                                        $Miscellaneousmanagesss->project_center_id = $value['project_center_id'];
                                        $Miscellaneousmanagesss->detail_cwp_slp = $value['detail_cwp_slp'];
                                        // $Miscellaneousmanagesss->template_id = $value['template_id'];
                                        $Miscellaneousmanagesss->court = $value['court'];
                                        $Miscellaneousmanagesss->court_case = $value['court_case'];
                                        $Miscellaneousmanagesss->parties = $value['parties'];
                                        $Miscellaneousmanagesss->case_ststus = $value['case_ststus'];
                                        $Miscellaneousmanagesss->name_counsel = $value['name_counsel'];
                                        $Miscellaneousmanagesss->last_date_hearing = $value['last_date_hearing'];
                                        $Miscellaneousmanagesss->last_hearing_status = $value['last_hearing_status'];
                                        $Miscellaneousmanagesss->present_status = $value['present_status'];
                                        $Miscellaneousmanagesss->next_day_hearing = $value['next_day_hearing'];
                                        $Miscellaneousmanagesss->next_day_hearing_option_date =  $value['next_day_hearing_option_date'];
                                        $Miscellaneousmanagesss->next_day_hearing_option_text = $value['next_day_hearing_option_text'];
                                        $Miscellaneousmanagesss->remarks = $value['remarks'];
                                        $Miscellaneousmanagesss->user_id = $rc_id;
                                        $Miscellaneousmanagesss->created_by = $rc_id;
                                        $Miscellaneousmanagesss->rc_id = $rc_id;
                                        $Miscellaneousmanagesss->status = 1;
                                        $Miscellaneousmanagesss->created_for = $value['project_center_id'];
                                        $Miscellaneousmanagesss->save();
                                    } 
                                }
                                // else
                                // {
                                //     // dd(1);
                                //     // dd($ex->getMessage());
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                                
                                // }    
                            // $current_template_id = encode5t($new_template_id);
                            // return redirect()->route('manage.procurement.index', [$current_template_id, $centers_id]);                  
                        } 
                        // else
                        // {
                        //     dd(2);
                        //     $rc_id = encode5t($rc_id);
                        //     $current_template_id = encode5t($new_template_id);
                        //     Session::flash('error_message', 'No Previous template to Copy!');
                        //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                        // }
                    }

                }
                catch (\Exception $ex) 
                {
                    // dd(3);
                    // dd($ex->getMessage());
                    $message = 'Somthing went wrong, Please try again...';
                    return view('404_page', ['message' => $message, 'error_code' => 400]);
                }
                // 2 form  
                try
                {
                    
                    // $template = Miscretirement::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    // $new_template_id = (int)$new_template_id;
                    // $template7 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get(); 
                    $template7 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                        
                    if (count($template7) > 0) 
                    {
                        // dd($template_id);
                        if ((int)$new_template_id != $template7[0]['id']) 
                        {
                            $template_id = ($template7[0]['id']);
                            // dd($template_id);
                            $Miscretirement = Miscretirement::where('template_id', $template7[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                                if (count($Miscretirement) > 0) 
                                {
                                    $Miscretirement_del =   Miscretirement::where('template_id', $new_template_id)->where('rc_id', $rc_id)->where('deleted_at', null)->delete();

                                    foreach ($Miscretirement as $key => $value) {                                       
                                    
                                        $created_by = $rc_id;
                                        $Miscretirementsss = new Miscretirement();
                                        $Miscretirementsss->template_id = $new_template_id;
                                        $Miscretirementsss->project_center_id = $value['project_center_id'];
                                        $Miscretirementsss->retir_name_employee = $value['retir_name_employee'];
                                        // $Miscellaneousmanagesss->template_id = $value['template_id'];
                                        $Miscretirementsss->retir_name_designation = $value['retir_name_designation'];
                                        $Miscretirementsss->name_place_posting = $value['name_place_posting'];
                                        $Miscretirementsss->details_date_retirement = $value['details_date_retirement'];
                                        $Miscretirementsss->details_name_group = $value['details_name_group'];
                                        $Miscretirementsss->leave_encashment = $value['leave_encashment'];
                                        $Miscretirementsss->details_pension = $value['details_pension'];
                                        $Miscretirementsss->gratuity = $value['gratuity'];
                                        $Miscretirementsss->commutation = $value['commutation'];
                                        $Miscretirementsss->starting_date_pension = $value['starting_date_pension'];
                                        $Miscretirementsss->remarks = $value['remarks'];
                                        $Miscretirementsss->user_id = $rc_id;
                                        $Miscretirementsss->created_by = $rc_id;
                                        $Miscretirementsss->rc_id = $rc_id;
                                        $Miscretirementsss->status = 1;
                                        $Miscretirementsss->created_for = $value['project_center_id'];
                                        $Miscretirementsss->save();
                                    }
                                }
                                // else
                                // {
                                //     dd(4);
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                                
                                // }
                            // $current_template_id = encode5t($new_template_id);
                            // return redirect()->route('manage.procurement.index', [$current_template_id, $centers_id]);                  
                        } 
                        // else
                        // {
                        //     dd(5);
                        //     // dd($ex->getMessage());
                        //     $rc_id = encode5t($rc_id);
                        //     $current_template_id = encode5t($new_template_id);
                        //     Session::flash('error_message', 'No Previous template to Copy!');
                        //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                        // }
                    } 
                    
                }
                catch (\Exception $ex) 
                {
                    dd(6);
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'No Previous template to Copy!');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }                
                // 3 form
                try
                {
                    // $template = Miscinfraawardtender::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                    // $new_template_id = (int)$new_template_id;
                    // $template8 = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get(); 
                    $template8 = Template::Where('rc_id', 'like', '%' . $rc_id . '%')->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                        
                    if (count($template8) > 0) 
                    {
                        // dd($template_id);
                        if ((int)$new_template_id != $template8[0]['id']) 
                        {
                            $template_id = ($template8[0]['id']);
                            // dd($template_id);
                            $Miscinfraawardtender = Miscinfraawardtender::where('template_id', $template8[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                            if (count($Miscinfraawardtender) > 0) 
                                {
                                    $Miscinfraawardtender_del =   Miscinfraawardtender::where('template_id', $new_template_id)->where('rc_id', $value['rc_id'])->where('deleted_at', null)->delete();

                                    foreach ($Miscinfraawardtender as $key => $value) {                                        
                                    
                                        $created_by = $rc_id;
                                        $Miscinfraawardtenders = new Miscinfraawardtender();
                                        $Miscinfraawardtenders->template_id = $new_template_id;
                                        $Miscinfraawardtenders->project_center_id = $value['project_center_id'];
                                        $Miscinfraawardtenders->infraemployee = $value['infraemployee'];
                                        // $Miscellaneousmanagesss->template_id = $value['template_id'];
                                        $Miscinfraawardtenders->infradesignation = $value['infradesignation'];
                                        $Miscinfraawardtenders->encashment = $value['encashment'];
                                        $Miscinfraawardtenders->pension = $value['pension'];
                                        $Miscinfraawardtenders->gratuity = $value['gratuity'];
                                        $Miscinfraawardtenders->commutation = $value['commutation'];
                                        $Miscinfraawardtenders->remarks = $value['remarks'];
                                        $Miscinfraawardtenders->user_id = $rc_id;
                                        $Miscinfraawardtenders->created_by = $rc_id;
                                        $Miscinfraawardtenders->rc_id = $rc_id;
                                        $Miscinfraawardtenders->status = 1;
                                        $Miscinfraawardtenders->created_for = $value['project_center_id'];
                                        $Miscinfraawardtenders->save();
                                    }
                                    Session::flash('message', 'Data has been cloned');
                                    $rc_id = encode5t($rc_id);
                                    $current_template_id = encode5t($new_template_id);
                                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]); 
                                }
                                // else                                
                                // {
                                //     // dd(7);
                                //     $rc_id = encode5t($rc_id);
                                //     $current_template_id = encode5t($new_template_id);
                                //     Session::flash('error_message', 'No Previous template to Copy!');
                                //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);

                                // } 
                            // $current_template_id = encode5t($new_template_id);
                            // return redirect()->route('manage.procurement.index', [$current_template_id, $centers_id]);                  
                        } 
                        // else
                        // {
                        //     // dd(7);
                        //     // dd($ex->getMessage());
                        //     $rc_id = encode5t($rc_id);
                        //     $current_template_id = encode5t($new_template_id);
                        //     Session::flash('error_message', 'No Previous template to Copy!');
                        //     return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                        // }
                    } 
                    
                }
                catch (\Exception $ex) 
                {
                    $rc_id = encode5t($rc_id);
                    $current_template_id = encode5t($new_template_id);
                    Session::flash('error_message', 'Something went wrong');
                    return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                }                
                    if(count($template6) > 0 || count($template7) > 0 || count($template8) > 0)
                    {
                        Session::flash('message', 'Data has been cloned');
                        $rc_id = encode5t($rc_id);
                        $current_template_id = encode5t($new_template_id);
                        return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);
                    }
                    else
                    {                       
                            // dd($ex->getMessage());
                            $rc_id = encode5t($rc_id);
                            $current_template_id = encode5t($new_template_id);
                            Session::flash('error_message', 'No Previous template to Copy!');
                            return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);                        
                    }
                
            } 
            elseif ($route_parameter == 'pendingdemands') 
            {
                // $template = Pendingdemandsmanage::where('rc_id', $rc_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get();
                // $new_template_id = (int)$new_template_id;
                // $template = Template::where('rc_id', $rc_id)->where('id', '<',$new_template_id)->where('deleted_at', null)->orderBy('id', 'desc')->limit(1)->get(); 
                    
                if (count($template) > 0) 
                {
                    // dd($template_id);
                    if ((int)$new_template_id != $template[0]['id']) 
                    {
                        $template_id = ($template[0]['id']);
                        // dd($template_id);
                        $Pendingdemandsmanage = Pendingdemandsmanage::where('template_id', $template[0]['id'])->where('rc_id', $rc_id)->where('deleted_at', null)->get();
                        // dd($Pendingdemandsmanage);
                            if (count($Pendingdemandsmanage) > 0) 
                            {            
                                // dd($Pendingdemandsmanage);            
                                
                                $Pendingdemandsmanage_del =   Pendingdemandsmanage::where('template_id', $new_template_id)->where('deleted_at', null)->delete();

                                foreach ($Pendingdemandsmanage as $key => $value) {    
                                    
                                    $created_by = $rc_id;
                                    $pendingdemandss = new Pendingdemandsmanage();
                                    $pendingdemandss->project_center_id = $value['project_center_id'];
                                    $pendingdemandss->particulars = $value['particulars'];
                                    $pendingdemandss->template_id = $new_template_id;
                                    $pendingdemandss->last_correspondence_regional = $value['last_correspondence_regional'];
                                    $pendingdemandss->concerned_division_personnel = $value['concerned_division_personnel'];
                                    $pendingdemandss->row_status = $value['row_status'];
                                    $pendingdemandss->remarks = $value['remarks'];
                                    $pendingdemandss->user_id = $rc_id;
                                    $pendingdemandss->created_by = $rc_id;
                                    $pendingdemandss->rc_id = $rc_id;
                                    $pendingdemandss->status = 1;
                                    $pendingdemandss->created_for = $value['project_center_id'];
                                    $pendingdemandss->save();    
                                } 
                                
                                Session::flash('message', 'Data has been cloned');
                                $rc_id = encode5t($rc_id);
                                $current_template_id = encode5t($new_template_id);
                                return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]); 
                            }
                            else
                            {
                                dd(11);
                                $rc_id = encode5t($rc_id);
                                $current_template_id = encode5t($new_template_id);
                                Session::flash('error_message', 'No Previous template to Copy!');
                                return redirect()->route('temp.manage.perticularTemp', [$rc_id, $current_template_id]);

                            }
                    } 
                    else
                    {
                        // dd(12);
                        // dd($ex->getMessage());
                        $message = 'Somthing went wrong, Please try again...';
                        return view('404_page', ['message' => $message, 'error_code' => 400]);
                    }
                } 
            } 
        }
        catch (\Exception $ex) 
        {

            // dd($ex->getMessage());
            $message = 'Somthing went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }
}
