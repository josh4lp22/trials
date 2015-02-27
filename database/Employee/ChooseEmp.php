<HTML>
<HEAD>
<TITLE>Choose Employee</TITLE>
<SCRIPT>
	function setAction()
	{
		var sel = document.getElementById('selAction');
		var sv = sel.options[sel.selectedIndex].value;
		if(sv=="Add")
			document.frmEmp.action="Edit.php";
		else if(sv=="Edit")
			document.frmEmp.action="Edit.php";
		else if(sv=="View")
			document.frmEmp.action="View.php";
		else if(sv=="Delete")
			document.frmEmp.action="Delete.php";
	}

</SCRIPT>
</HEAD>
<BODY>
	<FORM method="post" onsubmit="setAction();" name="frmEmp">
		Choose Employee: <SELECT  id="selEmpID" name="selEmpID">
			<OPTION value="0">All Employees</OPTION>
		<?php
			$con = mysql_connect("localhost","root","");
			if (!$con)
			{
			  die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("joetest", $con);

			$sql = "SELECT empID,empFName,empLName FROM employee where flag=1";

			$result = mysql_query($sql);

			while($row = mysql_fetch_array($result))
			{ 
			  echo "<option value=\"".$row['empID']."\">".$row['empFName']. " " .$row['empLName'] ."</option>\n  ";
			}

			mysql_close($con);
		?>
		
		</SELECT><BR>

		Choose Action: <SELECT id="selAction" name="selAction">
			<OPTION value="Add">Add</OPTION>
			<OPTION value="Edit">Edit</OPTION>
			<OPTION value="View">View</OPTION>
			<OPTION value="Delete">Delete</OPTION>
		</SELECT><BR>
		
		<INPUT type="submit" value="Submit">
	</FORM>
</BODY>
<HTML>