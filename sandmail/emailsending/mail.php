<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
//require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
	
	date_default_timezone_set("Asia/Calcutta");
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'bagadasatish50@gmail.com';				
	$mail->Password = 'ypzbphszzygelmfg';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom('bagadasatish50@gmail.com', 'Enquiry customer Form');		
	$mail->addAddress($_POST["email"]);
	$mail->isHTML(true);

	// $mail->Subject = 'Customer enquiry Form'.date("d/m/Y H:i:s a");
	// $mail->Body = '<p>Name :'.$_POST["name"].'<p>Firstname :'.$_POST["fname"].'<p>LastName :'.$_POST["lname"].'<p>Email :'.$_POST["email"].'<p>Mobile :'.$_POST["mobile"].'<p>Message :'.$_POST["message"]."</p>";
									
	$mail->Subject = 'Customer enquiry Form'.date("d/m/Y H:i:s a");
	$mail->Body = "<p style='font-size:12px'>Thanks for Enquiry with us you can download our brochures here please find below attachement"."<br>". "<img src='https://jssateb.ac.in/assets/images/hand.gif' style='width:60px; height:50px'> Please click below to download brochures"."</p>";
	$file_to_attach = 'mysql.pdf';
	$mail->AddAttachment($file_to_attach ,'mysql.pdf');		

	$mail->send();
	echo "<h3 align='center'>Mail has been sent successfully!</center>";
	header('refresh:5,contact.html');
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
