    // $(document).ready(function(){
    //     $( ".datepicker" ).datepicker({
    //         slideDown : true,
    //         dateFormat : "dd-mm-yy",
    //     });
    // });
    
    var array_counting = [0];
    var counting = 0;

    $(document).on('click','.add_more',function(){

        $('.inputDisabled').prop("disabled", false);
        if(counting == 0){

            let remove_html = ``;
            $('.row_0').append(remove_html);
        }
        counting++;
        array_counting.push(counting);
        
        var finance_html = `<div class="rc_forms row_${counting}">
                                    <div class="row p-0 m-0 align-items-center">
                                        <div class="col-md-auto col-12 form-fields mb-4 ">
                                            <fieldset>
                                                <legend class="form_field_name"><span>TITLE/NAME OF TEMPLATE</span></legend>
                                                <input type="text" class="form-control template_name_${counting}" id="template_name[${counting}][template_name]" name="monthly_monitoring[${counting}][template_name]" aria-describedby="template name" autocomplete="off">
                                            </fieldset>
                                            <span class="text-danger error_template_name_${counting}"></span>
                                        </div>
                                        <div class="col-md-auto col-12 form-fields mb-4  ">
                                            <fieldset>
                                                <legend class="form_field_name"><span>FROM DATE</span></legend>
                                                <input type="text" class="form-control from_date_${counting} from_datepicker_${counting} add_from_date_${counting}" id="monthly_monitoring[${counting}][from_date]" name="monthly_monitoring[${counting}][from_date]" aria-describedby="from date" autocomplete="off">
                                            </fieldset>
                                            <span class="text-danger error_from_date_${counting}"></span>
                                        </div>
                                        <div class="col-md-auto col-12 form-fields mb-4  ">
                                            <fieldset>
                                                <legend class="form_field_name"><span>TO DATE</span></legend>
                                                <input type="text" class="form-control to_date_${counting} to_datepicker_${counting} add_to_date_${counting}" id="monthly_monitoring[${counting}][to_date]" name="monthly_monitoring[${counting}][to_date]" aria-describedby="to date" autocomplete="off">
                                            </fieldset>
                                            <span class="text-danger error_to_date_${counting}"></span>
                                        </div>
                                        <div class="col-md-auto col-12 form-fields mb-4  ">
                                                <fieldset>
                                                    <legend class="form_field_name"><span>REGIONAL CENTER</span></legend>
                                                    <select class="form-select regional_center_${counting} monthly_monitoring_regional_center_${counting}" id="monthly_monitoring[${counting}][regional_center]" name="monthly_monitoring[${counting}][regional_center][]" aria-label="regional center" multiple="multiple" autocomplete="off">
                                                        ${get_regional_center(selected_regional_center)}    
                                                    </select>
                                                </fieldset>
                                                <span class="text-danger error_regional_center_${counting}"></span>
                                        </div>
                                        <div class="col-md-auto col-12 form-fields mb-4  ">
                                                <fieldset>
                                                    <legend class="form_field_name"><span>TEMPLATE</span></legend>
                                                    <select class="form-select template_${counting} monthly_monitoring_template_${counting}" id="monthly_monitoring[${counting}][template]" name="monthly_monitoring[${counting}][template][]" aria-label="Template" multiple="multiple" autocomplete="off">
                                                        ${getProjectTitle(selected_template)}
                                                    </select>
                                                </fieldset>
                                                <span class="text-danger error_template_${counting}"></span>
                                        </div>
                                        <div class="col-lg-auto col-md-auto col-12 form-fields mb-4  ">
                                            <fieldset>
                                                <legend class="form_field_name"><span>CATEGORIES</span></legend>
                                                    <select class="form-select categories_${counting} monthly_monitoring_categories_${counting}" id="monthly_monitoring[${counting}][categories][]" name="monthly_monitoring[${counting}][categories][]" multiple="multiple" autocomplete="off">
                                                        <option value="1">One Time</option>
                                                        <option value="2">Multiple time</option>
                                                    </select>                                                
                                            </fieldset>
                                            <span class="text-danger error_categories_${counting}"></span>
                                        </div>
                                        <div class="col-md-auto col-12 mb-4 delete-icon">          
                                            <a href="#" class="remove_btn" data-id="${counting}">
                                                 <a hres="#" class="btn btn-outline-danger remove_btn" data-id="${counting}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>       
                                            </a>
                                        </div>             
                                </div>
                            </div>`;
        $('#template_management_form_container').append(finance_html);

        $(`.monthly_monitoring_regional_center_${counting}`).multiselect({
            includeSelectAllOption: true,
        });
        
        $(`.monthly_monitoring_template_${counting}`).multiselect({
            includeSelectAllOption: true,
        });

        $(`.monthly_monitoring_categories_${counting}`).multiselect({
            includeSelectAllOption: true,
        });

        // $(`.from_datepicker_${counting}`).datepicker({
        //     slideDown : true,
        //     dateFormat : "dd-mm-yy",
        // });
    
        // $(`.to_datepicker_${counting}`).datepicker({
        //     slideDown : true,
        //     dateFormat : "dd-mm-yy",
        // });

        // $(`.add_from_date_${counting}`).datepicker({
        //     dateFormat : "dd-mm-yy",
        //     onSelect: function (selected) {
        //         var dt = new Date(selected);
        //         dt.setDate(dt.getDate() + 1);
        //         $(`.add_to_date_${counting}`).datepicker("option", "minDate", dt);
        //     }
        // });
        // $(`.add_to_date_${counting}`).datepicker({
        //     dateFormat : "dd-mm-yy",
        //     onSelect: function (selected) {
        //         var dt = new Date(selected);
        //         dt.setDate(dt.getDate() - 1);
        //         $(`.add_from_date_${counting}`).datepicker("option", "maxDate", dt);
        //     }
        // });

        $(function(){
            
            $(`.add_to_date_${counting}`).datepicker({ dateFormat: 'dd-mm-yy' });
            
            $(`.add_from_date_${counting}`).datepicker({ dateFormat: 'dd-mm-yy' }).bind("change",function(){
                var minValue = $(`.add_from_date_${counting}`).val();
                minValue = $.datepicker.parseDate("dd-mm-yy", minValue);
                minValue.setDate(minValue.getDate()+1);
                $(`.add_to_date_${counting}`).datepicker( "option", "minDate", minValue );
            })
        });

    });

    // remove filed
    $(document).on('click','.remove_btn',function(){

        console.log("counting",counting);
        if(counting == 0){            
            // $('.row_'+$(this).data("id")).remove();
            // $('.inputDisabled').prop("disabled", true);
        }else{
            console.log("id",$(this).data("id"));
            counting--;
            $('.inputDisabled').prop("disabled", false);
            $('.row_'+$(this).data("id")).remove();
                var current_item = $(this).data("id");
                array_counting = $.grep(array_counting, function(value) {
                return value != current_item;
            });
        }
        
    });

   
    // add filed in databases
    $('.template_management').on('submit',function(e){
        e.preventDefault();
        let condition = true;
        
        

        for(let i=0;i< array_counting.length; i++){

            // console.log("$('.regional_center_'+array_counting[i]).multiselect()",$('.regional_center_'+array_counting[i]).multiselect());
            // return false;
            // console.log(".template_name_'+array_counting[i]",$('.template_name_'+array_counting[i]).val());
            if($('.template_name_'+array_counting[i]).val()  == ''){

                $('.error_template_name_'+array_counting[i]).text('Please enter Template name.');
                $('.template_name_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_template_name_'+array_counting[i]).text('');
            }

            console.log("$('.regional_center_'+array_counting[i]).val()",$('.regional_center_'+array_counting[i]).val());

            if($('.from_date_'+array_counting[i]).val()  == ''){

                $('.error_from_date_'+array_counting[i]).text('Please enter From Date.');
                $('.from_date_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_from_date_'+array_counting[i]).text('');
            }
            
            if($('.to_date_'+array_counting[i]).val()  == ''){

                $('.error_to_date_'+array_counting[i]).text('Please enter To Date.');
                $('.to_date_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_to_date_'+array_counting[i]).text('');
            }

            if(($('.regional_center_'+array_counting[i]).val()  == '') || $('.regional_center_'+array_counting[i]).val() == null){

                $('.error_regional_center_'+array_counting[i]).text('Please Select Regional Center.');
                $('.regional_center_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_regional_center_'+array_counting[i]).text('');
            }
            
            if(($('.template_'+array_counting[i]).val()  == '')|| ($('.template_'+array_counting[i]).val()  == null)){

                $('.error_template_'+array_counting[i]).text('Please Select Template.');
                $('.template_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_template_'+array_counting[i]).text('');
            }
            
            if(($('.categories_'+array_counting[i]).val() == '')||$('.categories_'+array_counting[i]).val() == null){

                $('.error_categories_'+array_counting[i]).text('Please Select Categories');
                $('.categories_'+array_counting[i]).focus();
                condition = false;
                break;
            }else{

                $('.error_categories_'+array_counting[i]).text('');
            }
        }

        if(condition){

            var formdata = new FormData($('.template_management')[0]);
            console.log("formdata",formdata);
            // return false;            
            $.ajax({
                method: "POST",
                url: baseurl + "/admin/template-management/store",
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

                            window.location.href = baseurl + "/admin/template-management/index";

                        });
                    }
                }

            });  
        }
        
    })


    $('.edit_template_management').on('submit',function(e){

        if($('.template_name').val()  == ''){

            $('.error_template_name').text('Please enter Template name.');
            $('.template_name').focus();
            return false;

        }else{

            $('.error_template_name').text('');
        }

        if($('.from_date').val()  == ''){

            $('.error_from_date').text('Please enter From Date.');
            $('.from_date').focus();
            return false;

        }else{

            $('.error_from_date').text('');
        }
        
        if($('.to_date').val()  == ''){

            $('.error_to_date').text('Please enter To Date.');
            $('.to_date').focus();
            return false;

        }else{

            $('.error_to_date').text('');
        }

        if(($('.regional_center').val()  == '') || $('.regional_center').val() == null){

            $('.error_regional_center').text('Please Select Regional Center.');
            $('.regional_center').focus();
            return false;

        }else{

            $('.error_regional_center').text('');
        }
        
        if(($('.template').val()  == '') || ($('.template').val()  == null)){

            $('.error_template').text('Please Select Template.');
            $('.template').focus();
            return false;

        }else{

            $('.error_template').text('');
        }
        
        if(($('.categories').val() == '')||$('.categories').val() == null){

            $('.error_categories').text('Please Select Categories.');
            $('.categories').focus();
            return false;
    
        }else{

            $('.error_categories').text('');
        }    
    })
    
    // $(document).on('change','.change_from_date',function(){
    // // alert(123456789);
    // // return false;
    
    // });    
    // $(".edit_from_date").datepicker({
    //     dateFormat : "dd-mm-yy",
    //     onSelect: function (selected) {
    //         var dt = new Date(selected);
    //         dt.setDate(dt.getDate() + 1);
    //         $(".edit_to_date").datepicker("option", "minDate", dt);
    //     }
    // });
    // $(".edit_to_date").datepicker({
    //     dateFormat : "dd-mm-yy",
    //     onSelect: function (selected) {
    //         var dt = new Date(selected);
    //         dt.setDate(dt.getDate() - 1);
    //         $(".edit_from_date").datepicker("option", "maxDate", dt);
    //     }
    // });

    $(function(){
            
        $(".edit_to_date").datepicker({ dateFormat: 'dd-mm-yy' });
        
        $(".edit_from_date").datepicker({ dateFormat: 'dd-mm-yy' }).bind("change",function(){
            var minValue = $(".edit_from_date").val();
            minValue = $.datepicker.parseDate("dd-mm-yy", minValue);
            minValue.setDate(minValue.getDate()+1);
            $(".edit_to_date").datepicker( "option", "minDate", minValue );
        })
    });



    

     