<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/Leads/LeadsListViewSmarty.php');

class LeadsViewList extends ViewList
{
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay(){
         parent::preDisplay();

          }
  	function display()
 	{
		
			echo $js =<<<EOD
		<script>
		
		$(document).ready(function(){
		$(".status_custom").each(function() {
    var val=trim($(this).html());

		if(val=="New")
		{
		$(this).html("<span class='label label-primary'>New</span>");
		}else if(val=="Assigned")
		{
		$(this).html("<span class='label label-warning'>Assigned</span>");
		}else if(val=="In Process")
		{
		$(this).html("<span class='label label-brown'>In Process</span>");
		}else if(val=="Converted")
		{
		$(this).html("<span class='label label-success'>Converted</span>");
		}else if(val=="Recycled")
		{
		$(this).html("<span class='label label-default'>Recycled</span>");
		}else if(val=="Dead")
		{
		$(this).html("<span class='label label-danger'>Dead</span>");
		}
	
});	
			})
		
		
		
		
		</script>
EOD;
		parent::display();
 	}

}

?>
