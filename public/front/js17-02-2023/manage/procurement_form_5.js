$(document).ready(function () {
  $(".service_floating_tender_date_0").datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
  });
});



for (let i = 0; i < form_fifth_count; i++) {

  $(".service_floating_tender_date_" + i).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",

  });

  
    if ($('.service_opening_tender_date_' + i).val() != '' && $('.service_opening_tender_date_' + i).val() != undefined) {
      
      let service_opening_tender_date = revDateStr($('.service_opening_tender_date_' + i).val());
      
      new_date = addOneDayIntoDate(service_opening_tender_date);
      $(".service_tech_eval_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
    if ($('.service_tech_eval_date_' + i).val() != '' && $('.service_tech_eval_date_' + i).val() != undefined) {
      
      let service_tech_eval_date_ = revDateStr($('.service_tech_eval_date_' + i).val());
      
      new_date = addOneDayIntoDate(service_tech_eval_date_);
      $(".service_final_eval_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
    if ($('.service_final_eval_date_' + i).val() != '' && $('.service_final_eval_date_' + i).val() != undefined) {
      let service_final_eval_date = revDateStr($('.service_final_eval_date_' + i).val());
      
      new_date = addOneDayIntoDate(service_final_eval_date);
      $(".award_of_work_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
 }



$(document).on('change', '.service_floating_tender_date', function () {
  let date_id = $(this).data("id");

  $(".service_opening_tender_date_" + date_id).datepicker("destroy");
  $(".service_opening_tender_date_" + date_id).val("");
  $(".service_tech_eval_date_" + date_id).datepicker("destroy");
  $(".service_tech_eval_date_" + date_id).val("");
  $(".service_final_eval_date_" + date_id).datepicker("destroy");
  $(".service_final_eval_date_" + date_id).val("");
  $(".service_award_of_work_date_" + date_id).datepicker("destroy");
  $(".service_award_of_work_date_" + date_id).val("");
  
console.log(date_id);
console.log($('.service_floating_tender_date_' + date_id).val());
  var date = revDateStr($('.service_floating_tender_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".service_opening_tender_date_" + date_id).removeAttr('readonly');
  $(".service_opening_tender_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change', '.service_opening_tender_date', function () {

  let date_id = $(this).data("id");

  $(".service_tech_eval_date_" + date_id).datepicker("destroy");
  $(".service_tech_eval_date_" + date_id).val("");
  $(".service_final_eval_date_" + date_id).datepicker("destroy");
  $(".service_final_eval_date_" + date_id).val("");
  $(".service_award_of_work_date_" + date_id).datepicker("destroy");
  $(".service_award_of_work_date_" + date_id).val("");
  

  var date = revDateStr($('.service_opening_tender_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".service_tech_eval_date_" + date_id).removeAttr('readonly');
  $(".service_tech_eval_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change', '.service_tech_eval_date', function () {
  let date_id = $(this).data("id");
  

  $(".service_final_eval_date_" + date_id).datepicker("destroy");
  $(".service_final_eval_date_" + date_id).val("");
  $(".service_award_of_work_date_" + date_id).datepicker("destroy");
  $(".service_award_of_work_date_" + date_id).val("");

  var date = revDateStr($('.service_tech_eval_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".service_final_eval_date_" + date_id).removeAttr('readonly');
  $(".service_final_eval_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change', '.service_final_eval_date', function () {
  let date_id = $(this).data("id");


  $(".service_award_of_work_date_" + date_id).datepicker("destroy");
  $(".service_award_of_work_date_" + date_id).val("");

  var date = revDateStr($('.service_final_eval_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".service_award_of_work_date_" + date_id).removeAttr('readonly');
  $(".service_award_of_work_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
  
 $(document).on('click', '.fifth_form_add_btn', function () {
      counting_fifth++;
      fifth_form_array_counting.push(counting_fifth);
      let project_center_id = $('#project_center_id').val();
      form_fifth_html = ` <tr class="row_5_${counting_fifth}">
      <td>${counting_fifth + 1}</td>
      <td class="text-start">
          <input type="hidden" name="pro_services[${counting_fifth}][template_id]" value="${temp_id}">
          <input type="hidden" name="pro_services[${counting_fifth}][project_center_id]" value="${project_center_id}">      
          <select class="form-control title_id_five title_id_five_${counting_fifth}"
              name="pro_services[${counting_fifth}][title_id_five]" data-id="${counting_fifth}">
              <option selected disabled>Select</option>
              ${getTitle5(selected_title_5)}
          </select>
          <span class="text-danger error_title_id_five_${counting_fifth}"></span>
      </td>


      <td>
          <input type="text" name="pro_services[${counting_fifth}][expiry_date_of_existing_contract]"
              class="form-control service_expiry_date_of_existing_contract service_expiry_date_of_existing_contract_${counting_fifth}"
              placeholder="dd-mm-yyyy" readonly>
          <span class="text-danger error_service_expiry_date_of_existing_contract_${counting_fifth}"></span>
      </td>
      <td>
          <input type="number" step=any name="pro_services[${counting_fifth}][value_of_existing_contract]"
              class="form-control service_value_of_existing_contract service_value_of_existing_contract_${counting_fifth}"
              placeholder="" readonly>
          <span class="text-danger error_service_value_of_existing_contract_${counting_fifth}"></span>
      </td>
      <td>
          <input type="number" step=any
              name="pro_services[${counting_fifth}][estimated_value_of_new_tender]"
              class="form-control service_estimated_value_of_new_tender service_estimated_value_of_new_tender_${counting_fifth}"
              placeholder="" autocomplete="off">
          <span class="text-danger error_service_estimated_value_of_new_tender_${counting_fifth}"></span>
      </td>
      <td>
          <select class="form-control service_tender_type service_tender_type_${counting_fifth}"
              name="pro_services[${counting_fifth}][tender_type]">
              <option selected disabled>Select</option>
              <option value="open">Open</option>
              <option value="limited">Limited</option>
              <option value="pac">PAC</option>

          </select>
          <span class="text-danger error_service_tender_type_${counting_fifth}"></span>
      </td>
      <td>
          <input type="text" name="pro_services[${counting_fifth}][floating_tender_date]" data-id="${counting_fifth}"
              class="form-control service_floating_tender_date service_floating_tender_date_${counting_fifth}"
              placeholder="dd-mm-yyyy" autocomplete="off">
          <span class="text-danger error_service_floating_tender_date_${counting_fifth}"></span>
      </td>
      <td>
          <input type="text" name="pro_services[${counting_fifth}][opening_tender_date]" data-id="${counting_fifth}"
              class="form-control service_opening_tender_date service_opening_tender_date_${counting_fifth}"
              placeholder="dd-mm-yyyy" readonly autocomplete="off">
          <span class="text-danger error_service_opening_tender_date_${counting_fifth}"></span>
      </td>
      <td>
          <input type="text" name="pro_services[${counting_fifth}][tech_eval_date]" data-id="${counting_fifth}"
              class="form-control service_tech_eval_date service_tech_eval_date_${counting_fifth}"
              placeholder="dd-mm-yyyy" readonly autocomplete="off">
          <span class="text-danger error_service_tech_eval_date_${counting_fifth}"></span>
      </td>
      <td>
          <input type="text" name="pro_services[${counting_fifth}][final_eval_date]" data-id="${counting_fifth}"
              class="form-control service_final_eval_date service_final_eval_date_${counting_fifth}"
              placeholder="dd-mm-yyyy" readonly autocomplete="off">
          <span class="text-danger error_service_final_eval_date_${counting_fifth}"></span>
      </td>
      <td>
          <input type="text" name="pro_services[${counting_fifth}][award_of_work_date]" data-id="${counting_fifth}"
              class="form-control service_award_of_work_date service_award_of_work_date_${counting_fifth}"
              placeholder="dd-mm-yyyy" readonly autocomplete="off">
          <span class="text-danger error_service_award_of_work_date_${counting_fifth}"></span>
      </td>

      <td>
          <input type="text" name="pro_services[${counting_fifth}][remarks]"
              class="form-control service_remarks remarks_${counting_fifth}" placeholder=""
              autocomplete="off">
          <span class="text-danger error_service_remarks_${counting_fifth}"></span>

      </td>
      <td>
          <a href="javascript:void(0)" class="actionbtn remove_btn_fifth" data-id="${counting_fifth}"><i
                  class="fa-solid fa-trash-can"></i></a>
      </td>
  </tr>`;
      $('.form_fifth_container').append(form_fifth_html);
      $(".service_floating_tender_date_" + counting_fifth).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
      });
    });

    $(document).on('click', '.remove_btn_fifth', function () {

      let center_id = $('.center_id').val();
      let title_val = $('.title_id_five_' + $(this).data("id")).val();
      let title_text = $('.title_id_five_' + $(this).data("id")).find(":selected").text();
      selected_title_5.splice($.inArray(title_val, selected_title_5), 1);

      if (form_fifth_count > counting_fifth) {
        $.ajax({
          method: "GET",
          url: baseurl + "/manage/procurement/procurementFormFifthDeleteById/" + $(this).data("db_id"),
          contentType: false,
          processData: false,
          success: function (response) {
            if (response.success == false) {
              $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
              $('.message').addClass('d-none');
              swal("Message", response.message, "error");
              $('.error_message').removeClass('d-none');
            } else {
              $('.row_5_' + $(this).data("id")).remove();

              // $(`.title_id_five`).append($("<option></option>")
              // .attr("value", title_val)
              // .text(title_text));


              $('.error_message').addClass('d-none');
              $('.message').html(`<strong>Success!</strong> ${response.message}`);
              $('.message').removeClass('d-none');
              swal("Message", response.message, "success")
                .then(() => {
                  console.log('done');
                  window.location.href = baseurl + "/manage/procurement/index/" + encode_temp_id+'/'+center_id;
                });
              // $('.message').html(`<strong>Success!</strong> ${response.message}`);
              // $('.error_message').addClass('d-none');
              // $('.message').removeClass('d-none');
              // window.location.href = baseurl + "/manage/infrastructure/index";

            }
          }

        });
      } else {
        console.log('temp');
        $('.row_5_' + $(this).data("id")).remove();
      }
      counting_fifth--;
      if ($(`.title_id_five[value='${title_val}']`).length > 0) {
        console.log("if");
      } else {
        console.log("else");
        console.log(title_val);
        console.log(title_text);
        if (title_text != 'Select') {
          $(`.title_id_five`).append($("<option></option>")
            .attr("value", title_val)
            .text(title_text));
        }

      }

      var current_item = $(this).data("id");
      fifth_form_array_counting = $.grep(fifth_form_array_counting, function (value) {
        return value != current_item;
      });

    });

    $(document).on('change','.title_id_five',function(){
    
      selected_title_5.push($(this).val());
     
      fifth_form_array_counting.map((value,key) => {
          if($(this).data("id") != value){
              
              $(`.title_id_five_${value} option[value='${$(this).val()}']`).remove();
          }
      })
      let id = $(this).val();
      let index = $(this).data("id");
      $.ajax({
          method: "GET",
          url: baseurl + "/manage/procurement/getProcurementServiceDetailsById/"+id,
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.error_message').removeClass('d-none');
                swal("Message",response.message, "error");
                
              }else{
                 
                // console.log("response",response.old_data.value_of_existing_contract);
                // return false;
                $('.service_expiry_date_of_existing_contract_'+index).val(response.data.expiry_date_of_existing_contract.split("-").reverse().join("-"));
                $('.service_value_of_existing_contract_'+index).val(response.data.existing_contract_value*1);
                $('.service_expiry_date_of_existing_contract_'+index).attr("readonly");
                $('.service_value_of_existing_contract_'+index).attr("readonly");
                if (response.old_data != null) {
                  
                  $('.service_estimated_value_of_new_tender_' + index).val(response.old_data.estimated_value_of_new_tender);                  
                  $('.service_tender_type_' + index).val(response.old_data.tender_type);                  
                  $('.service_floating_tender_date_'+index).val(response.old_data.floating_tender_date.split("-").reverse().join("-"));
                  $('.service_opening_tender_date_'+index).val(response.old_data.opening_tender_date.split("-").reverse().join("-"));
                  $('.service_tech_eval_date_'+index).val(response.old_data.tech_eval_date.split("-").reverse().join("-"));
                  $('.service_final_eval_date_'+index).val(response.old_data.final_eval_date.split("-").reverse().join("-"));
                  $('.service_award_of_work_date_'+index).val(response.old_data.award_of_work_date.split("-").reverse().join("-"));
                  $('.remarks_' + index).val(response.old_data.remarks);

                }
              }
          }
  
        }); 
        console.log('selected_title_5 = ' + selected_title_5);
   });


    $('#fifth_form').on('submit', function (e) {
      e.preventDefault();


      let condition = true;     
      let center_id = $('.center_id').val();
      for (let i = 0; i <= counting_fifth; i++) {

        if ($('.title_id_five_' + fifth_form_array_counting[i]).val() == undefined) {

          $('.error_title_id_five_' + fifth_form_array_counting[i]).text('select a title.');
          $('.title_id_five_' + fifth_form_array_counting[i]).focus();
          condition = false;
          break;
        } else {
          $('.error_title_id_five_' + fifth_form_array_counting[i]).text('');
        }
      }


      if (condition) {

        var formdata = new FormData($('#fifth_form')[0]);

        $.ajax({
          method: "POST",
          url: baseurl + "/manage/procurement/store_form_fifth",
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
                  window.location.href = baseurl + "/manage/procurement/index/" + encode_temp_id+'/'+center_id;
                });
              // window.location.href = baseurl + "/manage/infrastructure/index";

            }
          }

        });
      }

    });