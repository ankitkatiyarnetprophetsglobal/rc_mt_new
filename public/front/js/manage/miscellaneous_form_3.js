$(document).on('click','.add_more_three',function(){

    counting_3++;
    third_form_array_counting.push(counting_3);
    let project_center_id = $('#project_center_id').val();
    var manage_miscellaneous_manage_three_html = `<tr class="row_${counting_3}">
            <td>${counting_3 + 1}</td>
            <td>
                <input type="hidden" name="misc_manage_form_three[${counting_3}][template_id]" value="${temp_id}">
                <input type="hidden" name="misc_manage_form_three[${counting_3}][project_center_id]" value="${project_center_id}">
                <input type="text" class="form-control misc_retirement_details_name_employee_${counting_3}" name="misc_manage_form_three[${counting_3}][retir_name_employee]" placeholder=""  autocomplete="off">
                <span class="text-danger error_misc_retirement_details_name_employee_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_name_designation_${counting_3}" name="misc_manage_form_three[${counting_3}][retir_name_designation]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_name_designation_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_name_place_posting_${counting_3}" name="misc_manage_form_three[${counting_3}][name_place_posting]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_name_place_posting_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_date_retirement_${counting_3} datepicker_${counting_3}" name="misc_manage_form_three[${counting_3}][details_date_retirement]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_date_retirement_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_name_group_${counting_3}" name="misc_manage_form_three[${counting_3}][details_name_group]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_name_group_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_leave_encashment_${counting_3}"name="misc_manage_form_three[${counting_3}][leave_encashment]"  placeholder="" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_leave_encashment_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_pension_${counting_3}" name="misc_manage_form_three[${counting_3}][details_pension]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_pension_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_gratuity_${counting_3}" name="misc_manage_form_three[${counting_3}][gratuity]" placeholder=""autocomplete="off">
                <span class="text-danger error_misc_retirement_details_gratuity_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_retirement_details_commutation_${counting_3}" name="misc_manage_form_three[${counting_3}][commutation]" placeholder=""autocomplete="off">
                <span class="text-danger error_misc_retirement_details_commutation_${counting_3}"></span>
            </td>
            <td>
                <input type="text" class="form-control pension_datepicker_${counting_3} misc_retirement_details_starting_date_pension_${counting_3}" name="misc_manage_form_three[${counting_3}][starting_date_pension]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_retirement_details_starting_date_pension_${counting_3}"></span>
            </td>
            
            <td>
                <input type="text" class="form-control misc_retirement_details_remarks_${counting_3}" name="misc_manage_form_three[${counting_3}][remarks]" placeholder=""autocomplete="off"> 
                <span class="text-danger error_misc_retirement_details_remarks_${counting_3}"></span>                               
            </td>
            <td>
                <a href="#" class="actionbtn remove_formthree_btn" data-id3="${counting_3}"><i class="fa-solid fa-trash-can"></i></a>                                
            </td>
        </tr>`;

        $(document).ready(function(){
            $( `.datepicker_${counting_3}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });

            $( `.pension_datepicker_${counting_3}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });
        });
    
    $('#multiple_miscellaneous_manage_container_three').append(manage_miscellaneous_manage_three_html);
});

// remove button
$(document).on('click','.remove_formthree_btn',function(){

    let center_id = $('.center_id').val();
    
    if($(this).data("db_id3") != undefined){

        $.ajax({    
        method: "GET",
        url: baseurl + "/manage/miscellaneous/retirementdeleteById/"+$(this).data("db_id3"),
        contentType: false,
        processData: false,
        
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

    }else{

        $('.row_'+$(this).data("id3")).remove();

    }
    
    counting_3--;          
    
});

// add form
$('.miscellaneous_manage_form_three').on('submit',function(e){
    
        e.preventDefault();
        let condition = true;

        let center_id = $('.center_id').val();

        for(let i=0;i< third_form_array_counting.length; i++){
            if($('.misc_retirement_details_name_employee_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_name_employee_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_name_employee_'+third_form_array_counting[i]).text('Please enter name of the employee');
                $('.misc_retirement_details_name_employee_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_name_employee_'+third_form_array_counting[i]).text('');
            }
            
            if($('.misc_retirement_details_name_designation_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_name_designation_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_name_designation_'+third_form_array_counting[i]).text('Please enter name of the designation');
                $('.misc_retirement_details_name_designation_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_name_designation_'+third_form_array_counting[i]).text('');
            }
            
            if($('.misc_retirement_details_name_place_posting_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_name_place_posting_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_name_place_posting_'+third_form_array_counting[i]).text('Please enter place of posting');
                $('.misc_retirement_details_name_place_posting_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_name_place_posting_'+third_form_array_counting[i]).text('');
            }
            
            if($('.misc_retirement_details_date_retirement_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_date_retirement_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_date_retirement_'+third_form_array_counting[i]).text('Please enter date of retirement');
                $('.misc_retirement_details_date_retirement_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_date_retirement_'+third_form_array_counting[i]).text('');
            }
            
            if($('.misc_retirement_details_name_group_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_name_group_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_name_group_'+third_form_array_counting[i]).text('Please enter group (a/b/c)');
                $('.misc_retirement_details_name_group_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_name_group_'+third_form_array_counting[i]).text('');
            }

            if($('.misc_retirement_details_leave_encashment_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_leave_encashment_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_leave_encashment_'+third_form_array_counting[i]).text('Please enter leave encashment');
                $('.misc_retirement_details_leave_encashment_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_leave_encashment_'+third_form_array_counting[i]).text('');
            }
            
            if($('.misc_retirement_details_pension_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_pension_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_pension_'+third_form_array_counting[i]).text('Please enter pension');
                $('.misc_retirement_details_pension_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_pension_'+third_form_array_counting[i]).text('');
            }

            if($('.misc_retirement_details_gratuity_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_gratuity_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_gratuity_'+third_form_array_counting[i]).text('Please enter gratuity');
                $('.misc_retirement_details_gratuity_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_gratuity_'+third_form_array_counting[i]).text('');
            }

            if($('.misc_retirement_details_commutation_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_commutation_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_commutation_'+third_form_array_counting[i]).text('Please enter commutation');
                $('.misc_retirement_details_commutation_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_commutation_'+third_form_array_counting[i]).text('');
            }
            
            if($('.misc_retirement_details_starting_date_pension_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_starting_date_pension_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_starting_date_pension_'+third_form_array_counting[i]).text('Please enter starting date of pension');
                $('.misc_retirement_details_starting_date_pension_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_starting_date_pension_'+third_form_array_counting[i]).text('');
            }

            if($('.misc_retirement_details_remarks_'+third_form_array_counting[i]).val()  == '' || $('.misc_retirement_details_remarks_'+third_form_array_counting[i]).val()  == null){

                $('.error_misc_retirement_details_remarks_'+third_form_array_counting[i]).text('Please enter remarks');
                $('.misc_retirement_details_remarks_'+third_form_array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_misc_retirement_details_remarks_'+third_form_array_counting[i]).text('');
            }
    }

    if(condition){
        
        var formdata = new FormData($('.miscellaneous_manage_form_three')[0]);

        $.ajax({
            method: "POST",
            url: baseurl + "/manage/miscellaneous/storeformthree",
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