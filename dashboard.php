<html>
<title></title>
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'> -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dwtf.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
</head>
<body>
   <?php
  session_start();
if(!isset($_SESSION['login_user'])){
   header("location:index.php");
}
  ?>

    <header class="main__header">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation"> 
      <!-- Brand and toggle get grouped for better mobile display --> 
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-header">
        <h1 class="navbar-brand"><i class="fa fa-graduation-cap fa-2x"></i><a href="dashboard.php">Deerwalk Teaching Fellowship(DWTF)</a></h1>
     
   </div>
    <div class="menuBar">
        <ul class="menu">
          
             <li class="dropdown"><a href="index.php">Logout</span></a>
           <!--  <ul>
              <li><a href="index.php">Logout</a></li>
             
            </ul> -->
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>
<section class="slider">
<div class="container">
<div class="row text-center pad-top">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="div-square">
                           <a href="createuser.php" >
 <i class="fa fa-user fa-5x"></i>
                      <h4>Create User</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                     
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">	
                      <div class="div-square">
                           <a href="homepage.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>View Users Details</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="row text-center pad-top">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="div-square">
                           <a href="manageuser.php" >
 <i class="fa fa-user fa-5x"></i>
                      <h4>Manage User</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                     
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
                      <div class="div-square">
                           <a href="allreports.php" >
 <i class="fa fa-file-word-o fa-5x"></i>
                      <h4>View All reports</h4>
                      </a>
                      </div>
                     
                     
                  </div>

              </div>
			  </div>
      </section>

<script type="text/javascript" src="js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>