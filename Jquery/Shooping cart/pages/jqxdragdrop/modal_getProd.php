<?php
			
class modal_getProd
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
			mysql_select_db("jtabletestdb", $this->con);

		$sql = "SELECT * FROM products";

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
	
		$prodObj = new modal_getProd();
		$data = $prodObj->getData();
		echo json_encode($data);
?>