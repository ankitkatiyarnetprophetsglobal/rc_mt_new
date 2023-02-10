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
    }
</script>
@endsection
@section('content')
<div class="container rc-new-container">
    <h1 class="text-center mb-2">Part 1 (Step Two)</h1>
    <h3 class="text-start mb-4">1.Achievements</h3>
    <h4 class="text-start mb-4">For Team Sports </h4>

    <form id="part_one_step_two" action="{{route('review.partOneStepTwoStore')}}" method="POST">
        @csrf
        <input type="hidden" name="step_two[created_for]" value="{{$c_id}}" class="created_for">
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <h6 class="mb-2">Category -1 </h6>
                        <h6 class="mb-2">1.9 At International level (medals won) – Individual Sports</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto medal_won_step_two">+ Add</button></a>
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
                            <tr class="row_medals_won_{{$key}}">
                                <td><select class="form-select  form_1_discipline_{{$key}} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="{{$key}}"  name="step_two[form_1][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_1][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_1][{{$key}}][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_two[form_1][{{$key}}][id]" value={{$value->id}} class="form-control" required>
                                    <input type="hidden" name="step_two[form_1][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_1][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_1" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_0">
                                <td><select class="form-select  form_1_discipline_0 form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="0"  name="step_two[form_1][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_1][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_1][0][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_two[form_1][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_1][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_1][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_1][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_1" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
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
                        <h6 class="mb-2">Category -2 </h6>
                        <h6 class="mb-2">1.10 At International level (medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto medal_won_category_2">+ Add</button></a>
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
                            <tr class="row_medals_won_category_2_{{$key}}">
                                <td><select class="form-select  form_2_discipline_{{$key}} form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="{{$key}}"  name="step_two[form_2][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_2][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_2][{{$key}}][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_two[form_2][{{$key}}][id]" value={{$value->id}} class="form-control" required>
                                    <input type="hidden" name="step_two[form_2][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_2][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_2" data-id2="{{$key}}" data-db_id2="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_category_2_0">
                                <td><select class="form-select  form_2_discipline_0 form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="0"  name="step_two[form_2][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_2][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_2][0][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_two[form_2][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_2][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_2][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_2][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_2" data-id2="0" data-db_id2=""><i class="fa-solid fa-trash-can"></i></a>
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
                        <h6 class="mb-2">Category -3 </h6>
                        <h6 class="mb-2">1.11 At International level (medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto medal_won_category_3">+ Add</button></a>
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
                            <tr class="row_medals_won_category_3_{{$key}}">
                                <td><select class="form-select  form_3_discipline_{{$key}} form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="{{$key}}"  name="step_two[form_3][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_3][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_3][{{$key}}][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_two[form_3][{{$key}}][id]" value={{$value->id}} class="form-control" required>
                                    <input type="hidden" name="step_two[form_3][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_3][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_3" data-id3="{{$key}}" data-db_id3="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_category_3_0">
                                <td><select class="form-select  form_3_discipline_0 form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="0"  name="step_two[form_3][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_3][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_3][0][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_two[form_3][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_3][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_3][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_3][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_3" data-id3="0" data-db_id3=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- current workingline -->
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <h6 class="mb-2">Category -1 </h6>
                        <h6 class="mb-2">1.12 At International Level (Participation)- Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_category_1">+ Add</button></a>
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
                            <tr class="row_participation_cat_1_{{$key}}">
                                <td><select class="form-select  form_4_discipline_{{$key}} form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="{{$key}}"  name="step_two[form_4][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_4][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_4][{{$key}}][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_two[form_4][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_two[form_4][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_4][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_1" data-id4="{{$key}}" data-db_id4="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_cat_1_0">
                                <td><select class="form-select  form_4_discipline_0 form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="0"  name="step_two[form_4][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_4][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_4][0][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_two[form_4][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_4][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_4][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_4][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_1" data-id4="0" data-db_id4=""><i class="fa-solid fa-trash-can"></i></a>
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
                        <h6 class="mb-2">Category -2 </h6>
                        <h6 class="mb-2">1.13 At International level (medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_category_2">+ Add</button></a>
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
                            <tr class="row_participation_cat_2_{{$key}}">
                                <td><select class="form-select  form_5_discipline_{{$key}} form_5_discipline disciplin_grab " data-id="form_5" data-counting_id="{{$key}}"  name="step_two[form_5][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_5][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_5][{{$key}}][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_two[form_5][{{$key}}][id]" value={{$value->id}} class="form-control" required>
                                    <input type="hidden" name="step_two[form_5][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_5][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_2" data-id5="{{$key}}" data-db_id5="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_cat_2_0">
                                <td><select class="form-select  form_5_discipline_0 form_5_discipline disciplin_grab " data-id="form_5" data-counting_id="0"  name="step_two[form_5][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_5][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_5][0][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_two[form_5][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_5][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_5][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_5][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_2" data-id5="0" data-db_id5=""><i class="fa-solid fa-trash-can"></i></a>
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
                        <h6 class="mb-2">Category -3 </h6>
                        <h6 class="mb-2">1.14 At International level (Participation) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_category_3">+ Add</button></a>
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
                            <tr class="row_participation_category_3_{{$key}}">
                                <td><select class="form-select  form_6_discipline_{{$key}} form_6_discipline disciplin_grab " data-id="form_6" data-counting_id="{{$key}}" name="step_two[form_6][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_6][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_6][{{$key}}][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_two[form_6][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_two[form_6][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_6][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_3" data-id6="{{$key}}" data-db_id6="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_category_3_0">
                                <td><select class="form-select  form_6_discipline_0 form_6_discipline disciplin_grab " data-id="form_6" data-counting_id="0"  name="step_two[form_6][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_6][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_6][0][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_two[form_6][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_6][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_6][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_6][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_3" data-id6="0" data-db_id6=""><i class="fa-solid fa-trash-can"></i></a>
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

                        <h6 class="mb-2"> 1.15 At National level (Medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto medal_won_national">+ Add</button></a>
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
                            <tr class="row_medal_won_national_{{$key}}">
                                <td><select class="form-select  form_7_discipline_{{$key}} form_7_discipline disciplin_grab " data-id="form_7" data-counting_id="{{$key}}"  name="step_two[form_7][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_7][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_7][{{$key}}][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_two[form_7][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_two[form_7][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_7][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medal_won_national" data-id7="{{$key}}" data-db_id7="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medal_won_national_0">
                                <td><select class="form-select  form_7_discipline_0 form_7_discipline disciplin_grab " data-id="form_7" data-counting_id="0"  name="step_two[form_7][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>    
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_7][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_7][0][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_two[form_7][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_7][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_7][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_7][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medal_won_national" data-id7="0" data-db_id7=""><i class="fa-solid fa-trash-can"></i></a>
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

                        <h6 class="mb-2"> 1.16 At National Level (Participation)- Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_national">+ Add</button></a>
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
                                          <script>
                                            dis_id = "{{$value->discipline_id}}";
                                            delete data_dict.form8[dis_id];
                                        </script>
                            @foreach($form_eight as $key => $value)
                            <tr class="row_participation_national_{{$key}}">
                                <td><select class="form-select  form_8_discipline_{{$key}} form_8_discipline disciplin_grab " data-id="form_8" data-counting_id="{{$key}}"  name="step_two[form_8][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_8][{{$key}}][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_8][{{$key}}][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_two[form_8][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_two[form_8][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_8][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national" data-id8="{{$key}}" data-db_id8="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_0">
                                <td><select class="form-select  form_8_discipline_0 form_1_discipline disciplin_grab " data-id="form_8" data-counting_id="0"  name="step_two[form_8][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select </option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_two[form_8][0][team_type]" value='team' class="form-control" required>
                                    <input type="hidden" name="step_two[form_8][0][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_two[form_8][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_two[form_8][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_two[form_8][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_two[form_8][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national" data-id8="0" data-db_id8=""><i class="fa-solid fa-trash-can"></i></a>
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
        <button class="btn btn-primary " onclick="history.back()"> Back</button> &nbsp;
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
    var form_first_count = "{{$form_one->count()}}";
    var form_second_count = "{{$form_two->count()}}";
    var form_three_count = "{{$form_three->count()}}";
    var form_four_count = "{{$form_four->count()}}";
    var form_five_count = "{{$form_five->count()}}";
    var form_six_count = "{{$form_six->count()}}";
    var form_seven_count = "{{$form_seven->count()}}";
    var form_eight_count = "{{$form_eight->count()}}";
    
    var url = baseurl + '/review/part-one/step-one/' + "{{encode5t($c_id)}}";
   
</script>
<script src="{{asset('public/front/js/review/review_part_one_step_two.js')}}"></script>

@endsection