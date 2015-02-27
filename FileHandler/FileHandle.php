<HTML>
<HEAD>
<TITLE>File Handler</TITLE>	

</HEAD>
<BODY>
	<?php
		$fop=new FileOperation();
		$fileName = "";

			if(isset($_POST['openFile'])) 
			{
				$fileName = $_POST['fileEditor'];
			}
			elseif(isset($_POST['saveFile']))
			{
				$path=$_POST['filePath'];
				$fop->write($path);
				$fileName = $_POST['filePath'];
			}
			elseif(isset($_POST['copyFile']))
			{
				$path=$_POST['filePath'];
				$fop->fileCopy($path);
				$fileName = $_POST['filePath'];
			}
			elseif(isset($_POST['deleteFile']))
			{
				$path=$_POST['filePath'];
				$fop->fileDelete($path);
			}
	?>
	
	<FORM method="post" action="#">
	
		<TEXTAREA name="txtFile" rows="20" cols="100"><?php $fop->Read($_POST['fileEditor']); ?></TEXTAREA><BR>
		<INPUT type="file" name="fileEditor"><br> 
		<INPUT type="Submit" name="openFile" value="Open">
		<INPUT type="Submit" name="saveFile" value="Save">
		<INPUT type="Submit" name="copyFile" value="Copy">
		<INPUT type="Submit" name="deleteFile" value="Delete">
		<INPUT type="hidden" name="filePath" value="<?php print $fileName;?>" />
		<?php
		//print_R($_POST);

			class FileOperation
			{
				protected $fileObj;

				function __construct()
				{
					$this->fileObj="";
				}

				function Read($path)
				{
					if($_POST["fileEditor"]!="")
					{
						$this->fileObj=$path;
						$handle = fopen($this->fileObj, "r");
						echo file_get_contents($this->fileObj);
					}
				}
			
			

				function write($path)
				{
					$newfile = $path . '.bak';
					copy($path, $newfile);
					$fp = fopen($path, "w+") or die("Couldn't open $file");
					$text = $_POST['txtFile'];
					fwrite($fp, $text);
					fclose($fp);
				
				}

				function fileCopy($path)
				{
				
					$newfile = 'testNew.txt';
					if (!copy($path, $newfile)) 
					{
						echo "failed to copy $file...\n";
					}
				}
			
				function fileDelete($path)
				{
					unlink($path);
				}

			}
	

			

			
		?>	
		

	</FORM>
</BODY>
</HTML>