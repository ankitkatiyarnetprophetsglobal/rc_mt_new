function getDisciplineHtml(data){
  let dis_html1='';
  for(let discipline in data){
    dis_html1 +=`<option value="${data[discipline].discipline_id}">${data[discipline].discipline}</option>`
  }
  return dis_html1;
}

// $(document).on('change','.disciplin_grab',function(){
//    var form = $(this).data('id');
//   //alert(form);
//   if(form == 'form_1'){
//     delete data_dict.form1[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_2'){
//     delete data_dict.form2[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_3'){
//     delete data_dict.form3[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_4'){
//     delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_5'){
//     delete data_dict.form5[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_6'){
//     delete data_dict.form6[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_7'){
//     delete data_dict.form7[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_8'){
//     delete data_dict.form8[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_9'){
//     delete data_dict.form9[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_10'){
//     delete data_dict.form10[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
//   if(form == 'form_12'){
//     delete data_dict.form12[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
//   }
  
// })



$(document).on('click','.senior_national_coaching_camp',function(){
    
    counting++; 
   form_first_html = `<tr class="senior_national_coaching_camp_${counting}">
    <td><select class="form-select form_1_discipline_${counting} form_1_discipline disciplin_grab" data-id = "form_1" data-counting_id="${counting}"   aria-label="Default select example" name="step_three[form_1][${counting}][discipline_id]" required>
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form1)}
      </select>
      <input type="hidden" name="step_three[form_1][${counting}][team_type]" value='common' class="form-control" required>
      <input type="hidden" name="step_three[form_1][${counting}][form_type]" value='senior_national_coaching_camp' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_1][${counting}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_1][${counting}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_senior_national_coaching_camp" data-id="${counting}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_first_container').append(form_first_html);
  
  });
$(document).on('click','.junior_national_coaching_camp',function(){
    
    counting2++; 

  
    form_second_html = `<tr class="junior_national_coaching_camp_${counting2}">
    <td><select class="form-select form_2_discipline_${counting2} form_2_discipline disciplin_grab" data-id = "form_2" data-counting_id="${counting2}"   aria-label="Default select example" name="step_three[form_2][${counting2}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form2)}
      </select>
      <input type="hidden" name="step_three[form_2][${counting2}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_2][${counting2}][form_type]" value='junior_national_coaching_camp' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_2][${counting2}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_junior_national_coaching_camp" data-id="${counting2}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_second_container').append(form_second_html);
  
  });
$(document).on('click','.under_tops',function(){
    
    counting3++; 

  
    form_three_html = `<tr class="under_tops_${counting3}">
    <td><select class="form-select form_3_discipline_${counting3} form_3_discipline disciplin_grab" data-id = "form_3" data-counting_id="${counting3}"   aria-label="Default select example" name="step_three[form_3][${counting3}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form3)}
      </select>
      <input type="hidden" name="step_three[form_3][${counting3}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_3][${counting3}][form_type]" value='under_tops' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_3][${counting3}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_under_tops" data-id="${counting3}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_three_container').append(form_three_html);
  
  });
$(document).on('click','.under_developmental_athlete',function(){
    
    counting4++; 

  
    form_four_html = `<tr class="under_developmental_athlete_${counting4}">
    <td><select class="form-select form_4_discipline_${counting4} form_4_discipline disciplin_grab" data-id = "form_4" data-counting_id="${counting4}"   aria-label="Default select example" name="step_three[form_4][${counting4}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form4)}
      </select>
      <input type="hidden" name="step_three[form_4][${counting4}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_4][${counting4}][form_type]" value='under_developmental_athlete' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_4][${counting4}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_under_developmental_athlete" data-id="${counting4}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_four_container').append(form_four_html);
  
  });
$(document).on('click','.under_ki',function(){
    
    counting5++; 

  
    form_five_html = `<tr class="under_ki_${counting5}">
    <td><select class="form-select form_5_discipline_${counting5} form_5_discipline disciplin_grab" data-id = "form_5" data-counting_id="${counting5}"   aria-label="Default select example" name="step_three[form_5][${counting5}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form5)}
      </select>
      <input type="hidden" name="step_three[form_5][${counting5}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_5][${counting5}][form_type]" value='under_ki' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_5][${counting5}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_under_ki" data-id="${counting5}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_five_container').append(form_five_html);
  
  });
$(document).on('click','.weeded_out',function(){
    
    counting6++; 

  
    form_six_html = `<tr class="weeded_out_${counting6}">
    <td><select class="form-select form_6_discipline_${counting6} form_6_discipline disciplin_grab" data-id = "form_6" data-counting_id="${counting6}" aria-label="Default select example" name="step_three[form_6][${counting6}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form6)}
      </select>
      <input type="hidden" name="step_three[form_6][${counting6}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_6][${counting6}][form_type]" value='weeded_out' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_6][${counting6}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_weeded_out" data-id="${counting6}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_six_container').append(form_six_html);
  
  });
$(document).on('click','.newly_inducted',function(){
    
    counting7++; 

  
    form_seven_html = `<tr class="newly_inducted_${counting7}">
    <td><select class="form-select form_7_discipline_${counting7} form_7_discipline disciplin_grab" data-id = "form_7" data-counting_id="${counting7}" aria-label="Default select example" name="step_three[form_7][${counting7}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form7)} 
      </select>
      <input type="hidden" name="step_three[form_7][${counting7}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_7][${counting7}][form_type]" value='newly_inducted' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_7][${counting7}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_newly_inducted" data-id="${counting7}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_seven_container').append(form_seven_html);
  
  });
$(document).on('click','.athletes_retained',function(){
    
    counting8++; 

  
    form_eight_html = `<tr class="athletes_retained_${counting8}">
    <td><select class="form-select form_8_discipline_${counting8} form_8_discipline disciplin_grab" data-id = "form_8" data-counting_id="${counting8}" aria-label="Default select example" name="step_three[form_8][${counting8}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form8)}
      </select>
      <input type="hidden" name="step_three[form_8][${counting8}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_8][${counting8}][form_type]" value='athletes_retained' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_8][${counting8}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_athletes_retained" data-id="${counting8}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_eight_container').append(form_eight_html);
  
  });
$(document).on('click','.employment_higher_studies',function(){
    
    counting9++; 

  
    form_nine_html = `<tr class="employment_higher_studies_${counting9}">
    <td><select class="form-select form_9_discipline_${counting9} form_9_discipline disciplin_grab" data-id = "form_9" data-counting_id="${counting9}" aria-label="Default select example" name="step_three[form_9][${counting9}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form9)}
      </select>
      <input type="hidden" name="step_three[form_9][${counting9}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_9][${counting9}][form_type]" value='employment_higher_studies' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_9][${counting9}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_employment_higher_studies" data-id="${counting9}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_nine_container').append(form_nine_html);
  
  });
$(document).on('click','.scheme_personal_reasons',function(){
    
    counting10++; 

  
    form_ten_html = `<tr class="scheme_personal_reasons_${counting10}">
    <td><select class="form-select form_10_discipline_${counting10} form_10_discipline disciplin_grab" data-id = "form_10" data-counting_id="${counting10}" aria-label="Default select example" name="step_three[form_10][${counting10}][discipline_id]" required>
        
    <option disabled selected value="">Select</option>
    ${getDisciplineHtml(data_dict.form10)}
      </select>
      <input type="hidden" name="step_three[form_10][${counting10}][team_type]" value='common' class="form-control" required>
     <input type="hidden" name="step_three[form_10][${counting10}][form_type]" value='scheme_personal_reasons' class="form-control" required>
      </td>
                                 <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][m_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][f_2018_19]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][m_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][f_2019_20]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][m_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][f_2020_21]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][m_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][f_2021_22]" class="form-control" required></td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][m_2022_23]" class="form-control" required> </td>
                                <td><input type="number"  min = "0" name="step_three[form_10][${counting10}][f_2022_23]" class="form-control" required></td>
    <td>
  <a href="javascript:void(0)" class="actionbtn remove_btn_row_scheme_personal_reasons" data-id="${counting10}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
  </tr>`;
  $('.form_ten_container').append(form_ten_html);
  
  });
$(document).on('click','.domicile',function(){
    
    counting11++; 

  
    form_11_html = `<tr class="domicile_${counting11}">
    <td><select class="form-select"  name="step_three[form_11][${counting11}][state_id]" aria-label="Default select example" required>
        <option disabled selected value="">Select</option>
        ${state_html}
        </select>
        <input type="hidden" name="step_three[form_11][${counting11}][team_type]" value='domicile' class="form-control" required>
        
        <input type="hidden" name="step_three[form_11][${counting11}][form_type]" value='domicile' class="form-control" required>

    </td>
    <td><select class="form-select form_11_discipline_${counting11} form_11_discipline disciplin_grab " data-id="form_11" data-counting_id="${counting11}"  name="step_three[form_11][${counting11}][discipline_id]" aria-label="Default select example" required>
        <option disabled selected value="">Select</option>
        ${getDisciplineHtml(data_dict.all)}
        </select>
        

    </td>
    <td><input type="number"  min = "0" name="step_three[form_11][${counting11}][no_of_male]"  class="form-control" required></td>
    <td><input type="number"  min = "0" name="step_three[form_11][${counting11}][no_of_female]"  class="form-control" required></td>
    

    <td>
        <a href="javascript::void(0)" class="actionbtn remove_btn_row_domicile" data-id="${counting11}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
</tr>`;
  $('.form_11_container').append(form_11_html);
  
});

$(document).on('click','.ncoe',function(){
    
  counting12++; 


  form_12_html = `     <tr class="ncoe_${counting12}">
                                
  <td><select class="form-select form_12_discipline_${counting12} form_12_discipline disciplin_grab " data-id="form_12" data-counting_id="${counting12}"  name="step_three[form_12][${counting12}][discipline_id]" aria-label="Default select example" required>
  <option disabled selected value="">Select</option>
  ${getDisciplineHtml(data_dict.form12)}
      </select>
      

  </td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][kia_male]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][kia_female]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][stc_male]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][stc_female]" class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][state_ac_male]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][state_ac_female]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][pvt_ac_male]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][pvt_ac_female]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][open_trials_male]" class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][open_trials_female]"  class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][play_scheme_male]" class="form-control" required></td>
  <td><input type="number"  min = "0" name="step_three[form_12][${counting12}][play_scheme_female]"  class="form-control" required></td>

  

  <td>
      <a href="javascript::void(0)" class="actionbtn remove_btn_row_ncoe" data-id="${counting12}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
</tr>`;
$('.form_12_container').append(form_12_html);

});



  
  
  $(document).on('click','.remove_btn_row_senior_national_coaching_camp',function(){
    // let discipline_id = $(`.form_1_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_1_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form1[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_1_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_1_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // }
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
                    $('.senior_national_coaching_camp_'+$(this).data("id")).remove();
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
        $('.senior_national_coaching_camp_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
    counting--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_junior_national_coaching_camp',function(){
    // let discipline_id = $(`.form_2_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_2_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form2[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_2_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_2_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // }
    if((counting2*1) > 0){
      if(form_second_count > counting2 || form_second_count == counting2){
       
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
                    $('.junior_national_coaching_camp_'+$(this).data("id")).remove();
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
        $('.junior_national_coaching_camp_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
    counting2--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_under_tops',function(){
    // let discipline_id = $(`.form_3_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_3_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form3[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_3_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_3_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // } 
    if((counting3*1) > 0){
      if(form_three_count > counting3 || form_three_count == counting3){
       
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
                    $('.under_tops_'+$(this).data("id")).remove();
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
        $('.under_tops_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
    counting3--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_under_developmental_athlete',function(){
    // let discipline_id = $(`.form_4_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_4_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form4[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_4_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_4_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // } 
    if((counting4*1) > 0){
      if(form_four_count > counting4 || form_four_count == counting4){
       
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
                    $('.under_developmental_athlete_'+$(this).data("id")).remove();
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
        $('.under_developmental_athlete_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting4--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_under_ki',function(){
    // let discipline_id = $(`.form_5_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_5_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form5[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_5_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_5_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // }
    if((counting5*1) > 0){
      if(form_five_count > counting5 || form_five_count == counting5){
       
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
                    $('.under_ki_'+$(this).data("id")).remove();
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
        $('.under_ki_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting5--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_weeded_out',function(){
    // let discipline_id = $(`.form_6_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_6_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form6[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_6_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_6_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // }
    if((counting6*1) > 0){
      if(form_six_count > counting6 || form_six_count == counting6){
       
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
                    $('.weeded_out_'+$(this).data("id")).remove();
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
        $('.weeded_out_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting6--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_newly_inducted',function(){
    // let discipline_id = $(`.form_7_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_7_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form7[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_7_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_7_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // } 
    if((counting7*1) > 0){
      if(form_seven_count > counting7 || form_seven_count == counting7){
       
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
                    $('.newly_inducted_'+$(this).data("id")).remove();
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
        $('.newly_inducted_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting7--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_athletes_retained',function(){
    // let discipline_id = $(`.form_8_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_8_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form8[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_8_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_8_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // }
    if((counting8*1) > 0){
      if(form_eight_count > counting8 || form_eight_count == counting8){
       
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
                    $('.athletes_retained_'+$(this).data("id")).remove();
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
        $('.athletes_retained_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting8--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_employment_higher_studies',function(){
    // let discipline_id = $(`.form_9_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_9_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form9[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_9_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_9_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // }
    if((counting9*1) > 0){
      if(form_nine_count > counting9 || form_nine_count == counting9){
       
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
                    $('.employment_higher_studies_'+$(this).data("id")).remove();
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
        $('.employment_higher_studies_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting9--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_scheme_personal_reasons',function(){
    // let discipline_id = $(`.form_10_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_10_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form10[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_10_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_10_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // } 
    if((counting10*1) > 0){
      if(form_ten_count > counting10 || form_ten_count == counting10){
       
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
                    $('.scheme_personal_reasons_'+$(this).data("id")).remove();
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
        $('.scheme_personal_reasons_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting10--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });
  $(document).on('click','.remove_btn_row_domicile',function(){
    // let discipline_id = $(`.form_11_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_11_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form11[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_11_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_11_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // } 
    if((counting11*1) > 0){
      if(form_11_count > counting10 || form_11_count == counting11){
       
        $.ajax({
            method: "GET",
            url: baseurl + "/review/domicile/delete-data/"+$(this).data("db_id"),
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success == false){
                  $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                  $('.message').addClass('d-none');
                  swal("Message",response.message, "error");
                  $('.error_message').removeClass('d-none');
                }else{
                    $('.domicile_'+$(this).data("id")).remove();
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
        $('.domicile_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting11--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });



  $(document).on('click','.remove_btn_row_ncoe',function(){
    
    // let discipline_id = $(`.form_12_discipline_${$(this).data("id")} option:selected`).val();
    // let discipline = $(`.form_12_discipline_${$(this).data("id")} option:selected`).text();
    // if(discipline != 'Select'){
    //   data_dict.form12[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};
     
    //   if($(`.form_12_discipline[value='${discipline_id}']`).length > 0){
    //     console.log("if");
    // }else{
    //     console.log("else");
        
    //         $(`.form_12_discipline`).append($("<option></option>")
    //         .attr("value", discipline_id)
    //         .text(discipline));
       
       
    // }
    // } 
    if((counting12*1) > 0){
      if(form_12_count > counting12 || form_12_count == counting12){
       
        $.ajax({
            method: "GET",
            url: baseurl + "/review/ncoe-athletes/delete-data/"+$(this).data("db_id"),
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success == false){
                  $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                  $('.message').addClass('d-none');
                  swal("Message",response.message, "error");
                  $('.error_message').removeClass('d-none');
                }else{
                    $('.ncoe_'+$(this).data("id")).remove();
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
        $('.ncoe_'+$(this).data("id")).remove();
        swal("Message",'Record Deleted Successfully!!', "success")
   }
   counting12--;
    }else{
      alert('You cannot remove last row!'); 
    }
  
  
     
  });

 