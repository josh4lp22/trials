<?php
set_time_limit (0); 
ini_set('memory_limit','1024M');
class User
{
    protected $con;
    

    function __construct()
    {
        $this->con="";
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


    function fetchAllRecords()
    {echo "<pre>";
        $prodArr = array();    
        $completeArr = array();
    
        $sql = "SELECT * from insert_all";
        $result = mysql_query($sql);
        
        while($row = mysql_fetch_assoc($result)) {
            $completeArr[] = $row;
        }
        //echo sizeof($completeArr);
		//print_r($completeArr[1]); exit;
        /*$sql2 = "SELECT * from insert_all";
        $result2 = mysql_query($sql2);
        
        while($row2 = mysql_fetch_assoc($result2)) {
            $completeArr[] = $row2;
        }*/
        
        foreach($completeArr as $record) {
		
			$findRes = null;
		
			$sqlFind = "select * from in_prod where upc=" .$record['upc'] ." AND vol=" .$record['vol'] ." AND track_number=" . $record['track_number'];
			
			$res = mysql_query($sqlFind);
			
			$findRes = mysql_fetch_assoc($res);

			if(isset($findRes["upc"])) {
				$sql2 = "DELETE from insert_All where upc=" .$record['upc'] ." AND vol=" .$record['vol'] ." AND track_number=" . $record['track_number'];
				mysql_query($sql2);
			}

			
			//exit;
            
            //echo "<br>" . $sql2 . "<br>";
            //echo mysql_affected_rows();
        }
        
        //$diff = array_udiff_assoc($completeArr, $prodArr, array($this, 'getDiff'));
        
        //file_put_contents("d:/to_db/result.txt", print_r($diff, true));
        
        echo "success";
        
            
    }
    
    /*public function getDiff($a, $b)
    {
        if(($a["upc"] == $b["upc"]) && ($a["vol"] == $b["vol"]) && ($a["track_number"] == $b["track_number"]))
        return 0;
        else
        return -1;
    
    }*/
            
}

$userObj = new User();
$userObj->connectDt("test");
$userObj->fetchAllRecords();

?>