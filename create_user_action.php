<?php

	// require_once 'db_connection.php';
//include_once("PHPMailerAutoload.php");
if(isset($_POST['btn_create']) && ($_SERVER['REQUEST_METHOD']== "POST"))
	{
		if(getimagesize($_FILES['photo']['tmp_name'])==FALSE)
   {
   echo "plese select an image";
   }
   else{
		
		$photo=addslashes($_FILES['photo']['tmp_name']);
  $userid=$_POST['userid'];
	$username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $batch=$_POST['batch'];
  $number=$_POST['number'];
  $fellowship_place=$_POST['fplace'];
  $school_name=$_POST['sname'];
	$photo=file_get_contents($photo);
	$photo=base64_encode($photo);
  $conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
  $qry="insert into users values('$userid','$username','$password','$email','$fellowship_place','$batch','$number','$photo','$school_name')";
  //$qry="insert into users values('$userid','$username','$password','$email','$fellowship_place','$batch','$number','$photo')";
   $result=pg_query($qry);
   
   if($result)
   {
    
   //$data = array( 'status' => 1, 'Error' => '', 'action' => $actionValue );
        echo "<script type='text/javascript'>
   alert('User Created!');
</script>";

header("location:createuser.php"); /* Redirect browser */
exit();
 }
 
  else
   {
   "<script type='text/javascript'>
   alert('Error in Creating User');
</script>";
//header("location:createuser.php"); /* Redirect browser */
   }

   }
pg_close($conn);
		}
?>