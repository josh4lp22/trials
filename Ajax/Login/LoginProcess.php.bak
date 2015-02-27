<?php

class empLogin
{
	protected $con;

	function __construct()
	{
		$this->con="";
	}

	function connectDt($dbName)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}

		mysql_select_db($dbName, $this->con);
	}


	function login($usr,$pass)
	{
		
		$sql="SELECT * FROM employee2 where usrName='$usr' AND password='$pass'";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);

		if($num_rows >0)
		{
			echo "Login successful.<BR>";
			$db_field = mysql_fetch_assoc($result);
			
			print "<BR>Name: " .$db_field['fName'];

			if($db_field['gender']==1)
				print "<BR>Gender: Male";
			else
				print "<BR>Gender: Female";

			print "<BR>DOB: " .$db_field['dob'];
			print "<BR>Phone: " .$db_field['phone'];
			print "<BR>Email: " .$db_field['email'];
			print "<BR>Skills: ";	
			if($db_field['dotNet']==1)
				print " .NET";
			if($db_field['cLang']==1)
				print "<BR> C";
			if($db_field['java']==1)
				print "<BR> Java";
			if($db_field['swTesting']==1)
				print "<BR> Software Testing";
			print "<BR>";
			
			
		}
		else
			echo "Please retype your input or you may not be registered!!";
		
		mysql_close($this->con);	
	}
			
}

$empObj = new empLogin();
$empObj->connectDt("joetest");
$empObj->login($_POST['username'],$_POST['password']);


?>