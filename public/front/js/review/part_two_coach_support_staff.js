//code for displine on change value 

function getDisciplineHtml(data){
    let dis_html1='';
    for(let discipline in data){
      dis_html1 +=`<option value="${data[discipline].discipline_id}">${data[discipline].discipline}</option>`
    }
    return dis_html1;
  }

  $(document).on('change','.disciplin_grab',function(){
    
    var form = $(this).data('id');
    // console.log(data_dict.form1);
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
   if(form == 'form_5'){
     delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
   }
   if(form == 'form_6'){
     delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
   }
   if(form == 'form_7'){
     delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
   }
   if(form == 'form_8'){
     delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
   }
   if(form == 'form_9'){
     delete data_dict.form4[$(`.${$(this).data('id')}_discipline_${$(this).data("counting_id")} option:selected`).val()];
   }
   //Fconsole.log(data_dict.form2);
 })

$(document).on('click','.add_more_two_part_two_coach_support_staff',function(){

    counting_2++;
    second_form_array_counting.push(counting_2);
    let center_id = $('.center_id').val();
    var two_part_two_coach_support_staff_html = `<tr class="row_${counting_2}">
            <td>
                <input type="hidden" class="center_id" name="coach_support_staff_form[0][center_id]" value="${center_id}">
                <input type="hidden" name="coach_support_staff_form[${counting_2}][id]" value="">
                2022-23
                <input type="hidden" class="form-control" value="2022-23" name='coach_support_staff_form[${counting_2}][coach_support_staff_year]'>
            </td>
            <td>
                <input type="text" class="form-control" name='coach_support_staff_form[${counting_2}][coach_support_staff_name_designation]'>
            </td>
            <td>
                <input type="text" class="form-control" name='coach_support_staff_form[${counting_2}][coach_support_staff_period_tour]'>
            </td>
            <td>
                <input type="text" class="form-control" name='coach_support_staff_form[${counting_2}][coach_support_staff_Remarks]'>
            </td>
            <td>
                <a href="javascript:void(0)" class="actionbtn remove_coach_support_staff_form" data-id2="${counting_2}">
                    <i class="fa-solid fa-trash-can">
                    </i>
                </a>
            </td>
        </tr>`;
    $('#two_part_two_coach_support_staff').append(two_part_two_coach_support_staff_html);
});

//Shubham code starts here   ----  Play of Field 

$(document).on('click','.part_two_field_of_play_add',function(){

    // counting_play_field++;
    counting_11++
    elven_form_array_counting.push(counting_11);
    let center_id = $('.center_id').val();
    var two_part_two_play_field_html = `<tr class="row_${counting_11}">
            <td>
                <input type="hidden" class="center_id" name="part_two_play_field[0][center_id]" value="${center_id}">
                <input type="hidden" name="part_two_play_field[${counting_11}][id]" value="">                
                <select required class="form-select  form_1_discipline_${counting_11} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_play_field}" name="part_two_play_field[${counting_play_field}][discline_play_field]"  aria-label="Default select example">
                <option disabled selected value="">Select </option>
                ${getDisciplineHtml(data_dict.form1)}
                  </select>
            </td>
            <td><input type="text" class="form-control" name='part_two_play_field[${counting_11}][no_fop_play_field]' ></td>
            <td>
            <select class="form-select" aria-label="Default select example" name='part_two_play_field[${counting_11}][fop_play_field]'>                
                <option value="1">Indoor</option>
                <option value="2">Outdoor</option>                
            </select>
            </td>
            <td>
                <select class="form-select"  name='part_two_play_field[${counting_11}][fop_surface_play_field]'  aria-label="Default select example">
                <option selected>Select</option>
               <option value="1">Synthetic</option>
               <option value="2">Wooden</option>
               <option value="3">Grass</option>
               <option value="4">Cement</option>
               <option value="5">Cinder</option>
               <option value="6">Clay</option>
               <option value="7">Natural</option>
               <option value="8">Artificial Turf</option>
               <option value="9">Others</option>
              </select>




            </td>
            <td>
                
                <select class="form-select"  name='part_two_play_field[${counting_11}][rating_play_field]'  aria-label="Default select example">
                                     <option selected>Select</option>
                                    <option value="1">Excellent</option>
                                    <option value="2">Very Good</option>
                                    <option value="3">Good</option>
                                    <option value="4">Average</option>
                                    <option value="5">Poor</option>
                                   </select>
            </td>
            <td>
                <input type="text" class="form-control" name='part_two_play_field[${counting_11}][remark_play_field]'>
            </td>
            <td>
                <a href="javascript:void(0)" class="actionbtn remove_two_play_field_remove" data-id11="${counting_11}">
                    <i class="fa-solid fa-trash-can">
                    </i>
                </a>
            </td>
        </tr>`;
    $('#two_part_two_play_field_body').append(two_part_two_play_field_html);
});

$(document).on('click','.remove_two_play_field_remove',function(){

    var center_id = $('.center_id').val();
    var data_enc = $(this).data('id_enc');
    // console.log("center_id",center_id);
    // return false;
    // alert($(this).data("db_id11"));
    if($(this).data("db_id11") != undefined){

        $.ajax({
        method: "GET",
        url: baseurl + "/review/playfieldById/"+$(this).data("db_id11"),
        contentType: false,
        processData: false,

        success: function (response) {

            if(response.success == false){
                $('.row_'+$(this).data("id11")).remove();
                // swal("Message",response.message, "error");
                // $('.error_message').removeClass('d-none');
            }else{

                $('.row_'+$(this).data("id11")).remove();
                $('.error_message').addClass('d-none');
                $('.message').html(`<strong>Success!</strong> ${response.message}`);
                $('.message').removeClass('d-none');
// alert("center_id",center_id);
                swal("Message",response.message, "success").then(() => {

                    window.location.href = baseurl + "/review/part-two/"+data_enc;

                });
            }
        }
    });

}
else{

    $('.row_'+$(this).data("id11")).remove();

}

counting_11--;
});





















// Shubham Code ends here  

// remove button
$(document).on('click','.remove_coach_support_staff_form',function(){

        let center_id = $('.center_id').val();

        console.log("center_id",center_id);
        // return false;

        if($(this).data("db_id2") != undefined){

            $.ajax({
            method: "GET",
            url: baseurl + "/review/coachsupportstaffById/"+$(this).data("db_id2"),
            contentType: false,
            processData: false,

            success: function (response) {

                if(response.success == false){

                    $('.row_'+$(this).data("id2")).remove();
                    // swal("Message",response.message, "error");
                    // $('.error_message').removeClass('d-none');
                }else{

                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                        window.location.href = baseurl + "/review/part-two/"+center_id;

                    });
                }
            }
        });

    }
    else{

        $('.row_'+$(this).data("id2")).remove();

    }

    counting_2--;
});

// add form
$('.form_coach_support_staff_submit').on('submit',function(e){
    e.preventDefault();
    // alert('1211212');
    // return false;

        let condition = true;

        let center_id = $('.center_id').val();
        // console.log("formdata",formdata);
        // return false;

    // for(let i=0;i< first_form_array_counting.length; i++){

    //     if($('.two_part_two_athletes_athletes_no_athletes_participated_'+first_form_array_counting[i]).val()  == '' || $('.two_part_two_athletes_athletes_no_athletes_participated_'+first_form_array_counting[i]).val()  == null){

    //         // $('.error_two_part_two_athletes_athletes_no_athletes_participated_'+first_form_array_counting[i]).text('Please enter name of the employee');
    //         $('.two_part_two_athletes_athletes_no_athletes_participated_'+first_form_array_counting[i]).focus();
    //         condition = false;
    //         break;

    //     }else{

    //         $('.error_two_part_two_athletes_athletes_no_athletes_participated_'+first_form_array_counting[i]).text('');
    //     }



    // }

    if(condition){

        var formdata = new FormData($('.form_coach_support_staff_submit')[0]);
        console.log("formdata",formdata);
        // return false;
        $.ajax({
            method: "POST",
            url: baseurl + "/review/coachsupportstaff",
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

                            window.location.href = baseurl + "/review/part-two/"+center_id;

                        });
                }
            }
        });
    }
})


$(document).on('click','.add_more_two_part_two_athletes',function(){

    counting_1++;
    first_form_array_counting.push(counting_1);
    let center_id = $('.center_id').val();
    var two_part_two_athletes_html = `<tr class="row_${counting_1}">
            <td>
                2022-23
                <input type="hidden" class="center_id" name="two_part_two_athletes[${counting_1}][center_id]" value="${center_id}">
                <input type="hidden" class="form-control" value="2022-23" name='two_part_two_athletes[${counting_1}][athletes_year]'>
                <input type="hidden" name="two_part_two_athletes[${counting_1}][id]" value="">
            </td>
            <td>
            <select required class="form-select  form_1_discipline_${counting_1} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_play_field}" name="two_part_two_athletes[${counting_play_field}][athletes_discipline]"  aria-label="Default select example">
               
                ${getDisciplineHtml(data_dict.form1)}
                  </select>
            </td>
            <td>
                <input type="text" class="form-control" name='two_part_two_athletes[${counting_1}][athletes_no_athletes_participated]'>
            </td>
            <td>
                <input type="text" class="form-control" name='two_part_two_athletes[${counting_1}][athletes_no_expenditure_incurred]'>
            </td>
            <td>
                <input type="text" class="form-control" name='two_part_two_athletes[${counting_1}][athletes_no_achievements]'>
            </td>
            <td>
                <input type="text" class="form-control" name='two_part_two_athletes[${counting_1}][athletes_no_remarks]'>
            </td>
            <td>
                <a href="javascript:void(0)" class="actionbtn remove_two_part_two_athletes" data-id2="${counting_1}">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>`;
    $('#two_part_two_athletes_container').append(two_part_two_athletes_html);
});

// remove button
$(document).on('click','.remove_two_part_two_athletes',function(){

        let center_id = $('.center_id').val();

        console.log("center_id",center_id);
        // return false;

        if($(this).data("db_id2") != undefined){

            $.ajax({
            method: "GET",
            url: baseurl + "/review/parttwoathletesById/"+$(this).data("db_id2"),
            contentType: false,
            processData: false,

            success: function (response) {

                if(response.success == false){

                    $('.row_'+$(this).data("id2")).remove();
                    // swal("Message",response.message, "error");
                    // $('.error_message').removeClass('d-none');
                }else{

                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                        window.location.href = baseurl + "/review/part-two/"+center_id;

                    });
                }
            }
        });

    }
    else{

        $('.row_'+$(this).data("id2")).remove();

    }

    counting_2--;
});



$(document).on('change','.center_change',function(){

    let center_id = $('.center_id').val();
    window.location.href = baseurl + "/manage/miscellaneous/index/"+center_id;

})


$(document).on('click','.add_more_two_part_residential_coaches',function(){

    counting_3++;
    three_form_array_counting.push(counting_3);
    let center_id = $('.center_id').val();
    var two_part_residential_coaches_html = `<tr class="row_${counting_3}">
            <td>
                <input type="hidden" class="center_id" name="two_part_residential_coaches[0][center_id]" value="${center_id}">
                <select required class="form-select  form_1_discipline_${counting_3} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_3}" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_discipline_id]"  aria-label="Default select example">
                ${getDisciplineHtml(data_dict.form1)}
                </select>
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2018_19_resi_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2018_19_resi_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2018_19_nr_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2018_19_nr_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2018_19_nr_c]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2019_20_resi_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2019_20_resi_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2019_20_nr_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2019_20_nr_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2019_20_nr_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2019_20_nr_c]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2020_21_resi_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2020_21_resi_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2020_21_nr_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2020_21_nr_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_22_resi_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_22_resi_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_22_nr_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_22_nr_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_22_nr_c]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_23_resi_m]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_23_resi_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_23_nr_m]">
            </td>
            
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_23_nr_f]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="two_part_residential_coaches[${counting_3}][strength_residential_coaches_2022_23_nr_c]">
            </td>
            <td>
                <a href="javascript:void(0)" class="actionbtn remove_two_part_residential_coaches" data-id3="${counting_3}">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>`;
    $('#two_part_residential_coaches_container').append(two_part_residential_coaches_html);
});

$(document).on('click','.remove_two_part_residential_coaches',function(){

    let center_id = $('.center_id').val();

    // console.log("center_id",center_id);
    // return false;

        if($(this).data("db_id3") != undefined){

            $.ajax({
            method: "GET",
            url: baseurl + "/review/twopartresidentialcoachesById/"+$(this).data("db_id3"),
            contentType: false,
            processData: false,

            success: function (response) {

                if(response.success == false){

                    $('.row_'+$(this).data("id3")).remove();
                    // swal("Message",response.message, "error");
                    // $('.error_message').removeClass('d-none');
                }else{

                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                        window.location.href = baseurl + "/review/part-two/"+center_id;

                    });
                }
            }
        });

    }
    else{

        $('.row_'+$(this).data("id3")).remove();

    }

    counting_3--;
});




$(document).on('click','.remove_two_part_staff_nutritionist_chef',function(){

    let center_id = $('.center_id').val();
    let id_enc = $(this).data("id_enc");
    // console.log("center_id",id_enc);
    // console.log("dataid",$(this).data("db_id4"));
    // return false;

        if($(this).data("db_id4") != undefined){

            $.ajax({
            method: "GET",
            url: baseurl + "/review/nutritionistchefById/"+$(this).data("db_id4"),
            contentType: false,
            processData: false,

            success: function (response) {

                if(response.success == false){

                    $('.row_'+$(this).data("id4")).remove();
                    // swal("Message",response.message, "error");
                    // $('.error_message').removeClass('d-none');
                }else{

                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                        window.location.href = baseurl + "/review/part-two/"+id_enc;

                    });
                }
            }
        });

    }
    else{

        $('.row_'+$(this).data("id4")).remove();

    }

    counting_4--;
});


$(document).on('click','.add_more_sport_science_staff_doctor',function(){

    counting_5++;
    five_form_array_counting.push(counting_5);
    let center_id = $('.center_id').val();
    console.log(center_id);
    var two_part_sport_science_staff_doctor_html = `<tr class="row_${counting_5}">
            <td>
            <input type="hidden" class="center_id" name="sport_science_staff_doctor[${counting_5}][center_id]" value="${center_id}">
                <input type="text" class="form-control" name="sport_science_staff_doctor[${counting_5}][ssd_designation]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[${counting_5}][ssd_2018_19]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[${counting_5}][ssd_2019_20]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[${counting_5}][ssd_2020_21]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[${counting_5}][ssd_2021_22]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="sport_science_staff_doctor[${counting_5}][ssd_2022_23]">
            </td>
            <td>
                <a href="javascript:void(0)" class="actionbtn remove_two_part_sport_science_staff_doctor" data-id4="${counting_5}" data-db_id4="${counting_5}">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>`;
    $('#two_part_sport_science_staff_doctor_container').append(two_part_sport_science_staff_doctor_html);
});


$(document).on('click','.add_more_two_part_staff_nutritionist_chef',function(){

    counting_4++;
    four_form_array_counting.push(counting_4);
    let center_id = $('.center_id').val();
    var two_part_staff_nutritionist_chef_html = `<tr class="row_${counting_4}">
            <td>
                <input type="hidden" class="center_id" name="staff_nutritionist_chef[${counting_4}][center_id]" value="${center_id}">
                <input type="text"  class="form-control" name="staff_nutritionist_chef[${counting_4}][snc_designation]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[${counting_4}][snc_2018_19]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[${counting_4}][snc_2019_20]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[${counting_4}][snc_2020_21]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[${counting_4}][snc_2021_22]">
            </td>
            <td>
                <input type="number" min="0" class="form-control" name="staff_nutritionist_chef[${counting_4}][snc_2022_23]">
            </td>
            <td>
                <a href="javascript:void(0)" class="actionbtn remove_two_part_staff_nutritionist_chef" data-id4="${counting_4}">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>`;
    $('#two_part_staff_nutritionist_chef_container').append(two_part_staff_nutritionist_chef_html);
});

$(document).on('click','.remove_two_part_sport_science_staff_doctor',function(){

    let center_id = $('.center_id').val();

    console.log("center_id",center_id);
    return false;

        if($(this).data("db_id5") != undefined){

            $.ajax({
            method: "GET",
            url: baseurl + "/review/sciencestaffdoctorById/"+$(this).data("db_id5"),
            contentType: false,
            processData: false,

            success: function (response) {

                if(response.success == false){

                    $('.row_'+$(this).data("id5")).remove();
                    // swal("Message",response.message, "error");
                    // $('.error_message').removeClass('d-none');
                }else{

                    $('.row_'+$(this).data("id")).remove();
                    $('.error_message').addClass('d-none');
                    $('.message').html(`<strong>Success!</strong> ${response.message}`);
                    $('.message').removeClass('d-none');

                    swal("Message",response.message, "success").then(() => {

                        window.location.href = baseurl + "/review/part-two/"+center_id;

                    });
                }
            }
        });

    }
    else{

        $('.row_'+$(this).data("id5")).remove();

    }

    counting_5--;
});



//NEW jst





$(document).on('click', '.field_of_play_add', function () {
    counting++;
    var inner_html = '';
    // console.log(inner_html)
  
    form_first_html = `<tr class="tr_field_of_play_${counting}" id="main_${counting}">
      <td>
          <select class="form-select" aria-label="Default select example" name="discline_play_field[]" id="js_${counting}">
              
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
      </td>
    <td><input type="text" class="form-control" name="no_fop_play_field[]" id="js_${counting}"></td>
    <td>
      <select class="form-select" aria-label="Default select example" name="fop_play_field[]" id="js_${counting}">
          
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
  </td>
    <td><input type="text" class="form-control" name="fop_surface_play_field[]" id="js_${counting}"></td>
    <td><input type="text" class="form-control" name="rating_play_field[]" id="js_${counting}"></td>
    <td><input type="text" class="form-control" name="remark_play_field[]" id="js_${counting}"></td>
    <td>
    <a href="javascript:void(0)" onclick="functionRemove(${counting})" class="actionbtn remove_btn_play_field" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
    </td>
     
  </tr>`;
    $('.field_of_play').append(form_first_html);
  
  });
  
  function functionRemove(id) {
  
    $('.tr_field_of_play_' + id).remove();
  
  }
  
  function RemoveData(id) {
  
    $.ajax({
      method: "GET",
      url: baseurl + "/delete-data-form2/" + id,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.success == false) {
          $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
          $('.message').addClass('d-none');
          swal("Message", response.message, "error");
          $('.error_message').removeClass('d-none');
        } else {
          $('.error_message').addClass('d-none');
          $('.message').html(`<strong>Success!</strong> ${response.message}`);
          $('.message').removeClass('d-none');
          swal("Message", response.message, "success")
            .then(() => {
              location.reload();
              //window.location.href = baseurl + '/review/part-one/step-one/VZlSXRFWWNlUsRmeXxmWaN2aKVVVB1TP';
            });
        }
      }
  
    });
  }
  
  //For fous js starts here  
  
  
  //form four ends here 
  
  $(document).on('click', '.part_two_add_sport_equipment', function () {
  
    counting_10++;
    ten_form_array_counting.push(counting_10);
    let center_id = $('.center_id').val();
    var inner_html = '';
    // console.log(inner_html)
  
    form_first_html = `<tr class="row_${counting_10}" class="tr_field_of_play_${counting_10}" id="main_${counting_10}">
    <td>
   
  <select required class="form-select  form_1_discipline_${counting_10} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_10}" name="two_part_two_equipment[${counting_10}][equipment_discipline]"  aria-label="Default select example">
                 
                  ${getDisciplineHtml(data_dict.form1)}
                    </select>
              </td>
  
  
    </td>
  
  <td>
        <select class="form-select" id="js_${counting_10}" name="two_part_two_equipment[${counting_10}][equipment_suficient]" aria-label="Default select example">
        
        <option value="1">Sufficient</option>
        <option value="2">insufficient</option>
        </select>
  </td>
  <td><input type="text"  id="js_${counting_10}" name="two_part_two_equipment[${counting_10}][equipment_remark]" class="form-control"></td>
  <td>
  <a href="javascript:void(0)" class="actionbtn remove_two_part_two_equipment" data-id10="${counting_10}"><i class="fa-solid fa-trash-can"></i></a>
  </td>
   
  </tr>`;
    $('.two_part_euipment_body').append(form_first_html);
  
  });
  
  
  $(document).on('click', '.part_two_add_sport_equipment_consumable', function () {
  
    counting_9++;
    nine_form_array_counting.push(counting_9);
    let center_id = $('.center_id').val();
    var inner_html = '';
    // console.log(inner_html)
  
    form_first_html = `<tr class="row_${counting_9}" class="tr_field_of_play_${form_sport_quipment}" id="main_${form_sport_quipment}">
    <td>
    <input type="hidden" class="center_id" name="two_part_two_equipment_consumable[0][center_id]" value="${center_id}">
    <input type="hidden" name="two_part_two_equipment_consumable[${counting_9}][id]" value="">
  
    <select required class="form-select  form_1_discipline_${counting_9} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_9}" name="two_part_two_equipment_consumable[${counting_9}][equipment_discipline]"  aria-label="Default select example">
                 
        ${getDisciplineHtml(data_dict.form1)}
    </select>
    </td>
  
  <td>
        <select class="form-select" id="js_${form_sport_quipment}" name="two_part_two_equipment_consumable[${counting_9}][equipment_suficient]" aria-label="Default select example">
        
        <option value="1">Sufficient</option>
        <option value="2">insufficient</option>
        </select>
  </td>
  <td><input type="text"  id="js_${form_sport_quipment}" name="two_part_two_equipment_consumable[${counting_9}][equipment_remark]" class="form-control"></td>
  <td>
  <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_equipment" data-id9="${counting_9}"><i class="fa-solid fa-trash-can"></i></a>
  </td>
   
  </tr>`;
    $('.two_part_euipment_consumable_body').append(form_first_html);
  
  });
  
  
  
  
  
  $(document).on('click', '.part_two_sport_science', function () {
  
    counting_8++;
    eight_form_array_counting.push(counting_8);
    let center_id = $('.center_id').val();
    var inner_html = '';
    // console.log(inner_html)
  
    form_first_html = `<tr class="row_${counting_8}" class="tr_field_of_play_${counting_8}" id="main_${counting_8}">
    <td>
    <input type="hidden" class="center_id" name="two_part_two_sport_science[0][center_id]" value="${center_id}">
    <input type="hidden" name="two_part_two_sport_science[${counting_8}][id]" value="">
   
  <select required class="form-select  form_1_discipline_${counting_8} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_8}" name="two_part_two_sport_science[${counting_8}][science_discipline]"  aria-label="Default select example">
                 
${getDisciplineHtml(data_dict.form1)}
</select>
    </td>
  
  <td>
        <select class="form-select" id="js_${counting_8}" name="two_part_two_sport_science[${counting_8}][sport_consumable]" aria-label="Default select example">
        
        <option value="1">Sufficient</option>
        <option value="2">insufficient</option>
        </select>
  </td>
  <td>
        <select class="form-select" id="js_${counting_8}" name="two_part_two_sport_science[${counting_8}][sport_non_consumable]" aria-label="Default select example">
        
        <option value="1">Sufficient</option>
        <option value="2">insufficient</option>
        </select>
  </td>
  <td><input type="text"  id="js_${counting_8}" name="two_part_two_sport_science[${counting_8}][science_remark]" class="form-control"></td>
  <td>
  <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_science_equipment" data-id8="${counting_8}">
    <i class="fa-solid fa-trash-can"></i>
  </a>
  </td>
   
  </tr>`;
    $('.part_two_sport_equipment').append(form_first_html);
  
  });
  
  
  
  $(document).on('click', '.add_add_staff_button', function () {
    // alert('helllllllo');
    counting_7++;
    seveen_form_array_counting.push(counting_7);
    let center_id = $('.center_id').val();
    var inner_html = '';
    // console.log(inner_html)
  
    form_first_html = `<tr class="row_${counting_7}" class="tr_field_of_play_${counting_7}" id="main_${counting_7}">
    <td>     
        <input type="hidden" class="center_id" name="administrative_supports[0][center_id]" value="${center_id}">
        <input type="hidden" name="administrative_supports[${counting_7}][id]" value="">
        <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_designation]">
    </td>
    <td>
    <input type="number" min="0" class="form-control" name="administrative_supports[${counting_7}][ssd_2018_19]">
  </td>
  <td>
  <input type="number" min="0" class="form-control" name="administrative_supports[${counting_7}][ssd_2019_20]">
  </td>
  <td>
  <input type="number" min="0" class="form-control" name="administrative_supports[${counting_7}][ssd_2020_21]">
  </td>
  <td>
  <input type="number" min="0" class="form-control" name="administrative_supports[${counting_7}][ssd_2021_22]">
  </td>
  <td>
  <input type="number" min="0" class="form-control" name="administrative_supports[${counting_7}][ssd_2022_23]">
  </td>
  <td>
      <a href="javascript:void(0)" class="actionbtn remove_two_part_administrative_supports" data-id7="${counting_7}">
      <i class="fa-solid fa-trash-can"></i></a>
  </a>
  </td>
   
  </tr>`;
    $('.add_add_staff_body').append(form_first_html);
  
  });
  
  
  
  
  $(document).on('click','.remove_two_part_administrative_supports',function(){
//   alert('hi');
    let center_id = $('.center_id').val();
  
    // console.log("center_id dfgdsfgsdf",center_id);
    // return false;
  
    if($(this).data("db_id7") != undefined){
  
        $.ajax({
        method: "GET",
        url: baseurl + "/review/administrativesupportsById/"+$(this).data("db_id7"),
        contentType: false,
        processData: false,
  
        success: function (response) {
  
            if(response.success == false){
  
                $('.row_'+$(this).data("id7")).remove();
                // swal("Message",response.message, "error");
                // $('.error_message').removeClass('d-none');
            }else{
  
                $('.row_'+$(this).data("id7")).remove();
                $('.error_message').addClass('d-none');
                $('.message').html(`<strong>Success!</strong> ${response.message}`);
                $('.message').removeClass('d-none');
  
                swal("Message",response.message, "success").then(() => {
  
                    window.location.href = baseurl + "/review/part-two/"+center_id;
  
                });
            }
        }
    });
  
  }
  else{
  
    $('.row_'+$(this).data("id7")).remove();
  
  }
  
  counting_7--;
  });
  
  
  
  
  $(document).on('click','.remove_two_part_sports_science_equipment',function(){
  
    let center_id = $('.center_id').val();
  
    // console.log("center_id dfgdsfgsdf",center_id);
    // return false;
  
    if($(this).data("db_id8") != undefined){
  
        $.ajax({
        method: "GET",
        url: baseurl + "/review/sportsscienceequipmentById/"+$(this).data("db_id8"),
        contentType: false,
        processData: false,
  
        success: function (response) {
  
            if(response.success == false){
  
                $('.row_'+$(this).data("id8")).remove();
                // swal("Message",response.message, "error");
                // $('.error_message').removeClass('d-none');
            }else{
  
                $('.row_'+$(this).data("id8")).remove();
                $('.error_message').addClass('d-none');
                $('.message').html(`<strong>Success!</strong> ${response.message}`);
                $('.message').removeClass('d-none');
  
                swal("Message",response.message, "success").then(() => {
  
                    window.location.href = baseurl + "/review/part-two/"+center_id;
  
                });
            }
        }
    });
  
  }
  else{
  
    $('.row_'+$(this).data("id8")).remove();
  
  }
  
  counting_8--;
  });
  
  
  $(document).on('click','.remove_two_part_sports_equipment',function(){
  
    let center_id = $('.center_id').val();
  
    // console.log("center_id dfgdsfgsdf",center_id);
    // return false;
  
    if($(this).data("db_id9") != undefined){
  
        $.ajax({
        method: "GET",
        url: baseurl + "/review/partsportsequipmentById/"+$(this).data("db_id9"),
        contentType: false,
        processData: false,
  
        success: function (response) {
  
            if(response.success == false){
  
                $('.row_'+$(this).data("id9")).remove();
                // swal("Message",response.message, "error");
                // $('.error_message').removeClass('d-none');
            }else{
  
                $('.row_'+$(this).data("id9")).remove();
                $('.error_message').addClass('d-none');
                $('.message').html(`<strong>Success!</strong> ${response.message}`);
                $('.message').removeClass('d-none');
  
                swal("Message",response.message, "success").then(() => {
  
                    window.location.href = baseurl + "/review/part-two/"+center_id;
  
                });
            }
        }
    });
  
  }
  else{
  
    $('.row_'+$(this).data("id9")).remove();
  
  }
  
  counting_9--;
  });
  
  
  
  $(document).on('click','.remove_two_part_two_equipment',function(){
  
    let center_id = $('.center_id').val();
  
    // console.log("center_id dfgdsfgsdf",center_id);
    // return false;
  
    if($(this).data("db_id10") != undefined){
  
        $.ajax({
        method: "GET",
        url: baseurl + "/review/2.69/"+$(this).data("db_id10"),
        contentType: false,
        processData: false,
  
        success: function (response) {
  
            if(response.success == false){
  
                $('.row_'+$(this).data("id10")).remove();
                // swal("Message",response.message, "error");
                // $('.error_message').removeClass('d-none');
            }else{
  
                $('.row_'+$(this).data("id10")).remove();
                $('.error_message').addClass('d-none');
                $('.message').html(`<strong>Success!</strong> ${response.message}`);
                $('.message').removeClass('d-none');
  
                swal("Message",response.message, "success").then(() => {
  
                    window.location.href = baseurl + "/review/part-two/"+center_id;
  
                });
            }
        }
    });
  
  }
  else{
  
    $('.row_'+$(this).data("id10")).remove();
  
  }
  
  counting_10--;
  });
  
  
  
