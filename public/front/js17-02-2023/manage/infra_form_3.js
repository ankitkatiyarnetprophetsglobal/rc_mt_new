$(document).on('click','.third_form_add_btn',function(){
   counting_3++; 
   let project_center_id = $('#project_center_id').val();
   third_form_array_counting.push(counting_3);
   form_third_html = `<tr class="row_three_${counting_3}">
   <td>${counting_3 + 1}</td>
   <td>
   <input type="hidden" name="infra_manage_three[${counting_3}][template_id]" value="${temp_id}">
   <input type="hidden" name="infra_manage_three[${counting_3}][project_center_id]" value="${project_center_id}">
       <select class="form-select project_title_three project_title_three_${counting_3}" name="infra_manage_three[${counting_3}][infra_id]"  data-id="${counting_3}" autocomplete="off">
           <option selected disabled>Project ID/Title</option>
           ${getProjectTitle3(selected_title_3)}
       </select>
       <span class="text-danger error_project_title_three_${counting_3}"></span>
   </td>
   <td>
       <input type="text" class="form-control agency_id_three agency_id_three_${counting_3}" placeholder="Agency" name = "infra_manage_three[${counting_3}][agency_id]"  readonly autocomplete="off">
       <span class="text-danger error_agency_id_three_${counting_3}"></span>
   </td>
   <td>
       <input type="text" class="form-control cost_three cost_three_${counting_3}" placeholder="Cost" name ="infra_manage_three[${counting_3}][cost]"  readonly autocomplete="off">
       <span class="text-danger error_cost_three_${counting_3}"></span>
   </td>
   <td>
       <input placeholder="Fund Release" type="text" class="form-control fund_release fund_release_${counting_3}" name ="infra_manage_three[${counting_3}][fund_release]" autocomplete="off">
       <span class="text-danger error_fund_release_${counting_3}"></span>
   </td>
   <td>
       <input placeholder="Fund/Percentage" type="text" class="form-control utilised_fund_percentage utilised_fund_percentage_${counting_3}" name ="infra_manage_three[${counting_3}][utilised_fund_percentage]" autocomplete="off">
       <span class="text-danger error_utilised_fund_percentage_${counting_3}"></span>
   </td>
   <td>
   <select class="form-control uc_status uc_status_${counting_3}" name ="infra_manage_three[${counting_3}][uc_status]">
   <option selected disabled> Select UC Status </option>
   <option value="1">Submitted</option>
   <option value="0">Pending</option>
  </select>
       <span class="text-danger error_uc_status_${counting_3}"></span>
   </td>
   <td>
      
       <a href="javascript:void(0)" class="actionbtn remove_btn_three" data-id="${counting_3}" data-db_id = "${counting_3}"><i class="fa-solid fa-trash-can"></i></a>
   </td>
</tr>`;
$('.form_third_container').append(form_third_html);

});

$(document).on('click','.remove_btn_three',function(){
   
    let center_id = $('.center_id').val();
    let project_title_val = $('.project_title_three_'+$(this).data("id")).val();
    let project_title_text = $('.project_title_three_'+$(this).data("id")).find(":selected").text();
    selected_title_3.splice($.inArray(project_title_val,selected_title_3),1);
    
    if(form_third_count > counting_3){
     
       
        $.ajax({
            method: "GET",
            url: baseurl + "/manage/infrastructure/infrWorkForm3DeleteById/"+$(this).data("db_id"),
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success == false){
                  $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                  $('.message').addClass('d-none');
                  $('.error_message').removeClass('d-none');
                  swal("Message",response.message, "error");
                }else{
                     $('.row_'+$(this).data("id")).remove();
                     $('.error_message').addClass('d-none');
                     $('.message').html(`<strong>Success!</strong> ${response.message}`);
                     $('.message').removeClass('d-none');
                    $('.row_two_'+$(this).data("id")).remove();
                    swal("Message",response.message, "success")
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
    }else{
        
        $('.row_three_'+$(this).data("id")).remove();
    }
    counting_3--;
   
  
    if($(`.project_title_three[value='${project_title_val}']`).length > 0){
       
    }else{
       
        if(project_title_text != 'Project ID/Title'){
            $(`.project_title_three`).append($("<option></option>")
            .attr("value", project_title_val)
            .text(project_title_text));
        }
       
    }
    
    var current_item = $(this).data("id");
    third_form_array_counting = $.grep(third_form_array_counting, function(value) {
            return value != current_item;
            });
    
 });

 $(document).on('change','.project_title_three',function(){
    console.log('here');
    selected_title_3.push($(this).val());
   
    third_form_array_counting.map((value,key) => {
        if($(this).data("id") != value){
            
            $(`.project_title_three_${value} option[value='${$(this).val()}']`).remove();
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
            console.log("form_3_details_old",response.form_3_details_old);
            // return false;
            if(response.success == false){
                
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.error_message').removeClass('d-none');
                swal("Message",response.message, "error");
              
            }else{            
                
                $('.cost_three_'+index).val(response.data.cost);
                $('.agency_id_three_'+index).val(response.data.agency.name);
                $('.cost_three_'+index).attr("readonly");
                $('.agency_id_three_'+index).attr("readonly");

                if (response.form_3_details_old != null) {
                    $('.fund_release_'+index).val(response.form_3_details_old.fund_release);    
                    $('.utilised_fund_percentage_'+index).val(response.form_3_details_old.utilised_fund_percentage);    
                    $('.uc_status_'+index).val(response.form_3_details_old.uc_status);    
                }
                // console.log(response.form_3_details.id);
                $('.row_three_'+index).append(`<input type="hidden" name="infra_manage_three[${index}][id]" value="${response.form_3_details.id}">`);
              
            }
        }

      }); 
 });


 $('.infra_manage_form_three').on('submit',function(e){
    e.preventDefault();
    // console.log('done');
    let center_id = $('.center_id').val();
    let condition = true;
  
    for(let i=0; i <= counting_3; i++){
        
        if($('.project_title_three_'+third_form_array_counting[i]).val()  == null){
        $('.error_project_title_three_'+third_form_array_counting[i]).text('Select a title.');
        $('.project_title_three_'+third_form_array_counting[i]).focus();
        condition = false;
        break;
        }else{
        $('.error_project_title_three_'+third_form_array_counting[i]).text('');
        } 
        if($('.fund_release_'+third_form_array_counting[i]).val()  == ''){
        $('.error_fund_release_'+third_form_array_counting[i]).text('Please Enter Fund value.');
        $('.fund_release_'+third_form_array_counting[i]).focus();
        condition = false;
        break;
        }else{
            let val = $('.fund_release_'+third_form_array_counting[i]).val();
            let regex = /^(\+|-)?(\d*\.?\d*)$/;
           if (regex.test(val)) {
                  $('.error_fund_release_'+third_form_array_counting[i]).text('');
           }else{
             $('.error_fund_release_'+third_form_array_counting[i]).text('');
             $('.error_fund_release_'+third_form_array_counting[i]).text('Please Enter a valid fund value.');
             $('.fund_release_'+third_form_array_counting[i]).focus();
             condition = false;
             break;
            }
        }
        if($('.utilised_fund_percentage_'+third_form_array_counting[i]).val() != null){
            let val = $('.utilised_fund_percentage_'+third_form_array_counting[i]).val();
            let regex = /^(\+|-)?(\d*\.?\d*)$/;
           if (regex.test(val)) {
                  $('.error_utilised_fund_percentage_'+third_form_array_counting[i]).text('');
           }else{
             $('.error_utilised_fund_percentage_'+third_form_array_counting[i]).text('');
             $('.error_utilised_fund_percentage_'+third_form_array_counting[i]).text('Please Enter a valid value.');
             $('.utilised_fund_percentage_'+third_form_array_counting[i]).focus();
             condition = false;
             break;
            }
         } 

    }
    
    if(condition){
        
        var formdata = new FormData($('.infra_manage_form_three')[0]);
       
$.ajax({
method: "POST",
url: baseurl+"/manage/infrastructure/store_financial_form",
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
            window.location.href = baseurl + "/manage/infrastructure/index/"+encode_temp_id+'/'+center_id;
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

