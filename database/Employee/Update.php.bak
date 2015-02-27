<?php
class EmpUpdate

{
	protected $con;
	protected $id;
	protected $fName;
	protected $lName;
	protected $email;
	protected $dob;
	protected $city;

	function __construct($id,$fName,$lName,$email,$dob,$city)
	{
		$this->con="";
		$this->id=$id;
		$this->fName=$fName;
		$this->lName=$lName;
		$this->email=$email;
		$this->dob=$dob;
		$this->city=$city;

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


	function UpdateEmployee()
	{
		
		$sql = "UPDATE Employee SET empFName='" .$this->fName. "',empLName='" .$this->lName. 
			    "',empEmail='" .$this->email. "',empDob='" .$this->dob.
			    "',empCity='" .$this->city. "' where empID=" .$this->id;
										                       
		mysql_query($sql) or die(mysql_error());

		if(mysql_affected_rows() >0)
			echo "Row Updated";
		 

		mysql_close($this->con);

	}	    
			
}

$empObj = new EmpUpdate($_POST['txtID'],$_POST['txtFName'],$_POST['txtLName'],$_POST['txtEmail'],$_POST['txtDob'],$_POST['txtCity']);
$empObj->connectDt("joetest");
$empObj->UpdateEmployee();

?>	
<BR><A href="ChooseEmp.php"> Home </A>