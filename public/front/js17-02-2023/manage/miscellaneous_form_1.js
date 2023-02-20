$(document).on('click','.add_more',function(){

    counting++;
    array_counting.push(counting);
    let project_center_id = $('#project_center_id').val();
    var manage_miscellaneous_manage_html = `<tr class="row_${counting}">
            <td>${counting + 1}</td>
            <td>
                <input type="hidden" name="misc_manage[${counting}][template_id]" value="${temp_id}">
                <input type="hidden" name="misc_manage[${counting}][project_center_id]" value="${project_center_id}">      
                <select name="misc_manage[${counting}][detail_cwp_slp]" data-id="${counting}" class="form-select detail_cwp_slp_${counting} change_detail_cwp_slp detail_cwp_slp" autocomplete="off">
                    <option selected disabled>DETAILS OF THE OA/WP/CWP/CP/SLP</option>   
                    ${getDetailTitle(select_detail_cwp_slp)}                 
                </select>
                <span class="text-danger error_detail_cwp_slp_${counting}"></span>
            </td>
            <td>
                <input type="text" class="form-control misc_manage_court_details_court_${counting}" name ="misc_manage[${counting}][court]" placeholder="" autocomplete="off" readonly>
                <span class="text-danger error_misc_manage_court_details_court_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_court_case_${counting}" name ="misc_manage[${counting}][court_case]" placeholder="" autocomplete="off" readonly>
                <span class="text-danger error_misc_manage_court_details_court_case_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_parties_${counting}" name ="misc_manage[${counting}][parties]" placeholder="" autocomplete="off" readonly>
                <span class="text-danger error_misc_manage_court_details_parties_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_case_ststus_${counting}" name ="misc_manage[${counting}][case_ststus]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_manage_court_details_case_ststus_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_name_counsel_${counting}" name ="misc_manage[${counting}][name_counsel]" placeholder="" autocomplete="off" readonly>
                <span class="text-danger error_ misc_manage_court_details_name_counsel_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control lastdatedatepicker_${counting} misc_manage_court_details_last_date_hearing_${counting}" name ="misc_manage[${counting}][last_date_hearing]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_misc_manage_court_details_last_date_hearing_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_last_hearing_status_${counting}" name ="misc_manage[${counting}][last_hearing_status]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_manage_court_details_last_hearing_status_${counting}"></span>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_present_status_${counting}" name ="misc_manage[${counting}][present_status]" placeholder="" autocomplete="off">
                <span class="text-danger error_misc_manage_court_details_present_status_${counting}"></span>
            </td>
            <td>
                <select class="form-control next_day_hearing_option_${counting} misc_manage_court_details_next_day_hearing_${counting}" data-nd_id="${counting}" name="misc_manage[${counting}][next_day_hearing]" autocomplete="off">
                    <option selected disabled>Next Day Hearing</option>
                    <option value="date">Date</option>
                    <option value="text">Text</option>
                </select>
                <div class="details_next_day_hearing_date_${counting}" style="display: none;">
                    <input type="text" class="form-control misc_manage_court_details_present_date_${counting} details_next_day_hearing_select_date_${counting}" name ="misc_manage[${counting}][next_day_hearing_option_date]" placeholder="dd-mm-yy" autocomplete="off">
                </div>
                
                <div class="details_next_day_hearing_text_${counting}" style="display: none;">
                    <input type="text" class="form-control misc_manage_court_details_present_text_${counting}" name ="misc_manage[${counting}][next_day_hearing_option_text]" placeholder="" autocomplete="off">
                </div>
            </td>
            <td> 
                <input type="text" class="form-control misc_manage_court_details_remarks_${counting}" name ="misc_manage[${counting}][remarks]" placeholder="REMARKS" autocomplete="off">
                <span class="text-danger error_misc_manage_court_details_remarks_${counting}"></span>
            </td>
            <td>
                <a href="#" class="actionbtn remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>`;


        $(document).ready(function(){
            $( `.lastdatedatepicker_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });

            $( `.details_next_day_hearing_select_date_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });
        });


        $(document).on('change',`.next_day_hearing_option_${counting}`,function() {

            let nd_id = $(this).data("nd_id");
            var next_day_hearing_option = $(`.next_day_hearing_option_${counting}`).val();
            // console.log("next_day_hearing_option",next_day_hearing_option);
            // return false;
            $(`.details_next_day_hearing_date_${nd_id}`).removeClass('d-none');
            
            if(next_day_hearing_option == "date"){
                
                $('.details_next_day_hearing_date_'+nd_id).removeClass('d-none');
                $(`.details_next_day_hearing_date_${nd_id}`).show();
                $(`.details_next_day_hearing_text_${nd_id}`).hide();  
                $(`.misc_manage_court_details_present_text_${nd_id}`).val('');              
            }else{
                
                $('.details_next_day_hearing_text_'+nd_id).removeClass('d-none');
                $(`.details_next_day_hearing_date_${nd_id}`).hide();
                $(`.details_next_day_hearing_text_${nd_id}`).show();
                $(`.details_next_day_hearing_select_date_${nd_id}`).val('');        
            }
            return false;
        });
    
    $('#multiple_miscellaneous_manage_container').append(manage_miscellaneous_manage_html);
});

// remove button
$(document).on('click','.remove_btn',function(){
    
    let center_id = $('.center_id').val();
    let detail_cwp_slp_val = $('.detail_cwp_slp_'+$(this).data("id")).val();
    let detail_cwp_slp_text = $('.detail_cwp_slp_'+$(this).data("id")).find(":selected").text();
    select_detail_cwp_slp.splice($.inArray(detail_cwp_slp_val,select_detail_cwp_slp),1);

    if(form_first_count > counting){

        $.ajax({    
        method: "GET",
        url: baseurl + "/manage/miscellaneous/courtcasesdeleteById/"+$(this).data("db_id"),
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

        $('.row_'+$(this).data("id")).remove();
    }
    
    counting--;

    if($(`.detail_cwp_slp[value='${detail_cwp_slp_val}']`).length > 0){

        console.log("if");
    
    }else{
    
        console.log("else");
        if(detail_cwp_slp_text != 'DETAILS OF THE OA/WP/CWP/CP/SLP'){

            $('.row_'+$(this).data("id")).remove();
            $(`.detail_cwp_slp`).append($("<option></option>").attr("value", detail_cwp_slp_val).text(detail_cwp_slp_text));

        }
    
    }          
    
});


$('.miscellaneous_manage_form').on('submit',function(e){

        e.preventDefault();
        let condition = true;

        let center_id = $('.center_id').val();

        for(let i=0;i< array_counting.length; i++){

        if($('.detail_cwp_slp_'+array_counting[i]).val()  == '' || $('.detail_cwp_slp_'+array_counting[i]).val()  == null){

            $('.error_detail_cwp_slp_'+array_counting[i]).text('Please Select Details of the oa/wp/cwp /cp/slp.');
            $('.detail_cwp_slp_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_detail_cwp_slp_'+array_counting[i]).text('');
        } 
        
        if($('.misc_manage_court_details_court_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_court_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_court_'+array_counting[i]).text('Please enter name of the court');
            $('.misc_manage_court_details_court_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_court_'+array_counting[i]).text('');
        } 
        
        if($('.misc_manage_court_details_court_case_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_court_case_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_court_case_'+array_counting[i]).text('Please enter brief issue involved in the court case');
            $('.misc_manage_court_details_court_case_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_court_case_'+array_counting[i]).text('');
        } 
        
        if($('.misc_manage_court_details_parties_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_parties_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_parties_'+array_counting[i]).text('Please enter name of parties');
            $('.misc_manage_court_details_parties_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_parties_'+array_counting[i]).text('');
        } 
        
        if($('.misc_manage_court_details_case_ststus_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_case_ststus_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_case_ststus_'+array_counting[i]).text('Please enter latest status of the case');
            $('.misc_manage_court_details_case_ststus_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_case_ststus_'+array_counting[i]).text('');
        } 
        
        if($('.misc_manage_court_details_name_counsel_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_name_counsel_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_name_counsel_'+array_counting[i]).text('Please enter name counsel');
            $('.misc_manage_court_details_name_counsel_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_name_counsel_'+array_counting[i]).text('');
        } 
        

        if($('.misc_manage_court_details_last_date_hearing_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_last_date_hearing_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_last_date_hearing_'+array_counting[i]).text('Please enter last day of hearing');
            $('.misc_manage_court_details_last_date_hearing_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_last_date_hearing_'+array_counting[i]).text('');
        }
        
        if($('.misc_manage_court_details_last_hearing_status_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_last_hearing_status_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_last_hearing_status_'+array_counting[i]).text('Please enter next date of hearing');
            $('.misc_manage_court_details_last_hearing_status_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_last_hearing_status_'+array_counting[i]).text('');
        }
        
        if($('.misc_manage_court_details_present_status_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_present_status_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_present_status_'+array_counting[i]).text('Please enter present status');
            $('.misc_manage_court_details_present_status_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_present_status_'+array_counting[i]).text('');
        }
        
        if($('.misc_manage_court_details_remarks_'+array_counting[i]).val()  == '' || $('.misc_manage_court_details_remarks_'+array_counting[i]).val()  == null){

            $('.error_misc_manage_court_details_remarks_'+array_counting[i]).text('Please enter remarks');
            $('.misc_manage_court_details_remarks_'+array_counting[i]).focus();
            condition = false;
            break;

        }else{

            $('.error_misc_manage_court_details_remarks_'+array_counting[i]).text('');
        }
    }
    
    if(condition){
        
        var formdata = new FormData($('.miscellaneous_manage_form')[0]);

        $.ajax({
            method: "POST",
            url: baseurl + "/manage/miscellaneous/store",
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

                console.log("response.old_data",response.old_data);
                if (response.old_data != null) {

                    $('.misc_manage_court_details_case_ststus_'+counting).val(response.old_data.case_ststus);
                    $('.misc_manage_court_details_last_date_hearing_'+counting).val(response.old_data.last_date_hearing);
                    $('.misc_manage_court_details_last_hearing_status_'+counting).val(response.old_data.last_hearing_status);
                    $('.misc_manage_court_details_present_status_'+counting).val(response.old_data.present_status);
                    $('.misc_manage_court_details_next_day_hearing_'+counting).val(response.old_data.next_day_hearing);
                    if(response.old_data.next_day_hearing == 'date'){
                        $('.details_next_day_hearing_date_'+counting).removeClass('d-none');
                        $('.details_next_day_hearing_date_'+counting).show();
                        $('.details_next_day_hearing_text_'+counting).hide();  
                        $('.misc_manage_court_details_present_text_'+counting).val('');
                        
                        // $('.details_next_day_hearing_date_'+ counting).show();

                    }else if(response.old_data.next_day_hearing == 'text'){

                        $('.details_next_day_hearing_text_'+counting).removeClass('d-none');
                        $('.details_next_day_hearing_date_'+counting).hide();
                        $('.details_next_day_hearing_text_'+counting).show();
                        $('.details_next_day_hearing_select_date_'+counting).val('');

                        // $('.details_next_day_hearing_text_'+ counting).show();
                        
                    }else{
                        $('.details_next_day_hearing_text_'+counting).removeClass('d-none');
                        $('.details_next_day_hearing_date_'+counting).hide();
                        $('.details_next_day_hearing_text_'+counting).hide();
                        $('.details_next_day_hearing_select_date_'+counting).val('');
                    }
                    $('.details_next_day_hearing_select_date_'+counting).val(response.old_data.next_day_hearing_option_date);
                    $('.misc_manage_court_details_present_text_'+counting).val(response.old_data.next_day_hearing_option_text);
                    $('.misc_manage_court_details_remarks_'+counting).val(response.old_data.remarks);

                }
            },
            complete: function(xhr, textStatus) {
                console.log(xhr.status);
            }

        }); 
    return false;
});

$(document).on('change','.next_day_hearing_option',function() {

    let nd_id = $(this).data("nd_id");
    var next_day_hearing_option_value = $(`.misc_manage_court_details_next_day_hearing_${nd_id}`).val();
    
    
    // return false;
    // $(`.details_next_day_hearing_date_${nd_id}`).removeClass('d-none');
    
    if(next_day_hearing_option_value == "date"){
        // console.log("next_day_hearing_option_value",next_day_hearing_option_value);
        $(`.details_next_day_hearing_date_${nd_id}`).removeClass('d-none');
        $(`.details_next_day_hearing_date_${nd_id}`).show();
        $(`.details_next_day_hearing_text_${nd_id}`).hide();        
        $(`.misc_manage_court_details_present_text_${nd_id}`).val('');
    }else{

        // $('.details_next_day_hearing_text_'+nd_id).val('');
        // return false;
        $('.details_next_day_hearing_text_'+nd_id).removeClass('d-none');
        $(`.details_next_day_hearing_date_${nd_id}`).hide();
        $(`.details_next_day_hearing_text_${nd_id}`).show();
        $(`.details_next_day_hearing_select_date_${nd_id}`).val('');
    }
    return false;
});    

$(document).on('change','.center_change',function(){

    let center_id = $('.center_id').val();
    window.location.href = baseurl + "/manage/miscellaneous/index/"+encode_temp_id+'/'+center_id;

})