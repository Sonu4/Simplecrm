<?php 
require_once 'config.php';
require_once('include/MVC/View/views/view.list.php');
require_once('modules/shubh_Bookstore/shubh_BookstoreListViewSmarty.php');
//ini_set("display_errors", "on");
class shubh_BookstoreViewList extends ViewList{
   
    function display()
    {
     $your_url = $GLOBALS['sugar_config']['site_url'];
        $url_main=$your_url.'index.php?entryPoint=passData';
$js =<<<EOD
<script>
		$(document).ready(function(){


      
        $('#MassUpdate > table > tbody > tr > td:last-child').append('<i style="cursor:pointer;color:#6d6d6d !important" class="fa fa-eye hello" aria-hidden="false"></i>').click(function(){
              $('#addPage').modal('toggle');     
        });
        

        // $('#txtName').text($('#MassUpdate > table > tbody > tr:nth-child(1) > td.bookstore_custom.footable-visible.footable-first-column').attr("data-previewid"));

        $(' #MassUpdate > table > tbody').find('tr').click(function(){  
               var row=$(this).find('td.bookstore_custom.footable-visible.footable-first-column').attr("data-previewid");
                 var response=$.ajax({
                      url:'$url_main',
                      dataType:"json",
                      type:"POST",
                      data:{id:row},
                      success:function(data){

                          $(data.result).each(function(index,val){
                            $('#txtBookcover').attr('src','upload/'+val.id+'_bookcover');
                             $('#txtName').html(val.name);
                             $('#txtBootkTitle').html(val.bookstore);
                             $('#txtPublishingDate').text(val.publishing_date_c);
                             $('#txtCountries').text(val.countrys_c);
                             $('#txtAssignedTo').html(val.user_name);
                             var str=val.cities_c;
                             var res=str.split("_");
                             $('#txtCities').text(res[2]);
                             $('#txtBookAuther').html(val.bookauther);
                             $('#txtAccounts').text(val.ac_name);
                             $('#txtDateCreated').text(val.date_entered);
                             str=val.states_c;
                             res=str.split("_");
                             $('#txtStates').text(res[1]);
                            
                             
                          });

                           
                      },
                      // error:function(xhr,status){
                      //   alert(xhr+'  :'+status);
                      //}
              
                     

                  });          
         


          });


		});		
		</script>   
<body>
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail View</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
         
          <label>Name</label> <br>
          <label id="txtName"></label>
     
          <br>
          <br>
          <br>
          
          <label>Book Title</label> <br>
          <label id="txtBootkTitle"></label>

          <br>
          <br>
          <br>
          
          <label>Publishing Date</label> <br>
          <label id="txtPublishingDate"></label>
          <br>
          <br>
          <br>
          
          <label>Bookcover</label> <br>
          <img id="txtBookcover" width="180px" height="180px">
          <br>
          <br>
          <br>
          
          <label>Countries</label> <br>
          <label id="txtCountries"></label>
          <br>
          <br>
          <br>
          
          <label>Cities</label> <br>
          <label id="txtCities"></label>
        </div>
        <div class="col-md-6">
            
              <label>Assigned To</label> <br>
              <label id="txtAssignedTo"></label>
               <br>
               <br>
               <br>
               <label>Book Auther</label> <br>
              <label id="txtBookAuther"></label>
              <br>
               <br>
               <br>
              <label>Accounts</label> <br>
              <label id="txtAccounts"></label>
              <br>
              <br>
              <br>
              
              <label>Date Creted</label> <br>
              <label id="txtDateCreated"></label>
              <br>
              <br>
              <br>
              
              <label>States</label> <br>
              <label id="txtStates"></label>
        
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>  
    </div>
  </div>
</div>
</body>
EOD;
      		
  echo $js;
		parent::display();
      
       
      
    }

}

?>






<!-- bean->i php in module-> -->




                     <!--   $('#txtName').text(data.id);

//
//this portion is useless in this program but usefull in real life scenario when you have to acces nested json in real life.

                         // $('#txtName').text(val.name_value_list.name.value); // this is the way to access the json array data.
                         // $('#txtBootkTitle').text(val.name_value_list.bookstore.value);
                         // $('#txtPublishingDate').text(val.name_value_list.publishing_date_c.value);
                         // $('#txtBookAuther').text(val.name_value_list.bookauther.value);
                         // $('#txtCountries').text(val.name_value_list.countrys_c.value);
                         // $('#txtStates').text(val.name_value_list.states_c.value);
                         // $('#txtCities').text(val.name_value_list.cities_c.value);
                         // $('#txtDateCreated').text(val.name_value_list.date_entered.value);
                         
                         // $('#txtBookcover').attr('src','upload/'+row+'_bookcover');

                         // var your_url = sugar_config.site_url;

                         //$('#txtName').text(your_url);
                         //val is a value.
                         //name_value_list is a object
                         //name is a object to access.
                         //value is a value of name.

-->