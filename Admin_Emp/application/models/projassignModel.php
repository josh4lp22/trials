<?php
class Model_projassignModel
{
	protected $con;
	
	function __construct()
	{
		$this->con="";
	}
	
	function viewProject()
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT * FROM projects";
		
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
	
		mysql_close($this->con);
		return $data;
	}
	
	function getExistEmp($prjID)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		
		$sql="SELECT E.usrName,E.empName from empdetails E,projassign P
			where E.usrName=P.usrName
			AND P.projID=$prjID";
		
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
		mysql_close($this->con);
		return $data;
	}

	function getNonExistEmp($prjID)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{ 
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT E.usrName, E.empName FROM empdetails E
			WHERE E.usrName NOT IN 
			(SELECT P.usrName FROM projassign P WHERE P.projID =$prjID)";
	
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
		mysql_close($this->con);
		return $data;
	}
}
