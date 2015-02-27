<?php

class Register
{
	protected $emaiID;
	protected $passwd;
	protected $name;
	protected $dob;

	function __construct($emaiID,$passwd,$name,$dob)
	{
		$this->emaiID=$emaiID;
		$this->passwd=$passwd;
		$this->name=$name;
		$this->dob=$dob;
	}


	function insertData()
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
		  die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("joetest", $con);

		$sql="insert into logininfo values('" .$this->emaiID . "','" .$this->passwd. "','" . $this->name . "','" .$this->dob . "')" ;

		if (!mysql_query($sql,$con))
		{
		  die('Error: ' . mysql_error());
		}


		header('Location: Index.php');


		mysql_close($con);
	}

	
}

$registerObj=new Register($_POST['txtEmail'],$_POST['txtPass'],$_POST['txtName'],$_POST['txtDob']);
$registerObj->insertData();


?> 