        $(document).on('click','.add_more',function(){
            counting++;
            let project_center_id = $('#project_center_id').val();
            array_counting.push(counting);
            var manage_finance_manage_html = `<tr class="row_${counting}">
                    <td>${counting + 1}</td>
                    <td>
                    <input type="hidden" name="managefinance[${counting}][project_center_id]" value="${project_center_id}">      
                    <input type="hidden" name="managefinance[${counting}][template_id]" value="${temp_id}">
                        <select name="managefinance[${counting}][project_title]" data-id="${counting}" class="form-select project_title_${counting} change_budget project_title" >
                            <option selected disabled>Project ID/Title</option>
                            ${getProjectTitle(select_project_title)}
                        </select>
                        <span class="text-danger error_project_title_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control budgetcode_${counting}"  name="managefinance[${counting}][budgetcode]" placeholder="Budget code">
                        <span class="text-danger error_budgetcode_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control bere_${counting}" name="managefinance[${counting}][bere]" placeholder="BE/RE">
                        <span class="text-danger error_bere_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control openingbalance openingbalance_${counting}" data-id="${counting}" name="managefinance[${counting}][openingbalance]" placeholder="Opning Balance">
                        <span class="text-danger error_openingbalance_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control fundsreceived fundsreceived_${counting}" data-id="${counting}" name="managefinance[${counting}][fundsreceived]" placeholder="Funds Received">
                        <span class="text-danger error_fundsreceived_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control totalfundsavailable totalfundsavailable_${counting}" data-id="${counting}" name="managefinance[${counting}][totalfundsavailable]" placeholder="Total Funds Available" readonly>
                        <span class="text-danger error_totalfundsavailable_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control expenditureincurred expenditureincurred_${counting}" data-id="${counting}" name="managefinance[${counting}][expenditureincurred]" placeholder="Expenditure Incurred">
                        <span class="text-danger error_expenditureincurred_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control committedliabilities committedliabilities_${counting}" data-id="${counting}" name="managefinance[${counting}][committedliabilities]" placeholder="Committed Liabilities">
                        <span class="text-danger error_committedliabilities_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control balance balance_${counting}" name="managefinance[${counting}][balance]" data-id="${counting}" placeholder="Balance" readonly>
                        <span class="text-danger error_balance_${counting}"></span>
                    </td>
                    <td>
                        <input type="text" class="form-control remarks_${counting}" name="managefinance[${counting}][remarks]" placeholder="Remarks">
                        <span class="text-danger error_Remarks_${counting}"></span>
                    </td>
                    <td>
                        
                        <a href="#" class="actionbtn remove_btn" data-id="${counting}"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>`;
            
            $('#multiple_finance_manage_container').append(manage_finance_manage_html);
        });

        
        // remove button
        $(document).on('click','.remove_btn',function(){

            let project_title_val = $('.project_title_'+$(this).data("id")).val();
            let project_title_text = $('.project_title_'+$(this).data("id")).find(":selected").text();
            let center_id = $('.center_id').val();
            select_project_title.splice($.inArray(project_title_val,select_project_title),1);

            if(form_first_count > counting){

                $.ajax({
                method: "GET",
                url: baseurl + "/manage/managefinance/financeDeleteById/"+$(this).data("db_id"),
                contentType: false,
                processData: false,
                
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

                                window.location.href = baseurl + "/manage/managefinance/index/"+encode_temp_id+'/'+center_id;

                            });
                        }
                    }        
                });

            }else{

                $('.row_'+$(this).data("id")).remove();

            }
            
            counting--;

            if($(`.project_title[value='${project_title_val}']`).length > 0){
            
                console.log("if");
            
            }else{
            
                console.log("else");
                if(project_title_text != 'Project ID/Title'){

                    $('.row_'+$(this).data("id")).remove();
                    $(`.project_title`).append($("<option></option>").attr("value", project_title_val).text(project_title_text));

                }
            
            }          
            
        });


        $('.finance_manage').on('submit',function(e){

            e.preventDefault();
            let condition = true;

            let center_id = $('.center_id').val();

            for(let i=0;i< array_counting.length; i++){

                if($('.project_title_'+array_counting[i]).val()  == ''){

                    $('.error_project_title_'+array_counting[i]).text('Please enter project title.');
                    $('.project_title_'+array_counting[i]).focus();
                    condition = false;
                    break;
            
                }else{

                    $('.error_project_title_'+array_counting[i]).text('');
                } 

                    if($('.budgetcode_'+array_counting[i]).val()  == ''){

                        $('.error_budgetcode_'+array_counting[i]).text('Please enter Budget Code.');
                        $('.cost_'+array_counting[i]).focus();
                        condition = false;
                        break;

                    }else{

                        let val = $('.budgetcode_'+array_counting[i]).val();
                        let regex = /^(\+|-)?(\d*\.?\d*)$/;

                        if (regex.test(val)) {
                        
                            $('.error_budgetcode_'+array_counting[i]).text('');
            
                        }else{

                            $('.error_budgetcode_'+array_counting[i]).text('');
                            $('.error_budgetcode_'+array_counting[i]).text('Please Enter a valid Budget Code');
                            $('.error_budgetcode_'+array_counting[i]).focus();
                            return false;
                        }
                    } 
               
                if($('.bere_'+array_counting[i]).val()  == ''){

                    $('.error_bere_'+array_counting[i]).text('Please enter bere.');
                    $('.bere_'+array_counting[i]).focus();
                    condition = false;
                    break;

                }else{

                    let val = $('.bere_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_bere_'+array_counting[i]).text('');
                    }else{

                        $('.error_bere_'+array_counting[i]).text('');
                        $('.error_bere_'+array_counting[i]).text('Please Enter a valid BE/RE');
                        $('.error_bere_'+array_counting[i]).focus();
                        return false;
                    }
                } 
                                
                if($('.openingbalance_'+array_counting[i]).val()  != ''){

                    let val = $('.openingbalance_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_openingbalance_'+array_counting[i]).text('');
                    }else{

                        $('.error_openingbalance_'+array_counting[i]).text('');
                        $('.error_openingbalance_'+array_counting[i]).text('Please Enter a valid Opening Balance');
                        $('.error_openingbalance_'+array_counting[i]).focus();
                        return false;
                    }
                } 
                
                if($('.fundsreceived_'+array_counting[i]).val()  != ''){

                    let val = $('.fundsreceived_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_fundsreceived_'+array_counting[i]).text('');
                    }else{

                        $('.error_fundsreceived_'+array_counting[i]).text('');
                        $('.error_fundsreceived_'+array_counting[i]).text('Please Enter a valid Funds Received');
                        $('.error_fundsreceived_'+array_counting[i]).focus();
                        return false;
                    }
                } 
                
                if($('.totalfundsavailable_'+array_counting[i]).val()  == ''){

                    let val = $('.totalfundsavailable_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_totalfundsavailable_'+array_counting[i]).text('');
                    }else{

                        $('.error_totalfundsavailable_'+array_counting[i]).text('');
                        $('.error_totalfundsavailable_'+array_counting[i]).text('Please Enter a valid Total Funds Available');
                        $('.error_totalfundsavailable_'+array_counting[i]).focus();
                        return false;
                    }
                } 
                
                if($('.expenditureincurred_'+array_counting[i]).val()  != ''){

                    let val = $('.expenditureincurred_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_expenditureincurred_'+array_counting[i]).text('');
                    }else{

                        $('.error_expenditureincurred_'+array_counting[i]).text('');
                        $('.error_expenditureincurred_'+array_counting[i]).text('Please Enter a valid Expend Itureincurred');
                        $('.error_expenditureincurred_'+array_counting[i]).focus();
                        return false;
                    }
                } 
                

                if($('.committedliabilities_'+array_counting[i]).val()  != ''){

                    let val = $('.committedliabilities_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_committedliabilities_'+array_counting[i]).text('');
                    }else{

                        $('.error_committedliabilities_'+array_counting[i]).text('');
                        $('.error_committedliabilities_'+array_counting[i]).text('Please Enter a valid Committed Liabilities');
                        $('.error_committedliabilities_'+array_counting[i]).focus();
                        return false;
                    }
                } 
                
                if($('.balance_'+array_counting[i]).val()  != ''){

                    let val = $('.balance_'+array_counting[i]).val();
                    let regex = /^(\+|-)?(\d*\.?\d*)$/;
            
                    if (regex.test(val)) {
                    
                        $('.error_balance_'+array_counting[i]).text('');
                    }else{

                        $('.error_balance_'+array_counting[i]).text('');
                        $('.error_balance_'+array_counting[i]).text('Please Enter a valid Balance');
                        $('.error_balance_'+array_counting[i]).focus();
                        return false;
                    }
                } 
            }
            
            if(condition){
                
                var formdata = new FormData($('.finance_manage')[0]);

                $.ajax({
                    method: "POST",
                    url: baseurl + "/manage/managefinance/store",
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

                                    window.location.href = baseurl + "/manage/managefinance/index/"+encode_temp_id+'/'+center_id;

                                });
                        }
                    }
                });  
            }            
        })

        $(document).on('change','.change_budget',function() {

            let index = $(this).data("id");

            select_project_title.push($(this).val());
   
            array_counting.map((value,key) => {
                if($(this).data("id") != value){
                    
                    $(`.project_title_${value} option[value='${$(this).val()}']`).remove();
                }
            })

            select_project_title.push($(this).val());
            console.log("select_project_title.push($(this).val())",select_project_title);
            var change_id = $(this).val();
            var formdata = {id:change_id};
            var counting = $(this).data("id");

            $.ajax({
                    method: "POST",
                    url: baseurl + "/manage/managefinance/getbudgetcode",
                    data:formdata,
                    headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') },
                    success: function(response) {

                        budget_cost = response.data.budget_cost;
                        $('.budgetcode_'+counting).val(budget_cost);
                        // console.log("response",response.old_data.be_re);
                        if (response.old_data != null) {
                            // $('.budgetcode_' + index).val(response.old_data.budget_code);
                            $('.bere_' + index).val(response.old_data.be_re);
                            $('.openingbalance_' + index).val(response.old_data.opening_balance);
                            $('.fundsreceived_' + index).val(response.old_data.fund_received);
                            $('.totalfundsavailable_' + index).val(response.old_data.total_funds);
                            $('.expenditureincurred_' + index).val(response.old_data.expenditure_incurred);
                            $('.committedliabilities_' + index).val(response.old_data.commited_liabilities);
                            $('.balance_' + index).val(response.old_data.balance);
                            $('.remarks_' + index).val(response.old_data.remark);
                        }
                        return false;


                    },
                    complete: function(xhr, textStatus) {
                        console.log(xhr.status);
                    }

                }); 
            return false;
        });


        $(document).on('keyup','.openingbalance',function(){
            let id = $(this).data("id");
           if($('.openingbalance_'+id).val() != '' && $('.fundsreceived_'+id).val() != ''){
            var total_fundsavailable = ($('.openingbalance_'+id).val()*1 + $('.fundsreceived_'+id).val()*1);
            $('.totalfundsavailable_'+id).val(total_fundsavailable.toFixed(2));
           }
        });
        $(document).on('keyup','.fundsreceived',function(){
            let id = $(this).data("id");
           if($('.openingbalance_'+id).val() != '' && $('.fundsreceived_'+id).val() != ''){
            var total_fundsavailable = ($('.openingbalance_'+id).val()*1 + $('.fundsreceived_'+id).val()*1);
            $('.totalfundsavailable_'+id).val(total_fundsavailable.toFixed(2));
           }
        });
        $(document).on('keyup','.expenditureincurred',function(){
            let id = $(this).data("id");
           if($('.expenditureincurred_'+id).val() != '' && $('.committedliabilities_'+id).val() != ''){
            var total_balance = ($('.totalfundsavailable_'+id).val()*1) - ($('.expenditureincurred_'+id).val()*1 + $('.committedliabilities_'+id).val()*1)
            $('.balance_'+id).val(total_balance.toFixed(2));
           }
        });
        $(document).on('keyup','.committedliabilities',function(){
            let id = $(this).data("id");
           if($('.expenditureincurred_'+id).val() != '' && $('.committedliabilities_'+id).val() != ''){
            var total_balance = ($('.totalfundsavailable_'+id).val()*1) - ($('.expenditureincurred_'+id).val()*1 + $('.committedliabilities_'+id).val()*1)
            $('.balance_'+id).val(total_balance.toFixed(2));
           }
   
        });



$(document).on('change','.center_change',function(){

    let center_id = $('.center_id').val();
    window.location.href = baseurl + "/manage/managefinance/index/"+encode_temp_id+'/'+center_id;

}) 


