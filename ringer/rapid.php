<?php
//https://upload.rapidvideo.com/upload.rapidvideo.com/upload/index.php
class Rapid
{
	var $userid;

	function Rapid($uid)
	{
		$this->userid = $uid;
	}

	function remoteUpload($url)
	{
		$this->url = "https://api.rapidvideo.com/v1/remote.php?ac=add&user_id=".$this->userid."&url=".$url;
	}

	function apiReq()
	{
		$this->result = json_decode(file_get_contents($this->url));
	}
}

$q = @$_GET['q'];
$rapid = new Rapid("48995");

switch($q)
{
	default: break;

	case "upload":
		$u = @$_GET['url'];
		$rapid->remoteUpload($u);
		$rapid->apiReq();
	break;
}
?>