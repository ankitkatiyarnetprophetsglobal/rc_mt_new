//SE
$(document).on('keyup','.se_ncoe_cost',function(){
    $('.se_total_cost').val(($('.se_ncoe_cost').val() == '' ? 0 : $('.se_ncoe_cost').val()*1) + ($('.se_stc_cost').val() == '' ? 0 : $('.se_stc_cost').val()*1));
 });
$(document).on('keyup','.se_stc_cost',function(){
    $('.se_total_cost').val(($('.se_ncoe_cost').val() == '' ? 0 : $('.se_ncoe_cost').val()*1) + ($('.se_stc_cost').val() == '' ? 0 : $('.se_stc_cost').val()*1));
});


//SSE
$(document).on('keyup','.sse_ncoe_cost',function(){
    $('.sse_total_cost').val(($('.sse_ncoe_cost').val() == '' ? 0 : $('.sse_ncoe_cost').val()*1) + ($('.sse_stc_cost').val() == '' ? 0 : $('.sse_stc_cost').val()*1));
 });
$(document).on('keyup','.sse_stc_cost',function(){
    $('.sse_total_cost').val(($('.sse_ncoe_cost').val() == '' ? 0 : $('.sse_ncoe_cost').val()*1) + ($('.sse_stc_cost').val() == '' ? 0 : $('.sse_stc_cost').val()*1));
});







$('#second_form').on('submit',function(e){
            e.preventDefault();
   
        let condition = true;
        let center_id = $('.center_id').val();
 if(condition){
        
        var formdata = new FormData($('#second_form')[0]);
      
$.ajax({
method: "POST",
url: baseurl+"/manage/procurement/store_form_second",
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
      $('.error_message').addClass('d-none');
       $('.message').html(`<strong>Success!</strong> ${response.message}`);
      $('.message').removeClass('d-none');
      
      swal("Message",response.message, "success")
                   .then(() => {
                    window.location.href = baseurl + "/manage/procurement/index/"+encode_temp_id+'/'+center_id;
                     });
     
        
    }
}

});  
    }
    
})


