<?php
require_once __dir__."/vendor/autoload.php";

$q = @$_GET['q'];

switch($q)
{
	default: break;

	case "search":

		$key = "AIzaSyDTGgQZ7ucWI0GQQsqCbTGf83TNwNlPVww";

		$client = new Google_Client();
		$client->setDeveloperKey($key);

		$yt = new Google_Service_YouTube($client);
		$term = @urlencode($_GET['term']);
		$max = @$_GET['max'];

		if(!$_GET['max']) $max = "50";

		$res = $yt->search->listSearch('id, snippet', array(
			'q' => $term,
			'maxResults' => $max
			)
		);

		//echo '<pre>';
		//die(var_dump($res['items']));

		foreach($res['items'] as $item)
		{
			switch($item['id']['kind'])
			{
				case "youtube#video":
					echo '
						<div class="row" id="'.$item['id']['videoId'].'">
							<div class="col-md-12">
								<i class="fab fa-youtube"></i>
								<a href="#" onClick="saveVid(\'http://www.youtube.com/watch?v='.$item['id']['videoId'].'\',\''.$item['id']['videoId'].'\'); return false;"><i class="fas fa-save"></i></a>
								<a href="#" onClick="oloadUpload(\'http://www.youtube.com/watch?v='.$item['id']['videoId'].'\',\''.$item['id']['videoId'].'\'); return false;"><i class="fas fa-upload"></i></a>
								<a href="#" onClick="rapidUpload(\'http://www.youtube.com/watch?v='.$item['id']['videoId'].'\',\''.$item['id']['videoId'].'\'); return false;"><i class="fas fa-bolt"></i></a>
								<a href="http://www.youtube.com/watch?v='.$item['id']['videoId'].'" target="_blank"><i class="fas fa-window-maximize"></i></a>
							
								'.$item['snippet']['title'].'
							</div>
						</div>';
				break;
			}
		}
}
?>
