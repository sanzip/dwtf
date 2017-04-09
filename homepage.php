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
<div class="container">
	<div class="row">
     <?php
        require('db_connection.php');
    
      $sql = "SELECT * from user";
      //$row = $result->fetch(PDO::FETCH_ASSOC)
      //$result = $db->query($sql);
      $result = pg_query($conn,$sql) ;
    if (pg_num_rows($result) > 0){
        $data = array();
        $i = 0;
        while($res = pg_fetch_assoc($result))
        {
            $data[$i]['user_id'] = $res["user_id"];
            $data[$i]['username'] = $res["username"];
             $data[$i]['batch'] = $res["batch"];
              $data[$i]['image']=$res["image"];
               $data[$i]['fellowship_place']=$res["fellowship_place"];
            
         
        
        
      ?>
		<div class="col-lg-3 col-sm-6">
<form action="reports.php" method="post">
            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                  <?php echo '<img src="data:image/jpeg;base64,' . $data[$i]['image']. ' "   />';?>
                </div>
                <div class="info">
                    <div class="title">
                      <?php echo $data[$i]['username']?> 
                    </div>
                    <div class="desc" style="font-size:20px; padding:10px">Batch:<?php echo  $data[$i]['batch']?></div>
                     <div class="desc" style="font-size:20px; padding:10px">Place:<?php echo  $data[$i]['fellowship_place']?></div>
				<input type="hidden" name="id" value="<?php echo $data[$i]['user_id'] ?>" />
        <button class="btn  btn-success ">View Report</button>
                </div>

            </div>
          </form>
             
        </div>
        <?php
      }

            $i++;
    }
      ?>
	</div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>