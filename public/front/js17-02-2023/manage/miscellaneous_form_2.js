$(document).on('click','.add_more_two',function(){

    counting_2++;
    second_form_array_counting.push(counting_2);
    let project_center_id = $('#project_center_id').val();
    var manage_miscellaneous_manage_two_html = `<tr class="row_${counting_2}">
            <td>${counting_2 + 1}</td>
            <td>
                <input type="hidden" name="misc_manage_form_two[${counting_2}][template_id]" value="${temp_id}">
                <input type="hidden" name="misc_manage_form_two[${counting_2}][project_center_id]" value="${project_center_id}">
                <input type="text" class="form-control misc_manage_award_tender_status_name_employee_${counting_2}" name="misc_manage_form_two[${counting_2}][infraemployee]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_name_employee_${counting_2}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_manage_award_tender_status_designation_${counting_2}" name="misc_manage_form_two[${counting_2}][infradesignation]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_designation_${counting_2}"></span>
            </td>
            <td>
                <input type="text" class="form-control leave_encashment_datepicker_${counting} misc_manage_award_tender_status_leave_encashment_${counting_2}" name="misc_manage_form_two[${counting_2}][encashment]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_leave_encashment_${counting_2}"></span>
            </td>
            <td>
                <input type="text" class="form-control pension_infra_datepicker_${counting} misc_manage_award_tender_status_pension_${counting_2}" name="misc_manage_form_two[${counting_2}][pension]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_pension_${counting_2}"></span>
            </td>
            <td>
                <input type="text" class="form-control gratuity_infra_datepicker_${counting} misc_manage_award_tender_status_gratuity_${counting_2}" name="misc_manage_form_two[${counting_2}][gratuity]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_gratuity_${counting_2}"></span>
            </td>
            <td>
                <input type="text" class="form-control commutation_infra_datepicker_${counting} misc_manage_award_tender_status_leave_commutation_${counting_2}" name="misc_manage_form_two[${counting_2}][commutation]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_leave_commutation_${counting_2}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_manage_award_tender_status_leave_remarks_${counting_2}" name="misc_manage_form_two[${counting_2}][remarks]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_manage_award_tender_status_leave_remarks_${counting_2}"></span>
            </td>
            <td>
                <a href="#" class="actionbtn remove_formtwo_btn" data-id2="${counting_2}" ><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>`;  
        
        $(document).ready(function(){
            $( `.leave_encashment_datepicker_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });

            $( `.pension_infra_datepicker_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });
            $( `.gratuity_infra_datepicker_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });
            $( `.commutation_infra_datepicker_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });
        });
    
    $('#multiple_miscellaneous_manage_container_two').append(manage_miscellaneous_manage_two_html);
});

// remove button
$(document).on('click','.remove_formtwo_btn',function(){

        let center_id = $('.center_id').val();
    
        if($(this).data("db_id2") != undefined){

            $.ajax({    
            method: "GET",
            url: baseurl + "/manage/miscellaneous/formtworowdeleteById/"+$(this).data("db_id2"),
            contentType: false,
            processData: false,
            
            success: function (response) {            
                
                if(response.success == false){
                    
                    $('.row_'+$(this).data("id2")).remove();            
                    // swal("Message",response.message, "error");            
                    // $('.error_message').removeClass('d-none');            
                }else{

                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                        window.location.href = baseurl + "/manage/miscellaneous/index/"+encode_temp_id+'/'+center_id;

                    });
                }
            }        
        });

    }else{
        
        $('.row_'+$(this).data("id2")).remove();

    }

    counting_2--;              
});

// add form
$('.miscellaneous_manage_form_two').on('submit',function(e){        
        
        e.preventDefault();
        let condition = true;

        let center_id = $('.center_id').val();

        for(let i=0;i< second_form_array_counting.length; i++){        
        
            if($('.misc_manage_award_tender_status_name_employee_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_name_employee_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_name_employee_'+second_form_array_counting[i]).text('Please enter name of the employee');
                $('.misc_manage_award_tender_status_name_employee_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_name_employee_'+second_form_array_counting[i]).text('');
            }         
            
            if($('.misc_manage_award_tender_status_designation_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_designation_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_designation_'+second_form_array_counting[i]).text('Please enter designation.');
                $('.misc_manage_award_tender_status_designation_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_designation_'+second_form_array_counting[i]).text('');
            }         
            
            if($('.misc_manage_award_tender_status_leave_encashment_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_leave_encashment_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_leave_encashment_'+second_form_array_counting[i]).text('Please enter leave encashment');
                $('.misc_manage_award_tender_status_leave_encashment_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_leave_encashment_'+second_form_array_counting[i]).text('');
            }
            
            if($('.misc_manage_award_tender_status_pension_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_pension_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_pension_'+second_form_array_counting[i]).text('Please enter pension');
                $('.misc_manage_award_tender_status_pension_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_pension_'+second_form_array_counting[i]).text('');
            }
            
            if($('.misc_manage_award_tender_status_gratuity_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_gratuity_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_gratuity_'+second_form_array_counting[i]).text('Please enter gratuity');
                $('.misc_manage_award_tender_status_gratuity_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_gratuity_'+second_form_array_counting[i]).text('');
            }
            
            if($('.misc_manage_award_tender_status_leave_commutation_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_leave_commutation_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_leave_commutation_'+second_form_array_counting[i]).text('Please enter commutation');
                $('.misc_manage_award_tender_status_leave_commutation_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_leave_commutation_'+second_form_array_counting[i]).text('');
            }
            
            if($('.misc_manage_award_tender_status_leave_remarks_'+second_form_array_counting[i]).val()  == '' || $('.misc_manage_award_tender_status_leave_remarks_'+second_form_array_counting[i]).val()  == null){

                $('.error_misc_manage_award_tender_status_leave_remarks_'+second_form_array_counting[i]).text('Please enter remarks');
                $('.misc_manage_award_tender_status_leave_remarks_'+second_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_manage_award_tender_status_leave_remarks_'+second_form_array_counting[i]).text('');
            }
        
    }
    
    if(condition){
        
        var formdata = new FormData($('.miscellaneous_manage_form_two')[0]);

        $.ajax({
            method: "POST",
            url: baseurl + "/manage/miscellaneous/storeformtwo",
            data: formdata,
            contentType: false,
            processData: false,
            headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
            
                if(response.success == false){

                    $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                    $('.message').addClass('d-none');
                    
                    swal("Message",response.message, "error");
                    
                    $('.error_message').removeClass('d-none');

                }else{
                    
                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                            window.location.href = baseurl + "/manage/miscellaneous/index/"+encode_temp_id+'/'+center_id;

                        });
                }
            }
        });  
    }            
})

$(document).on('change','.change_detail_cwp_slp',function() {

    select_detail_cwp_slp.push($(this).val());

    array_counting.map((value,key) => {

        if($(this).data("id") != value){
            
            $(`.detail_cwp_slp_${value} option[value='${$(this).val()}']`).remove();
        }
    })

    select_detail_cwp_slp.push($(this).val());

    var change_id = $(this).val();
    var formdata = {id:change_id};
    var counting = $(this).data("id");

    $.ajax({
            method: "POST",
            url: baseurl + "/manage/miscellaneous/getdatadetailcwpslp",
            data:formdata,
            headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                
                $('.misc_manage_court_details_court_'+counting).val(response.data.court_name);
                $('.misc_manage_court_details_court_case_'+counting).val(response.data.court_case);
                $('.misc_manage_court_details_parties_'+counting).val(response.data.parties_name);
                $('.misc_manage_court_details_name_counsel_'+counting).val(response.data.counsel_name);
            },
            complete: function(xhr, textStatus) {
                console.log(xhr.status);
            }

        }); 
    return false;
});

$(document).on('change','.center_change',function(){

    let center_id = $('.center_id').val();
    window.location.href = baseurl + "/manage/miscellaneous/index/"+encode_temp_id+'/'+center_id;

})