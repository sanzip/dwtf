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
if(isset($_POST['update']))
{    
   $photo=addslashes($_FILES['photo']['tmp_name']);
  $userid=$_POST['userid'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $batch=$_POST['batch'];
  $number=$_POST['number'];
  $fellowship_place=$_POST['fplace'];
  $photo=file_get_contents($photo);
  $photo=base64_encode($photo);
  $conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
  $qry="UPDATE  users SET username='$username',email='$email',batch='$batch',fellowship_place='$fellowship_place',number='$number',image='$photo' where user_id='$userid'";
  //$qry="insert into users values('$userid','$username','$password','$email','$fellowship_place','$batch','$number','$photo')";
   $result=pg_query($qry);   
        //updating the table
        //$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: manageuser.php");
    }

?>
<?php
//getting id from url
$id = $_GET['id'];
 $conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");

 
//selecting data associated with this particular id
$result = pg_query("SELECT * FROM users WHERE user_id=$id");
 
while($row = pg_fetch_array($result))
{
  $userid=$row['user_id'];
  $username=$row['username'];
  $email=$row['email'];
  $password=$row['password'];
  $batch=$row['batch'];
  $number=$row['number'];
  $fellowship_place=$row['fellowship_place'];
}
?>
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
<br>
   <div class="container">
    <div class="row vertical-offset-100">
      <div class="col-xs-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit User</h3>
        </div>
          <div class="panel-body">
            <form action="edit.php" enctype="multipart/form-data" method="post">
           
                    <fieldset>
                       <div class="form-group">
                  <input class="form-control" placeholder="UserId" name="userid" type="text" value="<?php echo $userid; ?>">
              </div>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text" required value="<?php echo $email; ?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" required value="<?php echo $password; ?>">
              </div>
               <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" type="text" required value="<?php echo $username; ?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Batch" name="batch" type="text"  required value="<?php echo $batch; ?>"> 
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contact Number" name="number" type="tel" required value="<?php echo $number; ?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Fellowship Place" name="fplace" type="tel" required value="<?php echo $fellowship_place; ?>">
              </div>
              <div class="form-group">
             
                 <input placeholder="Photo" type="file" name="photo" class="form-control" required value="<?php  $photo;?>">
                   </div>
				   <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <input class="btn btn-success btn-block" name="update" type="submit" value="Update">
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