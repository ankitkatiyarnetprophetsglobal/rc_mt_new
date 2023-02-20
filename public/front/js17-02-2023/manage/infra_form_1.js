for(let i =0; i<form_first_count;i++){
    let date = new Date($('.date_'+i).data("date"));
    date.setDate(date.getDate() + 1)
    $( ".date_of_issue_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: date,
  });
   
    let date_of_issue = revDateStr($('.date_of_issue_'+i).val());
    let new_date = addOneDayIntoDate(date_of_issue);
    $( ".date_of_receipt_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
    });
  if($('.date_of_receipt_'+i).val() != ''){
    let date_of_receipt = revDateStr($('.date_of_receipt_'+i).val());
    new_date = addOneDayIntoDate(date_of_receipt);
    $( ".date_of_tech_bid_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
  if($('.date_of_tech_bid_'+i).val() != ''){
    let date_of_receipt = revDateStr($('.date_of_tech_bid_'+i).val());
    new_date = addOneDayIntoDate(date_of_receipt);
    $( ".date_of_financial_bid_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
  if($('.date_of_financial_bid_'+i).val() != ''){
    let date_of_receipt = revDateStr($('.date_of_financial_bid_'+i).val());
    new_date = addOneDayIntoDate(date_of_receipt);
    $( ".date_of_work_award_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
}


$(document).on('change','.date_of_issue',function(){
    let date_id = $(this).data("id");

    $( ".date_of_receipt_"+date_id ).datepicker("destroy");
    $( ".date_of_receipt_"+date_id ).val("");
    $( ".date_of_tech_bid_"+date_id ).datepicker("destroy");
    $( ".date_of_tech_bid_"+date_id ).val("");
    $( ".date_of_financial_bid_"+date_id ).datepicker("destroy");
    $( ".date_of_financial_bid_"+date_id ).val("");
    $( ".date_of_work_award_"+date_id ).datepicker("destroy");
    $( ".date_of_work_award_"+date_id ).val("");

    var date = revDateStr($('.date_of_issue_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".date_of_receipt_"+date_id ).removeAttr('readonly');
    $( ".date_of_receipt_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.date_of_receipt',function(){
    let date_id = $(this).data("id");

    
    $( ".date_of_tech_bid_"+date_id ).datepicker("destroy");
    $( ".date_of_tech_bid_"+date_id ).val("");
    $( ".date_of_financial_bid_"+date_id ).datepicker("destroy");
    $( ".date_of_financial_bid_"+date_id ).val("");
    $( ".date_of_work_award_"+date_id ).datepicker("destroy");
    $( ".date_of_work_award_"+date_id ).val("");

    var date = revDateStr($('.date_of_receipt_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".date_of_tech_bid_"+date_id ).removeAttr('readonly');
    $( ".date_of_tech_bid_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.date_of_tech_bid',function(){
    let date_id = $(this).data("id");

    
    $( ".date_of_financial_bid_"+date_id ).datepicker("destroy");
    $( ".date_of_financial_bid_"+date_id ).val("");
    $( ".date_of_work_award_"+date_id ).datepicker("destroy");
    $( ".date_of_work_award_"+date_id ).val("");

    var date = revDateStr($('.date_of_tech_bid_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".date_of_financial_bid_"+date_id ).removeAttr('readonly');
    $( ".date_of_financial_bid_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.date_of_financial_bid',function(){
    let date_id = $(this).data("id");

   
    $( ".date_of_work_award_"+date_id ).datepicker("destroy");
    $( ".date_of_work_award_"+date_id ).val("");

    var date = revDateStr($('.date_of_financial_bid_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".date_of_work_award_"+date_id ).removeAttr('readonly');
    $( ".date_of_work_award_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});



$(document).on('click','.first_form_add_btn',function(){
   counting++; 
   let project_center_id = $('#project_center_id').val();
   first_form_array_counting.push(counting);
   form_first_html = `<tr class="row_${counting}">
   <td>${counting + 1}</td>
   
<td>
       <input type="hidden" name="infra_manage[${counting}][project_center_id]" value="${project_center_id}">      
       <input type="hidden" name="infra_manage[${counting}][template_id]" value="${temp_id}">
       <select class="form-control project_title_${counting} project_title"  data-id ="${counting}" name ="infra_manage[${counting}][infra_id]" readonly>
          <option selected disabled>Project ID/Title</option>
          ${getProjectTitle(selected_title)}
       </select>
       <span class="text-danger error_project_title_${counting}"></span>
   </td>
   
   <td>
       <input type="text" class="form-control cost cost_${counting}" placeholder="Cost" name ="infra_manage[${counting}][cost]" value="" readonly>
       <span class="text-danger error_cost_${counting}"></span>
   </td>
   <td>
       <input type="text" class="form-control date date_${counting}" data-id="${counting}" name ="infra_manage[${counting}][date]" placeholder ="dd-mm-yyyy" readonly>
       <span class="text-danger error_date_${counting}"></span>
   </td>
   <td>
       <input type="text" class="form-control agency_id agency_id_${counting}" placeholder="Agency" name = "infra_manage[${counting}][agency_id]"  readonly>
       <span class="text-danger error_agency_id_${counting}"></span>
   </td>
   <td>
       <input type="text" name="infra_manage[${counting}][date_of_issue]" data-id = "${counting}" class="form-control date_of_issue date_of_issue_${counting}" placeholder="dd-mm-yyyy" autocomplete="off">
       <span class="text-danger error_date_of_issue_${counting}"></span>
   </td>
   <td>
       <input type="text" name ="infra_manage[${counting}][date_of_receipt]" data-id = "${counting}" class="form-control date_of_receipt date_of_receipt_${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off"> 
       <span class="text-danger error_date_of_receipt_${counting}"></span>
   </td>
   <td>
       <input type="text" name ="infra_manage[${counting}][date_of_tech_bid]" data-id = "${counting}" class="form-control date_of_tech_bid date_of_tech_bid_${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_date_of_tech_bid_${counting}"></span>
   </td>
   <td>
       <input type="text" name ="infra_manage[${counting}][date_of_financial_bid]" data-id = "${counting}" class="form-control date_of_financial_bid date_of_financial_bid_${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_date_of_tech_bid_${counting}"></span>
   </td>
   <td>
       <input type="text" name ="infra_manage[${counting}][date_of_work_award]" data-id = "${counting}" class="form-control date_of_work_award date_of_work_award_${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_date_of_work_award_${counting}"></span>
   </td>
   <td>
       <input type="number" step=any min="0" name ="infra_manage[${counting}][tender_cost]" data-id = "${counting}" class="form-control tender_cost_${counting}" placeholder="Tender Cost" autocomplete="off">
       <span class="text-danger error_tender_cost_${counting}"></span>
   </td>
   <td>
       <input type="text" name ="infra_manage[${counting}][remarks_1]"  class="form-control remarks_1_${counting} placeholder="Remarks" autocomplete="off">
       <span class="text-danger error_remarks_1_${counting}"></span>
   </td>
   <td>
      
       <a href="#" class="actionbtn remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
   </td>
</tr>`;
$('.form_first_container').append(form_first_html);

$(document).on('change','.center_title',function(){
    
    
  let center_titleid = $(this).data("center_titleid");
  $(`.project_title_${center_titleid}`).val('Project ID/Title');
  $('.cost_'+center_titleid).val('');
  $('.cost_'+center_titleid).val('');
  $('.date_'+center_titleid).val('');
  $('.agency_id_'+center_titleid).val('');    
  
let id = $(this).val();
// console.log(id);
let index = $(this).data("center_titleid");
$.ajax({
    method: "GET",
    url: baseurl + "/manage/infrastructure/getcentersById/"+id,
    contentType: false,
    processData: false,
    success: function (response) {
        if(response.success == false){
          $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
          $('.error_message').removeClass('d-none');
          swal("Message",response.message, "error");
          
        }else{

          // console.log("response123",response);
          
          // $('.project_title').html(response.html);
          $(`.project_title_${center_titleid}`).html(response.html);
          // $('.project_title').attr("disabled", false); 
          return false;
        }
    }

  }); 
});

});





$(document).on('click','.remove_btn',function(){
    
    let center_id = $('.center_id').val();
    let project_title_val = $('.project_title_'+$(this).data("id")).val();
    let project_center_val = $('.project_center_'+$(this).data("id")).val();
    let project_title_text = $('.project_title_'+$(this).data("id")).find(":selected").text();
    selected_title.splice($.inArray(project_title_val,selected_title),1);
    selected_centers.splice($.inArray(project_center_val,selected_centers ),1);
    
    if(form_first_count > counting){
        $.ajax({
            method: "GET",
            url: baseurl + "/manage/infrastructure/infrWorkDeleteById/"+$(this).data("db_id"),
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
                    swal("Message",response.message, "success")
                   .then(() => {
                    window.location.href = baseurl + "/manage/infrastructure/index/"+encode_temp_id+'/'+center_id;
                     });
                    // $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    // $('.error_message').addClass('d-none');
                    // $('.message').removeClass('d-none');
                    // window.location.href = baseurl + "/manage/infrastructure/index";
                    
                }
            }
    
          });
    }else{
        $('.row_'+$(this).data("id")).remove();
    }
    counting--;
    if($(`.project_title[value='${project_title_val}']`).length > 0){
        console.log("if");
    }else{
        console.log("else");
        if(project_title_text != 'Project ID/Title'){
            $(`.project_title`).append($("<option></option>")
            .attr("value", project_title_val)
            .text(project_title_text));
        }
       
    }
    
    var current_item = $(this).data("id");
    first_form_array_counting = $.grep(first_form_array_counting, function(value) {
            return value != current_item;
            });
    
 });

 $(document).on('change','.project_title',function(){
    
    selected_title.push($(this).val());
    // selected_centers.push($(this).val());
    first_form_array_counting.map((value,key) => {
        if($(this).data("id") != value){
            $(`.project_title_${value} option[value='${$(this).val()}']`).remove();
        }
    })
   
    let id = $(this).val();
    let index = $(this).data("id");
    $.ajax({
        method: "GET",
        url: baseurl + "/manage/infrastructure/getInfraDetailsById/"+id,
        contentType: false,
        processData: false,
        success: function (response) {
            if(response.success == false){
              $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
              $('.error_message').removeClass('d-none');
              swal("Message",response.message, "error");
              
            }else{
              // console.log(response.data.agency.name);
              $('.cost_'+index).val(response.data.cost);
              $('.date_'+index).val(response.data.date.split("-").reverse().join("-"));
              $('.agency_id_'+index).val(response.data.agency.name);
              $('.cost_'+index).attr("readonly");
              $('.date_'+index).attr("readonly");
              $('.agency_id_'+index).attr("readonly");              
              console.log("response.data_old",response.data_old);
              if (response.data_old != null) {
                $('.date_of_issue_'+index).val(response.data_old.date_of_issue.split("-").reverse().join("-"));
                $('.date_of_receipt_'+index).val(response.data_old.date_of_receipt.split("-").reverse().join("-"));
                $('.date_of_tech_bid_'+index).val(response.data_old.date_of_tech_bid.split("-").reverse().join("-"));
                $('.date_of_financial_bid_'+index).val(response.data_old.date_of_financial_bid.split("-").reverse().join("-"));
                $('.date_of_work_award_'+index).val(response.data_old.date_of_work_award.split("-").reverse().join("-"));
                $('.tender_cost_'+index).val(response.data_old.tender_cost);
                $('.remarks_1_'+index).val(response.data_old.remarks_1);
              } 
              let date = new Date(response.data.date);
              date.setDate(date.getDate() + 1)
              $( ".date_of_issue_"+index ).datepicker({
                       slideDown : true,
                       dateFormat : "dd-mm-yy",
                       minDate: date,
                });
            }
        }

      }); 
 });
 $(document).on('change','.project_title',function(){
  let center_titleid = $(this).data("id");
  console.log("center_titleid 1212",center_titleid);
    // selected_title.push($(this).val());
    // selected_centers.push($(this).val());
    // first_form_array_counting.map((value,key) => {
    //     if($(this).data("id") != value){
    //         $(`.project_title_${value} option[value='${$(this).val()}']`).remove();
    //     }
    // })
    let id = $(this).val();
    let index = $(this).data("id");
    $.ajax({
        method: "GET",
        url: baseurl + "/manage/infrastructure/getInfraDetailsById/"+id,
        contentType: false,
        processData: false,
        success: function (response) {
            if(response.success == false){
              $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
              $('.error_message').removeClass('d-none');
              swal("Message",response.message, "error");
              
            }else{
                console.log(response.data.agency.name);
              $('.cost_'+center_titleid).val(response.data.cost);
              $('.date_'+center_titleid).val(response.data.date.split("-").reverse().join("-"));
              $('.agency_id_'+center_titleid).val(response.data.agency.name);
              $('.cost_'+center_titleid).attr("readonly");
              $('.date_'+center_titleid).attr("readonly");
              $('.agency_id_'+center_titleid).attr("readonly");
              let date = new Date(response.data.date);
              date.setDate(date.getDate() + 1)
              $( ".date_of_issue_"+center_titleid ).datepicker({
                       slideDown : true,
                       dateFormat : "dd-mm-yy",
                       minDate: date,
                });
            }
        }

      }); 
 });
 
 $(document).on('change','#center_title',function(){
    // console.log('center_titleid',center_titleid);
    let center_titleid = $(this).data("center_titleid");
    $('.project_title_'+center_titleid).val('');
    $('.cost_'+center_titleid).val('');
    $('.cost_'+center_titleid).val('');
    $('.date_'+center_titleid).val('');
    $('.agency_id_'+center_titleid).val('');    
    console.log('hello 12121212',center_titleid);
  let id = $(this).val();
  // console.log(id);
  let index = $(this).data("id");
  $.ajax({
      method: "GET",
      url: baseurl + "/manage/infrastructure/getcentersById/"+id,
      contentType: false,
      processData: false,
      success: function (response) {
          if(response.success == false){
            $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
            $('.error_message').removeClass('d-none');
            swal("Message",response.message, "error");
            
          }else{

            // console.log("response123",response);
            
            $('.project_title_0').html(response.html);
            // $('.project_title').attr("disabled", false); 
            return false;
          }
      }

    }); 
});



 $('.infra_manage_form').on('submit',function(e){
    e.preventDefault();
    
    let project_center_id = $('#project_center_id').val();
    // console.log("project_center_id",project_center_id);
    // return false;
    let condition = true;
    for(let i=0;i <= counting; i++){
        
        if($('.project_title_'+first_form_array_counting[i]).val()  == null){
          $('.error_project_title_'+first_form_array_counting[i]).text('select a title.');
          $('.project_title_'+first_form_array_counting[i]).focus();
          condition = false;
          break;
        }else{
          $('.error_project_title_'+first_form_array_counting[i]).text('');
        } 
        
        if($('.date_'+first_form_array_counting[i]).val()  == null || $('.date_'+first_form_array_counting[i]).val()  == ''){
        
          $('.error_date_'+first_form_array_counting[i]).text('Fill master');
          $('.date_'+first_form_array_counting[i]).focus();
          condition = false;
          break;
        
        }else{
        
          $('.error_date_'+first_form_array_counting[i]).text('');
        
        }
        
        if($('.agency_id_'+first_form_array_counting[i]).val()  == null || $('.agency_id_'+first_form_array_counting[i]).val()  == ''){
        
          $('.error_agency_id_'+first_form_array_counting[i]).text('Fill master');
          $('.agency_id_'+first_form_array_counting[i]).focus();
          condition = false;
          break;
        
        }else{
        
          $('.error_agency_id_'+first_form_array_counting[i]).text('');
        
        }

        if($('.date_of_issue_'+first_form_array_counting[i]).val()  == ''){
        $('.error_date_of_issue_'+first_form_array_counting[i]).text('select a date.');
        $('.date_of_issue_'+first_form_array_counting[i]).focus();
        condition = false;
        break;
        }else{
        $('.error_date_of_issue_'+first_form_array_counting[i]).text('');
        }
        if($('.tender_cost_'+first_form_array_counting[i]).val() != null){
          let val = $('.tender_cost_'+first_form_array_counting[i]).val();
          let regex = /^(\+|-)?(\d*\.?\d*)$/;
         if (regex.test(val)) {
                $('.error_tender_cost_'+first_form_array_counting[i]).text('');
         }else{
           $('.error_tender_cost_'+first_form_array_counting[i]).text('');
           $('.error_tender_cost_'+first_form_array_counting[i]).text('Please Enter a valid Tender Cost');
           $('.tender_cost_'+first_form_array_counting[i]).focus();
           condition = false;
           break;
          }
       }   
       }
    
    if(condition){
        
        var formdata = new FormData($('.infra_manage_form')[0]);
        
$.ajax({
method: "POST",
url: baseurl+"/manage/infrastructure/store",
data: formdata,
contentType: false,
processData: false,
headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
success: function (response) {
    if(response.success == false){
      $('.message').addClass('d-none');
      $('.error_message').removeClass('d-none');
     // console.log(response);
      if(response.error_code != undefined && response.error_code == 401){
        console.log('here');
        swal("Message",'Please Login Again..', "error")
        .then(() => {
         window.location.href = response.url;
          });
      }else{
        $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
        swal("Message",response.message, "error");
      }
      
    }else{
      console.log("else - "+response);
      $('.error_message').addClass('d-none');
       $('.message').html(`<strong>Success!</strong> ${response.message}`);
      $('.message').removeClass('d-none');
      swal("Message",response.message, "success")
                   .then(() => {
                    window.location.href = baseurl + "/manage/infrastructure/index/"+encode_temp_id+'/'+project_center_id;
                     });
     // window.location.href = baseurl + "/manage/infrastructure/index";
        
    }
}

});  
    }
    
})


$(document).on('change','.center_change',function(){
    
    let center_id = $('.center_id').val();
    window.location.href = baseurl + "/manage/infrastructure/index/"+encode_temp_id+'/'+center_id;
    // location.reload();

}) 