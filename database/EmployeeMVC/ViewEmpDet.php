<?php

	foreach($data as $eachemp)
	{ //print_R( $eachemp);
				print "<BR>ID: " .$eachemp['empID'];
				print "<BR>Name: " .$eachemp['empFName'] . " " .$eachemp['empLName'] ;
				print "<BR>Email: " .$eachemp['empEmail'];
				print "<BR>DOB: " .$eachemp['empDob'];
				print "<BR>City: " .$eachemp['empCity'];
				print "<BR>";
	}

?>