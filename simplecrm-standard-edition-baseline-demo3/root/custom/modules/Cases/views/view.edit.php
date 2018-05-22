<?php
 /**
 * 
 * 
 * @package 
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
require_once('include/MVC/View/views/view.edit.php');
require_once('include/SugarTinyMCE.php');

class CasesViewEdit extends ViewEdit {

    function CasesViewEdit(){
        parent::ViewEdit();
    }

    function display(){
        parent::display();
        global $sugar_config;
        $new = empty($this->bean->id);
        if($new){
            ?>
            <script>
                $(document).ready(function(){
                    $('#update_text').closest('td').html('');
                    $('#update_text_label').closest('td').html('');
                    $('#internal').closest('td').html('');
                    $('#internal_label').closest('td').html('');
                    $('#addFileButton').closest('td').html('');
                    $('#case_update_form_label').closest('td').html('');
                });
            </script>
        <?php
        }
        $tiny = new SugarTinyMCE();
        echo $tiny->getInstance('update_text,description', 'email_compose_light');

echo $javscript =<<<EOD
		<script>
		$(document).ready(function(){
			var fullDate = new Date()
 
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
var twoDigitDate = ((fullDate.getDate().toString().length) == 1)? '0'+(fullDate.getDate()) : (fullDate.getDate());
var currentDate =  twoDigitMonth + "/"+ twoDigitDate +"/" + fullDate.getFullYear();

			
		for(i = 1; i < 10; i++) { 
		$("#current_level"+i+"_c").attr("disabled", true);
		$("#level_"+i+"_date_complted_c").prop("readonly", true);	

		}

			if($("#current_level_c").prop("checked") == true){	
			$("#current_level2_c").removeAttr("disabled");
			for(i = 2; i < 10; i++) { 
			if($("#current_level"+i+"_c").prop("checked") == false){		
				
			$("#current_level"+i+"_c").attr('checked', false); 	
			$("#level_"+i+"_date_complted_c").removeClass("date_input");
		
			$("#level_"+i+"_date_complted_c").removeAttr("value");
		
			$("#level_"+i+"_date_complted_c").val("");
			
			for(n = i+1; n < 10; n++) {
			$("#current_level"+n+"_c").attr('checked', false); 	
			$("#level_"+n+"_date_complted_c").removeClass("date_input");
		
			$("#level_"+n+"_date_complted_c").removeAttr("value");
			$("#level_"+n+"_date_complted_c").val("");
			}	 
			
			}else
			{

				
			$("#current_level"+i+"_c").removeAttr("disabled");
			var j=i+1;
			$("#current_level"+j+"_c").removeAttr("disabled");
			

			}
			}
			}
			


$("#current_level_c").change(function() {
	if(this.checked) {
	$("#current_level2_c").removeAttr("disabled");	

    }else
    {
	for(i = 1; i < 10; i++) { 
	var j=i-1;	
	$("#level_"+j+"_date_complted_c").val("");		
	$("#current_level"+i+"_c").attr("disabled", true);
	$("#current_level"+i+"_c").attr('checked', false);
	}
	}
});	

$("#current_level2_c").change(function() {
	 if(this.checked) {
	$("#current_level3_c").removeAttr("disabled");	
    }else
    {
	for(i = 3; i < 10; i++) { 
	var j=i-1;	
	$("#level_"+j+"_date_complted_c").val("");		
	$("#current_level"+i+"_c").attr("disabled", true);
	$("#current_level"+i+"_c").attr('checked', false);
	}
	}
	
});	

$("#current_level3_c").change(function() {
	 if(this.checked) {
	$("#current_level4_c").removeAttr("disabled");	
    }else
    {
	for(i = 4; i < 10; i++) { 
	var j=i-1;	
	$("#level_"+j+"_date_complted_c").val("");		
	$("#current_level"+i+"_c").attr("disabled", true);
	$("#current_level"+i+"_c").attr('checked', false);
	}
	}
	
});	

$("#current_level4_c").change(function() {
	 if(this.checked) {
	$("#current_level5_c").removeAttr("disabled");	
    }else
    {
	for(i = 5; i < 10; i++) { 
	var j=i-1;	
	$("#level_"+j+"_date_complted_c").val("");		
	$("#current_level"+i+"_c").attr("disabled", true);
	$("#current_level"+i+"_c").attr('checked', false);
	}
	}
	
});	

$("#current_level5_c").change(function() {
	 if(this.checked) {
	$("#current_level6_c").removeAttr("disabled");	
    }else
    {
	for(i = 6; i < 10; i++) { 
	var j=i-1;	
	$("#level_"+j+"_date_complted_c").val("");		
	$("#current_level"+i+"_c").attr("disabled", true);
	$("#current_level"+i+"_c").attr('checked', false);
	}
	}
	
});	

$("#current_level6_c").change(function() {
	 if(this.checked) {
    }else
    {
	for(i = 6; i < 10; i++) { 
	var j=i-1;	
	$("#level_"+j+"_date_complted_c").val("");		
	
	}
	}
	
});	


		var state = $('#state').val();
		if(state =='Closed')
		{
					addToValidate('EditView','resolution','resolution',true,'resolution');
					 $('#resolution_label').html('Resolution: <font color="red">*</font>');
		}
		else
			{
					removeFromValidate('EditView','resolution'); // else remove the validtion applied
						 $('#resolution_label').html('Resolution: ');
			}
		$('#state').change(function(){
		var state = $('#state').val();
		if(state =='Closed')
		{
					addToValidate('EditView','resolution','resolution',true,'resolution');
					 $('#resolution_label').html('Resolution: <font color="red">*</font>');
		}
		else
			{
					removeFromValidate('EditView','resolution'); // else remove the validtion applied
						 $('#resolution_label').html('Resolution: ');
			}
		
		});
SubNatureDropdown();
$("#type1_c").change(function(){
					SubNatureDropdown();
				});
				function SubNatureDropdown()
				{
					//console.log('Hi');
					var sub_nature = $('#sub_type_c').val();
					//console.log(sub_nature);
				//alert(city);
				var nature_of_complaint = $("#type1_c").find("option:selected").val().replace(/ /g,"_");
				//alert(nature_of_complaint);
				var citiesOptions = SUGAR.language.languages.app_list_strings['cstm_'+nature_of_complaint+'_list'];
				//alert(citiesOptions);
				$('#sub_type_c').html('');
				citiesList = '';
				//console.log('Hi');
				for(var key in citiesOptions)
				{
				
					if(sub_nature == key){
					//console.log(key);
						citiesList += '<option value="'+key+'" selected="selected">'+citiesOptions[key]+'</option>';
					} else {
						citiesList += '<option value="'+key+'">'+citiesOptions[key]+'</option>';
					}
				}
				//alert(citiesList);
					$('#sub_type_c').append(citiesList);
				}
		});
		</script>
EOD;
	/******************Added by Noresha******************************/	
	echo $js=<<<dependency
	<script>
		$(document).ready(function(){
			/****************** START - Dependency on Category************************/
			var category = $('#type').val();
			if(category == 'Minor_Defect'){
				$('#type1_c').parent().parent().show();
				addToValidate('EditView','type1_c','type1_c',true,'Request Type');
				$('#type1_c_label').html('Request Type: <font color="red">*</font>');
				addToValidate('EditView','sub_type_c','sub_type_c',true,'Request Sub Type');
				$('#sub_type_c_label').html('Request Sub Type: <font color="red">*</font>');
			}else{
				$('#type1_c').parent().parent().hide();
				removeFromValidate('EditView','type1_c'); 
				$('#type1_c_label').html('Request Type: ');
				removeFromValidate('EditView','sub_type_c'); 
				$('#sub_type_c_label').html('Request Sub Type: ');
			}
			$('#type').change(function(){
				var category = $('#type').val();
			if(category == 'Minor_Defect'){
				$('#type1_c').parent().parent().show();
				addToValidate('EditView','type1_c','type1_c',true,'Request Type');
				$('#type1_c_label').html('Request Type: <font color="red">*</font>');
				addToValidate('EditView','sub_type_c','sub_type_c',true,'Request Sub Type');
				$('#sub_type_c_label').html('Request Sub Type: <font color="red">*</font>');
			}else{
				$('#type1_c').parent().parent().hide();
				removeFromValidate('EditView','type1_c'); 
				$('#type1_c_label').html('Request Type: ');
				removeFromValidate('EditView','sub_type_c'); 
				$('#sub_type_c_label').html('Request Sub Type: ');
			}
			});
			/******************END - Dependency on Category************************/
			
		});
	</script>
dependency;
		echo $script=<<<subjectline
		<script>
		$(document).ready(function(){
			subject_details();
		});
		/*****************START -Framing Subject Line**************************/
			function subject_details(){
				var customer_name = $('#scrm_retail_customer_cases_1_name').val();
				var category = SUGAR.language.languages.app_list_strings['case_type_dom'][$('#type').val()];				
				var request_type = SUGAR.language.languages.app_list_strings['type_1'][$('#type1_c').val()];
				var request_sub_type = SUGAR.language.languages.app_list_strings['sub_type_c_list'][$('#sub_type_c').val()];
			 //if(category != '' && request_type != '' && request_sub_type != ''){
				$('#type').change(function(){
					var category = SUGAR.language.languages.app_list_strings['case_type_dom'][$('#type').val()];	
					if(category == 'Service Request'){
						$('#type1_c').change(function(){
						//console.log('Hi');					
							var category = SUGAR.language.languages.app_list_strings['case_type_dom'][$('#type').val()];				
							var request_type = SUGAR.language.languages.app_list_strings['type_1'][$('#type1_c').val()];
							var request_sub_type = SUGAR.language.languages.app_list_strings['sub_type_c_list'][$('#sub_type_c').val()];
							$('#name').val(customer_name + ' - ' + category + ' - ' + request_type + ' - ' + request_sub_type);
						});
						$('#sub_type_c').change(function(){					
							var category = SUGAR.language.languages.app_list_strings['case_type_dom'][$('#type').val()];				
							var request_type = SUGAR.language.languages.app_list_strings['type_1'][$('#type1_c').val()];
							var request_sub_type = SUGAR.language.languages.app_list_strings['sub_type_c_list'][$('#sub_type_c').val()];
							$('#name').val(customer_name + ' - ' + category + ' - ' + request_type + ' - ' + request_sub_type);
						});
					}else{
						$('#name').val(customer_name + ' - ' + category);
					}
				});
				
				 	
				//}
			} 
			/******************END - Framing Subject Line**************************/
			</script>
subjectline;
		
    }

}
