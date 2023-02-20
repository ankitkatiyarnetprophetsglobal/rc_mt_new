$(document).ready(function(){
  $( ".specs_finalization_date_0" ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
  });
  
});



for(let i =0; i<form_third_count;i++){
  $( ".specs_finalization_date_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
  });
  if($('.specs_finalization_date_'+i).val() != ''){
    let specs_finalization_date = revDateStr($('.specs_finalization_date_'+i).val());
    new_date = addOneDayIntoDate(specs_finalization_date);
    $( ".floating_tender_date_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    
  });
}
  if($('.floating_tender_date_'+i).val() != ''){
    let floating_tender_date = revDateStr($('.floating_tender_date_'+i).val());
    new_date = addOneDayIntoDate(floating_tender_date);
    $( ".opening_tender_date_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
  if($('.opening_tender_date_'+i).val() != ''){
    let opening_tender_date = revDateStr($('.opening_tender_date_'+i).val());
    new_date = addOneDayIntoDate(opening_tender_date);
    $( ".tech_eval_date_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
  if($('.tech_eval_date_'+i).val() != ''){
    let tech_eval_date = revDateStr($('.tech_eval_date_'+i).val());
    new_date = addOneDayIntoDate(tech_eval_date);
    $( ".final_eval_date_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
  if($('.final_eval_date_'+i).val() != ''){
    let final_eval_date = revDateStr($('.final_eval_date_'+i).val());
    new_date = addOneDayIntoDate(final_eval_date);
    $( ".order_placement_date_"+i ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
}
}


$(document).on('change','.specs_finalization_date',function(){
    let date_id = $(this).data("id");

    $( ".floating_tender_date_"+date_id ).datepicker("destroy");
    $( ".floating_tender_date_"+date_id ).val("");
    $( ".opening_tender_date_"+date_id ).datepicker("destroy");
    $( ".opening_tender_date_"+date_id ).val("");
    $( ".tech_eval_date_"+date_id ).datepicker("destroy");
    $( ".tech_eval_date_"+date_id ).val("");
    $( ".final_eval_date_"+date_id ).datepicker("destroy");
    $( ".final_eval_date_"+date_id ).val("");
    $( ".order_placement_date_"+date_id ).datepicker("destroy");
    $( ".order_placement_date_"+date_id ).val("");

    var date = revDateStr($('.specs_finalization_date_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".floating_tender_date_"+date_id ).removeAttr('readonly');
    $( ".floating_tender_date_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.floating_tender_date',function(){
  
    let date_id = $(this).data("id");

    
    $( ".opening_tender_date_"+date_id ).datepicker("destroy");
    $( ".opening_tender_date_"+date_id ).val("");
    $( ".tech_eval_date_"+date_id ).datepicker("destroy");
    $( ".tech_eval_date_"+date_id ).val("");
    $( ".final_eval_date_"+date_id ).datepicker("destroy");
    $( ".final_eval_date_"+date_id ).val("");
    $( ".order_placement_date_"+date_id ).datepicker("destroy");
    $( ".order_placement_date_"+date_id ).val("");

    var date = revDateStr($('.floating_tender_date_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".opening_tender_date_"+date_id ).removeAttr('readonly');
    $( ".opening_tender_date_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.opening_tender_date',function(){
    let date_id = $(this).data("id");

    
    $( ".tech_eval_date_"+date_id ).datepicker("destroy");
    $( ".tech_eval_date_"+date_id ).val("");
    $( ".final_eval_date_"+date_id ).datepicker("destroy");
    $( ".final_eval_date_"+date_id ).val("");
    $( ".order_placement_date_"+date_id ).datepicker("destroy");
    $( ".order_placement_date_"+date_id ).val("");

    var date = revDateStr($('.opening_tender_date_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".tech_eval_date_"+date_id ).removeAttr('readonly');
    $( ".tech_eval_date_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.tech_eval_date',function(){
    let date_id = $(this).data("id");

   
    $( ".final_eval_date_"+date_id ).datepicker("destroy");
    $( ".final_eval_date_"+date_id ).val("");
    $( ".order_placement_date_"+date_id ).datepicker("destroy");
    $( ".order_placement_date_"+date_id ).val("");

    var date = revDateStr($('.tech_eval_date_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".final_eval_date_"+date_id ).removeAttr('readonly');
    $( ".final_eval_date_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});
$(document).on('change','.final_eval_date',function(){
    let date_id = $(this).data("id");

   
    
    $( ".order_placement_date_"+date_id ).datepicker("destroy");
    $( ".order_placement_date_"+date_id ).val("");

    var date = revDateStr($('.final_eval_date_'+date_id).val());
    new_date = addOneDayIntoDate(date);
    $( ".order_placement_date_"+date_id ).removeAttr('readonly');
    $( ".order_placement_date_"+date_id ).datepicker({
    slideDown : true,
    dateFormat : "dd-mm-yy",
    minDate: new_date,
  });
});



$(document).on('click','.third_form_add_btn',function(){
   counting++; 
   third_form_array_counting.push(counting);   
   let project_center_id = $('#project_center_id').val();
   form_third_html = `<tr class = "row_${counting}">
   <td>${counting + 1}</td>
   <td class="text-start">
   <input type="hidden" name="pro[${counting}][template_id]" value="${temp_id}" autocomplete="off">
   <input type="hidden" name="pro[${counting}][project_center_id]" value="${project_center_id}">
       <select class="form-control title_id_${counting} changes_forth_form title_id" name="pro[${counting}][title_id]" data-id="${counting}">
       <option selected disabled>Select</option>
       ${getTitle(selected_title)}
       </select>
       <span class="text-danger error_title_id_${counting}"></span>
   </td>
   <td class="text-start">
       <select class="form-control specs_finalized_${counting}" name="pro[${counting}][specs_finalized]" autocomplete="off">
           <option selected disabled>Select</option>
           <option value="yes">Yes</option>
           <option value="no">No</option>
        
       </select>
       <span class="text-danger error_specs_finalized_${counting}"></span>
   </td>
   <td class="text-start">
       <select class="form-control tender_type_${counting}" name="pro[${counting}][tender_type]" autocomplete="off">
           <option selected disabled>Select</option>
           <option value="open">Open</option>
           <option value="limited">Limited</option>
           <option value="pac">PAC</option>
        
       </select>
       <span class="text-danger error_tender_type_${counting}"></span>
   </td>
   
   
   <td>
       <input type="number" step=any name="pro[${counting}][estimated_value]" class="form-control estimated_value_${counting}" placeholder="" autocomplete="off">
       <span class="text-danger error_estimated_value_${counting}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting}][specs_finalization_date]"  class="form-control specs_finalization_date specs_finalization_date_${counting}" data-id="${counting}" placeholder="dd-mm-yyyy" autocomplete="off">
       <span class="text-danger error_specs_finalization_date_${counting}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting}][floating_tender_date]" class="form-control floating_tender_date floating_tender_date_${counting}" data-id="${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_floating_tender_date_${counting}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting}][opening_tender_date]" class="form-control opening_tender_date opening_tender_date_${counting}" data-id="${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_opening_tender_date_${counting}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting}][tech_eval_date]" class="form-control tech_eval_date_${counting} tech_eval_date" data-id="${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_tech_eval_date_${counting}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting}][final_eval_date]" class="form-control final_eval_date_${counting} final_eval_date" data-id="${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_final_eval_date_${counting}"></span>
   </td>
   <td>
       <input type="text" name="pro[${counting}][order_placement_date]" class="form-control order_placement_date_${counting} order_placement_date" data-id="${counting}" placeholder="dd-mm-yyyy" readonly autocomplete="off">
       <span class="text-danger error_order_placement_date_${counting}"></span>
   </td>
   <td>
       <input type="nubmer" step=any name="pro[${counting}][tender_value]" class="form-control tender_value_${counting}" data-id="${counting}" placeholder="" autocomplete="off">
       <span class="text-danger error_tender_value_${counting}"></span>
   </td>
   
   <td>
       <input type="text" name="pro[${counting}][remarks]" class="form-control remarks_${counting}" data-id="${counting}" placeholder="" autocomplete="off">
       <span class="text-danger error_remarks_${counting}"></span>
     
   </td>

    <td>
       <a href="javascript:void(0)" class="actionbtn remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
   </td>
</tr>`;
$('.form_third_container').append(form_third_html);
$(`.specs_finalization_date_${counting}`).datepicker({
  slideDown : true,
  dateFormat : "dd-mm-yy",
});
});

$(document).on('click','.remove_btn',function(){
    
    let title_val = $('.title_id_'+$(this).data("id")).val();
    let center_id = $('.center_id').val();
    let title_text = $('.title_id_'+$(this).data("id")).find(":selected").text();
    selected_title.splice($.inArray(title_val,selected_title),1);
    
    if(form_third_count > counting){
        $.ajax({
            method: "GET",
            url: baseurl + "/manage/procurement/procurementFormThirdDeleteById/"+$(this).data("db_id"),
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
                    console.log('done');
                    window.location.href = baseurl + "/manage/procurement/index/"+encode_temp_id+'/'+center_id;
                     });
                    // $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    // $('.error_message').addClass('d-none');
                    // $('.message').removeClass('d-none');
                    // window.location.href = baseurl + "/manage/infrastructure/index";
                    
                }
            }
    
          });
    }else{
        console.log('temp');
        $('.row_'+$(this).data("id")).remove();
    }
    counting--;
    if($(`.title_id[value='${title_val}']`).length > 0){
        console.log("if");
    }else{
        console.log("else");
        if(title_text != 'Select'){
            $(`.title_id`).append($("<option></option>")
            .attr("value", title_val)
            .text(title_text));
        }
       
    }
    
    var current_item = $(this).data("id");
   third_form_array_counting = $.grep(third_form_array_counting, function(value) {
            return value != current_item;
            });
    
 });

 $(document).on('change','.title_id',function(){
    
   
    selected_title.push($(this).val());
   
    third_form_array_counting.map((value,key) => {
        if($(this).data("id") != value){
            
            $(`.title_id_${value} option[value='${$(this).val()}']`).remove();
        }
    })
   
 });


 $('#third_form').on('submit',function(e){
    e.preventDefault();
    let center_id = $('.center_id').val();
    let condition = true;
    for(let i=0;i <= counting; i++){
        
        if($('.title_id_'+third_form_array_counting[i]).val()  == null){
        $('.error_title_id_'+third_form_array_counting[i]).text('select a title.');
        $('.title_id_'+third_form_array_counting[i]).focus();
        condition = false;
        break;
        }else{
        $('.error_title_id_'+third_form_array_counting[i]).text('');
        } 
        
       }   
       
    
    if(condition){
        
        var formdata = new FormData($('#third_form')[0]);
        
$.ajax({
method: "POST",
url: baseurl+"/manage/procurement/store_form_third",
data: formdata,
contentType: false,
processData: false,
headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
success: function (response) {
    if(response.success == false){
      $('.message').addClass('d-none');
      $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
      $('.error_message').removeClass('d-none');
      swal("Message",response.message, "error");
    }else{
      $('.error_message').addClass('d-none');
       $('.message').html(`<strong>Success!</strong> ${response.message}`);
      $('.message').removeClass('d-none');
      swal("Message",response.message, "success")
                   .then(() => {
                    window.location.href = baseurl + "/manage/procurement/index/"+encode_temp_id+'/'+center_id;
                     });
     // window.location.href = baseurl + "/manage/infrastructure/index";
        
    }
}

});  
    }
    
  })