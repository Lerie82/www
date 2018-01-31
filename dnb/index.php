<?php
error_reporting(E_ALL);	
session_start();

if($_SESSION['auth_token'] == "" || !$_SESSION['auth_token'])
{
	$_SESSION['auth_token'] = getAuthToken();
	die("token obtained, refresh the page");
} else {
	$r = getCoInfo("28596349");
	echo '<pre>';
	die(var_dump(json_decode($r)));
}

function getAuthToken()
{
	$url = "https://direct.dnb.com/Authentication/V2.0/";

	$post = doPost(
		array(
			'x-dnb-user: P2000000E42B849A54B4CBD8171FE384',
			'x-dnb-pwd: Ringler85'
		)
	);

	return $post->AuthenticationDetail->Token;
}

function doPost($url, $fields)
{
	try
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		$result = curl_exec($ch);
		curl_close($ch);
	}
	catch(Exception $e)
	{
		die(var_dump($e));
	}

	return json_decode($result);
}

function doRequest($url)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization:".$_SESSION['auth_token']));
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, 'taysearch/1.1');
	//curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	$res = curl_exec($ch);
	return $res;
}

function findCompany($keyword)
{
	//$keyword = urlencode($keyword);
	$url = "https://direct.dnb.com/V6.4/organizations?KeywordText=".$keyword."&SearchModeDescription=Basic&findCompany=true";
	return doRequest($url);
}

function getCoInfo($duns)
{
	$url = "https://direct.dnb.com/V6.1/organizations/".$duns."/products/DCP_PREM";
	$r = doRequest($url);
	return $r;
}

function countryRisk($num)
{
	$url = "https://direct.dnb.com/V3.2/countries/US/products/CRR?ProductFormatPreferenceCode=".$num;
	die(var_dump(doRequest($url)));
}
?>