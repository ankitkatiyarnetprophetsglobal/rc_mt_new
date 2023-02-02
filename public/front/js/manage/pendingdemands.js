// add row
$(document).on('click','.add_more',function(){

    counting++;
    array_counting.push(counting);
    let project_center_id = $('#project_center_id').val();
    var pendingdemands_manage_html = `<tr class="row_${counting}">
            <td>${counting + 1}</td>
            <td>
                <input type="hidden" name="pendingdemands[${counting}][template_id]" value="${temp_id}">
                <input type="hidden" name="pendingdemands[${counting}][project_center_id]" value="${project_center_id}">
                <input type="text" class="form-control pendingdemands_particulars_${counting}" name ="pendingdemands[${counting}][particulars]" placeholder="" autocomplete="off">                            
                <span class="text-danger error_pendingdemands_particulars_${counting}"></span>
            </td>
            <td>
                <input type="text" class="form-control pendingdemands_last_correspondence_regional_${counting} lastdatecorrespondencepicker_${counting}" name ="pendingdemands[${counting}][last_correspondence_regional]" placeholder="dd-mm-yy" autocomplete="off">
                <span class="text-danger error_pendingdemands_last_correspondence_regional_${counting}"></span>
            </td>            
            <td>
                <input type="text" class="form-control pendingdemands_concerned_division_personnel_${counting}" name ="pendingdemands[${counting}][concerned_division_personnel]" placeholder="" autocomplete="off">
                <span class="text-danger error_pendingdemands_concerned_division_personnel_${counting}"></span>
            </td>
            <td>
                <select class="form-control pendingdemands_status_${counting}" name ="pendingdemands[${counting}][row_status]" autocomplete="off">
                    <option value="">Select</option>
                    <option value="approved">Approved</option>
                    <option value="pending">Pending</option>
                </select>
                <span class="text-danger error_pendingdemands_status_${counting}"></span>
            </td>
            <td>
                <input type="text" class="form-control pendingdemands_remarks_${counting}" name ="pendingdemands[${counting}][remarks]" placeholder="" autocomplete="off">
                <span class="text-danger error_pendingdemands_remarks_${counting}"></span>
            </td>
            <td>
                <a href="#" class="actionbtn remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>`;

        $(document).ready(function(){
            $( `.lastdatecorrespondencepicker_${counting}`).datepicker({
                slideDown : true,
                dateFormat : "dd-mm-yy",
            });
        });
    
    $('#multiple_pendingdemands_container').append(pendingdemands_manage_html);
});
// submit data
$('#pendingdemands_manage_form').on('submit',function(e){        
        
        e.preventDefault();
        let condition = true;

        let center_id = $('.center_id').val();

        for(let i=0;i< array_counting.length; i++){

            if($('.pendingdemands_particulars_'+array_counting[i]).val()  == '' || $('.pendingdemands_particulars_'+array_counting[i]).val()  == null){

                $('.error_pendingdemands_particulars_'+array_counting[i]).text('Please enter particulars');
                $('.pendingdemands_particulars_'+array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_pendingdemands_particulars_'+array_counting[i]).text('');
            }
            
            if($('.pendingdemands_last_correspondence_regional_'+array_counting[i]).val()  == '' || $('.pendingdemands_last_correspondence_regional_'+array_counting[i]).val()  == null){

                $('.error_pendingdemands_last_correspondence_regional_'+array_counting[i]).text('Please select Last Correspondence From Regional Office To Sai Ho');
                $('.pendingdemands_last_correspondence_regional_'+array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_pendingdemands_last_correspondence_regional_'+array_counting[i]).text('');
            }
            
            if($('.pendingdemands_concerned_division_personnel_'+array_counting[i]).val()  == '' || $('.pendingdemands_concerned_division_personnel_'+array_counting[i]).val()  == null){

                $('.error_pendingdemands_concerned_division_personnel_'+array_counting[i]).text('Please enter Concerned Division At Sai Ho, New Delhi (personnel / Ops / Infra / Es Etc.)');
                $('.pendingdemands_concerned_division_personnel_'+array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_pendingdemands_concerned_division_personnel_'+array_counting[i]).text('');
            }

            if($('.pendingdemands_status_'+array_counting[i]).val()  == '' || $('.pendingdemands_status_'+array_counting[i]).val()  == null){

                $('.error_pendingdemands_status_'+array_counting[i]).text('Please select Status');
                $('.pendingdemands_status_'+array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_pendingdemands_status_'+array_counting[i]).text('');
            }

            if($('.pendingdemands_remarks_'+array_counting[i]).val()  == '' || $('.pendingdemands_remarks_'+array_counting[i]).val()  == null){

                $('.error_pendingdemands_remarks_'+array_counting[i]).text('Please enter remarks');
                $('.pendingdemands_remarks_'+array_counting[i]).focus();
                condition = false;
                break;

            }else{

                $('.error_pendingdemands_remarks_'+array_counting[i]).text('');
            }
    }
    
    if(condition){
        
        var formdata = new FormData($('#pendingdemands_manage_form')[0]);

        $.ajax({
            method: "POST",
            url: baseurl + "/manage/pendingdemands/store",
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

                            window.location.href = baseurl + "/manage/pendingdemands/index/"+encode_temp_id+'/'+center_id;

                        });
                }
            }
        });  
    }            
})

// remove button
$(document).on('click','.remove_btn',function(){
    
    let center_id = $('.center_id').val();

    if($(this).data("db_id") != undefined){
        console.log("asdfasdfasdf",$(this).data("db_id"));
        // return false;
        $.ajax({    
        method: "GET",
        url: baseurl + "/manage/pendingdemands/pendingDeleteById/"+$(this).data("db_id"),
        contentType: false,
        processData: false,
        
        success: function (response) {
        
            if(response.success == false){

                $('.row_'+$(this).data("id")).remove();
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

                        window.location.href = baseurl + "/manage/pendingdemands/index/"+encode_temp_id+'/'+center_id;

                    });
                }
            }        
        });

    }else{

        $('.row_'+$(this).data("id")).remove();

    }
    
    counting--;
    
});

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

$(document).on('change','.next_day_hearing_option',function() {

    let nd_id = $(this).data("nd_id");
    var next_day_hearing_option = $(`.next_day_hearing_option`).val();
    
    $(`.details_next_day_hearing_date_${nd_id}`).removeClass('d-none');
    
    if(next_day_hearing_option == "date"){

        $('.details_next_day_hearing_date_'+nd_id).removeClass('d-none');
        $(`.details_next_day_hearing_date_${nd_id}`).show();
        $(`.details_next_day_hearing_text_${nd_id}`).hide();        
    }else{
        
        $('.details_next_day_hearing_text_'+nd_id).removeClass('d-none');
        $(`.details_next_day_hearing_date_${nd_id}`).hide();
        $(`.details_next_day_hearing_text_${nd_id}`).show();
    }
    return false;
});    


$(document).on('change','.center_change',function(){

    let center_id = $('.center_id').val();
    window.location.href = baseurl + "/manage/pendingdemands/index/"+encode_temp_id+'/'+center_id;

}) 