<?php
class Employee
{
	protected $con;
	protected $id;

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


	function insertEmployee($usr,$pass,$name,$sex,$dob,$phone,$email,$net,$c,$java,$swt)
	{
		
		$sql="SELECT * FROM employee2 where usrName='" .$_POST["txtUsr"]. "'";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);

		if($num_rows >0)
		{
			echo "User Name Already exists. Please choose a different user name!!";
			echo "<BR><A href='EnterDetails.html'> Home </A>";
			exit;
		}
		
		$sql="insert into employee2 values('$usr','$pass','$name','$sex','$dob','$phone','$email','$net','$c',
			'$java','$swt')";
		mysql_query($sql) or die(mysql_error());;
		

		
		$sql="SELECT * FROM employee2";

		$result = mysql_query($sql);
		
		while($db_field = mysql_fetch_assoc($result)) 
		{
				print "<BR>User ID: " .$db_field['usrName'];
				print "<BR>Password: " .$db_field['password'];
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
	
		
				mysql_close($this->con);	
	}
			
}

$empObj = new Employee();
$empObj->connectDt("joetest");
$empObj->insertEmployee($_POST['txtUsr'],$_POST['txtpass'],$_POST['txtName'],$_POST['rdSex'],$_POST['txtDob'],$_POST['txtPhone'],$_POST['txtEmail'],$_POST['chkDotNet'],$_POST['chkCLang'],$_POST['chkJava'],$_POST['chkSwt']);

?>
<BR><A href="EnterDetails.html"> Home </A>