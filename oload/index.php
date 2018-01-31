<script>
function showFiles()
{
	//
}
</script>

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
}

$oload = new Oload("wmyaubgT", "4a087df4589caaf9");
$oload->getFolders();

echo '<select>';
foreach($oload->folders as $folder)
{
	echo '<option onclick="loadFiles('.$folder->id.')">'.$folder->name.'</option>';
}
echo '</select>';
?>