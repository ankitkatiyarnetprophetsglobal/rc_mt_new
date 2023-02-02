function getDisciplineHtml(data){
    let dis_html1='';
    for(let discipline in data){
      dis_html1 +=`<option value="${data[discipline].discipline_id}">${data[discipline].discipline}</option>`
    }
    return dis_html1;
  }

  $(document).on('change','.disciplin_grab',function(){
     var form = $(this).data('id');
     //console.log(data_dict.form2);
     ////console.log($(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val());
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
    //Fconsole.log(data_dict.form2);
  })

//form one
  $(document).on('click','.discpline_discountinued',function(){
      counting1++;
   form_first_html = `<tr  class="tr_discpline_discountinued_${counting1} " >
   <td>
    <select required class="form-select  form_1_discipline_${counting1} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting1}" name="form_1[${counting1}][dis_dis]"  aria-label="Default select example">
    <option disabled selected value="">Select </option>
    ${getDisciplineHtml(data_dict.form1)}
      </select>
      <input required type="hidden" name="form_1[${counting1}][created_for]" value="${c_id}" >
   </td>

   <td>
    <input required type="number" name="form_1[${counting1}][dis_dis_male]" class="form-control" required>
   </td>
   <td>
    <input required type="number" name="form_1[${counting1}][dis_dis_female]" class="form-control" required>
   </td>
   <td>
    <input required type="text" name="form_1[${counting1}][dis_dis_reason]" class="form-control" required>
   </td>
   <td>
    <a href="javascript:void(0)" class="actionbtn remove_btn_row_discpline_discountinued"   data-id="${counting1}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
   </td>
  </tr>`;
   $('.form_first_container').append(form_first_html);

   });


   $(document).on('click','.remove_btn_row_discpline_discountinued',function(){

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
    
      if((counting1*1) > 0){
        if(form_first_count > counting1 || form_first_count == counting1){
          $.ajax({
              method: "GET",
              url: baseurl + "/deletedataform3/"+$(this).data("db_id"),
              contentType: false,
              processData: false,
              success: function (response) {
                  if(response.success == false){
                    $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                    $('.message').addClass('d-none');
                    swal("Message",response.message, "error");
                    $('.error_message').removeClass('d-none');
                  }else{



                      $('.tr_discpline_discountinued_'+$(this).data("id")).remove();
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
         $('.tr_discpline_discountinued_'+$(this).data("id")).remove();
          swal("Message",'Record Deleted Successfully!!', "success")
     }
      counting1--;
      }else{
        alert('You cannot remove last row!');
      }



    });


   //form two
   $(document).on('click','.discpline_added_add',function(){

    counting2++;


    form_second_html = `<tr class="tr_added_discountinued_${counting2}" id="main_${counting2}" >
    <td>
    <select required class="form-select  form_2_discipline_${counting2} form_2_discipline disciplin_grab " data-id="form_2" data-counting_id="${counting2}" name="form_2[${counting2}][dis_added]"  aria-label="Default select example">
    <option disabled selected value="">Select </option>
    ${getDisciplineHtml(data_dict.form2)}
      </select>
      <input required type="hidden" name="form_2[${counting2}][created_for]" value="${c_id}" >
   </td>

    <td>
     <input required type="number" name="form_2[${counting2}][dis_added_male]" id="jsd_${counting2}" class="form-control" required>
    </td>
    <td>
     <input required type="number" name="form_2[${counting2}][dis_added_female]" id="jsd_${counting2}" class="form-control" required>
    </td>
    <td>
     <input required type="text" name="form_2[${counting2}][dis_added_reason]" id="jsd_${counting2}" class="form-control" required>
    </td>
    <td>
    <a href="javascript:void(0)" class="actionbtn remove_btn_row_discpline_add"  data-id="${counting2}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
  </td>
   </tr>`;
  $('.discpline_added_body').append(form_second_html);
  });


    $(document).on('click','.remove_btn_row_discpline_add',function(){

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
                  url: baseurl + "/deletedataform3two/"+$(this).data("db_id"),
                  contentType: false,
                  processData: false,
                  success: function (response) {
                      if(response.success == false){
                        $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                        $('.message').addClass('d-none');
                        swal("Message",response.message, "error");
                        $('.error_message').removeClass('d-none');
                      }else{



                          $('.tr_added_discountinued_'+$(this).data("id")).remove();
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
             $('.tr_added_discountinued_'+$(this).data("id")).remove();
              swal("Message",'Record Deleted Successfully!!', "success")
         }
          counting2--;
          }else{
            alert('You cannot remove last row!');
          }



        });



//form three
$(document).on('click','.discpline_add',function(){

    counting3++;
    form_second_html = `<tr class="row_Discipline_three_${counting3}" id="main_${counting3}" >


    <td>
    <select required class="form-select  form_3_discipline_${counting3} form_3_discipline disciplin_grab " data-id="form_3" data-counting_id="${counting3}" name="form_3[${counting3}][strength_discipline]"  aria-label="Default select example">
       <option disabled selected value="">Select </option>
         ${getDisciplineHtml(data_dict.form3)}
      </select>
      <input required type="hidden" name="form_3[${counting3}][created_for]" value="${c_id}" >
   </td>

                <td>
                <input required type="number" name="form_3[${counting3}][strength_current_m]" class="form-control" required>
                </td>
                <td>
                <input required type="number" name="form_3[${counting3}][strength_current_f]" class="form-control" required>
                </td>
                <td>
                <input required type="number" name="form_3[${counting3}][pro_sec_strnght_m]" class="form-control" required>
                </td>
                <td>
                <input required type="number" name="form_3[${counting3}][pro_sec_strnght_f]" class="form-control" required>
                </td>
                <td>
                <input required type="text" name="form_3[${counting3}][strength_discipline_reason]" class="form-control" required>
                </td>
                <td>
                <a href="javascript::void(0)" class="actionbtn remove_btn_row_discpline" data-id="${counting3}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
              </td>


   </tr>`;
  $('.form_three_container').append(form_second_html);
  });




  $(document).on('click','.remove_btn_row_discpline',function(){

    let discipline_id = $(`.form_3_discipline_${$(this).data("id")} option:selected`).val();
    let discipline = $(`.form_3_discipline_${$(this).data("id")} option:selected`).text();
    if(discipline != 'Select'){
      data_dict.form3[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};

      if($(`.form_3_discipline[value='${discipline_id}']`).length > 0){
        console.log("if");
    }else{
        console.log("else");

            $(`.form_3_discipline`).append($("<option></option>")
            .attr("value", discipline_id)
            .text(discipline));


    }
    }
      if((counting3*1) > 0){
        if(form_three_count  > counting3 || form_three_count  == counting3){
          $.ajax({
              method: "GET",
              url: baseurl + "/deletedataform3three/"+$(this).data("db_id"),
              contentType: false,
              processData: false,
              success: function (response) {
                  if(response.success == false){
                    $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                    $('.message').addClass('d-none');
                    swal("Message",response.message, "error");
                    $('.error_message').removeClass('d-none');
                  }else{



                      $('.row_Discipline_three_'+$(this).data("id")).remove();
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
         $('.row_Discipline_three_'+$(this).data("id")).remove();
          swal("Message",'Record Deleted Successfully!!', "success")
     }
      counting3--;
      }else{
        alert('You cannot remove last row!');
      }



    });




    //form four

    $(document).on('click','.row_Discipline_add',function(){

        counting4++;
        form_second_html = `<tr class="row_Discipline_four_${counting4}" id="main_${counting4}" >
        <td>
        <select required class="form-select  form_4_discipline_${counting4} form_4_discipline disciplin_grab " data-id="form_4" data-counting_id="${counting4}" name="form_4[${counting4}][discipline_coaches]"  aria-label="Default select example">
           <option disabled selected value="">Select </option>
             ${getDisciplineHtml(data_dict.form4)}
          </select>
          <input required type="hidden" name="form_4[${counting4}][created_for]" value="${c_id}" >
       </td>

                    <td>
                    <input required type="number" name="form_4[${counting4}][coaches_pre_male]" class="form-control" required>
                    </td>
                    <td>
                    <input required type="number"   name="form_4[${counting4}][coaches_pre_fmale]" class="form-control" required>
                    </td>
                    <td>
                    <input required type="number" name="form_4[${counting4}][coaches_req_male]" class="form-control" required>
                    </td>
                    <td>
                    <input required type="number"  name="form_4[${counting4}][coaches_req_fmale]" class="form-control" required>
                    </td>
                    <td>
                    <input required type="text" name="form_4[${counting4}][coaches_req_reason]" class="form-control" required>
                    </td>
                    <td>
                    <a href="javascript::void(0)" class="actionbtn remove_btn_row_coach" data-id="${counting4}" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
                  </td>


       </tr>`;
      $('.form_four_container').append(form_second_html);
      });



      $(document).on('click','.remove_btn_row_coach',function(){

        let discipline_id = $(`.form_4_discipline_${$(this).data("id")} option:selected`).val();
        let discipline = $(`.form_4_discipline_${$(this).data("id")} option:selected`).text();
        if(discipline != 'Select'){
          data_dict.form3[discipline_id]={"discipline_id":discipline_id,"discipline":discipline};

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
            if(form_four_count   > counting4|| form_four_count   == counting4){
              $.ajax({
                  method: "GET",
                  url: baseurl + "/deletedataform3four/"+$(this).data("db_id"),
                  contentType: false,
                  processData: false,
                  success: function (response) {
                      if(response.success == false){
                        $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                        $('.message').addClass('d-none');
                        swal("Message",response.message, "error");
                        $('.error_message').removeClass('d-none');
                      }else{



                          $('.row_Discipline_four_'+$(this).data("id")).remove();
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
             $('.row_Discipline_four_'+$(this).data("id")).remove();
              swal("Message",'Record Deleted Successfully!!', "success")
         }
          counting3--;
          }else{
            alert('You cannot remove last row!');
          }



        });
