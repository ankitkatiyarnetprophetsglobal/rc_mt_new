$(document).on('click','.field_of_play_add',function(){
    
    counting++; 
   var inner_html = '';
// console.log(inner_html)

    form_first_html = `<tr class="tr_field_of_play_${counting}" id="main_${counting}">
    <td>
        <select class="form-select" aria-label="Default select example" name="discline_play_field[]" id="js_${counting}">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
    </td>
  <td><input type="text" class="form-control" name="no_fop_play_field[]" id="js_${counting}"></td>
  <td>
    <select class="form-select" aria-label="Default select example" name="fop_play_field[]" id="js_${counting}">
        <option selected>Open this select menu</option>
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

function functionRemove(id){
  
  $('.tr_field_of_play_'+id).remove();

}

function RemoveData(id){

    $.ajax({
             method: "GET",
             url: baseurl + "/delete-data-form2/"+id,
             contentType: false,
             processData: false,
             success: function (response) {
                 if(response.success == false){
                   $('.error_message').html(`<strong>Danger!</strong> ${response.message}`);
                   $('.message').addClass('d-none');
                   swal("Message",response.message, "error");
                   $('.error_message').removeClass('d-none');
                 }else{
                     $('.error_message').addClass('d-none');
                     $('.message').html(`<strong>Success!</strong> ${response.message}`);
                     $('.message').removeClass('d-none');
                     swal("Message",response.message, "success")
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