<?php
$user_id=$_GET["user_id"];
$conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
$queryR="select * from reports where user_id='$user_id'";
    //$conn -> query($queryR);
$resultC = pg_query($queryR);
   // $resultC = $conn -> query($queryR);user_id,title,body,date,class_taught,hours_taught
$row = pg_fetch_assoc($resultC))
if($row){
		    // $data = Array("result"=>"success","message" => "success","title"=>$row["title"],"body"=>$row["body"],"date"=>$row["date"],"class_taught"=>$row["class_taught"],"hours_taught"=>$row["hours_taught"]);
      //   echo json_encode($data);
  echo "yes";
}
else{
        // $data = Array("message" => "sorry! something went wrong..","result"=>"success");
        // echo json_encode($data);
  echo "no";
}
  

