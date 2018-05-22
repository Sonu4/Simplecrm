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
            var country=[
            'Pakistan',
    		'Bangladesh',
    		'Nepal',
    		'Bhutan'
            ];

            var states=[
            'Arunachal Pradesh',
            'Andra Pradesh',
            'Jammu Kashmir',
            'Bengal',
            'Sikkim',
            'UP',
            'Maharashtra',
            'Goa',
            'Gujrat',
            'Tamilnadu',
            'Punjab',
            'Delhi',
            'Jharkhand'
            ];

            var cities=[
            'Nagpur',
            'Katol',
            'Ramtek',
            'Chandrapur',
            'Bramhapuri',
            'Nagbhid',
            'Sakoli',
            'Narkhed',
            'Bhandara',
            'Umred',
            'Mul'
            ];
       				$(document).ready(function(){

       					for(var i=0;i<country.length;i++) {
       						$('#country_c').append('<option label="'+country[i]+'" value="'+country[i]+'">'+country[i]+'</option>');
       				}

       					
       				


       						$('#country_c').change(function(){
       							if ($('#country_c').val()=='India') {

       								for(var i=0;i<states.length;i++) {
		       						$('#states_c').append('<option label="'+states[i]+'" value="'+states[i]+'">'+states[i]+'</option>');

		       						}

       							}else{
       								$('#states_c').empty();	
       							}
       						});



       						$('#states_c').change(function(){
       							if ($('#states_c').val()=='Maharashtra') {

       								for(var i=0;i<states.length;i++) {
		       						$('#cities_c').append('<option label="'+cities[i]+'" value="'+cities[i]+'">'+cities[i]+'</option>');

		       						}

       							}else{
       								$('#cities_c').empty();	
       							}
       						});


       					
       					
       				});
             </script>
<?php

        
    }
}


?>




























 


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