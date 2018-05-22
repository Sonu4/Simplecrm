<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class ACLRolesViewClassic extends ViewDetail {


 	function ACLRolesViewClassic(){
 		parent::ViewDetail();

        //turn off normal display of subpanels
        $this->options['show_subpanels'] = false; //no longer works in 6.3.0
 	}

 	function display(){
		$this->dv->process();
		//echo '<style type="text/css">@import url("custom/modules/ACLRoles/styles/securitygroups.css"); </style>';
        echo '<style type="text/css">@import url("custom/modules/ACLRoles/styles/roles.css"); </style>';
		$file = SugarController::getActionFilename($this->action);
		$this->includeClassicFile('modules/'. $this->module . '/'. $file . '.php');
		
		//written for making sticky Role
		echo $role = <<<script
	     <script>
	
	      $(document).ready(function() {
	    
          var stickyNavTop = $('#ACLEditView_Access_Header').offset().top;
          
          var stickyNav = function(){
          var scrollTop = $(window).scrollTop();

        
      
          if (scrollTop > stickyNavTop) {
          
           //alert(stickyNavTop);
         $('#ACLEditView_Access_Header').addClass('sticky');
         $('#viewlink').addClass('roled');
         $('#accesslink').addClass('white');
         $('#deletelink').addClass('red');
         $('#editlink').addClass('blue');
         $('#exportlink').addClass('orange');
         $('#importlink').addClass('pink');
         $('#listlink').addClass('grey');
         $('#massupdatelink').addClass('violet');
    
         } else {
         $('#ACLEditView_Access_Header').removeClass('sticky'); 
         $('#viewlink').removeClass('roled'); 
         $('#accesslink').removeClass('white'); 
         $('#deletelink').removeClass('red');
         $('#editlink').removeClass('blue'); 
         $('#exportlink').removeClass('orange'); 
         $('#importlink').removeClass('pink'); 
         $('#listlink').removeClass('grey'); 
         $('#massupdatelink').removeClass('violet'); 
         }
         };
 
        stickyNav();
 
        $(window).scroll(function() {
       stickyNav();
       });
      });
	    </script>
script;
		
		
		parent::display();
		
 	}
 	

 	function preDisplay(){
		parent::preDisplay();

		$this->options['show_subpanels'] = false; //eggsurplus: will display subpanels twice otherwise
 	}
}

?>
