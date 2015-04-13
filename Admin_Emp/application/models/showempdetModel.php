<?php
class Model_showempdetModel
{
	protected $con;


	function __construct()
	{
		$this->con="";

	}
	
	function viewUsrDetails($usr)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT  empName,skills from empdetails where usrName='$usr'";
	
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
	
		mysql_close($this->con);
		return $data;
	}
	
	function viewUsrProjDetails($usr)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT P.projName, P.projDesc FROM projects P, projassign A
			WHERE A.usrName = '$usr' AND A.projID = P.projID";
	
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