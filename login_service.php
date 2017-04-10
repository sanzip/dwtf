<?php

//include "DbConnection.php";

$username=$_GET["username"];
$password=$_GET["password"];
$query="select username,email,batch,fellowship_place,number from users where email='$username' AND password='$password'";
$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
$result = pg_query($query);
$row = pg_fetch_assoc($result);
if($row){
    $data = Array("login" => true,"username"=>$row["username"],"email"=>$row["email"],"place"=>$row["fellowship_place"],"Batch"=>$row["batch"],"contact"=>$row["number"]);
    echo json_encode($data);
}
else
{
    $data = Array("login" => false);
    echo json_encode($data);
}
