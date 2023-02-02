@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{asset('public/front\css\plugin\jquery-ui.css')}}">
@endsection
@section('content')
<div class="manageTable">

    <div class="alert alert-danger error_message d-none">

    </div>

    {{-- <h3 class="d-flex justify-content-between flex-wrap align-items-center">Status of Infra work upto Award of Tender<a
                class="btn btn-outline-success add_more" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> ADD</a>
        </h3> --}}

    <div class="d-flex justify-content-between flex-wrap align-items-center">
        <div class="d-flex ">
            <a class="me-3" href="{{ URL::previous() }}"><img src="{{asset('public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
            </a>
            <h3>Add Infrastructure Project Details</h3>
        </div>
        <a class="btn btn-outline-success add_more" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> ADD</a>
    </div>
    <div class="table-responsive mt-3">
        <form class="infra_master">

            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>PROJECT ID / TITLE</th>
                        <th>COST AS PER PE (IN CR.)</th>
                        <th>DATE OF AA/ES</th>
                        <th>AGENCY</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody id="multiple_infra_form_container">

                    <tr class="row_0">
                        <td>1</td>
                        <td>
                            <select class="form-control project_center_0" name="infra[0][project_center]" value="{{old('infra[0][project_center]')}}" autocomplete="off">
                                <option disabled> Select Centers </option>
                                @foreach($centers as $a_key => $a_value)
                                <option value="{{$a_key}}">{{$a_value}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error_project_center_0"></span>
                        </td>
                        <td>
                            <input type="text" name="infra[0][project_title]" class="form-control project_title_0" placeholder="Project ID / Title" value="{{old('infra[0][project_title]')}}" autocomplete="off">
                            <span class="text-danger error_project_title_0"></span>
                        </td>
                        <td>
                            <input type="number" step=any class="form-control cost_0" name="infra[0][cost]" placeholder="Cost" value="{{old('infra[0][cost]')}}" autocomplete="off">
                            <span class="text-danger error_cost_0"></span>
                        </td>
                        <td>
                            <input type="text" class="form-control date_0 datepicker_0" name="infra[0][date]" value="{{old('infra[0][date]')}}" autocomplete="off" placeholder="Select a date">
                            <span class="text-danger error_date_0"></span>
                        </td>
                        <td>
                            <select class="form-control agency_0" name="infra[0][agency]" value="{{old('infra[0][agency]')}}" autocomplete="off">
                                <option disabled> Select Agency </option>
                                @foreach($agencies as $a_key => $a_value)
                                <option value="{{$a_key}}">{{$a_value}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error_agency_0"></span>
                        </td>

                    </tr>


                </tbody>
                <tr>
                    <td colspan="6" class="text-end">
                        <button type="submit" class="btn btn-warning px-md-4">Save</button>

                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
@endsection
@section('page_specific_js')
<script src="{{asset('public/front\js\plugin\jquery-ui.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".datepicker_0").datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
        });
    });
    var array_counting = [0];
    var counting = 0;
    $(document).on('click', '.add_more', function() {
        if (counting == 0) {
            let remove_html = `<td>
                                <button class="btn btn-outline-danger remove_btn" data-id = "0"><i class="fa-solid fa-trash-can"></i></button>
                                </td>`;
            $('.row_0').append(remove_html);
        }
        counting++;
        array_counting.push(counting);
        // console.log(array_counting);
        var infra_html = `<tr class="row_${counting}">
                            <td>${counting + 1}</td>
                            <td>
                            <select class="form-control project_center_${counting}" name ="infra[${counting}][project_center]" value="{{old('infra[${counting}][project_center]')}}" autocomplete="off">
                                    <option disabled>Select Centers </option>
                                    @foreach($centers as $a_key => $a_value)
                                    <option value="{{$a_key}}">{{$a_value}}</option>
                                    @endforeach
                                </select>    
                            <span class="text-danger error_project_center_0"></span>
                            </td>
                            <td>
                                <input type="text" name="infra[${counting}][project_title]" class="form-control project_title_${counting}" placeholder="Project ID / Title" autocomplete="off">
                                <span class="text-danger error_project_title_${counting}"></span>
                            </td>
                            <td>
                                <input type="number" step=any class="form-control cost_${counting}" name="infra[${counting}][cost]" placeholder="Cost" autocomplete="off">
                                <span class="text-danger error_cost_${counting}"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control date_${counting} datepicker_${counting}" name="infra[${counting}][date]" placeholder="dd-mm-yyyy" autocomplete="off">
                                <span class="text-danger error_date_${counting}"></span>
                            </td>
                            <td>
                                <select class="form-control agency_${counting}" name ="infra[${counting}][agency]" autocomplete="off">
                                    <option disabled> Select Agency </option>
                                    @foreach($agencies as $a_key => $a_value)
                                    <option value="{{$a_key}}">{{$a_value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error_agency_${counting}"></span>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>`;
        $('#multiple_infra_form_container').append(infra_html);
        $(`.datepicker_${counting}`).datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
        });
    });

    $(document).on('click', '.remove_btn', function() {
        counting--;
        $('.row_' + $(this).data("id")).remove();
        var current_item = $(this).data("id");
        array_counting = $.grep(array_counting, function(value) {
            return value != current_item;
        });

    });
    // $(document).ready(function(){
    //     $(".datepicker").datepicker();
    // })
    $('.infra_master').on('submit', function(e) {
        e.preventDefault();
        let condition = true;
        var form_input_title = [];
        for (let i = 0; i < array_counting.length; i++) {
            if ($('.project_title_' + array_counting[i]).val() == '') {

                $('.error_project_title_' + array_counting[i]).text('please enter project title.');
                $('.project_title_' + array_counting[i]).focus();
                condition = false;
                form_input_title = [];
                break;
            } else {

                if ($.inArray($('.project_title_' + array_counting[i]).val(), form_input_title) != -1) {
                    $('.error_project_title_' + array_counting[i]).text('THE PROJECT TITLE HAS ALREADY BEEN TAKEN.');
                    form_input_title = [];
                    condition = false;
                    break;
                }
                form_input_title.push($('.project_title_' + array_counting[i]).val());
                let val = $('.project_title_' + array_counting[i]).val();
                // let regex = /^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/;
                let regex = /^[a-zA-Z0-9_@#$&-_%^=. - !@#$%^&*() <> ? / ]*$/;
                if (!regex.test(val)) {

                    $('.error_project_title_' + array_counting[i]).text('Please Enter a valid project title.');
                    condition = false;
                    form_input_title = [];
                    break;
                } else {
                    $('.error_project_title_' + array_counting[i]).text('');
                }

            }
            if ($('.cost_' + array_counting[i]).val() == '') {
                //    $('.error_cost_'+array_counting[i]).text('please enter cost.');
                //     $('.cost_'+array_counting[i]).focus(); 
                //     condition = false;
                form_input_title = [];
                break;
            } else {
                let val = $('.cost_' + array_counting[i]).val();
                let regex = /^(\+|-)?(\d*\.?\d*)$/;
                if (regex.test(val)) {
                    $('.error_cost_' + array_counting[i]).text('');
                } else {
                    $('.error_cost_' + array_counting[i]).text('');
                    $('.error_cost_' + array_counting[i]).text('Please Enter a valid Cost');
                    $('.cost_' + array_counting[i]).focus();
                    return false;
                    form_input_title = [];
                }
            }
            if ($('.date_' + array_counting[i]).val() == '') {
                // $('.error_date_'+array_counting[i]).text('please select a date.');
                // $('.date_'+array_counting[i]).focus();
                // condition = false;
                form_input_title = [];
                break;
            } else {
                $('.error_date_' + array_counting[i]).text('');
            }
            if ($('.agency_' + array_counting[i]).val() == '') {
                $('.error_agency_' + array_counting[i]).text('please select an agency.');
                $('.agency_' + array_counting[i]).focus();
                condition = false;
                form_input_title = [];
                break;

            } else {
                $('.error_agency_' + array_counting[i]).text('');
            }
        }
        if (condition) {
            form_input_title = [];
            var formdata = new FormData($('.infra_master')[0]);

            $.ajax({
                method: "POST",
                url: "{{route('infrastructure.store')}}",
                data: formdata,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success == false) {
                        $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                        $('.error_message').removeClass('d-none');
                    } else {

                        window.location.href = "{{route('infrastructure.index')}}";
                    }
                }

            });
        }

    })
</script>
@endsection