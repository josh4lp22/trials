<?php
class User
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


	function fetchAllRecords($tableName)
	{
		$csv_output="";

		$sql="SELECT * FROM " . $tableName ;

		$result = mysql_query($sql);
		$rowcount=0;
		while($row = mysql_fetch_assoc($result)) 
		{
				if($rowcount++==0)
					$csv_output.=implode(";",array_keys($row))."\n";
					$csv_output.=implode(";",array_values($row))."\n";
		}
	
		$filename = "User";
		header("Content-type: text/csv");
		header("Content-disposition: csv" . date("Y-m-d") . ".csv");
		header( "Content-disposition: filename=".$filename.".csv");
		print $csv_output;

		mysql_close($this->con);	
	}
			
}

$userObj = new User();
$userObj->connectDt("joetest");
$userObj->fetchAllRecords("userinfo");

?>