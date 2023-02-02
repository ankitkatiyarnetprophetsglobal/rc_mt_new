@extends('front.layouts.layout')

@section('page_specific_css')
<link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection

@section('content')

<!-- Main Content -->
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
        
        <div class="d-flex "> 
        <a class="me-3"  onclick="history.back()"><img style=" cursor: pointer;" src="http://localhost/rc_mt/public/front\themes\svg\arrow-left-circle.svg" alt="">
        </a>
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">
            STATUS OF COURT CASES
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
        <form class="miscellaneous_manage_form">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            <!-- <th rowSpan="2" class="text-start">PARTCULARS</th> -->                            
                            <th colSpan="11">STATUS OF COURT CASES (LIMBS PORTAL VERSION)</th>                            
                        </tr>
                        <tr>
                            <th>DETAILS OF THE OA/WP/CWP /CP/SLP</th>
                            <th>NAME OF THE COURT</th>
                            <th>Center</th>
                            <th>BRIEF ISSUE INVOLVED IN THE COURT CASE</th>
                            <th>NAME OF THE PARTIES</th>
                            <th>LATEST STATUS OF THE CASE</th>
                            <th>NAME OF THE COUNSEL</th>
                            <th>LAST DATE OF HEARING</th>
                            <th>STATUS OF LAST HEARING</th>
                            <th>PRESENT STATUS</th>
                            <th>NEXT DATE OF HEARING</th>
                            <th>REMARKS</th>                           
                            {{-- <th>ACTION</th>                            --}}
                        </tr>
                    </thead>
                    <tbody id="multiple_miscellaneous_manage_container">
                       
                            @foreach ($miscellaneous_first as $key => $value)
                            
                                <tr class="row_{{$key}}">
                                    <td class="row_id">{{ $key + 1 }}</td>
                                    <td>
                                        {{ $value->miscMaster->detail_cwp_slp ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->court ?? '' }}
                                        
                                    </td>
                                    <td>
                                        @php 
                                            $data = get_center_id($value->project_center_id);                                    
                                        @endphp
                                        {{ $data ?? '' }}
                                    </td>
                                    <td> 
                                        {{ $value->court_case ?? '' }}
                                        
                                    </td>
                                    <td> 
                                        {{ $value->parties ?? '' }}
                                        
                                    </td>
                                    <td> 
                                        {{ $value->case_ststus ?? '' }}
                                        
                                    </td>
                                    <td> 
                                        {{ $value->name_counsel ?? '' }}
                                        
                                    </td>
                                    <td> 
                                        {{isset($value->last_date_hearing) ? date('d-m-Y',strtotime($value->last_date_hearing)) : ''}}
                                                                                                                    
                                    </td>
                                    <td> 
                                        {{ $value->last_hearing_status ?? '' }}
                                        
                                    </td>
                                    <td> 
                                        {{ $value->present_status ?? '' }}
                                        
                                    </td>
                                    <td> 
                                        {{ $value->next_day_hearing ?? '' }}
                                      
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
    <div class="manageTable my-5">
        
        <form class="miscellaneous_manage_form_two">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            <th rowSpan="2">NAME OF THE EMPLOYEE</th>
                            <th rowSpan="2">Center</th>
                            <th rowspan="2">DESIGNATION</th>
                            <th colspan="4">DATES OF START/RELEASE OF RETIREMENT BENEFIT*</th>
                            <th rowSpan="2">REMARKS (IF ANY)</th>
                            {{-- <th rowSpan="2">ACTION</th>   --}}
                        </tr>
                        <tr>
                            <th>LEAVE ENCASHMENT</th>
                            <th>PENSION</th>
                            <th>GRATUITY</th>
                            <th>COMMUTATION</th>
                        </tr>
                    </thead>
                    <tbody id="multiple_miscellaneous_manage_container_two">
                        
                            @foreach ($miscellaneous_second as $key2 => $value)
                                <tr class="row_{{$key2}}">
                                    <td class="row_id">{{ $key2 + 1 }}</td>
                                    <td>
                                        {{ $value->infraemployee ?? '' }}
                                       
                                    </td>
                                    <td>
                                        @php 
                                            $data = get_center_id($value->project_center_id);                                    
                                        @endphp
                                        {{ $data ?? '' }}
                                    </td>
                                    <td>
                                        {{ $value->infradesignation ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->encashment ?? '' }}
                                       
                                    </td>
                                    <td>
                                        {{ $value->pension ?? '' }}
                                       
                                    </td>
                                    <td>
                                        {{ $value->gratuity ?? '' }}
                                       
                                    </td>
                                    <td>
                                        {{ $value->commutation ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->remarks ?? '' }}
                                        
                                    </td>
                                   
                                </tr> 
                            @endforeach
                        
                    </tbody>
                        <tr>
                         
                        </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="manageTable my-5">
        
        <form class="miscellaneous_manage_form_three">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th rowSpan="2">SN.NO</th>
                            <th rowSpan="2" class="text-start">NAME OF THE EMPLOYEE</th>
                            <th rowSpan="2" class="text-start">Center</th>
                            <th rowspan="2" class="text-center">DESIGNATION</th>
                            <th rowSpan="2" class="text-start">PLACE OF POSTING</th>
                            <th rowSpan="2" class="text-start">DATE OF RETIREMENT</th>
                            <th rowspan="2" >GROUP (A/B/C)</th>
                            <th colspan="4">RETIREMENT BENEFIT*</th>
                            <th rowSpan="2" class="text-start">STARTING DATE OF PENSION</th>
                            <th rowSpan="2">REMARKS</th>
                            {{-- <th rowSpan="2">ACTION</th> --}}
                        
                        </tr>
                        <tr>
                            <th>LEAVE ENCASHMENT</th>
                            <th>PENSION</th>
                            <th>GRATUITY</th>
                            <th>COMMUTATION</th>
                        </tr>
                    </thead>
                    <tbody id="multiple_miscellaneous_manage_container_three">
                   
                            @foreach ($miscellaneous_third as $key3 => $value)
                                <tr class="row_{{$key3}}">
                                    <td class="row_id">{{ $key3 + 1 }}</td>
                                    <td>
                                        {{ $value->retir_name_employee ?? '' }}
                                        
                                    </td>
                                    <td>
                                        @php 
                                            $data = get_center_id($value->project_center_id);                                    
                                        @endphp
                                        {{ $data ?? '' }}
                                    </td>
                                    <td>
                                        {{ $value->retir_name_designation ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->name_place_posting ?? '' }}
                                        
                                    </td>
                                    <td>

                                        {{isset($value->details_date_retirement) ? date('d-m-Y',strtotime($value->details_date_retirement)) : ''}}
                               
                                       
                                    </td>
                                    <td>
                                        {{ $value->details_name_group ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->leave_encashment ?? '' }}
                                       
                                    </td>
                                    <td>
                                        {{ $value->details_pension ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->gratuity ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{ $value->commutation ?? '' }}
                                        
                                    </td>
                                    <td>
                                        {{isset($value->starting_date_pension) ? date('d-m-Y',strtotime($value->details_date_retirement)) : ''}}
                                                                         
                                    </td>
                                    
                                    <td>
                                        {{ $value->remarks ?? '' }}
                                                                      
                                    </td>
                                    
                                </tr> 
                            @endforeach
                        

                    </tbody>
                    <tr>
                       
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
<!--close main contant-->

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

