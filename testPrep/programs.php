<?php
//echo "hfg";exit;
class logicTest{

	public function primeNumbers($limit){
	
		for($i=1; $i<=$limit; $i++){
			$counter = 0;
			for($j=1; $j<=$i; $j++){
				if($i%$j == 0)
					$counter++;
			}
			
			if($counter == 2)
				echo $i . "<br />";
		}
	}
	
	public function greaterNumber($a, $b, $c){
		$res = $a > $b ? ($a > $c ? $a : $c) : ($b > $c ? $b : $c);
		echo $res . " is greater";
	}

	public function armstrongNumber($num){
		$sum = 0;
		$temp = $num;
		while($temp !=0){
			$remainder = $temp%10; 
			$sum = $sum + pow($remainder, 3);
			$temp = intval($temp/10);
		}
		if($num == $sum)
			echo "Armstrong";
		else
			echo "Not Armstrong";
	}
	
	public function flyodTriangle($rows){
		$num=1;
		
		for($i=1; $i<=$rows; $i++){
			
			for($c=$rows-$i; $c >=1; $c--)
				echo "&nbsp;&nbsp;";
			
			for($j=1; $j<=$i; $j++){
				echo $num++ . "\t";
			}
			echo "<br />";
		}
	}
	
	public function diamond($rows){
	
		for($i=1; $i<=$rows; $i++){
			
			for($c=$rows-$i; $c >=1; $c--)
				echo "&nbsp;";
			
			for($j=1; $j<=$i; $j++){
				echo "*";
			}
			echo "<br />";
		}
		for($i=1; $i<=$rows; $i++){
			
			for($c=1; $c <=$i; $c++)
				echo "&nbsp;";
			
			for($c=$rows-$i; $c >=1; $c--){
				echo "*";
			}
			echo "<br />";
		}
	}
	
	public function getVendor(){
		$data = array();
		$con = mysql_connect("localhost", "root", "");
		if(!$con){
			die("Could not connect" . mysql_error());
		}
		
		mysql_select_db("test");
		
		$sql = "SELECT * FROM vendor_contract limit 10";
		$result = mysql_query($sql);
		
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
		mysql_close();
		
		echo "<pre>";
		print_r($data);
		
	}
	
	public function putRelease(){
	
		$con = mysql_connect("localhost", "root", "");
		if(!$con)
			die("Could not connect." . mysql_error());
		
		mysql_select_db("test");
		
		$sql = "insert into temp(UPC, release_name) values (8457489784, 'Noah')";
		mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows() >0)
			echo "Record Inserted";
		
		mysql_close();
	}
	
	public function getDuplicate(){
		echo "<pre>";
		$arr = array(34, 12, 34, 65, 12, 	74);
		
		print_r( array_diff_assoc( $arr, array_unique( $arr ) ) );
	
	}
}

$lt = new logicTest();
//$lt->primeNumbers(10);
//$lt->greaterNumber(9,7,78);
//$lt->armstrongNumber(408);
//$lt->flyodTriangle(10);
//$lt->diamond(10);
//$lt->getVendor();
//$lt->putRelease();
$lt->getDuplicate();