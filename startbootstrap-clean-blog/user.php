<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

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

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
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

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container"> 
      <div class="row">
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
      </div>

    </div>

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

      /*----------Actual list is shown in here--------------*/

      $.ajax({
        url:"php/getBlogs.php",
        method:"post",
        dataType:"json",
        success:function(data){
          //alert(data);

          for (var i = 0;i<data.length; i++) {

          $('#tblList').append('<tr><td><label hidden id="lblID">'+data[i].id_b+'</label></td><td>'+data[i].blog_name+'</td></tr><tr><td colspan="2"><img src="php/upload/'+data[i].img_one.replace(/\"/g, "")+'"></td></tr><tr><td colspan="2">'+data[i].blog_body+'</td></tr><tr><td><img src="php/upload/'+data[i].img_two+'" width="500px" height="330px"></td><td><img src="php/upload/'+data[i].img_three+'" width="500px" height="330px"></td></tr><tr><td><input type="text" placeholder="Add comment" id="txtComment" class="form-control"></td><td><button class="btn btn-primary" id="btnAdd">Add</button></td></tr>');
          

          

            //   $.ajax({
            //   url:"php/addComments.php",
            //   method:"post",
            //   data:{id:$item},
            //   dataType:"json",
            //   success:function(data){
            //     alert(data.success);
            //   }

            // });


          //$('#tblBody').append('<tr><td><label hidden id="lblId">'+data[i].id_b+'</label></td><td></td><td>'+data[i].blog_name+'</td><td>'+data[i].blog_body+'</td><td>'+data[i].name+'</td><td><butto class="btn btn-primary" id="btnApr">Aprove</button><tb><td></td><td></td></tr>');

           //$('#tblList').append('<tr><td><label hidden id="lblId">'+data[i].id_b+'</label></td></tr><tr><td style=" padding-bottom: .5em;">'+data[i].blog_name+'</td></tr style=" padding-bottom: .5em;"><tr><td><img src="php/upload/'+data[i].img_one.replace(/\"/g, "")+'" style="width:300px;height:300px"></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td style="vertical-align: top;text-align: left;">'+data[i].blog_body+'</td></tr><tr><td><img src="php/upload/'+data[i].img_two.replace(/\"/g, "")+'" style="width:300px;height:300px"></td><td></td></tr><tr><td><img src="php/upload/'+data[i].img_three.replace(/\"/g, "")+'" style="width:300px;height:300px"></td><td></td></tr><br /><br /><div class="row"><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><input type="text" id="txtComment" placeholder="Add your comment here" class="form-control" name="txtComment"><td>&nbsp;</td><td>&nbsp;</td><td><button class="btn btn-primary" id="btnAdd" name="btnAdd">Submit</button></td></tr></div><br><br><br><br>');
       
          }
        }
      });
      /*----------Actual list is shown in here--------------*/

      $('#tblList tbody').on('click','#btnAdd',function(){
       
        
       //$item=$(this).closest('tr:nth-child(4)').find('#txtComment').val();
       
       alert($item);
        // $.ajax({
        //   url:"php/addComments.php",
        //   method:"post",
        //   data:{id:$item},
        //   dataType:"json",
        //   success:function(data){
        //     alert(data.success);
        //   }

        // });
      });
  });          
</script>
</html>

