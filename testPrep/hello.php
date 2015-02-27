<html>
<head>
<title>My First PHP Program</title>
</head>
<body>
<?php
	/* $a=5;
	date_default_timezone_set("Asia/Calcutta");
	$d=date("dS \of F Y H:i:s A");
	echo "Hello!! Good Morning <br>";
	echo "<h2>Today's date is:" .$d. "</h2>";

	$a="1011";
	echo "<BR>" . bin2hex($a);

	$str = "<BR>The string ends in escape: ";
	$str .= chr(27);
	echo $str; */

	// Print stars pattern

/* function printStars($rows){
	$space = $rows;

	for($i=1;$i<=$rows;$i++){

		for($c=1;$c<$space;$c++){
			echo '&nbsp;&nbsp;';
		}
		$space--;
		for($c=1;$c<=2*$i-1;$c++){
			echo"*";
		}

		echo "<br>";
	}
}

printStars(10); */

/*$limit = 10;
$first = 1;
$second = 1;
echo $first . ",";
echo $second . ",";

while($limit-2>0){
	$next = $first + $second;
	echo $next . ",";
	$first = $second;
	$second = $next;
	$limit--;
}*/
//echo "<pre>";
$str = "Yanni is a great musician";
$strArray = str_split($str);
$revArray = array_reverse($strArray);
$str = implode("", $revArray);
print_r($str);



	?>
</body>
</html>