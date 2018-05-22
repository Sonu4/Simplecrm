<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class OpportunitiesViewEdit extends ViewEdit {

 	function OpportunitiesViewEdit(){
 		parent::ViewEdit();
 	}
 	
 	function display() {
		global $app_list_strings;
		$json = getJSONobj();
		$prob_array = $json->encode($app_list_strings['sales_probability_dom']);
		//~ print_r($prob_array);
		//~ exit;
		$prePopProb = '';
 		if(empty($this->bean->id) && empty($_REQUEST['probability'])) {
		   $prePopProb = 'document.getElementsByName(\'sales_stage\')[0].onchange();';
		}
$probability_script=<<<EOQ
	<script>
	prob_array = $prob_array;
	document.getElementsByName('sales_stage')[0].onchange = function() {
			if(typeof(document.getElementsByName('sales_stage')[0].value) != "undefined" && prob_array[document.getElementsByName('sales_stage')[0].value]
			&& typeof(document.getElementsByName('probability')[0]) != "undefined"
			) {
				document.getElementsByName('probability')[0].value = prob_array[document.getElementsByName('sales_stage')[0].value];
				SUGAR.util.callOnChangeListers(document.getElementsByName('probability')[0]);

			} 
		};
	$prePopProb
	</script>
	
EOQ;
           global $sugar_config;
	       global $db;
           global $current_user;
           global $timedate;
          
          $timeDate = new TimeDate();
            
                       
	 	$id=$this->bean->id;
        $timeDate = new TimeDate();
        $select_query = "SELECT  actual_date_closed_c from opportunities_cstm where id_c = '$id'";
		$select_result = $db->query($select_query);
		$row = $db->fetchByAssoc($select_result);
		$current_date = $row['actual_date_closed_c'];
		
                     
      $localDate = $timeDate->to_display_date_time($current_date, true, true, $current_user);
        
       
                        
      $dateclosed = explode(' ', $localDate); 
      
      
      $currentdat=$dateclosed[0];
     

		


               
   
     $datetime_var = $timedate->asUser($timedate->getNow(), $current_user);
     $datetime = explode(' ',$datetime_var);

     

    $currentdate = $datetime[0];
   

	
	echo "<script>
 		
 		$(document).ready(function() {
			$('#actual_date_closed_c_label').hide();
            $('#actual_date_closed_c').parent().parent().hide();
			$('#actual_date_closed_c').hide();
			$('#actual_date_closed_c_trigger').hide();
			//$('#actual_date_closed_c_label').parent().hide();
			var sales_stage = $('#sales_stage').val();

			var current_date ='$current_date';
			    
			 if(sales_stage == 'Closed Won' && current_date == '')
		 {
              
              $('#actual_date_closed_c').val('$currentdate');
	        
		  }
		  else if(sales_stage == 'Closed Won' && current_date != '')
			 
		 {	
			   
			 
		   $('#actual_date_closed_c').val('$currentdat');
	        
		  }
		   else
		 {
		     
			$('#actual_date_closed_c').val('');
			
		}
		 $('#sales_stage').change(function(){
		     
                      
			var sales_stage = $('#sales_stage').val();

			var current_date ='$current_date';
              
              
			 if(sales_stage == 'Closed Won' && current_date == '')
		 {
              
              $('#actual_date_closed_c').val('$currentdate');
	        
		  }
		  else if(sales_stage == 'Closed Won' && current_date != '')
			 
		 {	
			   
			 
		   $('#actual_date_closed_c').val('$currentdat');
	        
		  }
		   else
		 {
		     
			$('#actual_date_closed_c').val('');
			
		}
		});
    });	
</script>";

$opportunity_closed_lost = "SELECT  date_lost_c from opportunities_cstm where id_c = '$id'";
		$select_opportunity_result = $db->query($opportunity_closed_lost);
		$row_opportunity = $db->fetchByAssoc($select_opportunity_result);
		$opportunity_lost = $row_opportunity['date_lost_c'];
		
                     
      $local_Date = $timeDate->to_display_date_time($opportunity_lost, true, true, $current_user);
        
       
                        
      $lost_date = explode(' ', $local_Date); 
      
      
      $currentdat=$lost_date[0];
echo "<script>
	$(document).ready(function(){



		$('#date_lost_c').hide();
		$('#date_lost_c_label').hide();
		$('#date_lost_c_trigger').hide();
		$('#date_lost_c').parent().parent().hide();
		
		$('#sales_stage').change(function(){
		     
                      
			var sales_stage = $('#sales_stage').val();

			var current_date ='$current_date';
              
              
			 if(sales_stage == 'Closed Lost' && current_date == '')
		 {
              
              $('#date_lost_c').val('$currentdate');
	        
		  }
		  else if(sales_stage == 'Closed Lost' && current_date != '')
			 
		 {	
			   
			 
		   $('#date_lost_c').val('$currentdat');
	        
		  }
		   else
		 {
		     
			$('#date_lost_c').val('');
			
		}
		});
	
	});


</script>";	


echo $js = <<<EOD
<script>
	$(document).ready(function(){
		$('#reason_for_lost_c').hide();
		$('#reason_for_lost_c_label').hide();
		$('#reason_for_lost_c').parent().hide();
		
		var sales_stage = $('#sales_stage').val();
			if(sales_stage == 'Closed Lost')
			{
				$('#reason_for_lost_c').show();
				$('#reason_for_lost_c_label').show();
				$('#reason_for_lost_c').parent().show();
				addToValidate('EditView','reason_for_lost_c','Textarea',true,'Reason For Lost');
					 $('#reason_for_lost_c_label').html('Reason For Lost: <font color="red">*</font>');
			}
			else
			{
				$('#reason_for_lost_c').hide();
				$('#reason_for_lost_c_label').hide();
				$('#reason_for_lost_c').parent().hide();
				removeFromValidate('EditView','reason_for_lost_c'); 
				 $('#resolution_label').html('Reason For Lost: ');
			}
		
		$('#sales_stage').change(function(){
			var sales_stage = $('#sales_stage').val();
			if(sales_stage == 'Closed Lost')
			{
				$('#reason_for_lost_c').show();
				$('#reason_for_lost_c_label').show();
				$('#reason_for_lost_c').parent().show();
				addToValidate('EditView','reason_for_lost_c','Textarea',true,'Reason For Lost');
					 $('#reason_for_lost_c_label').html('Reason For Lost: <font color="red">*</font>');
				
			}
			else
			{
				$('#reason_for_lost_c').hide();
				$('#reason_for_lost_c_label').hide();
				$('#reason_for_lost_c').parent().hide();
				removeFromValidate('EditView','reason_for_lost_c'); 
				 $('#resolution_label').html('Reason For Lost: ');
			}
			
			
		});
	
	});
</script>
EOD;
	
			$this->ss->assign('PROBABILITY_SCRIPT', $probability_script);
			parent::display();
	}
}
?>
