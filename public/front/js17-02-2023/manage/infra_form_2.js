for (let i = 0; i < form_second_count; i++) {
    let work_start_date = revDateStr($('.work_start_date_' + i).val());
    $(".work_start_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: work_start_date,
    });
    if ($('.work_start_date_' + i).val() != undefined && $('.work_start_date_' + i).val() != '') {
        let work_start_date = revDateStr($('.work_start_date_' + i).val());
        let cpdc_date = addOneDayIntoDate(work_start_date);
        $(".cpdc_date_" + i).datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
            minDate: cpdc_date,
        });
    }
    if ($('.cpdc_date_' + i).val() != undefined && $('.cpdc_date_' + i).val() != '') {
        let cpdc_date = revDateStr($('.cpdc_date_' + i).val());
        let work_start_date = revDateStr($('.work_start_date_' + i).val());
        let new_work_start_date = addOneDayIntoDate(work_start_date);
        $(".epd_25_" + i).datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
            minDate: new_work_start_date,
            maxDate: cpdc_date,
        });
    }
    if ($('.epd_25_' + i).val() != undefined && $('.epd_25_' + i).val() != '') {
        let epd_25 = revDateStr($('.epd_25_' + i).val());
        let new_date_25 = addOneDayIntoDate(epd_25);
        $(".epd_50_" + i).datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
            minDate: new_date_25,
        });
    }
    if ($('.epd_50_' + i).val() != undefined && $('.epd_50_' + i).val() != '') {
        let epd_50 = revDateStr($('.epd_50_' + i).val());
        let new_date_50 = addOneDayIntoDate(epd_50);
        $(".epd_75_" + i).datepicker({
            slideDown: true,
            dateFormat: "dd-mm-yy",
            minDate: new_date_50,
        });
    }
}

$(document).on('change', '.work_start_date', function () {

    let date_id = $(this).data("id");
    $(".cpdc_date_" + date_id).datepicker("destroy");
    $(".cpdc_date_" + date_id).val("");
    $(".epd_25_" + date_id).datepicker("destroy");
    $(".epd_25_" + date_id).val("");
    $(".epd_50_" + date_id).datepicker("destroy");
    $(".epd_50_" + date_id).val("");
    $(".epd_75_" + date_id).datepicker("destroy");
    $(".epd_75_" + date_id).val("");
    var date = revDateStr($('.work_start_date_' + date_id).val());
    new_date = addOneDayIntoDate(date);
    $(".cpdc_date_" + date_id).removeAttr('readonly');
    $(".cpdc_date_" + date_id).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
    });
});

$(document).on('change', '.cpdc_date', function () {
    let date_id = $(this).data("id");
    $(".epd_25_" + date_id).datepicker("destroy");
    $(".epd_25_" + date_id).val("");
    $(".epd_50_" + date_id).datepicker("destroy");
    $(".epd_50_" + date_id).val("");
    $(".epd_75_" + date_id).datepicker("destroy");
    $(".epd_75_" + date_id).val("");

    $(".epd_25_" + date_id).removeAttr('readonly');

    let min_date = revDateStr($('.work_start_date_' + date_id).val());
    min_date = addOneDayIntoDate(min_date);
    let max_date = revDateStr($('.cpdc_date_' + date_id).val());

    $(".epd_25_" + date_id).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: min_date,
        maxDate: max_date,
    });
});
$(document).on('change', '.epd_25', function () {

    let date_id = $(this).data("id");

    $(".epd_50_" + date_id).datepicker("destroy");
    $(".epd_50_" + date_id).val("");
    $(".epd_75_" + date_id).datepicker("destroy");
    $(".epd_75_" + date_id).val("");

    $(".epd_50_" + date_id).removeAttr('readonly');

    let min_date = revDateStr($('.epd_25_' + date_id).val());
    min_date = addOneDayIntoDate(min_date);
    let max_date = revDateStr($('.cpdc_date_' + date_id).val());
    $(".epd_50_" + date_id).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: min_date,
        maxDate: max_date,
    });
});
$(document).on('change', '.epd_50', function () {
    let date_id = $(this).data("id");


    $(".epd_75_" + date_id).datepicker("destroy");
    $(".epd_75_" + date_id).val("");

    $(".epd_75_" + date_id).removeAttr('readonly');
    let min_date = revDateStr($('.epd_50_' + date_id).val());
    min_date = addOneDayIntoDate(min_date);
    let max_date = revDateStr($('.cpdc_date_' + date_id).val());
    $(".epd_75_" + date_id).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: min_date,
        maxDate: max_date,
    });
});





$(document).on('click', '.second_form_add_btn', function () {

    counting_2++;
    let project_center_id = $('#project_center_id').val();
    second_form_array_counting.push(counting_2);
    form_second_html = `<tr class="row_two_${counting_2}">
   <td rowspan="3">${counting_2 + 1}</td>
   <td rowspan="3">
   <input type="hidden" name="infra_manage_two[${counting_2}][template_id]" value="${temp_id}">
   <input type="hidden" name="infra_manage_two[${counting_2}][project_center_id]" value="${project_center_id}">
       <select class="form-control project_title_two project_title_two_${counting_2}" name="infra_manage_two[${counting_2}][infra_id]" data-id="${counting_2}" autocomplete="off">
           <option selected disabled>Project ID/Title</option>
           ${getProjectTitle2(selected_title_2)}
       </select>
       <span class="text-danger error_project_title_two_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input type="text" class="form-control agency_id_two agency_id_two_${counting_2}" placeholder="Agency" name = "infra_manage_two[${counting_2}][agency_id]"  readonly autocomplete="off">
       <span class="text-danger error_agency_id_two_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input type="text" class="form-control cost_two cost_two_${counting_2}" placeholder="Cost" name ="infra_manage_two[${counting_2}][cost]" readonly>
       <span class="text-danger error_cost_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input type="text"  class="form-control work_start_date work_start_date_${counting_2}" data-id ="${counting_2}" name="infra_manage_two[${counting_2}][work_start_date]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_work_start_date_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input type="text" class="form-control cpdc_date cpdc_date_${counting_2}" data-id ="${counting_2}" name="infra_manage_two[${counting_2}][cpdc_date]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_cpdc_date_${counting_2}"></span>
   </td>
   <td>25%</td>
   <td>
       <input type="text" class="form-control epd_25 epd_25_${counting_2}" name="infra_manage_two[${counting_2}][epd_25]" data-id = "${counting_2}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_epd_25_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input placeholder="Progress %" type="text" name="infra_manage_two[${counting_2}][progress_percentage]" class="form-control progress_percentage progress_percentage_${counting_2}" autocomplete="off">
       <span class="text-danger error_progress_percentage_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input placeholder="Current PDC" type="text" class="form-control current_pdc current_pdc_${counting_2}" name="infra_manage_two[${counting_2}][current_pdc]" autocomplete="off">
       <span class="text-danger error_current_pdc_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <input placeholder="Remark" type="text" class="form-control remarks_2 remarks_2_${counting_2}" name="infra_manage_two[${counting_2}][remarks_2]" autocomplete="off">
       <span class="text-danger error_remarks_2_${counting_2}"></span>
   </td>
   <td rowspan="3">
       <a href="javascript:void(0)" class="actionbtn remove_btn_two" data-id="${counting_2}" data-db_id = ""><i class="fa-solid fa-trash-can"></i></a>
   </td>
</tr>
<tr class="row_two_${counting_2}">
   <td>50%</td>
   <td>
       <input type="text" class="form-control epd_50 epd_50_${counting_2}" data-id = "${counting_2}" name="infra_manage_two[${counting_2}][epd_50]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_epd_50_${counting_2}"></span>
   </td>
</tr>
<tr class="row_two_${counting_2} last_tr">
   <td>75%</td>
   <td>
       <input type="text" class="form-control epd_75 epd_75_${counting_2}" data-id = "${counting_2}" name="infra_manage_two[${counting_2}][epd_75]" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_epd_75_${counting_2}"></span>
   </td>
</tr>`;
    $('.form_second_container').append(form_second_html);

});

$(document).on('click', '.remove_btn_two', function () {

    let center_id = $('.center_id').val();
    let project_title_val = $('.project_title_two_' + $(this).data("id")).val();
    let project_title_text = $('.project_title_two_' + $(this).data("id")).find(":selected").text();
    selected_title_2.splice($.inArray(project_title_val, selected_title_2), 1);

    if (form_second_count > counting_2) {


        $.ajax({
            method: "GET",
            url: baseurl + "/manage/infrastructure/infrWorkForm2DeleteById/" + $(this).data("db_id"),
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success == false) {
                    $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                    $('.message').addClass('d-none');
                    $('.error_message').removeClass('d-none');
                } else {
                    $('.row_' + $(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');
                    $('.row_two_' + $(this).data("id")).remove();
                    swal("Message", response.message, "success")
                        .then(() => {
                            window.location.href = baseurl + "/manage/infrastructure/index/"+encode_temp_id+'/'+center_id;
                        });
                    // $('.row_'+$(this).data("id")).remove();
                    // $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    // $('.error_message').addClass('d-none');
                    // $('.message').removeClass('d-none');
                    // window.location.href = baseurl + "/manage/infrastructure/index";

                }
            }

        });
    } else {

        $('.row_two_' + $(this).data("id")).remove();
    }
    counting_2--;
    console.log("counting_2-" + counting_2);
    console.log($(`.project_title_two[value='${project_title_val}']`).length);
    if ($(`.project_title_two[value='${project_title_val}']`).length > 0) {

    } else {

        if (project_title_text != 'Project ID/Title') {
            $(`.project_title_two`).append($("<option></option>")
                .attr("value", project_title_val)
                .text(project_title_text));
        }

    }

    var current_item = $(this).data("id");
    second_form_array_counting = $.grep(second_form_array_counting, function (value) {
        return value != current_item;
    });

});

$(document).on('change', '.project_title_two', function () {

    selected_title_2.push($(this).val());

    second_form_array_counting.map((value, key) => {
        if ($(this).data("id") != value) {

            $(`.project_title_two_${value} option[value='${$(this).val()}']`).remove();
        }
    })
    let id = $(this).val();
    let index = $(this).data("id");
    $.ajax({
        method: "GET",
        url: baseurl + "/manage/infrastructure/getInfraDetailsById/" + id,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success == false) {
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.error_message').removeClass('d-none');
                swal("Message", response.message, "error");

            } else {
                // console.log("response.work_date",response.work_date_old);
                // return false;
                // if('response.data.work_date')
                $('.cost_two_' + index).val(response.data.cost);
                $('.agency_id_two_' + index).val(response.data.agency.name);
                // $('.agency_id_two_' + index).val(response.work_date_old.infrastructure.agency.name);                
                $('.cost_two_' + index).attr("readonly");
                $('.agency_id_two_' + index).attr("readonly");

                if (response.work_date_old != null) {
                    $('.work_start_date_' + index).val(response.work_date_old.work_start_date);
                    $('.cpdc_date_' + index).val(response.work_date_old.cpdc_date);
                    $('.epd_25_' + index).val(response.work_date_old.epd_25);
                    $('.epd_50_' + index).val(response.work_date_old.epd_50);
                    $('.epd_75_' + index).val(response.work_date_old.epd_75);
                    $('.progress_percentage_' + index).val(response.work_date_old.progress_percentage);
                    $('.current_pdc_' + index).val(response.work_date_old.current_pdc);
                    $('.remarks_2_' + index).val(response.work_date_old.remarks_2);
                }
                

                let date = new Date(response.work_date.date_of_work_award);
                $('.row_two_' + index).append(`<input type="hidden" name="infra_manage_two[${index}][id]" value="${response.work_date.id}">`);
                date.setDate(date.getDate() + 1)
                $(".work_start_date_" + index).datepicker({
                    slideDown: true,
                    dateFormat: "dd-mm-yy",
                    minDate: date,
                });
            }
        }

    });
});



$('.infra_manage_form_two').on('submit', function (e) {
    e.preventDefault();
    let center_id = $('.center_id').val();
    let condition = true;

    for (let i = 0; i <= counting_2; i++) {

        if ($('.project_title_two_' + second_form_array_counting[i]).val() == null) {
            $('.error_project_title_two_' + second_form_array_counting[i]).text('select a title.');
            $('.project_title_two_' + second_form_array_counting[i]).focus();
            condition = false;
            break;
        } else {
            $('.error_project_title_two_' + second_form_array_counting[i]).text('');
        }
        if ($('.work_start_date_' + second_form_array_counting[i]).val() == '') {
            $('.error_work_start_date_' + second_form_array_counting[i]).text('select a date.');
            $('.work_start_date_' + second_form_array_counting[i]).focus();
            condition = false;
            break;
        } else {
            $('.error_work_start_date_' + second_form_array_counting[i]).text('');
        }
        // console.log($('.progress_percentage_'+second_form_array_counting[i]).val() );
        if ($('.progress_percentage_' + second_form_array_counting[i]).val() != null) {
            let val = $('.progress_percentage_' + second_form_array_counting[i]).val();
            let regex = /^(\+|-)?(\d*\.?\d*)$/;
            if (regex.test(val)) {
                $('.error_progress_percentage_' + second_form_array_counting[i]).text('');
            } else {
                $('.error_progress_percentage_' + second_form_array_counting[i]).text('');
                $('.error_progress_percentage_' + second_form_array_counting[i]).text('Please Enter a valid Percentage value without % symbol.');
                $('.progress_percentage_' + second_form_array_counting[i]).focus();
                condition = false;
                break;
            }
        }
        if ($('.current_pdc_' + second_form_array_counting[i]).val() != null) {
            let val = $('.current_pdc_' + second_form_array_counting[i]).val();
            // let regex = /^(\+|-)?(\d*\.?\d*)$/;
            // if (regex.test(val)) {
            //     $('.error_current_pdc_' + second_form_array_counting[i]).text('');
            // } else {
            //     $('.error_current_pdc_' + second_form_array_counting[i]).text('');
            //     $('.error_current_pdc_' + second_form_array_counting[i]).text('Please Enter a valid value.');
            //     $('.current_pdc_' + second_form_array_counting[i]).focus();
            //     condition = false;
            //     break;
            // }
        }

    }
    if (condition) {
        let center_id = $('.center_id').val();
        var formdata = new FormData($('.infra_manage_form_two')[0]);

        $.ajax({
            method: "POST",
            url: baseurl + "/manage/infrastructure/store_physical_form",
            data: formdata,
            contentType: false,
            processData: false,
            headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                if (response.success == false) {
                    $('.message').addClass('d-none');
                    $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                    $('.error_message').removeClass('d-none');
                    swal("Message", response.message, "error");

                } else {
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');
                    swal("Message", response.message, "success")
                        .then(() => {
                            window.location.href = baseurl + "/manage/infrastructure/index/" + encode_temp_id+'/'+center_id;
                        });
                    //   $('.error_message').addClass('d-none');
                    //   $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    //   $('.message').removeClass('d-none');
                    //   window.location.href = baseurl + "/manage/infrastructure/index";

                }
            }

        });
    }

})