        
    

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


    $('.miscmaster_master').on('submit',function(e){
        e.preventDefault();
        var form_input_title = [];
        let condition = true;
        for(let i=0;i< array_counting.length; i++){
            
            if($('.detail_cwp_slp_'+array_counting[i]).val()  == ''){
    
                $('.error_detail_cwp_slp_'+array_counting[i]).text('please enter detail cwp slp.');
                $('.detail_cwp_slp_'+array_counting[i]).focus();
                condition = false;
                form_input_title = [];
                break;

            }else{
                
                if(  $.inArray($('.detail_cwp_slp_'+array_counting[i]).val(),form_input_title) != -1 ){
                    $('.error_detail_cwp_slp_'+array_counting[i]).text('THE DETAIL CWP SLP HAS ALREADY BEEN TAKEN.');
                    form_input_title = [];
                    condition = false;
                        break;
                }

                form_input_title.push($('.detail_cwp_slp_'+array_counting[i]).val());
                let val = $('.detail_cwp_slp_'+array_counting[i]).val();
                // let regex = /^(?!\d+$)(?:[a-zA-Z0-9][a-zA-Z0-9 @,_&$]*)?$/;
                let regex = /^[a-zA-Z0-9_@#$&-_%^=. - !@#$%^&*() <> ? / ]*$/;
                
                if(!regex.test(val)){
                    
                    $('.error_detail_cwp_slp_'+array_counting[i]).text('Please Enter a valid detail cwp slp.');
                    condition = false;
                    form_input_title = [];
                        break;
                
                }else{

                    $('.error_detail_cwp_slp_'+array_counting[i]).text('');

                }            
            }

            if($('.court_name_'+array_counting[i]).val()  == ''){

                $('.error_court_name_'+array_counting[i]).text('please enter name of the court name.');
                $('.court_name_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_court_name_'+array_counting[i]).text('');
            }   
           
            if($('.court_case_'+array_counting[i]).val()  == ''){

                $('.error_court_case_'+array_counting[i]).text('please enter name of the court.');
                $('.court_case_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_court_case_'+array_counting[i]).text('');
            }   
            
            if($('.court_case_'+array_counting[i]).val()  == ''){

                $('.error_court_case_'+array_counting[i]).text('please enter brief issue involved in the court case.');
                $('.court_case_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_court_case_'+array_counting[i]).text('');
            }   
            
            if($('.parties_name_'+array_counting[i]).val()  == ''){

                $('.error_parties_name_'+array_counting[i]).text('please enter name of the parties.');
                $('.parties_name_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_parties_name_'+array_counting[i]).text('');
            }

            if($('.counsel_name_'+array_counting[i]).val()  == ''){

                $('.error_counsel_name_'+array_counting[i]).text('please enter name of the counsel.');
                $('.counsel_name_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_counsel_name_'+array_counting[i]).text('');
            }   
        }

        ;
        if(condition){

            var formdata = new FormData($('.miscmaster_master')[0]);
    
            $.ajax({
                method: "POST",
                url: baseurl + "/master/miscmaster/store",
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

                    }else if (response.error_message == false){

                        $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                        $('.message').addClass('d-none');                        
                        // swal("Message",response.message, "error");                        
                        $('.error_message').removeClass('d-none');   
                    } else{
                        
                        $('.row_'+$(this).data("id")).remove();
                        $('.error_message').addClass('d-none');
                        $('.message').html(`<strong>Success!</strong> ${response.message}`);
                        $('.message').removeClass('d-none');

                        swal("Message",response.message, "success").then(() => {

                                window.location.href = baseurl + "/master/miscmaster/index";

                            });
                    }
                }

            });  
        }
        
    })


    $('.edit_miscmaster_master').on('submit',function(e){
        
        if($('.detail_cwp_slp').val()  == ''){

            $('.error_detail_cwp_slp').text('Please enter DETAILS OF THE OA/WP/CWP/CP/SLP.');
            $('.detail_cwp_slp').focus();
            return false;

        }else{

            // $('.error_detail_cwp_slp').text('');
        } 

        if($('.court_name').val()  == ''){

            $('.error_court_name').text('please enter name of the court.');
            $('.court_name').focus();
            return false;
        }else{

            $('.error_court_name').text('');
        }         

        if($('.court_case').val()  == ''){

            $('.error_court_case').text('please enter name of the case.');
            $('.court_case').focus();
            return false;
        }else{

            $('.error_court_case').text('');
        } 

        if($('.parties_name').val()  == ''){

            $('.error_parties_name').text('please enter name of the parties.');
            $('.parties_name').focus();
            return false;
        }else{

            $('.error_parties_name').text('');
        }         
        
        if($('.counsel_name').val()  == ''){

            $('.error_counsel_name').text('please enter name of the counsel name.');
            $('.counsel_name').focus();
            return false;
        }else{

            $('.error_counsel_name').text('');
        }         
    })
