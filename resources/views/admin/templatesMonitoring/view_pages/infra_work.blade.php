@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="manageInfracture" autoComplete="off">
        <div class="manageTable">
           
            <div class="d-flex "> 
                <a class="me-3"  onclick="history.back()"><img style=" cursor: pointer;" src="http://localhost/rc_mt/public/front\themes\svg\arrow-left-circle.svg" alt="">
                </a>
                <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                    Status of Infra work upto Award of Tender        
                </h3>
            </div>
            <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">            
                <select class="form-control form-select center_id center_change" id="project_center_id" name="infra_manage[0]project_center_id" style="width: 20%;">
                    @foreach($centers as $p_key => $p_val)                
                        <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
                    @endforeach
                    @if(Session::get('role_details')->id == 1 || Session::get('role_details')->id == 2)
                        <option value="1" {{ 1 == $centerid ? 'selected' : ''}}>All</option>
                    @endif
                </select>
            </form>
            <div class="table-responsive">
                    <table class="table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th>SN.NO</th>
                                <th>PROJECT ID / TITLE</th>
                                <th>Centre Name</th>
                                <th>COST AS PER PE (IN CR.)</th>
                                <th>DATE OF AA/ES</th>
                                <th>AGENCY</th>
                                <th>TENDER FLOATED ON</th>
                                <th>BID SUBMISSION DEADLINE</th>
                                <th>TECH. BID OPENING</th>
                                <th>FIN. BID OPENING</th>
                                <th>AWARDING OF CONTRACT</th>
                                <th >TENDER COST (IN CR.)</th>
                                <th>REMARKS</th>
                                <th>WORK START DATE</th>
                                <th>CONTRACTUAL PROBABLE DATE <br> OF COMPLETION (PDC)</th>
                                <th >EXPECTED PROGRESS 25 % (DATE)</th>
                                <th >EXPECTED PROGRESS 50 % (DATE)</th>
                                <th >EXPECTED PROGRESS 75 % (DATE)</th>
                                <th>PROGRESS (IN %)</th>
                                <th>CURRENT PDC</th>
                                <th>REMARKS</th>
                                <th>FUND RELEASED TILL DATE <br> (TO AGENCY) (IN CR.)</th>
                                <th>FUNDS / PERCENTAGE OF <br> FUNDS UTILISED</th>
                                <th>UC STATUS</th>
                            </tr>
                           
                        </thead>
                        <tbody class="form_first_container">
                            
                           @foreach($infra_work as $key => $value)
                        
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$value->infrastructure->project_title ?? ''}}</td>
                                <td>
                                    @php 
                                        $data = get_center_id($value->project_center_id);                                    
                                    @endphp
                                    {{ $data ?? '' }}
                                </td>
                                <td>{{$value->infrastructure->cost ?? ''}}</td>
                                <td>{{isset($value->infrastructure->date) ? date('d-m-Y',strtotime($value->infrastructure->date)) : ''}}</td>
                                <td>{{$value->infrastructure->agency->name ?? ''}}</td>
                                <td>{{isset($value->date_of_issue) ? date('d-m-Y',strtotime($value->date_of_issue)) : ''}}</td>
                                <td>{{isset($value->date_of_receipt) ? date('d-m-Y',strtotime($value->date_of_receipt)) : ''}}</td>
                                <td>{{isset($value->date_of_tech_bid) ? date('d-m-Y',strtotime($value->date_of_tech_bid)) : ''}}</td>
                                <td>{{isset($value->date_of_financial_bid) ? date('d-m-Y',strtotime($value->date_of_financial_bid)) : ''}}</td>
                                <td>{{isset($value->date_of_work_award) ? date('d-m-Y',strtotime($value->date_of_work_award)) : ''}}</td>
                                <td>{{$value->tender_cost ?? ''}}</td>
                                <td>{{$value->remarks_1 ?? ''}}</td>
                                <td>{{isset($value->work_start_date) ? date('d-m-Y',strtotime($value->work_start_date)) : ''}}</td>
                                <td>{{isset($value->cpdc_date) ? date('d-m-Y',strtotime($value->cpdc_date)) : ''}}</td>
                                <td>{{isset($value->epd_25) ? date('d-m-Y',strtotime($value->epd_25)) : ''}}</td>
                                <td>{{isset($value->epd_50) ? date('d-m-Y',strtotime($value->epd_50)) : ''}}</td>
                                <td>{{isset($value->epd_75) ? date('d-m-Y',strtotime($value->epd_75)) : ''}}</td>
                                <td>{{$value->progress_percentage ?? ''}}</td>
                                <td>{{$value->current_pdc ?? ''}}</td>
                                <td>{{$value->remarks_2 ?? ''}}</td>
                                <td>{{$value->fund_release ?? ''}}</td>
                                <td>{{$value->utilised_fund_percentage ?? ''}}</td>
                                <td>{{($value->uc_status == 1) ? "SUBMITTED" : "PENDING"}}</td>
                                
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                        
                    </table>
                </div>
        </div>
        
    </div>
@endsection
@section('page_specific_js')
    
    <script src="{{asset('public/front/js/plugin/common.js')}}"></script>
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    
    
    $(document).on('change','.center_change',function(){
        var rc_id = "{{ encode5t($requested_rc) }}";
        var temp_id = "{{ encode5t($requested_temp) }}";    
        var section = "{{ $section }}";
        // alert(section);
        // alert(encode_temp_id);
        // alert(baseurl);
        // alert('12313312313');
        // return false;
        let center_id = $('.center_id').val();
        // // alert(center_id);
        window.location.href = baseurl + "/admin/template-management/template-of-regional-center/"+rc_id+'/'+temp_id+'/'+section+'/'+center_id;
        // location.reload();

    }) 
</script>
