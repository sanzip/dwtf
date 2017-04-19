<?php

$reportid = $_GET["report_id"];

		$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");

     $queryR="delete from reports where report_id=$reportid";
    //$conn -> query($queryR);
     $resultC = pg_query($queryR);
   // $resultC = $conn -> query($queryR);
    if($resultC){
        $data = Array("delete" => "Your report deleted successfully",'result'=>'success');
        echo json_encode($data);
    }else{
        $data = Array("delete" => "Error while deleting your report..",'result'=>'error');
        echo json_encode($data);
    }

