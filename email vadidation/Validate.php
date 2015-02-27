<HTML>
<HEAD>
	<TITLE>Result</TITLE>
</HEAD>
<BODY>
	
		<?php 
			$email_address = $_POST["email"];;
			if (filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
				echo "Email address is valid";
			} 
			else {
				echo "Email address is invalid";
			}



//			$email_address = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
//			if (!$email_address) 
//			{
//				echo "Email ID is not valid";
//			}
		?> 

</BODY>
</HTML>
