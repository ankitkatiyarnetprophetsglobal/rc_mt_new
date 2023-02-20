    //date
    $(document).ready(function(){
        $( ".datepicker" ).datepicker({
            slideDown : true,
            dateFormat : "dd-mm-yy",
        });
    });
    
    

    // remove filed
    $(document).on('click','.remove_btn',function(){

        console.log("counting",counting);
        if(counting == 0){

            $('.row_'+$(this).data("id")).remove();
            $('.inputDisabled').prop("disabled", true);
        }else{
            counting--;
            $('.inputDisabled').prop("disabled", false);
            $('.row_'+$(this).data("id")).remove();
                var current_item = $(this).data("id");
                array_counting = $.grep(array_counting, function(value) {
                return value != current_item;
            });
        }
        
    });

    // store data
    $('.finance_master').on('submit',function(e){
        
        e.preventDefault();
        var form_input_title = [];
        let condition = true;
        for(let i=0;i< array_counting.length; i++){

            if($('.scheme_name_'+array_counting[i]).val()  == ''){
    
                $('.error_scheme_name_'+array_counting[i]).text('please enter scheme name.');
                $('.scheme_name_'+array_counting[i]).focus();
                condition = false;
                form_input_title = [];
                break;

            }else{
                
                if(  $.inArray($('.scheme_name_'+array_counting[i]).val(),form_input_title) != -1 ){
                    $('.error_scheme_name_'+array_counting[i]).text('THE SCHEME NAME HAS ALREADY BEEN TAKEN.');
                    form_input_title = [];
                    condition = false;
                        break;
                }

                form_input_title.push($('.scheme_name_'+array_counting[i]).val());
                let val = $('.scheme_name_'+array_counting[i]).val();
                // let regex = /^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/;
                let regex = /^[a-zA-Z0-9_@#$&-_%^=. - !@#$%^&*() <> ? / ]*$/;
                
                if(!regex.test(val)){
                    
                    $('.error_scheme_name_'+array_counting[i]).text('Please Enter a valid scheme name.');
                    condition = false;
                    form_input_title = [];
                        break;
                
                }else{

                    $('.error_scheme_name_'+array_counting[i]).text('');

                }            
            }

            if($('.budget_cost_'+array_counting[i]).val()  == ''){

                    $('.error_budget_cost_'+array_counting[i]).text('please enter Budget Cost.');
                    $('.budget_cost_'+array_counting[i]).focus();
                    condition = false;
                    break;

                }else{

                    let val = $('.budget_cost_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_budget_cost_'+array_counting[i]).text('');
                    }else{

                        $('.error_budget_cost_'+array_counting[i]).text('');
                        $('.error_budget_cost_'+array_counting[i]).text('Please Enter a valid Budget Cost');
                        $('.error_budget_cost_'+array_counting[i]).focus();
                        return false;
                    }
                }   
        }
        if(condition){

            var formdata = new FormData($('.finance_master')[0]);
            
            $.ajax({
                method: "POST",
                url: baseurl + "/master/finance/store",
                data: formdata,
                contentType: false,
                processData: false,
                headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
                success: function (response) {
                    
                    if(response.success == false){

                        $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                        $('.message').addClass('d-none');                        
                            // swal("Message",response.message, "error");                        
                        $('.error_message').removeClass('d-none');
                    }else{
                        
                        $('.row_'+$(this).data("id")).remove();
                        $('.error_message').addClass('d-none');
                        $('.message').html(`<strong>Success!</strong> ${response.message}`);
                        $('.message').removeClass('d-none');
                        window.location.href = baseurl + "/master/finance/index";                        
                    }
                }
            });  
        }        
    })

    // edit data in one row
    $('.edit_finance_master').on('submit',function(e){

        let val = $('.scheme_name').val();
        // let regex = /^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/;
        let regex = /^[a-zA-Z0-9_@#$&-_%^=. - !@#$%^&*() <> ? / ]*$/;
        
        if (regex.test(val)) {
        
            $('.error_scheme_name').text('');        
        }else{

            $('.error_scheme_name').text('');
            $('.error_scheme_name').text('Please enter valid Scheme Name.');
            $('.scheme_name').focus();
            return false;
        }
        
        if($('.scheme_name').val()  == ''){

            $('.error_scheme_name').text('Please enter Scheme Name.');
            $('.scheme_name').focus();
            return false;
        }

        if($('.budget_cost').val()  == ''){

            $('.error_budget_cost').text('please enter Budget Cost.');
            $('.budget_cost').focus();
            return false;
        }else{

            let val = $('.budget_cost').val();
            let regex = /^(\+|-)?(\d*\.?\d*)$/;
    
            if (regex.test(val)) {
            
                $('.error_budget_cost').text('');
            }else{

                $('.error_budget_cost').text('');
                $('.error_budget_cost').text('Please Enter a valid Cost');
                $('.error_budget_cost').focus();
                return false;
            }
        }
    })
