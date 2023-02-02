@extends('front.layouts.layout')

@section('page_specific_css')

    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
    <script>
        var select_detail_cwp_slp = [];
        var form_first_count = []; 
        var form_two_count = []
        var form_three_count = []
    </script>

@endsection

@section('content')

<div class="managePrecurement">
    <div class="manageTable mb-5">
        @if (Session::has('message'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ Session::get('message') }}
                </div>
            @endif
            @if (Session::has('error_message'))
                <div class="alert alert-danger">
                    <strong>Danger!</strong> {{ Session::get('error_message') }}
                </div>
            @endif
        <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">
            {{-- Request::segment(5) --}}
            <select class="form-control form-select center_id center_change" id="project_center_id"  name="infra_manage[0]project_center_id" style="width: 20%;">
                {{-- <option>Centers</option> --}}
                    @foreach($centers as $p_key => $p_val)
                        <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
                    @endforeach
                </select>
        </form>
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">
            STATUS OF COURT CASES
            <a class="btn btn-outline-success add_more" href="javascript:void(0)">
                <i class="fa-solid fa-plus"></i>ADD
            </a>
        </h3>
        <form class="miscellaneous_manage_form">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            <th colSpan="12">STATUS OF COURT CASES (LIMBS PORTAL VERSION)</th>                            
                        </tr>
                        <tr>
                            <th>DETAILS OF THE OA/WP/CWP /CP/SLP</th>
                            <th>NAME OF THE COURT</th>
                            <th>BRIEF ISSUE INVOLVED IN THE COURT CASE</th>
                            <th>NAME OF THE PARTIES</th>
                            <th>LATEST STATUS OF THE CASE</th>
                            <th>NAME OF THE COUNSEL</th>
                            <th>LAST DATE OF HEARING</th>
                            <th>STATUS OF LAST HEARING</th>
                            <th>PRESENT STATUS</th>
                            <th>NEXT DATE OF HEARING</th>
                            <th>REMARKS</th>                           
                            <th>ACTION</th>                           
                        </tr>
                    </thead>
                    <tbody id="multiple_miscellaneous_manage_container">
                        @if($data1->count() > 0)
                            @foreach ($data1 as $key => $value1)
                                <script>
                                    select_detail_cwp_slp.push("{{$value1->detail_cwp_slp}}");
                                </script>
                                <tr class="row_{{$key}}">
                                    <td class="row_id">{{ $key + 1 }}</td>
                                    <td>
                                        <input type="hidden" name="misc_manage[{{$key}}][id]" value="{{ $value1->id ?? '' }}">
                                        <input type="hidden" name="misc_manage[{{$key}}][template_id]" value="{{$value1->template_id}}">
                                        <input type="hidden" name="misc_manage[{{$key}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <select name="misc_manage[{{$key}}][detail_cwp_slp]" data-id="{{$key}}" class="form-select detail_cwp_slp_{{$key}} change_detail_cwp_slp detail_cwp_slp">
                                            <option selected disabled>Select</option>
                                            @foreach($data as $a_key => $a_value)   
                                                <option value="{{ $a_key }}" {{$a_key == $value1->detail_cwp_slp ? 'selected' : 'disabled'}}>{{$a_value}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error_detail_cwp_slp_{{$key}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_manage_court_details_court_{{$key}}" name ="misc_manage[{{$key}}][court]" placeholder="" value="{{ $value1->court ?? ""  }}" autocomplete="off" readonly>
                                        <span class="text-danger error_misc_manage_court_details_court_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_court_case_{{$key}}" name ="misc_manage[{{$key}}][court_case]" placeholder="" value="{{ $value1->court_case ?? ""  }}" autocomplete="off" readonly>
                                        <span class="text-danger error_misc_manage_court_details_court_case_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_parties_{{$key}}" name ="misc_manage[{{$key}}][parties]" placeholder="" value="{{ $value1->parties ?? ""  }}" autocomplete="off" readonly>
                                        <span class="text-danger error_misc_manage_court_details_parties_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_case_ststus_{{$key}}" name ="misc_manage[{{$key}}][case_ststus]" placeholder="" value="{{ $value1->case_ststus ?? ""  }}" autocomplete="off">
                                        <span class="text-danger error_misc_manage_court_details_case_ststus_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_name_counsel_{{$key}}" name ="misc_manage[{{$key}}][name_counsel]" placeholder="" value="{{ $value1->name_counsel ?? ""  }}" autocomplete="off" readonly>
                                        <span class="text-danger error_misc_manage_court_details_name_counsel_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        @php
                                            $value1->last_date_hearing = isset($value1->last_date_hearing) ? date('d-m-Y', strtotime($value1->last_date_hearing)) : null;
                                        @endphp
                                        <input type="text" class="form-control lastdatedatepicker_{{$key}} misc_manage_court_details_last_date_hearing_{{$key}}" name ="misc_manage[{{$key}}][last_date_hearing]" placeholder="dd-mm-yy" value="{{ $value1->last_date_hearing ?? ""  }}" autocomplete="off">
                                        <span class="text-danger error_misc_manage_court_details_last_date_hearing_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_last_hearing_status_{{$key}}" name ="misc_manage[{{$key}}][last_hearing_status]" placeholder="" value="{{ $value1->last_hearing_status ?? ""  }}" autocomplete="off">
                                        <span class="text-danger error_misc_manage_court_details_last_hearing_status_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_present_status_{{$key}}" name ="misc_manage[{{$key}}][present_status]" placeholder="" value="{{ $value1->present_status ?? ""  }}" autocomplete="off">
                                        <span class="text-danger error_misc_manage_court_details_present_status_{{$key}}"></span>
                                    </td>
                                    <td> 
                                        <select class="form-control next_day_hearing_option misc_manage_court_details_next_day_hearing_{{$key}}" data-nd_id="{{$key}}" name="misc_manage[{{$key}}][next_day_hearing]" autocomplete="off">
                                            <option selected disabled>Next Day Hearing</option>
                                            <option value="date" {{ "date" == $value1->next_day_hearing ? 'selected' : ''}}>Date</option>
                                            <option value="text" {{ "text" == $value1->next_day_hearing ? 'selected' : ''}}>Text</option>
                                        </select>
                                        @if($value1->next_day_hearing == 'date')
                                            <div class="details_next_day_hearing_date_{{$key}}">
                                                <input type="text" class="form-control misc_manage_court_details_present_date_{{$key}} details_next_day_hearing_select_date_{{$key}}" name ="misc_manage[{{$key}}][next_day_hearing_option_date]" placeholder="" value="{{ $value1->next_day_hearing_option_date ?? ""  }}"  autocomplete="off">
                                            </div>
                                            @elseif($value1->next_day_hearing_option_date == "")                                            
                                            <div class="details_next_day_hearing_date_{{$key}} d-none">
                                                <input type="text" class="form-control misc_manage_court_details_present_date_{{$key}} details_next_day_hearing_select_date_{{$key}}" name ="misc_manage[{{$key}}][next_day_hearing_option_date]" placeholder="" value="{{ $value1->next_day_hearing_option_date ?? ""  }}"  autocomplete="off">
                                            </div>
                                        @endif
                                        @if($value1->next_day_hearing == 'text')
                                            <div class="details_next_day_hearing_text_{{$key}}" >
                                                <input type="text" class="form-control misc_manage_court_details_present_text_{{$key}}" name ="misc_manage[{{$key}}][next_day_hearing_option_text]" placeholder="" value="{{ $value1->next_day_hearing_option_text ?? ""  }}" autocomplete="off">
                                            </div>
                                            
                                        @elseif($value1->next_day_hearing_option_text == "")
                                            <div class="details_next_day_hearing_text_{{$key}} d-none">
                                                <input type="text" class="form-control misc_manage_court_details_present_text_{{$key}}" name ="misc_manage[{{$key}}][next_day_hearing_option_text]" placeholder="" value="{{ $value1->next_day_hearing_option_text ?? ""  }}" autocomplete="off">
                                            </div>
                                        @endif
                                    </td>
                                    <td> 
                                        <input type="text" class="form-control misc_manage_court_details_remarks_{{$key}}" name ="misc_manage[{{$key}}][remarks]" placeholder="" value="{{ $value1->remarks ?? ""  }}" autocomplete="off">
                                        <span class="text-danger error_misc_manage_court_details_remarks_{{$key}}"></span>
                                    </td>   
                                    <td>
                                        <a href="#" class="actionbtn remove_btn" data-id="{{$key}}" data-db_id="{{$value1->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>                                                        
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="row_0">1</td>
                                <td>
                                    <input type="hidden" name="misc_manage[0][template_id]" value="{{$temp_id}}">
                                    <input type="hidden" name="misc_manage[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                    <select name="misc_manage[0][detail_cwp_slp]" data-id="0" class="form-select detail_cwp_slp_0 change_detail_cwp_slp detail_cwp_slp">
                                        <option selected disabled>Select</option>
                                        @foreach($data as $a_key => $a_value)   
                                            <option value="{{ $a_key }}">{{$a_value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error_detail_cwp_slp_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_manage_court_details_court_0" name ="misc_manage[0][court]" placeholder="" autocomplete="off" readonly>
                                    <span class="text-danger error_misc_manage_court_details_court_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_court_case_0" name ="misc_manage[0][court_case]" placeholder="" autocomplete="off" readonly>
                                    <span class="text-danger error_misc_manage_court_details_court_case_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_parties_0" name ="misc_manage[0][parties]" placeholder="" autocomplete="off" readonly>
                                    <span class="text-danger error_misc_manage_court_details_parties_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_case_ststus_0" name ="misc_manage[0][case_ststus]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_court_details_case_ststus_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_name_counsel_0" name ="misc_manage[0][name_counsel]" placeholder="" autocomplete="off" readonly>
                                    <span class="text-danger error_misc_manage_court_details_name_counsel_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control lastdatedatepicker_0 misc_manage_court_details_last_date_hearing_0" name ="misc_manage[0][last_date_hearing]" placeholder="dd-mm-yy" autocomplete="off">
                                    <span class="text-danger error_misc_manage_court_details_last_date_hearing_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_last_hearing_status_0" name ="misc_manage[0][last_hearing_status]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_court_details_last_hearing_status_0"></span>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_present_status_0" name ="misc_manage[0][present_status]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_court_details_present_status_0"></span>
                                </td>
                                <td> 
                                    <select class="form-control next_day_hearing_option misc_manage_court_details_next_day_hearing_0" data-nd_id="0" name="misc_manage[0][next_day_hearing]" autocomplete="off">
                                        <option selected disabled>Next Day Hearing</option>
                                        <option value="date">Date</option>
                                        <option value="text">Text</option>
                                    </select>
                                    <div class="details_next_day_hearing_date_0" style="display: none;">
                                        <input type="text" class="form-control misc_manage_court_details_present_date_0 details_next_day_hearing_select_date_0" name ="misc_manage[0][next_day_hearing_option_date]" placeholder="dd-mm-yy" autocomplete="off">
                                    </div>
                                    
                                    <div class="details_next_day_hearing_text_0" style="display: none;">
                                        <input type="text" class="form-control misc_manage_court_details_present_text_0" name ="misc_manage[0][next_day_hearing_option_text]" placeholder="" autocomplete="off">
                                    </div>
                                </td>
                                <td> 
                                    <input type="text" class="form-control misc_manage_court_details_remarks_0" name ="misc_manage[0][remarks]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_court_details_remarks_0"></span>
                                </td>   
                                <td>
                                    <a href="#" class="actionbtn remove_btn" data-id="0" data-db_id="0"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                                                                                        
                            </tr>
                        @endif
                    </tbody>
                    <tr>
                        <td colspan="1" class="text-end">
                            <button type="submit" class="btn btn-warning px-md-4">Save</button>
                        </td>
                    </tr>                        
                </table>
            </div>
        </form>
    </div>
    <div class="manageTable my-5">
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">
            RETIREMENT BENEFIT
            <button type="button" class="btn btn-outline-success add_more_two">+ ADD</button>
        </h3>
        <form class="miscellaneous_manage_form_two">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            <th rowSpan="2">NAME OF THE EMPLOYEE</th>
                            <th rowspan="2">DESIGNATION</th>
                            <th colspan="4">DATES OF START/RELEASE OF RETIREMENT BENEFIT*</th>
                            <th rowSpan="2">REMARKS (IF ANY)</th>
                            <th rowSpan="2">ACTION</th>  
                        </tr>
                        <tr>
                            <th>LEAVE ENCASHMENT</th>
                            <th>PENSION</th>
                            <th>GRATUITY</th>
                            <th>COMMUTATION</th>
                        </tr>
                    </thead>
                    <tbody id="multiple_miscellaneous_manage_container_two">
                        @if($data2->count() > 0)
                            @foreach ($data2 as $key2 => $value2)
                                <tr class="row_{{$key2}}">
                                    <td class="row_id">{{ $key2 + 1 }}</td>
                                    <td>
                                        <input type="hidden" name="misc_manage_form_two[{{$key2}}][id]" value="{{ $value2->id ?? '' }}">
                                        <input type="hidden" name="misc_manage_form_two[{{$key2}}][template_id]" value="{{$value2->template_id}}">
                                        <input type="hidden" name="misc_manage_form_two[{{$key2}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <input type="text" class="form-control misc_manage_award_tender_status_name_employee_{{$key2}}" name="misc_manage_form_two[{{$key2}}][infraemployee]" placeholder="" autocomplete="off" value="{{ $value2->infraemployee ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_name_employee_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_manage_award_tender_status_designation_{{$key2}}" name="misc_manage_form_two[{{$key2}}][infradesignation]" placeholder="" autocomplete="off" value="{{ $value2->infradesignation ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_designation_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <?php $value2->encashment = isset($value2->encashment) ? date('d-m-Y', strtotime($value2->encashment)) : null; ?>
                                        <input type="text" class="form-control leave_encashment_datepicker_{{ $key2 }} misc_manage_award_tender_status_leave_encashment_{{$key2}}" name="misc_manage_form_two[{{$key2}}][encashment]" placeholder="dd-mm-yy" autocomplete="off" value="{{ $value2->encashment ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_leave_encashment_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <?php $value2->pension = isset($value2->pension) ? date('d-m-Y', strtotime($value2->pension)) : null; ?>
                                        <input type="text" class="form-control pension_infra_datepicker_{{ $key2 }} misc_manage_award_tender_status_pension_{{$key2}}" name="misc_manage_form_two[{{$key2}}][pension]" placeholder="dd-mm-yy" autocomplete="off" value="{{ $value2->pension ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_pension_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <?php $value2->gratuity = isset($value2->gratuity) ? date('d-m-Y', strtotime($value2->gratuity)) : null; ?>
                                        <input type="text" class="form-control gratuity_infra_datepicker_{{ $key2 }} misc_manage_award_tender_status_gratuity_{{$key2}}" name="misc_manage_form_two[{{$key2}}][gratuity]" placeholder="dd-mm-yy" autocomplete="off" value="{{ $value2->gratuity ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_gratuity_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <?php $value2->commutation = isset($value2->commutation) ? date('d-m-Y', strtotime($value2->commutation)) : null; ?>
                                        <input type="text" class="form-control commutation_infra_datepicker_{{ $key2 }} misc_manage_award_tender_status_leave_commutation_{{$key2}}" name="misc_manage_form_two[{{$key2}}][commutation]" placeholder="dd-mm-yy" autocomplete="off" value="{{ $value2->commutation ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_leave_commutation_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_manage_award_tender_status_leave_remarks_{{$key2}}" name="misc_manage_form_two[{{$key2}}][remarks]" placeholder="" autocomplete="off" value="{{ $value2->remarks ?? ""  }}">
                                        <span class="text-danger error_misc_manage_award_tender_status_leave_remarks_{{$key2}}"></span>
                                    </td>
                                    <td>
                                        <a href="#" class="actionbtn remove_formtwo_btn" data-id2="{{$key2}}" data-db_id2="{{$value2->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr> 
                            @endforeach
                        @else
                            <tr>
                                <td>1</td>
                                <td>
                                    <input type="hidden" name="misc_manage_form_two[0][template_id]" value="{{$temp_id}}">
                                    <input type="hidden" name="misc_manage_form_two[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                    <input type="text" class="form-control misc_manage_award_tender_status_name_employee_0" name="misc_manage_form_two[0][infraemployee]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_name_employee_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_manage_award_tender_status_designation_0" name="misc_manage_form_two[0][infradesignation]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_designation_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control leave_encashment_datepicker_0 misc_manage_award_tender_status_leave_encashment_0" name="misc_manage_form_two[0][encashment]" placeholder="dd-mm-yy" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_leave_encashment_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control pension_infra_datepicker_0 misc_manage_award_tender_status_pension_0" name="misc_manage_form_two[0][pension]" placeholder="dd-mm-yy" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_pension_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control gratuity_infra_datepicker_0 misc_manage_award_tender_status_gratuity_0" name="misc_manage_form_two[0][gratuity]" placeholder="dd-mm-yy" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_gratuity_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control commutation_infra_datepicker_0 misc_manage_award_tender_status_leave_commutation_0" name="misc_manage_form_two[0][commutation]" placeholder="dd-mm-yy" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_leave_commutation_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_manage_award_tender_status_leave_remarks_0" name="misc_manage_form_two[0][remarks]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_manage_award_tender_status_leave_remarks_0"></span>
                                </td>
                                <td>
                                    <a href="#" class="actionbtn remove_formtwo_btn" data-id2="0" data-db_id2="0"><i class="fa-solid fa-trash-can"></i></a>                                
                                </td>
                            </tr>
                        @endif
                    </tbody>
                        <tr>
                            <td colspan="1" class="text-end">
                                <button type="submit" class="btn btn-warning px-md-4">Save</button>
                            </td>
                        </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="manageTable my-5">
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">
            RETIREMENT DETAILS
            <button type="button" class="btn btn-outline-success add_more_three" >+ ADD</button>
        </h3>
        <form class="miscellaneous_manage_form_three">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            <th rowSpan="2" class="text-start">NAME OF THE EMPLOYEE</th>
                            <th rowspan="2" class="text-center">DESIGNATION</th>
                            <th rowSpan="2" class="text-start">PLACE OF POSTING</th>
                            <th rowSpan="2" class="text-start">DATE OF RETIREMENT</th>
                            <th rowspan="2" >GROUP (A/B/C)</th>
                            <th colspan="4">RETIREMENT BENEFIT*</th>
                            <th rowSpan="2" class="text-start">STARTING DATE OF PENSION</th>
                            <th rowSpan="2">REMARKS</th>
                            <th rowSpan="2">ACTION</th>
                        
                        </tr>
                        <tr>
                            <th>LEAVE ENCASHMENT</th>
                            <th>PENSION</th>
                            <th>GRATUITY</th>
                            <th>COMMUTATION</th>
                        </tr>
                    </thead>
                    <tbody id="multiple_miscellaneous_manage_container_three">
                        @if($data3->count() > 0)
                            @foreach ($data3 as $key3 => $value3)
                                <tr class="row_{{$key3}}">
                                    <td class="row_id">{{ $key3 + 1 }}</td>
                                    <td>
                                        <input type="hidden" name="misc_manage_form_three[{{$key3}}][id3]" value="{{ $value3->id ?? '' }}">
                                        <input type="hidden" name="misc_manage_form_three[{{$key3}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <input type="hidden" name="misc_manage_form_three[{{$key3}}][template_id]" value="{{$value3->template_id}}">
                                        <input type="text" class="form-control misc_retirement_details_name_employee_{{$key3}}" name="misc_manage_form_three[{{$key3}}][retir_name_employee]" placeholder="" value="{{ $value3->retir_name_employee ?? '' }}"  autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_name_employee_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_name_designation_{{$key3}}" name="misc_manage_form_three[{{$key3}}][retir_name_designation]" placeholder="" value="{{ $value3->retir_name_designation ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_name_designation_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_name_place_posting_{{$key3}}" name="misc_manage_form_three[{{$key3}}][name_place_posting]" placeholder="" value="{{ $value3->name_place_posting ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_name_place_posting_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        @php
                                            $details_date_retirement = isset($value3->details_date_retirement) ? date('d-m-Y', strtotime($value3->details_date_retirement)) : null;
                                        @endphp 
                                        <input type="text" class="form-control misc_retirement_details_date_retirement_{{$key3}} datepicker_{{$key3}}" name="misc_manage_form_three[{{$key3}}][details_date_retirement]" placeholder="dd-mm-yy" value="{{ $details_date_retirement ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_date_retirement_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_name_group_{{$key3}}" name="misc_manage_form_three[{{$key3}}][details_name_group]" placeholder="" value="{{ $value3->details_name_group ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_name_group_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_leave_encashment_{{$key3}}"name="misc_manage_form_three[{{$key3}}][leave_encashment]"  placeholder="" value="{{ $value3->leave_encashment ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_leave_encashment_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_pension_{{$key3}}" name="misc_manage_form_three[{{$key3}}][details_pension]" placeholder="" value="{{ $value3->details_pension ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_pension_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_gratuity_{{$key3}}" name="misc_manage_form_three[{{$key3}}][gratuity]" placeholder="" value="{{ $value3->gratuity ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_gratuity_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_commutation_{{$key3}}" name="misc_manage_form_three[{{$key3}}][commutation]" placeholder="" value="{{ $value3->commutation ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_commutation_{{$key3}}"></span>
                                    </td>
                                    <td>
                                        @php
                                            $starting_date_pension = isset($value3->starting_date_pension) ? date('d-m-Y', strtotime($value3->starting_date_pension)) : null;
                                        @endphp
                                        <input type="text" class="form-control misc_retirement_details_starting_date_pension_{{$key3}} pension_datepicker_{{$key3}}" name="misc_manage_form_three[{{$key3}}][starting_date_pension]" placeholder="dd-mm-yy" value="{{ $starting_date_pension ?? '' }}" autocomplete="off">
                                        <span class="text-danger error_misc_retirement_details_starting_date_pension_{{$key3}}"></span>
                                    </td>
                                    
                                    <td>
                                        <input type="text" class="form-control misc_retirement_details_remarks_{{$key3}}" name="misc_manage_form_three[{{$key3}}][remarks]" placeholder="" value="{{ $value3->remarks ?? '' }}" autocomplete="off"> 
                                        <span class="text-danger error_misc_retirement_details_remarks_{{$key3}}"></span>                               
                                    </td>
                                    <td>
                                        <a href="#" class="actionbtn remove_formthree_btn" data-id3="{{$key3}}" data-db_id3="{{ $value3->id ?? '' }}"><i class="fa-solid fa-trash-can"></i></a>                                
                                    </td>
                                </tr> 
                            @endforeach
                        @else
                            <tr>
                                <td>1</td>
                                <td>
                                    <input type="hidden" name="misc_manage_form_three[0][template_id]" value="{{$temp_id}}">
                                    <input type="hidden" name="misc_manage_form_three[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                    <input type="text" class="form-control misc_retirement_details_name_employee_0" name="misc_manage_form_three[0][retir_name_employee]" placeholder=""  autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_name_employee_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_name_designation_0" name="misc_manage_form_three[0][retir_name_designation]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_name_designation_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_name_place_posting_0" name="misc_manage_form_three[0][name_place_posting]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_name_place_posting_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_date_retirement_0 datepicker_0" name="misc_manage_form_three[0][details_date_retirement]" placeholder="dd-mm-yy" autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_date_retirement_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_name_group_0" name="misc_manage_form_three[0][details_name_group]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_name_group_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_leave_encashment_0"name="misc_manage_form_three[0][leave_encashment]"  placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_leave_encashment_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_pension_0" name="misc_manage_form_three[0][details_pension]" placeholder="" autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_pension_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_gratuity_0" name="misc_manage_form_three[0][gratuity]" placeholder=""autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_gratuity_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_commutation_0" name="misc_manage_form_three[0][commutation]" placeholder=""autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_commutation_0"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_starting_date_pension_0 pension_datepicker_0" name="misc_manage_form_three[0][starting_date_pension]" placeholder="dd-mm-yy"autocomplete="off">
                                    <span class="text-danger error_misc_retirement_details_starting_date_pension_0"></span>
                                </td>
                                
                                <td>
                                    <input type="text" class="form-control misc_retirement_details_remarks_0" name="misc_manage_form_three[0][remarks]" placeholder=""autocomplete="off"> 
                                    <span class="text-danger error_misc_retirement_details_remarks_0"></span>                               
                                </td>
                                <td>
                                    <a href="#" class="actionbtn remove_formthree_btn" data-id="0" data-db_id="0"><i class="fa-solid fa-trash-can"></i></a>                                
                                </td>
                            </tr>
                        @endif

                    </tbody>
                    <tr>
                        <td colspan="1" class="text-end">
                            <button type="submit" class="btn btn-warning px-md-4">Save</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
<!--close main contant-->

@endsection

@section('page_specific_js')

<script src="{{asset('public/front/js/manage/miscellaneous_form_1.js')}}"></script>
<script src="{{asset('public/front/js/manage/miscellaneous_form_2.js')}}"></script>
<script src="{{asset('public/front/js/manage/miscellaneous_form_3.js')}}"></script>

<script>

    $(document).ready(function(){

        $( ".lastdatedatepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });

        $(".details_next_day_hearing_select_date_0").datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });

        $( ".datepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });

        $( ".pension_datepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
        
        $( ".leave_encashment_datepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
        
        $( ".pension_infra_datepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
        $( ".gratuity_infra_datepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });

        $( ".commutation_infra_datepicker_0" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });

        
    });
    var temp_id = "{{$temp_id}}";
    var encode_temp_id = "{{encode5t($temp_id)}}";
    var form_first_count = "{{ $data1->count()}}";
    
    // var form_first_count = 0;
    var array_counting = [];
    
    if(form_first_count == 0){
        var counting = 0;
        array_counting.push(0);
    }else{
        var counting = form_first_count*1 - 1; 
        for(let i = 0; i < form_first_count ;i++){
            array_counting.push(i);
        }
    }

    var form_second_count = "{{ $data2->count()}}";
    var second_form_array_counting = [];

    if(form_second_count == 0){
        var counting_2 = 0;
        second_form_array_counting.push(0);
    }else{
        var counting_2 = form_second_count*1 - 1;
        for(let i = 0; i < form_second_count ;i++){
            second_form_array_counting.push(i);
        }
    }
    
    var form_third_count = "{{ $data3->count()}}";
    var third_form_array_counting = [];

    if(form_third_count == 0){
        var counting_3 = 0;
        third_form_array_counting.push(0);
    }else{
        var counting_3 = form_third_count*1 - 1;
        for(let i = 0; i < form_third_count ;i++){
            third_form_array_counting.push(i);
        }
    }


    function getDetailTitle(selected_title){
        
        var project_title = '';
        
        @foreach($data as $p_key => $p_val)
            
        if(jQuery.inArray("{{$p_key}}", selected_title) == -1){
            project_title += '<option value="{{$p_key}}">{{$p_val}}</option>';
        }
    
        @endforeach
        
        return project_title;
    }
    
</script>

@endsection
