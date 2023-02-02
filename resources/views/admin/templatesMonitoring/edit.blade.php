@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
@endsection
@section('content')
    <div class="container">
        <form class="edit_template_management" action="{{route('temp.manage.update')}}" method="POST">
            @csrf
            <div class="row justify-content-md-end justify-content-center my-3">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row align-items-center mb-2">
                        <div class="col-12">
                            <h3>Edit Template</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rc_forms row_0" id="template_management_form_container">
                <div class="row p-0 m-0 align-items-center">
                    <div class=" col-md-auto col-12 form-fields mb-4 ">
                        <fieldset>
                            <legend class="form_field_name"><span>TITLE/NAME OF TEMPLATE</span></legend>
                            <input type="hidden" name="id" value ="{{ $data->id ?? '' }}">
                            <input type="text" class="form-control template_name" id="template_name"
                                name="template_name" aria-describedby="template name" autocomplete="off" value ="{{ $data->name ?? '' }}">
                            <span class="text-danger error_template_name"></span>
                        </fieldset>
                    </div>
                    <div class=" col-md-auto col-12 form-fields mb-4  ">
                        <fieldset>
                            <legend class="form_field_name"><span>FROM  DATE</span></legend>
                            <input type="text" class="form-control from_date from_datepicker_0 edit_from_date" id="txtFrom" name="from_date" aria-describedby="from date" autocomplete="off" value ="{{ date('d-m-Y',strtotime($data->from_date)) ?? '' }}">
                            <span class="text-danger error_from_date"></span>
                        </fieldset>
                    </div>
                    <div class=" col-md-auto col-12 form-fields mb-4  ">
                        <fieldset>
                            <legend class="form_field_name"><span>TO  DATE</span></legend>
                            <input type="text" class="form-control to_date to_datepicker_0 edit_to_date" id="txtTo" name="to_date" aria-describedby="to date" autocomplete="off" value={{ date('d-m-Y',strtotime($data->to_date)) }}>
                            <span class="text-danger error_to_date"></span>
                        </fieldset>
                    </div>
                    <div class=" col-md-auto col-12 form-fields mb-4  ">
                        <fieldset>
                            <legend class="form_field_name"><span>REGIONAL CENTER</span></legend>
                            @php 
                                $rc_id_array = explode(',', $data->rc_id); 
                                $rc_details = getRcList(); 
                            @endphp
                            <select class="form-select regional_center_0 monthly_monitoring_regional_center_0 regional_center" id="regional_center" name="regional_center[]" aria-label="regional center" multiple="multiple" autocomplete="off">
                                @foreach($rc_details as $key => $val)
                                    <option value="{{$val->user_id}}" @if(in_array($val->user_id,$rc_id_array)) selected @endif>{{$val->user_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error_regional_center"></span>
                        </fieldset>
                    </div>
                    <div class="col-md-auto col-12 form-fields mb-4  ">
                        <fieldset>
                            <legend class="form_field_name"><span>TEMPLATE</span></legend>
                                @php $temp_section_id_array = explode(',', $data->temp_section_id); @endphp
                                <select class="form-select template monthly_monitoring_template_0" id="template" name="template[]" aria-label="regional center" multiple="multiple" autocomplete="off">

                                    @foreach($template_dropdown_data as $a_key => $a_value)
                                        <option value="{{ $a_key }}" @if(in_array($a_key,$temp_section_id_array)) selected @endif>{{$a_value}}</option>
                                    @endforeach
                                </select>
                            <span class="text-danger error_template"></span>
                        </fieldset>
                    </div>
                    <div class="col-md-auto col-12 form-fields mb-4  ">
                        <fieldset>
                            <legend class="form_field_name"><span>CATEGORIES</span></legend>
                                @php $temp_categories_id_array = explode(',', $data->categories_id); @endphp
                                @php $dropdown = array("1"=>"One time", "2"=>"Multiple time"); @endphp

                                <select class="form-select categories monthly_monitoring_categories_0" id="monthly_categories" name="categories[]" multiple="multiple" autocomplete="off">                                
                                    @foreach($dropdown as $a_key => $a_value)
                                        <option value="{{ $a_key }}" @if(in_array($a_key,$temp_categories_id_array)) selected @endif>{{$a_value}}</option>  
                                    @endforeach                                    
                                </select>
                                <span class="text-danger error_categories"></span>
                        </fieldset>
                    </div>
            </div>
            <div class="col-12 ">
                <button type="update" class="btn btn-warning px-md-4 inputDisabled">Update</button>
            </div>
        </div>
    </form>
@endsection
@section('page_specific_js')
   
    <script src="{{ asset('public/front/js/templatemanagement/templatemanagement.js') }}"></script>
    <script src="{{ asset('public/front/js/templatemanagement/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/front/js/templatemanagement/bootstrap-multiselect.js') }}"></script>

    <script>
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

</script>
@endsection
