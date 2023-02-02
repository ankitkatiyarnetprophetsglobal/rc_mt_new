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
            <a class="me-3" href="{{route('procurement.index')}}"><img src="{{asset('public/front\themes\svg\arrow-left-circle.svg')}}" alt="">
            </a>
            <h3 >Add Procurement Project Title / Details</h3></div><a
            class="btn btn-outline-success add_more" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> ADD</a>
       </div>
       
        <div class="table-responsive mt-3">
            <form class="infra_master">
                
            <table class="table table-bordered pt-2">
                <thead>
                    <tr>
                        <th>SN.NO</th>
                        <th>CENTERS</th>
                        <th>Type</th>
                        <th>Title / Details</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                
                <tbody id="multiple_infra_form_container">
                    
                        <tr class="row_0">
                            <td>1</td>
                            <td>
                            <select class="form-control project_center_0" name ="procurement[0][project_center]" value="{{old('procurement[0][project_center]')}}" autocomplete="off">
                                    <option disabled> Select Centers </option>
                                    @foreach($centers as $a_key => $a_value)
                                    <option value="{{$a_key}}">{{$a_value}}</option>
                                    @endforeach
                                </select>    
                            <span class="text-danger error_project_center_0"></span>
                            </td>
                            <td>
                                <select class="form-control type_0" name ="procurement[0][type]" value="{{old('procurement[0][type]')}}" autocomplete="off">
                                    <option disabled> Select Type </option>
                                    <option value="equipment">{{__('Equipment')}}</option>
                                    <option value="services">{{__('Services')}}</option>
                                </select>
                                <span class="text-danger error_type_0"></span>
                            </td>
                            <td>
                                <input type="text" name="procurement[0][title]" class="form-control title_0" placeholder="Title / Details" value="{{old('infra[0][title]')}}" autocomplete="off">
                                <span class="text-danger error_title_0"></span>
                            </td>
                           
                            
                        </tr>
                   
                    
                </tbody>
                <tr>
                   <td colspan="6"class="text-end">
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
   
        var array_counting = [0];
        var counting = 0;
        $(document).on('click','.add_more',function(){
            if(counting == 0){
                let remove_html = `<td>
                                <button class="btn btn-outline-danger remove_btn" data-id = "0"><i class="fa-solid fa-trash-can"></i></button>
                                </td>`;
               $('.row_0').append(remove_html);
            }
            counting++;
            array_counting.push(counting);
            console.log(array_counting);
            var infra_html = `<tr class="row_${counting}">
                            <td>${counting + 1}</td>
                            <td>
                            <select class="form-control project_center_${counting}" name ="procurement[${counting}][project_center]" value="{{old('procurement[${counting}][project_center]')}}" autocomplete="off">
                                    <option disabled> Select Centers </option>
                                    @foreach($centers as $a_key => $a_value)
                                    <option value="{{$a_key}}">{{$a_value}}</option>
                                    @endforeach
                                </select>    
                            <span class="text-danger error_project_center_0"></span>
                            </td>
                            <td>
                                <select class="form-control type_${counting}" name ="procurement[${counting}][type]" value="{{old('procurement[${counting}][type]')}}" autocomplete="off">
                                    <option disabled> Select Type </option>
                                    <option value="equipment">{{__('Equipment')}}</option>
                                    <option value="services">{{__('Services')}}</option>
                                </select>
                                <span class="text-danger error_type_${counting}"></span>
                            </td>
                            <td>
                                <input type="text" name="procurement[${counting}][title]" class="form-control title_${counting}" placeholder="Title / Details" value="{{old('infra[${counting}][title]')}}" autocomplete="off">
                                <span class="text-danger error_title_${counting}"></span>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>`;
            $('#multiple_infra_form_container').append(infra_html);
           
        });

        $(document).on('click','.remove_btn',function(){
           counting--;
           $('.row_'+$(this).data("id")).remove();
           var current_item = $(this).data("id");
           array_counting = $.grep(array_counting, function(value) {
            return value != current_item;
            });
            
        });
        // $(document).ready(function(){
        //     $(".datepicker").datepicker();
        // })
        var form_input_title = [];
        $('.infra_master').on('submit',function(e){
            e.preventDefault();
            let condition = true;
            for(let i=0;i< array_counting.length; i++){
                if($('.type_'+array_counting[i]).val()  == ''){
                $('.error_type_'+array_counting[i]).text('please select project type.');
                $('.type_'+array_counting[i]).focus();
                condition = false;
                form_input_title = [];
                break;
                }else{
                $('.error_type_'+array_counting[i]).text('');
                } 
               if($('.title_'+array_counting[i]).val()  == ''){
                $('.error_title_'+array_counting[i]).text('please enter title / details.');
                $('.title_'+array_counting[i]).focus();
                condition = false;
                form_input_title = [];
                break;
                }else{
                    
                    console.log($.inArray($('.title_'+array_counting[i]).val(),form_input_title),'i-'+i);
                    if($.inArray($('.title_'+array_counting[i]).val(),form_input_title) != -1 ){
                        $('.error_title_'+array_counting[i]).text('The Project Title Has Already Been Taken.');
                        form_input_title = [];
                        condition = false;
                         break;
                    }
                    form_input_title.push($('.title_'+array_counting[i]).val());
                    
                    let val = $('.title_'+array_counting[i]).val();
                    // let regex = /^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/;
                    let regex = /^[a-zA-Z0-9_@#$&-_%^=. - !@#$%^&*() <> ? / ]*$/;
                    if(!regex.test(val)){
                        console.log('if');
                        $('.error_title_'+array_counting[i]).text('Please Enter a valid title / details.');
                        condition = false;
                        form_input_title = [];
                         break;
                    }else{
                        //condition = false;
                        $('.error_title_'+array_counting[i]).text('');
                    }
 
                } 
               
            }
            if(condition){
                form_input_title = [];
                var formdata = new FormData($('.infra_master')[0]);
                
      $.ajax({
        method: "POST",
        url: "{{route('procurement.store')}}",
        data: formdata,
        contentType: false,
        processData: false,
        headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
        success: function (response) {
            if(response.success == false){
              $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
              $('.error_message').removeClass('d-none');
            }else{
                
                window.location.href = "{{route('procurement.index',)}}";
            }
        }

      });  
            }
            
        })
    </script>
@endsection
