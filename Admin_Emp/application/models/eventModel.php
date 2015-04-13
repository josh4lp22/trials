<?php
class Model_eventModel
{
	protected $con;
	
	function __construct()
	{
		$this->con="";
	}
	
	function viewEvents()
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT * FROM events";
		
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
	
		mysql_close($this->con);
		return $data;
	}
	
	function setEvents($evntName,$evntDate)
	{ //echo $evntDate;exit;
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		$sql = "INSERT INTO events ( eventID,eventName, eventDate)
		VALUES (NULL,'$evntName','$evntDate')";
		 
		mysql_query($sql) or die(mysql_error());
		
		/* if(mysql_affected_rows() >0)
			echo "Record Inserted"; */
		
		mysql_close($this->con);
		
	}
	

}