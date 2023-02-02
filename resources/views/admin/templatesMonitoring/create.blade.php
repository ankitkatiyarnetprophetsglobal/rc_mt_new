@extends('front.layouts.layout')
@section('page_specific_css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('public/front/css/plugin/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/plugin/bootstrap.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <span class="spinner"></span>
        <form class="template_management">
            <div class="row justify-content-md-end justify-content-center my-3">
                <div class="col-lg-12 col-md-12 col-12">

                    <div class="row align-items-center mb-2">
                        <div class="col-10 col">
                            <h3>
                               Add New Templates
                            </h3>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-outline-success add_more add_btn" href="javascript:void(0)">
                                <i class="fa-solid fa-plus"></i> 
                                ADD
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rc_forms input-form" id="template_management_form_container">
                <div class="row_0">
                    <div class="row p-0 m-0 align-items-center">
                        <div class=" col-md-auto col-12 form-fields mb-4 ">
                            <fieldset>
                                <legend class="form_field_name"><span>TITLE/NAME OF TEMPLATE</span></legend>
                                <input type="text" class="form-control template_name_0" id="template_name[0][template_name]"
                                    name="monthly_monitoring[0][template_name]" aria-describedby="template name" autocomplete="off">                            
                            </fieldset>
                            <span class="text-danger error_template_name_0"></span>
                        </div>
                        <div class=" col-md-auto col-12 form-fields mb-4  ">
                            <fieldset>
                                <legend class="form_field_name"><span>FROM  DATE</span></legend>
                                <input type="text" class="form-control from_date_0 add_from_date_0" id="monthly_monitoring[0][from_date]"
                                    name="monthly_monitoring[0][from_date]" aria-describedby="from date" autocomplete="off">                            
                            </fieldset>
                            <span class="text-danger error_from_date_0"></span>
                        </div>
                        <div class=" col-md-auto col-12 form-fields mb-4  ">
                            <fieldset>
                                <legend class="form_field_name"><span>TO  DATE</span></legend>
                                <input type="text" class="form-control to_date_0 add_to_date_0" id="monthly_monitoring[0][to_date]"
                                    name="monthly_monitoring[0][to_date]" aria-describedby="to date" autocomplete="off">                           
                            </fieldset>
                            <span class="text-danger error_to_date_0"></span>
                        </div>
                        <div class=" col-md-auto col-12 form-fields mb-4  ">
                            <fieldset>
                                <legend class="form_field_name"><span >REGIONAL CENTER</span></legend>
                                @php $rc_details = getRcList(); @endphp
                                <select  class="form-select regional_center_0 monthly_monitoring_regional_center_0" id="monthly_monitoring[0][regional_center]" name="monthly_monitoring[0][regional_center][]" aria-label="regional center" multiple="multiple" autocomplete="off" >
                                    @foreach($rc_details as $key => $val)
                                   <option  value="{{$val->user_id}}">{{$val->user_name}}</option>
                                    @endforeach
                                </select>                            
                            </fieldset>
                            <span class="text-danger error_regional_center_0"></span>
                        </div>
                        <div class="col-md-auto col-12 form-fields mb-4  ">
                            <fieldset>
                                <legend class="form_field_name"><span>TEMPLATE</span></legend>
                                <select class="form-select template_0 monthly_monitoring_template_0" id="monthly_monitoring[0][template]" name="monthly_monitoring[0][template][]" aria-label="regional center" multiple="multiple" autocomplete="off">
                                    @foreach($template_data as $a_key => $a_value)
                                        <option value="{{ $a_key }}">{{$a_value}}</option>
                                    @endforeach
                                </select>                            
                            </fieldset>
                            <span class="text-danger error_template_0"></span>
                        </div>
                        <div class="col-md-auto col-12 form-fields mb-4  ">
                            <fieldset>
                                <legend class="form_field_name"><span>CATEGORIES</span></legend>
                                  <select class="form-select categories_0 monthly_monitoring_categories_0" id="monthly_categories" name="monthly_monitoring[0][categories][]" multiple="multiple" autocomplete="off">
                                    <option value="1">One time</option>                               
                                    <option value="2">Multiple time</option>                               
                                  </select>                            
                            </fieldset>
                            <span class="text-danger error_categories_0"></span>
                        </div>
                        <div class="col-md-auto col-12 mb-4 delete-icon">
                            <a href="#" class="btn btn-outline-danger remove_btn" data-id="0"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-12 ">
                <button type="submit" class="btn btn-warning px-md-4 inputDisabled">Save</button>
            </div>
        </div>
    </form>
@endsection
@section('page_specific_js')
   
    <script src="{{ asset('public/front/js/templatemanagement/templatemanagement.js') }}"></script>   
    <script src="{{ asset('public/front/js/templatemanagement/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/front/js/templatemanagement/bootstrap-multiselect.js') }}"></script>

    <script>
    
        selected_template = []; 
        selected_regional_center = [];

        $(document).ready(function() {
            
            $('.monthly_monitoring_regional_center_0').multiselect({
                includeSelectAllOption: true,
            });

            $('.monthly_monitoring_template_0').multiselect({
                includeSelectAllOption: true,
            });

            $('.monthly_monitoring_categories_0').multiselect({
                includeSelectAllOption: true,
            });
            
        });

    $(document).ready(function(){
        
        // $(".add_from_date_0").datepicker({
        //     // dateFormat : "dd-mm-yy",
        //     onSelect: function (selected,evnt) {
                
        //         var dt = new Date(selected);
        //         dt.setDate(dt.getDate() + 1);
        //         $(".add_to_date_0").datepicker("option", "minDate", dt);
                
        //     }
        // });

        // $(".add_to_date_0").datepicker({
        //     // dateFormat : "dd-mm-yy",
        //     onSelect: function (selected) {
        //         var dt = new Date(selected);
        //         dt.setDate(dt.getDate() - 1);
        //         $(".add_from_date_0").datepicker("option", "maxDate", dt);
        //     }
        // });


        $(function(){
            
            $(".add_to_date_0").datepicker({ dateFormat: 'dd-mm-yy' });
            
            $(".add_from_date_0").datepicker({ dateFormat: 'dd-mm-yy' }).bind("change",function(){
                var minValue = $(".add_from_date_0").val();
                minValue = $.datepicker.parseDate("dd-mm-yy", minValue);
                minValue.setDate(minValue.getDate()+1);
                $(".add_to_date_0").datepicker( "option", "minDate", minValue );
            })
        });

    });

    function getProjectTitle(selected_template){
            
            var template = '';
            
            @foreach($template_data as $p_key => $p_val)
                
            if(jQuery.inArray("{{$p_key}}", selected_template) == -1){
                template += '<option value="{{$p_key}}">{{$p_val}}</option>';
            }
        
            @endforeach
            
            return template;
        }
    
    function get_regional_center(selected_regional_center){
            
            var regional_center = '';
            
            @foreach($rc_details as $p_key => $p_val)
                
            if(jQuery.inArray("{{ $p_val->user_id }}", selected_regional_center) == -1){
                regional_center += '<option value="{{ $p_val->user_id }}">{{ $p_val->user_name }}</option>';
            }
        
            @endforeach
            
            return regional_center;
        }

        jQuery(function($){
            $(document).ajaxSend(function() {
                $("#overlay").fadeIn(300);　
            });
                    
            $('#button').click(function(){
                $.ajax({
                type: 'GET',
                success: function(data){
                    console.log(data);
                }
                }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
                });
            });	
        });
    </script>
@endsection
