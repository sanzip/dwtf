<?php
$user_id=$_POST["user_id"];
$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
$query="select * from reports where user_id='$user_id'";
$result = pg_query($query);
$data=array();
while($row = pg_fetch_assoc($result)){
    $data[] = array("result"=>"success","message" => "success","title"=>$row["report_id"],"body"=>$row["body"],"date"=>$row["date"],"hours_taught"=>$row["hours_taught"],"report_id"=>$row["report_id"]);
    
}
echo json_encode($data);
// else{
//   $data = Array("message" => "sorry! something went wrong..","result"=>"success");
//   echo json_encode($data);
// }
  

