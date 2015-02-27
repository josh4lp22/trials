<?php
class EmpDelete
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


	function deleteEmployee()
	{
		
		if($this->id==0)
		{
			echo "<BR>Please Select an Employee";
			exit;
		}
		else
			$sql="UPDATE Employee SET flag=0 where empID=" .$this->id;
		

		mysql_query($sql) or die(mysql_error());

		if(mysql_affected_rows() >0)
			echo "Row deleted";
		mysql_close($this->con);	
	}
			
}

$empObj = new EmpDelete($_POST['selEmpID']);
$empObj->connectDt("joetest");
$empObj->deleteEmployee();

?>