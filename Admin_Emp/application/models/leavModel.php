<?php
class Model_leavModel
{
	protected $con;
	
	function __construct()
	{
		$this->con="";
	}
	
	function viewLeav()
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT L.leavID, L.fromDate, L.toDate, E.empName,L.userApplied
			FROM leaveapp L, empdetails E
			WHERE L.userApplied = E.usrName AND L.status='1'";
	
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
	
		mysql_close($this->con);
		return $data;
	}
	
	function viewLeavApprPend()
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT L.leavID,L.leavDesc, L.fromDate, L.toDate, E.empName
		FROM leaveapp L, empdetails E
		WHERE L.userApplied = E.usrName AND L.status IS NULL";

		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
	
		mysql_close($this->con);
		return $data;
	}
	
	function manageLeav($id,$status,$approvId)
	{	
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="Update leaveapp SET status='$status',userApproved='$approvId' where leavID='$id'";
	
		mysql_query($sql);
		
	
		mysql_close($this->con); 

	}
	
	function applyLeave($desc,$from,$to,$usr)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		$sql = "INSERT INTO leaveapp (leavID,leavDesc,fromDate,toDate,userApplied,status,userApproved)
		VALUES (NULL,'$desc','$from','$to','$usr',NULL,NULL)";
			
		mysql_query($sql) or die(mysql_error());
		
		/* if(mysql_affected_rows() >0)
		 echo "Record Inserted"; */
		
		mysql_close($this->con);
	}
}