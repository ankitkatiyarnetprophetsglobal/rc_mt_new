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
        <a class="me-3" href="{{ url('/rc_mt/master/infrastructure') }}">
            <img src="{{ asset('/public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
        </a>
        {{-- <h3>Status under SAI BLOCK GRANTS (Rs. in crores)</h3> --}}
    </div>

    <h3 class="d-flex justify-content-between flex-wrap align-items-center">Status under SAI BLOCK GRANTS (Rs. in crores)<a class="btn btn-outline-success add_more" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> ADD</a></h3>
    <div class="table-responsive mt-3">
        <form class="finance_master">
            @csrf
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>NAME OF THE SCHEME</th>
                        <th>BUDGET CODE</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody id="multiple_finance_form_container">

                    <tr class="row_0">
                        <td>1</td>
                        <td>
                            <select class="form-control project_center_0" name="finance[0][project_center]" value="{{old('finance[0][project_center]')}}" autocomplete="off">
                                <option disabled> Select Centers </option>
                                @foreach($centers as $a_key => $a_value)
                                <option value="{{$a_key}}">{{$a_value}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error_project_center_0"></span>
                        </td>
                        <td>
                            <input type="text" name="finance[0][scheme_name]" class="form-control scheme_name_0" placeholder="NAME OF THE SCHEME" value="{{old('finance[0][project_title]')}}" autocomplete="off">
                            <span class="text-danger error_scheme_name_0"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control budget_cost_0" name="finance[0][budget_cost]" placeholder="BUDGET CODE" value="{{old('finance[0][cost]')}}" autocomplete="off">
                            <span class="text-danger error_budget_cost_0"></span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-outline-danger remove_btn" data-id="0"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                </tbody>
                <td colspan="4" class="text-end">
                    <button type="submit" class="btn btn-warning px-md-4 inputDisabled">Save</button>
                </td>
            </table>
        </form>
    </div>
</div>
@endsection
@section('page_specific_js')
<script src="{{asset('public/front\js\plugin\jquery-ui.js')}}"></script>
<script src="{{asset('public/front/js/masters/master_finance.js')}}"></script>
<script>
    var array_counting = [0];
    var counting = 0;
    // add row
    $(document).on('click', '.add_more', function() {

        $('.inputDisabled').prop("disabled", false);
        if (counting == 0) {

            let remove_html = ``;
            $('.row_0').append(remove_html);
        }
        counting++;
        array_counting.push(counting);

        var finance_html = `<tr class="row_${counting}">
                        <td>${counting + 1}</td>
                        <td>
                            <select class="form-control project_center_${counting}" name ="finance[${counting}][project_center]" value="{{old('finance[0][project_center]')}}" autocomplete="off">
                                    <option disabled> Select Centers </option>
                                @foreach($centers as $a_key => $a_value)
                                    <option value="{{$a_key}}">{{$a_value}}</option>
                                @endforeach
                            </select>    
                            <span class="text-danger error_project_center_${counting}"></span>
                        </td>
                        <td>
                            <input type="text" name="finance[${counting}][scheme_name]" class="form-control scheme_name_${counting}" placeholder="NAME OF THE SCHEME" autocomplete="off">
                            <span class="text-danger error_scheme_name_${counting}"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control budget_cost_${counting}" name="finance[${counting}][budget_cost]" placeholder="BUDGET CODE" autocomplete="off">
                            <span class="text-danger error_budget_cost_${counting}"></span>
                        </td>
                        <td>
                            <a hres="#" class="btn btn-outline-danger remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>`;
        $('#multiple_finance_form_container').append(finance_html);
    });
</script>
@endsection