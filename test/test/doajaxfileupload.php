<?php
require_once('saetv2.ex.class.php');
if ($_FILES["fileToUpload"]["error"] > 0)
  {
  echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br />";
  }
else
  {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"upload/" . $_FILES["fileToUpload"]["name"]);
  //echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br />";
 // echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br />";
  //echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " Kb<br />";
  //echo "Stored in: " . "upload/" . $_FILES["fileToUpload"]["name"];

  $appkey = '3733569335';
  $appsec = '27bda218d64c907ee20ee6dd5566bf9a';
  $access_token = '2.0088N8xB0nhbW1a55ef3c85czjERtC';
		$weibo = new SaeTClientV2($appkey, $appsec, $access_token);
		$res = $weibo->upload('test',"upload/" . $_FILES["fileToUpload"]["name"]);
		//echo "<img src = ".$res['original_pic'].">";
		$weibo->delete($res['mid']);
	@unlink("upload/" . $_FILES["fileToUpload"]["name"]);
	@unlink($_FILES["fileToUpload"]["tmp_name"]);

	echo "{";
	echo				"error: '" . $res['original_pic'] . "',\n";
	echo				"msg: '" . $res['original_pic'] . "'\n";
	echo "}";
  }
/*
require_once('saetv2.ex.class.php');

	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//$msg .= " sina: " . $res;
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES['fileToUpload']);		
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>