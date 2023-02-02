@extends('front.layouts.layout')
@section('page_specific_css')

<link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
<script>
    var selected_title = [];
    var selected_title_2 = [];
    var selected_title_3 = [];
    var selected_centers = [];
</script>
@endsection
@section('content')
<div class="manageInfracture" autoComplete="off">
    <div class="manageTable">

        <div class="alert alert-success message d-none">
            <strong>Success!</strong> {{ Session::get('message') }}
        </div>


        <div class="alert alert-danger error_message d-none">
            <strong>Danger!</strong> {{ Session::get('error_message') }}
        </div>
        {{-- Request::segment(5) --}}
        <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">            
            <select class="form-control form-select center_id center_change" id="project_center_id" name="infra_manage[0]project_center_id" style="width: 20%;">
                @foreach($centers as $p_key => $p_val)
                <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
                @endforeach
            </select>
        </form>

        <h3 class="d-flex justify-content-between flex-wrap align-items-center">
            Status of Infra work upto Award of Tender
            <button type="button" class="btn btn-outline-success first_form_add_btn">+ ADD</button>
        </h3>

        <form class="infra_manage_form">

            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            {{-- <th rowSpan="2">CENTERS</th> --}}
                            <th rowSpan="2">PROJECT ID / TITLE</th>
                            <th rowSpan="2">COST AS PER PE (IN CR.)</th>
                            <th rowSpan="2">DATE OF AA/ES</th>
                            <th rowSpan="2">AGENCY</th>
                            <th colSpan="5">DATE OF</th>
                            <th rowSpan="2">TENDER COST (IN CR.)</th>
                            <th rowSpan="2">REMARKS</th>
                            <th rowSpan="2">Remove</th>
                        </tr>
                        <tr>
                            {{-- <th>ISSUE OF TENDER</th> --}}
                            <th>TENDER FLOATED ON</th>
                            {{-- <th>RECEIPT OF TENDER</th> --}}
                            <th>BID SUBMISSION DEADLINE</th>
                            <th>TECH. BID OPENING</th>
                            <th>FIN. BID OPENING</th>
                            {{-- <th>AWARD</th> --}}
                            <th>AWARDING OF CONTRACT</th>
                        </tr>
                    </thead>
                    <tbody class="form_first_container">
                        @if($data_1->count())

                        @foreach($data_1 as $key => $value)
                        <script>
                            selected_title.push("{{$value->infra_id}}");
                        </script>
                        <tr class="row_{{$key}}">
                            <td>{{ $key + 1 }}</td>
                            <td>

                                    <input type="hidden" name="infra_manage[{{$key}}][id]" value="{{$value->id}}">
                                    <input type="hidden" name="infra_manage[{{$key}}][template_id]" value="{{$value->template_id}}">
                                    <input type="hidden" name="infra_manage[{{$key}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                    <select class="form-control project_title project_title_{{$key}}" data-id="{{$key}}" name ="infra_manage[{{$key}}][infra_id]" readonly>
                                       <option selected disabled>Project ID/Title</option>
                                       @foreach($project as $p_key => $p_val)
                                        <option value="{{$p_key}}" {{$p_key == $value->infrastructure->id ? 'selected' : 'disabled'}} >{{$p_val}}</option>
                                       @endforeach
                                    </select>
                                    <span class="text-danger error_project_title_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control cost cost_0" placeholder="Cost" name ="infra_manage[{{$key}}][cost]" value="{{$value->infrastructure->cost}}" readonly>
                                    <span class="text-danger error_cost_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control date date_{{$key}}" data-id="{{$key}}" name ="infra_manage[{{$key}}][date]" value="{{date('d-m-Y',strtotime($value->infrastructure->date))}}" data-date = "{{$value->infrastructure->date}}" readonly>
                                    <span class="text-danger error_date_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" class="form-control agency_id agency_id_{{$key}}" placeholder="Agency" name = "infra_manage[{{$key}}][agency_id]" value="{{$value->infrastructure->agency->name}}" autocomplete="off" readonly>
                                    <span class="text-danger error_agency_id_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" name="infra_manage[{{$key}}][date_of_issue]" value="{{date('d-m-Y',strtotime($value->date_of_issue))}}" data-id = "{{$key}}" class="form-control date_of_issue date_of_issue_{{$key}}" placeholder="dd-mm-yyyy" autocomplete="off">
                                    <span class="text-danger error_date_of_issue_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" name ="infra_manage[{{$key}}][date_of_receipt]" value="{{ isset($value->date_of_receipt) ? date('d-m-Y',strtotime($value->date_of_receipt)) : ''}}" data-id = "{{$key}}" class="form-control date_of_receipt date_of_receipt_{{$key}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                    <span class="text-danger error_date_of_receipt_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" name ="infra_manage[{{$key}}][date_of_tech_bid]" value="{{ isset($value->date_of_tech_bid) ? date('d-m-Y',strtotime($value->date_of_tech_bid)) : ''}}" data-id = "{{$key}}" class="form-control date_of_tech_bid date_of_tech_bid_{{$key}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                    <span class="text-danger error_date_of_tech_bid_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" name ="infra_manage[{{$key}}][date_of_financial_bid]" value="{{ isset($value->date_of_financial_bid) ? date('d-m-Y',strtotime($value->date_of_financial_bid)) : ''}}" data-id = "{{$key}}" class="form-control date_of_financial_bid date_of_financial_bid_{{$key}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                    <span class="text-danger error_date_of_tech_bid_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" name ="infra_manage[{{$key}}][date_of_work_award]" value="{{ isset($value->date_of_work_award) ? date('d-m-Y',strtotime($value->date_of_work_award)) : ''}}" data-id = "{{$key}}" class="form-control date_of_work_award date_of_work_award_{{$key}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                    <span class="text-danger error_date_of_work_award_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="number" min="0" step=any name ="infra_manage[{{$key}}][tender_cost]"  value="{{ isset($value->tender_cost) ? $value->tender_cost : ''}}"  data-id = "{{$key}}" class="form-control tender_cost_{{$key}}" placeholder="Tender Cost" autocomplete="off">
                                    <span class="text-danger error_tender_cost_{{$key}}"></span>
                                </td>
                                <td>
                                    <input type="text" name ="infra_manage[{{$key}}][remarks_1]"  value="{{ isset($value->remarks_1) ? $value->remarks_1 : ''}}" class="form-control remarks_1_{{$key}}" class="form-control" placeholder="Remarks" autocomplete="off">
                                    <span class="text-danger error_remarks_1_{{$key}}"></span>
                                </td>
                                <td>
                                    
                                    <a href="#" class="actionbtn remove_btn" data-id="{{$key}}" data-db_id = "{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else 
                            <tr class="row_0">
                                <td>1</td>
                                {{-- <td>                                    
                                    <select class="form-control center_title center_title_0" id="center_title" data-center_titleid='0' name ="infra_manage[0][project_center]" readonly autocomplete="off">                                    
                                       <option selected disabled>Centers</option>
                                       @foreach($centers as $p_key => $p_val)
                                        <option value="{{$p_key}}">{{$p_val}}</option>
                            @endforeach
                            </select>
                            <span class="text-danger error_project_center_0"></span>
                            </td> --}}
                            <td>
                                <input type="hidden" name="infra_manage[0][template_id]" value="{{$temp_id}}">
                                <input type="hidden" name="infra_manage[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                <select class="form-control project_title project_title_0" data-id="0" name="infra_manage[0][infra_id]" autocomplete="off">
                                    <option selected>Project ID/Title</option>
                                    @foreach($project as $p_key => $p_val)
                                    <option value="{{$p_key}}">{{$p_val}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error_project_title_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control cost cost_0" placeholder="Cost" name="infra_manage[0][cost]" readonly autocomplete="off">
                                <span class="text-danger error_cost_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control date date_0" data-id="0" name="infra_manage[0][date]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_date_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control agency agency_id_0" placeholder="Agency" name="infra_manage[0][agency_id]" readonly autocomplete="off">
                                <span class="text-danger error_agency_id_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra_manage[0][date_of_issue]" data-id="0" class="form-control date_of_issue date_of_issue_0" placeholder="dd-mm-yyyy" autocomplete="off">
                                <span class="text-danger error_date_of_issue_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra_manage[0][date_of_receipt]" data-id="0" class="form-control date_of_receipt date_of_receipt_0" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_date_of_receipt_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra_manage[0][date_of_tech_bid]" data-id="0" class="form-control date_of_tech_bid date_of_tech_bid_0" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_date_of_tech_bid_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra_manage[0][date_of_financial_bid]" data-id="0" class="form-control date_of_financial_bid date_of_financial_bid_0" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_date_of_tech_bid_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra_manage[0][date_of_work_award]" data-id="0" class="form-control date_of_work_award date_of_work_award_0" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_date_of_work_award_0"></span>
                            </td>
                            <td>
                                <input type="number" min="0" step=any name="infra_manage[0][tender_cost]" data-id="0" class="form-control tender_cost tender_cost_0" placeholder="Tender Cost" autocomplete="off">
                                <span class="text-danger error_tender_cost_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra_manage[0][remarks_1]" class="form-control remarks_1_0" class="form-control" placeholder="Remarks" autocomplete="off">
                                <span class="text-danger error_remarks_1_0"></span>
                            </td>
                            <td>

                                <a href="#" class="actionbtn remove_btn" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>

                        @endif

                    </tbody>
                    <tr>
                        <td colspan="13" class="text-end"><button type="submit" class="btn btn-warning px-md-4">Save</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="manageTable mt-4">
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">Status of Ongoing Infra Projects -
            Physical<button type="button" class="btn btn-outline-success second_form_add_btn">+ ADD</button></h3>
        <form class="infra_manage_form_two">
            <div class="table-responsive">
                <table class="text-center table table-bordered">
                    <thead>
                        <tr>
                            <th>SN.NO</th>
                            <th>PROJECT ID / TITLE</th>
                            <th>AGENCY</th>
                            <th>COST</th>
                            <th>WORK START DATE</th>
                            <th>CONTRACTUAL PROBABLE DATE <br> OF COMPLETION (PDC)</th>
                            <th colspan="2">EXPECTED PROGRESS (DATE)</th>
                            <th>PROGRESS (IN %)</th>
                            <th>CURRENT PDC</th>
                            <th>REMARKS</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="form_second_container">

                        @if($data_2->count())
                        @foreach($data_2 as $key => $value)
                        <script>
                            selected_title_2.push("{{$value->infra_id}}");
                        </script>
                        <tr class="row_two_{{$key}}">
                            <input type="hidden" name="infra_manage_two[{{$key}}][template_id]" value="{{$value->template_id}}">
                            <input type="hidden" name="infra_manage_two[{{$key}}][id]" value="{{$value->id}}">
                            <input type="hidden" name="infra_manage_two[{{$key}}][project_center_id]" value="{{ $centerid ?? ''}}">
                            <td rowspan="3">{{$key+1}}</td>
                            <td rowspan="3">
                                <select class="form-control project_title_two project_title_two_{{$key}}" name="infra_manage_two[{{$key}}][infra_id]" data-id="{{$key}}" autocomplete="off">
                                    <option selected disabled>Project ID/Title</option>
                                    @foreach($project_two as $p_key => $p_val)
                                    <option value="{{$p_key}}" {{$p_key == $value->infrastructure->id ? 'selected' : 'disabled'}}>{{$p_val}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error_project_title_two_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control agency_id_two agency_id_two_{{$key}}" placeholder="Agency" name="infra_manage_two[{{$key}}][agency_id]" value="{{$value->infrastructure->agency->name ?? ''}}" readonly autocomplete="off">
                                <span class="text-danger error_agency_id_two_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control cost_two cost_two_{{$key}}" placeholder="Cost" name="infra_manage_two[{{$key}}][cost]" value="{{$value->infrastructure->cost ?? ''}}" readonly autocomplete="off">
                                <span class="text-danger error_cost_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control work_start_date work_start_date_{{$key}}" data-id="{{$key}}" name="infra_manage_two[{{$key}}][work_start_date]" value="{{ isset($value->work_start_date) ? date('d-m-Y',strtotime($value->work_start_date)) : ''}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_work_start_date_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control cpdc_date cpdc_date_{{$key}}" data-id="{{$key}}" name="infra_manage_two[{{$key}}][cpdc_date]" value="{{ isset($value->cpdc_date) ? date('d-m-Y',strtotime($value->cpdc_date)) : ''}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_cpdc_date_{{$key}}"></span>
                            </td>
                            <td>25%</td>
                            <td>
                                <input type="text" class="form-control epd_25 epd_25_{{$key}}" data-id="{{$key}}" name="infra_manage_two[{{$key}}][epd_25]" value="{{ isset($value->epd_25) ? date('d-m-Y',strtotime($value->epd_25)) : ''}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_epd_25_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input placeholder="Progress %" type="text" name="infra_manage_two[{{$key}}][progress_percentage]" class="form-control progress_percentage progress_percentage_{{$key}}" value="{{$value->progress_percentage ?? ''}}" autocomplete="off">
                                <span class="text-danger error_progress_percentage_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input placeholder="Current PDC" type="text" class="form-control current_pdc current_pdc_{{$key}}" name="infra_manage_two[{{$key}}][current_pdc]" value="{{$value->current_pdc ?? ''}}" autocomplete="off">
                                <span class="text-danger error_current_pdc_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <input placeholder="Remark" type="text" class="form-control remarks_2 remarks_2_{{$key}}" name="infra_manage_two[{{$key}}][remarks_2]" value="{{$value->remarks_2 ?? ''}}" autocomplete="off">
                                <span class="text-danger error_remarks_2_{{$key}}"></span>
                            </td>
                            <td rowspan="3">
                                <a href="javascript:void(0)" class="actionbtn remove_btn_two" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr class="row_two_{{$key}}">
                            <td>50%</td>
                            <td>
                                <input type="text" class="form-control epd_50 epd_50_{{$key}}" data-id="{{$key}}" name="infra_manage_two[{{$key}}][epd_50]" value="{{ isset($value->epd_50) ? date('d-m-Y',strtotime($value->epd_50)) : ''}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_epd_50_{{$key}}"></span>
                            </td>
                        </tr>
                        <tr class="row_two_{{$key}} last_tr">
                            <td>75%</td>
                            <td>
                                <input type="text" class="form-control epd_75 epd_75_{{$key}}" data-id="{{$key}}" name="infra_manage_two[{{$key}}][epd_75]" value="{{ isset($value->epd_75) ? date('d-m-Y',strtotime($value->epd_75)) : ''}}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_epd_75_{{$key}}"></span>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        
                        <tr class="row_two_0">
                            <td rowspan="3">1</td>
                            <td rowspan="3">
                                <input type="hidden" name="infra_manage_two[0][template_id]" value="{{$temp_id}}">
                                <input type="hidden" name="infra_manage_two[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                <select class="form-control project_title_two project_title_two_0" name="infra_manage_two[0][infra_id]" data-id="0" autocomplete="off">
                                    <option selected disabled>Project ID/Title</option>
                                    @foreach($project_two as $p_key => $p_val)
                                    <option value="{{$p_key}}">{{$p_val}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error_project_title_two_0"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control agency_id_two agency_id_two_0" placeholder="Agency" name="infra_manage_two[0][agency_id]" readonly autocomplete="off">
                                <span class="text-danger error_agency_id_two_0"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control cost_two cost_two_0" placeholder="Cost" name="infra_manage_two[0][cost]" readonly autocomplete="off">
                                <span class="text-danger error_cost_0"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control work_start_date work_start_date_0" data-id="0" name="infra_manage_two[0][work_start_date]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_work_start_date_0"></span>
                            </td>
                            <td rowspan="3">
                                <input type="text" class="form-control cpdc_date cpdc_date_0" data-id="0" name="infra_manage_two[0][cpdc_date]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_cpdc_date_0"></span>
                            </td>
                            <td>25%</td>
                            <td>
                                <input type="text" class="form-control epd_25 epd_25_0" data-id="0" name="infra_manage_two[0][epd_25]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_epd_25_0"></span>
                            </td>
                            <td rowspan="3">
                                <input placeholder="Progress %" type="text" name="infra_manage_two[0][progress_percentage]" class="form-control progress_percentage_0" autocomplete="off">
                                <span class="text-danger error_progress_percentage_0"></span>
                            </td>
                            <td rowspan="3">
                                <input placeholder="Current PDC" type="text" class="form-control current_pdc current_pdc_0" name="infra_manage_two[0][current_pdc]" autocomplete="off">
                                <span class="text-danger error_current_pdc_0"></span>
                            </td>
                            <td rowspan="3">
                                <input placeholder="Remark" type="text" class="form-control remarks_2 remarks_2_0" name="infra_manage_two[0][remarks_2]" autocomplete="off">
                                <span class="text-danger error_remarks_2_0"></span>
                            </td>
                            <td rowspan="3">
                                <a href="javascript:void(0)" class="actionbtn remove_btn_two" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <tr class="row_two_0">
                            <td>50%</td>
                            <td>
                                <input type="text" class="form-control epd_50 epd_50_0" data-id="0" name="infra_manage_two[0][epd_50]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_epd_50_0"></span>
                            </td>
                        </tr>
                        <tr class="row_two_0 last_tr">
                            <td>75%</td>
                            <td>
                                <input type="text" class="form-control epd_75 epd_75_0" data-id="0" name="infra_manage_two[0][epd_75]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                <span class="text-danger error_epd_75_0"></span>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                    <tr>
                        <td colspan="12" class="text-end">
                            <button type="submit" class="btn btn-warning px-md-4">Save</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="manageTable mt-4 mb-3">
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">Status of Ongoing infra projects -
            Financial<button type="button" class="btn btn-outline-success third_form_add_btn">+ ADD</button></h3>
        <form class="infra_manage_form_three">
            <div class="table-responsive">
                <table class="text-center table table-bordered">
                    <thead>
                        <tr>
                            <th>SN.NO</th>
                            <th>PROJECT ID / TITLE</th>
                            <th>AGENCY</th>
                            <th>TENDER COST <br> (IN CR.)</th>
                            <th>FUND RELEASED TILL DATE <br> (TO AGENCY) (IN CR.)</th>
                            <th>FUNDS / PERCENTAGE OF <br> FUNDS UTILISED</th>
                            <th>UC STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="form_third_container">
                        @if($data_3->count())
                        @foreach($data_3 as $key => $value)
                        <script>
                            selected_title_3.push("{{$value->infra_id}}");
                        </script>
                        <tr class="row_three_{{$key}}">
                            <input type="hidden" name="infra_manage_three[{{$key}}][id]" value="{{$value->id}}">
                            <td>{{$key+1}}</td>
                            <td>
                                <input type="hidden" name="infra_manage_three[{{$key}}][template_id]" value="{{$value->template_id}}">
                                <input type="hidden" name="infra_manage_three[{{$key}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                <select class="form-select project_title_three project_title_three_{{$key}}" name="infra_manage_three[{{$key}}][infra_id]" data-id="{{$key}}" autocomplete="off">
                                    <option selected disabled>Project ID/Title</option>
                                    @foreach($project_three as $p_key => $p_val)
                                    <option value="{{$p_key}}" {{$p_key == $value->infrastructure->id ? 'selected' : 'disabled'}}>{{$p_val}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error_project_title_three_{{$key}}"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control agency_id_three agency_id_three_{{$key}}" placeholder="Agency" name="infra_manage_three[{{$key}}][agency_id]" value="{{$value->infrastructure->agency->name ?? ''}}" readonly autocomplete="off">
                                <span class="text-danger error_agency_id_three_{{$key}}"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control cost_three cost_three_{{$key}}" placeholder="Cost" name="infra_manage_three[{{$key}}][cost]" value="{{$value->infrastructure->cost ?? ''}}" readonly autocomplete="off">
                                <span class="text-danger error_cost_three_{{$key}}"></span>
                            </td>
                            <td>
                                <input placeholder="Fund Release" type="text" class="form-control fund_release fund_release_{{$key}}" name="infra_manage_three[{{$key}}][fund_release]" value="{{$value->fund_release ?? ''}}" autocomplete="off">
                                <span class="text-danger error_fund_release_{{$key}}"></span>
                            </td>
                            <td>
                                <input placeholder="Fund/Percentage" type="text" class="form-control utilised_fund_percentage utilised_fund_percentage_{{$key}}" name="infra_manage_three[{{$key}}][utilised_fund_percentage]" value="{{$value->utilised_fund_percentage ?? ''}}" autocomplete="off">
                                <span class="text-danger error_utilised_fund_percentage_{{$key}}"></span>
                            </td>
                            <td>
                                <select class="form-control uc_status uc_status_{{$key}}" name="infra_manage_three[{{$key}}][uc_status]">
                                    <option selected disabled> Select UC Status </option>
                                    <option value="1" {{($value->uc_status == 1 ? 'selected' : '')}}>Submitted</option>
                                    <option value="0" {{($value->uc_status == 0 ? 'selected' : '')}}>Pending</option>
                                </select>
                                <span class="text-danger error_uc_status_{{$key}}"></span>
                            </td>
                            <td>

                                <a href="javascript:void(0)" class="actionbtn remove_btn_three" data-id="{{$key}}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="row_three_0">
                            <td>1</td>
                            <td>
                                <input type="hidden" name="infra_manage_three[0][template_id]" value="{{$temp_id}}">
                                <input type="hidden" name="infra_manage_three[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                <select class="form-select project_title_three project_title_three_0" name="infra_manage_three[0][infra_id]" data-id="0" autocomplete="off">
                                    <option selected disabled>Project ID/Title</option>
                                    @foreach($project_three as $p_key => $p_val)
                                    <option value="{{$p_key}}">{{$p_val}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error_project_title_three_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control agency_id_three agency_id_three_0" placeholder="Agency" name="infra_manage_three[0][agency_id]" readonly autocomplete="off">
                                <span class="text-danger error_agency_id_three_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control cost_three cost_three_0" placeholder="Cost" name="infra_manage_three[0][cost]" readonly autocomplete="off">
                                <span class="text-danger error_cost_three_0"></span>
                            </td>
                            <td>
                                <input placeholder="Fund Release" type="text" class="form-control fund_release fund_release_0" name="infra_manage_three[0][fund_release]" autocomplete="off">
                                <span class="text-danger error_fund_release_0"></span>
                            </td>
                            <td>
                                <input placeholder="Fund/Percentage" type="text" class="form-control utilised_fund_percentage utilised_fund_percentage_0" name="infra_manage_three[0][utilised_fund_percentage]" autocomplete="off">
                                <span class="text-danger error_utilised_fund_percentage_0"></span>
                            </td>
                            <td>
                                <select class="form-control uc_status uc_status_0" name="infra_manage_three[0][uc_status]">
                                    <option selected disabled> Select UC Status </option>
                                    <option value="1">Submitted</option>
                                    <option value="0">Pending</option>
                                </select>
                                <span class="text-danger error_uc_status_0"></span>
                            </td>
                            <td>

                                <a href="javascript:void(0)" class="actionbtn remove_btn_three" data-id="0" data-db_id="0"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                    <tr>
                        <td colspan="8" class="text-start"><span class="ps-1">Total</span></td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-end">
                            <button type="submit" class="btn btn-warning px-md-4">Save</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection
@section('page_specific_js')

<script src="{{asset('public/front/js/plugin/common.js')}}"></script>
<script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>

<script>
    var temp_id = "{{$temp_id}}";
    var encode_temp_id = "{{encode5t($temp_id)}}";
    $(document).ready(function() {
        $('#masterInfra').DataTable({});
    });

    var form_first_count = "{{$data_1->count()}}";
    var form_second_count = "{{$data_2->count()}}";
    var form_third_count = "{{$data_3->count()}}";
    var first_form_array_counting = [];
    var second_form_array_counting = [];
    var third_form_array_counting = [];
    if (form_first_count == 0) {
        var counting = 0;
        first_form_array_counting.push(0);
    } else {
        var counting = form_first_count * 1 - 1;
        for (let i = 0; i < form_first_count; i++) {
            first_form_array_counting.push(i);
        }
    }
    if (form_second_count == 0) {
        var counting_2 = 0;
        second_form_array_counting.push(0);
    } else {
        var counting_2 = form_second_count * 1 - 1;
        for (let i = 0; i < form_second_count; i++) {
            second_form_array_counting.push(i);
        }
    }
    if (form_third_count == 0) {
        var counting_3 = 0;
        third_form_array_counting.push(0);
    } else {
        var counting_3 = form_third_count * 1 - 1;
        for (let i = 0; i < form_third_count; i++) {
            third_form_array_counting.push(i);
        }
    }

    function getProjectTitle(selected_title) {
        var project_title = '';
        @foreach($project as $p_key => $p_val)

        if (jQuery.inArray("{{$p_key}}", selected_title) == -1) {
            project_title += '<option value="{{$p_key}}">{{$p_val}}</option>';
        }

        @endforeach
        return project_title;
    }

    function getProjectCenters(selected_centers) {

        var project_centers = '';

        @foreach($centers as $p_key => $p_val)

        if (jQuery.inArray("{{$p_key}}", selected_centers) == -1) {

            selected_centers += '<option value="{{$p_key}}">{{$p_val}}</option>';

        }

        @endforeach

        return selected_centers;
    }



    //console.log("first - "+selected_title_2);
    function getProjectTitle2(selected_title_2) {
        var project_title_2 = '';
        @foreach($project_two as $p_key => $p_val)
        // console.log("{{$p_key}}");
        if (jQuery.inArray("{{$p_key}}", selected_title_2) == -1) {
            project_title_2 += '<option value="{{$p_key}}">{{$p_val}}</option>';
        }

        @endforeach
        return project_title_2;
    }
    var project_title_3 = '';

    function getProjectTitle3(selected_title_3) {
        var project_title_3 = '';
        @foreach($project_three as $p_key => $p_val)
        // console.log("{{$p_key}}");
        if (jQuery.inArray("{{$p_key}}", selected_title_3) == -1) {
            project_title_3 += '<option value="{{$p_key}}">{{$p_val}}</option>';
        }

        @endforeach
        return project_title_3;
    }
</script>
<script src="{{asset('public/front/js/manage/infra_form_1.js')}}"></script>
<script src="{{asset('public/front/js/manage/infra_form_2.js')}}"></script>
<script src="{{asset('public/front/js/manage/infra_form_3.js')}}"></script>
@endsection