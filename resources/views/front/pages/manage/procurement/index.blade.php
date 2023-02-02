@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
    <script>
        var selected_title = [];
        var selected_title_2 = [];
        var selected_title_5 = [];
    </script>
@endsection
@section('content')
<form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">
    <?php $centerid = Request::segment(5); ?>
    <select class="form-control form-select center_id center_change" id="project_center_id"  name="infra_manage[0]project_center_id" style="width: 20%;">
        {{-- <option>Centers</option> --}}
            @foreach($centers as $p_key => $p_val)
                <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
            @endforeach
     </select>
</form>
    <div class="manageInfracture">
       

        <div class="manageTable mb-5">
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                STATUS OF FUNDS FOR EQUIPMENT PROCUREMENT
                <!-- <button type="button" class="btn btn-outline-success" onClick={handleAddFields}>+ ADD</button> -->
            </h3>
            <form id="first_form">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th rowSpan="2">S. NO</th>
                                <th rowSpan="2" class="text-start">PARTCULARS</th>

                                <th colSpan="2">BUDGETHEAD</th>

                            </tr>
                            <tr>

                                <th>SPORTS EQUIPMENT</th>
                                <th>SPORTS SCIENCE EQUIPMENT</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="text-start">
                                    Opening Balance
                                </td>
                                <td>
                                    <input type="hidden" name="project_center_id" value="{{ $centerid ?? ''}}">
                                    <input type="hidden" name="template_id" value="{{ $temp_id }}">
                                    @if (isset($data_1))
                                        <input type="hidden" name="id" value="{{ $data_1->id ?? '' }}">
                                    @endif
                                    <input type="number" step=any name="se_opening_balance"
                                        value="{{ $data_1->se_opening_balance ?? '' }}"
                                        class="form-control allownumeric se_opening_balance" placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_opening_balance"></span>
                                </td>
                                <td>
                                    <input type="number" step=any name="sse_opening_balance"
                                        value="{{ $data_1->sse_opening_balance ?? '' }}"
                                        class="form-control allownumeric sse_opening_balance" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_opening_balance"></span>
                                </td>

                            </tr>

                            <tr>
                                <td>2</td>
                                <td class="text-start">
                                    Administrative approval (including budget) of HO received (Rs) – Sports Science
                                </td>
                                <td>
                                    <input type="number" step=any name="se_administrative_approval_budget"
                                        value="{{ $data_1->se_administrative_approval_budget ?? '' }}"
                                        class="form-control se_administrative_approval_budget" placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_administrative_approval_budget"></span>
                                </td>
                                <td>
                                    <input type="number" step=any name="sse_administrative_approval_budget"
                                        value="{{ $data_1->sse_administrative_approval_budget ?? '' }}"
                                        class="form-control sse_administrative_approval_budget" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_administrative_approval_budget"></span>
                                </td>

                            </tr>

                            <tr>
                                <td>3</td>
                                <td class="text-start">
                                    Funds transferred during Current FY (Rs) - Sports Science
                                </td>
                                <td>
                                    <input type="number" step=any name="se_fund_transfer"
                                        value="{{ $data_1->se_fund_transfer ?? '' }}" class="form-control se_fund_transfer"
                                        placeholder="">
                                    <span class="text-danger error_se_fund_transfer"></span>
                                </td>
                                <td>
                                    <input type="number" step=any name="sse_fund_transfer"
                                        value="{{ $data_1->sse_fund_transfer ?? '' }}"
                                        class="form-control sse_fund_transfer" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_fund_transfer"></span>
                                </td>

                            </tr>

                            <tr>
                                <td>04</td>
                                <td class="text-start">
                                    Total fund available for Sports Science (1+3)
                                </td>
                                <td>
                                    <input type="number" step=any name="se_total_fund_available"
                                        value="{{ $data_1->se_total_fund_available ?? '' }}"
                                        class="form-control se_total_fund_available" placeholder="" readonly autocomplete="off">
                                    <span class="text-danger error_se_total_fund_available"></span>
                                </td>
                                <td>
                                    <input type="number" step=any name="sse_total_fund_available"
                                        value="{{ $data_1->sse_total_fund_available ?? '' }}"
                                        class="form-control sse_total_fund_available" placeholder="" readonly autocomplete="off">
                                    <span class="text-danger error_sse_total_fund_available"></span>
                                </td>

                            </tr>
                            <tr>
                                <td>05</td>
                                <td class="text-start">
                                    Funds requirement (if any) (4-2)
                                </td>
                                <td>
                                    <input type="number" step=any name="se_fund_requirement"
                                        value="{{ $data_1->se_fund_requirement ?? '' }}"
                                        class="form-control se_fund_requirement" placeholder="" readonly autocomplete="off">
                                    <span class="text-danger error_se_fund_requirement"></span>
                                </td>
                                <td>
                                    <input type="number" step=any name="sse_fund_requirement"
                                        value="{{ $data_1->sse_fund_requirement ?? '' }}"
                                        class="form-control sse_fund_requirement" placeholder="" readonly autocomplete="off">
                                    <span class="text-danger error_sse_fund_requirement"></span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="12" class="text-end">
                                    <button type="submit" class="btn btn-warning px-md-4">Save</button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5">
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                STATUS OF BUDGET FOR EQUIPMENT PROCUREMENT AT THE END OF THE MONTH

            </h3>
            <form id="second_form">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th rowSpan="2">S. NO</th>
                                <th rowSpan="2" class="text-start">DETAILS</th>
                                <th colspan="3">COST AS PER PE (IN CR.)</th>
                                <th rowSpan="2">AMOUNT RECEIVED FROM HQ</th>
                                <th rowSpan="2">AMOUNT INCURRED ON PROCUREMENT OF EQUIPMENT (IN RS)</th>
                                <th rowspan="2">PROCUREMENT UNDER PROCESS (AMOUNT IN RS)</th>
                                <th rowSpan="2">UTILISATION PLAN OF EMAINING FUNDS (IN RS)</th>
                                <th rowSpan="2">FUNDS REQUIREMENT/ EXCESS APART FROM APPROVED BUDGET IN COLUMN III(IN
                                    RS)
                                </th>
                                <th rowSpan="2">REMARKS</th>
                            </tr>
                            <tr>
                                <th>NCOE</th>
                                <th>STC</th>
                                <th>TOTAL</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="text-start">
                                    Sports Equipment
                                </td>
                                <td>
                                    <input type="hidden" name="template_id" value="{{ $temp_id }}">
                                    <input type="hidden" name="project_center_id" value="{{ $centerid ?? ''}}">
                                    @if (isset($data_2))
                                        <input type="hidden" name="id" value="{{ $data_2->id }}">
                                    @endif
                                    <input type="number" step=any class="form-control se_ncoe_cost" name="se_ncoe_cost"
                                        value="{{ $data_2->se_ncoe_cost ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_ncoe_cost"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control se_stc_cost" name="se_stc_cost"
                                        value="{{ $data_2->se_stc_cost ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_stc_cost"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control se_total_cost"
                                        name="se_total_cost" value="{{ $data_2->se_total_cost ?? '' }}" placeholder=""
                                        readonly autocomplete="off">
                                    <span class="text-danger error_se_total_cost"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control se_amt_recive_from_hq"
                                        name="se_amt_recive_from_hq" value="{{ $data_2->se_amt_recive_from_hq ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_amt_recive_from_hq"></span>
                                </td>
                                <td>
                                    <input type="number" step=any
                                        class="form-control se_amt_incurred_on_procurement_of_equipment"
                                        name="se_amt_incurred_on_procurement_of_equipment"
                                        value="{{ $data_2->se_amt_incurred_on_procurement_of_equipment ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_amt_incurred_on_procurement_of_equipment"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control se_procurement_under_process_amt"
                                        name="se_procurement_under_process_amt"
                                        value="{{ $data_2->se_procurement_under_process_amt ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_procurement_under_process_amt"></span>
                                </td>
                                <td>
                                    <input type="number" step=any
                                        class="form-control se_utilisation_plan_of_remaining_funds"
                                        name="se_utilisation_plan_of_remaining_funds"
                                        value="{{ $data_2->se_utilisation_plan_of_remaining_funds ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_utilisation_plan_of_remaining_funds"></span>
                                </td>
                                <td>
                                    <input type="number" step=any
                                        class="form-control se_funds_requirement_from_approved_budget"
                                        name="se_funds_requirement_from_approved_budget"
                                        value="{{ $data_2->se_funds_requirement_from_approved_budget ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_funds_requirement_from_approved_budget"></span>
                                </td>

                                <td>
                                    <input type="text" class="form-control se_remarks" name="se_remarks"
                                        value="{{ $data_2->se_remarks ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_se_remarks"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="text-start">
                                    Sports Science Equipment
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control sse_ncoe_cost"
                                        name="sse_ncoe_cost" value="{{ $data_2->sse_ncoe_cost ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_ncoe_cost"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control sse_stc_cost" name="sse_stc_cost"
                                        value="{{ $data_2->sse_stc_cost ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_stc_cost"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control sse_total_cost"
                                        name="sse_total_cost" value="{{ $data_2->sse_total_cost ?? '' }}" placeholder=""
                                        readonly autocomplete="off">
                                    <span class="text-danger error_sse_total_cost"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control sse_amt_recive_from_hq"
                                        name="sse_amt_recive_from_hq" value="{{ $data_2->sse_amt_recive_from_hq ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_amt_recive_from_hq"></span>
                                </td>
                                <td>
                                    <input type="number" step=any
                                        class="form-control sse_amt_incurred_on_procurement_of_equipment"
                                        name="sse_amt_incurred_on_procurement_of_equipment"
                                        value="{{ $data_2->sse_amt_incurred_on_procurement_of_equipment ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_amt_incurred_on_procurement_of_equipment"></span>
                                </td>
                                <td>
                                    <input type="number" step=any class="form-control sse_procurement_under_process_amt"
                                        name="sse_procurement_under_process_amt"
                                        value="{{ $data_2->sse_procurement_under_process_amt ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_procurement_under_process_amt"></span>
                                </td>
                                <td>
                                    <input type="number" step=any
                                        class="form-control sse_utilisation_plan_of_remaining_funds"
                                        name="sse_utilisation_plan_of_remaining_funds"
                                        value="{{ $data_2->sse_utilisation_plan_of_remaining_funds ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_utilisation_plan_of_remaining_funds"></span>
                                </td>
                                <td>
                                    <input type="number" step=any
                                        class="form-control sse_funds_requirement_from_approved_budget"
                                        name="sse_funds_requirement_from_approved_budget"
                                        value="{{ $data_2->sse_funds_requirement_from_approved_budget ?? '' }}"
                                        placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_funds_requirement_from_approved_budget"></span>
                                </td>

                                <td>
                                    <input type="text" class="form-control sse_remarks" name="sse_remarks"
                                        value="{{ $data_2->sse_remarks ?? '' }}" placeholder="" autocomplete="off">
                                    <span class="text-danger error_sse_funds_requirement_from_approved_budget"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="text-end">
                                    <button type="submit" class="btn btn-warning px-md-4">Save</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5">
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                EQUIPMENT PROCUREMENT STATUS
                <button type="button" class="btn btn-outline-success third_form_add_btn">+ ADD</button>
            </h3>
            <form id="third_form">
                <div class="table-responsive">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th rowSpan="2">SN.NO</th>
                                <th rowSpan="2" class="text-start">PROCUREMENT DETAILS*</th>
                                <th rowspan="2" class="text-start">SPECS. FINALIZED (YES/NO)</th>
                                <th rowSpan="2" class="text-start">TENDER TYPE (OPEN/ LIMITED/ PAC)</th>
                                <th rowSpan="2" class="text-start">ESTIMATED VALUE IN LAKHS</th>
                                <th colspan="6">DATE OF</th>
                                <th rowSpan="2" class="text-start">TENDER VALUE IN LAKHS</th>
                                <th rowSpan="2">REMARKS</th>
                                <th rowSpan="2">Remove</th>

                            </tr>
                            <tr>
                                <th>SPECS FINALISATION</th>
                                <th>FLOATING TENDER</th>
                                <th>OPENING TENDER</th>
                                <th>TECH. EVAL.</th>
                                <th>FIN. EVAL.</th>
                                <th>ORDER PLACEMENT</th>

                            </tr>
                        </thead>
                        <tbody class="form_third_container">
                            @if ($data_3->count())
                                @foreach ($data_3 as $key => $value)
                                    <script>
                                        selected_title.push("{{ $value->title_id }}");
                                    </script>
                                    <tr class="row_0">
                                        <td>{{ $key + 1 }}</td>

                                        <td class="text-start">

                                            <input type="hidden" name="pro[{{ $key }}][template_id]" value="{{ $value->template_id }}" autocomplete="off">
                                            <input type="hidden" name="pro[{{ $key }}][id]" value="{{ $value->id }}" autocomplete="off">
                                            <input type="hidden" name="pro[{{ $key }}][project_center_id]" value="{{ $centerid ?? ''}}">
                                            <select class="form-control changes_forth_form title_id title_id_{{ $key }}"
                                                data-id="{{ $key }}" name="pro[{{ $key }}][title_id]">
                                                <option selected disabled>Select</option>
                                                @foreach ($title_list as $k => $val)
                                                    <option value="{{ $k }}"
                                                        @if ($k == $value->title_id) selected @endif>
                                                        {{ $val }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error_title_id_{{ $key }}"></span>
                                        </td>
                                        <td class="text-start">
                                            <select class="form-control specs_finalized_{{ $key }}"
                                                name="pro[{{ $key }}][specs_finalized]">
                                                <option selected disabled>Select</option>
                                                <option value="yes" @if ($value->specs_finalized == 'yes') selected @endif>
                                                    {{ __('Yes') }}</option>
                                                <option value="no" @if ($value->specs_finalized == 'no') selected @endif>
                                                    {{ __('No') }}</option>

                                            </select>
                                            <span class="text-danger error_specs_finalized_0"></span>
                                        </td>
                                        <td class="text-start">
                                            <select class="form-control tender_type_{{ $key }}"
                                                name="pro[{{ $key }}][tender_type]">
                                                <option selected disabled>Select</option>
                                                <option value="open" @if ($value->tender_type == 'open') selected @endif>
                                                    {{ __('Open') }}</option>
                                                <option value="limited" @if ($value->tender_type == 'limited') selected @endif>
                                                    {{ __('Limited') }}</option>
                                                <option value="pac" @if ($value->tender_type == 'pac') selected @endif>
                                                    {{ __('PAC') }}</option>

                                            </select>
                                            <span class="text-danger error_tender_type_{{ $key }}"></span>
                                        </td>


                                        <td>
                                            <input type="number" step=any
                                                name="pro[{{ $key }}][estimated_value]"
                                                class="form-control estimated_value_{{ $key }}"
                                                value="{{ $value->estimated_value ?? '' }}" placeholder=""
                                                autocomplete="off">
                                            <span class="text-danger error_estimated_value_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro[{{ $key }}][specs_finalization_date]"
                                                class="form-control specs_finalization_date specs_finalization_date_{{ $key }}"
                                                data-id="{{ $key }}" placeholder="dd-mm-yyyy"
                                                value="{{ isset($value->specs_finalization_date) ? date('d-m-Y', strtotime($value->specs_finalization_date)) : '' }}"
                                                autocomplete="off">
                                            <span
                                                class="text-danger error_specs_finalization_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][floating_tender_date]"
                                                value="{{ isset($value->floating_tender_date) ? date('d-m-Y', strtotime($value->floating_tender_date)) : '' }}"
                                                class="form-control floating_tender_date floating_tender_date_{{ $key }}"
                                                data-id="{{ $key }}" placeholder="dd-mm-yyyy" readonly
                                                autocomplete="off">
                                            <span
                                                class="text-danger error_floating_tender_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][opening_tender_date]"
                                                value="{{ isset($value->opening_tender_date) ? date('d-m-Y', strtotime($value->opening_tender_date)) : '' }}"
                                                class="form-control opening_tender_date opening_tender_date_{{ $key }}"
                                                data-id="{{ $key }}" placeholder="dd-mm-yyyy" readonly
                                                autocomplete="off">
                                            <span
                                                class="text-danger error_opening_tender_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][tech_eval_date]"
                                                value="{{ isset($value->tech_eval_date) ? date('d-m-Y', strtotime($value->tech_eval_date)) : '' }}"
                                                class="form-control tech_eval_date_{{ $key }} tech_eval_date"
                                                data-id="{{ $key }}" placeholder="dd-mm-yyyy" readonly
                                                autocomplete="off">
                                            <span class="text-danger error_tech_eval_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][final_eval_date]"
                                                value="{{ isset($value->final_eval_date) ? date('d-m-Y', strtotime($value->final_eval_date)) : '' }}"
                                                class="form-control final_eval_date_{{ $key }} final_eval_date"
                                                data-id="{{ $key }}" placeholder="dd-mm-yyyy" readonly
                                                autocomplete="off">
                                            <span class="text-danger error_final_eval_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][order_placement_date]"
                                                value="{{ isset($value->order_placement_date) ? date('d-m-Y', strtotime($value->order_placement_date)) : '' }}"
                                                class="form-control order_placement_date_{{ $key }} order_placement_date"
                                                data-id="{{ $key }}" placeholder="dd-mm-yyyy" readonly
                                                autocomplete="off">
                                            <span
                                                class="text-danger error_order_placement_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="nubmer" step=any name="pro[{{ $key }}][tender_value]"
                                                value="{{ $value->tender_value ?? '' }}"
                                                class="form-control tender_value_{{ $key }}"
                                                data-id="{{ $key }}" placeholder="" >
                                            <span class="text-danger error_tender_value_{{ $key }}"></span>
                                        </td>

                                        <td>
                                            <input type="text" name="pro[{{ $key }}][remarks]"
                                                value="{{ $value->remarks ?? '' }}"
                                                class="form-control remarks_{{ $key }}"
                                                data-id="{{ $key }}" placeholder="" autocomplete="off">
                                            <span class="text-danger error_remarks_{{ $key }}"></span>

                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_btn"
                                                data-id="{{ $key }}" data-db_id="{{ $value->id }}"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="row_0">
                                    <td>1</td>

                                    <td class="text-start">
                                        <input type="hidden" name="pro[0][template_id]" value="{{ $temp_id }}" autocomplete="off">
                                        <input type="hidden" name="pro[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <select class="form-control title_id title_id_0 changes_forth_form" data-id="0" name="pro[0][title_id]">
                                            <option selected disabled>Select</option>
                                            @foreach ($title_list as $k => $val)
                                                <option value="{{ $k }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error_title_id_0"></span>
                                    </td>
                                    <td class="text-start">
                                        <select class="form-control specs_finalized_0" name="pro[0][specs_finalized]">
                                            <option selected disabled>Select</option>
                                            <option value="yes">{{ __('Yes') }}</option>
                                            <option value="no">{{ __('No') }}</option>

                                        </select>
                                        <span class="text-danger error_specs_finalized_0"></span>
                                    </td>
                                    <td class="text-start">
                                        <select class="form-control tender_type_0" name="pro[0][tender_type]">
                                            <option selected disabled>Select</option>
                                            <option value="open">{{ __('Open') }}</option>
                                            <option value="limited">{{ __('Limited') }}</option>
                                            <option value="pac">{{ __('PAC') }}</option>

                                        </select>
                                        <span class="text-danger error_tender_type_0"></span>
                                    </td>


                                    <td>
                                        <input type="number" step=any name="pro[0][estimated_value]"
                                            class="form-control estimated_value_0" placeholder="" autocomplete="off">
                                        <span class="text-danger error_estimated_value_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][specs_finalization_date]"
                                            class="form-control specs_finalization_date specs_finalization_date_0"
                                            data-id="0" placeholder="dd-mm-yyyy" autocomplete="off">
                                        <span class="text-danger error_specs_finalization_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][floating_tender_date]"
                                            class="form-control floating_tender_date floating_tender_date_0"
                                            data-id="0" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_floating_tender_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][opening_tender_date]"
                                            class="form-control opening_tender_date opening_tender_date_0" data-id="0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_opening_tender_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][tech_eval_date]"
                                            class="form-control tech_eval_date_0 tech_eval_date" data-id="0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_tech_eval_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][final_eval_date]"
                                            class="form-control final_eval_date_0 final_eval_date" data-id="0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_final_eval_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][order_placement_date]"
                                            class="form-control order_placement_date_0 order_placement_date"
                                            data-id="0" placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_order_placement_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="nubmer" step=any name="pro[0][tender_value]"
                                            class="form-control tender_value_0" data-id="0" placeholder="">
                                        <span class="text-danger error_tender_value_0" autocomplete="off"></span>
                                    </td>

                                    <td>
                                        <input type="text" name="pro[0][remarks]" class="form-control remarks_0"
                                            data-id="0" placeholder="" autocomplete="off">
                                        <span class="text-danger error_remarks_0"></span>

                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="actionbtn remove_btn" data-id="0"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endif



                        </tbody>
                        <tr>
                            <td colspan="14" class="text-end">
                                <button type="submit" class="btn btn-warning px-md-4">Save</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5">
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                STATUS AFTER WORK ORDER PLACED FOR EQUIPMENT
                <button type="button" class="btn btn-outline-success fourth_form_add_btn">+ ADD</button>
            </h3>
            <form id="fourth_form">
                <div class="table-responsive">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th rowSpan="2">SN.NO</th>
                                <th rowSpan="2" class="text-start">DESCRIPTION</th>
                                <th rowspan="2" class="text-start">BUDGET HEAD</th>
                                <th rowSpan="2" class="text-start">CONTRACT VALUE</th>

                                <th colspan="7">DATE OF</th>
                                <th rowSpan="2">REMARKS</th>
                                <th rowSpan="2">REMOVE</th>

                            </tr>
                            <tr>
                                <th>ISSUE OF ORDER</th>
                                <th>DELIVERY**</th>
                                <th>INSTALLATION (IF APPLICABLE)</th>
                                <th>SATISFACTORY CERTIFICATE RECEIPT</th>
                                <th>INVOICE RECEIPT</th>
                                <th>APPROVAL OF PAYMENT</th>
                                <th>PAYMENT RELEASE</th>


                            </tr>
                        </thead>
                        <tbody class="form_fourth_container">
                            @if ($data_4->count())
                                @foreach ($data_4 as $key => $value)
                                    <script>
                                        selected_title_2.push("{{ $value->title_id }}");
                                    </script>
                                    <tr class="row_2_{{ $key }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-start">
                                            <input type="hidden" name="pro[{{ $key }}][template_id]" value="{{ $value->template_id }}">
                                            <input type="hidden" name="pro[{{ $key }}][id]" value="{{ $value->id }}">
                                            <input type="hidden" name="pro[{{ $key }}][project_center_id]" value="{{ $centerid ?? ''}}">
                                            <select class="form-control changes_forth_form title_id_two title_id_two_{{ $key }}"
                                                data-id="{{ $key }}"
                                                name="pro[{{ $key }}][title_id_two]">
                                                <option selected disabled>Select</option>
                                                @foreach ($title_list_2 as $k => $val)
                                                    <option value="{{ $k }}"
                                                        @if ($k == $value->title_id) selected @endif>
                                                        {{ $val }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error_title_id_two_{{ $key }}"></span>
                                        </td>


                                        <td>
                                            <input type="number" step=any name="pro[{{ $key }}][budget_head]"
                                                value="{{ $value->budget_head ?? '' }}"
                                                class="form-control budget_head budget_head_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span class="text-danger error_budget_head_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="number" step=any
                                                name="pro[{{ $key }}][contract_amount]"
                                                value="{{ $value->contract_amount ?? '' }}"
                                                class="form-control contract_amount contract_amount_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span class="text-danger error_contract_amount_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][issue_of_order_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->issue_of_order_date) ? date('d-m-Y', strtotime($value->issue_of_order_date)) : '' }}"
                                                class="form-control issue_of_order_date issue_of_order_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span
                                                class="text-danger error_issue_of_order_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][delivery_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->delivery_date) ? date('d-m-Y', strtotime($value->delivery_date)) : '' }}"
                                                class="form-control delivery_date delivery_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span class="text-danger error_delivery_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][installation_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->installation_date) ? date('d-m-Y', strtotime($value->installation_date)) : '' }}"
                                                class="form-control installation_date installation_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span class="text-danger error_installation_date_0"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro[{{ $key }}][satisfactory_certificate_receipt_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->satisfactory_certificate_receipt_date) ? date('d-m-Y', strtotime($value->satisfactory_certificate_receipt_date)) : '' }}"
                                                class="form-control satisfactory_certificate_receipt_date satisfactory_certificate_receipt_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span
                                                class="text-danger error_satisfactory_certificate_receipt_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][invoice_receipt_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->invoice_receipt_date) ? date('d-m-Y', strtotime($value->invoice_receipt_date)) : '' }}"
                                                class="form-control invoice_receipt_date invoice_receipt_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span
                                                class="text-danger error_invoice_receipt_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro[{{ $key }}][approval_of_payment_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->approval_of_payment_date) ? date('d-m-Y', strtotime($value->approval_of_payment_date)) : '' }}"
                                                class="form-control approval_of_payment_date approval_of_payment_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span
                                                class="text-danger error_approval_of_payment_date_{{ $key }}"></span>
                                        </td>

                                        <td>
                                            <input type="text" name="pro[{{ $key }}][payment_release_date]"
                                                data-id="{{ $key }}"
                                                value="{{ isset($value->payment_release_date) ? date('d-m-Y', strtotime($value->payment_release_date)) : '' }}"
                                                class="form-control payment_release_date payment_release_date_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span
                                                class="text-danger error_payment_release_date_{{ $key }}"></span>

                                        </td>
                                        <td>
                                            <input type="text" name="pro[{{ $key }}][remarks_2]"
                                                data-id="{{ $key }}" value="{{ $value->remarks_2 ?? '' }}"
                                                class="form-control remarks_2 remarks_2_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span class="text-danger error_remarks_2_{{ $key }}"></span>

                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_btn_fourth"
                                                data-id="{{ $key }}" data-db_id="{{ $value->id }}"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="row_2_0">
                                    <td>1</td>
                                    <td class="text-start">
                                        <input type="hidden" name="pro[0][template_id]" value="{{ $temp_id }}">
                                        <input type="hidden" name="pro[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <select class="form-control title_id_two title_id_two_0 changes_forth_form" data-id="0"
                                            name="pro[0][title_id_two]">
                                            <option selected disabled>Select</option>
                                            @foreach ($title_list_2 as $k => $val)
                                                <option value="{{ $k }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error_title_id_two_0"></span>
                                    </td>


                                    <td>
                                        <input type="number" step=any name="pro[0][budget_head]"
                                            class="form-control budget_head budget_head_0" placeholder=""
                                            autocomplete="off">
                                        <span class="text-danger error_budget_head_0"></span>
                                    </td>
                                    <td>
                                        <input type="number" step=any name="pro[0][contract_amount]"
                                            class="form-control contract_amount contract_amount_0" placeholder=""
                                            autocomplete="off">
                                        <span class="text-danger error_contract_amount_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][issue_of_order_date]" data-id="0"
                                            class="form-control issue_of_order_date issue_of_order_date_0" placeholder=""
                                            autocomplete="off">
                                        <span class="text-danger error_issue_of_order_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][delivery_date]" data-id="0"
                                            class="form-control delivery_date delivery_date_0" placeholder=""
                                            autocomplete="off">
                                        <span class="text-danger error_delivery_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][installation_date]" data-id="0"
                                            class="form-control installation_date installation_date_0" placeholder=""
                                            autocomplete="off">
                                        <span class="text-danger error_installation_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][satisfactory_certificate_receipt_date]"
                                            data-id="0"
                                            class="form-control satisfactory_certificate_receipt_date satisfactory_certificate_receipt_date_0"
                                            placeholder="" autocomplete="off" readonly>
                                        <span class="text-danger error_satisfactory_certificate_receipt_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][invoice_receipt_date]" data-id="0"
                                            class="form-control invoice_receipt_date invoice_receipt_date_0"
                                            placeholder="" autocomplete="off" readonly>
                                        <span class="text-danger error_invoice_receipt_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][approval_of_payment_date]" data-id="0"
                                            class="form-control approval_of_payment_date approval_of_payment_date_0"
                                            placeholder="" autocomplete="off" readonly>
                                        <span class="text-danger error_approval_of_payment_date_0"></span>
                                    </td>

                                    <td>
                                        <input type="text" name="pro[0][payment_release_date]" data-id="0"
                                            class="form-control payment_release_date payment_release_date_0"
                                            placeholder="" autocomplete="off" readonly>
                                        <span class="text-danger error_payment_release_date_0"></span>

                                    </td>
                                    <td>
                                        <input type="text" name="pro[0][remarks_2]" data-id="0"
                                            class="form-control remarks_2 remarks_2_0" placeholder="" autocomplete="off">
                                        <span class="text-danger error_remarks_2_0"></span>

                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="actionbtn remove_btn_fourth"
                                            data-id="0"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endif


                        </tbody>
                        <tr>
                            <td colspan="14" class="text-end">
                                <button type="submit" class="btn btn-warning px-md-4">Save</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5">
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                STATUS OF PROCUREMENT OF SERVICES
                <button type="button" class="btn btn-outline-success fifth_form_add_btn">+ ADD</button>
            </h3>
            <form id="fifth_form">
                <div class="table-responsive">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th rowSpan="2">SN.NO</th>
                                <th rowSpan="2" class="text-start">DETAILS OF SERVICES**</th>
                                <th rowspan="2" class="text-start">DATE OF EXPIRY OF EXISTING CONTRACT</th>
                                <th rowspan="2" class="text-start">VALUE OF EXISTING CONTRACT</th>
                                <th rowSpan="2" class="text-start">ESTIMATED VALUE OF NEW TENDER</th>
                                <th rowspan="2" class="text-start">TENDER TYPE (OPEN/ LIMITED/PAC)</th>
                                <th colspan="5">DATE OF</th>
                                <th rowspan="2">REMARKS</th>
                                <th rowspan="2">REMOVE</th>


                            </tr>
                            <tr>
                                <th>FLOATING TENDER</th>
                                <th>OPENING TENDER</th>
                                <th>TECH. EVAL.</th>
                                <th>FIN. EVAL.</th>
                                <th>AWARD OF WORK</th>


                            </tr>
                        </thead>
                        <tbody class="form_fifth_container">
                            @if ($data_5->count())
                                @foreach ($data_5 as $key => $value)
                                <script>
                                    selected_title_5.push("{{ $value->title_id }}");
                                </script>
                                    <tr class="row_5_{{ $key }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-start">
                                            <input type="hidden" name="pro_services[{{ $key }}][template_id]" value="{{ $value->template_id }}">
                                            <input type="hidden" name="pro_services[{{ $key }}][id]" value="{{ $value->id }}">
                                            <input type="hidden" name="pro_services[{{ $key }}][project_center_id]" value="{{ $centerid ?? ''}}">
                                            <select class="form-control title_id_five title_id_five_{{ $key }}"
                                                name="pro_services[{{ $key }}][title_id_five]"
                                                data-id="{{ $key }}">
                                                <option selected disabled>Select</option>
                                                @foreach ($fifth_form_title as $k => $val)
                                                    <option value="{{ $k }}"
                                                        @if ($k == $value->title_id) selected @endif>
                                                        {{ $val }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error_title_id_five_{{ $key }}"></span>
                                        </td>


                                        <td>
                                            <input type="text"
                                                name="pro_services[{{ $key }}][expiry_date_of_existing_contract]"
                                                value="{{ isset($value->expiry_date_of_existing_contract) ? date('d-m-Y', strtotime($value->expiry_date_of_existing_contract)) : '' }}"
                                                class="form-control service_expiry_date_of_existing_contract service_expiry_date_of_existing_contract_{{ $key }}"
                                                placeholder="dd-mm-yyyy" readonly>
                                            <span
                                                class="text-danger error_service_expiry_date_of_existing_contract_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="number" step=any
                                                name="pro_services[{{ $key }}][value_of_existing_contract]"
                                                value="{{ $value->value_of_existing_contract ?? '' }}"
                                                class="form-control service_value_of_existing_contract service_value_of_existing_contract_{{ $key }}"
                                                placeholder="" readonly>
                                            <span
                                                class="text-danger error_service_value_of_existing_contract_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="number" step=any
                                                name="pro_services[{{ $key }}][estimated_value_of_new_tender]"
                                                value="{{ $value->estimated_value_of_new_tender ?? '' }}"
                                                class="form-control service_estimated_value_of_new_tender service_estimated_value_of_new_tender_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span
                                                class="text-danger error_service_estimated_value_of_new_tender_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <select
                                                class="form-control service_tender_type service_tender_type_{{ $key }}"
                                                name="pro_services[{{ $key }}][tender_type]">
                                                <option selected disabled>Select</option>
                                                <option value="open"
                                                    {{ $value->tender_type == 'open' ? 'selected' : '' }}>
                                                    {{ __('Open') }}</option>
                                                <option value="limited"
                                                    {{ $value->tender_type == 'limited' ? 'selected' : '' }}>
                                                    {{ __('Limited') }}</option>
                                                <option value="pac"
                                                    {{ $value->tender_type == 'pac' ? 'selected' : '' }}>
                                                    {{ __('PAC') }}</option>

                                            </select>
                                            <span
                                                class="text-danger error_service_tender_type_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro_services[{{ $key }}][floating_tender_date]"
                                                value="{{ isset($value->floating_tender_date) ? date('d-m-Y', strtotime($value->floating_tender_date)) : '' }}"
                                                data-id="{{ $key }}"
                                                class="form-control service_floating_tender_date service_floating_tender_date_{{ $key }}"
                                                placeholder="dd-mm-yyyy" autocomplete="off">
                                            <span
                                                class="text-danger error_service_floating_tender_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro_services[{{ $key }}][opening_tender_date]"
                                                value="{{ isset($value->opening_tender_date) ? date('d-m-Y', strtotime($value->opening_tender_date)) : '' }}"
                                                data-id="{{ $key }}"
                                                class="form-control service_opening_tender_date service_opening_tender_date_{{ $key }}"
                                                placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                            <span
                                                class="text-danger error_service_opening_tender_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro_services[{{ $key }}][tech_eval_date]"
                                                value="{{ isset($value->tech_eval_date) ? date('d-m-Y', strtotime($value->tech_eval_date)) : '' }}"
                                                data-id="{{ $key }}"
                                                class="form-control service_tech_eval_date service_tech_eval_date_{{ $key }}"
                                                placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                            <span
                                                class="text-danger error_service_tech_eval_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro_services[{{ $key }}][final_eval_date]"
                                                value="{{ isset($value->final_eval_date) ? date('d-m-Y', strtotime($value->final_eval_date)) : '' }}"
                                                data-id="{{ $key }}"
                                                class="form-control service_final_eval_date service_final_eval_date_{{ $key }}"
                                                placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                            <span
                                                class="text-danger error_service_final_eval_date_{{ $key }}"></span>
                                        </td>
                                        <td>
                                            <input type="text"
                                                name="pro_services[{{ $key }}][award_of_work_date]"
                                                value="{{ isset($value->award_of_work_date) ? date('d-m-Y', strtotime($value->award_of_work_date)) : '' }}"
                                                data-id="{{ $key }}"
                                                class="form-control service_award_of_work_date service_award_of_work_date_{{ $key }}"
                                                placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                            <span
                                                class="text-danger error_service_award_of_work_date_{{ $key }}"></span>
                                        </td>

                                        <td>
                                            <input type="text" name="pro_services[{{ $key }}][remarks]"
                                                value="{{ $value->remarks ?? '' }}"
                                                class="form-control service_remarks remarks_{{ $key }}"
                                                placeholder="" autocomplete="off">
                                            <span class="text-danger error_service_remarks_{{ $key }}"></span>

                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="actionbtn remove_btn_fifth"
                                                data-id="{{ $key }}" data-db_id="{{$value->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="row_5_0">
                                    <td>1</td>
                                    <td class="text-start">
                                        <input type="hidden" name="pro_services[0][template_id]" value="{{ $temp_id }}">
                                        <input type="hidden" name="pro_services[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <select class="form-control title_id_five title_id_five_0"
                                            name="pro_services[0][title_id_five]" data-id="0">
                                            <option selected disabled>Select</option>
                                            @foreach ($fifth_form_title as $k => $val)
                                                <option value="{{ $k }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error_title_id_five_0"></span>
                                    </td>


                                    <td>
                                        <input type="text" name="pro_services[0][expiry_date_of_existing_contract]"
                                            class="form-control service_expiry_date_of_existing_contract service_expiry_date_of_existing_contract_0"
                                            placeholder="dd-mm-yyyy" readonly>
                                        <span class="text-danger error_service_expiry_date_of_existing_contract_0"></span>
                                    </td>
                                    <td>
                                        <input type="number" step=any name="pro_services[0][value_of_existing_contract]"
                                            class="form-control service_value_of_existing_contract service_value_of_existing_contract_0"
                                            placeholder="" readonly>
                                        <span class="text-danger error_service_value_of_existing_contract_0"></span>
                                    </td>
                                    <td>
                                        <input type="number" step=any
                                            name="pro_services[0][estimated_value_of_new_tender]"
                                            class="form-control service_estimated_value_of_new_tender service_estimated_value_of_new_tender_0"
                                            placeholder="" autocomplete="off">
                                        <span class="text-danger error_service_estimated_value_of_new_tender_0"></span>
                                    </td>
                                    <td>
                                        <select class="form-control service_tender_type service_tender_type_0"
                                            name="pro_services[0][tender_type]">
                                            <option selected disabled>Select</option>
                                            <option value="open">{{ __('Open') }}</option>
                                            <option value="limited">{{ __('Limited') }}</option>
                                            <option value="pac">{{ __('PAC') }}</option>

                                        </select>
                                        <span class="text-danger error_service_tender_type_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro_services[0][floating_tender_date]" data-id="0"
                                            class="form-control service_floating_tender_date service_floating_tender_date_0"
                                            placeholder="dd-mm-yyyy" autocomplete="off">
                                        <span class="text-danger error_service_floating_tender_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro_services[0][opening_tender_date]" data-id="0"
                                            class="form-control service_opening_tender_date service_opening_tender_date_0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_service_opening_tender_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro_services[0][tech_eval_date]" data-id="0"
                                            class="form-control service_tech_eval_date service_tech_eval_date_0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_service_tech_eval_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro_services[0][final_eval_date]" data-id="0"
                                            class="form-control service_final_eval_date service_final_eval_date_0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_service_final_eval_date_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" name="pro_services[0][award_of_work_date]" data-id="0"
                                            class="form-control service_award_of_work_date service_award_of_work_date_0"
                                            placeholder="dd-mm-yyyy" readonly autocomplete="off">
                                        <span class="text-danger error_service_award_of_work_date_0"></span>
                                    </td>

                                    <td>
                                        <input type="text" name="pro_services[0][remarks]"
                                            class="form-control service_remarks remarks_0" placeholder=""
                                            autocomplete="off">
                                        <span class="text-danger error_service_remarks_0"></span>

                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="actionbtn remove_btn_fifth" data-id="0"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endif



                        </tbody>
                        <tr>
                            <td colspan="14" class="text-end">
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
    <script src="{{ asset('public/front/js/plugin/common.js') }}"></script>
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    <script>
        var form_id = "{{ $data->id ?? '' }}";
        var encode_temp_id = "{{ encode5t($temp_id) }}";
        var temp_id = "{{ $temp_id }}";
        var form_third_count = "{{ isset($data_3) ? $data_3->count() : 0 }}";
        var form_fourth_count = "{{ isset($data_4) ? $data_4->count() : 0 }}";
        var form_fifth_count = "{{ isset($data_5) ? $data_5->count() : 0 }}";

        var third_form_array_counting = [];
        var fourth_form_array_counting = [];
        var fifth_form_array_counting = [];

        if (form_third_count == 0) {
            var counting = 0;
            third_form_array_counting.push(0);
        } else {
            var counting = form_third_count * 1 - 1;
            for (let i = 0; i < form_third_count; i++) {
                third_form_array_counting.push(i);
            }
        }
        if (form_fourth_count == 0) {
            var counting_two = 0;
            fourth_form_array_counting.push(0);
        } else {
            var counting_two = form_fourth_count * 1 - 1;
            for (let i = 0; i < form_fourth_count; i++) {
                fourth_form_array_counting.push(i);
            }
        }
        if (form_fifth_count == 0) {
            var counting_fifth = 0;
            fifth_form_array_counting.push(0);
        } else {
            var counting_fifth = form_fifth_count * 1 - 1;
            for (let i = 0; i < form_fifth_count; i++) {
                fifth_form_array_counting.push(i);
            }
        }

        function getTitle(selected_title) {
            var title = '';
            @foreach ($title_list as $k => $val)
                if (jQuery.inArray("{{ $k }}", selected_title) == -1) {
                    title += '<option value="{{ $k }}">{{ $val }}</option>';
                }
            @endforeach
            return title;
        }

        function getTitle2(selected_title_2) {
            var title = '';
            @foreach ($title_list_2 as $k => $val)
                if (jQuery.inArray("{{ $k }}", selected_title_2) == -1) {
                    title += '<option value="{{ $k }}">{{ $val }}</option>';
                }
            @endforeach
            return title;
        }
        function getTitle5(selected_title_5) {
            var title = '';
            @foreach ($fifth_form_title as $k => $val)
                if (jQuery.inArray("{{ $k }}", selected_title_5) == -1) {
                    title += '<option value="{{ $k }}">{{ $val }}</option>';
                }
            @endforeach
            return title;
        }
    </script>







    <script src="{{ asset('public/front/js/manage/procurement_form_1.js') }}"></script>
    <script src="{{ asset('public/front/js/manage/procurement_form_2.js') }}"></script>
    <script src="{{ asset('public/front/js/manage/procurement_form_3.js') }}"></script>
    <script src="{{ asset('public/front/js/manage/procurement_form_4.js') }}"></script>
    <script src="{{ asset('public/front/js/manage/procurement_form_5.js') }}"></script>

    <script>
        $(document).on('change','.center_change',function(){
            
            let center_id = $('.center_id').val();
            window.location.href = baseurl + "/manage/procurement/index/"+encode_temp_id+'/'+center_id;
        }) 
    </script>
@endsection
