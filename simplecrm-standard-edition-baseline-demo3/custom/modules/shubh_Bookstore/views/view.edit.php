<?php
if(!defined('sugarEntry'))define('sugarEntry', true);




require_once('include/MVC/View/views/view.edit.php');


class shubh_BookstoreViewEdit extends ViewEdit{
    function shubh_BookstoreViewEdit()
    {
        parent::ViewEdit();
    }
    function display()
    {
    	parent::display();
    	
?>
            <script>
              $(document).ready(function(){

                var url="http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/service/simpleApi/getCountrys.php";
                 $.ajax({
                      method:'POST',
                      url:url,
                      dataType:'json',
                      success:function(data){
                       for(var i=0;i<data.length;i++){
                         $('#country_c').append('<option label="'+data[i].country+'" value="'+data[i].country+'">'+data[i].country+'</option>');
                       } 
                      },
                      error:function(request,status,error){
                       alert("Error");
                      }
                    });


                 $('#country_c').change(function(){
                     $('#states_c').empty();
                      var dataUrl={
                        country: $('#country_c').val()
                      };

                      $.ajax({
                        method:'POST',
                        url:"http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/service/simpleApi/getState.php",
                        data:dataUrl,
                        dataType:'json', 
                        success:function(data){
                        for(var i=0;i<data.length;i++){
                         $('#states_c').append('<option label="'+data[i].state+'" value="'+data[i].state+'">'+data[i].state+'</option>');
                        }
                       },
                        error:function(request,status,error){
                           alert("Error");
                        }
                      });
                }); 

                 $('#states_c').change(function(){
                     $('#cities_c').empty();
                      var dataUrl={
                        country: $('#country_c').val(),
                        state:$('#states_c').val()
                      };

                      $.ajax({
                        method:'POST',
                        url:"http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/service/simpleApi/getCities.php",
                        data:dataUrl,
                        dataType:'json', 
                        success:function(data){
                        for(var i=0;i<data.length;i++){
                         $('#cities_c').append('<option label="'+data[i].city+'" value="'+data[i].city+'">'+data[i].city+'</option>');
                        }
                       },
                        error:function(request,status,error){
                           alert("Error");
                        }
                      });
                }); 


              });


  
            </script>
<?php

        
    }
}


?>


<!-- SELECT DISTINCT  country  FROM glob -->
<!-- SELECT DISTINCT state FROM glob WHERE country='India' -->
<!-- SELECT DISTINCT city FROM glob WHERE state='Maharashtra' and country='India' or state='' and country='India' -->

























 


       <!--  if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}

		$this->dv->process();
		global $mod_strings, $sugar_config;
		global $db;
	
        $record_id = $this->bean->id;
        $baseUrl   = $sugar_config['site_url'] . '/index.php'; -->

       <!--  // global $sugar_config;
        // $new = empty($this->bean->id);
        // if ($new) {
        //     ?>
        //     <script>
        //         $(document).ready(function () {
        //             $('#update_text').closest('td').html('');
        //             $('#update_text_label').closest('td').html('');
        //             $('#internal').closest('td').html('');
        //             $('#internal_label').closest('td').html('');
        //             $('#addFileButton').closest('td').html('');
        //             $('#case_update_form_label').closest('td').html('');
        //         });

       
        //     </script>
        //     <?php

        // } -->