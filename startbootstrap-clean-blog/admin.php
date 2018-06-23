<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    

    <!-- The minified JQuery -->
    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>

     <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-default" id="mainNav1">
      <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
          Menu's 
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signUp.html">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

 <hr>  

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-6 mx-auto">
           
          <label>Name:-</label>&nbsp;                  
          <label id="lblName">Name</label><br>
           <label>Type:-  </label>&nbsp;
          <label id="lblType">Type</label><br>
           <label>Email:-</label>&nbsp;
          <label id="lblEmail">Email</label>
 
            
         
            
          </div>
          <div class="col-lg-2 col-md-6 mx-auto">
           
           <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img style="width:150px;height:150px;" id="uploadedImage">
              </a>
            </div>
           <form enctype="multipart/form-data">
             <label><small><i>Select Profile Image</i></small></label><br>
             <input type="file" name="file" id="file" class="btn btn-default"><br>
             <BUTTON type="submit" name="upload" id="upload" class="btn btn-default">Upload</BUTTON> 
           </form>
          </div>  
          <br>  
        </div>
<div>
              <div class="panel panel-success">
                <div class="panel-heading">All The Latest Articals</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
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
                    </table>
                      
                </div>
              </div>

</div>
      </div>
    <br>
   
        
            
   </div>
  </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>

    <!-- <script>
      CKEDITOR.replace( 'editor1' );
      CKEDITOR.config.width = '200%';
    </script> -->

    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>
<script type="text/javascript">
   $(document).ready(function(){
    var listvalues = localStorage.getItem('lists');
    var finalvalue = JSON.parse(listvalues);
    var id=finalvalue.id;
    var type_of_user=finalvalue.type_of_user;
    console.log(id+':'+type_of_user);

/*----------------This function is responsible for updating Profile image-------*/
    $.post('php/getImage.php',{id:id},function(data){
      $('#uploadedImage').attr('src','php/upload/profile/'+data.replace(/\"/g, ""));// this replaces the double quotes with null.
   });

    $('#upload').click(function(){
/*----------------This function is responsible for uploading Profile image-------*/
       
          var form_data=new FormData();
          form_data.append('file',$('#file')[0].files[0]); //this is how the files are sent to the server.
          form_data.append('id',id);
          //alert(form_data);
          $.ajax({
              url:"php/upload.php",
              method:"POST",
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              success:function(data){
                alert(data.success);
                console.log(data.success);
              }
          });
   
        
    });
  /*----this assigns the profile data to its html variables-------*/     
    $.ajax({
      url:'php/getProfile.php',
      method:"post",
      dataType:"json",
      data:{id:id},    
      success:function(data){
        $('#lblName').text(data.name);
        $('#lblType').text(data.type_of_user);
        $('#lblEmail').text(data.email);
       

    }
      });

/*----------------------From This Admin Operations Begin-----------------------------*/

    $.ajax({
        url:"php/getAdminData.php",
        method:"post",
        dataType:"json",
        success:function(data){
          for(var i=0;i<data.length;i++){
            $('#tblBody').append('<tr><td><label hidden id="lblId">'+data[i].id_b+'</label></td><td></td><td>'+data[i].blog_name+'</td><td>'+data[i].blog_body+'</td><td>'+data[i].name+'</td><td><butto class="btn btn-primary" id="btnApr">Aprove</button><tb><td></td><td></td></tr>');
            //alert(data[i].blog_name+':'+data[i].blog_body+':'+data[i].name);
          }
        }
    });
/*------This checks the click of button and update the database---------------------*/
   $(document).on('click','#btnApr',function(){
       

        var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find("td:first")     // Gets a descendent with class="nr"
                       .text();         // Retrieves the text within <td>
        $.ajax({
          url:"php/updateBlog.php",
          method:"post",
          data:{id:$item},
          dataType:"json",
          success:function(data){
            alert(data.success);
          }

        });
   });

   });
</script>
</html>
