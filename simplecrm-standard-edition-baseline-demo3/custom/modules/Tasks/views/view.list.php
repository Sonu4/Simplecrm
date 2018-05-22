<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/Tasks/TasksListViewSmarty.php');

class TasksViewList extends ViewList
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
		if(val=="Not Started")
		{
		$(this).html("<span class='label label-primary'>Not Started</span>");
		}else if(val=="Pending Input")
		{
		$(this).html("<span class='label label-warning'>Pending Input</span>");
		}else if(val=="In Progress")
		{
		$(this).html("<span class='label label-brown'>In Progress</span>");
		}else if(val=="Completed")
		{
		$(this).html("<span class='label label-success'>Completed</span>");
		}else if(val=="Deferred")
		{
		$(this).html("<span class='label label-danger'>Deferred</span>");
		}
	
});	
			})
		
		
		
		
		</script>
EOD;
		parent::display();
 	}

}

?>
