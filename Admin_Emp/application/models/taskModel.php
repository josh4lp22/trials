<?php
class Model_taskModel
{
	protected $con;
	
	function __construct()
	{
		$this->con="";
	}
	
	function addTask($desc,$endDate,$prjid)
	{
		date_default_timezone_set("Asia/Calcutta");
		$currDate=date("Y-m-d");
		
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="INSERT into taskassn (taskID,taskDec,asnDate,endDate,projID,usrName) 
		values (null,'$desc','$currDate','$endDate',$prjid,'joe123')";
	
		mysql_query($sql);
	
	
		mysql_close($this->con);
	}
	
	function viewTask($usr)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		
		$sql="SELECT T.endDate, T.taskDec FROM taskassn T, projassign P
				WHERE T.projID = P.projID
				AND P.usrName = '$usr'";
		
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