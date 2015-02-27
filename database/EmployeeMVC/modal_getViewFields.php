<?php

class getFieldData
{
	public $ID;
	public $fName;
	public $lName;
	public $email;
	public $dob;
	public $city;

	function __construct()
	{
		$this->ID="";
		$this->fName="";
		$this->lName="";
		$this->email="";
		$this->dob="";
		$this->city="";
	}

	function setFields($ID)
	{ 
		
		if($ID!="0")
		{
			$this->ID=$ID;

			$con = mysql_connect("localhost","root","");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("joetest", $con);

			$sql="SELECT * FROM Employee where empID=$this->ID";

			$result = mysql_query($sql);
				

			$db_field = mysql_fetch_assoc($result);
			$this->fName=$db_field['empFName'];
			$this->lName=$db_field['empLName'];
			$this->email=$db_field['empEmail'];
			$this->dob=$db_field['empDob'];
			$this->city=$db_field['empCity'];

			
			mysql_close($con);	
		}
		else
		{
			echo "Please select an employee";
			exit;
		}
	}
}

	


?>