<?php

namespace App\Http\Controllers\Front\Manage;

use App\Http\Controllers\Controller;
use App\Models\Review\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Review\SessionMaster;
use App\Models\Review\ReviewSportData;
use App\Models\DesciplineMaster;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\PDF;
use PDF;
use App\Models\Masters\Rcacademymapping;
use App\Models\Review\DomicileAthlete;
use App\Models\Review\NcoeAthlete;

//shubham

use App\Models\Review\Form_two;
use App\Models\Review\Formtwomain;
use App\Models\Review\Part_two_achieve_accommods;
use App\Models\Review\Part_two_kitchen_dining;
use App\Models\Review\Part_two_other_facilitie;
use App\Models\Review\part_two_utilization_fund;
use App\Models\Review\FormTwoEquipment;
use App\Models\Review\FormTwoEquipment_consumable;
use App\Models\Review\FormTwoSportScience;
use App\Models\Review\FormTwoAddStaffAdministrator;


// Ankit
use App\Models\Review\Parttwocoachsupportstaffs;
use App\Models\Review\Parttwoathletes;
use App\Models\Review\Parttwostrengthresidentialcoachesdisciplines;
use App\Models\Review\Staffnutritionistchefs;
use App\Models\Review\Sportsciencestaffdoctors;


// momu

use App\Models\Review\part_three_dis_discounted;
use App\Models\Review\Part_three_dis_added;
use App\Models\Review\Part_three_main;
use App\Models\Review\part_three_table_coache;
use App\Models\Review\Part_three_table_discipline;


class ReviewController extends Controller
{
    public function index()
    {
        return view('front.pages.review.index');
    }

    public function partOneStepOne($center_id = 0)
    {
//dd(Session::get('rc_id')->rc_id);
        // dd(Session::get('rc_id'));
        //dd(Session::get('role_details'));
        // dd(Session::get('user'));
        //dd(Session::get('role_details')->name);
        if (Session::get('role_details')->name == 'RC') {
            $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['rc_id', '=', Session::get('rc_id')->rc_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id','ncoe_name')->get();
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type',1)->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->groupBy('discipline_id','discipline')->get();
        } elseif (Session::get('role_details')->name == 'NCOE') {
            $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['ncoe_id', '=', Session::get('user')->user_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id','ncoe_name')->get();
           // $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', Session::get('user')->user_id]])->select('academy_name', 'academy_id')->get();
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type',1)->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->groupBy('discipline_id','discipline')->get();
        }

        if ($center_id != 0) {
            $c_id = decode5t($center_id);
        } else {

            $c_id =  $centers[0]->ncoe_id;
        }
        $form_one = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-1']])->get();
        $form_two = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-2']])->get();
        $form_three = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-3']])->get();
        $form_four = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['category', '=', 'category-1']])->get();
        $form_five = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['category', '=', 'category-2']])->get();
        $form_six = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['category', '=', 'category-3']])->get();
        $form_seven = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['level', '=', 'national']])->get();
        $form_eight = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['level', '=', 'national']])->get();


        return view('front.pages.review.part_one_step_one', [
            'form_one' => $form_one,
            'form_two' => $form_two,
            'form_three' => $form_three,
            'form_four' => $form_four,
            'form_five' => $form_five,
            'form_six' => $form_six,
            'form_seven' => $form_seven,
            'form_eight' => $form_eight,
            'dis_list' => $dis_list,
            'centers' => $centers,
            'dis_list_json' => json_encode($dis_list),
            'form_one' => $form_one,
            'c_id' => $c_id
        ]);
    }

    public function partOneStepOneStore(Request $request)
    {
        //dd($request->all());
        if (isset($request->step_one['form_1'])) {
            foreach ($request->step_one['form_1'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_2'])) {
            foreach ($request->step_one['form_2'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_3'])) {
            foreach ($request->step_one['form_3'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_4'])) {
            foreach ($request->step_one['form_4'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_5'])) {
            foreach ($request->step_one['form_5'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_6'])) {
            foreach ($request->step_one['form_6'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_7'])) {
            foreach ($request->step_one['form_7'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->level = $value['level'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_8'])) {
            foreach ($request->step_one['form_8'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->level = $value['level'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        return redirect()->route('review.partOneStepTwo', [encode5t($request->step_one['created_for'])]);
    }

    public function partOneStepTwo($center_id)
    {

        $c_id = decode5t($center_id);

        if (Session::get('role_details')->name == 'RC') {
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('rc_id')->rc_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type',2)->where('rc_id',  Session::get('rc_id')->rc_id)->orderBy('discipline')->get();
        } else {
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=',Session::get('user')->user_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type',2)->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->get();
        }
        $form_one = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-1']])->get();
        $form_two = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-2']])->get();
        $form_three = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-3']])->get();
        $form_four = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'participation'], ['category', '=', 'category-1']])->get();
        $form_five = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'participation'], ['category', '=', 'category-2']])->get();
        $form_six = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'participation'], ['category', '=', 'category-3']])->get();
        $form_seven = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'medals_won'], ['level', '=', 'national']])->get();
        $form_eight = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'team'], ['form_type', '=', 'participation'], ['level', '=', 'national']])->get();


        return view('front.pages.review.part_one_step_two', [
            'form_one' => $form_one,
            'form_two' => $form_two,
            'form_three' => $form_three,
            'form_four' => $form_four,
            'form_five' => $form_five,
            'form_six' => $form_six,
            'form_seven' => $form_seven,
            'form_eight' => $form_eight,
            'dis_list' => $dis_list,
            'centers' => $centers,
            'dis_list_json' => json_encode($dis_list),
            'form_one' => $form_one,
            'c_id' => $c_id,
        ]);
    }
    public function partOneStepTwoStore(Request $request)
    {
       // dd($request->all());
        if (isset($request->step_two['form_1'])) {
            foreach ($request->step_two['form_1'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_2'])) {
            foreach ($request->step_two['form_2'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_3'])) {
            foreach ($request->step_two['form_3'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_4'])) {
            foreach ($request->step_two['form_4'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_5'])) {
            foreach ($request->step_two['form_5'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_6'])) {
            foreach ($request->step_two['form_6'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->category = $value['category'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_7'])) {
            foreach ($request->step_two['form_7'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->level = $value['level'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_two['form_8'])) {
            foreach ($request->step_two['form_8'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->level = $value['level'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_two['created_for'];
                $model->save();
            }
        }

        return redirect()->route('review.partOneStepThree', [encode5t($request->step_two['created_for'])]);
    }

    public function partOneStepThree($center_id)
    {
        $c_id = decode5t($center_id);

        if (Session::get('role_details')->name == 'RC') {
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=',Session::get('rc_id')->rc_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->get();
        } else {
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('user')->user_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->get();
        }
        $states = DB::table('state_masters')->get();
        $form_one = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'senior_national_coaching_camp']])->get();
         $form_two = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'junior_national_coaching_camp']])->get();
        $form_three = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'under_tops']])->get();
        $form_four = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'under_developmental_athlete']])->get();
        $form_five = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'under_ki']])->get();
        $form_six = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'weeded_out']])->get();
        $form_seven = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'newly_inducted']])->get();
        $form_eight = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'athletes_retained']])->get();
        $form_nine = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'employment_higher_studies']])->get();
        $form_ten = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'scheme_personal_reasons']])->get();
        $form_eleven = DB::table('domicile_athletes')->whereCreatedFor($c_id)->get();
        $form_twelve = NcoeAthlete::whereCreatedFor($c_id)->get();

       // $form_twelve = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'common'], ['form_type', '=', 'senior_national_coaching_camp']])->get();


        return view('front.pages.review.part_one_step_three', [
            'form_one' => $form_one,
            'form_two' => $form_two,
            'centers' => $centers,
            'dis_list' => $dis_list,
            'dis_list_json' => json_encode($dis_list),
            'form_three' => $form_three,
            'form_four' => $form_four,
            'form_five' => $form_five,
            'form_six' => $form_six,
            'form_seven' => $form_seven,
            'form_eight' => $form_eight,
            'form_nine' => $form_nine,
            'form_ten' => $form_ten,
            'form_11' => $form_eleven,
            'form_12' => $form_twelve,
            'dis_list' => $dis_list,
            'centers' => $centers,
            'dis_list_json' => json_encode($dis_list),
            'c_id' =>$c_id,
            'states' => $states,
            'states_json' => json_encode($states),

        ]);

    }
    public function partOneStepThreeStore(Request $request)
    {


        if (isset($request->step_three['form_1'])) {
            foreach ($request->step_three['form_1'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_2'])) {
            foreach ($request->step_three['form_2'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_3'])) {
            foreach ($request->step_three['form_3'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_4'])) {
            foreach ($request->step_three['form_4'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_5'])) {
            foreach ($request->step_three['form_5'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_6'])) {
            foreach ($request->step_three['form_6'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_7'])) {
            foreach ($request->step_three['form_7'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_8'])) {
            foreach ($request->step_three['form_8'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_9'])) {
            foreach ($request->step_three['form_9'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_10'])) {
            foreach ($request->step_three['form_10'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->m_2018_19 = $value['m_2018_19'];
                $model->f_2018_19 = $value['f_2018_19'];
                $model->m_2019_20 = $value['m_2019_20'];
                $model->f_2019_20 = $value['f_2019_20'];
                $model->m_2020_21 = $value['m_2020_21'];
                $model->f_2020_21 = $value['f_2020_21'];
                $model->m_2021_22 = $value['m_2021_22'];
                $model->f_2021_22 = $value['f_2021_22'];
                $model->m_2022_23 = $value['m_2022_23'];
                $model->f_2022_23 = $value['f_2022_23'];
                $model->team_type = $value['team_type'];
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_11'])) {
            foreach ($request->step_three['form_11'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = DomicileAthlete::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new DomicileAthlete();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->state_id = $value['state_id'];
                $model->no_of_male = $value['no_of_male'];
                $model->no_of_female = $value['no_of_female'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_three['form_12'])) {
            foreach ($request->step_three['form_12'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = NcoeAthlete::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new NcoeAthlete();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                $model->kia_male = $value['kia_male'];
                $model->kia_female = $value['kia_female'];
                $model->stc_male = $value['stc_male'];
                $model->stc_female = $value['stc_female'];
                $model->state_ac_male = $value['state_ac_male'];
                $model->state_ac_female = $value['state_ac_female'];
                $model->pvt_ac_male = $value['pvt_ac_male'];
                $model->pvt_ac_female = $value['pvt_ac_female'];
                $model->open_trials_male = $value['open_trials_male'];
                $model->open_trials_female = $value['open_trials_female'];
                $model->play_scheme_male = $value['play_scheme_male'];
                $model->play_scheme_female = $value['play_scheme_female'];
                $model->status = true;
                $model->created_for = $request->step_three['created_for'];
                $model->save();
            }
        }

        return redirect()->route('review.index');
    }
    public function deleteDatabyId($id)
    {

        $Users = new ReviewSportData;
        $Users = ReviewSportData::find($id);
        $Users->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
    }
    public function deleteDomicile($id)
    {

        //$Users = new ReviewSportData;
        $Users = DomicileAthlete::find($id);
        $Users->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
    }
    public function deleteNcoeAthletes($id)
    {

        //$Users = new ReviewSportData;
        $Users = NcoeAthlete::find($id);

        $Users->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
    }


    ///////////////Shubham////////////////
    // part two show form
    public function partTwoform($center_id){


        // dd(Session::get('user')->user_id);

            $user_id = decode5t($center_id);
            $data=Formtwomain::where('user_id',$user_id)->with('playField')->first();
            $accommods=Part_two_achieve_accommods::where('form_id',$user_id)->first();
            $kichen=Part_two_kitchen_dining::where('form_id',$user_id)->first();
            $other_facilities=Part_two_other_facilitie::where('form_id',$user_id)->first();
            $utilization =part_two_utilization_fund::where('form_id',$user_id)->first();
            $parttwocoachsupportstaff = Parttwocoachsupportstaffs::where('created_by',$user_id)->where('deleted_by','=', null)->get();
            $parttwoathlete = parttwoathletes::where('created_by',$user_id)->where('deleted_at','=', null)->get();

            $parttwostrengthresidentialcoachesdisciplines = Parttwostrengthresidentialcoachesdisciplines::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $staffnutritionistchefs = Staffnutritionistchefs::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $sportsciencestaffdoctor = Sportsciencestaffdoctors::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $part_two_play_field_count = Form_two::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $sport_quipment = FormTwoEquipment::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $sport_quipment_consumable = FormTwoEquipment_consumable::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $sport_quipment_science = FormTwoSportScience::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            $add_staff_add = FormTwoAddStaffAdministrator::where('created_by',$user_id)->where('deleted_at','=', null)->get();
            // if (Session::get('role_details')->name == 'RC') {
            //     $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('rc_id')->rc_id]])->select('academy_name', 'academy_id')->get();
            //     $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->get();
            // } elseif (Session::get('role_details')->name == 'NCOE') {
            //     $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', Session::get('user')->user_id]])->select('academy_name', 'academy_id')->get();
            //     $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->get();
            // }

            if (Session::get('role_details')->name == 'RC') {
                $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['rc_id', '=', Session::get('rc_id')->rc_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id','ncoe_name')->get();
                $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->get();
            } elseif (Session::get('role_details')->name == 'NCOE') {
                $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['ncoe_id', '=', Session::get('user')->user_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id','ncoe_name')->get();
               // $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', Session::get('user')->user_id]])->select('academy_name', 'academy_id')->get();
                $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->get();
            }

            // dd($centers);
            //   dd(decode5t($center_id));
            // if ($center_id != 0) {
            //     $c_id = decode5t($center_id);
            // } else {

            //     $c_id =  $centers[0]->academy_id;
            // }

            // dd($sport_quipment_consumable );
            return view('front.pages.review.part_two',[
                        'data' => $data,
                        'id'=>$center_id,
                        'accommods' => $accommods,
                        'kichen'=>$kichen,
                        'other_facilities'=>$other_facilities,
                        'utilization'=>$utilization,
                        'parttwocoachsupportstaff' => $parttwocoachsupportstaff,
                        'parttwoathlete' => $parttwoathlete,
                        'parttwostrengthresidentialcoachesdisciplines' => $parttwostrengthresidentialcoachesdisciplines,
                        'staffnutritionistchefs' => $staffnutritionistchefs,
                        'sportsciencestaffdoctor' => $sportsciencestaffdoctor,
                        'part_two_play_field_count' => $part_two_play_field_count,
                        'sport_quipment' => $sport_quipment,
                        'sport_quipment_consumable' => $sport_quipment_consumable,
                        'sport_quipment_science' => $sport_quipment_science,
                        'add_staff_add' => $add_staff_add,
                        'dis_list'=>$dis_list,
                        'centers'=>$centers,
                        'dis_list_json'=>json_encode($dis_list),
                    ]);

        }

        public function partTwoformStore(Request $request){
            // dd($request->all());
            // dd(decode5t($request->user_id));
            $main=Formtwomain::where('user_id',decode5t($request->user_id))->with('playField')->first();
            $accomodation=Part_two_achieve_accommods::where('form_id',decode5t($request->user_id))->first();
            $kichen=Part_two_kitchen_dining::where('form_id',decode5t($request->user_id))->first();
            $other_facilities=Part_two_other_facilitie::where('form_id',decode5t($request->user_id))->first();
            $utilization=part_two_utilization_fund::where('form_id',decode5t($request->user_id))->first();

            if(!isset($main) || empty($main)){
            $main= new Formtwomain;
            }
            $main->cat_radio=$request->cat_radio;
            $main->area_land=$request->area_land;
            $main->area_heactor=$request->area_heactor;
            $main->user_id=decode5t($request->user_id);
            $main->save();

            //accomodation  ---
            if(!isset($accomodation) || empty($accomodation)){
                $accomodation =  new Part_two_achieve_accommods;
            }
            // $accomodation =  new Part_two_achieve_accommods;
            $accomodation->form_id = $main->user_id;
            $accomodation->accommods_part_two_rooms_male_ac = $request->accommods_part_two_rooms_male_ac;
            $accomodation->accommods_part_two_rooms_male_ac_rating = $request->accommods_part_two_rooms_male_ac_rating;
            $accomodation->accommods_part_two_rooms_male_nonac = $request->accommods_part_two_rooms_male_nonac;
            $accomodation->accommods_part_two_rooms_male_nonacrating = $request->accommods_part_two_rooms_male_nonacrating;
            $accomodation->accommods_part_two_rooms_female_ac = $request->accommods_part_two_rooms_female_ac    ;
            $accomodation->accommods_part_two_rooms_female_ac_rating = $request->accommods_part_two_rooms_female_ac_rating;
            $accomodation->accommods_part_two_rooms_female_nonac = $request->accommods_part_two_rooms_female_nonac;
            $accomodation->accommods_part_two_rooms_female_nonacrating = $request->accommods_part_two_rooms_female_nonacrating;
            $accomodation->accommods_part_two_rooms_remark = $request->accommods_part_two_rooms_remark;
            $accomodation->accommods_part_two_accomodation_capacity_male_ac = $request->accommods_part_two_accomodation_capacity_male_ac;
            $accomodation->accommods_part_two_accomodation_capacity_male_ac_rating = $request->accommods_part_two_accomodation_capacity_male_ac_rating;
            $accomodation->accommods_part_two_accomodation_capacity_male_nonac = $request->accommods_part_two_accomodation_capacity_male_nonac;
            $accomodation->accommods_part_two_accomodation_capacity_male_nonacrating = $request->accommods_part_two_accomodation_capacity_male_nonacrating;
            $accomodation->accommods_part_two_accomodation_capacity_female_ac = $request->accommods_part_two_accomodation_capacity_female_ac;
            $accomodation->accommods_part_two_accomodation_capacity_female_ac_rating = $request->accommods_part_two_accomodation_capacity_female_ac_rating;
            $accomodation->accommods_part_two_accomodation_capacity_female_nonac = $request->accommods_part_two_accomodation_capacity_female_nonac;
            $accomodation->accommods_part_two_accomodation_capacityrooms_female_nonacrating = $request->accommods_part_two_accomodation_capacityrooms_female_nonacrating;
            $accomodation->accommods_part_two_accomodation_capacity_remark = $request->accommods_part_two_accomodation_capacity_remark;
            $accomodation->accommods_part_two_dormitory_male_ac = $request->accommods_part_two_dormitory_male_ac;
            $accomodation->accommods_part_two_dormitory_male_ac_rating = $request->accommods_part_two_dormitory_male_ac_rating;
            $accomodation->accommods_part_two_dormitory_male_nonac = $request->accommods_part_two_dormitory_male_nonac;
            $accomodation->accommods_part_two_dormitory_male_nonacrating = $request->accommods_part_two_dormitory_male_nonacrating;
            $accomodation->accommods_part_two_dormitory_female_ac = $request->accommods_part_two_dormitory_female_ac;
            $accomodation->accommods_part_two_dormitory_female_ac_rating = $request->accommods_part_two_dormitory_female_ac_rating;
            $accomodation->accommods_part_two_dormitory_female_nonac = $request->accommods_part_two_dormitory_female_nonac;
            $accomodation->accommods_part_two_dormitory_female_nonacrating = $request->accommods_part_two_dormitory_female_nonacrating;
            $accomodation->accommods_part_two_dormitory_remark = $request->accommods_part_two_dormitory_remark;
            $accomodation->accommods_part_two_capacity_dormitory_male_ac = $request->accommods_part_two_capacity_dormitory_male_ac;
            $accomodation->accommods_part_two_capacity_dormitory_male_ac_rating = $request->accommods_part_two_capacity_dormitory_male_ac_rating;
            $accomodation->accommods_part_two_capacity_dormitory_male_nonac = $request->accommods_part_two_capacity_dormitory_male_nonac;
            $accomodation->accommods_part_two_capacity_dormitory_male_nonacrating = $request->accommods_part_two_capacity_dormitory_male_nonacrating;
            $accomodation->accommods_part_two_capacity_dormitory_female_ac = $request->accommods_part_two_capacity_dormitory_female_ac;
            $accomodation->accommods_part_two_capacity_dormitory_female_ac_rating = $request->accommods_part_two_capacity_dormitory_female_ac_rating;
            $accomodation->accommods_part_two_capacity_dormitory_female_nonac = $request->accommods_part_two_capacity_dormitory_female_nonac;
            $accomodation->accommods_part_two_capacity_dormitory_female_nonacrating = $request->accommods_part_two_capacity_dormitory_female_nonacrating;
            $accomodation->accommods_part_two_capacity_dormitory_remark = $request->accommods_part_two_capacity_dormitory_remark;
            $accomodation->accommods_part_two_toilet_attached_male_ac = $request->accommods_part_two_toilet_attached_male_ac;
            $accomodation->accommods_part_two_toilet_attached_male_ac_rating = $request->accommods_part_two_toilet_attached_male_ac_rating;
            $accomodation->accommods_part_two_toilet_attached_male_nonac = $request->accommods_part_two_toilet_attached_male_nonac;
            $accomodation->accommods_part_two_toilet_attached_male_nonacrating = $request->accommods_part_two_toilet_attached_male_nonacrating;
            $accomodation->accommods_part_two_toilet_attached_female_ac = $request->accommods_part_two_toilet_attached_female_ac;
            $accomodation->accommods_part_two_toilet_attached_female_ac_rating = $request->accommods_part_two_toilet_attached_female_ac_rating;
            $accomodation->accommods_part_two_toilet_attached_female_nonac = $request->accommods_part_two_toilet_attached_female_nonac;
            $accomodation->accommods_part_two_toilet_attached_female_nonacrating = $request->accommods_part_two_toilet_attached_female_nonacrating;
            $accomodation->accommods_part_two_toilet_attached_remark = $request->accommods_part_two_toilet_attached_remark;
            $accomodation->accommods_part_two_toilet_non_attached_male_ac = $request->accommods_part_two_toilet_non_attached_male_ac;
            $accomodation->accommods_part_two_toilet_non_attached_male_ac_rating = $request->accommods_part_two_toilet_non_attached_male_ac_rating;
            $accomodation->accommods_part_two_toilet_non_attached_male_nonac = $request->accommods_part_two_toilet_non_attached_male_nonac;
            $accomodation->accommods_part_two_toilet_non_attached_male_nonacrating = $request->accommods_part_two_toilet_non_attached_male_nonacrating;
            $accomodation->accommods_part_two_toilet_non_attached_female_ac = $request->accommods_part_two_toilet_non_attached_female_ac;
            $accomodation->accommods_part_two_toilet_non_attached_female_ac_rating = $request->accommods_part_two_toilet_non_attached_female_ac_rating;
            $accomodation->accommods_part_two_toilet_non_attached_female_nonac = $request->accommods_part_two_toilet_non_attached_female_nonac;
            $accomodation->accommods_part_two_toilet_non_attached_remark = $request->accommods_part_two_toilet_non_attached_remark;
            $accomodation->status = 1;
            // $accomodation->created_by = '';
            // $accomodation->updated_by = '';
            // $accomodation->deleted_by = '';
            // $accomodation->created_for = '';
            // $accomodation->created_at = '';
            // $accomodation->updated_at = '';
            // $accomodation->deleted_at = '';
            $accomodation->save();

            //kichen  --------------------------------------------------------
            if(!isset($kichen) || empty($kichen)){
                $kichen =  new Part_two_kitchen_dining;
            }
            // $kichen = new Part_two_kitchen_dining;
            $kichen->form_id = $main->user_id;
            $kichen->kitchen_dinings_dining_hall_ac_count = $request->kitchen_dinings_dining_hall_ac_count;
            $kichen->kitchen_dinings_dining_hall_area_male = $request->kitchen_dinings_dining_hall_area_male;
            $kichen->kitchen_dinings_dining_hall_area_female = $request->kitchen_dinings_dining_hall_area_female;
            $kichen->kitchen_dinings_dining_hall_rating = $request->kitchen_dinings_dining_hall_rating;
            $kichen->kitchen_dinings_dining_hall_nonac_ac_count = $request->kitchen_dinings_dining_hall_nonac_ac_count    ;
            $kichen->kitchen_dinings_dining_hall_nonac_area_male = $request->kitchen_dinings_dining_hall_nonac_area_male;
            $kichen->kitchen_dinings_dining_hall_nonac_area_female = $request->kitchen_dinings_dining_hall_nonac_area_female;
            $kichen->kitchen_dinings_dining_hall_nonac_rating = $request->kitchen_dinings_dining_hall_nonac_rating;
            $kichen->kitchen_dinings_dining_hall_remarks = $request->kitchen_dinings_dining_hall_remarks;
            $kichen->kitchen_kitchen_hall_ac_count = $request->kitchen_kitchen_hall_ac_count;
            $kichen->kitchen_kitchen_dining_hall_area_male = $request->kitchen_kitchen_dining_hall_area_male;
            $kichen->kitchen_kitchen_dining_hall_area_female = $request->kitchen_kitchen_dining_hall_area_female;
            $kichen->kitchen_kitchen_dining_hall_rating = $request->kitchen_kitchen_dining_hall_rating;
            $kichen->kitchen_kitchen_dining_hall_nonac_ac_count = $request->kitchen_kitchen_dining_hall_nonac_ac_count;
            $kichen->kitchen_kitchen_dining_hall_nonac_area_male = $request->kitchen_kitchen_dining_hall_nonac_area_male;
            $kichen->kitchen_kitchen_dining_hall_nonac_area_female = $request->kitchen_kitchen_dining_hall_nonac_area_female;
            $kichen->kitchen_kitchen_dining_hall_nonac_rating = $request->kitchen_kitchen_dining_hall_nonac_rating;
            $kichen->kitchen_kitchen_dining_hall_remarks = $request->kitchen_kitchen_dining_hall_remarks;
            $kichen->kitchen_store_room_hall_ac_count = $request->kitchen_store_room_hall_ac_count;
            $kichen->kitchen_store_room_dining_hall_area_male = $request->kitchen_store_room_dining_hall_area_male;
            $kichen->kitchen_store_room_dining_hall_area_female = $request->kitchen_store_room_dining_hall_area_female;
            $kichen->kitchen_store_room_dining_hall_rating = $request->kitchen_store_room_dining_hall_rating;
            $kichen->kitchen_store_room_dining_hall_nonac_ac_count = $request->kitchen_store_room_dining_hall_nonac_ac_count;
            $kichen->kitchen_store_room_dining_hall_nonac_area_male = $request->kitchen_store_room_dining_hall_nonac_area_male;
            $kichen->kitchen_store_room_dining_hall_nonac_area_female = $request->kitchen_store_room_dining_hall_nonac_area_female;
            $kichen->kitchen_store_room_dining_hall_nonac_rating = $request->kitchen_store_room_dining_hall_nonac_rating;
            $kichen->kitchen_store_room_dining_hall_remarks = $request->kitchen_store_room_dining_hall_remarks;
            $kichen->status = 1;
            // $kichen->created_by = '';
            // $kichen->updated_by = '';
            // $kichen->deleted_by = '';
            // $kichen->created_for = '';
            // $kichen->created_at = '';
            // $kichen->updated_at = '';
            // $kichen->deleted_at = '';
            $kichen->save();

            //other facilieties
            if(!isset($other_facilities) || empty($other_facilities)){
                $other_facilities =  new Part_two_other_facilitie;
            }

            // $other_facilities = new Part_two_other_facilitie;
            $other_facilities->form_id = $main->user_id;
            $other_facilities->facilities_guest_room_ac_count = $request->facilities_guest_room_ac_count;
            $other_facilities->facilities_guest_room_area_male = $request->facilities_guest_room_area_male;
            $other_facilities->facilities_guest_room_area_female = $request->facilities_guest_room_area_female;
            $other_facilities->facilities_guest_room_rating = $request->facilities_guest_room_rating;
            $other_facilities->facilities_guest_room_nonac_ac_count = $request->facilities_guest_room_nonac_ac_count    ;
            $other_facilities->facilities_guest_room_nonac_area_male = $request->facilities_guest_room_nonac_area_male;
            $other_facilities->facilities_guest_room_nonac_area_female = $request->facilities_guest_room_nonac_area_female;
            $other_facilities->facilities_guest_room_nonac_rating = $request->facilities_guest_room_nonac_rating;
            $other_facilities->facilities_guest_room_remarks = $request->facilities_guest_room_remarks;
            $other_facilities->facilities_recreation_hall_ac_count = $request->facilities_recreation_hall_ac_count;
            $other_facilities->facilities_recreation_hall_area_male = $request->facilities_recreation_hall_area_male;
            $other_facilities->facilities_recreation_hall_area_female = $request->facilities_recreation_hall_area_female;
            $other_facilities->facilities_recreation_hall_rating = $request->facilities_recreation_hall_rating;
            $other_facilities->facilities_recreation_hall_nonac_ac_count = $request->facilities_recreation_hall_nonac_ac_count;
            $other_facilities->facilities_recreation_hall_nonac_area_male = $request->facilities_recreation_hall_nonac_area_male;
            $other_facilities->facilities_recreation_hall_nonac_area_female = $request->facilities_recreation_hall_nonac_area_female;
            $other_facilities->facilities_recreation_hall_nonac_rating = $request->facilities_recreation_hall_nonac_rating;
            $other_facilities->facilities_recreation_hall_remarks = $request->facilities_recreation_hall_remarks;
            $other_facilities->facilities_store_room_ac_count = $request->facilities_store_room_ac_count;
            $other_facilities->facilities_store_room_area_male = $request->facilities_store_room_area_male;
            $other_facilities->facilities_store_room_area_female = $request->facilities_store_room_area_female;
            $other_facilities->facilities_store_room_rating = $request->facilities_store_room_rating;
            $other_facilities->facilities_store_room_nonac_ac_count = $request->facilities_store_room_nonac_ac_count;
            $other_facilities->facilities_store_room_nonac_area_male = $request->facilities_store_room_nonac_area_male;
            $other_facilities->facilities_store_room_nonac_area_female = $request->facilities_store_room_nonac_area_female;
            $other_facilities->facilities_store_room_nonac_rating = $request->facilities_store_room_nonac_rating;
            $other_facilities->facilities_library_ac_count = $request->facilities_library_ac_count;
            $other_facilities->facilities_library_area_male = $request->facilities_library_area_male;
            $other_facilities->facilities_library_area_female = $request->facilities_library_area_female;
            $other_facilities->facilities_library_rating = $request->facilities_library_rating;
            $other_facilities->facilities_library_nonac_ac_count = $request->facilities_library_nonac_ac_count;
            $other_facilities->facilities_library_nonac_area_male = $request->facilities_library_nonac_area_male;
            $other_facilities->facilities_library_nonac_area_female = $request->facilities_library_nonac_area_female;
            $other_facilities->facilities_library_nonac_rating = $request->facilities_library_nonac_rating;
            $other_facilities->facilities_library_remarks = $request->facilities_library_remarks;
            $other_facilities->status = 1;
            // $other_facilities->created_by = '';
            // $other_facilities->updated_by = '';
            // $other_facilities->deleted_by = '';
            // $other_facilities->created_for = '';
            // $other_facilities->created_at = '';
            // $other_facilities->updated_at = '';
            // $other_facilities->deleted_at = '';
            $other_facilities->save();
            //utilization fund code...
            if(!isset($utilization) || empty($utilization)){
                $utilization =  new part_two_utilization_fund;
            }
            // $utilization =  new part_two_utilization_fund;
            $utilization->form_id = $main->user_id;
            $utilization->utilization_boardings_2018_19_received = $request->utilization_boardings_2018_19_received;
            $utilization->utilization_boardings_2018_19_utilized = $request->utilization_boardings_2018_19_utilized;
            $utilization->utilization_boardings_2019_20_received = $request->utilization_boardings_2019_20_received;
            $utilization->utilization_boardings_2019_20_utilized = $request->utilization_boardings_2019_20_utilized;
            $utilization->utilization_boardings_2021_22_received = $request->utilization_boardings_2021_22_received    ;
            $utilization->utilization_boardings_2021_22_utilized = $request->utilization_boardings_2021_22_utilized;
            $utilization->utilization_boardings_2022_23_received = $request->utilization_boardings_2022_23_received;
            $utilization->utilization_boardings_2022_23_utilized = $request->utilization_boardings_2022_23_utilized;
            $utilization->utilization_sports_kit_2018_19_received = $request->utilization_sports_kit_2018_19_received;
            $utilization->utilization_sports_kit_2018_19_utilized = $request->utilization_sports_kit_2018_19_utilized;
            $utilization->utilization_sports_kit_2019_20_received = $request->utilization_sports_kit_2019_20_received;
            $utilization->utilization_sports_kit_2019_20_utilized = $request->utilization_sports_kit_2019_20_utilized;
            $utilization->utilization_sports_kit_2021_22_received = $request->utilization_sports_kit_2021_22_received;
            $utilization->utilization_sports_kit_2021_22_utilized = $request->utilization_sports_kit_2021_22_utilized;
            $utilization->utilization_sports_kit_2022_23_received = $request->utilization_sports_kit_2022_23_received;
            $utilization->utilization_sports_kit_2022_23_utilized = $request->utilization_sports_kit_2022_23_utilized;
            $utilization->utilization_education_expenditure_2018_19_received = $request->utilization_education_expenditure_2018_19_received;
            $utilization->utilization_education_expenditure_2018_19_utilized = $request->utilization_education_expenditure_2018_19_utilized;
            $utilization->utilization_education_expenditure_2019_20_received = $request->utilization_education_expenditure_2019_20_received;
            $utilization->utilization_education_expenditure_2019_20_utilized = $request->utilization_education_expenditure_2019_20_utilized;
            $utilization->utilization_education_expenditure_2021_22_received = $request->utilization_education_expenditure_2021_22_received;
            $utilization->utilization_education_expenditure_2021_22_utilized = $request->utilization_education_expenditure_2021_22_utilized;
            $utilization->utilization_education_expenditure_2022_23_received = $request->utilization_education_expenditure_2022_23_received;
            $utilization->utilization_education_expenditure_2022_23_utilized = $request->utilization_education_expenditure_2022_23_utilized;
            $utilization->utilization_competition_exposure_2018_19_received = $request->utilization_competition_exposure_2018_19_received;
            $utilization->utilization_competition_exposure_2018_19_utilized = $request->utilization_competition_exposure_2018_19_utilized;
            $utilization->utilization_competition_exposure_2019_20_received = $request->utilization_competition_exposure_2019_20_received;
            $utilization->utilization_competition_exposure_2021_22_received = $request->utilization_competition_exposure_2021_22_received;
            $utilization->utilization_competition_exposure_2021_22_utilized = $request->utilization_competition_exposure_2021_22_utilized;
            $utilization->utilization_competition_exposure_2022_23_received = $request->utilization_competition_exposure_2022_23_received;
            $utilization->utilization_competition_exposure_2022_23_utilized = $request->utilization_competition_exposure_2022_23_utilized;
            $utilization->utilization_medical_misc_2018_19_received = $request->utilization_medical_misc_2018_19_received;
            $utilization->utilization_medical_misc_2018_19_utilized = $request->utilization_medical_misc_2018_19_utilized;
            $utilization->utilization_medical_misc_2019_20_received = $request->utilization_medical_misc_2019_20_received;
            $utilization->utilization_medical_misc_2019_20_utilized = $request->utilization_medical_misc_2019_20_utilized;
            $utilization->utilization_medical_misc_2021_22_received = $request->utilization_medical_misc_2021_22_received;
            $utilization->utilization_medical_misc_2021_22_utilized = $request->utilization_medical_misc_2021_22_utilized;
            $utilization->utilization_medical_misc_2022_23_received = $request->utilization_medical_misc_2022_23_received;
            $utilization->utilization_medical_misc_2022_23_utilized = $request->utilization_medical_misc_2022_23_utilized;
            $utilization->utilization_maintenance_cost_ncoes_2018_19_received = $request->utilization_maintenance_cost_ncoes_2018_19_received;
            $utilization->utilization_maintenance_cost_ncoes_2018_19_utilized = $request->utilization_maintenance_cost_ncoes_2018_19_utilized;
            $utilization->utilization_maintenance_cost_ncoes_2019_20_received = $request->utilization_maintenance_cost_ncoes_2019_20_received;
            $utilization->utilization_maintenance_cost_ncoes_2019_20_utilized = $request->utilization_maintenance_cost_ncoes_2019_20_utilized;
            $utilization->utilization_maintenance_cost_ncoes_2021_22_received = $request->utilization_maintenance_cost_ncoes_2021_22_received;
            $utilization->utilization_maintenance_cost_ncoes_2021_22_utilized = $request->utilization_maintenance_cost_ncoes_2021_22_utilized;
            $utilization->utilization_maintenance_cost_ncoes_2022_23_received = $request->utilization_maintenance_cost_ncoes_2022_23_received;
            $utilization->utilization_maintenance_cost_ncoes_2022_23_utilized = $request->utilization_maintenance_cost_ncoes_2022_23_utilized;
            $utilization->utilization_sports_equipment_consumable_2018_19_received = $request->utilization_sports_equipment_consumable_2018_19_received;
            $utilization->utilization_sports_equipment_consumable_2018_19_utilized = $request->utilization_sports_equipment_consumable_2018_19_utilized;
            $utilization->utilization_sports_equipment_consumable_2019_20_received = $request->utilization_sports_equipment_consumable_2019_20_received;
            $utilization->utilization_sports_equipment_consumable_2019_20_utilized = $request->utilization_sports_equipment_consumable_2019_20_utilized;
            $utilization->utilization_sports_equipment_consumable_2021_22_received = $request->utilization_sports_equipment_consumable_2021_22_received;
            $utilization->utilization_sports_equipment_consumable_2021_22_utilized = $request->utilization_sports_equipment_consumable_2021_22_utilized;
            $utilization->utilization_sports_equipment_consumable_2022_23_received = $request->utilization_sports_equipment_consumable_2022_23_received;
            $utilization->utilization_sports_equipment_consumable_2022_23_utilized = $request->utilization_sports_equipment_consumable_2022_23_utilized;
            $utilization->utilization_sports_equipment_non_consumable_2018_19_received = $request->utilization_sports_equipment_non_consumable_2018_19_received;
            $utilization->utilization_sports_equipment_non_consumable_2018_19_utilized = $request->utilization_sports_equipment_non_consumable_2018_19_utilized;
            $utilization->utilization_sports_equipment_non_consumable_2019_20_received = $request->utilization_sports_equipment_non_consumable_2019_20_received;
            $utilization->utilization_sports_equipment_non_consumable_2019_20_utilized = $request->utilization_sports_equipment_non_consumable_2019_20_utilized;
            $utilization->utilization_sports_equipment_non_consumable_2021_22_received = $request->utilization_sports_equipment_non_consumable_2021_22_received;
            $utilization->utilization_sports_equipment_non_consumable_2021_22_utilized = $request->utilization_sports_equipment_non_consumable_2021_22_utilized;
            $utilization->utilization_sports_equipment_non_consumable_2022_23_received = $request->utilization_sports_equipment_non_consumable_2022_23_received;
            $utilization->utilization_sports_equipment_non_consumable_2022_23_utilized = $request->utilization_sports_equipment_non_consumable_2022_23_utilized;
            $utilization->utilization_sports_science_consumable_2018_19_received = $request->utilization_sports_science_consumable_2018_19_received;
            $utilization->utilization_sports_science_consumable_2018_19_utilized = $request->utilization_sports_science_consumable_2018_19_utilized;
            $utilization->utilization_sports_science_consumable_2019_20_received = $request->utilization_sports_science_consumable_2019_20_received;
            $utilization->utilization_sports_science_consumable_2019_20_utilized = $request->utilization_sports_science_consumable_2019_20_utilized;
            $utilization->utilization_sports_science_consumable_2021_22_received = $request->utilization_sports_science_consumable_2021_22_received;
            $utilization->utilization_sports_science_consumable_2021_22_utilized = $request->utilization_sports_science_consumable_2021_22_utilized;
            $utilization->utilization_sports_science_consumable_2022_23_received = $request->utilization_sports_science_consumable_2022_23_received;
            $utilization->utilization_sports_science_consumable_2022_23_utilized = $request->utilization_sports_science_consumable_2022_23_utilized;
            $utilization->utilization_sports_science_non_consumable_2018_19_received = $request->utilization_sports_science_non_consumable_2018_19_received;
            $utilization->utilization_sports_science_non_consumable_2018_19_utilized = $request->utilization_sports_science_non_consumable_2018_19_utilized;
            $utilization->utilization_sports_science_non_consumable_2019_20_received = $request->utilization_sports_science_non_consumable_2019_20_received;
            $utilization->utilization_sports_science_non_consumable_2019_20_utilized = $request->utilization_sports_science_non_consumable_2019_20_utilized;
            $utilization->utilization_sports_science_non_consumable_2021_22_received = $request->utilization_sports_science_non_consumable_2021_22_received;
            $utilization->utilization_sports_science_non_consumable_2021_22_utilized = $request->utilization_sports_science_non_consumable_2021_22_utilized;
            $utilization->utilization_sports_science_non_consumable_2022_23_received = $request->utilization_sports_science_non_consumable_2022_23_received;
            $utilization->utilization_sports_science_non_consumable_2022_23_utilized = $request->utilization_sports_science_non_consumable_2022_23_utilized;
            $utilization->utilization_sports_science_non_consumable_2022_23_utilized_1 = $request->utilization_sports_science_non_consumable_2022_23_utilized_1;
            $utilization->utilization_boardings_2020_21_received = $request->utilization_boardings_2020_21_received;
            $utilization->utilization_boardings_2020_21_utilized = $request->utilization_boardings_2020_21_utilized;
            $utilization->utilization_sports_kit_2020_21_received = $request->utilization_sports_kit_2020_21_received;
            $utilization->utilization_sports_kit_2020_21_utilized = $request->utilization_sports_kit_2020_21_utilized;
            $utilization->utilization_education_expenditure_2020_21_utilized = $request->utilization_education_expenditure_2020_21_utilized;
            $utilization->utilization_education_expenditure_2020_21_received = $request->utilization_education_expenditure_2020_21_received;
            $utilization->utilization_competition_exposure_2020_21_received = $request->utilization_competition_exposure_2020_21_received;
            $utilization->utilization_competition_exposure_2020_21_utilized = $request->utilization_competition_exposure_2020_21_utilized;
            $utilization->utilization_medical_misc_2020_21_received = $request->utilization_medical_misc_2020_21_received;
            $utilization->utilization_maintenance_cost_ncoes_2020_21_received = $request->utilization_maintenance_cost_ncoes_2020_21_received;
            $utilization->utilization_maintenance_cost_ncoes_2020_21_utilized = $request->utilization_maintenance_cost_ncoes_2020_21_utilized;
            $utilization->utilization_sports_equipment_consumable_2020_21_received = $request->utilization_sports_equipment_consumable_2020_21_received;
            $utilization->utilization_sports_equipment_consumable_2020_21_utilized = $request->utilization_sports_equipment_consumable_2020_21_utilized;
            $utilization->utilization_sports_equipment_non_consumable_2020_21_received = $request->utilization_sports_equipment_non_consumable_2020_21_received;
            $utilization->utilization_sports_equipment_non_consumable_2020_21_utilized = $request->utilization_sports_equipment_non_consumable_2020_21_utilized;
            $utilization->utilization_sports_science_consumable_2020_21_received = $request->utilization_sports_science_consumable_2020_21_received;
            $utilization->utilization_sports_science_consumable_2020_21_utilized = $request->utilization_sports_science_consumable_2020_21_utilized;
            $utilization->utilization_sports_science_non_consumable_2020_21_utilized = $request->utilization_sports_science_non_consumable_2020_21_utilized;
            $utilization->utilization_sports_science_non_consumable_2021_22_received = $request->utilization_sports_science_non_consumable_2021_22_received;
            $utilization->status = 1;
            // $utilization->created_by = '';
            // $utilization->updated_by = '';
            // $utilization->deleted_by = '';
            // $utilization->created_for = '';
            // $utilization->created_at = '';
            // $utilization->updated_at = '';
            // $utilization->deleted_at = '';
            $utilization->save();


            // if($main->id ){
            // for($i=0 ;$i < count($request->discline_play_field);$i++){
            //     if(isset($request['dbId'][$i])){
            //         $new_from_two_data =  Form_two::where(["id"=>$request['dbId'][$i],"form_id"=>$main->id])->first();
            //          if(!$new_from_two_data){
            //         $new_from_two_data = new Form_two;
            //     }
            //     }
            //     else{
            //      $new_from_two_data = new Form_two;
            //     }

            // $new_from_two_data->form_id = $main->id;
            // $new_from_two_data->discline_play_field=$request["discline_play_field"][$i];
            // $new_from_two_data->no_fop_play_field=$request["no_fop_play_field"][$i];
            // $new_from_two_data->fop_play_field=$request["fop_play_field"][$i];
            // $new_from_two_data->fop_surface_play_field=$request["fop_surface_play_field"][$i];
            // $new_from_two_data->rating_play_field=$request["rating_play_field"][$i];
            // $new_from_two_data->remark_play_field=$request["remark_play_field"][$i];
            // $new_from_two_data->save();
            //     }
            // }

            $rc_id =  Session::get('rc_id')->rc_id;
            $updated_by = $created_by = $user_id = Session::get('user')->user_id;
            // dd($request->two_part_two_athletes);
            foreach ($request->two_part_two_athletes as $athletes_key => $athletes_value) {
                // dd($athletes_value);
                if ($athletes_value['id'] != ''){

                    $parttwoathlete = parttwoathletes::findOrFail($athletes_value['id']);
                    $parttwoathlete->athletes_year = $athletes_value['athletes_year'] ?? '';
                    $parttwoathlete->athletes_discipline = $athletes_value['athletes_discipline'] ?? '';
                  //  $parttwoathlete->athletes_no_athletes_participated = $athletes_value['athletes_no_athletes_participated'] ?? '';
                    $parttwoathlete->athletes_no_expenditure_incurred = $athletes_value['athletes_no_expenditure_incurred'] ?? '';
                    $parttwoathlete->athletes_no_achievements = $athletes_value['athletes_no_achievements'] ?? '';
                    $parttwoathlete->athletes_no_remarks = $athletes_value['athletes_no_remarks'] ?? '';
                    $parttwoathlete->updated_by = $rc_id;
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $parttwoathlete->status = 1;
                    $parttwoathlete->save();

                }else{

                    $parttwoathlete = new parttwoathletes();
                    $parttwoathlete->athletes_year = $athletes_value['athletes_year'] ?? '';
                    $parttwoathlete->athletes_discipline = $athletes_value['athletes_discipline'] ?? '';
                    //$parttwoathlete->athletes_no_athletes_participated = $athletes_value['athletes_no_athletes_participated'] ?? '';
                    $parttwoathlete->athletes_no_expenditure_incurred = $athletes_value['athletes_no_expenditure_incurred'] ?? '';
                    $parttwoathlete->athletes_no_achievements = $athletes_value['athletes_no_achievements'] ?? '';
                    $parttwoathlete->athletes_no_remarks = $athletes_value['athletes_no_remarks'] ?? '';
                    $parttwoathlete->created_by = $rc_id;
                    // $parttwoathlete->created_for = $value['project_center_id'];
                    $parttwoathlete->status = 1;
                    $parttwoathlete->save();

                }
            }
                //Shubham play of field

                foreach ($request->part_two_play_field as $part_two_play_field_key => $part_two_play_fields) {
                    // dd($part_two_play_fields);
                    if ($part_two_play_fields['id'] != ''){

                        $form_play_field = Form_two::findOrFail($part_two_play_fields['id']);
                        $form_play_field->discline_play_field = $part_two_play_fields['discline_play_field'] ?? '';
                        $form_play_field->no_fop_play_field = $part_two_play_fields['no_fop_play_field'];
                        $form_play_field->fop_play_field = $part_two_play_fields['fop_play_field'];
                        $form_play_field->fop_surface_play_field = $part_two_play_fields['fop_surface_play_field'];
                        $form_play_field->rating_play_field = $part_two_play_fields['rating_play_field'];
                        $form_play_field->remark_play_field = $part_two_play_fields['remark_play_field'] ?? '';
                        $form_play_field->updated_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $form_play_field->status = 1;
                        // dd(1);
                        $form_play_field->save();

                    }else{

                        $form_play_field = new Form_two();
                        $form_play_field->discline_play_field = $part_two_play_fields['discline_play_field'] ?? '';
                        $form_play_field->no_fop_play_field = $part_two_play_fields['no_fop_play_field'];
                        $form_play_field->fop_play_field = $part_two_play_fields['fop_play_field'];
                        $form_play_field->fop_surface_play_field = $part_two_play_fields['fop_surface_play_field'];
                        $form_play_field->rating_play_field = $part_two_play_fields['rating_play_field'];
                        $form_play_field->remark_play_field = $part_two_play_fields['remark_play_field'] ?? '';
                        $form_play_field->created_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $form_play_field->status = 1;
                        // dd(2);
                        $form_play_field->save();

                    }
                }

                // dd($request->two_part_two_sport_science);
                foreach ($request->two_part_two_sport_science as $two_part_two_sport_science_key => $two_part_two_sport_sciences) {
                    // dd($two_part_two_sport_sciences);
                    // if (isset($two_part_two_sport_sciences['id']) && $two_part_two_sport_sciences['id'] != ''){
                    if ($two_part_two_sport_sciences['id'] != ''){

                        $form_sport_science = FormTwoSportScience::findOrFail($two_part_two_sport_sciences['id']);
                        $form_sport_science->science_discipline = $two_part_two_sport_sciences['science_discipline'] ?? null;
                        $form_sport_science->sport_consumable = $two_part_two_sport_sciences['sport_consumable'];
                        $form_sport_science->sport_non_consumable = $two_part_two_sport_sciences['sport_non_consumable'];
                        $form_sport_science->science_remark = $two_part_two_sport_sciences['science_remark'];
                        $form_sport_science->updated_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $form_sport_science->status = 1;
                        // dd(1);
                        $form_sport_science->save();

                    }else{
                        $form_sport_science = new FormTwoSportScience();
                        $form_sport_science->science_discipline = $two_part_two_sport_sciences['science_discipline'] ?? '';
                        $form_sport_science->sport_consumable = $two_part_two_sport_sciences['sport_consumable'] ?? '';
                        $form_sport_science->sport_non_consumable = $two_part_two_sport_sciences['sport_non_consumable'] ?? '';
                        $form_sport_science->science_remark = $two_part_two_sport_sciences['science_remark'] ?? '';
                        $form_sport_science->created_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $form_sport_science->status = 1;
                        // dd(2);
                        $form_sport_science->save();

                    }
                }

                // dd($request->administrative_supports);

                foreach ($request->administrative_supports as $administrative_supports => $administrative_supports_centers) {

                    // if (isset($administrative_supports_centers['id']) && $administrative_supports_centers['id'] != ''){
                    if ($administrative_supports_centers['id'] != ''){
                        $form_administrative = FormTwoAddStaffAdministrator::findOrFail($administrative_supports_centers['id']);
                        $form_administrative->ssd_designation = $administrative_supports_centers['ssd_designation'];
                        $form_administrative->ssd_2018_19 = $administrative_supports_centers['ssd_2018_19'];
                        $form_administrative->ssd_2019_20 = $administrative_supports_centers['ssd_2019_20'];
                        $form_administrative->ssd_2020_21 = $administrative_supports_centers['ssd_2020_21'];
                        $form_administrative->ssd_2021_22 = $administrative_supports_centers['ssd_2021_22'];
                        $form_administrative->ssd_2022_23 = $administrative_supports_centers['ssd_2022_23'];
                        $form_administrative->updated_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $form_administrative->status = 1;
                        // dd(1);
                        $form_administrative->save();

                    }else{

                        $form_administrative = new FormTwoAddStaffAdministrator();
                        $form_administrative->ssd_designation = $administrative_supports_centers['ssd_designation'];
                        $form_administrative->ssd_2018_19 = $administrative_supports_centers['ssd_2018_19'];
                        $form_administrative->ssd_2019_20 = $administrative_supports_centers['ssd_2019_20'];
                        $form_administrative->ssd_2020_21 = $administrative_supports_centers['ssd_2020_21'];
                        $form_administrative->ssd_2021_22 = $administrative_supports_centers['ssd_2021_22'];
                        $form_administrative->ssd_2022_23 = $administrative_supports_centers['ssd_2022_23'];
                        $form_administrative->created_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $form_administrative->status = 1;
                        // dd(2);
                        $form_administrative->save();

                    }
                }
                // dd($request->two_part_two_equipment);
                foreach ($request->two_part_two_equipment as $two_part_two_equipment_key => $two_part_two_equipments) {
                    // dd($two_part_two_equipments);
                    if (isset($two_part_two_equipments['id']) &&  $two_part_two_equipments['id'] != ''){
                        // dd(22);
                        $two_part_equipment = FormTwoEquipment::findOrFail($two_part_two_equipments['id']);
                        $two_part_equipment->equipment_discipline = $two_part_two_equipments['equipment_discipline'] ?? '';
                        $two_part_equipment->equipment_suficient = $two_part_two_equipments['equipment_suficient'] ?? '';
                        $two_part_equipment->equipment_remark = $two_part_two_equipments['equipment_remark'];
                        $two_part_equipment->updated_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $two_part_equipment->status = 1;
                        // dd(1);
                        $two_part_equipment->save();

                    }else{
                        // dd(1);
                        $two_part_equipment = new FormTwoEquipment();
                        $two_part_equipment->equipment_discipline = $two_part_two_equipments['equipment_discipline'];
                        $two_part_equipment->equipment_suficient = $two_part_two_equipments['equipment_suficient'] ?? '';
                        $two_part_equipment->equipment_remark = $two_part_two_equipments['equipment_remark'] ?? '';
                        $two_part_equipment->created_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $two_part_equipment->status = 1;
                        // dd(2);
                        $two_part_equipment->save();

                    }
                }
                // dd($request->two_part_two_equipment_consumable);
                foreach ($request->two_part_two_equipment_consumable as $two_part_two_equipment_consumable_key => $two_part_two_equipment_consumables) {
                    // dd($two_part_two_equipment_consumables);
                    if ( isset($two_part_two_equipment_consumables['id']) &&  $two_part_two_equipment_consumables['id'] != ''){
                        // dd(22);
                        $two_part_equipment_consumable = FormTwoEquipment_consumable::findOrFail($two_part_two_equipment_consumables['id']);
                        $two_part_equipment_consumable->equipment_discipline = $two_part_two_equipment_consumables['equipment_discipline'];
                        $two_part_equipment_consumable->equipment_suficient = $two_part_two_equipment_consumables['equipment_suficient'];
                        $two_part_equipment_consumable->equipment_remark = $two_part_two_equipment_consumables['equipment_remark'];
                        $two_part_equipment_consumable->updated_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $two_part_equipment_consumable->status = 1;
                        // dd(1);
                        $two_part_equipment_consumable->save();

                    }else{
                        // dd(1);
                        $two_part_equipment_consumable = new FormTwoEquipment_consumable();
                        $two_part_equipment_consumable->equipment_discipline = $two_part_two_equipment_consumables['equipment_discipline'];
                        $two_part_equipment_consumable->equipment_suficient = $two_part_two_equipment_consumables['equipment_suficient'] ?? '';
                        $two_part_equipment_consumable->equipment_remark = $two_part_two_equipment_consumables['equipment_remark'] ?? '' ;
                        $two_part_equipment_consumable->created_by = $rc_id;
                        // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                        $two_part_equipment_consumable->status = 1;
                        // dd(2);
                        $two_part_equipment_consumable->save();

                    }
                }

            foreach ($request->coach_support_staff_form as $key => $value) {
                if (isset($value['id']) && $value['id'] != '') {
                    // dd(12);
                    $Parttwocoachsupportstaff = Parttwocoachsupportstaffs::findOrFail($value['id']);
                    $Parttwocoachsupportstaff->coach_support_staff_year = $value['coach_support_staff_year'];
                    $Parttwocoachsupportstaff->coach_support_staff_name_designation = $value['coach_support_staff_name_designation'];
                    $Parttwocoachsupportstaff->coach_support_staff_period_tour = $value['coach_support_staff_period_tour'];
                    $Parttwocoachsupportstaff->coach_support_staff_remarks = $value['coach_support_staff_Remarks'];
                    $Parttwocoachsupportstaff->updated_by = $rc_id;
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $Parttwocoachsupportstaff->coach_support_staff_status = 1;
                    $Parttwocoachsupportstaff->save();
                }else{
                    // dd('done');
                    $Parttwocoachsupportstaff = new Parttwocoachsupportstaffs();
                    $Parttwocoachsupportstaff->coach_support_staff_year = $value['coach_support_staff_year'];
                    $Parttwocoachsupportstaff->coach_support_staff_name_designation = $value['coach_support_staff_name_designation'];
                    $Parttwocoachsupportstaff->coach_support_staff_period_tour = $value['coach_support_staff_period_tour'];
                    $Parttwocoachsupportstaff->coach_support_staff_remarks = $value['coach_support_staff_Remarks'];
                    $Parttwocoachsupportstaff->created_by = $rc_id;
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $Parttwocoachsupportstaff->coach_support_staff_status = 1;
                    $Parttwocoachsupportstaff->save();
                }
            }

            //
            // dd($request->all());
            foreach ($request->two_part_residential_coaches as $parttwostrengthresidentialcoaches_key => $parttwostrengthresidentialcoaches_value)
            {
                // dd($parttwostrengthresidentialcoaches_value);
                if ( isset($parttwostrengthresidentialcoaches_value['id']) && $parttwostrengthresidentialcoaches_value['id'] != '')
                {

                    $parttwostrengthresidentialcoaches = Parttwostrengthresidentialcoachesdisciplines::findOrFail($parttwostrengthresidentialcoaches_value['id']);
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_discipline_id = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_discipline_id'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_c'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_c'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_f'];
                   // $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_c'] ?? '';
                    // $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_m'] ?? '';
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_c'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_c'];
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $parttwostrengthresidentialcoaches->updated_by = $rc_id;
                    $parttwostrengthresidentialcoaches->status = 1;
                    $parttwostrengthresidentialcoaches->save();
                }else{
                    $parttwostrengthresidentialcoaches = new Parttwostrengthresidentialcoachesdisciplines();
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_discipline_id = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_discipline_id'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_c'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_c'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_f'];
                   // $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_c'] ?? '';
                    // $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_c'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_m'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_f'];
                    $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_c'];
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $parttwostrengthresidentialcoaches->created_by = $rc_id;
                    $parttwostrengthresidentialcoaches->status = 1;
                    $parttwostrengthresidentialcoaches->save();

                }
            }
            // dd($request->all());
            foreach ($request->staff_nutritionist_chef as $staff_nutritionist_chef_key => $staff_nutritionist_chef_value)
            {
                // dd($staff_nutritionist_chef_value);
                // dd($staff_nutritionist_chef_value['snc_designation']);
                if (isset($staff_nutritionist_chef_value['id']) && $staff_nutritionist_chef_value['id'] != '')
                {

                    $staffnutritionistchef = Staffnutritionistchefs::findOrFail($staff_nutritionist_chef_value['id']);
                    $staffnutritionistchef->snc_designation = $staff_nutritionist_chef_value['snc_designation'];
                    $staffnutritionistchef->snc_2018_19 = $staff_nutritionist_chef_value['snc_2018_19'];
                    $staffnutritionistchef->snc_2019_20 = $staff_nutritionist_chef_value['snc_2019_20'];
                    $staffnutritionistchef->snc_2020_21 = $staff_nutritionist_chef_value['snc_2020_21'];
                    $staffnutritionistchef->snc_2021_22 = $staff_nutritionist_chef_value['snc_2021_22'];
                    $staffnutritionistchef->snc_2022_23=  $staff_nutritionist_chef_value['snc_2022_23'];
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $staffnutritionistchef->updated_by = $rc_id;
                    $staffnutritionistchef->status = 1;
                    $staffnutritionistchef->save();
                }else{
                    $staffnutritionistchef = new Staffnutritionistchefs();
                    $staffnutritionistchef->snc_designation = $staff_nutritionist_chef_value['snc_designation'];
                    $staffnutritionistchef->snc_2018_19 = $staff_nutritionist_chef_value['snc_2018_19'];
                    $staffnutritionistchef->snc_2019_20 = $staff_nutritionist_chef_value['snc_2019_20'];
                    $staffnutritionistchef->snc_2020_21 = $staff_nutritionist_chef_value['snc_2020_21'];
                    $staffnutritionistchef->snc_2021_22 = $staff_nutritionist_chef_value['snc_2021_22'];
                    $staffnutritionistchef->snc_2022_23= $staff_nutritionist_chef_value['snc_2022_23'];
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $staffnutritionistchef->created_by = $rc_id;
                    // $parttwostrengthresidentialcoaches->created_by = $rc_id;
                    $staffnutritionistchef->status = 1;
                    $staffnutritionistchef->save();

                 }
            }
            // dd($staff_nutritionist_chef_value['snc_designation']);

            foreach ($request->sport_science_staff_doctor as $sport_science_staff_doctor_key => $sport_science_staff_doctor_value)
            {
                // dd($sport_science_staff_doctor_value);

                if (  isset($sport_science_staff_doctor_value['id']) &&  $sport_science_staff_doctor_value['id'] != '')
                {

                    $sportsciencestaffdoctor = Sportsciencestaffdoctors::findOrFail($sport_science_staff_doctor_value['id']);
                    $sportsciencestaffdoctor->ssd_designation = $sport_science_staff_doctor_value['ssd_designation'];
                    $sportsciencestaffdoctor->ssd_2018_19 = $sport_science_staff_doctor_value['ssd_2018_19'];
                    $sportsciencestaffdoctor->ssd_2019_20 = $sport_science_staff_doctor_value['ssd_2019_20'];
                    $sportsciencestaffdoctor->ssd_2020_21 = $sport_science_staff_doctor_value['ssd_2020_21'];
                    $sportsciencestaffdoctor->ssd_2021_22 = $sport_science_staff_doctor_value['ssd_2021_22'];
                    $sportsciencestaffdoctor->ssd_2022_23=  $sport_science_staff_doctor_value['ssd_2022_23'];
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $sportsciencestaffdoctor->updated_by = $rc_id;
                    $sportsciencestaffdoctor->status = 1;
                    $sportsciencestaffdoctor->save();
                }else{
                    $sportsciencestaffdoctor = new Sportsciencestaffdoctors();
                    $sportsciencestaffdoctor->ssd_designation = $sport_science_staff_doctor_value['ssd_designation'];
                    $sportsciencestaffdoctor->ssd_2018_19 = $sport_science_staff_doctor_value['ssd_2018_19'];
                    $sportsciencestaffdoctor->ssd_2019_20 = $sport_science_staff_doctor_value['ssd_2019_20'];
                    $sportsciencestaffdoctor->ssd_2020_21 = $sport_science_staff_doctor_value['ssd_2020_21'];
                    $sportsciencestaffdoctor->ssd_2021_22 = $sport_science_staff_doctor_value['ssd_2021_22'];
                    $sportsciencestaffdoctor->ssd_2022_23= $sport_science_staff_doctor_value['ssd_2022_23'];
                    // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                    $sportsciencestaffdoctor->created_by = $rc_id;
                    // $parttwostrengthresidentialcoaches->created_by = $rc_id;
                    $sportsciencestaffdoctor->status = 1;
                    $sportsciencestaffdoctor->save();

                 }
            }
            // dd(123);
            return redirect()->route('review.index');
           }



        //    public function deleteDatabyId($id){

        //     $Users = new ReviewSportData;
        //     $Users = ReviewSportData::find($id);
        //     $Users->delete();
        //     return response()->json(['success' => true,'message'=>'Data Successfully Deleted!!!']);

        //    }
        //    public function DeleteDataFormTwo($id){
        //     Form_two::find($id)->delete();
        //     return response()->json(['success' => true,'message'=>'Data Successfully Deleted!!!']);
        //    }


        public function coachsupportstaffById($id){

            $user_id = Session::get('user')->user_id;
                try {

                    $parttwocoachsupportstaff = Parttwocoachsupportstaffs::findOrFail($id);

                    if ($parttwocoachsupportstaff->delete()) {
                        $parttwocoachsupportstaff->deleted_by = $user_id;
                        $parttwocoachsupportstaff->save();
                        return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                    }else{
                        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                    }
                } catch (\Exception $ex) {
                    return response()->json(['success' => false, 'message' => $ex->getMessage()]);
                }
           }

        //    public function play_field_ById($id){
        //     dd($id);
        //     $user_id = Session::get('user')->user_id;
        //     // dd($user_id);
        //         try {

        //             $form_playfield = Form_two::findOrFail($id);

        //             if ($form_playfield->delete()) {
        //                 $form_playfield->deleted_by = $user_id;
        //                 $form_playfield->save();
        //                 return response()->json(['success' => true, 'message' => 'Records Deleted.']);

        //             }else{
        //                 return response()->json(['success' => true, 'message' => 'Records Deleted.']);
        //             }
        //         } catch (\Exception $ex) {
        //             return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        //         }
        //    }

           public function parttwoathletesById($id){

            $user_id = Session::get('user')->user_id;

                try {

                    $parttwoathlete = Parttwoathletes::findOrFail($id);

                    if ($parttwoathlete->delete()) {
                        $parttwoathlete->deleted_by = $user_id;
                        $parttwoathlete->save();
                        return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                    }else{
                        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                    }
                } catch (\Exception $ex) {
                    return response()->json(['success' => false, 'message' => $ex->getMessage()]);
                }
           }


           public function twopartresidentialcoachesById($id){



            $user_id = Session::get('user')->user_id;

                try {

                    $parttwoathlete = Parttwostrengthresidentialcoachesdisciplines::findOrFail($id);

                    if ($parttwoathlete->delete()) {
                        $parttwoathlete->deleted_by = $user_id;
                        $parttwoathlete->save();
                        return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                    }else{
                        return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                    }
                } catch (\Exception $ex) {
                    return response()->json(['success' => false, 'message' => $ex->getMessage()]);
                }
           }

        public function nutritionistchefById($id){



        $user_id = Session::get('user')->user_id;

            try {

                $parttwoathlete = Staffnutritionistchefs::findOrFail($id);

                if ($parttwoathlete->delete()) {
                    $parttwoathlete->deleted_by = $user_id;
                    $parttwoathlete->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }

        public function sciencestaffdoctorById($id){



        $user_id = Session::get('user')->user_id;

            try {

                $parttwoathlete = Sportsciencestaffdoctors::findOrFail($id);

                if ($parttwoathlete->delete()) {
                    $parttwoathlete->deleted_by = $user_id;
                    $parttwoathlete->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }

        public function administrativesupportsById($id){



        $user_id = Session::get('user')->user_id;

            try {

                $AddStaffAdministrator = FormTwoAddStaffAdministrator::findOrFail($id);

                if ($AddStaffAdministrator->delete()) {
                    $AddStaffAdministrator->deleted_by = $user_id;
                    $AddStaffAdministrator->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }

        public function partsportsequipmentById($id){



        $user_id = Session::get('user')->user_id;

            try {

                $formTwoEquipment = FormTwoEquipment_consumable::findOrFail($id);

                if ($formTwoEquipment->delete()) {
                    $formTwoEquipment->deleted_by = $user_id;
                    $formTwoEquipment->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }

        public function sportsscienceequipmentById($id){



        $user_id = Session::get('user')->user_id;

            try {

                $twosportscience = FormTwoSportScience::findOrFail($id);

                if ($twosportscience->delete()) {
                    $twosportscience->deleted_by = $user_id;
                    $twosportscience->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }

        public function twoparttwoequipmentById($id){



        $user_id = Session::get('user')->user_id;

            try {

                $formTwoEquipment = FormTwoEquipment::findOrFail($id);

                if ($formTwoEquipment->delete()) {
                    $formTwoEquipment->deleted_by = $user_id;
                    $formTwoEquipment->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }

        public function playfieldById($id){


            // dd(123);
            $user_id = Session::get('user')->user_id;

            try {

                $form_two_paly = Form_two::findOrFail($id);

                if ($form_two_paly->delete()) {
                    $form_two_paly->deleted_by = $user_id;
                    $form_two_paly->save();
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);

                }else{
                    return response()->json(['success' => true, 'message' => 'Records Deleted.']);
                }
            } catch (\Exception $ex) {
                dd($ex->getMessage());
                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
    //form three save
   public function partThreeform($center_id = 0){
    $user_id = decode5t($center_id);
    // dd($user_id);

    $form_one = part_three_dis_discounted::whereCreatedFor($user_id)->get();
    $form_two = Part_three_dis_added::whereCreatedFor($user_id)->get();
    $form_three=Part_three_table_discipline::whereCreatedFor($user_id)->get();
    $form_four=part_three_table_coache::whereCreatedFor($user_id)->get();
    $form_five=DB::table('part_three_mains')->where('comment_type','advantage')->whereCreatedFor($user_id)->first();
    $form_six=DB::table('part_three_mains')->where('comment_type','disadvantage')->whereCreatedFor($user_id)->first();

    // if (Session::get('role_details')->name == 'RC') {
        // $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('rc_id')->rc_id]])->select('academy_name', 'academy_id')->get();
        // $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->get();
    // } elseif (Session::get('role_details')->name == 'NCOE') {
        // $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', Session::get('user')->user_id]])->select('academy_name', 'academy_id')->get();
        // $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->get();
    // }

	  if (Session::get('role_details')->name == 'RC') {
        $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['rc_id', '=', Session::get('rc_id')->rc_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id','ncoe_name')->get();
         $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->get();
		 $dis_id = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->pluck('discipline_id')->toArray();
         $dis_list_3_2 = DB::table('descipline_master')->select('discipline_id', 'discipline')->whereNotIn('discipline_id',$dis_id)->orderBy('discipline')->get();

    } elseif (Session::get('role_details')->name == 'NCOE') {
        $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['ncoe_id', '=', Session::get('user')->user_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id','ncoe_name')->get();
         $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->get();
       		 $dis_id = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->pluck('discipline_id')->toArray();
         $dis_list_3_2 = DB::table('descipline_master')->select('discipline_id', 'discipline')->whereNotIn('discipline_id',$dis_id)->orderBy('discipline')->get();
	   // $dis_list = DB::table('descipline_master')->select('discipline_id', 'discipline')->orderBy('discipline')->get();
    }


    return view('front.pages.review.part_three',
    ['id'=>$center_id,
    'form_one'=> $form_one ,
    'form_two'=>   $form_two ,
    'form_three'=> $form_three ,
    'form_four'=> $form_four ,
    'form_five'=> $form_five ,
    'form_six'=> $form_six ,
    'centers'=> $centers ,
    'c_id' => $user_id,
    'dis_list'=>$dis_list,
	'dis_list_3_2' => $dis_list_3_2,
	'dis_list_3_2_json' => json_encode($dis_list_3_2),
     'dis_list_json'=>json_encode($dis_list)]);
    }

    public function partThreeformStore(Request $request){
  // dd($request->all());

    foreach($request->form_1 as $key =>$value){
    if(isset($value['id'])){
        $model = part_three_dis_discounted::find($value['id']);
    }else{
        // dd(2);
        $model = new part_three_dis_discounted();
    }
    $model->dis_dis=$value['dis_dis'];
    $model->dis_dis_male=$value['dis_dis_male'];
    $model->dis_dis_female=$value['dis_dis_female'];
    $model->dis_dis_reason=$value['dis_dis_reason'];
    $model->created_for= $value['created_for'];
    $model->save();
     }


       foreach($request->form_2 as $key =>$value){
        if(isset($value['id'])){
            $model1 = Part_three_dis_added::find($value['id']);
        }else{
            // dd(2);
            $model1 = new Part_three_dis_added();
        }
        $model1->dis_added=$value['dis_added'];
        $model1->dis_added_male=$value['dis_added_male'];
        $model1->dis_added_female=$value['dis_added_female'];
        $model1->dis_added_reason=$value['dis_added_reason'];
        $model1->created_for= $value['created_for'];
        $model1->save();


         }




         foreach($request->form_3 as $key =>$value){
            if(isset($value['id'])){
                $model3 = Part_three_table_discipline::find($value['id']);
            }else{
                // dd(2);
                $model3 = new Part_three_table_discipline();
            }
            $model3->discipline_discrating=$value['strength_discipline'];
            $model3->strength_current_m=$value['strength_current_m'];
            $model3->strength_current_f=$value['strength_current_f'];
            $model3->pro_sec_strnght_m=$value['pro_sec_strnght_m'];
            $model3->pro_sec_strnght_f=$value['pro_sec_strnght_f'];
            $model3->strength_discipline_reason=$value['strength_discipline_reason'];
            $model3->created_for= $value['created_for'];
            $model3->save();


             }


             foreach($request->form_4 as $key =>$value){
                if(isset($value['id'])){
                    $model4 = part_three_table_coache::find($value['id']);
                }else{
                    // dd(2);
                    $model4 = new part_three_table_coache();
                }
                $model4->discipline_coaches=$value['discipline_coaches'];
                $model4->coach_present_m=$value['coaches_pre_male'];
                $model4->coach_present_f=$value['coaches_pre_fmale'];
                $model4->coach_required_m=$value['coaches_req_male'];
                $model4->coach_required_f=$value['coaches_req_fmale'];
                $model4->coach_required_Reason=$value['coaches_req_reason'];
                $model4->created_for= $value['created_for'];
                $model4->save();


                 }
                 if(isset($request->form_5)){
                    if(isset($request->form_5['id'])){
                        $model = Part_three_main::find($request->form_5['id']);
                        $model->updated_by = Session::get('rc_id')->rc_id;
                      }else{
                         $model = new Part_three_main();
                         $model->created_by = Session::get('rc_id')->rc_id;
                      }
                      $model->comment= $request->form_5['comment'];
                      $model->comment_type=$request->form_5['comment_type'];
                      $model->created_for =$request->form_5['created_for'];
                      $model->save();
                 }



                 if(isset($request->form_6)){
                    if(isset($request->form_6['id'])){
                        $model = Part_three_main::find($request->form_6['id']);
                        $model->updated_by = Session::get('rc_id')->rc_id;
                      }else{
                         $model = new Part_three_main();
                         $model->created_by = Session::get('rc_id')->rc_id;
                      }
                      $model->comment= $request->form_6['comment'];
                      $model->comment_type=$request->form_6['comment_type'];
                      $model->created_for =$request->form_6['created_for'];
                      $model->save();
                 }





    return redirect()->route('review.index');
   }





//part three start
   public function DeleteDatapartthree($id){
    part_three_dis_discounted::find($id)->delete();
    return response()->json(['success' => true,'message'=>'Data Successfully Deleted!!!']);
   }

//part two
    public function DeleteDatapartthreetwo($id){
    Part_three_dis_added::find($id)->delete();
    return response()->json(['success' => true,'message'=>'Data Successfully Deleted!!!']);
   }



//part three
public function DeleteDatapartthreethree($id){
    Part_three_table_discipline::find($id)->delete();
    return response()->json(['success' => true,'message'=>'Data Successfully Deleted!!!']);
   }


//part four
   public function DeleteDatapartthreefour($id){
    part_three_table_coache::find($id)->delete();
    return response()->json(['success' => true,'message'=>'Data Successfully Deleted!!!']);
   }

//    public function generatePDF()
//    {
//        $data = [
//            'title' => 'Welcome to CodeSolutionStuff.com',
//            'date' => date('m/d/Y')
//        ];

//        $pdf = PDF::loadView('myPDF', $data);

//        return $pdf->download('codesolutionstuff.pdf');
//    }


   public function generatePDF(){
    $user_id = Session::get('user')->user_id;
    $data = Part_two_other_facilitie::whereCreatedBy($user_id)->get();
    return view('myPDF', compact('data'));
    }

    public function downloadPDF(){
        $data = Part_two_other_facilitie::all();
        $pdf = PDF::loadView('myPDF', compact('data'))->setOptions(['defaultFont' => 'arial']);
        return $pdf->download('data.pdf');
    }




}
