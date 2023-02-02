
   $(document).on('keyup','.se_fund_transfer',function(){
    $('.se_total_fund_available').val(($('.se_opening_balance').val() == '' ? 0 : $('.se_opening_balance').val()*1) + ($('.se_fund_transfer').val() == '' ? 0 : $('.se_fund_transfer').val()*1));
    $('.se_fund_requirement').val(($('.se_total_fund_available').val() == '' ? 0 : $('.se_total_fund_available').val()*1) - ($('.se_administrative_approval_budget').val() == '' ? 0 : $('.se_administrative_approval_budget').val()*1));
   });
   $(document).on('keyup','.se_administrative_approval_budget',function(){
    $('.se_total_fund_available').val(($('.se_opening_balance').val() == '' ? 0 : $('.se_opening_balance').val()*1) + ($('.se_fund_transfer').val() == '' ? 0 : $('.se_fund_transfer').val()*1));
    $('.se_fund_requirement').val(($('.se_total_fund_available').val() == '' ? 0 : $('.se_total_fund_available').val()*1) - ($('.se_administrative_approval_budget').val() == '' ? 0 : $('.se_administrative_approval_budget').val()*1));
   });
   $(document).on('keyup','.se_opening_balance',function(){
    $('.se_total_fund_available').val(($('.se_opening_balance').val() == '' ? 0 : $('.se_opening_balance').val()*1) + ($('.se_fund_transfer').val() == '' ? 0 : $('.se_fund_transfer').val()*1));
    $('.se_fund_requirement').val(($('.se_total_fund_available').val() == '' ? 0 : $('.se_total_fund_available').val()*1) - ($('.se_administrative_approval_budget').val() == '' ? 0 : $('.se_administrative_approval_budget').val()*1));
   });



   $(document).on('keyup','.sse_fund_transfer',function(){
    $('.sse_total_fund_available').val(($('.sse_opening_balance').val() == '' ? 0 : $('.sse_opening_balance').val()*1) + ($('.sse_fund_transfer').val() == '' ? 0 : $('.sse_fund_transfer').val()*1));
    $('.sse_fund_requirement').val(($('.sse_total_fund_available').val() == '' ? 0 : $('.sse_total_fund_available').val()*1) - ($('.sse_administrative_approval_budget').val() == '' ? 0 : $('.sse_administrative_approval_budget').val()*1));
   });
   $(document).on('keyup','.sse_administrative_approval_budget',function(){
    $('.sse_total_fund_available').val(($('.sse_opening_balance').val() == '' ? 0 : $('.sse_opening_balance').val()*1) + ($('.sse_fund_transfer').val() == '' ? 0 : $('.sse_fund_transfer').val()*1));
    $('.sse_fund_requirement').val(($('.sse_total_fund_available').val() == '' ? 0 : $('.sse_total_fund_available').val()*1) - ($('.sse_administrative_approval_budget').val() == '' ? 0 : $('.sse_administrative_approval_budget').val()*1));
   });
   $(document).on('keyup','.sse_opening_balance',function(){
    $('.sse_total_fund_available').val(($('.sse_opening_balance').val() == '' ? 0 : $('.sse_opening_balance').val()*1) + ($('.sse_fund_transfer').val() == '' ? 0 : $('.sse_fund_transfer').val()*1));
    $('.sse_fund_requirement').val(($('.sse_total_fund_available').val() == '' ? 0 : $('.sse_total_fund_available').val()*1) - ($('.sse_administrative_approval_budget').val() == '' ? 0 : $('.sse_administrative_approval_budget').val()*1));
   });
        
        
        
        
        $('#first_form').on('submit',function(e){
            e.preventDefault();
   
        let condition = true;
        let center_id = $('.center_id').val();
        console.log($('.se_opening_balance').val());
        if($('.se_opening_balance').val()  == ''){
        $('.error_se_opening_balance').text('Select a amount.');
        $('.se_opening_balance').focus();
        return false;
       }else{
        $('.error_se_opening_balance').text('');
        } 


        if($('.se_administrative_approval_budget').val()  == ''){
        $('.error_se_administrative_approval_budget').text('Select a amount.');
        $('.se_administrative_approval_budget').focus();
        return false;
       }else{
        $('.error_se_administrative_approval_budget').text('');
        } 


        if($('.se_fund_transfer').val()  == ''){
        $('.error_se_fund_transfer').text('Select a amount.');
        $('.se_fund_transfer').focus();
        return false;
       }else{
        $('.error_se_fund_transfer').text('');
        } 
        
    //     if($('.se_total_fund_available').val()  == ''){
    //     $('.error_se_total_fund_available').text('Select a amount.');
    //     $('.se_total_fund_available').focus();
    //     return false;
    //    }else{
    //     $('.error_se_total_fund_available').text('');
    //     } 

    //     if($('.se_fund_requirement').val()  == ''){
    //     $('.error_se_fund_requirement').text('Select a amount.');
    //     $('.se_fund_requirement').focus();
    //     return false;
    //    }else{
    //     $('.error_se_fund_requirement').text('');
    //     } 
        if($('.sse_opening_balance').val()  == ''){
        $('.error_sse_opening_balance').text('Select a amount.');
        $('.sse_opening_balance').focus();
        return false;
       }else{
        $('.error_sse_opening_balance').text('');
        } 


        if($('.sse_administrative_approval_budget').val()  == ''){
        $('.error_sse_administrative_approval_budget').text('Select a amount.');
        $('.sse_administrative_approval_budget').focus();
        return false;
       }else{
        $('.error_sse_administrative_approval_budget').text('');
        } 


        if($('.sse_fund_transfer').val()  == ''){
        $('.error_sse_fund_transfer').text('Select a amount.');
        $('.sse_fund_transfer').focus();
        return false;
       }else{
        $('.error_sse_fund_transfer').text('');
        } 
        
        
    //     if($('.sse_total_fund_available').val()  == ''){
    //     $('.error_sse_total_fund_available').text('Select a amount.');
    //     $('.sse_total_fund_available').focus();
    //     return false;
    //    }else{
    //     $('.error_sse_total_fund_available').text('');
    //     } 

    //     if($('.sse_fund_requirement').val()  == ''){
    //     $('.error_sse_fund_requirement').text('Select a amount.');
    //     $('.sse_fund_requirement').focus();
    //     return false;
    //    }else{
    //     $('.error_sse_fund_requirement').text('');
    //     } 
        
         
      
    
    if(condition){
        
        var formdata = new FormData($('#first_form')[0]);
        console.log(formdata);
$.ajax({
method: "POST",
url: baseurl+"/manage/procurement/store_form_first",
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

