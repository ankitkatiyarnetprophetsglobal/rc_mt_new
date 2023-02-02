$(document).on('click', '.search_btn', function() {
    
    
    if ($('.rc_select_input').val() == null && $('.temp_select_input').val() == null) {
        return false;
    } else {
        let rc_select = $('.rc_select_input').val();
        let temp_select = $('.temp_select_input').val();
        let url = '';
        if($('.rc_select_input').val()== null){
            url  =  baseurl + "/admin/template-management/template-wise-regional-center/"+temp_select;
        }
        else if($('.temp_select_input').val()== null){
            url  =  baseurl + "/admin/template-management/regional-center-wise-templates/"+rc_select;
        }else{
            url  =  baseurl + "/admin/template-management/template-of-regional-center/"+rc_select +"/"+ temp_select;  
        }
       window.location.href = url;
       //console.log(url);
        //return false;
    }
});

$(document).ready(function() {
    $('.temp_select_input').select2({
            placeholder: "Select Template",
            allowClear: true
        });
    $('.rc_select_input').select2({
            placeholder: "Select Regional Center",
            allowClear: true
        });
    });