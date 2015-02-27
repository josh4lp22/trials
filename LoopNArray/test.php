<HTML>
<HEAD>
	<TITLE>Result</TITLE>
</HEAD>
<BODY>
	
		<?php 
			$arr= array();

			$names=$_POST["tName"];

			$arr = explode(',', $names);
			asort($arr);

			foreach ($arr as $value)
			{
				echo $value . "<br>";
			}
		?> 

</BODY>
</HTML>