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
      echo $_SESSION['login_user']?></a></li>
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
<br>
<br>
<br>
<br>
<br>
<?php
        require('db_connection.php');
    $report_id=str_replace("'", "", $_GET['id']);
      $sql = "SELECT * from reports a inner join users b on a.user_id=b.user_id where report_id='$report_id'";
      $result = pg_query($conn, $sql) ;
  $row = pg_fetch_array($result);
  if ($row>0) {
       
        
        
      ?>
        <div class="col-md-12 col-lg-12">
            <div class="container">
               
                
                        <h3 style="text-align:center"><?php echo  $row['title']?></h3>
                     
                        <h6>BY:<?php echo   $row['username']?></h6>
                       <h6>DATE:<?php echo   $row['date']?></h6>
                  
                    <div>
                 <p style="font-size:20px"><?php echo   $row['body']?></p>
                    </div>
             
        </div>
		</div>
        <?php
      }
?>
  </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>
