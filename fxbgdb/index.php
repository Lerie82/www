<?php
/*$login = "4a087df4589caaf9";
$key = "wmyaubgT";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openload.co/1/account/info?login=".$login."&key=".$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$output = curl_exec($ch);

if(curl_errno($ch))
{
    echo 'Request Error:' . curl_error($ch);
}

curl_close($ch);

die(var_dump(json_decode($output)));
*/
?>

<!doctype html>
<html lang="en">
<head>
	<title>Vuejs Single Page App</title>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>

<body>
	<div id="app">
		<ol>
			<todo-item
				v-for="item in groceryList"
				v-bind:todo="item"
				v-bind:key="item.id">
			</todo-item>
		</ol>
	</div>

	<script>	
	var data = {
    	groceryList: [
    		{ id: 0, text: 'veggies' },
    		{ id: 1, text: 'fruits' },
    		{ id: 2, text: 'cup o noodles' }
    	]
	}

	Vue.component('todo-item', {
		props: ['todo'],
		template: '<li>{{ todo.text }}</li>'
	})

	var app = new Vue({
		el: '#app',
		data: data
	})
	</script>
</body>

</html>
