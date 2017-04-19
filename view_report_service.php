<?php
$report_id=$_POST["report_id"];
$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
$queryR="select * from reports where report_id='$report_id'";
$resultC = pg_query($queryR);
$row = pg_fetch_assoc($resultC);
if($row){
    $data = Array("result"=>"success","message" => "success","body"=>$row["body"],"date"=>$row["date"],"hours_taught"=>$row["hours_taught"]);
    echo json_encode($data);
}
else{
  $data = Array("message" => "sorry! something went wrong..","result"=>"success");
  echo json_encode($data);
}
  

