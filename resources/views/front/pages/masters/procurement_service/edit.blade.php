@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{asset('public/front\css\plugin\jquery-ui.css')}}">
@endsection
@section('content')
    <div class="manageTable">
       
        <div class="alert alert-danger error_message d-none">
            
        </div>
        {{-- <div class="d-flex "> 
            <a class="me-3" href="{{route('procurement.service.index')}}"><img src="{{asset('public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
            </a>
        </div> --}}
        {{-- <h3 class="d-flex justify-content-between flex-wrap align-items-center">Update Procurement Service Title / Details</h3> --}}
        <div class="d-flex justify-content-between flex-wrap align-items-center">
            <div class="d-flex "> 
                <a class="me-3" href="{{route('procurement.service.index')}}"><img src="{{asset('public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
                </a>
                <h3 >Edit Procurement Service Title / Details</h3></div>
           </div>
        <div class="table-responsive mt-3">
            <form class="infra_master" action="{{route('procurement.service.update')}}" method="POST">
                @csrf
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>Title / Details</th>
                        <th>Expiry date of existing contract</th>
                        <th>Existing contract value</th>
                        <th>Status</th>
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
                                <input type="text" name="title" class="form-control" placeholder="Title / Details" value="{{old('title',$data->title)}}" autocomplete="off">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                               
                                <input type="text" name="expiry_date_of_existing_contract" class="form-control expiry_date_of_existing_contract" placeholder="dd-mm-yyyy" value="{{old('expiry_date_of_existing_contract',date('d-m-Y',strtotime($data->expiry_date_of_existing_contract)))}}" autocomplete="off">
                                @error('expiry_date_of_existing_contract')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                               
                                <input type="text" name="existing_contract_value" class="form-control existing_contract_value" placeholder="Title / Details" value="{{old('existing_contract_value',$data->existing_contract_value)}}" autocomplete="off">
                                @error('existing_contract_value')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                               
                                <select class="form-control" name ="status" autocomplete="off">
                                    <option disabled> Select Status </option>
                                    
                                    <option value="1" {{old('status',$data->status) == '1' ? 'selected' : ''}}>{{__('Active')}}</option>
                                    <option value="0" {{old('status',$data->status) == '0' ? 'selected' : ''}}>{{__('In-Active')}}</option>
                                   
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            
                        </tr>
                   
                    
                </tbody>
                <tr>
                    <td colspan="6"class="text-end">
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
        
        $(".expiry_date_of_existing_contract").datepicker({
                 slideDown: true,
                dateFormat: "dd-mm-yy",
              });
    })
</script>
@endsection
