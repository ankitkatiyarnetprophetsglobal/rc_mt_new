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
        "form13": {},

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
        data_dict.form13[dis_list_json[i].discipline_id] = dis_list_json[i];
    }
    var dis_id = 0;
</script>
@endsection
@section('content')
<div class="container rc-new-container">
    <h1 class="text-center mb-2">Part 1 (Step One)</h1>
    <h3 class="text-start mb-4">1.Achievements</h3>
    <h4 class="text-start mb-4">For Individual Sports </h4>
    <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">


        <select class="form-control form-select center_id center_change" id="project_center_id" name="center_id" style="width: 20%;">
       
            @foreach($centers as $p_key => $p_val)
            <option value="{{$p_val->ncoe_id}}" data-id="{{encode5t($p_val->ncoe_id)}}" {{ $p_val->ncoe_id == $c_id ? 'selected' : ''}} >{{$p_val->ncoe_name}}</option>
            @endforeach
        </select>
    </form>
    <form id="part_one_step_one" action="{{url('review/part-one/step-one/store')}}" method="POST">
        @csrf
        <input type="hidden" name="step_one[created_for]" value="{{$c_id}}" class="created_for">
        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <h6 class="mb-2">Category -1 </h6>
                        <h6 class="mb-2">1.1 At International level (medals won) – Individual Sports</h6>

                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto medal_won_step_one">+ Add</button></a>
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
                         
                            <tr class="row_medals_won_{{$key}}">
                                <td><select class="form-select  form_1_discipline_{{$key}} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="{{$key}}" name="step_one[form_1][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                        <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_1][{{$key}}][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_one[form_1][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_1][{{$key}}][form_type]" value='medals_won' class="form-control" required>



                                </td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_1][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_1" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_0">
                                <td><select class="form-select form_1_discipline_0 form_1_discipline disciplin_grab" data-id="form_1" data-counting_id="0" name="step_one[form_1][0][discipline_id]" aria-label="Default select example" required>
                                        <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_1][0][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_one[form_1][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_1][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_1][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_1][0][f_2022_23]" class="form-control" required></td>

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
                        <h6 class="mb-2">1.2 At International level (medals won) – Individual Sports</h6>
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
                           
                            <tr class="row_medals_won_category_2_{{$key}}">
                                <td><select class="form-select form_2_discipline_{{$key}} form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="{{$key}}" name="step_one[form_2][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_2][{{$key}}][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_one[form_2][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_2][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_2][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_2" data-id2="{{$key}}" data-db_id2="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_category_2_0">
                                <td><select class="form-select form_2_discipline_0 form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="0" name="step_one[form_2][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_2][0][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_one[form_2][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_2][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_2][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_2][0][f_2022_23]" class="form-control" required></td>

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
                        <h6 class="mb-2">1.3 At International level (medals won) – Individual Sports</h6>
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
                         
                            <tr class="row_medals_won_category_3_{{$key}}">
                                <td><select class="form-select form_3_discipline_{{$key}} form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="{{$key}}" name="step_one[form_3][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_3][{{$key}}][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_one[form_3][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_3][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_3][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medals_won_cat_3" data-id3="{{$key}}" data-db_id3="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_category_3_0">
                                <td><select class="form-select form_3_discipline_0 form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="0" name="step_one[form_3][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_3][0][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_one[form_3][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_3][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_3][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_3][0][f_2022_23]" class="form-control" required></td>

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
                        <h6 class="mb-2">1.4 At International Level (Participation)- Individual Sports</h6>
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
                           
                            <tr class="row_participation_cat_1_{{$key}}">
                                <td><select class="form-select form_4_discipline_{{$key}} form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="{{$key}}" name="step_one[form_4][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_4][{{$key}}][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_one[form_4][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_4][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_4][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_1" data-id4="{{$key}}" data-db_id4="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_cat_1_0">
                                <td><select class="form-select form_4_discipline_0 form_4_discipline disciplin_grab " data-id = "form_4" data-counting_id="0" name="step_one[form_4][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_4][0][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_one[form_4][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_4][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_4][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_4][0][f_2022_23]" class="form-control" required></td>

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
                        <h6 class="mb-2">1.5 At International level (medals won) – Individual Sports</h6>
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
                          
                            <tr class="row_participation_cat_2_{{$key}}">
                                <td><select class="form-select form_5_discipline_{{$key}} disciplin_grab " data-id="form_5" data-counting_id="{{$key}}" name="step_one[form_5][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_5][{{$key}}][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_one[form_5][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_5][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_5][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_2" data-id5="{{$key}}" data-db_id5="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_cat_2_0">
                                <td><select class="form-select form_5_discipline_0 disciplin_grab " data-id="form_5" data-counting_id="0" name="step_one[form_5][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_5][0][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_one[form_5][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_5][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_5][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_5][0][f_2022_23]" class="form-control" required></td>

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
                        <h6 class="mb-2">1.6 At International level (Participation) – Individual Sports</h6>
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
                           
                            <tr class="row_participation_category_3_{{$key}}">
                                <td><select class="form-select form_6_discipline_{{$key}} disciplin_grab " data-id="form_6" data-counting_id="{{$key}}" name="step_one[form_6][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_6][{{$key}}][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_one[form_6][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_6][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_6][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_cat_3" data-id6="{{$key}}" data-db_id6="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medals_won_category_3_0">
                                <td><select class="form-select form_6_discipline_0 disciplin_grab " data-id="form_6" data-counting_id="0" name="step_one[form_6][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_6][0][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_one[form_6][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_6][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_6][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_6][0][f_2022_23]" class="form-control" required></td>

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

                        <h6 class="mb-2"> 1.7 At National level (Medals won) – Individual Sports</h6>
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
                           
                            <tr class="row_medal_won_national_{{$key}}">
                                <td><select class="form-select form_7_discipline_{{$key}} disciplin_grab " data-id="form_7" data-counting_id="{{$key}}" name="step_one[form_7][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_7][{{$key}}][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_7][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_7][{{$key}}][form_type]" value='medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_7][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_medal_won_national" data-id7="{{$key}}" data-db_id7="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_medal_won_national_0">
                                <td><select class="form-select form_7_discipline_0 disciplin_grab " data-id="form_7" data-counting_id="0" name="step_one[form_7][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_7][0][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_7][0][form_type]" value='medals_won' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_7][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_7][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_7][0][f_2022_23]" class="form-control" required></td>

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
                        <h6 class="mb-2"> 1.8 At National Level (Participation)- Individual Sports</h6>
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
                            @foreach($form_eight as $key => $value)
                           
                            <tr class="row_participation_national_{{$key}}">
                                <td><select class="form-select form_8_discipline_{{$key}} disciplin_grab " data-id="form_8" data-counting_id="{{$key}}" name="step_one[form_8][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_8][{{$key}}][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_8][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_8][{{$key}}][form_type]" value='participation' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_8][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national" data-id8="{{$key}}" data-db_id8="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_0">
                                <td><select class="form-select form_8_discipline_0 disciplin_grab " data-id="form_8" data-counting_id="0" name="step_one[form_8][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_8][0][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_8][0][form_type]" value='participation' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_8][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_8][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_8][0][f_2022_23]" class="form-control" required></td>

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

        <div class="row py-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <h6 class="mb-2">Category -1 </h6>
                        <h6 class="mb-2"> 1.9 At International level (total medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_national_nine">+ Add</button></a>
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
                          
                            <tr class="row_participation_national_nine_{{$key}}">
                                <td><select class="form-select form_9_discipline_{{$key}} disciplin_grab " data-id="form_9" data-counting_id="{{$key}}" name="step_one[form_9][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_9][{{$key}}][level]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_9][{{$key}}][category]" value='category-1' class="form-control" required>
                                    <input type="hidden" name="step_one[form_9][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_9][{{$key}}][form_type]" value='total_medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_9][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_nine" data-id9="{{$key}}" data-db_id9="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_nine_0">
                                <td><select class="form-select form_9_discipline_0 disciplin_grab " data-id="form_9" data-counting_id="0" name="step_one[form_9][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_9][0][level]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_9][0][form_type]" value='total_medals_won' class="form-control" required>
                                    <input type="hidden" name="step_one[form_9][0][category]" value='category-1' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_9][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_9][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_9][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_nine" data-id9="0" data-db_id9=""><i class="fa-solid fa-trash-can"></i></a>
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
                        <h6 class="mb-2"> 1.10 At International level (total medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_national_ten">+ Add</button></a>
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
                           
                            <tr class="row_participation_national_ten_{{$key}}">
                                <td><select class="form-select form_10_discipline_{{$key}} disciplin_grab " data-id="form_10" data-counting_id="{{$key}}" name="step_one[form_10][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_10][{{$key}}][level]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_10][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_10][{{$key}}][category]" value='category-2' class="form-control" required>
                                    <input type="hidden" name="step_one[form_10][{{$key}}][form_type]" value='total_medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_10][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_ten" data-id10="{{$key}}" data-db_id10="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_ten_0">
                                <td><select class="form-select form_10_discipline_0 disciplin_grab " data-id="form_10" data-counting_id="0" name="step_one[form_10][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_10][0][level]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_10][0][form_type]" value='total_medals_won' class="form-control" required>
                                    <input type="hidden" name="step_one[form_10][0][category]" value='category-2' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_10][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_10][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_10][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_ten" data-id10="0" data-db_id10=""><i class="fa-solid fa-trash-can"></i></a>
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
                        <h6 class="mb-2"> 1.11 At International level (total medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_national_eleven">+ Add</button></a>
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
                        <tbody class="form_eleven_container">
                            @if($form_eleven->count())
                            @foreach($form_eleven as $key => $value)
                          
                            <tr class="row_participation_national_eleven_{{$key}}">
                                <td><select class="form-select form_11_discipline_{{$key}} disciplin_grab " data-id="form_11" data-counting_id="{{$key}}" name="step_one[form_11][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_11][{{$key}}][level]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_11][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_11][{{$key}}][category]" value='category-3' class="form-control" required>
                                    <input type="hidden" name="step_one[form_11][{{$key}}][form_type]" value='total_medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_11][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_eleven" data-id11="{{$key}}" data-db_id11="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_eleven_0">
                                <td><select class="form-select form_11_discipline_0 disciplin_grab " data-id="form_11" data-counting_id="0" name="step_one[form_11][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_11][0][level]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_11][0][form_type]" value='total_medals_won' class="form-control" required>
                                    <input type="hidden" name="step_one[form_11][0][category]" value='category-3' class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_11][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_11][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_11][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_eleven" data-id11="0" data-db_id11=""><i class="fa-solid fa-trash-can"></i></a>
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
                    <!-- <h6 class="mb-2">Category -3 </h6> -->
                        <h6 class="mb-2"> 1.12 At National level (athletes who won medals) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_national_twelve">+ Add</button></a>
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
                        <tbody class="form_twelve_container">
                            @if($form_twelve->count())
                            @foreach($form_twelve as $key => $value)
                           
                            <tr class="row_participation_national_twelve_{{$key}}">
                                <td><select class="form-select form_12_discipline_{{$key}} disciplin_grab " data-id="form_12" data-counting_id="{{$key}}" name="step_one[form_12][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_12][{{$key}}][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_12][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_12][{{$key}}][category]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_12][{{$key}}][form_type]" value='athelets_medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_12][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_twelve" data-id12="{{$key}}" data-db_id12="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_twelve_0">
                                <td><select class="form-select form_12_discipline_0 disciplin_grab " data-id="form_12" data-counting_id="0" name="step_one[form_12][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_12][0][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_12][0][form_type]" value='athelets_medals_won' class="form-control" required>
                                    <input type="hidden" name="step_one[form_12][0][category]"  class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_12][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_12][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_12][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_twelve" data-id12="0" data-db_id12=""><i class="fa-solid fa-trash-can"></i></a>
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
                    <!-- <h6 class="mb-2">Category -3 </h6> -->
                        <h6 class="mb-2"> 1.13 At National level (total medals won) – Individual Sports</h6>
                        <a href="javascript::void(0)" class="text-decoration-none"> <button type="button" class="btn btn-primary  d-block ms-auto participation_national_thirteen">+ Add</button></a>
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
                        <tbody class="form_thirteen_container">
                            @if($form_thirteen->count())
                            @foreach($form_thirteen as $key => $value)
                       
                            <tr class="row_participation_national_thirteen_{{$key}}">
                                <td><select class="form-select form_13_discipline_{{$key}} disciplin_grab " data-id="form_13" data-counting_id="{{$key}}" name="step_one[form_13][{{$key}}][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $k => $val)
                                        <option value="{{$val->discipline_id}}" @if($val->discipline_id == $value->discipline_id) selected @endif>{{$val->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_13][{{$key}}][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_13][{{$key}}][id]" value="{{$value->id}}" class="form-control" required>
                                    <input type="hidden" name="step_one[form_13][{{$key}}][category]"  class="form-control" required>
                                    <input type="hidden" name="step_one[form_13][{{$key}}][form_type]" value='athelets_total_medals_won' class="form-control" required>

                                </td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][m_2018_19]" value="{{$value->m_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][f_2018_19]" value="{{$value->f_2018_19}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][m_2019_20]" value="{{$value->m_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][f_2019_20]" value="{{$value->f_2019_20}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][m_2020_21]" value="{{$value->m_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][f_2020_21]" value="{{$value->f_2020_21}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][m_2021_22]" value="{{$value->m_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][f_2021_22]" value="{{$value->f_2021_22}}" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][m_2022_23]" value="{{$value->m_2022_23}}" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_13][{{$key}}][f_2022_23]" value="{{$value->f_2022_23}}" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_thirteen" data-id13="{{$key}}" data-db_id13="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else

                            <tr class="row_participation_national_thirteen_0">
                                <td><select class="form-select form_13_discipline_0 disciplin_grab " data-id="form_13" data-counting_id="0" name="step_one[form_13][0][discipline_id]" aria-label="Default select example" required>
                                <option disabled selected value="">Select</option>
                                        @foreach($dis_list as $key => $value)
                                        <option value="{{$value->discipline_id}}">{{$value->discipline}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="step_one[form_13][0][level]" value='national' class="form-control" required>
                                    <input type="hidden" name="step_one[form_13][0][form_type]" value='athelets_total_medals_won' class="form-control" required>
                                    <input type="hidden" name="step_one[form_13][0][category]"  class="form-control" required>

                                </td>

                                <td><input type="number" min="0" name="step_one[form_13][0][m_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][f_2018_19]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][m_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][f_2019_20]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][m_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][f_2020_21]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][m_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][f_2021_22]" class="form-control" required></td>
                                <td><input type="number" min="0" name="step_one[form_13][0][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number" min="0" name="step_one[form_13][0][f_2022_23]" class="form-control" required></td>

                                <td>
                                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_participation_national_thirteen" data-id13="0" data-db_id13=""><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
      
        <a href="{{url('/review/index')}}" class="btn btn-primary ">Back</a>&nbsp;
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
    var counting11 = "{{$form_eleven->count()}}";
    var counting12 = "{{$form_twelve->count()}}";
    var counting13 = "{{$form_thirteen->count()}}";
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
    var form_eleven_count = "{{$form_eleven->count()}}";
    var form_twelve_count = "{{$form_twelve->count()}}";
    var form_thirteen_count = "{{$form_thirteen->count()}}";
    var url = baseurl + '/review/part-one/step-one/' + "{{encode5t($c_id)}}";
    $(document).on('change', '.center_change', function() {
        $('.created_for').val($('.center_change').val());

        window.location.href = baseurl + '/review/part-one/step-one/' + $(`.center_change option:selected`).attr("data-id");
    })




    var dis_html = '';
    for (let i = 0; i < dis_list_json.length; i++) {
        dis_html += `<option value="${dis_list_json[i].discipline_id}">${dis_list_json[i].discipline}</option>`;
    }
</script>
<script src="{{asset('public/front/js/review/review_part_one_step_one.js')}}"></script>

@endsection