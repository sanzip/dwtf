<?php

//include "DbConnection.php";

$username=$_POST["username"];
$password=$_POST["password"];
$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
$query="select user_id,username,email,fellowship_place,number,school_name from users where email='$username' AND password='$password'";
$result = pg_query($query);
$row = pg_fetch_assoc($result);
if($row){
    $data = Array("login" => true,"username"=>$row["username"],"email"=>$row["email"],"place"=>$row["fellowship_place"],"user_id"=>$row["user_id"],"contact"=>$row["number"],"school_name"=>$row['school_name']);
    echo json_encode($data);
}
else
{
    $data = Array("login" => false);
    echo json_encode($data);
}
