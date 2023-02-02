@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')

<div class="managePrecurement">
    <div class="manageTable mb-5">
        <div class="alert alert-success message d-none">
            <strong>Success!</strong> {{ Session::get('message') }}
        </div>
        <div class="alert alert-danger error_message d-none">
            <strong>Danger!</strong> {{ Session::get('error_message') }}
        </div>
        
        <div class="d-flex "> 
            <a class="me-3"  onclick="history.back()"><img style=" cursor: pointer;" src="http://localhost/rc_mt/public/front\themes\svg\arrow-left-circle.svg" alt="">
            </a>
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                DETAILS OF PENDING DEMANDS  
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
        <form id="pendingdemands_manage_form">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th >SN.NO</th>
                            <th >PARTICULARS</th>
                            <th >Center</th>
                            <th>LAST CORRESPONDENCE FROM REGIONAL OFFICE TO SAI HO</th>
                            <th>CONCERNED DIVISION AT SAI HO, NEW DELHI (PERSONNEL / OPS / INFRA / ES ETC.)</th>
                            <th>STATUS</th>
                            <th>REMARKS</th>
                            
                        </tr>                        
                    </thead>
                    <tbody id="multiple_pendingdemands_container">
                        
                            @foreach ($pendigdemands as $key => $value)
                                <tr>
                                    <td class="row_id">{{ $key + 1 }}</td>
                                    <td>
                                        {{$value->particulars ?? ''}}
                                        
                                    </td>
                                    <td>
                                        @php 
                                            $data = get_center_id($value->project_center_id);                                    
                                        @endphp
                                        {{ $data ?? '' }}
                                    </td>
                                    <td>
                                        {{$value->last_correspondence_regional ?? ''}}
                                        
                                    </td>            
                                    <td>
                                        {{$value->concerned_division_personnel ?? ''}}
                                        
                                    </td>
                                    <td>
                                        {{$value->row_status ?? ''}} 
                                    </td>
                                    <td>
                                        {{$value->remarks ?? ''}}  
                                    </td>
                                    
                                </tr>
                            @endforeach
                        
                    </tbody>
                        
                </table>
            </div>
        </form>
    </div>
    <!--close common-card-->
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