<?php
class Model_addremempModel
{
	protected $con;
	
	function __construct()
	{
		$this->con="";
	}
	
	function removeEmp($empid,$prjid)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		
		$sql="DELETE FROM projassign where projID='$prjid' AND usrName='$empid'";
		
		mysql_query($sql);
		
		
		mysql_close($this->con);
	}
	
	function addEmp($empid,$prjid)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="INSERT into projassign (assnID,projID,usrName) values (null,$prjid,'$empid')";
	
		mysql_query($sql);

		
		mysql_close($this->con); 
	}
}