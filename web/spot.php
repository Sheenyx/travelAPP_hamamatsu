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

	</div></header>

<?php
	$spot = strip_tags($_GET['name']);


	require('api_login.php');


echo($spot.'の関連スポット<br><br>');
	$cypherStatement =
	" MATCH ({name:'$spot'})<-[:canfind]-(d) "
	. "RETURN d ";

	$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
	$resultSet = $cypherQuery->getResultSet();
	foreach ($resultSet as $node) {
			echo('スポット名 : ' . $node['d']->getProperty('name').'<br><input type="radio" name="radio1" id="radioA">
			<label for="radioA">ここに行く</label>
			<input type="radio" name="radio1" id="radioB">
			<label for="radioB">ここに行った</label>
			<input type="submit"><br>');
		}
	?>
	<nav><div id="page-top"><ul class="clearfix">
		<li id="goback"><a href="javascript:history.back()"><i class="fa fa-undo" aria-hidden="true"></i> BACK</a></li>
		<li id="gohome"><a href="../観光.php"><i class="fa fa-home"></i> HOME</a></li>
	</ul></div></nav>


</body>
</html>
