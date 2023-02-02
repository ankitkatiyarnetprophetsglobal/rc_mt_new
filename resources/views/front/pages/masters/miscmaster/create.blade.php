@extends('front.layouts.layout')
@section('page_specific_css')

@endsection
@section('content')
<div class="manageTable">

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

    <div class="alert alert-danger error_message d-none">

    </div>
    <div class="d-flex ">
        <a class="me-3" href="{{url('/master/infrastructure')}}">
            <img src="{{ asset('/public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
        </a>
        {{-- <h3> Add Miscellaneous Master</h3> --}}
    </div>

    <h3 class="d-flex justify-content-between flex-wrap align-items-center">
        Add Miscellaneous Master
        <a class="btn btn-outline-success add_more" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> ADD</a>
    </h3>
    <div class="table-responsive mt-3">
        <form class="miscmaster_master">
            @csrf
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>DETAILS OF THE OA/WP/CWP /CP/SLP</th>
                        <th>NAME OF THE COURT</th>
                        <th>BRIEF ISSUE INVOLVED IN THE COURT CASE</th>
                        <th>NAME OF THE PARTIES</th>
                        <th>NAME OF THE COUNSEL</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody id="multiple_miscmaster_form_container">

                    <tr class="row_0">
                        <td>1</td>
                        <td>
                            <select class="form-control project_center_0" name="miscmaster[0][project_center]" value="{{old('miscmaster[0][project_center]')}}" autocomplete="off">
                                <option disabled> Select Centers </option>
                                @foreach($centers as $a_key => $a_value)
                                <option value="{{$a_key}}">{{$a_value}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error_project_center_0"></span>
                        </td>
                        <td>
                            <input type="text" name="miscmaster[0][detail_cwp_slp]" class="form-control detail_cwp_slp_0" placeholder="" value="{{old('miscmaster[0][detail_cwp_slp]')}}" autocomplete="off">
                            <span class="text-danger error_detail_cwp_slp_0"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control court_name_0" name="miscmaster[0][court_name]" placeholder="" value="{{old('miscmaster[0][court_name]')}}" autocomplete="off">
                            <span class="text-danger error_court_name_0"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control court_case_0" name="miscmaster[0][court_case]" placeholder="" value="{{old('miscmaster[0][court_case]')}}" autocomplete="off">
                            <span class="text-danger error_court_case_0"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control parties_name_0" name="miscmaster[0][parties_name]" placeholder="" value="{{old('miscmaster[0][parties_name]')}}" autocomplete="off">
                            <span class="text-danger error_parties_name_0"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control counsel_name_0" name="miscmaster[0][counsel_name]" placeholder="" value="{{old('miscmaster[0][counsel_name]')}}" autocomplete="off">
                            <span class="text-danger error_counsel_name_0"></span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-outline-danger remove_btn" data-id="0"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                </tbody>
                <td colspan="7" class="text-end">
                    <button type="submit" class="btn btn-warning px-md-4 inputDisabled">Save</button>
                </td>
            </table>
        </form>
    </div>
</div>
@endsection
@section('page_specific_js')
<script src="{{asset('public/front\js\plugin\jquery-ui.js')}}"></script>
<script src="{{asset('public/front/js/masters/master_miscmaster.js')}}"></script>
<script>
    var array_counting = [0];
    var counting = 0;

    $(document).on('click', '.add_more', function() {

        $('.inputDisabled').prop("disabled", false);
        if (counting == 0) {

            let remove_html = ``;
            $('.row_0').append(remove_html);
        }
        counting++;
        array_counting.push(counting);
        console.log(array_counting);
        var miscmaster_html = `<tr class="row_${counting}">
                        <td>${counting + 1}</td>
                            <td>
                                <select class="form-control project_center_${counting}" name ="miscmaster[${counting}][project_center]" value="{{old('miscmaster[${counting + 1}][project_center]')}}" autocomplete="off">
                                        <option disabled> Select Centers </option>
                                        @foreach($centers as $a_key => $a_value)
                                        <option value="{{$a_key}}">{{$a_value}}</option>
                                        @endforeach
                                    </select>    
                                <span class="text-danger error_project_center_${counting }"></span>
                            </td>
                           <td>
                               <input type="text" name="miscmaster[${counting}][detail_cwp_slp]" class="form-control detail_cwp_slp_${counting}" placeholder="" autocomplete="off">
                               <span class="text-danger error_detail_cwp_slp_${counting}"></span>
                           </td>
                           <td>
                               <input type="text" name="miscmaster[${counting}][court_name]"  class="form-control court_name_${counting}"  placeholder="" autocomplete="off">
                               <span class="text-danger error_court_name_${counting}"></span>
                           </td>
                           <td>
                               <input type="text" class="form-control court_case_${counting}" name="miscmaster[${counting}][court_case]" placeholder="" autocomplete="off">
                               <span class="text-danger error_court_case_${counting}"></span>
                           </td>
                           <td>
                               <input type="text" class="form-control parties_name_${counting}" name="miscmaster[${counting}][parties_name]" placeholder="" autocomplete="off">
                               <span class="text-danger error_parties_name_${counting}"></span>
                           </td>
                           <td>
                               <input type="text" class="form-control counsel_name_${counting}" name="miscmaster[${counting}][counsel_name]" placeholder="" autocomplete="off">
                               <span class="text-danger error_counsel_name_${counting}"></span>
                           </td>
                           <td>
                                <a href="#" class="btn btn-outline-danger remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
                           </td>    
                    
                    </tr>`;
        $('#multiple_miscmaster_form_container').append(miscmaster_html);
    });
</script>
@endsection