<?php
// $dsn = "pgsql:"
//     . "ec2-54-197-232-155.compute-1.amazonaws.com;"
//     . "dbname=d2nip5a2dq6nrd;"
//     . "user=qehavbestclndn;"
//     . "port=5432;"
//     . "sslmode=require;"
//     . "password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e";

// $db = new PDO($dsn);
$servername = "ec2-54-197-232-155.compute-1.amazonaws.com";
$username = "qehavbestclndn";
$password = "a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e";
$database= "d2nip5a2dq6nrd";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection fail: " . mysqli_connect_error());
}

?>
