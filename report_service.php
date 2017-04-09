<?php

include "DbConnection.php";

$date = $_POST["inputDate"];
$title = $_POST["title"];
$story = $_POST["story"];
$classT = $_POST["classT"];
$Thours=$_POST["Thours"];

    $queryR="Insert into reports(date,title,body,class_taught,hours_taught) VALUES('$date','$title','$story','$classT','$Thours')";
    //$conn -> query($queryR);
     $resultC = pg_query($conn, $queryR);
   // $resultC = $conn -> query($queryR);
    $rowC = pg_fetch_assoc($resultC);
    if($rowC){
        $data = Array("save" => "Your report saved successfully",'result'=>'success');
        echo json_encode($data);
    }else{
        $data = Array("save" => "Error while saving your report..",'result'=>'error');
        echo json_encode($data);
    }

