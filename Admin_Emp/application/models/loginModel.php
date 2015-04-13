<?php
class Model_loginModel
{
	public $emaiID;
	public $passwd;
	
	function __construct($emaiID,$passwd)
	{
		$this->emaiID=$emaiID;
		$this->passwd=$passwd;
	}
	
	function userLogin()
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $con);
	
		$sql="SELECT usrName,isAdmin FROM  empdetails where usrName='" . $this->emaiID . "' and password='" .$this->passwd . "'" ;
	
		$result = mysql_query($sql);

		$data = array();

		
		$num = mysql_num_rows($result);
	
		if($num == 1)
		{
			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$data[] = $row;
			}

		}
		Else
		{
			$data[]="Error";
		
		}
	
		return $data;
		mysql_close($con);
	}
}