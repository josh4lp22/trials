<?php
class ImportData
{
	protected $con;
	protected $filePath;
	
	function __construct($filePath)
	{
		$this->con="";
		$this->filePath=$filePath;
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

	function getData()
	{ 
		$name = explode(".", $this->filePath);
		//echo $name[0];
		
		if (($handle = fopen($this->filePath, "r")) !== FALSE) 
		{
			for($i =1;($data = fgetcsv($handle, 10000, ";")) !== FALSE; $i++)
			{
				if($i==1)
				{
					//continue;
					$sqlCreate = "Create table $name[0]Data( $data[0] varchar(20),
														$data[1] varchar(30),
														$data[2] varchar(15),
														$data[3] varchar(20))";
					mysql_query($sqlCreate) or die(mysql_error());
				}
				else
				{
					$sql = "INSERT into  $name[0]Data
											 values
											('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."')";                        
					mysql_query($sql) or die(mysql_error());
				}
			}	    
			
			
			echo "Data Imported.";
			mysql_close($this->con);
			fclose($handle);
		}
	}

}


$impObj= new ImportData($_POST['csvFile']);
$impObj->connectDt("joetest");
$impObj->getData();
?>
