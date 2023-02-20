function getDisciplineHtml(data){
  let dis_html1='';
  for(let discipline in data){
    dis_html1 +=`<option value="${data[discipline].discipline_id}">${data[discipline].discipline}</option>`
  }
  return dis_html1;
}

$(document).on('change','.disciplin_grab',function(){
   var form = $(this).data('id');
  // $(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val();
  if(form == 'form_1'){
    delete data_dict.form1[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_2'){
    delete data_dict.form2[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_3'){
    delete data_dict.form3[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_4'){
    delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_5'){
    delete data_dict.form5[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_6'){
    delete data_dict.form6[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_7'){
    delete data_dict.form7[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  if(form == 'form_8'){
    delete data_dict.form8[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
  }
  
})






$(document).on('click','.medal_won_step_two',function(){
    
  counting++; 
 var inner_html = '';

// console.log(inner_html)

  form_first_html = `<tr class="row_medals_won_${counting}">
  <td><select class="form-select form_1_discipline_${counting} form_1_discipline disciplin_grab" data-id = "form_1" data-counting_id="${counting}"  aria-label="Default select example" name="step_two[form_1][${counting}][discipline_id]" required>
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form1)}
    </select>
    <input type="hidden" name="step_two[form_1][${counting}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_1][${counting}][category]" value = 'category-1' class="form-control" required>
    <input type="hidden" name="step_two[form_1][${counting}][form_type]" value = 'medals_won' class="form-control" required>
    </td>
                               <td><input type="number"  min = "0" name="step_two[form_1][${counting}][m_2018_19]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][f_2018_19]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][m_2019_20]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][f_2019_20]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][m_2020_21]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][f_2020_21]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][m_2021_22]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][f_2021_22]" class="form-control" required></td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][m_2022_23]" class="form-control" required> </td>
                              <td><input type="number"  min = "0" name="step_two[form_1][${counting}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_medals_won_cat_1" data-id="${counting}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_first_container').append(form_first_html);

});
$(document).on('click','.medal_won_category_2',function(){
  
  counting2++; 
form_second_html = `<tr class="row_medals_won_category_2_${counting2}">
  <td><select class="form-select form_2_discipline_${counting2} form_2_discipline disciplin_grab" data-id = "form_2" data-counting_id="${counting2}"  aria-label="Default select example" name="step_two[form_2][${counting2}][discipline_id]" required>
      
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form2)}
    </select>
    <input type="hidden" name="step_two[form_2][${counting2}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_2][${counting2}][category]" value = 'category-2' class="form-control" required>
    <input type="hidden" name="step_two[form_2][${counting2}][form_type]" value = 'medals_won' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_2][${counting2}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_medals_won_cat_2" data-id2="${counting2}" data-db_id2=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_second_container').append(form_second_html);

});
$(document).on('click','.medal_won_category_3',function(){
  
  counting3++; 


  form_second_html = `<tr class="row_medals_won_category_3_${counting3}">
  <td><select class="form-select form_3_discipline_${counting3} form_3_discipline disciplin_grab" data-id = "form_3" data-counting_id="${counting3}"  aria-label="Default select example" name="step_two[form_3][${counting3}][discipline_id]" required>
     
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form3)}
    </select>
    <input type="hidden" name="step_two[form_3][${counting3}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_3][${counting3}][category]" value = 'category-3' class="form-control" required>
    <input type="hidden" name="step_two[form_3][${counting3}][form_type]" value = 'medals_won' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_3][${counting3}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_medals_won_cat_3" data-id3="${counting3}" data-db_id3=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_three_container').append(form_second_html);

});
$(document).on('click','.participation_category_1',function(){
  
  counting4++; 

form_four_html = `<tr class="row_participation_cat_1_${counting4}">
  <td><select class="form-select form_4_discipline_${counting4} form_4_discipline disciplin_grab" data-id = "form_4" data-counting_id="${counting4}"  aria-label="Default select example" name="step_two[form_4][${counting4}][discipline_id]" required>
     
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form4)}
    </select>
    <input type="hidden" name="step_two[form_4][${counting4}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_4][${counting4}][category]" value = 'category-1' class="form-control" required>
    <input type="hidden" name="step_two[form_4][${counting4}][form_type]" value = 'participation' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_4][${counting4}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_participation_cat_1" data-id4="${counting4}" data-db_id4=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_four_container').append(form_four_html);

});
$(document).on('click','.participation_category_2',function(){
  
  counting5++; 
  
  form_five_html = `<tr class="row_participation_cat_2_${counting5}">
  <td><select class="form-select form_5_discipline_${counting5} form_5_discipline disciplin_grab" data-id = "form_5" data-counting_id="${counting5}"  aria-label="Default select example" name="step_two[form_5][${counting5}][discipline_id]" required>
     
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form5)}
    </select>
    <input type="hidden" name="step_two[form_5][${counting5}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_5][${counting5}][category]" value = 'category-2' class="form-control" required>
    <input type="hidden" name="step_two[form_5][${counting5}][form_type]" value = 'participation' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_5][${counting5}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_participation_cat_2" data-id5="${counting5}" data-db_id5=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_five_container').append(form_five_html);

});
$(document).on('click','.participation_category_3',function(){
  
  counting6++; 
  
  form_six_html = `<tr class="row_participation_cat_3_${counting6}">
  <td><select class="form-select form_6_discipline_${counting6} form_6_discipline disciplin_grab" data-id = "form_6" data-counting_id="${counting6}"  aria-label="Default select example" name="step_two[form_6][${counting6}][discipline_id]" required>
     
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form6)}
    </select>
    <input type="hidden" name="step_two[form_6][${counting6}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_6][${counting6}][category]" value = 'category-3' class="form-control" required>
    <input type="hidden" name="step_two[form_6][${counting6}][form_type]" value = 'participation' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_6][${counting6}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_participation_cat_3" data-id6="${counting6}" data-db_id6=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_six_container').append(form_six_html);

});
$(document).on('click','.medal_won_national',function(){
  
  counting7++; 
  
  form_seven_html = `<tr class="row_medal_won_national_${counting7}">
  <td><select class="form-select form_7_discipline_${counting7} form_7_discipline disciplin_grab" data-id = "form_7" data-counting_id="${counting7}"  aria-label="Default select example" name="step_two[form_7][${counting7}][discipline_id]" required>
     
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form7)}
    </select>
    <input type="hidden" name="step_two[form_7][${counting7}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_7][${counting7}][level]" value = 'national' class="form-control" required>
    <input type="hidden" name="step_two[form_7][${counting7}][form_type]" value = 'medals_won' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_7][${counting7}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_medal_won_national" data-id7="${counting7}" data-db_id7=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_seven_container').append(form_seven_html);

});
$(document).on('click','.participation_national',function(){
  
  counting8++; 
  
  form_eight_html = `<tr class="row_participation_national_${counting8}">
  <td><select class="form-select form_8_discipline_${counting8} form_8_discipline disciplin_grab" data-id = "form_8" data-counting_id="${counting8}"  aria-label="Default select example" name="step_two[form_8][${counting8}][discipline_id]" required>
     
  <option disabled selected value="">Select </option>
  ${getDisciplineHtml(data_dict.form8)}
    </select>
    <input type="hidden" name="step_two[form_8][${counting8}][team_type]" value='team' class="form-control" required>
    <input type="hidden" name="step_two[form_8][${counting8}][level]" value = 'national' class="form-control" required>
    <input type="hidden" name="step_two[form_8][${counting8}][form_type]" value = 'participation' class="form-control" required>
    </td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][m_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][f_2018_19]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][m_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][f_2019_20]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][m_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][f_2020_21]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][m_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][f_2021_22]" class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][m_2022_23]" class="form-control" required> </td>
    <td><input type="number"  min = "0" name="step_two[form_8][${counting8}][f_2022_23]" class="form-control" required></td>
  <td>
<a href="javascript:void(0)" class="actionbtn remove_btn_row_participation_national" data-id8="${counting8}" data-db_id8=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_eight_container').append(form_eight_html);

});



$(document).on('click','.remove_btn_row_medals_won_cat_1',function(){
  let discipline_id = $(`.form_1_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_1_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form1[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_1_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_1_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  } 
  if((counting*1) > 0){
    if(form_first_count > counting || form_first_count == counting){
     
      $.ajax({
          method: "GET",
          url: baseurl + "/review/delete-data/"+$(this).data("db_id"),
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.message').addClass('d-none');
                swal("Message",response.message, "error");
                $('.error_message').removeClass('d-none');
              }else{
                  $('.row_medals_won_'+$(this).data("id")).remove();
                  $('.error_message').addClass('d-none');
                  $('.message').html(`<strong>Success!</strong> ${response.message}`);
                  $('.message').removeClass('d-none');
                  swal("Message",response.message, "success")
                 .then(() => {
                  window.location.href = url;
                   });
              }
          }
  
        });
  }else{
      $('.row_medals_won_'+$(this).data("id")).remove();
      swal("Message",'Record Deleted Successfully!!', "success")
 }
  counting--;
  }else{
    alert('You cannot remove last row!'); 
  }


   
});
$(document).on('click','.remove_btn_row_medals_won_cat_2',function(){
  let discipline_id = $(`.form_2_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_2_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form2[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_2_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_2_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }  
if((counting2*1) > 0){
  if(form_second_count > counting2 || form_second_count == counting2){
     
    $.ajax({
        method: "GET",
        url: baseurl + "/review/delete-data/"+$(this).data("db_id2"),
        contentType: false,
        processData: false,
        success: function (response) {
            if(response.success == false){
              $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
              $('.message').addClass('d-none');
              swal("Message",response.message, "error");
              $('.error_message').removeClass('d-none');
            }else{
                $('.row_medals_won_category_2_'+$(this).data("id")).remove();
                $('.error_message').addClass('d-none');
                $('.message').html(`<strong>Success!</strong> ${response.message}`);
                $('.message').removeClass('d-none');
                swal("Message",response.message, "success")
               .then(() => {
                window.location.href = url;
                 });
            }
        }

      });
}else{
    $('.row_medals_won_category_2_'+$(this).data("id2")).remove();
    swal("Message",'Record Deleted Successfully!!', "success")
}
counting2--;
}else{
  alert('You cannot remove last row!'); 
}


   
});
$(document).on('click','.remove_btn_row_medals_won_cat_3',function(){
  let discipline_id = $(`.form_3_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_3_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form3[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_3_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_1_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }
   
if((counting3*1) > 0){
if(form_three_count > counting3 || form_three_count == counting3){
     
  $.ajax({
      method: "GET",
      url: baseurl + "/review/delete-data/"+$(this).data("db_id3"),
      contentType: false,
      processData: false,
      success: function (response) {
          if(response.success == false){
            $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
            $('.message').addClass('d-none');
            swal("Message",response.message, "error");
            $('.error_message').removeClass('d-none');
          }else{
              $('.row_medals_won_category_3_'+$(this).data("id")).remove();
              $('.error_message').addClass('d-none');
              $('.message').html(`<strong>Success!</strong> ${response.message}`);
              $('.message').removeClass('d-none');
              swal("Message",response.message, "success")
             .then(() => {
              window.location.href = url;
               });
          }
      }

    });
}else{
  $('.row_medals_won_category_3_'+$(this).data("id3")).remove();
  swal("Message",'Record Deleted Successfully!!', "success")
}
counting3--;
}else{
alert('You cannot remove last row!');
}

   
});
$(document).on('click','.remove_btn_row_participation_cat_1',function(){
  let discipline_id = $(`.form_4_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_4_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form4[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_4_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_4_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }
   if((counting4*1) > 0){
    if(form_four_count > counting4 || form_four_count == counting4){
     
      $.ajax({
          method: "GET",
          url: baseurl + "/review/delete-data/"+$(this).data("db_id4"),
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.message').addClass('d-none');
                swal("Message",response.message, "error");
                $('.error_message').removeClass('d-none');
              }else{
                  $('.row_participation_cat_1_'+$(this).data("id")).remove();
                  $('.error_message').addClass('d-none');
                  $('.message').html(`<strong>Success!</strong> ${response.message}`);
                  $('.message').removeClass('d-none');
                  swal("Message",response.message, "success")
                 .then(() => {
                  window.location.href = url;
                   });
              }
          }
  
        });
  }else{
      $('.row_participation_cat_1_'+$(this).data("id4")).remove();
      swal("Message",'Record Deleted Successfully!!', "success")
 }
  counting4--;
   }else{
    alert('You cannot remove last row!');
   }
   

   
});
$(document).on('click','.remove_btn_row_participation_cat_2',function(){
  let discipline_id = $(`.form_5_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_5_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form5[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_5_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_5_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }
   if((counting5*1) > 0){
    if(form_five_count > counting5 || form_five_count == counting5){
     
      $.ajax({
          method: "GET",
          url: baseurl + "/review/delete-data/"+$(this).data("db_id5"),
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.message').addClass('d-none');
                swal("Message",response.message, "error");
                $('.error_message').removeClass('d-none');
              }else{
                  $('.row_participation_cat_2_'+$(this).data("id6")).remove();
                  $('.error_message').addClass('d-none');
                  $('.message').html(`<strong>Success!</strong> ${response.message}`);
                  $('.message').removeClass('d-none');
                  swal("Message",response.message, "success")
                 .then(() => {
                  window.location.href = url;
                   });
              }
          }
  
        });
  }else{
      $('.row_participation_cat_2_'+$(this).data("id5")).remove();
      swal("Message",'Record Deleted Successfully!!', "success")
 }
 counting5--;
   }else{
    alert('You cannot remove last row!');
   }


   
});
$(document).on('click','.remove_btn_row_participation_cat_3',function(){
  let discipline_id = $(`.form_6_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_6_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form6[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_6_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_6_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }
   if((counting6*1) > 0){
    if(form_six_count > counting6 || form_five_count == counting6){
     
      $.ajax({
          method: "GET",
          url: baseurl + "/review/delete-data/"+$(this).data("db_id6"),
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.message').addClass('d-none');
                swal("Message",response.message, "error");
                $('.error_message').removeClass('d-none');
              }else{
                  $('.row_participation_cat_3_'+$(this).data("id6")).remove();
                  $('.error_message').addClass('d-none');
                  $('.message').html(`<strong>Success!</strong> ${response.message}`);
                  $('.message').removeClass('d-none');
                  swal("Message",response.message, "success")
                 .then(() => {
                  window.location.href = url;
                   });
              }
          }
  
        });
  }else{
      $('.row_participation_cat_3_'+$(this).data("id6")).remove();
      swal("Message",'Record Deleted Successfully!!', "success")
 }
 counting6--;
   }else{
    alert('You cannot remove last row!');
   }


   
});
$(document).on('click','.remove_btn_row_medal_won_national',function(){
  let discipline_id = $(`.form_7_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_7_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form7[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_7_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_7_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }
   if((counting7*1) > 0){
    if(form_seven_count > counting7 || form_seven_count == counting7){
     
      $.ajax({
          method: "GET",
          url: baseurl + "/review/delete-data/"+$(this).data("db_id7"),
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.message').addClass('d-none');
                swal("Message",response.message, "error");
                $('.error_message').removeClass('d-none');
              }else{
                  $('.row_medal_won_national_'+$(this).data("id7")).remove();
                  $('.error_message').addClass('d-none');
                  $('.message').html(`<strong>Success!</strong> ${response.message}`);
                  $('.message').removeClass('d-none');
                  swal("Message",response.message, "success")
                 .then(() => {
                  window.location.href = url;
                   });
              }
          }
  
        });
  }else{
      $('.row_medal_won_national_'+$(this).data("id7")).remove();
      swal("Message",'Record Deleted Successfully!!', "success")
 }
 counting7--;
   }else{
    alert('You cannot remove last row!');
   }


   
});
$(document).on('click','.remove_btn_row_participation_national',function(){
  let discipline_id = $(`.form_8_discipline_${$(this).data("id")} option:selected`).val();
  let discipline = $(`.form_8_discipline_${$(this).data("id")} option:selected`).text();
  if(discipline != 'Select'){
    data_dict.form8[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
   
    if($(`.form_8_discipline[value='${discipline_id}']`).length > 0){
      console.log("if");
  }else{
      console.log("else");
      
          $(`.form_8_discipline`).append($("<option></option>")
          .attr("value", discipline_id)
          .text(discipline));
     
     
  }
  }
   if((counting8*1) > 0){
    if(form_eight_count > counting8 || form_eight_count == counting8){
     
      $.ajax({
          method: "GET",
          url: baseurl + "/review/delete-data/"+$(this).data("db_id8"),
          contentType: false,
          processData: false,
          success: function (response) {
              if(response.success == false){
                $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                $('.message').addClass('d-none');
                swal("Message",response.message, "error");
                $('.error_message').removeClass('d-none');
              }else{
                  $('.row_medal_won_national_'+$(this).data("id8")).remove();
                  $('.error_message').addClass('d-none');
                  $('.message').html(`<strong>Success!</strong> ${response.message}`);
                  $('.message').removeClass('d-none');
                  swal("Message",response.message, "success")
                 .then(() => {
                  window.location.href = url;
                   });
              }
          }
  
        });
  }else{
      $('.row_participation_national_'+$(this).data("id8")).remove();
      swal("Message",'Record Deleted Successfully!!', "success")
 }
 counting8--;
   }else{
    alert('You cannot remove last row!');
   }


   
});
