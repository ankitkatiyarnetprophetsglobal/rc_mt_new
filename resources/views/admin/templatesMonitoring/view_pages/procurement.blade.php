@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="manageInfracture">

        <div class="manageTable mb-5">
            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <div class="d-flex "> 
                    <a class="me-3"  onclick="history.back()"><img style="cursor:pointer;" src="http://localhost/rc_mt/public/front\themes\svg\arrow-left-circle.svg" alt="">
                    </a>
                    <h3>STATUS OF FUNDS FOR EQUIPMENT PROCUREMENT</h3>
                </div>
                
                    <!-- <a class="btn btn-outline-success add_more" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> ADD</a> -->
            </div>
            <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">            
                <select class="form-control form-select center_id center_change" id="project_center_id" name="infra_manage[0]project_center_id" style="width: 20%;">
                    @foreach($centers as $p_key => $p_val)                
                        <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
                    @endforeach
                </select>
            </form>

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
                                <td>01</td>
                                <td class="text-start">
                                    Opening Balance
                                </td>
                                <td>
                                  {{$first_form->se_opening_balance ?? ''}}
                                    
                                </td>
                                <td>
                                    {{$first_form->sse_opening_balance ?? ''}}
                                    
                                </td>

                            </tr>

                            <tr>
                                <td>02</td>
                                <td class="text-start">
                                    Administrative approval (including budget) of HO received (Rs) – Sports Science
                                </td>
                                <td>
                                    {{$first_form->se_administrative_approval_budget ?? ''}}
                                   
                                </td>
                                <td>
                                    {{$first_form->sse_administrative_approval_budget ?? ''}}
                                   
                                </td>

                            </tr>

                            <tr>
                                <td>03</td>
                                <td class="text-start">
                                    Funds transferred during Current FY (Rs) - Sports Science
                                </td>
                                <td>
                                    {{$first_form->se_fund_transfer ?? ''}}
                                    
                                </td>
                                <td>
                                    {{$first_form->sse_fund_transfer ?? ''}}
                                    
                                </td>

                            </tr>

                            <tr>
                                <td>04</td>
                                <td class="text-start">
                                    Total fund available for Sports Science (1+3)
                                </td>
                                <td>
                                    {{$first_form->se_total_fund_available ?? ''}}
                                    
                                </td>
                                <td>
                                    {{$first_form->sse_total_fund_available ?? ''}}
                                    
                                </td>

                            </tr>
                            <tr>
                                <td>05</td>
                                <td class="text-start">
                                    Funds requirement (if any) (4-2)
                                </td>
                                <td>
                                    {{$first_form->se_fund_requirement ?? ''}}
                                </td>
                                <td>
                                    {{$first_form->sse_fund_requirement ?? ''}}
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
                                <td>01</td>
                                <td class="text-start">
                                    Sports Equipment
                                </td>
                                <td>
                                    {{$second_form->se_ncoe_cost ?? ''}}
                                   
                                    <span class="text-danger error_se_ncoe_cost"></span>
                                </td>
                                <td>
                                    {{$second_form->se_stc_cost ?? ''}}
                                    <span class="text-danger error_se_stc_cost"></span>
                                </td>
                                <td>
                                    {{$second_form->se_total_cost ?? ''}}
                                    <span class="text-danger error_se_total_cost"></span>
                                </td>
                                <td>
                                    {{$second_form->se_amt_recive_from_hq ?? ''}}
                                    
                                    <span class="text-danger error_se_amt_recive_from_hq"></span>
                                </td>
                                <td>
                                    {{$second_form->se_amt_incurred_on_procurement_of_equipment ?? ''}}
                                    
                                    <span class="text-danger error_se_amt_incurred_on_procurement_of_equipment"></span>
                                </td>
                                <td>
                                    {{$second_form->se_procurement_under_process_amt ?? ''}}
                                    
                                    <span class="text-danger error_se_procurement_under_process_amt"></span>
                                </td>
                                <td>
                                    {{$second_form->se_utilisation_plan_of_remaining_funds ?? ''}}
                                    
                                    <span class="text-danger error_se_utilisation_plan_of_remaining_funds"></span>
                                </td>
                                <td>
                                    {{$second_form->se_funds_requirement_from_approved_budget ?? ''}}
                                    
                                    <span class="text-danger error_se_funds_requirement_from_approved_budget"></span>
                                </td>

                                <td>
                                    {{$second_form->se_remarks ?? ''}}
                                    
                                    <span class="text-danger error_se_remarks"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td class="text-start">
                                    Sports Science Equipment
                                </td>
                                <td>
                                    {{$second_form->sse_ncoe_cost ?? ''}}  
                                   
                                </td>
                                <td>
                                    {{$second_form->sse_stc_cost ?? ''}}  
                                  
                                </td>
                                <td>
                                    {{$second_form->sse_total_cost ?? ''}}

                                </td>
                                <td>
                                    {{$second_form->sse_amt_recive_from_hq ?? ''}}

                                </td>
                                <td>
                                    {{$second_form->sse_amt_incurred_on_procurement_of_equipment ?? ''}}
                                    
                                   
                                </td>
                                <td>
                                    {{$second_form->sse_procurement_under_process_amt ?? ''}}

                                </td>
                                <td>
                                    {{$second_form->sse_utilisation_plan_of_remaining_funds ?? ''}}

                                </td>
                                <td>
                                    {{$second_form->sse_funds_requirement_from_approved_budget ?? ''}}

                                </td>

                                <td>
                                    {{$second_form->sse_remarks ?? ''}}

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5">
          
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
                                <th rowspan="2" class="text-start">BUDGET HEAD</th>
                                <th rowSpan="2" class="text-start">CONTRACT VALUE</th>

                                <th colspan="7">DATE OF</th>
                                <th rowSpan="2">REMARKS</th>
                                

                            </tr>
                            <tr>
                                <th>SPECS FINALISATION</th>
                                <th>FLOATING TENDER</th>
                                <th>OPENING TENDER</th>
                                <th>TECH. EVAL.</th>
                                <th>FIN. EVAL.</th>
                                <th>ORDER PLACEMENT</th>
                                <th>ISSUE OF ORDER</th>
                                <th>DELIVERY**</th>
                                <th>INSTALLATION (IF APPLICABLE)</th>
                                <th>SATISFACTORY CERTIFICATE RECEIPT</th>
                                <th>INVOICE RECEIPT</th>
                                <th>APPROVAL OF PAYMENT</th>
                                <th>PAYMENT RELEASE</th>

                            </tr>
                        </thead>
                        <tbody class="form_third_container">
                            
                                @foreach ($third_form as $key => $value)
                                  
                                    <tr class="row_0">
                                        <td>{{ $key + 1 }}</td>

                                        <td class="text-start">
                                            {{$value->procurentMaster->title ?? ''}}
                                        </td>
                                        <td class="text-start">
                                            
                                            {{$value->specs_finalized ?? ''}}
                                            
                                        </td>
                                        <td class="text-start">
                                            {{$value->tender_type ?? ''}}
                                            
                                        </td>


                                        <td>
                                            {{$value->estimated_value ?? ''}}
                                            
                                        </td>
                                        <td>
                                            {{isset($value->specs_finalization_date) ? date('d-m-Y',strtotime($value->specs_finalization_date)) : ''}}
                                            
                                            
                                        </td>
                                        <td>
                                          
                                            {{isset($value->floating_tender_date) ? date('d-m-Y',strtotime($value->floating_tender_date)) : ''}}
                                            
                                        </td>
                                        <td>
                                            {{isset($value->opening_tender_date) ? date('d-m-Y',strtotime($value->opening_tender_date)) : ''}}
                                                                                    
                                        </td>
                                        <td>
                                            {{isset($value->tech_eval_date) ? date('d-m-Y',strtotime($value->tech_eval_date)) : ''}}
                                            
                                        </td>
                                        <td>
                                            {{isset($value->final_eval_date) ? date('d-m-Y',strtotime($value->final_eval_date)) : ''}}
                                          
                                            
                                        </td>
                                        <td>
                                            {{isset($value->order_placement_date) ? date('d-m-Y',strtotime($value->order_placement_date)) : ''}}
                                        
                                            
                                        </td>
                                        <td>
                                            {{$value->tender_value ?? ''}}
                                        </td>
                                        <td>
                                            {{ $value->remarks ?? '' }}
                                            
                                        </td>

                                        <td>
                                            {{ $value->budget_head ?? '' }}
                                            
                                        </td>
                                       
                                        <td>
                                            {{ $value->contract_amount ?? '' }}
                                            
                                        </td>
                                        <td>
                                            {{isset($value->issue_of_order_date) ? date('d-m-Y',strtotime($value->issue_of_order_date)) : ''}}
                                     
                                            
                                        </td>
                                        <td>
                                            {{isset($value->delivery_date) ? date('d-m-Y',strtotime($value->delivery_date)) : ''}}
                                  
                                            
                                        </td>
                                        <td>
                                            {{isset($value->installation_date) ? date('d-m-Y',strtotime($value->installation_date)) : ''}}
                                          
                                            
                                        </td>
                                        <td>
                                            {{isset($value->satisfactory_certificate_receipt_date) ? date('d-m-Y',strtotime($value->satisfactory_certificate_receipt_date)) : ''}}
                                         
                                            
                                        </td>
                                        <td>
                                            {{isset($value->invoice_receipt_date) ? date('d-m-Y',strtotime($value->invoice_receipt_date)) : ''}}
                                           
                                            
                                        </td>
                                        <td>
                                            {{isset($value->approval_of_payment_date) ? date('d-m-Y',strtotime($value->approval_of_payment_date)) : ''}}
                                           
 
                                        </td>

                                        <td>
                                            {{isset($value->payment_release_date) ? date('d-m-Y',strtotime($value->payment_release_date)) : ''}}
                                           

                                        </td>
                                        <td>
                                            {{ $value->remarks_2 ?? '' }}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                        </tbody>                      
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5" style="display: none;">
           
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
                                {{-- <th rowSpan="2">REMOVE</th> --}}

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

                                @foreach ($third_form as $key => $value)
                                
                                    <tr class="row_2_{{ $key }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-start">

                                            {{ $value->procurentMaster->title ?? '' }}

                                        </td>


                                        <td>
                                            {{ $value->budget_head ?? '' }}
                                            
                                        </td>
                                        <td>
                                            {{ $value->contract_amount ?? '' }}
                                            
                                        </td>
                                        <td>
                                            {{isset($value->issue_of_order_date) ? date('d-m-Y',strtotime($value->issue_of_order_date)) : ''}}
                                     
                                            
                                        </td>
                                        <td>
                                            {{isset($value->delivery_date) ? date('d-m-Y',strtotime($value->delivery_date)) : ''}}
                                  
                                            
                                        </td>
                                        <td>
                                            {{isset($value->installation_date) ? date('d-m-Y',strtotime($value->installation_date)) : ''}}
                                          
                                            
                                        </td>
                                        <td>
                                            {{isset($value->satisfactory_certificate_receipt_date) ? date('d-m-Y',strtotime($value->satisfactory_certificate_receipt_date)) : ''}}
                                         
                                            
                                        </td>
                                        <td>
                                            {{isset($value->invoice_receipt_date) ? date('d-m-Y',strtotime($value->invoice_receipt_date)) : ''}}
                                           
                                            
                                        </td>
                                        <td>
                                            {{isset($value->approval_of_payment_date) ? date('d-m-Y',strtotime($value->approval_of_payment_date)) : ''}}
                                           
 
                                        </td>

                                        <td>
                                            {{isset($value->payment_release_date) ? date('d-m-Y',strtotime($value->payment_release_date)) : ''}}
                                           

                                        </td>
                                        <td>
                                            {{ $value->remarks_2 ?? '' }}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            


                        </tbody>
                        
                    </table>
                </div>
            </form>
        </div>
        <div class="manageTable my-5">
            
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
                                {{-- <th rowspan="2">REMOVE</th> --}}


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
                                @foreach ($service_form as $key => $value)
                               
                                    <tr class="row_5_{{ $key }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-start">
                                            {{ $value->procurementService->title ?? '' }}
                                        </td>
                                        <td>   
                                            {{isset($value->expiry_date_of_existing_contract) ? date('d-m-Y',strtotime($value->expiry_date_of_existing_contract)) : ''}}
                                       
                                            
                                        </td>
                                        <td>   
                                             {{ $value->value_of_existing_contract ?? '' }}
                                            
                                        </td>
                                        <td>    
                                            {{ $value->estimated_value_of_new_tender ?? '' }}
                                            
                                        </td>
                                        <td>   
                                             {{ $value->tender_type ?? '' }}
                                      
                                        </td>
                                        <td>    
                                            {{isset($value->floating_tender_date) ? date('d-m-Y',strtotime($value->floating_tender_date)) : ''}}
                                         
                                            
                                        </td>
                                        <td>    
                                            {{isset($value->opening_tender_date) ? date('d-m-Y',strtotime($value->opening_tender_date)) : ''}}
                                       
                                            
                                        </td>
                                        <td>    
                                            {{isset($value->tech_eval_date) ? date('d-m-Y',strtotime($value->tech_eval_date)) : ''}}
                                           
                                            
                                        </td>
                                        <td>    
                                            {{isset($value->final_eval_date) ? date('d-m-Y',strtotime($value->final_eval_date)) : ''}}
                                        
                                            
                                        </td>
                                        <td>   
                                            {{isset($value->award_of_work_date) ? date('d-m-Y',strtotime($value->award_of_work_date)) : ''}} 
                                                                                      
                                        </td>

                                        <td>    
                                            {{ $value->remarks ?? '' }}
                                            
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            



                        </tbody>
                     
                    </table>
                </div>
            </form>
        </div>
   
    </div>
@endsection
@section('page_specific_js')
    <script src="{{ asset('public/front/js/plugin/common.js') }}"></script>
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
   
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    
    
    $(document).on('change','.center_change',function(){

        var rc_id = "{{ encode5t($requested_rc) }}";
        var temp_id = "{{ encode5t($requested_temp) }}";    
        var section = "{{ $section }}";        
        let center_id = $('.center_id').val();        
        window.location.href = baseurl + "/admin/template-management/template-of-regional-center/"+rc_id+'/'+temp_id+'/'+section+'/'+center_id;
        
    }) 
</script>