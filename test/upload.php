<?php
require_once('saetv2.ex.class.php');
if ($_FILES["fileToUpload"]["error"] > 0)
  {
  echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br />";
  }
else
  {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"upload/" . $_FILES["fileToUpload"]["name"]);
  echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br />";
  echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br />";
  echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . "upload/" . $_FILES["fileToUpload"]["name"];

  $appkey = '3733569335';
  $appsec = '27bda218d64c907ee20ee6dd5566bf9a';
  $access_token = '2.0088N8xB0nhbW1a55ef3c85czjERtC';
		$weibo = new SaeTClientV2($appkey, $appsec, $access_token);
		$res = $weibo->upload('test',"upload/" . $_FILES["fileToUpload"]["name"]);
		echo "<img src = ".$res['original_pic'].">";
		$weibo->delete($res['mid']);
	@unlink("upload/" . $_FILES["fileToUpload"]["name"]);
	@unlink($_FILES["fileToUpload"]["tmp_name"]);

				echo "<img src = ".$res['original_pic'].">";
  }
?>