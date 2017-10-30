<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, inimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>浜松市観光アプリ</title>
<link rel="stylesheet" href="css/common_jp.css">
<link rel="stylesheet" href="css/index_jp.css">
</head>

<body>






	<header><div class="header ja" id="top">
<h1><a>あなたにぴったりのスポット</a></h1>
	</div></header>

	<?php
	require('api_login.php');
	$Username=$_COOKIE["PHPSESSID"];

	$cypherStatement =
	"MATCH (us1:USER { name: '$Username' })-[:Like]->(d)<-[:canfind]-(共通スポット)-[:belongsTo]->(e)<-[:contains]-(f)<-[:belongsTo]-(us1:USER { name: '$Username' }) "
	. "MATCH (us2:USER { name: '$Username' })-[:livedIn]->(ho1:Hotel { name: 'ホテルコンコルド' })-[r:DISTANCE]->(共通スポット) "
	. "WHERE r.walk*2+共通スポット.timecost<=1000 OR r.bus*2+共通スポット.timecost<=1000 "
	. "RETURN 共通スポット ";

	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	foreach ($resultSet as $node) {
	    echo('スポット名 : ' . $node['共通スポット']->getProperty('name').'<br><input type="radio" name="radio1" id="radioA">
			<label for="radioA">ここに行く</label>
			<input type="radio" name="radio1" id="radioB">
			<label for="radioB">ここに行った</label>
			<input type="submit"><br>');
		}
?>



</body>
</html>
