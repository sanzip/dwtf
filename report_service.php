<?php

$date = $_GET["inputDate"];
$title = $_GET["title"];
$story = $_GET["story"];
$classT = $_GET["classT"];
$Thours=$_GET["Thours"];
$user_id=$_GET["user_id"];
	$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
     $queryR="insert into reports(user_id,title,body,date,class_taught,hours_taught) values(3,'$user_id','$title','$story','$date','$classT','$Thours')";
    //$conn -> query($queryR);
     $resultC = pg_query($queryR);
   // $resultC = $conn -> query($queryR);
    $rowC = pg_fetch_assoc($resultC);
    if($rowC){
        $data = Array("save" => "Your report saved successfully",'result'=>'success');
        echo json_encode($data);
    }else{
        $data = Array("save" => "Error while saving your report..",'result'=>'error');
        echo json_encode($data);
    }

