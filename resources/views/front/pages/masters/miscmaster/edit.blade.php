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
            <form  class="edit_miscmaster_master" action="{{route('masters.miscmaster.update')}}" method="POST">
                @csrf
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>Details of the OA/WP/CWP/CP/SLP</th>
                        <th>Name of the Court</th>
                        <th>Brief issue involved in the Court case</th>
                        <th>Name of the parties</th>
                        <th>Name of the Counsel</th>
                    </tr>
                </thead>
                
                <tbody id="multiple_miscmaster_form_container">
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
                                <input type="text" name="detail_cwp_slp" class="form-control detail_cwp_slp" placeholder="" value="{{old('detail_cwp_slp',$data->detail_cwp_slp)}}" autocomplete="off">
                                <span class="text-danger error_detail_cwp_slp"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control court_name" name="court_name" placeholder="" value="{{old('court_name',$data->court_name)}}" autocomplete="off">
                                <span class="text-danger error_court_name"></span>                                
                            </td>
                            <td>
                                <input type="text" class="form-control court_case" name="court_case" placeholder="" value="{{old('court_case',$data->court_case)}}" autocomplete="off">
                                <span class="text-danger error_court_case"></span>                                
                            </td>
                            <td>
                                <input type="text" class="form-control parties_name" name="parties_name" placeholder="" value="{{old('parties_name',$data->parties_name)}}" autocomplete="off">
                                <span class="text-danger error_parties_name"></span>
                            </td>
                            <td>
                                <input type="text" class="form-control counsel_name" name="counsel_name" placeholder="" value="{{old('counsel_name',$data->counsel_name)}}" autocomplete="off">
                                <span class="text-danger error_counsel_name"></span>
                            </td>
                        </tr>
                   
                    
                </tbody>
                    <td colspan="8" class="text-end">
                        <button type="submit" class="btn btn-warning px-md-4">Update</button>
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
     $(document).ready(function(){
        $( ".datepicker" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
    });
</script>
@endsection