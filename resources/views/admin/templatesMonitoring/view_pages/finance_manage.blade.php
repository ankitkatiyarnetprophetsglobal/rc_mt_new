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
                    Financial Management                    
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
            <form class="finance_manage">
                
                <div class="table-responsive">
                    <table class="text-center table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="12">STATUS UNDER SAI BLOCK GRANTS (RS. IN CRORES)</th>
                            </tr>
                            <tr>
                                <th>SN.NO</th>
                                <th>Name of the Scheme </th>
                                <th>Center</th>
                                <th>Budget code</th>
                                <th>BE / RE </th>
                                <th>Opening Balance </th>
                                <th>Funds received </th>
                                <th>Total funds available </th>
                                <th>Expenditure incurred </th>
                                <th>Committed liabilities </th>
                                <th>Balance </th>
                                <th>Remarks</th>
                            </tr>
                            
                        </thead>
                        <tbody id="multiple_finance_manage_container">
                           
                                @foreach ($finance as $key => $value)
                                     
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$value->finance->scheme_name ?? ''}}</td>
                                        <td>
                                            @php 
                                                $data = get_center_id($value->project_center_id);                                    
                                            @endphp
                                            {{ $data ?? '' }}
                                        </td>
                                        <td>{{$value->finance->budget_cost ?? ''}}</td>
                                        <td>{{$value->be_re ?? ''}}</td>
                                        <td>{{$value->opening_balance ?? ''}}</td>
                                        <td>{{$value->fund_received ?? ''}}</td>
                                        <td>{{$value->total_funds ?? ''}}</td>
                                        <td>{{$value->expenditure_incurred ?? ''}}</td>
                                        <td>{{$value->commited_liabilities ?? ''}}</td>
                                        <td>{{$value->balance ?? ''}}</td>
                                        <td>{{$value->remark ?? ''}}</td>
                                        
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
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('public/front/js/plugin/jquery-ui.js')}}"></script>
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
