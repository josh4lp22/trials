<?php
			
class modal_getEmployee
{

	protected $con;

	function __construct()
	{
		$this->con="";
	}


	function getData()
	{
			$this->con = mysql_connect("localhost","root","");
			if (!$this->con)
			{
			  die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("joetest", $this->con);

		$sql = "SELECT empID,empFName,empLName FROM employee where flag=1";

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
	
		$empObj = new modal_getEmployee();
		$data = $empObj->getData();
		echo json_encode($data);
?>