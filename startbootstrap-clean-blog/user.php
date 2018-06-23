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
        <table>
          <tbody id="tblData">
            
          </tbody>
        </table>
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
         

          for (var i = 0;i<data.length; i++) {
              
              $('#tblData').append('<tr><td colspan="2" style="text-align:center;"><strong>'+data[i].blog_name+'</strong></td></tr><tr><td style="text-align:center;"><img src="php/upload/'+data[i].img_one.replace(/\"/g, "")+'" width="300px" height="300px"></td><td><img src="php/upload/'+data[i].img_two.replace(/\"/g, "")+'" width="300px" height="300px"></td></tr><br /><br /><tr><td colspan="2" style="text-align:justify;"><p>'+data[i].blog_body+'</p></td></tr><br><hr><tr><td style="text-align:center;"><img src="php/upload/'+data[i].img_three.replace(/\"/g,"")+'" width="300px" height="300px"></td><td><img src="php/upload/'+data[i].img_three.replace(/\"/g,"")+'" width="300px" height="300px"></td></tr><tr><td width="20px" hidden="true">'+data[i].id_b+'</td><td><input type="text" class="form-control" placeholder="Enter Your Comments" id="txtComments"></td><td style="text-align:center;"><button class="btn btn-primary" id="btnComment">Add</button></tr>');
       
          }
        }
      });
      /*----------Actual list is shown in here--------------*/

      $(document).on('click','#btnComment',function(){
          $item=$(this).closest('tr'); // Here we are using php in the JQuery Script by varible $item
          var id=$item.find('td[hidden="true"]').html();
          var text=$item.find('#txtComments').val();
          // alert(id);
          // alert(text);

          $.ajax({
            url:"php/addComments.php",
            method:"post",
            data:{id_b:id,comment:text},
            dataType:"json",
            success:function(data){
              alert(data.success);
            }
          });
      });
      
  });          
</script>
</html>

