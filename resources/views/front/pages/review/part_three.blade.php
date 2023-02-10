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


        };

        for (let i = 0; i < dis_list_json.length; i++) {
            data_dict.form1[dis_list_json[i].discipline_id] = dis_list_json[i];
            data_dict.form2[dis_list_json[i].discipline_id] = dis_list_json[i];
            data_dict.form3[dis_list_json[i].discipline_id] = dis_list_json[i];
            data_dict.form4[dis_list_json[i].discipline_id] = dis_list_json[i];

        }

    </script>
@endsection
@section('content')


<div class="container rc-new-container">
    <h1 class="text-center mb-2">Part 3 </h1>

    <form id="part_two" action ="{{url('review/part-three-store')}}" method="POST">
        @csrf
        <input required type="hidden" name="user_id" value="{{$id}}" >
      <div class="row py-3">

            <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
        <div class="col-12">
            <div class="table-responsive">

                <table class="table table-bordered">
                    <h4 class="mb-3">
                        3.1	Discipline which can be discontinued


                    </h4>
                    <button type="button" class="btn btn-primary  d-block ms-auto discpline_discountinued">Add +</button>

                    <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                        <thead class="text-center align-middle">
                          <tr>

                          <th rowspan="2">Discipline</th>
                          <th colspan="2">No. Of existing Athletes</th>
                          <th rowspan="2">Reason</th>
                          <th rowspan="2">Action</th>

                           </tr>
                           <tr>
                            <th>Male</th>
                            <th>Female</th>
                           </tr>

                        </thead>
                    <tbody  class=" align-middle form_first_container ">
                        @if($form_one->count())
                        @foreach($form_one as $k=>$v)
                            <script>
                                dis_id = "{{$v->dis_dis}}";
                                delete data_dict.form1[dis_id];
                            </script>
                          <tr class="tr_discpline_discountinued_{{$k}}">
                           <td>
                           <input required type="hidden" name="form_1[{{$k}}][id]" value="{{$v->id}}">
                           <input required type="hidden" name="form_1[{{$k}}][created_for]" value="{{$v->created_for}}" >
                            <select required class="form-select  form_1_discipline_{{$k}} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="{{$k}}"  name="form_1[{{$k}}][dis_dis]"   id={{$k}}  aria-label="Default select example" required>
                                <option disabled selected  value="">Select</option>
                                @foreach ($dis_list as $item)
                                <option  value="{{$item->discipline_id}}" @if($v->dis_dis == $item->discipline_id) selected @endif >{{$item ->discipline}}</option>
                                @endforeach
                              </select>
                           </td>


                            <td><input required type="number"  placeholder="0"  min="0" class="form-control" value="{{$v['dis_dis_male']}}" name="form_1[{{$k}}][dis_dis_male]" ></td>
                            <td><input required type="number"  placeholder="0"  min="0" class="form-control" value="{{$v['dis_dis_female']}}" name="form_1[{{$k}}][dis_dis_female]" ></td>
                            <td><input required type="text"  placeholder="0"  min="0" class="form-control" value="{{$v['dis_dis_reason']}}" name="form_1[{{$k}}][dis_dis_reason]" ></td>
                            </td>
                            <td>
                             <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline_discountinued" data-id="{{$k}}" data-db_id="{{$v->id}}"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                          </tr>
                        @endforeach

                        @else

                        <tr  class="tr_discpline_discountinued_0" >
                           <td>
                            <select required class="form-select  form_1_discipline_0 form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="0" name="form_1[0][dis_dis]"  aria-label="Default select example">
                                <option selected disabled value="">Select</option>
                                @foreach ($dis_list as $item)
                                <option  value="{{$item->discipline_id}}" >{{$item ->discipline}}</option>
                                @endforeach
                              </select>
                              <input required type="hidden" name="form_1[0][created_for]" value="{{$c_id}}" >
                           </td>

                           <td>
                            <input required type="number" name="form_1[0][dis_dis_male]" class="form-control">
                           </td>
                           <td>
                            <input required type="number" name="form_1[0][dis_dis_female]" class="form-control">
                           </td>
                           <td>
                            <input required type="text" name="form_1[0][dis_dis_reason]" class="form-control">
                           </td>
                           <td>
                            <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline_discountinued" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                          </td>
                          </tr>

                          @endif

                        </tbody>
                </table>

            </div>


        </div>

      </div>



    <!-- row 2 -->
    <div class="row py-3">

<!-- <h5 class="text-start mb-2">Category -1 </h4> -->
<div class="col-12">
<div class="table-responsive">

    <table class="table table-bordered">
                    <h4 class="mb-3">
                        3.2	Discipline to be added


                    </h4>

                    <button type="button" class="btn btn-primary  d-block ms-auto  Discipline_revised discpline_added_add ">Add+</button>

                    <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                        <thead class="text-center align-middle">
                          <tr>

                          <th rowspan="2">Discipline</th>
                          <th colspan="2">No. Of proposed Athletes</th>
                          <th rowspan="2">Reason</th>
                          <th rowspan="2">Action</th>
                           </tr>
                           <tr>
                            <th>Male</th>
                            <th>Female</th>
                           </tr>

            </thead>
        <tbody  class=" align-middle discpline_added_body ">
            @if($form_two->count())
            @foreach($form_two as $k=>$v)
                <script>
                    dis_id = "{{$v->dis_added}}";
                    delete data_dict.form2[dis_id];
                </script>
              <tr class="discpline_added_add_{{$k}}">
               <td>
               <input required type="hidden" name="form_2[{{$k}}][id]" value="{{$v->id}}">
               <input required type="hidden" name="form_2[{{$k}}][created_for]" value="{{$v->created_for}}" >
                <select required required class="form-select  form_2_discipline_{{$k}} form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="{{$k}}"  name="form_2[{{$k}}][dis_added]"   id={{$k}}  aria-label="Default select example">
                    <option disabled selected  value="">Select</option>
                    @foreach ($dis_list as $item)
                    <option  value="{{$item->discipline_id}}" @if($v->dis_added == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                    @endforeach
                  </select>
               </td>


                <td><input required type="number"  placeholder="0"  min="0" class="form-control" value="{{$v['dis_added_male']}}" name="form_2[{{$k}}][dis_added_male]" required></td>
                <td><input required type="number"  placeholder="0"  min="0" class="form-control" value="{{$v['dis_added_female']}}" name="form_2[{{$k}}][dis_added_female]" required ></td>
                <td><input required type="text"  placeholder="0"  min="0" class="form-control" value="{{$v['dis_added_reason']}}" name="form_2[{{$k}}][dis_added_reason]"required ></td>
                </td>
                <td>
                <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline_add" data-id="{{$k}}" data-db_id="{{$v->id}}"><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>
            @endforeach

            @else

            <tr  class="discpline_added_add_0" >
               <td>
                <select required class="form-select  form_2_discipline_0 form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="0" name="form_2[0][dis_added]"  aria-label="Default select example" required>
                    <option selected disabled value="">Select</option>
                    @foreach ($dis_list as $item)
                    <option  value="{{$item->discipline_id}}" >{{$item ->discipline}}</option>
                    @endforeach
                  </select>
                  <input required type="hidden" name="form_2[0][created_for]" value="{{$c_id}}" >
               </td>

               <td>
                <input required type="number" name="form_2[0][dis_added_male]" class="form-control" required>
               </td>
               <td>
                <input required type="number" name="form_2[0][dis_added_female]" class="form-control" required>
               </td>
               <td>
                <input required type="text" name="form_2[0][dis_added_reason]" class="form-control" required>
               </td>
               <td>
                <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline_add" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                </td>
              </tr>

              @endif

            </tbody>
    </table>

</div>


</div>

</div>

<!-- row 3 -->
       <div class="row py-3">



        <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
        <div class="col-12">
            <div class="table-responsive">

                <table class="table table-bordered">
                    <h4 class="mb-3">
                        3.3	Discipline-wise sanctioned strength to be revised (if-needed)


                    </h4>
                    <button type="button" class="btn btn-primary  d-block ms-auto discpline_add">Add+</button>


                    <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                        <thead class="text-center align-middle">
                          <tr>

                          <th rowspan="2">Discipline</th>
                          <th colspan="2">Current Sanctioned Strength</th>
                          <th colspan="2">Proposed Sanctioned Strength</th>
                          <th rowspan="2">Reason</th>
                          <th rowspan="2">Action</th>
                           </tr>
                           <tr>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Male</th>
                            <th>Female</th>
                           </tr>

                        </thead>
                        <tbody  class="form_three_container align-middle">
                            @if($form_three->count())
                            @foreach($form_three as $k=>$v)
                            <script>
                           dis_id = "{{$v->discipline_discrating}}";
                           delete data_dict.form3[dis_id];
                          </script>
                          <tr class="row_Discipline_three_{{$k}}">
                        <td>
                          <input required type="hidden" name="form_3[{{$k}}][id]" value="{{$v->id}}">
                          <input required type="hidden" name="form_3[{{$k}}][created_for]" value="{{$v->created_for}}" >
                         <select required required class="form-select  form_3_discipline_{{$k}} form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="{{$k}}"  name="form_3[{{$k}}][strength_discipline]"   id={{$k}}  aria-label="Default select example">
                          <option disabled selected  value="">Select</option>
                          @foreach ($dis_list as $item)
                          <option  value="{{$item->discipline_id}}" @if($v->discipline_discrating == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                          @endforeach
                         </select>
                        </td>
                           <td>
                            <input required type="number"  name="form_3[{{$k}}][strength_current_m]" value="{{$v['strength_current_m']}}" class="form-control" required>
                           </td>
                           <td>
                            <input required type="number"  name="form_3[{{$k}}][strength_current_f]" value="{{$v['strength_current_f']}}" class="form-control" required>
                           </td>

                           <td>
                            <input required type="number"  name="form_3[{{$k}}][pro_sec_strnght_m]" value="{{$v['strength_current_f']}}" class="form-control" required>
                           </td>
                           <td>
                            <input required type="number"   name="form_3[{{$k}}][pro_sec_strnght_f]" value="{{$v['pro_sec_strnght_f']}}" class="form-control" required>
                           </td>
                           <td>
                            <input required type="text"  name="form_3[{{$k}}][strength_discipline_reason]" value="{{$v['strength_discipline_reason']}}" class="form-control" required>
                           </td>

                           <td>
                            <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline" data-id="{{$k}}" data-db_id="{{$v->id}}"><i class="fa-solid fa-trash-can"></i></a>
                          </td>
                          </tr>
                        @endforeach


                        @else

                            <tr  class="row_Discipline_three_0" >
                            <td>
                            <select required class="form-select  form_3_discipline_0 form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="0" name="form_3[0][strength_discipline]"  aria-label="Default select example">
                            <option selected disabled value="">Select</option>
                            @foreach ($dis_list as $item)
                            <option  value="{{$item->discipline_id}}" >{{$item ->discipline}}</option>
                            @endforeach
                            </select>
                            <input required type="hidden" name="form_3[0][created_for]" value="{{$c_id}}" >
                            </td>

                            <td>
                            <input required type="number"  name="form_3[0][strength_current_m]"  class="form-control" required>
                            </td>
                            <td>
                            <input required type="number" name="form_3[0][strength_current_f]" class="form-control" required>
                            </td>

                            <td>
                            <input required type="number"   name="form_3[0][pro_sec_strnght_m]"  class="form-control" required>
                            </td>
                            <td>
                            <input required type="number"   name="form_3[0][pro_sec_strnght_f]" class="form-control" required>
                            </td>
                            <td>
                            <input required type="text"   name="form_3[0][strength_discipline_reason]"  class="form-control" required>
                            </td>

                            <td>
                            <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                          </td>
                            </tr>

                           @endif
                        </tbody>
                </table>

            </div>

        </div>

    </div>

    <!-- row 4 -->
         <div class="row py-3">



            <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <h4 class="mb-3">
                            3.4	Availablity of coaches


                        </h4>

                        <button type="button" class="btn btn-primary  d-block ms-auto  Discipline_revised row_Discipline_add ">Add+</button>

                        <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                            <thead class="text-center align-middle">
                              <tr>

                              <th rowspan="2">Discipline</th>
                              <th colspan="2">No. of coach present</th>
                              <th colspan="2">No. of coach required</th>
                              <th rowspan="2">Reason</th>
                              <th rowspan="2">Action</th>
                               </tr>
                               <tr>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Male</th>
                                <th>Female</th>
                               </tr>

                            </thead>
                            <tbody  class="form_four_container align-middle">
                                @if($form_four->count())
                               @foreach($form_four as $k=>$v)
                              <script>
                               dis_id = "{{$v->discipline_coaches}}";
                               delete data_dict.form4[dis_id];
                              </script>
                              <tr class="row_Discipline_four_{{$k}}">
                             <td>
                              <input required type="hidden" name="form_4[{{$k}}][id]" value="{{$v->id}}">
                              <input required type="hidden" name="form_4[{{$k}}][created_for]" value="{{$v->created_for}}" >
                              <select required class="form-select  form_4_discipline_{{$k}} form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="{{$k}}"  name="form_4[{{$k}}][discipline_coaches]"   id={{$k}}  aria-label="Default select example">

                                  <option disabled selected  value="">Select</option>
                                  @foreach ($dis_list as $item)
                                  <option  value="{{$item->discipline_id}}" @if($v->discipline_coaches == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                   @endforeach
                              </select>
                               </td>

                               <td>
                                <input required type="number"  name="form_4[{{$k}}][coaches_pre_male]" value="{{$v['coach_present_m']}}" required class="form-control">
                               </td>
                               <td>
                                <input required type="number"   name="form_4[{{$k}}][coaches_pre_fmale]"  value="{{$v['coach_present_f']}}"  required class="form-control">
                               </td>
                               <td>
                                <input required type="number" name="form_4[{{$k}}][coaches_req_male]"  value="{{$v['coach_required_m']}}" required class="form-control">
                               </td>
                               <td>
                                <input required type="number"  name="form_4[{{$k}}][coaches_req_fmale]" value="{{$v['coach_required_f']}}"  required class="form-control">
                               </td>
                               <td>
                                <input required type="text" name="form_4[{{$k}}][coaches_req_reason]" value="{{$v['coach_required_Reason']}}" required class="form-control">
                               </td>

                               <td>
                                 <a href="javascript::void(0)" class="actionbtn remove_btn_row_coach" data-id="{{$k}}" data-db_id="{{$v->id}}"><i class="fa-solid fa-trash-can"></i></a>
                               </td>
                              </tr>
                               @endforeach


                                 @else

                            <tr  class="row_Discipline_four_0" >
                            <td>
                            <select required class="form-select  form_4_discipline_0 form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="0" name="form_4[0][discipline_coaches]"  aria-label="Default select example">
                            <option selected disabled value="">Select</option>
                            @foreach ($dis_list as $item)
                            <option  value="{{$item->discipline_id}}" >{{$item ->discipline}}</option>
                            @endforeach
                            </select>
                            <input required type="hidden" name="form_4[0][created_for]" value="{{$c_id}}" >
                            </td>

                            <td>
                            <input required type="number"   name="form_4[0][coaches_pre_male]" required  class="form-control">
                            </td>
                            <td>
                            <input required type="number"  name="form_4[0][coaches_pre_fmale]" required class="form-control">
                            </td>

                            <td>
                            <input required type="number"   name="form_4[0][coaches_req_male]" required  class="form-control">
                            </td>
                            <td>
                            <input required type="number"   name="form_4[0][coaches_req_fmale]"  required  class="form-control">
                            </td>
                            <td>
                            <input required type="text"   name="form_4[0][coaches_req_reason]"   required  class="form-control">
                            </td>
                            <td>
                                 <a href="javascript::void(0)" class="actionbtn remove_btn_row_coach" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                            </tr>

                            @endif
                            </tbody>
                    </table>

                </div>


            </div>

        </div>


        <!-- Row 5 -->
        <div class="row py-3">



            <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <h4 class="mb-3">
                            3.5	List any three advantage / merits of the center:
                            @if(isset($form_five))

                            <input required type="hidden" name="form_5[comment_type]" value="advantage">
                            <input required type="hidden" name="form_5[created_for]" value="{{$c_id}}">
                            <input required type="hidden" name="form_5[id]" value="{{$form_five->id}}">
                            <div class="form-floating mt-3">
                                <textarea class="form-control"  name="form_5[comment]"placeholder="Leave a comment here" id="floatingTextarea">{{$form_five->comment}}</textarea>
                                <label for="floatingTextarea">Comments</label>
                              </div>
                        @else

                            <input required type="hidden" name="form_5[comment_type]" value="advantage">
                            <input required type="hidden" name="form_5[created_for]" value="{{$c_id}}">
                            <div class="form-floating mt-3">
                                <textarea class="form-control"  name="form_5[comment]"placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                              </div>

                        @endif
                        </h4>


                    </table>

                </div>
                <!-- <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button> -->

            </div>

        </div>
          <!-- Row 6 -->
          <div class="row py-3">



            <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <h4 class="mb-3">
                            3.6	List any three difficulties (challenges) facing:
                       @if(isset($form_six) )
                            <input required type="hidden" name="form_6[comment_type]" value="disadvantage">
                            <input required type="hidden" name="form_6[created_for]" value="{{$c_id}}">
                            <input required type="hidden" name="form_6[id]" value="{{$form_six->id}}">
                            <div class="form-floating mt-3">
                                <textarea class="form-control"  name="form_6[comment]"placeholder="Leave a comment here" id="floatingTextarea">{{$form_six->comment}}</textarea>
                                <label for="floatingTextarea">Comments</label>
                              </div>
                        @else

                            <input required type="hidden" name="form_6[comment_type]" value="disadvantage">
                            <input required type="hidden" name="form_6[created_for]" value="{{$c_id}}">
                            <div class="form-floating mt-3">
                                <textarea class="form-control"  name="form_6[comment]"placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                              </div>

                        @endif
                    </h4>


                    </table>

                </div>
                <!-- <button type="submit" class="btn btn-primary  d-block ms-auto ">Add+</button> -->

            </div>

        </div>
        <!-- <button type="submit" class="d-block mx-auto btn btn-primary">Next</button> -->
        
        <div class="d-flex justify-content-center">
        <button class="btn btn-primary " onclick="history.back()">Back</button> &nbsp;
        <button type="submit" class="btn btn-primary ">Next</button> 
        
        </div>



@endsection
@section('page_specific_js')

<script src="{{asset('public/front/js/review/review_part_three.js')}}"></script>

<script>
    var counting1 = "{{$form_one->count()}}";
    var counting2 = "{{$form_two->count()}}";
    var counting3 = "{{$form_three->count()}}";
    var counting4 = "{{$form_four->count()}}";

    var form_first_count = "{{$form_one->count()}}";
    var form_second_count = "{{$form_two->count()}}";
    var form_three_count = "{{$form_three->count()}}";
    var form_four_count = "{{$form_four->count()}}";
    var c_id = "{{$c_id}}";
    var url = baseurl + '/review/part-three/' + "{{encode5t($c_id)}}";
</script>




@endsection
