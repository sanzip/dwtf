<html>
<title></title>
<head>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/notify.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
function deleteUser(id){
	alert(id);
	$.ajax({
      url: 'https://fellowship-deerwalk.herokuapp.com/services.php?action=deleteuser&id='+id,
    type: 'POST',
      success: function(data) {
		  alert("success");
      },
	     error: function() {
         alert("error");
      },
     
   });
	
};
</script>
<style type="text/css">
.image img{
  height:100px;
  
}
.row{
  padding:5px;
}</style>
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
      <div class="navbar-header">
       <h1 class="navbar-brand"><i class="fa fa-graduation-cap fa-2x"></i><a href="dashboard.php">Deerwalk Teaching Fellowship(DWTF)</a></h1>
     
   </div>
    <div class="menuBar">
        <ul class="menu">
          <li ><a > <?php 
      session_start();
    ?></a></li>
          <li><a href="index.php">Logout</a></li>
         
        </ul>
      </div>
    </nav>
  </div>
</header>
<br>
<br>
<br>
<br>
<br>
<div class="container">
<table id="users" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead style="color:#36d7b7">
 <tr>
<th>UserId</th>
<th>Image</th>
<th>E-mail</th>
<th>Username</th>
<th>Batch</th>
<th>Contact</th>
<th>Fellowship place</th>
<th>School Name</th>
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
          <td class="image"> 
          <?php echo '<img src="data:image/jpeg;base64,' . pg_unescape_bytea($row['image']). ' "   />';?></td>;
          <td><?php echo $row['email']; ?></td> 
          <td><?php echo $row['username']; ?></td> 
          <td><?php echo $row['batch']; ?></td> 
          <td><?php echo $row['number']; ?></td> 
           <td><?php echo $row['fellowship_place']; ?></td> 
            <td><?php echo $row['school_name']; ?></td> 
          <td><a href="edit.php?id=<?php echo $row['user_id']; ?>"  class="btn btn-success">Edit</a><button name="bpost" onclick="deleteUser(<?php echo $row['user_id']; ?>);" class="btn btn-danger">Delete</button></td> 
          </tr>
          <?php
}
              
                
            
       ?>
                                              
                                            </tbody>
                                          </table>
                                        </div>
                                     

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>