<?php
class Employee
{
	protected $con;
	protected $id;

	function __construct($id)
	{
		$this->con="";
		$this->id=$id;

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


	function viewEmployee()
	{
		
		if($this->id==0)
			$sql="SELECT * FROM Employee where flag=1";
		else
			$sql="SELECT * FROM Employee where flag=1 AND empID=" .$this->id;

		$result = mysql_query($sql);
		
		while($db_field = mysql_fetch_assoc($result)) 
		{
				print "<BR>ID: " .$db_field['empID'];
				print "<BR>Name: " .$db_field['empFName'] . " " .$db_field['empLName'] ;
				print "<BR>Email: " .$db_field['empEmail'];
				print "<BR>DOB: " .$db_field['empDob'];
				print "<BR>City: " .$db_field['empCity'];
				print "<BR>";
		}
	
		
				mysql_close($this->con);	
	}
			
}

$empObj = new Employee($_POST['selEmpID']);
$empObj->connectDt("joetest");
$empObj->viewEmployee();

?>
<BR><A href="ChooseEmp.php"> Home </A>