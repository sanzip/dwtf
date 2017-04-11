<html>
<title></title>
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'> -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dwtf.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" type="text/css" />
<script>
$(document).ready(function() {
    $('#users').DataTable();
});
</script>
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
<br>
<section class="slider">
<div class="container">
<table id="users" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
 <tr>
<th>UserId</th>
<th>Image</th>
<th>E-mail</th>
<th>Username</th>
<th>Batch</th>
<th>Contact</th>
<th>Fellowship place</th>
<th>Action</th>
</tr>
</thead>
<tbody>
     <?php
                      
        //global $conn;
       require('db_connection.php');
    
      $sql = "SELECT * from users";
      $result =pg_query($conn,$sql) ;
      
      while ($row = pg_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['user_id']; ?></td> 
          <td class="banner"><?php echo '<img src="data:image/jpeg;base64,' . pg_unescape_bytea($row['image']).  ' "   />';?></td>;
          <td><?php echo $row['email']; ?></td> 
          <td><?php echo $row['username']; ?></td> 
          <td><?php echo $row['batch']; ?></td> 
          <td><?php echo $row['number']; ?></td> 
           <td><?php echo $row['fellowship_place']; ?></td> 
          <td><button onclick="postBanner(<?php echo $row['banner_id']; ?>);" class="btn btn-success">Edit</button><button name="bpost" onclick="deleteBanner(<?php echo $row['banner_id']; ?>);" class="btn btn-danger">Delete</button></td> 
          </tr>
          <?php
}
              
                
            
       ?>
                                              
                                            </tbody>
                                          </table>
                                        </div>
                                      </section>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/notify.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>