<?php
session_start();

class Login
{
	protected $emaiID;
	protected $passwd;

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

		mysql_select_db("joetest", $con);

		$sql="SELECT * FROM logininfo where emailID='" . $this->emaiID . "' and password='" .$this->passwd . "'" ;

		$result = mysql_query($sql);

		$num = mysql_num_rows($result);

		if($num == 1)
		{
			$_SESSION['logname'] =$emaiID;
			$row = mysql_fetch_array($result);

			$date = date_create($row['DOB']);
			$interval = $date->diff(new DateTime);
			$_SESSION['age'] = $interval->y;

			header('Location: MovieList.php');
			//echo "Welcome " . $row['fullName'];
		}
		Else
		{
			echo "Please enter correct details or register if you have not registered!!";
		}


		mysql_close($con);	
	}
	
}

$loginObj = new Login($_POST['txtEmail'],$_POST['txtPass']);
$loginObj->userLogin();




?> 