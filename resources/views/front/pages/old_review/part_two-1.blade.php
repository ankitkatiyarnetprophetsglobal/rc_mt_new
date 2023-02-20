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


        }

    </script>    
@endsection
@section('content')


<div class="container rc-new-container">
    <h1 class="text-center mb-2">Part 2 </h1>
    <h3 class="text-start mb-4">(2).Infrastructure Facilities at present available</h3>
    
   
    <form id="part_two" action ="{{url('review/part-two-store')}}" method="POST">
        @csrf
        <h4 class="text-start mb-4">Land Available </h4>

        <input type="hidden" name="user_id" value="{{$id}}" >
        <select class="form-control form-select center_id center_change ms-auto" id="project_center_id" name="center_id" style="width: 20%;">
            @foreach($centers as $p_key => $p_val)
            <option value="{{$p_val->ncoe_id}}" data-id="{{encode5t($p_val->ncoe_id)}}" {{ $p_key == Session::get('user')->user_id ? 'selected' : ''}}>{{$p_val->ncoe_name}}</option>
            @endforeach
        </select>
      
        <div class="d-flex">
            <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="cat_radio" value="1"  id="flexRadioDefault3" @if($data)  @if($data->cat_radio == 1) {{'checked' ?? ''}} @endif @endif value="Yes">
            <label class="form-check-label" for="flexRadioDefault3">
             Yes
            </label>
            </div>
            <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="cat_radio" value="2"  id="flexRadioDefault4" @if($data)  @if($data->cat_radio == 2) {{'checked' ?? ''}} @endif @endif value="No">
            <label class="form-check-label" for="flexRadioDefault4">
              No
            </label>
          </div>
        </div>
        
        <div class="row align-items-center align-middle text-center">
        <div class="col-auto" id="area_of_land_div" >
            <h4 class="text-start my-4 area-of-land">2.2 Area of land</h4>
        
        <div class="col-auto">
           <div class="d-flex">
            <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="area_land"  id="flexRadioDefault3" @if($data)  @if($data->area_land == 'Acre') {{'checked' ?? ''}} @endif @endif value="Acre">
                <label class="form-check-label" for="flexRadioDefault3">
                 Acre
                </label>
              </div>
              <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="area_land" id="flexRadioDefault4" @if($data)  @if($data->area_land == 'Hectare') {{'checked' ?? ''}} @endif @endif Value="Hectare">
                <label class="form-check-label" for="flexRadioDefault4">
                  Hectare
                </label>
              </div>
           </div>
            </div>
            <div class="col-auto">
        <input type="number"  min="0"  name="area_heactor" novalidate class="form-control area_heactor" @if($data)  value="{{$data->area_heactor}}" @endif>
       </div>
        </div>
       
       
    </div>
         <!-- row 1 -->
    <div class="row py-3">
       
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.3	Accommodation (Rooms/Dormitories)
                       
                           
                   </h4>
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th rowspan="2">Particulars</th>
                               <th colspan="4" >Male</th>
                              <th colspan="4">Female</th>
                               <th rowspan="2">Remark</th>
                           </tr>
                           <tr>
                               <th>A/C</th>
                               <th>Rating</th>
                               <th>Non-A/C</th>
                               <th>Rating</th>
                               <th>A/C</th>
                               <th>Rating</th>
                               <th>Non-A/C</th>
                               <th>Rating</th>
                           </tr>
                           
                       </thead>
                       <tbody>
                           <tr>
                               <td>No of Rooms*</td>
                               <td><input type="number" required min="0" name ="accommods_part_two_rooms_male_ac" @if($accommods)  value="{{$accommods->accommods_part_two_rooms_male_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_rooms_male_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_rooms_male_ac_rating']) && $accommods['accommods_part_two_rooms_male_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_rooms_male_ac_rating']) && $accommods['accommods_part_two_rooms_male_ac_rating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_rooms_male_ac_rating']) && $accommods['accommods_part_two_rooms_male_ac_rating'] == "3") selected @endif >Good</option> 
                                       <option value="4" @if(isset($accommods['accommods_part_two_rooms_male_ac_rating']) && $accommods['accommods_part_two_rooms_male_ac_rating'] == "4") selected @endif >Average</option> 
                                       <option value="5" @if(isset($accommods['accommods_part_two_rooms_male_ac_rating']) && $accommods['accommods_part_two_rooms_male_ac_rating'] == "5") selected @endif >Poor</option> 
                                     </select>
                               </td>
                               <td><input type="number"  min="0" required  name="accommods_part_two_rooms_male_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_rooms_male_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required  name="accommods_part_two_rooms_male_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_rooms_male_nonacrating']) && $accommods['accommods_part_two_rooms_male_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_rooms_male_nonacrating']) && $accommods['accommods_part_two_rooms_male_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_rooms_male_nonacrating']) && $accommods['accommods_part_two_rooms_male_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required  min="0"  name="accommods_part_two_rooms_female_ac" @if($accommods)  value="{{$accommods->accommods_part_two_rooms_female_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_rooms_female_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_rooms_female_ac_rating']) && $accommods['accommods_part_two_rooms_female_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2"  @if(isset($accommods['accommods_part_two_rooms_female_ac_rating']) && $accommods['accommods_part_two_rooms_female_ac_rating'] == "2") selected @endif>Very Good</option>
                                       <option value="3"  @if(isset($accommods['accommods_part_two_rooms_female_ac_rating']) && $accommods['accommods_part_two_rooms_female_ac_rating'] == "3") selected @endif>Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_rooms_female_ac_rating']) && $accommods['accommods_part_two_rooms_female_ac_rating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_rooms_female_ac_rating']) && $accommods['accommods_part_two_rooms_female_ac_rating'] == "5") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_rooms_female_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_rooms_female_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_rooms_female_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_rooms_female_nonacrating']) && $accommods['accommods_part_two_rooms_female_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_rooms_female_nonacrating']) && $accommods['accommods_part_two_rooms_female_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_rooms_female_nonacrating']) && $accommods['accommods_part_two_rooms_female_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="text" required  name="accommods_part_two_rooms_remark" @if($accommods)  value="{{$accommods->accommods_part_two_rooms_remark}}" @endif class="form-control"></td>
                           </tr>
                           <tr>
                               <td>Total Accomodation Capacity of Rooms</td>
                               <td><input type="number" required min="0" name="accommods_part_two_accomodation_capacity_male_ac" @if($accommods)  value="{{$accommods->accommods_part_two_accomodation_capacity_male_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" disabled name="accommods_part_two_accomodation_capacity_male_ac_rating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_accomodation_capacity_male_ac_rating']) && $accommods['accommods_part_two_accomodation_capacity_male_ac_rating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacity_male_ac_rating']) && $accommods['accommods_part_two_accomodation_capacity_male_ac_rating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacity_male_ac_rating']) && $accommods['accommods_part_two_accomodation_capacity_male_ac_rating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="number" required  min="0" name="accommods_part_two_accomodation_capacity_male_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_accomodation_capacity_male_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select"  name="accommods_part_two_accomodation_capacity_male_nonacrating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_accomodation_capacity_male_nonacrating']) && $accommods['accommods_part_two_accomodation_capacity_male_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacity_male_nonacrating']) && $accommods['accommods_part_two_accomodation_capacity_male_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacity_male_nonacrating']) && $accommods['accommods_part_two_accomodation_capacity_male_nonacrating'] == "3") selected @endif >Poor</option> -->
                                     </select>
                               </td>
                               <td><input type="number" required  min="0" name="accommods_part_two_accomodation_capacity_female_ac" @if($accommods)  value="{{$accommods->accommods_part_two_accomodation_capacity_female_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select"   name="accommods_part_two_accomodation_capacity_female_ac_rating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_accomodation_capacity_female_ac_rating']) && $accommods['accommods_part_two_accomodation_capacity_female_ac_rating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacity_female_ac_rating']) && $accommods['accommods_part_two_accomodation_capacity_female_ac_rating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacity_female_ac_rating']) && $accommods['accommods_part_two_accomodation_capacity_female_ac_rating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="number" required min="0"  name="accommods_part_two_accomodation_capacity_female_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_accomodation_capacity_female_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select"  name="accommods_part_two_accomodation_capacityrooms_female_nonacrating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_accomodation_capacityrooms_female_nonacrating']) && $accommods['accommods_part_two_accomodation_capacityrooms_female_nonacrating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacityrooms_female_nonacrating']) && $accommods['accommods_part_two_accomodation_capacityrooms_female_nonacrating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_accomodation_capacityrooms_female_nonacrating']) && $accommods['accommods_part_two_accomodation_capacityrooms_female_nonacrating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="text" required name="accommods_part_two_accomodation_capacity_remark" @if($accommods)  value="{{$accommods->accommods_part_two_accomodation_capacity_remark}}" @endif class="form-control"></td>
                           </tr>
                           <tr>
                               <td>No of Dormitory*</td>
                               <td><input type="number" required  min="0" name="accommods_part_two_dormitory_male_ac" @if($accommods)  value="{{$accommods->accommods_part_two_dormitory_male_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_dormitory_male_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "3") selected @endif >Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "5") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_dormitory_male_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_dormitory_male_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_dormitory_male_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_dormitory_male_nonacrating']) && $accommods['accommods_part_two_dormitory_male_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required  min="0" name="accommods_part_two_dormitory_female_ac" @if($accommods)  value="{{$accommods->accommods_part_two_dormitory_female_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_dormitory_female_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_dormitory_female_ac_rating']) && $accommods['accommods_part_two_dormitory_female_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_dormitory_female_ac_rating']) && $accommods['accommods_part_two_dormitory_female_ac_rating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_dormitory_female_ac_rating']) && $accommods['accommods_part_two_dormitory_female_ac_rating'] == "3") selected @endif >Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_dormitory_female_ac_rating']) && $accommods['accommods_part_two_dormitory_female_ac_rating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_dormitory_female_ac_rating']) && $accommods['accommods_part_two_dormitory_female_ac_rating'] == "5") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_dormitory_female_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_dormitory_female_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_dormitory_female_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_dormitory_female_nonacrating']) && $accommods['accommods_part_two_dormitory_female_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_dormitory_female_nonacrating']) && $accommods['accommods_part_two_dormitory_female_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_dormitory_female_nonacrating']) && $accommods['accommods_part_two_dormitory_female_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="text" required name="accommods_part_two_dormitory_remark" @if($accommods)  value="{{$accommods->accommods_part_two_dormitory_remark}}" @endif class="form-control"></td>
                           </tr>
                           <tr>
                               <td>Total Accomodation Capacity of Dormitory</td>
                               <td><input type="number" required min="0" name="accommods_part_two_capacity_dormitory_male_ac" @if($accommods)  value="{{$accommods->accommods_part_two_capacity_dormitory_male_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select"  name="accommods_part_two_capacity_dormitory_male_ac_rating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_capacity_dormitory_male_ac_rating']) && $accommods['accommods_part_two_capacity_dormitory_male_ac_rating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_male_ac_rating']) && $accommods['accommods_part_two_capacity_dormitory_male_ac_rating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_male_ac_rating']) && $accommods['accommods_part_two_capacity_dormitory_male_ac_rating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="number"  required min="0" name="accommods_part_two_capacity_dormitory_male_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_capacity_dormitory_male_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select"  name="accommods_part_two_capacity_dormitory_male_nonacrating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_capacity_dormitory_male_nonacrating']) && $accommods['accommods_part_two_capacity_dormitory_male_nonacrating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_male_nonacrating']) && $accommods['accommods_part_two_capacity_dormitory_male_nonacrating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_male_nonacrating']) && $accommods['accommods_part_two_capacity_dormitory_male_nonacrating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="number" required  min="0" name="accommods_part_two_capacity_dormitory_female_ac" @if($accommods)  value="{{$accommods->accommods_part_two_capacity_dormitory_female_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" name="accommods_part_two_capacity_dormitory_female_ac_rating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_capacity_dormitory_female_ac_rating']) && $accommods['accommods_part_two_capacity_dormitory_female_ac_rating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_female_ac_rating']) && $accommods['accommods_part_two_capacity_dormitory_female_ac_rating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_female_ac_rating']) && $accommods['accommods_part_two_capacity_dormitory_female_ac_rating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_capacity_dormitory_female_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_capacity_dormitory_female_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" name="accommods_part_two_capacity_dormitory_female_nonacrating" aria-label="Default select example">
                                    <option selected>-</option>
                                       <!-- <option value="1"  @if(isset($accommods['accommods_part_two_capacity_dormitory_female_nonacrating']) && $accommods['accommods_part_two_capacity_dormitory_female_nonacrating'] == "1") selected @endif>One</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_female_nonacrating']) && $accommods['accommods_part_two_capacity_dormitory_female_nonacrating'] == "2") selected @endif >Two</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_capacity_dormitory_female_nonacrating']) && $accommods['accommods_part_two_capacity_dormitory_female_nonacrating'] == "3") selected @endif >Three</option> -->
                                     </select>
                               </td>
                               <td><input type="text" required name="accommods_part_two_capacity_dormitory_remark"  @if($accommods)  value="{{$accommods->accommods_part_two_capacity_dormitory_remark}}" @endif class="form-control"></td>
                           </tr>
                           <tr>
                               <td>No. of Washrooms/Toilet (attached)</td>
                               <td><input type="number" required min="0" name="accommods_part_two_toilet_attached_male_ac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_attached_male_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_attached_male_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_attached_male_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_attached_male_ac_rating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_attached_male_ac_rating'] == "3") selected @endif >Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_toilet_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_attached_male_ac_rating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_toilet_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_attached_male_ac_rating'] == "5") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_toilet_attached_male_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_attached_male_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_attached_male_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_attached_male_nonacrating']) && $accommods['accommods_part_two_toilet_attached_male_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_attached_male_nonacrating']) && $accommods['accommods_part_two_toilet_attached_male_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_attached_male_nonacrating']) && $accommods['accommods_part_two_toilet_attached_male_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_toilet_attached_female_ac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_attached_female_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select"  required name="accommods_part_two_toilet_attached_female_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_attached_female_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_attached_female_ac_rating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_attached_female_ac_rating'] == "3") selected @endif >Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_toilet_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_attached_female_ac_rating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_toilet_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_attached_female_ac_rating'] == "5") selected @endif >jPoor</option>
                                     </select>
                               </td>
                               <td><input type="number" required  min="0" name="accommods_part_two_toilet_attached_female_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_attached_female_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_attached_female_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_attached_female_nonacrating']) && $accommods['accommods_part_two_toilet_attached_female_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_attached_female_nonacrating']) && $accommods['accommods_part_two_toilet_attached_female_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_attached_female_nonacrating']) && $accommods['accommods_part_two_toilet_attached_female_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="text" required name="accommods_part_two_toilet_attached_remark" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_attached_remark}}" @endif class="form-control"></td>
                           </tr>
                           <tr>
                               <td>No. of Washrooms/Toilet (Non-attached)</td>
                               <td><input type="number" required  min="0" name="accommods_part_two_toilet_non_attached_male_ac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_non_attached_male_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_non_attached_male_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_non_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_male_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_non_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_male_ac_rating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_non_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_male_ac_rating'] == "3") selected @endif >Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_toilet_non_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_male_ac_rating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_toilet_non_attached_male_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_male_ac_rating'] == "5") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_toilet_non_attached_male_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_non_attached_male_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_non_attached_male_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_non_attached_male_nonacrating']) && $accommods['accommods_part_two_toilet_non_attached_male_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_non_attached_male_nonacrating']) && $accommods['accommods_part_two_toilet_non_attached_male_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_non_attached_male_nonacrating']) && $accommods['accommods_part_two_toilet_non_attached_male_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_toilet_non_attached_female_ac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_non_attached_female_ac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_non_attached_female_ac_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_non_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_female_ac_rating'] == "1") selected @endif>Excellent</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_non_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_female_ac_rating'] == "2") selected @endif >Very Good</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_non_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_female_ac_rating'] == "3") selected @endif >Good</option>
                                       <option value="4" @if(isset($accommods['accommods_part_two_toilet_non_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_female_ac_rating'] == "4") selected @endif >Average</option>
                                       <option value="5" @if(isset($accommods['accommods_part_two_toilet_non_attached_female_ac_rating']) && $accommods['accommods_part_two_toilet_non_attached_female_ac_rating'] == "5") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="number" required min="0" name="accommods_part_two_toilet_non_attached_female_nonac" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_non_attached_female_nonac}}" @endif class="form-control"></td>
                               <td>
                                   <select class="form-select" required name="accommods_part_two_toilet_non_attached_female_nonacrating" aria-label="Default select example">
                                    <option selected>Select</option>
                                       <option value="1"  @if(isset($accommods['accommods_part_two_toilet_non_attached_female_nonacrating']) && $accommods['accommods_part_two_toilet_non_attached_female_nonacrating'] == "1") selected @endif>Good</option>
                                       <option value="2" @if(isset($accommods['accommods_part_two_toilet_non_attached_female_nonacrating']) && $accommods['accommods_part_two_toilet_non_attached_female_nonacrating'] == "2") selected @endif >Average</option>
                                       <option value="3" @if(isset($accommods['accommods_part_two_toilet_non_attached_female_nonacrating']) && $accommods['accommods_part_two_toilet_non_attached_female_nonacrating'] == "3") selected @endif >Poor</option>
                                     </select>
                               </td>
                               <td><input type="text" required name="accommods_part_two_toilet_non_attached_remark" @if($accommods)  value="{{$accommods->accommods_part_two_toilet_non_attached_remark}}" @endif class="form-control"></td>
                           </tr>
                       </tbody>
               </table>
               <h6 class="mb-3 text-center"> 
                 *When the beds provided are 1 to 3,it is to be treated as room,otherwise it will be considered as dormitory
               </h4>
           </div>
           <!-- <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button> -->
         
       </div>
   </div>
    <!-- row 2 -->
    <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.4	Kitchen and Dining area
                       
                           
                   </h4>
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th rowspan="2" >Particulars</th>
                               <th >A/C</th>
                               <th colspan="2">Capacity/area</th>
                               <th rowspan="2">Rating</th>
                              
                              
                               <th >Non-A/C</th>
                               <th colspan="2">Capacity/area</th>
                               <th rowspan="2">Rating</th>
                               <th rowspan="2">Remark</th>
                           </tr>
                           <tr>
                               <th>Count</th>
                               <th>Male</th>
                               <th>Female</th>
                               <th>Count</th>
                               <th>Male</th>
                               <th>Female</th>
                           </tr>
                           
                       </thead>
                       <tbody  class=" align-middle">
                           <tr>
                               <td>Dining hall</td>
                             <td><input type="number"  min="0" name="kitchen_dinings_dining_hall_ac_count"  @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_ac_count}}" @endif  class="form-control"></td>
                             <td><input type="number"  min="0" name="kitchen_dinings_dining_hall_area_male" @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_area_male}}" @endif  class="form-control"></td>
                             <td><input type="number"  min="0" name="kitchen_dinings_dining_hall_area_female" @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_area_female}}" @endif  class="form-control"></td>
                             <td>
                               <select class="form-select" name="kitchen_dinings_dining_hall_rating" aria-label="Default select example">
                                <option selected>Select</option>
                                    <option value="1"  @if(isset($kichen['kitchen_dinings_dining_hall_rating']) && $kichen['kitchen_dinings_dining_hall_rating'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($kichen['kitchen_dinings_dining_hall_rating']) && $kichen['kitchen_dinings_dining_hall_rating'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($kichen['kitchen_dinings_dining_hall_rating']) && $kichen['kitchen_dinings_dining_hall_rating'] == "3") selected @endif >Good</option>
                                    <option value="4" @if(isset($kichen['kitchen_dinings_dining_hall_rating']) && $kichen['kitchen_dinings_dining_hall_rating'] == "4") selected @endif >Average</option>
                                    <option value="5" @if(isset($kichen['kitchen_dinings_dining_hall_rating']) && $kichen['kitchen_dinings_dining_hall_rating'] == "5") selected @endif >Poor</option>
                                 </select>
                           </td>
                           <td><input type="number"  min="0"name="kitchen_dinings_dining_hall_nonac_ac_count" @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_nonac_ac_count}}" @endif  class="form-control"></td>
                           <td><input type="number"  min="0"name="kitchen_dinings_dining_hall_nonac_area_male" @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_nonac_area_male}}" @endif  class="form-control"></td>
                           <td><input type="number"  min="0"name="kitchen_dinings_dining_hall_nonac_area_female" @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_nonac_area_female}}" @endif  class="form-control"></td>
                           <td>
                             <select class="form-select"  name="kitchen_dinings_dining_hall_nonac_rating" aria-label="Default select example">
                                <option selected>Select</option>
                                 <option value="1"  @if(isset($kichen['kitchen_dinings_dining_hall_nonac_rating']) && $kichen['kitchen_dinings_dining_hall_nonac_rating'] == "1") selected @endif>Very Good</option>
                                    <option value="2" @if(isset($kichen['kitchen_dinings_dining_hall_nonac_rating']) && $kichen['kitchen_dinings_dining_hall_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($kichen['kitchen_dinings_dining_hall_nonac_rating']) && $kichen['kitchen_dinings_dining_hall_nonac_rating'] == "3") selected @endif >Poor</option>
                               </select>
                         </td>
                             <td><input type="text"  name="kitchen_dinings_dining_hall_remarks" @if($kichen)  value="{{$kichen->kitchen_dinings_dining_hall_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                           <tr>
                               <td>Kitchen</td>
                               <td><input type="number"  min="0"name="kitchen_kitchen_hall_ac_count" @if($kichen)  value="{{$kichen->kitchen_kitchen_hall_ac_count}}" @endif  class="form-control"></td>
                               <td colspan="2" ><input type="text" name="kitchen_kitchen_dining_hall_area_male" @if($kichen)  value="{{$kichen->kitchen_kitchen_dining_hall_area_male}}" @endif  class="form-control"></td>
                               <!-- <td><input type="number"  min="0"name="kitchen_kitchen_dining_hall_area_female" @if($kichen)  value="{{$kichen->kitchen_kitchen_dining_hall_area_female}}" @endif  class="form-control"></td> -->
                               <td>
                                 <select class="form-select"  name="kitchen_kitchen_dining_hall_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                     <option value="1"  @if(isset($kichen['kitchen_kitchen_dining_hall_rating']) && $kichen['kitchen_kitchen_dining_hall_rating'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($kichen['kitchen_kitchen_dining_hall_rating']) && $kichen['kitchen_kitchen_dining_hall_rating'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($kichen['kitchen_kitchen_dining_hall_rating']) && $kichen['kitchen_kitchen_dining_hall_rating'] == "3") selected @endif >Good</option>
                                    <option value="4" @if(isset($kichen['kitchen_kitchen_dining_hall_rating']) && $kichen['kitchen_kitchen_dining_hall_rating'] == "3") selected @endif >Average</option>
                                    <option value="5" @if(isset($kichen['kitchen_kitchen_dining_hall_rating']) && $kichen['kitchen_kitchen_dining_hall_rating'] == "3") selected @endif >Poor</option>
                                   </select>
                             </td>
                             <td><input type="number"  min="0"name="kitchen_kitchen_dining_hall_nonac_ac_count" @if($kichen)  value="{{$kichen->kitchen_kitchen_dining_hall_nonac_ac_count}}" @endif  class="form-control"></td>
                             <td  colspan="2" ><input type="text" name="kitchen_kitchen_dining_hall_nonac_area_male" @if($kichen)  value="{{$kichen->kitchen_kitchen_dining_hall_nonac_area_male}}" @endif  class="form-control"></td>
                             <!-- <td><input type="number"  min="0" name="kitchen_kitchen_dining_hall_nonac_area_female" @if($kichen)  value="{{$kichen->kitchen_kitchen_dining_hall_nonac_area_female}}" @endif class="form-control"></td> -->
                             <td>
                               <select class="form-select"  name="kitchen_kitchen_dining_hall_nonac_rating" aria-label="Default select example">
                                <option selected>Select</option>
                                   <option value="1"  @if(isset($kichen['kitchen_kitchen_dining_hall_nonac_rating']) && $kichen['kitchen_kitchen_dining_hall_nonac_rating'] == "1") selected @endif>Good</option>
                                    <option value="2" @if(isset($kichen['kitchen_kitchen_dining_hall_nonac_rating']) && $kichen['kitchen_kitchen_dining_hall_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($kichen['kitchen_kitchen_dining_hall_nonac_rating']) && $kichen['kitchen_kitchen_dining_hall_nonac_rating'] == "3") selected @endif >Poor</option>
                                 </select>
                           </td>
                               <td><input type="text"  name="kitchen_kitchen_dining_hall_remarks" @if($kichen)  value="{{$kichen->kitchen_kitchen_dining_hall_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                           <tr>
                               <td>Store room</td>
                               <td><input type="number"  min="0"name="kitchen_store_room_hall_ac_count" @if($kichen)  value="{{$kichen->kitchen_store_room_hall_ac_count}}" @endif  class="form-control"></td>
                               <td  colspan="2"><input type="text" name="kitchen_store_room_dining_hall_area_male" @if($kichen)  value="{{$kichen->kitchen_store_room_dining_hall_area_male}}" @endif  class="form-control"></td>
                               <!-- <td><input type="number"  min="0"name="kitchen_store_room_dining_hall_area_female" @if($kichen)  value="{{$kichen->kitchen_store_room_dining_hall_area_female}}" @endif  class="form-control"></td> -->
                               <td>
                                 <select class="form-select"  name="kitchen_store_room_dining_hall_rating" aria-label="Default select example">
                                    <option selected>Select</option>
                                     <option value="1"  @if(isset($kichen['kitchen_store_room_dining_hall_rating']) && $kichen['kitchen_store_room_dining_hall_rating'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($kichen['kitchen_store_room_dining_hall_rating']) && $kichen['kitchen_store_room_dining_hall_rating'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($kichen['kitchen_store_room_dining_hall_rating']) && $kichen['kitchen_store_room_dining_hall_rating'] == "3") selected @endif >Good</option>
                                    <option value="4" @if(isset($kichen['kitchen_store_room_dining_hall_rating']) && $kichen['kitchen_store_room_dining_hall_rating'] == "4") selected @endif >Average</option>
                                    <option value="5" @if(isset($kichen['kitchen_store_room_dining_hall_rating']) && $kichen['kitchen_store_room_dining_hall_rating'] == "5") selected @endif >Poor</option>
                                   </select>
                             </td>
                             <td><input type="number"   min="0"name="kitchen_store_room_dining_hall_nonac_ac_count" @if($kichen)  value="{{$kichen->kitchen_store_room_dining_hall_nonac_ac_count}}" @endif  class="form-control"></td>
                             <td colspan="2"><input type="text"   name="kitchen_store_room_dining_hall_nonac_area_male" @if($kichen)  value="{{$kichen->kitchen_store_room_dining_hall_nonac_area_male}}" @endif  class="form-control"></td>
                             <!-- <td><input type="number"  min="0"name="kitchen_store_room_dining_hall_nonac_area_female" @if($kichen)  value="{{$kichen->kitchen_store_room_dining_hall_nonac_area_female}}" @endif  class="form-control"></td> -->
                             <td>
                               <select class="form-select"  name="kitchen_store_room_dining_hall_nonac_rating" aria-label="Default select example">
                                <option selected>Select</option>
                                   <option value="1"  @if(isset($kichen['kitchen_store_room_dining_hall_nonac_rating']) && $kichen['kitchen_store_room_dining_hall_nonac_rating'] == "1") selected @endif>Good</option>
                                    <option value="2" @if(isset($kichen['kitchen_store_room_dining_hall_nonac_rating']) && $kichen['kitchen_store_room_dining_hall_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($kichen['kitchen_store_room_dining_hall_nonac_rating']) && $kichen['kitchen_store_room_dining_hall_nonac_rating'] == "3") selected @endif >Poor</option>
                                 </select>
                           </td>
                               <td><input type="text"  name="kitchen_store_room_dining_hall_remarks" @if($kichen)  value="{{$kichen->kitchen_store_room_dining_hall_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                          
                       </tbody>
               </table>
           </div>
           <!-- <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button> -->
         
       </div>
   </div>

    <!-- row 3 -->
    <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.5	Other facilities
                       
                           
                   </h4>
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                   <thead class="text-center align-middle">
                       <tr>
                           <th rowspan="2" >Particulars</th>
                           <th >A/C</th>
                           <th colspan="2">Capacity/area</th>
                           <th rowspan="2">Rating</th>
                          
                          
                           <th >Non-A/C</th>
                           <th colspan="2">Capacity/area</th>
                           <th rowspan="2">Rating</th>
                           <th rowspan="2">Remark</th>
                       </tr>
                       <tr>
                           <th>Count</th>
                           <th>Male</th>
                           <th>Female</th>
                           <th>Count</th>
                           <th>Male</th>
                           <th>Female</th>
                       </tr>
                       
                   </thead>
                       <tbody  class=" align-middle">
                           <tr>
                               <td>Guest room</td>
                               <td><input type="number"  min="0" name="facilities_guest_room_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_ac_count}}" @endif  class="form-control"></td>
                               <td><input type="number"  min="0" name="facilities_guest_room_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_area_male}}" @endif  class="form-control"></td>
                               <td><input type="number"  min="0" name="facilities_guest_room_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_area_female}}" @endif  class="form-control"></td>
                               <td>
                                 <select class="form-select"  name="facilities_guest_room_rating"  aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1"  @if(isset($other_facilities['facilities_guest_room_rating']) && $other_facilities['facilities_guest_room_rating'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($other_facilities['facilities_guest_room_rating']) && $other_facilities['facilities_guest_room_rating'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($other_facilities['facilities_guest_room_rating']) && $other_facilities['facilities_guest_room_rating'] == "3") selected @endif >Good</option>
                                    <option value="4" @if(isset($other_facilities['facilities_guest_room_rating']) && $other_facilities['facilities_guest_room_rating'] == "4") selected @endif >Average</option>
                                    <option value="5" @if(isset($other_facilities['facilities_guest_room_rating']) && $other_facilities['facilities_guest_room_rating'] == "5") selected @endif >Poor</option>
                                   </select>
                             </td>
                             <td><input type="number"   min="0" name="facilities_guest_room_nonac_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_nonac_ac_count}}" @endif  class="form-control"></td>
                             <td><input type="number"   min="0" name="facilities_guest_room_nonac_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_nonac_area_male}}" @endif  class="form-control"></td>
                             <td><input type="number"   min="0" name="facilities_guest_room_nonac_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_nonac_area_female}}" @endif  class="form-control"></td>
                             <td>
                               <select class="form-select"  name="facilities_guest_room_nonac_rating"  aria-label="Default select example">
                                <option selected>Select</option>
                                   <option value="1"  @if(isset($other_facilities['facilities_guest_room_nonac_rating']) && $other_facilities['facilities_guest_room_nonac_rating'] == "1") selected @endif>Good</option>
                                    <option value="2" @if(isset($other_facilities['facilities_guest_room_nonac_rating']) && $other_facilities['facilities_guest_room_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($other_facilities['facilities_guest_room_nonac_rating']) && $other_facilities['facilities_guest_room_nonac_rating'] == "3") selected @endif >Poor</option>
                                 </select>
                           </td>
                               <td><input type="text"  name="facilities_guest_room_remarks" @if($other_facilities)  value="{{$other_facilities->facilities_guest_room_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                           <tr>
                               <td>Recreation hall</td>
                               <td><input type="number"  min="0" name="facilities_recreation_hall_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_ac_count}}" @endif  class="form-control"></td>
                               <td><input type="number"  min="0" name="facilities_recreation_hall_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_area_male}}" @endif  class="form-control"></td>
                               <td><input type="number"  min="0" name="facilities_recreation_hall_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_area_female}}" @endif  class="form-control"></td>
                               <td>
                                 <select class="form-select"  name="facilities_recreation_hall_rating"  aria-label="Default select example">
                                    <option selected>Select</option>
										<option value="1"  @if(isset($other_facilities['facilities_recreation_hall_rating']) && $other_facilities['facilities_recreation_hall_rating'] == "1") selected @endif>Excellent</option>
										<option value="2" @if(isset($other_facilities['facilities_recreation_hall_rating']) && $other_facilities['facilities_recreation_hall_rating'] == "2") selected @endif >Very Good</option>
										<option value="3" @if(isset($other_facilities['facilities_recreation_hall_rating']) && $other_facilities['facilities_recreation_hall_rating'] == "3") selected @endif >Good</option>
										<option value="4" @if(isset($other_facilities['facilities_recreation_hall_rating']) && $other_facilities['facilities_recreation_hall_rating'] == "4") selected @endif >Average</option>
										<option value="5" @if(isset($other_facilities['facilities_recreation_hall_rating']) && $other_facilities['facilities_recreation_hall_rating'] == "5") selected @endif >Poor</option>
									   </select>

                             </td>
                             <td><input type="number"  min="0" name="facilities_recreation_hall_nonac_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_nonac_ac_count}}" @endif  class="form-control"></td>
                             <td><input type="number"  min="0" name="facilities_recreation_hall_nonac_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_nonac_area_male}}" @endif  class="form-control"></td>
                             <td><input type="number"  min="0" name="facilities_recreation_hall_nonac_area_female"  @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_nonac_area_female}}" @endif class="form-control"></td>
                             <td>
                               <select class="form-select"  name="facilities_recreation_hall_nonac_rating"  aria-label="Default select example">
                                <option selected>Select</option>
                                   <option value="1"  @if(isset($other_facilities['facilities_recreation_hall_nonac_rating']) && $other_facilities['facilities_recreation_hall_nonac_rating'] == "1") selected @endif>Good</option>
                                    <option value="2" @if(isset($other_facilities['facilities_recreation_hall_nonac_rating']) && $other_facilities['facilities_recreation_hall_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($other_facilities['facilities_recreation_hall_nonac_rating']) && $other_facilities['facilities_recreation_hall_nonac_rating'] == "3") selected @endif >Poor</option>
                                 </select>
                           </td>
                               <td><input type="text"   name="facilities_recreation_hall_remarks" @if($other_facilities)  value="{{$other_facilities->facilities_recreation_hall_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                           <tr>
                               <td>Study room</td>
                               <td><input type="number"  min="0" name="facilities_store_room_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_ac_count}}" @endif  class="form-control"></td>
                               <td><input type="number"  min="0" name="facilities_store_room_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_area_male}}" @endif  class="form-control"></td>
                               <td><input type="number"  min="0" name="facilities_store_room_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_area_female}}" @endif  class="form-control"></td>
                               <td>
                                 <select class="form-select"  name="facilities_store_room_rating"  aria-label="Default select example">
                                    <option selected>Select</option>
                                     <option value="1"  @if(isset($other_facilities['facilities_store_room_rating']) && $other_facilities['facilities_store_room_rating'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($other_facilities['facilities_store_room_rating']) && $other_facilities['facilities_store_room_rating'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($other_facilities['facilities_store_room_rating']) && $other_facilities['facilities_store_room_rating'] == "3") selected @endif >Good</option>
                                    <option value="3" @if(isset($other_facilities['facilities_store_room_rating']) && $other_facilities['facilities_store_room_rating'] == "4") selected @endif >Average</option>
                                    <option value="3" @if(isset($other_facilities['facilities_store_room_rating']) && $other_facilities['facilities_store_room_rating'] == "5") selected @endif >Poor</option>
                                   </select>
                             </td>
                             <td><input type="number"  min="0" name="facilities_store_room_nonac_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_nonac_ac_count}}" @endif  class="form-control"></td>
                             <td><input type="number"  min="0" name="facilities_store_room_nonac_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_nonac_area_male}}" @endif  class="form-control"></td>
                             <td><input type="number"  min="0" name="facilities_store_room_nonac_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_nonac_area_female}}" @endif  class="form-control"></td>
                             <td>
                               <select class="form-select"  name="facilities_store_room_nonac_rating"  aria-label="Default select example">
                                <option selected>Select</option>
                                   <option value="1"  @if(isset($other_facilities['facilities_store_room_nonac_rating']) && $other_facilities['facilities_store_room_nonac_rating'] == "1") selected @endif>Good</option>
                                    <option value="2" @if(isset($other_facilities['facilities_store_room_nonac_rating']) && $other_facilities['facilities_store_room_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($other_facilities['facilities_store_room_nonac_rating']) && $other_facilities['facilities_store_room_nonac_rating'] == "3") selected @endif >Poor</option>
                                 </select>
                           </td>
                               <td><input type="text"  name="facilities_store_room_remarks" @if($other_facilities)  value="{{$other_facilities->facilities_store_room_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                           <tr>
                               <td>library</td>
                               <td><input type="number"  min="0" name="facilities_library_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_library_ac_count}}" @endif  class="form-control"></td>
                               <td colspan="2"><input type="text" name="facilities_library_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_library_area_male}}" @endif  class="form-control"></td>
                               <!-- <td><input type="number"  min="0" name="facilities_library_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_library_area_female}}" @endif  class="form-control"></td> -->
                               <td>
                                 <select class="form-select"  name="facilities_library_rating"  aria-label="Default select example">
                                    <option selected>Select</option>
                                     <option value="1"  @if(isset($other_facilities['facilities_library_rating']) && $other_facilities['facilities_library_rating'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($other_facilities['facilities_library_rating']) && $other_facilities['facilities_library_rating'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($other_facilities['facilities_library_rating']) && $other_facilities['facilities_library_rating'] == "3") selected @endif >Good</option>
                                    <option value="3" @if(isset($other_facilities['facilities_library_rating']) && $other_facilities['facilities_library_rating'] == "3") selected @endif >Average</option>
                                    <option value="3" @if(isset($other_facilities['facilities_library_rating']) && $other_facilities['facilities_library_rating'] == "3") selected @endif >Poor</option>
                                   </select>
                             </td>
                             <td ><input type="number"  min="0" name="facilities_library_nonac_ac_count" @if($other_facilities)  value="{{$other_facilities->facilities_library_nonac_ac_count}}" @endif  class="form-control"></td>
                             <td colspan="2"><input type="text" name="facilities_library_nonac_area_male" @if($other_facilities)  value="{{$other_facilities->facilities_library_nonac_area_male}}" @endif  class="form-control"></td>
                             <!-- <td><input type="number"  min="0" name="facilities_library_nonac_area_female" @if($other_facilities)  value="{{$other_facilities->facilities_library_nonac_area_female}}" @endif  class="form-control"></td> -->
                             <td>
                               <select class="form-select"  name="facilities_library_nonac_rating"  aria-label="Default select example">
                                <option selected>Select</option>
                                   <option value="1"  @if(isset($other_facilities['facilities_library_nonac_rating']) && $other_facilities['facilities_library_nonac_rating'] == "1") selected @endif>Good</option>
                                    <option value="2" @if(isset($other_facilities['facilities_library_nonac_rating']) && $other_facilities['facilities_library_nonac_rating'] == "2") selected @endif >Average</option>
                                    <option value="3" @if(isset($other_facilities['facilities_library_nonac_rating']) && $other_facilities['facilities_library_nonac_rating'] == "3") selected @endif >Poor</option>
                                 </select>
                           </td>
                               <td><input type="text"  name="facilities_library_remarks" @if($other_facilities)  value="{{$other_facilities->facilities_library_remarks}}" @endif  class="form-control"></td>
                              
                           </tr>
                          
                       </tbody>
               </table>
           </div>
           <!-- <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button> -->
         
       </div>
   </div>

     <!-- row 4 -->
     <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.6	Field of play  
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto part_two_field_of_play_add">Add+</button> <br/>
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th>Discipline</th>
                               <th>No. of FOP</th>
                               <th>Specify type of FOP (Indoor/Outdoor)</th>
                               <th>Surface (Synthetic,Wooden,Grass etc.)</th>                              
                               <th>Rating</th>
                               <th>Remark</th>
                               <th>Action</th>
                           </tr>
                          
                           
                       </thead>
                       <tbody  class="align-middle" id="two_part_two_play_field_body">
                       
                        @if($part_two_play_field_count->count() > 0)
                        @foreach ($part_two_play_field_count as $part_two_play_key => $part_two_play_value)
                           <tr>
                               <td>
                                <input type="hidden" class="center_id" name="part_two_play_field[{{ $part_two_play_key }}][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="part_two_play_field[{{ $part_two_play_key }}][id]" value="{{ $part_two_play_value->id ?? '' }}">
                                    <select class="form-select" aria-label="Default select example"  name='part_two_play_field[{{ $part_two_play_key }}][discline_play_field]'>
                                        @foreach ($dis_list as $item)
                                            <option  value="{{$item->discipline_id}}" @if($part_two_play_value->discline_play_field == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                        @endforeach
                                    </select>
                               </td>

                             <td><input type="text"  class="form-control" name='part_two_play_field[{{ $part_two_play_key }}][no_fop_play_field]' value="{{ $part_two_play_value->no_fop_play_field ?? '' }}"></td>
                             <td>
                                    <select class="form-select"  aria-label="Default select example" name='part_two_play_field[{{ $part_two_play_key }}][fop_play_field]'>
                                    <option selected>Select</option>
                                        <option value="1" {{ 1 == $part_two_play_value->fop_play_field ? 'selected' : 'disabled'}}>Indoor</option>
                                        <option value="2" {{ 2 == $part_two_play_value->fop_play_field ? 'selected' : 'disabled'}}>Outdoor</option>
                                        {{-- <option value="3" {{ 3 == $part_two_play_value->fop_play_field ? 'selected' : 'disabled'}}>Three</option> --}}
                                    </select>
                               </td>
                             
                            <!-- <td><input type="text"  class="form-control" name='part_two_play_field[{{ $part_two_play_key }}][fop_surface_play_field]' value="{{ $part_two_play_value->fop_surface_play_field ?? '' }}"></td>                     -->
                              
								    <td>
                                <select class="form-select"  name='part_two_play_field[{{ $part_two_play_key }}][fop_surface_play_field]'  aria-label="Default select example">
                                     <option selected>Select</option>
                                    <option value="1"  @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "1") selected @endif>Synthetic</option>
                                    <option value="2" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "2") selected @endif >Wooden</option>
                                    <option value="3" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "3") selected @endif >Grass</option>
                                    <option value="4" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "4") selected @endif >Cement</option>
                                    <option value="5" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "5") selected @endif >Cinder</option>
                                    <option value="6" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "6") selected @endif >Clay</option>
                                    <option value="7" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "7") selected @endif >Natural</option>
                                    <option value="8" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "8") selected @endif >Artificial Turf</option>
                                    <option value="9" @if(isset($part_two_play_value['fop_surface_play_field']) && $part_two_play_value['fop_surface_play_field'] == "9") selected @endif >Others</option>
                                   </select>
                                </td>
                            <td><select class="form-select"  name='part_two_play_field[{{ $part_two_play_key }}][rating_play_field]'  aria-label="Default select example">
                                     <option selected>Select</option>
                                    <option value="1"  @if(isset($part_two_play_value['rating_play_field']) && $part_two_play_value['rating_play_field'] == "1") selected @endif>Excellent</option>
                                    <option value="2" @if(isset($part_two_play_value['rating_play_field']) && $part_two_play_value['rating_play_field'] == "2") selected @endif >Very Good</option>
                                    <option value="3" @if(isset($part_two_play_value['rating_play_field']) && $part_two_play_value['rating_play_field'] == "3") selected @endif >Good</option>
                                    <option value="4" @if(isset($part_two_play_value['rating_play_field']) && $part_two_play_value['rating_play_field'] == "4") selected @endif >Average</option>
                                    <option value="5" @if(isset($part_two_play_value['rating_play_field']) && $part_two_play_value['rating_play_field'] == "5") selected @endif >Poor</option>
                                   </select></td>
                                   <td><input type="text"  class="form-control" name='part_two_play_field[{{ $part_two_play_key }}][remark_play_field]' value="{{ $part_two_play_value->remark_play_field ?? '' }}"></td>
                             <td>
                                <a href="javascript:void(0)" class="actionbtn remove_two_play_field_remove" data-id_enc="{{$id}}" data-id11="{{ $part_two_play_key }}" data-db_id11="{{ $part_two_play_value->id ?? '' }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                             
                           </tr>
                           @endforeach

                           @else
                           <tr>
                            <td>
                                <input type="hidden" class="center_id" name="part_two_play_field[0][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="part_two_play_field[0][id]" value="">
                                 <select class="form-select" aria-label="Default select example" name='part_two_play_field[0][discline_play_field]'>
                                    @foreach ($dis_list as $item)
                                            <option  value="{{$item->discipline_id}}">{{$item ->discipline}}</option>
                                    @endforeach
                                 </select>
                            </td>
                          <td><input type="number"  min="0" class="form-control" name='part_two_play_field[0][no_fop_play_field]' ></td>
                          <td>
                            <select class="form-select"  aria-label="Default select example" name='part_two_play_field[0][fop_play_field]'>
                                <option value="1">Indoor</option>
                                <option value="2">Outdoor</option>  
                            </select>
                        </td>
                        <td><input type="text" class="form-control"  name='part_two_play_field[0][fop_surface_play_field]' ></td>
                        <td> <select class="form-select" name='part_two_play_field[0][rating_play_field]'  aria-label="Default select example">
                                     <option selected>Select</option>
                                    <option value="1" >Excellent</option>
                                    <option value="2" >Very Good</option>
                                    <option value="3" >Good</option>
                                    <option value="4" >Average</option>
                                    <option value="5" >Poor</option>
                                   </select></td>
                        <td><input type="text" class="form-control" name='part_two_play_field[0][remark_play_field]' ></td>
                          <td>
                            <a href="javascript:void(0)" class="actionbtn remove_two_part_two_equipment" data-id11="0" data-db_id11="0">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                         </td>
                          
                        </tr>
                    @endif
                          
                       </tbody>
               </table>
           </div>
           
         
       </div>
   </div>
   <!-- row 5 -->
   <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.7	Sports Equipment (Non-consumable)
                       
                           
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto part_two_add_sport_equipment">Add+</button><br/>
                   <h6 class="mb-3"> 
                      (Name of Equipment need to be given.General observation on the requirement to be recorded)
                   </h6>
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th >Discipline</th>
                               <th >Sufficient/Insufficient</th>
                               <th >Remark</th>
                               <th >Action</th>
                               
                           </tr>  
                       </thead>

                        <tbody  class=" align-middle two_part_euipment_body">
                        @if($sport_quipment->count() > 0)
                                    @foreach ($sport_quipment as $sport_quipment_key => $sport_quipment_value)
                           <tr>
                               <td>
                                <input type="hidden" class="center_id" name="two_part_two_equipment[{{ $sport_quipment_key }}][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="two_part_two_equipment[{{ $sport_quipment_key }}][id]" value="{{ $sport_quipment_value->id ?? '' }}">


                               <select class="form-select"  aria-label="Default select example" name='two_part_two_equipment[{{ $sport_quipment_key }}][equipment_discipline]'>
                                    @foreach ($dis_list as $item)
                                        <option  value="{{$item->discipline_id}}" @if($sport_quipment_value->equipment_discipline == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                    @endforeach
                                </select>
                               </td>
                               <td>
                                   <select class="form-select"  aria-label="Default select example"  name='two_part_two_equipment[{{ $sport_quipment_key }}][equipment_suficient]' aria-label="Default select example">
                                       
                                       <option value="1" {{ 1 == $sport_quipment_value->equipment_suficient ? 'selected' : 'disabled' }}>Sufficient</option>
                                       <option value="2" {{ 2 == $sport_quipment_value->equipment_suficient ? 'selected' : 'disabled' }} >Insufficient</option>
                                     </select>
                               </td>
                               <td><input type="text" class="form-control" name='two_part_two_equipment[{{ $sport_quipment_key }}][equipment_remark]' value="{{ $sport_quipment_value->equipment_remark ?? '' }}"></td>
                               <td>
                                <a href="javascript:void(0)" class="actionbtn remove_two_part_two_equipment" data-id10="{{ $sport_quipment_key }}" data-db_id10="{{ $sport_quipment_value->id ?? '' }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                               </td>
                            
                           </tr> 
                           @endforeach
                           @else
                           <tr>
                            <td>
                                <input type="hidden" class="center_id" name="two_part_two_equipment[0][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="two_part_two_equipment[0][id]" value="">

                                <select class="form-select"  name="two_part_two_equipment[0][equipment_discipline]" aria-label="Default select example">
                                        @foreach ($dis_list as $item)
                                            <option  value="{{$item->discipline_id}}">{{$item ->discipline}}</option>
                                        @endforeach
                                  </select>
                            </td>
                            <td>
                                <select class="form-select"  name="two_part_two_equipment[0][equipment_suficient]" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1">Sufficient</option>
                                    <option value="2">Insufficient</option>
                                  </select>
                            </td>
                         
                          <td><input type="text"  name="two_part_two_equipment[0][equipment_remark]" class="form-control"></td>
                          <td>
                            <a href="javascript:void(0)" class="actionbtn remove_two_part_two_equipment" data-id10="0" data-db_id10="0">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                        </tr> 
                           
                           @endif
                       </tbody>
               </table>
           </div> 
       </div>
   </div>
  

   <!-- row 6 -->
   <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">              
                <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.8	Sports Equipment (Consumable)
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto part_two_add_sport_equipment_consumable">Add+</button></br>
                   <h6 class="mb-3"> 
                      (Name of Equipment need to be given.General observation on the requirement to be recorded)
                   </h6>
                    <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th  >Discipline</th>
                               <th >Sufficient/Insufficient</th>
                               <th >Remark</th>
                               <th >Action</th>                              
                           </tr>
                       </thead>
                        <tbody  class=" align-middle two_part_euipment_consumable_body">
                            @if($sport_quipment_consumable->count() > 0)                    
                                @foreach ($sport_quipment_consumable as $sport_quipment_consumable_key => $sport_quipment_consumable_value)
                                    <tr>
                                        <td>
                                            <input type="hidden" class="center_id" name="two_part_two_equipment_consumable[{{ $sport_quipment_consumable_key }}][center_id]" value="{{ $id ?? '' }}">
                                            <input type="hidden" name="two_part_two_equipment_consumable[{{ $sport_quipment_consumable_key }}][id]" value="{{ $sport_quipment_consumable_value->id ?? '' }}">

                                            <select class="form-select"  aria-label="Default select example" name='two_part_two_equipment_consumable[{{ $sport_quipment_consumable_key }}][equipment_discipline]'>
                                                @foreach ($dis_list as $item)
                                                    <option  value="{{$item->discipline_id}}" @if($sport_quipment_consumable_value->equipment_discipline == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select"  aria-label="Default select example"  name='two_part_two_equipment_consumable[{{ $sport_quipment_consumable_key }}][equipment_suficient]' aria-label="Default select example">
                                                <option selected>Select</option>
                                                <option value="1" {{ 1 == $sport_quipment_consumable_value->equipment_suficient ? 'selected' : 'disabled' }}>Sufficient</option>
                                                <option value="2" {{ 2 == $sport_quipment_consumable_value->equipment_suficient ? 'selected' : 'disabled' }} >Insufficient</option>
                                                </select>
                                        </td>
                                        <td><input type="text" class="form-control" name='two_part_two_equipment_consumable[{{ $sport_quipment_consumable_key }}][equipment_remark]' value="{{ $sport_quipment_consumable_value->equipment_remark ?? '' }}"></td>                            
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_equipment" data-id9="{{ $sport_quipment_consumable_key }}" data-db_id9="{{ $sport_quipment_consumable_value->id ?? '' }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr> 
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <input type="hidden" class="center_id" name="two_part_two_equipment_consumable[0][center_id]" value="{{ $id ?? '' }}">
                                        <input type="hidden" name="two_part_two_equipment_consumable[0][id]" value="">
                                        <select class="form-select"  name="two_part_two_equipment_consumable[0][equipment_discipline]" aria-label="Default select example">
                                            @foreach ($dis_list as $item)
                                                <option  value="{{$item->discipline_id}}">{{$item ->discipline}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select"  name="two_part_two_equipment_consumable[0][equipment_suficient]" aria-label="Default select example">
                                            <option selected>Select</option>
                                            <option value="1">Sufficient</option>
                                            <option value="2">Insufficient</option>
                                        </select>
                                    </td>
                                
                                    <td><input type="text"  name="two_part_two_equipment_consumable[0][equipment_remark]" class="form-control"></td>
                                    <td>
                                        <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_equipment" data-id9="0" data-db_id9="0">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>                            
                            @endif
                        </tbody>
                </table>
           </div>
           
         
       </div>
   </div>

    <!-- row 7 -->
    <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.9	Sports Science Equipment
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto part_two_sport_science">Add+</button><br/>                   
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th>Discipline</th>
                               <th>Consumable</th>
                               <th>Non-consumable</th>
                               <th>Remark</th>
                               <th>Action</th>                               
                           </tr>
                       </thead>
                       <tbody  class=" align-middle part_two_sport_equipment">
                        @if($sport_quipment_science->count() > 0)
                                    @foreach ($sport_quipment_science as $sport_quipment_science_key => $sport_quipment_science_value)
                           <tr>
                               <td>
                                <input type="hidden" class="center_id" name="two_part_two_sport_science[{{ $sport_quipment_science_key }}][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="two_part_two_sport_science[{{ $sport_quipment_science_key }}][id]" value="{{ $sport_quipment_science_value->id ?? ''}}">
                                <select class="form-select two_part_two_athletes_athletes_no_athletes_participated_0"  aria-label="Default select example" name='two_part_two_sport_science[0][athletes_discipline]'>
                                    @foreach ($dis_list as $item)
                                        <option  value="{{$item->discipline_id}}" @if($sport_quipment_science_value->athletes_discipline == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                    @endforeach
                                </select>
                                {{-- <select class="form-select"  aria-label="Default select example" name="two_part_two_sport_science[{{ $sport_quipment_consumable_key }}][science_discipline]">
                                    <option value="">Select</option>
                                    <option value="1" {{ 1 == $sport_quipment_science_value->science_discipline ? 'selected' : 'disabled'}}>One</option>
                                    <option value="2" {{ 2 == $sport_quipment_science_value->science_discipline ? 'selected' : 'disabled'}}>Two</option>
                                    <option value="3" {{ 3 == $sport_quipment_science_value->science_discipline ? 'selected' : 'disabled'}}>Three</option>
                                </select> --}}
                               </td>
                               <td>
                                <select class="form-select"  aria-label="Default select example"  name='two_part_two_sport_science[{{ $sport_quipment_science_key }}][sport_consumable]' aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1" {{ 1 == $sport_quipment_science_value->sport_consumable ? 'selected' : 'disabled' }}>Sufficient</option>
                                    <option value="2" {{ 2 == $sport_quipment_science_value->sport_consumable ? 'selected' : 'disabled' }} >Insufficient</option>
                                  </select>
                               </td>
                               <td>
                                <select class="form-select"  aria-label="Default select example"  name='two_part_two_sport_science[{{ $sport_quipment_science_key }}][sport_non_consumable]' aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1" {{ 1 == $sport_quipment_science_value->sport_non_consumable ? 'selected' : 'disabled' }}>Sufficient</option>
                                    <option value="2" {{ 2 == $sport_quipment_science_value->sport_non_consumable ? 'selected' : 'disabled' }} >Insufficient</option>
                                  </select>
                               </td>
                               <td>
                                    <input type="text" class="form-control" name='two_part_two_sport_science[{{ $sport_quipment_science_key }}][science_remark]' value="{{ $sport_quipment_science_value->science_remark ?? '' }}">
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_science_equipment" data-id8="{{ $sport_quipment_science_key }}" data-db_id8="{{ $sport_quipment_science_value->id ?? ''}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                           </tr>
                           @endforeach
                           @else                           
                           <tr>
                            <td>
                                <input type="hidden" class="center_id" name="two_part_two_sport_science[0][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="two_part_two_sport_science[0][id]" value="">
                                    <select class="form-select" name="two_part_two_sport_science[0][science_discipline]" aria-label="Default select example">
                                        @foreach ($dis_list as $item)
                                            <option  value="{{$item->discipline_id}}">{{$item ->discipline}}</option>
                                        @endforeach
                                    </select>
                            </td>
                            <td>
                             <select class="form-select"  name="two_part_two_sport_science[0][sport_consumable]"  aria-label="Default select example">
                                 <option selected>Select</option>
                                 <option value="1">Sufficient</option>
                                 <option value="2">Insufficient</option>
                               </select>
                            </td>
                            <td>
                             <select class="form-select"  name="two_part_two_sport_science[0][sport_non_consumable]" aria-label="Default select example">
                                 <option selected>Select</option>
                                 <option value="1">Sufficient</option>
                                 <option value="2">Insufficient</option>
                               </select>
                            </td>                          
                            <td><input type="text" name="two_part_two_sport_science[0][science_remark]" class="form-control"></td>
                            <td>
                                <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_science_equipment" data-id8="0" data-db_id8="0">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        @endif                          
                       </tbody>
               </table>
           </div>
           
         
       </div>
   </div>


    <!-- row 8 -->
    <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.10	Administrative and Support Staff
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto add_add_staff_button ">Add+</button><br/>
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th  >Designation</th>
                               <th >2018-19</th>
                               <th >2019-20</th>
                               <th >2020-21</th>
                               <th >2021-22</th>
                               <th >2022-23</th>
                               <th >Action</th>
                           </tr>
                       </thead>
                       {{-- {{ dd($add_staff_add) }} --}}
                       <tbody  class="align-middle add_add_staff_body">
                        @if($add_staff_add->count() > 0)
                        @foreach ($add_staff_add as $sport_quipment_consumable_key => $sport_quipment_consumable_value)
                        <tr>
                            <td>
                                <input type="hidden" class="center_id" name="administrative_supports[0][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="administrative_supports[{{ $sport_quipment_consumable_key }}][id]" value="{{ $sport_quipment_consumable_value->id }}">
                                {{-- <input type="number" min="0" class="form-control" name="administrative_supports[0][ssd_designation]"> --}}
                                <input type="text" class="form-control" name='administrative_supports[{{ $sport_quipment_consumable_key }}][ssd_designation]' value="{{ $sport_quipment_consumable_value->ssd_designation ?? '' }}">
                            </td>
                            <td>
                                {{-- <input type="text" class="form-control" name="administrative_supports[0][ssd_2018_19]"> --}}
                                <input type="number" min="0" class="form-control" name='administrative_supports[{{ $sport_quipment_consumable_key }}][ssd_2018_19]' value="{{ $sport_quipment_consumable_value->ssd_2018_19 ?? '' }}">
                            </td>
                            <td>
                                {{-- <input type="text" class="form-control" name="administrative_supports[0][ssd_2019_20]"> --}}
                                <input type="number" min="0" class="form-control" name='administrative_supports[{{ $sport_quipment_consumable_key }}][ssd_2019_20]' value="{{ $sport_quipment_consumable_value->ssd_2019_20 ?? '' }}">
                            </td>
                            <td>
                                {{-- <input type="text" class="form-control" name="administrative_supports[0][ssd_2020_21]"> --}}
                                <input type="number" min="0" class="form-control" name='administrative_supports[{{ $sport_quipment_consumable_key }}][ssd_2020_21]' value="{{ $sport_quipment_consumable_value->ssd_2020_21 ?? '' }}">
                            </td>
                            <td>
                                {{-- <input type="text" class="form-control" name="administrative_supports[0][ssd_2021_22]"> --}}
                                <input type="number" min="0" class="form-control" name='administrative_supports[{{ $sport_quipment_consumable_key }}][ssd_2021_22]' value="{{ $sport_quipment_consumable_value->ssd_2021_22 ?? '' }}">
                            </td>
                            <td>
                                {{-- <input type="text" class="form-control" name="administrative_supports[0][ssd_2022_23]"> --}}
                                <input type="number" min="0" class="form-control" name='administrative_supports[{{ $sport_quipment_consumable_key }}][ssd_2022_23]' value="{{ $sport_quipment_consumable_value->ssd_2022_23 ?? '' }}">
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="actionbtn remove_two_part_administrative_supports" data-id7="{{ $sport_quipment_consumable_key }}" data-db_id7="{{ $sport_quipment_consumable_value->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>
                                <input type="hidden" class="center_id" name="administrative_supports[0][center_id]" value="{{ $id ?? '' }}">
                                <input type="hidden" name="administrative_supports[0][id]" value="">
                                <input type="text" class="form-control" name="administrative_supports[0][ssd_designation]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="administrative_supports[0][ssd_2018_19]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="administrative_supports[0][ssd_2019_20]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="administrative_supports[0][ssd_2020_21]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="administrative_supports[0][ssd_2021_22]">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="administrative_supports[0][ssd_2022_23]">
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="actionbtn remove_two_part_administrative_supports" data-id7="0" data-db_id7="0">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                           
                          
                       </tbody>
               </table>
           </div>
          
         
       </div>
   </div>

     <!-- row 9 -->
     <div class="row py-3">
      
      
      
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
       <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.11	Sport Science Staff(including Doctor,physiotherapist and masseur)
                       
                           
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto add_more_sport_science_staff_doctor">Add+</button></br>
                   
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th>Designation</th>
                               <th>2018-19</th>
                               <th >2019-20</th>
                               <th >2020-21</th>
                               <th >2021-22</th>
                               <th >2022-23</th>
                               <th >Action</th>
                           </tr>
                       </thead>
                       <tbody id="two_part_sport_science_staff_doctor_container" class=" align-middle">
                        {{-- sportsciencestaffdoctor --}}
                        @if($sportsciencestaffdoctor->count() > 0)
                            @foreach ($sportsciencestaffdoctor as $sportsciencestaffdoctor_key => $sportsciencestaffdoctor_value)
                                <tr>
                                    <td>
                                        <input type="hidden" class="center_id" name="sport_science_staff_doctor[0][center_id]" value="{{ $id ?? '' }}">
                                            <input type="hidden" name="sport_science_staff_doctor[0][id]" value="{{ $sportsciencestaffdoctor_value->id }}">
                                        <input type="text" class="form-control" name="sport_science_staff_doctor[{{ $sportsciencestaffdoctor_key }}][ssd_designation]" value="{{ $sportsciencestaffdoctor_value->ssd_designation }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[{{ $sportsciencestaffdoctor_key }}][ssd_2018_19]" value="{{ $sportsciencestaffdoctor_value->ssd_2018_19 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[{{ $sportsciencestaffdoctor_key }}][ssd_2019_20]" value="{{ $sportsciencestaffdoctor_value->ssd_2019_20 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[{{ $sportsciencestaffdoctor_key }}][ssd_2020_21]" value="{{ $sportsciencestaffdoctor_value->ssd_2020_21 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[{{ $sportsciencestaffdoctor_key }}][ssd_2021_22]" value="{{ $sportsciencestaffdoctor_value->ssd_2021_22 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[{{ $sportsciencestaffdoctor_key }}][ssd_2022_23]" value="{{ $sportsciencestaffdoctor_value->ssd_2022_23 }}">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="actionbtn remove_two_part_sport_science_staff_doctor" data-id5="{{ $sportsciencestaffdoctor_key }}" data-db_id5="{{ $sportsciencestaffdoctor_value->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="hidden" class="center_id" name="sport_science_staff_doctor[0][center_id]" value="{{ $id ?? '' }}">
                                        <input type="hidden" name="sport_science_staff_doctor[0][id]" value="">
                                    <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[0][ssd_designation]">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[0][ssd_2018_19]">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[0][ssd_2019_20]">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[0][ssd_2020_21]">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[0][ssd_2021_22]">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[0][ssd_2022_23]">
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="actionbtn remove_two_part_sport_science_staff_doctor" data-id5="0" data-db_id5="0">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif   
                          
                       </tbody>
               </table>
           </div>
           
         
       </div>
   </div>

   <!-- row 10 -->
   <div class="row py-3">
    <div class="row py-3">
        <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
        <div class="col-12">
            <div class="table-responsive">
 
                <table class="table table-bordered">
                    <h4 class="mb-3">
                        2.12 Mess Staff(including nutritionist and chef)
 
 
                    </h4>
                    <button type="button" class="btn btn-primary d-block ms-auto add_more_two_part_staff_nutritionist_chef">Add+</button></br>
 
                    <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                     <thead class="text-center align-middle">
                         <tr>
                             <th>Designation</th>
                             <th>2018-19</th>
                             <th>2019-20</th>
                             <th>2020-21</th>
                             <th>2021-22</th>
                             <th>2022-23</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody id="two_part_staff_nutritionist_chef_container" class="align-middle">
                        @if($staffnutritionistchefs->count() > 0)
                            @foreach ($staffnutritionistchefs as $staffnutritionistchefs_key => $staffnutritionistchefs_value)
                                <tr>
                                    <td>
                                        <input type="hidden" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][id]" value="{{ $staffnutritionistchefs_value->id ?? '' }}">
                                        <input type="hidden" class="center_id" name="staff_nutritionist_chef[0][center_id]" value="{{ $id ?? '' }}">
                                        <input type="text" class="form-control" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][snc_designation]" value="{{ $staffnutritionistchefs_value->snc_designation }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][snc_2018_19]"value="{{ $staffnutritionistchefs_value->snc_2018_19 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][snc_2019_20]"value="{{ $staffnutritionistchefs_value->snc_2019_20 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][snc_2020_21]"value="{{ $staffnutritionistchefs_value->snc_2020_21 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][snc_2021_22]"value="{{ $staffnutritionistchefs_value->snc_2021_22 }}">
                                    </td>
                                    <td>
                                        <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[{{ $staffnutritionistchefs_key }}][snc_2022_23]"value="{{ $staffnutritionistchefs_value->snc_2022_23 }}">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="actionbtn remove_two_part_staff_nutritionist_chef" data-id_enc="{{$id}}" data-id4="{{ $staffnutritionistchefs_key }}" data-db_id4="{{ $staffnutritionistchefs_value->id ?? '' }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="hidden" class="center_id" name="staff_nutritionist_chef[0][center_id]" value="{{ $id ?? '' }}">
                                    <input type="hidden" name="staff_nutritionist_chef[0][id]" value="">
                                    <input type="text" class="form-control" name="staff_nutritionist_chef[0][snc_designation]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="staff_nutritionist_chef[0][snc_2018_19]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="staff_nutritionist_chef[0][snc_2019_20]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="staff_nutritionist_chef[0][snc_2020_21]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="staff_nutritionist_chef[0][snc_2021_22]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="staff_nutritionist_chef[0][snc_2022_23]">
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="actionbtn remove_two_part_staff_nutritionist_chef" data-id4="0" data-db_id4="0">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
       
   </div>

     <!-- row 11 -->
     <div class="row py-3">
      
      
        <div class="row py-3">
            <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
            <div class="col-12">
                <div class="table-responsive">
                        <table class="table table-bordered">
                        <h4 class="mb-3">
                            2.13 Discipline and strength (Residential/Non-residential with no. of coaches)
                        </h4>
                            <button type="button" class="btn btn-primary d-block ms-auto add_more_two_part_residential_coaches">Add+</button>
                            <thead class="text-center align-middle">
                                <tr>
                                    <th rowspan="3" >Discipline</th>
                                    <th colspan="5">2018-19</th>
                                    <th colspan="5" >2019-20</th>
                                    <th colspan="5" >2020-21</th>
                                    <th colspan="5">2021-22</th>
                                    <th colspan="5">2022-23(as on 1st Jan 2023)</th>
                                    <th rowspan="3">Action</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Resi</th>
                                    <th colspan="2">NR</th>
                                    <th rowspan="2">C</th>
                                    <th colspan="2">Resi</th>
                                    <th colspan="2">NR</th>
                                    <th rowspan="2">C</th>
                                    <th colspan="2">Resi</th>
                                    <th colspan="2">NR</th>
                                    <th rowspan="2">C</th>
                                    <th colspan="2">Resi</th>
                                    <th colspan="2">NR</th>
                                    <th rowspan="2">C</th>
                                    <th colspan="2">Resi</th>
                                    <th colspan="2">NR</th>
                                    <th rowspan="2">C</th>
                                </tr>
                                <tr>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                    <th>M</th>
                                    <th>F</th>
                                </tr>


                            </thead>
                            <tbody id="two_part_residential_coaches_container" class=" align-middle">
                                <!-- {{-- {{ dd($parttwostrengthresidentialcoachesdisciplines)  }} --}} -->
                                
                                @if($parttwostrengthresidentialcoachesdisciplines->count() > 0)
                                    @foreach ($parttwostrengthresidentialcoachesdisciplines as $parttwostrengthresidentialcoachesdisciplines_key => $parttwostrengthresidentialcoachesdisciplines_value)    
                                        <tr>
                                            
                                            <td>
                                                <input type="hidden" name="two_part_residential_coaches[0][id]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->id ?? '' }}">
                                                <input type="hidden" class="center_id" name="two_part_residential_coaches[0][center_id]" value="{{ $id ?? '' }}">
                                                <select class="form-select" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_discipline_id]">
                                                    @foreach ($dis_list as $item)
                                                        <option  value="{{$item->discipline_id}}" @if($parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_discipline_id == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2018_19_resi_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2018_19_resi_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2018_19_resi_f]"  value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2018_19_resi_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2018_19_nr_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2018_19_nr_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2018_19_nr_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2018_19_nr_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2018_19_nr_c]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2018_19_nr_c }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2019_20_resi_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2019_20_resi_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2019_20_resi_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2019_20_resi_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2019_20_nr_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2019_20_nr_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2019_20_nr_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2019_20_nr_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2019_20_nr_c]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2019_20_nr_c }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2020_21_resi_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2020_21_resi_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2020_21_resi_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2020_21_resi_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2020_21_nr_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2020_21_nr_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2020_21_nr_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2020_21_nr_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2020_21_nr_c]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2020_21_nr_c }}">
                                            </td>
                                            <td>
                                                <!-- <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_22_resi_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_22_resi_m }}"> -->
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_22_resi_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_22_resi_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_22_nr_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_22_nr_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_22_nr_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_22_nr_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_22_nr_c]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_22_nr_c }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_23_resi_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_23_resi_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_23_resi_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_23_resi_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_23_nr_m]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_23_nr_m }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_23_nr_f]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_23_nr_f }}">
                                            </td>
                                            <td>
                                                <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[{{ $parttwostrengthresidentialcoachesdisciplines_key }}][strength_residential_coaches_2022_23_nr_c]" value="{{ $parttwostrengthresidentialcoachesdisciplines_value->strength_residential_coaches_2022_23_nr_c }}">
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="actionbtn remove_two_part_residential_coaches" data-id3="{{ $parttwostrengthresidentialcoachesdisciplines_key }}" data-db_id3="{{ $parttwostrengthresidentialcoachesdisciplines_value->id ?? '' }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            
                                            <input type="hidden" class="center_id" name="two_part_residential_coaches[0][center_id]" value="{{ $id ?? '' }}">
                                            <input type="hidden" name="two_part_residential_coaches[0][id]" value="">
                                            <select  class="form-select" name="two_part_residential_coaches[0][strength_residential_coaches_discipline_id]">
                                            @foreach ($dis_list as $item)
                                                        <option  value="{{$item->discipline_id}}">{{$item ->discipline}}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2018_19_resi_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2018_19_resi_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2018_19_nr_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2018_19_nr_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2018_19_nr_c]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2019_20_resi_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2019_20_resi_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2019_20_nr_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2019_20_nr_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2019_20_nr_c]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2020_21_resi_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2020_21_resi_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2020_21_nr_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2020_21_nr_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2020_21_nr_c]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_22_resi_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_22_resi_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_22_nr_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_22_nr_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_22_nr_c]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_23_resi_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_23_resi_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_23_nr_m]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_23_nr_f]">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" style="width:80px;" name="two_part_residential_coaches[0][strength_residential_coaches_2022_23_nr_c]">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_two_part_residential_coaches" data-id3="0" data-db_id3="0">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    <h6 class=" mb-3">
                        *M-Male,F-Female,C-Coach
                    </h6>
                </div>
                {{-- <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button> --}}

            </div>
        </div>
       <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
        {{-- <div class="col-12">
           <div class="table-responsive">
              
               <table class="table table-bordered">
                   <h4 class="mb-3"> 
                       2.13	Discipline and strength (Residential/Non-residential with no. of coaches)
                       
                           
                   </h4>
                   <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button></br>
                   
                   <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                       <thead class="text-center align-middle">
                           <tr>
                               <th rowspan="3" >Discipline</th>
                               <th colspan="5">2018-19</th>
                               <th colspan="5" >2019-20</th>
                               <th colspan="5" >2020-21</th>
                               <th  colspan="5">2021-22</th>
                               <th  colspan="5">2022-23(as on 1st Jan 2023)</th>
                             
                               
                           </tr>
                           <tr>
                               <th colspan="2">Resi</th>
                               <th colspan="2">NR</th>
                               <th rowspan="2">C</th>
                               <th colspan="2">Resi</th>
                               <th colspan="2">NR</th>
                               <th rowspan="2">C</th>
                               <th colspan="2">Resi</th>
                               <th colspan="2">NR</th>
                               <th rowspan="2">C</th>
                               <th colspan="2">Resi</th>
                               <th colspan="2">NR</th>
                               <th rowspan="2">C</th>
                               <th colspan="2">Resi</th>
                               <th colspan="2">NR</th>
                               <th rowspan="2">C</th>
                           </tr>
                           <tr>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                               <th>M</th>
                               <th>F</th>
                           </tr>
                          
                           
                       </thead>
                       <tbody  class=" align-middle">
                           <tr>
                              <td>
                               <select class="form-select" aria-label="Default select example">
                                   
                                   <option value="1">One</option>
                                   <option value="2">Two</option>
                                   <option value="3">Three</option>
                                 </select>
                              </td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                             <td><input type="number"  min="0" class="form-control"></td>
                            
                              
                           </tr>
                           
                          
                       </tbody>
               </table>
               <h6 class=" mb-3"> 
                  *M-Male,F-Female,C-Coach
               </h6>
           </div>
           <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button>
         
       </div> --}}
   </div>


    <!-- row 12 -->
    <div class="row py-3">
   
        <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
        <div class="col-12">
            <div class="table-responsive">
                
                <table class="table table-bordered">
                    <h4 class="mb-3"> 
                        2.14	Utilization of Fund
                        
                            
                    </h4>
                    
                    <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                        <thead class="text-center align-middle">
                            <tr>
                            <th rowspan="2">Particulars</th>
                            <th colspan="2">2018-19</th>
                            <th colspan="2">2019-20</th>
                            <th colspan="2">2020-21</th>
                            <th colspan="2">2021-22</th>
                            <th colspan="2">2022-23</th>
                            </tr>
                            <tr>
                            <th>Received</th>
                            <th>Utilized</th>
                            <th>Received</th>
                            <th>Utilized</th>
                            <th>Received</th>
                            <th>Utilized</th>
                            <th>Received</th>
                            <th>Utilized</th>
                            <th>Received</th>
                            <th>Utilized</th>
                            </tr>
                            
                        </thead>
                        <tbody  class=" align-middle">
                            <tr>
                            <td>Boardings</td>
                            <td><input type="number"  min="0" name="utilization_boardings_2018_19_received" @if($utilization)  value="{{$utilization->utilization_boardings_2018_19_received}}" @endif   class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_boardings_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2019_20_received" @if($utilization)  value="{{$utilization->utilization_boardings_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_boardings_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2020_21_received" @if($utilization)  value="{{$utilization->utilization_boardings_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_boardings_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2021_22_received" @if($utilization)  value="{{$utilization->utilization_boardings_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_boardings_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2022_23_received" @if($utilization)  value="{{$utilization->utilization_boardings_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_boardings_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_boardings_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Sports Kit</td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2018_19_received"@if($utilization)  value="{{$utilization->utilization_sports_kit_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2018_19_utilized"@if($utilization)  value="{{$utilization->utilization_sports_kit_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2019_20_received"@if($utilization)  value="{{$utilization->utilization_sports_kit_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2019_20_utilized"@if($utilization)  value="{{$utilization->utilization_sports_kit_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2020_21_received"@if($utilization)  value="{{$utilization->utilization_sports_kit_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2020_21_utilized"@if($utilization)  value="{{$utilization->utilization_sports_kit_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2021_22_received"@if($utilization)  value="{{$utilization->utilization_sports_kit_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2021_22_utilized"@if($utilization)  value="{{$utilization->utilization_sports_kit_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2022_23_received"@if($utilization)  value="{{$utilization->utilization_sports_kit_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_kit_2022_23_utilized"@if($utilization)  value="{{$utilization->utilization_sports_kit_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Education Expenditure</td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2018_19_received" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2019_20_received" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2020_21_received" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2021_22_received" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2022_23_received" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_education_expenditure_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_education_expenditure_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Competition Exposure</td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2018_19_received" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2019_20_received" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2020_21_received" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2021_22_received" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2022_23_received" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_competition_exposure_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_competition_exposure_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Medical & Misc.</td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2018_19_received" @if($utilization)  value="{{$utilization->utilization_medical_misc_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_medical_misc_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2019_20_received" @if($utilization)  value="{{$utilization->utilization_medical_misc_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_medical_misc_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2020_21_received" @if($utilization)  value="{{$utilization->utilization_medical_misc_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_medical_misc_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2021_22_received" @if($utilization)  value="{{$utilization->utilization_medical_misc_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_medical_misc_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2022_23_received" @if($utilization)  value="{{$utilization->utilization_medical_misc_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_medical_misc_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_medical_misc_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Operations & Maintenance cost of NCOEs</td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2018_19_received" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2019_20_received" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2020_21_received" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2021_22_received" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2022_23_received" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_maintenance_cost_ncoes_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_maintenance_cost_ncoes_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Sports Equipment's (Consumable)</td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2018_19_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2019_20_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2020_21_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number"  min="0" name="utilization_sports_equipment_consumable_2021_22_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_consumable_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_consumable_2022_23_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_consumable_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_consumable_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Sports Equipment's (Non-Consumable)</td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2018_19_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2019_20_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2020_21_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2021_22_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2022_23_received" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_equipment_non_consumable_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_sports_equipment_non_consumable_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Sports Science Equipment's (Consumable)</td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2018_19_received" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2019_20_received" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2020_21_received" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2020_21_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2021_22_received" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2022_23_received" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_consumable_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_consumable_2022_23_utilized}}" @endif  class="form-control"></td>
                            </tr>
                            <tr>
                            <td>Sports Science Equipment's (Non-Consumable)</td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2018_19_received" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2018_19_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2018_19_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2018_19_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2019_20_received" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2019_20_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2019_20_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2019_20_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2020_21_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2020_21_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2021_22_received" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2021_22_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2021_22_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2021_22_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2022_23_received" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2022_23_received}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2022_23_utilized" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2022_23_utilized}}" @endif  class="form-control"></td>
                            <td><input type="number" min="0" name="utilization_sports_science_non_consumable_2022_23_utilized_1" @if($utilization)  value="{{$utilization->utilization_sports_science_non_consumable_2022_23_utilized_1}}" @endif  class="form-control"></td>
                            </tr>
                            
                        </tbody>
                </table>
                
            </div>
            <!-- <button type="button" class="btn btn-primary  d-block ms-auto ">Add+</button> -->
            
        </div>
    </div>
  

            <!-- row 13 -->
    <div class="row py-3">      
            <!-- <h5 class="text-start mb-2">Category -1 </h4> -->
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <h4 class="mb-3">
                            2.15 International Competition Exposure availed by Athletes and Coaches (Provided to NCOE athletes under International Exposure scheme)
                        </h4>
                            <h5>A- Athletes</h5>
                                <button type="button" class="btn btn-primary d-block ms-auto add_more_two_part_two_athletes">Add+</button>
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th>Year</th>
                                        <th>Discipline</th>
                                        <th>No. Of Athletes Participated</th>
                                        <th>Expenditure Incurred (in Rs.)</th>
                                        <th>Achievements (Gold,Silver,Bronze)</th>
                                        <th>Remarks,if any</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                            <tbody class="align-middle" id="two_part_two_athletes_container">
                                @if($parttwoathlete->count() > 0)
                                    @foreach ($parttwoathlete as $parttwoathlete_key => $parttwoathlete_value)
                                        <tr>
                                            <td>
                                                2022-23
                                                <input type="hidden" class="center_id" name="two_part_two_athletes[0][center_id]" value="{{ $id ?? '' }}">
                                                <input type="hidden" class="form-control" value="2022-23" name='two_part_two_athletes[{{ $parttwoathlete_key }}][athletes_year]'>
                                            </td>
                                            <td>
                                                <input type="hidden" class="center_id" name="two_part_two_athletes[{{ $parttwoathlete_key }}][center_id]" value="{{ $id ?? '' }}">
                                                <input type="hidden" name="two_part_two_athletes[0][id]" value="{{ $parttwoathlete_value->id ?? '' }}">
                                                <select class="form-select" aria-label="Default select example" name='two_part_two_athletes[{{ $parttwoathlete_key }}][athletes_discipline]'>
                                                    @foreach ($dis_list as $item)
                                                        <option  value="{{$item->discipline_id}}" @if($parttwoathlete_value->athletes_discipline == $item->discipline_id) selected @endif>{{$item ->discipline}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name='two_part_two_athletes[{{ $parttwoathlete_key }}][athletes_no_athletes_participated]' value="{{ $parttwoathlete_value->athletes_no_athletes_participated ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name='two_part_two_athletes[{{ $parttwoathlete_key }}][athletes_no_expenditure_incurred]' value="{{ $parttwoathlete_value->athletes_no_expenditure_incurred ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='two_part_two_athletes[{{ $parttwoathlete_key }}][athletes_no_achievements]' value="{{ $parttwoathlete_value->athletes_no_achievements ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='two_part_two_athletes[{{ $parttwoathlete_key }}][athletes_no_remarks]' value="{{ $parttwoathlete_value->athletes_no_remarks ?? '' }}">
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="actionbtn remove_two_part_two_athletes" data-id2="{{ $parttwoathlete_key }}" data-db_id2="{{ $parttwoathlete_value->id ?? '' }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            2022-23
                                            <input type="hidden" class="center_id" name="two_part_two_athletes[0][center_id]" value="{{ $id ?? '' }}">
                                            <input type="hidden" class="form-control" value="2022-23" name='two_part_two_athletes[0][athletes_year]'>
                                            <input type="hidden" name="two_part_two_athletes[0][id]" value="">
                                        </td>
                                        <td>
                                            <select class="form-select two_part_two_athletes_athletes_no_athletes_participated_0" aria-label="Default select example" name='two_part_two_athletes[0][athletes_discipline]'>
                                                @foreach ($dis_list as $item)
                                                    <option  value="{{$item->discipline_id}}">{{$item ->discipline}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error_two_part_two_athletes_athletes_no_athletes_participated_0"></span>
                                        </td>

                                        <td>
                                            <input type="text" class="form-control" name='two_part_two_athletes[0][athletes_no_athletes_participated]'>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='two_part_two_athletes[0][athletes_no_expenditure_incurred]'>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='two_part_two_athletes[0][athletes_no_achievements]'>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='two_part_two_athletes[0][athletes_no_remarks]'>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_two_part_two_athletes" data-id2="0" data-db_id2="0">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <h5>B- Coach and Support Staff</h5>
                        <button type="button" class="btn btn-primary d-block ms-auto add_more_two_part_two_coach_support_staff">Add+</button>
                        <!-- <h6>(No of athletes who won medal is also to be reflected in Male/ Female)</h6> -->
                            <thead class="text-center align-middle">
                                <tr>
                                    <th>Year</th>
                                    <th>Name with Designation</th>
                                    <th>Period of tour</th>
                                    <th>Remarks,if any</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="two_part_two_coach_support_staff" class="align-middle">
                                @if($parttwocoachsupportstaff->count() > 0)
                                    @foreach ($parttwocoachsupportstaff as $parttwocoachsupportstaff_key => $parttwocoachsupportstaff_value)
                                        <tr>
                                            <td>
                                                <input type="hidden" class="center_id" name="coach_support_staff_form[0][center_id]" value="{{ $id ?? '' }}">
                                                <input type="hidden" name="coach_support_staff_form[0][id]" value="{{ $parttwocoachsupportstaff_value->id ?? '' }}">
                                                2022-23
                                                <input type="hidden" class="form-control" value="2022-23" name='coach_support_staff_form[{{ $parttwocoachsupportstaff_key }}][coach_support_staff_year]' value="{{ $parttwocoachsupportstaff_value->coach_support_staff_year ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='coach_support_staff_form[{{ $parttwocoachsupportstaff_key }}][coach_support_staff_name_designation]' value="{{ $parttwocoachsupportstaff_value->coach_support_staff_name_designation ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='coach_support_staff_form[{{ $parttwocoachsupportstaff_key }}][coach_support_staff_period_tour]' value="{{ $parttwocoachsupportstaff_value->coach_support_staff_period_tour ?? '' }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='coach_support_staff_form[{{ $parttwocoachsupportstaff_key }}][coach_support_staff_Remarks]' value="{{ $parttwocoachsupportstaff_value->coach_support_staff_remarks ?? '' }}">
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="actionbtn remove_coach_support_staff_form" data-id2="{{ $parttwocoachsupportstaff_key }}" data-db_id2="{{ $parttwocoachsupportstaff_value->id }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            2022-23
                                            <input type="hidden" class="center_id" name="coach_support_staff_form[0][center_id]" value="{{ $id ?? '' }}">
                                            <input type="hidden" class="form-control" value="2022-23" name='coach_support_staff_form[0][coach_support_staff_year]'>
                                            <input type="hidden" name="coach_support_staff_form[0][id]" value="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='coach_support_staff_form[0][coach_support_staff_name_designation]'>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='coach_support_staff_form[0][coach_support_staff_period_tour]'>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='coach_support_staff_form[0][coach_support_staff_Remarks]'>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_coach_support_staff_form" data-id2="0" data-db_id2="0"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                            <tr>
                                <td colspan="5" class="text-end">
                                    {{-- <button type="submit" class="btn btn-warning px-md-4">Save</button> --}}
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
            
            </div>
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary ">Next</button>  &nbsp;
        <button class="btn btn-primary " onclick="history.back()">Go Back</button>
        </div>
</form>
    </div>
@endsection
@section('page_specific_js')
<script>
 var counting = "0";
</script>
<script src="{{asset('public/front/js/review/review_part_two.js')}}"></script>
<script src="{{asset('public/front/js/review/review_part_two_two.js')}}"></script>
<script src="{{asset('public/front/js/review/part_two_coach_support_staff.js')}}"></script>


<script>
    var counting = "0";
    var form_first_count = "0";
    var form_second_count = "0";
    var form_three_count = "0";
    var first_form_array_counting = [];
    var second_form_array_counting = [];
    var three_form_array_counting = [];

    //Shubham Code  
    var form_first_play_of_field = "0";
    var form_first_play_of_field_counting = [];

    var form_sport_quipment = "0";
    var form_sport_quipment_counting = [];

    var sport_quipment_consumable = "0";
    var form_sport_quipment_consumable_counting = [];

    var sport_science_consumable = "0";
    var form_sport_science_consumable_counting = [];

    var add_staff_add_consumable = "0";
    var add_staff_add_counting = [];

    if(add_staff_add_consumable == 0){
        var counting_play_field2 = {{ $add_staff_add->count() }};
        add_staff_add_counting.push(0);
    }else{
        var counting_play_field2 = add_staff_add_consumable*1 - 1;
        for(let i = 0; i < add_staff_add_consumable ;i++){
            add_staff_add_counting.push(i);
        }
    }

    if(sport_quipment_consumable == 0){
        var counting_play_field = {{ $sport_quipment_consumable->count() }};
        form_sport_quipment_consumable_counting.push(0);
    }else{
        var counting_play_field = sport_quipment_consumable*1 - 1;
        for(let i = 0; i < sport_quipment_consumable ;i++){
            form_sport_quipment_consumable_counting.push(i);
        }
    }

    if(form_first_play_of_field == 0){
        var counting_play_field = {{ $part_two_play_field_count->count() }};
        form_first_play_of_field_counting.push(0);
    }else{
        var counting_play_field = form_first_play_of_field*1 - 1;
        for(let i = 0; i < form_first_play_of_field ;i++){
            form_first_play_of_field_counting.push(i);
        }
    }
   

    //Shubham code ends here  
    if(form_first_count == 0){
        var counting_1 = {{ $parttwoathlete->count() }};
        first_form_array_counting.push(0);
    }else{
        var counting_1 = form_first_count*1 - 1;
        for(let i = 0; i < form_first_count ;i++){
            first_form_array_counting.push(i);
        }
    }

    if(form_second_count == 0){
        var counting_2 = {{ $parttwocoachsupportstaff->count()}};
        second_form_array_counting.push(0);
    }else{
        var counting_2 = form_second_count*1 - 1;
        for(let i = 0; i < form_second_count ;i++){
            second_form_array_counting.push(i);
        }
    }

    if(form_three_count == 0){
        var counting_3 = {{ $parttwostrengthresidentialcoachesdisciplines->count() }};
        three_form_array_counting.push(0);
    }else{
        var counting_3 = form_three_count*1 - 1;
        for(let i = 0; i < form_three_count ;i++){
            three_form_array_counting.push(i);
        }
    }

    var form_four_count = "0";
    var four_form_array_counting = [];
    if(form_four_count == 0){
        var counting_4 = {{ $staffnutritionistchefs->count() }};
        four_form_array_counting.push(0);
    }else{
        var counting_4 = form_four_count*1 - 1;
        for(let i = 0; i < form_four_count ;i++){
            four_form_array_counting.push(i);
        }
    }
    
    var form_five_count = "0";
    var five_form_array_counting = [];
    if(form_five_count == 0){
        var counting_5 = 0;
        five_form_array_counting.push(0);
    }else{
        var counting_5 = form_five_count*1 - 1;
        for(let i = 0; i < form_five_count ;i++){
            five_form_array_counting.push(i);
        }
    }
    
    var form_six_count = "0";
    var six_form_array_counting = [];
    if(form_six_count == 0){
        var counting_5 = 0;
        six_form_array_counting.push(0);
    }else{
        var counting_5 = form_six_count*1 - 1;
        for(let i = 0; i < form_six_count ;i++){
            six_form_array_counting.push(i);
        }
    }
    
    var form_seveen_count = "0";
    var seveen_form_array_counting = [];
    if(form_seveen_count == 0){
        var counting_7 = 0;
        seveen_form_array_counting.push(0);
    }else{
        var counting_7 = form_seveen_count*1 - 1;
        for(let i = 0; i < form_seveen_count ;i++){
            seveen_form_array_counting.push(i);
        }
    }

    var form_eight_count = "0";
    var eight_form_array_counting = [];
    if(form_eight_count == 0){
        var counting_8 = 0;
        eight_form_array_counting.push(0);
    }else{
        var counting_8 = form_eight_count*1 - 1;
        for(let i = 0; i < form_eight_count ;i++){
            eight_form_array_counting.push(i);
        }
    }

    var form_nine_count = "0";
    var nine_form_array_counting = [];
    if(form_nine_count == 0){
        var counting_9 = 0;
        nine_form_array_counting.push(0);
    }else{
        var counting_9 = form_nine_count*1 - 1;
        for(let i = 0; i < form_nine_count ;i++){
            nine_form_array_counting.push(i);
        }
    }
    
    var form_ten_count = "0";
    var ten_form_array_counting = [];
    if(form_ten_count == 0){
        var counting_10 = 0;
        ten_form_array_counting.push(0);
    }else{
        var counting_10 = form_ten_count*1 - 1;
        for(let i = 0; i < form_ten_count ;i++){
            ten_form_array_counting.push(i);
        }
    }

    var form_elven_count = "0";
    var elven_form_array_counting = [];
    if(form_elven_count == 0){
        var counting_11 = 0;
        elven_form_array_counting.push(0);
    }else{
        var counting_11 = form_elven_count*1 - 1;
        for(let i = 0; i < form_elven_count ;i++){
            elven_form_array_counting.push(i);
        }
    }
    
</script>
<script>
                $(document).ready(function(){
                    $(document).ready(function() {
                        $("input[name$='cat_radio']").click(function() {
                            // alert('hello');
                            var test = $(this).val();
                     
                            if(test == 2){
                                $("#area_of_land_div").hide();
                                // $('.area_heactor').attr('required', 'required');
                                $('.area_heactor').removeAttr('required');
                            }else{
                 
                                $("#area_of_land_div").show();
                                // $('.area_heactor').attr('required', 'required');
                               
                                $('.area_heactor').prop('required',true);
                            }  
                           
                        });
                    });
                });
        </script>




@endsection
