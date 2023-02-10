@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
<style>
    .rc-new-container thead {
        background-color: #000080;
        color: white;
    }
</style>
<script>
    var dis_list_json = <?php echo $dis_list_json; ?>;
    var data_dict = {};
    data_dict = {
        "form1": {},
        "form2": {},
        "form3": {},
        "form4": {},
        "form5": {},
        "form6": {},
        "form7": {},
        "form8": {},
        "form9": {},
        "form10": {},
        "form11": {},
        "form12": {},
        "all":{},

    };

    for (let i = 0; i < dis_list_json.length; i++) {
        data_dict.form1[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form2[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form3[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form4[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form5[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form6[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form7[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form8[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form9[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form10[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form11[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.form12[dis_list_json[i].discipline_id] = dis_list_json[i];
        data_dict.all[dis_list_json[i].discipline_id] = dis_list_json[i];
    }
</script>
@endsection
@section('content')
<div class="container rc-new-container">
    <h1 class="text-center mb-2">Part 1 (Step Three)</h1>
    <h3 class="text-start mb-4">1.Achievements</h3>
    
    
    <form id="part_one_step_three" action="{{route('review.partOneStepThreeStore')}}" method="POST">
        @csrf
        <input type="hidden" name="step_three[created_for]" value="{{$c_id}}" class="created_for">
        
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.17 No. of Sports Person selected to the Senior National Coaching camp</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto senior_national_coaching_camp">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_first_container">
                            @if($form_one->count())
                            @foreach($form_one as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form1[dis_id];
                            </script>
                            <tr class="senior_national_coaching_camp_{{$key}}">
                                <td><select class="form-select form_1_discipline_{{$key}} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="{{$key}}" name="step_three[form_1][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_1][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_1][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_1][{{$key}}][form_type]" value='senior_national_coaching_camp' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_1][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_senior_national_coaching_camp" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="senior_national_coaching_camp_0">
                                <td><select class="form-select form_1_discipline_0 form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="0"  name="step_three[form_1][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_1][0][team_type]" value='common' class="form-control" required>
                                   
                                    <input type="hidden" name="step_three[form_1][0][form_type]" value='senior_national_coaching_camp' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_1][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_1][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_senior_national_coaching_camp" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2"> 1.18 No. of Sports Person selected to the Junior National Coaching camp</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto junior_national_coaching_camp">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_second_container">
                            @if($form_two->count())
                            @foreach($form_two as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form2[dis_id];
                            </script>
                            <tr class="junior_national_coaching_camp_{{$key}}">
                                <td><select class="form-select form_2_discipline_{{$key}} form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="{{$key}}"  name="step_three[form_2][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_2][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_2][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_2][{{$key}}][form_type]" value='junior_national_coaching_camp' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_2][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_junior_national_coaching_camp" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="junior_national_coaching_camp_0">
                                <td><select class="form-select form_2_discipline_0 form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="{{$key}}"  name="step_three[form_2][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_2][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_2][0][form_type]" value='junior_national_coaching_camp' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_2][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_2][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_junior_national_coaching_camp" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2"> 1.19 No. of NCOE athletes receiving Stipend under TOPS (Rs 50000 pm).</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto under_tops">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_three_container">
                            @if($form_three->count())
                            @foreach($form_three as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form3[dis_id];
                            </script>
                            <tr class="under_tops_{{$key}}">
                                <td><select class="form-select form_3_discipline_{{$key}} form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="{{$key}}"  name="step_three[form_3][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_3][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_3][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_3][{{$key}}][form_type]" value='under_tops' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_3][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_under_tops" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="under_tops_0">
                                <td><select class="form-select form_3_discipline_0 form_1_discipline disciplin_grab " data-id="form_3" data-counting_id="0"  name="step_three[form_3][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_3][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_3][0][form_type]" value='under_tops' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_3][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_3][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_under_tops" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.20 No. of NCOE athletes receiving Stipend under Developmental Athlete (Rs 25000 pm).</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto under_developmental_athlete">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_four_container">
                            @if($form_four->count())
                            @foreach($form_four as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form4[dis_id];
                            </script>
                            <tr class="under_developmental_athlete_{{$key}}">
                                <td><select class="form-select form_4_discipline_{{$key}} form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="{{$key}}"  name="step_three[form_4][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_4][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_4][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_4][{{$key}}][form_type]" value='under_developmental_athlete' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_4][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_under_developmental_athlete" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="under_developmental_athlete_0">
                                <td><select class="form-select form_4_discipline_0 form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="0"  name="step_three[form_4][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_4][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_4][0][form_type]" value='under_developmental_athlete' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_4][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_4][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_under_developmental_athlete" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.21 No. of NCOE athletes receiving Stipend under KI (Rs 10000 pm).</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto under_ki">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_five_container">
                            @if($form_five->count())
                            @foreach($form_five as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form5[dis_id];
                            </script>
                            <tr class="under_ki_{{$key}}">
                                <td><select class="form-select form_5_discipline_{{$key}} form_5_discipline disciplin_grab " data-id="form_5" data-counting_id="{{$key}}"  name="step_three[form_5][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_5][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_5][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_5][{{$key}}][form_type]" value='under_ki' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_5][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_under_ki" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="under_ki_0">
                                <td><select class="form-select form_5_discipline_0 form_5_discipline disciplin_grab " data-id="form_5" data-counting_id="0"  name="step_three[form_5][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_5][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_5][0][form_type]" value='under_ki' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_5][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_5][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_under_ki" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.22 No. of athletes Weeded Out</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto weeded_out">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_six_container">
                            @if($form_six->count())
                            @foreach($form_six as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form6[dis_id];
                            </script>
                            <tr class="weeded_out_{{$key}}">
                                <td><select class="form-select form_6_discipline_{{$key}} form_6_discipline disciplin_grab " data-id="form_6" data-counting_id="{{$key}}"  name="step_three[form_6][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_6][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_6][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_6][{{$key}}][form_type]" value='weeded_out' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_6][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_weeded_out" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="weeded_out_0">
                                <td><select class="form-select form_6_discipline_0 form_6_discipline disciplin_grab " data-id="form_6" data-counting_id="0"  name="step_three[form_6][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_6][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_6][0][form_type]" value='weeded_out' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_6][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_6][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_weeded_out" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.23 No. of athletes Newly Inducted</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto newly_inducted">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_seven_container">
                            @if($form_seven->count())
                            @foreach($form_seven as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form7[dis_id];
                            </script>
                            <tr class="newly_inducted_{{$key}}">
                                <td><select class="form-select form_7_discipline_{{$key}} form_7_discipline disciplin_grab " data-id="form_7" data-counting_id="{{$key}}"  name="step_three[form_7][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_7][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_7][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_7][{{$key}}][form_type]" value='newly_inducted' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_7][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_newly_inducted" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="newly_inducted_0">
                                <td><select class="form-select form_7_discipline_0 form_7_discipline disciplin_grab " data-id="form_7" data-counting_id="{{$key}}"  name="step_three[form_7][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_7][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_7][0][form_type]" value='newly_inducted' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_7][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_7][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_newly_inducted" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.24 No. of athletes Retained </h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto athletes_retained">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_eight_container">
                            @if($form_eight->count())
                            @foreach($form_eight as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form8[dis_id];
                            </script>
                            <tr class="athletes_retained_{{$key}}">
                                <td><select class="form-select form_8_discipline_{{$key}} form_8_discipline disciplin_grab " data-id="form_8" data-counting_id="{{$key}}"  name="step_three[form_8][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_8][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_8][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_8][{{$key}}][form_type]" value='athletes_retained' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_8][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_athletes_retained" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="athletes_retained_0">
                                <td><select class="form-select form_8_discipline_0 form_8_discipline disciplin_grab " data-id="form_8" data-counting_id="0"  name="step_three[form_8][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_8][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_8][0][form_type]" value='athletes_retained' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_8][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_8][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_athletes_retained" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.25 No of athletes left the scheme due to employment/higher studies </h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto employment_higher_studies">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_nine_container">
                            @if($form_nine->count())
                            @foreach($form_nine as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form9[dis_id];
                            </script>
                            <tr class="employment_higher_studies_{{$key}}">
                                <td><select class="form-select form_9_discipline_{{$key}} form_9_discipline disciplin_grab " data-id="form_9" data-counting_id="{{$key}}"  name="step_three[form_9][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_9][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_9][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_9][{{$key}}][form_type]" value='employment_higher_studies' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_9][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_employment_higher_studies" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="employment_higher_studies_0">
                                <td><select class="form-select form_9_discipline_0 form_9_discipline disciplin_grab " data-id="form_9" data-counting_id="0"  name="step_three[form_9][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_9][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_9][0][form_type]" value='employment_higher_studies' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_9][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_9][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_employment_higher_studies" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.26 No of athletes left the scheme for personal reasons </h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto scheme_personal_reasons">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">2018-19</th>
                                <th colspan="2">2019-20</th>
                                <th colspan="2">2020-21</th>
                                <th colspan="2">2021-22</th>
                                <th colspan="2">2022-23</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody class="form_ten_container">
                            @if($form_ten->count())
                            @foreach($form_ten as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form10[dis_id];
                            </script>
                            <tr class="scheme_personal_reasons_{{$key}}">
                                <td><select class="form-select form_10_discipline_{{$key}} form_10_discipline disciplin_grab " data-id="form_10" data-counting_id="{{$key}}"  name="step_three[form_10][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_10][{{$key}}][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_10][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_10][{{$key}}][form_type]" value='scheme_personal_reasons' class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_10][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_scheme_personal_reasons" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="scheme_personal_reasons_0">
                                <td><select class="form-select form_10_discipline_0 form_10_discipline disciplin_grab " data-id="form_1" data-counting_id="{{$key}}"  name="step_three[form_10][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_10][0][team_type]" value='common' class="form-control" required>
                                    <input type="hidden" name="step_three[form_10][0][form_type]" value='scheme_personal_reasons' class="form-control" required>

                                </td>

                                <td><input type="number"  min = "0" name="step_three[form_10][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_10][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_scheme_personal_reasons" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.27 Domicile of the athletes present at the center:   </h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto domicile">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th >State</th>
                                <th >Discipline</th>
                                <th>No. of Male </th>
                                <th >No. of Female</th>
                               <th >Action</th>
                            </tr>
                           
                        </thead>
                        <tbody class="form_11_container">
                            @if($form_11->count())
                            @foreach($form_11 as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form11[dis_id];
                            </script>
                            <tr class="domicile_{{$key}}">
                                <td><select class="form-select" data-id="form_11"   name="step_three[form_11][{{$key}}][state_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($states as $s => $val)
                                        <option value="{{$val->id}}" @if($val->id == $value->state_id) selected @endif>{{$val->state_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_11][{{$key}}][team_type]" value='domicile' class="form-control" required>
                                    <input type="hidden" name="step_three[form_11][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_three[form_11][{{$key}}][form_type]" value='domicile' class="form-control" required>

                                </td>
                                <td><select class="form-select form_11_discipline_{{$key}} form_11_discipline disciplin_grab " data-id="form_11" data-counting_id="{{$key}}"  name="step_three[form_11][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_11][{{$key}}][no_of_male]" value="{{$value->no_of_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_11][{{$key}}][no_of_female]" value="{{$value->no_of_female}}" class="form-control" required></td>
                                

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_domicile" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="domicile_0">
                                <td><select class="form-select"  name="step_three[form_11][0][state_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                    @foreach($states as $s => $val)
                                        <option value="{{$val->id}}" >{{$val->state_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_11][0][team_type]" value='domicile' class="form-control" required>
                                    
                                    <input type="hidden" name="step_three[form_11][0][form_type]" value='domicile' class="form-control" required>

                                </td>
                                <td><select class="form-select form_11_discipline_0 form_11_discipline disciplin_grab " data-id="form_11" data-counting_id="0"  name="step_three[form_11][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_11][0][no_of_male]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_11][0][no_of_female]"  class="form-control" required></td>
                                

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_domicile" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <h6 class="mb-2">1.28 Entry of present athletes to the NCOE</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto ncoe">+ Add</button></a>
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">Discipline</th>
                                <th colspan="2">As KIA</th>
                                <th colspan="2">Identified From STC</th>
                                <th colspan="2">Joined From State Academy</th>
                                <th colspan="2">Joined From Private Academies </th>
                               
                                <th colspan="2">Open Trials conducted </th>
                                <th colspan="2">Joined from Come & Play scheme</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                                
                            </tr>
                           
                        </thead>
                        <tbody class="form_12_container">
                            @if($form_12->count())
                            @foreach($form_12 as $key => $value)
                            <script>
                                dis_id = "{{$value->discipline_id}}";
                                delete data_dict.form12[dis_id];
                            </script>
                            <tr class="ncoe_{{$key}}">
                                
                                <td><select class="form-select form_12_discipline_{{$key}} form_12_discipline disciplin_grab " data-id="form_12" data-counting_id="{{$key}}"  name="step_three[form_12][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_three[form_12][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][kia_male]" value="{{$value->kia_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][kia_female]" value="{{$value->kia_female}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][stc_male]" value="{{$value->stc_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][stc_female]" value="{{$value->stc_female}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][state_ac_male]" value="{{$value->state_ac_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][state_ac_female]" value="{{$value->state_ac_female}}" class="form-control" required></td>
                               
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][pvt_ac_male]" value="{{$value->pvt_ac_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][pvt_ac_female]" value="{{$value->pvt_ac_female}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][open_trials_male]" value="{{$value->open_trials_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][open_trials_female]" value="{{$value->open_trials_female}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][play_scheme_male]" value="{{$value->play_scheme_male}}" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][{{$key}}][play_scheme_female]" value="{{$value->play_scheme_female}}" class="form-control" required></td>
         
                                

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_ncoe" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="ncoe_0">
                                
                                <td><select class="form-select form_12_discipline_0 form_12_discipline disciplin_grab " data-id="form_12" data-counting_id="0"  name="step_three[form_12][0][discipline_id]" aria-label="Default select example" required>
                                    <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" >{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    

                                </td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][kia_male]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][kia_female]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][stc_male]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][stc_female]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][state_ac_male]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][state_ac_female]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][pvt_ac_male]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][pvt_ac_female]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][open_trials_male]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][open_trials_female]"  class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][play_scheme_male]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_12][0][play_scheme_female]"  class="form-control" required></td>
         
                                

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_ncoe" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary  d-block ms-auto">Next</button> -->
        
        <div class="d-flex justify-content-center">
        <button class="btn btn-primary " onclick="history.back()">Back</button> &nbsp;
        <button type="submit" class="btn btn-primary ">Next</button> 
        </div>
    </form>
</div>
@endsection
@section('page_specific_js')
<script>
    var counting = "{{$form_one->count()}}";
    var counting2 = "{{$form_two->count()}}";
    var counting3 = "{{$form_three->count()}}";
    var counting4 = "{{$form_four->count()}}";
    var counting5 = "{{$form_five->count()}}";
    var counting6 = "{{$form_six->count()}}";
    var counting7 = "{{$form_seven->count()}}";
    var counting8 = "{{$form_eight->count()}}";
    var counting9 = "{{$form_nine->count()}}";
    var counting10 = "{{$form_ten->count()}}";
    var counting11 = "{{$form_11->count()}}";
    var counting12 = "{{$form_12->count()}}";
    var form_first_count = "{{$form_one->count()}}";
    var form_second_count = "{{$form_two->count()}}";
    var form_three_count = "{{$form_three->count()}}";
    var form_four_count = "{{$form_four->count()}}";
    var form_five_count = "{{$form_five->count()}}";
    var form_six_count = "{{$form_six->count()}}";
    var form_seven_count = "{{$form_seven->count()}}";
    var form_eight_count = "{{$form_eight->count()}}";
    var form_nine_count = "{{$form_nine->count()}}";
    var form_ten_count = "{{$form_ten->count()}}";
    var form_11_count = "{{$form_11->count()}}";
    var form_12_count = "{{$form_12->count()}}";
    var url = baseurl + '/review/part-one/step-three/' + "{{encode5t($c_id)}}";
    var states_json = <?php echo $states_json; ?>;
    var state_html = '';
    for (let i = 0; i < states_json.length; i++) {
        state_html += `<option value="${states_json[i].id}">${states_json[i].state_name}</option>`;
    }
</script>
<script src="{{asset('public/front/js/review/review_part_one_step_three.js')}}"></script>

@endsection