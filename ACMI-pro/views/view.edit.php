<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class AccountsViewEdit extends ViewEdit {

 	function AccountsViewEdit(){
 		parent::ViewEdit();
 	}
 	function display()
 	{
 		global $current_user;
 		$current_user_id = $current_user->id;

 			$module ='Accounts';
 			require_once("modules/ACLRoles/ACLRole.php");
 			$acl_role_obj = new ACLRole();
 			$user_roles = $acl_role_obj->getUserRoles($current_user_id);
 			//echo "<pre>";
 			//print_r($user_roles);
 			$current_user_role = $user_roles[0];
 		// echo "<pre>";
 		// print_r($current_user);
                echo $css =<<<css
                        <style>

                        #LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(2){
                            display:none;
                        } 
                        #contact_through_c,#please_specify1_c,#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(3) > td:nth-child(4) > span,#please_specify2_c{
                            margin-right: 400px;
                            margin-left:100px; 
                        }
                        #contact_through_c_label,#cessation_date_c_label,#please_specify2_c_label,#please_specify1_c_label{
                            text-align: right;
                        }
                        #contact_through_c_label{
                          margin-right: 100px;
                        }
                        #cessation_date_c_label,#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(3) > td:nth-child(4){
                          display: none;
                        }
                        #please_specify2_c_label,#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(4){
                          display: none;
                        }
                        #reason_for_cessation_c_label,#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(2){
                          display: none; 
                        }
                        #please_specify_c_label,#please_specify_c{
                          display: none;
                        }
                       #client_no_c,#former_names_c,#please_specify_c,#group_of_companies_c,#client_type_c,#client_from_c{
                         margin-right: 400px;
                         margin-left:100px; 
                       }
                       #client_no_c_label,#former_names_c_label,#please_specify_c_label,#group_of_companies_c_label,#client_type_c_label,#client_type_c_label,#client_from_c_label{
                         text-align: right;
                        
                       }
                       #detailpanel_1,#detailpanel_3,#detailpanel_2{
                        margin-top:20px;
                       }
                        </style>
css;
 		echo $js =<<<js
 		<script>

 			
 		$(document).ready(function(){

/*----Changed By Shubham-------------*/
			

/*------------Hide And show Elements based on a conditions---------------------------------*/

			$("#tab2").click(function(){
				$('#started_as_client1_c').val($('#started_as_client_c').val());
			});

 			$('#type_of_entity_c').change(function(){
 					if($('#type_of_entity_c').val()=='Other'){	
 						$('#please_specify_c_label').show();
 						$('#please_specify_c').show();

 					}else{
 						$('#please_specify_c_label').hide();
 						$('#please_specify_c').hide();
 					}

 			});

 			


 			$('#contact_through_c').change(function(){
 					if($('#contact_through_c').val()=='Other'){
 						$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(2)').show();
 						$('#please_specify1_c_label').show();
 						$('#please_specify1_c').show();
 						$('#name1_c').attr('hidden','true');
 						$('#name1_c_label').empty();
 					}else{
 						$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(2)').hide();
 						$('#please_specify1_c_label').hide();
 						$('#please_specify1_c').hide();
 						$('#name1_c').attr('hidden','true');
 					}
 		

 				if($('#contact_through_c').val()=='Consultant'||$('#contact_through_c').val()=='Other_Clients'|| $('#contact_through_c').val()=='Reference' ){
 					$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(2)').show();
 					$('#name1_c_label').text('Name:');
 					$('#name1_c').removeAttr('hidden');
 					
 				}

 			});



 			

 			
 			
 			$('#is_ceased_c').change(function(){
 					if(this.checked){
            $('#reason_for_cessation_c').val('');
 						$('#reason_for_cessation_c_label').show();
 						$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(2)').show();
 						$('#cessation_date_c_label,#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(3) > td:nth-child(4)').show();

 					}else{
 						$('#reason_for_cessation_c_label').hide();
 						$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(2)').hide();

 						$('#cessation_date_c_label,#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(3) > td:nth-child(4)').hide();
 					}


 					
 			    });

 			

 			
 			$('#reason_for_cessation_c').change(function(){
 				
 					if($('#reason_for_cessation_c').val()=='Other'){
 						$('#please_specify2_c_label').show();
 						$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(4)').show();
 					}else{
 						$('#please_specify2_c_label').hide();
 						$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(4)').hide();
 					}
 			});

 			$('#is_ceased_c').change(function(){
 				if(this.checked){
 				}else{
 					$('#please_specify2_c_label').hide();
 					$('#LBL_EDITVIEW_PANEL1 > tbody > tr:nth-child(4) > td:nth-child(4)').hide();
 				}

 			});

 			
/*-----Calculates The Date From ------------------------------------*/
 			
 		

       $.event.special.inputchange = {
            setup: function() {
                var self = this, val;
                $.data(this, 'timer', window.setInterval(function() {
                    val = self.value;
                    if ( $.data( self, 'cache') != val ) {
                        $.data( self, 'cache', val );
                        $( self ).trigger( 'inputchange' );
                    }
                }, 20));
            },
            teardown: function() {
                window.clearInterval( $.data(this, 'timer') );
            },
            add: function() {
                $.data(this, 'cache', this.value);
            }
        };

	   	

       $('#started_as_client_c').on('inputchange', function() {
          changeDate();
       });
		

 			

			
/*--------Alert Before Saving Cesation date if Lesser Than Started Client Date---------*/			
			$('#SAVE_FOOTER').click(function(){
				if(Date.parse($('#started_as_client1_c').val()) < Date.parse($('#cessation_date_c').val())){
					alert('Cessation date can not be lesser than Started As a client date')
				}
			});

			$('#SAVE_HEADER').click(function(){
				if(Date.parse($('#started_as_client1_c').val()) < Date.parse($('#cessation_date_c').val())){
					alert('Cessation date can not be lesser than Started As a client date')
				}
			});

/*---------------------Changed By Shubham------------------------*/
 		});
    function changeDate(){

      if(Date.parse($('#started_as_client_c').val()) > new Date()){
            alert('Start Date Cant be more than today');
            $('#started_as_client_c').val(' ');
            
          }else{
            
            var user_date = Date.parse($('#started_as_client_c').val());
            var today_date = new Date();
            var diff_date =  user_date - today_date;

            var num_years = diff_date/31536000000;
            var num_months = (diff_date % 31536000000)/2628000000;
            var num_days = ((diff_date % 31536000000) % 2628000000)/86400000;

            var days=Math.floor(num_days);
            var months=Math.floor(num_months);
            var years=Math.floor(num_years);

            var d=Math.abs(1+days);
            var m=Math.abs(1+months);
            var y=Math.abs(1+years);

            
            

            $('#client_from_c').val(d+' Days & '+m+' Months & '+y+' Years');
            

          } 
      }
 		</script>

js;


		
 		
 		parent::display();
 	}

 }
 ?>
