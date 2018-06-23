<?php 
require_once('include/MVC/View/views/view.detail.php');
//ini_set("display_errors", "on");
class FP_eventsViewList extends ViewDetail{
   
    function display()
    {
     parent::display();
      
echo $js =<<<EOD
      <script>
      		$(document).click(function(){
              alert("Hi");
              console.log("Hello");
          });
      </script>  
EOD;
      		
 
		
       
      
    }

}

?>


