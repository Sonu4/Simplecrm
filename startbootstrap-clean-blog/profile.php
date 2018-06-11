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

            
          </div>
        </div>
        <br>
    <div> 
        <div class="row">
          <div class="form-group">
           <label>Start Writing Your Blog</label><br>
            <input type="text" name="Blog Name" placeholder=" Blog Name" id="blogName">
          </div>
        </div> 
        <div class="row">
                  <div class="panel panel-primary ">
                    <div class="panel-body">
                        <form>
                          <div class="form-group">
                         <textarea type="text"  placeholder="Write your blog." id="blogBody" style="width:1000px; height:250px;"></textarea>
                          </div>
                        </form>
                    </div>
                  </div>
        </div>
  
        <br>  
      <div class="row">
          <table class="table">
            <th>Picture One.</th>
            <th>Picture Two.</th>
            <th>Picture Three.</th>
            <th>Picture Four.</th>
          </table>
          <tbody>
            <th>
              <div class="row">
                <div class="col-xs-6 col-md-3">
                  <img style="width:150px;height:200px;" id="imgUpload_1" >&nbsp;
                  <input type="file" name="blog_img_1" id="blog_img_1" style="width: 125px; border: 1px solid #FFF;" class="btn btn-default">

                 </div>
              </div>
            </th>
            <th>
              <div class="row">
                <div class="col-xs-6 col-md-3">
                  <img style="width:150px;height:200px;" id="imgUpload_2" >&nbsp;
                  <input type="file" name="blog_img_2" id="blog_img_2" style="width: 123px; border: 1px solid #FFF;" class="btn btn-default">

                 </div>
              </div>
            </th>
            <th>
              <div class="row">
                <div class="col-xs-6 col-md-3">
                  <img style="width:150px;height:200px;" id="imgUpload_3" >&nbsp;
                  <input type="file" name="blog_img_3" id="blog_img_3" style="width: 123px; border: 1px solid #FFF;" class="btn btn-default">

                 </div>
               </div>
            </th>
            <th>
              <div class="row">
                <div class="col-xs-6 col-md-3">
                 <img style="width:150px;height:200px;" id="imgUpload_4" >&nbsp;
                 <input type="file" name="blog_img_4" id="blog_img_4" style="width: 123px; border: 1px solid #FFF;" class="btn btn-default">

                 </div>
            </th>
          </tbody>
        </div> 
        <div class="row">
          <button type="button" name="submitBlog" id="submitBlog" class="btn btn-primary">Publish Blog</button> 
        </div>    
    </div> 
    <br>
        <br>
    <div class="row">
         <table class="table">
            <th></th>
            <th>Blog Name</th>
            <th colspan="1">Content</th>
            
            
            <th>Action</th>
            <th></th>
            <tbody id="tblDetails">

            </tbody>
          </table>
      </div> 
           
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

    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
          <form>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>     
            </div>
            <div class="modal-body">
              <div class="row">
                <table class="table table-striped">
                  <th></th>
                  <th>Comments</th>
                  <tbody id="tblComments" class="table">  
                  </tbody>
                </table>
              </div>  
            </form>  
          </div>
        </div>
      </div>


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

/*------------From Here Operations On Blogs Body Will Start-----------*/

      
      $('#submitBlog').click(function(){
        
          var form_data=new FormData();
          form_data.append('blog_img_1',$('#blog_img_1')[0].files[0]);// Image one of blog.
          form_data.append('blog_img_2',$('#blog_img_2')[0].files[0]);// Image teo of blog.
          form_data.append('blog_img_3',$('#blog_img_3')[0].files[0]);// Image three of blog.
          form_data.append('blog_img_4',$('#blog_img_4')[0].files[0]);// Image four of blog.
          form_data.append('blogName',$('#blogName').val());// Blogs Name.
          form_data.append('blogBody',$('#blogBody').val());// Blogs Body.
          form_data.append('id',finalvalue.id);

          $.ajax({
            url:"php/blogUpload.php",
            method:"post",
            data:form_data,
            dataType:"json",
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
              alert(data);
              if (data =='success') {
                $('#blogName').val('');
                $('#blogBody').val('');
                 $('#imgUpload_1').attr('src','');
                 $('#imgUpload_2').attr('src','');
                 $('#imgUpload_3').attr('src','');
                 $('#imgUpload_4').attr('src','');

              }
            }
          });

     
     
      });
      /*------------This Section just preview the Image---------------------*/ 

       function readURL_1(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgUpload_1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#blog_img_1").change(function(){
            readURL_1(this);
        });

      /*--------------------------------------------------------------------------*/  
         function readURL_2(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgUpload_2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#blog_img_2").change(function(){
            readURL_2(this);
        });

        /*--------------------------------------------------------------------------*/  
         function readURL(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgUpload_3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#blog_img_3").change(function(){
            readURL(this);
        });

        /*--------------------------------------------------------------------------*/  
         function readURL_4(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgUpload_4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#blog_img_4").change(function(){
            readURL_4(this);
        });

/*-------------We are getting all the blogs the user has uploadede -------------------*/

    $.ajax({
      url:"php/getBlogsById.php",
      method:"post",
      data:{id:id},
      dataType:"json",
      success:function(data){
        for (var i=0;i<data.length;i++) {
          $('#tblDetails').append('<tr><td><label hidden id="lblID">'+data[i].id_b+'</label></td><td>'+data[i].blog_name+'</td><td>'+data[i].blog_body+'</td><td><button id="btnDelete" class="btn btn-primary">Delete</button><td><button class="btn btn-primary" id="btnComments">Comments</button></td></td></tr>');
        }
        
      }
    });

    $(document).on('click','#btnDelete',function(){
          var $item=$(this).closest('tr').find('td:first').text();
          $.ajax({
            url:"php/deleteBlog.php",
            method:"post",
            data:{id:$item},
            dataType:"json",
            success:function(data){
              alert(data.success);
            }
          });
    });

/*-------------This section is for operations on comments--------------*/
  
  $(document).on('click','#btnComments',function(){
        

        var $item=$(this).closest('tr').find('td:first').text();
       
        $.ajax({
        url:"php/getComments.php",
        method:"post",
        data:{id:$item},
        dataType:"json",
        success:function(data){
         $('#tblComments').empty();
          for (var i =0;i<data.length;i++) {
             $('#tblComments').append('<tr><td><label hidden>'+data[i].id+'</label></td><td>'+data[i].comment+'</td></tr>');
          }
         
          
        }
    });
/*------------This section Creates a comments Toggle--------------------------*/
    $('#addPage').modal('toggle');    

  });

    

   });
</script>
</html>
