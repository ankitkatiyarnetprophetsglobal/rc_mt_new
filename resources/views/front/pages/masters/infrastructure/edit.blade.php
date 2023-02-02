@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{asset('public/front\css\plugin\jquery-ui.css')}}">
@endsection
@section('content')
    <div class="manageTable">
       
        <div class="alert alert-danger error_message d-none">
            
        </div>
       <div class="d-flex justify-content-between flex-wrap align-items-center">
            <div class="d-flex "> 
                <a class="me-3" href="{{route('infrastructure.index')}}"><img src="{{asset('public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
                </a>
                <h3>Edit Infrastructure Project Details</h3>
            </div>
        </div>



        <div class="table-responsive mt-3">
            <form class="infra_master" action="{{route('infrastructure.update')}}" method="POST">
                @csrf
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>PROJECT ID / TITLE</th>
                        <th>COST AS PER PE (IN CR.)</th>
                        <th>DATE OF AA/ES</th>
                        <th>AGENCY</th>
                        <th>STATUS</th>
                        
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
                                <input type="hidden" name="id" value ="{{$data->id}}">
                                <input type="text" name="project_title" class="form-control" placeholder="Project ID / Title" value="{{old('project_title',$data->project_title)}}" autocomplete="off" >
                                @error('project_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </td>
                            <td>
                                <input type="number" step=any class="form-control" name="cost" placeholder="Cost" value="{{old('cost',$data->cost)}}" autocomplete="off">
                                @error('cost')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="text" class="form-control datepicker" name="date" value="{{old('date',date('d-m-Y',strtotime($data->date)))}}" autocomplete="off" placeholder="Select a date">
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <select class="form-control" name ="agency" autocomplete="off">
                                    <option disabled> Select Agency </option>
                                    @foreach($agencies as $a_key => $a_value)
                                    <option value="{{$a_key}}" {{ old('agency',$data->agency_id) == $a_key ? 'selected' : '' }}>{{$a_value}}</option>
                                    @endforeach
                                </select>
                                @error('agency')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <select class="form-control" name ="status" autocomplete="off">
                                    <option disabled> Select Status </option>
                                    
                                    <option value="1" {{ old('status',$data->status) == '1' ? 'selected' : '' }}>{{__('Active')}}</option>
                                    <option value="0" {{ old('status',$data->status) == '0' ? 'selected' : '' }}>{{__('In-Active')}}</option>
                                    
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            
                        </tr>
                   
                    
                </tbody>
                <tr>
                    <td colspan="7"class="text-end">
                     <button type="submit" class="btn btn-warning px-md-4">Update</button>
 
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
     $(document).ready(function(){
        $( ".datepicker" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
    });
</script>
@endsection
