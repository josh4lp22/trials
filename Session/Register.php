<?php


	session_start();
	
	if (isset($_SESSION['logname'])) {
	header('Location: MovieList.php');
}

?>
 <HEAD>
  <TITLE> Register </TITLE>
 </HEAD>

 <BODY>
	<FORM method="post" action="RegisterProc.php">
		Email ID:<INPUT type="text" name="txtEmail"><br>
		Password:<INPUT type="password" name="txtPass"><br>
		Full Name:<INPUT type="text" name="txtName"><br>
		DOB:<INPUT type="text" name="txtDob">(Format: yyyy-mm-dd)<br>
		<input type="submit" value="Submit"><br>
		If you have registered then <a href="Index.php">Click here.</a> 
	</FORM>
 </BODY>
</HTML>