
          //$('#tblList').append('<tr><td><label hidden="true" id="lblID">'+data[i].id_b+'</label></td><td>'+data[i].blog_name+'</td></tr><tr><td colspan="2"><img src="php/upload/'+data[i].img_one.replace(/\"/g, "")+'"></td></tr><tr><td colspan="2">'+data[i].blog_body+'</td></tr><tr><td><img src="php/upload/'+data[i].img_two+'" width="500px" height="330px"></td><td><img src="php/upload/'+data[i].img_three+'" width="500px" height="330px"></td></tr><tr><td><input type="text" placeholder="Add comment" id="txtComment" class="form-control"></td><td><button class="btn btn-primary" id="btnAdd">Add</button></td></tr>');
          


          //$('#tblBody').append('<tr><td><label hidden id="lblId">'+data[i].id_b+'</label></td><td></td><td>'+data[i].blog_name+'</td><td>'+data[i].blog_body+'</td><td>'+data[i].name+'</td><td><butto class="btn btn-primary" id="btnApr">Aprove</button><tb><td></td><td></td></tr>');

           $('#tblList').append('<tr><td rowspan="0">'+data[i].id_b+'</td><td style=" padding-bottom: .5em;">'+data[i].blog_name+'</td></tr style=" padding-bottom: .5em;"><tr><td><img src="php/upload/'+data[i].img_one.replace(/\"/g, "")+'" style="width:300px;height:300px"></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td style="vertical-align: top;text-align: left;">'+data[i].blog_body+'</td></tr><tr><td><img src="php/upload/'+data[i].img_two.replace(/\"/g, "")+'" style="width:300px;height:300px"></td><td></td></tr><tr><td><img src="php/upload/'+data[i].img_three.replace(/\"/g, "")+'" style="width:300px;height:300px"></td><td></td></tr><br /><br /><div class="row"><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><input type="text" id="txtComment" placeholder="Add your comment here" class="form-control" name="txtComment"><td>&nbsp;</td><td>&nbsp;</td><td><button class="btn btn-primary" id="btnAdd" name="btnAdd">Submit</button></td></tr></div><br><br><br><br>');



           // $.ajax({
        //   url:"php/addComments.php",
        //   method:"post",
        //   data:{id:$item},
        //   dataType:"json",
        //   success:function(data){
        //     alert(data.success);
        //   }

        // });


        <table style="border-collapse: collapse;">
          <th></th>
          <th></th>
          <tbody id="tblList" ">
           
          </tbody>

        </table>
       <!--  <table class="table table-striped table-hover">
                    <th></th>
                    <th></th>

                      <th>Blog's Name</th>
                      <th>Blog's Body</th>
                      <th>Blog's Auther</th>
                      <th>Operations</th>
                  <th></th>
                  <th></th>
                    <tbody id="tblBody">
                      
                    </tbody>
                    </table> -->



                    78ab2fe5-ba56-9707-85de-5b10d7f79f5a


                    SELECT DISTINCT scrm_divisions.id,scrm_divisions.name,scrm_divisions.deleted,scrm_divisions.assigned_user_id,scrm_services_aos_product_categories_1_c.scrm_services_aos_product_categories_1aos_product_categories_idb,scrm_services_aos_product_categories_1_c.scrm_services_aos_product_categories_1scrm_services_ida FROM `scrm_divisions` inner join scrm_services_aos_product_categories_1_c on scrm_services_aos_product_categories_1_c.scrm_services_aos_product_categories_1aos_product_categories_idb=scrm_divisions.id