@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{asset('public/front\css\plugin\jquery-ui.css')}}">
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
       
        <h3 class="d-flex justify-content-between flex-wrap align-items-center">Status of Infra work upto Award of Tender</h3>
        <div class="table-responsive mt-3">
            <form  class="infra_master edit_finance_master" action="{{route('finance.update')}}" method="POST">
                @csrf
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>PROJECT ID / TITLE</th>
                        <th>BUDGET CODE</th>
                    </tr>
                </thead>
                
                <tbody id="multiple_infra_form_container">
                    
                        <tr class="row_0">
                            <td>1</td>
                            <td>
                                <select class="form-control" name ="project_center" autocomplete="off">
                                    <option disabled> Select Centers </option>
                                    @foreach($centers as $a_key => $a_value)
                                    <option value="{{$a_key}}" {{ old('project_center',$data->project_center_id) == $a_key ? 'selected' : '' }}>{{$a_value}}</option>
                                    @endforeach
                                </select>
                                @error('project_center')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="hidden" name="id" value ="{{ $data->id }}">
                                <input type="text" name="scheme_name" class="form-control scheme_name" placeholder="" value="{{old('scheme_name',$data->scheme_name)}}" autocomplete="off">
                                <span class="text-danger error_scheme_name"></span>                                
                            </td>
                            <td>
                                <input type="text" class="form-control budget_cost" name="budget_cost" placeholder="" value="{{old('budget_cost',$data->budget_cost)}}" autocomplete="off">
                                <span class="text-danger error_budget_cost"></span>
                            </td>
                        </tr>
                </tbody>
                    <td colspan="4" class="text-end">
                        <button type="submit" class="btn btn-warning px-md-4">Update</button>
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
     $(document).ready(function(){
        $( ".datepicker" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
    });
</script>
@endsection
