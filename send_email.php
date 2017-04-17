<?php
function sendEmail($to,$subject,$body){
include_once("PHPMailerAutoload.php");
     

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);

$mail->Username = "sanzip.mainali@gmail.com"; 
$mail->Password = ""; 

$mail->SetFrom("sanzip.mainali@gmail.com");
$mail->Subject = $subject;
$mail->Body = $emailBody;
$mail->AddAddress($to);

//header('Content-Type: application/json');

 if(!$mail->Send()) {
   //$data = array( 'status' => -1, 'Error' => $mail->ErrorInfo );
     echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
   //$data = array( 'status' => 1, 'Error' => '', 'action' => $actionValue );
     echo "Message has been sent";
 }
 
 // some statement that removes all printed/echoed items
 // ob_end_clean();

 // echo json_encode($data);

  }
?>
 
