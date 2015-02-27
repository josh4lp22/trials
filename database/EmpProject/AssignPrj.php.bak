<HTML>
<HEAD>
<TITLE>Assign Employee</TITLE>

</HEAD>
<BODY>
	<FORM method="post" name="frmAssign" action="modal_Assign.php">
		Choose Employee: <SELECT  name="selEmp">
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
		
		</SELECT><BR><BR>

		Choose Project: <SELECT  name="selPrj">
		<?php
			$con = mysql_connect("localhost","root","");
			if (!$con)
			{
			  die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("joetest", $con);

			$sql = "SELECT prjID,prjName FROM project";

			$result = mysql_query($sql);

			while($row = mysql_fetch_array($result))
			{ 
			  echo "<option value=\"".$row['prjID']."\">".$row['prjName'] ."</option>\n  ";
			}

			mysql_close($con);
		?>
		
		</SELECT><BR><BR>
		<INPUT type="submit" value="Submit">
	</FORM>
</BODY>
<HTML>