@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
<script>
    var form_first_count = [];
</script>
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
        <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">
            {{-- Request::segment(5) --}}
            <select class="form-control form-select center_id center_change" id="project_center_id" name="infra_manage[0]project_center_id" style="width: 20%;">
                {{-- <option>Centers</option> --}}
                @foreach($centers as $p_key => $p_val)
                <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
                @endforeach
            </select>
        </form>
        {{-- <div class="d-flex ">
            <a class="me-3" href="{{ URL::previous() }}"><img src="{{asset('public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
            </a>
            <h3> DETAILS OF PENDING DEMANDS</h3>
        </div> --}}
        {{-- <h3 class="d-flex justify-content-between flex-wrap align-items-center">

            <button type="button" class="btn btn-outline-success add_more">+ ADD</button>
        </h3> --}}
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">
            DETAILS OF PENDING DEMANDS
            <button type="button" class="btn btn-outline-success add_more">+ ADD</button>
        </h3>
        <form id="pendingdemands_manage_form">
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th>SN.NO</th>
                            <th>PARTICULARS</th>
                            <th>LAST CORRESPONDENCE FROM REGIONAL OFFICE TO SAI HO</th>
                            <th>CONCERNED DIVISION AT SAI HO, NEW DELHI (PERSONNEL / OPS / INFRA / ES ETC.)</th>
                            <th>STATUS</th>
                            <th>REMARKS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="multiple_pendingdemands_container">
                        @if($data1->count() > 0)
                        @foreach ($data1 as $key => $value1)
                        <tr>
                            <td class="row_id">{{ $key + 1 }}</td>
                            <td>
                                <input type="hidden" name="pendingdemands[{{$key}}][id]" value="{{ $value1->id ?? '' }}">
                                <input type="hidden" name="pendingdemands[{{$key}}][template_id]" value="{{$value1->template_id}}">
                                <input type="hidden" name="pendingdemands[{{$key}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                <input type="text" class="form-control pendingdemands_particulars_{{$key}}" name="pendingdemands[{{$key}}][particulars]" placeholder="" value="{{ $value1->particulars ?? ""  }}" autocomplete="off">
                                <span class="text-danger error_pendingdemands_particulars_{{$key}}"></span>
                            </td>
                            <td>
                                @php
                                $last_correspondence_regional = isset($value1->last_correspondence_regional) ? date('d-m-Y', strtotime($value1->last_correspondence_regional)) : null;
                                @endphp
                                <input type="text" class="form-control pendingdemands_last_correspondence_regional_{{$key}} lastdatecorrespondencepicker_{{$key}}" name="pendingdemands[{{$key}}][last_correspondence_regional]" placeholder="dd-mm-yy" autocomplete="off" value="{{ $last_correspondence_regional ?? "" }}">
                                <span class="text-danger error_pendingdemands_last_correspondence_regional_{{$key}}"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control pendingdemands_concerned_division_personnel_{{$key}}" name="pendingdemands[{{$key}}][concerned_division_personnel]" placeholder="" autocomplete="off" value="{{ $value1->concerned_division_personnel ?? ""  }}">
                                <span class="text-danger error_pendingdemands_concerned_division_personnel_0"></span>
                            </td>
                            <td>
                                <select class="form-control pendingdemands_status_{{$key}}" name="pendingdemands[{{$key}}][row_status]" autocomplete="off">
                                    <option value="">Select</option>
                                    <option value="approved" {{ "approved" == $value1->row_status ? 'selected' : ''}}>Approved</option>
                                    <option value="pending" {{ "pending" == $value1->row_status ? 'selected' : ''}}>Pending</option>
                                </select>
                                <span class="text-danger error_pendingdemands_status_{{$key}}"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control pendingdemands_remarks_{{$key}}" name="pendingdemands[{{$key}}][remarks]" placeholder="" autocomplete="off" value="{{ $value1->remarks ?? ""  }}">
                                <span class="text-danger error_pendingdemands_remarks_{{$key}}"></span>
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
                                <input type="hidden" name="pendingdemands[0][template_id]" value="{{$temp_id}}">
                                <input type="hidden" name="pendingdemands[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                <input type="text" class="form-control pendingdemands_particulars_0" name="pendingdemands[0][particulars]" placeholder="" autocomplete="off">
                                <span class="text-danger error_pendingdemands_particulars_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control pendingdemands_last_correspondence_regional_0 lastdatecorrespondencepicker_0" name="pendingdemands[0][last_correspondence_regional]" placeholder="dd-mm-yy" autocomplete="off">
                                <span class="text-danger error_pendingdemands_last_correspondence_regional_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control pendingdemands_concerned_division_personnel_0" name="pendingdemands[0][concerned_division_personnel]" placeholder="" autocomplete="off">
                                <span class="text-danger error_pendingdemands_concerned_division_personnel_0"></span>
                            </td>
                            <td>
                                <select class="form-control pendingdemands_status_0" name="pendingdemands[0][row_status]" autocomplete="off">
                                    <option value="">Select</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <span class="text-danger error_pendingdemands_status_0"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control pendingdemands_remarks_0" name="pendingdemands[0][remarks]" placeholder="" autocomplete="off">
                                <span class="text-danger error_pendingdemands_remarks_0"></span>
                            </td>
                            <td>
                                <a href="#" class="actionbtn remove_btn" data-id="0"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                    <tr>
                        <td colspan="7" class="text-end">
                            <button type="submit" class="btn btn-warning px-md-4">Save</button>
                        </td>
                    </tr>
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
<script src="{{ asset('public/front/js/manage/pendingdemands.js') }}"></script>

<script>
    $(document).ready(function() {

        $(".lastdatecorrespondencepicker_0").datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
        });
    });
    var array_counting = [];
    var temp_id = "{{$temp_id}}";
    var encode_temp_id = "{{encode5t($temp_id)}}";
    var form_first_count = "{{ $data1->count()}}";

    if (form_first_count == 0) {
        var counting = 0;
        array_counting.push(0);
    } else {
        var counting = form_first_count * 1 - 1;
        for (let i = 0; i < form_first_count; i++) {
            array_counting.push(i);
        }
    }
</script>
@endsection