<?php

include "DbConnection.php";

$username=$_POST["username"];
$password=$_POST["password"];
$query="Select *from user where email='$username' AND password='$password'";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);
if($row){
    $data = Array("login" => true,"username"=>$row["username"],"email"=>$row["email"],"place"=>$row["fellowship_place"],"Batch"=>$row["batch"],"contact"=>$row["number"],"image"=>$row["image"]);
    echo json_encode($data);
}
else
{
    $data = Array("login" => false);
    echo json_encode($data);
}
