<HTML>
<HEAD>
<TITLE>Choose Employee</TITLE>

</HEAD>
<BODY>
	<FORM method="post" name="frmEmp" action="main.php">
		Choose Employee: <SELECT  id="selEmpID" name="selEmpID">
			<OPTION value="0">All Employees</OPTION>
			<?php
			foreach($data as $eachemp)
			{ 
			  echo "<option value=\"".$eachemp['empID']."\">".$eachemp['empFName']. " " .$eachemp['empLName'] ."</option>\n  ";
			}
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