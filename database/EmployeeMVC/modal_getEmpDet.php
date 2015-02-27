<?php
class modal_getEmpDet
{
	protected $con;
	protected $id;

	function __construct($id)
	{
		$this->con="";
		$this->id=$id;

	}

	function viewEmployee()
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("joetest", $this->con);	


		if($this->id==0)
			$sql="SELECT * FROM Employee where flag=1";
		else
			$sql="SELECT * FROM Employee where flag=1 AND empID=" .$this->id;

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



?>
