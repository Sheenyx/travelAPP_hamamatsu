

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, inimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>観光アプリ</title>
</head>



<body>

<?php
require('api_login.php');
$Username=$_COOKIE["PHPSESSID"];
$Firstplace=$_REQUEST['FirstRecommends'];
echo '<h1><a>あなたは先ほど'.$Firstplace.'に行った、次のオススメのスポットは</a></h1>';
	$cypherStatement =
	"MATCH (sp1:Spot { name: '$Firstplace' }) "
	. "MATCH (us1:USER { name: '$Username' }) "
		. "CREATE (us1)-[:visited]->(sp1)";
		$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
		$resultSet = $cypherQuery->getResultSet();

$cypherStatement =
"MATCH (sp1:Spot { name: '$Firstplace' })-[:belongsTo]->(判定項目a)<-[:contains]-(行動パターン)-[:contains]->(判定項目)<-[:belongsTo]-(推薦スポット)-[:canfind]->(資源)<-[:Like]-(us1:USER { name: '$Username' }) "
. "MATCH (sp1:Spot { name: '$Firstplace' })<-[:visited]-(us1:USER { name: '$Username' })-[:belongsTo]->(行動パターン) "
. "RETURN 推薦スポット ";

$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
$resultSet = $cypherQuery->getResultSet();

echo'<form action="ThirdRecommend.php" method="post">';
foreach ($resultSet as $node) {$SecondRecommends=$node['共通スポット']->getProperty('name');

echo'スポット名：'. $SecondRecommends.'';
echo'<input type="radio" name="FirstRecommends" value="' .$SecondRecommends. '"　>';
echo'ここに行った';
echo nl2br("\n");

}
echo '<p><input type="submit" value="確定"></p>';
echo'</form>';

?>

<nav><div id="page-top"><ul class="clearfix">
	<li id="goback"><a href="jp3.php"><i class="fa fa-back"></i> 再予測</a></li>
	<li id="gohome"><a href="../top.php"><i class="fa fa-home"></i> HOME</a></li>
</ul></div></nav>




</body>
</html>
