

<?php

class Uploader
{
	protected $userName;

	function __construct($userName)
	{
		$this->userName= $userName;
	}

	function upload()
	{
		$allowedExts = array("png");
		$extension = end(explode(".", $_FILES["file"]["name"]));

		$size = getimagesize($_FILES["file"]["tmp_name"]);

		if (($_FILES["file"]["type"] == "image/png")
		&& ($_FILES["file"]["size"] < 2097152)
		&& in_array($extension, $allowedExts)
		&& ($size[0] < 500 && $size[1] < 500))
		{
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
				echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				echo "Type: " . $_FILES["file"]["type"] . "<br>";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

			if (file_exists("upload/" . $this->userName . ".png"))
			{
			  echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
			  move_uploaded_file($_FILES["file"]["tmp_name"],
			  "upload/" . $this->userName . ".png" );
			  echo "Stored in: " . "upload/" . $this->userName . ".png";
			}
		  }
		}
		else
		{
		  echo "Invalid file!!";
		}
	}
}


$imgUp=new Uploader($_POST['txtName']);
$imgUp->upload();

?> 