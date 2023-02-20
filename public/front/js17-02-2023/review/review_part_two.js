

// $(document).on('click', '.field_of_play_add', function () {
//   counting++;
//   var inner_html = '';
//   // console.log(inner_html)

//   form_first_html = `<tr class="tr_field_of_play_${counting}" id="main_${counting}">
//     <td>
//         <select class="form-select" aria-label="Default select example" name="discline_play_field[]" id="js_${counting}">
//             <option selected>Open this select menu</option>
//             <option value="1">One</option>
//             <option value="2">Two</option>
//             <option value="3">Three</option>
//           </select>
//     </td>
//   <td><input type="text" class="form-control" name="no_fop_play_field[]" id="js_${counting}"></td>
//   <td>
//     <select class="form-select" aria-label="Default select example" name="fop_play_field[]" id="js_${counting}">
//         <option selected>Open this select menu</option>
//         <option value="1">One</option>
//         <option value="2">Two</option>
//         <option value="3">Three</option>
//       </select>
// </td>
//   <td><input type="text" class="form-control" name="fop_surface_play_field[]" id="js_${counting}"></td>
//   <td><input type="text" class="form-control" name="rating_play_field[]" id="js_${counting}"></td>
//   <td><input type="text" class="form-control" name="remark_play_field[]" id="js_${counting}"></td>
//   <td>
//   <a href="javascript:void(0)" onclick="functionRemove(${counting})" class="actionbtn remove_btn_play_field" data-id="0" data-db_id=""><i class="fa-solid fa-trash-can"></i></a>
//   </td>
   
// </tr>`;
//   $('.field_of_play').append(form_first_html);

// });

// function functionRemove(id) {

//   $('.tr_field_of_play_' + id).remove();

// }

// function RemoveData(id) {

//   $.ajax({
//     method: "GET",
//     url: baseurl + "/delete-data-form2/" + id,
//     contentType: false,
//     processData: false,
//     success: function (response) {
//       if (response.success == false) {
//         $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
//         $('.message').addClass('d-none');
//         swal("Message", response.message, "error");
//         $('.error_message').removeClass('d-none');
//       } else {
//         $('.error_message').addClass('d-none');
//         $('.message').html(`<strong>Success!</strong> ${response.message}`);
//         $('.message').removeClass('d-none');
//         swal("Message", response.message, "success")
//           .then(() => {
//             location.reload();
//             //window.location.href = baseurl + '/review/part-one/step-one/VZlSXRFWWNlUsRmeXxmWaN2aKVVVB1TP';
//           });
//       }
//     }

//   });
// }

// //For fous js starts here  


// //form four ends here 

// $(document).on('click', '.part_two_add_sport_equipment', function () {

//   counting_10++;
//   ten_form_array_counting.push(counting_10);
//   let center_id = $('.center_id').val();
//   var inner_html = '';
//   // console.log(inner_html)

//   form_first_html = `<tr class="row_${counting_10}" class="tr_field_of_play_${counting_10}" id="main_${counting_10}">
//   <td>
 
// <select required class="form-select  form_1_discipline_${counting_10} form_1_discipline disciplin_grab " data-id="form_1" data-counting_id="${counting_10}" name="two_part_two_equipment[${counting_10}][equipment_discipline]"  aria-label="Default select example">
               
//                 ${getDisciplineHtml(data_dict.form1)}
//                   </select>
//             </td>


//   </td>

// <td>
//       <select class="form-select" id="js_${counting_10}" name="two_part_two_equipment[${counting_10}][equipment_suficient]" aria-label="Default select example">
//       <option selected>Open this select menu</option>
//       <option value="1">Sufficient</option>
//       <option value="2">insufficient</option>
//       </select>
// </td>
// <td><input type="text"  id="js_${counting_10}" name="two_part_two_equipment[${counting_10}][equipment_remark]" class="form-control"></td>
// <td>
// <a href="javascript:void(0)" class="actionbtn remove_two_part_two_equipment" data-id10="${counting_10}"><i class="fa-solid fa-trash-can"></i></a>
// </td>
 
// </tr>`;
//   $('.two_part_euipment_body').append(form_first_html);

// });


// $(document).on('click', '.part_two_add_sport_equipment_consumable', function () {

//   counting_9++;
//   nine_form_array_counting.push(counting_9);
//   let center_id = $('.center_id').val();
//   var inner_html = '';
//   // console.log(inner_html)

//   form_first_html = `<tr class="row_${counting_9}" class="tr_field_of_play_${form_sport_quipment}" id="main_${form_sport_quipment}">
//   <td>
//   <input type="hidden" class="center_id" name="two_part_two_equipment_consumable[0][center_id]" value="${center_id}">
//   <input type="hidden" name="two_part_two_equipment_consumable[${counting_9}][id]" value="">
//   <select class="form-select" name="two_part_two_equipment_consumable[${counting_9}][equipment_discipline]" id="js_${counting_9}" aria-label="Default select example">
//         <option selected>Open this select menu</option>
//         <option value="1">One</option>
//         <option value="2">Two</option>
//         <option value="3">Three</option>
// </select>
//   </td>

// <td>
//       <select class="form-select" id="js_${form_sport_quipment}" name="two_part_two_equipment_consumable[${counting_9}][equipment_suficient]" aria-label="Default select example">
//       <option selected>Open this select menu</option>
//       <option value="1">Sufficient</option>
//       <option value="2">insufficient</option>
//       </select>
// </td>
// <td><input type="text"  id="js_${form_sport_quipment}" name="two_part_two_equipment_consumable[${counting_9}][equipment_remark]" class="form-control"></td>
// <td>
// <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_equipment" data-id9="${counting_9}"><i class="fa-solid fa-trash-can"></i></a>
// </td>
 
// </tr>`;
//   $('.two_part_euipment_consumable_body').append(form_first_html);

// });





// $(document).on('click', '.part_two_sport_science', function () {

//   counting_8++;
//   eight_form_array_counting.push(counting_8);
//   let center_id = $('.center_id').val();
//   var inner_html = '';
//   // console.log(inner_html)

//   form_first_html = `<tr class="row_${counting_8}" class="tr_field_of_play_${counting_8}" id="main_${counting_8}">
//   <td>
//   <input type="hidden" class="center_id" name="two_part_two_sport_science[0][center_id]" value="${center_id}">
//   <input type="hidden" name="two_part_two_sport_science[${counting_8}][id]" value="">
//   <select class="form-select" name="two_part_two_sport_science[${counting_8}][science_discipline]" id="js_${counting_8}" aria-label="Default select example">
//         <option selected>Open this select menu</option>
//         <option value="1">One</option>
//         <option value="2">Two</option>
//         <option value="3">Three</option>
// </select>
//   </td>

// <td>
//       <select class="form-select" id="js_${counting_8}" name="two_part_two_sport_science[${counting_8}][sport_consumable]" aria-label="Default select example">
//       <option selected>Open this select menu</option>
//       <option value="1">Sufficient</option>
//       <option value="2">insufficient</option>
//       </select>
// </td>
// <td>
//       <select class="form-select" id="js_${counting_8}" name="two_part_two_sport_science[${counting_8}][sport_non_consumable]" aria-label="Default select example">
//       <option selected>Open this select menu</option>
//       <option value="1">Sufficient</option>
//       <option value="2">insufficient</option>
//       </select>
// </td>
// <td><input type="text"  id="js_${counting_8}" name="two_part_two_sport_science[${counting_8}][science_remark]" class="form-control"></td>
// <td>
// <a href="javascript:void(0)" class="actionbtn remove_two_part_sports_science_equipment" data-id8="${counting_8}">
//   <i class="fa-solid fa-trash-can"></i>
// </a>
// </td>
 
// </tr>`;
//   $('.part_two_sport_equipment').append(form_first_html);

// });



// $(document).on('click', '.add_add_staff_button', function () {
//   // alert('helllllllo');
//   counting_7++;
//   seveen_form_array_counting.push(counting_7);
//   let center_id = $('.center_id').val();
//   var inner_html = '';
//   // console.log(inner_html)

//   form_first_html = `<tr class="row_${counting_7}" class="tr_field_of_play_${counting_7}" id="main_${counting_7}">
//   <td>     
//       <input type="hidden" class="center_id" name="administrative_supports[0][center_id]" value="${center_id}">
//       <input type="hidden" name="administrative_supports[${counting_7}][id]" value="">
//       <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_designation]">
//   </td>
//   <td>
//   <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_2018_19]">
// </td>
// <td>
// <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_2019_20]">
// </td>
// <td>
// <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_2020_21]">
// </td>
// <td>
// <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_2021_22]">
// </td>
// <td>
// <input type="text" class="form-control" name="administrative_supports[${counting_7}][ssd_2022_23]">
// </td>
// <td>
//     <a href="javascript:void(0)" class="actionbtn remove_two_part_administrative_supports" data-id7="${counting_7}">
//     <i class="fa-solid fa-trash-can"></i></a>
// </a>
// </td>
 
// </tr>`;
//   $('.add_add_staff_body').append(form_first_html);

// });




// $(document).on('click','.remove_two_part_administrative_supports',function(){

//   let center_id = $('.center_id').val();

//   // console.log("center_id dfgdsfgsdf",center_id);
//   // return false;

//   if($(this).data("db_id7") != undefined){

//       $.ajax({
//       method: "GET",
//       url: baseurl + "/review/administrativesupportsById/"+$(this).data("db_id7"),
//       contentType: false,
//       processData: false,

//       success: function (response) {

//           if(response.success == false){

//               $('.row_'+$(this).data("id7")).remove();
//               // swal("Message",response.message, "error");
//               // $('.error_message').removeClass('d-none');
//           }else{

//               $('.row_'+$(this).data("id7")).remove();
//               $('.error_message').addClass('d-none');
//               $('.message').html(`<strong>Success!</strong> ${response.message}`);
//               $('.message').removeClass('d-none');

//               swal("Message",response.message, "success").then(() => {

//                   window.location.href = baseurl + "/review/part-two/"+center_id;

//               });
//           }
//       }
//   });

// }
// else{

//   $('.row_'+$(this).data("id7")).remove();

// }

// counting_7--;
// });




// $(document).on('click','.remove_two_part_sports_science_equipment',function(){

//   let center_id = $('.center_id').val();

//   // console.log("center_id dfgdsfgsdf",center_id);
//   // return false;

//   if($(this).data("db_id8") != undefined){

//       $.ajax({
//       method: "GET",
//       url: baseurl + "/review/sportsscienceequipmentById/"+$(this).data("db_id8"),
//       contentType: false,
//       processData: false,

//       success: function (response) {

//           if(response.success == false){

//               $('.row_'+$(this).data("id8")).remove();
//               // swal("Message",response.message, "error");
//               // $('.error_message').removeClass('d-none');
//           }else{

//               $('.row_'+$(this).data("id8")).remove();
//               $('.error_message').addClass('d-none');
//               $('.message').html(`<strong>Success!</strong> ${response.message}`);
//               $('.message').removeClass('d-none');

//               swal("Message",response.message, "success").then(() => {

//                   window.location.href = baseurl + "/review/part-two/"+center_id;

//               });
//           }
//       }
//   });

// }
// else{

//   $('.row_'+$(this).data("id8")).remove();

// }

// counting_8--;
// });


// $(document).on('click','.remove_two_part_sports_equipment',function(){

//   let center_id = $('.center_id').val();

//   // console.log("center_id dfgdsfgsdf",center_id);
//   // return false;

//   if($(this).data("db_id9") != undefined){

//       $.ajax({
//       method: "GET",
//       url: baseurl + "/review/partsportsequipmentById/"+$(this).data("db_id9"),
//       contentType: false,
//       processData: false,

//       success: function (response) {

//           if(response.success == false){

//               $('.row_'+$(this).data("id9")).remove();
//               // swal("Message",response.message, "error");
//               // $('.error_message').removeClass('d-none');
//           }else{

//               $('.row_'+$(this).data("id9")).remove();
//               $('.error_message').addClass('d-none');
//               $('.message').html(`<strong>Success!</strong> ${response.message}`);
//               $('.message').removeClass('d-none');

//               swal("Message",response.message, "success").then(() => {

//                   window.location.href = baseurl + "/review/part-two/"+center_id;

//               });
//           }
//       }
//   });

// }
// else{

//   $('.row_'+$(this).data("id9")).remove();

// }

// counting_9--;
// });



// $(document).on('click','.remove_two_part_two_equipment',function(){

//   let center_id = $('.center_id').val();

//   // console.log("center_id dfgdsfgsdf",center_id);
//   // return false;

//   if($(this).data("db_id10") != undefined){

//       $.ajax({
//       method: "GET",
//       url: baseurl + "/review/2.69/"+$(this).data("db_id10"),
//       contentType: false,
//       processData: false,

//       success: function (response) {

//           if(response.success == false){

//               $('.row_'+$(this).data("id10")).remove();
//               // swal("Message",response.message, "error");
//               // $('.error_message').removeClass('d-none');
//           }else{

//               $('.row_'+$(this).data("id10")).remove();
//               $('.error_message').addClass('d-none');
//               $('.message').html(`<strong>Success!</strong> ${response.message}`);
//               $('.message').removeClass('d-none');

//               swal("Message",response.message, "success").then(() => {

//                   window.location.href = baseurl + "/review/part-two/"+center_id;

//               });
//           }
//       }
//   });

// }
// else{

//   $('.row_'+$(this).data("id10")).remove();

// }

// counting_10--;
// });


