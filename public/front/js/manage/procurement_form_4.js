$(document).ready(function () {
  $(".issue_of_order_date_0").datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
  });
});



for (let i = 0; i < form_fourth_count; i++) {

  $(".issue_of_order_date_" + i).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",

  });

  
    if ($('.issue_of_order_date_' + i).val() != '' && $('.issue_of_order_date_' + i).val() != undefined) {
      
      let issue_of_order_date = revDateStr($('.issue_of_order_date_' + i).val());
      
      new_date = addOneDayIntoDate(issue_of_order_date);
      $(".delivery_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
    if ($('.delivery_date_' + i).val() != '' && $('.delivery_date_' + i).val() != undefined) {
      
      let delivery_date = revDateStr($('.delivery_date_' + i).val());
      
      new_date = addOneDayIntoDate(delivery_date);
      $(".installation_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });

      $(".satisfactory_certificate_receipt_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
    // if ($('.installation_date_' + i).val() != '' && $('.installation_date_' + i).val() != undefined) {
    //   let installation_date = revDateStr($('.installation_date_' + i).val());
    //   //console.log(installation_date);
    //   new_date = addOneDayIntoDate(installation_date);
    //   $(".satisfactory_certificate_receipt_date_" + i).datepicker({
    //     slideDown: true,
    //     dateFormat: "dd-mm-yy",
    //     minDate: new_date,
    //   });
    // }
  
    if ($('.satisfactory_certificate_receipt_date_' + i).val() != '' && $('.satisfactory_certificate_receipt_date_' + i).val() != undefined) {
      let satisfactory_certificate_receipt_date = revDateStr($('.satisfactory_certificate_receipt_date_' + i).val());
      //console.log(satisfactory_certificate_receipt_date);
      new_date = addOneDayIntoDate(satisfactory_certificate_receipt_date);
      $(".invoice_receipt_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
   
    if ($('.invoice_receipt_date_' + i).val() != '' && $('.invoice_receipt_date_' + i).val() != undefined) {
      let invoice_receipt_date = revDateStr($('.invoice_receipt_date_' + i).val());
      //console.log(invoice_receipt_date);
      new_date = addOneDayIntoDate(invoice_receipt_date);
      $(".approval_of_payment_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
    if ($('.approval_of_payment_date_' + i).val() != '' && $('.approval_of_payment_date_' + i).val() != undefined) {
      let approval_of_payment_date = revDateStr($('.approval_of_payment_date_' + i).val());
     // console.log(approval_of_payment_date);
      new_date = addOneDayIntoDate(approval_of_payment_date);
      $(".payment_release_date_" + i).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    }
  }



$(document).on('change', '.issue_of_order_date', function () {
  let date_id = $(this).data("id");

  $(".delivery_date_" + date_id).datepicker("destroy");
  $(".delivery_date_" + date_id).val("");
  $(".installation_date_" + date_id).datepicker("destroy");
  $(".installation_date_" + date_id).val("");
  $(".satisfactory_certificate_receipt_date_" + date_id).datepicker("destroy");
  $(".satisfactory_certificate_receipt_date_" + date_id).val("");
  $(".invoice_receipt_date_" + date_id).datepicker("destroy");
  $(".invoice_receipt_date_" + date_id).val("");
  $(".approval_of_payment_date_" + date_id).datepicker("destroy");
  $(".approval_of_payment_date_" + date_id).val("");
  $(".payment_release_date_" + date_id).datepicker("destroy");
  $(".payment_release_date_" + date_id).val("");


  var date = revDateStr($('.issue_of_order_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".delivery_date_" + date_id).removeAttr('readonly');
  $(".delivery_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change', '.delivery_date', function () {

  let date_id = $(this).data("id");


  $(".installation_date_" + date_id).datepicker("destroy");
  $(".installation_date_" + date_id).val("");
  $(".satisfactory_certificate_receipt_date_" + date_id).datepicker("destroy");
  $(".satisfactory_certificate_receipt_date_" + date_id).val("");
  $(".invoice_receipt_date_" + date_id).datepicker("destroy");
  $(".invoice_receipt_date_" + date_id).val("");
  $(".approval_of_payment_date_" + date_id).datepicker("destroy");
  $(".approval_of_payment_date_" + date_id).val("");
  $(".payment_release_date_" + date_id).datepicker("destroy");
  $(".payment_release_date_" + date_id).val("");

  var date = revDateStr($('.delivery_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".installation_date_" + date_id).removeAttr('readonly');
  $(".installation_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
  $(".satisfactory_certificate_receipt_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change', '.installation_date', function () {
  let date_id = $(this).data("id");
  

  $(".satisfactory_certificate_receipt_date_" + date_id).datepicker("destroy");
  $(".satisfactory_certificate_receipt_date_" + date_id).val("");
  $(".invoice_receipt_date_" + date_id).datepicker("destroy");
  $(".invoice_receipt_date_" + date_id).val("");
  $(".approval_of_payment_date_" + date_id).datepicker("destroy");
  $(".approval_of_payment_date_" + date_id).val("");
  $(".payment_release_date_" + date_id).datepicker("destroy");
  $(".payment_release_date_" + date_id).val("");

  var date = revDateStr($('.installation_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".satisfactory_certificate_receipt_date_" + date_id).removeAttr('readonly');
  $(".satisfactory_certificate_receipt_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change', '.satisfactory_certificate_receipt_date', function () {
  let date_id = $(this).data("id");


  $(".invoice_receipt_date_" + date_id).datepicker("destroy");
  $(".invoice_receipt_date_" + date_id).val("");
  $(".approval_of_payment_date_" + date_id).datepicker("destroy");
  $(".approval_of_payment_date_" + date_id).val("");
  $(".payment_release_date_" + date_id).datepicker("destroy");
  $(".payment_release_date_" + date_id).val("");

  var date = revDateStr($('.satisfactory_certificate_receipt_date_' + date_id).val());
  new_date = addOneDayIntoDate(date);
  $(".invoice_receipt_date_" + date_id).removeAttr('readonly');
  $(".invoice_receipt_date_" + date_id).datepicker({
    slideDown: true,
    dateFormat: "dd-mm-yy",
    minDate: new_date,
  });
});
  $(document).on('change', '.invoice_receipt_date', function () {
    let date_id = $(this).data("id");


    $(".approval_of_payment_date_" + date_id).datepicker("destroy");
    $(".approval_of_payment_date_" + date_id).val("");
    $(".payment_release_date_" + date_id).datepicker("destroy");
    $(".payment_release_date_" + date_id).val("");

    var date = revDateStr($('.invoice_receipt_date_' + date_id).val());
    new_date = addOneDayIntoDate(date);
    $(".approval_of_payment_date_" + date_id).removeAttr('readonly');
    $(".approval_of_payment_date_" + date_id).datepicker({
      slideDown: true,
      dateFormat: "dd-mm-yy",
      minDate: new_date,
    });
  });
    $(document).on('change', '.approval_of_payment_date', function () {
      let date_id = $(this).data("id");


      $(".payment_release_date_" + date_id).datepicker("destroy");
      $(".payment_release_date_" + date_id).val("");

      var date = revDateStr($('.approval_of_payment_date_' + date_id).val());
      new_date = addOneDayIntoDate(date);
      $(".payment_release_date_" + date_id).removeAttr('readonly');
      $(".payment_release_date_" + date_id).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
        minDate: new_date,
      });
    });




    $(document).on('click', '.fourth_form_add_btn', function () {
      counting_two++;
      fourth_form_array_counting.push(counting_two);
      let project_center_id = $('#project_center_id').val();
      form_fourth_html = `<tr class="row_2_${counting_two}">
   <td>${counting_two + 1}</td>
   <td class="text-start">
       <input type="hidden" name="pro[${counting_two}][template_id]" value="${temp_id}">
       <input type="hidden" name="pro[${counting_two}][project_center_id]" value="${project_center_id}">      
       <select class="form-control changes_forth_form title_id_two title_id_two_${counting_two}" data-id="${counting_two}"
           name="pro[${counting_two}][title_id_two]">
           <option selected disabled>Select</option>
           ${getTitle2(selected_title_2)}
       </select>
       <span class="text-danger error_title_id_two_${counting_two}"></span>
   </td>


   <td>
       <input type="number" step=any name="pro[${counting_two}][budget_head]"
           class="form-control budget_head budget_head_${counting_two}" placeholder=""
           autocomplete="off">
       <span class="text-danger error_budget_head_${counting_two}"></span>
   </td>
   <td>
       <input type="number" step=any name="pro[${counting_two}][contract_amount]"
           class="form-control contract_amount contract_amount_${counting_two}" placeholder=""
           autocomplete="off">
       <span class="text-danger error_contract_amount_${counting_two}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting_two}][issue_of_order_date]" data-id ="${counting_two}"
           class="form-control issue_of_order_date issue_of_order_date_${counting_two}" placeholder=""
           autocomplete="off">
       <span class="text-danger error_issue_of_order_date_${counting_two}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting_two}][delivery_date]" data-id ="${counting_two}"
           class="form-control delivery_date delivery_date_${counting_two}" placeholder=""
           autocomplete="off" readonly>
       <span class="text-danger error_delivery_date_${counting_two}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting_two}][installation_date]" data-id ="${counting_two}"
           class="form-control installation_date installation_date_${counting_two}" placeholder=""
           autocomplete="off" readonly>
       <span class="text-danger error_installation_date_${counting_two}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting_two}][satisfactory_certificate_receipt_date]" data-id ="${counting_two}"
           class="form-control satisfactory_certificate_receipt_date satisfactory_certificate_receipt_date_${counting_two}"
           placeholder="" autocomplete="off" readonly>
       <span class="text-danger error_satisfactory_certificate_receipt_date_${counting_two}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting_two}][invoice_receipt_date]" data-id ="${counting_two}"
           class="form-control invoice_receipt_date invoice_receipt_date_${counting_two}" placeholder=""
           autocomplete="off" readonly>
       <span class="text-danger error_invoice_receipt_date_${counting_two}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting_two}][approval_of_payment_date]" data-id ="${counting_two}"
           class="form-control approval_of_payment_date approval_of_payment_date_${counting_two}" placeholder=""
           autocomplete="off" readonly>
       <span class="text-danger error_approval_of_payment_date_${counting_two}"></span>
   </td>

   <td>
       <input type="text" name="pro[${counting_two}][payment_release_date]" data-id ="${counting_two}"
           class="form-control payment_release_date payment_release_date_${counting_two}" placeholder=""
           autocomplete="off" readonly>
       <span class="text-danger error_payment_release_date_${counting_two}"></span>

   </td>
   <td>
       <input type="text" name="pro[${counting_two}][remarks_2]" data-id ="${counting_two}"
           class="form-control remarks_2 remarks_2_${counting_two}" placeholder="" autocomplete="off">
       <span class="text-danger error_remarks_2_${counting_two}"></span>

   </td>
   <td>
       <a href="javascript:void(0)" class="actionbtn remove_btn_fourth"
           data-id="${counting_two}"><i class="fa-solid fa-trash-can"></i></a>
   </td>
</tr>`;
      $('.form_fourth_container').append(form_fourth_html);
      $(".issue_of_order_date_" + counting_two).datepicker({
        slideDown: true,
        dateFormat: "dd-mm-yy",
      });
    });

    $(document).on('click', '.remove_btn_fourth', function () {

      let title_val = $('.title_id_two_' + $(this).data("id")).val();
      let title_text = $('.title_id_two_' + $(this).data("id")).find(":selected").text();
      selected_title_2.splice($.inArray(title_val, selected_title_2), 1);

      if (form_fourth_count > counting_two) {
        $.ajax({
          method: "GET",
          url: baseurl + "/manage/procurement/procurementFormFourthDeleteById/" + $(this).data("db_id"),
          contentType: false,
          processData: false,
          success: function (response) {
            if (response.success == false) {
              $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
              $('.message').addClass('d-none');
              swal("Message", response.message, "error");
              $('.error_message').removeClass('d-none');
            } else {
              $('.row_2_' + $(this).data("id")).remove();
              $('.error_message').addClass('d-none');
              $('.message').html(`<strong>Success!</strong> ${response.message}`);
              $('.message').removeClass('d-none');
              swal("Message", response.message, "success")
                .then(() => {
                  //console.log('done');
                  window.location.href = baseurl + "/manage/procurement/index/" + encode_temp_id;
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
        $('.row_2_' + $(this).data("id")).remove();
      }
      counting_two--;
      if ($(`.title_id_two[value='${title_val}']`).length > 0) {
        console.log("if");
      } else {
        console.log("else");
        if (title_text != 'Select') {
          $(`.title_id_two`).append($("<option></option>")
            .attr("value", title_val)
            .text(title_text));
        }

      }

      var current_item = $(this).data("id");
      fourth_form_array_counting = $.grep(fourth_form_array_counting, function (value) {
        return value != current_item;
      });

    });

    $(document).on('change', '.title_id_two', function () {

      // alert("asdfasdfasdf");
      selected_title_2.push($(this).val());

      fourth_form_array_counting.map((value, key) => {
        if ($(this).data("id") != value) {

          $(`.title_id_${value} option[value='${$(this).val()}']`).remove();
        }
      })

      selected_title_2.push($(this).val());
      console.log("select_project_title.push($(this).val())",selected_title_2);
      var change_id = $(this).val();
      var formdata = {id:change_id};
      var counting = $(this).data("id");

    });


    $('#fourth_form').on('submit', function (e) {
      e.preventDefault();


      let condition = true;
      
      let center_id = $('.center_id').val();
      for (let i = 0; i <= counting_two; i++) {

        if ($('.title_id_two_' + fourth_form_array_counting[i]).val() == undefined) {

          $('.error_title_id_two_' + fourth_form_array_counting[i]).text('select a title.');
          $('.title_id_two_' + fourth_form_array_counting[i]).focus();
          condition = false;
          break;
        } else {
          $('.error_title_id_two_' + fourth_form_array_counting[i]).text('');
        }
        if ($('.budget_head_' + fourth_form_array_counting[i]).val() == undefined || $('.budget_head_' + fourth_form_array_counting[i]).val() == '') {

          $('.error_budget_head_' + fourth_form_array_counting[i]).text('enter budget head.');
          $('.budget_head_' + fourth_form_array_counting[i]).focus();
          condition = false;
          break;
        } else {
          $('.error_budget_head_' + fourth_form_array_counting[i]).text('');
        }

      }


      if (condition) {

        var formdata = new FormData($('#fourth_form')[0]);

        $.ajax({
          method: "POST",
          url: baseurl + "/manage/procurement/store_form_fourth",
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


    

    $(document).on('change','.changes_forth_form',function() {

      // alert(123456);
      // return false;

      let index = $(this).data("id");

      // alert(index);

      // select_project_title.push($(this).val());

      // array_counting.map((value,key) => {
      //     if($(this).data("id") != value){
              
      //         $(`.project_title_${value} option[value='${$(this).val()}']`).remove();
      //     }
      // })

      // select_project_title.push($(this).val());
      // console.log("select_project_title.push($(this).val())",select_project_title);
      var change_id = $(this).val();
      var formdata = {id:change_id};
      // console.log("formdata",formdata);
      // return false;
      var counting = $(this).data("id");


      $.ajax({
              method: "POST",
              url: baseurl + "/manage/procurement/changesforthform",
              data:formdata,
              headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
              success: function(response) {
                console.log("old_data_two",response.old_data_two.installation_date);
                if (response.old_data != null) {
                  
                  $('.specs_finalized_' + index).val(response.old_data.specs_finalized);
                  $('.tender_type_' + index).val(response.old_data.tender_type);
                  $('.estimated_value_' + index).val(response.old_data.estimated_value);
                  $('.specs_finalization_date_' + index).val(response.old_data.specs_finalization_date.split("-").reverse().join("-"));
                  $('.floating_tender_date_' + index).val(response.old_data.floating_tender_date.split("-").reverse().join("-"));
                  $('.opening_tender_date_' + index).val(response.old_data.opening_tender_date.split("-").reverse().join("-"));
                  $('.tech_eval_date_' + index).val(response.old_data.tech_eval_date.split("-").reverse().join("-"));
                  $('.final_eval_date_' + index).val(response.old_data.final_eval_date.split("-").reverse().join("-"));
                  $('.order_placement_date_' + index).val(response.old_data.order_placement_date.split("-").reverse().join("-"));
                  $('.tender_value_' + index).val(response.old_data.tender_value);
                  $('.remarks_' + index).val(response.old_data.remarks);

                }else if (response.old_data == null){
                  
                  $('.specs_finalized_' + index).val(' ');
                  $('.tender_type_' + index).val(' ');
                  $('.estimated_value_' + index).val(' ');
                  $('.specs_finalization_date_' + index).val(' ');
                  $('.floating_tender_date_' + index).val(' ');
                  $('.opening_tender_date_' + index).val(' ');
                  $('.tech_eval_date_' + index).val(' ');
                  $('.final_eval_date_' + index).val(' ');
                  $('.order_placement_date_' + index).val(' ');
                  $('.tender_value_' + index).val(' ');
                  $('.remarks_' + index).val(' ');

                }

                if (response.old_data_two != null) {
                  $('.budget_head_' + index).val(response.old_data_two.budget_head);
                  $('.contract_amount_' + index).val(response.old_data_two.contract_amount);
                  $('.issue_of_order_date_' + index).val(response.old_data_two.issue_of_order_date.split("-").reverse().join("-"));
                  $('.delivery_date_' + index).val(response.old_data_two.delivery_date.split("-").reverse().join("-"));
                  if(response.old_data_two.installation_date != null){
                    $('.installation_date_' + index).val(response.old_data_two.installation_date.split("-").reverse().join("-"));
                  }
                  if(response.old_data_two.satisfactory_certificate_receipt_date != null){
                    $('.satisfactory_certificate_receipt_date_' + index).val(response.old_data_two.satisfactory_certificate_receipt_date.split("-").reverse().join("-"));
                  }
                  if(response.old_data_two.invoice_receipt_date != null){
                    $('.invoice_receipt_date_' + index).val(response.old_data_two.invoice_receipt_date.split("-").reverse().join("-"));
                  }
                  if(response.old_data_two.approval_of_payment_date != null){
                    $('.approval_of_payment_date_' + index).val(response.old_data_two.approval_of_payment_date.split("-").reverse().join("-"));
                  }
                  if(response.old_data_two.payment_release_date != null){
                    $('.payment_release_date_' + index).val(response.old_data_two.payment_release_date.split("-").reverse().join("-"));
                  }
                    $('.remarks_2_' + index).val(response.old_data_two.remarks_2);

                }else if (response.old_data == null){
                  
                  $('.budget_head_' + index).val(' ');
                  $('.contract_amount_' + index).val(' ');
                  $('.issue_of_order_date_' + index).val(' ');
                  $('.delivery_date_' + index).val(' ');
                  $('.installation_date_' + index).val(' ');
                  $('.satisfactory_certificate_receipt_date_' + index).val(' ');
                  $('.invoice_receipt_date_' + index).val(' ');
                  $('.approval_of_payment_date_' + index).val(' ');
                  $('.payment_release_date_' + index).val(' ');
                  $('.remarks_2_' + index).val(' ');

                }

                  // budget_cost = response.data.budget_cost;
                  // $('.budgetcode_'+counting).val(budget_cost);
                  // console.log("response",response.old_data.be_re);
                  // if (response.old_data != null) {
                  //     // $('.budgetcode_' + index).val(response.old_data.budget_code);
                  //     $('.bere_' + index).val(response.old_data.be_re);
                  //     $('.openingbalance_' + index).val(response.old_data.opening_balance);
                  //     $('.fundsreceived_' + index).val(response.old_data.fund_received);
                  //     $('.totalfundsavailable_' + index).val(response.old_data.total_funds);
                  //     $('.expenditureincurred_' + index).val(response.old_data.expenditure_incurred);
                  //     $('.committedliabilities_' + index).val(response.old_data.commited_liabilities);
                  //     $('.balance_' + index).val(response.old_data.balance);
                  //     $('.remarks_' + index).val(response.old_data.remark);
                  // }
                  return false;


              },
              complete: function(xhr, textStatus) {
                  console.log(xhr.status);
              }

          }); 
      return false;
  });
    