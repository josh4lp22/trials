<?php

class EmpAdd

{
	protected $con;
	protected $fName;
	protected $lName;
	protected $email;
	protected $dob;
	protected $city;

	function __construct($fName,$lName,$email,$dob,$city)
	{
		$this->con="";
		$this->fName=$fName;
		$this->lName=$lName;
		$this->email=$email;
		$this->dob=$dob;
		$this->city=$city;

	}


	function addEmployee()
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
		  die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("joetest", $this->con);

		$sql = "INSERT INTO Employee ( empID,empFName, empLName ,
										empEmail,empDob,empCity,flag) 
				VALUES (NULL,'".$this->fName. "','" .$this->lName. 
			    "','" .$this->email. "','" .$this->dob.
			    "','" .$this->city. "',1)";
										                       
		mysql_query($sql) or die(mysql_error());

		if(mysql_affected_rows() >0)
			echo "Record Inserted";

		mysql_close($this->con);

	}	    
			
}

?>
