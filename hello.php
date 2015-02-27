<html>
<head>
<title>My First PHP Program</title>
</head>
<body>
<?php
	$a=5;
	date_default_timezone_set("Asia/Calcutta");
	$d=date("dS \of F Y H:i:s A");
	echo "Hello!! Good Morning <br>";
	echo "<h2>Today's date is:" .$d. "</h2>";

	$a="1011";
	echo "<BR>" . bin2hex($a);
	
	$str = "<BR>The string ends in escape: ";
	$str .= chr(27);
	echo $str;
?>
</body>
</html>