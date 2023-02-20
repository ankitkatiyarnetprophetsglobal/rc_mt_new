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
// use Illuminate\Http\Response;
// use Illuminate\Support\Facades\PDF;

use Response;
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
    { //dd($center_id);
        // dd(Session::get('rc_id'));
        //dd(Session::get('role_details'));
        // dd(Session::get('user'));
        //dd(Session::get('role_details')->name);
        if (Session::get('role_details')->name == 'RC') {
            $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['rc_id', '=', Session::get('rc_id')->rc_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id', 'ncoe_name')->get();
            if ($center_id != 0) {
                $c_id = decode5t($center_id);
            } else {

                $c_id =  $centers[0]->ncoe_id;
            }

            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type', 1)->where('ncoe_id', $c_id)->where('rc_id', Session::get('rc_id')->rc_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        } elseif (Session::get('role_details')->name == 'NCOE') {
            $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['ncoe_id', '=', Session::get('user')->user_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id', 'ncoe_name')->get();

            if ($center_id != 0) {
                $c_id = decode5t($center_id);
            } else {

                $c_id =  $centers[0]->ncoe_id;
            }

            // $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', Session::get('user')->user_id]])->select('academy_name', 'academy_id')->get();
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type', 1)->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        }

        // if ($center_id != 0) {
        //     $c_id = decode5t($center_id);
        // } else {

        //     $c_id =  $centers[0]->ncoe_id;
        // }
        $form_one = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-1']])->get();
        $form_two = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-2']])->get();
        $form_three = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['category', '=', 'category-3']])->get();
        $form_four = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['category', '=', 'category-1']])->get();
        $form_five = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['category', '=', 'category-2']])->get();
        $form_six = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['category', '=', 'category-3']])->get();
        $form_seven = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'medals_won'], ['level', '=', 'national']])->get();
        $form_eight = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', 'ind'], ['form_type', '=', 'participation'], ['level', '=', 'national']])->get();
        $form_nine = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', null], ['form_type', '=', 'total_medals_won'], ['category', '=', 'category-1']])->get();
        $form_ten = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', null], ['form_type', '=', 'total_medals_won'], ['category', '=', 'category-2']])->get();
        $form_eleven = ReviewSportData::whereCreatedFor($c_id)->where([['team_type', '=', null], ['form_type', '=', 'total_medals_won'], ['category', '=', 'category-3']])->get();
        $form_twelve = ReviewSportData::whereCreatedFor($c_id)->where([['level', '=', 'national'], ['form_type', '=', 'athelets_medals_won']])->get();
        $form_thirteen = ReviewSportData::whereCreatedFor($c_id)->where([['level', '=', 'national'], ['form_type', '=', 'athelets_total_medals_won']])->get();


        return view('front.pages.review.part_one_step_one', [
            'form_one' => $form_one,
            'form_two' => $form_two,
            'form_three' => $form_three,
            'form_four' => $form_four,
            'form_five' => $form_five,
            'form_six' => $form_six,
            'form_seven' => $form_seven,
            'form_eight' => $form_eight,
            'form_nine' => $form_nine,
            'form_ten' => $form_ten,
            'form_eleven' => $form_eleven,
            'form_twelve' => $form_twelve,
            'form_thirteen' => $form_thirteen,
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
        if (isset($request->step_one['form_9'])) {
            // dd($request->step_one['form_9']);
            foreach ($request->step_one['form_9'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                // $model->level = $value['level'];
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
                // $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_10'])) {
            foreach ($request->step_one['form_10'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                // $model->level = $value['level'];
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
                // $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_11'])) {
            // dd($request->step_one['form_11']);
            foreach ($request->step_one['form_11'] as $key => $value) {
                if (isset($value['id'])) {
                    $model = ReviewSportData::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    $model = new ReviewSportData();
                    $model->created_by = Session::get('rc_id')->rc_id;
                }
                //$model = new ReviewSportData();
                $model->discipline_id = $value['discipline_id'];
                // $model->level = $value['level'];
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
                // $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_12'])) {
            // dd($request->step_one['form_12']);
            foreach ($request->step_one['form_12'] as $key => $value) {
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
                // $model->category = $value['category'];
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
                // $model->team_type = 'ind';
                $model->form_type = $value['form_type'];
                $model->status = true;
                $model->created_for = $request->step_one['created_for'];
                $model->save();
            }
        }
        if (isset($request->step_one['form_13'])) {
            // dd($request->step_one['form_13']);
            foreach ($request->step_one['form_13'] as $key => $value) {
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
                // $model->category = $value['category'];
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
                // $model->team_type = 'ind';
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
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type', 2)->where('ncoe_id', $c_id)->where('rc_id',  Session::get('rc_id')->rc_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        } else {
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('user')->user_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('discipline_type', 2)->where('ncoe_id', $c_id)->where('ncoe_id', Session::get('user')->user_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        }
        if (!$dis_list->count()) {
            return redirect('review/part-one/step-three/' . encode5t($c_id));
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
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('rc_id')->rc_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->where('ncoe_id', $c_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        } else {
            $centers = Rcacademymapping::where([['status', '=', true], ['created_by', '=', Session::get('user')->user_id]])->pluck('academy_name', 'academy_id');
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->where('ncoe_id', $c_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
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
            'c_id' => $c_id,
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

    public function partTwoform($center_id = 0)
    {
        if (Session::get('role_details')->name == 'RC') {
            $centers = DB::table('discplines_mapping_master')->where([[
                'status', '=', true
            ], ['rc_id', '=', Session::get('rc_id')->rc_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id', 'ncoe_name')->get();
            if ($center_id != 0) {
                $c_id = decode5t($center_id);
            } else {

                $c_id =  $centers[0]->ncoe_id;
            }

            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->where('ncoe_id', $c_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        } elseif (Session::get('role_details')->name == 'NCOE') {
            $centers = DB::table('discplines_mapping_master')->where([[
                'status', '=', true
            ], ['ncoe_id', '=', Session::get('user')->user_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id', 'ncoe_name')->get();
            // $centers = Rcacademymapping::where([['status', '=', true], ['academy_id', '=', Session::get('user')->user_id]])->select('academy_name', 'academy_id')->get();
            if ($center_id != 0) {
                $c_id = decode5t($center_id);
            } else {

                $c_id =  $centers[0]->ncoe_id;
            }
            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->where('ncoe_id', $c_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
        }
        $user_id = $c_id;
        // $data = Formtwomain::where('user_id', $user_id)->with('playField')->first();
        $data = Formtwomain::whereCreatedFor($c_id)->first();
        $accommods = Part_two_achieve_accommods::whereCreatedFor($c_id)->first();
        $kichen = Part_two_kitchen_dining::whereCreatedFor($c_id)->first();
        $other_facilities = Part_two_other_facilitie::whereCreatedFor($c_id)->first();
        $utilization = part_two_utilization_fund::whereCreatedFor($c_id)->first();
        $parttwocoachsupportstaff = Parttwocoachsupportstaffs::whereCreatedFor($c_id)->where('deleted_by', '=', null)->get();
        $parttwoathlete = parttwoathletes::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();

        $parttwostrengthresidentialcoachesdisciplines = Parttwostrengthresidentialcoachesdisciplines::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $staffnutritionistchefs = Staffnutritionistchefs::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $sportsciencestaffdoctor = Sportsciencestaffdoctors::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $part_two_play_field_count = Form_two::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $sport_quipment = FormTwoEquipment::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $sport_quipment_consumable = FormTwoEquipment_consumable::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $sport_quipment_science = FormTwoSportScience::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();
        $add_staff_add = FormTwoAddStaffAdministrator::whereCreatedFor($c_id)->where('deleted_at', '=', null)->get();


        return view('front.pages.review.part_two', [
            'data' => $data,
            'id' => $center_id,
            'accommods' => $accommods,
            'kichen' => $kichen,
            'other_facilities' => $other_facilities,
            'utilization' => $utilization,
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
            'dis_list' => $dis_list,
            'centers' => $centers,
            'c_id' => $c_id,
            'dis_list_json' => json_encode($dis_list),
        ]);
    }

    public function partTwoformStore(Request $request)
    {
        // dd($request->all());
        // dd(decode5t($request->user_id));
        $main = Formtwomain::where('user_id', decode5t($request->user_id))->with('playField')->first();
        $accomodation = Part_two_achieve_accommods::where('form_id', decode5t($request->user_id))->first();
        $kichen = Part_two_kitchen_dining::where('form_id', decode5t($request->user_id))->first();
        $other_facilities = Part_two_other_facilitie::where('form_id', decode5t($request->user_id))->first();
        $utilization = part_two_utilization_fund::where('form_id', decode5t($request->user_id))->first();

        if (!isset($main) || empty($main)) {
            $main = new Formtwomain;
        }
        $main->cat_radio = $request->cat_radio;
        $main->area_land = $request->area_land;
        $main->area_heactor = $request->area_heactor;
        $main->created_by = Session::get('rc_id')->rc_id;;
        $main->created_for = $request->created_for;
        $main->user_id = decode5t($request->user_id);
        $main->save();

        //accomodation  ---
        if (!isset($accomodation) || empty($accomodation)) {
            $accomodation =  new Part_two_achieve_accommods;
        }
        // $accomodation =  new Part_two_achieve_accommods;
        $accomodation->form_id = $main->user_id;
        $accomodation->accommods_part_two_rooms_male_ac = $request->accommods_part_two_rooms_male_ac;
        $accomodation->accommods_part_two_toilet_non_attached_female_nonacrating = $request->accommods_part_two_toilet_non_attached_female_nonacrating;
        $accomodation->accommods_part_two_rooms_male_ac_rating = $request->accommods_part_two_rooms_male_ac_rating;
        $accomodation->accommods_part_two_rooms_male_nonac = $request->accommods_part_two_rooms_male_nonac;
        $accomodation->accommods_part_two_rooms_male_nonacrating = $request->accommods_part_two_rooms_male_nonacrating;
        $accomodation->accommods_part_two_rooms_female_ac = $request->accommods_part_two_rooms_female_ac;
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
        // $accomodation->accommods_part_two_toilet_non_attached_female_nonacrating = $request->accommods_part_two_toilet_non_attached_female_nonacrating;
        $accomodation->status = 1;
        $accomodation->created_by = Session::get('rc_id')->rc_id;;
        $accomodation->created_for = $request->created_for;
        $accomodation->save();

        //kichen  --------------------------------------------------------
        if (!isset($kichen) || empty($kichen)) {
            $kichen =  new Part_two_kitchen_dining;
        }
        // $kichen = new Part_two_kitchen_dining;
        // dd($request->kitchen_kitchen_dining_hall_rating);
        $kichen->form_id = $main->user_id;
        $kichen->kitchen_dinings_dining_hall_ac_count = $request->kitchen_dinings_dining_hall_ac_count;
        $kichen->kitchen_dinings_dining_hall_area_male = $request->kitchen_dinings_dining_hall_area_male;
        $kichen->kitchen_dinings_dining_hall_area_female = $request->kitchen_dinings_dining_hall_area_female;
        $kichen->kitchen_dinings_dining_hall_rating = $request->kitchen_dinings_dining_hall_rating;
        $kichen->kitchen_dinings_dining_hall_nonac_ac_count = $request->kitchen_dinings_dining_hall_nonac_ac_count;
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
        $kichen->created_by = Session::get('rc_id')->rc_id;
        $kichen->created_for = $request->created_for;
        $kichen->save();

        //other facilieties
        if (!isset($other_facilities) || empty($other_facilities)) {
            $other_facilities =  new Part_two_other_facilitie;
        }

        // $other_facilities = new Part_two_other_facilitie;
        $other_facilities->form_id = $main->user_id;
        $other_facilities->facilities_guest_room_ac_count = $request->facilities_guest_room_ac_count;
        $other_facilities->facilities_guest_room_area_male = $request->facilities_guest_room_area_male;
        $other_facilities->facilities_guest_room_area_female = $request->facilities_guest_room_area_female;
        $other_facilities->facilities_guest_room_rating = $request->facilities_guest_room_rating;
        $other_facilities->facilities_guest_room_nonac_ac_count = $request->facilities_guest_room_nonac_ac_count;
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
        $other_facilities->facilities_store_room_remarks = $request->facilities_store_room_remarks;
        $other_facilities->status = 1;
        $other_facilities->created_by = Session::get('rc_id')->rc_id;;
        $other_facilities->created_for = $request->created_for;
        $other_facilities->save();
        //utilization fund code...
        if (!isset($utilization) || empty($utilization)) {
            $utilization =  new part_two_utilization_fund;
        }
        // $utilization =  new part_two_utilization_fund;
        $utilization->form_id = $main->user_id;
        $utilization->utilization_boardings_2018_19_received = $request->utilization_boardings_2018_19_received;
        $utilization->utilization_boardings_2018_19_utilized = $request->utilization_boardings_2018_19_utilized;
        $utilization->utilization_boardings_2019_20_received = $request->utilization_boardings_2019_20_received;
        $utilization->utilization_boardings_2019_20_utilized = $request->utilization_boardings_2019_20_utilized;
        $utilization->utilization_boardings_2021_22_received = $request->utilization_boardings_2021_22_received;
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
        $utilization->utilization_competition_exposure_2019_20_utilized = $request->utilization_competition_exposure_2019_20_utilized;
        $utilization->utilization_medical_misc_2020_21_utilized = $request->utilization_medical_misc_2020_21_utilized;
        $utilization->status = 1;
        $utilization->created_by = Session::get('rc_id')->rc_id;;
        $utilization->created_for = $request->created_for;
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
            if ($athletes_value['id'] != '') {

                $parttwoathlete = parttwoathletes::findOrFail($athletes_value['id']);
                $parttwoathlete->athletes_year = $athletes_value['athletes_year'] ?? '';
                $parttwoathlete->athletes_discipline = $athletes_value['athletes_discipline'] ?? '';
                 $parttwoathlete->athletes_no_athletes_participated = $athletes_value['athletes_no_athletes_participated'] ?? '';
                $parttwoathlete->athletes_no_expenditure_incurred = $athletes_value['athletes_no_expenditure_incurred'] ?? '';
                $parttwoathlete->athletes_no_achievements = $athletes_value['athletes_no_achievements'] ?? '';
                $parttwoathlete->athletes_no_remarks = $athletes_value['athletes_no_remarks'] ?? '';

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $parttwoathlete->updated_by = Session::get('rc_id')->rc_id;;
                $parttwoathlete->created_for = $request->created_for;


                $parttwoathlete->status = 1;
                $parttwoathlete->save();
            } else {

                $parttwoathlete = new parttwoathletes();
                $parttwoathlete->athletes_year = $athletes_value['athletes_year'] ?? '';
                $parttwoathlete->athletes_discipline = $athletes_value['athletes_discipline'] ?? '';
                $parttwoathlete->athletes_no_athletes_participated = $athletes_value['athletes_no_athletes_participated'] ?? '';
                $parttwoathlete->athletes_no_expenditure_incurred = $athletes_value['athletes_no_expenditure_incurred'] ?? '';
                $parttwoathlete->athletes_no_achievements = $athletes_value['athletes_no_achievements'] ?? '';
                $parttwoathlete->athletes_no_remarks = $athletes_value['athletes_no_remarks'] ?? '';
                $parttwoathlete->created_by = $rc_id;
                // $parttwoathlete->created_for = $value['project_center_id'];


                $parttwoathlete->created_by = Session::get('rc_id')->rc_id;;
                $parttwoathlete->created_for = $request->created_for;

                $parttwoathlete->status = 1;
                $parttwoathlete->save();
            }
        }
        //Shubham play of field

        foreach ($request->part_two_play_field as $part_two_play_field_key => $part_two_play_fields) {
            // dd($part_two_play_fields);
            if ($part_two_play_fields['id'] != '') {

                $form_play_field = Form_two::findOrFail($part_two_play_fields['id']);
                $form_play_field->discline_play_field = $part_two_play_fields['discline_play_field'] ?? null;
                $form_play_field->no_fop_play_field = $part_two_play_fields['no_fop_play_field'] ?? null;
                $form_play_field->fop_play_field = $part_two_play_fields['fop_play_field'] ?? null;
                $form_play_field->fop_surface_play_field = $part_two_play_fields['fop_surface_play_field']?? null;
                $form_play_field->rating_play_field = $part_two_play_fields['rating_play_field']?? null;
                $form_play_field->remark_play_field = $part_two_play_fields['remark_play_field'] ?? null;



                $form_play_field->updated_by = Session::get('rc_id')->rc_id;;
                $form_play_field->created_for = $request->created_for;


                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $form_play_field->status = 1;
                // dd(1);
                $form_play_field->save();
            } else {

                $form_play_field = new Form_two();
                $form_play_field->discline_play_field = $part_two_play_fields['discline_play_field']?? null;
                $form_play_field->no_fop_play_field = $part_two_play_fields['no_fop_play_field']?? null;
                $form_play_field->fop_play_field = $part_two_play_fields['fop_play_field']?? null;
                $form_play_field->fop_surface_play_field = $part_two_play_fields['fop_surface_play_field']?? null;
                $form_play_field->rating_play_field = $part_two_play_fields['rating_play_field']?? null;
                $form_play_field->remark_play_field = $part_two_play_fields['remark_play_field'] ?? null;



                $form_play_field->created_by = Session::get('rc_id')->rc_id;;
                $form_play_field->created_for = $request->created_for;

                // // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                // $parttwoathlete->created_by = Session::get('rc_id')->rc_id;;
                // $parttwoathlete->created_for = $request->created_for;
                $form_play_field->status = 1;
                // dd(2);
                $form_play_field->save();
            }
        }


        foreach ($request->two_part_two_sport_science as $two_part_two_sport_science_key => $two_part_two_sport_sciences) {

            if ($two_part_two_sport_sciences['id'] != '') {

                $form_sport_science = FormTwoSportScience::findOrFail($two_part_two_sport_sciences['id']);
                $form_sport_science->science_discipline = $two_part_two_sport_sciences['science_discipline'];
                $form_sport_science->sport_consumable = $two_part_two_sport_sciences['sport_consumable']?? null;
                $form_sport_science->sport_non_consumable = $two_part_two_sport_sciences['sport_non_consumable']?? null;
                $form_sport_science->science_remark = $two_part_two_sport_sciences['science_remark']?? null;


                $form_sport_science->updated_by = Session::get('rc_id')->rc_id;;
                $form_sport_science->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $form_sport_science->status = 1;
                // dd(1);
                $form_sport_science->save();
            } else {
                $form_sport_science = new FormTwoSportScience();
                $form_sport_science->science_discipline = $two_part_two_sport_sciences['science_discipline'];
                $form_sport_science->sport_consumable = $two_part_two_sport_sciences['sport_consumable'] ?? null;
                $form_sport_science->sport_non_consumable = $two_part_two_sport_sciences['sport_non_consumable'] ?? null;
                $form_sport_science->science_remark = $two_part_two_sport_sciences['science_remark'] ?? null;


                $form_sport_science->created_by = Session::get('rc_id')->rc_id;;
                $form_sport_science->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $form_sport_science->status = 1;
                // dd(2);
                $form_sport_science->save();
            }
        }

        // dd($request->administrative_supports);

        foreach ($request->administrative_supports as $administrative_supports => $administrative_supports_centers) {

            // if (isset($administrative_supports_centers['id']) && $administrative_supports_centers['id'] != ''){
            if ($administrative_supports_centers['id'] != '') {
                $form_administrative = FormTwoAddStaffAdministrator::findOrFail($administrative_supports_centers['id']);
                $form_administrative->ssd_designation = $administrative_supports_centers['ssd_designation']?? null;
                $form_administrative->ssd_2018_19 = $administrative_supports_centers['ssd_2018_19']?? null;
                $form_administrative->ssd_2019_20 = $administrative_supports_centers['ssd_2019_20']?? null;
                $form_administrative->ssd_2020_21 = $administrative_supports_centers['ssd_2020_21']?? null;
                $form_administrative->ssd_2021_22 = $administrative_supports_centers['ssd_2021_22']?? null;
                $form_administrative->ssd_2022_23 = $administrative_supports_centers['ssd_2022_23']?? null;

                $form_administrative->updated_by = Session::get('rc_id')->rc_id;;
                $form_administrative->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $form_administrative->status = 1;
                // dd(1);
                $form_administrative->save();
            } else {

                $form_administrative = new FormTwoAddStaffAdministrator();
                $form_administrative->ssd_designation = $administrative_supports_centers['ssd_designation']?? null;
                $form_administrative->ssd_2018_19 = $administrative_supports_centers['ssd_2018_19']?? null;
                $form_administrative->ssd_2019_20 = $administrative_supports_centers['ssd_2019_20']?? null;
                $form_administrative->ssd_2020_21 = $administrative_supports_centers['ssd_2020_21']?? null;
                $form_administrative->ssd_2021_22 = $administrative_supports_centers['ssd_2021_22']?? null;
                $form_administrative->ssd_2022_23 = $administrative_supports_centers['ssd_2022_23']?? null;


                $form_administrative->created_by = Session::get('rc_id')->rc_id;;
                $form_administrative->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $form_administrative->status = 1;
                // dd(2);
                $form_administrative->save();
            }
        }


        // dd($request->two_part_two_equipment);
        foreach ($request->two_part_two_equipment as $two_part_two_equipment_key => $two_part_two_equipments) {
            // dd($two_part_two_equipments);
            if (isset($two_part_two_equipments['id']) &&  $two_part_two_equipments['id'] != '') {
                // dd(22);
                $two_part_equipment = FormTwoEquipment::findOrFail($two_part_two_equipments['id']);
                $two_part_equipment->equipment_discipline = $two_part_two_equipments['equipment_discipline'] ?? null;
                $two_part_equipment->equipment_suficient = $two_part_two_equipments['equipment_suficient'] ?? null;
                $two_part_equipment->equipment_remark = $two_part_two_equipments['equipment_remark']?? null;

                $two_part_equipment->updated_by = Session::get('rc_id')->rc_id;;
                $two_part_equipment->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $two_part_equipment->status = 1;
                // dd(1);
                $two_part_equipment->save();
            } else {
                // dd(1);
                $two_part_equipment = new FormTwoEquipment();
                $two_part_equipment->equipment_discipline = $two_part_two_equipments['equipment_discipline'] ?? null;
                $two_part_equipment->equipment_suficient = $two_part_two_equipments['equipment_suficient'] ?? null;
                $two_part_equipment->equipment_remark = $two_part_two_equipments['equipment_remark'] ?? null;

                $two_part_equipment->created_by = Session::get('rc_id')->rc_id;
                $two_part_equipment->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $two_part_equipment->status = 1;
                // dd(2);
                $two_part_equipment->save();
            }
        }
        // dd($request->two_part_two_equipment_consumable);
        foreach ($request->two_part_two_equipment_consumable as $two_part_two_equipment_consumable_key => $two_part_two_equipment_consumables) {
            // dd($two_part_two_equipment_consumables);
            if (isset($two_part_two_equipment_consumables['id']) &&  $two_part_two_equipment_consumables['id'] != '') {
                // dd(22);
                $two_part_equipment_consumable = FormTwoEquipment_consumable::findOrFail($two_part_two_equipment_consumables['id']);
                $two_part_equipment_consumable->equipment_discipline = $two_part_two_equipment_consumables['equipment_discipline']?? null;
                $two_part_equipment_consumable->equipment_suficient = $two_part_two_equipment_consumables['equipment_suficient']?? null;
                $two_part_equipment_consumable->equipment_remark = $two_part_two_equipment_consumables['equipment_remark']?? null;


                $two_part_equipment_consumable->updated_by = Session::get('rc_id')->rc_id;;
                $two_part_equipment_consumable->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $two_part_equipment_consumable->status = 1;
                // dd(1);
                $two_part_equipment_consumable->save();
            } else {
                // dd(1);
                $two_part_equipment_consumable = new FormTwoEquipment_consumable();
                $two_part_equipment_consumable->equipment_discipline = $two_part_two_equipment_consumables['equipment_discipline']?? null;
                $two_part_equipment_consumable->equipment_suficient = $two_part_two_equipment_consumables['equipment_suficient'] ?? null;
                $two_part_equipment_consumable->equipment_remark = $two_part_two_equipment_consumables['equipment_remark'] ?? null;

                $two_part_equipment_consumable->created_by = Session::get('rc_id')->rc_id;
                $two_part_equipment_consumable->created_for = $request->created_for;

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
                $Parttwocoachsupportstaff->coach_support_staff_year = $value['coach_support_staff_year']?? null;
                $Parttwocoachsupportstaff->coach_support_staff_name_designation = $value['coach_support_staff_name_designation']?? null;
                $Parttwocoachsupportstaff->coach_support_staff_period_tour = $value['coach_support_staff_period_tour']?? null;
                $Parttwocoachsupportstaff->coach_support_staff_remarks = $value['coach_support_staff_Remarks']?? null;

                $Parttwocoachsupportstaff->updated_by = Session::get('rc_id')->rc_id;;
                $Parttwocoachsupportstaff->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $Parttwocoachsupportstaff->coach_support_staff_status = 1;
                $Parttwocoachsupportstaff->save();
            } else {
                // dd('done');
                $Parttwocoachsupportstaff = new Parttwocoachsupportstaffs();
                $Parttwocoachsupportstaff->coach_support_staff_year = $value['coach_support_staff_year']?? null;
                $Parttwocoachsupportstaff->coach_support_staff_name_designation = $value['coach_support_staff_name_designation']?? null;
                $Parttwocoachsupportstaff->coach_support_staff_period_tour = $value['coach_support_staff_period_tour']?? null;
                $Parttwocoachsupportstaff->coach_support_staff_remarks = $value['coach_support_staff_Remarks']?? null;

                $Parttwocoachsupportstaff->created_by = Session::get('rc_id')->rc_id;
                $Parttwocoachsupportstaff->created_for = $request->created_for;

                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];
                $Parttwocoachsupportstaff->coach_support_staff_status = 1;
                $Parttwocoachsupportstaff->save();
            }
        }

//dd($request->two_part_residential_coaches);
        foreach ($request->two_part_residential_coaches as $parttwostrengthresidentialcoaches_key => $parttwostrengthresidentialcoaches_value) {
           // dd($parttwostrengthresidentialcoaches_value['id']);
            if (isset($parttwostrengthresidentialcoaches_value['id'])) {
                $parttwostrengthresidentialcoaches = Parttwostrengthresidentialcoachesdisciplines::findOrFail($parttwostrengthresidentialcoaches_value['id']);
                $parttwostrengthresidentialcoaches->strength_residential_coaches_discipline_id = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_discipline_id']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_c']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_c']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_c'] ?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_m'] ?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_c']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_c']?? null;
                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];

                $parttwostrengthresidentialcoaches->updated_by = Session::get('rc_id')->rc_id;;
                $parttwostrengthresidentialcoaches->created_for = $request->created_for;

                $parttwostrengthresidentialcoaches->status = 1;
                $parttwostrengthresidentialcoaches->save();
            } else {
                $parttwostrengthresidentialcoaches = new Parttwostrengthresidentialcoachesdisciplines();
                $parttwostrengthresidentialcoaches->strength_residential_coaches_discipline_id = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_discipline_id']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2018_19_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2018_19_nr_c']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2019_20_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2019_20_nr_c']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2020_21_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2020_21_nr_c'] ?? '';
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_m'];
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_22_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_22_nr_c']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_resi_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_resi_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_m = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_m']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_f = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_f']?? null;
                $parttwostrengthresidentialcoaches->strength_residential_coaches_2022_23_nr_c = $parttwostrengthresidentialcoaches_value['strength_residential_coaches_2022_23_nr_c']?? null;
                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];

                $parttwostrengthresidentialcoaches->created_by = Session::get('rc_id')->rc_id;
                $parttwostrengthresidentialcoaches->created_for = $request->created_for;

                $parttwostrengthresidentialcoaches->status = 1;
                $parttwostrengthresidentialcoaches->save();
            }
        }
        // dd($request->all());
        foreach ($request->staff_nutritionist_chef as $staff_nutritionist_chef_key => $staff_nutritionist_chef_value) {
            // dd($staff_nutritionist_chef_value);
            // dd($staff_nutritionist_chef_value['snc_designation']);
            if (isset($staff_nutritionist_chef_value['id']) && $staff_nutritionist_chef_value['id'] != '') {

                $staffnutritionistchef = Staffnutritionistchefs::findOrFail($staff_nutritionist_chef_value['id']);
                $staffnutritionistchef->snc_designation = $staff_nutritionist_chef_value['snc_designation']?? null;
                $staffnutritionistchef->snc_2018_19 = $staff_nutritionist_chef_value['snc_2018_19']?? null;
                $staffnutritionistchef->snc_2019_20 = $staff_nutritionist_chef_value['snc_2019_20']?? null;
                $staffnutritionistchef->snc_2020_21 = $staff_nutritionist_chef_value['snc_2020_21']?? null;
                $staffnutritionistchef->snc_2021_22 = $staff_nutritionist_chef_value['snc_2021_22']?? null;
                $staffnutritionistchef->snc_2022_23 =  $staff_nutritionist_chef_value['snc_2022_23']?? null;
                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];

                $staffnutritionistchef->updated_by = Session::get('rc_id')->rc_id;;
                $staffnutritionistchef->created_for = $request->created_for;

                $staffnutritionistchef->status = 1;
                $staffnutritionistchef->save();
            } else {
                $staffnutritionistchef = new Staffnutritionistchefs();
                $staffnutritionistchef->snc_designation = $staff_nutritionist_chef_value['snc_designation']?? null;
                $staffnutritionistchef->snc_2018_19 = $staff_nutritionist_chef_value['snc_2018_19']?? null;
                $staffnutritionistchef->snc_2019_20 = $staff_nutritionist_chef_value['snc_2019_20']?? null;
                $staffnutritionistchef->snc_2020_21 = $staff_nutritionist_chef_value['snc_2020_21']?? null;
                $staffnutritionistchef->snc_2021_22 = $staff_nutritionist_chef_value['snc_2021_22']?? null;
                $staffnutritionistchef->snc_2022_23 = $staff_nutritionist_chef_value['snc_2022_23']?? null;
                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];

                $staffnutritionistchef->created_by = Session::get('rc_id')->rc_id;
                $staffnutritionistchef->created_for = $request->created_for;

                // $parttwostrengthresidentialcoaches->created_by = $rc_id;
                $staffnutritionistchef->status = 1;
                $staffnutritionistchef->save();
            }
        }
        // dd($staff_nutritionist_chef_value['snc_designation']);

        foreach ($request->sport_science_staff_doctor as $sport_science_staff_doctor_key => $sport_science_staff_doctor_value) {
            // dd($sport_science_staff_doctor_value);

            if (isset($sport_science_staff_doctor_value['id']) &&  $sport_science_staff_doctor_value['id'] != '') {

                $sportsciencestaffdoctor = Sportsciencestaffdoctors::findOrFail($sport_science_staff_doctor_value['id']);
                $sportsciencestaffdoctor->ssd_designation = $sport_science_staff_doctor_value['ssd_designation']?? null;
                $sportsciencestaffdoctor->ssd_2018_19 = $sport_science_staff_doctor_value['ssd_2018_19']?? null;
                $sportsciencestaffdoctor->ssd_2019_20 = $sport_science_staff_doctor_value['ssd_2019_20']?? null;
                $sportsciencestaffdoctor->ssd_2020_21 = $sport_science_staff_doctor_value['ssd_2020_21']?? null;
                $sportsciencestaffdoctor->ssd_2021_22 = $sport_science_staff_doctor_value['ssd_2021_22']?? null;
                $sportsciencestaffdoctor->ssd_2022_23 =  $sport_science_staff_doctor_value['ssd_2022_23']?? null;
                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];

                $sportsciencestaffdoctor->updated_by = Session::get('rc_id')->rc_id;;
                $sportsciencestaffdoctor->created_for = $request->created_for;

                $sportsciencestaffdoctor->status = 1;
                $sportsciencestaffdoctor->save();
            } else {
                $sportsciencestaffdoctor = new Sportsciencestaffdoctors();
                $sportsciencestaffdoctor->ssd_designation = $sport_science_staff_doctor_value['ssd_designation']?? null;
                $sportsciencestaffdoctor->ssd_2018_19 = $sport_science_staff_doctor_value['ssd_2018_19']?? null;
                $sportsciencestaffdoctor->ssd_2019_20 = $sport_science_staff_doctor_value['ssd_2019_20']?? null;
                $sportsciencestaffdoctor->ssd_2020_21 = $sport_science_staff_doctor_value['ssd_2020_21']?? null;
                $sportsciencestaffdoctor->ssd_2021_22 = $sport_science_staff_doctor_value['ssd_2021_22']?? null;
                $sportsciencestaffdoctor->ssd_2022_23 = $sport_science_staff_doctor_value['ssd_2022_23']?? null;
                // $Parttwocoachsupportstaff->created_for = $value['project_center_id'];

                $sportsciencestaffdoctor->created_by = Session::get('rc_id')->rc_id;
                $sportsciencestaffdoctor->created_for = $request->created_for;

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


    public function coachsupportstaffById($id)
    {

        $user_id = Session::get('user')->user_id;
        try {

            $parttwocoachsupportstaff = Parttwocoachsupportstaffs::findOrFail($id);

            if ($parttwocoachsupportstaff->delete()) {
                $parttwocoachsupportstaff->deleted_by = $user_id;
                $parttwocoachsupportstaff->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
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

    public function parttwoathletesById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {

            $parttwoathlete = Parttwoathletes::findOrFail($id);

            if ($parttwoathlete->delete()) {
                $parttwoathlete->deleted_by = $user_id;
                $parttwoathlete->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }


    public function twopartresidentialcoachesById($id)
    {



        $user_id = Session::get('user')->user_id;

        try {

            $parttwoathlete = Parttwostrengthresidentialcoachesdisciplines::findOrFail($id);

            if ($parttwoathlete->delete()) {
                $parttwoathlete->deleted_by = $user_id;
                $parttwoathlete->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function nutritionistchefById($id)
    {



        $user_id = Session::get('user')->user_id;

        try {

            $parttwoathlete = Staffnutritionistchefs::findOrFail($id);

            if ($parttwoathlete->delete()) {
                $parttwoathlete->deleted_by = $user_id;
                $parttwoathlete->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }



    // public function administrativesupportsById($id)
    // {



    //     $user_id = Session::get('user')->user_id;

    //     try {

    //         $AddStaffAdministrator = FormTwoAddStaffAdministrator::findOrFail($id);

    //         if ($AddStaffAdministrator->delete()) {
    //             $AddStaffAdministrator->deleted_by = $user_id;
    //             $AddStaffAdministrator->save();
    //             return response()->json(['success' => true, 'message' => 'Records Deleted.']);
    //         } else {
    //             return response()->json(['success' => true, 'message' => 'Records Deleted.']);
    //         }
    //     } catch (\Exception $ex) {
    //         return response()->json(['success' => false, 'message' => $ex->getMessage()]);
    //     }
    // }

    public function administrativesupportsById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {



            if(DB::table('part_two_add_staff_admins')->delete($id)) {

                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }




    public function sciencestaffdoctorById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {



            if(DB::table('sportsciencestaffdoctors')->delete($id)) {

                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }


    public function partsportsequipmentById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {

            $formtwoequipment = FormTwoEquipment::findOrFail($id);

            if ($formtwoequipment->delete()) {
                $formtwoequipment->deleted_by = $user_id;
                $formtwoequipment->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);

            }else{
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }


            // if(DB::table('part_two_equipments_consumable')->delete($id)) {

            //     return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            // } else {
            //     return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            // }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }


    public function parttwoformeighttById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {



            if(DB::table('part_two_equipments_consumable')->delete($id)) {

                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function parttwoformnineById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {

            $formtwosportscience = FormTwoSportScience::findOrFail($id);

            if ($formtwosportscience->delete()) {
                $formtwosportscience->deleted_by = $user_id;
                $formtwosportscience->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);

            }else{
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }

            // if(DB::table('part_two_equipments_consumable')->delete($id)) {

            //     return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            // } else {
            //     return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            // }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function sportsscienceequipmentById($id)
    {

        $user_id = Session::get('user')->user_id;

        try {

            $twosportscience = FormTwoSportScience::findOrFail($id);

            if ($twosportscience->delete()) {
                $twosportscience->deleted_by = $user_id;
                $twosportscience->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function twoparttwoequipmentById($id)
    {



        $user_id = Session::get('user')->user_id;

        try {

            $formTwoEquipment = FormTwoEquipment::findOrFail($id);

            if ($formTwoEquipment->delete()) {
                $formTwoEquipment->deleted_by = $user_id;
                $formTwoEquipment->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function playfieldById($id)
    {


        // dd(123);
        $user_id = Session::get('user')->user_id;

        try {

            $form_two_paly = Form_two::findOrFail($id);

            if ($form_two_paly->delete()) {
              //  $form_two_paly->deleted_by = $user_id;
               // $form_two_paly->save();
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            } else {
                return response()->json(['success' => true, 'message' => 'Records Deleted.']);
            }
        } catch (\Exception $ex) {
            // dd($ex->getMessage());
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
    //form three save
    public function partThreeform($center_id = 0)
    {

        // dd($center_id);
        //     $user_id = decode5t($center_id);
        // dd($user_id);




        if (Session::get('role_details')->name == 'RC') {
            $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['rc_id', '=', Session::get('rc_id')->rc_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id', 'ncoe_name')->get();
            if ($center_id != 0) {
                $c_id = decode5t($center_id);
            } else {

                $c_id =  $centers[0]->ncoe_id;
            }

            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->where('ncoe_id', $c_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
            $dis_id = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('rc_id', Session::get('rc_id')->rc_id)->where('ncoe_id', $c_id)->pluck('discipline_id')->toArray();
            $dis_list_3_2 = DB::table('descipline_master')->select('discipline_id', 'discipline')->whereNotIn('discipline_id', $dis_id)->orderBy('discipline')->get();
        } elseif (Session::get('role_details')->name == 'NCOE') {
            $centers = DB::table('discplines_mapping_master')->where([['status', '=', true], ['ncoe_id', '=', Session::get('user')->user_id]])->select('ncoe_name', 'ncoe_id')->groupBy('ncoe_id', 'ncoe_name')->get();
            if ($center_id != 0) {
                $c_id = decode5t($center_id);
            } else {

                $c_id =  $centers[0]->ncoe_id;
            }


            $dis_list = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->where('ncoe_id', $c_id)->orderBy('discipline')->groupBy('discipline_id', 'discipline')->get();
            $dis_id = DB::table('discplines_mapping_master')->select('discipline_id', 'discipline')->where('ncoe_id', Session::get('user')->user_id)->where('ncoe_id', $c_id)->pluck('discipline_id')->toArray();
            $dis_list_3_2 = DB::table('descipline_master')->select('discipline_id', 'discipline')->whereNotIn('discipline_id', $dis_id)->orderBy('discipline')->get();
            // $dis_list = DB::table('descipline_master')->select('discipline_id', 'discipline')->orderBy('discipline')->get();
        }

        $form_one = part_three_dis_discounted::whereCreatedFor($c_id)->get();
        $form_two = Part_three_dis_added::whereCreatedFor($c_id)->get();
        $form_three = Part_three_table_discipline::whereCreatedFor($c_id)->get();
        $form_four = part_three_table_coache::whereCreatedFor($c_id)->get();
        $form_five = DB::table('part_three_mains')->where('comment_type', 'advantage')->whereCreatedFor($c_id)->first();
        $form_six = DB::table('part_three_mains')->where('comment_type', 'disadvantage')->whereCreatedFor($c_id)->first();


        return view(
            'front.pages.review.part_three',
            [
                'id' => $center_id,
                'form_one' => $form_one,
                'form_two' =>   $form_two,
                'form_three' => $form_three,
                'form_four' => $form_four,
                'form_five' => $form_five,
                'form_six' => $form_six,
                'centers' => $centers,
                'c_id' => $c_id,
                'dis_list' => $dis_list,
                'dis_list_3_2' => $dis_list_3_2,
                'dis_list_3_2_json' => json_encode($dis_list_3_2),
                'dis_list_json' => json_encode($dis_list)
            ]
        );
    }

    public function partThreeformStore(Request $request)
    {
        // dd($request->all());

        if (isset($request->form_1)) {
            foreach ($request->form_1 as $key => $value) {
                if (isset($value['id'])) {
                    $model = part_three_dis_discounted::find($value['id']);
                    $model->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    if (isset($value['dis_dis']) || isset($value['dis_dis_male']) || isset($value['dis_dis_female']) || isset($value['dis_dis_reason'])) {
                        $model = new part_three_dis_discounted();
                        $model->created_by = Session::get('rc_id')->rc_id;
                    }
                }
                if (isset($value['dis_dis']) || isset($value['dis_dis_male']) || isset($value['dis_dis_female']) || isset($value['dis_dis_reason'])) {
                    $model->dis_dis = isset($value['dis_dis']) ? $value['dis_dis'] : null;
                    $model->dis_dis_male = isset($value['dis_dis_male']) ? $value['dis_dis_male'] : null;
                    $model->dis_dis_female = isset($value['dis_dis_female']) ? $value['dis_dis_female'] : null;
                    $model->dis_dis_reason = isset($value['dis_dis_reason']) ? $value['dis_dis_reason'] : null;
                    $model->created_for = $value['created_for'];
                    $model->save();
                }
            }
        }


        if (isset($request->form_2)) {
            foreach ($request->form_2 as $key => $value) {
                if (isset($value['id'])) {
                    $model1 = Part_three_dis_added::find($value['id']);
                    $model1->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    if (isset($value['dis_added']) || isset($value['dis_added_male']) || isset($value['dis_added_female']) || isset($value['dis_added_reason'])) {
                        $model1 = new Part_three_dis_added();
                        $model1->created_by = Session::get('rc_id')->rc_id;
                    }
                }
                if (isset($value['dis_added']) || isset($value['dis_added_male']) || isset($value['dis_added_female']) || isset($value['dis_added_reason'])) {
                    $model1->dis_added =  isset($value['dis_added']) ? $value['dis_added'] : null;
                    $model1->dis_added_male =   isset($value['dis_added_male']) ? $value['dis_added_male'] : null;
                    $model1->dis_added_female =  isset($value['dis_added_female']) ? $value['dis_added_female'] : null;
                    $model1->dis_added_reason =  isset($value['dis_added_reason']) ? $value['dis_added_reason'] : null;
                    $model1->created_for = $value['created_for'];
                    $model1->save();
                }
            }
        }

        if (isset($request->form_3)) {
            foreach ($request->form_3 as $key => $value) {
                if (isset($value['id'])) {
                    $model3 = Part_three_table_discipline::find($value['id']);
                    $model3->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    if (isset($value['strength_discipline']) || isset($value['strength_current_m']) || isset($value['strength_current_f']) || isset($value['pro_sec_strnght_m']) || isset($value['strength_discipline_reason'])) {
                        $model3 = new Part_three_table_discipline();
                        $model3->created_by = Session::get('rc_id')->rc_id;
                    }
                }
                if (isset($value['strength_discipline']) || isset($value['strength_current_m']) || isset($value['strength_current_f']) || isset($value['pro_sec_strnght_m']) || isset($value['strength_discipline_reason'])) {
                    $model3->discipline_discrating = isset($value['strength_discipline']) ? $value['strength_discipline'] : null;
                    $model3->strength_current_m = isset($value['strength_current_m']) ? $value['strength_current_m'] : null;
                    $model3->strength_current_f = isset($value['strength_current_f']) ? $value['strength_current_f'] : null;
                    $model3->pro_sec_strnght_m =  isset($value['pro_sec_strnght_m']) ? $value['pro_sec_strnght_m'] : null;
                    $model3->pro_sec_strnght_f =  isset($value['pro_sec_strnght_f']) ? $value['pro_sec_strnght_f'] : null;
                    $model3->strength_discipline_reason =   isset($value['strength_discipline_reason']) ? $value['strength_discipline_reason'] : null;
                    $model3->created_for = $value['created_for'];
                    $model3->save();
                }
            }
        }

        if (isset($request->form_4)) {
            foreach ($request->form_4 as $key => $value) {
                if (isset($value['id'])) {
                    $model4 = part_three_table_coache::find($value['id']);
                    $model4->updated_by = Session::get('rc_id')->rc_id;
                } else {
                    // dd(2);
                    $model4 = new part_three_table_coache();
                    $model4->created_by = Session::get('rc_id')->rc_id;
                }
                $model4->discipline_coaches = $value['discipline_coaches'];
                $model4->coach_present_m = $value['coaches_pre_male'];
                $model4->coach_present_f = $value['coaches_pre_fmale'];
                $model4->coach_required_m = $value['coaches_req_male'];
                $model4->coach_required_f = $value['coaches_req_fmale'];
                $model4->coach_required_Reason = $value['coaches_req_reason'];
                $model4->created_for = $value['created_for'];
                $model4->save();
            }
        }


        if (isset($request->form_5)) {
            if (isset($request->form_5['id'])) {
                $model = Part_three_main::find($request->form_5['id']);
                $model->updated_by = Session::get('rc_id')->rc_id;
            } else {
                $model = new Part_three_main();
                $model->created_by = Session::get('rc_id')->rc_id;
            }
            $model->comment = $request->form_5['comment'];
            $model->comment_type = $request->form_5['comment_type'];
            $model->created_for = $request->form_5['created_for'];
            $model->save();
        }



        if (isset($request->form_6)) {
            if (isset($request->form_6['id'])) {
                $model = Part_three_main::find($request->form_6['id']);
                $model->updated_by = Session::get('rc_id')->rc_id;
            } else {
                $model = new Part_three_main();
                $model->created_by = Session::get('rc_id')->rc_id;
            }
            $model->comment = $request->form_6['comment'];
            $model->comment_type = $request->form_6['comment_type'];
            $model->created_for = $request->form_6['created_for'];
            $model->save();
        }





        return redirect()->route('review.index');
    }





    //part three start
    public function DeleteDatapartthree($id)
    {
        part_three_dis_discounted::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
    }

    //part two
    public function DeleteDatapartthreetwo($id)
    {
        Part_three_dis_added::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
    }



    //part three
    public function DeleteDatapartthreethree($id)
    {
        Part_three_table_discipline::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
    }


    //part four
    public function DeleteDatapartthreefour($id)
    {
        part_three_table_coache::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Successfully Deleted!!!']);
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


    public function generatePDF()
    {
        $user_id = Session::get('user')->user_id;
        $data = Part_two_other_facilitie::whereCreatedBy($user_id)->get();
        return view('myPDF', compact('data'));
    }

    public function downloadPDF()
    {
        $data = Part_two_other_facilitie::all();
        $pdf = PDF::loadView('myPDF', compact('data'))->setOptions(['defaultFont' => 'arial']);
        return $pdf->download('data.pdf');
    }
    ///shubham excel
    public function download_forms_data($centerid = null)
    {

        $dat_1 = 1.1;
        $form1_title1 = "1.1 At International level (medals won) – Individual Sports";

        if ($centerid != '' || $centerid != null) {
            $form1_cat1 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat1 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }
        $dat_2 = 1.2;
        $form1_title2 = "1.2 At International level (medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat2 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat2 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }
        $dat_3 = 1.3;
        $form1_title3 = "1.3 At International level (medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat3 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat3 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }

        $dat_4 = 1.4;
        $form1_title4 = "1.4 At International Level (Participation)- Individual Sports";

        if ($centerid != '' || $centerid != null) {
            $form1_cat4 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat4 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'participation'],
            ])->get();
        }


        $dat_5 = 1.5;
        $form1_title5 = "1.5 At International level (Participation) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat5 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat5 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'participation'],
            ])->get();
        }


        $dat_6 = 1.6;
        $form1_title6 = "1.6 At International level (Participation) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat6 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat6 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'participation'],
            ])->get();
        }
        $dat_7 = 1.7;
        $form1_title7 = "1.7 At National level (Medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat7 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['level', '=', 'national'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat7 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['level', '=', 'national'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }


        $dat_8 = 1.8;
        $form1_title8 = "1.8 At National Level (Participation)- Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat8 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'ind'],
                ['level', '=', 'national'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat8 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'ind'],
                ['level', '=', 'national'],
                ['form_type', '=', 'participation'],
            ])->get();
        }
        $dat_9 = 1.14;
        $form1_title9 = "1.14 At International level (medals won) – Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat9 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat9 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'team'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }

        $dat_10 = 1.15;
        $form1_title10 = "1.15 At International level (medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat10 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat10 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'team'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }


        $headers = array(
            'Content-Type' => 'text/csv'
        );

        $dat_11 = 1.16;
        $form1_title11 = "1.16 At International level (medals won) – Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat11 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat11 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'team'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }


        $headers = array(
            'Content-Type' => 'text/csv'
        );
        $dat_12 = 1.17;
        $form1_title12 = "1.17 At International Level (Participation)- Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat12 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat12 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'team'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'participation'],
            ])->get();
        }


        $dat_13 = 1.18;
        $form1_title13 = "1.18 At International level (medals won) – Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat13 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat13 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'participation'],
            ])->get();
        }

        $dat_14 = 1.19;
        $form1_title14 = "1.19 At International level (Participation) – Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat14 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat14 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'participation'],
            ])->get();
        }


        $dat_15 = 1.20;
        $form1_title15 = "1.20 At National level (Medals won) – Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat15 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                ['level', '=', 'national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        } else {
            $form1_cat15 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'team'],
                ['level', '=', 'national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'medals_won'],
            ])->get();
        }

        $dat_16 = 1.21;
        $form1_title16 = "1.21 At National Level (Participation)- Team Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_cat16 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'team'],
                ['level', '=', 'national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'participation'],
            ])->get();
        } else {
            $form1_cat16 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'team'],
                ['level', '=', 'national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'participation'],
            ])->get();
        }

        // -------------------part one Step 3 Starts Here  ----------------
        $dat_17 = 1.22;
        $form1_title17 = "1.22 No. of Sports Person selected to the Senior National Coaching camp";
        if ($centerid != '' || $centerid != null) {
            $form1_cat17 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'senior_national_coaching_camp'],
            ])->get();
        } else {
            $form1_cat17 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'senior_national_coaching_camp'],
            ])->get();
        }

        $dat_18 = 1.23;
        $form1_title18 = "1.23 No. of Sports Person selected to the Junior National Coaching camp";
        if ($centerid != '' || $centerid != null) {
            $form1_cat18 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'junior_national_coaching_camp'],
            ])->get();
        } else {
            $form1_cat18 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'junior_national_coaching_camp'],
            ])->get();
        }

        $dat_19 = 1.24;
        $form1_title19 = "1.24 No. of NCOE athletes receiving Stipend under TOPS (Rs 50000 pm)";
        if ($centerid != '' || $centerid != null) {
            $form1_cat19 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                ['form_type', '=', 'under_tops'],
            ])->get();
        } else {
            $form1_cat19 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'common'],
                ['form_type', '=', 'under_tops'],
            ])->get();
        }

        $dat_20 = 1.25;
        $form1_title20 = "1.25 No. of NCOE athletes receiving Stipend under Developmental Athlete (Rs 25000 pm)";
        if ($centerid != '' || $centerid != null) {
            $form1_cat20 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'under_developmental_athlete'],
            ])->get();
        } else {
            $form1_cat20 = ReviewSportData::with('center')->where([
                ['team_type', '=', 'common'],
                ['form_type', '=', 'under_developmental_athlete'],
            ])->get();
        }

        $dat_21 = 1.26;
        $form1_title21 = "1.26 No. of NCOE athletes receiving Stipend under KI (Rs 10000 pm)";
        if ($centerid != '' || $centerid != null) {
            $form1_cat21 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'under_ki'],
            ])->get();
        } else {
            $form1_cat21 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'under_ki'],
            ])->get();
        }

        $dat_22 = 1.27;
        $form1_title22 = "1.27 No. of athletes Weeded Out";
        if ($centerid != '' || $centerid != null) {
            $form1_cat22 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'weeded_out'],
            ])->get();
        } else {
            $form1_cat22 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'weeded_out'],
            ])->get();
        }

        $dat_23 = 1.28;
        $form1_title23 = "1.28 No. of athletes Newly Inducted";
        if ($centerid != '' || $centerid != null) {
            $form1_cat23 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'newly_inducted'],
            ])->get();
        } else {
            $form1_cat23 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'newly_inducted'],
            ])->get();
        }

        $dat_24 = 1.29;
        $form1_title24 = "1.29 No. of athletes Retained";
        if ($centerid != '' || $centerid != null) {
            $form1_cat24 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'athletes_retained'],
            ])->get();
        } else {
            $form1_cat24 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'athletes_retained'],
            ])->get();
        }

        $dat_25 = 1.30;
        $form1_title25 = "1.30 No of athletes left the scheme due to employment/higher studies";
        if ($centerid != '' || $centerid != null) {
            $form1_cat25 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'employment_higher_studies'],
            ])->get();
        } else {
            $form1_cat25 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'employment_higher_studies'],
            ])->get();
        }

        $dat_26 = 1.31;
        $form1_title26 = "1.31 No of athletes left the scheme for personal reasons";
        if ($centerid != '' || $centerid != null) {
            $form1_cat26 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'scheme_personal_reasons'],
            ])->get();
        } else {
            $form1_cat26 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                ['team_type', '=', 'common'],
                // ['level','=','national'],
                // ['category','=','category-3'],
                ['form_type', '=', 'scheme_personal_reasons'],
            ])->get();
        }

        $dat_27 = 1.32;
        $form1_title27 = "1.32 Domicile of the athletes present at the center";
        if ($centerid != '' || $centerid != null) {
            $form1_cat27 = DomicileAthlete::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form1_cat27 = DomicileAthlete::with('center')->get();
        }

        $dat_28 = 1.33;
        $form1_title28 = "1.33 Entry of present athletes to the NCOE";
        if ($centerid != '' || $centerid != null) {
            $form1_cat28 = NcoeAthlete::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form1_cat28 = NcoeAthlete::with('center')->get();
        }

        //New FOrm Added By Aditya Sir


        $headers = array(
            'Content-Type' => 'text/csv'
        );


        $filename =  public_path("review_data.csv");
        // ----------------------------------------------
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
            $form1_title1,

        ]);
        fputcsv($handle, [
            "1.1",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat1 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_1,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,
                ]);
            }
        }

        // --------------------------------------------
        fputcsv($handle, [
            $form1_title2,

        ]);

        fputcsv($handle, [
            "1.2",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat2 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_2,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        //  -------------------------------------------------------------------------
        fputcsv($handle, [
            $form1_title3,

        ]);

        fputcsv($handle, [
            "1.3",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat3 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_3,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  ----------------------------------------------------------------------------

        fputcsv($handle, [
            $form1_title4,

        ]);

        fputcsv($handle, [
            "1.4",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat4 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_4,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  ----------------------------------------------------------------

        fputcsv($handle, [
            $form1_title5,

        ]);

        fputcsv($handle, [
            "1.5",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat5 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_5,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        //  --------------------------------------------------------------------

        fputcsv($handle, [
            $form1_title6,

        ]);

        fputcsv($handle, [
            "1.6",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat6 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_6,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  ----------------------------------------------------------------
        fputcsv($handle, [
            $form1_title7,

        ]);

        fputcsv($handle, [
            "1.7",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat7 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_7,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  -----------------------------------------------------------------------
        fputcsv($handle, [
            $form1_title8,

        ]);

        fputcsv($handle, [
            "1.8",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat8 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'ind') {
                    $tea_ind = "Individual";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_8,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        // --------------------------new task -----------------------------------------
        $dat__n_19 = 1.9;
        $form1_titlen_19 = "1.9 At International level (total medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_catn_19 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                // ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'total_medals_won'],
            ])->get();
        } else {
            $form1_catn_19 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                // ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-1'],
                ['form_type', '=', 'total_medals_won'],
            ])->get();
        }

        fputcsv($handle, [
            $form1_titlen_19,

        ]);

        fputcsv($handle, [
            "1.9",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_catn_19  as $data) {
            if ($data->form_type == 'total_medals_won') {

                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat__n_19,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        // -----------------------------------------------------------------------------------
        $dat__n_20 = 1.10;
        $form1_titlen_20 = "1.10 At International level (total medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_catn_20 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                // ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'total_medals_won'],
            ])->get();
        } else {
            $form1_catn_20 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                // ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-2'],
                ['form_type', '=', 'total_medals_won'],
            ])->get();
        }

        fputcsv($handle, [
            $form1_titlen_20,

        ]);

        fputcsv($handle, [
            "1.10",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_catn_20  as $data) {
            if ($data->form_type == 'total_medals_won') {

                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat__n_20,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        // ------------------------------------------------------------------------------------

        $dat__n_21 = 1.11;
        $form1_titlen_21 = "1.11 At International level (total medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_catn_21 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                // ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'total_medals_won'],
            ])->get();
        } else {
            $form1_catn_21 = ReviewSportData::with('center')->where([
                // ['created_for',$centerid],
                // ['team_type', '=', 'team'],
                // ['level','=','national'],
                ['category', '=', 'category-3'],
                ['form_type', '=', 'total_medals_won'],
            ])->get();
        }

        fputcsv($handle, [
            $form1_titlen_21,

        ]);

        fputcsv($handle, [
            "1.11",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_catn_21  as $data) {
            if ($data->form_type == 'total_medals_won') {

                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat__n_21,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        // -----------------------------------------1.12------------------------------------------
        $dat__n_22 = 1.12;
        $form1_titlen_22 = "1.12 At National level (athletes who won medals) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_catn_22 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['level', '=', 'national'],
                ['form_type', '=', 'athelets_medals_won'],
            ])->get();
        } else {
            $form1_catn_22 = ReviewSportData::with('center')->where([
                ['level', '=', 'national'],
                ['form_type', '=', 'athelets_medals_won'],
            ])->get();
        }

        fputcsv($handle, [
            $form1_titlen_22,

        ]);

        fputcsv($handle, [
            "1.12",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_catn_22  as $data) {
            if ($data->form_type == 'athelets_medals_won') {

                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat__n_22,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        // --------------------------1.13 --------------------------------------------

        $dat__n_23 = 1.13;
        $form1_titlen_23 = "1.13 At National level (total medals won) – Individual Sports";
        if ($centerid != '' || $centerid != null) {
            $form1_catn_23 = ReviewSportData::with('center')->where([
                ['created_for', $centerid],
                ['level', '=', 'national'],
                ['form_type', '=', 'athelets_total_medals_won'],
            ])->get();
        } else {
            $form1_catn_23 = ReviewSportData::with('center')->where([
                ['level', '=', 'national'],
                ['form_type', '=', 'athelets_total_medals_won'],
            ])->get();
        }

        fputcsv($handle, [
            $form1_titlen_23,

        ]);

        fputcsv($handle, [
            "1.13",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_catn_23  as $data) {
            if ($data->form_type == 'athelets_total_medals_won') {

                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat__n_23,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        //  ----------------------Step 2 Starts Here  ------------------------------

        fputcsv($handle, [
            $form1_title9,

        ]);

        fputcsv($handle, [
            "1.14",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat9 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_9,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        //  ------------------------------------------------------

        fputcsv($handle, [
            $form1_title10,

        ]);

        fputcsv($handle, [
            "1.15",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat10 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_10,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  ----------------------------------------------------------------

        fputcsv($handle, [
            $form1_title11,

        ]);

        fputcsv($handle, [
            "1.16",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat11 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_11,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        //  --------------------------------------------------------------------
        fputcsv($handle, [
            $form1_title12,

        ]);

        fputcsv($handle, [
            "1.17",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat12 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_12,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  -------------------------------------------------------------------

        fputcsv($handle, [
            $form1_title13,

        ]);

        fputcsv($handle, [
            "1.18",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat13 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_13,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  -----------------------------------------------------------

        fputcsv($handle, [
            $form1_title14,

        ]);

        fputcsv($handle, [
            "1.19",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat14 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }

                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_14,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }



        fputcsv($handle, [
            $form1_title15,

        ]);

        fputcsv($handle, [
            "1.20",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat15 as $data) {
            if ($data->form_type == 'medals_won') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_15,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }


        fputcsv($handle, [
            $form1_title16,

        ]);

        fputcsv($handle, [
            "1.21",
            "NCOE Name",
            "Team Type",
            "Category",
            "Displine",
            "Level",
            "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat16 as $data) {
            if ($data->form_type == 'participation') {
                if ($data->team_type == 'team') {
                    $tea_ind = "Team";
                }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_16,
                    $data->center->ncoe_name,
                    $tea_ind,
                    $data->category,
                    $d_name,
                    isset($data->level) ? $data->level : 'International',
                    $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //  ------------------------Part 3 Starts Here  ------------------------------------

        fputcsv($handle, [
            $form1_title17,

        ]);

        fputcsv($handle, [
            "1.22",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat17 as $data) {
            if ($data->form_type == 'senior_national_coaching_camp') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_17,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        fputcsv($handle, [
            $form1_title18,

        ]);

        fputcsv($handle, [
            "1.23",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat18 as $data) {
            if ($data->form_type == 'junior_national_coaching_camp') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_18,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        fputcsv($handle, [
            $form1_title19,

        ]);

        fputcsv($handle, [
            "1.24",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat19 as $data) {
            if ($data->form_type == 'under_tops') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_19,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        fputcsv($handle, [
            $form1_title20,

        ]);

        fputcsv($handle, [
            "1.25",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat20 as $data) {
            if ($data->form_type == 'under_developmental_athlete') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_20,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        fputcsv($handle, [
            $form1_title21,

        ]);

        fputcsv($handle, [
            "1.26",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat21 as $data) {
            if ($data->form_type == 'under_ki') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_21,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        fputcsv($handle, [
            $form1_title22,

        ]);

        fputcsv($handle, [
            "1.27",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat22 as $data) {
            if ($data->form_type == 'weeded_out') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_22,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        fputcsv($handle, [
            $form1_title23,

        ]);

        fputcsv($handle, [
            "1.28",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat23 as $data) {
            if ($data->form_type == 'newly_inducted') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_23,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        fputcsv($handle, [
            $form1_title24,

        ]);

        fputcsv($handle, [
            "1.29",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat24 as $data) {
            if ($data->form_type == 'athletes_retained') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_24,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        fputcsv($handle, [
            $form1_title25,

        ]);

        fputcsv($handle, [
            "1.30",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat25 as $data) {
            if ($data->form_type == 'employment_higher_studies') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_25,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }
        fputcsv($handle, [
            $form1_title26,

        ]);

        fputcsv($handle, [
            "1.31",
            "NCOE Name",
            // "Team Type",
            // "Category",
            "Displine",
            // "Level",
            // "Form Type",
            "Male-2018_19",
            "Female -2018_19",
            "Male -2019_20",
            "Female -2019_20",
            "Male -2020_21",
            "Female -2020_21",
            "Male -2021_22",
            "Female -2021_22",
            "Male -2022_23",
            "Female -2022_23",
        ]);


        foreach ($form1_cat26 as $data) {
            if ($data->form_type == 'scheme_personal_reasons') {
                // if($data->team_type == 'team'){
                //     $tea_ind = "Team";
                // }
                $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
                $d_name = $displine_name->discipline ?? null;
                fputcsv($handle, [
                    $dat_26,
                    $data->center->ncoe_name,
                    // $tea_ind,
                    //  $data->category,
                    $d_name,
                    //  $data->level,
                    //  $data->form_type,
                    $data->m_2018_19,
                    $data->f_2018_19,
                    $data->m_2019_20,
                    $data->f_2019_20,
                    $data->m_2020_21,
                    $data->f_2020_21,
                    $data->m_2021_22,
                    $data->f_2021_22,
                    $data->m_2022_23,
                    $data->f_2022_23,


                ]);
            }
        }

        //Domisile Output Starts Here


        fputcsv($handle, [
            $form1_title27,

        ]);

        fputcsv($handle, [
            "1.32",
            "NCOE Name",
            "State",
            "Discipline",
            "No.of Male",
            "No.of Female",
        ]);


        foreach ($form1_cat27 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;

            $state_name = DB::table('state_masters')->where('id', $data->state_id)->select('id', 'state_name')->groupBy('id', 'state_name')->first();
            $s_name = $state_name->state_name;
            fputcsv($handle, [
                $dat_27,
                $data->center->ncoe_name,
                $s_name,
                $d_name,
                $data->no_of_male,
                $data->no_of_female,

            ]);

            // }

        }

        fputcsv($handle, [
            $form1_title28,

        ]);

        fputcsv($handle, [
            "1.33",
            "NCOE Name",
            "Discipline",
            "KIA_Male",
            "KIA_Female",
            "STC_Male",
            "STC_Female",
            "State Academy_Male",
            "State Academy_Female",
            "Private Academies_Male",
            "Private Academies_Female",
            "Trials Conducted_Male",
            "Trials Conducted_Female",
            "Come & Play Scheme_Male",
            "Come & Play Scheme_Female",
        ]);


        foreach ($form1_cat28 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;
            fputcsv($handle, [
                $dat_28,
                $d_name,
                $data->center->ncoe_name,
                $data->kia_male,
                $data->kia_female,
                $data->stc_male,
                $data->stc_female,
                $data->state_ac_male,
                $data->pvt_ac_male,
                $data->pvt_ac_female,
                $data->open_trials_male,
                $data->open_trials_female,
                $data->play_scheme_male,
                $data->play_scheme_female,

            ]);

            // }

        }



        fclose($handle);

        return Response::download($filename, "review_data.csv", $headers);
    }



    public function download_forms_part_three($centerid = null)
    {

        $dat_31 = 3.1;
        $form1_title31 = "3.1 Discipline which can be discontinued";
        if ($centerid != '' || $centerid != null) {
            $form1_cat31 = part_three_dis_discounted::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form1_cat31 = part_three_dis_discounted::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }
        // dd($form1_cat31);
        $dat_32 = 3.2;
        $form1_title32 = "3.2 Discipline to be added";
        if ($centerid != '' || $centerid != null) {
            $form1_cat32 = Part_three_dis_added::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form1_cat32 = Part_three_dis_added::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        $dat_33 = 3.3;
        $form1_title33 = "3.3 Discipline-wise sanctioned strength to be revised (if-needed)";

        if ($centerid != '' || $centerid != null) {
            $form1_cat33 = Part_three_table_discipline::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form1_cat33 = Part_three_table_discipline::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        $dat_34 = 3.4;
        $form1_title34 = "3.4 Availablity of coaches";

        if ($centerid != '' || $centerid != null) {
            $form1_cat34 = part_three_table_coache::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form1_cat34 = part_three_table_coache::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        $dat_35 = 3.5;
        $form1_title35 = "3.5 List any three advantage / merits of the center:";

        if ($centerid != '' || $centerid != null) {
            $form1_cat35 = Part_three_main::with('center')->where([
                ['created_for', $centerid],
                ['comment_type', '=', 'advantage'],
            ])->get();
        } else {
            $form1_cat35 = Part_three_main::with('center')->where([
                ['comment_type', '=', 'advantage'],
            ])->get();
        }


        $dat_36 = 3.6;
        $form1_title36 = "3.6 List any three difficulties (challenges) facing:";

        if ($centerid != '' || $centerid != null) {
            $form1_cat36 = Part_three_main::with('center')->where([
                ['created_for', $centerid],
                ['comment_type', '=', 'disadvantage'],
            ])->get();
        } else {
            $form1_cat36 = Part_three_main::with('center')->where([
                ['comment_type', '=', 'disadvantage'],
            ])->get();
        }
        $headers = array(
            'Content-Type' => 'text/csv'
        );


        $filename =  public_path("review_data.csv");
        // ----------------------------------------------
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
            $form1_title31,

        ]);
        fputcsv($handle, [
            "3.1",
            "NCOE Name",
            "Discipline",
            "Existing Athletes_Male",
            "Existing Athletes_Female",
            "Reason",

        ]);


        foreach ($form1_cat31 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->dis_dis)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;
            fputcsv($handle, [
                $dat_31,
                $data->center->ncoe_name ?? null,
                $d_name,
                $data->dis_dis_male,
                $data->dis_dis_female,
                $data->dis_dis_reason,

            ]);
        }

        fputcsv($handle, [
            $form1_title32,

        ]);
        fputcsv($handle, [
            "3.2",
            "NCOE Name",
            "Discipline",
            "Existing Athletes_Male",
            "Existing Athletes_Female",
            "Reason",

        ]);


        foreach ($form1_cat32 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->dis_added)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;

            fputcsv($handle, [
                $dat_32,
                $data->center->ncoe_name ?? null,
                $d_name,
                $data->dis_added_male,
                $data->dis_added_female,
                $data->dis_added_reason,

            ]);
        }



        fputcsv($handle, [
            $form1_title33,

        ]);
        fputcsv($handle, [
            "3.3",
            "NCOE Name",
            "Discipline",
            "Current Sanctioned_Male",
            "Current Sanctioned_Female",
            "Proposed Sanctioned_Male",
            "Proposed Sanctioned_Female",
            "Reason",

        ]);


        foreach ($form1_cat33 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_discrating)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;
            fputcsv($handle, [
                $dat_33,
                $data->center->ncoe_name ?? null,
                $d_name,
                $data->strength_current_m,
                $data->strength_current_f,
                $data->pro_sec_strnght_m,
                $data->pro_sec_strnght_f,
                $data->strength_discipline_reason,


            ]);
        }


        fputcsv($handle, [
            $form1_title34,

        ]);
        fputcsv($handle, [
            "3.4",
            "NCOE Name",
            "Discipline",
            "Coach Present_Male",
            "Coach Present_Female",
            "Coach Required_Male",
            "Coach Required_Female",
            "Reason",

        ]);


        foreach ($form1_cat34 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discipline_coaches)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;
            fputcsv($handle, [
                $dat_34,
                $data->center->ncoe_name ?? null,
                $d_name,
                $data->coach_present_m,
                $data->coach_present_f,
                $data->coach_required_m,
                $data->coach_required_f,
                $data->coach_required_Reason,


            ]);
        }

        fputcsv($handle, [
            $form1_title35,

        ]);
        fputcsv($handle, [
            "3.5",
            "NCOE Name",
            "Comments",

        ]);


        foreach ($form1_cat35 as $data) {

            fputcsv($handle, [
                $dat_35,
                $data->center->ncoe_name ?? null,
                $data->comment,

            ]);
        }

        fputcsv($handle, [
            $form1_title36,

        ]);
        fputcsv($handle, [
            "3.6",
            "NCOE Name",
            "Comments",

        ]);


        foreach ($form1_cat36 as $data) {

            fputcsv($handle, [
                $dat_36,
                $data->center->ncoe_name ?? null,
                $data->comment,

            ]);
        }



        fclose($handle);

        return Response::download($filename, "review_part_three.csv", $headers);
    }


    // ----------------------------------------Part Two Starts Here  --------------------------------------------


    public function download_forms_part_two($centerid = null)
    {

        $dat_21 = 2.1;
        $form2_title21 = "2.Infrastructure Facilities at Present Available";

        if ($centerid != '' || $centerid != null) {
            $form2_cat21 = Formtwomain::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat21 = Formtwomain::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        //No of Rooms*

        $dat_23 = 2.3;
        $form2_title23 = "2.3 Accommodation (Rooms/Dormitories)";

        if ($centerid != '' || $centerid != null) {
            $form2_cat23 = Part_two_achieve_accommods::with('center')->select('created_for', 'accommods_part_two_rooms_male_ac', 'accommods_part_two_rooms_male_ac_rating', 'accommods_part_two_rooms_male_nonac', 'accommods_part_two_rooms_male_nonacrating', 'accommods_part_two_rooms_female_ac', 'accommods_part_two_rooms_female_ac_rating', 'accommods_part_two_rooms_female_nonac', 'accommods_part_two_rooms_female_nonacrating', 'accommods_part_two_rooms_remark')
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat23 = Part_two_achieve_accommods::with('center')->select('created_for', 'accommods_part_two_rooms_male_ac', 'accommods_part_two_rooms_male_ac_rating', 'accommods_part_two_rooms_male_nonac', 'accommods_part_two_rooms_male_nonacrating', 'accommods_part_two_rooms_female_ac', 'accommods_part_two_rooms_female_ac_rating', 'accommods_part_two_rooms_female_nonac', 'accommods_part_two_rooms_female_nonacrating', 'accommods_part_two_rooms_remark')
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        //Total Accomodation Capacity of Rooms

        $form2_title24 = "2.3 Accommodation (Total Accomodation Capacity of Rooms)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat24 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_accomodation_capacity_male_ac',
                'accommods_part_two_accomodation_capacity_male_ac_rating',
                'accommods_part_two_accomodation_capacity_male_nonac',
                'accommods_part_two_accomodation_capacity_male_nonacrating',
                'accommods_part_two_accomodation_capacity_female_ac',
                'accommods_part_two_accomodation_capacity_female_ac_rating',
                'accommods_part_two_accomodation_capacity_female_nonac',
                'accommods_part_two_accomodation_capacityrooms_female_nonacrating',
                'accommods_part_two_accomodation_capacity_remark'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat24 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_accomodation_capacity_male_ac',
                'accommods_part_two_accomodation_capacity_male_ac_rating',
                'accommods_part_two_accomodation_capacity_male_nonac',
                'accommods_part_two_accomodation_capacity_male_nonacrating',
                'accommods_part_two_accomodation_capacity_female_ac',
                'accommods_part_two_accomodation_capacity_female_ac_rating',
                'accommods_part_two_accomodation_capacity_female_nonac',
                'accommods_part_two_accomodation_capacityrooms_female_nonacrating',
                'accommods_part_two_accomodation_capacity_remark'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }



        //No of Dormitory*

        $form2_title25 = "2.3 Accommodation (No of Dormitory)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat25 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_dormitory_male_ac',
                'accommods_part_two_dormitory_male_ac_rating',
                'accommods_part_two_dormitory_male_nonac',
                'accommods_part_two_dormitory_male_nonacrating',
                'accommods_part_two_dormitory_female_ac',
                'accommods_part_two_dormitory_female_ac_rating',
                'accommods_part_two_dormitory_female_nonac',
                'accommods_part_two_dormitory_female_nonacrating',
                'accommods_part_two_dormitory_remark'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat25 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_dormitory_male_ac',
                'accommods_part_two_dormitory_male_ac_rating',
                'accommods_part_two_dormitory_male_nonac',
                'accommods_part_two_dormitory_male_nonacrating',
                'accommods_part_two_dormitory_female_ac',
                'accommods_part_two_dormitory_female_ac_rating',
                'accommods_part_two_dormitory_female_nonac',
                'accommods_part_two_dormitory_female_nonacrating',
                'accommods_part_two_dormitory_remark'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        //Total Accomodation Capacity of Dormitory

        $form2_title26 = "2.3 Accommodation ( Total Accomodation Capacity of Dormitory )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat26 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_capacity_dormitory_male_ac',
                'accommods_part_two_capacity_dormitory_male_ac_rating',
                'accommods_part_two_capacity_dormitory_male_nonac',
                'accommods_part_two_capacity_dormitory_male_nonacrating',
                'accommods_part_two_capacity_dormitory_female_ac',
                'accommods_part_two_capacity_dormitory_female_ac_rating',
                'accommods_part_two_capacity_dormitory_female_nonac',
                'accommods_part_two_capacity_dormitory_female_nonacrating',
                'accommods_part_two_capacity_dormitory_remark'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat26 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_capacity_dormitory_male_ac',
                'accommods_part_two_capacity_dormitory_male_ac_rating',
                'accommods_part_two_capacity_dormitory_male_nonac',
                'accommods_part_two_capacity_dormitory_male_nonacrating',
                'accommods_part_two_capacity_dormitory_female_ac',
                'accommods_part_two_capacity_dormitory_female_ac_rating',
                'accommods_part_two_capacity_dormitory_female_nonac',
                'accommods_part_two_capacity_dormitory_female_nonacrating',
                'accommods_part_two_capacity_dormitory_remark'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }



        //No. of Washrooms/Toilet (attached)

        $form2_title27 = "2.3 Accommodation ( No. of Washrooms/Toilet (attached) )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat27 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_toilet_attached_male_ac',
                'accommods_part_two_toilet_attached_male_ac_rating',
                'accommods_part_two_toilet_attached_male_nonac',
                'accommods_part_two_toilet_attached_male_nonacrating',
                'accommods_part_two_toilet_attached_female_ac',
                'accommods_part_two_toilet_attached_female_ac_rating',
                'accommods_part_two_toilet_attached_female_nonac',
                'accommods_part_two_toilet_attached_female_nonacrating',
                'accommods_part_two_toilet_attached_remark'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat27 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_toilet_attached_male_ac',
                'accommods_part_two_toilet_attached_male_ac_rating',
                'accommods_part_two_toilet_attached_male_nonac',
                'accommods_part_two_toilet_attached_male_nonacrating',
                'accommods_part_two_toilet_attached_female_ac',
                'accommods_part_two_toilet_attached_female_ac_rating',
                'accommods_part_two_toilet_attached_female_nonac',
                'accommods_part_two_toilet_attached_female_nonacrating',
                'accommods_part_two_toilet_attached_remark'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }


        //No. of Washrooms/Toilet (Non-attached)

        $form2_title28 = "2.3 Accommodation (No. of Washrooms/Toilet (Non-attached) )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat28 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_toilet_non_attached_male_ac',
                'accommods_part_two_toilet_non_attached_male_ac_rating',
                'accommods_part_two_toilet_non_attached_male_nonac',
                'accommods_part_two_toilet_non_attached_male_nonacrating',
                'accommods_part_two_toilet_non_attached_female_ac',
                'accommods_part_two_toilet_non_attached_female_ac_rating',
                'accommods_part_two_toilet_non_attached_female_nonac',
                'accommods_part_two_toilet_non_attached_female_nonacrating',
                'accommods_part_two_toilet_non_attached_remark'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat28 = Part_two_achieve_accommods::with('center')->select(
                'created_for',
                'accommods_part_two_toilet_non_attached_male_ac',
                'accommods_part_two_toilet_non_attached_male_ac_rating',
                'accommods_part_two_toilet_non_attached_male_nonac',
                'accommods_part_two_toilet_non_attached_male_nonacrating',
                'accommods_part_two_toilet_non_attached_female_ac',
                'accommods_part_two_toilet_non_attached_female_ac_rating',
                'accommods_part_two_toilet_non_attached_female_nonac',
                'accommods_part_two_toilet_non_attached_female_nonacrating',
                'accommods_part_two_toilet_non_attached_remark'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }



        $headers = array(
            'Content-Type' => 'text/csv'
        );
        $filename =  public_path("review_data.csv");
        $handle = fopen($filename, 'w');


        fputcsv($handle, [
            $form2_title23,

        ]);
        fputcsv($handle, [
            "2.3",
            "NCOE Name",
            "No of Rooms_Male_A/C",
            "No of Rooms_Male_Rating",
            "No of Rooms_Male_Non-A/C",
            "No of Rooms_Male_Rating",
            "No of Rooms_Female_A/C",
            "No of Rooms_Female_Rating",
            "No of Rooms_Female_Non-A/C",
            "No of Rooms_Female_Non-Rating",
            "No of Rooms Remark",

        ]);

        foreach ($form2_cat23 as $data) {
            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->accommods_part_two_rooms_male_ac_rating,
                $data->accommods_part_two_rooms_male_nonacrating,
                $data->accommods_part_two_rooms_female_ac_rating,
                $data->accommods_part_two_rooms_female_nonacrating,
            ])->pluck('rating', 'rating_id')->toArray();
            // dd($rating[$data->accommods_part_two_rooms_male_ac_rating]);

            fputcsv($handle, [
                $dat_23,
                $data->center->ncoe_name ?? null,
                $data->accommods_part_two_rooms_male_ac,
                $rating[$data->accommods_part_two_rooms_male_ac_rating] ?? null,
                $data->accommods_part_two_rooms_male_nonac,
                $rating[$data->accommods_part_two_rooms_male_nonacrating] ?? null,
                $data->accommods_part_two_rooms_female_ac,
                $rating[$data->accommods_part_two_rooms_female_ac_rating] ?? null,
                $data->accommods_part_two_rooms_female_nonac,
                $rating[$data->accommods_part_two_rooms_female_nonacrating] ?? null,
                $data->accommods_part_two_rooms_remark,

            ]);
        }

        fputcsv($handle, [
            $form2_title24,

        ]);
        fputcsv($handle, [
            "2.3",
            "NCOE Name",
            "Male_A/C",
            "Male_Rating",
            "Male_Non-A/C",
            "Male_Rating",
            "Female_A/C",
            "Female_Rating",
            "Female_Non-A/C",
            "Female_Non-Rating",
            "Remark",

        ]);

        foreach ($form2_cat24 as $data) {
            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->accommods_part_two_accomodation_capacity_male_ac_rating,
                $data->accommods_part_two_accomodation_capacity_male_nonacrating,
                $data->accommods_part_two_accomodation_capacity_female_ac_rating,
                $data->accommods_part_two_accomodation_capacityrooms_female_nonacrating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_23,
                $data->center->ncoe_name ?? null,
                $data->accommods_part_two_accomodation_capacity_male_ac,
                $rating[$data->accommods_part_two_accomodation_capacity_male_ac_rating] ?? null,
                $data->accommods_part_two_accomodation_capacity_male_nonac,
                $rating[$data->accommods_part_two_accomodation_capacity_male_nonacrating] ?? null,
                $data->accommods_part_two_accomodation_capacity_female_ac,
                $rating[$data->accommods_part_two_accomodation_capacity_female_ac_rating] ?? null,
                $data->accommods_part_two_accomodation_capacity_female_nonac,
                $rating[$data->accommods_part_two_accomodation_capacityrooms_female_nonacrating] ?? null,
                $data->accommods_part_two_accomodation_capacity_remark,

            ]);
        }

        fputcsv($handle, [
            $form2_title25,

        ]);
        fputcsv($handle, [
            "2.3",
            "NCOE Name",
            "Male_A/C",
            "Male_Rating",
            "Male_Non-A/C",
            "Male_Rating",
            "Female_A/C",
            "Female_Rating",
            "Female_Non-A/C",
            "Female_Non-Rating",
            "Remark",

        ]);

        foreach ($form2_cat25 as $data) {
            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->accommods_part_two_dormitory_male_ac_rating,
                $data->accommods_part_two_dormitory_male_nonacrating,
                $data->accommods_part_two_dormitory_female_ac_rating,
                $data->accommods_part_two_dormitory_female_nonacrating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_23,
                $data->center->ncoe_name ?? null,
                $data->accommods_part_two_dormitory_male_ac,
                $rating[$data->accommods_part_two_dormitory_male_ac_rating] ?? null,
                $data->accommods_part_two_dormitory_male_nonac,
                $rating[$data->accommods_part_two_dormitory_male_nonacrating] ?? null,
                $data->accommods_part_two_dormitory_female_ac,
                $rating[$data->accommods_part_two_dormitory_female_ac_rating] ?? null,
                $data->accommods_part_two_dormitory_female_nonac,
                $rating[$data->accommods_part_two_dormitory_female_nonacrating] ?? null,
                $data->accommods_part_two_dormitory_remark,

            ]);
        }

        fputcsv($handle, [
            $form2_title26,

        ]);
        fputcsv($handle, [
            "2.3",
            "NCOE Name",
            "Male_A/C",
            "Male_Rating",
            "Male_Non-A/C",
            "Male_Rating",
            "Female_A/C",
            "Female_Rating",
            "Female_Non-A/C",
            "Female_Non-Rating",
            "Remark",

        ]);

        foreach ($form2_cat26 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->accommods_part_two_capacity_dormitory_male_ac_rating,
                $data->accommods_part_two_capacity_dormitory_male_nonacrating,
                $data->accommods_part_two_capacity_dormitory_female_ac_rating,
                $data->accommods_part_two_capacity_dormitory_female_nonacrating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_23,
                $data->center->ncoe_name ?? null,
                $data->accommods_part_two_capacity_dormitory_male_ac,
                $rating[$data->accommods_part_two_capacity_dormitory_male_ac_rating] ?? null,
                $data->accommods_part_two_capacity_dormitory_male_nonac,
                $rating[$data->accommods_part_two_capacity_dormitory_male_nonacrating] ?? null,
                $data->accommods_part_two_capacity_dormitory_female_ac,
                $rating[$data->accommods_part_two_capacity_dormitory_female_ac_rating] ?? null,
                $data->accommods_part_two_capacity_dormitory_female_nonac,
                $rating[$data->accommods_part_two_capacity_dormitory_female_nonacrating] ?? null,
                $data->accommods_part_two_capacity_dormitory_remark,

            ]);
        }

        fputcsv($handle, [
            $form2_title27,

        ]);
        fputcsv($handle, [
            "2.3",
            "NCOE Name",
            "Male_A/C",
            "Male_Rating",
            "Male_Non-A/C",
            "Male_Rating",
            "Female_A/C",
            "Female_Rating",
            "Female_Non-A/C",
            "Female_Non-Rating",
            "Remark",

        ]);

        foreach ($form2_cat27 as $data) {
            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->accommods_part_two_toilet_attached_male_ac_rating,
                $data->accommods_part_two_toilet_attached_male_nonacrating,
                $data->accommods_part_two_toilet_attached_female_ac_rating,
                $data->accommods_part_two_toilet_attached_female_nonacrating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_23,
                $data->center->ncoe_name ?? null,
                $data->accommods_part_two_toilet_attached_male_ac,
                $rating[$data->accommods_part_two_toilet_attached_male_ac_rating] ?? null,
                $data->accommods_part_two_toilet_attached_male_nonac,
                $rating[$data->accommods_part_two_toilet_attached_male_nonacrating] ?? null,
                $data->accommods_part_two_toilet_attached_female_ac,
                $rating[$data->accommods_part_two_toilet_attached_female_ac_rating] ?? null,
                $data->accommods_part_two_toilet_attached_female_nonac,
                $rating[$data->accommods_part_two_toilet_attached_female_nonacrating] ?? null,
                $data->accommods_part_two_toilet_attached_remark,

            ]);
        }

        fputcsv($handle, [
            $form2_title28,

        ]);
        fputcsv($handle, [
            "2.3",
            "NCOE Name",
            "Male_A/C",
            "Male_Rating",
            "Male_Non-A/C",
            "Male_Rating",
            "Female_A/C",
            "Female_Rating",
            "Female_Non-A/C",
            "Female_Non-Rating",
            "Remark",

        ]);

        foreach ($form2_cat28 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->accommods_part_two_toilet_non_attached_male_ac_rating,
                $data->accommods_part_two_toilet_non_attached_male_nonacrating,
                $data->accommods_part_two_toilet_non_attached_female_ac_rating,
                $data->accommods_part_two_toilet_non_attached_female_nonacrating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_23,
                $data->center->ncoe_name ?? null,
                $data->accommods_part_two_toilet_non_attached_male_ac,
                $rating[$data->accommods_part_two_toilet_non_attached_male_ac_rating] ?? null,
                $data->accommods_part_two_toilet_non_attached_male_nonac,
                $rating[$data->accommods_part_two_toilet_non_attached_male_nonacrating] ?? null,
                $data->accommods_part_two_toilet_non_attached_female_ac,
                $rating[$data->accommods_part_two_toilet_non_attached_female_ac_rating] ?? null,
                $data->accommods_part_two_toilet_non_attached_female_nonac,
                $rating[$data->accommods_part_two_toilet_non_attached_female_nonacrating] ?? null,
                $data->accommods_part_two_toilet_non_attached_remark,

            ]);
        }
        $dat_29 = '2.4';
        if ($centerid != '' || $centerid != null) {
            $form2_cat29 = Part_two_kitchen_dining::with('center')->select(
                'created_for',
                'kitchen_dinings_dining_hall_ac_count',
                'kitchen_dinings_dining_hall_area_male',
                'kitchen_dinings_dining_hall_area_female',
                'kitchen_dinings_dining_hall_rating',
                'kitchen_dinings_dining_hall_nonac_ac_count',
                'kitchen_dinings_dining_hall_nonac_area_male',
                'kitchen_dinings_dining_hall_nonac_area_female',
                'kitchen_dinings_dining_hall_nonac_rating',
                'kitchen_dinings_dining_hall_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat29 = Part_two_kitchen_dining::with('center')->select(
                'created_for',
                'kitchen_dinings_dining_hall_ac_count',
                'kitchen_dinings_dining_hall_area_male',
                'kitchen_dinings_dining_hall_area_female',
                'kitchen_dinings_dining_hall_rating',
                'kitchen_dinings_dining_hall_nonac_ac_count',
                'kitchen_dinings_dining_hall_nonac_area_male',
                'kitchen_dinings_dining_hall_nonac_area_female',
                'kitchen_dinings_dining_hall_nonac_rating',
                'kitchen_dinings_dining_hall_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        $form2_title29 = "2.4 Kitchen and Dining area ( Dining hall )";


        fputcsv($handle, [
            $form2_title29,

        ]);
        fputcsv($handle, [
            "2.4",
            "NCOE Name",
            "A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat29 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->kitchen_dinings_dining_hall_rating,
                $data->kitchen_dinings_dining_hall_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_29,
                $data->center->ncoe_name ?? null,
                $data->kitchen_dinings_dining_hall_ac_count,
                $data->kitchen_dinings_dining_hall_area_male,
                $data->kitchen_dinings_dining_hall_area_female,
                $rating[$data->kitchen_dinings_dining_hall_rating] ?? null,
                $data->kitchen_dinings_dining_hall_nonac_ac_count,
                $data->kitchen_dinings_dining_hall_nonac_area_male,
                $data->kitchen_dinings_dining_hall_nonac_area_female,
                $rating[$data->kitchen_dinings_dining_hall_nonac_rating] ?? null,
                $data->kitchen_dinings_dining_hall_remarks,


            ]);
        }

        $form2_title30 = "2.4 Kitchen and Dining area ( Kitchen )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat30 = Part_two_kitchen_dining::with('center')->select(
                'created_for',
                'kitchen_kitchen_hall_ac_count',
                'kitchen_kitchen_dining_hall_area_male',
                'kitchen_kitchen_dining_hall_rating',
                'kitchen_kitchen_dining_hall_nonac_ac_count',
                'kitchen_kitchen_dining_hall_nonac_area_male',
                'kitchen_kitchen_dining_hall_nonac_rating',
                'kitchen_kitchen_dining_hall_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat30 = Part_two_kitchen_dining::with('center')->select(
                'created_for',
                'kitchen_kitchen_hall_ac_count',
                'kitchen_kitchen_dining_hall_area_male',
                'kitchen_kitchen_dining_hall_rating',
                'kitchen_kitchen_dining_hall_nonac_ac_count',
                'kitchen_kitchen_dining_hall_nonac_area_male',
                'kitchen_kitchen_dining_hall_nonac_rating',
                'kitchen_kitchen_dining_hall_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }


        fputcsv($handle, [
            $form2_title30,

        ]);
        fputcsv($handle, [
            "2.4",
            "NCOE Name",
            "A/C Count",
            "Capacity/area",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat30 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->kitchen_kitchen_dining_hall_rating,
                $data->kitchen_kitchen_dining_hall_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_29,
                $data->center->ncoe_name ?? null,
                $data->kitchen_kitchen_hall_ac_count,
                $data->kitchen_kitchen_dining_hall_area_male,
                $rating[$data->kitchen_kitchen_dining_hall_rating] ?? null,
                $data->kitchen_kitchen_dining_hall_nonac_ac_count,
                $data->kitchen_kitchen_dining_hall_nonac_area_male,
                $rating[$data->kitchen_kitchen_dining_hall_nonac_rating] ?? null,
                $data->kitchen_kitchen_dining_hall_remarks,

            ]);
        }



        $form2_title31 = "2.4 Kitchen and Dining area ( Store room )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat31 = Part_two_kitchen_dining::with('center')->select(
                'created_for',
                'kitchen_store_room_hall_ac_count',
                'kitchen_store_room_dining_hall_area_male',
                'kitchen_store_room_dining_hall_rating',
                'kitchen_store_room_dining_hall_nonac_ac_count',
                'kitchen_store_room_dining_hall_nonac_area_male',
                'kitchen_store_room_dining_hall_nonac_rating',
                'kitchen_store_room_dining_hall_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat31 = Part_two_kitchen_dining::with('center')->select(
                'created_for',
                'kitchen_store_room_hall_ac_count',
                'kitchen_store_room_dining_hall_area_male',
                'kitchen_store_room_dining_hall_rating',
                'kitchen_store_room_dining_hall_nonac_ac_count',
                'kitchen_store_room_dining_hall_nonac_area_male',
                'kitchen_store_room_dining_hall_nonac_rating',
                'kitchen_store_room_dining_hall_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }


        fputcsv($handle, [
            $form2_title31,

        ]);
        fputcsv($handle, [
            "2.4",
            "NCOE Name",
            "A/C Count",
            "Capacity/area",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat31 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->kitchen_store_room_dining_hall_rating,
                $data->kitchen_store_room_dining_hall_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_29,
                $data->center->ncoe_name ?? null,
                $data->kitchen_store_room_hall_ac_count,
                $data->kitchen_store_room_dining_hall_area_male,
                $rating[$data->kitchen_store_room_dining_hall_rating] ?? null,
                $data->kitchen_store_room_dining_hall_nonac_ac_count,
                $data->kitchen_store_room_dining_hall_nonac_area_male,
                $rating[$data->kitchen_store_room_dining_hall_nonac_rating] ?? null,
                $data->kitchen_store_room_dining_hall_remarks,

            ]);
        }

        // -------------------------2.5-----------------------------
        $dat_32 = '2.5';
        $form2_title32 = "2.5 Other facilities ( Guest room )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat32 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_guest_room_ac_count',
                'facilities_guest_room_area_male',
                'facilities_guest_room_area_female',
                'facilities_guest_room_rating',
                'facilities_guest_room_nonac_ac_count',
                'facilities_guest_room_nonac_area_male',
                'facilities_guest_room_nonac_area_female',
                'facilities_guest_room_nonac_rating',
                'facilities_guest_room_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat32 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_guest_room_ac_count',
                'facilities_guest_room_area_male',
                'facilities_guest_room_area_female',
                'facilities_guest_room_rating',
                'facilities_guest_room_nonac_ac_count',
                'facilities_guest_room_nonac_area_male',
                'facilities_guest_room_nonac_area_female',
                'facilities_guest_room_nonac_rating',
                'facilities_guest_room_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }


        fputcsv($handle, [
            $form2_title32,

        ]);
        fputcsv($handle, [
            "2.5",
            "NCOE Name",
            "A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat32 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->facilities_guest_room_rating,
                $data->facilities_guest_room_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_32,
                $data->center->ncoe_name ?? null,
                $data->facilities_guest_room_ac_count,
                $data->facilities_guest_room_area_male,
                $data->facilities_guest_room_area_female,
                $rating[$data->facilities_guest_room_rating] ?? null,
                $data->facilities_guest_room_nonac_ac_count,
                $data->facilities_guest_room_nonac_area_male,
                $data->facilities_guest_room_nonac_area_female,
                $rating[$data->facilities_guest_room_nonac_rating] ?? null,
                $data->facilities_guest_room_remarks,
            ]);
        }

        // --------------------------------------------------------------------------------------------

        $dat_33 = '2.5';
        $form2_title33 = "2.5 Other facilities ( Recreation hall )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat33 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_recreation_hall_ac_count',
                'facilities_recreation_hall_area_male',
                'facilities_recreation_hall_area_female',
                'facilities_recreation_hall_rating',
                'facilities_recreation_hall_nonac_ac_count',
                'facilities_recreation_hall_nonac_area_male',
                'facilities_recreation_hall_nonac_area_female',
                'facilities_recreation_hall_nonac_rating',
                'facilities_recreation_hall_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat33 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_recreation_hall_ac_count',
                'facilities_recreation_hall_area_male',
                'facilities_recreation_hall_area_female',
                'facilities_recreation_hall_rating',
                'facilities_recreation_hall_nonac_ac_count',
                'facilities_recreation_hall_nonac_area_male',
                'facilities_recreation_hall_nonac_area_female',
                'facilities_recreation_hall_nonac_rating',
                'facilities_recreation_hall_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat33);
        fputcsv($handle, [
            $form2_title33,

        ]);
        fputcsv($handle, [
            "2.5",
            "NCOE Name",
            "A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat33 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->facilities_recreation_hall_rating,
                $data->facilities_recreation_hall_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_33,
                $data->center->ncoe_name ?? null,
                $data->facilities_recreation_hall_ac_count,
                $data->facilities_recreation_hall_area_male,
                $data->facilities_recreation_hall_area_female,
                $rating[$data->facilities_recreation_hall_rating] ?? null,
                $data->facilities_recreation_hall_nonac_ac_count,
                $data->facilities_recreation_hall_nonac_area_male,
                $data->facilities_recreation_hall_nonac_area_female,
                $rating[$data->facilities_recreation_hall_nonac_rating] ?? null,
                $data->facilities_recreation_hall_remarks,
            ]);
        }


        // ------------------------------------------------------------------------------

        $dat_34 = '2.5';
        $form2_title34 = "2.5 Other facilities ( Study room )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat34 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_store_room_ac_count',
                'facilities_store_room_area_male',
                'facilities_store_room_area_female',
                'facilities_recreation_hall_rating',
                'facilities_store_room_nonac_ac_count',
                'facilities_store_room_nonac_area_male',
                'facilities_store_room_nonac_area_female',
                'facilities_store_room_nonac_rating',
                'facilities_store_room_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat34 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_store_room_ac_count',
                'facilities_store_room_area_male',
                'facilities_store_room_area_female',
                'facilities_recreation_hall_rating',
                'facilities_store_room_nonac_ac_count',
                'facilities_store_room_nonac_area_male',
                'facilities_store_room_nonac_area_female',
                'facilities_store_room_nonac_rating',
                'facilities_store_room_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat34);
        fputcsv($handle, [
            $form2_title34,

        ]);
        fputcsv($handle, [
            "2.5",
            "NCOE Name",
            "A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area Male",
            "Capacity/area Female",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat34 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->facilities_recreation_hall_rating,
                $data->facilities_store_room_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_34,
                $data->center->ncoe_name ?? null,
                $data->facilities_store_room_ac_count,
                $data->facilities_store_room_area_male,
                $data->facilities_store_room_area_female,
                $rating[$data->facilities_recreation_hall_rating] ?? null,
                $data->facilities_store_room_nonac_ac_count,
                $data->facilities_store_room_nonac_area_male,
                $data->facilities_store_room_nonac_area_female,
                $rating[$data->facilities_store_room_nonac_rating] ?? null,
                $data->facilities_store_room_remarks,
            ]);
        }

        // -----------------------------------------------------------------------------------------

        $dat_35 = '2.5';
        $form2_title35 = "2.5 Other facilities ( library )";
        if ($centerid != '' || $centerid != null) {
            $form2_cat35 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_library_ac_count',
                'facilities_library_area_male',
                'facilities_library_rating',
                'facilities_library_nonac_ac_count',
                'facilities_library_nonac_area_male',
                'facilities_library_nonac_rating',
                'facilities_library_remarks'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat35 = Part_two_other_facilitie::with('center')->select(
                'created_for',
                'facilities_library_ac_count',
                'facilities_library_area_male',
                'facilities_library_rating',
                'facilities_library_nonac_ac_count',
                'facilities_library_nonac_area_male',
                'facilities_library_nonac_rating',
                'facilities_library_remarks'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }


        fputcsv($handle, [
            $form2_title35,

        ]);
        fputcsv($handle, [
            "2.5",
            "NCOE Name",
            "A/C Count",
            "Capacity/area",
            "A/C Rating",
            "Non-A/C Count",
            "Capacity/area",
            "Non A/C Rating",
            "Remark",

        ]);

        foreach ($form2_cat35 as $data) {

            $rating = DB::table('rc_rating_master')->whereIn('rating_id', [
                $data->facilities_library_rating,
                $data->facilities_library_nonac_rating,
            ])->pluck('rating', 'rating_id')->toArray();

            fputcsv($handle, [
                $dat_35,
                $data->center->ncoe_name ?? null,
                $data->facilities_library_ac_count,
                $data->facilities_library_area_male,
                $rating[$data->facilities_library_rating] ?? null,
                $data->facilities_library_nonac_ac_count,
                $data->facilities_library_nonac_area_male,
                $rating[$data->facilities_library_nonac_rating] ?? null,
                $data->facilities_library_remarks,

            ]);
        }

        // --------------------------------------------------------------------
        $dat_36 = '2.6';
        $form2_title36 = "2.6 Field of play";
        if ($centerid != '' || $centerid != null) {
            $form2_cat36 = Form_two::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat36 = Form_two::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title36,

        ]);
        fputcsv($handle, [
            "2.6",
            "NCOE Name",
            "Discipline",
            "No. of FOP",
            "Specify type of FOP (Indoor/Outdoor)",
            "Surface (Synthetic,Wooden,Grass etc.)",
            "Rating",
            "Remark",

        ]);

        foreach ($form2_cat36 as $data) {

            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->discline_play_field)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;

            fputcsv($handle, [
                $dat_36,
                $data->center->ncoe_name ?? null,
                $d_name ?? null,
                $data->no_fop_play_field ?? null,
                $data->fop_play_field ?? null,
                $data->fop_surface_play_field ?? null,
                $data->rating_play_field ?? null,
                $data->remark_play_field ?? null,

            ]);
        }
        // -------------------------------------------------------------------------------------
        $dat_37 = '2.7';
        $form2_title37 = "2.7 Sports Equipment (Non-consumable)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat37 = FormTwoEquipment::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat37 = FormTwoEquipment::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title37,

        ]);
        fputcsv($handle, [
            "2.7",
            "NCOE Name",
            "Discipline",
            "Sufficient/Insufficient",
            "Remark",

        ]);

        foreach ($form2_cat37 as $data) {

            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->equipment_discipline)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;
            if ($data->equipment_suficient == 1) {
                $sufficient = 'Sufficient';
            } else {
                $sufficient = 'Insufficient';
            }
            fputcsv($handle, [
                $dat_37,
                $data->center->ncoe_name ?? null,
                $d_name ?? null,
                $sufficient ?? null,
                $data->equipment_remark ?? null,

            ]);
        }
        // --------------------------------------------------------
        $dat_38 = '2.8';
        $form2_title38 = "2.8 Sports Equipment (Consumable)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat38 = FormTwoEquipment_consumable::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat38 = FormTwoEquipment_consumable::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title38,

        ]);
        fputcsv($handle, [
            "2.8",
            "NCOE Name",
            "Discipline",
            "Sufficient/Insufficient",
            "Remark",

        ]);

        foreach ($form2_cat38 as $data) {

            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->equipment_discipline)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;
            if ($data->equipment_suficient == 1) {
                $sufficient = 'Sufficient';
            } else {
                $sufficient = 'Insufficient';
            }
            fputcsv($handle, [
                $dat_38,
                $data->center->ncoe_name ?? null,
                $d_name ?? null,
                $sufficient ?? null,
                $data->equipment_remark ?? null,

            ]);
        }

        // ------------2.9 Sports Science Equipment-----------------------

        $dat_39 = '2.9';
        $form2_title39 = "2.9 Sports Science Equipment";
        if ($centerid != '' || $centerid != null) {
            $form2_cat39 = FormTwoSportScience::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat39 = FormTwoSportScience::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title39,

        ]);
        fputcsv($handle, [
            "2.9",
            "NCOE Name",
            "Discipline",
            "Consumable",
            "Non-consumable",
            "Remark",

        ]);

        foreach ($form2_cat39 as $data) {

            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->science_discipline)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;

            if ($data->sport_consumable == 1) {
                $sufficient = 'Sufficient';
            } else {
                $sufficient = 'Insufficient';
            }
            if ($data->sport_non_consumable == 1) {
                $sufficient_non = 'Sufficient';
            } else {
                $sufficient_non = 'Insufficient';
            }
            fputcsv($handle, [
                $dat_39,
                $data->center->ncoe_name ?? null,
                $d_name ?? null,
                $sufficient ?? null,
                $sufficient_non ?? null,
                $data->science_remark ?? null,
            ]);
        }


        // ----------------------2.10 Administrative and Support Staff --------------------------------
        $dat_40 = '2.10';
        $form2_title40 = "2.10 Administrative and Support Staff";
        if ($centerid != '' || $centerid != null) {
            $form2_cat40 = FormTwoAddStaffAdministrator::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat40 = FormTwoAddStaffAdministrator::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title40,

        ]);
        fputcsv($handle, [
            "2.10",
            "NCOE Name",
            "Designation",
            "2018-19",
            "2019-20",
            "2020-21",
            "2021-22",
            "2022-23",

        ]);

        foreach ($form2_cat40 as $data) {

            fputcsv($handle, [
                $dat_40,
                $data->center->ncoe_name ?? null,
                $data->ssd_designation ?? null,
                $data->ssd_2018_19 ?? null,
                $data->ssd_2019_20 ?? null,
                $data->ssd_2020_21 ?? null,
                $data->ssd_2021_22 ?? null,
                $data->ssd_2022_23 ?? null,

            ]);
        }


        // -------------------------------2.11 Sport Science Staff(including Doctor,physiotherapist and masseur)----------
        $dat_41 = '2.11';
        $form2_title41 = "2.11 Sport Science Staff(including Doctor,physiotherapist and masseur)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat41 = Sportsciencestaffdoctors::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat41 = Sportsciencestaffdoctors::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title41,

        ]);
        fputcsv($handle, [
            "2.11",
            "NCOE Name",
            "Designation",
            "2018-19",
            "2019-20",
            "2020-21",
            "2021-22",
            "2022-23",

        ]);

        foreach ($form2_cat41 as $data) {

            fputcsv($handle, [
                $dat_41,
                $data->center->ncoe_name ?? null,
                $data->ssd_designation ?? null,
                $data->ssd_2018_19 ?? null,
                $data->ssd_2019_20 ?? null,
                $data->ssd_2020_21 ?? null,
                $data->ssd_2021_22 ?? null,
                $data->ssd_2022_23 ?? null,

            ]);
        }
        // -------------------2.12 Mess Staff(including nutritionist and chef)----------------------------
        $dat_42 = '2.12';
        $form2_title42 = "2.12 Mess Staff(including nutritionist and chef)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat42 = Staffnutritionistchefs::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat42 = Staffnutritionistchefs::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }


        fputcsv($handle, [
            $form2_title42,

        ]);
        fputcsv($handle, [
            "2.12",
            "NCOE Name",
            "Designation",
            "2018-19",
            "2019-20",
            "2020-21",
            "2021-22",
            "2022-23",

        ]);

        foreach ($form2_cat42 as $data) {

            fputcsv($handle, [
                $dat_42,
                $data->center->ncoe_name ?? null,
                $data->snc_designation ?? null,
                $data->snc_2018_19 ?? null,
                $data->snc_2019_20 ?? null,
                $data->snc_2020_21 ?? null,
                $data->snc_2021_22 ?? null,
                $data->snc_2022_23 ?? null,

            ]);
        }

        // ---------------------------2.13 Discipline and strength (Residential/Non-residential with no. of coaches)---------
        $dat_43 = '2.13';
        $form2_title43 = "2.13 Discipline and strength (Residential/Non-residential with no. of coaches)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat43 = parttwostrengthresidentialcoachesdisciplines::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat43 = parttwostrengthresidentialcoachesdisciplines::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }

        // dd($form2_cat43 );
        fputcsv($handle, [
            $form2_title43,

        ]);
        fputcsv($handle, [
            "2.13",
            "NCOE Name",
            "Discipline",
            "2018-19_Resi_Male",
            "2018-19_Resi_Female",
            "2018-19_NR_Male",
            "2018-19_NR_Female",
            "2018-19_C",
            "2019-20_Resi_Male",
            "2019-20_Resi_Female",
            "2019-20_NR_Male",
            "2019-20_NR_Female",
            "2019-20_C",
            "2020-21_Resi_Male",
            "2020-21_Resi_Female",
            "2020-21_NR_Male",
            "2020-21_NR_Female",
            "2020-21_C",
            "2021-22_Resi_Male",
            "2021-22_Resi_Female",
            "2021-22_NR_Male",
            "2021-22_NR_Female",
            "2021-22_C",
            "2022-23_Resi_Male",
            "2022-23_Resi_Female",
            "2022-23_NR_Male",
            "2022-23_NR_Female",
            "2022-23_C",


        ]);

        foreach ($form2_cat43 as $data) {
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->strength_residential_coaches_discipline_id)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            $d_name = $displine_name->discipline ?? null;

            fputcsv($handle, [
                $dat_43,
                $data->center->ncoe_name ?? null,
                $d_name                                             ?? null,
                $data->strength_residential_coaches_2018_19_resi_m  ?? null,
                $data->strength_residential_coaches_2018_19_resi_f  ?? null,
                $data->strength_residential_coaches_2018_19_nr_m    ?? null,
                $data->strength_residential_coaches_2018_19_nr_f    ?? null,
                $data->strength_residential_coaches_2018_19_nr_c    ?? null,
                $data->strength_residential_coaches_2019_20_resi_m  ?? null,
                $data->strength_residential_coaches_2019_20_resi_f  ?? null,
                $data->strength_residential_coaches_2019_20_nr_m    ?? null,
                $data->strength_residential_coaches_2019_20_nr_f    ?? null,
                $data->strength_residential_coaches_2019_20_nr_c    ?? null,
                $data->strength_residential_coaches_2020_21_resi_m  ?? null,
                $data->strength_residential_coaches_2020_21_resi_f  ?? null,
                $data->strength_residential_coaches_2020_21_nr_m    ?? null,
                $data->strength_residential_coaches_2020_21_nr_f    ?? null,
                $data->strength_residential_coaches_2020_21_nr_c    ?? null,
                $data->strength_residential_coaches_2022_22_resi_m  ?? null,
                $data->strength_residential_coaches_2022_22_resi_f  ?? null,
                $data->strength_residential_coaches_2022_22_nr_m    ?? null,
                $data->strength_residential_coaches_2022_22_nr_f    ?? null,
                $data->strength_residential_coaches_2022_22_nr_c    ?? null,
                $data->strength_residential_coaches_2022_23_resi_m  ?? null,
                $data->strength_residential_coaches_2022_23_resi_f  ?? null,
                $data->strength_residential_coaches_2022_23_nr_m    ?? null,
                $data->strength_residential_coaches_2022_23_nr_f    ?? null,
                $data->strength_residential_coaches_2022_23_nr_c    ?? null,

            ]);
        }



        $dat_44 = '2.14';
        $form2_title44 = "2.14 Utilization of Fund (Total Accomodation Capacity of Rooms)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat44 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_boardings_2018_19_received',
                'utilization_boardings_2018_19_utilized',
                'utilization_boardings_2019_20_received',
                'utilization_boardings_2019_20_utilized',
                'utilization_boardings_2020_21_received',
                'utilization_boardings_2020_21_utilized',
                'utilization_boardings_2021_22_received',
                'utilization_boardings_2021_22_utilized',
                'utilization_boardings_2022_23_received',
                'utilization_boardings_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat44 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_boardings_2018_19_received',
                'utilization_boardings_2018_19_utilized',
                'utilization_boardings_2019_20_received',
                'utilization_boardings_2019_20_utilized',
                'utilization_boardings_2020_21_received',
                'utilization_boardings_2020_21_utilized',
                'utilization_boardings_2021_22_received',
                'utilization_boardings_2021_22_utilized',
                'utilization_boardings_2022_23_received',
                'utilization_boardings_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat44 );
        fputcsv($handle, [
            $form2_title44,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat44 as $data) {
            $Particulars = 'Boardings';
            fputcsv($handle, [
                $dat_44,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_boardings_2018_19_received  ?? null,
                $data->utilization_boardings_2018_19_utilized  ?? null,
                $data->utilization_boardings_2019_20_received    ?? null,
                $data->utilization_boardings_2019_20_utilized    ?? null,
                $data->utilization_boardings_2020_21_received  ?? null,
                $data->utilization_boardings_2020_21_utilized  ?? null,
                $data->utilization_boardings_2021_22_received    ?? null,
                $data->utilization_boardings_2021_22_utilized    ?? null,
                $data->utilization_boardings_2022_23_received    ?? null,
                $data->utilization_boardings_2022_23_utilized    ?? null,

            ]);
        }
        // -------------------------------------------Sports Kit ------------------------------

        $dat_45 = '2.14';
        $form2_title45 = "2.14 Utilization of Fund (Sports Kit)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat45 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_kit_2018_19_received',
                'utilization_sports_kit_2018_19_utilized',
                'utilization_sports_kit_2019_20_received',
                'utilization_sports_kit_2019_20_utilized',
                'utilization_sports_kit_2020_21_received',
                'utilization_sports_kit_2020_21_utilized',
                'utilization_sports_kit_2021_22_received',
                'utilization_sports_kit_2021_22_utilized',
                'utilization_sports_kit_2022_23_received',
                'utilization_sports_kit_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat45 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_kit_2018_19_received',
                'utilization_sports_kit_2018_19_utilized',
                'utilization_sports_kit_2019_20_received',
                'utilization_sports_kit_2019_20_utilized',
                'utilization_sports_kit_2020_21_received',
                'utilization_sports_kit_2020_21_utilized',
                'utilization_sports_kit_2021_22_received',
                'utilization_sports_kit_2021_22_utilized',
                'utilization_sports_kit_2022_23_received',
                'utilization_sports_kit_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat45 );
        fputcsv($handle, [
            $form2_title45,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat45 as $data) {
            $Particulars = 'Sports Kit';
            fputcsv($handle, [
                $dat_45,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_sports_kit_2018_19_received  ?? null,
                $data->utilization_sports_kit_2018_19_utilized  ?? null,
                $data->utilization_sports_kit_2019_20_received    ?? null,
                $data->utilization_sports_kit_2019_20_utilized    ?? null,
                $data->utilization_sports_kit_2020_21_received  ?? null,
                $data->utilization_sports_kit_2020_21_utilized  ?? null,
                $data->utilization_sports_kit_2021_22_received    ?? null,
                $data->utilization_sports_kit_2021_22_utilized    ?? null,
                $data->utilization_sports_kit_2022_23_received    ?? null,
                $data->utilization_sports_kit_2022_23_utilized    ?? null,

            ]);
        }

        // -------------------------------Education Expenditure-------------------------------------------

        $dat_46 = '2.14';
        $form2_title46 = "2.14 Utilization of Fund (Education Expenditure)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat46 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_education_expenditure_2018_19_received',
                'utilization_education_expenditure_2018_19_utilized',
                'utilization_education_expenditure_2019_20_received',
                'utilization_education_expenditure_2019_20_utilized',
                'utilization_education_expenditure_2020_21_utilized',
                'utilization_education_expenditure_2020_21_received',
                'utilization_education_expenditure_2021_22_received',
                'utilization_education_expenditure_2021_22_utilized',
                'utilization_education_expenditure_2022_23_received',
                'utilization_education_expenditure_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat46 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_education_expenditure_2018_19_received',
                'utilization_education_expenditure_2018_19_utilized',
                'utilization_education_expenditure_2019_20_received',
                'utilization_education_expenditure_2019_20_utilized',
                'utilization_education_expenditure_2020_21_utilized',
                'utilization_education_expenditure_2020_21_received',
                'utilization_education_expenditure_2021_22_received',
                'utilization_education_expenditure_2021_22_utilized',
                'utilization_education_expenditure_2022_23_received',
                'utilization_education_expenditure_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat46 );
        fputcsv($handle, [
            $form2_title46,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat46 as $data) {
            $Particulars = 'Education Expenditure';
            fputcsv($handle, [
                $dat_46,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_education_expenditure_2018_19_received  ?? null,
                $data->utilization_education_expenditure_2018_19_utilized  ?? null,
                $data->utilization_education_expenditure_2019_20_received    ?? null,
                $data->utilization_education_expenditure_2019_20_utilized    ?? null,
                $data->utilization_education_expenditure_2020_21_utilized  ?? null,
                $data->utilization_education_expenditure_2020_21_received  ?? null,
                $data->utilization_education_expenditure_2021_22_received    ?? null,
                $data->utilization_education_expenditure_2021_22_utilized    ?? null,
                $data->utilization_education_expenditure_2022_23_received    ?? null,
                $data->utilization_education_expenditure_2022_23_utilized    ?? null,

            ]);
        }
        // -----------------------------Competition Exposure ---------------------------------------
        $dat_47 = '2.14';
        $form2_title47 = "2.14 Utilization of Fund (Competition Exposure)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat47 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_competition_exposure_2018_19_received',
                'utilization_competition_exposure_2018_19_utilized',
                'utilization_competition_exposure_2019_20_received',
                'utilization_competition_exposure_2019_20_utilized',
                'utilization_competition_exposure_2020_21_received',
                'utilization_competition_exposure_2020_21_utilized',
                'utilization_competition_exposure_2021_22_received',
                'utilization_competition_exposure_2021_22_utilized',
                'utilization_competition_exposure_2022_23_received',
                'utilization_competition_exposure_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat47 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_competition_exposure_2018_19_received',
                'utilization_competition_exposure_2018_19_utilized',
                'utilization_competition_exposure_2019_20_received',
                'utilization_competition_exposure_2019_20_utilized',
                'utilization_competition_exposure_2020_21_received',
                'utilization_competition_exposure_2020_21_utilized',
                'utilization_competition_exposure_2021_22_received',
                'utilization_competition_exposure_2021_22_utilized',
                'utilization_competition_exposure_2022_23_received',
                'utilization_competition_exposure_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat47 );
        fputcsv($handle, [
            $form2_title47,

        ]);
        fputcsv($handle, [
            "2.13",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat47 as $data) {
            $Particulars = 'Competition Exposure';
            fputcsv($handle, [
                $dat_47,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_competition_exposure_2018_19_received  ?? null,
                $data->utilization_competition_exposure_2018_19_utilized  ?? null,
                $data->utilization_competition_exposure_2019_20_received    ?? null,
                $data->utilization_competition_exposure_2019_20_utilized    ?? null,
                $data->utilization_competition_exposure_2020_21_received  ?? null,
                $data->utilization_competition_exposure_2020_21_utilized  ?? null,
                $data->utilization_competition_exposure_2021_22_received    ?? null,
                $data->utilization_competition_exposure_2021_22_utilized    ?? null,
                $data->utilization_competition_exposure_2022_23_received    ?? null,
                $data->utilization_competition_exposure_2022_23_utilized    ?? null,

            ]);
        }
        // -----------------------------Medical & Misc. ---------------------------------------
        $dat_48 = '2.14';
        $form2_title48 = "2.14 Utilization of Fund (Medical & Misc.)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat48 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_medical_misc_2018_19_received',
                'utilization_medical_misc_2018_19_utilized',
                'utilization_medical_misc_2019_20_received',
                'utilization_medical_misc_2019_20_utilized',
                'utilization_medical_misc_2020_21_received',
                'utilization_medical_misc_2020_21_utilized',
                'utilization_medical_misc_2021_22_received',
                'utilization_medical_misc_2021_22_utilized',
                'utilization_medical_misc_2022_23_received',
                'utilization_medical_misc_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat48 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_medical_misc_2018_19_received',
                'utilization_medical_misc_2018_19_utilized',
                'utilization_medical_misc_2019_20_received',
                'utilization_medical_misc_2019_20_utilized',
                'utilization_medical_misc_2020_21_received',
                'utilization_medical_misc_2020_21_utilized',
                'utilization_medical_misc_2021_22_received',
                'utilization_medical_misc_2021_22_utilized',
                'utilization_medical_misc_2022_23_received',
                'utilization_medical_misc_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat48 );
        fputcsv($handle, [
            $form2_title48,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat48 as $data) {
            $Particulars = 'Medical & Misc.';
            fputcsv($handle, [
                $dat_48,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_medical_misc_2018_19_received  ?? null,
                $data->utilization_medical_misc_2018_19_utilized  ?? null,
                $data->utilization_medical_misc_2019_20_received    ?? null,
                $data->utilization_medical_misc_2019_20_utilized    ?? null,
                $data->utilization_medical_misc_2020_21_received  ?? null,
                $data->utilization_medical_misc_2020_21_utilized  ?? null,
                $data->utilization_medical_misc_2021_22_received    ?? null,
                $data->utilization_medical_misc_2021_22_utilized    ?? null,
                $data->utilization_medical_misc_2022_23_received    ?? null,
                $data->utilization_medical_misc_2022_23_utilized    ?? null,

            ]);
        }
        // -----------------------------Operations & Maintenance cost of NCOEs ---------------------------------------
        $dat_49 = '2.14';
        $form2_title49 = "2.14 Utilization of Fund (Operations & Maintenance cost of NCOEs)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat49 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_maintenance_cost_ncoes_2018_19_received',
                'utilization_maintenance_cost_ncoes_2018_19_utilized',
                'utilization_maintenance_cost_ncoes_2019_20_received',
                'utilization_maintenance_cost_ncoes_2019_20_utilized',
                'utilization_maintenance_cost_ncoes_2020_21_received',
                'utilization_maintenance_cost_ncoes_2020_21_utilized',
                'utilization_maintenance_cost_ncoes_2021_22_utilized',
                'utilization_maintenance_cost_ncoes_2021_22_received',
                'utilization_maintenance_cost_ncoes_2022_23_received',
                'utilization_maintenance_cost_ncoes_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat49 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_maintenance_cost_ncoes_2018_19_received',
                'utilization_maintenance_cost_ncoes_2018_19_utilized',
                'utilization_maintenance_cost_ncoes_2019_20_received',
                'utilization_maintenance_cost_ncoes_2019_20_utilized',
                'utilization_maintenance_cost_ncoes_2020_21_received',
                'utilization_maintenance_cost_ncoes_2020_21_utilized',
                'utilization_maintenance_cost_ncoes_2021_22_utilized',
                'utilization_maintenance_cost_ncoes_2021_22_received',
                'utilization_maintenance_cost_ncoes_2022_23_received',
                'utilization_maintenance_cost_ncoes_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat49 );
        fputcsv($handle, [
            $form2_title49,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat49 as $data) {
            $Particulars = 'Operations & Maintenance cost of NCOEs';
            fputcsv($handle, [
                $dat_49,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_maintenance_cost_ncoes_2018_19_received  ?? null,
                $data->utilization_maintenance_cost_ncoes_2018_19_utilized  ?? null,
                $data->utilization_maintenance_cost_ncoes_2019_20_received    ?? null,
                $data->utilization_maintenance_cost_ncoes_2019_20_utilized    ?? null,
                $data->utilization_maintenance_cost_ncoes_2020_21_received  ?? null,
                $data->utilization_maintenance_cost_ncoes_2020_21_utilized  ?? null,
                $data->utilization_maintenance_cost_ncoes_2021_22_utilized    ?? null,
                $data->utilization_maintenance_cost_ncoes_2021_22_received    ?? null,
                $data->utilization_maintenance_cost_ncoes_2022_23_received    ?? null,
                $data->utilization_maintenance_cost_ncoes_2022_23_utilized    ?? null,

            ]);
        }

        // ----------------------------  Sports Equipment's (Consumable) ---------------------------------------
        $dat_50 = '2.14';
        $form2_title50 = "2.14 Utilization of Fund (Sports Equipment's (Consumable))";
        if ($centerid != '' || $centerid != null) {
            $form2_cat50 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_equipment_consumable_2018_19_received',
                'utilization_sports_equipment_consumable_2018_19_utilized',
                'utilization_sports_equipment_consumable_2019_20_received',
                'utilization_sports_equipment_consumable_2019_20_utilized',
                'utilization_sports_equipment_consumable_2020_21_received',
                'utilization_sports_equipment_consumable_2020_21_utilized',
                'utilization_sports_equipment_consumable_2021_22_received',
                'utilization_sports_equipment_consumable_2021_22_utilized',
                'utilization_sports_equipment_consumable_2022_23_received',
                'utilization_sports_equipment_consumable_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat50 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_equipment_consumable_2018_19_received',
                'utilization_sports_equipment_consumable_2018_19_utilized',
                'utilization_sports_equipment_consumable_2019_20_received',
                'utilization_sports_equipment_consumable_2019_20_utilized',
                'utilization_sports_equipment_consumable_2020_21_received',
                'utilization_sports_equipment_consumable_2020_21_utilized',
                'utilization_sports_equipment_consumable_2021_22_received',
                'utilization_sports_equipment_consumable_2021_22_utilized',
                'utilization_sports_equipment_consumable_2022_23_received',
                'utilization_sports_equipment_consumable_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat50 );
        fputcsv($handle, [
            $form2_title50,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat50 as $data) {
            $Particulars = "Sports Equipment's (Consumable)";
            fputcsv($handle, [
                $dat_50,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_sports_equipment_consumable_2018_19_received  ?? null,
                $data->utilization_sports_equipment_consumable_2018_19_utilized  ?? null,
                $data->utilization_sports_equipment_consumable_2019_20_received    ?? null,
                $data->utilization_sports_equipment_consumable_2019_20_utilized    ?? null,
                $data->utilization_sports_equipment_consumable_2020_21_received  ?? null,
                $data->utilization_sports_equipment_consumable_2020_21_utilized  ?? null,
                $data->utilization_sports_equipment_consumable_2021_22_received    ?? null,
                $data->utilization_sports_equipment_consumable_2021_22_utilized    ?? null,
                $data->utilization_sports_equipment_consumable_2022_23_received    ?? null,
                $data->utilization_sports_equipment_consumable_2022_23_utilized    ?? null,

            ]);
        }
        // ----------------------------  Sports Equipment's (Non-Consumable) ---------------------------------------
        $dat_51 = '2.14';
        $form2_title51 = "2.14 Utilization of Fund (Sports Equipment's (Non-Consumable))";
        if ($centerid != '' || $centerid != null) {

            $form2_cat51 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_equipment_non_consumable_2018_19_received',
                'utilization_sports_equipment_non_consumable_2018_19_utilized',
                'utilization_sports_equipment_non_consumable_2019_20_received',
                'utilization_sports_equipment_non_consumable_2019_20_utilized',
                'utilization_sports_equipment_non_consumable_2020_21_received',
                'utilization_sports_equipment_non_consumable_2020_21_utilized',
                'utilization_sports_equipment_non_consumable_2021_22_received',
                'utilization_sports_equipment_non_consumable_2021_22_utilized',
                'utilization_sports_equipment_non_consumable_2022_23_received',
                'utilization_sports_equipment_non_consumable_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat51 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_equipment_non_consumable_2018_19_received',
                'utilization_sports_equipment_non_consumable_2018_19_utilized',
                'utilization_sports_equipment_non_consumable_2019_20_received',
                'utilization_sports_equipment_non_consumable_2019_20_utilized',
                'utilization_sports_equipment_non_consumable_2020_21_received',
                'utilization_sports_equipment_non_consumable_2020_21_utilized',
                'utilization_sports_equipment_non_consumable_2021_22_received',
                'utilization_sports_equipment_non_consumable_2021_22_utilized',
                'utilization_sports_equipment_non_consumable_2022_23_received',
                'utilization_sports_equipment_non_consumable_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat51 );
        fputcsv($handle, [
            $form2_title51,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat51 as $data) {
            $Particulars = "Sports Equipment's (Non-Consumable)";
            fputcsv($handle, [
                $dat_51,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_sports_equipment_non_consumable_2018_19_received  ?? null,
                $data->utilization_sports_equipment_non_consumable_2018_19_utilized  ?? null,
                $data->utilization_sports_equipment_non_consumable_2019_20_received    ?? null,
                $data->utilization_sports_equipment_non_consumable_2019_20_utilized    ?? null,
                $data->utilization_sports_equipment_non_consumable_2020_21_received  ?? null,
                $data->utilization_sports_equipment_non_consumable_2020_21_utilized  ?? null,
                $data->utilization_sports_equipment_non_consumable_2021_22_received    ?? null,
                $data->utilization_sports_equipment_non_consumable_2021_22_utilized    ?? null,
                $data->utilization_sports_equipment_non_consumable_2022_23_received    ?? null,
                $data->utilization_sports_equipment_non_consumable_2022_23_utilized    ?? null,

            ]);
        }

        // ----------------------------  Sports Science Equipment's (Consumable) ---------------------------------------
        $dat_52 = '2.14';
        $form2_title52 = "2.14 Utilization of Fund (Sports Science Equipment's (Consumable))";
        if ($centerid != '' || $centerid != null) {
            $form2_cat52 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_science_consumable_2018_19_received',
                'utilization_sports_science_consumable_2018_19_utilized',
                'utilization_sports_science_consumable_2019_20_received',
                'utilization_sports_science_consumable_2019_20_utilized',
                'utilization_sports_science_consumable_2020_21_received',
                'utilization_sports_science_consumable_2020_21_utilized',
                'utilization_sports_science_consumable_2021_22_received',
                'utilization_sports_science_consumable_2021_22_utilized',
                'utilization_sports_science_consumable_2022_23_received',
                'utilization_sports_science_consumable_2022_23_utilized'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat52 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_science_consumable_2018_19_received',
                'utilization_sports_science_consumable_2018_19_utilized',
                'utilization_sports_science_consumable_2019_20_received',
                'utilization_sports_science_consumable_2019_20_utilized',
                'utilization_sports_science_consumable_2020_21_received',
                'utilization_sports_science_consumable_2020_21_utilized',
                'utilization_sports_science_consumable_2021_22_received',
                'utilization_sports_science_consumable_2021_22_utilized',
                'utilization_sports_science_consumable_2022_23_received',
                'utilization_sports_science_consumable_2022_23_utilized'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat52 );
        fputcsv($handle, [
            $form2_title52,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat52 as $data) {
            $Particulars = "Sports Science Equipment's (Consumable)";
            fputcsv($handle, [
                $dat_52,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_sports_science_consumable_2018_19_received  ?? null,
                $data->utilization_sports_science_consumable_2018_19_utilized  ?? null,
                $data->utilization_sports_science_consumable_2019_20_received    ?? null,
                $data->utilization_sports_science_consumable_2019_20_utilized    ?? null,
                $data->utilization_sports_science_consumable_2020_21_received  ?? null,
                $data->utilization_sports_science_consumable_2020_21_utilized  ?? null,
                $data->utilization_sports_science_consumable_2021_22_received    ?? null,
                $data->utilization_sports_science_consumable_2021_22_utilized    ?? null,
                $data->utilization_sports_science_consumable_2022_23_received    ?? null,
                $data->utilization_sports_science_consumable_2022_23_utilized    ?? null,

            ]);
        }

        // ----------------------------  Sports Science Equipment's (Non-Consumable) ---------------------------------------
        $dat_53 = '2.14';
        $form2_title53 = "2.14 Utilization of Fund (Sports Science Equipment's (Non-Consumable))";
        if ($centerid != '' || $centerid != null) {
            $form2_cat53 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_science_non_consumable_2018_19_received',
                'utilization_sports_science_non_consumable_2018_19_utilized',
                'utilization_sports_science_non_consumable_2019_20_received',
                'utilization_sports_science_non_consumable_2019_20_utilized',
                'utilization_sports_science_non_consumable_2020_21_utilized',
                'utilization_sports_science_non_consumable_2021_22_received',
                'utilization_sports_science_non_consumable_2021_22_utilized',
                'utilization_sports_science_non_consumable_2022_23_received',
                'utilization_sports_science_non_consumable_2022_23_utilized',
                'utilization_sports_science_non_consumable_2022_23_utilized_1'
            )
                ->where([
                    ['created_for', $centerid],
                ])->get();
        } else {
            $form2_cat53 = part_two_utilization_fund::with('center')->select(
                'created_for',
                'utilization_sports_science_non_consumable_2018_19_received',
                'utilization_sports_science_non_consumable_2018_19_utilized',
                'utilization_sports_science_non_consumable_2019_20_received',
                'utilization_sports_science_non_consumable_2019_20_utilized',
                'utilization_sports_science_non_consumable_2020_21_utilized',
                'utilization_sports_science_non_consumable_2021_22_received',
                'utilization_sports_science_non_consumable_2021_22_utilized',
                'utilization_sports_science_non_consumable_2022_23_received',
                'utilization_sports_science_non_consumable_2022_23_utilized',
                'utilization_sports_science_non_consumable_2022_23_utilized_1'
            )
                ->where([ // ['created_for',$centerid],
                ])->get();
        }

        // dd($form2_cat53 );
        fputcsv($handle, [
            $form2_title53,

        ]);
        fputcsv($handle, [
            "2.14",
            "NCOE Name",
            "Particulars",
            "2018-19_Received",
            "2018-19_Utilized",
            "2019-20_Received",
            "2019-20_Utilized",
            "2020-21_Received",
            "2020-21_Utilized",
            "2021-22_Received",
            "2021-22_Utilized",
            "2022-23_Received",
            "2022-23_Utilized",


        ]);

        foreach ($form2_cat53 as $data) {
            $Particulars = "Sports Science Equipment's (Non-Consumable)";
            fputcsv($handle, [
                $dat_53,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $data->utilization_sports_science_non_consumable_2018_19_received  ?? null,
                $data->utilization_sports_science_non_consumable_2018_19_utilized  ?? null,
                $data->utilization_sports_science_non_consumable_2019_20_received    ?? null,
                $data->utilization_sports_science_non_consumable_2019_20_utilized    ?? null,
                $data->utilization_sports_science_non_consumable_2020_21_utilized  ?? null,
                $data->utilization_sports_science_non_consumable_2021_22_received  ?? null,
                $data->utilization_sports_science_non_consumable_2021_22_utilized    ?? null,
                $data->utilization_sports_science_non_consumable_2022_23_received    ?? null,
                $data->utilization_sports_science_non_consumable_2022_23_utilized    ?? null,
                $data->utilization_sports_science_non_consumable_2022_23_utilized_1    ?? null,

            ]);
        }

        // ----------------------------  2.15 International Competition Exposure availed by Athletes and Coaches (Provided to NCOE athletes under International Exposure scheme)---------------------------------------
        $dat_54 = '2.15';
        $form2_title54 = "2.15 International Competition Exposure availed by Athletes and Coaches (Provided to NCOE athletes under International Exposure scheme)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat54 =  Parttwoathletes::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat54 =  Parttwoathletes::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }

        //    dd($form2_cat54 );
        fputcsv($handle, [
            $form2_title54,

        ]);
        fputcsv($handle, [
            "2.15",
            "NCOE Name",
            "A- Athletes",
            "Year",
            "Discipline",
            "No. Of Athletes Participated",
            "Expenditure Incurred (in Rs.)",
            "Achievements (Gold,Silver,Bronze)",
            "Remarks,if any",

        ]);

        foreach ($form2_cat54 as $data) {
            $Particulars = "2022-23";
            $athe = "A- Athletes";
            $displine_name = DB::table('descipline_master')->where('discipline_id', $data->athletes_discipline)->select('discipline_id', 'discipline')->groupBy('discipline_id', 'discipline')->first();
            if ($centerid != '' || $centerid != null) {
            } else {
            }
            $d_name = $displine_name->discipline ?? null;
            fputcsv($handle, [
                $dat_54,
                $data->center->ncoe_name ?? null,
                $Particulars                                   ?? null,
                $$athe                                   ?? null,
                $data->athletes_no_athletes_participated  ?? null,
                $data->athletes_no_expenditure_incurred  ?? null,
                $data->athletes_no_achievements    ?? null,
                $data->athletes_no_remarks    ?? null,

            ]);
        }
        // ----------------------------  2.15 International Competition Exposure availed by Athletes and Coaches (Provided to NCOE athletes under International Exposure scheme)---------------------------------------
        $dat_55 = '2.15';
        $form2_title55 = "2.15 International Competition Exposure availed by Athletes and Coaches (Provided to NCOE athletes under International Exposure scheme)";
        if ($centerid != '' || $centerid != null) {
            $form2_cat55 =  Parttwocoachsupportstaffs::with('center')->where([
                ['created_for', $centerid],
            ])->get();
        } else {
            $form2_cat55 =  Parttwocoachsupportstaffs::with('center')->where([
                // ['created_for',$centerid],
            ])->get();
        }

        //    dd($form2_cat55 );
        fputcsv($handle, [
            $form2_title55,

        ]);
        fputcsv($handle, [
            "2.15",
            "NCOE Name",
            "B- Coach and Support Staff",
            "Year",
            "Name with Designation",
            "Period of tour",
            "Remarks,if any",

        ]);

        foreach ($form2_cat55 as $data) {
            $Particulars = "2022-23";
            $athe = "B- Coach and Support Staff";
            fputcsv($handle, [
                $dat_55,
                $data->center->ncoe_name ?? null,
                $Particulars  ?? null,
                $athe        ?? null,
                $data->coach_support_staff_name_designation  ?? null,
                $data->coach_support_staff_period_tour  ?? null,
                $data->coach_support_staff_remarks    ?? null,

            ]);
        }

        fclose($handle);

        return Response::download($filename, "review_part_two.csv", $headers);
    }


    public function download_excel()
    {
        return view('front.pages.review.download_excel');
    }
}
