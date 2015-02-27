<?php
class View
{
	protected $con;
	protected $option;

	function __construct($option)
	{
		$this->con="";
		$this->option=$option;

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


	function viewDetails()
	{
		
		if($this->option=="Emp")
		{
			$sql="SELECT * FROM Employee where flag=1";

			$result = mysql_query($sql);
			
			while($db_field = mysql_fetch_assoc($result)) 
			{
					print "<BR>ID: " .$db_field['empID'];
					print "<BR>Name: " .$db_field['empFName'] . " " .$db_field['empLName'] ;
					print "<BR>Email: " .$db_field['empEmail'];
					print "<BR>DOB: " .$db_field['empDob'];
					print "<BR>City: " .$db_field['empCity'];
					print "<BR>";
			}
		}
		elseif($this->option=="Prj")
		{
			$sql="SELECT * FROM project";

			$result = mysql_query($sql);
			
			while($db_field = mysql_fetch_assoc($result)) 
			{
					print "<BR>ID: " .$db_field['prjID'];
					print "<BR>Name: " .$db_field['prjName'];
					print "<BR>";
			}
		}
		elseif($this->option=="EmpPrj")
		{
			$sql="SELECT E.empFName,E.empLName,P.prjName FROM employee E, project P, assignproject A
					WHERE A.empID = E.empID AND A.prjID = P.prjID";

			$result = mysql_query($sql);
			
			while($db_field = mysql_fetch_assoc($result)) 
			{
					print "<BR>Employee: " .$db_field['empFName'] . " " .$db_field['empLName'] ;
					print "<BR>Project: " .$db_field['prjName'];
					print "<BR>";
			}
		}
		elseif($this->option=="EmpBench")
		{
			$sql="SELECT E.empFName,E.empLName FROM employee E 
				WHERE E.empID NOT IN (SELECT empID FROM assignproject )";

			$result = mysql_query($sql);
			
			while($db_field = mysql_fetch_assoc($result)) 
			{
					print "<BR>Employee: " .$db_field['empFName'] . " " .$db_field['empLName'] ;
					print "<BR>";
			}
		}
		else
			 header( 'Location: AssignPrj.php' ) ;



	
		
				mysql_close($this->con);	
	}
			
}

$empObj = new View($_POST['selAction']);
$empObj->connectDt("joetest");
$empObj->viewDetails();

?>
<BR><A href="ChooseEmp.php"> Home </A>