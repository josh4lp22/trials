<?php

	session_start();

	if (isset($_SESSION['logname'])) {
	header('Location: MovieList.php');
}

?>
 <HEAD>
  <TITLE> Login </TITLE>
 </HEAD>

 <BODY>
	<FORM method="post" action="Login.php">
		Email ID:<INPUT type="text" name="txtEmail"><br>
		Password:<INPUT type="password" name="txtPass"><br>
		<input type="submit" value="Submit"><br>
		If you have not registered then <a href="Register.php">Click here.</a> 
	</FORM>
 </BODY>
</HTML>
