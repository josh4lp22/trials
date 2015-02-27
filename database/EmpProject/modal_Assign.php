<?php
//echo $_POST['selEmp'] . "<BR>";
//echo $_POST['selPrj'];

class EmpAssign

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


	function Insert($emp,$prj)
	{
		
		$sql = "INSERT INTO assignproject (asnID,empID, prjID) 
				VALUES (NULL,'$emp','$prj')";
										                       
		mysql_query($sql) or die(mysql_error());

		if(mysql_affected_rows() >0)
			echo "Project Assigned";

		mysql_close($this->con);

	}	    
			
}

$empObj = new EmpAssign();
$empObj->connectDt("joetest");
$empObj->Insert($_POST['selEmp'],$_POST['selPrj']);

?>
<BR><A href="ChooseEmp.php"> Home </A>


