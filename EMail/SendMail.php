<?php
	
	$to = "joshua.varghese@synergytechservices.com";
	$subject = "Test mail";
	$message = "Hello! This is a simple email message.";
	$from = "dan4lp21@gmail.com";
//	$headers = "From:" . $from;

	/*ini_set("SMTP","smtp.gmail.com");
	ini_set("smtp_port","587");
	//ini_set("authentication","true");
	ini_set("username","dan4lp21@gmail.com");
	ini_set("password","danny123$");
	ini_set("sendmail_from","dan4lp21@gmail.com");
*/

	mail($to,$subject,$message);
	echo "Mail Sent.";


?>