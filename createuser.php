<html>
<title></title>
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'> -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dwtf.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
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
       <h1 class="navbar-brand"><a >Deerwalk Teaching Fellowship(DWTF)</a></h1>
     
   </div>
    <div class="menuBar">
        <ul class="menu">
          <li ><a > <?php 
      session_start();
      // echo $_SESSION['login_user']?></a></li>
          <li><a href="index.php">Logout</a></li>
         
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>
<br>
<br>
<br>
   <div class="container">
    <div class="row vertical-offset-100">
      <div class="col-xs-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Create User</h3>
        </div>
          <div class="panel-body">
            <form action="create_user_action.php" enctype="multipart/form-data" method="post">
           
                    <fieldset>
                       <div class="form-group">
                  <input class="form-control" placeholder="UserId" name="userid" type="text" required>
              </div>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" required value="">
              </div>
               <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" type="text" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Batch" name="batch" type="text" value="" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contact Number" name="number" type="tel" required value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Fellowship Place" name="fplace" type="tel" required value="">
              </div>
              <div class="form-group">
                
                 <input placeholder="Photo" type="file" name="photo" class="form-control" required>
                   </div>
              <input class="btn btn-success btn-block" name="btn_create" type="submit" value="Create">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/notify.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>