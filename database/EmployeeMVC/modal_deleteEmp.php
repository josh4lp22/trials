<?php
class EmpDelete
{
	protected $id;

	function __construct($id)
	{
		$this->id=$id;

	}

	function deleteEmployee()
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
		  die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("joetest", $con);


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
		mysql_close($con);	
	}
			
}



?>