<?php


	
	require_once 'db_connection.php';

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
	$photo=file_get_contents($photo);
	$photo=base64_encode($photo);
	$qry="insert into user(user_id,username,password,email,fellowship_place,batch,number,image) values('$userid','$username','$password','$email','$fellowship_place','$batch','$number','$photo')";
   $result=mysqli_query($conn,$qry);
   
   if($result)
   {
   echo "<br/> Image upload";
 // header("Location:http://localhost:81/procedure_method/Admin/home_layout.php"); /* Redirect browser */
exit();
   }
   else
   {
    echo "<br/> Image not upload";
   }
   }
mysqli_close($conn);
		}
		
		
		
		



?>