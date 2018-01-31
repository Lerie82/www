<?php
class Oload
{
	var $key = "";
	var $login = "";
	var $result = "";
	var $url = "";
	var $folders;

	function __construct($k, $l)
	{
		$this->key = $k;
		$this->login = $l;
	}

	function apiReq()
	{
		$this->result = json_decode(file_get_contents($this->url));
	}

	function getInfo()
	{
		$this->url = "https://api.openload.co/1/account/info?login=".$this->login."&key=".$this->key;
		$this->apiReq();
	}

	function getFolders()
	{
		$this->url = "https://api.openload.co/1/file/listfolder?login=".$this->login."&key=".$this->key;
		$this->apiReq();
		$this->folders = $this->result->result->folders;
	}

	function remoteDl($url)
	{
		$this->url = "https://api.openload.co/1/remotedl/add?login=".$this->login."&key=".$this->key."&url=".$url;
		$this->apiReq();
	}
}

$q = @$_GET['q'];
$oload = new Oload("wmyaubgT", "4a087df4589caaf9");

switch($q)
{
	default: break;

	case "upload":
		$u = @$_GET['url'];
		$oload->remoteDl($u);
	break;

	case "info":
		$oload->getInfo();
		die(var_dump($oload));
	break;
}
?>
