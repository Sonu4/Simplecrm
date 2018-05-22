<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/Meetings/MeetingsListViewSmarty.php');

class MeetingsViewList extends ViewList
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

		if(val=="Planned")
		{
		$(this).html("<span class='label label-primary'>Planned</span>");
		}else if(val=="Held")
		{
		$(this).html("<span class='label label-success'>Held</span>");
		}else if(val=="Not Held")
		{
		$(this).html("<span class='label label-danger'>Not Held</span>");
		}
	
});	
			})
		
		
		
		
		</script>
EOD;
		parent::display();
 	}

}

?>
