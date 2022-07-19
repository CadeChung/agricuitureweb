<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>jQuery.getJSON demo</title>
	<style>
		img {
			height: 100px;
			float: left;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
	<a class="weatherwidget-io" 
	   href="https://forecast7.com/zh-tw/22d68120d53/changzhi/" 
	   data-label_1="屏東縣長治鄉" 
	   data-label_2="天氣預報" 
	   data-font="微軟正黑體 (Microsoft JhengHei)" 
	   data-theme="orange" 
	   data-textcolor="#1d1c1a" 
	   data-mooncolor="#0f0f0e" 
	   data-cloudcolor="#0c0b0b">屏東縣長治鄉 天氣預報</a>
	<script>
		! function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = 'https://weatherwidget.io/js/widget.min.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, 'script', 'weatherwidget-io-js');
	</script>
	<table class="each-table" border="1">
		<thead>
			<tr>
				<td>開始時間</td>
				<th>結束時間</th>
				<th>降雨機率</th>
				<th>天氣現象</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<script src="assets/js/weather.js?v=<?= time() ?>"></script>
</body>

</html>