<?php

$date = $_POST["inputDate"];
$title = $_POST["title"];
$story = $_POST["story"];
$classT = $_POST["classT"];
$Thours=$_POST["Thours"];
$user_id=$_POST["user_id"];
		$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");

     $queryR="insert into reports(user_id,title,body,date,class_taught,hours_taught) values('$user_id','$title','$story','$date','$classT','$Thours')";
    //$conn -> query($queryR);
     $resultC = pg_query($queryR);
   // $resultC = $conn -> query($queryR);
    $rowC = pg_fetch_assoc($resultC);
    if($resultC){
        $data = Array("save" => "Your report saved successfully",'result'=>'success');
        echo json_encode($data);
    }else{
        $data = Array("save" => "Error while saving your report..",'result'=>'error');
        echo json_encode($data);
    }

