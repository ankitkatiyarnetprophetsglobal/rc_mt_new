@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
    <script>
        var select_project_title = [];
        var form_first_count = [];        
       </script>
@endsection
@section('content')

    <div class="manageInfracture" autoComplete="off">
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
            <form style="display: flex; justify-content: end; margin-bottom: 10px;" class="">
                {{-- Request::segment(5) --}}
                <select class="form-control form-select center_id center_change" id="project_center_id"  name="infra_manage[0]project_center_id" style="width: 20%;">                    
                        @foreach($centers as $p_key => $p_val)
                            <option value="{{$p_key}}" {{$p_key== $centerid ? 'selected' : ''}}>{{$p_val}}</option>
                        @endforeach
                 </select>
            </form>
            <h3 class="d-flex justify-content-between flex-wrap align-items-center">
                Financial Management
                <h3 class="d-flex justify-content-between flex-wrap align-items-center">&nbsp;
                    <a class="btn btn-outline-success add_more" href="javascript:void(0)">
                        <i class="fa-solid fa-plus"></i>ADD</a>
                </h3>
            </h3>
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
                                <th>Budget code</th>
                                <th>BE / RE </th>
                                <th>Opening Balance </th>
                                <th>Funds received </th>
                                <th>Total funds available </th>
                                <th>Expenditure incurred </th>
                                <th>Committed liabilities </th>
                                <th>Balance </th>
                                <th>Remarks</th>
                                <th rowspan="2">Remove</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>02</th>
                                <th>03</th>
                                <th>04</th>
                                <th>05</th>
                                <th>06</th>
                                <th>07 <br> (5 + 6)</th>
                                <th>08</th>
                                <th>09</th>
                                <th>10 <br> 7- 8 + 9</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="multiple_finance_manage_container">
                            @if($data1->count() > 0)
                                @foreach ($data1 as $key => $value1)
                                    <script>
                                        select_project_title.push("{{$value1->finance_id}}");
                                    </script>    
                                    <tr class="row_{{$key}}">
                                        <td class="row_id">{{ $key + 1 }}</td>
                                        <td>
                                            <input type="hidden" name="managefinance[{{$key}}][id]" value="{{ $value1->id ?? '' }}">
                                            <input type="hidden" name="managefinance[{{$key}}][project_center_id]" value="{{ $centerid ?? ''}}">
                                            <input type="hidden" name="managefinance[{{$key}}][template_id]" value="{{$value1->template_id}}">
                                            <select class="form-control project_title project_title_{{$key}}" data-id="{{$key}}" name="managefinance[{{$key}}][project_title]" readonly>
                                                <option selected disabled>Project ID/Title</option>
                                                @foreach($data as $a_key => $a_value)
                                                    <option value="{{ $a_key }}" {{$a_key == $value1->finance_id ? 'selected' : 'disabled'}}>{{$a_value}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error_project_title_0"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control budgetcode_{{$key}}" name="managefinance[{{$key}}][budgetcode]" placeholder="Budget Code" value="{{ $value1['budget_code'] }}" autocomplete="off" readonly>
                                            <span class="text-danger error_budgetcode_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control bere_{{$key}}" name="managefinance[{{$key}}][bere]" placeholder="BE/RE" value="{{ $value1['be_re'] }}" autocomplete="off">
                                            <span class="text-danger error_bere_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control openingbalance openingbalance_{{$key}}" data-id = "{{$key}}" name="managefinance[{{$key}}][openingbalance]" placeholder="Opening Balance" value="{{ $value1['opening_balance'] }}" autocomplete="off" >
                                            <span class="text-danger error_openingbalance_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control fundsreceived fundsreceived_{{$key}}" data-id = "{{$key}}" name="managefinance[{{$key}}][fundsreceived]" placeholder="Funds Received" value="{{ $value1['fund_received'] }}" autocomplete="off">
                                            <span class="text-danger error_fundsreceived_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control totalfundsavailable totalfundsavailable_{{$key}}" data-id = "{{$key}}" name="managefinance[{{$key}}][totalfundsavailable]" placeholder="Total Funds Available" value="{{ $value1['total_funds'] }}" autocomplete="off" readonly>
                                            <span class="text-danger error_totalfundsavailable_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control expenditureincurred expenditureincurred_{{$key}}" data-id = "{{$key ?? ''}}" name="managefinance[{{$key}}][expenditureincurred]" placeholder="Expenditure Incurred" value="{{ $value1['expenditure_incurred'] }}" autocomplete="off">
                                            <span class="text-danger error_expenditureincurred_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control committedliabilities committedliabilities_{{$key}}" data-id = "{{$key ?? ''}}" name="managefinance[{{$key}}][committedliabilities]" placeholder="Committed Liabilities" value="{{ $value1['commited_liabilities'] }}" autocomplete="off">
                                            <span class="text-danger error_committedliabilities_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control balance balance_{{$key}}" data-id = "{{$key}}" name="managefinance[{{$key ?? ''}}][balance]" placeholder="Bbalance" value="{{ $value1['balance'] }}" autocomplete="off" readonly>
                                            <span class="text-danger error_balance_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control remarks_{{$key}}" name="managefinance[{{$key}}][remarks]" placeholder="Remarks" value="{{ $value1['remark'] }}" autocomplete="off">
                                            <span class="text-danger error_remarks_{{$key}}"></span>
                                        </td>
                                        <td>
                                            <a href="#" class="actionbtn remove_btn" data-id="{{$key}}" data-db_id="{{$value1->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @else
                                <tr class="row_0">
                                    <td>1</td>
                                    <td>
                                        <input type="hidden" name="managefinance[0][project_center_id]" value="{{ $centerid ?? ''}}">
                                        <input type="hidden" name="managefinance[0][template_id]" value="{{$temp_id}}">
                                        <select name="managefinance[0][project_title]" data-id="0" class="form-select project_title_0 change_budget project_title">
                                            <option selected disabled>Project ID/Title</option>
                                            @foreach($data as $a_key => $a_value)
                                                <option value="{{ $a_key }}">{{$a_value}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error_project_title_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control budgetcode_0" name="managefinance[0][budgetcode]" placeholder="Budget Code" value="{{ $value1['budget_code'] ?? old('infra[0][budget_code]') }}" autocomplete="off" readonly>
                                        <span class="text-danger error_budgetcode_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control bere_0" name="managefinance[0][bere]" placeholder="BE/RE" value="{{ $value1['be_re'] ?? old('infra[0][be_re]') }}" autocomplete="off">
                                        <span class="text-danger error_bere_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control openingbalance openingbalance_0" data-id="0" name="managefinance[0][openingbalance]" placeholder="Opening Balance" value="{{ $value1['opening_balance'] ?? old('infra[0][opening_balance]')}}" autocomplete="off">
                                        <span class="text-danger error_openingbalance_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control fundsreceived fundsreceived_0" data-id="0" name="managefinance[0][fundsreceived]" placeholder="Funds Received" value="{{ $value1['fund_received'] ?? old('infra[0][fundsreceived]')}}" autocomplete="off">
                                        <span class="text-danger error_fundsreceived_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control totalfundsavailable totalfundsavailable_0" data-id="0" name="managefinance[0][totalfundsavailable]" placeholder="Total Funds Available" value="{{ $value1['total_funds'] ?? old('infra[0][totalfundsavailable]') }}" autocomplete="off" readonly>
                                        <span class="text-danger error_totalfundsavailable_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control expenditureincurred expenditureincurred_0" data-id="0" name="managefinance[0][expenditureincurred]" placeholder="Expenditure Incurred" value="{{ $value1['expenditure_incurred'] ?? old('infra[0][expenditureincurred]') }}" autocomplete="off">
                                        <span class="text-danger error_expenditureincurred_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control committedliabilities committedliabilities_0" data-id="0" name="managefinance[0][committedliabilities]" placeholder="Committed Liabilities" value="{{ $value1['committedliabilities'] ?? old('infra[0][committedliabilities]') }}" autocomplete="off">
                                        <span class="text-danger error_committedliabilities_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control balance balance_0" name="managefinance[0][balance]" data-id="0" placeholder="Bbalance" value="{{ $value1['balance'] ?? old('infra[0][balance]') }}" autocomplete="off" readonly>
                                        <span class="text-danger error_balance_0"></span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control remarks_0" name="managefinance[0][remarks]" placeholder="Remarks" value="{{ $value1['remark'] ?? old('infra[0][remark]') }}" autocomplete="off">
                                        <span class="text-danger error_remarks_0"></span>
                                    </td>
                                    <td>
                                        <a href="#" class="actionbtn remove_btn" data-id="0" data-db_id = ""><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endif                    
                        </tbody>

                            <tr>
                                <td colspan="12" class="text-end">
                                    <button type="submit" class="btn btn-warning px-md-4">Save</button>
                                </td>
                            </tr>  
                        
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page_specific_js')
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('public/front/js/plugin/jquery-ui.js')}}"></script>

    <script src="{{asset('public/front/js/manage/manage_finance.js')}}"></script>
    <script>
        var temp_id = "{{$temp_id}}";
        var form_first_count = "{{ $data1->count()}} ";
        var encode_temp_id = "{{encode5t($temp_id)}}";
        var array_counting = [];
        if(form_first_count == 0){
            var counting = 0;
            array_counting.push(0);
        }else{
            var counting = form_first_count*1 - 1; 
            for(let i = 0; i < form_first_count ;i++){
                array_counting.push(i);
            }
        }
    

        function getProjectTitle(selected_title){
            
            var project_title = '';
            
            @foreach($data as $p_key => $p_val)
                
            if(jQuery.inArray("{{$p_key}}", selected_title) == -1){
                project_title += '<option value="{{$p_key}}">{{$p_val}}</option>';
            }
        
            @endforeach
            
            return project_title;
        }
        
    </script>
@endsection
