<?php
class Model_managepicModel
{
	protected $con;
	protected $userName;
	
	function __construct()
	{
		$this->con="";
		$this->userName="Joey";
	}
	
	function loadProfPic($usr)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		
		$sql="SELECT profilepic,usrName from empdetails where usrName='$usr'";
		
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
		
		mysql_close($this->con);
		return $data;
	}
	
	function uploadImg($usr)
	{
		if ( ! is_dir("pictures/$usr") ) 
			mkdir("pictures/$usr");
		$upload = new Zend_File_Transfer_Adapter_Http();
		
		$upload->setDestination("pictures/$usr");
		$upload->addValidator('Extension', true, 'jpg,png,gif');
		$upload->addValidator('IsImage', false);
		$upload->addValidator('Size', true,'5MB');
		$upload->addValidator('FilesSize', true,'5MB');

		//echo $_FILES['file']['name'];
		//exit;
		
		if (! $upload->receive()) {
			$messages = $upload->getMessages();
			echo implode("\n", $messages);
		
		}
		else
		{
			//$path=$upload->getFileName();
			$path = $_FILES ['file'] ['name'];
			$this->con = mysql_connect ( "localhost", "root", "" );
			
			if (! $this->con) {
				die ( 'Could not connect: ' . mysql_error () );
			}
			
			mysql_select_db ( "zendTest", $this->con );
			
			$sql = "INSERT into picuploads (picID,picPath,usrName)
					values (null, '$path','$usr')";
			
			mysql_query ( $sql ) or die ( mysql_error () );
			
			
			mysql_close ( $this->con );
			//echo $path;exit;
		}
	}
	
	function loadUserPic($usr)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
	
		mysql_select_db("zendTest", $this->con);
	
	
		$sql="SELECT picPath,usrName from picuploads where usrName='$usr'";
	
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$data[] = $row;
		}
	
		mysql_close($this->con);
		return $data;
	}
	
	function setProfPic($usr,$path)
	{
		$this->con = mysql_connect("localhost","root","");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("zendTest", $this->con);
		
		
		$sql="UPDATE empdetails SET profilepic='$path' where usrName='$usr'";
		
		mysql_query ( $sql ) or die ( mysql_error () );
		mysql_close($this->con);
	}
	
}