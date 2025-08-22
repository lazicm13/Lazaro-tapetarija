<?php

//  // ++++++++++++++++++++++++++++++++++++
error_reporting(0);

  
 // configuration
 

$error_message = "Molim Vas popunite formu";

$rnd=$_POST['rnd'];
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$body=$_POST['body'];

  
if(!isset($rnd) || !isset($name) || !isset($email) || !isset($subject) || !isset($body)) {
	echo $error_message;
    die();
}


$email_from = $email;

$email_message = "Poruka poslata od '".stripslashes($name)."', email:".$email_from;
$email_message .=" on ".date("d/m/Y")."\n\n";
$email_message .= stripslashes($body);
$email_message .="\n\n";

// Always set content-type when sending HTML email

//$headers .= 'From: <'.$email_from.'>' . "\r\n";

mail("lazarotapetarija@gmail.com","usluga",$email_message);

//mail("dragisaspasojevic@gmail.com", "test", "test", "dsakdjsak");

?>